<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Workspace;

class ProjectController extends Controller
{
    // GET projects for a workspace
    public function index(Request $request, $workspaceId)
    {
        $workspace = $request->user()
            ->workspaces()
            ->where('id', $workspaceId)
            ->firstOrFail();

        return response()->json($workspace->projects);
    }

    // Create project inside workspace
    public function store(Request $request, $workspaceId)
    {
        $workspace = $request->user()
            ->workspaces()
            ->where('id', $workspaceId)
            ->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $project = $workspace->projects()->create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Project created successfully',
            'project' => $project
        ], 201);
    }
}