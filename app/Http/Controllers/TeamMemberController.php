<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Project;
use App\Models\Staff;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $teammember = TeamMember::where('project_leader_id', 'LIKE', "%$keyword%")
                ->orWhere('staff_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $teammember = TeamMember::latest()->paginate($perPage);
        }

        return view('team-member.index', compact('teammember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $staffs = Staff::all();
        $projects = Project::all();
        return view('team-member.create',compact('staffs','projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        //check this user already on this project or not
        $staff_id = $request->staff_id;
        $project_id = $request->project_id;
        $check = TeamMember::where('staff_id',$staff_id)->where('project_id',$project_id)->first();
        if($check){
            return redirect('team-member')->with('flash_message', 'This user already on this project!');
        }

        $requestData = $request->all();
        $requestData['project_leader_id'] = auth()->user()->id;

        TeamMember::create($requestData);

        return redirect('team-member')->with('flash_message', 'Team Member added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $teammember = TeamMember::findOrFail($id);
        $staffs = Staff::all();
        $projects = Project::all();
        return view('team-member.edit', compact('teammember','staffs','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        

        $requestData = $request->all();

        $teammember = TeamMember::findOrFail($id);
        $teammember->update($requestData);

        return redirect('team-member')->with('flash_message', 'TeamMember updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        TeamMember::destroy($id);

        return redirect('team-member')->with('flash_message', 'TeamMember deleted!');
    }
}
