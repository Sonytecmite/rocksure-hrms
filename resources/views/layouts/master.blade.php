<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Rocksure HRM System | Admin Dashboard</title>
		<link rel="stylesheet" href="/css/app.css" rel="stylesheet">
	</head>
	<body class="hold-transition sidebar-mini " style="height: auto">
		<div class="wrapper" id="app">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">

				<ul class="navbar-nav">
					<li class="nav-item">
        				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      				</li>
				</ul>
				<!-- SEARCH FORM -->
				<form class="form-inline ml-3">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
						</div>
					</div>
				</form>
			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="index3.html" class="brand-link">
					<img src="/img/rocksure.png" alt="Rocksure Logo" class="brand-image"
						style="opacity: .8">
						<br>
				</a>

				<!-- Sidebar -->
				<div class="sidebar sidebar-dark-primary elevation-4">
                    
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/burglar.png" class="img-circle elevation-2 mt-2" alt="User Image">
                    </div>
                    <div class="info">
                        <span class="yellow">Logged in as:</span>
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>
                    
                        <li class="nav-item">
                            <router-link href="#" to="/add-employee" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Add New Employee</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link href="#" to="/employees-list" class="nav-link">
                                <i class="nav-icon fas fa-arrow-alt-circle-down"></i>
                                <p>Employees List</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link href="#" to="/employees-contacts" class="nav-link">
                                <i class="nav-icon fas fa-phone-square-alt"></i>
                                <p>Contacts</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link href="#" to="/employees-education" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Educational Information</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link href="#" to="/employment-history" class="nav-link">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>Employment History</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link href="#" to="/employees-dependants" class="nav-link">
                                <i class="nav-icon fas fa-donate"></i>
                                <p>Employees Dependants</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link href="#" to="/employees-beneficiary" class="nav-link">
                                <i class="nav-icon fas fa-gift"></i>
                                <p>Beneficiary</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link href="#" to="/employees-nextofkins" class="nav-link">
                                <i class="nav-icon fas fa-gift"></i>
                                <p>Next of Kins</p>
                            </router-link>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/users" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Users</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/employees-accounts-details" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Accounts Details</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/attendance" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Attendance</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link href="#" to="/calender" class="nav-link">
                                        <i class="nav-icon fas fa-door-open"></i>
                                        <p>Calender</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/departments" class="nav-link">
                                        <i class="fas fa-building nav-icon"></i>
                                        <p>Departments</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/sites" class="nav-link">
                                        <i class="fas fa-hard-hat nav-icon"></i>
                                        <p>Mine Sites</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/medical-history" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Medical History</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/employees-salary" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Salary Info</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/employees-transfer-history" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Transfer History</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/employees-change-of-status" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Change of Status History</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/payroll" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Payroll</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/employees-upgrade-history" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Upgrage History</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/disciplinary-actions" class="nav-link">
                                        <i class="fas fa-ambulance nav-icon"></i>
                                        <p>Disciplinary Actions</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/concerns" class="nav-link">
                                        <i class="fas fa-address-card nav-icon"></i>
                                        <p>Workers Concerns</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/leaves" class="nav-link">
                                        <i class="fas fa-parachute-box nav-icon"></i>
                                        <p>Leaves</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <router-link to="/profile" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                <i class="nav-icon fas fa-power-off"></i>
                                <p>
                                    {{ __('Logout') }}
                                </p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
				<!-- /.sidebar -->
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">

				<!-- Main content -->
				<div class="content">
					<div class="container-fluid">
                        <!-- Display content from server  -->
						<router-view></router-view>

                        <!-- set progressbar -->
                        <vue-progress-bar></vue-progress-bar>
					</div><!-- /.container-fluid --> 
				</div>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<!-- Main Footer -->
			<footer class="main-footer">
				<!-- Default to the left -->
				<strong>Copyright &copy; 2020 <a href="#">Rocksure International</a>.</strong> All rights reserved.
			</footer>
		</div>
		<script src="/js/app.js"></script>
	</body>
</html>
