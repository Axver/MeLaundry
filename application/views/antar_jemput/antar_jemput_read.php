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
        <h2 style="margin-top:0px">Antar_jemput Read</h2>
        <table class="table">
	    <tr><td>Lokasi Jemput</td><td><?php echo $lokasi_jemput; ?></td></tr>
	    <tr><td>Lokasi Antar</td><td><?php echo $lokasi_antar; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Biaya</td><td><?php echo $biaya; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('antar_jemput') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>