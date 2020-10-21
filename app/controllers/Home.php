<?php 
  class Home extends Controller{
    public function index(){
      $data['judul'] = 'Home';
      // memanggil model nya sekaligus meng instansiasi class nya lalu panggil method nya
      $data['nama'] = $this->model('User_model')->getUser();
      $this->view('templates/header', $data);
      $this->view('home/index', $data);
      $this->view('templates/footer');
    }
  }

?>