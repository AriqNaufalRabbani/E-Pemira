<?php

if (isset ($_GET['id'])){
$sql_admit = "UPDATE tb_pemilih SET
	status='1'
	WHERE id_pemilih='".$_GET['id']."'";
$query_admit = mysqli_query($koneksi, $sql_admit);
mysqli_close($koneksi);

if ($query_admit) {
	echo "<script>
  Swal.fire({title: 'Data Berhasil di Verifikasi',text: '',icon: 'success',confirmButtonText: 'OK'
  }).then((result) => {if (result.value)
	{window.location = 'index.php?page=data-pemilih';
	}
  })</script>";
  }else{
  echo "<script>
  Swal.fire({title: 'Data Gagal di Verifikasi',text: '',icon: 'error',confirmButtonText: 'OK'
  }).then((result) => {if (result.value)
	{window.location = 'index.php?page=data-pemilih';
	}
  })</script>";
}}
?>