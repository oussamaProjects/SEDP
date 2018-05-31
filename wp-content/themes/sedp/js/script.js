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

			if(countElement>6)
				countElement = 6;

			widthElement = width / countElement ;
			left = i * widthElement +'%';

			

			var index= 0;
			
			if($(pagination).data('clicked') ){
				if($(paginationLinks[i]).parent().hasClass('active')){index = i;}
				$(pagination[index]).css('left',left);

			}else{

			}
			$(pagination[i]).css('left',left);
			if( i > 5 )
				$(pagination[i]).css('visibility',"hidden");
			
			
		}); 
	}

	function movePager(){
		var $currentItem = this.owl.currentItem;
		var $previousItem = this.owl.prevItem;
		var pagination = jQuery('.owl-controls .owl-pagination .owl-page');	
		var width = 110;
		countElement = 6; 
		widthElement = width / countElement ;
		left = widthElement;
		if( $currentItem >= 5 && $currentItem < ($(pagination).length - 1) ){
			if($currentItem > $previousItem	){
				$('.owl-controls .owl-pagination .owl-page').each(function(i){
					previousleft = this.style.left.replace("%", "");
					if($previousItem < 5 )
						$previousItem = 4;
					var facteur = $currentItem - $previousItem;
					$(this).css('left', (previousleft - (facteur*left))+"%");
					$(pagination[$currentItem+1]).css('visibility',"visible");
					actualLeft = $(this).css('left').replace("px", "");
					if(parseFloat(actualLeft) < -10 ){
						$(pagination[i]).css('visibility',"hidden");
						
						$(".slider_competence.owl-theme .owl-pagination .owl-page:nth-child("+(i+2)+")").addClass("hideTrait");
					}else if(parseFloat(actualLeft) >= -10 && parseFloat(actualLeft) <= $('.owl-controls .owl-pagination').width() ){
						$(pagination[i]).css('visibility',"visible");
					}
				});
			}else{
				
				$('.owl-controls .owl-pagination .owl-page').each(function(i){
					previousleft = this.style.left.replace("%", "");
					var facteur = $previousItem - $currentItem ;
					if($previousItem == ($(pagination).length - 1))
						facteur-= 1;
					
					if($currentItem <($(pagination).length - 2)){
						$(this).css('left', (parseFloat(previousleft) + facteur*parseFloat(left))+"%");
						
						actualLeft = $(this).css('left').replace("px", "");
						if(parseFloat(actualLeft) > $('.owl-controls .owl-pagination').width() ){
							$(pagination[i]).css('visibility',"hidden");
						}
						else if(parseFloat(actualLeft) >= -10 && parseFloat(actualLeft) <= $('.owl-controls .owl-pagination').width() ){
							$(pagination[i]).css('visibility',"visible");
							$(".slider_competence.owl-theme .owl-pagination .owl-page:nth-child("+(i+2)+")").removeClass("hideTrait");
						}

					}
				});
			}
		}else if($currentItem < 5 ){ 
			var firstleft = 0;
			$('.owl-controls .owl-pagination .owl-page').each(function(i){
				
				if(i == 0)
					firstleft = this.style.left.replace("%", "");
				
				if(parseFloat(firstleft) <= -10 || parseFloat(firstleft) >= 10 ){
					previousleft = this.style.left.replace("%", "");
					$(this).css('left', (parseFloat(previousleft) - parseFloat(firstleft))+"%");
				}

				actualLeft = $(this).css('left').replace("px", "");
				if(parseFloat(actualLeft) > $('.owl-controls .owl-pagination').width() ){
					$(pagination[i]).css('visibility',"hidden");
				}
				else if(parseFloat(actualLeft) >= -10 && parseFloat(actualLeft) <= $('.owl-controls .owl-pagination').width() ){
					$(pagination[i]).css('visibility',"visible");
					$(".slider_competence.owl-theme .owl-pagination .owl-page:nth-child("+(i+2)+")").removeClass("hideTrait");
				}
			});
		}else if($currentItem == $(pagination).length-1 ){
			if(($currentItem - $previousItem) == $(pagination).length-1 ){
				var facteur = ($(pagination).length-1) - 5;
				$('.owl-controls .owl-pagination .owl-page').each(function(i){
					previousleft = this.style.left.replace("%", "");
					$(this).css('left', (previousleft - (facteur*left))+"%");
					actualLeft = $(this).css('left').replace("px", "");
					$(pagination[i ]).css('visibility',"visible");
					if(parseFloat(actualLeft) < -10 ){
						$(pagination[i]).css('visibility',"hidden");
						$(".slider_competence.owl-theme .owl-pagination .owl-page:nth-child("+(i+2)+")").addClass("hideTrait");
					}
				});
			}
		}
	}

	$carousel =  $('#slider_competence') ;
	$carousel.owlCarousel({
	        navigation: true, // Show next and prev buttons
	        navigationText: ["",""],
	        slideSpeed: 300,
	        paginationSpeed: 400,
	        items:1,
	        loop:true,
	        addClassActive:true,
	        afterInit: customPager,
	        afterUpdate: customPager,
	        afterMove: movePager,
	        itemsCustom:[[0,1],[640,1],[1024,1]],
	    });

	$("#chevron").click(function(){
		$("#chevron").toggleClass("up");
		$(".blocfiltre .filtre").slideToggle('1000');
	});

	$(".search_home").click(function(e){
		e.preventDefault();
		$(this).parent().parent().toggleClass("hover");
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
	if (window.matchMedia("(min-device-width: 1024px)").matches) {
		setTimeout(function(){	afficher_slide(); }, 50);
	}
	// $('.slider_competence .owl-controls .owl-pagination .owl-page').click(function(){afficher_slide();});
	// $('.slider_competence .owl-controls .owl-buttons *').click(function(){afficher_slide();});

	$(".slider_competence .owl-controls .owl-pagination .owl-page").on("click",function(){   afficher_slide();});
	$(".slider_competence .owl-controls .owl-buttons .owl-prev").on("click",function(){afficher_slide();});
	$(".slider_competence .owl-controls .owl-buttons .owl-next").on("click",function(){afficher_slide();});

	
	//================== MENU_BURGER

	$("#menu_burger").click(function(){
		$("#shadow").addClass("background");
		$("#side-menu").addClass("opn");
	});

	$("#side-menu ul li").each(function() {

		$li = $( this );
		$ulNiv1 = $li.children("ul");
		
		if ($ulNiv1.length) {
			$a = $li.children('a');
			$a.addClass('bullet');

			$a.click(function(evt){
				evt.preventDefault();

				$currentUl = $(this).next('ul');
				$("#side-menu ul li ul  ").not($currentUl).removeClass('showAll');
				$("#side-menu ul li a").not($(this)).removeClass('up');

				$currentUl.toggleClass('showAll');
				$(this).toggleClass('up');

			});

		}else 
		$( this ).children("ul").removeClass('showAll')

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
		itemsCustom:[[0,1.15],[460,2],[800,3],[1640,3.25]],
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
		itemsCustom:[[0,1],[640,1],[1024,1]],
		autoplay:true,
		autoplayTimeout:1000,
		autoplayHoverPause:true
	});

	

});



