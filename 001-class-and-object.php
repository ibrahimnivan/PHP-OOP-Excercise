<?php
class Product
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

    public function getInfoPruduct() {
      $str = "($this->judul} | {$this->getLabel()} (Rp. {$this->harga}";

      return $str;
    }
}

class Komik extends Product {
  public $jmlHalaman;

  public function __construct($judul = "judul", $penulis, $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfoPruduct() {
    $str = "Komik : " . parent::getInfoPruduct() . " - {$this->jmlHalaman} Halaman. ";
    return $str;
  }
}

class Game extends Product {
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit="penerbit", $harga = 0, $waktuMain = 0 ) {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->waktuMain = $waktuMain;
  }

  public function getInfoPruduct() {
    $str = "Game". parent::getInfoPruduct() . " - {$this->waktuMain} Jam.";
    return $str;
  }

}

class CetakInfoProduk {
  public function cetak( Product $produk) {
    $str = "{$produk->judul} | {$produk->getLabel()} {$produk->harga}";
    return $str;
  }
}

$produk1 = new Komik("Naruto", "Masashi Kisimoto", "Shonen Jump", 300000, 100);
$produk2 = new Game("Uncharted", "Neil Duckmann", "Sony Computer", 250000, 50);

echo $produk1->getInfoPruduct();
echo "<br>";
echo $produk2-> getInfoPruduct();
echo "<hr>";


$produk2->setDiskon(50);
echo $produk2->getHarga();
echo "<hr>";





?>
