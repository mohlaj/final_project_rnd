<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
        $total_staff = Staff::count();
        
        $project_leader = User::where('role', '=', 'PL')->count(); //count project leader
        
        $total_projects = Project::count();
        
        return view('dashboard', compact('total_staff', 'project_leader', 'total_projects'));
    }
}
