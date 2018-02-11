<?php

    include 'db_connect.php';

    $id_usaha = $_GET['id_usaha'];
    $id_kegiatan = $_GET['id_kegiatan'];

    $query_select=mysqli_query($connect, "SELECT id_agenda FROM agenda ORDER BY id_agenda DESC");
    $id=mysqli_fetch_assoc($query_select);
    $id= $id['id_agenda']+1;

    $postdata = file_get_contents("php://input");
    $nama = "";
    $harga = "";
    $satuan = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $nama = $request->nama;
        $harga = $request->harga;
        $satuan = $request->satuan;

            $query_register = mysqli_query($connect,"INSERT INTO agenda (id_agenda, id_usaha, id_kegiatan) VALUES ('$id', '$id_usaha', '$id_kegiatan') ");

           if($query_register){
        
                $data =array(
                    'message' => "Register Success!",
                    'status' => "200"
                );
            }
            else {
                $data =array(
                    'message' => "Register Failed!",
                    'id agenda' => $id,
                    'id usaha' => $id_usaha,
                    'id kegiatan' => $id_kegiatan,
                    'status' => "404"
                ); 
            }

        echo json_encode($data);
    }
?>
