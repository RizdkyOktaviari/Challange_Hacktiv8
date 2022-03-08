<?php

include("conn.php");
require 'func.php';

if(isset($_POST['simpan'])){

    $post = $_POST;
    $nama = $_POST['nama'];

    $selected = "SELECT nama FROM simpan WHERE nama = '$nama'";
    $results = mysqli_query($conn, $selected);
    $rows = mysqli_num_rows($results);    
    
    if($rows != 0){
        update($conn,$post);
    }else{
        insert($conn,$post);

    }

} else {
    die("Akses dilarang...");
}

?>