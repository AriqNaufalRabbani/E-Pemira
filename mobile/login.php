<?php

require "../koneksi.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $response = array();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = "SELECT * FROM tb_pemilih WHERE email= '".$email."' and password='".$password."' ";
    $result = mysqli_fetch_array(mysqli_query($koneksi, $cek));

    if(isset($result)){
        $response['value'] = 1;
        $response['message'] = 'Login Berhasil';
        $response['id'] = $result["id_pemilih"];
        $response['nama'] = $result["nama_user"];
        $response['email'] = $result["email"];
        $response['suara'] = $result["suara"];
        echo json_encode($response);

    } else{
            $response['value'] = 0;
            $response['message'] = "login gagal";
            echo json_encode($response);
    }
}

?>