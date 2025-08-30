<div class="container-fluid">
  <div class="col-md-12 mt-5">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title mb-0">Data Supplier</h4>
        <div class="d-flex gap-2">
          <a href="#" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fa fa-plus"></i> Tambah Supplier
          </a>
          <a href="#" class="btn btn-outline-dark btn-sm" target="_blank"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="multi-filter-select" class="display table table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Kelola</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>PT Andalan Buku</td>
                <td>Jl. Mawar No. 12, Jakarta</td>
                <td>
                  <div class="d-flex gap-1">
                    <button class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fa fa-trash"></i></button>
                    <a href="#" class="btn btn-outline-dark btn-sm" target="_blank"><i class="fa fa-print"></i></a>
                  </div>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
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
      <div class="modal-content">
        <div class="modal-header" style="background:#141927; color:#fff;">
          <h5 class="modal-title">Tambah Supplier</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="createForm">
