<?php $this->load->view('menu'); ?>
<!DOCTYPE html>
<html>

<head>
    <script>
    // var rowCount = 1;

    // function addRow() {
    //     rowCount++;
    //     var html = '<div class="form-group row">' +
    //         '<label class="col-sm-4 col-form-label">Nama</label>' +
    //         '<div class="col-sm-8">' +
    //         '<input class="form-control" id="namaLantai' + rowCount +
    //         '" name="namaLantai[]" type="text" placeholder="Masukkan Nama Lantai" required />' +
    //         '</div>' +
    //         '</div>';
    //     $('#inputForm').append(html);
    // }

    // function deleteRow() {
    //     if (rowCount > 1) {
    //         $('#inputForm .form-group:last').remove();
    //         rowCount--;
    //     }
    // }

    // function saveLantai() {
    //     var formData = $('#inputForm').serialize();

    //     console.log("Form Data: ", formData); // Debugging

    //     $.ajax({
    //         type: 'POST',
    //         url: '',
    //         data: formData,
    //         success: function(response) {
    //             console.log("Response: ", response); // Debugging
    //             var res = JSON.parse(response);
    //             if (res.status === 'success') {
    //                 $('#inputModal').modal('hide');
    //                 $('#inputForm').trigger('reset');
    //                 $('#st_data').text('Data berhasil disimpan!').show().delay(3000).fadeOut();
    //                 updateTable(res.data); // Perbarui tabel dengan data baru
    //             } else {
    //                 $('#st_data').text('Terjadi kesalahan saat menyimpan data!').show().delay(3000)
    //                     .fadeOut();
    //             }
    //         },
    //         error: function() {
    //             $('#st_data').text('Terjadi kesalahan saat menyimpan data!').show().delay(3000).fadeOut();
    //         }
    //     });
    // }

    // function deleteLantai(id) {
    //     if (confirm('Apakah Anda yakin ingin menghapus?')) {
    //         $.ajax({
    //             type: 'GET',
    //             url: '' + id,
    //             success: function(response) {
    //                 var res = JSON.parse(response);
    //                 if (res.status === 'success') {
    //                     updateTable(res.data); // Perbarui tabel dengan data baru
    //                 } else {
    //                     $('#st_data').text('Terjadi kesalahan saat menghapus data!').show().delay(3000)
    //                         .fadeOut();
    //                 }
    //             }
    //         });
    //     }
    // }
    </script>
</head>

<body>
    <div class="container mt-5">
        <div id="st_data" class="alert alert-info" style="display: none;"></div>
        <!-- Table -->
        <div class="pd-20 card-box mb-30 mx-auto" style="max-width: 800px;">
            <div class="d-flex justify-content-between mb-3">
                <h4>Daftar Nama Rak</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputModal">
                    Tambah
                </button>
            </div>
            <table class="data-table table nowrap">
                <thead>
                    <tr>
                        <th class="table-plus">Nama Rak</th>
                        <th class="datatable-nosort">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBodyLantai">
                    <!-- Data akan diisi oleh JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputModalLabel">Tambah Nama Rak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="inputForm">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input class="form-control" id="namaRak" name="namaRak[]" type="text"
                                        placeholder="Masukkan Nama Rak" required />
                                    <button type="button" class="btn btn-success btn-sm ml-1"
                                        onclick="addRow()">+</button>
                                    <button type="button" class="btn btn-danger btn-sm ml-1"
                                        onclick="deleteRow()">-</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="saveLantai()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>