<div class="row mt-1">
    <div class="col-3 bg-gray-200 rounded" style="height: 100%;">
        <div class="nav flex-column nav-pills border-primary" id="v-pills-tab" role="tablist"
             aria-orientation="vertical">
            <a class="nav-link active" id="v-data-perumahan" data-toggle="pill"
               href="#v-perumahan" role="tab">Data Perumahan</a>
            <a class="nav-link" id="v-foto-siteplan" data-toggle="pill"
               href="#v-siteplan" role="tab">Foto Siteplan / Perumahan</a>
            <a class="nav-link" id="v-data-koordinat" data-toggle="pill"
               href="#v-koordinat" role="tab">Input Data Koordinat</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-perumahan" role="tabpanel"
                 aria-labelledby="v-pills-home-tab">
                @include('PSU_Perumahan.perumahan.perumahan_edit')
            </div>
            <div class="tab-pane fade" id="v-siteplan" role="tabpanel"
                 aria-labelledby="v-pills-profile-tab">
                @include('PSU_Perumahan.foto_siteplan.foto_siteplan')
            </div>
            <div class="tab-pane fade" id="v-koordinat" role="tabpanel"
                 aria-labelledby="v-pills-messages-tab">
                @include('PSU_Perumahan.koordinat_perumahan.koordinat_perumahan')
            </div>
        </div>
    </div>
</div>






















<!--Scrpit Data Sarana -->
<script type="text/javascript" src="../../assets/js/getKelurahan.js"></script>

<script type="text/javascript">
    var status_perumahan = $('#status_perumahan').val();

    function displayForm(elem) {
        if (elem.value === "Sudah Serah Terima") {
            document.getElementById('tgl_serah_terima').style.display = "block";

        } else if (elem.value === "Belum Serah Terima") {
            document.getElementById('tgl_serah_terima').style.display = "none";

        } else if (elem.value === "Terlantar") {
            document.getElementById('tgl_serah_terima').style.display = "none";

        } else if (status_perumahan === "{{$perumahans->status_perumahan}}") {
            document.getElementById('tgl_serah_terima').style.display = "block";

        }
    }
</script>

