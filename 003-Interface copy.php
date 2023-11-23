<?php
// interface adalah murni template karena tidak memiliki implementasi sama sekali
// tidak boleh memiliki properti
// hanya boleh ada deklarasi method tp tidak ada implementsi method
// visibility hanya boleh 'public'

// method abstrak dijadikan interface
interface InfoProduct {
  public function getInfoProduct();
}

//agar ngga bisa diinstansiasi jd pake abstrak
 abstract class Product
{
    protected $judul, //dijadikan protected
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

    
    // dijadiin deklarsi abstrak  
    abstract public function getInfo();
}


// gunakan keyword implements 
class Komik extends Product implements InfoProduct {
  public $jmlHalaman;

  public function __construct($judul = "judul", $penulis, $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0) {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->jmlHalaman = $jmlHalaman;
  }

  public function getInfo() { 
    $str = "($this->judul) | {$this->getLabel()} (Rp. {$this->harga}";

    return $str;
  }

  public function getInfoProduct() { // dari interface InfoProduct
    $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman. ";
    return $str;
  }
}

// inheritance dan implementasi
class Game extends Product implements InfoProduct {
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit="penerbit", $harga = 0, $waktuMain = 0 ) {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->waktuMain = $waktuMain;
  }

  public function getInfo() { 
    $str = "($this->judul) | {$this->getLabel()} (Rp. {$this->harga}";

    return $str;
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
