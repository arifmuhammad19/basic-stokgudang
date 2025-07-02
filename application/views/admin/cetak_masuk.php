<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Barang Masuk</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h3>Cetak Barang Masuk</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Tanggal</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no = 1;
          foreach ($cetak as $ctk):
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $ctk->kode; ?></td>
            <td><?php echo $ctk->nama_barang; ?></td>
            <td><?php echo tgl_indo($ctk->tanggal); ?></td>
            <td><?php echo $ctk->jumlah; ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>  
  </div>
  <script type="text/javascript">
    window.print();
  </script>
</body>
</html>
