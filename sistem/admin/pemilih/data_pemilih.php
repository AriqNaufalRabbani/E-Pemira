<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pemilih</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card card-danger">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Verifikasi Pemilih</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
		<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nim</th>
						<th>Nama Pemilih</th>
                        <th>Telp</th>
                        <th>Email</th>
                        <th>KTM</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_pemilih where status = '0'");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nim']; ?>
						</td>
						<td>
							<?php echo $data['nama_user']; ?>
						</td>
                        <td>
							<?php echo $data['phone']; ?>
						</td>
                        <td>
							<?php echo $data['email']; ?>
						</td>
						<td>
                            <img src="../mobile/ktm/<?php echo $data['ktm']; ?>" width="150px" height="100px" />
						</td>
						</td>
						<td>
							<a href="?page=admit-data&id=<?php echo $data['id_pemilih']; ?>" title="Admit"
							 class="btn btn-success btn-sm">
								<i class="fa fa-check-circle"></i>
							</a>
							<a href="?page=del-pemilih&kode=<?php echo $data['id_pemilih']; ?>" onclick="return confirm('Hapus Data Ini ?')"
							 title="Reject" class="btn btn-danger btn-sm">
								<i class="fa fa-times-circle"></i>
								
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
</div>

<br><br>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pemilih</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
		<table id="example2" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nim</th>
						<th>Nama Pemilih</th>
                        <th>Telp</th>
                        <th>Email</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_pemilih where status ='1'");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nim']; ?>
						</td>
						<td>
							<?php echo $data['nama_user']; ?>
						</td>
                        <td>
							<?php echo $data['phone']; ?>
						</td>
                        <td>
							<?php echo $data['email']; ?>
						</td>
						</td>
						<td>
							<a href="?page=del-pemilih&kode=<?php echo $data['id_user']; ?>" onclick="return confirm('Hapus Data Ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								
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
</div>