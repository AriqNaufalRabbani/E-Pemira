<?php

include '../koneksi.php';
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");		// CORS
header("Access-Control-Allow-Headers: Access-Control-Allow-Origin, Accept");

$image= $_FILES['image']['name'];
$id= $_POST['id'];
$nim= $_POST['nim'];
$nama= $_POST['nama'];
$phone= $_POST['phone'];
$email=$_POST['email'];

$imagePath="../assets/img/profile/".$image;
move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);

$koneksi->query("UPDATE tb_pemilih SET 
    nim= '".$nim."',
    nama_user= '".$nama."',
    phone= '".$phone."',
    email= '".$email."',
    foto_profil= '".$image." WHERE id_pemilih= '".$id."'"); 