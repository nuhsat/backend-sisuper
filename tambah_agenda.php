<?php
     include 'db_connect.php';

    $id_usaha = $_GET['id_usaha'];
    $id_kegiatan=$_GET['id_kegiatan'];
    
    $query_select=mysqli_query($connect, "SELECT id_agenda FROM agenda ORDER BY id_agenda DESC");
    $id=mysqli_fetch_assoc($query_select);
    $id= $id['id_agenda']+1;

    $query_tambah = mysqli_query($connect,"INSERT INTO agenda (id_agenda, id_usaha, id_kegiatan, id_undangan) VALUES ('$id', '$id_usaha', '$id_kegiatan', 0)");
        if($query_tambah){
        
            $data =array(
                'message' => "Tambah Agenda Success!",
                'status' => "200"
            );
        }
        else {
            $data =array(
                'message' => "Tambah Agenda Failed!",
                'status' => "404"
            ); 
        }
    echo json_encode($data);

?>