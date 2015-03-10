(function(global,$){
	$(document).ready(function(){
		var movieView = $('#movieTable').html(),
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
    			}
    		}
    	});

		$('#formMovie').on('submit', function(e){
			if(form.valid()){
				e.preventDefault();

				

				$.ajax({
					url: 'api/movie',
					type: 'POST',
					data: form.serialize(),
					success: function(data){


						view = movieRowTemplate(JSON.parse(data));
					
						var footable = $('.footable').data('footable');
						var pages = footable.pageInfo.pages;
						var last = pages.length-1;

						var page = $('.footable').data('currentPage',last);
					
						footable.appendRow(view);

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