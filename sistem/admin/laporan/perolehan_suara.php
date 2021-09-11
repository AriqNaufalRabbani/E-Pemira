<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Perolehan Suara</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Perolehan Suara</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
                <a href="laporan/cetak_suara.php" target="_blank" class="btn btn-primary">
					<i class="fa fa-edit"></i> Export to PDF</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
                        <th>No Urut</th>
						<th>Nama Paslon</th>
						<th>Jumlah Suara</th>
					</tr>
				</thead>
				<tbody>

                <?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_kandidat");
					while ($data= $sql->fetch_assoc()) {

						$id_kandidat = $data["id_kandidat"];
					?>

					<tr>
						<td>
                            <?php echo $data['id_kandidat']; ?>
						</td>
						<td>
                            <?php echo $data['nama_paslon']; ?>
						</td>
						<td>
							<?php
								$sql_hitung = "SELECT COUNT(id_vote) from tb_vote  where id_kandidat='$id_kandidat'";
								$q_hit= mysqli_query($koneksi, $sql_hitung);
								while($row = mysqli_fetch_array($q_hit)) {
								echo $row[0]." Suara";
								}
							?>
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