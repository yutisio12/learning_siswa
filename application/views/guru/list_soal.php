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
                                    <input type="radio" name="jenis[]" value="1" class="text-right" required="" checked>&nbsp;Essay
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" name="jenis[]" value="2" required="">&nbsp;Objektif
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col">
                                            A <input type="text" name="opsi_a[]" class="form-control">
                                        </div>
                                        <div class="col">
                                            B <input type="text" name="opsi_b[]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            C <input type="text" name="opsi_c[]" class="form-control">
                                        </div>
                                        <div class="col">
                                            D <input type="text" name="opsi_d[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    </div>
                </div>
                <script type="text/javascript">
                    var no_soal = 1
                    function tambah_soal(){
                        no_soal+=1
                        html = '<hr><div class="soal_'+no_soal+'">'
                        html += '<div class="row">'
                        html += '<div class="col-md-1"><p>'+no_soal+')</p></div>'
                        html += '<div class="col">'
                        html += '<textarea class="form-control" required="" name="soal['+no_soal+']"></textarea>'
                        html += '</div></div><br><div class="row"><div class="col-md-3">'
                        html += '<input type="radio" name="jenis['+no_soal+']" value="1" class="text-right" required="" checked>&nbsp;Essay'
                        html += '</div><div class="col-md-3"><input type="radio" name="jenis['+no_soal+']" value="2" required="">&nbsp;Objektif</div>'
                        html += '<div class="col-md-6"><div class="row"><div class="col">A <input type="text" name="opsi_a['+no_soal+']" class="form-control"></div>'
                        html += '<div class="col">B <input type="text" name="opsi_b['+no_soal+']" class="form-control"></div></div>'
                        html += '<div class="row"><div class="col">C <input type="text" name="opsi_c['+no_soal+']" class="form-control"></div>'
                        html += '<div class="col">D <input type="text" name="opsi_d['+no_soal+']" class="form-control"></div></div></div></div></div>'
                        html += '<button class="btn btn-danger"><i class="fas fa-trash"></i> Remove</button><br><br>'
                        $('#tugas').append(html)
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