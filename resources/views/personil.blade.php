@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Personil Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Personil Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in as Personil!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
