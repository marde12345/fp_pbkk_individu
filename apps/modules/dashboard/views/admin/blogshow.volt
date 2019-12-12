<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lihat Blog</h1>
    <a href="{{url('admin/blogadd')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-fw fa-user-plus text-white-50"></i> Tambah Blog
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Blog</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Blog</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    {%for blog in data%}
                    <tr>
                        <td>
                            {{blog.title}}
                        </td>
                        <td>
                            {{blog.blogdesc}}
                        </td>
                        <td>
                            <img width="200px" height="200px" src="../img/blogimg/{{blog.blogimg}}">
                        </td>
                    </tr>
                    {%endfor%}
                </tbody>
                <tfoot>
                    <tr>
                        <th>Judul</th>
                        <th>Blog</th>
                        <th>Gambar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>