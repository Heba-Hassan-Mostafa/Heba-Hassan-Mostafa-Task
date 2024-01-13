@extends('admin.layouts.master')
@section('title')
    {{ trans('words.profile') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('words.users') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('words.profile') }}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ auth()->user()->is_admin == 1 ? route('admin.users.update-profile') : route('client.users.update-profile') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">{{ trans('words.name') }}</label>
                                    <input type="text" name="name" value="{{ old('first_name' , auth()->user()->name) }}"
                                        class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">{{ trans('words.email') }}</label>
                                    <input type="email" name="email" value="{{ old('email' , auth()->user()->email) }}" class="form-control">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone">{{ trans('words.phone') }}</label>
                                <input type="text" name="phone" value="{{ old('phone' , auth()->user()->phone) }}"
                                    class="form-control">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        </div>
                        <div class="row">
                            <div class="col-6 mt-2">
                                <label for="photo">{{ trans('words.photo') }}</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="photo" class='form-control'>
                                </div>
                                <br>
                                @if(!empty(auth()->user()->photo))
                                <img alt="user-img"  src="{{ asset('Files/User/'.auth()->user()->photo) }}" width="50px" height="50px">
                                @else

                                @endif
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pt-4">
                            <button type="submit" name="save" class="btn btn-primary">
                                {{ trans('words.save') }}</button>

                        </div>


                    </form>


                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- Container closed -->
    </div>
@endsection
