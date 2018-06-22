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
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('list', ['date' => substr(Request::route('image'), 0, 8)]) }}">Date</a>
                </li>
                <li class="breadcrumb-item active">
                    Show
                </li>
            </ol>
        </div>
    </div>

    <div>
        <h2>スクリーンショット</h2>
    </div>

    <div class="row">
        <div class="offset-3 col-6">
            <img src="{{ asset('storage/'.$imagePath) }}" class="img-fluid" alt="{{ $imagePath }}">
        </div>
    </div>
@endsection
