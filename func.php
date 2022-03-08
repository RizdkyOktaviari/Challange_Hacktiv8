<?php

function insert($conn,$post){
    $sql = "INSERT INTO simpan (nama, roles, availabilitys, usia, lokasi,years_experience,email) VALUE ('$post[nama]', '$post[role]', '$post[availability]', '$post[usia]', '$post[lokasi]','$post[years_experience]','$post[email]')";
    $query = mysqli_query($conn, $sql);
    if( $query ) {
        header('Location: Rizdky Oktaviari Pratama Putra_Assignment 5.php?status=data ditambahkan');
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
}
function update($conn,$post){
    include("conn.php");
    $sql = "UPDATE simpan set nama='$post[nama]', roles='$post[role]', availabilitys='$post[availability]',usia='$post[usia]',lokasi='$post[lokasi]',years_experience='$post[years_experience]',email='$post[email]' WHERE nama = '$post[nama]'";
    $query = mysqli_query($conn, $sql);
    if( $query ) {
        header('Location: Rizdky Oktaviari Pratama Putra_Assignment 5.php?status=edit sukses');
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
}
?>