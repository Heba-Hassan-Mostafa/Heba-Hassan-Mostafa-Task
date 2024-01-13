@extends('admin.layouts.master')
@section('css')
    @include('admin.layouts.datatable-css')
@endsection
@section('title')
    {{ trans('words.permissions') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('words.permissions') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('words.permission-list') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0"> {{ trans('words.permission-list') }}</h4>

                </div>

            </div>
            <div class="card-body">

                <a href="{{ route('admin.permissions.create') }}" class="btn btn-success font-weight-bold" permission="button"
                    aria-pressed="true">
                    <i class="fa fa-plus"></i>
                    {{ trans('words.create-permission') }}
                </a>
                <br><br>

                <div class="table-responsive">
                    <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('words.name') }}</th>
                                <th>{{ trans('words.actions') }}</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                @if ($permissions)
                                    @forelse  ($permissions as $permission)
                                       <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                    class="btn btn-info btn-sm" permission="button" aria-pressed="true">
                                                    <i class="fa fa-edit"></i></a>

                                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST"
                                                    class="dnone">
                                                    @csrf
                                                    @method('Delete')
                                                    <button id="delete" type="button" class="btn btn-danger btn-sm"
                                                        data-name="{{ $permission->name }}" data-toggle="modal"
                                                        data-target="#Delete_Fee{{ $permission->id }}"
                                                        title="{{ trans('btns.delete') }}">
                                                        <i class="fa fa-trash"></i></button>
                                                </form>
                                               
                                            </div>
                                        </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center"> {{ trans('words.no-permissions-found') }}</td>
                            </tr>
                            @endforelse
                            @endif



                        </tbody>

                    </table>
                </div><!-- bd -->
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!--/div-->
@endsection

@section('js')
    @include('admin.layouts.datatable-js')

    <script>
        $(function() {

            $('.custom-control-input').on('change', function() {

                var status = $(this).prop('checked') == true ? 1 : 0;

                var id = $(this).data('id');
                console.log(status);

                $.ajax({

                    type: "GET",

                    dataType: "json",

                    url: '',

                    data: {
                        'status': status,
                        'id': id
                    },

                    success: function(data) {

                        console.log(data.success)

                    }

                });

            })

        })
    </script>
@endsection
