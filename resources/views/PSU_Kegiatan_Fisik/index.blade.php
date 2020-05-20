@extends('layouts/main')

@section('title', 'Web Programming Home')

@section('container-fluid')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <label for="operator">Filter Kecamatan</label>
            <select class="custom-select @error('kecamatan') is-invalid @enderror"
                    id="kecamatan" name="kecamatan"
                    value="{{ old('kecamatan') }}">
                <option value="">--Pilih Kecamatan--</option>
                @foreach( $kecamatans as $kecamatan)
                <option value="{{ $kecamatan->nama_kecamatan }}">
                    {{ $kecamatan->nama_kecamatan }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <label for="kelurahan">Filter Keluarahan/Desa</label>
            <select class="custom-select @error('kelurahan') is-invalid @enderror"
                    id="kelurahan" name="kelurahan"
                    value="{{ old('kelurahan') }}">
                <option value="">--Pilih Keluarahan--</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label for="kelurahan">Filter</label>
            <div class="form-group" align="center">
                <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                <button type="button" name="reset" id="reset" class="btn btn-primary">Reset</button>
            </div>
        </div>
    </div>
    <br/>
    <div class="table-responsive">
        <table id="customer_data" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Nama Perumahan</th>
                <th>Nama Pengembang</th>
            </tr>
            </thead>
        </table>
    </div>
</div>


<script>
    $(document).ready(function () {

        fill_datatable();

        function fill_datatable(filter_gender = '', filter_country = '') {
            var dataTable = $('#customer_data').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/kegiatanfisik') }}",
                    data: {kecamatan: kecamatan, kelurahan: kelurahan}
                },
                columns: [
                    {
                        data: 'nama_perumahan',
                        name: 'nama_perumahan'
                    },
                    {
                        data: 'nama_pengembang',
                        name: 'nama_pengembang'
                    },
                ]
            });
        }

        $('#filter').click(function () {
            var filter_gender = $('#filter_gender').val();
            var filter_country = $('#filter_country').val();

            if (filter_gender != '' && filter_gender != '') {
                $('#customer_data').DataTable().destroy();
                fill_datatable(filter_gender, filter_country);
            } else {
                alert('Select Both filter option');
            }
        });

        $('#reset').click(function () {
            $('#filter_gender').val('');
            $('#filter_country').val('');
            $('#customer_data').DataTable().destroy();
            fill_datatable();
        });

    });
</script>
<script type="text/javascript" src="../assets/js/getKelurahanPerumahan.js"></script>


@endsection
