<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Wilayah Operasi</h2>
        <hr>
        <table class="table table-bordered">
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('wilayah') ?>" class="btn btn-warning">Kembali</a></td></tr>
	</table>
        </body>
</html>
