<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Items</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Items</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" target="_self" name="formku" id="formku" class="eventInsForm" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="barcode" class="col-form-label">Barcode <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="text" name="barcode" id="barcode" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                            <input type="hidden" name="item_id" id="item_id">
                                            <input type="hidden" name="gambar_lama" id="gambar_lama">
                                            <div class="invalid-feedback nama-ada inv-barcode">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="nama_produk" class="col-form-label">Name Product <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="text" name="nama_produk" id="nama_produk" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <div class="invalid-feedback inv-name">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="category" class="col-form-label">Category <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <select name="category" id="category" class="form-control" style="margin-bottom: 5px;">
                                                <option value="" selected>--Pilih--</option>
                                                <?php foreach ($category as $c) { ?>
                                                    <option value="<?= $c->category_id; ?>"><?= $c->name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback inv-category">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="unit" class="col-form-label">Unit <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <select name="unit" id="unit" class="form-control" style="margin-bottom: 5px;">
                                                <option value="" selected>--Pilih--</option>
                                                <?php foreach ($unit as $u) { ?>
                                                    <option value="<?= $u->unit_id ?>"><?= $u->name ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback inv-unit">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="price" class="col-form-label">Price <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="number" name="price" id="price" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <div class="invalid-feedback inv-price">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="input_photo" style="display:none;">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="gambar" class="col-form-label">Photo Product</label>
                                        </div>
                                        <div class="col-md-8 col-xs4">
                                            <div class="fileinput fileinput-new myline" data-provides="fileinput" style="margin-bottom:5px">
                                                <div class="input-group input-small">
                                                    <div class="form-control uneditable-input" data-trigger="fileinput">
                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                        <span class="fileinput-filename"></span>
                                                    </div>
                                                    <span class="input-group-addon btn btn-default btn-file">
                                                        <span class="fileinput-new">
                                                            Select file </span>
                                                        <span class="fileinput-exists">
                                                            Change </span>
                                                        <input type="file" name="gambar" id="gambar">
                                                    </span>
                                                    <a href="javascript:;" class="input-group-addon btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                        Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="edit_photo" style="display:none;">
                                        <div class="col-md-4">
                                            <label for="photo-url" class="col-form-label">Photo Product</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" id="photo_url" name="photo_url" class="form-control myline" style="margin-bottom:5px" readonly="true" autofocus>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" onclick="new_file();" class="btn btn-circle btn-success btn-sm">
                                                <i class="fa fa-edit"></i> Change
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            &nbsp;
                                        </div>
                                        <div class="col-md-8">
                                            <small><i>Recommended 128 x 128 pixels (jpg, png, jpeg)</i></small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                <button type="button" class="btn btn-primary" onclick="simpandata()"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="float-sm-right">
                            <a onclick="tambahData()" class="btn btn-success btn-sm" style="color: aliceblue;"><i class="fa fa-plus"> Create</i></a>
                        </div>
                    </div>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>">
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Barcode</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Photo Product</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($item as $i) { ?>
                                    <tr>
                                        <td><?= $no++ . '.'; ?></td>
                                        <td>
                                            <?= $i->barcode; ?><br>
                                            <a href="<?= site_url('item/barcode_qrcode/' . $i->item_id); ?>" class="btn btn-warning btn-sm">
                                                Generate <i class="fa fa-barcode"></i>
                                            </a>
                                        </td>
                                        <td><?= $i->name; ?></td>
                                        <td><?= $i->name_category; ?></td>
                                        <td><?= $i->name_unit; ?></td>
                                        <td><?= indo_currency($i->price); ?></td>
                                        <td align="center">
                                            <img src="<?= base_url('/uploads/product/' . $i->gambar) ?>" style="width: 50px; height:50px;">
                                        </td>
                                        <td><?= $i->stock; ?></td>
                                        <td style="text-align: center;width:200px;">
                                            <a onclick="editData(<?= $i->item_id; ?>)" style="margin-bottom:4px;color:white;" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="<?= site_url('item/delete') ?>" method="POST" class="d-inline">
                                                <input type="hidden" name="item_id" value="<?= $i->item_id; ?>">
                                                <button class="btn btn-danger btn-sm tombol-hapus" style="margin-bottom:4px;" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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
</section>
<script>
    var dsState;

    String.prototype.capitalize = function() {
        return this.charAt(0).toUpperCase() + this.slice(1);
    }

    $(function() {
        window.setTimeout(function() {
            $('.alert-success').hide(300);
        }, 5000);
    });

    $(function() {
        window.setTimeout(function() {
            $('.invalid-feedback').hide(300);
        }, 3000);
    });

    function tambahData() {
        $('#item_id').val('');
        $('#barcode').val('');
        $('#nama_produk').val('');
        $('#category').val('');
        $('#unit').val('');
        $('#price').val('');
        $('#input_photo').show();
        $('#edit_photo').hide();
        dsState = "Input";

        $("#myModal").find('.modal-title').text('Add Item');
        $("#myModal").modal('show', {
            backdrop: 'true'
        });

    }

    function simpandata() {
        if ($.trim($("#barcode").val()) == "") {
            $(".inv-barcode").html("Barcode tidak boleh kosong! ");
            $('#barcode').addClass('is-invalid');
            window.setTimeout(function() {
                $('.inv-barcode').hide(300);
            }, 3000);
        } else if ($.trim($("#nama_produk").val()) == "") {
            $(".inv-name").html("Nama Produk tidak boleh kosong!");
            $('#nama_produk').addClass('is-invalid');
        } else if ($.trim($("#category").val()) == "") {
            $(".inv-category").html("Category tidak boleh kosong!");
            $('#category').addClass('is-invalid');
        } else if ($.trim($("#unit").val()) == "") {
            $(".inv-unit").html("Unit tidak boleh kosong!");
            $('#unit').addClass('is-invalid');
        } else if ($.trim($("#price").val()) == "") {
            $(".inv-price").html("Price tidak boleh kosong!");
            $('#price').addClass('is-invalid');
        } else {
            if (dsState == "Input") {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('item/cek_barcode') ?>",
                    data: {
                        data: $("#barcode").val()
                    },
                    success: function(result) {
                        if (result == "ADA") {
                            //console.log(result);
                            $('.nama-ada').html("Barcode sudah terdaftar!");
                            $('.nama-ada').show();
                        } else {
                            // console.log(result);
                            $('#message').html("");
                            $('.nama-ada').hide();
                            $('#formku').attr("action", "<?= site_url('item/save') ?>");
                            $('#formku').submit();
                        }
                    }
                });
            } else {
                $('#formku').attr("action", "<?= site_url('item/update') ?>");
                $('#formku').submit();
            }
        };
    };


    function editData(item_id) {
        dsState = "Edit";
        $.ajax({
            type: "POST",
            url: "<?= site_url('item/edit'); ?>",
            data: {
                item_id: item_id
            },
            success: function(result) {
                $('#barcode').val(result['barcode']);
                $('#nama_produk').val(result['name']);
                $('#category').val(result['category_id']);
                $('#unit').val(result['unit_id']);
                $('#price').val(result['price']);
                $('#item_id').val(result['item_id']);
                $('#photo_url').val(result['gambar']);
                $('#gambar_lama').val(result['gambar']);
                $('#input_photo').hide();
                $('#edit_photo').show();

                $("#myModal").find('.modal-title').text('Edit Item');
                $("#myModal").modal('show', {
                    backdrop: 'true'
                });
            }
        })
    }

    function new_file() {
        $('#input_photo').show();
        $('#edit_photo').hide();
    }
</script>