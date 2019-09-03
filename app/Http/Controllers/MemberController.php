<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use DB;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = \App\Member::paginate(10);
        return view('members.index', ['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::WhereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('members')
                ->whereRaw('members.user_id = users.id');
        })->get();
        return view('members.create', ['users' => $users]);
        //return view('members.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect()->route('members.create')->with('status', 'Anggota Baru Telah Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = \App\Member::findOrFail($id);
        $users = \App\User::get();
        return view('members.edit', ['member' => $member], ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Member::findOrFail($id)->update($request->all());

        return redirect()->route('members.edit', ['id' => $id])->with('status', 'Anggota Telah Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('status', 'Member successfully delete');
    }
}
