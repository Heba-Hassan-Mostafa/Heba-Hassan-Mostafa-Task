<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll printPage ">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="">
            {{-- <img src="" class="main-logo" alt="logo"></a> --}}
            <a class="desktop-logo logo-dark active" href="">
                {{-- <img src="" class="main-logo dark-theme" alt="logo"> --}}
            </a>

    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    @if (!empty(auth()->user()->photo))
                        <img alt="user-img" class="avatar avatar-xl brround"
                            src="{{ asset('Files/User/' . auth()->user()->photo) }}">
                    @else
                        <img alt="user-img" class="avatar avatar-xl brround" src="{{ asset('Files/User/avatar.jpg') }}">
                    @endif
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">
                        {{ auth()->user()->name }}
                    </h4>
                    <span class="mb-0 text-muted"></span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">{{ trans('words.dashboard') }}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ auth()->user()->is_admin == 1 ? route('admin.dashboard') : route('client.dashboard') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg>
                    <span class="side-menu__label">{{ trans('words.dashboard') }}</span>

                </a>
            </li>


            @if (auth()->user()->can('user-index'))
                <li class="side-item side-item-category">{{ trans('words.users') }}</li>
                <li class="slide">
                    <a class="side-menu__item" href="{{ route('admin.users.index') }}">

                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg>
                        <span class="side-menu__label">{{ trans('words.users') }}</span>

                    </a>
                </li>
            @endif
            @if (auth()->user()->can('role-index'))
            <li class="side-item side-item-category">{{ trans('words.roles') }}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.roles.index') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg>
                    <span class="side-menu__label">{{ trans('words.roles') }}</span>

                </a>
            </li>

            @endif

            @if (auth()->user()->can('permission-index'))
            <li class="side-item side-item-category">{{ trans('words.permissions') }}</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.permissions.index') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg>
                    <span class="side-menu__label">{{ trans('words.permissions') }}</span>

                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
