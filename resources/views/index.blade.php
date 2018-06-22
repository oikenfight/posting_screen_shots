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
                <li class="breadcrumb-item active">
                    <a href="{{ route('index') }}">Home</a>
                </li>
            </ol>
        </div>
    </div>

    <div>
        <h2>日程一覧</h2>
    </div>

    <div>
        <ul>
            @foreach($dates as $date)
                <li><a href="{{ route('list', $date) }}">{{ $date }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
