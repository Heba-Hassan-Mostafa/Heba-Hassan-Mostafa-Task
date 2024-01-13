@extends('admin.layouts.master')
@section('title')
    {{ trans('words.user-show') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('words.users') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('words.user-show') }} </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ trans('words.user-show') }} --> {{ $user->name }}</h4>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                            <i class="fa fa-home"></i>
                            <span class="text">{{ trans('words.users') }}</span>
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ trans('words.name') }}:</strong>
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ trans('words.email') }}:</strong>
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ trans('words.photo') }}:</strong>
                                @if(!empty($user->photo))
                                    <img alt="user-img"  src="{{ asset('Files/User/'.$user->photo) }}" width="50px" height="50px">
                                    @else

                                    @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ trans('words.user-role') }}:</strong>
                                @if(!empty($user->roles))
                                    @foreach($user->roles as $role)
                                        <span class="btn btn-success-gradient ">{{ $role->name }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- Container closed -->
    </div>
@endsection
