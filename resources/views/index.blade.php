{{-- layout --}}
@extends('layouts.default')

{{-- Additional Css --}}
@section('additionalCss')
@endsection

{{-- Additional JavaScript --}}
@section('additionalJs')
@endsection

{{-- titleSuffix --}}
@section('titleSuffix', 'index')

{{-- Content --}}
@section('content')
    <div>
        <div id="app">
            <router-view></router-view>
        </div>
    </div>
@endsection
