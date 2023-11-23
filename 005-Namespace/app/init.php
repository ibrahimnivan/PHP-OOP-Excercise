<?php 


// require_once 'produk/InfoProduct.php';
// require_once 'produk/Product.php';
// require_once 'produk/Komik.php';
// require_once 'produk/Game.php';
// require_once 'produk/CetakInfoProduk.php';

// require_once 'produk/User.php';
// require_once 'service/User.php'; // walau path berbeda tetap tidak bisa jika nama classnya sjama (butuh namespace)
 



// spl_autoload_register(function($class) { //method ini hanya bisa untuk satu directory saja  '
//   $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);  
//   require_once __DIR__ . DIRECTORY_SEPARATOR . 'produk' . DIRECTORY_SEPARATOR . $classPath . '.php';
// });

spl_autoload_register(function($class) { //method ini hanya bisa untuk satu directory saja  '
  $class = explode('\\', $class); // \\ = escape karakter dari ' \ '
  $class = end($class);
  require_once __DIR__ . '/produk/' . $class . '.php';
});

spl_autoload_register(function($class) { //method ini hanya bisa untuk satu directory saja  '
  $class = explode('\\', $class);
  $class = end($class);
  require_once __DIR__ . '/service/' . $class . '.php';
});
 

?>