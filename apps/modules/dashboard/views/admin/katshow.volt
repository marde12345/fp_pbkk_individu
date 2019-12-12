<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lihat Kategori</h1>
    <a href="{{url('admin/katadd')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-fw fa-user-plus text-white-50"></i> Tambah Kategori
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id Kategori</th>
                        <th>Kategori</th>
                        <th>Icon</th>
                    </tr>
                </thead>
                <tbody>
                    {%for kat in data%}
                    <tr>
                        <td>
                            {{kat.id_category}}
                        </td>
                        <td>
                            {{kat.kategori}}
                        </td>
                        <td>
                            <img width="200px" height="200px" src="../img/icon_category/{{kat.icon}}">
                        </td>
                    </tr>
                    {%endfor%}
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id Kategori</th>
                        <th>Kategori</th>
                        <th>Icon</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>