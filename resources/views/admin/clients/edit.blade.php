@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit Clients</h2>

    @if($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.clients.update', $clients->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 ">
        @csrf
        @method('PUT')

        <!-- Banner Name Input -->
        <div>
            <label class="block mb-2 font-semibold">Name:</label>
            <input type="text" name="name" value="{{ old('name', $clients->name) }}" class="w-full border p-2 rounded" required>
            @error('name') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Short Content Input -->
    

        <!-- Current Image Display -->
        <div>
            <label class="block mb-2 font-semibold">Current Image:</label>
            @if($clients->image)
                <img src="{{ asset($clients->image) }}"  class="rounded w-[100px] h-[120px] rounded-full mb-4">
            @else
                <p>No Image</p>
            @endif
        </div>

        <!-- Image Upload -->
        <div>
            <label class="block mb-2 font-semibold">Change Image (optional):</label>
            <input type="file" name="image" class="w-full">
            @error('image') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Update Clieents</button>
        </div>
    </form>
</div>
@endsection
