<?php
    include 'db_connect.php';

   $id_produk = $_GET['id_produk'];

    $q = mysqli_query($connect, "DELETE FROM produk WHERE id_produk='$id_produk'");

    $data =array(
        'message' => "Delete Data Produkku Succses",
        'status' => "200"
    );
    echo json_encode($data);

?>