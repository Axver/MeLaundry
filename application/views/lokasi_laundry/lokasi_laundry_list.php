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
        <h2 style="margin-top:0px">Lokasi_laundry List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('lokasi_laundry/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('lokasi_laundry/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('lokasi_laundry'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id User</th>
		<th>Geom</th>
		<th>Jam Buka</th>
		<th>Jam Tutup</th>
		<th>Foto</th>
		<th>Action</th>
            </tr><?php
            foreach ($lokasi_laundry_data as $lokasi_laundry)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $lokasi_laundry->id_user ?></td>
			<td><?php echo $lokasi_laundry->geom ?></td>
			<td><?php echo $lokasi_laundry->jam_buka ?></td>
			<td><?php echo $lokasi_laundry->jam_tutup ?></td>
			<td><?php echo $lokasi_laundry->foto ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('lokasi_laundry/read/'.$lokasi_laundry->id_lokasi),'Read'); 
				echo ' | '; 
				echo anchor(site_url('lokasi_laundry/update/'.$lokasi_laundry->id_lokasi),'Update'); 
				echo ' | '; 
				echo anchor(site_url('lokasi_laundry/delete/'.$lokasi_laundry->id_lokasi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>