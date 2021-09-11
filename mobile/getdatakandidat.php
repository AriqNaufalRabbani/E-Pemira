<?php

include '../koneksi.php';

$queryResult = $koneksi->query("select * from tb_kandidat");

$result = array();

while($fetchData=$queryResult->fetch_assoc()){
    $result[]=$fetchData;

}

echo json_encode($result);

?>