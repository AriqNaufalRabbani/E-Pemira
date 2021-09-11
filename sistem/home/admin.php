<?php
  $sql = $koneksi->query("SELECT COUNT(id_kandidat) as tot_kandidat  from tb_kandidat");
  while ($data= $sql->fetch_assoc()) {
    $kandidat=$data['tot_kandidat'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pemilih) as tot_pemilih  from tb_pemilih where status='1'");
  while ($data= $sql->fetch_assoc()) {
    $pemilih=$data['tot_pemilih'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pemilih) as sudah  from tb_pemilih where status='1' and suara='0'");
  while ($data= $sql->fetch_assoc()) {
    $sudah=$data['sudah'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_pemilih) as belum  from tb_pemilih where status='1' and suara='1'");
  while ($data= $sql->fetch_assoc()) {
    $belum=$data['belum'];
  }

?>

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Small boxes (Stat box) -->
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $kandidat; ?></h3>

                <p>Jumlah Kandidat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $pemilih; ?></h3>

                <p>Jumlah Pemilih</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $sudah; ?></h3>

                <p>Sudah Pemilih</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $belum; ?></h3>

                <p>Belum Memilih</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">

                <!-- Custom tabs (Charts with tabs)-->
                  <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">
                          <i class="fas fa-chart-pie mr-1"></i>
                          Jumlah Suara
                        </h3>
                        <div class="card-tools">
                          <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                              <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Bar</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                            </li>
                          </ul>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content p-0">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="revenue-chart"
                              style="position: relative; height: 300px;">
                              <canvas id="barChart" height="300" style="height: 300px;"></canvas>
                          </div>
                          <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <canvas id="donutChart" height="300" style="height: 300px;"></canvas>
                          </div>
                        </div>
                      </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>

    