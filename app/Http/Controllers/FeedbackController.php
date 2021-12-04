<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Purchase;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feedbacks = Feedback::where('product_id', $request->product)->get();

        return view('feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $purchase = Purchase::find($request->purchase);

        return view('feedbacks.create', compact('purchase'));
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
            'feedback' => 'required',
            'rating' => 'required'
        ]);

        Feedback::create([
            'feedback' => $request->feedback,
            'rating' => $request->rating,
            'product_id' => $request->product,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with('success', ['Successfully submiited feedback']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {

        return view('feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'feedback' => 'required',
            'rating' => 'required'
        ]);

        $feedback->update($validated);

        $feedback->save();

        return redirect()->route('feedbacks.index', ['product' => $feedback->product->id])->with('success', ['Successfully updated feedback!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        $product = $feedback->product;

        $feedback->delete();

        return redirect()->route('feedbacks.index', ['product' => $product->id])->with('success', ['Successfully deleted feedback!']);
    }
}
