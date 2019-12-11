<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lihat Pembeli</h1>
    <a href="{{url('admin/buyeradd')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-fw fa-user-plus text-white-50"></i> Tambah Pembeli
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pembeli</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Pembeli</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {%for buyer in data%}
                    <tr>
                        <td>1</td>
                        <td>{{buyer.id_user}}</td>
                        <td>{{buyer.name}}</td>
                        <td>{{buyer.email}}</td>
                        <td>{{buyer.username}}</td>
                    </tr>
                    {%endfor%}
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Id Pembeli</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>