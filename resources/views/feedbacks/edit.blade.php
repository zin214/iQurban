@extends('layouts.body')

@section('title','Feedbacks')

@section('main')

    <div class="row">

        <div class="col-md-12">
            <x-templates.forms.edit title="Update Feedback" :url='route("feedbacks.update", ["feedback" => $feedback->id])'>

                <x-forms.textarea.flat id="feedback" :value="$feedback->feedback" placeholder="Feedback"/>

                <x-forms.checkbox-radio.label label="Rating">
                    <?php
                    for($i = 1 ; $i <=5 ; $i++){
                    ?>

                    <x-forms.checkbox-radio.element type="radio" :checked="$feedback->rating" id="rating" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}"  :value="$i"/>
                    <?php

                    for($j = 0 ; $j < $i ; $j++){
                        echo "<i class='fas fa-star'></i>";
                    }
                    ?>
                    <?php
                    }
                    ?>
                </x-forms.checkbox-radio.label>

                <x-slot name="footer">
                    <div class="col-md-2">
                        <x-buttons.quick type="submit" color="success" size="sm" placeholder="Save" id="submit-feedback-edit"/>
                    </div>
                    <div class="col-md-2">
                        <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-feedback-edit"/>
                    </div>
                </x-slot>

            </x-templates.forms.edit>
        </div>

    </div>

@endsection
