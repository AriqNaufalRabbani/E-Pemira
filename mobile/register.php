
<?php

include '../koneksi.php';

$image= $_FILES['image']['name'];
$nim= $_POST['nim']; 
$nama= $_POST['nama'];
$phone= $_POST['phone'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$confirmpass=$_POST['confirm_pass'];

$imagePath="ktm/".$image;
move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);

$koneksi->query("INSERT INTO tb_pemilih (nim,nama_user,phone,email,password,confirm_password,ktm,foto_profil,status)VALUES(
    '".$nim."',
    '".$nama."',
    '".$phone."',
    '".$email."',
    '".$pass."',
    '".$confirmpass."',
    '".$image."',
    'user.jpg',
    '0'
)"); 

