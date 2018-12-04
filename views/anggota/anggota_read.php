<!doctype html>
<html>
    <head>
        <title>Fiesto Car</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Data Anggota</h2>
        <hr>
        <table class="table table-bordered">
	    <tr><td>Nama Anggota</td><td><?php echo $nama_anggota; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Ktp</td><td><?php echo $no_ktp; ?></td></tr>
	    <tr><td>No Sim</td><td><?php echo $no_sim; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>No Telepon</td><td><?php echo $no_telepon; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $id_wilayah; ?></td></tr>
	    <tr><td>Sandi</td><td><?php echo $sandi; ?></td></tr>
	    <tr><td>Kategori</td><td><?php echo $id_kategori; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('anggota') ?>" class="btn btn-warning">Kembali</a></td></tr>
	</table>
        </body>
</html>
