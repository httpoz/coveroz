<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Auth::user()->projects;
        if ($request->wantsJson()) {
            return new JsonResponse($projects, 200);
            }
    }
}
