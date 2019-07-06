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
        <h2 style="margin-top:0px">Antar_jemput <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Lokasi Jemput <?php echo form_error('lokasi_jemput') ?></label>
            <input type="text" class="form-control" name="lokasi_jemput" id="lokasi_jemput" placeholder="Lokasi Jemput" value="<?php echo $lokasi_jemput; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi Antar <?php echo form_error('lokasi_antar') ?></label>
            <input type="text" class="form-control" name="lokasi_antar" id="lokasi_antar" placeholder="Lokasi Antar" value="<?php echo $lokasi_antar; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Biaya <?php echo form_error('biaya') ?></label>
            <input type="text" class="form-control" name="biaya" id="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>" />
        </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('antar_jemput') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>