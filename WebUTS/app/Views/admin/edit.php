<div class="container">


<h2>Ubah Data Buku</h2>

<form action="/libcontrol/update/<?= $buku['id'];?>" method="post" enctype="multipart/form-data">
<?= csrf_field();?>
<input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
<input type="hidden" name="coverLama" value="<?= $buku['cover']; ?>">
  <div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?=($validation->hasError('judul'))? 'is-invalid':''; ?>" id="judul" name="judul" autofocus value="<?= $buku['judul'];?>">
      <div class="invalid-feedback"><?=$validation->getError('judul'); ?></div>
    </div>
   </div>

   <div class="form-group row">
    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?=($validation->hasError('penulis'))? 'is-invalid':''; ?>" id="penulis" name="penulis" value="<?= $buku['penulis'];?>">
      <div class="invalid-feedback"><?=$validation->getError('penulis'); ?></div>
    </div>
  </div>

  <div class="form-group row">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?=($validation->hasError('penerbit'))? 'is-invalid':''; ?>" id="penerbit" name="penerbit" value="<?= $buku['penerbit'];?>">
      <div class="invalid-feedback"><?=$validation->getError('penerbit'); ?></div>
    </div>
  </div>

  <div class="form-group row">
    <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
    <div class="col-sm-10">
      <input type="text" class="form-control  <?=($validation->hasError('sinopsis'))? 'is-invalid':''; ?>" id="sinopsis" name="sinopsis"value="<?= $buku['sinopsis'];?>">
      <div class="invalid-feedback"><?=$validation->getError('sinopsis'); ?></div>
    </div>
  </div>

  <div class="form-group row">
    <label for="nomor_pinjam" class="col-sm-2 col-form-label">ID Peminjaman</label>
    <div class="col-sm-10">
      <input type="text" class="form-control " id="nomor_pinjam" name="nomor_pinjam" value="<?= $buku['nomor_pinjam'];?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="nama_pinjam" class="col-sm-2 col-form-label">Nama Peminjam</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama_pinjam" name="nama_pinjam" value="<?= $buku['nama_pinjam'];?>">
    </div>
  </div>

  <div class="form-group row ">
  <label for="status" class="col-sm-2 col-form-label">Status</label>

  <div class="form-check form-check-inline mx-auto">
  <input class="form-check-input <?=($validation->hasError('status'))? 'is-invalid':''; ?>" type="radio" name="status" id="status" value='0'>
  <label class="form-check-label" for="inlineRadio1">dipinjam</label>    
</div>

<div class="form-check form-check-inline mx-auto">
  <input class="form-check-input <?=($validation->hasError('status'))? 'is-invalid':''; ?>" type="radio" name="status" id="status" value='1'>
  <label class="form-check-label" for="inlineRadio2">tidak dipinjam</label>
</div>
</div>

  <div class="form-group row">
    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
    <div class="col-sm-2">
    <img src="/img/<?=$buku['cover'];?>" class="img-thumbnail img-preview">

    </div>
    <div class="col-sm-8">
    <div class="custom-file">
  <input type="file" class="custom-file-input <?=($validation->hasError('cover'))? 'is-invalid':''; ?>" id="cover"name="cover" onchange="previewImg()">
  <div class="invalid-feedback"><?=$validation->getError('cover'); ?></div>
  <label class="custom-file-label" for="cover"><?=$buku['cover'];?></label>
    </div>
  </div>
  
 
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-outline-primary">Ubah</button>
    </div>
  </div>
</form>


</div>