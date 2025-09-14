@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Manage Services</h2>
        <a href="{{ route('admin.services.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add New Service
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-md">
            <thead>
                <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Image</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Category</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach($services as $service)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">
                            @if($service->image)
                                <img src="{{ asset($service->image) }}" width="80" height="80" class="rounded-md object-cover">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="py-3 px-6">{{ $service->name }}</td>
                        <td class="py-3 px-6">{{ $service->category->name ?? 'N/A' }}</td>
                        <td class="py-3 px-6">{{ Str::limit($service->description, 50) }}</td>
                        <td class="py-3 px-6 flex items-center space-x-2">
                            <a href="{{ route('admin.services.edit', $service->id) }}" 
                               class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>

                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 font-medium ml-2">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
