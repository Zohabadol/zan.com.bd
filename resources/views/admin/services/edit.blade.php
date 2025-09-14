@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6">Edit Service</h2>

    @if($errors->any())
        <div class="text-red-600 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2 font-semibold">Service Name</label>
            <input type="text" name="name" value="{{ old('name', $service->name) }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">Category</label>
            <select name="category_id" class="w-full border p-2 rounded" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $service->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-2 font-semibold">Description</label>
            <textarea name="description" rows="4" class="w-full border p-2 rounded">{{ old('description', $service->description) }}</textarea>
        </div>

        <div>
            <label class="block mb-2 font-semibold">Image</label>
            @if($service->image)
                <div class="mb-2">
                    <img src="{{ asset($service->image) }}" width="120" class="rounded">
                </div>
            @endif
            <input type="file" name="image" class="w-full">
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Update Service</button>
        </div>
    </form>
    </div>
@endsection
