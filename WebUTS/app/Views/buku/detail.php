<h2 class="mt-2 text-center"> Detail Buku </h2>
<div class="card mb-3 mx-auto" style="max-width: 1000px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="/img/<?= $buku['cover'];?> " class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body ">
        <h5 class="card-title"><?= $buku['judul'];?></h5>
        <p class="card-text"><b>Penulis : <b><?= $buku['penulis'];?></p>
        <p class="card-text"><b>Penerbit : <b><?= $buku['penerbit'];?></p>
        <p class="card-text"><small class="text-muted"><?= $buku['sinopsis'];?></small></p>
       
        
        <a href="/buku">Kembali Ke Daftar Buku</a>

      </div>
    </div>
  </div>
</div>