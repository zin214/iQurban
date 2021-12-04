@extends('layouts.body')

@section('title','Events')

@section('main')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Feedbacks
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @foreach($feedbacks as $feedback)
                        <dl>
                            <dt>{{ $feedback->user->name }}</dt>
                            <dd>{{ $feedback->feedback }}</dd>
                            <dd>
                                <?php
                                    for($i = 1 ; $i <=$feedback->rating ; $i++){
                                ?>
                                    <i class="fas fa-star"></i>
                                <?php
                                    }
                                ?>
                            </dd>
                            @if(auth()->user()->role->id == 1)
                                <dd>
                                    <div class="row">
                                        <div class="col-md-1" style=""display: inline-flex;height: 30px;>
                                            <x-buttons.quick type="href" :link='route("feedbacks.edit", ["feedback" => $feedback->id])' color="success" size="xs" icon="fa-edit"/>
                                            &nbsp;
                                            <x-buttons.quick type="button" color="danger" size="xs" icon="fa-trash" data-toggle="modal" data-target="#delete-feedback-{{$feedback->id}}-modal"/>
                                        </div>
                                    </div>
                                </dd>
                            @endif
                        </dl>
                        <x-modals.element id="delete-feedback-{{$feedback->id}}-modal" title="Attention" cancelColor="default" cancelText="No">
                            <x-slot name="body">
                                Are you sure want to delete this feedback ?
                            </x-slot>
                            <x-slot name="footer">
                                <form action='{{ route("feedbacks.destroy", ["feedback" => $feedback->id]) }}' method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-buttons.quick type="submit" placeholder="Yes" color="danger"/>
                                </form>
                            </x-slot>
                        </x-modals.element>
                    @endforeach
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
