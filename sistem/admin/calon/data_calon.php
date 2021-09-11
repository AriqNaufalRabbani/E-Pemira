<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Kandidat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card card-secondary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kandidat</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-calon" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No Urut</th>
						<th>Nama Paslon</th>
						<th>Foto Paslon</th>
						<th>Visi</th>
						<th>Misi</th>
						<th>Aksi</th>
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
						<td align="center">
							<img src="foto/<?php echo $data['foto_paslon']; ?>" width="150px" />
						</td>
						<td>
							<?php echo $data['visi']; ?>
						</td>
						<td>
							<?php echo $data['misi']; ?>
						</td>
						<td>
							<a href="?page=edit-calon&kode=<?php echo $data['id_kandidat']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-calon&kode=<?php echo $data['id_kandidat']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
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