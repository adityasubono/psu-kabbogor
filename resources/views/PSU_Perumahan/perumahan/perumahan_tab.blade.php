
<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.perumahan.perumahan_edit')
    </div>
</div>
<!-- JIKA SUDAH SERAH TERIMA -->
<div class="card mb-3">
    <div class="card-body">
        @include('PSU_Perumahan.bast.index')
    </div>
</div>

<!-- JIKA BELUM SERAH TERIMA-->
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


<!--<div class="col-12">-->
<!--    <div class="tab-content" id="v-pills-tabContent">-->
<!--        <div class="tab-pane fade show active" id="v-perumahan" role="tabpanel"-->
<!--             aria-labelledby="v-pills-home-tab">-->
<!---->
<!--        </div>-->
<!--        <div class="tab-pane fade" id="v-siteplan" role="tabpanel"-->
<!--             aria-labelledby="v-pills-profile-tab">-->
<!---->
<!--        </div>-->
<!--        <div class="tab-pane fade" id="v-koordinat" role="tabpanel"-->
<!--             aria-labelledby="v-pills-messages-tab">-->
<!--            -->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<!--Scrpit Data Sarana -->
<!--<script type="text/javascript" src="../../assets/js/getKelurahan.js"></script>-->
<!---->
<!--<script type="text/javascript">-->
<!--    var status_perumahan = $('#status_perumahan').val();-->
<!---->
<!--    function displayForm(elem) {-->
<!--        if (elem.value === "Sudah Serah Terima") {-->
<!--            document.getElementById('tgl_serah_terima').style.display = "block";-->
<!---->
<!--        } else if (elem.value === "Belum Serah Terima") {-->
<!--            document.getElementById('tgl_serah_terima').style.display = "none";-->
<!---->
<!--        } else if (elem.value === "Terlantar") {-->
<!--            document.getElementById('tgl_serah_terima').style.display = "none";-->
<!---->
<!--        } else if (status_perumahan === "{{$perumahans->status_perumahan}}") {-->
<!--            document.getElementById('tgl_serah_terima').style.display = "block";-->
<!---->
<!--        }-->
<!--    }-->
<!--</script>-->
<!---->
