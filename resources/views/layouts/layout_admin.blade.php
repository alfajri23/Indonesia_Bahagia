<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="EduZone - Bootstrap Admin Dashboard" />
	<meta property="og:title" content="EduZone - Bootstrap Admin Dashboard" />
	<meta property="og:description" content="EduZone - Bootstrap Admin Dashboard" />
	<meta property="og:image" content="https://eduzone.dexignzone.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
    <title>EduZone - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon1.png">
    {{-- <link rel="stylesheet" href="vendor/jqvmap/css/jqvmap.min.css"> --}}
	{{-- <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
	<link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css"> --}}
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/skin-2.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': `Bearer {{Session::get('token')}}`
            }
        });
    </script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
   
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header bg-white">
            <a href="{{route("homeAdmin")}}" class="brand-logo">
                <img class="logo-abbr" src="https://img.freepik.com/free-vector/flat-design-illustration-customer-support_23-2148887720.jpg?t=st=1657605843~exp=1657606443~hmac=da83f8897c0bb54bf255e4258ad8a6b7533ef7b66e50f19c6e482cdcdd4a8537&w=740" alt="">
                <img class="logo-compact" src="https://img.freepik.com/free-vector/flat-design-illustration-customer-support_23-2148887720.jpg?t=st=1657605843~exp=1657606443~hmac=da83f8897c0bb54bf255e4258ad8a6b7533ef7b66e50f19c6e482cdcdd4a8537&w=740" alt="">
                {{-- <img class="brand-title" src="https://img.freepik.com/free-vector/flat-design-illustration-customer-support_23-2148887720.jpg?t=st=1657605843~exp=1657606443~hmac=da83f8897c0bb54bf255e4258ad8a6b7533ef7b66e50f19c6e482cdcdd4a8537&w=740" alt=""> --}}
                <h4 class="brand-title text-primary fw-bold fs-3 mb-0">Admin</h4>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-bs-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
										<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
										<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
									</svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    <li><a class="ai-icon" href="{{route('transaksiAdmin',['tipe' => 'semua'])}}" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">Transaksi</span>
                        </a>
                    </li>
                    
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-home"></i>
							<span class="nav-text">Produk</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('eventAdmin')}}">Event</a></li>
                            <li><a href="{{route('layananKonsultasiAdmin')}}">Layanan konsultasi</a></li>
                        </ul>
                    </li>
					
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-user"></i>
							<span class="nav-text">Pendaftaran</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('pendaftaranEvent')}}">Event</a></li>
                            <li><a href="{{route('pendaftaranKonsultasi')}}">Konsultasi</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-users"></i>
							<span class="nav-text">Master</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('masterProgram')}}">Program</a></li>
                            <li><a href="{{route('masterKontak')}}">Kontak</a></li>
                            <li><a href="{{route('masterInformasi')}}">Informasi</a></li>
                            <li><a href="{{route('testimoniAdmin')}}">Testimoni</a></li>
                            
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="la la-users"></i>
                        <span class="nav-text">Setting</span>
                    </a>
                    <ul aria-expanded="false">
                        {{-- <li><a href="{{route('formSetting')}}">Form pendaftaran</a></li> --}}
                        <li><a href="{{route('masterBanner')}}">Banner</a></li>
                    </ul>
                </li>
                    
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-graduation-cap"></i>
							<span class="nav-text">Blog</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('blogAdmin')}}">Publish</a></li>
                            <li><a href="{{ route('blogAdminUnpublish') }}">Unpublish</a></li>
                        </ul>
                    </li>

					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-book"></i>
							<span class="nav-text">Akun</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('konsultanAdmin')}}">Konsultan</a></li>
                            <li><a href="{{route('adminAdmin')}}">Admin</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" aria-expanded="false">
							<i class="la la-desktop"></i>
							<span class="nav-text">Logout</span>
						</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    
                    
				</ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
			
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">DexignZone</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    {{-- <script src="vendor/global/global.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="vendor/peity/jquery.peity.min.js"></script>
    <script src="vendor/jquery-sparkline/jquery.sparkline.min.js"></script> --}}
    {{-- <script src="vendor/svganimation/vivus.min.js"></script>
    <script src="vendor/svganimation/svg.animation.js"></script> --}}

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/admin/deznav-init.js') }}"></script>
    {{-- <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script> --}}
    <script src="{{ asset('js/admin/custom.min.js') }}"></script>

    {{-- <script src="{{ asset('vendor/chart.js/Chart.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script> --}}
    
    <script src="{{ asset('js/admin/dashboard/dashboard-3.js') }}"></script>
    
    <script src="{{ asset('vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('vendor/svganimation/svg.animation.js') }}"></script>

	<script>

       
        //SWAL
        function swalAction(routes,tabel,id,pesan){
            let tabels = $('.tableEvent');
            swal({
            title: "Are you sure?",
            text: pesan,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type : 'GET',
                    url  : routes,
                    data : {
                        id : id
                    },
                    dataType: 'json',
                    success : (data)=>{
                        swal("Sukses", data.message, "warning");
                        tabel.DataTable().ajax.reload();
                    }
                })

            } else {
                swal("Aman", "Tidak ada perubahan", "success");
            }
        });
        }
        //End swall

        //SWAL
        function swalActionWithoutTable(routes,id,pesan){
            swal({
            title: "Are you sure?",
            text: pesan,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type : 'GET',
                    url  : routes,
                    data : {
                        id : id
                    },
                    dataType: 'json',
                    success : (data)=>{
                        return true;
                        swal("Sukses", data.message, "warning");
                    }
                })


            } else {
                swal("Aman", "Tidak ada perubahan", "success");
                return false;
            }
        });
        }
        //End swall
      
        
        //Number format
        String.prototype.reverse = function() {
                return this.split("").reverse().join("");
            }

            window.currencyFormat = function reformatText(input) {
                var x = input.value;
                x = x.replace(/,/g, ""); // Strip out all commas
                x = x.reverse();
                x = x.replace(/.../g, function(e) {
                    return e + ",";
                }); // Insert new commas
                x = x.reverse();
                x = x.replace(/^,/, ""); // Remove leading comma
                input.value = x;
            }
        //End number
    </script>
	
    
    
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    
    
	
</body>
</html>