$(document).ready(function(e){
    $( document ).on( 'click', '.bs-dropdown-to-select-group .dropdown-menu li', function( event ) {
    	let $target = $( event.currentTarget );
		$target.closest('.bs-dropdown-to-select-group')
			.find('[data-bind="bs-drp-sel-value"]').val($target.attr('data-value'))
			.end()
			.children('.dropdown-toggle').dropdown('toggle');
		$target.closest('.bs-dropdown-to-select-group')
    		.find('[data-bind="bs-drp-sel-label"]').text($target.context.textContent);
		return false;
	});
});


$(document).ready(function(){
    $('[data-toggle="popover"]').popover({html:true,container: 'body'});   
});

$(document).ready(function() { 								// GETTING THE SIDE NAV FILLED IN MATERIALS INDEX
    var sidebarMainMenu = $('#sidebar-menu .main-menu');
	var staticContent = $('#static-content');
	staticContent.find('h2').each(function() {
		sidebarMainMenu.append('<li id="'+ $(this).attr('id') + '-menu" ><a href="#' + $(this).attr('id') + '">' + $(this).html() + '</li>');
		title = sidebarMainMenu.find('#' + $(this).attr('id'));
	});
	// staticContent.find('h3').each(function() {
	// 	prevTitle = sidebarMainMenu.find('#' + $(this).prevAll('h1').first().attr('id') + '-menu');
	// 	prevTitle.not(":has(ul)").append('<ul class="sub-menu"></ul>');
	// 	prevTitle.find('.sub-menu').append('<li id="'+ $(this).attr('id') + '-menu"><a href="#' + $(this).attr('id') + '">' + $(this).html() + '</li>');
	// });
	sidebarMainMenu.affix({
	      offset: {
	        top: 0  // To Modify according to the height offset
	      }
	});
});
