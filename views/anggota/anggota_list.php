<!doctype html>
<html>
    <head>
        <title>Fiesto Car</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Daftar Anggota</h2>
        <hr>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('anggota/create'),'Tambah', 'class="btn btn-warning"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('anggota/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('anggota'); ?>" class="btn btn-warning">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-warning" type="submit">Cari</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Anggota</th>
		<th>Email</th>
		<th>Kota</th>
		<th>Kategori</th>
		<th style="text-align:center" width="200px">Baca | Ubah | Hapus</th>
            </tr><?php
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $anggota->nama_anggota ?></td>
			<td><?php echo $anggota->email ?></td>
			<td><?php echo $anggota->kota ?></td>
			<td><?php echo $anggota->kategori ?></td>
			<td style="text-align:center" width="200px">
				<?php
				echo anchor(site_url('anggota/read/'.$anggota->id_anggota),'Baca',array('title'=>'detail','class'=>'btn btn-primary btn-sm'));
				echo '  ';
				echo anchor(site_url('anggota/update/'.$anggota->id_anggota),'Ubah',array('title'=>'ubah','class'=>'btn btn-warning btn-sm'));
				echo '  ';
				echo anchor(site_url('anggota/delete/'.$anggota->id_anggota),'Update','title="hapus" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin dihapus ?\')"');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-warning">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('anggota/excel'), 'Excel', 'class="btn btn-warning"'); ?>
		<?php echo anchor(site_url('anggota/word'), 'Word', 'class="btn btn-warning"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
