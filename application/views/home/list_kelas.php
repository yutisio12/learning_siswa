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
                                <select class="select2 form-control" id="wali_kelas" name="wali_kelas" style="width: 100%;">
                                    <option value="">Pilih Wali Kelas</option>
                                    <?php foreach($wali_kelas as $v_wali){ ?>
                                        <option value="<?= $v_wali['id'] ?>"><?= $v_wali['nama_guru'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="modal-body">
                                <label for="lokasi_kelas">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi_kelas" name="lokasi_kelas" placeholder="Masukan Lokasi Kelas">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                            <input type="hidden" name="status" id="status">

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
                            <th scope="col">Kelas</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($kelas as $list):
                    ?>
                        <?php if ( $list['status'] != '1' ) : ?>

                        <?php else : ?>

                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?= $list['nama_kelas'] ?></td>
                            <td><?= $name[$list['wali_kelas']] ?></td>
                            <td><?= $list['lokasi_kelas'] ?></td>
                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal<?= $list['id']; ?>">
                        <i class="fas fa-edit"></i>
                         Edit Kelas
                    </button>
                    <button class="btn btn-danger"  onclick="hapus_kelas('<?= $list['id'] ?>')">
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
foreach ($kelas as $list):
?>

<div class="modal fade" id="modal<?= $list['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('home/edit')?>" method="POST">
      
        <div class="modal-body">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" value="<?= $list['nama_kelas']; ?>" placeholder="Masukan Nama Kelas"> 
                            </div>

                            <div class="modal-body">
                                <label for="wali_kelas">Wali Kelas</label>
                                <br>
                                <select class="select2 form-control" id="wali_kelas" name="wali_kelas" style="width: 100%;">
                                    <option value="">Pilih Wali Kelas</option>
                                    <?php foreach($wali_kelas as $v_wali){ ?>
                                        <option value="<?= $v_wali['id'] ?>"><?= $v_wali['nama_guru'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="modal-body">
                                <label for="lokasi_kelas">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi_kelas" name="lokasi_kelas"  value="<?= $list['lokasi_kelas']; ?>"placeholder="Masukan Lokasi Kelas">
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
 function hapus_kelas(id){
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
                                url: "<?php echo base_url();?>home/hapus_kelas",
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