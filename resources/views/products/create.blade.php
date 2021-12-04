@extends('layouts.body')

@section('title','Events')

@section('main')

    <div class="row">

        <div class="col-md-12">
            <x-templates.forms.create title="Event Name" :url='route("products.store")'>

                <x-forms.input.flat id="organizer_name" type="text" placeholder="Organization Name" required />

                <x-forms.checkbox-radio.label label="Select Event">
                    <x-forms.checkbox-radio.element type="radio" id="organizer_type" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" placeholder="Dealer" value="Dealer"/>
                    <x-forms.checkbox-radio.element type="radio" id="organizer_type" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" placeholder="Mosque" value="Mosque"/>
                </x-forms.checkbox-radio.label>

                <x-forms.input.flat id="bank_name" type="text" placeholder="Bank Name" required />

                <x-forms.input.flat id="account_name" type="text" placeholder="Account Name" required />

                <x-forms.input.flat id="account_no" type="text" placeholder="Account No" required />

                <x-forms.input.flat id="name" type="text" placeholder="Name" required />

                <x-forms.textarea.flat id="description" placeholder="Description"/>

                <x-forms.checkbox-radio.label label="Select Event">
                    @foreach ($categories as $key => $category)
                        <x-forms.checkbox-radio.element type="radio" id="category" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$category" :value="$key"/>
                    @endforeach
                </x-forms.checkbox-radio.label>

                <x-forms.checkbox-radio.label label="Select Type">
                    @foreach ($types as $key => $type)
                        <x-forms.checkbox-radio.element type="radio" id="type" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$type" :value="$key"/>
                    @endforeach
                </x-forms.checkbox-radio.label>

                <x-forms.input.flat id="date" type="date" placeholder="Event Date" required />

                <x-forms.input.flat id="location" type="text" placeholder="Event Location" required />

                <x-forms.input.flat id="phone" type="text" placeholder="Event Contact Number" required />

                <x-forms.input.flat id="stock" type="number" placeholder="Stock" required />

                <x-forms.input.flat id="price" step="0.01" type="number" placeholder="Price (RM)" required />

                <x-forms.file-input.element id="picture" label="Event Picture" placeholder="Upload Picture" required />

                <x-forms.file-input.element id="file" label="Event File( Please upload your veterinary approval letter)" placeholder="Upload File" required />

                <x-slot name="footer">
                    <div class="col-md-2">
                        <x-buttons.quick type="submit" color="primary" size="sm" placeholder="Create" id="submit-event-create"/>
                    </div>
                    <div class="col-md-2">
                        <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-event-create"/>
                    </div>
                </x-slot>

            </x-templates.forms.create>
        </div>

    </div>

@endsection
