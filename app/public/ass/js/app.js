(function(global,$){
	$(document).ready(function(){
		var viewport = $('.container-fluid'),
			movieView = $('#movieTable').html(),
    		movieTemplate = Handlebars.compile(movieView),
    		movieRowView = $('#movieRow').html(),
    		movieRowTemplate = Handlebars.compile(movieRowView),
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
    			},
    			description:{
    				required: true,
    				minlength:20,
    				maxlength:500
    			}
    		}
    	});

		form.on('submit', function(e){
			if(form.valid()){
				e.preventDefault();

				

				$.ajax({
					url: 'api/movie',
					type: 'POST',
					data: form.serialize(),
					success: function(data){


						var view = movieRowTemplate(JSON.parse(data));
					
						var footable = $('.footable').data('footable');
						
					
						footable.appendRow(view);
						form.trigger('reset');
						// viewport.trigger('footable_redraw');


						// var pages = $('.footable').data('footable').pageInfo.pages;
						// var last = pages.length-1;

						// var page = $('.footable').data('currentPage',last+1);
						// viewport.trigger('footable_redraw');

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

				viewport.append(view).trigger('footable_redraw');
				$('.footable').footable();
            }
        });

        function formValues(form) {
        	var arr = form.serializeArray(),
    			obj = {};

			for(var i=0; i< arr.length; i++){
				obj[arr[i]['name']] = arr[i]['value'];
			}
			return obj;
        }
	});
}(this, jQuery));