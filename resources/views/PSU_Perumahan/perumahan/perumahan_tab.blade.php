
<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.perumahan.perumahan_edit')
    </div>
</div>
<!-- JIKA SUDAH SERAH TERIMA -->
@if ( $perumahans->status_perumahan =='Sudah Serah Terima')
<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.bast.index')
    </div>
</div>
@endif

<!-- JIKA BELUM SERAH TERIMA-->
@if ($perumahans->status_perumahan =='Belum Serah Terima')
<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.basta.index')
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.izin_lokasi.index')
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.ippt.index')
    </div>
</div>

<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.sk_siteplan.index')
    </div>
</div>
@endif

<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.koordinat_perumahan.tabel_koordinat_perumahan')
    </div>
</div>



