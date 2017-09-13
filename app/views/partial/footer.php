<!-- The actual snackbar -->
<div id="snackbar"></div>

<!-- the footer will be hidden if the user is authorized -->
<?php if(($_SESSION['acm_authorized'] == false)&&(App::get('about') != 'active' )) : ?>

<footer class="page-footer light-blue">
		<div class="container">
		  <div class="row">
			<div class="col l6 s12">
			  <h5 class="white-text">Company Bio</h5>
			  <p class="grey-text text-lighten-4">
				In our thrust to become a major player in Philippine Market for International and Domestic Freight Forwarding, we have formally established a corporation on February 14, 2007.
			  We believe that as a budding corporation, we are backed by our more than 20 years of experience in this industry that enabled us to capture a good addition to our already existing clientele base: with the best composite of major accounts which are strongholds in Cebu and Manila as corporations of excellent standing.
			  </p>


			</div>
			<!-- <div class="col l3 s12">
			  <h5 class="white-text">About Us</h5>
			  <ul>
				<li><a class="white-text" href="#!">About Us</a></li>
				<li><a class="white-text" href="#!">Certifications</a></li>
				<li><a class="white-text" href="#!">Services</a></li>
				<li><a class="white-text" href="projects">Projects</a></li>
			  </ul>
			</div> -->
			<div class="col l3 s12">
			  <h5 class="white-text">Contact Us</h5>
			  <ul>
				<a class="white-text" href="https://www.facebook.com/profile.php?id=100009525266202&ref=br_rs" target="_blank"><img src = "/public/img/facebook-box.png"></a>
				<a class="white-text" href="https://www.twitter.com" target="_blank"><img src = "/public/img/twitter.png"></a>
			 </ul>
			</div>
		  </div>
		</div>
		<div class="footer-copyright">
		  <div class="container">
		  © 2016 Airland Cargo Movers Inc. All rights Reserved.
		  Made by <a class="white-text" href="#"><b>PLM ITerates</b></a>		  
		  </div>
		</div>
	  </footer>

<?php endif; ?>

<!-- JQuery script -->
<!-- <script src="/public/js/jquery.min.js"></script> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>


<!-- Materialize Script -->
<!-- <script src="/public/js/materialize.min.js"></script> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js" integrity="sha256-pVJ6toFhRjat2LSvxugXvMnNDp33i00nfn0CpPXZevs=" crossorigin="anonymous"></script>


<!-- Rome and Moment Scripts -->
<!--
<script src="/public/js/rome.js"></script>
<script src="/public/js/moment.js"></script>
-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>


<!-- Material Date Time Picker -->
<script src="/public/js/bootstrap-material-datetimepicker.js"></script>

<!-- Init Script for Mobile View (Materialize) -->
<script src="/public/js/init.js"></script>

<!-- Ripple Script -->
<script src="/public/js/ripple.js"></script>

<!-- Editable Table Script -->
<script src="/public/js/editable-table.js"></script>

<!-- Jquery Validation Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>

<!-- Tooltipster Script -->
<script type="text/javascript" src="/public/tooltipster/dist/js/tooltipster.bundle.min.js"></script>

