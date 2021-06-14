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
                                
                <table class="table table-hover table-bordered data-table-filter">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th>Kode Tugas</th>
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
                            <td><?= $tugas[$value['id_tugas']] ?></td>
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

<script>
$(document).ready(function() {
    $('.data-table-filter').DataTable({
                initComplete: function () {
                     this.api().columns(2).every(function () {
                         var column = this;
                         $(column.header()).append("<br>")
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.header()))
                             .on('change', function () {
                                 var val = $.fn.dataTable.util.escapeRegex(
                                     $(this).val()
                                 );

                                 column
                                     .search(val ? '^' + val + '$' : '', true, false)
                                     .draw();
                             });
                         column.data().unique().sort().each(function (d, j) {
                             select.append('<option value="' + d + '">' + d + '</option>')
                } );
            } );
            }
            });
        });
</script>