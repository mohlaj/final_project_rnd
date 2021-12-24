<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
            $project = Project::where('start_date', 'LIKE', "%$keyword%")
                ->orWhere('end_date', 'LIKE', "%$keyword%")
                ->orWhere('duration', 'LIKE', "%$keyword%")
                ->orWhere('cost', 'LIKE', "%$keyword%")
                ->orWhere('requirments', 'LIKE', "%$keyword%")
                ->orWhere('client', 'LIKE', "%$keyword%")
                ->orWhere('project_status', 'LIKE', "%$keyword%")
                ->orWhere('project_stage', 'LIKE', "%$keyword%")
                ->orWhere('project_category', 'LIKE', "%$keyword%")
                ->orWhere('project_leaders_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $project = Project::latest()->paginate($perPage);
        }

        return view('project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (auth()->user()->role == 'PL') {
            return redirect('/');
        }
        //user without PM role
        $project_leaders = User::where('role', '=', 'PL')->get();
        return view('project.create',compact('project_leaders'));
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
        if (auth()->user()->role == 'PL') {
            return redirect('/');
        }
        $requestData = $request->all();

        Project::create($requestData);

        return redirect('project')->with('flash_message', 'Project added!');
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
        $project = Project::findOrFail($id);

        return view('project.show', compact('project'));
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
        $project = Project::findOrFail($id);
        $project_leaders = User::where('role', '=', 'PL')->get();
        return view('project.edit', compact('project','project_leaders'));
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

        $project = Project::findOrFail($id);
        $project->update([
            'name' => $requestData['name'],
            'start_date' => $requestData['start_date'],
            'end_date' => $requestData['end_date'],
            'duration' => $requestData['duration'],
            'cost' => $requestData['cost'],
            'requirments' => $requestData['requirments'],
            'client' => $requestData['client'],
            'project_status' => $requestData['project_status'],
            'project_stage' => $requestData['project_stage'],
            'project_category' => $requestData['project_category'],
        ]);

        return redirect('project')->with('flash_message', 'Project updated!');
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
        Project::destroy($id);

        return redirect('project')->with('flash_message', 'Project deleted!');
    }
}
