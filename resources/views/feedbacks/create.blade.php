@extends('layouts.body')

@section('title','Feedbacks')

@section('main')

    <div class="row">

        <div class="col-md-12">
            <x-templates.forms.create title="Submit Feedback" :url='route("feedbacks.store")'>

                <x-forms.textarea.flat id="feedback" placeholder="Feedback"/>

                <x-forms.checkbox-radio.label label="Rating">
                    <?php
                        for($i = 1 ; $i <=5 ; $i++){
                    ?>

                        <x-forms.checkbox-radio.element type="radio" id="rating" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}"  :value="$i"/>
                        <?php

                            for($j = 0 ; $j < $i ; $j++){
                                echo "<i class='fas fa-star'></i>";
                            }
                        ?>
                    <?php
                        }
                    ?>
                </x-forms.checkbox-radio.label>

                <input type="hidden" name="product" value="{{ $purchase->product->id }}">

                <x-slot name="footer">
                    <div class="col-md-2">
                        <x-buttons.quick type="submit" color="primary" size="sm" placeholder="Submit" id="submit-feedback-create"/>
                    </div>
                    <div class="col-md-2">
                        <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-feedback-create"/>
                    </div>
                </x-slot>

            </x-templates.forms.create>
        </div>

    </div>

@endsection
