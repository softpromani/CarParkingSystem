<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="index.html" class="logo">
            <span>
                <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label mt-2">
                        <span>Navigation</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Dashboard</span>
                            <span class="badge text-bg-warning ms-auto">08</span>
                        </a>
                    </li><!--end nav-item-->

                    <li class="nav-item">
                        <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAnalytics">
                            <i class="iconoir-reports menu-icon"></i>
                            <span>Analytics</span>
                        </a>
                        <div class="collapse " id="sidebarAnalytics">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="analytics-customers.html" class="nav-link ">Create</a>
                                </li><!--end nav-item-->
                                <li class="nav-item">
                                    <a href="analytics-reports.html" class="nav-link ">View</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div>
                    </li><!--end nav-item-->

                    <li class="nav-item">
                        <a class="nav-link" href="apps-chat.html">
                            <i class="iconoir-chat-bubble menu-icon"></i>
                            <span>Users</span>
                        </a>
                    </li><!--end nav-item-->

                </ul><!--end navbar-nav--->
                <div class="update-msg text-center">
                    <div
                        class="d-flex justify-content-center align-items-center thumb-lg update-icon-box  rounded-circle mx-auto">
                        <img src="assets/images/extra/party.gif" alt="" class="d-inline-block me-1"
                            height="30">
                    </div>
                    <h5 class="mt-3">Mannat Themes</h5>
                    <p class="mb-3 text-muted">Mifty is a high quality web applications.</p>
                    <a href="javascript: void(0);" class="btn bg-black text-white shadow-sm rounded-pill">Upgrade
                        your plan</a>
                </div>
            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->
</div>
