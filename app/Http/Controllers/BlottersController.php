<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Resident;
use App\Model\Blotter;
use Carbon\Carbon;
class BlottersController extends Controller
{
    public function index(){
        // $blotters = Blotter::with('residents')->where('status', '!=', 'Settled')->get();
        $blotters = Blotter::with('residents')->get();
        return view('blotters.index', compact('blotters'));
    }

    public function create(){

        $residence = Resident::all();
        return view('blotters.create', compact('residence'));
    }

    public function store(Request $request){
        
        $blotterReq = [
            'complainant_name' => $request->complainant_name,
            'blotter_info' => $request->blotter_info,
            'date_of_incident' => $request->date_of_incident,
            'case_type' => $request->case_type,
            'status' =>  $request->status,
            'resident_id' =>$request->resident_id,
        ];

        $year = Carbon::now()->year;  
        $blot_cnt = Blotter::all()->count();

        $case_cnt =  $blot_cnt + 1;    
        $case_number = $year . '-' . $case_cnt;


        Blotter::create([

            'case_number' => $case_number,
            'complainant_name' => $blotterReq['complainant_name'],
            'Blotters_info' => $blotterReq['blotter_info'],
            'case_type' => $blotterReq['case_type'],
            'status' => $blotterReq['status'],
            'date_of_incident' =>$blotterReq['date_of_incident'],
        ])->residents()->attach($blotterReq['resident_id']);

        return redirect()->route('blotters.index')->with('swal', 'Blotter Added !');
    }

    public function show($id){
        $blotter = Blotter::with('residents')->findOrfail($id);

        return view('blotters.show', compact('blotter'));
    }

    public function settelement($id){
        $blotter = Blotter::with('residents')->findOrfail($id);
        return view('blotters.settlementAgreement', compact('blotter'));
    }

    public function settelement_save(Request $request, $id){
        $blotter = Blotter::findOrfail($id);
        $blotter->agreement = $request->agreement;
        $blotter->status = $request->status;
        $blotter->save();

        return redirect()->route('blotters.index');
    }

    public function update(Request $request, $id){

        
        $blotter = Blotter::findOrfail($id);
        if($request->patawag === "bcp1"){
            $blotter->bcp1 = $request->patawag;
        }      
        elseif($request->patawag === "bcp2"){
            $blotter->bcp2 = $request->patawag;
        }
        elseif($request->patawag === "bcp3"){
            $blotter->bcp3 = $request->patawag;
        }
        elseif($request->patawag === "lbp1"){
            $blotter->lbp1 = $request->patawag;
        }  
        elseif($request->patawag === "lbp2"){
            $blotter->lbp2 = $request->patawag;
        }  
        elseif($request->patawag === "lbp3"){
            $blotter->lbp3 = $request->patawag;
        }  


        if($request->patawag === "Settled"){
            return redirect()->route('blotters.settelement',1);
        }  

        if($request->patawag === "Cancelled"){
            $blotter->status = $request->patawag;
        } 

        $blotter->save();

        return redirect()->back();
    }

    public function Manage(Request $request, $id){
        $blotter = Blotter::findOrfail($id);

        if($request->bcp1_date){
            $blotter->bcp1_date = $request->bcp1_date;
            $blotter->bcp1_note = $request->bcp1_note;
        } 
        
        if($request->bcp2_date){
            $blotter->bcp2_date = $request->bcp2_date;
            $blotter->bcp2_note = $request->bcp2_note;
        }

        if($request->bcp3_date){
            $blotter->bcp3_date = $request->bcp3_date;
            $blotter->bcp3_note = $request->bcp3_note;
        }

        if($request->lbp1_date){
            $blotter->lbp1_date = $request->lbp1_date;
            $blotter->lbp1_note = $request->lbp1_note;
        }

        if($request->lbp2_date){
            $blotter->lbp2_date = $request->lbp2_date;
            $blotter->lbp2_note = $request->lbp2_note;
        }

        if($request->lbp3_date){
            $blotter->lbp3_date = $request->lbp3_date;
            $blotter->lbp3_note = $request->lbp3_note;
        }

        $blotter->save();

        return redirect()->back();
    }

    public function patawag($date, $id){
        $blotter = Blotter::with('residents')->findOrfail($id);

        return view('blotters.patawag',compact('date','blotter'));
    }
}