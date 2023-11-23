<?php

// class Product bisa dijadikan class abstrak
abstract class Product
{
    private $judul,
            $penulis,
            $penerbit,
            $harga,
            $diskon = 0;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function setJudul( $judul) {
      $this->judul = $judul;
    }

    public function getJudul() {
      return $this->judul;
    }

    public function setPenulis($penulis) {
      $this->penulis = $penulis;
    }

    public function getPenulis() {
      return $this->penulis;
    }

    public function setPenerbit($penerbit) { 
      $this->penerbit = $penerbit;
    }

    public function getPenerbit() {
      return $this->penerbit;
    }

    public function setDiskon($diskon) {
      $this->diskon = $diskon;
    }

    public function setHarga($harga) {
      $this->harga = $harga;
    }

    public function getHarga() {
      return $this->harga - ( $this->harga * $this->diskon / 100);
    }

    public function getLabel() {
      return "$this->penulis, $this->penerbit";
    }

    //dibikin jadi method abstrak
    abstract public function getInfoProduct();
    
    public function getInfo() { //pengganti getInfoProduct sebelumnya
      $str = "($this->judul) | {$this->getLabel()} (Rp. {$this->harga}";

      return $str;
    }
}

class Komik extends Product {
  public $jmlHalaman;

  public function __construct($judul = "judul", $penulis, $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfoProduct() {
    $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman. ";
    return $str;
  }
}

class Game extends Product {
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit="penerbit", $harga = 0, $waktuMain = 0 ) {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->waktuMain = $waktuMain;
  }

  public function getInfoProduct() { //ngambil dari abstrak
    $str = "Game : ". $this->getInfo() . " - {$this->waktuMain} Jam.";
    return $str;
  }

}

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

$produk1 = new Komik("Naruto", "Masashi Kisimoto", "Shonen Jump", 300000, 100);
$produk2 = new Game("Uncharted", "Neil Duckmann", "Sony Computer", 250000, 50);



$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();





?>
