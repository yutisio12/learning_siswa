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
                                
                <table class="table table-hover table-bordered data-table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Open Date</th>
                            <th scope="col">Close Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($list_tugas as $value){
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $nama_mapel[$value['id_mapel']] ?></td>
                            <td><?= DATE('d F, Y H:i a', strtotime($value['open_date'])) ?></td>
                            <td><?= DATE('d F, Y H:i a', strtotime($value['close_date'])) ?></td>
                            <td>
                                <a href="<?= base_url('siswa/kerjakan_tugas/').$value['id'] ?>" class="btn btn-success">
                                    <i class="fas fa-tasks"></i> Kerjakan
                                </a>
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