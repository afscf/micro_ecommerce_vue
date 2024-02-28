<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::visible()->get();

        return inertia(
            'Product/Index',
            [
                'products' => $products
            ]
        );
    }
}
