<?php

  include 'db_connect.php';

  $query_select=mysqli_query($connect, "SELECT id_user FROM user ORDER BY id_user DESC");
  $id=mysqli_fetch_assoc($query_select);
  $id= $id['id_user']+1;

  $query_select=mysqli_query($connect, "SELECT id_usaha FROM usaha ORDER BY id_usaha DESC");
  $id=mysqli_fetch_assoc($query_select);
  $id_usaha= $id['id_usaha']+1;

    //mengambil jenis legalitas
    // $j=0
    //     $jumlah_jenis=0;
    //     $query_jenis=mysqli_query($connect, "SELECT * FROM jenis_legalitas");
    //     while($result =mysqli_fetch_assoc($query_jenis)){
    //         $result_set[$j]=$result;
    //         $jumlah_jenis = $jumlah_jenis+1; 
    //         $id_jenisnya[$j] = $result['id_jenis'];
    //         $nama_legalitasnya[$j] = $result['nama_jenis'];
    //         $j++;
    //     } 
    // 
        
    $postdata = file_get_contents("php://input");
    $nama = "";
    $jenis = "";
    $lama = "";
    $omzet = "";
    $deskripsi = "";
    $alamat = "";
    $email = "";
    $telepon = "";
    $website = "";
    $facebook = "";
    $twitter = "";
    $line = "";
    $instagram = "";
    $logo = "";
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $nama = $request->nama;
        $jenis = $request->jenis;
        $lama = $request->lama;
        $omzet = $request->omzet;
        $deskripsi = $request->deskripsi;
        $alamat = $request->alamat;
        $email = $request->email;
        $telepon = $request->telepon;
        $website = $request->website;
        $facebook = $request->facebook;
        $twitter = $request->twitter;
        $line = $request->line;
        $instagram = $request->instagram;
        $logo = $request->logo;


       $query_register = mysqli_query($connect,"INSERT INTO usaha (id_usaha, id_user, nama_usaha, jenis_usaha, lama_usaha, omzet, deskripsi_usaha, alamat_usaha, email_usaha, telepon_usaha, website, facebook, twitter, lines, instagram, logo_usaha)
                                                            VALUES ('', '$id', '$nama, '$jenis', '$lama','$omzet','$deskripsi','$alamat', '$email', '$telepon', '$website', '$facebook', '$twitter', '$line', '$instagram', '$logo') ");
       $query_data = mysqli_query($connect, "SELECT * FROM usaha WHERE id_usaha='$id_usaha'");


        if(mysqli_num_rows($query_data)){
            $row=mysqli_fetch_assoc($query_data);
            
                //ini bingung kalo looping dinamis
                        // for ($i=0; $i < $jumlah_jenis; $i++) { 
                        //     $legalitas = $request->legalitas;

                        //     $fname = $id.'-legal-'.$id_jenisnya;
                        //     $legalitas = str_replace('data:image/png;base64,', '', $legalitas);
                        //     $legalitas = str_replace(' ', '+', $legalitas);
                        //     $legalitas = base64_decode($legalitas);
                        //     $subFolder = "/images_legalitas";
                        //     $dir = __DIR__ .$subFolder ; // Full Path
                        //     is_dir($dir) || @mkdir($dir) || die("Can't Create folder");
                        
                        //     file_put_contents($dir . DIRECTORY_SEPARATOR . $fname.".jpg", $legalitas);
                        //     $imagePath = $subFolder."/".$fname.".jpg";
                            
                        //     $query_register = mysqli_query($connect,"INSERT INTO usaha_legalitas (id_legalitas, id_jenis, nama_legalitas, image_legalitas) VALUES ('', '$i', '$nama_legalitasnya[$i]', '$imagePath') ");

                        // }

        
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
        
        echo json_encode($result_set);
    }
?>
