<!-- BOF ASIDE-LEFT -->
<div id="sidebar" class="sidebar" style="height: 500vh;">
    <div class="sidebar-content">
        <!-- sidebar-menu  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    Categories
                </li>
                @if (Auth::user()->user_type == 1)
                    <li>
                        <a href="/admin/dashboard">
                            <i class="ti-dashboard"></i>
                            <span class="menu-text">Dashboard
                                {{ Auth::user()->user_type == 1 ? 'true' : 'false' }}</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type == 2)
                    <li>
                        <a href="/fund_manager/dashboard">
                            <i class="ti-dashboard"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type == 3)
                    <li>
                        <a href="/transaction_recorder/dashboard">
                            <i class="ti-dashboard"></i>
                            <span class="menu-text">Dashboard</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type == 1)
                    <li class="maincat">
                        <a href="#">
                            <i class="fa fa-user-o"></i>
                            <span class="menu-text">Users</span>
                        </a>
                        <div class="subcat">
                            <ul>
                                <li>
                                    <a href="/admin/users/create">Add User</a>
                                </li>
                                <li>
                                    <a href="/admin/users">User's Lists</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->user_type == 1)
                    <li
                        class="maincat  {{ request()->is('admin/projects') || request()->is('admin/projects/create') || request()->is('admin/projects/*/edit') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-cubes"></i>
                            <span class="menu-text">Projects</span>
                        </a>
                        <div class="subcat">
                            <ul>
                                <li class=" {{ request()->is('admin/projects/create') ? 'active' : '' }}">
                                    <a href="/admin/projects/create">Add Project</a>
                                </li>
                                <li
                                    class=" {{ request()->is('admin/projects') || request()->is('admin/projects/*/edit') ? 'active' : '' }}">
                                    <a href="/admin/projects">Projects' Lists</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->user_type == 2)
                    <li
                        class="maincat  {{ request()->is('fund_manager/projects') || request()->is('fund_manager/projects/create') || request()->is('fund_manager/projects/*/edit') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-cubes"></i>
                            <span class="menu-text">Projects</span>
                        </a>
                        <div class="subcat">
                            <ul>
                                <li class=" {{ request()->is('fund_manager/projects/create') ? 'active' : '' }}">
                                    <a href="/fund_manager/projects/create">Add Project</a>
                                </li>
                                <li
                                    class=" {{ request()->is('fund_manager/projects') || request()->is('fund_manager/projects/*/edit') ? 'active' : '' }}">
                                    <a href="/fund_manager/projects">Projects' Lists</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->user_type == 1)
                    <li
                        class="maincat {{ request()->is('/admin/purchases') || request()->is('/admin/purchases/create') || request()->is('/admin/purchases/*/edit') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-building"></i>
                            <span class="menu-text">Purchase</span>
                        </a>
                        <div class="subcat">
                            <ul>
                                <li class=" {{ request()->is('admin/purchases/create') ? 'active' : '' }}">
                                    <a href="/admin/purchases/create">Add Purchase</a>
                                </li>
                                <li
                                    class=" {{ request()->is('admin/purchases') || request()->is('admin/purchases/*/edit') ? 'active' : '' }}">
                                    <a href="/admin/purchases">Purchase' Lists</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->user_type == 3)
                    <li
                        class="maincat {{ request()->is('/transaction_recorder/purchases') || request()->is('/transaction_recorder/purchases/create') || request()->is('/transaction_recorder/purchases/*/edit') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-building"></i>
                            <span class="menu-text">Purchase</span>
                        </a>
                        <div class="subcat">
                            <ul>
                                <li
                                    class=" {{ request()->is('transaction_recorder/purchases/create') ? 'active' : '' }}">
                                    <a href="/transaction_recorder/purchases/create">Add Purchase</a>
                                </li>
                                <li
                                    class=" {{ request()->is('transaction_recorder/purchases') || request()->is('transaction_recorder/purchases/*/edit') ? 'active' : '' }}">
                                    <a href="/transaction_recorder/purchases">Purchase' Lists</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if (Auth::user()->user_type == 1)
                    <li
                        class="maincat {{ request()->is('/admin/cheques') || request()->is('/admin/cheques/create') || request()->is('/admin/cheques/*/edit') ? 'active' : '' }}"">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span class="menu-text">Cheques</span>
                        </a>
                        <div class="subcat">
                            <ul>
                                <li class=" {{ request()->is('admin/cheques/create') ? 'active' : '' }}">
                                    <a href="/admin/cheques/create">Add Cheques</a>
                                </li>
                                <li
                                    class=" {{ request()->is('admin/cheques') || request()->is('admin/cheques/*/edit') ? 'active' : '' }}">
                                    <a href="/admin/cheques">Cheques' Lists</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->user_type == 2)
                    <li
                        class="maincat {{ request()->is('/fund_manager/cheques') || request()->is('/fund_manager/cheques/create') || request()->is('/fund_manager/cheques/*/edit') ? 'active' : '' }}"">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span class="menu-text">Cheques</span>
                        </a>
                        <div class="subcat">
                            <ul>
                                <li class=" {{ request()->is('fund_manager/cheques/create') ? 'active' : '' }}">
                                    <a href="/fund_manager/cheques/create">Add Cheques</a>
                                </li>
                                <li
                                    class=" {{ request()->is('fund_manager/cheques') || request()->is('fund_manager/cheques/*/edit') ? 'active' : '' }}">
                                    <a href="/fund_manager/cheques">Cheques' Lists</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (Auth::user()->user_type == 1)
                    <li class="active">
                        <a href="/admin/logs">
                            <i class="fa fa-line-chart"></i>
                            <span class="menu-text">Logs</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type == 2)
                    <li class="active">
                        <a href="/fund_manager/logs">
                            <i class="fa fa-line-chart"></i>
                            <span class="menu-text">Logs</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->user_type == 3)
                    <li class="active">
                        <a href="/transaction_recorder/logs">
                            <i class="fa fa-line-chart"></i>
                            <span class="menu-text">Logs</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>

        <!-- sidebar-menu  -->
    </div>
</div>
<!-- EOF ASIDE-LEFT -->
