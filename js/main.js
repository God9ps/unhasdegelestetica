(function (window, $) {
	'use strict';

	// Cache document for fast access.
	var document = window.document;


	function mainSlider() {
		$('.bxslider').bxSlider({
			pagerCustom: '#bx-pager',
			mode: 'fade',
			nextText: '',
			prevText: ''
		});
	}

	mainSlider();



	var $links = $(".bx-wrapper .bx-controls-direction a, #bx-pager a");
	$links.click(function(){
	   $(".slider-caption").removeClass('animated fadeInLeft');
	   $(".slider-caption").addClass('animated fadeInLeft');
	});

	$(".bx-controls").addClass('container');
	$(".bx-next").addClass('fa fa-angle-right');
	$(".bx-prev").addClass('fa fa-angle-left');


	$('a.toggle-menu').click(function(){
        $('.responsive .main-menu').toggle();
        return false;
    });

    $('.responsive .main-menu a').click(function(){
        $('.responsive .main-menu').hide();

    });

    $('.main-menu').singlePageNav();
	
//	var dt = window.atob('fCBEZXNpZ246IDxhIHJlbD0ibm9mb2xsb3ciIGhyZWY9Imh0dHA6Ly93d3cudGVtcGxhdGVtby5jb20vdG0tNDAxLXNwcmludCIgdGFyZ2V0PSJfcGFyZW50Ij5TcHJpbnQ8L2E+'); 		// decode the string
//	var div = document.getElementById('copyright');

//	div.innerHTML += dt;


})(window, jQuery);
$(document).ready(function () {
    var myLatLng = {lat: 38.7540737, lng: -9.2007000	};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map
    });


    $(function () {
        $.ajaxSetup({
            type: "POST",

			/*"../trata.php"*/
            url: "plugins/mail.php",
            dataType: "json",
            cache: "false",
            error: function (jqXHR, exception) {
                if (jqXHR.status === 0) {
                    console.log('No connecting.\n Verify Network.');
                } else if (jqXHR.status == 400) {
                    console.log('Bad Request. [400]');
                } else if (jqXHR.status == 404) {
                    console.log('Requested page not found. [404]');
                } else if (jqXHR.status == 500) {
                    console.log('Internal Server Error [500].');
                } else if (exception === 'parsererror') {
                    console.log(jqXHR.responseText);
                    console.log('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    console.log('Time out error.');
                } else if (exception === 'abort') {
                    console.log('Ajax request aborted.');
                } else {
                    console.log('Uncaught Error: ' + jqXHR.responseText);
                }
            }
        });
    });


    $("#sendmail").submit(function () {
        var dados = $(this).serialize() + "&acao=sendmail";

        $.ajax({
            data: dados,
            success: function (data) {

                if (data.status) {
                    swal("Obrigado!", "A nossa resposta será tão breve quanto possível.", "success")
                } else {
                    swal("Ooops!", data.status + "!", "error")
                }
            }
        });
        return false;
    });

});


/*function initialize() {
    var mapOptions = {
      zoom: 14,
      center: new google.maps.LatLng(37.769725, -122.462154)
    };
    map = new google.maps.Map(document.getElementById('map'),  mapOptions);
}*/

// load google map
/*
var script = document.createElement('script');
    script.type = 'text/javascript';

    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA';
    document.body.appendChild(script);*/
