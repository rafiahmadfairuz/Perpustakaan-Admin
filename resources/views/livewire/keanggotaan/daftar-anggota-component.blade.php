<div class="container-fluid">

    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Anggota</h4>
                <div class="d-flex gap-2">
                    <!-- Tombol Tambah Anggota trigger modal -->
                    <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                        <i class="fa fa-plus"></i> Tambah Anggota
                    </a>
                    <a href="#" class="btn btn-outline-dark btn-sm" target="_blank">
                        <i class="fa fa-print"></i> Print
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Anggota</th>
                                <th>Nama Anggota</th>
                                <th>Tipe</th>
                                <th>Keterangan</th>
                                <th>Pending</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>A001</td>
                                <td>Rafi Ahmad</td>
                                <td>Siswa</td>
                                <td>Aktif</td>
                                <td>
                                    <span class="badge bg-success">Tidak</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editMemberModal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmModal">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-dark btn-sm" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>A002</td>
                                <td>Budi Santoso</td>
                                <td>Siswa</td>
                                <td>Cuti</td>
                                <td>
                                    <span class="badge bg-warning text-dark">Ya</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editMemberModal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmModal">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-dark btn-sm" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>A003</td>
                                <td>Siti Aisyah</td>
                                <td>Guru</td>
                                <td>Aktif</td>
                                <td>
                                    <span class="badge bg-success">Tidak</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editMemberModal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmModal">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-dark btn-sm" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>A004</td>
                                <td>Andi Pratama</td>
                                <td>Alumni</td>
                                <td>Tidak Aktif</td>
                                <td>
                                    <span class="badge bg-danger">Ya</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editMemberModal">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmModal">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-outline-dark btn-sm" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id Anggota</th>
                                <th>Nama Anggota</th>
                                <th>Tipe</th>
                                <th>Keterangan</th>
                                <th>Pending</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- ==================== MODALS ==================== -->
    <!-- Modal Create Member -->
    <div class="modal" id="addMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-3">
                <div class="modal-header" style="background:#141927; color:#fff;">
                    <h5 class="modal-title"><i class="fas fa-user-plus me-2"></i>Tambah Anggota</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="createMemberForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Kode</label>
                                <input type="text" class="form-control" placeholder="A005">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama Member</label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"
                                            value="L">
                                        <label class="form-check-label">Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"
                                            value="P">
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">No HP</label>
                                <input type="tel" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Registrasi</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Instansi</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="statusPending">
                            <label class="form-check-label" for="statusPending">Status Pending</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Catatan</label>
                            <textarea class="form-control" rows="3"></textarea>
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

    <!-- Modal Edit Member -->
    <div class="modal" id="editMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-3">
                <div class="modal-header" style="background:#141927; color:#fff;">
                    <h5 class="modal-title"><i class="fas fa-user-edit me-2"></i>Edit Anggota</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editMemberForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Kode</label>
                                <input type="text" class="form-control" value="A001" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Tipe</label>
                                <input type="text" class="form-control" value="Siswa">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="email" class="form-control" value="Rafi Ahmad">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Gender</label>
                                <select class="form-select">
                                    <option selected>Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">No HP</label>
                                <input type="tel" class="form-control" value="08123456789">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="editPending">
                            <label class="form-check-label" for="editPending">Pending</label>
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
</div>
