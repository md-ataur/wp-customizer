;(function($){
	wp.customize('cust_services_heading',function(value){
		value.bind(function(newvalue){
			$(".heading").html(newvalue);
		});
	});

	wp.customize("cust_services_icon_color",function(value){
		value.bind(function(newvalue){
			$(".service i").css("color",newvalue);
		});
	});

	/* codestar */
	wp.customize("_cs_customize_options[about_heading]",function(value){
		value.bind(function(newvalue){
			$(".heading").html(newvalue);
		});
	});
})(jQuery);