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
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kondisi <?php echo form_error('kondisi') ?></label>
            <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="Kondisi" value="<?php echo $kondisi; ?>" />
        </div>
	    <input type="hidden" name="id_kondisi" value="<?php echo $id_kondisi; ?>" />
	    <button type="submit" class="btn btn-warning">Simpan</button>
	    <a href="<?php echo site_url('kondisi') ?>" class="btn btn-warning">Batal</a>
	</form>
    </body>
</html>
