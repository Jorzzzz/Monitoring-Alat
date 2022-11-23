<?php 
	session_start();
	include '../dbconnect.php';
	?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Input Data - BMKG Sorong</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="icon" href="images/bmkglogo.ico" type="image/ico" sizes="32x32">-->
    <link rel="icon" href="https://bmkgkotim.info/wp-content/uploads/2018/05/cropped-logo-aja-1-32x32.png" sizes="32x32" />
    <!--<link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
	
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
							<li class="active"><a href="index.php"><span>Home</span></a></li>
							
							<li><a href="../"><span>Halaman Awal</span></a></li>
							<li>
                                <a href="javascript:void(0)" aria-expanded="true"><img src="../images/bmkglogo.png" alt="HTML tutorial" style="width:30px;height:20px;"><span>Kelola Data
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kategori.php">Bagian</a></li>
                                    <li><a href="vendor.php">Data</a></li>
									
                                </ul>
                            </li>
                            <li><a href="user.php"><span>Kelola Stasiun</span></a></li>
							<li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                          
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
			
			
			<!-- header area end -->
			<?php 
			/*
				$periksa_bahan=mysqli_query($conn,"select * from stock_brg where stock <10");
				while($p=mysqli_fetch_array($periksa_bahan)){	
					if($p['stock']>=1){	
						?>	
						<script>
							$(document).ready(function(){
								$('#pesan_sedia').css("color","white");
								$('#pesan_sedia').append("<i class='ti-flag'></i>");
							});
						</script>
						<?php
						echo "<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Stok  <strong><u>".$p['nama']. "</u> <u>".($p['jenis'])."</u></strong> yang tersisa kurang dari 10</div>";		
					}
				}
				
				*/
				?>
			
            
           
                
                
                <!-- overview area end -->
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h1>Selamat Datang</h1>
                                </div>
                                <div class="market-status-table mt-4">
                                    
									<p>Pada Halaman ini Anda dapat memasukan Data dalam memonitoring Perangkat Keras (Alat) BMKG Sorong 
                                    </p>
                                </div>
                                <div>
                                    <p>Dengan cara menekan tombol Tambah Data di bawah ini :</p>
                                </div>
                                <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2 mt-4">Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
		
		
		
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>BMKG Sorong</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
        <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                        </div>
                        
                        <div class="modal-body">
                        <form action="vendor.php" method="post" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" class="form-control" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Nama Alat</label>
                                    <input name="namaalat" type="text" class="form-control" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Bagian</label>
                                    <select name="idkategori" class="form-control">
                                    <option selected>Pilih Bagian</option>
                                    <?php
                                    $det=mysqli_query($conn,"select * from kategori order by namakategori ASC")or die(mysqli_error());
                                    while($d=mysqli_fetch_array($det)){
                                    ?>
                                        <option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
                                        <?php
                                }
                                ?>      
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Kondisi</label>
                                <select name="kondisi" class="form-control">
                                    <option selected>Pilih Kondisi</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                    <option value="Lain-Lain">Lain-Lain</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input name="deskripsi" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input name="uploadgambar" type="file" class="form-control">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input name="addproduct" type="submit" class="btn btn-primary" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
    <script>
    $(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
    } );
    </script>

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
