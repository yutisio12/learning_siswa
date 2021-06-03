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
                                <select class="select2 form-control" id="kelas" name="kelas[]" style="width: 100%;" required>
                                    <option value="">---</option>
                                    <?php foreach($list_kelas as $v_kelas){ ?>
                                        <option value="<?= $v_kelas['id'] ?>"><?= $v_kelas['nama_kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="modal-body">
                                <label for="mapel">mapel</label>
                                <br>
                                <select class="select2 form-control" id="mapel" name="mapel[]" style="width: 100%;" required>
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
                            <th scope="col"></th>
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
                                <select class="form-control" onchange="ubah_status(this, '<?= $value['id'] ?>')">
                                    <option value="0" <?= $value['status']==0 ? 'selected' : '' ?>>Open</option>
                                    <option value="1" <?= $value['status']==1 ? 'selected' : '' ?>>Close</option>
                                    <option value="2" <?= $value['status']==2 ? 'selected' : '' ?>>Scored</option>
                                </select>
                            </td>
                            <td>
                                <a href="<?= base_url('guru/tulis_soal/').$value['id'] ?>" class="btn btn-danger"><i class="fas fa-pencil-alt"></i> Soal</a>

                                <a href="<?php echo site_url('guru/hapus_tugas/'.$value['id']);?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>

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
<script type="text/javascript">
    function ubah_status(thiss, id){
        var status = $(thiss).val()
        console.log(status)
        Swal.fire({
        title: 'Are you sure to <b class="text-warning">&nbsp;Change&nbsp;</b> this?',
        // text: "This joint will permanent deleted!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Change it!'
        }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?php echo base_url();?>guru/ubah_status_tugas",
            type: "post",
            data: {
              id: id,
              status: status
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