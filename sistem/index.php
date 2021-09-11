<?php
    //Mulai Sesion
    session_start();
    if (isset($_SESSION["ses-username"])==""){
	header("location: login.php");
    
    }else{
      $data_id = $_SESSION["ses-id"];
      $data_nama = $_SESSION["ses-nama"];
      $data_user = $_SESSION["ses-username"];
      $data_level = $_SESSION["ses-level"];
      $data_status = $_SESSION["ses-status"];
      $data_jenis = $_SESSION["ses-jenis"];
    }

    //KONEKSI DB
    include "../koneksi.php";

    $kandidat = mysqli_query($koneksi,"select * from tb_kandidat");
      while($row = mysqli_fetch_array($kandidat)){
    	$nama_paslon[] = $row['nama_paslon'];

      $query = mysqli_query($koneksi,"SELECT COUNT(id_vote) as jumlah from tb_vote  where id_kandidat='".$row['id_kandidat']."'");
      $row = $query->fetch_array();
      $jumlah_suara[] = $row['jumlah'];
	
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Pemira | Dashboard</title>

  <link rel="stylesheet" href="../assets/css/switchdarkmode.css">

  <!-- Favicons -->
  <link href="../assets/img/pemira.png" rel="icon">
  <link href="../assets/img/pemira.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- Alert -->
  <script src="plugins/alert.js"></script>
  <script>
		setInterval(function() {
			$(".realtime").load("admin/suara/data_suara.php").fadeIn("slow");
		}, 1000);
	</script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
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


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">
            <b>Sistem Informasi Pemungutan Suara Berbasis Online</b>
          </a>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../assets/img/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Pemira 2021/2022</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="index.php" class="d-block">
				<?php echo $data_nama; ?>
			</a>
			<span class="badge badge-success">
				<?php echo $data_level; ?>
			</span>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <!-- Level  -->
               <!-- Menu Admin -->
						<?php
              if ($data_level=="Administrator"){
            ?>
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Kelola Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=data-calon" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kandidat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=data-pemilih" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pemilih</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="?page=data-suara" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Quick Count
                  <span class="right badge badge-warning">QC</span>
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="?page=PsSQAdT" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Bilik Suara
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="?page=data-kotak" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Kotak Suara
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=daftar-kandidat" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Kandidat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=daftar-pemilih" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Pemilih</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=perolehan-suara" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perolehan Suara</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">Settings</li>
            <li class="nav-item">
                <a href="?page=data-pengguna" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                  Users
                </p>
              </a>
            </li>

            <!-- Menu Petugas -->
            <?php
          			} elseif($data_level=="Petugas"){
          	?>
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Kelola Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=data-calon" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Kandidat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=data-pemilih" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pemilih</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="?page=data-suara" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Quick Count
                  <span class="right badge badge-warning">QC</span>
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="?page=data-kotak" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Kotak Suara
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=daftar-kandidat" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Kandidat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=daftar-pemilih" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Pemilih</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=perolehan-suara" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perolehan Suara</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-header">Settings</li>

            <!-- Menu Pemilih -->
            <?php
          		} elseif($data_level=="Pemilih"){
        		?>
            <li class="nav-item">
              <a href="?page=PsSQAdT" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Bilik Suara
                </p>
              </a>
            </li>

            <li class="nav-header">Setting</li>
						<?php
							}
						?>


            <li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
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
    <section class="content">
      <div class="container-fluid">
      <?php 
      if(isset($_GET['page'])){
          $hal = $_GET['page'];
  
          switch ($hal) {
              //Klik Halaman Home Pengguna
              	case 'admin':
                  include "home/admin.php";
                  break;
              	case 'petugas':
                  include "home/bendahara.php";
                  break;
                case 'pemilih':
                  include "home/pemilih.php";
                  break;

                //Pengguna
                case 'data-pengguna':
                  include "admin/pengguna/data_pengguna.php";
                  break;
                case 'add-pengguna':
                  include "admin/pengguna/add_pengguna.php";
                  break;
                case 'edit-pengguna':
                  include "admin/pengguna/edit_pengguna.php";
                  break;
                case 'del-pengguna':
                  include "admin/pengguna/del_pengguna.php";
                  break;
                  
                  //calon
                case 'data-calon':
                  include "admin/calon/data_calon.php";
                  break;
                case 'add-calon':
                  include "admin/calon/add_calon.php";
                  break;
                case 'edit-calon':
                  include "admin/calon/edit_calon.php";
                  break; 
                case 'del-calon':
                  include "admin/calon/del_calon.php";
                  break;
                  
                  //Pemilih
                case 'data-pemilih':
                  include "admin/pemilih/data_pemilih.php";
                  break;
                case 'admit-data':
                  include "admin/pemilih/admit_data.php";
                  break;
                case 'del-pemilih':
                  include "admin/pemilih/del_pemilih.php";
                  break;

                  
                  //Bilik suara
                case 'PsSQAdT':
                  include "pemilih/calon/data_calon.php";
                  break;
                case 'PsSQBpL':
                  include "pemilih/calon/pilih_calon.php";
                  break;
                case 'PsSQBBK':
                  include "pemilih/calon/buka_calon.php";
                  break;
                case 'view':
                  include "pemilih/calon/view_calon.php";
                  break;
                  
                //Kotak suara
                case 'data-kotak':
                  include "admin/kotak/data_kotak.php";
                  break;
                case 'data-suara':
                  include "admin/suara/data_suara.php";
                  break;

                //Laporan
                case 'daftar-kandidat':
                  include "admin/laporan/daftar_kandidat.php";
                  break;
                case 'daftar-pemilih':
                  include "admin/laporan/daftar_pemilih.php";
                  break;
                case 'perolehan-suara':
                  include "admin/laporan/perolehan_suara.php";
                  break;


                  
                      //default
                      default:
                          echo "<center><h1> ERROR !</h1></center>";
                          break;    
                  }
              }else{
                // Auto Halaman Home Pengguna
                  if($data_level=="Administrator"){
                      include "home/admin.php";
                      }
                  elseif($data_level=="Pemilih"){
                      include "home/pemilih.php";
                      }
                  }
            ?>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Ariq Naufal Rabbani</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>


<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>


<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */


    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: <?php echo json_encode($nama_paslon); ?>,
      datasets: [
        {
          data: <?php echo json_encode($jumlah_suara); ?>,
          backgroundColor : ['#3c8dbc', '#d2d6de', '#f56954', '#00c0ef', '#f39c12', '#00a65a'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData        = {
      labels: <?php echo json_encode($nama_paslon); ?>,
      datasets: [
        {
          label: "Jumlah",
          data: <?php echo json_encode($jumlah_suara); ?>,
          backgroundColor : [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'],
        }
      ]
    };

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      },
      legend: {
              display: false
            },
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
</script>

</body>
</html>
