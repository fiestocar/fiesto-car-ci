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
        <h2 style="margin-top:0px">Daftar Denda</h2>
        <table class="table table-bordered">
	    <tr><td>Jenis Denda</td><td><?php echo $jenis_denda; ?></td></tr>
	    <tr><td>Biaya Denda</td><td><?php echo $biaya_denda; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('denda') ?>" class="btn btn-warning">Kembali</a></td></tr>
	</table>
        </body>
</html>
