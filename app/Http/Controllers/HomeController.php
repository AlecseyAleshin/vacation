<?php

namespace App\Http\Controllers;
use App\Http\Controllers\VacationController;
use App\Models\Vacation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vacation = VacationController::index();
        $id = Vacation::firstWhere('user_id', Auth::user()->id);
        if( Auth::user()->roles[0]->id == 2){
            return view('home', [
                'vacation' => $vacation,
                'id' => $id
            ]);
        }else{
            return view('home_admin', [
                'vacation' => $vacation,
                'id' => $id
            ]);
        }
    }
}
