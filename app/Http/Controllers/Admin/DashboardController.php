<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use App\Models\Project;

class DashboardController extends Controller
{
    function index()
    {
        $total_projects = Project::all()->count();
        $total_users = User::all()->count();
        $total_types = Type::all()->count();
        return view('admin.dashboard', compact('total_projects', 'total_users', 'total_types'));
    }
}
