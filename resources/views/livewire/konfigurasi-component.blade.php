<style>
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
            <button class="nav-link active" id="pills-sistem-tab" data-bs-toggle="pill" data-bs-target="#pills-sistem"
                type="button" role="tab" aria-controls="pills-sistem" aria-selected="false">
                SISTEM
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link " id="pills-penomoran-tab" data-bs-toggle="pill"
                data-bs-target="#pills-penomoran" type="button" role="tab" aria-controls="pills-penomoran"
                aria-selected="true">
                PENOMORAN
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-kartu-tab" data-bs-toggle="pill" data-bs-target="#pills-kartu"
                type="button" role="tab" aria-controls="pills-kartu" aria-selected="false">
                KARTU ANGGOTA
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-header-tab" data-bs-toggle="pill" data-bs-target="#pills-header"
                type="button" role="tab" aria-controls="pills-header" aria-selected="false">
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
                                <input type="number" class="form-control me-2" id="masaPemesanan" value="2"
                                    style="width: 100px;">
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
        <div class="tab-pane fade" id="pills-penomoran" role="tabpanel" tabindex="0">
            <div class="card border shadow-sm rounded-3">
                <div class="card-body p-4">
                    <div class="col-md-12 mt-5">
                        <div class="">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Data Penomoran</h4>
                                <div class="d-flex gap-2">
                                    <!-- Tombol Tambah trigger modal -->
                                    <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addMemberModal">
                                        <i class="fa fa-plus"></i> Tambah Data
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="multi-filter-select"
                                        class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Group</th>
                                                <th>Counter</th>
                                                <th>Kelola</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Nama Group</th>
                                                <th>Counter</th>
                                                <th>Kelola</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>P001</td>
                                                <td>Group Buku</td>
                                                <td>100</td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <button class="btn btn-outline-dark btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editMemberModal">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteConfirmModal">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>P002</td>
                                                <td>Group Majalah</td>
                                                <td>50</td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <button class="btn btn-outline-dark btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editMemberModal">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteConfirmModal">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Kartu -->
        <div class="tab-pane fade" id="pills-kartu" role="tabpanel" tabindex="0">
            <div class="card border shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h5 class="card-title">Pengaturan Kartu Anggota</h5>
                    <p class="card-text">Formulir untuk desain dan pengaturan kartu anggota akan ditampilkan di
                        sini.</p>
                </div>
            </div>
        </div>

        <!-- Tab Header -->
        <div class="tab-pane fade" id="pills-header" role="tabpanel" tabindex="0">
            <div class="card border shadow-sm rounded-3">
                <div class="card-body p-4">
                    <h5 class="card-title">Pengaturan Header Label</h5>
                    <p class="card-text">Formulir untuk pengaturan header label koleksi akan ditampilkan di sini.
                    </p>
                </div>
            </div>
        </div>

    </div>
    <!-- ==================== MODALS ==================== -->
    <!-- Modal Create -->
    <div class="modal" id="addMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-3">
                <div class="modal-header" style="background:#141927; color:#fff;">
                    <h5 class="modal-title"><i class="fas fa-plus me-2"></i>Tambah Data Penomoran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createMemberForm">
                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="text" class="form-control" placeholder="P001">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Group</label>
                            <input type="text" class="form-control" placeholder="Group Buku">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Counter</label>
                            <input type="number" class="form-control" placeholder="100">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="createMemberForm" class="btn btn-dark">Simpan</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal" id="editMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-3">
                <div class="modal-header" style="background:#141927; color:#fff;">
                    <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Data Penomoran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editMemberForm">
                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="text" class="form-control" value="P001">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Group</label>
                            <input type="text" class="form-control" value="Group Buku">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Counter</label>
                            <input type="number" class="form-control" value="100">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="editMemberForm" class="btn btn-dark">Simpan</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 text-center">
                <div class="modal-header border-0" style="background:#141927; color:#fff;">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                </div>
                <div class="modal-body">
                    <i class="fas fa-exclamation-circle text-danger mb-3" style="font-size:3rem;"></i>
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-danger">Ya, Hapus</button>
                </div>
            </div>
        </div>
    </div>
</div>
