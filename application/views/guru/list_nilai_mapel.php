<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="text-black text-center">Mata Pelajaran</h3>
        </div>
    </div>
    <br>
    <div class="row" width="100%">
        <!-- =================================================================== -->
        <?php
        foreach($list_mapel as $list):
        ?>

        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body" onclick="location.href='<?= base_url('guru/nilai_siswa_v2/').$list['id'].'/'.$list['kelas_mapel'] ?>';">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                               <?= $list['nama_mapel'] ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-1000"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>