
(function($) {
 "use strict";



//	Responsive Tabs v1.0, Copyright 2014, Joe Mottershaw, https://github.com/joemottershaw/
//	=======================================================================================

function jQueryTabs(){$(".tabs").each(function(){$(".tabs-panel").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel").show()})}$(document).ready(function(){jQueryTabs(),$(".tabs li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs()});


function jQueryTabs2(){$(".tabs2").each(function(){$(".tabs-panel2").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel2").show()})}$(document).ready(function(){jQueryTabs2(),$(".tabs2 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title2").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs2()});

function jQueryTabs3(){$(".tabs3").each(function(){$(".tabs-panel3").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel3").show()})}$(document).ready(function(){jQueryTabs3(),$(".tabs3 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title3").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs3()});


function jQueryTabs4(){$(".tabs4").each(function(){$(".tabs-panel4").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel4").show()})}$(document).ready(function(){jQueryTabs4(),$(".tabs4 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title4").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs4()});


function jQueryTabs5(){$(".tabs5").each(function(){$(".tabs-panel5").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel5").show()})}$(document).ready(function(){jQueryTabs5(),$(".tabs5 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title5").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs5()});


function jQueryTabs6(){$(".tabs6").each(function(){$(".tabs-panel6").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel6").show()})}$(document).ready(function(){jQueryTabs6(),$(".tabs6 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title6").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs6()});


function jQueryTabs7(){$(".tabs7").each(function(){$(".tabs-panel7").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel7").show()})}$(document).ready(function(){jQueryTabs7(),$(".tabs7 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title7").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs7()});


function jQueryTabs8(){$(".tabs8").each(function(){$(".tabs-panel8").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel8").show()})}$(document).ready(function(){jQueryTabs8(),$(".tabs8 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title8").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs8()});


function jQueryTabs9(){$(".tabs9").each(function(){$(".tabs-panel9").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel9").show()})}$(document).ready(function(){jQueryTabs9(),$(".tabs9 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title9").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs9()});

function jQueryTabs10(){$(".tabs10").each(function(){$(".tabs-panel10").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel10").show()})}$(document).ready(function(){jQueryTabs10(),$(".tabs10 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title9").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs10()});

function jQueryTabs11(){$(".tabs11").each(function(){$(".tabs-panel11").not(":first").hide(),$("li",this).removeClass("active"),$("li:first-child",this).addClass("active"),$(".tabs-panel:first-child").show(),$("li",this).click(function(t){var i=$("a",this).attr("href");$(this).siblings().removeClass("active"),$(this).addClass("active"),$(i).siblings().hide(),$(i).fadeIn(400),t.preventDefault()}),$(window).width()<100&&$(".tabs-panel11").show()})}$(document).ready(function(){jQueryTabs11(),$(".tabs11 li a").each(function(){var t=$(this).attr("href"),i=$(this).html();$(t+" .tab-title11").prepend("<p><strong>"+i+"</strong></p>")})}),$(window).resize(function(){jQueryTabs11()});



})(jQuery);