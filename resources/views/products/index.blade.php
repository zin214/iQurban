@extends('layouts.body')

@section('title','Events')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <x-gallery.fancy title="Event Lists" shuffle="shuffle">
                <x-slot name="category">
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Qurban </a>
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Aqiqah </a>
                </x-slot>

                <x-slot name="images">
                    @foreach($products as $product)
                        <x-gallery.image :title="$product->name" :url="$product->picture" :category="$product->category" type="image">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="{{ \App\Configuration::where('key','theme')->first()->value == 'dark' ? 'color: white;' : 'color: black;' }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        {{ $product->name }}
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="{{ \App\Configuration::where('key','theme')->first()->value == 'dark' ? 'color: white;' : 'color: black;' }}">
                                    <dl>
                                        <dt>Event</dt>
                                        <dd>{{ $product->category_text }}</dd>
                                        <dt>Type</dt>
                                        <dd>{{ $product->type_text }}</dd>
                                        <dt>Date</dt>
                                        <dd>{{ $product->date_carbon->toDateString() }}</dd>
                                        <dt>Location</dt>
                                        <dd>{{ $product->location }}</dd>
                                        <dt>Price</dt>
                                        <dd>RM {{ $product->price }}</dd>
                                        <dt>Live Stocks</dt>
                                        <dd>{{ $product->stock - $product->purchases->sum('quantity') }}</dd>
                                    </dl>
                                </div>
                                <!-- /.card-body -->
                                @if(auth()->user()->role->id == 3 && (($product->stock - $product->purchases->sum('quantity')) > 0))
                                    <div class="card-footer">
                                        <div class="row">
                                            <x-buttons.quick type="href" :link="route('purchases.create', ['product' => $product->id])" color="warning" size="sm" placeholder="Select" id="select-product-button"/>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </x-gallery.image>
                    @endforeach
                </x-slot>
            </x-gallery.fancy>
        </div>
    </div>

@endsection
