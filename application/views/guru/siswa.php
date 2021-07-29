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
                            <th scope="col">NIP</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telphone</th>

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
                        <td><?= $list['nip_siswa'] ?></td>
                        <td><?= $list['alamat_siswa'] ?></td>
                        <td><?= $list['telpon_siswa'] ?></td>
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

