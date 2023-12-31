<?php

namespace App\Http\Controllers\user;

use App\Permit;
use Carbon\Carbon;
use App\Model\Business;
use App\Model\Resident;
use App\Model\Official;
use App\Model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessClearanceController extends Controller
{
    public function index()
    {
        $businesses = Permit::where('type','Business clearance')
                                ->with('owner')
                                ->where('barangay_id', Auth::user()->official->barangay->id)
                                ->orderBy('id','desc')
                                ->get();
        $expired_business = 0;

        foreach ($businesses as $business){
            $registration_date = Carbon::parse($business->details['registration_date'])->diff(Carbon::now())->format('%y');
            
            if($registration_date > 1){
                $expired_business += 1;
            }
        }

        return view('backend.user.permits.business.index', [
            'businesses' => $businesses,
            'expired_business' => $expired_business,
        ]);
    }

    public function create_business()
    {
        return view('backend.user.permits.business.create', [
            'residents' => Resident::where('barangay_id',Auth::user()->official->barangay->id)->get(),
        ]);
    }

    public function store_business(Request $request)
    {
        $year = Carbon::now()->year;
        $business_cnt = Permit::where('type','Business clearance')
                                ->where('barangay_id',Auth::user()->official->barangay->id)
                                ->count();

        $business_cnt =  $business_cnt + 1;
        $business_number = $year . '-'.Auth::user()->official->barangay->name.'-' . $business_cnt;

        $details = [
            'number' => $business_number,
            'non-resident_owner' => $request->business_owner_not_resident,
            'name' => $request->business_name,
            'address' => $request->business_address,
            'type' => $request->business_type,
            'registration_date' => $request->reg_date,
        ];

        $business = Permit::create([
            'type' => 'Business clearance',
            'resident_id' => $request->resident,
            'barangay_id' => Auth::user()->official->barangay->id,
            'details' => $details,
        ]);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'scope' => 'Permits/Clearances',
            'action' => 'create',
            'description' => 'Registered business',
        ])->subject()->associate($business)->save();

        return redirect()->route('business_clearance.index')->withStatus('Business Added Succesfully!');
    }

    public function show($id)
    {
        return view('backend.user.permits.business.show', [
            'business' => Permit::with('owner')->findOrFail($id),
        ]);
    }

    public function create_clearance($id)
    {
        return view('brgy_permit.business_clearance.clearance');
    }

    public function show_clearance($id, Request $request)
    {
        $business = Permit::with('owner')->findOrFail($id);

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'description' => 'Issue Brgy Business Clearance',
            'scope' => 'Permits/Clearances',
            'action' => 'issuance',
        ])->subject()->associate($business)->save();

        return view('backend.user.permits.business.clearance', [
            'business' => $business,
            'b_officials' => Official::query()->where('barangay_id', Auth::user()->official->barangay->id)->get(),
            'amount' => $request->amount,
            'or_number' => $request->or_number,
        ]);
    }
}
