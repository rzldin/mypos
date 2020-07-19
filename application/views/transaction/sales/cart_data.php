<?php $no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $c->barcode; ?></td>
            <td><?= $c->item_name; ?></td>
            <td><?= indo_currency($c->cart_price); ?></td>
            <td><?= $c->qty; ?></td>
            <td><?php if ($c->discount_item != 0) {
                    $uang = indo_currency($c->discount_item);
                } else {
                    $uang = $c->discount_item;
                } ?>
                <?= $uang; ?>
            </td>
            <td id="total"><?= $c->total; ?></td>
            <td class="text-center" width="160px">
                <a onclick="editData(<?= $c->cart_id; ?>)" class="btn btn-xs btn-primary" style="color: white;">
                    <i class="fa fa-edit"></i> Update
                </a>
                <form action="<?= site_url('sales/cart_del') ?>" method="POST" class="d-inline">
                    <input type="hidden" name="cart_id" value="<?= $c->cart_id; ?>">
                    <button class="btn btn-danger btn-xs tombol-hapus" type="submit">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </form>
            </td>
        </tr>

<?php }
} else {
    echo '  <tr>
                <td colspan="9" class="text-center">Tidak ada item</td>
            </tr>';
} ?>

<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
</div>

<div class="modal fade" id="itemEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" target="_self" name="formku" id="formku" class="eventInsForm">
                    <div class="form-row">
                        <label for="barcode_name" class="col-form-label">Product Item</label>
                        <input type="text" id="barcode_name" name="barcode_name" class="form-control" readonly>
                        <br><br>
                        <input type="text" id="product_name" class="form-control" readonly>
                        <input type="hidden" name="cart_id" id="cart_id">
                        <input type="hidden" name="cart_item" id="cart_item">
                    </div>
                    <div class="form-row">
                        <label for="item_price">Price</label>
                        <input type="text" id="item_price" name="item_price" class="form-control">
                        <div class="invalid-feedback inv-price">
                            &nbsp;
                        </div>
                    </div>

                    <div class="form-row">
                        <label for="item_qty">Qty</label>
                        <input type="text" id="item_qty" name="item_qty" class="form-control">
                    </div>

                    <div class="form-row">
                        <label for="item_discount">Discount Item</label>
                        <input type="text" id="item_discount" name="item_discount" class="form-control">
                        <div class="invalid-feedback inv-discount">
                            &nbsp;
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="item_total">Total</label>
                        <input type="text" id="item_total" name="item_total" class="form-control" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn btn-success" onclick="simpandata()"><i class="fa fa-paper-plane"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    function editData(cart_id) {
        $.ajax({
            type: "POST",
            url: "<?= site_url('sales/edit'); ?>",
            data: {
                cart_id: cart_id
            },
            success: function(result) {
                $('#barcode_name').val(result['barcode']);
                $('#product_name').val(result['item_name']);
                $('#item_price').val(result['cart_price']);
                $('#item_qty').val(result['qty']);
                $('#item_discount').val(result['discount_item']);
                $('#item_total').val(result['total']);
                $('#cart_id').val(result['cart_id']);
                $('#cart_item').val(result['cart_item']);

                $("#itemEdit").modal('show', {
                    backdrop: 'true'
                });
                //console.log(result);
            }
        })
    }

    function simpandata() {
        $('#formku').attr("action", "<?= site_url('sales/update') ?>");
        $('#formku').submit();
        calculate()
    }
</script>