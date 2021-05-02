<?php

namespace App\Http\Controllers\Admin;

use App\Models\Field;
use App\Models\FieldData;
use App\Models\FieldUpdated;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function users()
    {

        $users = User::where('platform_id', 1)->get();
        return view('admin.users', ['users' => $users]);
    }

    public function invoervelden() {
        $invoerveld = User::where([
            ['platform_id', 1]
        ])->first();

        $platform = Platform::find(1);
        $invoerveld->fields = $platform->getFields();

        return view('admin.invoervelden', ['invoerveld' => $invoerveld, 'platform' => $platform]);

    }

    public function userDetail($id = 0) {

        if($id != 0) {
            $user = User::where([
                ['id', $id],
                ['platform_id', 1]
            ])->first();
        } else {
            $user = new User();
        }
        $platform = Platform::find(1);
        $platform->fields = $platform->getFields();
        $user->fields = $user->getUserFields()->pluck('value', 'field_id');


        return view('admin.userdetail', ['user' => $user, 'platform' => $platform]);

    }
    public function saveUserDetail($id, Request $request) {
        if(!is_numeric($id)) {
            $user = new User();
            $user->platform_id = 1;
            $user->email = $request['email'];

            $user->save();
            $id = $user->id;
        } else {
            $user = User::where([
                ['id', $id],
                ['platform_id', 1]
            ])->first();
            $user->email = $request['email'];

        }


        $fields = $request['fields'];
        foreach($fields as $key => $field) {

            $fieldData = FieldData::firstOrCreate([
                'field_id' => $key,
                'user_id' => $id
            ]);

            if($fieldData->value != $field) {
                $fieldHistory = new FieldUpdated();
                $fieldHistory->field_id = $key;
                $fieldHistory->user_id = $id;
                $fieldHistory->value = $fieldData->value . ', ' . $field;
                $fieldHistory->save();
                $fieldData->value = $field;
                $fieldData->save();
            }
        }
        $user->save();

        $platform = Platform::find(1);
        $platform->fields = $platform->getFields();
        $user->fields = $user->getUserFields()->pluck('value', 'field_id');


        return view('admin.userdetail', ['user' => $user, 'platform' => $platform]);

    }

    public function parseCSV() {
        set_time_limit(6000);
        $file = fopen('sl-excel-export.csv', 'r');
        $first = true;

        $fieldKeys = [];
        while (($line = fgetcsv($file, 0, ';')) !== FALSE) {
            if($first) {
                foreach($line as $key=>$value) {
                    if($key != 0) {
                        $field = Field::firstOrCreate([
                            'platform_id' => 1,
                            'name' => $value
                        ]);
                        $fieldKeys[] = $field->id;
                        $field->save();
                  }
                }
                $first = false;
            } else {
                echo '123';
                foreach($line as $key=>$value) {

                    if($key == 0) {
                        $user = User::firstOrCreate([
                            'email' => rand(1000, 9999) . $value,
                            'platform_id' => 1
                        ]);

                        $user->password = Hash::make('Welkom1234');

                        $user->save();
                    } else {

                        if (isset($fieldKeys[$key - 1]) && isset($value) && $value != '') {
                            $field = FieldData::firstOrCreate([
                                'user_id' => $user->id,
                                'field_id' => $fieldKeys[$key - 1],
                            ]);
                            $field->value = $value;
                            $field->save();
                        }
                    }

                }
            }
        }
        fclose($file);
    }
}
