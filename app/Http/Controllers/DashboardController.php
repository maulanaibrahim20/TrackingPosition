<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.pages.dashboard.index');
    }

    public function management()
    {
        return view('management.pages.dashboard.index');
    }
    public function user()
    {
        return view('user.pages.dashboard.index');
    }
}
