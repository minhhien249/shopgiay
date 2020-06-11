<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="/backend/assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="/backend/assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">Nik Patel</h6>
            <span class="pro-user-desc">Administrator</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="pages-profile.html" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Account</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                    <span>Settings</span>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                    <span>Support</span>
                </a>

                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Lock Screen</span>
                </a>

                <div class="dropdown-divider"></div>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="/">
                        <i data-feather="home"></i>
                        <span class="badge badge-success float-right">1</span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                <a href="{{ route('admin.category.index')}}">
                        <i data-feather="calendar"></i>
                        <span> Danh Mục </span>
                    </a>
                </li>
                <li>
                <a href="{{route('admin.product.index')}}">
                        <i data-feather="inbox"></i>
                        <span> Sản Phẩm </span>

                    </a>
                </li>
                <li>
                    <a href="{{route('admin.banner.index')}}">
                        <i data-feather="briefcase"></i>
                        <span> Banner  </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.brand.index')}}">
                        <i data-feather="bookmark"></i>
                        <span>Thương Hiệu</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.blog.index')}}">
                        <i data-feather="file-text"></i>
                        <span> Blog </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.user.index')}}">
                        <i data-feather="layout"></i>
                        <span> User </span>

                    </a>
                </li>
                <li>
                    <a href="{{route('admin.vendor.index')}}">
                        <i data-feather="grid"></i>
                        <span>Nhà Cung Cấp</span>

                    </a>
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="package"></i>
                        <span> UI Elements </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="components-bootstrap.html">Bootstrap UI</a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false">Icons
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-third-level" aria-expanded="false">
                                <li>
                                    <a href="icons-feather.html">Feather Icons</a>
                                </li>
                                <li>
                                    <a href="icons-unicons.html">Unicons Icons</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="widgets.html">Widgets</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" aria-expanded="false">
                        <i data-feather="file-text"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="forms-basic.html">Basic Elements</a>
                        </li>
                        <li>
                            <a href="forms-advanced.html">Advanced</a>
                        </li>
                        <li>
                            <a href="forms-validation.html">Validation</a>
                        </li>
                        <li>
                            <a href="forms-wizard.html">Wizard</a>
                        </li>
                        <li>
                            <a href="forms-editor.html">Editor</a>
                        </li>
                        <li>
                            <a href="forms-file-uploads.html">File Uploads</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="charts-apex.html" aria-expanded="false">
                        <i data-feather="pie-chart"></i>
                        <span> Charts </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" aria-expanded="false">
                        <i data-feather="grid"></i>
                        <span> Tables </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="tables-basic.html">Basic</a>
                        </li>
                        <li>
                            <a href="tables-datatables.html">Advanced</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
