<?php
    include 'db_connect.php';

    $id_user = $_GET['id_user'];

    $q = mysqli_query($connect, "SELECT * FROM usaha WHERE id_user='$id_user'");

    while($result =mysqli_fetch_assoc($q)){
            $result_set[]=$result;
        }
    $data =array(
        'message' => "Get Data Produkku Succses",
        'data' => $result_set,
        'status' => "200"
    );
    echo json_encode($data);

?>