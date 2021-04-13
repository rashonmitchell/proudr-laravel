<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = SettingsController::orderBy('id', 'DESC')->paginate(10);
        return view('settings.index')->withSettings($settings);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'email' => 'required',
            'role' => 'required',
            'photo' => 'required', // img for users? maybe
        ]);

        $settings = new SettingsController;

        $settings->title = $request->input('title');
        $settings->email = $request->input('email');
        $settings->role = $request->input('role');
        // img for users? maybe
        $settings->photo = $this->uploadFile('photo', public_path('uploads/'), $request)["filename"];
        $settings>save();

        return redirect()->route('settings.index');
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
        return view('settings.edit')->withSettings(SettingsController::find($id));
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
        $this->validate($request, [
            'title' => 'required',
            'email' => 'required',
            'role' => 'required',
            'photo' => 'required', // img for users? maybe
        ]);

        $settings = SettingsController::find($id);
        $settings->title = $request->input('title');
        $settings->email = $request->input('email');
        $settings->role = $request->input('role');
        // img for users? maybe
        
        if($request->file('photo') != null) {
            $settings->photo = $this->uploadFile('photo', public_path('uploads/'), $request)["filename"];
        }
        $settings->save();
        return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    //     // $settings = SettingsController::find($id);
    // }
}
