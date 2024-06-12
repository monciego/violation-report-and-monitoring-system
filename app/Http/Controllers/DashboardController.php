<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        /** @var \App\Models\User */
        $user = Auth::user();

        if ($user->hasRole('superadministrator')) {
            return view('pages.superadministrator.dashboard.index');
        } elseif ($user->hasRole('college_dean')) {
            return view('pages.college_dean.dashboard.index');
        } elseif ($user->hasRole('encoder')) {
            return view('pages.encoder.dashboard.index');
        } elseif ($user->hasRole('guard')) {
            return view('pages.guard.dashboard.index');
        }
    }
}
