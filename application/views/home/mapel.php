<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Mata Pelajaran</h3>
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
                         Tambah Mata Pelajaran
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data Mata Pelajaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('home/tambah_mapel')?>" method="post">
                            <div class="modal-body">
                                <label for="nama_mapel">Nama Mapel</label>
                                <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="Masukan Nama Mapel">
                            </div>

                            <div class="modal-body">
                                <label for="kelas_mapel">Kelas</label>
                                <input type="text" class="form-control" name="kelas_mapel" id="kelas_mapel" placeholder="Masukan Nama Mapel">
                            </div>

                            <div class="modal-body">
                                <label for="pengajar_mapel">Pengajar</label>
                                <br>
                                <select class="form-control" id="pengajar_mapel" name="pengajar_mapel">
                                    <option value="0" selected>Pilih Pengajar Mata Pelajaran</option>
                                    <option value="1">Agung</option>
                                    <option value="2">Ardi</option>
                                </select>
                                
                            </div>
                            <div class="modal-body">
                                <label for="status">Status</label>
                                <br>
                                <select class="form-control" id="status" name="status">
                                <option value="0" selected>Pilih Status Mata Pelajaran</option>
                                <option value="1">Aktif</option>
                                <option value="-1">Tidak Aktif</option>
                            </select>
                                
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
                            <th scope="col">Nama Mata Pelajara</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pengajar</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($mata_pelajaran as $mapel):
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $mapel->nama_mapel ?></td>
                            <td><?php echo $mapel->kelas_mapel ?></td>
                            <td><?php echo $mapel->pengajar_mapel ?></td>
                            <td><?php echo $mapel->status ?></td>
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