<x-app>
    <style>
        /* Warna tab aktif sesuai gambar */
        .nav-pills .nav-link.active {
            background-color: #141927 !important;
            color: #fff !important;
        }
        .nav-link {
            border: 1px solid #141927 !important;
        }
    </style>

    <div class="container-fluid">
        <h2 class="mb-4 fw-bold ">KONFIGURASI</h2>
        <hr>

        <!-- Navigasi Tab -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-sistem-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-sistem" type="button" role="tab"
                    aria-controls="pills-sistem" aria-selected="false">
                    SISTEM
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="pills-penomoran-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-penomoran" type="button" role="tab"
                    aria-controls="pills-penomoran" aria-selected="true">
                    PENOMORAN
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-kartu-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-kartu" type="button" role="tab"
                    aria-controls="pills-kartu" aria-selected="false">
                    KARTU ANGGOTA
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-header-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-header" type="button" role="tab"
                    aria-controls="pills-header" aria-selected="false">
                    HEADER LABEL
                </button>
            </li>
        </ul>

        <!-- Konten Tab -->
        <div class="tab-content" id="pills-tabContent">

            <!-- Tab Sistem -->
            <div class="tab-pane fade show active" id="pills-sistem" role="tabpanel" tabindex="0">
                <div class="card border shadow-sm rounded-3">
                    <div class="card-body p-4">
                            <form>
                            <div class="mb-3 row">
                                <label for="kepalaPerpustakaan" class="col-sm-3 col-form-label fw-medium">
                                    Kepala Perpustakaan
                                </label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="kepalaPerpustakaan">
                                        <option selected>Yomi Nuryaningsih S, IIP</option>
                                        <option value="1">Pilihan Lain 1</option>
                                        <option value="2">Pilihan Lain 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gunakanTTD" checked>
                                        <label class="form-check-label" for="gunakanTTD">
                                            digunakan sebagai TTD (Tertanda/Tandatangan)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="counterTahun" class="col-sm-3 col-form-label fw-medium">
                                    Counter Tahun Aktif
                                </label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="counterTahun">
                                        <label class="form-check-label text-muted" for="counterTahun">
                                            (untuk nomor induk item koleksi)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="tahunAlternatif" class="col-sm-3 col-form-label fw-medium">
                                    Tahun Alternatif
                                </label>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="tahunAlternatif" value="0">
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label for="masaPemesanan" class="col-sm-3 col-form-label fw-medium">
                                    Masa Pemesanan
                                </label>
                                <div class="col-sm-3 d-flex align-items-center">
                                    <input type="number" class="form-control me-2" id="masaPemesanan" value="2" style="width: 100px;">
                                    <span>hari</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
                                    <button type="submit" class="btn btn-primary fw-semibold px-4">
                                        UPDATE
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Tab Penomoran -->
            <div class="tab-pane fade " id="pills-penomoran" role="tabpanel" tabindex="0">
                <div class="card border shadow-sm rounded-3">
                    <div class="card-body p-4">
                       <x-Tabel></x-Tabel>
                    </div>
                </div>
            </div>

            <!-- Tab Kartu -->
            <div class="tab-pane fade" id="pills-kartu" role="tabpanel" tabindex="0">
                <div class="card border shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <h5 class="card-title">Pengaturan Kartu Anggota</h5>
                        <p class="card-text">Formulir untuk desain dan pengaturan kartu anggota akan ditampilkan di sini.</p>
                    </div>
                </div>
            </div>

            <!-- Tab Header -->
            <div class="tab-pane fade" id="pills-header" role="tabpanel" tabindex="0">
                <div class="card border shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <h5 class="card-title">Pengaturan Header Label</h5>
                        <p class="card-text">Formulir untuk pengaturan header label koleksi akan ditampilkan di sini.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app>
 <script>
     $(document).ready(function() {
         $("#multi-filter-select").DataTable({
             pageLength: 10,
             initComplete: function() {
                 this.api()
                     .columns()
                     .every(function() {
                         var column = this;
                         var select = $(
                                 '<select class="form-select"><option value=""></option></select>'
                             )
                             .appendTo($(column.footer()).empty())
                             .on("change", function() {
                                 var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                 column
                                     .search(val ? "^" + val + "$" : "", true, false)
                                     .draw();
                             });

                         column
                             .data()
                             .unique()
                             .sort()
                             .each(function(d, j) {
                                 select.append(
                                     '<option value="' + d + '">' + d + "</option>"
                                 );
                             });
                     });
             },
         });
     });
 </script>
