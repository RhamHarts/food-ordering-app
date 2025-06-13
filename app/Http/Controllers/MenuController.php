<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('menu', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')->store('menu-images', 'public');

        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu item added successfully');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($menu->image);
            // Store new image
            $data['image'] = $request->file('image')->store('menu-images', 'public');
        }

        $menu->update($data);

        return redirect()->route('menu.index')->with('success', 'Menu item updated successfully');
    }

    public function destroy(Menu $menu)
    {
        // Delete image from storage
        Storage::disk('public')->delete($menu->image);

        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu item deleted successfully');
    }

    public function order(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'items' => 'required|array',
            'items.*' => 'required|integer|min:0',
        ]);

        // Check if at least one item is ordered
        $hasOrder = false;
        foreach ($request->items as $quantity) {
            if ($quantity > 0) {
                $hasOrder = true;
                break;
            }
        }

        if (!$hasOrder) {
            return back()->with('error', 'Pilih minimal satu menu untuk dipesan.');
        }

        // Here you would typically save the order to the database
        // For now, we'll just redirect back with a success message
        return redirect('/')->with('success', 'Pesanan berhasil dikirim!');
    }
}
