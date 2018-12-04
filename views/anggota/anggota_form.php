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
        <h2 style="margin-top:0px">Daftar Anggota</h2>
        <hr>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Anggota <?php echo form_error('nama_anggota') ?></label>
            <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" placeholder="Nama Anggota" value="<?php echo $nama_anggota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Ktp <?php echo form_error('no_ktp') ?></label>
            <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No Ktp" value="<?php echo $no_ktp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Sim <?php echo form_error('no_sim') ?></label>
            <input type="text" class="form-control" name="no_sim" id="no_sim" placeholder="No Sim" value="<?php echo $no_sim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Telepon <?php echo form_error('no_telepon') ?></label>
            <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="No Telepon" value="<?php echo $no_telepon; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kota <?php echo form_error('id_wilayah') ?></label>
            <?php echo cmb_dinamis('id_wilayah','wilayah','kota','id_wilayah',$id_wilayah) ?>
            <!-- <input type="text" class="form-control" name="id_wilayah" id="id_wilayah" placeholder="Id Wilayah" value="<?php echo $id_wilayah; ?>" /> -->
        </div>
	    <div class="form-group">
            <label for="varchar">Sandi <?php echo form_error('sandi') ?></label>
            <input type="text" class="form-control" name="sandi" id="sandi" placeholder="Sandi" value="<?php echo $sandi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kategori <?php echo form_error('id_kategori') ?></label>
            <?php echo cmb_dinamis('id_kategori','kategori_anggota','kategori','id_kategori',$id_kategori) ?>
            <!-- <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" /> -->
        </div>
	    <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>" />
	    <button type="submit" class="btn btn-warning">Simpan</button>
	    <a href="<?php echo site_url('anggota') ?>" class="btn btn-warning">Batal</a>
	</form>
    </body>
</html>
