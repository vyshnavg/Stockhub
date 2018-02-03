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



$(document).ready(function(){
	$("#tenderSearchInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#tenderSearchTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
});

// $(document).ready(function(){
// 	CountDownTimer('02/19/2018 10:1 AM', 'timeOfExpiry');

//     function CountDownTimer(dt, id)
//     {
//         var end = new Date(dt);

//         var _second = 1000;
//         var _minute = _second * 60;
//         var _hour = _minute * 60;
//         var _day = _hour * 24;
//         var timer;

//         function showRemaining() {
//             var now = new Date();
//             var distance = end - now;
//             if (distance < 0) {

//                 clearInterval(timer);
//                 document.getElementById(id).innerHTML = 'EXPIRED!';

//                 return;
//             }
//             var days = Math.floor(distance / _day);
//             var hours = Math.floor((distance % _day) / _hour);
//             var minutes = Math.floor((distance % _hour) / _minute);
//             var seconds = Math.floor((distance % _minute) / _second);

//             document.getElementById(id).innerHTML = days + 'days ';
//             document.getElementById(id).innerHTML += hours + 'hrs ';
//             document.getElementById(id).innerHTML += minutes + 'mins ';
//             document.getElementById(id).innerHTML += seconds + 'secs';
//         }

//         timer = setInterval(showRemaining, 1000);
//     }
// });