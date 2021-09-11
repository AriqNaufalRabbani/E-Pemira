<?php

include '../koneksi.php';

$idkandidat= $_POST['id_kandidat']; 
$idpemilih= $_POST['id_pemilih'];
$namauser= $_POST['nama_user'];

$sql_simpan = "INSERT INTO tb_vote (id_kandidat, id_pemilih, nama_user) VALUES (
    '".$idkandidat."',
    '".$idpemilih."',
    '".$namauser."');";
$sql_simpan .= "UPDATE tb_pemilih set 
    suara='0'
    WHERE id_pemilih='".$idpemilih."'";
$query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
mysqli_close($koneksi);