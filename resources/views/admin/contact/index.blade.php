@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Contact Messages</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Subject</th>
                <th class="py-2 px-4 border-b">Message</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $message->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $message->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $message->subject }}</td>
                    <td class="py-2 px-4 border-b">{{ Str::limit($message->message, 50) }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="mailto:{{ $message->email }}" class="text-blue-500 hover:text-blue-700">Reply</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
