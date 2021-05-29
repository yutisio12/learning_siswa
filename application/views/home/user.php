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
                

                    <table class="table table-hover table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th>NIP</th>
                            <th scope="col">role</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($user as $u):
                    ?>
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