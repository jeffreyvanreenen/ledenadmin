<?php


namespace App\Http\Controllers;

use App\Models\RoosterData;
use App\Models\RoosterUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BewakingsController extends Controller
{


    public function index() {
        return view('pages.rooster');
    }

    public function saveRooster(Request $request) {

        $user = Auth::user();


        foreach($request['date'] as $key => $value) {
            $roosterUser = RoosterUser::firstOrCreate([
                    'user_id' => $user->id,
                    'date_id' => $key
            ]);
            $roosterUser->available = (isset($value) && $value == 'beschikbaar') ? 1 : 0;
            $roosterUser->save();
        }
        return view('pages.rooster', ['succes' => 'Je wijziging is opgeslagen!']);

    }

    public function showRooster() {


        $roosterDays = RoosterData::where('platform_id', 1);




        return view('admin.rooster', ['roosterDays' => $roosterDays->get()]);

    }
}
