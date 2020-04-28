<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Workplace;

use App\Models\Equipment;

use App\Models\User;

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
        $workplaces = Workplace::all()->count();
        $equipments = Equipment::all()->count();
        $users = User::all()->count();
        return view('home', compact('workplaces', 'equipments', 'users'));
    }
}
