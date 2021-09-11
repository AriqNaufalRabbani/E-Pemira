<?php
$data_id = $_SESSION["ses-id"];
$data_nama = $_SESSION["ses-nama"];

    if(isset($_GET['kode'])){
		$sql_simpan = "INSERT INTO tb_vote (id_kandidat, id_pemilih, nama_user) VALUES (
            '".$_GET['kode']."',
            '".$data_id."',
			'".$data_nama."');";
        $sql_simpan .= "UPDATE tb_user set 
			status='0'
			WHERE id_user='".$data_id."'";
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);
		
		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Anda Berhasil Memilih',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=PsSQAdT';
				}
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Anda Gagal Memilih',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=PsSQAdT';
				}
			})</script>";
		  }}
		   //selesai proses simpan data
	  