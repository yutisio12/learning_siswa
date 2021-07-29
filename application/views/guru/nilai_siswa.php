<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Guru</h3>
        </div>
    </div>
    <br>
    <div class="">
        <!-- =================================================================== -->
        <div class="card">
            <div class="container">
                <br>

                <br>
                

                    <table class="table table-hover table-bordered data-table">
                    <thead class="bg-primary text-white">

                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>

                            <?php foreach($datatugas as $key => $value_tugas) { ?>
                                <th scope="col"><?= $value_tugas['nama_tugas'] ?></th>
                            <?php } ?>

                            <th scope="col">Rata-rata</th>

                        </tr>  
                    </thead>
                    <tbody>

                    <?php 
                    $no = 1;
                    foreach ($siswa as $list):
                    ?>
                        <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $list['nama_siswa'] ?></td>
                        
                        <?php foreach($datatugas as $key => $value_tugas) { ?>
                            <td><?= $nilai_siswa_per_tugas[$value_tugas['id']][$nim_user[$list['nip_siswa']]]['nilai'] ?></td>
                        <?php } ?>

                        <td></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>

