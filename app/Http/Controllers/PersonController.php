<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Organization;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = User::with('organizations')->get();
        $organization = Organization::with('users')->get();
        return view('welcome', compact('person', 'organization'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organization::all();
        return view('person.create', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orgArray = [];
        foreach($request->organization as $key => $org){
            $orgArray[] = $key;
        }

        User::create([
            'email'      => $request->email,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name
        ])->organizations()->attach($orgArray);
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = User::with('organizations')->findOrFail($id);
        $organizations = Organization::all();
        return view('person.edit', compact('person', 'organizations'));
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
        $orgArray = [];
        foreach($request->organization as $key => $org){
            $orgArray[] = $key;
        }        
        $user = User::findOrFail($id)
        ->update([
            'email'      => $request->email,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name
        ]);
        User::findOrFail($id)->organizations()->sync($orgArray);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/');

    }
}
