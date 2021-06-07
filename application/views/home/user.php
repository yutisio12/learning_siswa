<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data User</h3>
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
                         Tambah Pengguna
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url('home/tambah_user')?>" method="post">
                            <div class="modal-body">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama">
                            </div>

                            <div class="modal-body">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username">
                            </div>

                            <div class="modal-body">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukan NIP">
                            </div>


                            <div class="modal-body">
                                <label for="role">Role</label>
                                <br>
                                <select class="form-control" id="role" name="role">
                                    <option value="" selected>Pilih Role</option>
                                    <option value="0">Tata Usaha</option>
                                    <option value="1">Guru</option>
                                    <option value="2">Siswa</option>
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
                

                    <table class="table table-hover table-bordered data-table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th>NIP</th>
                            <th scope="col">role</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($user as $u):
                    ?>
                    <?php if ( $u->status != '1' ) : ?>

                    <?php else : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $u->name ?></td>
                            <td><?php echo $u->username ?></td>
                            <td><?php echo $u->nip ?></td>
                            <td><?php if ($u->role == '0') {
                                echo "Tata Usaha";
                            }
                            if ($u->role == '1') {
                                echo "Guru";
                            }
                            if ($u->role == '2') {
                                echo "Siswa";
                            }
                            ?></td>
                            <td><?php if ($u->status == '0') {
                                echo "Tidak Aktif";
                            }
                            if ($u->status == '1') {
                                echo "Aktif";
                            } ?></td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal<?= $u->id; ?>"><i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger" onclick="reset_password('<?= $u->id ?>')">
                                    <i class="fas fa-sync"></i>
                                </button>
                                <button class="btn btn-danger" onclick="hapus_user('<?= $u->id ?>')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
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
foreach ($user as $list):
?>

<div class="modal fade" id="modal<?= $list->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('home/edit_user')?>" method="POST">
      
        <div class="modal-body">
                                <label for="nama_siswa">Nama</label>
                                <input type="text" class="form-control" name="name" id="nama_siswa" value="<?= $list->name ?>" placeholder="Masukan Nama">
                            </div>

                            <div class="modal-body">
                                <label for="nip_siswa">Username</label>
                                <input type="text" class="form-control" name="username" id="nip_siswa" value="<?= $list->username ?>"placeholder="Masukan Username">
                            </div>

                            <div class="modal-body">
                                <label for="nip_siswa">NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip_siswa" value="<?= $list->nip ?>"placeholder="Masukan NIP">
                            </div>

                            <div class="modal-body">
                                <label for="kelas_siswa">Kelas</label>
                                <br>
                                <select class="form-control" id="role" name="role">
                                    <option value="" selected>Pilih Role</option>
                                    <option value="0" <?= $list->role==0 ? 'selected' : '' ?>>Tata Usaha</option>
                                    <option value="1" <?= $list->role==1 ? 'selected' : '' ?>>Guru</option>
                                    <option value="2" <?= $list->role==2 ? 'selected' : '' ?>>Siswa</option>
                                </select>
                            </div>

                            <input type="hidden" name="id" id="id" value="<?= $list->id; ?>">

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

<script type="text/javascript">
    function reset_password(id){
        Swal.fire({
          icon: 'warning',
          title: 'Do you want to reset the Password?',
          showDenyButton: true,
          confirmButtonText: `Reset`,
          denyButtonText: `Don't Reset`,
        }).then((result) => {
          if (result.value) {
              $.ajax({
                url: "<?php echo base_url();?>auth/reset_password",
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
                    // location.reload();
                  }
                }
              });
            }
        })
    }
</script>

<script>
 function hapus_user(id){
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
                                url: "<?php echo base_url();?>home/hapus_user",
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