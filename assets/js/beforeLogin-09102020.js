userisIn = "prod";

$(document).ready(function () {
	//baseUrl = "http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/";
	folderName = "FEOxyLoans";
	// checkCookie();
	dontcheckCookie = 1;

	if (userisIn == "local") {
		baseUrl =
			"http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/";
	} else {
		baseUrl = "https://fintech.oxyloans.com/oxyloans/";
	}
	//
	//http://ec2-52-66-245-153.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/17/dashboard/lender?current=true/false
	//$('#datetimepicker1').datetimepicker();

	//
	userenteredOTP = 1;
	userID = 0;
	gMobileNumber = 0;

	//lender validations starts//
	$("#lenderAmtValue").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 20) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
	$("#lmobileNumber").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 9) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	//city validation
	jQuery.validator.addMethod(
		"noSpace",
		function (value, element) {
			return value.indexOf(" ") < 0 && value != "";
		},
		"Space is not allowed. Please enter City"
	);

	//Age validation
	jQuery.validator.addMethod(
		"age",
		function (value, element) {
			var parts = value.split("/");
			var birthDate = new Date(parts[2], parts[1] - 1, parts[0]);
			var today = new Date();
			var age = today.getFullYear() - birthDate.getFullYear();

			if (age > 18) {
				return true;
			}
		},
		"You are not eligible for loan as your age is less than 18 years."
	);

	$("#lendermobileverifybutton").click(function (event) {
		$(".sucessotp").hide();
		$(".loadingSec").show();
		$("#lendermobilesession").val("");
		var mobileNumber = $("#lmobileNumber").val();
		if (mobileNumber.length == 10) {
			if (userisIn == "local") {
				var getStatUrl =
					"http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/newregister";
			} else {
				var getStatUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
			}
			//var getStatUrl = "http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/newregister";
			var postData = { mobileNumber: mobileNumber };
			var postData = JSON.stringify(postData);
			$.ajax({
				url: getStatUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$(".btn-textchange").html("Resend OTP");
					$(".btn-textchange").addClass("btn-warning");

					if (data.mobileverified == true) {
						$("#modal-mobileerror").modal("show");
					} else {
						$("#lendermobilesession").val(data.mobileOtpSession);
					}
					$(".loadingSec").hide();
				},
				statusCode: {
					200: function (response) {
						//alert(1);

						$(".sucessotp").show();
						//console.log("Login Successs");
					},
					401: function (response) {
						//alert('Invalid username or password.');
						$(".erroruser").show();
					},
					409: function (response) {
						// alert('1');
						$("#modal-mobileerror").modal("show");
						$(".loadingSec").hide();
					},
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
			});
		}
	});

	$("#lenderotpvalue").on("keyup", function (e) {
		$(".sucessotp").hide();
	});

	$("#lmobileNumber").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 9) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
	$("#lenderpincode").on("keyup", function (e) {
		// $("#lendercityValue").val("");
		$("#lenderstateValue").val("");
		var $this = $(this);
		if ($this.val().length == 6) {
			var pincode = $("#lenderpincode").val();
			//var getStatUrl = "http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+pincode+"/pincode";
			if (userisIn == "local") {
				var getStatUrl =
					"http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
					pincode +
					"/pincode";
			} else {
				var getStatUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/" +
					pincode +
					"/pincode";
			}
			$.ajax({
				url: getStatUrl,
				type: "GET",
				success: function (data, textStatus, xhr) {
					//console.log(data);
					var locationString = "";
					$("#lenderlocalityValue").empty();
					for (var i = 0; i < data.pinresults.length; i++) {
						var docType = data.pinresults[i].block;
						if (!locationString.includes(docType)) {
							locationString = locationString + docType;
							if (docType != "NA") {
								$("#lenderlocalityValue").append(
									'<option value="' + docType + '">' + docType + "</option>"
								);
							}
						}
					}

					if (data.size != 0) {
						//$("#lendercityValue").val(data.city);
						$("#lenderstateValue").val(data.state);
						$("#lendercityValue-error").html("");
						$("#lendercityValue").removeClass("error");
					} else {
						//$("#labelpincode").html("Please enter the correct pincode")
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
			});
		}
	});

	$("#lenderpincode").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 5) {
			e.preventDefault();
			return false;
		}

		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$("#lenderotpvalue").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 5) {
			e.preventDefault();
			return false;
		}

		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$("#lenderfirstname,#lenderlastname,#firstname,#lastname").keypress(function (
		e
	) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$("#lendermobileSection").validate({
		rules: {
			lenderpincode: {
				required: true,
				minlength: 6,
				minlength: 6,
			},

			lmobileNumber: {
				required: true,
				minlength: 10,
			},

			lenderotpvalue: {
				required: true,
			},

			lenderlastname: {
				required: true,
				normalizer: function (value) {
					if (value.charAt(0) == " " && value.indexOf(" ") != -1) {
						$(this).val("");
					}
					return $.trim(value);
				},
				maxlength: 50,
			},
			lenderfirstname: {
				required: true,
				normalizer: function (value) {
					if (value.charAt(0) == " " && value.indexOf(" ") != -1) {
						$(this).val("");
					}
					return $.trim(value);
				},
				maxlength: 50,
			},
			lendercity: {
				required: true,
			},
		},
		messages: {
			lmobileNumber: {
				required: "Please enter your mobile number",
			},
			lendercity: {
				required: "Please select the city.",
			},
			lenderfirstname: {
				required: "Please enter your first name.",
			},
			lenderlastname: {
				required: "Please enter your last name.",
			},
			lenderpincode: {
				required: "Please enter your pincode.",
			},
			lenderotpvalue: {
				required: "Please enter OTP.",
			},
		},
		submitHandler: function () {
			if ($("#lendercityValue").val() == "Other") {
				var enteredcity = $("#lenderothers").val();
			} else {
				var enteredcity = $("#lendercityValue").val();
			}

			var postData = {
				mobileNumber: $("#lmobileNumber").val(),
				mobileOtpValue: $("#lenderotpvalue").val(),
				mobileOtpSession: $("#lendermobilesession").val(),
				firstName: $("#lenderfirstname").val(),
				lastName: $("#lenderlastname").val(),
				utmSource: $("#utmSource").val(),
				type: $("#lenderuserType").val(),
				city: enteredcity,
				pinCode: $("#lenderpincode").val(),
				state: $("#lenderstateValue").val(),
				locality: $("#lenderlocalityValue").val(),
			};

			var postData = JSON.stringify(postData);
			//console.log(postData);
			var regUrl = baseUrl + "v1/user/newregister";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, request) {
					console.log(data);
					userID = data.id;
					gMobileNumber = data.mobileNumber;
					console.log(userID);
					$(".lenderstep1").css("display", "none");
					$(".lenderstep2").css("display", "block");
				},
				statusCode: {
					200: function (response) {
						//alert('1');
						console.log("Login Successs");
					},
					401: function (response) {
						//alert('Invalid username or password.');
						$(".erroruser").show();
					},
					409: function (response) {
						// alert('1');
						$("#modal-mobileerror").modal("show");
					},
					404: function (response) {
						alert("1");
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},

				error: function (request, error) {
					console.log(arguments);

					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});

	$("#lenderemailotpvalue").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 5) {
			e.preventDefault();
			return false;
		}

		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$("#lendermaleradio").click(function (event) {
		$("#lendergenderRadioMale").prop("checked", true);
	});

	$("#lenderfemaleradio").click(function (event) {
		$("#lendergenderRadioFeMale").prop("checked", true);
	});

	$("#lenderemailverifybutton").click(function (event) {
		$("#sucessotp").hide();
		var email = $("#lenderemailValue").val();
		var mobileNumber = $("#lmobileNumber").val();
		$("#emailerror").html("");
		if (email.length == 0) {
			$("#emailerror").html("please enter your email id.");
			$("#emailerror").css("display", "block");
			return;
		} else {
			$("#emailerror").html("");
			$("#emailerror").css("display", "none");
		}

		//var getStatUrl = "http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/newregister";
		if (userisIn == "local") {
			var getStatUrl =
				"http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/newregister";
		} else {
			var getStatUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
		}

		var postData = { mobileNumber: mobileNumber, email: email };
		var postData = JSON.stringify(postData);
		$.ajax({
			url: getStatUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".btn-textchangeforemail").html("Resend OTP");
				$(".btn-textchangeforemail").addClass("btn-warning");
			},
			statusCode: {
				200: function (response) {
					$("#sucessotp").show();
				},
				400: function (response) {
					$(".errorotp").show();
				},
				401: function (response) {
					//alert('Invalid username or password.');
					$(".erroruser").show();
				},
				409: function (response) {
					// alert('1');
					$("#modal-emailerror").modal("show");
				},
			},
			error: function (request, error) {
				console.log(arguments);

				if (arguments[0].responseJSON.errorCode == 113) {
					$(".errorotp").show();
				}
			},
		});
		event.preventDefault();
	});

	$("#lenderemailotpvalue").on("keyup", function (e) {
		$("#sucessotp").hide();
	});

	$("#lenderemailSection").validate({
		ignore: ":hidden:not([class~=redioboxes]),:hidden > .checkmark, .checkman",
		rules: {
			lenderemailotpvalue: {
				required: true,
			},
			lenderamtvalue: {
				required: true,
				min: 5000,
				max: 5000000,
			},
			lendergender: {
				required: true,
			},
			lenderemailValue: {
				required: true,
				email: true,
			},
			lenderpassword: {
				required: true,
				minlength: 8,
				atLeastOneLowercaseLetter: true,
				atLeastOneUppercaseLetter: true,
				atLeastOneNumber: true,
				atLeastOneSymbol: true,
				maxlength: 12,
			},
			lenderconfirmpassword: {
				equalTo: "#lenderpassword",
			},
		},
		messages: {
			lenderemailValue: {
				required: "Please enter your email.",
				email: "Pleaase enter valid email.",
			},
			lenderemailotpvalue: {
				required: "Please enter OTP.",
			},
			lendergender: {
				required: "Please select gender.",
			},
			lenderpassword: {
				required: "Please enter password",
			},
			lenderconfirmpassword: {
				equalTo: "Password and Confirm must be same.",
			},
			lenderamtvalue: {
				required: "Please enter loan lending amount.",
			},
		},
		submitHandler: function () {
			var amt = $("#select-beast").val();
			var email = $("#lenderemailValue").val();
			var emailotpvalue = $("#lenderemailotpvalue").val();
			var userType = $("#lenderuserType").val();
			var mobileNumber = $("#lmobileNumber").val();
			var pass = $("#lenderpassword").val();
			var city = $("#lendercityValue").val();
			var gender = $("input[name='lendergender']:checked").val();
			var postData = {
				mobileNumber: mobileNumber,
				email: email,
				emailOtp: emailotpvalue,
				amountInterested: amt,
				password: pass,
				gender: gender,
			};

			var postData = JSON.stringify(postData);
			var regUrl = baseUrl + "v1/user/newregister";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					console.log(data);
					userID = data.id;
					gMobileNumber = data.mobileNumber;
					console.log(userID);
					$(".step1").css("display", "none");
					$(".step2").css("display", "block");
				},
				statusCode: {
					200: function (response) {
						$("#modal-activateUser").modal("show");
						setTimeout(function () {
							window.location = "userlogin";
						}, 10000);
						console.log("Login Successs");
					},
					401: function (response) {
						//alert('Invalid username or password.');
						//$(".erroruser").show();
					},
					409: function (response) {
						// alert('1');
						$("#modal-mobileerror").modal("show");
					},
					404: function (response) {
						// alert('1');
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
					500: function (response) {
						// alert('1');
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},

				error: function (request, error) {
					console.log(arguments);

					if (arguments[0].responseJSON.errorCode == 113) {
						$(".errorotp").show();
					}
				},
			});
		},
	});

	//login btn ////
	$(".loginbtn").click(function () {
		window.location = "userlogin";
	});

	$("#dateofbirth").datepicker({
		dateFormat: "dd/mm/yy",
		maxDate: "-18Y",
		yearRange: "1950:2013",
		changeMonth: true,
		changeYear: true,
	});

	//Borrower validations//
	$("#select-beast-selectized").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 20) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
	//borrower validations starts//

	$("#mobileverifybutton").click(function (event) {
		$(".loadingSec").show();
		$(".sucessotp").hide();
		$("#mobilesession").val("");
		var mobileNumber = $("#bmobileNumber").val();
		if (mobileNumber.length == 10) {
			// var getStatUrl = "http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/newregister";
			if (userisIn == "local") {
				var getStatUrl =
					"http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/newregister";
			} else {
				var getStatUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
			}

			var postData = { mobileNumber: mobileNumber };
			var postData = JSON.stringify(postData);
			$.ajax({
				url: getStatUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$(".btn-textchange").html("Resend OTP");
					$(".btn-textchange").addClass("btn-warning");

					if (data.mobileverified == true) {
						$("#modal-mobileerror").modal("show");
					} else {
						$("#mobilesession").val(data.mobileOtpSession);
					}
					$(".loadingSec").hide();
				},
				statusCode: {
					200: function (response) {
						$(".sucessotp").show();
					},
					400: function (response) {
						//alert('Invalid username or password.');
						$(".errorotp").show();
					},
					409: function (response) {
						// alert('1');
						$(".loadingSec").hide();

						$("#modal-mobileerror").modal("show");
					},
				},
				error: function (request, error) {
					console.log(arguments);

					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		}
	});

	$("#otpvalue").on("keyup", function (e) {
		$(".sucessotp").hide();
	});

	$("#bmobileNumber").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 9) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
	$("#pincode").on("keyup", function (e) {
		// $("#cityValue").val("");
		$("#stateValue").val("");
		var $this = $(this);
		if ($this.val().length == 6) {
			var pincode = $("#pincode").val();
			// var getStatUrl = "http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+pincode+"/pincode";
			if (userisIn == "local") {
				var getStatUrl =
					"http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
					pincode +
					"/pincode";
			} else {
				var getStatUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/" +
					pincode +
					"/pincode";
			}

			$.ajax({
				url: getStatUrl,
				type: "GET",
				success: function (data, textStatus, xhr) {
					//console.log(data);

					//alert(data.pinresults[0].block);
					var locationString = "";
					$("#localityValue").empty();
					for (var i = 0; i < data.pinresults.length; i++) {
						var docType = data.pinresults[i].block;
						if (!locationString.includes(docType)) {
							locationString = locationString + docType;
							if (docType != "NA") {
								$("#localityValue").append(
									'<option value="' + docType + '">' + docType + "</option>"
								);
							}
						}
					}

					if (data.size != 0) {
						//$("#cityValue").val(data.city);
						$("#stateValue").val(data.state);
						$("#cityValue-error").html("");
						$("#cityValue").removeClass("error");
					} else {
						//$("#labelpincode").html("Please enter the correct pincode")
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
			});
		}
	});

	$("#pincode").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 5) {
			e.preventDefault();
			return false;
		}

		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$("#otpvalue").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 5) {
			e.preventDefault();
			return false;
		}

		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$("#borrowermobileSection").validate({
		ignore:
			":hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input",
		rules: {
			borrowerAmtValue: {
				required: true,
				min: 5000,
				max: 5000000,
			},
			pincode: {
				required: true,
				minlength: 6,
				minlength: 6,
			},

			bmobileNumber: {
				required: true,
				minlength: 10,
			},

			otpvalue: {
				required: true,
			},

			firstname: {
				required: true,
				normalizer: function (value) {
					if (value.charAt(0) == " " && value.indexOf(" ") != -1) {
						$(this).val("");
					}
					return $.trim(value);
				},
				maxlength: 50,
			},
			lastname: {
				required: true,
				normalizer: function (value) {
					if (value.charAt(0) == " " && value.indexOf(" ") != -1) {
						$(this).val("");
					}
					return $.trim(value);
				},
				maxlength: 50,
			},
			dob: {
				required: true,
				age: true,
			},
			city: {
				required: true,
			},
		},
		messages: {
			borrowerAmtValue: {
				required: "Please enter amount required",
			},
			bmobileNumber: {
				required: "Please enter your mobile number",
			},
			city: {
				required: "Please select the city.",
			},
			firstname: {
				required: "Please enter your first name.",
			},
			lastname: {
				required: "Please enter your last name.",
			},
			dob: {
				required: "Please enter your date of birth.",
			},
			pincode: {
				required: "Please enter your pincode.",
			},
			otpvalue: {
				required: "Please enter OTP.",
			},
		},
		submitHandler: function () {
			var amt = $("#select-beast").text();
			var userType = $("#borroweruserType").val();
			var mobileNumber = $("#bmobileNumber").val();
			// var city = $("#cityValue").val();

			if ($("#cityValue").val() == "Other") {
				var enteredcity = $("#others").val();
			} else {
				var enteredcity = $("#cityValue").val();
			}

			var postData = {
				mobileNumber: $("#bmobileNumber").val(),
				mobileOtpValue: $("#otpvalue").val(),
				mobileOtpSession: $("#mobilesession").val(),
				firstName: $("#firstname").val(),
				amountInterested: amt,
				lastName: $("#lastname").val(),
				dob: $("#dateofbirth").val(),
				utmSource: $("#utmSource").val(),
				type: userType,
				city: enteredcity,
				pinCode: $("#pincode").val(),
				state: $("#stateValue").val(),
				locality: $("#localityValue").val(),
			};

			var postData = JSON.stringify(postData);
			//console.log(postData);
			var regUrl = baseUrl + "v1/user/newregister";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					console.log(data);
					userID = data.id;
					gMobileNumber = data.mobileNumber;
					console.log(userID);
					$(".step1").css("display", "none");
					$(".step2").css("display", "block");
				},
				statusCode: {
					200: function (response) {
						//alert('1');
						console.log("Login Successs");
					},
					401: function (response) {
						//alert('Invalid username or password.');
						$(".erroruser").show();
					},
					409: function (response) {
						// alert('1');
						$("#modal-mobileerror").modal("show");
					},
					404: function (response) {
						alert("1");
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},

				error: function (request, error) {
					console.log(arguments);

					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});

	$("#emailotpvalue").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 5) {
			e.preventDefault();
			return false;
		}

		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$("#maleradio").click(function (event) {
		$("#genderRadioMale").prop("checked", true);
	});

	$("#femaleradio").click(function (event) {
		$("#genderRadioFeMale").prop("checked", true);
	});

	$("#emailverifybutton").click(function (event) {
		$("#sucessotp").hide();

		var email = $("#emailValue").val();
		var mobileNumber = $("#bmobileNumber").val();
		$("#emailerror").html("");
		if (email.length == 0) {
			$("#emailerror").html("please enter your email id.");
			$("#emailerror").css("display", "block");
			return;
		} else {
			$("#emailerror").html("");
			$("#emailerror").css("display", "none");
		}

		if (userisIn == "local") {
			var getStatUrl =
				"http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/newregister";
		} else {
			var getStatUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
		}
		//var getStatUrl = "http://ec2-13-126-67-155.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/newregister";
		var postData = { mobileNumber: mobileNumber, email: email };
		var postData = JSON.stringify(postData);
		$.ajax({
			url: getStatUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".btn-textchangeforemail").html("Resend OTP");
				$(".btn-textchangeforemail").addClass("btn-warning");
			},
			statusCode: {
				200: function (response) {
					$("#sucessotp").show();
				},
				401: function (response) {
					//alert('Invalid username or password.');
					$(".erroruser").show();
				},
				409: function (response) {
					// alert('1');
					$("#modal-emailerror").modal("show");
				},
			},
			error: function (request, error) {
				console.log(arguments);

				if (arguments[0].responseJSON.errorCode == 113) {
					$(".errorotp").show();
				}
			},
		});
		event.preventDefault();
	});

	$("#emailotpvalue").on("keyup", function (e) {
		$("#sucessotp").hide();
	});

