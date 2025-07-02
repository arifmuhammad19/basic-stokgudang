<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Stok Barang</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/pace/pace.min.css">

  <?php
    function rupiah($angka){
      $hasil_rupiah = "Rp. " . number_format($angka,0,',','.');
      return $hasil_rupiah;
    }

    function tgl_indo($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);
      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
  ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="container">
    <h3>Cetak Barang</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Tanggal</th>
          <th>Tujuan</th>
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
            <td><?php echo $ctk->nama_barang; ?></td> <!-- Menampilkan nama barang -->
            <td><?php echo tgl_indo($ctk->tanggal); ?></td>
            <td><?php echo $ctk->tujuan; ?></td>
            <td><?php echo $ctk->jumlah; ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>  
  </div>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/') ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/') ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/') ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/') ?>dist/js/demo.js"></script>
<!-- PACE -->
<script src="<?php echo base_url('assets/') ?>plugins/pace/pace.min.js"></script>
<script type="text/javascript">
  window.print();
</script>
</body>
</html>
