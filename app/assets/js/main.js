 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

(function($) {

	"use strict";

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};


	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});
	
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 3
				},
				1000:{
					items: 3
				}
			}
		});

		$('.carousel-komentari').owlCarousel({
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 1
				},
				1000:{
					items: 1
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	
	var counter = function() {
		
		$('#section-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });



	var goHere = function() {

		$('.mouse-icon').on('click', function(event){
			
			event.preventDefault();

			$('html,body').animate({
				scrollTop: $('.goto-here').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});
	};
	goHere();


	function makeTimer() {

		let datumKraja=$('#datum_kraja').val();



		var endTime = new Date(datumKraja);
		endTime = (Date.parse(endTime) / 1000);

		var now = new Date();
		now = (Date.parse(now) / 1000);

		var timeLeft = endTime - now;

		var days = Math.floor(timeLeft / 86400); 
		var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
		var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
		var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

		if (hours < "10") { hours = "0" + hours; }
		if (minutes < "10") { minutes = "0" + minutes; }
		if (seconds < "10") { seconds = "0" + seconds; }

		$("#days").html(days + "<span>Dana</span>");
		$("#hours").html(hours + "<span>Sati</span>");
		$("#minutes").html(minutes + "<span>Minuta</span>");
		$("#seconds").html(seconds + "<span>Sekunde</span>");

}

setInterval(function() { makeTimer(); }, 1000);



})(jQuery);

$(document).ready(function () {

});

//F=Local storage Fje
function numberOfOrders(data)
{
 	var brKolicina=0;
	brKolicina=data.length;
	return brKolicina;
}
function totalPrice(data) {
	let ukupnaCena=0;
	data.forEach(function (element) {
		ukupnaCena=ukupnaCena+(element.cenaP*element.kolicinaP);
	})
	return ukupnaCena;
}

function ordersIn()
{
 return JSON.parse(localStorage.getItem("korpa"));
}

function addToOrder(idProzivoda,nazivP,putanjaSlike,opisProizvoda,cena,kolicina=null)
{
	var idProizovda=idProzivoda;
	var naziv=nazivP;
	var putanja=putanjaSlike;
	var opis=opisProizvoda;
	var cenaP=cena;
	var kolicinaP=kolicina;

	var order=ordersIn();
	if(order)
	{
		addToLocal(idProizovda,naziv,putanja,opis,cenaP,kolicinaP);
	}
	else
	{
		makeFirstOrder(idProizovda,naziv,putanja,opis,cenaP,kolicinaP);
	}

	function addToLocal(idProizovda,naziv,putanja,opis,cenaP,kolicinaP)
	{
		let orders=ordersIn();
		let orderJson=
			{
				"idProizovda":idProizovda,
				"naziv":naziv,
				"putanja":putanja,
				"opis":opis,
				"cenaP":cenaP,
				"kolicinaP":kolicinaP
			}
		orders.push(orderJson);
		localStorage.setItem("korpa",JSON.stringify(orders));
	}

	function makeFirstOrder(idProizovda,naziv,putanja,opis,cenaP,kolicinaP)
	{
		let orders=[];
		orders[0]=
		{
			"idProizovda":idProizovda,
			"naziv":naziv,
			"putanja":putanja,
			"opis":opis,
			"cenaP":cenaP,
			"kolicinaP":kolicinaP
		};
		localStorage.setItem("korpa",JSON.stringify(orders));
	}

}
 function deleteOrder(idProizvoda,element)
 {
	 var narudzbe=ordersIn();
	 var rezultat=narudzbe.filter(function(elem){
		 if(elem.idProizovda!=idProizvoda)
		 {
			 return elem;
		 }
	 });
	 element.css('display','none');
	 localStorage.setItem("korpa",JSON.stringify(rezultat));

	 if(rezultat.length==0)
	 {
		 location.reload();
		 deleteCart();
	 }
	 return true;
 }
 function updateOrder(data,novaKolicina,idP)
 {
	 var rez=data.filter(function(elem){

		 if(elem.idProizovda==idP)
		 {
			 elem.kolicinaP=Number(novaKolicina);
		 }
		 return elem;
	 })

	 localStorage.setItem("korpa",JSON.stringify(rez));
 }
 function deleteCart()
 {
	 localStorage.removeItem("korpa");
 }








 var narudzbe=ordersIn();

 if(narudzbe!=null && narudzbe.length>0)
 {
	 var brojNaru=numberOfOrders(narudzbe);
	 $("#brojnarud").html(`<span class="icon-shopping_cart"></span>[${brojNaru}]`);

 }
 else
 {
	 $("#brojnarud").html(`<span class="icon-shopping_cart"></span>[0]`);
 }


 //Ukupno za placanje na korpa i placanje
 function ukupnoZaPlacanje(data) {
	 let Ukupno=totalPrice(data);
	 let ispisUkupno=`
        <span>Ukupno cena proizvoda</span>
        <span>${Ukupno} DIN</span>
    `;
	 $("#ukupnaCena").html(ispisUkupno);

	 //Dostava
	 let dostava=0;
	 if(Ukupno<1000)
	 {
		 dostava=200;
	 }

	 let ispisDostava=`
        <span>Dostava</span>
        <span>${dostava} DIN</span>
    `;
	 $("#ukupnoDostava").html(ispisDostava);

	 let ukupnaKrajCena=Ukupno+dostava;
	 let ispisKrajUkupno=`
        <span>Ukupno</span>
        <span>${ukupnaKrajCena} DIN</span>
    `;
	 $("#ukupnaKrajCena").html(ispisKrajUkupno);



 }





