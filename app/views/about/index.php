<div class="container mt-4">
  <img src="<?= BASEURL;?>/img/ufii.jpg" alt="Yufi Fahreza" width="200" class="rounded-circle shadow">
  <h1>About Me</h1>
  <!-- $data ini di ambil dari $data yg berada di controller about -->
  <p>Hallo saya <?= $data['nama'] ?>, Umur saya <?= $data['umur'] ?> tahun, Saya seorang <?= $data['pekerjaan'] ?></p>
</div>