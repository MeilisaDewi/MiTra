<div class="modal fade" id="modalSup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">DATA CUSTOMER</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Table Supplier -->

                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Nama</th>
                            <th width="15%">Telp</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dataCust as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['phone'] ?></td>
                                <td>
                                    <button onclick="selectCustomer('<?= $value['id_customer'] ?>',
                                   '<?= $value['name'] ?>')" class="btn 
                                    btn-success"><i class="fa fa-cart-plus"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">Tutup<button>
            </div>
        </div>
    </div>
</div>
<script>
    function selectCustomer(id, name) {
        $('#id-customer').val(id);
        $('#nama-customer').val(name);
        $('#modal-sup').modal('hide');

    }
</script>