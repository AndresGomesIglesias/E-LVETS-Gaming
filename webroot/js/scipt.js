


(function ($) {
	
	var btnpreview	= document.getElementById('js_preview') 


	
	jQuery(document).ready(function (event) {
		$('.imgTeams').attr('src', '/ELV/img/logo_teams/' + $('#input_teamOpponentID').val() + '.jpg');
		var tar = $('#input_gameID')
		var id = $('#input_' + tar.data('target'))
		
		$.get(tar.data('url'), {
			id: tar.val()
		}, function (data) {
			if (data.error) {
				alert(data.error);
			} else {
				$(id).parents('.contGroup').show();
				$('.contGroup2').show()
				var target = $(id).get(0);
				target.options.length = 0;
				for (var i in data.results) {
					var result = data.results[i];
					target.options[i] = new Option(result.name + (result.level ? ' ' + result.level : ''), result.id, false, false);
				}
				if ($('#input_teamAllianceID').data('userid') === '') {
					target.value = $('#input_teamAllianceID').data('allianceid');
				} else {
					target.value = $('#input_teamAllianceID').data('userid');
				}
			}
		}, 'json');
	}).each(function () {
		var select = $(this);
		var target = $('#' + select.data('target'));


	});

	//---------------------------------------------------------------------------------------------------
	$('.ajaxList').change(function (event) {
		$('.imgTeams').attr('src', '/ELV/img/logo_teams/' + $('#input_teamOpponentID').val() + '.jpg');
		var select = $(this);
		console.log(select.data('url'))
		var id = '#input_' + select.data('target');
		$.get(select.data('url'), {
			id: select.val()
		}, function (data) {
			if (data.error) {
				alert(data.error);
			} else {
				$(id).parents('.contGroup').show();
				$('.hideAtStart').show()
				var target = $(id).get(0);
				target.options.length = 0;
				for (var i in data.results) {
					var result = data.results[i];
					target.options[i] = new Option(result.name + (result.level ? ' ' + result.level : ''), result.id, false, false);
				}
			}
		}, 'json');
	}).each(function () {
		var select = $(this);
		var target = $('#' + select.data('target'));
	});
	

	// TEAMS =====================================================================
	var btnAdd	 						= document.getElementById('btn_add'); 
	var class_playersContentNone		= 'players_content_none';
	var containtPlayersIn 				= document.getElementById('containt_players_carts_row_in')
	var containtPlayersRowOut 			= document.getElementById('containt_players_carts_row_out');
	var containtPlayersOut 				= document.getElementById('containt_players_carts_out');
	var playerCartTops					= document.querySelectorAll('#containt_players_carts_row_in .player_cart')
	var playerCartBottoms				= document.querySelectorAll('.containt_players_carts_row_bottom .player_cart')
	var modaleBloc						= document.getElementById('modaleForAddTeam');
	var modaleMain						= document.getElementById('modaleMain');
	var link							= document.getElementById('addGamesLinks');
	var btnClose						= document.getElementById('btnClose');
	var jqmodalebodyc 					= $('.modal-body');
	var jqmodaleMain 					= $('.modaleMain');
	var jqLink 							= $('#addGamesLinks');



		

	btnAdd.addEventListener('click', showChampions, false);
	link.addEventListener('click', openModale, false);
	btnClose.addEventListener('click', closeModale, false);

	for(i=0; i < playerCartTops.length; i++){
		var playerCartTop = playerCartTops[i]
		playerCartTop.addEventListener("click",   moveToBottom , false ) ;
	}
	
	for(i=0; i < playerCartBottoms.length; i++){
		var playerCartBottom = playerCartBottoms[i];
		playerCartBottom.addEventListener("click",  moveToTop  , false ) ;
	}
	
	function showChampions(event){
		event.preventDefault();
		if(containtPlayersOut.classList.contains(class_playersContentNone) == true){
			containtPlayersOut.classList.remove(class_playersContentNone);
		}else{containtPlayersOut.classList.add(class_playersContentNone);}
	}

	function moveToBottom(){
		var select 	= this;
		var id 		= select.dataset.id
		var input 	= document.getElementById('player_'+id)

		containtPlayersRowOut.append(select) ;
		input.setAttribute('value', 0); 
		select.removeEventListener('click' , moveToBottom , false ) ;
		select.addEventListener('click' , moveToTop , false ) ;
	}

	function moveToTop(){
		var select 		= this;
		var id 			= select.dataset.id
		var input  		= document.createElement('input')
		var imgCrose 	= select.childNodes[3]
		var imgAvatar 	= select.childNodes[1]

		imgAvatar.style.opacity = '1';
		select.removeChild(imgCrose);
		input.setAttribute('type', 'hidden');
		input.setAttribute('id', 'player_' + id );
		input.setAttribute('name', 'toteam_' + id );
		input.setAttribute('value', id );
		containtPlayersIn.append(input);
		containtPlayersIn.append(select); 
		select.removeEventListener('click' , moveToTop , false ) ;
		select.addEventListener('click' , moveToBottom , false ) ;
	}

	function closeModale(event){
		event.preventDefault();
		$('body').css('overflow-y', 'auto')
		jqmodaleMain.removeClass('modaleMainClass');
		$('.modal-content').removeClass('modaleMainIn');
		jqmodaleMain.addClass('aria-hidden');
		jqmodaleMain.attr('aria-modal', false)
		jqmodaleMain.attr("aria-hidden",false)
	}
	

	function openModale(event){
		event.preventDefault();
			var modal =  jqmodalebodyc.load('http://localhost:8090/ELV/huadminha/games/add #modaleForAddTeam', function(responseTxt, statusTxt, xhr){
			$('body').css('overflow-y', 'hidden')
			if(statusTxt === 'success'){ifAjax()}
			jqmodaleMain.addClass('modaleMainClass');
			$('.modal-content').addClass('modaleMainIn');
			jqmodaleMain.removeAttr('aria-hidden');
			jqmodaleMain.attr('aria-modal', true)
			jqmodaleMain.attr("aria-hidden","true")
		})
	}


	function ifAjax(){
		$("#test").submit(function(e) {
			e.preventDefault();
			var form = $(this);
			var url = form.attr('action');
			var error = []
			$.ajax({
				   type: "POST",
				   url: url,
				   data: form.serialize(),
				   dataType : 'json',
				   success: function(d) {
					alert('Vous devez remplir toute les champs')
				   },
				   error : function(resultat, statut, erreur){
						$.get('/ELV/huadminha/games/ajaxNewListOption',{
						}, function (data) {
							var inputMainID = $('#input_mainID');
							var lastAdd = '';
							$("#input_mainID option[value]").remove();
							for(i=0; i<data.results.length;i++){
								var games = data.results[i]
								lastAdd = i
								inputMainID[0].options[0] = new Option('Choisir un jeu' ,0, false, false);
								inputMainID[0].options[i] = new Option(games.name ,games.id, false, false);
							}
							closeModale(event)
							var lastOption = data.results[lastAdd]
							if(lastOption.name != ''){
								$('#input_mainID option[value=' +lastOption.id+']').attr('selected','selected');
							}
					}, 'json')
				}
			 });
		});
	}

	
	
	// BTN PREVIEW =====================================================================
        $('#js_preview').click( function () {
			event.preventDefault();
			var mywin = document.open('', "_BLANK" , "");
			var contents = $('#input_content');
			
			mywin.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">');
			mywin.document.write('<link href="http://localhost:8090/ELV/webroot/lib/font-awesome/css/font-awesome.css" rel="stylesheet">')
			mywin.document.write('<link href="http://localhost:8090/ELV/webroot/css/admin/style.css" rel="stylesheet">')
			mywin.document.write('<link href="http://localhost:8090/ELV/webroot/css/admin/mystyle.css" rel="stylesheet">')
			mywin.document.write('<link href="http://localhost:8090/ELV/webroot/assets/css/custom.css" rel="stylesheet">')

			mywin.document.write('<div class="site-wrapper  clearfix">'+
			'<div class="page-heading page-heading--post-bg page-heading--simple"></div>'+
				'<div class="site-content">'+
					'<div class="container">'+
						'<div class="row">'+
							'<div class="content col-lg-8 offset-lg-3">'+
								'<article class="post post--single">'+
									'<div class="post__category">');
									// CONTENT
									mywin.document.write('</div>')
									mywin.document.write('<header class="post__header">'+
									// CONTENT
										'<ul class="post__meta meta">')
									// CONTENT	
										mywin.document.write('</ul>')
									mywin.document.write('</header>')
									mywin.document.write('<div class="post__content-wrapper">'+
										'<div class="post-sharing-compact stacked">')
										mywin.document.write('</div>')
										mywin.document.write('<div class="post__content">'+
											'<div class="post__content--inner-left">')
												mywin.document.write(editor.getData()) 
											mywin.document.write('</div>')
										mywin.document.write('</div>')
									mywin.document.write('</div>')
								mywin.document.write('</article>')
							mywin.document.write('</div>')
						mywin.document.write('</div>')
					mywin.document.write('</div>')
				mywin.document.write('</div>')
			mywin.document.write('</div>')	
		mywin.document.close()

			var myblockquote 	= mywin.document.getElementsByClassName('myblockquote')[0]
			var body 			= mywin.document.body
			var img 			= mywin.document.getElementsByTagName("img")[0]

			img.style.width = "100%"
			img.style.height = "auto"
			body.style.backgroundColor = "#2b2236"
			myblockquote.style.fontSize = '11px'
		});
		




})(jQuery);