<?php include("conn.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@100&display=swap" rel="stylesheet">
    
</head>
<style>
body {
    background-color: #f6f7fc;
    margin: 0;
    font-family: 'Bitter', serif;
}
.left {
    float: left;
    padding-left: 100px;
}
.right {
    padding-left: 900px;
    padding-top: 30px;
}
nav{
    position: fixed;
    overflow: hidden;
    width: 100%;
    top: 0;
    background-color: white;

}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    opacity: 75%;
    float: right;
    display: flex;
}



li a {
    display: block;
    color: #9c9c9c;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
    color: white;

}
.profile {
    margin-top: 50px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
    height: 300px;
    border-radius: 5px;
    background-color: #fff;
}
.card-form {
    
    margin-top: 20px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
    border-radius: 5px;
    background-color: #fff;
}
.card-input {
    padding: 20px;
}

input[type=text], input[type=email],input[type=number] {
    width: 100%;
    height: 24px;
    margin-bottom: 12px;
}
.submit {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    width: 100.6%;
    opacity: 0.9;
    height: 30px;
    margin-bottom: 12px;
}

.kontak {
    background-color: #0000fb;
    color: white;
    border: none;
    cursor: pointer;
    width: 40%;
    opacity: 0.9;
    height: 40px;
    margin-bottom: 12px;
}
.kontak:hover {
    background-color: white; /* Green */
    color: #a6c289;
    border: 2px solid #a6c289;

}
.resume {
    background-color: #ffffff;
    color: #a6c289;
    border: 2px solid #a6c289;
    cursor: pointer;
    width: 40%;
    opacity: 0.9;
    height: 40px;
    margin-bottom: 12px;
}
.resume:hover{
    background-color: #0000fb;
    color: white;
    border: 2px solid black;
}
.content {
    margin: 70px;
    margin-top: 90px;
}

td {
    padding-right: 90px;
    font-size: 20px;
}
</style>
<body>
    
<nav>
    <ul>
        <li> <a id="home" href="/">HOME</a> </li>
        <li> <a href="/">PRODUCT</a> </li>
        <li> <a href="/">GALLERY</a> </li>
        <li> <a href="/">BLOG</a> </li>
        <li> <a href="/">INVENTORY</a> </li>
    </ul>
</nav>

<div class="content">
    <div class="profile">
        <input style="float: left;" type="image" src="https://spesialis1.orthopaedi.fk.unair.ac.id/wp-content/uploads/2021/02/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" alt="Submit" width="200" height="200">
        <div class="left">
        <?php
                $sql = "SELECT * FROM simpan ORDER BY id DESC LIMIT 1";
                $row = mysqli_fetch_assoc($conn->query($sql) );
                ?>
            <h1 id="nama"><?php echo $row['nama'];?></h1>
            Backend Developer<p>
            Edit Resume<p>
            <input class="kontak" type="submit" value="Kontak">    
            <input class="resume" type="button" value="EDIT" onclick="inputdata()">    
    
        </div>
        <div class="right">
            <table id="databel">


            <tr>
                    <td>Role</td>
                    <td id="role"><?php echo $row['roles'];?></td>
                </tr>
                <tr>
                    <td>Availability</td>
                    <td id="availability"><?php echo $row['availabilitys'];?></td>
                </tr>
                <tr>
                    <td>Usia</td>
                    <td id="usia"><?php echo $row['usia'];?></td>
                </tr>
                <tr>
                    <td>Lokasi</td>
                    <td id="lokasi"><?php echo $row['lokasi'];?></td>
                </tr>
                <tr>
                    <td>Years Experience</td>
                    <td id="tahun"><?php echo $row['years_experience'];?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td id="email"><?php echo $row['email'];?></td>
                </tr>

            </table>            
        </div>       
    </div>
    
    <form action="simpan5.php" name="data_pribadi" method="POST">
        <div class="card-form">
            <div class="card-input">
                <label for="">Nama</label><br>
                <input required type="text" name="nama" id="input_nama"><br>
                <label for="">Role</label><br>
                <input required type="text" name="role" id="input_role"><br>
                <label for="">Availability</label><br>
                <input required type="text" name="availability" id="input_availability"><br>
                <label for="">Usia</label><br>
                <input required type="number" min="0" max="100"name="usia" id="input_usia"><br>
                <label for="">Lokasi</label><br>
                <input required type="text" name="lokasi" id="input_lokasi"><br>
                <label for="">Years Experience</label><br>
                <input required type="number" min="0" max="100" name="years_experience" id="input_years_experience"><br>
                <label for="">Email</label><br>
                <input required type="email" name="email" id="input_email"><br>
                <input class="submit" type="submit" value="simpan" name="simpan">    
            </div>
        </div>
    </form>
</div>
</body>

<script>

function inputdata(){
var nama=document.getElementById("nama").innerHTML;
var role= document.getElementById("role").innerHTML;
var availability= document.getElementById("availability").innerHTML;
var usia= document.getElementById("usia").innerHTML;
var lokasi= document.getElementById("lokasi").innerHTML;
var years_experience= document.getElementById("tahun").innerHTML;
var email= document.getElementById("email").innerHTML;

document.getElementById("input_nama").value = nama;
document.getElementById("input_role").value = role;
document.getElementById("input_availability").value = availability;
document.getElementById("input_usia").value = usia;
document.getElementById("input_lokasi").value = lokasi;
document.getElementById("input_years_experience").value = years_experience;
document.getElementById("input_email").value = email;
}

</script> -->
</html>