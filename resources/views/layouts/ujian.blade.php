<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>PPDB</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('atlantis/assets/img/icon.ico')}}" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="{{asset('atlantis/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: [ '{{asset('atlantis/assets/css/fonts.min.css')}}' ]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/atlantis.min.css')}}">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('atlantis/assets/css/demo.css')}}">
</head>
<style>
	.sidebar-light .sidebar-menu .sidebar-small-cap {
		color: #28a745;
	}

	.sidebar-light .sidebar-menu .dropdown-toggle:hover, .sidebar-light .sidebar-menu .show>.dropdown-toggle, .sidebar-light .sidebar-menu .submenu li a.active, .sidebar-light .sidebar-menu .submenu li a:hover {
		background-color: #28a745;
	}

	.sidebar-light .sidebar-menu>ul>li>.dropdown-toggle.active {
		background-color: #28a745;
		font-weight: bold;
	}

	.brand-logo-text {
		color: #28a745 !important;
		font-weight: bold !important;
	}

	.pre-loader .bar {
		background-color: #28a745;
	}

	.brand-title {
		color: #28a745;
		font-size: 2rem;
	}

	.brand-logo {
		border-bottom: none;
	}

	.sidebar-light .menu-block .mCS-dark-2.mCSB_scrollTools .mCSB_draggerRail {
		background-color: #e4e4e4;
	}

	.left-side-bar .mCS-dark-2.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
		background-color: #28a745;
	}

	.custom-file-input:focus, .custom-select:focus, .form-control:focus {
		border-color: #28a745;
	}

	.page-item.active .page-link {
		background-color: #28a745;
		border-color: #28a745;
	}

	.page-link {
		color: #28a745;
	}

	.blog-list ul li:hover .blog-caption h4 a, .fontawesome-icon-list .fa-hover:hover a, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:after {
		color: #28a745;
	}
	
	.main-container {
		padding: 80px 20px;
	}

	.header {
		width: 100%;
	}

	@media (max-width: 1024px) {
		.header-left {
			width: 75%;
		}

		.header-right {
			width: 25%;
		}

		.pd-ltr-20 {
			padding: 0px;
		}

		.col-xl-8 {
			padding: 0px;
		}

		.navbar-brand {
			display: none;
		}
	}

</style>
<body>
	<div class="wrapper">
		@include('layouts.nav-ujian')
		<!-- Sidebar -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
		<div class="main-panel w-100">
			@yield('content')
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>				
				</div>
			</footer>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('atlantis/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/core/bootstrap.min.js')}}"></script>
	<!-- jQuery UI -->
	<script src="{{asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
	
	<!-- jQuery Scrollbar -->
	<script src="{{asset('atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
	<!-- Datatables -->
	<script src="{{asset('atlantis/assets/js/plugin/datatables/datatables.min.js')}}"></script>
	<!-- Atlantis JS -->
	<script src="{{asset('atlantis/assets/js/atlantis.min.js')}}"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset('atlantis/assets/js/setting-demo2.js')}}"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
    @stack('scripts')
</body>
</html>