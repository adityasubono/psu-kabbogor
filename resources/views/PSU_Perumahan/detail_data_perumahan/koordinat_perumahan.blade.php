
<h5 class="mt-3">Data Koordinat Perumahan</h5>

<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Koordinat Longitude</th>
        <th scope="col">Koordinat Latitude</th>
    </tr>
    </thead>
    <tbody>
    @forelse( $data_koordinat_perumahan as $koordinat_perumahan )
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$koordinat_perumahan->longitude}}</td>
        <td>{{$koordinat_perumahan->latitude}}</td>
    </tr>
    @empty
    <tr>
        <th scope="row" colspan="4" class="text-center" style="color: red">Data Tidak
            Tersedia</th>
    </tr>
    @endforelse
    </tbody>
</table>
