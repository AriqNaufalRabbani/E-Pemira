<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kandidat WHERE id_kandidat='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?page=data-calon">Data Kandidat</a></li>
              <li class="breadcrumb-item active">Ubah Data Kandidat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Urut</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="id_kandidat" name="id_kandidat" value="<?php echo $data_cek['id_kandidat']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Paslon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_paslon" name="nama_paslon" value="<?php echo $data_cek['nama_paslon']; ?>"
					/>
				</div>
			</div>



			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Paslon</label>
				<div class="col-sm-6">
					<input type="file" id="foto_paslon" name="foto_paslon">
					<p class="help-block">
						<font color="red">Format file Jpg"</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi</label>
				<div class="col-sm-6">
                    <textarea name="visi" id="visi" class="form-control"><?php echo $data_cek['visi']; ?></textarea>
				</div>
			</div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-6">
                    <textarea name="misi" id="misi" class="form-control"><?php echo $data_cek['misi']; ?></textarea>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-calon" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>


<?php

$sumber = @$_FILES['foto_paslon']['tmp_name'];
$target = 'foto/';
$nama_file = @$_FILES['foto_paslon']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_file);

if (isset ($_POST['Ubah'])){

    if(!empty($sumber)){

        $sql_ubah = "UPDATE tb_kandidat SET
            nama_paslon='".$_POST['nama_paslon']."',
            foto_paslon='".$nama_file."',
            visi='".$_POST['visi']."',
			misi='".$_POST['misi']."'
            WHERE id_kandidat='".$_POST['id_kandidat']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);

    }elseif(empty($sumber)){
        $sql_ubah = "UPDATE tb_kandidat SET
            nama_paslon='".$_POST['nama_paslon']."',
            visi='".$_POST['visi']."',
			misi='".$_POST['misi']."'
            WHERE id_kandidat='".$_POST['id_kandidat']."'";
        $query_ubah = mysqli_query($koneksi, $sql_ubah);
        }

    if ($query_ubah) {
        echo "<script>
        Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-calon';
            }
        })</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location = 'index.php?page=data-calon';
            }
        })</script>";
    }
}

