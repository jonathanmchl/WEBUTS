<div class="container">
<a href="/admin/create" class="btn btn-outline-info mb-4 mt-4">Tambah Data Buku</a> 
<h1 class=" text-center">Hasil Pencarian Data Buku</h1>

<form action="/libcontrol/admsearch" method="get">
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
      <th scope="col">STATUS PINJAM</th>
      <th scope="col">LEBIH</th>
      
    </tr>
  </thead>
  </div>

  <tbody>
  <?php $i=1; ?>
  
      <?php foreach($buku as $b) : ?>
        <?php if ($b['status'] == 0){
$image ="red";
  }else{
    $image="green";
  }
  ?>
    <tr>
      <th scope="row"><?= $i++;?> </th>
      <td><?= $b['id'];?></td>
      <td><img src="/img/<?= $b['cover']; ?>" alt=" " class="cover"></td>
      <td><?= $b['judul'];?></td>
      <td><?= $b['penulis'];?></td>
      <td><img src="/img/<?= $image ?>.png " width="10px" height="10px" alt=" " class="status"></td>
       
      <td>
      
    <a href="/admin/<?=$b['slug'];?>" class="btn btn-outline-success">Detail</a> 
    <form action ="/admin/<?=$b['id']; ?>"method="post" class="d-inline">
        <?= csrf_field();?>
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-outline-warning "onclick="return confirm('Apakah anda yakin?');">Delete</button>

        </form>  
        <a href="/admin/edit/<?= $b['slug']; ?>"class="btn btn-outline-info">Edit</a>    

    </td>
    </tr>
      <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>