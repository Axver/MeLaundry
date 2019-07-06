<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">              
            </div>
            <div class="pull-left info">            
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-database"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('antar_jemput') ?>"><i class="fa fa-motorcycle"></i>Antar Jemput</a></li>
                    <li><a href="<?php echo site_url('barang_transaksi') ?>"><i class="fa fa-money"></i>Transaksi</a></li>
                    <li><a href="<?php echo site_url('diskon') ?>"><i class="fa fa-cut"></i>Diskon</a></li>
                    <li><a href="<?php echo site_url('driver') ?>"><i class="fa fa-car"></i>Driver</a></li>
                    <li><a href="<?php echo site_url('driver_antar_jemput') ?>"><i class="fa fa-info-circle"></i>Driver Status</a></li>
                    <li><a href="<?php echo site_url('fasilitas') ?>"><i class="fa fa-bars"></i>Fasilitas</a></li>
                    <li><a href="<?php echo site_url('fasilitas_laundry') ?>"><i class="fa fa-info-circle"></i>Fasilitas Laundry</a></li>
                    <li><a href="<?php echo site_url('jenis_barang') ?>"><i class="fa fa-bullseye "></i>Jenis Barang</a></li>
                    <li><a href="<?php echo site_url('lokasi_laundry') ?>"><i class="fa fa-briefcase"></i>Laundry</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">