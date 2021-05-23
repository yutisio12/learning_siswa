<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="text-black text-center">Dashboard</h3>
        </div>
    </div>
    <br>
    <div class="row" width="100%">
        <!-- =================================================================== -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tugas Terbuka</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (int)$total_tugas['total_open'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tugas Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (int)$total_tugas['total_close'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tugas Dinilai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= (int)$total_tugas['total_scored'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>