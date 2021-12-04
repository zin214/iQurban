<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = null;

        $columns = [
            'No',
            'Date',
            'Event Name',
            'Participant Name',
            'Note',
            'Total Price (RM)',
            'Payment',
            'Certificate',
            ''
        ];

        if (auth()->user()->role->id == 1){
            $purchases = Purchase::all();
        }else if (auth()->user()->role->id == 2){
            $purchases = Purchase::where('product_id', auth()->user()->products->pluck('id')->toArray())->get();
        }else if (auth()->user()->role->id == 3){
            $columns = [
                'No',
                'Date',
                'Event Name',
                'Total Price (RM)',
                'Certificate',
                'Feedback'
            ];
            $purchases = auth()->user()->purchases;
        }

        return view('purchases.index', compact('purchases', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product = Product::find($request->product);


        return view('purchases.create', compact('product'));
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
            'name',
            'date',
            'note'
        ]);

        $purchase = Purchase::create([
            'name' => $request->name,
            'date' => $request->date,
            'note' => $request->note,
            'quantity' => $request->quantity,
            'product_id' => $request->product,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('purchases.edit', ['purchase' => $purchase->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Purchase $purchase)
    {
        $columns = [
            'No',
            'Date',
            'Event Name',
            'Participant Name',
            'Note',
            'Total Price (RM)',
            'Payment',
            'Certificate',
            ''
        ];

        $purchases = $purchase->product->purchases;

        return view('purchases.index', compact('purchases', 'columns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('purchases.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $purchase->payment = $request->has('payment') ? $request->file('payment')->store('payment') : $purchase->payment;
        $purchase->certificate = $request->has('certificate') ? $request->file('certificate')->store('certificate') : $purchase->certificate;

        $purchase->save();

        return redirect()->route('purchases.index')->with('success', ['Success!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('purchases.index')->with('success', ['Succesfully deleted order!']);
    }
}