/**********FARMER REG************/
$("#registerborrowernonotication").validate({
		rules: {
			firstname:{
				required: true,
			},
			lastname:{
				required: true,
			},
			gender: {
				required: true,
			},
			emailValue: {
				required: true,
				email: true,
			},
			bmobileNumber: {
				required: true,
			},
			borrowerAmtValue: {
				required: true
			},
			cityValue:{
				required: true
			},
			dateofbirth:{
				dateFormat: true
			},
			pincode: {
				required: true
			}
		},
		messages: {
			emailValue: {
				required: "Please enter your email.",
				email: "Pleaase enter valid email.",
			},
			emailotpvalue: {
				required: "Please enter OTP.",
			},
			gender: {
				required: "Please select gender.",
			},
			confirmpassword: {
				equalTo: "Password and Confirm must be same.",
			},
		},
		submitHandler: function () {
			var amt = $("#select-beast").val();
			var email = $("#emailValue").val();
			var userType = $("#borroweruserType").val();
			var mobileNumber = $("#bmobileNumber").val();
			var pass = $("#password").val();
			var city = $("#cityValue").val();
			var gender = $("input[name='gender']:checked").val();
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var stateValue = $("#stateValue").val();
			var pinCode = $("#pincode").val();
			var dob = $("#dateofbirth").val();
			var cityValue = $("#cityValue").val();

			var postData = {
							mobileNumber:mobileNumber, 
							amountInterested:amt,
							firstName: firstname,
							lastName: lastname,
							gender: gender,
							email: email,
							pinCode:pinCode,
							city:cityValue,
							dob: dob,
							state:stateValue,
							locality: "NA"
							};
			var postData = JSON.stringify(postData);
			var regUrl = baseUrl + "v1/user/oxyfarms";

			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					console.log(data);
					userID = data.id;
					gMobileNumber = data.mobileNumber;
					console.log(userID);
					alert("Registration is Success!")
					window.location = "borrowerDashboard";
				},
				statusCode: {
					200: function (response) {
						$("#modal-activateUser").modal("show");
						setTimeout(function () {
							window.location = "userlogin";
						}, 10000);
						console.log("Login Successs");
					},
					401: function (response) {
						//alert('Invalid username or password.');
						//$(".errorotp").show();
					},
					113: function (response) {
						alert(1);
					},
					409: function (response) {
						// alert('1');
						$("#modal-mobileerror").modal("show");
					},
					404: function (response) {
						// alert('1');
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
					500: function (response) {
						// alert('1');
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},

				error: function (request, error) {
					console.log(arguments);

					if (arguments[0].responseJSON.errorCode == 113) {
						$(".errorotp").show();
					}
				},
			});
		},
	});	
