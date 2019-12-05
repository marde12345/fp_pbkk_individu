<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lihat Penjual</h1>
    <a href="{{url('admin/selleradd')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-fw fa-user-plus text-white-50"></i> Tambah Penjual
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Penjual</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Penjual</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    {%for seller in data%}
                    <tr>
                        <td>1</td>
                        <td>{{seller.ID_USER}}</td>
                        <td>{{seller.NAME}}</td>
                        <td>{{seller.EMAIL}}</td>
                        <td>{{seller.USERNAME}}</td>
                    </tr>
                    {%endfor%}
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Id Penjual</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>