jQuery.noConflict();
    (function( $ ) {
        $(function() { 
            $( ".day_wise_itinerary_accordion" ).accordion({
		collapsible: true,
		heightStyle: "content"
	});
	$("#example-basic").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		autoFocus: true
	});
        });
     });