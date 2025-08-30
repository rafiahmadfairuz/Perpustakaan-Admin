<div class="container-fluid">
  <div class="col-md-12 mt-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Data Lokasi</h4>
        <div class="d-flex gap-2">
          <!-- Tombol Tambah -->
          <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fa fa-plus"></i> Tambah Lokasi
          </a>
          <!-- Tombol Print -->
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
                <th>Kode</th>
                <th>Nama Lokasi</th>
                <th>SGD</th>
                <th>Kelola</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>L001</td>
                <td>Ruang Baca</td>
                <td><input type="checkbox" checked disabled></td>
                <td>
                  <div class="d-flex gap-1">
                    <!-- Edit -->
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                      <i class="fa fa-edit"></i>
                    </button>
                    <!-- Delete -->
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                      <i class="fa fa-trash"></i>
                    </button>
                    <!-- Print -->
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
                <th>Kode</th>
                <th>Nama Lokasi</th>
                <th>SGD</th>
                <th>Kelola</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Create -->
  <div class="modal" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content rounded-3">
        <div class="modal-header" style="background:#141927; color:#fff;">
          <h5 class="modal-title">Tambah Lokasi</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="createForm">
            <div class="mb-3">
              <label class="form-label">Kode</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Lokasi</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="sgd">
              <label class="form-check-label" for="sgd">SGD</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="createForm" class="btn btn-dark">Simpan</button>
          <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit -->
  <div class="modal" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content rounded-3">
        <div class="modal-header" style="background:#141927; color:#fff;">
          <h5 class="modal-title">Edit Lokasi</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="editForm">
            <div class="mb-3">
              <label class="form-label">Kode</label>
              <input type="text" class="form-control" value="L001">
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Lokasi</label>
              <input type="text" class="form-control" value="Ruang Baca">
            </div>
            <div class="form-check mb-3">
              <input type="checkbox" class="form-check-input" id="editSgd" checked>
              <label class="form-check-label" for="editSgd">SGD</label>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="editForm" class="btn btn-dark">Simpan</button>
          <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Delete -->
  <div class="modal" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center rounded-3">
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
