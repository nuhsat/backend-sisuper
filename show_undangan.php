<?php
    include 'db_connect.php';

   $id_usaha = $_GET['id_usaha'];

    $q = mysqli_query($connect, "SELECT * FROM undangan WHERE id_usaha='$id_usaha'");

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