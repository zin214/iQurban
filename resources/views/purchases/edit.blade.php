@extends('layouts.body')

@section('title','Purchases')

@section('main')

    <div class="row">

        <div class="col-md-6">
            <x-templates.forms.edit title="Order" :url='route("purchases.update", ["purchase" => $purchase->id])'>

                @if(auth()->user()->role->id == 3)
                    <div class="callout callout-primary">
                        <dl class="row">
                            <dt class="col-sm-4">Bank Name</dt>
                            <dd class="col-sm-8">{{ $purchase->product->organizer->bank_name }}</dd>
                            <dt class="col-sm-4">Account Name</dt>
                            <dd class="col-sm-8">{{ $purchase->product->organizer->account_name }}</dd>
                            <dt class="col-sm-4">Account Number</dt>
                            <dd class="col-sm-8">{{ $purchase->product->organizer->account_no }}</dd>
                        </dl>
                    </div>

                    <p>Please make a payment to the bank account provided and submit the receipt</p>

                    <x-forms.file-input.element id="payment" label="Payment Proof" placeholder="Choose File" required />
                @else
                    <x-forms.file-input.element id="certificate" label="Upload Certificate" placeholder="Choose File" required />
                @endif

                <x-slot name="footer">
                    <div class="col-md-2">
                        <x-buttons.quick type="submit" color="success" size="sm" placeholder="Confirm" id="submit-purchase-edit"/>
                    </div>
                    <div class="col-md-2">
                        <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-purchase-edit"/>
                    </div>
                </x-slot>

            </x-templates.forms.edit>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cart"></i>
                        Order Summary
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8">{{ $purchase->name }}</dd>
                        <dt class="col-sm-4">Date</dt>
                        <dd class="col-sm-8">{{ $purchase->product->date }}</dd>
                        <dt class="col-sm-4">Event</dt>
                        <dd class="col-sm-8">{{ $purchase->product->category_text }}</dd>
                        <dt class="col-sm-4">Location</dt>
                        <dd class="col-sm-8">{{ $purchase->product->location }}</dd>
                        <dt class="col-sm-4">Package</dt>
                        <dd class="col-sm-8">{{ $purchase->product->type_text }}</dd>
                        <dt class="col-sm-4">Subtotal</dt>
                        <dd class="col-sm-8">{{ $purchase->quantity }} x RM {{ $purchase->product->price }}</dd>
                        <dt class="col-sm-4">Total</dt>
                        <dd class="col-sm-8">{{ $purchase->total_price }}</dd>
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
