<div class="card mx-auto mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
    </div>
    <div class="card-body">
        <form action="{{url('admin/addkat')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Kategori</label>
                    {{form.render('kategori')}}
                </div>
                <div class="form-group col-md-12">
                    <label>Gambar Icon</label>
                    {{form.render('icon')}}
                </div>
            </div>

            <button type="submit" name="Simpan" value="Tambah" class="btn btn-primary btn-block"><i
                    class="fas fa-fw fa-user-plus"></i><span> Tambah Kategori</span></button>
        </form>
    </div>


</div>