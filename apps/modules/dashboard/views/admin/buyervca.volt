<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lihat User Non-Verification</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Non-Verification</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id Pembeli</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {%for buyer in data%}
                    <tr>
                        <td>{{buyer.id_user}}</td>
                        <td>{{buyer.name}}</td>
                        <td>{{buyer.email}}</td>
                        <td>{{buyer.userstatus}}</td>
                        <td>
                            <a href="{{url('/sendmail/')~buyer.verifcode}}" class="btn btn-success btn-circle">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    {%endfor%}
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id Pembeli</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>