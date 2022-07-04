<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="{{ route('admin.index') }}">
                    <span class="align-middle"> Administrator </span>
                </a>

				<ul class="sidebar-nav">
					<li class="sidebar-item	{{ Request::segment(2) != null ? '' : 'active' }} ">
						<a class="sidebar-link" href="{{ route('admin.index')}}" >
						<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
                    <li class="sidebar-header">
						Master Produk
					</li>
					<li class="sidebar-item {{ Request::segment(2) == 'produk' ? 'active' : '' }}	 ">
						<a class="sidebar-link" href="{{ route('produk.index')}}">
							<i class="align-middle" data-feather="folder-plus"></i> <span class="align-middle">Produk</span>
						</a>
					</li>

					<li class="sidebar-item {{ Request::segment(2) == 'kategori' ? 'active' : '' }}	">
						<a class="sidebar-link" href="{{ route('kategori.index')}}">
							<i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Kategori Produk</span>
						</a>
					</li>
                    <li class="sidebar-header">
						Master Halaman Utama
					</li>
                    <li class="sidebar-item {{ Request::segment(2) == 'data-contact' ? 'active' : '' }}	">
						<a class="sidebar-link" href="{{ route('data.contact')}}">
							<i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Contact</span>
						</a>
					</li>
                    <li class="sidebar-item {{ Request::segment(2) == 'master-beranda' ? 'active' : '' }}	">
						<a class="sidebar-link" href="{{ route('master-beranda.index')}}">
							<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Master Beranda</span>
						</a>
					</li>
                    <li class="sidebar-item {{ Request::segment(2) == 'master-features' ? 'active' : '' }}	">
						<a class="sidebar-link" href="{{ route('master-features.index')}}">
							<i class="align-middle" data-feather="grid"></i> <span class="align-middle">Master Features</span>
						</a>
					</li>
                    <li class="sidebar-header">
						Master Our Team
					</li>
                    <li class="sidebar-item {{ Request::segment(2) == 'our-teams' ? 'active' : '' }}	">
						<a class="sidebar-link" href="{{ route('our-teams.index')}}">
							<i class="align-middle" data-feather="file-plus"></i> <span class="align-middle">Our Teams</span>
						</a>
					</li>
                    <li class="sidebar-header">
						Master Blog
					</li>
					<li class="sidebar-item {{ Request::segment(2) == 'blog' ? 'active' : '' }}	 ">
						<a class="sidebar-link" href="{{ route('blog.index')}}">
							<i class="align-middle" data-feather="folder-plus"></i> <span class="align-middle">Blog</span>
						</a>
					</li>

					<li class="sidebar-item {{ Request::segment(2) == 'kategori-blog' ? 'active' : '' }}	">
						<a class="sidebar-link" href="{{ route('kategori-blog.index')}}">
							<i class="align-middle" data-feather="plus-square"></i> <span class="align-middle">Kategori Blog</span>
						</a>
					</li>
                </ul>
            </div>
</nav>
