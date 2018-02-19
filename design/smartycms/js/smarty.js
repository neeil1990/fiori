$(function() {
    $(".prodblockslick").slick({
        infinite: !0,
        arrows: !0,
        dots: !1,
        draggable: !1,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
            breakpoint: 1341,
            settings: {
                arrows: !1,
                dots: !0
            }
        }, {
            breakpoint: 881,
            settings: {
                arrows: !1,
                slidesToShow: 2,
                slidesToScroll: 2,
                dots: !0
            }
        }, {
            breakpoint: 551,
            settings: {
                arrows: !1,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: !0,
                dots: !0
            }
        }]
    }), $(".lastcom").slick({
        infinite: !0,
        arrows: !0,
        dots: !1,
        centerMode: !0,
        centerPadding: "0px",
        slidesToShow: 3,
        slidesToScroll: 1,
        swipeToSlide: !0,
        adaptiveHeight: !0,
        responsive: [{
            breakpoint: 1341,
            settings: {
                arrows: !1,
                dots: !0
            }
        }, {
            breakpoint: 881,
            settings: {
                arrows: !1,
                slidesToShow: 2,
                centerMode: !1,
                dots: !0
            }
        }, {
            breakpoint: 481,
            settings: {
                arrows: !1,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: !0,
                dots: !0
            }
        }]
    }), $(".advant").slick({
        infinite: !0,
        arrows: !1,
        dots: !1,
        swipeToSlide: !0,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [{
            breakpoint: 881,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: !0
            }
        }, {
            breakpoint: 481,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                adaptiveHeight: !0,
                arrows: !0
            }
        }, {
            breakpoint: 426,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                adaptiveHeight: !0,
                arrows: !1
            }
        }, {
            breakpoint: 321,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                adaptiveHeight: !0,
                arrows: !1
            }
        }]
    }), $(".sliderslick").slick({
        infinite: !0,
        arrows: !0,
        dots: !1,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1024,
            settings: {
                arrows: !1,
                dots: !0
            }
        }]
    }), $(".leftbanner").slick({
        infinite: !0,
        arrows: !1,
        dots: !0,
        adaptiveHeight: !0,
        slidesToShow: 1,
        slidesToScroll: 1
    })
}), $(document).ready(function() {
    $(".nav>.navone").hover(function() {
        $(this).find(">div").fadeIn(0);
    },function(){
        $(this).find(">div").fadeOut(0);
    }), $(".product_iteam_slick").hover(function() {
        $(this).find(".formpanel").slideToggle(130)
    }), $(".podnavtwo>.navtwo").hover(function() {
        $(this).find(">div").fadeToggle(130)
    }), $("ul.nav1s li").hover(function() {
        $(this).toggleClass("active")
    }), $("span.opencartmodal").hover(function() {
        $(this).toggleClass("act")
    }), $(".navone").hover(function() {
        $(this).toggleClass("active")
    }), $("select.ipselect").hover(function() {
        $(this).toggleClass("active")
    }), $(".navtwo").hover(function() {
        $(this).toggleClass("active")
    }), $(".bluron").click(function() {
        $(".blurs").addClass("blur"), $("body").addClass("hid")
    }),$(".city").click(function() {
         $("body").addClass("hid")
    }), $(".bluroff").click(function() {
        $(".blurs").removeClass("blur"), $("body").removeClass("hid")
    }), $(".mylist_add").click(function() {
        $(this).addClass("active")
    }), $("li.catprod").hover(function() {
        $(this).find(".ipdescr").slideToggle(130)
    }), $("li.catprod").hover(function() {
        $(this).toggleClass("active")
    }), jQuery(function(a) {
        a.mask.definitions["~"] = "[+-]", a("#phone").mask("+7 (999) 999-99-99"), a("#phone2").mask("+7 (999) 999-99-99"), a("#phonecart").mask("+7 (999) 999-99-99"), a(".regphone").mask("+7 (999) 999-99-99"), a("#oneclickphone").mask("+7 (999) 999-99-99")
    }), $("ul.tabs").jTabs({
        content: ".tabs_content",
        animate: !0
    }), $("ul.modallogin").jTabs({
        content: ".modallogin_content",
        animate: !0
    }), $(".input_search").autocomplete({
        serviceUrl: "ajax/search_products.php",
        minChars: 1,
        noCache: !1,
        onSelect: function(a) {
            $(".input_search").closest("form").submit()
        },
        formatResult: function(a, b) {
            var c = new RegExp("(\\" + ["/", ".", "*", "+", "?", "|", "(", ")", "[", "]", "{", "}", "\\"].join("|\\") + ")", "g"),
                d = "(" + b.replace(c, "\\$1") + ")";
            return (a.data.image ? "<img align=absmiddle src='" + a.data.image + "'> " : "") + a.value.replace(new RegExp(d, "gi"), "<strong>$1</strong>")
        }
    }), $(".input_search_city").autocomplete({
        serviceUrl: "ajax/search_city.php",
        minChars: 1,
        noCache: !1,
        onSelect: function(a) {
            window.location.href="http://" + a.link +"?city=1";
        },
        formatResult: function(a, b) {
            var c = new RegExp("(\\" + ["/", ".", "*", "+", "?", "|", "(", ")", "[", "]", "{", "}", "\\"].join("|\\") + ")", "g"),
                d = "(" + b.replace(c, "\\$1") + ")";
            return a.value.replace(new RegExp(d, "gi"), "<strong>$1</strong>")
        }
    }), $(function() {
        document.getElementById("feedback-form").onsubmit = function() {
            var a = new XMLHttpRequest;
            return a.open("POST", "/contacts.php", !0), a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), a.send("nameFF=" + this.nameFF.value + "&phoneFF=" + this.phoneFF.value), a.onreadystatechange = function() {
                4 == a.readyState && 200 == a.status && ($(".cback").fadeOut(300), setTimeout('$(".send").fadeIn(300)', 300), setTimeout('$(".send").fadeOut(300)', 3500), setTimeout('$(".blurs").removeClass("blur")', 3500))
            }, a.onerror = function() {
                alert("��������, ������ �� ���� ��������")
            }, !1
        }
    }), $(function() {
        document.getElementById("vopros-form").onsubmit = function() {
            var a = new XMLHttpRequest;
            return a.open("POST", "/contacts-vopros.php", !0), a.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), a.send("nameFF=" + this.nameFF.value + "&phoneFF=" + this.phoneFF.value + "&mailFF=" + this.mailFF.value + "&messageFF=" + this.messageFF.value), a.onreadystatechange = function() {
                4 == a.readyState && 200 == a.status && ($(".vopros").fadeOut(300), setTimeout('$(".send").fadeIn(300)', 300), setTimeout('$(".send").fadeOut(300)', 3500), setTimeout('$(".blurs").removeClass("blur")', 3500))
            }, a.onerror = function() {
                alert("��������, ������ �� ���� ��������")
            }, !1
        }
    }), $("select.ajaxselect").change(function() {
        return price = $(this).find("option:selected").data("price"), compare_price = "", proc = "", compare_price2 = parseInt($(this).find("option:selected").data("compareprice2"), 10), "string" == typeof $(this).find("option:selected").data("compare_price") && (compare_price = $(this).find("option:selected").data("compare_price")), $(this).find("option:selected").data("compare_price"), "string" == typeof $(this).find("option:selected").data("proc") && (proc = $(this).find("option:selected").data("proc")), $(this).find("option:selected").data("proc"), $(this).closest(".jsprod").find(".prc-new").html(price), compare_price2 > 0 ? ($(this).closest(".jsprod").find(".prc-old").html(compare_price), $(this).closest(".jsprod").find(".prc-old").fadeIn(), $(this).closest(".jsprod").find(".cproc").html(proc), $(this).closest(".jsprod").find(".cproc").show(300)) : ($(this).closest(".jsprod").find(".prc-old").fadeOut(), $(this).closest(".jsprod").find(".cproc").hide(300)), !1
    }), $(function() {
        $(".order_form").submit(function(a) {
            a.preventDefault();
            var b = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "ajax/order.php",
                data: b,
                success: function(a) {
                    a && ($("#ajaxorder").html(a.ourl), $(".message_error").show().html(a))
                }
            })
        })
    }), $(".variki label").live("click", function() {
        price = $(this).find("input").data("price"), compare_price = $(this).find("input").data("compareprice"), sku = $(this).find("input").data("sku"), proc = $(this).find("input").data("proc"), compare_price2 = parseInt($(this).find("input").data("compareprice2"), 10), $(this).closest(".jsprod").find(".prc-new").html(price), $(this).closest(".jsprod").find(".prc-sku").html(sku), compare_price2 > 0 ? ($(this).closest(".jsprod").find(".prc-old").html(compare_price), $(this).closest(".jsprod").find(".prc-old").fadeIn(), $(this).closest(".jsprod").find(".cproc").html(proc), $(this).closest(".jsprod").find(".cproc").show(300)) : ($(this).closest(".jsprod").find(".prc-old").fadeOut(), $(this).closest(".jsprod").find(".cproc").hide(300)), $(this).closest(".jsprod").find("input").click(function() {
            $("input").removeClass("active")
        })
    }), $("[data-tip]").addClass("tip"), $(function() {
        function b(b, c) {
            a.css({
                left: b + 15,
                top: c + 15
            })
        }
        var a = $('<div class="balloon"></div>').appendTo("body");
        $(".tip").each(function() {
            var c = $(this),
                d = c.data("tip");
            d = d.replace(/  /gi, "<br>"), c.data("tip", ""), c.hover(function(c) {
                a.html(d), b(c.pageX, c.pageY), a.show()
            }, function() {
                a.hide()
            }), c.mousemove(function(a) {
                b(a.pageX, a.pageY)
            })
        })
    }), $(".mainhidetext").readmore({
        maxHeight: 255,
        speed: 500,
        moreLink: '<a class="slink" style="margin-top: 15px;" href="#">���������</a>',
        lessLink: '<a class="slink" style="margin-top: 15px;" href="#">������</a>'
    }), $(".maxtext").readmore({
        maxHeight: 246,
        speed: 500,
        moreLink: '<a class="slink" style="margin-top: 15px;" href="#">���������</a>',
        lessLink: '<a class="slink" style="margin-top: 15px;" href="#">������</a>'
    }), $(".mail_form").submit(function(a) {
        return a.preventDefault(), $.ajax({
            type: "post",
            url: "/ajax/mail.php",
            data: {
                email: $(".onemail").val()
            },
            dataType: "json"
        }), $(".mail_form").slideUp(300), $(".sendonecloic").slideDown(300), !1
    }), $(".featured").slick({
        infinite: !0,
        arrows: !0,
        dots: !1,
        autoplay: !0,
        autoplaySpeed: 4e3,
        slidesToShow: 5,
        slidesToScroll: 3,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: !0,
                dots: !0
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    }), $(".slider-for").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: !1,
        fade: !0,
        asNavFor: ".slider-nav"
    }), $(".slider-nav").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: ".slider-for",
        dots: !1,
        swipeToSlide: !0,
        centerMode: !0,
        centerPadding: "0px",
        focusOnSelect: !0,
        responsive: [{
            breakpoint: 769,
            settings: {
                arrows: !1,
                dots: !0
            }
        }, {
            breakpoint: 721,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                centerMode: !1,
                arrows: !1,
                dots: !0
            }
        }, {
            breakpoint: 550,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: !1,
                arrows: !1,
                dots: !0
            }
        }]
    }), $(".modalclose").click(function() {
        $(this).closest(".modalitem").fadeOut(130), $(".blurs").removeClass("blur"), $("body").removeClass("hid")
    }), $(".podmenumobclose").click(function() {
        $(this).closest(".podmenumob").fadeOut(300), $(".blurs").removeClass("blur"), $("body").removeClass("hid"), $(".mobmenublock").slideUp("500")
    }), $(window).on("resize", function() {
        $(window).width() < 880 ? ($(".mmnavpage").append($("ul.nav1")), $("ul.nav1").addClass("navvr"), $("ul.nav1").removeClass("nav1"), $("a.msub").click(function() {
            return $(this).closest("li").find(">div").slideToggle(), !1
        })) : ($("ul.navvr").addClass("nav1"), $("ul.nav1").removeClass("navvr"), $(".top").append($("ul.nav1"))), $(window).width() < 768 ? ($(".appendsearch").append($("form.searchform")), $(document).ready(function(a) {})) : $(".podsearchgorm").append($("form.searchform")), $(window).width() < 600 ? $(".appendcart").append($("#cart_informer")) : $(".topcart").append($(""))
    }), $(window).resize(), $(".zenam.mob").click(function() {
        $(this).closest(".zeblock").find(">ul").slideToggle(), $(this).toggleClass("active")
    });
    var a = function() {
        $("a.navtoggle").click(function() {
            return $("html").addClass("now"), $("body").addClass("hid"), $(".podmmenucat").fadeIn(300), $(".mmenucat").animate({
                left: "0px"
            }, 300), $(".blurs").animate({
                left: "285px"
            }, 300), !1
        }), $(".podmmenucat").click(function() {
            return $("html").removeClass("now"), $("body").removeClass("hid"), $(".mmenucat").animate({
                left: "-305px"
            }, 300), $(".blurs").animate({
                left: "0px"
            }, 300), $(this).fadeOut(300), !1
        }), $(".openmenu").click(function() {
            return $("html").addClass("now"), $("body").addClass("hid"), $(".podmmenupage").fadeIn(300), $(".mmenupage").animate({
                left: "0px"
            }, 300), $(".blurs").animate({
                left: "285px"
            }, 300), !1
        }), $(".podmmenupage").click(function() {
            return $("html").removeClass("now"), $("body").removeClass("hid"), $(".mmenupage").animate({
                left: "-305px"
            }, 300), $(".blurs").animate({
                left: "0px"
            }, 300), $(this).fadeOut(300), !1
        })
    };
    $(".mmnav a").click(function() {
        $(this).toggleClass("act")
    }), $(document).ready(a), $("form.validate").submit(function(a) {
        var b = $(this).find("[required]");
        return $(b).each(function() {
            if ("" == $(this).val()) return alert("Required field should not be blank."), $(this).focus(), a.preventDefault(), !1
        }), !0
    })
});