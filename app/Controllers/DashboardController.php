<?php

namespace App\Controllers;

use App\Models\PartProcessModel;

class DashboardController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('dashboard');
    }
}
