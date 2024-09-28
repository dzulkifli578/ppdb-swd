<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard page for admin.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard(Request $request)
    {
        $header = [
            'name' => 'Dashboard',
            'breadcrumbs' => 'Dashboard',
            'route' => route('admin-dashboard')
        ];

        return view("admin.dashboard.dashboard", compact("header"));
    }
}