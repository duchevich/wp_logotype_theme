 $(document).ready(function () {
	 
	//carousel
	var carousel = $("#carousel").waterwheelCarousel({
		flankingItems: 1,
		movingToCenter: function ($item) {
			$('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
		},
		movedToCenter: function ($item) {
			$('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
		},
		movingFromCenter: function ($item) {
			$('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
		},
		movedFromCenter: function ($item) {
			$('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
		},
		clickedCenter: function ($item) {
			$('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
		}
	});

	$('#prev').bind('click', function () {
		carousel.prev();
		return false
	});

	$('#next').bind('click', function () {
		carousel.next();
		return false;
	});

	$('#reload').bind('click', function () {
		newOptions = eval("(" + $('#newoptions').val() + ")");
		carousel.reload(newOptions);
		return false;
	});

	// scrolling
	$("a[href*=#]").on("click", function (e) {
	  var anchor = $(this);
	  $('html, body').stop().animate({
		scrollTop: $(anchor.attr('href')).offset().top - 50
	  }, 777);
	  e.preventDefault();
	  return false;
	});
	 
	 
	 // mask
	$("#phoneFM").mask("+38 (999) 999-9999");
	$("#phoneFMod").mask("+38 (999) 999-9999");
	 
	 // slider
	$( function() {
		var handle = $( "#custom-handle" );
		$( "#slider" ).slider({
			orientation: "horizontal",
			range: "min",
			min: 0,
			max: 100,
			value: 50,
			create: function() {
				handle.text( $( this ).slider( "value" ) + "%" );
			},
			slide: function( event, ui ) {
				handle.text( ui.value + "%" );
				
			}
			
		});
		
		$('#slider').find('.ui-slider-handle').css('width', '25px');
		$('#slider').find('.ui-slider-handle').css('height', '30px');
		$('#slider').find('.ui-slider-handle').css('background', 'url("circle.png") no-repeat');
	} );
	$( function() {
		$( "#slider-range" ).slider({
		  range: true,
		  min: 0,
		  max: 100,
		  values: [ 25, 75 ],
		  slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			console.log(ui.values[0], ui.values[1]);	  
		  }
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
		  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  	});
	
	 // slick slider
	 
	 $('.slick-box').slick({
		autoplay: true,
  		autoplaySpeed: 2000,
	 });
	 
	 // ajax
	 /*$("#form-main").submit(function() {
	 	var data = form.serialize();
        $.ajax({
	        type: 'POST',
	        url: 'send.php',
	        dataType: 'json',
	        data: data,
			 beforeSend: function(data) { // сoбытиe дo oтпрaвки
		            form.find('input[type="submit"]').attr('disabled', 'disabled'); // нaпримeр, oтключим кнoпку, чтoбы нe жaли пo 100 рaз
		          },
	        success: function(data) {
				alert("AAAAAAAAAAAAA");
                //$('.messages').html("data.result");
			}
        });
    });*/
	 
 });

