<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sales</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Transaction</a></li>
                    <li class="breadcrumb-item active">Sales</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" style="height: 200px;">
                        <table>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label for="date">Date</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="date" id="date" name="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width:30%;">
                                    <label for="user">Kasir</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" id="user" name="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top;">
                                    <label for="user">Customer</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select name="customer" id="customer" class="form-control">
                                            <option value="" selected>Umum</option>
                                            <?php foreach ($customer as $c) { ?>
                                                <option value="<?= $c->customer_id; ?>"><?= $c->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" style="height: 200px;">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align: top; width:30%;">
                                    <label for="barcode">Barcode</label>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input type="hidden" id="item_id">
                                        <input type="hidden" id="price">
                                        <input type="hidden" id="stock">
                                        <input type="text" name="barcode" id="barcode" class="form-control" aria-describedby="basic">
                                        <div class="input-group-append">
                                            <span>
                                                <button type="button" class="input-group-text btn btn-info btn-flat form-control" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search" id="basic"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; width:30%;">
                                    <label for="qty">Qty</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="qty" value="1" min="1" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <button type="button" id="add_cart" class="btn btn-primary">
                                            <i class="fa fa-cart-plus"> Add</i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body" style="height: 200px;">
                        <div align="right">
                            <h4>Invoice <b><span id="invoice"><?= $invoice; ?></span></b></h4>
                            <h1><b><span id="grand_total" style="font-size:50pt;">0</span></b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Barcode</th>
                                        <th>Product Item</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th width="10%">Discount Item</th>
                                        <th width="15%">Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody id="cart_tabel">
                                    <?php $this->view('transaction/sales/cart_data') ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;width:30%;">
                                    <label for="sub_total">Sub Total</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="sub_total" name="sub_total" value="" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top;">
                                    <label for="discount">Discount</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="discount" value="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top;">
                                    <label for="grand_total">Grand Total</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="grand_total" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body" style="height: 145px;">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;width:30%;">
                                    <label for="cash">Cash</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="cash" value="0" min="0" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align:top;">
                                    <label for="change">Change</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" id="change" class="form-control" readonly>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <table width="100%">
                            <tr>
                                <td style="vertical-align:top;">
                                    <label for="note">Note</label>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <textarea id="note" rows="3" class="form-control"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div>
                    <button id="cancel_payment" class="btn btn-flat btn-warning" style="color: white;">
                        <i class="fa fa-recycle"></i> Cancel
                    </button><br><br>
                    <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                        <i class="fa fa-paper-plane"></i> Process Payment
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-item">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Product Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div class="container-fluid">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($item as $i) { ?>
                                <tr>
                                    <td><?= $i->barcode; ?></td>
                                    <td><?= $i->name; ?></td>
                                    <td style="text-align: center;"><?= $i->name_unit; ?></td>
                                    <td style="text-align: center;"><?= indo_currency($i->price); ?></td>
                                    <td><?= $i->stock; ?></td>
                                    <td align="center">
                                        <button class="btn btn-xs btn-info" id="select" data-id="<?= $i->item_id; ?>" data-barcode="<?= $i->barcode; ?>" data-price="<?= $i->price; ?>" data-stock="<?= $i->stock; ?>">
                                            <i class="fa fa-check"></i> Select
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#select', function() {
        $('#item_id').val($(this).data('id'))
        $('#barcode').val($(this).data('barcode'))
        $('#price').val($(this).data('price'))
        $('#stock').val($(this).data('stock'))
        $('#modal-item').modal('hide')
    });

    $(document).on('click', '#add_cart', function() {
        var item_id = $('#item_id').val();
        var price = $('#price').val();
        var stock = $('#stock').val();
        var qty = $('#qty').val();
        if (item_id == '') {
            alert('Product belum dipilih');
            $('#barcode').focus();
        } else if (stock < 1) {
            alert('Stock tidak mencukupi');
            $('#item_id').val('');
            $('#barcode').val('');
            $('#barcode').focus();
        } else {
            $.ajax({
                type: "POST",
                url: "<?= site_url('sales/process') ?>",
                data: {
                    'add_cart': true,
                    'item_id': item_id,
                    'price': price,
                    'qty': qty
                },
                dataType: "json",
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_tabel').load('<?= site_url('sales/cart_data'); ?>', function() {

                        });
                        $('#item_id').val('');
                        $('#barcode').val('');
                        $('#qty').val(1);
                        $('#barcode').focus();
                    } else {
                        alert('Gagal tambah item cart');
                    }
                }
            });
        }
    })

    $(document).on('click', '#del_cart', function() {
        if (confirm('apakah anda yakin?')) {
            var cart_id = $(this).data('cartid');
            $.ajax({
                type: "POST",
                url: "<?= site_url('sales/cart_del') ?>",
                data: {
                    'cart_id': cart_id
                },
                dataType: "json",
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_tabel').load('<?= site_url('sales/cart_data'); ?>', function() {

                        });
                    } else {
                        alert('Gagal hapus item cart');
                    }
                }
            });

        }
    });
</script>