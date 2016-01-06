jQuery(document).ready(function () {

  //  $('#confirm_password').attr('data-validation','[V==password]');
      
        
    function a(a) {
        $(a.target).prev(".panel-heading").find("i.indicator").toggleClass("glyphicon-chevron-down glyphicon-chevron-up");
    }
    $("#accordion").on("hidden.bs.collapse", a);
    $("#accordion").on("shown.bs.collapse", a);
    toggleFields();
    $(".singleField.company,.voucherQuantity").change(function () {
        toggleFields();
    });
//    jQuery("#alreadyUserForm").validationEngine("attach", {
//        promptPosition: "topLeft",
//        validationEventTrigger: "submit",
//        validateNonVisibleFields: true,
//        updatePromptsPosition: true
//    });
//    jQuery("#notUserForm").validationEngine("attach", {
//        promptPosition: "topLeft",
//        validationEventTrigger: "submit",
//        validateNonVisibleFields: true,
//        updatePromptsPosition: true
//    });

    $(".voucherSection input.voucherRadio").change(function () {

        var vtitle = $(this).parents('.panel').find('a').text();
        $('.v_title').text(vtitle);
        $(".PreviewList").removeClass("hidden");
        $('.valuePriceHide').removeClass('hidden');
        if (!$(this).parents('.voucherLeft').find('.v_price span').hasClass('price_tax')) {

            $('.valuePriceHide').addClass('hidden');
        }


    });

    $(".voucherSection select.voucherQuantity").click(function () {
        $(this).prev('input.voucherRadio').trigger('click');

    });

    $(".voucherSection input.voucherRadio").each(function () {
        if (this.checked) {
            var vtitle = $(this).parents('.panel').find('a').text();
            $('.v_title').text(vtitle);
            $(".PreviewList").removeClass("hidden");
            $('.valuePriceHide').removeClass('hidden');
            if (!$(this).parents('.voucherLeft').find('.v_price span').hasClass('price_tax')) {
                $('.valuePriceHide').addClass('hidden');
            }
        }

    });


    // $('#notUserForm').validate();

    $(document).on('click', '.voucherSection a#p_vorschau', function () {

        var cl = '.voucherListSection';

        if (!$(cl + ' input[name="tx_voucher_voucher[voucherForm][voucherTemplate]"]:checked').val()) {
            $(cl + ' .voucherRadio').addClass('errorDiv');
        } else {
            $(cl + ' .voucherRadio').removeClass('errorDiv');
        }

        $(cl + ' .voucherPrice').each(function () {
            if (!$(this).val() && $(this).parents('.voucherLeft').find('input.voucherRadio').is(':checked')) {
                $('.p_price').addClass('errorDiv');
                $('.p_price').removeClass('hidden');
                return false;
            } else {
                $('.p_price').removeClass('errorDiv');
                $('.p_price').addClass('hidden');
            }
            //if($(cl+' input[name="tx_voucher_voucher[voucherForm][voucherTemplate]"]:checked').val() && $(cl+' .voucherPrice').val() ){

            if ($(this).val() && $(this).parents('.voucherLeft').find('input.voucherRadio').is(':checked')) {

                var v = $(cl + ' input[name="tx_voucher_voucher[voucherForm][voucherTemplate]"]:checked').val();
                var m = $('#message').val();
                var m = encodeURIComponent(m);
              
                var url = $('.currentUrl').text();
                //var price	= $(cl+' input[name="tx_voucher_voucher[voucherForm][price_hide]"]:checked').val();
                //var cost    = $(cl+' .voucherPrice').val();
                //var cost = $(this).parents('.voucherLeft').find('input.voucherPrice').val();
                var cost = $(this).parents('.voucherLeft').find('.v_price .price_tax').text();
                if (cost == '')
                {
                    var p = $(this).parents('.voucherLeft').find('.voucherPrice').val();
                     var t = $(this).parents('.voucherLeft').find('.taxx').text();
                    var cost = parseInt(p) * parseInt(t) / 100;

                    var cost = Number(p);
                    var rounded = cost.toFixed(2);

                    var cost = rounded.toString().replace(/\./g, ',');

                }
                if ($('input[name="tx_voucher_voucher[voucherForm][price_hide]"]:checked').val()) {
                    var _href = url + '?tx_voucher_voucher%5Baction%5D=show&tx_voucher_voucher%5Bcontroller%5D=Voucher&v=' + v + '&m=' + m + '&price=' + cost + '&p=1&type=455';
                } else {
                    var _href = url + '?tx_voucher_voucher%5Baction%5D=show&tx_voucher_voucher%5Bcontroller%5D=Voucher&v=' + v + '&m=' + m + '&price=' + cost + '&p=0&type=455';
                }

                $.fancybox({
                    'href': _href,
                    'width': 567,
                    'height': 717,
                    'autoScale': true,
                    'transitionIn': 'elastic',
                    'transitionOut': 'elastic',
                    'type': 'iframe',
                    'cache': false,
                    'padding': 0,
                    preload: true

                });
            }
        });
    });



    $('.orderType input[type="checkbox"]').on('change', function () {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });

    $('.voucherFormPayment .payment_btn ').click(function () {

        if ($('input[name="tx_voucher_voucher[voucherForm][policy]"]:checked').val()) {
            $(".voucherPolicy").removeClass("errorDiv");
        }
        else {
            if (!$('.policy').is(":checked")) {
                $(".voucherPolicy").addClass("errorDiv");
                return false;
            }
            else {
                $(".voucherPolicy").removeClass("errorDiv");
            }
        }

    });



    $(".voucherForm .submit").click(function () {
        if ($(".order-select").is(":checked") && $(".paymentType").is(":checked") && $(".voucherRadio").is(":checked")) {
            // $(".voucherPolicy").removeClass("errorDiv");
            $(".orderType").removeClass("errorDiv");
            $(".mainpaymentType").removeClass("errorDiv");
            $(".title").removeClass("errorDiv");
            var a = checkCustomPrice1();
            if (0 == a)
                return false;
            else
                return true;
        } else {
            $(".voucherSection input.voucherRadio").each(function () {
                if (this.checked) {
                    var a = $(this).attr("id");
                    var b = "#" + a;
                    if (!$(b + " .voucherPrice").val()) {
                        $(".p_price").addClass("errorDiv");
                        $(".p_price").removeClass("hidden");
                    } else {
                        $(".p_price").removeClass("errorDiv");
                        $(".p_price").addClass("hidden");
                    }
                }
            });
            if (!$('input[name="tx_voucher_voucher[voucherForm][policy]"]:checked').val())
                $(".voucherPolicy").addClass("errorDiv");
            else
                $(".voucherPolicy").removeClass("errorDiv");
            if (!$(".order-select").is(":checked"))
                $(".orderType").addClass("errorDiv");
            else
                $(".orderType").removeClass("errorDiv");
            if (!$(".paymentType").is(":checked"))
                $(".mainpaymentType").addClass("errorDiv");
            else
                $(".mainpaymentType").removeClass("errorDiv");
            if (!$(".voucherRadio").is(":checked"))
                $(".title").addClass("errorDiv");
            else
                $(".title").removeClass("errorDiv");
            return false;
        }
    });

    $("input.voucherRadio").click(function () {
        $("input.voucherRadio").each(function () {
            if ($(this).is(":checked")) {

                //$(this).next().val("1");
                $(".title").removeClass("errorDiv");
            } else {

                $(this).next().val("0");
            }
        });

    });

    $("a.logout").on('click', function () {
        var final_url = $('.currentUrl').text();
        final_url = final_url.slice(0,-1)
        var url = final_url + '?logout=1';

        $.ajax({
            url: url,
            async: true,
            success: function (data) {
                 
               // window.location.assign(final_url);
               window.location.href = final_url;
                //window.location.reload();
            },
        })

    });
});
function toggleFields() {
    if ("" != $(".singleField .company").val())
        $(".singleField.invoice").show();
    else
        $(".singleField.invoice").hide();
    $(".singleField.invoice").attr("checked", false);
    if ($(".voucherRadio").prop("checked"))
        $("a.vorschau").show();
    else
        $("a.vorschau").hide();
    if ($("div.voucherRadio input:radio:checked").length > 0)
        $("a.vorschau").show();
    else
        $("a.vorschau").hide();
    return false;
}
function urlParam(a) {
    var b = new RegExp("[\\?&]" + a + "=([^&#]*)").exec(window.location.href);
    if (null == b)
        return "0";
    else
        return "1";
}
function checkBoxLength(a, b, c) {
    var d = document.getElementById(a).value.length;
    if (d > b) {
        scrollTop = document.getElementById(a).scrollTop;
        selectionStart = document.getElementById(a).selectionStart;
        document.getElementById(a).value = document.getElementById(a).value.substring(0, b);
        document.getElementById(a).scrollTop = scrollTop;
        document.getElementById(a).selectionStart = selectionStart;
        document.getElementById(a).selectionEnd = selectionStart;
        stillavailable = 0;
    } else
        stillavailable = b - d;
    document.getElementById(c).innerHTML = stillavailable;
}
function checkCustomPrice() {
    var a = $(".voucherRadio :radio:checked").attr("id");
    if (a)
        if (!$(".voucherPrice").val()) {
            $(".cusErrorDiv").addClass("errorDiv");
            $(".cusErrorDiv").text("In Preis für Custom-Gutschein");
            return 0;
        } else {
            var b = $(".voucherPrice").val();
            if (isNaN(b)) {
                $(".cusErrorDiv").addClass("errorDiv");
                $(".cusErrorDiv").text("Geben numerischen Wert für Preis");
                return 0;
            } else {
                $(".cusErrorDiv").text("");
                $(".cusErrorDiv").removeClass("errorDiv");
                return 1;
            }
        }
}
function checkCustomPrice1() {
    $(".voucherSection input.voucherRadio").each(function () {
        if (this.checked) {
            var a = $(this).attr("id");
            var b = "#" + a;
            if (!$(b + " .voucherPrice").val()) {
                $(".p_price").addClass("errorDiv");
                $(".p_price").removeClass("hidden");
            } else {
                $(".p_price").removeClass("errorDiv");
                $(".p_price").addClass("hidden");
            }
        }
    });
    if ($(".p_price").hasClass("errorDiv"))
        return 0;
    else
        return 1;
}
