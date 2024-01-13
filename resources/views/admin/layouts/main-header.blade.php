<!-- main-header opened -->
			<div class="main-header sticky side-header nav nav-item printPage ">
				<div class="container-fluid printPage ">
					<div class="main-header-left ">
						<div class="app-sidebar__toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
							<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
						</div>
					</div>
					<div class="main-header-right">
                        <div class="btn-group mb-1">
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                                    <i class="fas fa-globe"></i> {{ trans('words.lang') }}
                                    <i class="fas fa-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu">

                                   <li>
                                    <a href="{{ url('lang/en') }}" class="dropdown-item">
                                      <i class="fas fa-flag"></i> English </a>
                                   </li>
                                   <li>
                                    <a href="{{ url('lang/ar') }}" class="dropdown-item">
                                      <i class="fas fa-flag"></i> عربى </a>
                                   </li>
                        </div>
						<div class="nav nav-item  navbar-nav-right ml-auto">
							<div class="nav-link" id="bs-example-navbar-collapse-1">
								<form class="navbar-form" role="search">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
											</button>
										</span>
									</div>
								</form>
							</div>


							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-maximize"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg></a>
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user d-flex" href="">
                                    @if(!empty(auth()->user()->photo))
                                    <img alt="user-img" class="" src="{{ asset('Files/User/'.auth()->user()->photo) }}">
                                    @else
                                    <img alt="" src="{{ asset('Files/User/avatar.jpg')}}" class="">
                                    @endif
                                </a>
								<div class="dropdown-menu">
									<div class="main-header-profile bg-primary p-3">
										<div class="d-flex wd-100p">
											<div class="main-img-user">
                                                @if(auth()->user()->photo != '')
                                                    <img alt="user-img" class="" src="{{ asset('Files/User/'.auth()->user()->photo) }}">
                                                    @else
                                                    <img alt="" src="{{ asset('Files/User/avatar.jpg') }}" class="">
                                                    @endif
                                            </div>
											<div class="mr-3 my-auto">
												<h6>
                                                    {{ auth()->user()->name }}
                                                </h6><span></span>
											</div>
										</div>
									</div>
									<a class="dropdown-item" href="{{ auth()->user()->is_admin == 1 ? route('admin.users.update-profile') : route('client.users.update-profile') }}"><i class="bx bx-user-circle"></i>{{ trans('words.profile') }}</a>
									<a class="dropdown-item" href="{{ auth()->user()->is_admin == 1 ?  route('admin.users.update-password') : route('client.users.update-password') }}"><i class="bx bx-cog"></i>{{ trans('words.change-pass') }}</a>

                                 <form method="GET" action="{{ route('logout') }}">
                               @csrf
                               <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault();this.closest('form').submit();"><i
                                       class="bx bx-log-out"></i>{{ trans('words.logout') }}</a>
                               </form>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
<!-- /main-header -->
