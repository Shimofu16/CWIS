<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\Barangay;
use App\Model\Official;
use App\User;
use App\model\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($barangay_id = null)
    {
        $users = User::where('role', 'User')
            ->whereHas('official', function ($query) use ($barangay_id) {
                if ($barangay_id) {
                    $query->where('barangay_id', $barangay_id);
                }
            })
            ->with(['official' => function ($query) {
                $query->orderBy('position', 'ASC');
            }])
            ->get();

        $officials = Official::doesntHave('user')->get();

        $barangays = Barangay::all();

        return view('backend.admin.users.index', compact('users', 'officials','barangays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'official_id' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
            ]);
            $official = Official::findOrFail($request->official_id);
            User::create([
                'name' => $official->full_name,
                'official_id' => $request->official_id,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return back()->with('success', 'User Added Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', 'Email already exist');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        try {
            // dd($request->all());
            // $request->validate([
            //     'email' => ['required', 'email', 'unique:users'],
            //     'current_password' => ['required', 'string', 'min:8'],
            //     'new_password' => ['required', 'string', 'min:8'],
            //     'confirm_password' => ['required', 'string', 'min:8', 'same:new_password'],
            // ]);
            $user = User::findOrFail($id);
            if (!Hash::check($request->current_password, $user->password)) {
                dd('Current password is incorrect');
                return back()->with('error', 'Current password is incorrect.');
            }
            $user->update([
                'email' => $request->email,
                'password' => Hash::make($request->new_password),
            ]);
            return back()->with('User updated successfully.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', $th->getMessage());
        }
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

    public function activities($id, Request $request)
    {
        $activities = ActivityLog::query()
                                    ->with('user')
                                    ->where('user_id',$id)
                                    ->filter($request->only(['type']))
                                    ->orderBy('created_at','desc')
                                    ->paginate(10)
                                    ->withQueryString();

        if ($request->ajax()) {
            return view('backend.admin.activity_log.partials.activities', [
                'activities' => $activities,
            ])->render();
        }

        return view('backend.admin.users.activities', [
            'activities' => $activities,
            'filters' => ActivityLog::select('scope')->distinct()->get()->pluck('scope'),
            'params' => $request->only(['type']),
            'userId' => $id
        ]);
    }
}
