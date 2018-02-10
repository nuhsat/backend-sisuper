<?php
    include 'db_connect.php';

    $id_kegiatan = $_GET['id_kegiatan'];

    $q = mysqli_query($connect, "SELECT * FROM kegiatan WHERE id_kegiatan='$id_kegiatan'");

    while($result =mysqli_fetch_assoc($q)){
            $result_set[]=$result;
        }
    $data =array(
        'message' => "Get Data Kegiatan Succses",
        'data' => $result_set,
        'status' => "200"
    );
    echo json_encode($data);

?>