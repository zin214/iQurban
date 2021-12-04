@extends('layouts.body')

@section('title','Events')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <x-templates.datatable :theaders="$columns" title="Display Events" id="display-event-table">
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category_text }}</td>
                        <td>{{ $product->type_text }}</td>
                        <td>{{ $product->date_carbon->toDateString() }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->location }}</td>
                        <td>{{ $product->phone }}</td>
                        <td>
                            <p><b>Total Stock : </b> {{ $product->stock }}</p>
                            <p><b>Stock Left : </b> {{ $product->stock - $product->purchases->sum('quantity') }}</p>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <x-buttons.quick type="button" color="primary" size="xs" icon="fa-eye" data-toggle="modal" data-target="#show-product-organizer-{{$product->id}}-modal"/>
                        </td>
                        <td>
                            @if($product->file !== null)
                                <x-buttons.quick type="href" :link='asset("storage/$product->file")' color="info" size="xs" icon="fa-download" download/>
                            @else
                                No File
                            @endif
                        </td>
                        <td>
                            <x-buttons.quick type="href" :link='asset("storage/$product->picture")' color="info" size="xs" icon="fa-download" download/>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-buttons.quick type="href" :link='route("products.edit", ["product" => $product->id])' color="success" size="xs" icon="fa-edit"/>
                                </div>
                                <div class="col-md-6">
                                    <x-buttons.quick type="button" color="danger" size="xs" icon="fa-trash" data-toggle="modal" data-target="#delete-product-{{$product->id}}-modal"/>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px;">
                                <x-buttons.quick type="href" :link='route("purchases.show", ["purchase" => $product->purchases->first()->id ?? 0])' color="warning" style="{{ $product->purchases->count() < 1 ? 'pointer-events: none;background-color: grey;color: white;border-color: black;' : '' }}"   size="sm" placeholder="View Participants"/>
                            </div>
                            @if(auth()->user()->role->id == 1)
                                <div class="row" style="margin-top: 20px;">
                                    <x-buttons.quick type="href" :link='route("feedbacks.index", ["product" => $product->id])' color="info" size="sm" placeholder="Feedbacks"/>
                                </div>
                            @endif
                        </td>
                    </tr>

                    <x-modals.element id="delete-product-{{$product->id}}-modal" title="Attention" cancelColor="default" cancelText="No">
                        <x-slot name="body">
                            Are you sure want to delete this product {{ $product->name }} ?
                        </x-slot>
                        <x-slot name="footer">
                            <form action='{{ route("products.destroy", ["product" => $product->id]) }}' method="post">
                                @csrf
                                @method('DELETE')
                                <x-buttons.quick type="submit" placeholder="Yes" color="danger"/>
                            </form>
                        </x-slot>
                    </x-modals.element>

                    <x-modals.element id="show-product-organizer-{{$product->id}}-modal" title="Organizer Information" cancelColor="default" cancelText="Close">
                        <x-slot name="body">
                            <dl>
                                <dt>Organization Name</dt>
                                <dd>{{ $product->organizer->name }}</dd>
                                <dt>Organization Type</dt>
                                <dd>{{ $product->organizer->type }}</dd>
                                <dt>Bank Name</dt>
                                <dd>{{ $product->organizer->bank_name }}</dd>
                                <dt>Account Name</dt>
                                <dd>{{ $product->organizer->account_name }}</dd>
                                <dt>Account No</dt>
                                <dd>{{ $product->organizer->account_no }}</dd>
                            </dl>
                        </x-slot>
                        <x-slot name="footer">

                        </x-slot>
                    </x-modals.element>
                @endforeach
            </x-templates.datatable>
        </div>
    </div>

@endsection
