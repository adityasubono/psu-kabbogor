<div class="form-group">

    @if (session('status'))
    <div class="alert alert-success fade show" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <meta name="_token" content="{{csrf_token()}}"/>
    <h5>Geser Gambar / Foto Disini</h5>
    <form method="post" action="{{url('/fotopertamanans/store')}}"
          enctype="multipart/form-data"
          class="dropzone" id="dropzone">
        <input type="hidden" class="form-control" id="pertamanan_id"
               name="pertamanan_id"
               value="{{$data_pertamanan->id}}">
        @csrf
    </form>
    <button type="button" class="btn btn-primary btn-icon-split mt-3"
            onClick="window.location.reload()">
                            <span class="icon text-white-50">
                                <i class="fas fa-download"></i>
                            </span>
        <span class="text">Simpan</span>
    </button>


</div>
