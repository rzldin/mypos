<a class="nav-link" data-toggle="dropdown" href="#">
    <i class="far fa-bell"></i>
    <span class="badge badge-danger navbar-badge"><?= sizeof($CI->list_notif()) ?></span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

    <?php if (sizeof($CI->list_notif()) == 0) { ?>
        <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                        Tidak ada Notifikasi
                    </h3>
                </div>
            </div>
            <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
    <?php } ?>
    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
</div>