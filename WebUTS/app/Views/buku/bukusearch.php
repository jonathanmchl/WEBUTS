<div class="container">
<h1 class=" text-center">Hasil Pencarian Data Buku</h1>

<form action="/libcontrol/bukusearch" method="get">
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Masukkan Keyword Pencarian" name="keyword">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
  </div>
</div>
</form>

<?php if(session()->getFlashdata('pesan')):?>
  <div class="alert alert-success" role="alert">
  <?=session()->getFlashdata('pesan');?>
</div>
<?php endif;?>


<table class="table text-dark text-center">
<div class="kolom">
  <thead>
    <tr>
    <th scope="col">NO</th>
      <th scope="col">ID_BUKU</th>
      <th scope="col">COVER</th>
      <th scope="col">JUDUL</th>
      <th scope="col">PENULIS</th>
      <th scope="col">LEBIH</th>
      
    </tr>
  </thead>
  </div>

  <tbody>
  <?php $i=1; ?>
      <?php foreach($buku as $b) : ?>
    <tr>
      <th scope="row"><?= $i++;?> </th>
      <td><?= $b['id'];?></td>
      <td><img src="/img/<?= $b['cover']; ?>" alt=" " class="cover"></td>
      <td><?= $b['judul'];?></td>
      <td><?= $b['penulis'];?></td>
      <td> 
      
    <a href="/buku/<?=$b['slug'];?>" class="btn btn-outline-success">Detail</a>  

    </td>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>