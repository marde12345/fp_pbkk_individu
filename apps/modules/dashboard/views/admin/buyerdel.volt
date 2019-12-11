<div class="card mx-auto mt-3">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-danger">Hapus Pembeli</h6>
    </div>
    <div class="card-body">
        <form action="{{url('admin/buyerdel')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Pembeli</label>
                <select type="text" name="id_user" class="js-example-basic-single form-control" id="hapus-pelanggan"
                    required autofocus="">
                    <option value="">Pilih Pembeli</option>
                    {%for buyer in data%}
                    <option value='{{buyer.id_user}}'>{{buyer.name}} - {{buyer.username}}</option>
                    {%endfor%}
                </select>
            </div>

            <button type="submit" name="Hapus" value="Hapus" class="btn btn-danger btn-block"><i
                    class="fas fa-fw fa-trash"></i><span> Hapus Pembeli</span></button>
        </form>
    </div>


</div>