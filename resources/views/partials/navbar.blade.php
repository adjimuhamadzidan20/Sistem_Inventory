<div class="container-fluid">
    <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
        <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
            <a
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                href="#"
                role="button"
                aria-expanded="false"
                aria-haspopup="true">
                <i class="fa fa-search"></i>
            </a>
            <ul class="dropdown-menu dropdown-search animated fadeIn">
                <form class="navbar-left navbar-form nav-search">
                    <div class="input-group">
                        <input
                            type="text"
                            placeholder="Search ..."
                            class="form-control" />
                    </div>
                </form>
            </ul>
        </li>

        <li class="nav-item topbar-user dropdown hidden-caret">
            <a
                class="dropdown-toggle profile-pic"
                data-bs-toggle="dropdown"
                href="{{ route('dashboard') }}"
                aria-expanded="false">
                <div class="avatar-sm">
                    <img
                        src="<?= url('template'); ?>/assets/img/user.png"
                        alt="profil"
                        class="avatar-img rounded" width="128"/>
                </div>
                <span class="profile-username">
                    <span class="op-7">Hi,</span>
                    <span class="fw-bold">{{ auth()->user()->name }}</span>
                </span>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeIn">
                <div class="dropdown-user-scroll scrollbar-outer">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg">
                                <img
                                    src="<?= url('template'); ?>/assets/img/user.png"
                                    alt="image profile"
                                    class="avatar-img rounded" width="128"/>
                            </div>
                            <div class="u-text">
                                <h4>{{ auth()->user()->name }}</h4>
                                <p class="text-muted">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('profil') }}">View Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </li>
                </div>
            </ul>
        </li>
    </ul>
</div>