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
              <li class="breadcrumb-item active">Tambah Data Kandidat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Paslon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_capres" name="nama_paslon" placeholder="Nama Paslon">
				</div>
			</div>



			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Foto Paslon</label>
				<div class="col-sm-6">
					<input type="file" id="foto_paslon" name="foto_paslon">
					<p class="help-block">
						<font color="red">"Format file Jpg"</font>
					</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Visi</label>
				<div class="col-sm-6">
            <textarea name="visi" id="visi"  class="form-control" placeholder="Masukan Visi Anda"></textarea>
				</div>
			</div>

      <div class="form-group row">
				<label class="col-sm-2 col-form-label">Misi</label>
				<div class="col-sm-6">
            <textarea name="misi" id="misi"  class="form-control" placeholder="Masukan Misi Anda"></textarea>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-calon" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
 
    $sumber = @$_FILES['foto_paslon']['tmp_name'];
    $target = 'foto/';
    $nama_file = @$_FILES['foto_paslon']['name'];
    $pindah = move_uploaded_file($sumber, $target.$nama_file);

    if (isset ($_POST['Simpan'])){

            if(!empty($sumber)){
            $sql_simpan = "INSERT INTO tb_kandidat (id_kandidat, nama_paslon, foto_paslon, visi, misi) VALUES (
            ' ',
            '".$_POST['nama_paslon']."',
            '".$nama_file."',
            '".$_POST['visi']."',
            '".$_POST['misi']."')";
            $query_simpan = mysqli_query($koneksi, $sql_simpan);

                if ($query_simpan) {
                echo "<script>
                Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                    window.location = 'index.php?page=data-calon';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value){
                    window.location = 'index.php?page=add-calon';
                    }
                })</script>";
                }
            }elseif(empty($sumber)){
                echo "<script>
                Swal.fire({title: 'Gagal, Foto Wajib Diisi',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=add-calon';
                    }
                })</script>";
            }
    } 