//================== FILTRE SUBMIT ON CLICK SELECT
$('#plusProjects').on("click",function(){
	sentData = {
		'action': 'mon_action',
	        'cat_projet': $("#cat_projet").val(),	//catégorie project
	        'met_projet': $("#met_projet").val(),	//Tag projet
	        'pagination': $(".plus").data("pagination"),
	        'ifremaining' : $(".plus").data("ifremaining"),
	        'viewed' 	  : $(".plus").data("viewed")
	    };
	    projects_ajax(sentData);
	    return false;
	});
$("#cat_projet").change(function(){
	$("#met_projet").prop('selectedIndex',0);
	$("#zone_projet").prop('selectedIndex',0);
	projects_ajax();
});
$("#met_projet").change(function(){
	$("#cat_projet").prop('selectedIndex',0);
	$("#zone_projet").prop('selectedIndex',0);
	projects_ajax();
});
$("#zone_projet").change(function(){
	$("#cat_projet").prop('selectedIndex',0);
	$("#met_projet").prop('selectedIndex',0);
	projects_ajax();
});

function projects_ajax(sentData){
	data = {
		'action': 'mon_action',
	        'cat_projet': $("#cat_projet").val(),	//catégorie project
	        'met_projet': $("#met_projet").val(),	//Tag projet
	        'zone_projet' : $("#zone_projet").val(), //Zpne projet
	        'ifremaining' : $(".plus").data("ifremaining"),

	    };
	    if(!$.isEmptyObject(sentData))
	    	data = sentData;

	    $.ajax({
	    	url : ajaxurl,
	    	type : "post",
	    	data : data,
	    	beforeSend : function(){
	    		$("#ajaxloader").show();
	    		$("#ajaxShadow").show();
	    	},
	    	success : function(response){
	    		$(".projets").html(response);
	    		$('#plusProjects').on("click",function(){
	    			sentData = {
	    				'action': 'mon_action',
				        'cat_projet': $("#cat_projet").val(),	//catégorie project
				        'met_projet': $("#met_projet").val(),	//Tag projet
				        'zone_projet' : $("#zone_projet").val(), //Zpne projet
				        'pagination': $(".plus").data("pagination"),
				        'ifremaining' : $(".plus").data("ifremaining"),
				        'viewed' 	  : $(".plus").data("viewed")
				    };
				    projects_ajax(sentData);
				    return false;
				});
	    		$("#ajaxloader").hide();
	    		$("#ajaxShadow").hide();
	    		$("#chevron").removeClass("up");
	    		if (window.matchMedia("(max-width: 600px)").matches) {
	    			$(".blocfiltre .filtre").slideUp('1000');
	    		}
	    	}
	    });
	}

	//================== Filtre Actu 
	$.datepicker.regional['fr'] = {clearText: 'Effacer', clearStatus: '',
	closeText: 'Fermer', closeStatus: 'Fermer sans modifier',
	prevText: '<Préc', prevStatus: 'Voir le mois précédent',
	nextText: 'Suiv>', nextStatus: 'Voir le mois suivant',
	currentText: 'Courant', currentStatus: 'Voir le mois courant',
	monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin',
	'Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
	monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun',
	'Jul','Aoû','Sep','Oct','Nov','Déc'],
	monthStatus: 'Voir un autre mois', yearStatus: 'Voir un autre année',
	weekHeader: 'Sm', weekStatus: '',
	dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
	dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
	dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
	dayStatus: 'Utiliser DD comme premier jour de la semaine', dateStatus: 'Choisir le DD, MM d',
	dateFormat: 'dd/mm/yy', firstDay: 0, 
	initStatus: 'Choisir la date', isRTL: false};
	
	$.datepicker.setDefaults($.datepicker.regional['fr']);

	$( "#datepicker" ).datepicker({
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'yy',
		onClose: function(dateText, inst) { 
			var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			$(this).datepicker('setDate', new Date(year, 1));
		}
	});
	$("#datepicker").focus(function () {
		$(".ui-datepicker-month, .ui-datepicker-calendar ").hide();
		$(".ui-corner-all.ui-datepicker-next, .ui-corner-all.ui-datepicker-prev").css('visibility','hidden');
	}); 

	$("#cat_actualites").change(function(){
		$("#dateActu").val("");

	});

	$("#dateActu").change(function(){
		$("#cat_actualites").prop('selectedIndex',0);
	});

	//================== ADD THIS Share Buttons 
	
	$("#share_publication").click(function(e){e.preventDefault();});
	
	$(".addthis_toolbox").addClass("hide_addthis");
	$(".savoir_plus.tout").append($( ".addthis_toolbox" ));

	$("#share_publication").parent().hover(function(){
		$(".addthis_toolbox").removeClass("hide_addthis");
		$(".addthis_toolbox").addClass("show_addthis");
	},function(){
		if($("#addthis_toolbox:hover").length == 0){
			$(".addthis_toolbox").removeClass("show_addthis");
			$(".addthis_toolbox").addClass("hide_addthis");
		}
	});

	$("#share_publication").parent().click(function(){
		$(".addthis_toolbox").toggleClass("show_addthis");
		$(".addthis_toolbox").toggleClass("hide_addthis");
	});
	



	

	$('a.addthis_button_mailto').click(function(event){
		event.preventDefault();
		window_handle = window.open(this.href,'windowName');
		var timeoutID = window.setTimeout('window_handle.close();',1000);
		// alert(this.href);
		// window.clearTimeout(timeoutID);
		
	});

