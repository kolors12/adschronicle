// JavaScript Document
		$(document).ready(function() {

//documentation : http://docs.jquery.com/Plugins/Validation/validate		
		$('#validate-form').validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: false,
			rules: {
				email: {
					required: true,
					email:true
				},
				password: {
					required: true,
					minlength: 5
				},
				password2: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				fullname: {
					required: true
				},
				phone: {
					required: true,
					minlength: 10,
					maxlength: 15,
					digits: false
				},
				subscription: {
					required: true
				},
				mstatus: {
					required: true
				},
				mtongue: {
					required: true
				},
				country: {
					required: true
				},
				state: {
					required: true
				},
				caste: {
					required: true
				},
				religion: {
					required: true
				},
				profession: {
					required: true
				}
				gender: 'required',
				agree: 'required'
				},
				messages: {
					email: {
						required: "Please provide a valid email.",
						email: "Please provide a valid email."
					},
					password: {
						required: "Please specify a password.",
						minlength: "Please specify a secure password."
					},
					phone: {
						required: "Please specify a Phone Number.",
						minlength: "Enter a valid number.",
						maxlength: "Enter a valid number.",
						digits: "Enter only numbers."
					},
					mstatus: "Please choose at least one option",
					mtongue: "Please choose at least one option",
					religion: "Please choose at least one option",
					caste: "Please choose at least one option",
					country: "Please choose at least one option",
					state: "Please choose at least one option",
					profession: "Please choose at least one option",
					
					subscription: "Please choose at least one option",
					gender: "Please choose gender",
					agree: "Please accept our policy"
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is(':checkbox') || element.is(':radio')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.labels:eq(0)').eq(0));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
			// Bootstrap Form Wizard	
			$('#bwizard').bootstrapWizard({
			
			'tabClass': 'bwizard-steps',
			'nextSelector': '.button-next', 
			'previousSelector': '.button-previous', 
			
			onTabClick: function(tab, navigation, index) {
				//alert('on tab click disabled');
				return false;
				
			}, onNext: function(tab, navigation, index) {
	  			var $valid = $("#validate-form").valid();
	  			if(!$valid) {
	  				$validator.focusInvalid();
	  				return false; }	
					
			}, onTabShow: function(tab, navigation, index) {
				console.log('onTabShow');
				var $total = navigation.find('li').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;
				$('#bwizard').find('.bar').css({width:$percent+'%'});
			}});
					
		});
