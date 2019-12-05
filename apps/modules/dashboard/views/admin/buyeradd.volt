<div class="card mx-auto mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Pembeli</h6>
    </div>
    <div class="card-body">
        <form action="{{url('admin/buyeradd')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-md-12">
                    <label>Nama Pembeli</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Pembeli" autofocus>
                </div>
                <div class="form-group col-md-12">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group col-md-12">
                    <label>Alamat Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Alamat Email">
                </div>
            </div>

            <button type="submit" name="Simpan" value="Tambah" class="btn btn-primary btn-block"><i
                    class="fas fa-fw fa-user-plus"></i><span> Tambah Pembeli</span></button>
        </form>
    </div>


</div>