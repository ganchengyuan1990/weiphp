
/*document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
    WeixinJSBridge.call('hideToolbar');
});*/
$('#bind_card').click(function() {
    window.location.href = "{:addons_url('Card://Wap/bindCard')}";
});


function zoomCard() {
    $('.zoom_card_container').show();
    $('.zoom_card').addClass('zoom_card_do');
    $('.zoom_card_back').addClass('zoom_card_back_do');
}

function closeZoomCard() {
    $('.zoom_card').removeClass('zoom_card_do').removeClass('turn_card');
    $('.zoom_card_back').removeClass('turn_card_back').removeClass('zoom_card_back_do');
    $('.zoom_card_front_container').css('z-index', '10002');
    $('.zoom_card_back_container').css('z-index', '10001');
    $('.zoom_card_container').fadeOut();

}

function turnCard() {
    $('.zoom_card').addClass('turn_card');
    $('.zoom_card_back').addClass('turn_card_back');
    $('.zoom_card_front_container').css('z-index', '10001');
    $('.zoom_card_back_container').css('z-index', '10002');
}

function turnBackCard() {
    $('.zoom_card').removeClass('turn_card');
    $('.zoom_card_back').removeClass('turn_card_back');
    $('.zoom_card_front_container').css('z-index', '10002');
    $('.zoom_card_back_container').css('z-index', '10001');
}

function submitPay() {
    var shop = $('select[name="branch_id"]').val();
    var type = $('select[name="pay_type"]').val();
    var coupon = $('select[name="coupon_id"]').val();
    var price = $('input[name="price"]').val();
    var password = $('input[name="password"]').val();
    if (type == 0) {
        $.Dialog.fail('请选择支付类型');
        return;
    }
    if (price == "") {
        $.Dialog.fail('请填写消费金额');
        return;
    }
    if (password == "") {
        $.Dialog.fail('请填写密码');
        return;
    }
    $.Dialog.loading('支付中...');
    $.post('{:U("do_buy")}', $('form').serializeArray(), function(data) {
        if (data.status == 1) {
            $.Dialog.success(data.info);
            setTimeout(function() {
                $('.pay_dialog').hide();
                window.location.reload();
            }, 1500)
        } else {
            $.Dialog.fail(data.info);
        }
    });
}