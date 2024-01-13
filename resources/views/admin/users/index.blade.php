@extends('admin.layouts.master')
@section('css')
    @include('admin.layouts.datatable-css')
@endsection
@section('title')
    {{ trans('words.users') }}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{ trans('words.users') }}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{ trans('words.user-list') }}</span>
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
                    <h4 class="card-title mg-b-0"> {{ trans('words.user-list') }}</h4>

                </div>

            </div>
            <div class="card-body">

                @if(auth()->user()->can('create-user'))
                <a href="{{ route('admin.users.create') }}" class="btn btn-success font-weight-bold" role="button"
                    aria-pressed="true">
                    <i class="fa fa-plus"></i>
                    {{ trans('words.create-user') }}
                </a>
                @endif
                <br>
                <br>

                <div class="table-responsive">
                    <table class="table table-striped mg-b-0 text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('words.name') }}</th>
                                <th>{{ trans('words.email') }}</th>
                                <th>{{ trans('words.phone') }}</th>
                                <th>{{ trans('words.photo') }}</th>
                                <th>{{ trans('words.user-role') }}</th>
                                <th>{{ trans('words.actions') }}</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                @if ($users)
                                    @forelse  ($users as $user)
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if (!empty($user->photo))
                                            <img src="{{ asset('Files/User/'.$user->photo) }}" style="width:60px;">
                                            @else
                                            <img src="{{ asset('Files/User/avatar.jpg') }}" style="width:60px;">

                                            @endif
                                        </td>
                                        <td class="text-center" style="width: 200px">

                                            @if (!empty($user->roles))
                                            @foreach ($user->roles as $role)
                                                <label class="btn btn-sm btn-success">{{ $role->name }}</label>
                                            @endforeach
                                        @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                @if (auth()->user()->hasRole('admin') && $user->first() )
                                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                                    class="btn btn-info btn-sm" role="button" aria-pressed="true">
                                                    <i class="fa fa-edit"></i></a>


                                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                    class="dnone">
                                                    @csrf
                                                    @method('Delete')
                                                    <button id="delete" type="button" class="btn btn-danger btn-sm"
                                                        data-name="{{ $user->name }}" data-toggle="modal"
                                                        data-target="#Delete_Fee{{ $user->id }}"
                                                        title="{{ trans('btns.delete') }}">
                                                        <i class="fa fa-trash"></i></button>
                                                </form>
                                                @endif

                                                <a href="{{ route('admin.users.show', $user->id) }}"
                                                    class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i
                                                        class="far fa-eye"></i></a>

                                            </div>
                                        </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center"> {{ trans('words.no-users-found') }}</td>
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
