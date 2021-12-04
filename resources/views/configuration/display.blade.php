@extends('layouts.body')

@section('title','Users')

@section('main')

<div class="row">

    <div class="col-md-12">
        <x-templates.forms.edit title="System Configuration" :url='url("/config")'>

            <x-forms.input.flat id="appName" type="text" placeholder="Application Name" :value="$configurations->where('key','appName')->first()->value" required />
    
            <x-forms.switches.element placeholder="Dark Mode" id="dark-mode-switch" :color="\App\Configuration::where('key','cardColor')->first()->value" value="dark" :checked="$configurations->where('key','theme')->first()->value" />
            
            <div class="form-group">
                <label for="navbar-color-chooser">Navigation Bar Color</label>
                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="navbar-color-chooser">
                        @foreach ($colors as $key => $color)
                            <li><a class="text-{{ $key }}" href="#" data-val="{{$key}}"><i class="fas fa-square"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
    
            <div class="form-group">
                <label for="sidebar-color-chooser">Sidebar Color</label>
                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="sidebar-color-chooser">
                        @foreach ($colors as $key => $color)
                            <li><a class="text-{{ $key }}" href="#" data-val="{{$key}}"><i class="fas fa-square"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
    
            <div class="form-group">
                <label for="card-color-chooser">Card Color</label>
                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="card-color-chooser">
                        @foreach ($colors as $key => $color)
                            <li><a class="text-{{ $key }}" href="#" data-val="{{$key}}"><i class="fas fa-square"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
    
            <x-forms.file-input.element id="logo" label="System Logo (If empty, current one will be used)" placeholder="Upload Logo"/>
    
            <input type="hidden" name="theme" id="theme" value="">
            <input type="hidden" name="navbarColor" id="navbarColor" value="{{ \App\Configuration::where('key','navbarColor')->first()->value }}">
            <input type="hidden" name="sidebarColor" id="sidebarColor" value="{{ \App\Configuration::where('key','sidebarColor')->first()->value }}">
            <input type="hidden" name="cardColor" id="cardColor" value="{{ \App\Configuration::where('key','cardColor')->first()->value }}">
    
            <x-slot name="footer">
                <div class="col-md-2">
                    <x-buttons.quick type="submit" color="success" size="sm" icon="fa-save" placeholder="Save" id="submit-update-configuration"/>
                </div>
                <div class="col-md-2">
                    <x-buttons.quick type="reset" color="default" size="sm" placeholder="Reset" icon="fa-sync" id="reset-update-configuration"/>
                </div>
            </x-slot>
    
        </x-forms.edit>
    </div>
    
</div>
    
@endsection