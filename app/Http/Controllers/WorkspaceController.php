<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function index()
    {
        $workspaces = auth()->user()->workspaces;
        return view('workspaces.index', compact('workspaces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Workspace::create([
            'name' => $request->name,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('workspaces.index');
    }
}