<?php
 require_once 'db_connect.php';
  $postdata = file_get_contents("php://input");
    $email="";
    $password="";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $email = $request->email;
        $password = $request->password;
    }

//encrypt
 $encrypt_password = md5($password);

$query_login = mysqli_query($connect, "SELECT id_user,nama_user,email_user,telepon_user,alamat_user,image_user FROM user WHERE email_user='$email' AND password_user ='$encrypt_password' ");
    if(mysqli_num_rows($query_login)){
        
        $row=mysqli_fetch_assoc($query_login);

        //SESSION
            $_SESSION['id'] = $row['id_user'];
            $_SESSION['nama'] = $row['nama_user'];
            $_SESSION['email'] = $row['email_user'];
            $_SESSION['alamat'] = $row['alamat_user'];
            $_SESSION['telepon'] = $row['telepon_user'];
            $_SESSION['image'] = $row['image_user'];
        //

        $data =array(
            'message' => "Login Success",
            'data' => $row,
            'status' => "200"
        );
 }
 else {
$data =array(
            'message' => "Login Failed, Email or Password Wrong",
            'status' => "404"
        ); 
 }
    echo json_encode($data);

 ?>
 