<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ImageHelpers;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        $data = $request->only('name');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, 'uploads/clients', time() . uniqid() . '.' . $file->getClientOriginalExtension());
            $data['image'] = $path;
        }

        Client::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }

    public function edit($id)
    {
        $clients = Client::findOrFail($id);
        return view('admin.clients.edit', compact('clients'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);

        $clients = Client::findOrFail($id);
        $clients->name = $request->name;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($clients->image && file_exists(public_path($clients->image))) {
                unlink(public_path($clients->image));
            }

            $file = $request->file('image');
            $image = ImageHelpers::resizeImage($file);
            $path = ImageHelpers::saveImage($image, 'uploads/clients', time() . uniqid() . '.' . $file->getClientOriginalExtension());
            $clients->image = $path;
        }

        $clients->save();

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $clients = Client::findOrFail($id);

        // delete image if exists
        if ($clients->image && file_exists(public_path($clients->image))) {
            unlink(public_path($clients->image));
        }

        $clients->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully.');
    }
}
