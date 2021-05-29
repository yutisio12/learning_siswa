<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Dashboard</h3>
        </div>
    </div>
    <br>
    <div class="row" width="100%">
        <!-- =================================================================== -->
        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Guru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= COUNT($list_guru) ?></div>
                        </div>
                        <div class="col-auto card">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-1000"></i>
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
                                Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= COUNT($list_siswa) ?></div>
                        </div>
                        <div class="col-auto card">
                            <i class="fas fa-book-reader fa-2x text-gray-1000"></i>
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
                                Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= COUNT($list_user) ?></div>
                        </div>
                        <div class="col-auto card">
                            <i class="fas fa-user-lock fa-2x text-gray-1000"></i>
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