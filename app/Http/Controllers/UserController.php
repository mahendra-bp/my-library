<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;





use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        // OTORISASI GATE
        $this->middleware(function ($request, $next) {
            if (Gate::allows('manage-users')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        $users = \App\User::paginate(10);
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->level == 'user') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = \Validator::make($request->all(), [
            "name" => "required|min:2|max:100",
            "level" => "required|",
            "username" => "required",
            "gambar" => "required",
            "level" => "required",
            "password" => "required"

        ])->validate();

        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->username = $request->get('username');
        $new_user->email = $request->get('email');
        $new_user->level = $request->get('level');
        $new_user->password = \Hash::make($request->get('password'));
        if ($request->file('gambar')) {
            $file = $request->file('gambar')->store('gambar', 'public');
            $new_user->gambar = $file;
        }
        $new_user->save();
        return redirect()->route('users.create')->with('status', 'User Baru Telah Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->level == 'user' && Auth::user()->id != $id) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $user = \App\User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->level == 'user' && Auth::user()->id != $id) {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        $user = \App\User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
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

        $validation = \Validator::make($request->all(), [
            "name" => "required|min:2|max:100",
            "level" => "required|",
            "username" => "required|unique",
            "gambar" => "required",

        ])->validate();


        $user = \App\User::findOrFail($id);
        $user->name = $request->get('name');
        $user->level = $request->get('level');
        $user->username = $request->get('username');

        if ($user->gambar && file_exists(storage_path('app/public/' . $user->gambar))) {
            \Storage::delete('public/' . $user->gambar);
            $file = $request->file('gambar')->store('gambar', 'public');
            $user->gambar = $file;
        }
        if ($request->get('password')) {
            $user->level = $request->get('level');
        }

        if ($request->get('password')) {
            $user->password = bcrypt(($request->get('password')));
        }
        $user->save();
        return redirect()->route('users.edit', ['id' => $id])->with(
            'status',
            'User succesfully updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User
successfully delete');
    }
}
