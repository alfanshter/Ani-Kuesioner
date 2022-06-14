  <nav
                class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"
            >
                <div
                    class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
                >
                    <a class="navbar-brand brand-logo" href="/"
                        ><span class="mdi mdi-wallet-membership">Cistik Resep Eyang</span></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"
                        ><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo"
                    /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button
                        class="navbar-toggler navbar-toggler align-self-center"
                        type="button"
                        data-toggle="minimize"
                    >
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                id="profileDropdown"
                                href="#"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <div class="nav-profile-img">
                                    <img
                                        src="{{asset('assets/images/faces/face1.jpg')}}"
                                        alt="image"
                                    />
                                    <span
                                        class="availability-status online"
                                    ></span>
                                </div>
                                <div class="nav-profile-text">
                                    <p class="mb-1 text-black">
                                        @if (auth()->user()->role ==1)
                                        {{auth()->user()->pelanggan->nama_pelanggan}}
                                        @endif
                                        @if (auth()->user()->role ==0)
                                        {{auth()->user()->admin->email}}
                                        @endif
                                         @if (auth()->user()->role ==2)
                                        {{auth()->user()->pemilik->email}}
                                        @endif
                                    </p>
                                </div>
                            </a>
                            <div
                                class="dropdown-menu navbar-dropdown"
                                aria-labelledby="profileDropdown"
                            >
                            @if (auth()->user()->role == 0)
                                <a class="dropdown-item" href="/profil_admin">
                                    <i
                                        class="mdi mdi-cached me-2 text-success"
                                    ></i>
                                    Profil
                                </a>
                                
                            @endif

                            @if (auth()->user()->role == 1)
                                <a class="dropdown-item" href="/profil_pelanggan">
                                    <i
                                        class="mdi mdi-cached me-2 text-success"
                                    ></i>
                                    Profil
                                </a>
                                
                            @endif

                            @if (auth()->user()->role == 2)
                                <a class="dropdown-item" href="/profil_pemilik">
                                    <i
                                        class="mdi mdi-cached me-2 text-success"
                                    ></i>
                                    Profil
                                </a>
                                
                            @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">
                                    <i
                                        class="mdi mdi-logout me-2 text-primary"
                                    ></i>
                                    Signout
                                </a>
                            </div>
                        </li>
                        </li>
                          <li class="nav-item d-none d-lg-block full-screen-link">
                            <a href="/unduh_grafik" class="btn btn-gradient-primary btn-icon-text align-self-end">
                            <i class="mdi mdi-file-check btn-icon-prepend"></i> Unduh </a>
                        </li>

                        <li class="nav-item d-none d-lg-block full-screen-link">
                            <a class="nav-link">
                                <i
                                    class="mdi mdi-fullscreen"
                                    id="fullscreen-button"
                                ></i>
                            </a>
                      
                        <li class="nav-item nav-settings d-none d-lg-block">
                            <a class="nav-link" href="#">
                                <i class="mdi mdi-format-line-spacing"></i>
                            </a>
                        </li>
                    </ul>
                    <button
                        class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                        type="button"
                        data-toggle="offcanvas"
                    >
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>