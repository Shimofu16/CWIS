<?php

namespace App\Http\Controllers\user;

use App\Permit;
use Carbon\Carbon;
use App\Model\Fencing;
use App\Model\Official;
use App\Model\ActivityLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FencingController extends Controller
{
    public function index()
    {
        return view('backend.user.permits.fencing.index', [
            'fencings' => Permit::where('type','Fencing permit')
                                    ->where('barangay_id',Auth::user()->official->barangay->id)
                                    ->get(),
        ]);
    }

    public function create()
    {
        return view('backend.user.permits.fencing.create');
    }

    public function store(Request $request)
    {
        $year = Carbon::now()->year;
        $fencing_cnt = Permit::where('type', 'Fencing permit')
                                ->where('barangay_id', Auth::user()->official->barangay->id)
                                ->count();

        $fencing_cnt =  $fencing_cnt + 1;
        $fencing_number = $year.'-'.Auth::user()->official->barangay->name.'-'. $fencing_cnt;

        $details = [
            'number' => $fencing_number,
            'name' => $request->name,
            'address' => $request->address,
            'location' => $request->location,
            'purpose' => $request->purpose,
        ];

        $fencing = Permit::create([
            'type' => 'Fencing permit',
            'barangay_id' => Auth::user()->official->barangay->id,
            'details' => $details,
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => 'create',
            'scope' => 'Permits/Clearances',
            'description' => 'Registered fencing',
        ])->subject()->associate($fencing)->save();

        return redirect()->route('fencing_permit.index')->withStatus('Fencing Added Succesfully!');
    }

    public function show($id)
    {
        return view('backend.user.permits.fencing.show', [
            'fencing' => Permit::findOrFail($id),
        ]);
    }

    public function clearance($id)
    {
        $fencing = Permit::with('owner')->findOrFail($id);
        
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'description' => 'Issue Brgy Fencing Permit',
            'scope' => 'Permits/Clearances',
            'action' => 'issuance',
        ])->subject()->associate($fencing)->save();

        return view('backend.user.permits.fencing.clearance', [
            'fencing' => $fencing,
            'b_officials' => Official::query()->where('barangay_id', Auth::user()->official->barangay->id)->get(),
        ]);
    }
}
