<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Project;
use HttpOz\Hook\Models\Hook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Auth::user()->projects()->withCount('metrics')->get();
        if ($request->wantsJson()) {
            return new JsonResponse($projects, 200);
        }
    }

    public function store(StoreProjectRequest $request)
    {
        $user = Auth::user();

        // Create hook
        $hook =  new Hook;
        $hook->name = "{$request->title} hook";
        $hook->is_active = true;
        $hook->save();

        // Create project with created hook added to it
        $project = $user->projects()->create(array_merge(['hook_id' => $hook->id], $request->validated()));

        return new JsonResponse($project, 200);
    }

    public function show(Project $project)
    {
        Auth::user()->can('view', $project);

        return view('projects.show', ['project' => $project]);
    }
}
