<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Free Responsive Admin Theme - ZONTAL</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    @if(Session::get('exam'))
    <link href="assets/css/custom.css" rel="stylesheet" />
    @endif
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('style')
</head>
<body>
    @if(Session::get('exam'))
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <div class="timer" align="right">
                                <div id="clockdiv">
                
                                    <span class="keterangan" align="center"><h3 align="center">Sisa Waktu</h3></span>
                                
                                  <div>
                                    <span class="hours"></span>
                                    <div class="smalltext">Jam</div>
                                  </div>
                                  <div>
                                    <span class="minutes"></span>
                                    <div class="smalltext">Menit</div>
                                  </div>
                                  <div>
                                    <span class="seconds"></span>
                                    <div class="smalltext">Detik</div>
                                  </div>
                                </div>
                            </div>
                </div>
                <div style="position:absolute; z-index:100; top:5px; right: 40% ;background-color:rgba(255,255,255,0.9); border-style:solid; border-width:2px;" class="panel">
                    <div class="col-xs-2 text-center">
                        <strong style="color:#337ab7">Batas Waktu<br>90 Menit</strong>
                    </div>
                    <div class="col-xs-2 text-center">
                        <strong style="color:#337ab7">Jumlah Soal<br><span id="jum_soal">100</span></strong>
                    </div>
                    <div class="col-xs-2 text-center">
                        <strong><span style="color:#090">Soal Dijawab<br><span id="soal_dijawab">0</span></span></strong>
                    </div>
                    <div class="col-xs-2 text-center">
                        <strong><span style="color:#F00">Belum Dijawab<br><span id="soal_belum_dijawab">0</span></span></strong>
                    </div>
                    <div class="col-xs-4 text-center" style=" padding:17px">
                        <button type="button" class="btn btn-default" id="btnSelesaiUjian">Selesai Ujian</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END-->
    @else
    <div class="navbar navbar-inverse set-radius-zero">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        Computer Assistent Test
                    </a>
        
                </div>
        
                {{-- <div class="left-div">
                    {{-- <i class="fa fa-user-plus login-icon" ></i> 
                </div> --}}
                @if(Session::get('id'))
                <div class="right-div">
                    <a href="logout" class="btn btn-primary">Logout</a>
                </div>
                @endif
                </div>
            </div>
        <!-- LOGO HEADER END-->
    @endif
    @yield('content');
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; {{ date('Y') }} | henkiws.github.io | Version 2.0.0
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    @if(Session::get('exam'))
    <script src="assets/js/custom.js"></script>
    @endif
    @yield('script')
</body>
</html>