/**********FARMER REG ENDS************/


	$("#borroweremailSection").validate({
		rules: {
			emailotpvalue: {
				required: true,
			},
			gender: {
				required: true,
			},
			emailValue: {
				required: true,
				email: true,
			},
			password: {
				required: true,
				minlength: 8,
				atLeastOneLowercaseLetter: true,
				atLeastOneUppercaseLetter: true,
				atLeastOneNumber: true,
				atLeastOneSymbol: true,
				maxlength: 12,
			},
			confirmpassword: {
				equalTo: "#password",
			},
		},
		messages: {
			emailValue: {
				required: "Please enter your email.",
				email: "Pleaase enter valid email.",
			},
			emailotpvalue: {
				required: "Please enter OTP.",
			},
			gender: {
				required: "Please select gender.",
			},
			password: {
				required: "Please enter password",
			},
			confirmpassword: {
				equalTo: "Password and Confirm must be same.",
			},
		},
		submitHandler: function () {
			var amt = $("#borrowerAmtValue").val();
			// amt = parseInt(amt);
			var email = $("#emailValue").val();
			var emailotpvalue = $("#emailotpvalue").val();
			var userType = $("#borroweruserType").val();
			var mobileNumber = $("#bmobileNumber").val();
			var pass = $("#password").val();
			var city = $("#cityValue").val();
			var gender = $("input[name='gender']:checked").val();
			var postData = {
				mobileNumber: mobileNumber,
				email: email,
				emailOtp: emailotpvalue,
				password: pass,
				gender: gender,
			};

			//var postData = {mobileNumber:mobileNumber, type:userType, amountInterested:amt};
			var postData = JSON.stringify(postData);
			var regUrl = baseUrl + "v1/user/newregister";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					console.log(data);
					userID = data.id;
					gMobileNumber = data.mobileNumber;
					console.log(userID);
					$(".step1").css("display", "none");
					$(".step2").css("display", "block");
				},
				statusCode: {
					200: function (response) {
						$("#modal-activateUser").modal("show");
						setTimeout(function () {
							window.location = "userlogin";
						}, 10000);
						console.log("Login Successs");
					},
					401: function (response) {
						//alert('Invalid username or password.');
						//$(".errorotp").show();
					},
					113: function (response) {
						alert(1);
					},
					409: function (response) {
						// alert('1');
						$("#modal-mobileerror").modal("show");
					},
					404: function (response) {
						// alert('1');
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
					500: function (response) {
						// alert('1');
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},

				error: function (request, error) {
					console.log(arguments);

					if (arguments[0].responseJSON.errorCode == 113) {
						$(".errorotp").show();
					}
				},
			});
		},
	});

	function isNumeric(str) {
		var code, i, len;

		for (i = 0, len = str.length; i < len; i++) {
			code = str.charCodeAt(i);
			if (!(code > 47 && code < 58)) {
				return false;
			}
		}
		return true;
	}

	//otp validations//
	$("#otpValue").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 6) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
	$("#otpSection").validate({
		rules: {
			otpValue: {
				required: true,
			},
			emailValue: {
				required: true,
				email: true,
			},
			checkbox: {
				required: true,
			},
		},
		messages: {
			otpValue: {
				required: "Please fill this field",
			},
			emailValue: {
				required: "Please fill this field",
				email: "Pleaase enter valid email",
			},
			checkbox: {
				required: "you must agree the terms & conditions",
			},
		},
		submitHandler: function () {
			// $(".loading").show();
			var enteredOTPValue = $("#otpValue").val();
			var enteredEmail = $("#emailValue").val();
			var postData = {
				mobileNumber: gMobileNumber,
				mobileOtpValue: enteredOTPValue,
				email: enteredEmail,
			};

			var postData = JSON.stringify(postData);

			regUrl = baseUrl + "v1/user/register";

			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					console.log(data);
					//var response = JSON.parse(data);
					//$('.enterOTPSection').hide();

					$("#modal-RegisterSuccess").modal("show");
					//$('.displayUploadFile').show();
					setTimeout(function () {
						window.location = "userlogin";
					}, 15000);
				},

				statusCode: {
					200: function (response) {
						//alert('1');
						console.log("Login Successs");
					},
					401: function (response) {
						//alert('Invalid username or password.');
						$(".erroruser").show();
					},
					409: function (response) {
						// alert('1');
						$("#modal-emailerror").modal("show");
					},
					203: function (response) {
						// alert('1');
						//$("#modal-emailerror").modal('show');
					},
				},
				error: function (request, error) {
					console.log(arguments);
				},
			});
		},
	});
	// user login validations//

	$(".emailbtnValue").click(function () {
		$(".btnvalue, .userLoginH1").hide();
		$(".enterUSERLOGINSection").show();
	});

	$(".mobilebtnValue").click(function () {
		$(".btnvalue, .userLoginH1").hide();
		$(".enterMOBILESection").show();
	});

	$(".mobilenumberValue").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 9) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$(".otpbtn").click(function () {
		var enteredmobileValue = $(".mobilenumberValue").val();
		//alert(enteredmobileValue);
		var isValid = true;
		if (enteredmobileValue == "") {
			$(".mobilenumbererror").show();
			isValid = false;
		} else if (enteredmobileValue.length < 10) {
			$(".mobilenumbererror").hide();
			$(".mobileerror").show();
			isValid = false;
		} else {
			$(".mobileerror").hide();
			$(".mobilenumbererror").hide();
		}

		var postData = { mobileNumber: enteredmobileValue };
		var postData = JSON.stringify(postData);
		console.log(postData);

		regUrl = baseUrl + "v1/user/sendOtp";
		if (isValid == true) {
			//alert(isValid);
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					$(".enterotpSection").show();
					$(".otpbtn").hide();
					$(".showloginBtn").show();
					//console.log(data);
				},
				statusCode: {
					400: function (response) {
						// alert('1');
						$("#modal-moblie").modal("show");
						setTimeout(function () {
							window.location = "userlogin";
						}, 5000);
					},
				},
			});
		}
		return isValid;
	});

	$(".showloginBtn").click(function () {
		var enteredmobileValue = $(".mobilenumberValue").val();
		var enteredOTPValue = $(".otpValue").val();

		var isValid = true;
		if (enteredmobileValue == "") {
			$(".mobilenumbererror").show();
			isValid = false;
		} else {
			$(".mobilenumbererror").hide();
		}

		if (enteredOTPValue == "") {
			$(".otperror").show();
			isValid = false;
		} else {
			$(".otperror").hide();
		}

		var postData = {
			mobileNumber: enteredmobileValue,
			mobileOtpValue: enteredOTPValue,
		};
		var postData = JSON.stringify(postData);
		console.log(postData);
		regUrl = baseUrl + "v1/user/login?grantType=PWD";
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				//contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
				dataType: "json",
				success: function (data) {
					console.log("personal details", data);
					//headers: {'accessToken': "token String"},
					userType = data.primaryType;
					mobileNumber = data.mobileNumber;
					userID = data.id;
					var sId = data.id;
					writeCookie("sUserId", sId);
					var sUserType = data.primaryType;
					writeCookie("sUserType", sUserType);
					if (data.emailVerified == true) {
						if (sUserType == "LENDER") {
							window.location = "investor";
						} else {
							window.location = "borrowerDashboard";
						}
					} else {
						if (sUserType == "LENDER") {
							window.location = "lenderemailregister";
						} else {
							window.location = "borroweremailregister";
						}
					}
				},
			}).done(function (data, textStatus, xhr) {
				console.log(xhr.getResponseHeader("accessToken"));
				accessToken = xhr.getResponseHeader("accessToken");
				writeCookie("saccessToken", accessToken);
				var sUserType = data.primaryType;
				var mobileNumber = data.mobileNumber;
				if (data.emailVerified == true) {
					if (sUserType == "LENDER") {
						window.location = "investor";
					} else {
						window.location = "borrowerDashboard";
					}
				} else {
					writeCookie("smbl", mobileNumber);
					if (sUserType == "LENDER") {
						window.location = "lenderemailregister";
					} else {
						window.location = "borroweremailregister";
					}
				}
			});
		}
		return isValid;
	});

	//FORGOT EMAIL AND MOBILE FUNCTION//

	$("#resetbtn").click(function () {
		var enteredemailValue = $("#email").val();
		//var enteredPhoneValue = $("#phonenumber").val();

		if (enteredemailValue == "") {
			$(".displayError-forgot").html("Please enter email.");
			$(".displayError-forgot").show();
			return false;
		} else {
			$(".displayError-forgot").hide();
		}

		var enteredemailValue = $("#email").val();
		var postData = { email: enteredemailValue };
		var postData = JSON.stringify(postData);
		console.log(postData);

		var EmailPattern = /^[a-z0-9._-]+@[a-z]+.[a-z.]{2,5}$/i;
		$(".displayError-forgot").html("Please enter valid email.");
		$(".displayError-forgot").show();
		//alert(EmailPattern);

		if (!EmailPattern.test(enteredemailValue)) {
			$(".displayError-forgot").html("Please enter valid email.");
			$(".displayError-forgot").show();
			return false;
		} else {
			$(".displayError-forgot").hide();
		}

		regUrl = baseUrl + "v1/user/resetpassword";
		$.ajax({
			url: regUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data) {
				$("#modal-resetSuccess").modal("show");
				console.log(data);
			},
			statusCode: {
				400: function (response) {
					//alert('1');
					$("#modal-resetpasswordError").modal("show");
					//bootbox.alert('<span style="color:Red;">Error While Saving Outage Entry Please Check</span>', function () { });
				},
			},
		});
	});

	$("#savebtn").click(function () {
		var enteredPassword = $(".passwordValue").val();
		var enteredcPassword = $(".cpasswordValue").val();
		var emailToken = $(".emailToken").val();

		var test_lowercases = /[a-z]+/;
		var test_uppercases = /[A-Z]+/;
		var test_onenum = /[0-9]+/;
		var test_onesymbol = /[!@#$%^&*()]+/;
		console.log(enteredcPassword);

		if (enteredPassword == "" && enteredcPassword == "") {
			$(".displayError-forgot").html(
				"Please enter Password and Confirm Password to reset password."
			);
			$(".displayError-forgot").show();
			return false;
		} else if (enteredPassword.length < 8) {
			$(".displayError-forgot").html(
				"Password should contain min 8-12 characters."
			);
			$(".displayError-forgot").show();
			return false;
		} else if (enteredPassword.length > 12) {
			$(".displayError-forgot").html(
				"Password should contain min 8-12 characters."
			);
			$(".displayError-forgot").show();
			return false;
		} else if (!test_lowercases.test(enteredPassword)) {
			$(".displayError-forgot").html(
				"Please enter atleast one lower character."
			);
			$(".displayError-forgot").show();
			return false;
		} else if (!test_uppercases.test(enteredPassword)) {
			$(".displayError-forgot").html(
				"Please enter atleast one uppercase character."
			);
			$(".displayError-forgot").show();
			return false;
		} else if (!test_onenum.test(enteredPassword)) {
			$(".displayError-forgot").html("Please enter atleast one number.");
			$(".displayError-forgot").show();
			return false;
		} else if (!test_onesymbol.test(enteredPassword)) {
			$(".displayError-forgot").html("Please enter atleast one symbol.");
			$(".displayError-forgot").show();
			return false;
		} else {
			$(".displayError-forgot").hide();
		}

		if (enteredPassword != enteredcPassword) {
			$(".displayError-forgot").html(
				"Password and Confirm Password must be same."
			);
			$(".displayError-forgot").show();
			return false;
		} else {
			$(".displayError-forgot").hide();
		}

		var postData = {
			password: enteredPassword,
			confirmPassword: enteredcPassword,
		};
		var postData = JSON.stringify(postData);
		regUrl = baseUrl + "v1/user/resetpassword/" + emailToken + "";
		$.ajax({
			url: regUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data) {
				$("#modal-resetpasswordSuccess").modal("show");
				setTimeout(function () {
					window.location = "userlogin";
				}, 2000);
			},
		});
	});

	// ENDS FORGOT SECTION//

	$("#userloginSection").validate({
		rules: {
			emailValue: {
				required: true,
			},
			password: {
				required: true,
			},
		},
		messages: {
			emailValue: {
				required: "Please enter mobile number/email",
			},
			password: {
				required: "Please enter password",
			},
		},
		//user login api call//
		submitHandler: function () {
			//var phonenoregex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
			var enteredEmail = $("#emailValue").val();
			var enteredPassword = $("#password").val();
			var flag = isNumeric(enteredEmail);
			var postData = { password: enteredPassword, email: enteredEmail };
			if (flag) {
				var postData = {
					password: enteredPassword,
					mobileNumber: enteredEmail,
				};
			} else {
				var postData = { password: enteredPassword, email: enteredEmail };
			}
			var postData = JSON.stringify(postData);
			console.log(postData);
			regUrl = baseUrl + "v1/user/login?grantType=PWD";
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				//contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
				dataType: "json",
				success: function (data) {
					console.log(data);

					//headers: {'accessToken': "token String"},
					userID = data.id;
					userType = data.primaryType;
					var sId = data.id;
					writeCookie("sUserId", sId);
					var sUserType = data.primaryType;
					writeCookie("sUserType", sUserType);

					if (sUserType == "LENDER") {
						window.location = "investor";
					} else if (sUserType == "ADMIN") {
						window.location = "admin/dashboard";
					} else {
						window.location = "borrowerDashboard";
					}
				},
				statusCode: {
					200: function (response) {
						//alert('1');
						console.log("Login Successs");
					},
					401: function (response) {
						//alert('Invalid username or password.');
						$(".erroruser").show();
					},
					400: function (response) {
						alert("1");
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
					404: function (response) {
						alert("1");
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},
			}).done(function (data, textStatus, xhr) {
				console.log(xhr.getResponseHeader("accessToken"));
				accessToken = xhr.getResponseHeader("accessToken");

				writeCookie("saccessToken", accessToken);

				var sUserType = data.primaryType;
				if (sUserType == "LENDER") {
					window.location = "investor";
				} else if (sUserType == "ADMIN") {
					window.location = "admin/dashboard";
				} else {
					window.location = "borrowerDashboard";
				}
			});
		},
	});

	//Activateuser validations//
	// passwordValue

	// if(enteredPassword.test(passwordregx)){
	//   alert('worked');
	// }

	/*$.validator.addMethod("passwordregx", function(value, element, regexp) {
   // var re = new RegExp(passwordregx);
    var passwordregx = new RegExp("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,10}$/");
    console.log(passwordregx);
    console.log(value);
    //console.log(element);
    passwordregx.test(value);
  },
  
);*/

	/**
	 * Custom validator for contains at least one lower-case letter
	 */
	$.validator.addMethod(
		"atLeastOneLowercaseLetter",
		function (value, element) {
			return this.optional(element) || /[a-z]+/.test(value);
		},
		"Must have at least one lowercase letter"
	);

	/**
	 * Custom validator for contains at least one upper-case letter.
	 */
	$.validator.addMethod(
		"atLeastOneUppercaseLetter",
		function (value, element) {
			return this.optional(element) || /[A-Z]+/.test(value);
		},
		"Must have at least one uppercase letter"
	);

	/**
	 * Custom validator for contains at least one number.
	 */
	$.validator.addMethod(
		"atLeastOneNumber",
		function (value, element) {
			return this.optional(element) || /[0-9]+/.test(value);
		},
		"Must have at least one number"
	);

	/**
	 * Custom validator for contains at least one symbol.
	 */
	$.validator.addMethod(
		"atLeastOneSymbol",
		function (value, element) {
			return this.optional(element) || /[!@#$%^&*()]+/.test(value);
		},
		"Must have at least one symbol"
	);

	$.validator.addMethod("pwcheck", function (value, element) {
		return /^[A-Za-z0-9\d=!\-@._*]+$/.test(value);
	});

	$(".activateSection").validate({
		rules: {
			password: {
				required: true,
				minlength: 8,
				atLeastOneLowercaseLetter: true,
				atLeastOneUppercaseLetter: true,
				atLeastOneNumber: true,
				atLeastOneSymbol: true,
				maxlength: 12,
			},
			cpassword: {
				equalTo: "#password",
			},
		},
		messages: {
			password: {
				required: "Please enter password",
			},
			cpassword: {
				equalTo: "Password and Confirm must be same.",
			},
		},
		submitHandler: function () {
			var enteredPassword = $(".passwordValue").val();
			var enteredcPassword = $(".cpasswordValue").val();
			var emailToken = $(".emailToken").val();
			var postData = {
				password: enteredPassword,
				confirmPassword: enteredcPassword,
			};
			var postData = JSON.stringify(postData);
			regUrl = baseUrl + "v1/user/register/" + emailToken + "/verify";
			// alert(regUrl);
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					console.log(data);
					$("#modal-activateUser").modal("show");
					setTimeout(function () {
						window.location = "userlogin";
					}, 10000);
				},
				error: function (request, error) {
					console.log(arguments);
					$("#modal-activateUser-error").modal("show");
				},
			});
		},
	});

	// ENDS ACTIVATE USER//
});

