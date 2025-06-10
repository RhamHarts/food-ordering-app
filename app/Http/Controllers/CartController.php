<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart', compact('total'));
    }

    public function add($id)
    {
        $menu = Menu::findOrFail($id);
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $menu->name,
                'price' => $menu->price,
                'image' => $menu->image,
                'quantity' => 1
            ];
        }

        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Menu berhasil ditambahkan ke keranjang');
    }

    public function update($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            if (request('action') === 'increase') {
                $cart[$id]['quantity']++;
            } elseif (request('action') === 'decrease') {
                if ($cart[$id]['quantity'] > 1) {
                    $cart[$id]['quantity']--;
                } else {
                    unset($cart[$id]);
                }
            }
        }

        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function remove($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->back();
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back();
    }
}
