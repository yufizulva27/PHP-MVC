<?php 

class App {
  //propertin ini untuk menentukan controller method dan parameter default nya
  protected $controller = 'Home'; //protected yaitu sebuah access modifier Untuk mendefinisikan data atau metode untuk tidak terlihat dari luar (seperti private), tetapi akan dapat diakses oleh “anak” dari class tersebut.Berikut adalah contoh kode implementasi dari encapsulasi.123456789101112131415161718<?phpclass Person{private $_name;private $_age;function __construct($name, $age = 0){if (!is_int($age)){throw new Exception("Cannot assign non integer value to integer field, 'Age'");}$this->_age = $age;$this->_name = $name;}
  protected $method = 'index';
  protected $params = [];

  public function __construct() {
     $url = $this->parseURL();

    /****** controller ******/
     
    // cek adakah sebuah file didalam folder controller yg namanya Home sesuai denga yg kita tulis di url
    // untuk cek file nya menggunakan fungsi file_exists('filename')
     if ( file_exists('../app/controllers/' . $url[0] . '.php') ) {
      // jika ada maka timpa controller diatas menjadi controller baru
       $this->controller = $url[0];
       unset($url[0]);
     }

    //  panggil controller nya lalu gabung dengan controlller baru
    require_once '../app/controllers/' . $this->controller . '.php';

    // lalu kita instansiasi class nya suapaya kita bisa panggil method nya nanti
    $this->controller = new $this->controller;


    /* method */

    //cek method
    // kalo method !isset tetap pake method default, kalo isset / ada maka cek lagi
    if (isset($url[1]) ) {
      //cek lagi adakah method nya di dalam controller
      //method_exists(object, method_naame) fungsi ini untuk cek ada tidak method nya
      // logikanya if(method_exists($this->controller, $url[1])) 'dari controllernya ada tidak methodnya ($url[1])'
      if(method_exists($this->controller, $url[1])){
        // kalo ada timpa dengan method baru
        $this->method = $url[1];
        // lalu kita unset lagi, jadi sisanya hanya parameter nya saja
        unset($url[1]);
      }
    }

    // params / parameter

    // kelola parameternya
    if(!empty($url)){
      // untuk ambil parameter nya menggunakan fungsi array_values()
      $this->params = array_values($url);
    }

    //paling penting
    //jalankan controller & method serta kirimkan params jika ada, ini menggunakan fungsi call_user_func_array(function, param_arr)
    call_user_func_array([$this->controller, $this->method], $this->params);

  }

  public function parseURL(){
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/'); //fungsi rtrim() untuk menghapus satu karakter.
      $url = filter_var($url, FILTER_SANITIZE_URL); //filter_var(variabel) beerfungsi untuk mecegah karakter karakter aneh, untuk membersihkan nya menggunakan parameter FILTER_SANITIZE_URL
      $url = explode('/', $url); // explode(delimiter, string) berfungsi untuk pembatas url
      return $url;
    }
  }
}

?>