function writeCookie(name, value, days) {
	var date, expires;
	console.log(name);
	console.log(value);
	if (days) {
		date = new Date();
		date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
		expires = "; expires=" + date.toGMTString();
	} else {
		expires = "";
	}
	document.cookie = name + "=" + value + expires + "; path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(";");
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == " ") {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

function checkCookie() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	if (suserId != "") {
		if (sprimaryType == "BORROWER") {
			window.location = "borrowerDashboard";
		} else {
			window.location = "investor";
		}
	} else {
		window.location = "userlogin";
		return false;
	}
	//return suserId, sprimaryType, saccessToken;
}

$(document).ready(function ($) {
	$('[data-toggle="tooltip"]').tooltip();
	$(".passwordValue").passtrength({
		minChars: 8,
		passwordToggle: true,
		tooltip: true,
	});
});

function setProfilePicURL() {
	console.log("test");
}

/**************** autocomplete ***************/

function autocomplete(inp, arr) {
	/*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
	var currentFocus;
	/*execute a function when someone writes in the text field:*/
	inp.addEventListener("input", function (e) {
		var a,
			b,
			i,
			val = this.value;
		/*close any already open lists of autocompleted values*/
		closeAllLists();
		if (!val) {
			return false;
		}
		currentFocus = -1;
		/*create a DIV element that will contain the items (values):*/
		a = document.createElement("DIV");
		a.setAttribute("id", this.id + "autocomplete-list");
		a.setAttribute("class", "autocomplete-items");
		/*append the DIV element as a child of the autocomplete container:*/
		this.parentNode.appendChild(a);
		/*for each item in the array...*/
		for (i = 0; i < arr.length; i++) {
			/*check if the item starts with the same letters as the text field value:*/
			if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
				/*create a DIV element for each matching element:*/
				b = document.createElement("DIV");
				/*make the matching letters bold:*/
				b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
				b.innerHTML += arr[i].substr(val.length);
				/*insert a input field that will hold the current array item's value:*/
				b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
				/*execute a function when someone clicks on the item value (DIV element):*/
				b.addEventListener("click", function (e) {
					/*insert the value for the autocomplete text field:*/
					inp.value = this.getElementsByTagName("input")[0].value;
					/*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
					closeAllLists();
				});
				a.appendChild(b);
			}
		}
	});
	/*execute a function presses a key on the keyboard:*/
	inp.addEventListener("keydown", function (e) {
		var x = document.getElementById(this.id + "autocomplete-list");
		if (x) x = x.getElementsByTagName("div");
		if (e.keyCode == 40) {
			/*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
			currentFocus++;
			/*and and make the current item more visible:*/
			addActive(x);
		} else if (e.keyCode == 38) {
			//up
			/*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
			currentFocus--;
			/*and and make the current item more visible:*/
			addActive(x);
		} else if (e.keyCode == 13) {
			/*If the ENTER key is pressed, prevent the form from being submitted,*/
			e.preventDefault();
			if (currentFocus > -1) {
				/*and simulate a click on the "active" item:*/
				if (x) x[currentFocus].click();
			}
		}
	});
	function addActive(x) {
		/*a function to classify an item as "active":*/
		if (!x) return false;
		/*start by removing the "active" class on all items:*/
		removeActive(x);
		if (currentFocus >= x.length) currentFocus = 0;
		if (currentFocus < 0) currentFocus = x.length - 1;
		/*add class "autocomplete-active":*/
		x[currentFocus].classList.add("autocomplete-active");
	}
	function removeActive(x) {
		/*a function to remove the "active" class from all autocomplete items:*/
		for (var i = 0; i < x.length; i++) {
			x[i].classList.remove("autocomplete-active");
		}
	}
	function closeAllLists(elmnt) {
		/*close all autocomplete lists in the document,
    except the one passed as an argument:*/
		var x = document.getElementsByClassName("autocomplete-items");
		for (var i = 0; i < x.length; i++) {
			if (elmnt != x[i] && elmnt != inp) {
				x[i].parentNode.removeChild(x[i]);
			}
		}
	}
	/*execute a function when someone clicks in the document:*/
	document.addEventListener("click", function (e) {
		closeAllLists(e.target);
	});
}

/*An array containing all the country names in the world:*/
// var cities = ["Delhi", "Mumbai", "Kolkata", "Chennai", "Bangalore", "Hyderabad", "Pune", "Visakhapatnam", "Vijayawada"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

$(document).ready(function () {
	$(function () {
		var cities = [
			"Delhi",
			"Mumbai",
			"Kolkata",
			"Chennai",
			"Bangalore",
			"Hyderabad",
			"Secunderabad",
			"Pune",
			"Visakhapatnam",
			"Vijayawada",
		];
		$(".cityInputs").autocomplete({
			source: cities,
		});
	});

	setTimeout(function () {
		// autocomplete(document.getElementsByClassName("city"), cities);
	}, 5000);

	$("#cityValue").on("change", function () {
		if ($("#cityValue").val() == "Other") {
			$("#others").show();
		} else {
			$("#others").hide();
		}
	});

	$("#lendercityValue").on("change", function () {
		if ($("#lendercityValue").val() == "Other") {
			$("#lenderothers").show();
		} else {
			$("#lenderothers").hide();
		}
	});
});

function submitDataNotification(){

}