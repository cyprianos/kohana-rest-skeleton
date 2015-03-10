(function(global,$){
	$(document).ready(function(){

		$('#movieTable').footable({
		});

		$.ajax({
                url : '/api/movie',
                success : function(data) {          	
                	var template = $('#movieRow').html(),
                		fnTemplate = Handlebars.compile(template),
                		data = JSON.parse(data),
                		view = fnTemplate(data);

                	$('#movieTable tbody').append(view).trigger('footable_redraw');
                }
            });
	});
}(this, jQuery));