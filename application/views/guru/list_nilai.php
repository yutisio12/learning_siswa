<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Nilai</h3>
        </div>
    </div>
    <br>
    <div class="">
        <!-- =================================================================== -->
        <div class="card">
            <div class="container">
                <br>
                <div class="text-left">

                </div>
                <br>
                                
                <table class="table table-hover table-bordered data-table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($penilaian as $key => $value){
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $name[$value['id_siswa']] ?></td>
                            <td><?= $nama_mapel[$value['id_mapel']] ?></td>
                            <td><?= $value['nilai'] ?></td>
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