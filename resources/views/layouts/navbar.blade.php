<nav class="mainNav w100 fll uln off-menu">
    <section class="container">
        <ul class="menu">
            {{-- <li>
                <a><i class="fas fa-eye"></i>Tổng quan</a>
            </li> --}}
            <?php
            if(Auth::user()->role == 1){?>
            <li>
                <a> <i class="fas fa-cube"></i>Trang chủ</a>
                <ul class="sub">
                    <li>
                        <a href="/admin/history/"> <i class="fa-fw fa fa-th"></i>Lịch sử mua</a>
                    </li>
                    <li>
                        <a href="/admin/history/sell"> <i class="fa-fw fa fa-th"></i>Lịch sử bán</a>
                    </li>
                    {{-- <li>
                        <a><i class="fa-fw fa fa-tags"></i>Thiết lập giá</a>
                    </li>
                    <li>
                        <a><i class="fa-fw fas fa-shield-check"></i>Phiếu bảo hành</a>
                    </li>
                    <li>
                        <a><i class="fa-fw fas fa-clipboard-check"></i>Kiểm kho</a>
                    </li> --}}
                </ul>
            </li>
            <?php }?>

            {{-- <li>
                <a><i class="fas fa-user-friends"></i>Nhân viên</a>
            </li>
            <li>
                <a><i class="fa-solid fa-dollar-sign"></i>Sổ quỹ</a>
            </li>
            <li>
                <a><i class="fa-solid fa-chart-simple"></i>Báo cáo</a>
            </li> --}}
        </ul>
        <ul class="menu menu-right">
            <li class="ng-scope">
                <ul>
                    <li class="  ng-scope" data-placement="right">
                        <a href="/admin/logout" class="kol-menu-item ng-binding"><i class="fa fa-sign-out"></i>Đăng xuất</a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
</nav>
