<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="#" class="logo">
            <span>
                <img src="{{ asset('admin/assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="{{ asset('admin/assets/images/logo-light.png') }}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{ asset('admin/assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
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
                    @canany(['dashboard', 'dashboard_create', 'dashboard_read', 'dashboard_edit', 'dashboard_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="iconoir-report-columns menu-icon"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['god_eye', 'god_eye_create', 'god_eye_read', 'god_eye_edit', 'god_eye_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.god-eye.index') }}">
                                <i class="iconoir-eye menu-icon"></i> <!-- Eye icon -->

                                <span>God's Eye</span>
                            </a>
                        </li>
                    @endcanany


                    <li class="menu-label mt-2">
                        <span>Account Management</span>
                    </li>
                    @canany(['employee', 'employee_create', 'employee_read', 'employee_edit', 'employee_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.user.index') }}">
                                <i class="iconoir-user menu-icon"></i> <!-- User icon -->
                                <span>Employee</span>
                            </a>
                        </li>
                    @endcanany

                    @canany(['guard', 'guard_create', 'guard_read', 'guard_edit', 'guard_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.guard.index') }}">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>Guard</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['user_enquiry', 'user_enquiry_create', 'user_enquiry_read', 'user_enquiry_edit',
                        'user_enquiry_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.enquiry.index') }}">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>User Enquiry</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['customer', 'customer_create', 'customer_read', 'customer_edit', 'customer_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.customer.index') }}">
                                <i class="iconoir-user-circle menu-icon"></i> <!-- User circle icon -->
                                <span>Customer</span>
                            </a>
                        </li>
                    @endcanany
                    <li class="menu-label mt-2">
                        <span>App Management</span>
                    </li>
                    @canany(['coupan', 'coupan_create', 'coupan_read', 'coupan_edit', 'coupan_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.coupan.index') }}">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>Coupan</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['wallet', 'wallet_create', 'wallet_read', 'wallet_edit', 'wallet_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.wallet.index') }}">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>Wallet</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['faq', 'faq_create', 'faq_read', 'faq_edit', 'faq_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.faq.index') }}">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>Faq's</span>
                            </a>
                        </li>
                    @endcanany


                    <li class="menu-label mt-2">
                        <span>Parking Management</span>
                    </li>
                    @canany(['parking_facilities', 'parking_facilities_create', 'parking_facilities_read',
                        'parking_facilities_edit', 'parking_facilities_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.parking-facility.index') }}">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>Parking Facilities</span>
                            </a>
                        </li>
                    @endcanany
                    @canany(['parking', 'parking_create', 'parking_read', 'parking_edit',
                        'parking_delete'])
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.parking.index') }}">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>Parking List</span>
                            </a>
                        </li>
                    @endcanany
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarVehicle" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAnalytics">
                                <i class="iconoir-reports menu-icon"></i>
                                <span>Vehicle Settings</span>
                            </a>
                            <div class="collapse " id="sidebarVehicle">
                                <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.brand.index') }}" class="nav-link ">Brand</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.model.index') }}" class="nav-link ">Model</a>
                                        </li>
                                </ul><!--end nav-->
                            </div>
                        </li>


                    <li class="menu-label mt-2">
                        <span>Setting Management</span>
                    </li>
                    @canany(['business_setting'])
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarBusinessSetup" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAnalytics">
                                <i class="iconoir-reports menu-icon"></i>
                                <span>Business Setup</span>
                            </a>
                            <div class="collapse " id="sidebarBusinessSetup">
                                <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.business-setting.index') }}" class="nav-link ">Business
                                                Setting</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.business-page.index') }}" class="nav-link ">Business
                                                Pages</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.social-media.index') }}" class="nav-link ">Social Media
                                                Links</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.third-party.index') }}" class="nav-link ">Third Party
                                                API</a>
                                        </li>
                                </ul>
                            </div>
                        </li>
                    @endcanany

                    @role(['admin', 'super admin'])
                        @canany(['role', 'role_create', 'role_read', 'role_edit', 'role_delete', 'permission',
                            'permission_create', 'permission_read', 'permission_edit', 'permission_delete',
                            'role_has_permission', 'role_has_permission_create', 'role_has_permission_read',
                            'role_has_permission_edit', 'role_has_permission_delete'])
                            <li class="nav-item">
                                <a class="nav-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false" aria-controls="sidebarAnalytics">
                                    <i class="iconoir-reports menu-icon"></i>
                                    <span>Role & Permission</span>
                                </a>
                                <div class="collapse " id="sidebarAnalytics">
                                    <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('admin.role.index') }}" class="nav-link ">Role</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('admin.permissions.index') }}" class="nav-link ">Permission</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('admin.rolePermission') }}" class="nav-link ">Role Has
                                                    Permission</a>
                                            </li>
                                    </ul><!--end nav-->
                                </div>
                            </li>
                        @endcanany

                    @endrole




                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.order-status.index') }}">
                                <i class="iconoir-chat-bubble menu-icon"></i>
                                <span>Order Status</span>
                            </a>
                        </li>

                </ul><!--end navbar-nav--->

            </div>
        </div><!--end startbar-collapse-->
    </div><!--end startbar-menu-->
</div>
