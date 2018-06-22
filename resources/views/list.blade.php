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
                <li class="breadcrumb-item active">
                    Date
                </li>
            </ol>
        </div>
    </div>

    <div>
        <h2>スクリーンショット一覧</h2>
    </div>

    <div class="row">
        <div class="offset-2 col-sm-8">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-sm-1">name</th>
                        <th class="col-sm-3">image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td class="col-sm-1">
                                <a href="{{ route('show', $image) }}">{{ $image }}</a>
                            </td>
                            <td class="col-sm-3">
                                <img src="{{ asset(sprintf('storage/%s/%s.png', $date, $image)) }}" class="img-fluid" alt="{{ $image }}">
                            </td>
                            <td class=""></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
