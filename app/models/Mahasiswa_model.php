<?php 

class Mahasiswa_model{
  // note : data ini bisa di dapat dari mana aja seperti database, API atau dari tempat lain
  /* pembuatan database 
    1. membuat beberapa variabel untuk mengelola databasenya
    2. cara konek kedatabase menggunakan driver PDO, dengan menggunakan PDO ini lebih felksibel ketika kedepannya
    mau mengganti database misalnya bukan menggunakan MySql lagi, dengan PDO akan lebih mudah daripada menggunakan drivernya MySqli.
  */
  // nama variabel nya mengikuti di php.net yaitu dbh atau database handler untuk menampung koneksi kedatabase
  private $dbh;
  // $stmt ini untuk menyimpan query
  private $stmt;

  // koneksi ke database di dalam method __contruct() supaya ketika model ini di panggil maka dia akan koneksi dulu ke database
  public function __construct()
  {
    // dsn ini singkatan dari data source name , ini untuk identitas server kita
    // dsn ini diisi dengan koneksi ke PDO nya
    $dsn = 'mysql:host=localhost:dbname=phpmvc';

    // kita cek menggunakan "blok try-catch" apakah koneksi nya berhasil atau tidak
    try {
      $this->dbh = new PDO($dsn, 'root', '');
    } catch (PDOException $e) {  // lalu ketika error tankap exception nya
      // jika error maka hentikan program nya dan berikan pesan error
      die ($e->getMessage());
    } 
  }


    public function getAllMahasiswa(){
      // untuk mendapatkan semua mahasiswanya kita butuh query nya
      // jika menggunakan PDO kita harus prepare() dulu baru masukan querynya
      $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
      // lalu kita eksekusi menggunakan perintah execute(), jadi 2 kali kalo PDO supaya aman
      $this->stmt->execute();
      // terakhir ambil datanya
      // berikan parameter di fetchAll mau sebagai apa dikembalikan datanya, kita sebagai array asosiative
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //ambil semua datanya jika ada banyak
    }
}

?>