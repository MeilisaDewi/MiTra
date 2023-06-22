<div class="modal fade" id="modalProduk" role="dialog" aria-hidden="true" aria-labelledby="exampleModalToogleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eaxmpleModalToggleLabel">List Mobil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Tabel buku -->
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">Sampul</th>
                            <th width="30%">Nama Mobil</th>
                            <th width="15">Tahun </th>
                            <th width="15%">Harga</th>
                            <th width="15%">Jenis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataKendaraan as $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <img src="img/<?= $value['cover']; ?>" alt="" width="100">
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['tahun']; ?></td>
                                <td><?= $value['harga']; ?></td>
                                <td><?= $value['jenis']; ?></td>
                                <td><?= $value['warna']; ?></td>
                                <td><?= $value['no_polisi']; ?></td>

                                <td>
                                    <button onclick="add_cart('<?= $value['id_mobil'] ?>', '<?= $value['nama'] ?>', '<?= $value['harga'] ?>')" class="btn btn-success"><i class="fa fa-cart-plus"></i> Tambahkan</button>
                                </td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="col">
                    <button class="btn btn-primary" data-bs-target="#modalProduk" data-bs-toggle="modal">Pilih Mobil</button>
                    <button class="btn btn-dark" data-bs-target="#modalSup" data-bs-toggle="modal">Cari Customer</button>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalUbah" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">UBAH JUMLAH PRODUK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-sm-7">
                        <input type="hidden" id="rowid">
                        <input type="number" id="qty" class="form-control" placeholder="Masukkan jumlah Produk" min="1" value="1">
                    </div>
                    <div class="col-sm-5">
                        <button class="btn btn-primary" onclick="update_cart()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function add_cart(id_mobil, nama, harga) {
        $('#id_mobil').val(id_mobil);
        $('#nama_mobil').val(nama);
        $('#harga').val(harga);
        // $('#warna').val(warna);
        $('#modalProduk').modal('hide');
        //     $.ajax({
        //         url: "/transaksi",
        //         method: "POST",
        //         data: {
        //             id_mobil: id_mobil,
        //             nama: nama,
        //             Warna: 1,
        //             tahun: tahun,
        //             warna: warna,
        //         },
        //         success: function(data) {
        //             load()
        //         }
        //     });
        // }
        // $(document).ready(function() {
        //     load();
        // });

        // function update_cart() {
        //     var rowid = $('#rowid').val();
        //     var qty = $('#qty').val();

        //     $.ajax({
        //         url: "/transaksi/update",
        //         method: "POST",
        //         data: {
        //             rowid: rowid,
        //             qty: qty,
        //         },
        //         success: function(data) {
        //             load();
        //             $('#modalUbah').modal('hide');
        //         }
        //     });
        // }

        // $(document).on('click', '.ubah_cart', function() {
        //     var row_id = $(this).attr("id");
        //     var qty = $(this).attr("qty");
        //     $('#rowid').val(row_id);
        //     $('#qty').val(qty);
        //     $('#modalUbah').modal('show');
        // });
        // //hapus item cart
        // $(document).on('click', '.hapus_cart', function() {
        //     var row_id = $(this).attr("id");
        //     $.ajax({
        //         url: "transaksi/" + row_id,
        //         method: "DELETE",
        //         success: function(data) {
        //             load();
        //         }
        //     });
        // });

        // function bayar() {
        //     var nominal = $('#nominal').val();
        //     var idsup = $('#id-sup').val();
        //     $.ajax({
        //         url: "/transaksi/bayar",
        //         method: "POST",
        //         data: {
        //             'nominal': nominal,
        //             'id-sup': idsup
        //         },
        //         success: function(response) {
        //             var result = JSON.parse(response);
        //             swal({
        //                 title: result.msg,
        //                 icon: result.status ? "success" : "error",
        //             });
        //             load();
        //             $('#nominal').val("");
        //             $('#kembalian').val(result.data.kembalian);
        //         },
        //         error: function(request, status, error) {
        //             alert(request.responseText);
        //         }
        //     });
    }
</script>