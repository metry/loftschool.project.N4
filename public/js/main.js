$( document ).ready(function() {
    $(".addToCart").on( "click", function() {
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            dataType: 'json',
            success: function(data){
                if (data.result == 'true') {
                    $("#modal_content").html("Спасибо! Ваш заказ принят! Номер заказа: " + data.id +". Более подробную информацию о заказе Вы можете посмотреть в разделе \"Мои Заказы\"");
                    $("#modal").show();
                    var orderCountBlock = $(".payment-basket__status__basket-value");
                    orderCountBlock.html(parseInt(orderCountBlock.text()) + 1);
                }
            }
        });
        return false;
    });

    $("#modal_close").on( "click", function() {
        $("#modal_content").html("");
        $("#modal").hide();
    });
});