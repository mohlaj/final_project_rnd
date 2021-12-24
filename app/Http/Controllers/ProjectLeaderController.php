<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProjectLeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all project_leaders
        $project_leaders = User::where('role', '=', 'PL')->paginate(10);
        return view('project-leader.index', compact('project_leaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show the form for creating a new project_leader
        return view('project-leader.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'PL',
            'password' => bcrypt($request->password)
        ]);

        
        return redirect('project-leader')->with('flash_message', 'Project Leader added!');


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
        //edit page
        $project_leader = User::findOrFail($id);
        return view('project-leader.edit',compact('project_leader'));
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
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'PL',
            'password' => bcrypt($request->password)
        ]);

        
        return redirect('project-leader')->with('flash_message', 'Project Leader updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        User::destroy($id);
        return redirect('project-leader')->with('flash_message', 'Project Leader deleted!');
    }
}
