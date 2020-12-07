<h2 class="mt-2 text-center"> Detail Peminjaman </h2>
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
        <h6 class="card-subtitle mb-2 text-muted">Nomor Peminjam :<b><?= $buku['nomor_pinjam'];?> </h6>
        <h6 class="card-subtitle mb-2 text-muted">Nama Peminjam :<b><?= $buku['nama_pinjam'];?> </h6>
        <?php if ($buku['status'] == 0){
$image ="red";
  }else{
    $image="green";
  }
  ?>
        <h6 class="card-subtitle mb-5 text-muted">Status : <img src="/img/<?= $image ?>.png " width="10px" height="10px" alt=" " class="status"></h6>
        <a href="/admin/edit/<?= $buku['slug']; ?>"class="btn btn-outline-info">Edit</a>



        <form action ="/admin/<?=$buku['id']; ?>"method="post" class="d-inline">
        <?= csrf_field();?>
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-outline-warning"onclick="return confirm('Apakah anda yakin?');">Delete</button>

        </form>
        <br><br>
        <a href="/admin">Kembali Ke Daftar Peminjaman</a>

      </div>
    </div>
  </div>
</div>