<!doctype html>
<html>
    <head>
        <title>Fiesto Car</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important;
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important;
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Daftar Anggota</h2>
        <hr>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Anggota</th>
		<th>Alamat</th>
		<th>No Ktp</th>
		<th>No Sim</th>
		<th>Email</th>
		<th>No Telepon</th>
		<th>Id Wilayah</th>
		<th>Sandi</th>
		<th>Id Kategori</th>

            </tr><?php
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $anggota->nama_anggota ?></td>
		      <td><?php echo $anggota->alamat ?></td>
		      <td><?php echo $anggota->no_ktp ?></td>
		      <td><?php echo $anggota->no_sim ?></td>
		      <td><?php echo $anggota->email ?></td>
		      <td><?php echo $anggota->no_telepon ?></td>
		      <td><?php echo $anggota->id_wilayah ?></td>
		      <td><?php echo $anggota->sandi ?></td>
		      <td><?php echo $anggota->id_kategori ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
