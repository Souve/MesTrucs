jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();

$(function($){

	if($(window).width() <= 750)
  {
    var cop = $("#bottom"); $("#bottom").remove();
    $("#bot").append(cop);
  }

	// Boutton
    $('#print').click(function(event){
    	event.preventDefault();
    	$("#oli").hide();$("#gch").prepend("<div id=\"oli\"><br>OLIVIER FINANCES</div>");
    	$("#oli").css({textAlign: "center",textDecoration: "underline",fontSize: "2.5em"});$('#gch').jqprint({ operaSupport: true });
    	$("#oli").hide();
    });
});
