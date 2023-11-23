<?php 


//memanfaatkan class cetak produk untuk mencetak banyak produk sekaligus
class CetakInfoProduk {
  public $daftarProduk = array();

  public function tambahProduk( Product $product) {
    $this->daftarProduk[] = $product;
  }
  public function cetak() {
    $str = "DAFTAR PRODUK : <br>";

    foreach( $this->daftarProduk as $product ) {
      $str .= "-{$product->getInfoProduct()} <br>";
    }

    return $str;
  }
}
?>