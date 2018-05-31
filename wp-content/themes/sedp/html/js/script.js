var owl;

$(document).ready(function () {
	
	//================== SLIDER_COMPETENCE
		
		function customPager() {

		    $.each(this.owl.userItems, function (i) {

		        var titleData = jQuery(this).find('img').attr('title');
		        var num = i+1;
		        var Data = "<b>" +  num + "</b>" + titleData;

		        var paginationLinks = jQuery('.owl-controls .owl-pagination .owl-page span');

		    	$(paginationLinks[i]).append(Data);

				var width = 110;
			    var countElement = 0;
				var widthElement = 0;
				var left = 0;

				var pagination = jQuery('.owl-controls .owl-pagination .owl-page');				
				countElement=$(pagination).length; 

				widthElement = width / countElement ;
				left = i * widthElement +'%';

				


				var index= 0;
				
				if($(pagination).data('clicked')){
			        if($(paginationLinks[i]).parent().hasClass('active')){index = i;}
					$(pagination[index]).css('left',left);
				}else{

				}
				$(pagination[i]).css('left',left);
 

		    });

		}

		

	    $('#slider_competence').owlCarousel({
	        navigation: true, // Show next and prev buttons
			navigationText: ["",""],
	        slideSpeed: 300,
	        paginationSpeed: 400,
			items:1,
			loop:true,
			addClassActive:true,
	        afterInit: customPager,
	        afterUpdate: customPager,
			itemsCustom:[[0,1],[640,1],[1024,1]],
	    });
	    
	$("#chevron").click(function(){
		$("#chevron").toggleClass("up");
		$(".blocfiltre .filtre").slideToggle('1000');
	});

	// $(".search_container").mouseenter(function(){
	// 	$(this).addClass("hover");
	// });
	// $(".search_container").mouseleave(function(){
	// 	$(this).removeClass("hover");
	// });
	$(".search_home").click(function(e){
		e.preventDefault();
		$(".search_container").toggleClass("hover");
	}); 


	$('a[href^="#"]').click(function(){
		var the_id = $(this).attr("href");

		$('html, body').animate({
			scrollTop:$(the_id).offset().top
		}, '1500');
		return false;
	});

	function afficher_slide(){
		$(".slider_competence .owl-item.active").prevAll().addClass( "hide" );
		$(".slider_competence .owl-item.active").prevAll().removeClass( "show" );
		$(".slider_competence .owl-item.active").removeClass( "hide" );
		$(".slider_competence .owl-item.active").nextAll().addClass( "show" );
		$(".slider_competence .owl-item.active").nextAll().removeClass( "hide" );
	}
	afficher_slide();
	$('.slider_competence .owl-controls .owl-pagination .owl-page').click(function(){afficher_slide();});
	$('.slider_competence .owl-controls .owl-buttons *').click(function(){afficher_slide();});

	
	//================== MENU_BURGER

		$("#menu_burger").click(function(){
			$("#shadow").addClass("background");
			$("#side-menu").addClass("opn");
		});

		$("#side-menu .close").click(function(){
			$("#shadow").removeClass("background");
			$("#side-menu").removeClass("opn");
		});

		$("#shadow").click(function(){
			$("#shadow").removeClass("background");
			$("#side-menu").removeClass("opn");
		});
	
	
	$(".newsletter form [type='text']").focus(function(){
		$(".newsletter form [type='submit']").css("width","45px")
	});
	$(".newsletter form [type='text']").blur(function(){
		$(".newsletter form [type='submit']").css("width","60px")
	});
	
	if (window.matchMedia("(max-device-width: 600px)").matches) {
		
		$("#slider_actualites").owlCarousel({

			pagination : true,
			navigationText: ["",""],
			navigation : false, // Show next and prev buttons
			items:1,
			itemsCustom:[[0,1],[640,1],[1024,1]]	,
		});

		$("#page_slider_projets").owlCarousel({

			pagination:false,
			navigationText: ["",""],
			navigation : true, // Show next and prev buttons
			rewindNav: true,
			items:3,
			loop:true,
			itemsCustom:[[0,1],[640,2],[1024,3]],
		});

		$("#sascompetence_slider_projets").owlCarousel({

			pagination:false,
			navigationText: ["",""],
			navigation : true,
			items:1,
			itemsCustom:[[0,1],[640,2],[1024,2]],
		});

		$("#slider_metier").owlCarousel({

			pagination : false,
			navigationText: ["",""],
			navigation : true, // Show next and prev buttons
			items:1,
			itemsCustom:[[0,1],[640,1],[1024,1]],
		});

		$("#slider_metier_pub").owlCarousel({

			pagination : true,
			navigationText: ["",""],
			navigation : false, // Show next and prev buttons
			items:1,
			itemsCustom:[[0,1],[640,1],[1024,1]],
		});
	} else {}
		
	$("#slider_projets").owlCarousel({

		pagination:false,
		navigation : true, // Show next and prev buttons
		navigationText: ["",""],
		rewindNav: true,
		items:3,
		loop:true,
		addClassActive:true,
		itemsCustom:[[0,1.35],[640,2],[1024,3]],
	});

	function afficher_slider_projets(){
		$("#slider_projets .owl-item.active").prevAll().addClass( "hide" );
		$("#slider_projets .owl-item.active").prevAll().removeClass( "show" );
		$("#slider_projets .owl-item.active").removeClass( "hide" );
		$("#slider_projets .owl-item.active").nextAll().addClass( "show" );
		$("#slider_projets .owl-item.active").nextAll().removeClass( "hide" );
	}
	afficher_slider_projets();
	$('#slider_projets .owl-controls .owl-pagination .owl-page').click(function(){afficher_slider_projets();});
	$('#slider_projets .owl-controls .owl-buttons *').click(function(){afficher_slider_projets();});

	$("#slider_page").owlCarousel({

		pagination:false,
		navigationText: ["",""],
		navigation : true,
		items:1,
		itemsCustom:[[0,1],[640,1],[1024,1]]	,
	});
	
	$("#slider_projet").owlCarousel({

		pagination:false,
		navigationText: ["",""],
		navigation : true,
		items:1,
		itemsCustom:[[0,1.35],[640,1],[1024,1]]	,
	});

	// A VERIFIER	
	$("#slider_points_cles").owlCarousel({

		pagination:false,
		navigationText: ["",""],
		navigation : true,
		items:3,
		itemsCustom:[[0,1.35],[640,2],[1024,3]]	,
	});

	// PAGE PROJET
	$("#slider_citation").owlCarousel({
		pagination : true,
		navigationText: ["",""],
		navText : "",
		navigation : false,
		items:1,
		itemsCustom:[[0,1],[640,1],[1024,1]]	,
	});

});