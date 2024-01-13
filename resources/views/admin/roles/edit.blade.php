@extends('admin.layouts.master')
@section('title')
    {{ trans('words.edit-role') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ trans('words.roles') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('words.edit-role') }} </span>
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
                        <h4 class="card-title mg-b-0">{{ trans('words.edit-role') }}</h4>
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">
                            <i class="fa fa-home"></i>
                            <span class="text">{{ trans('words.roles') }}</span>
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.roles.update', $role->id) }}" method="Post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name">{{ trans('words.role-name') }}</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        style="font-weight: bold;
                                           font-size: 18px;
                                           color: #03aad7;"
                                        for="permission">{{ trans('words.permissions') }}</label>
                                    <br>
                                    <input type="checkbox" name="select_all" id="example-select-all"
                                        onclick="CheckAll('box1',this)">
                                    <label for='selectAll'> {{ trans('words.permission-select_all') }} </label>
                                    <br>
                                    @forelse ($permissions as $permission)
                                        <label class="col-md-3">
                                            <input type="checkbox" name="permission[]" class="box1"
                                                value= "{{ $permission->id }}"
                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            {{ $permission->name }}
                                        </label>
                                    @empty
                                    @endforelse
                                    @error('permission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
