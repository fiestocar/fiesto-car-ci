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
        <h2 style="margin-top:0px">Daftar Mobil</h2>
        <hr>
        <table class="table table-bordered">
	    <tr><td>No Plat</td><td><?php echo $no_plat; ?></td></tr>
	    <tr><td>Merk</td><td><?php echo $merk; ?></td></tr>
	    <tr><td>Warna</td><td><?php echo $warna; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Id Jenis</td><td><?php echo $id_jenis; ?></td></tr>
	    <tr><td>Id Wilayah</td><td><?php echo $id_wilayah; ?></td></tr>
	    <tr><td>Harga Sewa</td><td><?php echo $harga_sewa; ?></td></tr>
	    <tr><td>Id Kondisi</td><td><?php echo $id_kondisi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mobil') ?>" class="btn btn-warning">Kembali</a></td></tr>
	</table>
        </body>
</html>
