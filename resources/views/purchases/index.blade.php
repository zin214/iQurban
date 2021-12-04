@extends('layouts.body')

@section('title','Orders')

@section('main')

    <div class="row">
        <div class="col-md-12">
            <x-templates.datatable :theaders="$columns" title="Display Orders" id="display-order-table">
                @foreach ($purchases as $purchase)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $purchase->product->date }}</td>
                        <td>{{ $purchase->product->name }}</td>
                        @if(auth()->user()->role->id == 3)
                            <td>{{ $purchase->total_price }}</td>
                            <td>
                                <x-buttons.quick type="href" :link='asset("storage/$purchase->certificate")' color="info" size="xs" icon="fa-download" download/>
                            </td>
                            <td>
                                <x-buttons.quick type="href" :link='route("feedbacks.create", ["purchase" => $purchase])' color="warning" size="xs" icon="fa-edit"/>
                            </td>
                        @else
                            <td>{{ $purchase->name }}</td>
                            <td>{{ $purchase->note }}</td>
                            <td>{{ $purchase->total_price }}</td>
                            <td>
                                <x-buttons.quick type="href" :link='asset("storage/$purchase->payment")' color="info" size="xs" icon="fa-download" download/>
                            </td>
                            <td>
                                <x-buttons.quick type="href" :link='route("purchases.edit", ["purchase" => $purchase->id])' color="warning" size="xs" icon="fa-upload"/>
                            </td>
                            <td>
                                <x-buttons.quick type="button" color="danger" size="xs" icon="fa-trash" data-toggle="modal" data-target="#delete-purchase-{{$purchase->id}}-modal"/>
                            </td>
                        @endif
                    </tr>

                    <x-modals.element id="delete-purchase-{{$purchase->id}}-modal" title="Attention" cancelColor="default" cancelText="No">
                        <x-slot name="body">
                            Are you sure want to delete this order ?
                        </x-slot>
                        <x-slot name="footer">
                            <form action='{{ route("purchases.destroy", ["purchase" => $purchase->id]) }}' method="post">
                                @csrf
                                @method('DELETE')
                                <x-buttons.quick type="submit" placeholder="Yes" color="danger"/>
                            </form>
                        </x-slot>
                    </x-modals.element>

                @endforeach
            </x-templates.datatable>
        </div>
    </div>

@endsection
