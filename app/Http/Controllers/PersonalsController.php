<?php

namespace App\Http\Controllers;

use App\Personal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersonalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals = Personal::all();
        Auth::user()->countPage(1);
        return view('users.personals.index')->with('personals', $personals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->countPage(1);
        return view('users.personals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->save();
        $user = DB::table('users')->latest('id')->first();

        $personal = new Personal();
        $personal->id = $user->id;
        $personal->name = $request->get('name');
        $personal->date_admission = $request->get('date_admission');
        $personal->position = $request->get('position');
        $personal->ci = $request->get('ci');
        $personal->save();
        return redirect()->route('personals.index');
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
        Auth::user()->countPage(1);
        $personal = Personal::findOrFail($id);
        return view('users.personals.edit')->with('personal',$personal);
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

        $personal = Personal::findOrFail($id);
        $personal->name = $request->get('name');
        $personal->position = $request->get('position');
        $personal->date_admission = $request->get('date_admission');
        $personal->ci = $request->get('ci');
        $personal->save();
        return redirect()->route('personals.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal = Personal::find($id);
        $personal->delete();

        $user = User::find($id);
        $user->delete();
        return redirect()->route('personals.index');
    }
}
