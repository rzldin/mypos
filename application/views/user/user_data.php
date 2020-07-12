<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Users Data</li>
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
                                <form method="post" target="_self" name="formku" id="formku" class="eventInsForm">
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="username" class="col-form-label">Username <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="text" name="username" id="username" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus>
                                            <input type="hidden" name="user_id" id="user_id">
                                            <div class="invalid-feedback nama-ada inv-username">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="name" class="col-form-label">Nama <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-4">
                                            <input type="text" name="name" id="name" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                            <div class="invalid-feedback inv-name">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="address" class="col-form-label">Address <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col md-8 col-xs-8">
                                            <input type="text" name="address" id="address" class="form-control" style="margin-bottom: 5px;" maxlength="100" autofocus onkeyup="this.value = this.value.capitalize()">
                                            <div class="invalid-feedback inv-address">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="level" class="col-form-label">Level <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <select id="level" name="level" class="form-control" style="margin-bottom: 5px;">
                                                <option disabled selected value="">--Pilih--</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Kasir</option>
                                            </select>
                                            <div class="invalid-feedback inv-level">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="password" class="col-form-label">Password <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-8">
                                            <input type="password" name="password" id="password" style="margin-bottom: 5px;" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-
                                    row">
                                        <div class="col-md-4 col-xs-4">
                                            <label for="password_confirmation" class="col-form-label">Confirm Password <font color="#f00">*</font></label>
                                        </div>
                                        <div class="col-md-8 col-xs-4">
                                            <input type="password" name="password_confirmation" id="password_confirmation" style="margin-bottom: 5px;" onkeyup="cekPassword(this.value)" class="form-control">
                                            <p class="text-muted" id="passwordWarning" style="display: none;">Password tidak sesuai</p>
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

                    <?php if ($this->session->flashdata('pesan')) { ?>
                        <!-- <div class="container-fluid">
                            <div class="alert alert-success">
                                <span><?= $this->session->flashdata('pesan'); ?></span>
                            </div>
                        </div> -->
                    <?php } ?>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Address</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $u) { ?>
                                    <tr>
                                        <td><?= $no++ . '.'; ?></td>
                                        <td><?= $u->username; ?></td>
                                        <td><?= $u->name; ?></td>
                                        <td><?= $u->address; ?></td>
                                        <td><?= $u->level; ?></td>
                                        <td style="text-align: center;width:200px;">
                                            <a onclick="editData(<?= $u->user_id; ?>)" style="margin-bottom:4px;color:white;" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="<?= site_url('user/delete') ?>" method="POST" class="d-inline">
                                                <input type="hidden" name="user_id" value="<?= $u->user_id; ?>">
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
        $('#id').val('');
        $('#username').val('');
        $('#name').val('');
        $('#address').val('');
        $('#level').val('');
        $('#password').val('');
        dsState = "Input";

        $("#myModal").find('.modal-title').text('Add User');
        $("#myModal").modal('show', {
            backdrop: 'true'
        });

    }

    function simpandata() {
        if ($.trim($("#username").val()) == "") {
            $(".inv-username").html("Username tidak boleh kosong! ");
            $('#username').addClass('is-invalid');
        } else if ($.trim($("#name").val()) == "") {
            $(".inv-name").html("Name tidak boleh kosong!");
            $('#name').addClass('is-invalid');
        } else if ($.trim($("#address").val()) == "") {
            $(".inv-address").html("Address tidak boleh kosong!");
            $('#address').addClass('is-invalid');
        } else if ($.trim($("#level").val()) == "") {
            $(".inv-level").html("Level tidak boleh kosong!");
            $('#level').addClass('is-invalid');
        } else {
            if (dsState == "Input") {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('user/cek_username') ?>",
                    data: {
                        data: $("#username").val()
                    },
                    success: function(result) {
                        if (result == "ADA") {
                            //console.log(result);
                            $('.nama-ada').html("Nama user sudah ada!");
                            $('.nama-ada').show();
                        } else {
                            // console.log(result);
                            $('#message').html("");
                            $('.nama-ada').hide();
                            $('#formku').attr("action", "<?= site_url('user/save') ?>");
                            $('#formku').submit();
                        }
                    }
                });
            } else {
                $('#formku').attr("action", "<?= site_url('user/update') ?>");
                $('#formku').submit();
            }
        };
    };

    function cekPassword(value) {
        const password = $('#password').val();
        const check = $('#password_confirmation').val();
        if (password != check) {
            $('#password_confirmation').css({
                'background-color': '#ffc89e'
            });
            $('#passwordWarning').show();
        } else {
            $('#password_confirmation').css({
                'background-color': '#ffffff'
            });
            $('#passwordWarning').hide();
        }
    };

    function editData(user_id) {
        dsState = "Edit";
        $.ajax({
            type: "POST",
            url: "<?= site_url('user/edit'); ?>",
            data: {
                user_id: user_id
            },
            success: function(result) {
                $('#username').val(result['username']);
                $('#name').val(result['name']);
                $('#address').val(result['address']);
                $('#level').val(result['level']);
                //$('#password').val(result['password']);
                $('#user_id').val(result['user_id']);

                $("#myModal").find('.modal-title').text('Edit User');
                $("#myModal").modal('show', {
                    backdrop: 'true'
                });
            }
        })
    }
</script>