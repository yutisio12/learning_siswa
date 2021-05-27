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
                                <select class="select2 form-control" id="pengajar_mapel" name="pengajar_mapel" style="width: 100%;" required>
                                    <option value="">Pilih Pengajar</option>
                                    <?php foreach($pengajar_mapel as $v_pengajar){ ?>
                                        <option value="<?= $v_pengajar['id'] ?>"><?= $v_pengajar['name'] ?></option>
                                    <?php } ?>
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($mata_pelajaran as $mapel):
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $mapel['nama_mapel'] ?></td>
                            <td><?= $mapel['kelas_mapel'] ?></td>
                            <td><?= $name[$mapel['pengajar_mapel']] ?></td>
                            <td><?php if ( $mapel['status'] == '1') {
                                echo "Aktif";
                            }
                            if ( $mapel['status'] == '-1') {
                               echo "Tidak Aktif";
                            } ?></td>
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal<?= $mapel['id']; ?>">
                            <i class="fas fa-edit"></i>
                            Edit Mapel
                            </button></td>
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

<!-- Modal Edit -->
<?php 
foreach ($mata_pelajaran as $mapel):
?>

<div class="modal fade" id="modal<?= $mapel['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('home/edit_mapel')?>" method="POST">
      
                            <div class="modal-body">
                                <label for="nama_mapel">Nama Mapel</label>
                                <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" value="<?= $mapel['nama_mapel'] ?>" placeholder="Masukan Nama Mapel">
                            </div>

                            <div class="modal-body">
                                <label for="kelas_mapel">Kelas</label>
                                <input type="text" class="form-control" name="kelas_mapel" id="kelas_mapel" value="<?= $mapel['kelas_mapel'] ?>" placeholder="Masukan Kelas Mapel">
                            </div>

                            <div class="modal-body">
                                <label for="pengajar_mapel">Pengajar</label>
                                <br>
                                <select class="select2 form-control" name="pengajar_mapel" style="width: 100%;" required>
                                <option value="<?= $mapel['pengajar_mapel'] ?>"><?= $name[$mapel['pengajar_mapel']] ?></option>
                                    <?php foreach($pengajar_mapel as $v_pengajar){ ?>
                                        <option value="<?= $v_pengajar['id'] ?>"><?= $v_pengajar['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="modal-body">
                                <label for="status">Status</label>
                                <br>
                                <select class="form-control" id="status" name="status">
                                <option value="<?= $mapel['status'] ?>" selected><?php if ( $mapel['status'] == '1') {
                                echo "Aktif";
                            }
                            if ( $mapel['status'] == '-1') {
                               echo "Tidak Aktif";
                            } ?></option>
                                <option value="1">Aktif</option>
                                <option value="-1">Tidak Aktif</option>
                            </select>
                            </div>
                            
                            <input type="hidden" name="id" id="id" value="<?= $mapel['id']; ?>">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
