<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Kotak Suara</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Kotak Suara</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kandidat</th>
						<th>ID Pemilih</th>
						<th>Nama Pemilih</th>
						<th>Waktu Memilih</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select c.nama_paslon, v.id_pemilih, v.nama_user, v.date 
					from tb_kandidat c join tb_vote v on 
					c.id_kandidat=v.id_kandidat");
					while ($data= $sql->fetch_assoc()) {
					?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_paslon']; ?>
						</td>
						<td>
							<?php echo $data['id_pemilih']; ?>
						</td>
						<td>
							<?php echo $data['nama_user']; ?>
						</td>
						<td>
							<?php echo $data['date']; ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.card-body -->