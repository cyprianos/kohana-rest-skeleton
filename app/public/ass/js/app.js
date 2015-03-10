(function(global,$){
	$(document).ready(function(){
		var movieView = $('#movieTable').html(),
    		movieTemplate = Handlebars.compile(movieView),
    		form = $('#formMovie');

    	Handlebars.registerPartial('movieRow', $('#movieRow').html());
		
		$.validator.setDefaults({
		    highlight: function(element) {
		        $(element).closest('.form-group').addClass('has-error');
		    },
		    unhighlight: function(element) {
		        $(element).closest('.form-group').removeClass('has-error');
		    },
		    errorElement: 'span',
		    errorClass: 'help-block',
		    errorPlacement: function(error, element) {
		        if(element.parent('.input-group').length) {
		            error.insertAfter(element.parent());
		        } else {
		            error.insertAfter(element);
		        }
		    }
		});
    	
    	form.validate({
    		rules: {
    			title: {
    				required: true,
    				minlength: 3
    			},
    			year: {
    				required: true,
    				min: 1901,
    				max: 2100
    			}
    		}
    	});

		$('#formMovie').on('submit', function(e){
			if(form.valid()){

				e.preventDefault();
				var str = $(this).serialize();


				$.ajax({
					url: 'api/movie',
					type: 'POST',
					data: str,
					success: function(data){
						//TODO APPEND ONE ROW
						console.log('render', data);
					}
				});
			}
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