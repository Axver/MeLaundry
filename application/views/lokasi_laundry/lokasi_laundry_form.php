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
        <h2 style="margin-top:0px">Lokasi_laundry <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Geom <?php echo form_error('geom') ?></label>
            <input type="text" class="form-control" name="geom" id="geom" placeholder="Geom" value="<?php echo $geom; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Jam Buka <?php echo form_error('jam_buka') ?></label>
            <input type="text" class="form-control" name="jam_buka" id="jam_buka" placeholder="Jam Buka" value="<?php echo $jam_buka; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Jam Tutup <?php echo form_error('jam_tutup') ?></label>
            <input type="text" class="form-control" name="jam_tutup" id="jam_tutup" placeholder="Jam Tutup" value="<?php echo $jam_tutup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div>
	    <input type="hidden" name="id_lokasi" value="<?php echo $id_lokasi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('lokasi_laundry') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>