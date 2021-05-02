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

class InvoerveldController extends Controller
{
    public function create(Request $request){
            $data = $request->input();
            try{
                $invoerveld = new Field();
                $invoerveld->name = $data['nieuwinvoerveld'];
                $invoerveld->platform_id = '1';
                $invoerveld->save();
                return redirect('admin/invoervelden')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('admin/invoervelden')->with('failed',"operation failed");
            }

    }

}
