@extends('admin.layouts.master')
@section('content')

    @if(auth()->user()->is_admin == 0)
    <div class="text-center mt-5 fw-bold h3">{{ __('Welcome Client ').auth()->user()->name }}</div>
    @endif
@endsection
