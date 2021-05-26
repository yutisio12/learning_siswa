<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Siswa</h3>
        </div>
    </div>
    <br>
    <div class="">
        <!-- =================================================================== -->
        <div class="card">
            <div class="container">
                <br>
                <div class="text-left">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"></i>
                         Tambah Siswa
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('home/tambah_siswa')?>" method="POST">
                            <div class="modal-body">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Masukan Nama Siswa">
                            </div>

                            <div class="modal-body">
                                <label for="nip_siswa">NIP Siswa</label>
                                <input type="text" class="form-control" name="nip_siswa" id="nip_siswa" placeholder="Masukan NIP Siswa">
                            </div>

                            <div class="modal-body">
                                <label for="kelas_siswa">Kelas</label>
                                <input type="text" class="form-control" id="kelas_siswa" name="kelas_siswa" placeholder="Masukan Kelas">
                            </div>

                            <div class="modal-body">
                                <label for="alamat_siswa">Alamat Siswa</label>
                                <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" placeholder="Masukan Kelas">
                            </div>

                            <div class="modal-body">
                                <label for="telpon_siswa">No Telphone Siswa</label>
                                <input type="text" class="form-control" id="telpon_siswa" name="telpon_siswa" placeholder="Masukan Kelas">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <br>
                

                    <table class="table table-hover table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">NIP Siswa</th>
                            <th scope="col">Alamat Siswa</th>
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
                            <td><?= $list['kelas_siswa'] ?></td>
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