@extends('admin.layouts.master')
@section('content')
    @role('admin')
    <div class="text-center mt-5 fw-bold h3">{{ __('Hello Admin!') }}</div>
    @endrole


    @if(auth()->user()->is_admin == 0)
    <div class="text-center mt-5 fw-bold h3">{{ __('Welcome Client ').auth()->user()->name }}</div>
    @endif
@endsection
