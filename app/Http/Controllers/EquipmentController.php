<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipment;

use App\Models\Workplace;

class EquipmentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $equipmentsList = Equipment::all();
      return view('equipments/list', compact('equipmentsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment = new Equipment();
        $equipment->type = 'Computer';
        $equipment->model = 'Dell';
        $equipment->mark = 'Computer_876';
        $equipment->year_purchase = now();
        $equipment->worth = 1200;
        $equipment->description = 'Computer876';
        $equipment->status = true;
        $equipment->save();

        $equipment1 = new Equipment();
        $equipment1->type = 'Printer';
        $equipment1->model = 'HP';
        $equipment1->mark = 'Printer_10';
        $equipment1->year_purchase = now();
        $equipment1->worth = 500;
        $equipment1->description = 'Printer10';
        $equipment1->status = true;
        $equipment1->save();


        $workplace = Workplace::where('mark', 'Desk_9999')->first();
        // dd($workplace);
        $workplace->equipments()->attach($equipment);
        $workplace->equipments()->attach($equipment1);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $equipment = Equipment::find($id);
      return view('equipments/show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




}
