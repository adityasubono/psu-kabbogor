<div class="row mt-1">
    <div class="col-3 bg-gray-200 rounded" style="height: 100%;">
        <div class="nav flex-column nav-pills border-primary" id="v-pills-tab" role="tablist"
             aria-orientation="vertical">
            <a class="nav-link active" id="v-data-perumahan" data-toggle="pill"
               href="#v-1" role="tab">Data Sarana</a>
            <a class="nav-link" id="v-foto-siteplan" data-toggle="pill"
               href="#v-2" role="tab">Foto Sarana</a>
            <a class="nav-link" id="v-data-koordinat" data-toggle="pill"
               href="#v-3" role="tab">Input Data Koordinat Sarana</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-1" role="tabpanel"
                 aria-labelledby="v-pills-home-tab">
                @include('PSU_Perumahan.sarana.index')
            </div>
            <div class="tab-pane fade" id="v-2" role="tabpanel"
                 aria-labelledby="v-pills-profile-tab">
                @include('PSU_Perumahan.sarana.foto.foto_sarana')
            </div>
            <div class="tab-pane fade" id="v-3" role="tabpanel"
                 aria-labelledby="v-pills-messages-tab">

            </div>
        </div>
    </div>
</div>


