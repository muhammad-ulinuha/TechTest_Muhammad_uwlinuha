<?php
include '../controller/instansi.php';
$instansi = new Instansi();

$aksi = $_GET['aksi'];
 if($aksi == "tambah"){
 	$instansi->inputData($_POST['nama_instansi'],$_POST['deskripsi']);
 }elseif($aksi == "search"){ 	
    $instansi->searchData($_GET['key']);
    // header("Location: ../../../bonus_case/view/dashboard.php");
 }elseif($aksi == "hapus"){ 	
 	$instansi->hapusData($_GET['id']);
 }elseif($aksi == "update"){
 	$instansi->updateData($_POST['id'],$_POST['nama_instansi'],$_POST['deskripsi']);
 }