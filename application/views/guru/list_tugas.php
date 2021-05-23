<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Tugas</h3>
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
                         Tambah Tugas
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Data Tugas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('guru/add_tugas_process')?>" method="POST">
                            <div class="modal-body">
                                <label for="kelas">Kelas</label>
                                <br>
                                <select class="select2 form-control" id="kelas" name="kelas" style="width: 100%;" required>
                                    <option value="">---</option>
                                    <?php foreach($list_kelas as $v_kelas){ ?>
                                        <option value="<?= $v_kelas['id'] ?>"><?= $v_kelas['nama_kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal-body">
                                <label for="mapel">mapel</label>
                                <br>
                                <select class="select2 form-control" id="mapel" name="mapel" style="width: 100%;" required>
                                    <option value="">---</option>
                                    <?php foreach($list_mapel as $v_mapel){ ?>
                                        <option value="<?= $v_mapel['id'] ?>"><?= $v_mapel['nama_mapel'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal-body">
                                <label for="mapel">Date Open</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="date_open" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="time" class="form-control" name="time_open" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                                <label for="mapel">Date Close</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="date_close" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="time" class="form-control" name="time_close" required>
                                    </div>
                                </div>
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
                            <th scope="col">Kelas</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Open Date</th>
                            <th scope="col">Close Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($tugas as $key => $value){
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $nama_kelas[$value['id_kelas']] ?></td>
                            <td><?= $nama_mapel[$value['id_mapel']] ?></td>
                            <td><?= DATE('d F, Y H:i a', strtotime($value['open_date'])) ?></td>
                            <td><?= DATE('d F, Y H:i a', strtotime($value['close_date'])) ?></td>
                            <td>
                                <?php
                                    if($value['status']==0){
                                        echo "<span class='badge badge-secondary'>Open</span>";
                                    } elseif($value['status']==1){
                                        echo "<span class='badge badge-primary'>Close</span>";
                                    } elseif($value['status']==2){
                                        echo "<span class='badge badge-success'>Scored</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php 
                            $no++;}
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>