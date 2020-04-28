<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Workplace;

use App\Models\Equipment;

class WorkplaceController extends Controller
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
       $workplacesList = Workplace::all();
       $equipmentsList = Equipment::all();
       $freeEquipmentsList = Equipment::where('status', false)->get();

       return view('workplaces/list', compact('workplacesList', 'equipmentsList', 'freeEquipmentsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workplace = new Workplace();
        $workplace->mark = "Desk_9999";
        $workplace->description = 'Desk9999';
        $workplace->status = true;
        $workplace->save();
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
      $workplace = Workplace::find($id);
      return view('workplaces/show', compact('workplace'));
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

    /**
     * Attach equipment to workplace
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function attachEquipment(Request $request)
    {
      if (isset($request->equipment_id)) {
        $equipment = Equipment::where('id', $request->equipment_id)->first();
        $equipment->workplace_id = $request->workplace_id;
        $equipment->status = true;
        $equipment->save();
      } else {

      }
    }


    /**
     * Remove equipment from workplace
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function removeEquipment(Request $request)
    {
      if (isset($request->equipment_id)) {
        $equipment = Equipment::where('id', $request->equipment_id)->first();
        $equipment->workplace_id = null;
        $equipment->status = false;
        $equipment->save();
      } else {

      }
    }
}
