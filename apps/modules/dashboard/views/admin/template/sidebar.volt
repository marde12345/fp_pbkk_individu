<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url()}}">
        <div class="sidebar-brand-icon">
            {{ image("src":"/img/icon.png","style":"widht: 50px; height: 50px;") }}
        </div>
        <div class="sidebar-brand-text mx-3">Nandurshop</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Users
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenjual"
            aria-expanded="true" aria-controls="collapsePenjual">
            <i class="fas fa-fw fa-cog"></i>
            <span>Penjual</span>
        </a>
        <div id="collapsePenjual" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen Penjual</h6>
                <a class="collapse-item" href="{{url('admin/selleradd')}}">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Tambah Penjual</span>
                </a>
                <a class="collapse-item" href="{{url('admin/sellershow')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Lihat Penjual</span>
                </a>
                <a class="collapse-item" href="{{url('admin/sellerdel')}}">
                    <i class="fas fa-fw fa-trash"></i>
                    <span>Hapus Penjual</span>
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePembeli"
            aria-expanded="true" aria-controls="collapsePembeli">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pembeli</span>
        </a>
        <div id="collapsePembeli" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen Pembeli</h6>
                <a class="collapse-item" href="{{url('admin/buyeradd')}}">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Tambah Pembeli</span>
                </a>
                <a class="collapse-item" href="{{url('admin/buyershow')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Lihat Pembeli</span>
                </a>
                <a class="collapse-item" href="{{url('admin/buyerdel')}}">
                    <i class="fas fa-fw fa-trash"></i>
                    <span>Hapus Pembeli</span>
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Produk
    </div>

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-plus"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->