<?php
ob_start();
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
// membuat koneksi ke database 
$Conn = mysqli_connect("localhost","root","","pendataan");
if(!$Conn) {
    die("Tidak terkoneksi ke databse");
}
$itemcode       = "";
$description    = "";
$batch          = "";
$expired        = "";
$noptn          = "";
$qty            = "";
$status         = "";
$sukses         = "";
$error          = "";


// hapus obat
if(isset($_POST['hapusptnobat'])) {
    $idptn = $_POST['idptn'];

    $hapus = mysqli_query($Conn, "DELETE FROM obat WHERE idptn='$idptn'");
    if($hapus){
        header('location:ptnobat.php');
    } else {
        echo 'Gagal';
        header('location:ptnobat.php');
    }
}

// hapus passion
if(isset($_POST['hapusptnpassion'])) {
    $idps = $_POST['idps'];

    $hapus = mysqli_query($Conn, "DELETE FROM passion WHERE idps='$idps'");
    if($hapus){
        header('location:ptnpassion.php');
    } else {
        echo 'Gagal';
        header('location:ptnpassion.php');
    }
}

// Update obat
if(isset($_POST['updateptnobat'])) {
    $idptn          = $_POST['idptn'];
    $itemcode       = $_POST['itemcode'];
    $description    = addslashes($_POST['description']);
    $batch          = $_POST['batch'];
    $expired        = $_POST['expired'];
    $numberptn      = $_POST['numberptn'];
    $qty            = $_POST['qty'];
    $status         = $_POST['status'];

    $update = mysqli_query($Conn, "UPDATE obat set itemcode='$itemcode', description='$description',
     batch='$batch', expired='$expired', numberptn='$numberptn', qty='$qty' where idptn ='$idptn'");
     if($update){
         header('location:ptnobat.php');
     } else {
         echo 'Gagal';
         header('location:ptnobat.php');
     }
}

// Update Passion
if(isset($_POST['updateptpassion'])) {
    $idps          = $_POST['idps'];
    $itemcode       = $_POST['itemcode'];
    $description    = addslashes($_POST['description']);
    $batch          = $_POST['batch'];
    $expired        = $_POST['expired'];
    $numberptn      = $_POST['numberptn'];
    $qty            = $_POST['qty'];
    $status         = $_POST['status'];

    $update = mysqli_query($Conn, "UPDATE passion set itemcode='$itemcode', description='$description',
     batch='$batch', expired='$expired', numberptn='$numberptn', qty='$qty' where idps ='$idps'");
     if($update){
         header('location:ptnpassion.php');
     } else {
         echo 'Gagal';
         header('location:ptnpassion.php');
     }
}


// create obat
if(isset($_POST['addptnobat'])){
     $itemcode = $_POST['itemcode'];
     $description = addslashes($_POST['description']);
     $batch = $_POST['batch'];
     $expired = $_POST['expired'];
     $numberptn = $_POST['numberptn'];
     $qty = $_POST['qty'];
     $status = $_POST['status']; 

     if($itemcode && $description && $batch && $expired && $numberptn && $qty && $status) {
         $sql   =  "insert into obat (itemcode, description, batch, expired, numberptn, qty, status) values
            ('$itemcode','$description','$batch','$expired','$numberptn','$qty','$status')";
        $kon    = mysqli_query($Conn, $sql);
        if($kon) {
            $sukses     = "Berhasil memasukkan data baru";
        } else{
            $error      = "Gagal memasukkan data";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}

// create passion
if(isset($_POST['addptpassion'])){
     $itemcode = $_POST['itemcode'];
     $description = addslashes($_POST['description']);
     $batch = $_POST['batch'];
     $expired = $_POST['expired'];
     $numberptn = $_POST['numberptn'];
     $qty = $_POST['qty'];
     $status = $_POST['status']; 

     if($itemcode && $description && $batch && $expired && $numberptn && $qty && $status) {
         $sql   =  "insert into passion (itemcode, description, batch, expired, numberptn, qty, status) values
            ('$itemcode','$description','$batch','$expired','$numberptn','$qty','$status')";
        $kon    = mysqli_query($Conn, $sql);
        if($kon) {
            $sukses     = "Berhasil memasukkan data baru";
        } else{
            $error      = "Gagal memasukkan data";
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}

?>