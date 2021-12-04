@extends('layouts.body')

@section('title','Events')

@section('main')

    <div class="row">

        <div class="col-md-12">
            <x-templates.forms.edit title="Update Event" :url='route("products.update", [ "product" => $product->id])'>

                <x-forms.input.flat id="organizer_name" type="text" placeholder="Organization Name" :value="$product->organizer->name" required />

                <x-forms.checkbox-radio.label label="Select Event">
                    <x-forms.checkbox-radio.element type="radio" id="organizer_type" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :checked="$product->organizer->type" placeholder="Dealer" value="Dealer"/>
                    <x-forms.checkbox-radio.element type="radio" id="organizer_type" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :checked="$product->organizer->type" placeholder="Mosque" value="Mosque"/>
                </x-forms.checkbox-radio.label>

                <x-forms.input.flat id="bank_name" type="text" placeholder="Bank Name" :value="$product->organizer->bank_name" required />

                <x-forms.input.flat id="account_name" type="text" placeholder="Account Name" :value="$product->organizer->account_name" required />

                <x-forms.input.flat id="account_no" type="text" placeholder="Account No" :value="$product->organizer->account_no" required />

                <x-forms.input.flat id="name" type="text" placeholder="Name" :value="$product->name" required />

                <x-forms.textarea.flat id="description" placeholder="Description" :value="$product->description"/>

                <x-forms.checkbox-radio.label label="Select Event">
                    @foreach ($categories as $key => $category)
                        <x-forms.checkbox-radio.element type="radio" id="category" :checked="$product->category" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$category" :value="$key"/>
                    @endforeach
                </x-forms.checkbox-radio.label>

                <x-forms.checkbox-radio.label label="Select Type">
                    @foreach ($types as $key => $type)
                        <x-forms.checkbox-radio.element type="radio" id="type" :checked="$product->type" color="{{ \App\Configuration::where('key','cardColor')->first()->value }}" :placeholder="$type" :value="$key"/>
                    @endforeach
                </x-forms.checkbox-radio.label>

                <x-forms.input.flat id="date" type="date" placeholder="Date" required :value="$product->date" />

                <x-forms.input.flat id="location" type="text" placeholder="Location" :value="$product->location" required />

                <x-forms.input.flat id="phone" type="text" placeholder="Event Contact Number" :value="$product->phone" required />

                <x-forms.input.flat id="stock" type="number" placeholder="Stock" :value="$product->stock" required />

                <x-forms.input.flat id="price" step="0.01" type="number" :value="$product->price" placeholder="Price (RM)" required />

                <x-forms.file-input.element id="picture" label="Event Picture (Leave empty if want to use current one)" placeholder="Upload Picture" />

                <x-forms.file-input.element id="file" label="Event File (Leave empty if want to use current one)" placeholder="Upload File" />

                <x-slot name="footer">
                    <div class="col-md-2">
                        <x-buttons.quick type="submit" color="success" size="sm" placeholder="Save" id="submit-event-edit"/>
                    </div>
                    <div class="col-md-2">
                        <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" id="reset-event-edit"/>
                    </div>
                </x-slot>

            </x-templates.forms.edit>
        </div>

    </div>

@endsection
