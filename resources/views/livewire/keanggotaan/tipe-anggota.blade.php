<div class="container-fluid">
  <div class="col-md-12 mt-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Tipe Anggota</h4>
        <div class="d-flex gap-2">
          <!-- Tombol Tambah trigger modal -->
          <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addMemberModal">
            <i class="fa fa-plus"></i> Tambah Tipe
          </a>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="multi-filter-select" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Tipe</th>
                <th>Siswa</th>
                <th>Guru</th>
                <th>Karyawan</th>
                <th>External</th>
                <th>Kelola</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Tipe Siswa</td>
                <td>✓</td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <div class="d-flex gap-1">
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editMemberModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Tipe Guru</td>
                <td></td>
                <td>✓</td>
                <td></td>
                <td></td>
                <td>
                  <div class="d-flex gap-1">
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editMemberModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>Tipe Karyawan</td>
                <td></td>
                <td></td>
                <td>✓</td>
                <td></td>
                <td>
                  <div class="d-flex gap-1">
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editMemberModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>Tipe External</td>
                <td></td>
                <td></td>
                <td></td>
                <td>✓</td>
                <td>
                  <div class="d-flex gap-1">
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editMemberModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                      <i class="fa fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Tipe</th>
                <th>Siswa</th>
                <th>Guru</th>
                <th>Karyawan</th>
                <th>External</th>
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
          <h5 class="modal-title"><i class="fas fa-plus me-2"></i>Tambah Tipe</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="createMemberForm">
            <div class="mb-3">
              <label class="form-label">Nama Tipe</label>
              <input type="text" class="form-control" placeholder="Contoh: Tipe Siswa">
            </div>
            <div class="mb-3">
              <label class="form-label">Masuk Sebagai</label>
              <div class="d-flex gap-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="tipeSiswa">
                  <label class="form-check-label" for="tipeSiswa">Siswa</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="tipeGuru">
                  <label class="form-check-label" for="tipeGuru">Guru</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="tipeKaryawan">
                  <label class="form-check-label" for="tipeKaryawan">Karyawan</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="tipeExternal">
                  <label class="form-check-label" for="tipeExternal">External</label>
                </div>
              </div>
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
          <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Tipe</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="editMemberForm">
            <div class="mb-3">
              <label class="form-label">Nama Tipe</label>
              <input type="text" class="form-control" value="Tipe Siswa">
            </div>
            <div class="mb-3">
              <label class="form-label">Masuk Sebagai</label>
              <div class="d-flex gap-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editSiswa" checked>
                  <label class="form-check-label" for="editSiswa">Siswa</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editGuru">
                  <label class="form-check-label" for="editGuru">Guru</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editKaryawan">
                  <label class="form-check-label" for="editKaryawan">Karyawan</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="editExternal">
                  <label class="form-check-label" for="editExternal">External</label>
                </div>
              </div>
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
