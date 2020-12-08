<!-- discography -->
<h3 class="text-center font-weight-bold">Perpustakaan</h3>


<!-- discography -->
<table class="table text-dark text-center">
<div class="kolom">
  <thead>
    <tr>
    <th scope="col">NO</th>
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
    <?php if($b['status'] == 1):?>
        <?php if ($b['status'] == 0){
            $image ="red";
        }else{
            $image="green";
        }
        ?>
      <tr>
      <th scope="row"><?= $i++;?> </th>
      <!-- <td><?= $b['id'];?></td> -->
      <td><img src="/img/<?= $b['cover']; ?>" alt=" " class="cover"></td>
      <td><?= $b['judul'];?></td>
      <td><?= $b['penulis'];?></td>
      <td><img src="/img/<?= $image ?>.png " width="10px" height="10px" alt=" " class="status"></td>
      <td>
      <a href="/buku/<?=$b['slug'];?>" class="btn btn-outline-success">Detail</a> 
    </td>
    </tr>
    <?php endif;?>
    <?php endforeach; ?>
  </tbody>
</table>