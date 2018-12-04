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
        <h2>Dafter Mobil</h2>
        <hr>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Plat</th>
		<th>Merk</th>
		<th>Warna</th>
		<th>Tahun</th>
		<th>Id Jenis</th>
		<th>Id Wilayah</th>
		<th>Harga Sewa</th>
		<th>Id Kondisi</th>

            </tr><?php
            foreach ($mobil_data as $mobil)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mobil->no_plat ?></td>
		      <td><?php echo $mobil->merk ?></td>
		      <td><?php echo $mobil->warna ?></td>
		      <td><?php echo $mobil->tahun ?></td>
		      <td><?php echo $mobil->id_jenis ?></td>
		      <td><?php echo $mobil->id_wilayah ?></td>
		      <td><?php echo $mobil->harga_sewa ?></td>
		      <td><?php echo $mobil->id_kondisi ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
