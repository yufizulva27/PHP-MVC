<?php 

// class controller ini meruakan kelas utama.
// sedangkan class-class yg kita buat di folder controllers adalah controller yg akan extend ke class Controller
class Controller {
  // method ini untuk memangggil view
  /* di method ini terdapat 2 parameter yg pertama untuk menangkap view pada folder controller/home.php 
    parameter kedua untuk jaga jaga siapa tau ada data yg mau dikirim pada view itu dan data itu dikasih nalai default yg berupa array
    karena mungkin saja data nya banyak atau bahkan tidak ada data yg dikirim */
  public function view($view, $data = []){
    // call views
    require_once '../app/views/' . $view . '.php';
  }

  public function model($model){
    require_once '../app/models/' . $model . '.php';
    // karena model adalah class maka kita instansiasi dulu
    return new $model;
  }
}

?>