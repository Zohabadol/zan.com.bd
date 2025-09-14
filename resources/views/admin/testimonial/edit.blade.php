@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit Testimonial</h2>

    @if($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Name Input -->
        <div>
            <label class="block mb-2 font-semibold">Name:</label>
            <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="w-full border p-2 rounded" required>
            @error('name') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Designation Input -->
        <div>
            <label class="block mb-2 font-semibold">Designation:</label>
            <input type="text" name="designation" value="{{ old('designation', $testimonial->designation) }}" class="w-full border p-2 rounded" required>
            @error('designation') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Comment Input -->
        <div>
            <label class="block mb-2 font-semibold">Comment:</label>
            <textarea name="comment" rows="4" class="w-full border p-2 rounded" required>{{ old('comment', $testimonial->comment) }}</textarea>
            @error('comment') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Current Profile Image Display -->
        <div>
            <label class="block mb-2 font-semibold">Current Profile Image:</label>
            @if($testimonial->profile)
                <img src="{{ asset($testimonial->profile) }}" class="rounded w-[100px] h-[120px] rounded-full mb-4">
            @else
                <p>No Image</p>
            @endif
        </div>

        <!-- Profile Image Upload -->
        <div>
            <label class="block mb-2 font-semibold">Change Profile Image (optional):</label>
            <input type="file" name="profile" class="w-full">
            @error('profile') <div class="text-red-500 mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Update Testimonial</button>
        </div>
    </form>
</div>
@endsection
