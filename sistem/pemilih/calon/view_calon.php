<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kandidat WHERE id_kandidat='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		
		$kode=$_GET['kode'];
    }
?>

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?page=PsSQAdT">Bilik Suara</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Detail</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-borderless">
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_kandidat where id_kandidat=$kode");
					while ($data= $sql->fetch_assoc()) {
					?>
                    <tr>
                        <td>No Urut</td>
                        <td> : </td>
                        <td><?php echo $data['id_kandidat']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Paslon</td>
                        <td> : </td>
                        <td><?php echo $data['nama_paslon']; ?></td>
                    </tr>
                    <tr>
                        <td>Visi</td>
                        <td> : </td>
                        <td><?php echo $data['visi']; ?></td>
                    </tr>
                    <tr>
                        <td>Misi</td>
                        <td> : </td>
                        <td><?php echo $data['misi']; ?></td>
                    </tr>

					<?php
              }
            ?>
				</tbody>
			</table>
            <div>
				<a href="?page=PsSQAdT" class="btn btn-secondary btn-sm">
					< Kembali</a>
			</div>
			<br>
		</div>
	</div>
	<!-- /.card-body -->