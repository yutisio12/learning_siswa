<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Kelas</h3>
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
                         Tambah Kelas
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data Kelas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('home/tambah')?>" method="POST">
                            <div class="modal-body">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukan Nama Kelas">
                            </div>

                            <div class="modal-body">
                                <label for="wali_kelas">Wali Kelas</label>
                                <br>
                                <select class="select2 form-control" id="wali_kelas" name="wali_kelas" style="width: 100%;" required>
                                    <option value="">---</option>
                                    <?php foreach($wali_kelas as $v_wali){ ?>
                                        <option value="<?= $v_wali['id'] ?>"><?= $v_wali['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
<!-- 
                            <div class="modal-body">
                                <label for="wali_kelas">Wali Kelas</label>
                                <br>
                                <select class="form-control" id="wali_kelas" name="wali_kelas">
                                    <option value="0" selected>Pilih Wali Kelas</option>
                                    <option value="1">Agung</option>
                                    <option value="2">Ardi</option>
                                </select>
                            </div> -->

                            <div class="modal-body">
                                <label for="lokasi_kelas">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi_kelas" name="lokasi_kelas" placeholder="Masukan Lokasi Kelas">
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
                            <th scope="col">Kelas</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($kelas as $list):
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $list['nama_kelas'] ?></td>
                            <td><?= $name[$list['wali_kelas']] ?></td>
                            <td><?= $list['lokasi_kelas'] ?></td>
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