@extends('admin.layouts.master')
@section('title')
    {{ trans('words.change-pass') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('words.users') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('words.change-pass') }}</span>
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

                    <form action="{{ auth()->user()->is_admin == 1 ? route('admin.users.update-password') : route('client.users.update-password')}}" method="Post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-8">
                                <div class="form-group">
                                <label for="old_password">{{ trans('words.old-password') }}</label>
                                <input type="password" name="old_password" value="{{ old('old_password') }}" class="form-control">
                                  @error('old_password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                             </div>

                            <div class="col-8">
                                <div class="form-group">
                                <label for="new_password">{{ trans('words.new-password') }}</label>
                                <input type="password" name="new_password" value="{{ old('new_password') }}" class="form-control">
                                  @error('new_password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                             </div>

                        <div class="col-8">
                            <div class="form-group">
                            <label for="new_password_confirmation">{{ trans('words.confirm-password') }}</label>
                            <input type="password" name="new_password_confirmation" value="{{ old('new_password_confirmation') }}" class="form-control">
                              @error('new_password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
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

