@extends('layouts.body')

@section('title','Purchases')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-quran"></i>
                        {{ $product->name }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src='{{ asset("storage/$product->picture") }}' width="480px" height="240px" alt="">
                        </div>
                        <div class="col-md-6">
                            <p>We provide the best quality breed of cow for Qurban</p>
                            <dl class="row">
                                <dt class="col-sm-4">Location</dt>
                                <dd class="col-sm-8">{{ $product->location }}</dd>
                                <dt class="col-sm-4">Organizer</dt>
                                <dd class="col-sm-8">{{ $product->organizer->name }}</dd>
                                <dt class="col-sm-4">Contact</dt>
                                <dd class="col-sm-8">{{ $product->phone }}</dd>
                                <dt class="col-sm-4">Event</dt>
                                <dd class="col-sm-8">{{ $product->category_text }}</dd>
                                <dt class="col-sm-4">Date</dt>
                                <dd class="col-sm-8">{{ $product->date }}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <x-buttons.quick type="href" :link="route('feedbacks.index', ['product' => $product->id])" color="warning" size="sm" placeholder="Feedback" id="feedback-product-button"/>
                        </div>
                        <div class="col-md-5">
                            @if ($product->feedbacks)
                                <?php
                                    for($i = 1 ; $i <=$product->feedbacks->average('rating') ; $i++){
                                ?>
                                    <i class="fas fa-star"></i>
                                <?php
                                    }
                                ?>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <x-templates.forms.create title="Confirm Order" :url='route("purchases.store")'>

                <x-forms.input.flat id="package" readonly type="text" placeholder="Package" :value="$product->type_text" />

                <x-forms.input.flat id="purchase_price" readonly type="text" placeholder="Price (RM)" :value="$product->price" />

                <x-forms.input.flat id="quantity" type="number" value="1" placeholder="Quantity" required />

                <x-forms.input.flat id="name" type="text" placeholder="Name for Qurban/Aqiqah" required />

                <x-forms.input.flat id="date" type="date" placeholder="Date for Aqiqah Only" />

                <x-forms.textarea.flat id="note" placeholder="Note"/>

                <input type="hidden" name="product" value="{{ $product->id }}">

                <x-slot name="footer">
                    <div class="col-md-2">
                        <x-buttons.quick type="submit" color="primary" size="sm" placeholder="Confirm" id="submit-purchase-create"/>
                    </div>
                    <div class="col-md-2">
                        <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-purchase-create"/>
                    </div>
                </x-slot>

            </x-templates.forms.create>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cart"></i>
                        Subtotal
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">{{ $product->type_text }}</dt>
                        <dd class="col-sm-8" id="subtotal"></dd>
                        <dt class="col-sm-4">Total</dt>
                        <dd class="col-sm-8" id="total"></dd>
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
