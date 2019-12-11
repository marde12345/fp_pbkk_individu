<div class="card mx-auto mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Penjual</h6>
    </div>
    <div class="card-body">
        <form action="{{url('admin/selleradd')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Nama Penjual</label>
                    {{form.render('name')}}
                </div>
                <div class="form-group col-md-12">
                    <label>Username</label>
                    {{form.render('username')}}
                </div>
                <div class="form-group col-md-12">
                    <label>Alamat Email</label>
                    {{form.render('email')}}
                </div>
            </div>

            <button type="submit" name="Simpan" value="Tambah" class="btn btn-primary btn-block"><i
                    class="fas fa-fw fa-user-plus"></i><span> Tambah Penjual</span></button>
        </form>
    </div>


</div>