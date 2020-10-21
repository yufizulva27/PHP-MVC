<?php 
class About extends Controller{
  // cara menagkap data dari url tinggal tambahkan parameter di method nya contoh sepetrti di bawah
  public function index($nama = 'Yufi', $pekerjaan = 'Mahasiswa', $umur = '20'){

    /* cara mengirimkan data ke view, bagai mana caranya ? 
     di controller terdapat parameter $data yg berisi array kosong, jadi ketika kalian ingin mengirimkan data ke sini tinggal tambahkan 
     $data di view seperti dibawah ini*/
    $data['judul'] = 'About';
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['umur'] = $umur;
    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }
  public function page(){
    $data['judul'] = 'Page';
    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}

?>