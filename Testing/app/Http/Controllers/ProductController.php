<?php

namespace App\Http\Controllers;

use App\DataTables\productDataTable;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    Public Function index(productDataTable $productDataTable)
    {
    //     return Product::all();
    //     $product = Product::find(1);

    //     $product= Product::destroy(1, 2, 3);
    //         return Product::all();
    // }

       $product = Product::all();
       return $productDataTable->render('product',);
    }
}
