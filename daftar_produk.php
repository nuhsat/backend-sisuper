<?php

    include 'db_connect.php';

    $id_usaha = $_GET['id_usaha'];

    $query_select=mysqli_query($connect, "SELECT id_produk FROM produk ORDER BY id_produk DESC");
    $id=mysqli_fetch_assoc($query_select);
    $id= $id['id_produk']+1;

    $postdata = file_get_contents("php://input");
    $nama = "";
    $harga = "";
    $satuan = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $nama = $request->nama;
        $harga = $request->harga;
        $satuan = $request->satuan;

            $query_register = mysqli_query($connect,"INSERT INTO produk (id_produk, id_usaha, nama_produk, harga_produk, satuan_produk) VALUES ('$id', '$id_usaha', '$nama', '$harga', '$satuan') ");

           if($query_register){
        
                $data =array(
                    'message' => "Register Success!",
                    'status' => "200"
                );
            }
            else {
                $data =array(
                    'message' => "Register Failed!",
                    'status' => "404"
                ); 
            }

        
        echo json_encode($data);
    }
?>
