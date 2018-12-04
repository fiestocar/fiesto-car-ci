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
        <h2 style="margin-top:0px">Jenis Mobil</h2>
        <hr>
        <table class="table table-bordered">
	    <tr><td>Nama Jenis</td><td><?php echo $nama_jenis; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis') ?>" class="btn btn-warning">Batal</a></td></tr>
	</table>
        </body>
</html>
