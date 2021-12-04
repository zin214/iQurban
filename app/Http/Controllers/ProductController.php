<?php

namespace App\Http\Controllers;

use App\Organizer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = auth()->user()->role->id == 2 ? auth()->user()->products : Product::all();

        $columns = [
          'No',
          'Name',
          'Description',
          'Event',
          'Type',
          'Date',
          'Status',
          'Location',
          'Contact Number',
          'Livestock',
          'Price (RM)',
          'Organizer Information',
          'File',
          'Picture',
          ''
        ];

        return auth()->user()->role->id != 3 ? view('products.display', compact('products', 'columns')) : view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Product::categoryLists();
        $types = Product::typeLists();

        return view('products.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
           'category' => 'required',
           'type' => 'required',
            'date' => 'required',
            'picture' => 'required',
            'location' => 'required',
            'price' => 'required',
            'organizer_name' => 'required',
            'organizer_type' => 'required',
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_no' => 'required',
            'phone' => 'required',
            'stock' => 'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'type' => $request->type,
            'date' => $request->date,
            'picture' => $request->file('picture')->store('gallery'),
            'location' => $request->location,
            'price' => $request->price,
            'phone' => $request->phone,
            'stock' => $request->stock,
            'file' => $request->has('file') ? $request->file('file')->store('resources') : null,
            'description' => $request->description ?? null,
            'user_id' => auth()->user()->id
        ]);

        Organizer::create([
            'name' => $request->organizer_name,
            'type' => $request->organizer_type,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'account_no' => $request->account_no,
            'product_id' => $product->id
        ]);

        return redirect()->route('products.index')->with('success', ['Successfully created event!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Product::categoryLists();
        $types = Product::typeLists();

        return view('products.edit', compact('categories', 'types', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'type' => 'required',
            'date' => 'required',
            'location' => 'required',
            'price' => 'required',
            'phone' => 'required',
            'stock' => 'required'
        ]);

        $request->validate([
            'organizer_name' => 'required',
            'organizer_type' => 'required',
        ]);

        $org = $request->validate([
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_no' => 'required'
        ]);

        $product->update($data);

        $product->description = $request->description ?? $product->description;

        $organizer = Organizer::find($product->organizer->id);

        $organizer->name = $request->organizer_name;
        $organizer->type = $request->organizer_type;

        $organizer->update($org);

        $organizer->save();

        if ($request->has('picture')){

            Storage::delete($product->picture);

            $product->picture = $request->file('picture')->store('gallery');
        }

        if ($request->has('file')){

            Storage::delete($product->file);

            $product->file = $request->file('file')->store('resources');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', ['Successfully updated event!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        Storage::delete($product->picture);

        $product->delete();

        return redirect()->back()->with('success', ['Successfully deleted event!']);
    }
}
