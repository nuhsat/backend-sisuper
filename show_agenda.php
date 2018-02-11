<?php
    include 'db_connect.php';

    $id_usaha = $_GET['id_usaha'];
    $q = mysqli_query($connect, "SELECT * FROM agenda INNER JOIN kegiatan ON agenda.id_kegiatan=kegiatan.id_kegiatan WHERE id_usaha='$id_usaha' ORDER BY tanggal_kegiatan DESC");

    while($result =mysqli_fetch_assoc($q)){
            $result_set[]=$result;
        }
    $data =array(
        'message' => "Get Data Agenda Succses",
        'data' => $result_set,
        'status' => "200"
    );
    echo json_encode($data);

?>