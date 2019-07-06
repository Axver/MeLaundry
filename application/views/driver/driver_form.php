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
        <h2 style="margin-top:0px">Driver <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Lokasi <?php echo form_error('id_lokasi') ?></label>
            <input type="text" class="form-control" name="id_lokasi" id="id_lokasi" placeholder="Id Lokasi" value="<?php echo $id_lokasi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_driver" value="<?php echo $id_driver; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('driver') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>