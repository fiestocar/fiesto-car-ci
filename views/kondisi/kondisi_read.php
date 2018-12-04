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
        <h2 style="margin-top:0px">Kondisi Mobil</h2>
        <hr>
        <table class="table table-bordered">
	    <tr><td>Kondisi</td><td><?php echo $kondisi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kondisi') ?>" class="btn btn-warning">Kembali</a></td></tr>
	</table>
        </body>
</html>
