<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Your Workspaces</h2>

        <form method="POST" action="{{ route('workspaces.store') }}" class="mb-4">
            @csrf
            <input type="text" name="name" placeholder="Workspace Name" 
                class="border p-2 rounded w-64" required>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Create
            </button>
        </form>

        <ul>
            @foreach($workspaces as $workspace)
                <li class="p-2 border-b">{{ $workspace->name }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>