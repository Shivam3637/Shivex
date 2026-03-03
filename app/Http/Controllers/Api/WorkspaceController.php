<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    // GET /api/workspaces
    public function index(Request $request)
    {
        return response()->json(
            $request->user()->workspaces
        );
    }

    // POST /api/workspaces
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $workspace = Workspace::create([
            'name' => $request->name,
            'user_id' => $request->user()->id
        ]);

        return response()->json([
            'message' => 'Workspace created successfully',
            'workspace' => $workspace
        ], 201);
    }
}