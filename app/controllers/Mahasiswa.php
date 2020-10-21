<?php 
// biasakan ketika class baru extends ke Controller
class Mahasiswa extends Controller{
  public function index(){
    $data['judul'] = 'Daftar Mahasiswa';
    // baca sintaks : $this model(ambil class Mahasiswa_model) lalu ambil method nya 
    $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
    $this->view('templates/header', $data);
    $this->view('mahasiswa/index', $data);
    $this->view('templates/footer');
  }
}

?>