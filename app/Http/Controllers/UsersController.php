<?php


namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function mijngegevens(){

        $id = Auth::User()->id;

        $user = User::where([['id', $id], ['platform_id', 1]])->first();

        $platform = Platform::find(1);
        $platform->fields = $platform->getFields();
        $user->fields = $user->getUserFields()->pluck('value', 'field_id');


        return view('pages.mijngegevens', ['user' => $user, 'platform' => $platform]);

    }
}
