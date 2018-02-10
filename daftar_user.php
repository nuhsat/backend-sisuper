<?php

  include 'db_connect.php';

    $query_select=mysqli_query($connect, "SELECT id_user FROM user ORDER BY id_user DESC");
    $id=mysqli_fetch_assoc($query_select);
    $id= $id['id_user']+1;

    $postdata = file_get_contents("php://input");
    $nama = "";
    $email ="";
    $password = "";
    $telepon = "";
    $alamat = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $nama = $request->nama;
        $email = $request->email;
        $password = $request->password;
        $alamat = $request->alamat;
        $telepon = $request->telepon;
        $encrypt_password = md5($password);

        $query_regis = mysqli_query($connect, "SELECT * FROM user WHERE email_user='$email'");
 
        if(mysqli_num_rows($query_regis)){
            $data =array(
                'message' => "Email Already Taken!",
                'status' => "409"
            );
        }
        else{
            $query_register = mysqli_query($connect,"INSERT INTO user (id_user, nama_user, email_user, password_user, telepon_user, alamat_user, image_user) VALUES ('$id', '$nama', '$email', '$encrypt_password', '$telepon','$alamat','') ");
            $query_data = mysqli_query($connect, "SELECT id_user,nama_user,email_user,telepon_user,alamat_user FROM user WHERE id_user='$id'");

           if(mysqli_num_rows($query_data)){
                $row=mysqli_fetch_assoc($query_data);
        
                //SESSION
                    $_SESSION['id'] = $row['id_user'];
                    $_SESSION['nama'] = $nama;
                    $_SESSION['email'] = $email;
                    $_SESSION['alamat'] = $alamat;
                    $_SESSION['telepon'] = $telepon;
                //
        
                $data =array(
                    'message' => "Register Success!",
                    'data' =>  $row,
                    'status' => "200"
                );
            }
            else {
                $data =array(
                    'message' => "Register Failed!",
                    'status' => "404"
                ); 
            }

        }
        echo json_encode($data);
    }
?>
