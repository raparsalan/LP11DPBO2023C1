<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();
if (isset($_GET['editForm'])) {
    $tp->tampil($_GET['id']);
} elseif (isset($_GET['delete'])) {
    $tp->deleteData($_GET['id']);
} elseif (isset($_POST['add'])) {
    $tp->addData($_POST['nik'], $_POST['nama'], $_POST['tempat'], $_POST['ttl'], $_POST['kelamin'], $_POST['email'], $_POST['telp']);
} elseif (isset($_POST['edit'])){
    $tp->editData($_POST['id'], $_POST['nik'], $_POST['nama'], $_POST['tempat'], $_POST['ttl'], $_POST['kelamin'], $_POST['email'], $_POST['telp']);
}else {
   $tp->tampil(null);
}