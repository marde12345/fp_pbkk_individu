<div class="card mx-auto mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Blog</h6>
    </div>
    <div class="card-body">
        <form action="{{url('admin/addblog')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Judul</label>
                    {{form.render('title')}}
                </div>
                <div class="form-group col-md-12">
                    <label>Deskripsi</label>
                    {{form.render('blogdesc')}}
                </div>
                <div class="form-group col-md-12">
                    <label>Thumbnail</label>
                    {{form.render('blogimg')}}
                </div>
            </div>

            <button type="submit" name="Simpan" value="Tambah" class="btn btn-primary btn-block"><i
                    class="fas fa-fw fa-user-plus"></i><span> Tambah Blog</span></button>
        </form>
    </div>


</div>