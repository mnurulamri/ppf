<ul class="sidebar-menu">
    <li class="active">
            <a href="<?=base_url()?>home/home">
                <img height="20" src="../membership/assets/theme_admin/img/home.png"> <span>Beranda</span>
            </a>
    </li>

    <!-- Menu Peminjaman -->
    <li  class="treeview ">
        <a href="#">
            <img height="20" src="../membership/assets/theme_admin/img/transaksi.png">
            <span>Peminjaman</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="">  <a href="#"> <i class="fa fa-folder-open-o"></i> Form Pengajuan </a></li>
            <li class=""><a href="#"> <i class="fa fa-folder-open-o"></i> Status Peminjaman</a></li>
        </ul>
    </li>
    <li  class="treeview ">
        <a href="#">
            <img height="20" src="../membership/assets/theme_admin/img/transaksi.png">
            <span>Peta Ruang</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="">  <a href="<?=base_url()?>peminjaman/ruang_jadwal"> <i class="fa fa-folder-open-o"></i> Ruang Kelas </a></li>
            <li class=""><a href="#"> <i class="fa fa-folder-open-o"></i> AJS </a></li>
            <li class=""><a href="#"> <i class="fa fa-folder-open-o"></i> ... </a></li>
        </ul>
    </li>
</ul>