<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\{Employee, User};
use Illuminate\Support\Facades\{Auth, DB, Hash};

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['checkrole:administrator,admin'])->except(['update', 'profile']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users|max:255:users',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|not_in:0',
        ]);

        $checkEmail = Employee::where('email', $request->email)->first();

        if ($checkEmail) {
            DB::beginTransaction();

            try {
                $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                    'role'     => $request->role,
                ]);

                $checkEmail->update([
                    'user_id' => $user->id,
                ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
            }
        } else {
            return redirect('/dashboard/users/create')->with('message', 'Email yang anda masukkan tidak ada! Isikan data karyawan terlebih dahulu. ');
        }

        return redirect('/dashboard/users')->with('message', 'Data berhasil dibuat!');
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
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return abort(404);
        }
        return view('user.edit', compact('user'));
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
        $request->validate([
            'name'     => 'required|string|nullable',
            'email'    => 'required|string|email|max:255:users|nullable',
            'password' => 'nullable|string|min:8|confirmed',
            'role'     => 'required|not_in:0|nullable',
        ]);

        $user = User::find($id);

        if ($request->input('password')) {
            $updateUser = [
                'name'     => $request->name,
                'password' => Hash::make($request->password),
                'email'    => $request->email,
                'role'     => $request->role,
            ];
        } else {
            $updateUser = [
                'name'   => $request->name,
                'email'  => $request->email,
                'role'   => $request->role,
            ];
        }

        $user->update($updateUser);

        return redirect()->back()->with('success', 'Akun Anda berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return abort(404);
        }
        $user->delete();

        return back()->with('message', 'Data berhasil dihapus!');
    }

    public function profile()
    {
        $user = User::with('employee')->find(Auth::user()->id);

        return view('user.profile', compact('user'));
    }
}
