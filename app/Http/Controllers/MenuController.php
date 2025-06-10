<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menu', compact('menus'));
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
