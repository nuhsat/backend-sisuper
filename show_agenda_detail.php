<?php
    include 'db_connect.php';

    $id_agenda = $_GET['id_agenda'];
    $q = mysqli_query($connect, "SELECT * FROM agenda JOIN kegiatan WHERE agenda.id_usaha=kegiatan.id_usaha AND id_agenda='$id_agenda'");

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