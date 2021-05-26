<!-- Begin Page Content -->
<style>

</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="text-black">Data Soal</h3>
        </div>
    </div>
    <br>
    <div class="">
        <!-- =================================================================== -->
        <div class="card">
            <div class="container">
                <br>
                <div class="text-left">
                    <button type="button" class="btn btn-success" onclick="tambah_soal()">
                        <i class="fas fa-plus"></i>
                         Tambah soal
                    </button>
                </div> 
                <br>
                <div class="card">
                    <div class="col">
                        <form action="<?= base_url('guru/add_soal_process/').$id_tugas ?>" method="POST">
                        <div id="tugas">
                        <br>
                        <div class="soal_1">
                            <div class="row">
                                <div class="col-md-1"><p>1)</p></div>
                                <div class="col">
                                    <textarea class="form-control" required="" name="soal[]"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="radio" name="jenis[0]" value="0" class="text-right" required="" checked onclick="check_checked(0)">&nbsp;Essay
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" name="jenis[0]" value="1" required="" onclick="check_checked(0)">&nbsp;Objektif
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">
                                            A <input type="text" name="opsi_a[0]" class="form-control" disabled>
                                        </div>
                                        <div class="col">
                                            B <input type="text" name="opsi_b[0]" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            C <input type="text" name="opsi_c[0]" class="form-control" disabled>
                                        </div>
                                        <div class="col">
                                            D <input type="text" name="opsi_d[0]" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        </div>
                        <hr>
                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Save</button>
                        </form>
                        <br>
                    </div>
                </div>
                <script type="text/javascript">
                    var no_soal = 1
                    var no_div = 0
                    function tambah_soal(){
                        no_soal+=1
                        no_div+=1
                        html = '<hr><div class="soal_'+no_soal+'">'
                        html += '<div class="row">'
                        html += '<div class="col-md-1"><p>'+no_soal+')</p></div>'
                        html += '<div class="col">'
                        html += '<textarea class="form-control" required="" name="soal['+no_soal+']"></textarea>'
                        html += '</div></div><br><div class="row"><div class="col-md-3">'

                        html += '<input type="radio" name="jenis['+no_soal+']" value="0" class="text-right" required="" checked onclick="check_checked('+no_soal+', 0)">&nbsp;Essay'
                        html += '</div><div class="col-md-3"><input type="radio" name="jenis['+no_soal+']" value="1" required="" onclick="check_checked('+no_soal+', 1)">&nbsp;Objektif</div>'

                        html += '<div class="col-md-6"><div class="row"><div class="col">A <input type="text" name="opsi_a['+no_soal+']" class="form-control" disabled></div>'
                        html += '<div class="col">B <input type="text" name="opsi_b['+no_soal+']" class="form-control" disabled></div></div>'
                        html += '<div class="row"><div class="col">C <input type="text" name="opsi_c['+no_soal+']" class="form-control" disabled></div>'
                        html += '<div class="col">D <input type="text" name="opsi_d['+no_soal+']" class="form-control" disabled></div></div></div></div>'
                        html += '<button class="btn btn-danger" onclick="remove_tugas('+no_soal+')"><i class="fas fa-trash"></i> Remove</button><br><br></div>'
                        $('#tugas').append(html)
                    }

                    function check_checked(nomor, status) {
                        if ($("input[name='jenis["+nomor+"]']").prop("checked")) {
                            console.log('check '+nomor)
                            $("input[name='opsi_a["+nomor+"]']").prop("disabled", true)
                            $("input[name='opsi_b["+nomor+"]']").prop("disabled", true)
                            $("input[name='opsi_c["+nomor+"]']").prop("disabled", true)
                            $("input[name='opsi_d["+nomor+"]']").prop("disabled", true)
                        } else {
                            $("input[name='opsi_a["+nomor+"]']").prop("disabled", false)
                            $("input[name='opsi_b["+nomor+"]']").prop("disabled", false)
                            $("input[name='opsi_c["+nomor+"]']").prop("disabled", false)
                            $("input[name='opsi_d["+nomor+"]']").prop("disabled", false)
                        }
                    }

                    function remove_tugas(nomor){
                        $('.soal_'+nomor).remove();
                        no_soal-=1
                        no_div-=1
                    }

                </script>
                <br>
            </div>
        </div>
        <!-- =================================================================== -->
    </div>
</div>
<!-- /.container-fluid -->
</div>