<script>

	$(document).ready(function(){
	    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	    $('.modal').modal({
	    	startingTop: '50%' // Starting top style attribute
	    });

            $('#acm_dropoff_province').change(function()
	    {

	    		if ($('#acm_dropoff_province').val() == 'none')
	    		{
	    			$('#acm_dropoff_city').attr('disabled', 'disabled');
	    		}
	    		else
	    		{
	    			$('#acm_dropoff_city').removeAttr('disabled');

	    			$.ajax({
				        type: 'post',
				        url: '/agent/getProvinces',
				        data: { acm_sel_city: $('#acm_dropoff_province').val() },
				        dataType: 'json',
				        success: function(response)
				        {
			                var len = response.length;

			                $("#acm_dropoff_city").empty();
			                for( var i = 0; i<len; i++)
			                {
			                    var id = response[i]['city_name'];
			                    var name = response[i]['city_name'];
			                    
			                    $("#acm_dropoff_city").append("<option value='"+id+"'>"+name+"</option>");

			                }
		            	},
		            	error: function(xhr, textStatus, errorThrown)
		            	{

		            		alert('request failed');
		            	}
			    	});

			    }
		    				
	    });

	    $('#acm_currloc_province').change(function()
	    {

	    		if ($('#acm_currloc_province').val() == 'none')
	    		{
	    			$('#acm_currloc_city').attr('disabled', 'disabled');
	    		}
	    		else
	    		{
	    			$('#acm_currloc_city').removeAttr('disabled');

	    			$.ajax({
				        type: 'post',
				        url: '/agent/getProvinces',
				        data: { acm_sel_city: $('#acm_currloc_province').val() },
				        dataType: 'json',
				        success: function(response)
				        {
			                var len = response.length;

			                $("#acm_currloc_city").empty();
			                for( var i = 0; i<len; i++)
			                {
			                    var id = response[i]['city_name'];
			                    var name = response[i]['city_name'];
			                    
			                    $("#acm_currloc_city").append("<option value='"+id+"'>"+name+"</option>");

			                }
		            	},
		            	error: function(xhr, textStatus, errorThrown)
		            	{

		            		alert('request failed');
		            	}
			    	});

			    }
		    				
	    });

	    $('#acm_cor_org_prov').change(function()
	    {

	    		if ($('#acm_cor_org_prov').val() == 'none')
	    		{
	    			$('#acm_cor_org_city').attr('disabled', 'disabled');
	    		}
	    		else
	    		{
	    			$('#acm_cor_org_city').removeAttr('disabled');

	    			$.ajax({
				        type: 'post',
				        url: '/agent/getProvinces',
				        data: { acm_sel_city: $('#acm_cor_org_prov').val() },
				        dataType: 'json',
				        success: function(response)
				        {
			                var len = response.length;

			                $("#acm_cor_org_city").empty();
			                for( var i = 0; i<len; i++)
			                {
			                    var id = response[i]['city_name'];
			                    var name = response[i]['city_name'];
			                    
			                    $("#acm_cor_org_city").append("<option value='"+id+"'>"+name+"</option>");

			                }
		            	},
		            	error: function(xhr, textStatus, errorThrown)
		            	{

		            		alert('request failed');
		            	}
			    	});

			    }
		    				
	    });

	    $('#acm_cor_des_prov').change(function()
	    {

	    		if ($('#acm_cor_des_prov').val() == 'none')
	    		{
	    			$('#acm_cor_des_city').attr('disabled', 'disabled');
	    		}
	    		else
	    		{
	    			$('#acm_cor_des_city').removeAttr('disabled');

	    			$.ajax({
				        type: 'post',
				        url: '/agent/getProvinces',
				        data: { acm_sel_city: $('#acm_cor_des_prov').val() },
				        dataType: 'json',
				        success: function(response)
				        {
			                var len = response.length;

			                $("#acm_cor_des_city").empty();
			                for( var i = 0; i<len; i++)
			                {
			                    var id = response[i]['city_name'];
			                    var name = response[i]['city_name'];
			                    
			                    $("#acm_cor_des_city").append("<option value='"+id+"'>"+name+"</option>");

			                }
		            	},
		            	error: function(xhr, textStatus, errorThrown)
		            	{

		            		alert('request failed');
		            	}
			    	});

			    }
		    				
	    });

	    // initialize Tooltipster on input elements
		$('input').tooltipster({ //find more options on the tooltipster page
			theme: ['tooltipster-default','tooltipster-default-customized'],
		    trigger: 'custom', // default is 'hover' which is no good here
		    position: 'right',
		    animation: 'grow',
		    maxWidth: 350
		});

		 // initialize Tooltipster on input elements
		$('textarea').tooltipster({ //find more options on the tooltipster page
			theme: ['tooltipster-default','tooltipster-default-customized'],
		    trigger: 'custom', // default is 'hover' which is no good here
		    position: 'right',
		    animation: 'grow',
		    maxWidth: 350
		});

	    $.validator.addMethod('regexp', function(value, element, param) {
	        return this.optional(element) || value.match(param);
	    });

	    //validation for login form
	    $('#loginForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
	    	rules:
	    	{
	    		acm_username: 
	    		{
	    			required: true,
	    			regexp: '^[a-zA-Z0-9_.@]*$'
	    		},
	    		acm_pass:
	    		{
	    			required: true,
	    			regexp: '^[a-zA-Z0-9 -_]{8,20}$'
	    		}
	    	},
	    	messages:
	    	{
	    		acm_username: 
	    		{
	    			required: "Username is required",
	    			regexp: "Alphanumeric characters, ., _, and @ are only allowed"
	    		},
	    		acm_pass:
	    		{
	    			required: "Password is required",
	    			regexp: 'Password must have minimum of 8 and maximum of 25 characters'
	    		}
	    		
	    	}
	    });

            //validation for home tracking form
	    $('#homeTrackForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
	    	rules:
	    	{
	    		acm_tracking_number:
	    		{
	    			required: true,
	    			regexp: '^[0-9]{5}$'
	    		}
	    	},
	    	messages:
	    	{
	    		acm_tracking_number:
	    		{
	    			required: "Tracking number is required",
	    			regexp: "Enter a valid tracking number (5 digits)"
	    		}
	    	}
	    });

	    //validation for forgot password email form
	    $('#forgotPasswordEmailForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
	    	rules:
	    	{
	    		acm_forgot_email:
	    		{
	    			required: true,
	    			email: true
	    		}
	    	},
	    	messages:
	    	{
	    		acm_forgot_email:
	    		{
	    			required: "Email address is required",
	    			email: "Please enter a valid email address"
	    		}
	    	}
	    });

	    //validation for forgot password email form
	    $('#forgotPassNewPassForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
	    	rules:
	    	{
	    		acm_new_pass:
	    		{
	    			required: true,
	    			regexp: "^[a-zA-Z0-9 -_]*$",
	    			rangelength: [8, 25]
	    		}
	    	},
	    	messages:
	    	{
	    		acm_new_pass:
	    		{
	    			required: "A new password is required",
	    			regexp: "The new password must only have Alphanumberic characters, '-' and '_'",
	    			rangelength: "The new password must have minimum of 8 and maximum of 25 characters"
	    		}
	    	}
	    });

	    //validation for create account form
	    $('#createAccountForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
	    	rules:
	    	{
	    		acm_avail_fname:
	    		{
	    			required: true,
	    			regexp: '^[a-zA-z ]*$',
	    			rangelength: [2, 25]
	    		},
	    		acm_avail_lname:
	    		{
	    			required: true,
	    			regexp: '^[a-zA-z]*$',
	    			rangelength: [2, 25],
	    		},
	    		acm_avail_email:
	    		{
	    			required: true,
	    			email: true,
	    			"remote":
	    			{
	    				url: "/check-email",
	    				type: "post",
	    				data:
	    				{
	    					emailData : function()
	    					{
	    						return $('#acm_avail_email').val();
	    					}
	    				}
	    			}

	    		},
	    		acm_corporate_name:
	    		{
	    			"remote":
	    			{
	    				url : "/check-company-name",
	    				type: "post",
	    				data: 
	    				{ 
	    					compName : function()
		    				{
		    					return $('#acm_corporate_name').val();
		    				} 
	    				}
	    			}
	    		},
	    		acm_avail_user:
	    		{
	    			"remote":
	    			{
	    				url : "/check-username",
	    				type: "post",
	    				data: 
	    				{ 
	    					user : function()
		    				{
		    					return $('#acm_avail_user').val();
		    				} 
	    				}
	    			}
	    		},
	    		acm_avail_password:
	    		{
	    			"remote":
	    			{
	    				url : "/check-password",
	    				type: "post",
	    				data: 
	    				{ 
	    					user : function()
		    				{
		    					return $('#acm_avail_password').val();
		    				} 
	    				}
	    			},
	    			rangelength: [8, 25]
	    		},
	    		acm_avail_con_password:
	    		{
	    			rangelength: [8, 25],
	    			equalTo: "#acm_avail_password"
	    		}
	    	},
	    	messages:
	    	{
	    		acm_avail_fname:
	    		{
	    			required: "First name is required",
	    			regexp: "First Name must only contain letters",
	    			rangelength: "First Name must have 2 to 25 characters"
	    		},
	    		acm_avail_lname:
	    		{
	    			required: "Last name is required",
	    			regexp: "First Name must only contain letters",
	    			rangelength: "Last Name must have 2 to 25 characters"
	    		},
	    		acm_avail_email:
	    		{
	    			required: "Email is required",
	    			email: "Please enter a valid email address",
	    			remote: "The email is already taken"
	    		},
	    		acm_avail_cnum:
	    		{
	    			required: "Contact number is required",
	    			pattern: "Please enter a valid contact number"
	    		},
	    		acm_avail_address:
	    		{
	    			required: "Address is required"
	    		},
	    		acm_corporate_name:
	    		{
	    			required: "Company name is required",
	    			remote: "Company name is already taken"
	    		},
                        acm_corporate_address:
	    		{
	    			required: "Company address is required",
	    			
	    		},
	    		acm_avail_user:
	    		{
	    			required: "Username is required",
	    			pattern: "Please enter a valid username",
	    			remote: "Username already exists"
	    		},
	    		acm_avail_password:
	    		{
	    			required: "Password is required",
	    			pattern: "Please enter a valid password",
	    			rangelength: "Passwords must only have 8 to 25 characters",
	    			remote: "Password already exists"
	    		},
	    		acm_avail_con_password:
	    		{
	    			equalTo: "Your passwords are not equal",
	    			rangelength: "Passwords must only have 8 to 25 characters"
	    		}
	    	}
	    });

	    $('#messageUsForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
        	rules:
        	{
        		acm_message_name:
        		{
        			required: true,
        			regexp: "^[a-zA-Z0-9_]+( [a-zA-Z0-9_.]+)*$"
        		},
        		acm_message_email:
        		{
        			required: true,
        			email: true
        		},
        		acm_message:
        		{
        			required: true
        		}
        	},
        	messages:
        	{
        		acm_message_name:
        		{
        			required: "Name is required",
        			regexp: "Please enter a valid name"
        		},
        		acm_message_email:
        		{
        			required: "Email is required",
        			email: "Please enter a valid email"
        		},
        		acm_message:
        		{
        			required: "Message is required"
        		}
        	}
	    });

	    $('#agentUpdateForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
        	rules:
        	{
        		acm_dep_remark:
        		{
        			rangelength: [3, 50]
        		},
        		acm_arr_remark:
        		{
        			rangelength: [3, 50]
        		}
        	},
        	messages:
        	{
        		acm_dep_remark:
        		{
        			rangelength: "Minimum of 3 and maximum of 50 characters"
        		},
        		acm_arr_remark:
        		{
        			rangelength: "Minimum of 3 and maximum of 50 characters"
        		}
        	}
	    });	

	    $('#agentSearchForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
        	rules:
        	{
        		acm_tracking_number:
        		{
        			required: true,
        			regexp: "^[0-9]{5}$"
        		}
        	},
        	messages:
        	{
        		acm_tracking_number:
        		{
        			required: "Tracking number is required",
        			regexp: "Enter a valid tracking number (5 digits)"
        		}
        	}
	    });

	    $('#changePassForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
        	rules:
        	{
        		acm_password:
        		{
        			required: true,
        			regexp: "^[a-zA-Z0-9 -_]{8,20}$",
        			"remote":
	    			{
	    				url: "/check-oldpassword",
	    				type: "post",
	    				data:
	    				{
	    					acm_avail_password : function()
	    					{
	    						return $('#acm_password').val();
	    					}
	    				}
	    			}

        		},
        		acm_newpass:
        		{
        			required: true,
        			regexp: "^[a-zA-Z0-9 -_]{8,20}$",
        			"remote":
	    			{
	    				url: "/check-password",
	    				type: "post",
	    				data:
	    				{
	    					acm_avail_password : function()
	    					{
	    						return $('#acm_newpass').val();
	    					}
	    				}
	    			}
        		},
        		acmconnewpass:
        		{
        			equalTo: '#acm_newpass'
        		}
        	},
        	messages:
        	{
        		acm_password:
        		{
        			required: "Your old password is required",
        			regexp: "Your password must have at least 8 characters and at most 20 characters",
        			remote: "Password does not exist"
        		},
        		acm_newpass:
        		{
        			required: "Your new password is required",
        			regexp: "Your password must have at least 8 characters and at most 20 characters",
        			remote: "Password already exists"
        		},
        		acmconnewpass:
        		{
        			equalTo: 'Passwords do not match'
        		}
        	}
	    });

	    $('#aicTransactionForm').validate({
	    	errorPlacement: function (error, element)
	    	{
	    		var ele = $(element),
		            err = $(error),
		            msg = err.text();
		        if (msg != null && msg !== '') 
		        {
		            ele.tooltipster('content', msg);
		            ele.tooltipster('open');
		        }
	    	},
	    	unhighlight: function(element, errorClass, validClass) 
	    	{
        		$(element).removeClass(errorClass).addClass(validClass).tooltipster('close');
        	},
        	rules:
        	{
        		acm_invoice:
        		{
        			required: true,
        			regexp: "^[0-9.]{1,10}$",
        			position: 'left'
        		},
        		acm_expenses:
        		{
        			required: true,
        			regexp: "^[0-9.]{1,10}$"
        		}
        	},
        	messages:
        	{
        		acm_invoice:
        		{
        			required: "Invoice Value is required",
        			regexp: "Enter a valid invoice value"
        		},
        		acm_expenses:
        		{
        			required: "Expenses value is required",
        			regexp: "Enter a valid expense value"
        		}
        	}
	    });

	  });

        //delete user function for admin module
	function deleteUser($index)
	{
		swal({
			title: 'Are you sure you want to delete this user?',
			showCancelButton: true,
			closeOnConfirm: false
		},
		function()
		{
			$.ajax({
		        type: 'post',
		        url: '/administrator/delete-employee',
		        data: { acm_delete_user: $index },
		        success: function( data ) {
		            console.log( data );
		        }
	    	});

	    	$('.table-remove').click(function () {
			  $(this).parents('tr').detach();
			});

			window.location = "/administrator/index";
		});
	}
	//error messages
	<?php 
		switch($_SESSION['acm_error'])
		{
			case 'track':
				echo "notif('Wrong tracking number!');";
				break;

			case 'login':
				echo "notif('Wrong username or password!');";
				break;

			case 'mismatch':
				echo "notif('Your passwords mismatched!');";
				break;

			case 'old_password':
				echo "notif('Your old password is incorrect!');";
				break;

			case 'pass_exists':
				echo "notif('Your new password already exists!');";
				break;

			case 'email':
				echo "notif('There was an error sending your email. Please check your entered details.');";
				break;

			case 'name':
				echo "notif('The name you entered is already taken.');";
				break;

			case 'login_details':
				echo "notif('The username and password you entered are already taken.');";
				break;

			case 'company_details':
				echo "notif('The company name and address you entered are already taken.');";
				break;

			case 'email_exists':
				echo "notif('The email is already in use!');";
				break;

			case 'forgot-password':
				echo "notif('The email is invalid!')";
				break;

		}

	//resets the variable
	$_SESSION['acm_error'] = '';	

	?>

	//notification function
	function notif($text, $type = 'error')
	{
		// Get the snackbar DIV
		var snackbar = document.getElementById("snackbar");

		// Add the text message into the DIV
		snackbar.innerHTML = $text;

		// Add the "show" class to DIV
		snackbar.className = "show";

		if($type = 'error')
			snackbar.style.backgroundColor = "red";
		else
			snackbar.style.backgroundColor = "green";

		// After 3 seconds, remove the show class from DIV
    	setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 3000);
	}
 
        function dateTime()
	{
		$('.date').bootstrapMaterialDatePicker({ format : 'dddd DD MMMM YYYY - HH:mm' });
	}        

	function logout()
	{
		swal({
			title: 'Are you sure you want to logout?',
			showCancelButton: true,
			closeOnConfirm: false
		},
		function()
		{
			window.location = "/logout";
		});
	}

</script>

</body>
</html>