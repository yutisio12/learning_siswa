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
                <div class="text-left">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"></i>
                         Tambah Guru
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data Guru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('home/tambah_guru')?>" method="POST">
                            <div class="modal-body">
                                <label for="nama_guru">Nama Guru</label>
                                <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Masukan Nama Guru" required>
                            </div>

                            <div class="modal-body">
                                <label for="nip_guru">NIP Guru</label>
                                <input type="text" class="form-control" name="nip_guru" id="nip_guru" placeholder="Masukan NIP Guru" required>
                            </div>

                            <div class="modal-body">
                                <label for="kelas">Kelas</label>
                                <br>
                                <select class="multiSelect2 form-control" id="kelas" name="kelas[]" style="width: 100%;" required>
                                    <!-- <option value="">---</option> -->
                                    <?php foreach($list_kelas as $v_kelas){ ?>
                                        <option value="<?= $v_kelas['id'] ?>"><?= $v_kelas['nama_kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="modal-body">
                                <label for="mapel">mapel</label>
                                <br>
                                <select class="multiSelect2 form-control" id="mapel" name="mapel[]" style="width: 100%;" required>
                                    <!-- <option value="">---</option> -->
                                    <?php foreach($list_mapel as $v_mapel){ ?>
                                        <option value="<?= $v_mapel['id'] ?>"><?= $v_mapel['nama_mapel'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="modal-body">
                                <label for="alamat_guru">Alamat Guru</label>
                                <input type="text" class="form-control" id="alamat_guru" name="alamat_guru" placeholder="Masukan Alamat Guru" required>
                            </div>

                            <div class="modal-body">
                                <label for="telpon_guru">No Telphone Guru</label>
                                <input type="text" class="form-control" id="telpon_guru" name="telpon_guru" placeholder="Masukan No Telphone Guru" required>
                            </div>

                            <input type="hidden" name="status" id="status">

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
                

                    <table class="table table-hover table-bordered data-table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">NIP Guru</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Alamat Guru</th>
                            <th scope="col">No Telphone</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($guru as $list):
                    ?>
                    <?php if ( $list['status'] != '1' ) : ?>

                    <?php else : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $list['nama_guru'] ?></td>
                            <td><?= $list['nip_guru'] ?></td>
                            <td>
                            <?php $kelas = explode(';', $list['id_kelas']);
                                    foreach ($kelas as $value_kelas) {
                                    echo $nama_kelas[trim($value_kelas)].', ';
                                    }
                                ?> 
                            </td>
                            <td>
                            <?php $mapel = explode(';', $list['id_mapel']);
                                    foreach ($mapel as $value_mapel) {
                                    echo $nama_mapel[trim($value_mapel)].', ';
                                    }
                                ?> 
                            </td>
                            <td><?= $list['alamat_guru'] ?></td>
                            <td><?= $list['telpon_guru'] ?></td>
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal<?= $list['id']; ?>">
                            <i class="fas fa-edit"></i>
                            Edit Guru
                            </button>
                            <button class="btn btn-danger"  onclick="hapus_guru('<?= $list['id'] ?>')">
                            <i class="fas fa-trash"></i> Hapus
                            </button></td>
                        </tr>
                        <?php endif; ?>
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
foreach ($guru as $list):
    $kelas_old[$list['id']] = explode('; ', $list['id_kelas']);;
    // echo '<pre>';
    // print_r($kelas_old);
    // exit;
?>

<div class="modal fade" id="modal<?= $list['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelx" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelx">Edit Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('home/edit_guru')?>" method="POST">
            <div class="modal-body">
                <label for="nama_guru<?= $list['id']; ?>">Nama Guru</label>
                <input type="text" class="form-control" name="nama_guru" id="nama_guru<?= $list['id']; ?>" value="<?= $list['nama_guru'] ?>" placeholder="Masukan Nama Guru">
            </div>

            <div class="modal-body">
                <label for="nip_guru">NIP Guru</label>
                <input type="text" class="form-control" name="nip_guru" id="nip_guru" value="<?= $list['nip_guru'] ?>"placeholder="Masukan NIP Guru">
            </div>

            <div class="modal-body">
                <label for="kelasx<?= $list['id']; ?>">Kelas</label>
                <br>
                <select class="multiSelect2-nonull form-control" id="kelasx<?= $list['id']; ?>" name="kelas[]" style="width: 100%;" required>
                    <!-- <option value="">---</option> -->
                    <?php foreach($list_kelas as $v_kelas){ ?>
                        <option value="<?= $v_kelas['id'] ?>" 
                            <?= in_array($v_kelas['id'], $kelas_old[$list['id']]) 
                                ? 'selected' 
                                : '' ?>
                            ><?= $v_kelas['nama_kelas'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="modal-body">
                <label for="mapelx<?= $list['id']; ?>">mapel</label>
                <br>
                <select class="multiSelect2-nonull form-control" id="mapelx<?= $list['id']; ?>" name="mapel[]" style="width: 100%;" required>
                    <!-- <option value="">---</option> -->
                    <?php foreach($list_mapel as $v_mapel){ ?>
                        <option value="<?= $v_mapel['id'] ?>"><?= $v_mapel['nama_mapel'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="modal-body">
                <label for="alamat_guru">Alamat Guru</label>
                <input type="text" class="form-control" id="alamat_guru" name="alamat_guru" value="<?= $list['alamat_guru'] ?>" placeholder="Masukan Alamat Guru">
            </div>

            <div class="modal-body">
                <label for="telpon_guru">No Telphone Guru</label>
                <input type="text" class="form-control" id="telpon_guru" name="telpon_guru" value="<?= $list['telpon_guru'] ?>" placeholder="Masukan No Telphone Guru">
            </div>

            <input type="hidden" name="id" id="id" value="<?= $list['id']; ?>">

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

<script>
 function hapus_guru(id){
                        console.log(id)
                        Swal.fire({
                            title: 'Are you sure to <b class="text-danger">&nbsp;Delete&nbsp;</b> this?',
                            // text: "This joint will permanent deleted!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Delete it!'
                          }).then((result) => {
                            if (result.value) {
                              $.ajax({
                                url: "<?php echo base_url();?>home/hapus_guru",
                                type: "post",
                                data: {
                                  id: id
                                },
                                success: function(data) {
                                if(data.includes("Error")){
                                   Swal.fire(
                                      'Ops..',
                                      data,
                                      'error'
                                    );
                                    
                                } else {

                                    Swal.fire(
                                      'Success',
                                      'Your data has been Updated!',
                                      'success'
                                    );
                                    location.reload();
                                  }
                                }
                              });
                            }
                          })
                    }
</script>