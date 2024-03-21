@extends('page.buysell')

@section('content_buysell')
    <section id="connected" class="detail">
        <div class="c1">
            <div class="order">
                <div class="id">Mã đơn hàng: <b><?=$history['code']?></b> <br>Link đơn hàng: <a href=""
                        style="color: rgb(250, 159, 159);"><?=$fullPath;?></a></div>
                <div class="content">

                    <div class="sec" id="infotransfer">
                        <div class="panel-body">
                            <div class="sendPayment">
                                <p style="text-align: center;font-weight: bold;margin-top:5px">THÔNG TIN THANH TOÁN
                                    (<strong><class="text-center" style="color:#ff5656">HÃY QUÉT MÃ
                                    QR-CODE</class="text-center"></strong>)</p>
                                <table cellspacing="0" style="border-collapse: collapse;font-size:100%;width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td width="70%">
                                                <div style="text-align:left;font-size:auto;">Tài khoản nhận:
                                                    <strong><class="text-center" style="color:#ff5656"
                                                    id="contentcopy"><?=$result['address']?></class="text-center"></strong>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" class="btncp" style="width:24px;"
                                                        data-clipboard-target="#contentcopy" title="Click to copy">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9 3h11v13h-3V6H9V3zM4 8v13h11V8.02L4 8z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                    <span id="coppy" style="color: rgb(252, 124, 124);"></span>
                                                </div>
                                                <div style="text-align:left;">Loại tài khoản: <strong
                                                        style="color:#dca969">USDT (TRC20)</strong></div>
                                            </td>
                                            <td colspan="1" rowspan="3" width="30%">
                                                <div style="width:110px; display:block">
                                                    <a href="static/home/img/xid/JPR6338.png" download="" target="_blank"
                                                        style="background-size: cover;width: 120px;height: 120px;display: inline-block;">
                                                        <img src="static/home/img/xid/JPR6338.png" style="width:100%;"
                                                            alt="Thông tin đơn hàng">
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%">
                                                <div style="text-align:left;">Số lượng nhận chính xác:
                                                    <strong><class="text-center" style="color:#ff5656"><?=$history['amount']?>
                                                    USDT</class="text-center"></strong></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" colspan="2">
                                                <div style="text-align:left;">Phí: <i>Người chuyển chịu.</i></div>
                                                <div style="text-align:left;">Chú ý: <span style="color:#d8cb58"> Hãy kiểm
                                                        tra lại thông tin trước khi xác nhận.</span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="wr" id="btnpayusdt" style="text-align: center;">
                            <button onclick="if (!window.__cfRLUnblockHandlers) return false; transferusdt()"
                                class="btn btn-primary" fdprocessedid="kpd8o"> Xác nhận <i style="font-size: small;">(Đã
                                    chuyển USDT)</i></button>
                        </div>
                    </div>
                    <div class="c10">
                        <div class="wr">
                            <div class="header">Bạn Gửi</div>
                            <div class="bo">
                                <div class="line">USDT</div>
                                <div class="line" id="showdone1">
                                    <div style="padding: 3px 5px; color: #FFF; background-color: #000;">TRC20</div>
                                </div>
                                <div id="dialog-confirm" title="Số lượng Voucher không chính xác!" style="display:none;">
                                    <p><span class="ui-icon ui-icon-alert"
                                            style="float:left; margin:12px 12px 20px 0;"></span>Hệ thống sẽ tự động cập nhật
                                        chính xác số lượng của Vouhcer! Bạn muốn tiếp tục?</p>
                                </div>
                                <div class="line" id="showtotal"><?=$history['amount']?> USDT
                                </div>
                            </div>
                        </div>
                        <div class="wr">
                            <div class="header">Trạng thái:
                                <span id="statusxid" class="opened" style="color: rgb(81, 50, 196);">Chờ bạn chuyển
                                    tiền...</span>
                                <div class="progress">
                                    <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 64%;"></div>
                                </div>
                            </div>
                            <div class="bo">
                                <div class="line" id="cdtime">Thời gian còn lại: <span
                                        style="color:rgb(253, 135, 135);" id="demotime">7m 7s </span></div>
                            </div>
                            <div class="line" id="batch" style="display: none;">
                                <span style="padding: 3px 5px;font-size: medium; background-color: #0268ac;">Batch: <i
                                        style="color:rgb(253, 135, 135);">None</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="c11">
                        <div class="wr">
                            <div class="header">Bạn Nhận</div>
                            <div class="bo">
                                <div class="line"><?=$history['bank']?></div>
                                <div class="line" id="showdone"><?=$history['stk']?></div>
                                <div class="line" id="showdone">
                                    <div style="padding: 3px 5px; color: #FFF; background-color: #000;">LE HUU DUYEN</div>
                                </div>
                                <div class="line">
                                    <div>285,285 VND</div>
                                    <div class="sub">= <span title="Amount">11</span> * <span
                                            title="Rate">25,935</span> + <span title="Fee">0.0</span> + <span
                                            title="Fee" style="padding: 3px 5px; color: rgb(3, 223, 51);">0
                                            (Discount)</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sec">
                        <p>Nếu cần chỉnh sửa thay đổi, vui lòng quay lại trang chủ lập lại giao dịch mới.</p>
                        <span style="color: rgb(248, 135, 135);">Lịch sử đơn hàng JPR6338:</span>
                        <div class="item">21/03/2024 12:52 : Bạn tạo đơn hàng.</div>
                        <input type="text" id="countdown" style="display: none;" value="2024/03/21 12:52:43">
                        <input type="text" id="timefn" style="display: none;" value="">
                        <input type="text" id="checkt" style="display: none;" value="">
                        <input type="text" id="counter" style="display: none;" value="">
                        <span id="process">21/03/2024 12:52 : Hệ thống đang chờ bạn chuyển tiền...</span>
                        <span id="finished"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="c2">
            <div class="box">
                <div class="pad">
                    <div class="header">Thông tin chi tiết tài khoản:</div>
                    <div class="content">
                        <article id="content">
                            <div class="container">
                                <div class="row">
                                    <div class="span3">
                                        <div class="box">
                                            <h3 class="box-heading simple" style="font-size: large;"><span
                                                    class="pull-right" style="color: #ff5656;">0%</span><i
                                                    class="fa fa-line-chart"></i> Chiết khấu hiện tại</h3>
                                            <div class="box-body">
                                                <div class="progress">
                                                    <div id="progress" class="progress-bar bg-success"
                                                        role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                        aria-valuemax="100"> </div>
                                                </div>
                                            </div>
                                            <p></p>
                                            <p>
                                                Tổng giao dịch của bạn: <span class="bigger">0$</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="span9">
                                        <div class="global summary">
                                            <h3 style="font-size: large;"><i class="fa fa-user"></i> Thông tin tài khoản
                                                <span style="color: rgb(253, 65, 65);font-size:small;">(Chưa xác
                                                    thực)</span>
                                            </h3>
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>Số tài khoản:</td>
                                                        <td>12907…</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tên ngân hàng:</td>
                                                        <td>VPBank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Số điện thoại:</td>
                                                        <td>0772…</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h3 style="font-size: large;"><i class="fa fa-exchange"></i> Giao dịch hoàn
                                                thành</h3>
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td>Số giao dịch</td>
                                                        <td><span>6</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Giao dịch hoàn thành</td>
                                                        <td><span
                                                                onclick="if (!window.__cfRLUnblockHandlers) return false; getphone()"
                                                                class="sweezy-custom-cursor-hover"
                                                                style="cursor:pointer;color:rgb(255, 140, 140);cursor: url(&quot;data:image/png;base64,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&quot;) 8 2, pointer !important;">Xem
                                                                All&gt; </span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <input type="text" id="xid" style="display:none;" value="JPR6338">
                        <input type="text" id="discount" style="display:none;" value="0.0">
                        <input type="text" id="type" style="display:none;" value="1">
                        <input type="text" id="fromaccount" style="display:none;" value="None">
                        <input type="text" id="frombank" style="display:none;" value="USDT">
                        <input type="text" id="fromamount" style="display:none;" value="11.0">
                        <input type="text" id="fromname" style="display:none;" value="TRC20">
                        <input type="text" id="bankcode" style="display:none;" value="970432">
                        <input type="text" id="toaccount" style="display:none;" value="129076828">
                        <input type="text" id="tobank" style="display:none;" value="VPBank">
                        <input type="text" id="toamount" style="display:none;" value="285285.0">
                        <input type="text" id="memo" style="display:none;" value="ATPMJPR6338">
                        <input type="text" id="status" style="display:none;" value="0">
                        <input type="text" id="batch" style="display:none;" value="None">
                        <input type="text" id="noti" style="display:none;" value="None">
                        <input type="hidden" id="ph" style="display:none;" value="2250">
                        <input type="text" id="recall" style="display:none;" value="0">
                        <input type="text" id="evnumber" style="display:none;" value="None">
                        <input type="text" id="evactive" style="display:none;" value="None">
                        <input type="text" id="comment" style="display:none;" value="None">
                        <input type="text" id="bankcodexid" style="display:none;" value="USDT">
                        <input type="text" id="verify" style="display:none;" value="0">
                    </div>
                    <div id="xmsdt" title="Số điện thoại của bạn!" style="display:none;color:#de4444;">
                        <input style="margin-left:30px; " type="text" id="ipsdt"
                            placeholder="Nhập sđt của bạn...">
                        <p id="showinfosdt"><span class="ui-icon ui-icon-alert"
                                style="float:left; margin:12px 12px 20px 0;"></span>Hãy nhập số điện thoại của bạn từng
                            giao dịch với hệ thống. <br> Sau đó click "Tiếp tục"!</p>
                    </div>

                    <div class="header">Đánh giá của bạn:</div>
                    <div class="content">
                        <div class="rating-content" id="rating" style="display: none;">
                            <div class="panel-body">
                                <form class="form-inline testimonialForm" method="POST" action="">
                                    <input type="hidden" name="csrfmiddlewaretoken"
                                        value="qKFpX6LCC6h867CGBTAtPO0zpbRyYzetKB2apTqcUz5v6fIael8bPeCyVU2gCkgP">
                                    <div class="form-group" id="rating-ability-wrapper">
                                        <label class="control-label" for="rating">
                                            <span class="field-label-info"></span>
                                            <input type="hidden" id="selected_rating" name="selected_rating"
                                                value="" required="required">
                                        </label>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1"
                                            id="rating-star-1" style="padding:2px;">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2"
                                            id="rating-star-2" style="padding:2px;">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3"
                                            id="rating-star-3" style="padding:2px;">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4"
                                            id="rating-star-4" style="padding:2px;">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5"
                                            id="rating-star-5" style="padding:2px;">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <textarea name="content" rows="3" placeholder="Bạn đánh giá thế nào về dịch vụ của chúng tôi?"
                                        onclick="if (!window.__cfRLUnblockHandlers) return false; placeholder=''"></textarea>
                                    <button type="submit" class="btn btn-success"
                                        style="margin:3px;padding:2px;">Gửi</button>
                                </form>
                                <small>* Bạn có thể đánh giá chất lượng dịch vụ chúng tôi trên diễn đàn
                                    <strong>MMO4ME</strong> <a href="https://mmo4me.com/threads/autopaypm.266584/"
                                        target="_blank"><strong>Tại đây</strong></a>. Xin cảm ơn!</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
