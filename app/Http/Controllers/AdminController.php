<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return view('admin.dashboard', [
            'productCount' => Product::query()->count(),
            'availableProductCount' => Product::query()->where('is_available', true)->count(),
            'userCount' => User::query()->count(),
            'latestProducts' => Product::query()->latest()->take(5)->get(),
        ]);
    }
}
