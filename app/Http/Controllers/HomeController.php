<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Display the login view.
     *
     * @return Response
     */
    public function __invoke()
    {
            return Inertia::render('Welcome', [
                                'canLogin' => Route::has('login'),
                                'canRegister' => Route::has('register'),
                                'laravelVersion' => Application::VERSION,
                                'phpVersion' => PHP_VERSION,
            ]);
    }
}
