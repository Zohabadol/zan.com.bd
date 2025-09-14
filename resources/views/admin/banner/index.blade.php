@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold">Manage Banner</h2>
        <a href="{{ route('admin.banner.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Add New Banner
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Image</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Short Content</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $banner)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <img src="{{ asset($banner->image) }}" alt="Banner Image" class="w-24 h-auto rounded">
                        </td>
                        <td class="px-6 py-4">{{ $banner->name }}</td>
                        <td class="px-6 py-4">{{ $banner->short_content }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('admin.banner.edit', $banner->id) }}"
                               class="inline-block bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Edit
                            </a>
                            <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST"
                                  onsubmit="return confirm('Delete this banner?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($banners->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No banners found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
