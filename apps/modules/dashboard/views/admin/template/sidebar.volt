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
        Penjual
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/selleradd')}}">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Tambah Penjual</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/sellershow')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Lihat Penjual</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/sellerdel')}}">
            <i class="fas fa-fw fa-trash"></i>
            <span>Hapus Penjual</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pembeli
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/buyeradd')}}">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Tambah Pembeli</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/buyershow')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Lihat Pembeli</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/buyerdel')}}">
            <i class="fas fa-fw fa-trash"></i>
            <span>Hapus Pembeli</span></a>
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