<x-app>
    <h3 class="fw-bold">Dashboard Perpustakaan</h3>

    <div class="row">
        <div class="col-md-3 mt-3 ">
            <div class="card card-secondary bg-primary-gradient h-100">
                <div class="card-body skew-shadow d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="fas fa-book fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-white">Buku</h3>
                    </div>
                    <h2 class="mb-3 text-white">72</h2>
                    <a href="" class="text-small text-uppercase fw-bold op-8 text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3 ">
            <div class="card card-secondary bg-warning-gradient h-100">
                <div class="card-body bubble-shadow d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="fas fa-users fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-white">Anggota</h3>
                    </div>
                    <h2 class="mb-3 text-white">65</h2>
                    <a href="" class="text-small text-uppercase fw-bold op-8 text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3 ">
            <div class="card card-secondary bg-success-gradient h-100">
                <div class="card-body curves-shadow d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="fas fa-exchange-alt fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-white">Sirkulasi Aktif</h3>
                    </div>
                    <h2 class="mb-3 text-white">654</h2>
                    <a href="" class="text-small text-uppercase fw-bold op-8 text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3 ">
            <div class="card card-secondary bg-danger-gradient h-100">
                <div class="card-body skew-shadow d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <i class="fas fa-file-alt fa-2x text-white"></i>
                        </div>
                        <h3 class="fw-bold mb-0 text-white">Laporan</h3>
                    </div>
                    <h2 class="mb-3 text-white">34</h2>
                    <a href="" class="text-small text-uppercase fw-bold op-8 text-white">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Data Anggota</h4>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-secondary">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Tambah Anggota
                    </a>
                    <a href="#" class="btn btn-success btn-sm" target="_blank">
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
                                <th>Nama</th>
                                <th>JK</th>
                                <th>Kelas</th>
                                <th>No HP</th>
                                <th>Kelola</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id Anggota</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>Kelas</th>
                                <th>No HP</th>
                                <th>Kelola</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>A001</td>
                                <td>Rafi Ahmad</td>
                                <td>L</td>
                                <td>XII RPL 1</td>
                                <td>08123456789</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>A002</td>
                                <td>Budi Santoso</td>
                                <td>L</td>
                                <td>XII TKJ 2</td>
                                <td>08129876543</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>A003</td>
                                <td>Siti Aisyah</td>
                                <td>P</td>
                                <td>XI AKL 1</td>
                                <td>082134567890</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>A004</td>
                                <td>Andi Pratama</td>
                                <td>L</td>
                                <td>X RPL 2</td>
                                <td>085612345678</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a href="#" class="btn btn-primary btn-sm" target="_blank">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
