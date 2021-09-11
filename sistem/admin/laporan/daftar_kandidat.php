<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar Kandidat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Daftar Kandidat</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="laporan/cetak_kandidat.php" target="_blank" class="btn btn-primary">
					<i class="fa fa-edit"></i> Export to PDF</a>
			</div>
			<br>
			<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No Urut</th>
						<th width="15%">Nama Paslon</th>
						<th>Visi</th>
						<th>Misi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_kandidat");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $data['id_kandidat']; ?>
						</td>
						<td>
							<?php echo $data['nama_paslon']; ?>
						</td>
						<td>
							<?php echo $data['visi']; ?>
						</td>
						<td>
							<?php echo $data['misi']; ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->