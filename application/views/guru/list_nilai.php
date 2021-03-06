<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="text-black text-center">Daftar Kelas</h3>
        </div>
    </div>
    <br>
    <div class="row" width="100%">
        <!-- =================================================================== -->
        <?php
        foreach($dashboard as $list):
        ?>
        <?php $kelas = explode(';', $list['id_kelas']);  
        foreach ($kelas as $value_kelas):
        ?>

        <div class="col-xl-3 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body" onclick="location.href='<?= base_url('guru/nilai_siswa_mapel/').trim($value_kelas) ?>';">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                               <?= $nama_kelas[trim($value_kelas)]?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-1000"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?php endforeach ?>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>