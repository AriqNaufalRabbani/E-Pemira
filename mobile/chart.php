<?php
include "../koneksi.php";

$response = array();

$kandidat = mysqli_query($koneksi,"select * from tb_kandidat");
  while($row = mysqli_fetch_array($kandidat)){
    $response['nama_paslon'] = $row['nama_paslon'];

  $query = mysqli_query($koneksi,"SELECT COUNT(id_vote) as jumlah from tb_vote  where id_kandidat='".$row['id_kandidat']."'");
  $row = $query->fetch_array();
  $response['jumlah_suara'] = $row['jumlah'];


}echo json_encode($response);
  
  