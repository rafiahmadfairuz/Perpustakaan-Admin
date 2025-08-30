<div class="container-fluid">
  <div class="col-md-12 mt-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Data Tipe Koleksi</h4>
        <div class="d-flex gap-2">
          <!-- Tombol Tambah -->
          <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fa fa-plus"></i> Tambah Tipe Koleksi
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
                <th>Nama Tipe Koleksi</th>
                <th>Group Konter</th>
                <th>Prefix</th>
                <th>Urutan</th>
                <th>Kelola</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Buku</td>
                <td>G1</td>
                <td>BK</td>
                <td>1</td>
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
                <th>Nama Tipe Koleksi</th>
                <th>Group Konter</th>
                <th>Prefix</th>
                <th>Urutan</th>
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
          <h5 class="modal-title">Tambah Tipe Koleksi</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="createForm">
            <div class="mb-3">
              <label class="form-label">Nama Tipe Koleksi</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Group Konter</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Prefix</label>
              <input type="text" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Urutan</label>
              <input type="number" class="form-control">
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
          <h5 class="modal-title">Edit Tipe Koleksi</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="editForm">
            <div class="mb-3">
              <label class="form-label">Nama Tipe Koleksi</label>
              <input type="text" class="form-control" value="Buku">
            </div>
            <div class="mb-3">
              <label class="form-label">Group Konter</label>
              <input type="text" class="form-control" value="G1">
            </div>
            <div class="mb-3">
              <label class="form-label">Prefix</label>
              <input type="text" class="form-control" value="BK">
            </div>
            <div class="mb-3">
              <label class="form-label">Urutan</label>
              <input type="number" class="form-control" value="1">
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
