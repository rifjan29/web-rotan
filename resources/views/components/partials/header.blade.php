<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">


							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
						            <i class="align-middle" data-feather="user"></i><span class="text-dark"> {{ Auth::user()->name }}</span>
                            </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="{{ route('profile.edit', Auth::user()->id ) }}"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
                                <form method="GET" action="{{ route('logout') }}">
                                    @csrf
                                <a class="dropdown-item" href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class="align-middle me-1 fa fa-power-off"></i> Log out</a>
                                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
