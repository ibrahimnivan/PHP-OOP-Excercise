<?php 
require_once 'app/init.php';

$produk1 = new Komik("Naruto", "Masashi Kisimoto", "Shonen Jump", 300000, 100);
$produk2 = new Game("Uncharted", "Neil Duckmann", "Sony Computer", 250000, 50);



$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
?>