<div class="container-fluid">
  <div class="col-md-12 mt-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Data Surat</h4>
        <div class="d-flex gap-2">
          <!-- Tombol Tambah trigger modal -->
          <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addMemberModal">
            <i class="fa fa-plus"></i> Tambah Surat
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
                <th>Tanggal</th>
                <th>Nomor Surat</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tujuan</th>
                <th>Kelola</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>2025-08-30</td>
                <td>001/SKL/2025</td>
                <td>123456</td>
                <td>Rafi Ahmad</td>
                <td>Dinas Pendidikan</td>
                <td>
                  <div class="d-flex gap-1">
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editMemberModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
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
                <td>2025-08-29</td>
                <td>002/SKL/2025</td>
                <td>654321</td>
                <td>Siti Aisyah</td>
                <td>Politeknik Negeri</td>
                <td>
                  <div class="d-flex gap-1">
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editMemberModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
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
                <th>Tanggal</th>
                <th>Nomor Surat</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tujuan</th>
                <th>Kelola</th>
              </tr>
            </tfoot>
          </table>
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
          <h5 class="modal-title"><i class="fas fa-plus me-2"></i>Tambah Surat</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="createMemberForm">
            <div class="mb-3">
              <label class="form-label">Nomor Surat</label>
              <input type="text" class="form-control" placeholder="Contoh: 001/SKL/2025">
            </div>
            <div class="mb-3">
              <label class="form-label">Tanggal</label>
              <input type="date" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">NIS - Nama</label>
              <select class="form-select">
                <option selected disabled>Pilih Siswa</option>
                <option value="123456">123456 - Rafi Ahmad</option>
                <option value="654321">654321 - Siti Aisyah</option>
                <option value="789012">789012 - Budi Santoso</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Tujuan</label>
              <input type="text" class="form-control" placeholder="Tujuan surat">
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
          <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Surat</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="editMemberForm">
            <div class="mb-3">
              <label class="form-label">Nomor Surat</label>
              <input type="text" class="form-control" value="001/SKL/2025">
            </div>
            <div class="mb-3">
              <label class="form-label">Tanggal</label>
              <input type="date" class="form-control" value="2025-08-30">
            </div>
            <div class="mb-3">
              <label class="form-label">NIS - Nama</label>
              <select class="form-select">
                <option value="123456" selected>123456 - Rafi Ahmad</option>
                <option value="654321">654321 - Siti Aisyah</option>
                <option value="789012">789012 - Budi Santoso</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Tujuan</label>
              <input type="text" class="form-control" value="Dinas Pendidikan">
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
