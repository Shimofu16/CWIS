<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Residence;
use Carbon\Carbon;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $residence_list = Residence::all();
        return view('residence.index', compact('residence_list'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $residence = new Residence;
            
            $residence->last_name = $request->last_name;
            $residence->first_name = $request->first_name;
            $residence->middle_name = $request->middle_name;
            $residence->gender = $request->gender;
            $residence->birthday = $request->birthday;
            $residence->civil_status = $request->civil_status;
        
            $residence->house_number = $request->house_number;
            $residence->purok = $request->purok;
            $residence->street = $request->street;
            $residence->occupation = $request->occupation;
            $residence->type_of_house = $request->type_of_house;
    
            $residence->save();       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = Residence::findOrfail($id);
    
        return view('residence.show', compact('resident'));
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
        $resident = Residence::findOrfail($id);
        $resident ->delete();
    }
}
