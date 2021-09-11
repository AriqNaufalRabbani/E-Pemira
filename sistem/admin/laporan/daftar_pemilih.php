<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar Pemilih</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Daftar Pemilih</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
                <a href="laporan/cetak_pemilih.php" target="_blank" class="btn btn-primary">
					<i class="fa fa-edit"></i> Export to PDF</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nim</th>
						<th>Nama Lengkap</th>
						<th>Hak Pilih</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_pemilih where status='1'");
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
							<?php $stt = $data['suara']  ?>
							<?php if($stt == '1'){ ?>
							<span class="badge badge-warning">Belum memilih</span>
							<?php }elseif($stt == '0'){ ?>
							<span class="badge badge-primary">Sudah memilih</span>
						</td>
						<?php } ?>
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