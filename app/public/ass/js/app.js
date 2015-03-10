(function(global,$){
	$(document).ready(function(){
		var movieView = $('#movieTable').html(),
    		movieTemplate = Handlebars.compile(movieView);

    	Handlebars.registerPartial('movieRow', $('#movieRow').html());

		$('#formMovie').on('submit', function(e){
			e.preventDefault();
			var str = $(this).serialize();
			console.log(str);

			//TODO validation

			$.ajax({
				url: 'api/movie',
				type: 'POST',
				data: str,
				success: function(data){
					//TODO APPEND ONE ROW
					console.log('render', data);
				}
			});
		});


//SETUP TABLE VIEW
		$.ajax({
            url : '/api/movie',
            success : function(data) {
        		var data = JSON.parse(data),
        			view = movieTemplate(data);
        			
				$('body').append(view).trigger('footable_redraw');
				$('.footable').footable();
            }
        });
	});
}(this, jQuery));