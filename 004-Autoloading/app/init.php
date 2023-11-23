<?php 
// require 'produk/InfoProduct.php';
// require 'produk/Produk.php';
// require 'produk/Komik.php';
// require 'produk/Game.php';
// require 'produk/CetakInfoProduk.php';
 



spl_autoload_register(function($class) {
  $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);
  require_once __DIR__ . DIRECTORY_SEPARATOR . 'produk' . DIRECTORY_SEPARATOR . $classPath . '.php';
});
?>