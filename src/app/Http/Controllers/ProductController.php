<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        $products = Product::Paginate(6);
        return view('index', compact('products'));
    }


    public function show($id) {
        $product = Product::findOrFail($id);
        $seasons = Season::all();
        return view('show', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request) {
        $product = Product::findOrFail($request->id);

        $fileName = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/img',"$fileName");

        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $path;
        $product->description = $request->description;
        $product->save();

        $season_id = $request->season;
        $product->season()->attach($season_id);

        $products = Product::all();
        $products = Product::Paginate(6);

        return redirect('/');
    }

    public function delete(Request $request) {
        Product::find($request->id)->delete();
        return redirect('/');
    }

    public function register() {
        return view('register');
    }

    public function store(ProductRequest $request) {

        $fileName = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/img',"$fileName");

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $path;
        $product->description = $request->description;
        $product->save();

        $season_id = $request->season;
        $product->season()->attach($season_id);

        $products = Product::all();
        // $products = Product::Paginate(6);

        return redirect('/');
    }


    public function search(Request $request) {
        $query = Product::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $products = $query->paginate(6);

        return view('index', compact('products'));
    }

}
