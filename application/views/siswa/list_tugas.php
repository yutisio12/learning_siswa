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
                                
                <table class="table table-hover table-bordered data-table" data-title="Kumpulan Tugas" data-intro="Ini adalah tabel list tugas yang tersedia.">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th>Kode Tugas</th>
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
                            <td><?= $value['running_number'] ?></td>
                            <td><?= DATE('d F, Y H:i a', strtotime($value['open_date'])) ?></td>
                            <td><?= DATE('d F, Y H:i a', strtotime($value['close_date'])) ?></td>
                            <td>
                                <?php if($check_kumpul[$value['id']]!=1){ ?>
                                    <a href="<?= base_url('siswa/kerjakan_tugas/').$value['id'] ?>" class="btn btn-success" data-title="Tombol kerjakan" data-intro="Tekan tombol ini untuk melakukan pengerjaan tugas kamu.">
                                        <i class="fas fa-tasks"></i> Kerjakan
                                    </a>
                                <?php } else { ?>
                                    <?php if($check_nilai[$value['id']]==1){ ?>
                                    <a href="<?= base_url('siswa/review_pengumpulan/').$value['id'] ?>" class="btn btn-primary" data-title="Tombol nilai" data-intro="Tekan tombol ini untuk nilai kamu yang sudah diberikan oleh guru pengajar kamu.">
                                        <i class="fas fa-clipboard-check"></i> Lihat Nilai
                                    </a>
                                    <?php } elseif($check_kumpul[$value['id']]==1) { ?>
                                    <a href="<?= base_url('siswa/review_pengumpulan/').$value['id'] ?>" class="btn btn-secondary" data-title="Tombol lihat jawaban" data-intro="Tekan tombol lihat jawaban jika kamu ingin melihat jawaban yang sudah kamu kerjakan.">
                                        <i class="fas fa-eye"></i> Lihat Jawaban
                                    </a>
                                <?php }} ?>
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