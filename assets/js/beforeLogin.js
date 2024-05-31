let userisIn = "local";

let userenteredOTP = 1;
let userID = 0;
let gMobileNumber = 0;
let mobileOtpSession = "";
let bmobileOtpSession = "";
let bgMobileNumber = 0;
let folderName = "FEOxyLoans";
let dontcheckCookie = 1;
let baseUrl = "";

$(document).ready(function () {
	(function () { 
		fetchIpaddress();
		geolocation();
	})();

	if (userisIn == "local") {
		baseUrl =
			"http://35.154.48.120:8080/oxynew/";
	} else { 
		baseUrl = "https://fintech.oxyloans.com/oxyloans/";
	}

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

	$("#whatsAppLogin").click(function (event) {
		event.preventDefault();
		$(this).hide();
		$(".login-box-modal").hide();
		$("#credential_Login").show();
		$(".whatAppOtpBlock").show();
	});

	$("#credential_Login").click(function (event) {
		event.preventDefault();
		$(this).hide();
		$(".login-box-modal").show();
		$("#credential_Login").hide();
		$(".whatAppOtpBlock").hide();
		$("#whatsAppLogin").show();
	});

	$(document).ready(function () {
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
					required: "Enter your registered phone number or email address here.",
				},
				password: {
					required: "Please enter a valid password.",
				},
			},
			//user login api call//
			submitHandler: function () {
				$(".displayScreenFlowArw").hide();
				$(".displayScreenFlowRefresh").show();

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
				let regUrl = baseUrl + "v1/user/login?grantType=PWD";
				$.ajax({
					url: regUrl,
					type: "POST",
					data: postData,
					contentType: "application/json",
					dataType: "json",
					success: function (data) {
						userID = data.id;
						userType = data.primaryType;
						var sId = data.id;
						var isValidityExpire = data.validityCheck;
						writeCookie("sUserId", sId);
						var sUserType = data.primaryType;
						writeCookie("sUserType", sUserType);
						writeCookie("tokenTime", data.tokenGeneratedTime);
						writeCookie("validitySkip", false);
						writeCookie("cmsSkip", false);
						console.log(sUserType);
						redirectUrl = getCookie("redirectUrl");
						if (sUserType == "LENDER" && redirectUrl != "") {
							window.location = redirectUrl;
						} else if (sUserType == "LENDER" && redirectUrl == "") {
							window.location = "idb";
						} else if (sUserType == "HELPDESKADMIN") {
							window.location = "admin/helpdeskadmin";
						} else if (
							sUserType == "ADMIN" ||
							sUserType == "RADHAADMIN" ||
							sUserType == "OXYWHEELSADMIN" ||
							sUserType == "NOTBORROWER"
						) {
							writeCookie("interestRejected", false);
							writeCookie("principalRejected", false);

							window.location = "admin/dashboard";
						} else if (sUserType == "PAYMENTSADMIN") {
							window.location = "admin/paymentsUpload";
						} else if (sUserType == "SUBBUADMIN") {
							window.location = "showInterestPayments";
						} else if (sUserType == "PARTNERADMIN") {
							window.location = "admin/createUtmforpartnerDealer";
						} else {
							window.location = "borrowerDashboard";
						}
					},
					statusCode: {
						200: function (response) {
							console.log("Login Successs");
						},
						401: function (response) {
							$(".erroruser").show();
							$(".displayScreenFlowArw").show();
							$(".displayScreenFlowRefresh").hide();
						},
						400: function (response) {
							var _errorCodeis = response.responseJSON["errorCode"];
							var _errorCodeTextIs = response.responseJSON["errorMessage"];
							if (_errorCodeis == 128) {
								getUseridFromErrorMessage = _errorCodeTextIs.split(
									"User email is null userId = "
								)[1];
								$("#getnullUserId").val(getUseridFromErrorMessage);
								$(".enterUSERLOGINSection").hide();
								$(".enteremailnullSection").show();
							}
							if (_errorCodeis == 113) {
								if (userisIn == "prod") {
									getidFromErrorMessage = _errorCodeTextIs.split("=")[1];
									getEmailFromErrorMessage = _errorCodeTextIs.split("=")[2];

									$(".useremailtoverify").html(getEmailFromErrorMessage);
									$(".displayScreenFlowRefresh").hide();

									$(".notverified").show();
									setTimeout(function () {
										sendActivationNullEmail(getidFromErrorMessage, "true");
									}, 3000);
								} else {
									getidFromErrorMessage = _errorCodeTextIs.split("=")[1];
									getEmailFromErrorMessage = _errorCodeTextIs.split("=")[2];

									$(".useremailtoverify").html(getEmailFromErrorMessage);
									$(".displayScreenFlowRefresh").hide();

									$(".notverified").show();
									setTimeout(function () {
										sendActivationNullEmail(getidFromErrorMessage, "true");
									}, 3000);
								}
							}
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
					var isValidityExpire = data.validityCheck;

					redirectUrl = getCookie("redirectUrl");

					if (sUserType == "LENDER" && redirectUrl != "") {
						window.location = redirectUrl;
					} else if (sUserType == "LENDER" && redirectUrl == "") {
						window.location = "idb";
					} else if (sUserType == "TESTADMIN" && redirectUrl == "") {
						window.location = "admin/dashboard";}
						else if (sUserType == "SUPERADMIN" && redirectUrl == "") {
							window.location = "admin/dashboard";}
						else if (sUserType == "PRIMARYADMIN" && redirectUrl == "") {
							window.location = "admin/dashboard";}
						else if (sUserType == "STUDENTADMIN" && redirectUrl == "") {
							window.location = "admin/dashboard";}
							else if (sUserType == "BORROWERADMIN" && redirectUrl == "") {
								window.location = "admin/dashboard";} 
							else if (sUserType == "MASTERADMIN" && redirectUrl == "") {
								window.location = "admin/dashboard";} else if (
									
						sUserType == "ADMIN" ||
						sUserType == "RADHAADMIN" ||
						sUserType == "OXYWHEELSADMIN"
				 		) {
						writeCookie("interestRejected", false);
						writeCookie("principalRejected", false);
						window.location = "admin/dashboard";
					} else if (sUserType == "PAYMENTSADMIN") {
						window.location = "admin/paymentsUpload";
					} else if (sUserType == "HELPDESKADMIN") {
						window.location = "admin/helpdeskadmin";
					} else if (sUserType == "SUBBUADMIN") {
						window.location = "admin/showInterestPayments";
					} else if (sUserType == "PARTNERADMIN") {
						window.location = "admin/createUtmforpartnerDealer";
					} else {
						window.location = "borrowerDashboard";
					}
				});
			},
		});
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

	$(".btn-back-reg").click(function (event) {
		$(".form-Step-1-of-2").hide();
		$(".form-Step-1").show();
	});

	$("#lendermobileverifybutton").click(function (event) {
		$(".sucessotp").hide();
		$(".loadingSec").show();
		$("#lendermobilesession").val("");
		var mobileNumber = $("#lmobileNumber").val();
		if (mobileNumber.length == 10) {
			if (userisIn == "local") {
				var getStatUrl =
					"http://35.154.48.120:8080/oxynew/v1/user/newregister";
			} else {
				var getStatUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
			}

			var postData = { mobileNumber: mobileNumber, citizenship: "NONNRI" };
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

	$("#getWhatsAppLogin").click(function (event) {
		var countrycode = $(".iti__selected-dial-code").html().substring(1);
		const whatsappNo = $("#whatsappNumber").val();
		if (whatsappNo == "") {
			$(".whatsapplogInOtp").show();
		} else {
			$(".whatsapplogInOtp").hide();
		}

		if (userisIn == "local") {
			var WhatsAppLoginUrls =
				"http://35.154.48.120:8080/oxynew/v1/user/whatsapp-login-otp";
		} else {
			var WhatsAppLoginUrls =
				"https://fintech.oxyloans.com/oxyloans/v1/user/whatsapp-login-otp";
		}
		var postData = { whatsappNumber: countrycode + whatsappNo };
		var postData = JSON.stringify(postData);

		$.ajax({
			url: WhatsAppLoginUrls,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#whatsappOtpNumber").show();
				$("#whatsappOtpBlock").hide();
				$("#whatsLoginDiv").show();

				sessionStorage.setItem("whatsAppsession", data.session);
				sessionStorage.setItem("whatsappId", data.id);
				sessionStorage.setItem("WhatsAppGeneratedTime", data.otpGeneratedTime);
			},
			statusCode: {
				200: function (response) {},
				400: function (response) {
					var _errorCodeis = response.responseJSON["errorCode"];
					var _errorCodeTextIs = response.responseJSON["errorMessage"];

					$(".whatsapplogInOtp").html(_errorCodeTextIs);
					$(".whatsapplogInOtp").show();
					$(".whatsapplogInOtp")
						.fadeOut(100)
						.fadeIn(100)
						.fadeOut(100)
						.fadeIn(100);
				},

				401: function (response) {
					$(".erroruser").show();
				},
				409: function (response) {},
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
		});
	});

	$("#whatsLoginDivsignIn").click(function (event) {
		var countrycode = $(".iti__selected-dial-code").html().substring(1);
		var whatsappNumber = $("#whatsappNumber").val();
		var whatsappOtp = $("#whatsappOtpNumber").val();

		if (whatsappNumber == "") {
			$(".whatsapplogInOtp").show();
			return false;
		} else {
			$(".whatsapplogInOtp").hide();
		}

		if (whatsappOtp == "") {
			$(".whatsapplogInOtperror").show();
			return false;
		} else {
			$(".whatsapplogInOtperror").hide();
		}

		var postData = {
			whatsappNumber: countrycode + whatsappNumber,
			session: sessionStorage.getItem("whatsAppsession"),
			otp: whatsappOtp,
			id: sessionStorage.getItem("whatsappId"),
			otpGeneratedTime: sessionStorage.getItem("WhatsAppGeneratedTime"),
		};

		var postData = JSON.stringify(postData);
		console.log(postData);
		var whatsAppLoginUrls = baseUrl + "v1/user/whatsapp-login-otp-verification";
		$.ajax({
			url: whatsAppLoginUrls,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data) {
				userID = data.id;
				userType = data.primaryType;
				var sId = data.id;
				writeCookie("sUserId", sId);
				var sUserType = data.primaryType;
				writeCookie("sUserType", sUserType);

				if (sUserType == "LENDER") {
					window.location = "idb";
				} else if (sUserType == "ADMIN") {
					window.location = "admin/dashboard";
				} else if (sUserType == "PAYMENTSADMIN") {
					window.location = "admin/paymentsUpload";
				} else if (sUserType == "PARTNERADMIN") {
					window.location = "admin/createUtmforpartnerDealer";
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
				window.location = "idb";
			} else if (sUserType == "ADMIN") {
				window.location = "admin/dashboard";
			} else if (sUserType == "PAYMENTSADMIN") {
				window.location = "admin/paymentsUpload";
			} else if (sUserType == "PARTNERADMIN") {
				window.location = "admin/createUtmforpartnerDealer";
			} else {
				window.location = "borrowerDashboard";
			}
		});
	});

	$("#whatsappverifybutton").click(function (event) {
		$(".sucessotp").hide();
		$(".loadingSec").show();
		$(".bwhatsappOtpHide").show();

		sUserId = getCookie("whatsappUserId");
		var userIDBwhatsapp = userIDWhatsapp;
		var mobileNumber = $("#bWhatsappNo").val();
		var countrycode = $(".iti__selected-dial-code").html();
		countrycode = countrycode.substr(1);
		var whatsappnumber = countrycode + mobileNumber;

		if (mobileNumber == "") {
			$(".whatsnoerror").show();
		} else {
			$(".bwhatsappOtpHide").show();
		}

		if (userisIn == "local") {
			var getStatUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/newregister";
		} else {
			var getStatUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
		}

		var postData = { whatsappNumber: whatsappnumber, id: userIDBwhatsapp };
		var postData = JSON.stringify(postData);

		$.ajax({
			url: getStatUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".btn-textchangeforwhatsapp").html("Resend OTP");
				$(".btn-textchangeforwhatsapp").addClass("btn-warning");
				$(".whatsnoerror").hide();

				if (data.mobileverified == true) {
					$("#modal-mobileerror").modal("show");
				}
				$(".loadingSec").hide();
			},
			statusCode: {
				200: function (response) {
					//alert(1);

					$(".sucessotp").show();
				},
				401: function (response) {
					$(".erroruser").show();
				},
				409: function (response) {
					$("#modal-mobileerror").modal("show");
					$(".loadingSec").hide();
				},
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
		});
	});

	$("#borrowerStep2whatsappverification").click(function (event) {
		$(".sucessotp").hide();
		$(".loadingSec").show();
		$(".bwhatsappOtpHide").show();

		var mobileNumber = $("#bWhatsappNo").val();
		var countrycode = $(".iti__selected-dial-code").html();
		countrycode = countrycode.substr(1);
		var whatsappnumber = countrycode + mobileNumber;
		var userId = $("#borrwerIdStep2").val();

		if (mobileNumber == "") {
			$(".whatsnoerror").show();
		} else {
			$(".bwhatsappOtpHide").show();
		}

		if (userisIn == "local") {
			var getStatUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/newregister";
		} else {
			var getStatUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
		}

		var postData = { whatsappNumber: whatsappnumber, id: userId };
		var postData = JSON.stringify(postData);

		$.ajax({
			url: getStatUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".btn-textchangeforwhatsapp").html("Resend OTP");
				$(".btn-textchangeforwhatsapp").addClass("btn-warning");
				$(".whatsnoerror").hide();

				if (data.mobileverified == true) {
					$("#modal-mobileerror").modal("show");
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
	});

	$("#lenderwhatsappverifybutton").click(function (event) {
		$(".sucessotp").hide();

		var mobileNumber = $("#lWhatsappNo").val();
		var countrycode = $(".iti__selected-dial-code").html();
		countrycode = countrycode.substr(1);
		var whatsappnumber = countrycode + mobileNumber;
		var userIDBwhatsapp = lenderIDWhatsapp;

		if (mobileNumber == "") {
			$(".whatsnoerror").show();
		} else {
			$(".lwhatsappOtpHide").show();
		}

		console.log("user id is " + lenderIDWhatsapp);

		if (userisIn == "local") {
			var getStatUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/newregister";
		} else {
			var getStatUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
		}
		//var getStatUrl = "http://35.154.48.120:8080/oxynew/v1/user/newregister";
		var postData = { whatsappNumber: whatsappnumber, id: userIDBwhatsapp };
		var postData = JSON.stringify(postData);

		$.ajax({
			url: getStatUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".btn-textchangeforwhatsapp").html("Resend OTP");
				$(".btn-textchangeforwhatsapp").addClass("btn-warning");
				$(".whatsnoerror").hide();

				if (data.mobileverified == true) {
					$("#modal-mobileerror").modal("show");
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
	});

	$("#lenderStep2WhatsappVerification").click(function (event) {
		$(".sucessotp").hide();
		$(".lwhatsappOtpHide").show();

		var mobileNumber = $("#lWhatsappNo").val();
		var countrycode = $(".iti__selected-dial-code").html();
		countrycode = countrycode.substr(1);
		var whatsappnumber = countrycode + mobileNumber;
		var userID = $("#userIdStep2").val();

		if (mobileNumber == "") {
			$(".whatsnoerror").show();
		} else {
			$(".lwhatsappOtpHide").show();
		}

		if (userisIn == "local") {
			var getStatUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/newregister";
		} else {
			var getStatUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
		}

		var postData = { whatsappNumber: whatsappnumber, id: userID };
		var postData = JSON.stringify(postData);
		console.log("******");
		console.log(postData);
		console.log("******");
		$.ajax({
			url: getStatUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".loadingSec").hide();
				$(".btn-textchangeforwhatsapp").html("Resend OTP");
				$(".btn-textchangeforwhatsapp").addClass("btn-warning");
				$(".whatsnoerror").hide();

				if (data.mobileverified == true) {
					$("#modal-mobileerror").modal("show");
				}
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
	});

	$("#lenderNRImobileverifybutton").click(function (event) {
		$(".sucessotp").hide();
		$("#lendermobilesession").val("");
		var mobileNumber = $("#lmobileNumber").val();
		var accvaltype = $("#acctypeVal").val();
		if (mobileNumber.length > 5) {
			if (userisIn == "local") {
				var getStatUrl =
					"http://35.154.48.120:8080/oxynew/v1/user/newregister";
			} else {
				var getStatUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
			}

			var postData = { mobileNumber: mobileNumber, citizenship: accvaltype };
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
					200: function (response) {},
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

	$("#lenderNRIpincode").on("keyup", function (e) {
		if ($("#lenderNRIpincode").val().length == 4) {
			$("#lenderNRImobileverifybutton").trigger("click");
		}
	});

	$("#lenderpincode").on("keyup", function (e) {
		$("#lenderstateValue").val("");
		var $this = $(this);
		if ($this.val().length == 6) {
			var pincode = $("#lenderpincode").val();

			if (userisIn == "local") {
				var getStatUrl =
					"http://35.154.48.120:8080/oxynew/v1/user/" +
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
					//
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
						$("#lenderstateValue").val(data.state);
						$("#lendercityValue-error").html("");
						$("#lendercityValue").removeClass("error");
					} else {
						//$("#labelpincode").html("Please enter the correct pincode");
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

			if ($("#lenderlocalityValue").val() == "Visakhapatnam (Urban)") {
				localityVal = "VSKP URBAN";
			} else {
				localityVal = $("#lenderlocalityValue").val();
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
				locality: localityVal,
				uniqueNumber: $("#lenderunique").val(),
				citizenship: "NONNRI",
			};

			var postData = JSON.stringify(postData);
			var regUrl = baseUrl + "v1/user/newregister";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, request) {
					userID = data.id;
					lenderIDWhatsapp = userID;
					console.log("lenderIDWhatsapp is " + lenderIDWhatsapp);
					gMobileNumber = data.mobileNumber;
					writeCookie("whatsappUserId", userID);
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
					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});

	$("#lenderNRImobileSection").validate({
		rules: {
			lmobileNumber: {
				required: true,
				minlength: 5,
			},

			lenderemail: {
				required: true,
			},

			lenderfirstname: {
				required: true,
			},

			lenderNRIpassword: {
				required: true,
			},
		},
		messages: {
			lmobileNumber: {
				required: "Please enter your mobile number",
			},

			lenderemail: {
				required: "Please enter your email.",
			},
			lenderfirstname: {
				required: "Please enter your first name.",
			},

			lenderNRIpassword: {
				required: "Please enter your password.",
			},
		},

		submitHandler: function () {
			var postData = {
				mobileNumber: $("#lmobileNumber").val(),
				mobileOtpSession: null,
				mobileOtpValue: null,
				primaryType: "LENDER",
				name: $("#lenderfirstname").val(),
				email: $("#lenderemail").val(),
				password: $("#lenderNRIpassword").val(),
				citizenship: "NRI",
				uniqueNumber: $("#lenderunique").val(),
				utm: $("#utmSource").val(),
				cifNumber: null,
				finoEmployeeMobileNumber: null,
			};

			var postData = JSON.stringify(postData);
			var regUrl = baseUrl + "v1/user/newUserRegistration";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, request) {
					$(".lenderstep1").css("display", "none");
					$(".lenderstep2").css("display", "block");
				},
				statusCode: {
					400: function (response) {
						$(".loadingSec").hide();
						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];

						if (_errorCodeis == "108") {
							if (
								_errorCodeTextIs == "Registation already done using this email"
							) {
								$(".emailValue-error").html("E-mail is already registered.");
								$(".emailValue-error")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
								$(".emailValue-error").show();
							} else if (
								_errorCodeTextIs ==
								"This mobile number has already been registered."
							) {
								$(".mobileError_Message")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
								$(".mobileError_Message").show();
							} else if (
								_errorCodeTextIs ==
								"Registation already done using this mobile number"
							) {
								$(".newMobileDiv").addClass("has-error");
								$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
								$("#regMobileNumber")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
								$(".mobileError_Message").html(
									"Registation already done using this mobile number"
								);
								$(".mobileError_Message").show();
							}
						} else {
							var _errorCodeTextIs = response.responseJSON["errorMessage"];
							var _registeredEmailId = _errorCodeTextIs;
							_userIDfromTheError = _registeredEmailId.split("id=")[1];
							console.log(_userIDfromTheError);

							var _registeredEmailId_Dummy =
								_registeredEmailId.split("email=")[1];

							_registeredEmailId_Dummy = _registeredEmailId_Dummy.split(" ")[0];

							console.log(_registeredEmailId_Dummy);
							var str = _registeredEmailId_Dummy.replace(/\d(?=\d{13})/g, "*");

							$(".myprevRegEmailId").html(str);
							$(".sendActivationLink").attr("data-userID", _userIDfromTheError);
							$("#modal-emailSentAlready").modal("show");
						}
					},
					200: function (response) {
						console.log("Login Successs");
					},
					401: function (response) {
						$(".erroruser").show();
					},
					409: function (response) {
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
		event.preventDefault();
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

		if (userisIn == "local") {
			var getStatUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/newregister";
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
					$(".erroruser").show();
				},
				409: function (response) {
					// alert('1');
					$("#modal-emailerror").modal("show");
				},
			},
			error: function (request, error) {
				if (arguments[0].responseJSON.errorCode == 113) {
					$(".errorotp").show();
				}
			},
		});
		
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
			lwhatsappNumber: {
				required: "Please enter Whatsapp Number",
			},
			lwhatappotpvalue: {
				required: "Please enter Whatsapp OTP.",
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
			var uniqueNumber = $("#lenderunique").val();
			var lwhatsappNo = $("#lWhatsappNo").val();
			var lcountryCode = $(".iti__selected-dial-code").html();

			if (lwhatsappNo == "") {
				var lenderWhatsNumber = null;
				var lwhatsAppOtp = null;
			} else {
				var lenderWhatsNumber = lcountryCode + lwhatsappNo;
				var lwhatsAppOtp = $("#lwhatsappotpvalue").val();
			}

			var postData = {
				mobileNumber: mobileNumber,
				email: email,
				emailOtp: emailotpvalue,
				amountInterested: amt,
				password: pass,
				gender: gender,
				uniqueNumber: uniqueNumber,
				whatsappNumber: lenderWhatsNumber,
				whatsappOtp: lwhatsAppOtp,
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
					401: function (response) {},
					409: function (response) {
						$("#modal-mobileerror").modal("show");
					},
					404: function (response) {
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
					500: function (response) {
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},

				error: function (request, error) {
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

	$("#mobileverifybutton").click(function (event) {
		$(".loadingSec").show();
		$(".sucessotp").hide();
		$("#mobilesession").val("");
		var mobileNumber = $("#bmobileNumber").val();
		if (mobileNumber.length == 10) {
			if (userisIn == "local") {
				var getStatUrl =
					"http://35.154.48.120:8080/oxynew/v1/user/newregister";
			} else {
				var getStatUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
			}

			var postData = { mobileNumber: mobileNumber, citizenship: "NONNRI" };
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
						$(".errorotp").show();
					},
					409: function (response) {
						$(".loadingSec").hide();
						$("#modal-mobileerror").modal("show");
					},
				},
				error: function (request, error) {
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

			if (userisIn == "local") {
				var getStatUrl =
					"http://35.154.48.120:8080/oxynew/v1/user/" +
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
						$("#stateValue").val(data.state);
						$("#cityValue-error").html("");
						$("#cityValue").removeClass("error");
					} else {
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
				uniqueNumber: $("#buniquenumber").val(),
				citizenship: "NONNRI",
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
					userID = data.id;
					userIDWhatsapp = data.id;
					gMobileNumber = data.mobileNumber;
					console.log(userID);
					$(".step1").css("display", "none");
					$(".step2").css("display", "block");
				},
				statusCode: {
					200: function (response) {
						console.log("Login Successs");
					},
					401: function (response) {
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
				"http://35.154.48.120:8080/oxynew/v1/user/newregister";
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
				401: function (response) {
					$(".erroruser").show();
				},
				409: function (response) {
					$("#modal-emailerror").modal("show");
				},
			},
			error: function (request, error) {
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
			firstname: {
				required: true,
			},
			lastname: {
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
				required: true,
			},
			cityValue: {
				required: true,
			},
			dateofbirth: {
				dateFormat: true,
			},
			pincode: {
				required: true,
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
				mobileNumber: mobileNumber,
				amountInterested: amt,
				firstName: firstname,
				lastName: lastname,
				gender: gender,
				email: email,
				pinCode: pinCode,
				city: cityValue,
				dob: dob,
				state: stateValue,
				locality: "NA",
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
					userID = data.id;
					gMobileNumber = data.mobileNumber;
					console.log(userID);
					alert("Registration is Success!");
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
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},

				error: function (request, error) {
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
			bwhatsappNumber: {
				required: "Please enter your  whatsapp Number",
			},

			bwhatsAppotpvalue: {
				required: "Please enter WhatsApp OTP",
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
			var buniquenumber = $("#buniquenumber").val();
			var bwhatsappNo = $("#bWhatsappNo").val();
			var bcountryCode = $(".iti__selected-dial-code").html();

			if (bwhatsappNo == "") {
				var borrowerWhatsNumber = null;
				var bwhatsAppOtp = null;
			} else {
				var borrowerWhatsNumber = bcountryCode + bwhatsappNo;
				var bwhatsAppOtp = $("#botpvalue").val();
			}

			var postData = {
				mobileNumber: mobileNumber,
				email: email,
				emailOtp: emailotpvalue,
				password: pass,
				gender: gender,
				uniqueNumber: buniquenumber,
				whatsappNumber: borrowerWhatsNumber,
				whatsappOtp: bwhatsAppOtp,
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
					userID = data.id;
					gMobileNumber = data.mobileNumber;
					writeCookie("whatsappUserId", userID);
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
					401: function (response) {},
					113: function (response) {
						alert(1);
					},
					409: function (response) {
						$("#modal-mobileerror").modal("show");
					},
					404: function (response) {
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
					500: function (response) {
						bootbox.alert(
							'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
							function () {}
						);
					},
				},

				error: function (request, error) {
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
			var enteredOTPValue = $("#otpValue").val();
			var enteredEmail = $("#emailValue").val();
			var postData = {
				mobileNumber: gMobileNumber,
				mobileOtpValue: enteredOTPValue,
				email: enteredEmail,
			};

			var postData = JSON.stringify(postData);

			let regUrl = baseUrl + "v1/user/register";

			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					$("#modal-RegisterSuccess").modal("show");
					setTimeout(function () {
						window.location = "userlogin";
					}, 15000);
				},

				statusCode: {
					200: function (response) {
						console.log("Login Successs");
					},
					401: function (response) {
						$(".erroruser").show();
					},
					409: function (response) {
						$("#modal-emailerror").modal("show");
					},
					203: function (response) {},
				},
				error: function (request, error) {},
			});
		},
	});
	// user login validations//

	$(".emailbtnValue").click(function () {
		$(".btnvalue, .userLoginH1").hide();
		$(".enterUSERLOGINSection").show();
	});

	$(".mobilebtnValue").click(function () {
		// alert(1);
		$(".btnvalue, .userLoginH1, .enterUSERLOGINSection").hide();
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

		let regUrl = baseUrl + "v1/user/sendOtp";
		if (isValid == true) {
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
				},
				statusCode: {
					400: function (response) {
						$("#modal-moblie").modal("show");
						setTimeout(function () {
							window.location = "userlogin";
						}, 5000);

						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];

						if (_errorCodeis == 113) {
							getidFromErrorMessage = _errorCodeTextIs.split("=")[1];
							getEmailFromErrorMessage = _errorCodeTextIs.split("=")[2];
							$(".useremailtoverify").html(getEmailFromErrorMessage);
							$(".displayScreenFlowRefresh").hide();

							$(".notverified").show();
							setTimeout(function () {
								sendActivationNullEmail(getidFromErrorMessage, "true");
							}, 3000);
						}
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
		let regUrl = baseUrl + "v1/user/login?grantType=PWD";
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",

				dataType: "json",
				success: function (data) {
					console.log("**********");
					console.log("personal details", data);

					userType = data.primaryType;
					mobileNumber = data.mobileNumber;
					userID = data.id;
					var sId = data.id;
					writeCookie("sUserId", sId);
					var sUserType = data.primaryType;
					writeCookie("sUserType", sUserType);
					if (data.emailVerified == true) {
						if (sUserType == "LENDER") {
							window.location = "idb";
						} else {
							window.location = "borrowerDashboard";
						}
					} else {
						if (sUserType == "LENDER") {
							window.location = "register_active_proceed?id=" + sId;
						} else {
							window.location = "register_active_proceed?id=" + sId;
						}
					}
				},
				statusCode: {
					400: function (response) {
						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];

						if (_errorCodeis == 103) {
							$(".errorinvalidOtp").show();
						}

						if (_errorCodeis == 113) {
							if (userisIn == "prod") {
								getidFromErrorMessage = _errorCodeTextIs.split("=")[1];
								getEmailFromErrorMessage = _errorCodeTextIs.split("=")[2];

								$(".useremailtoverify").html(getEmailFromErrorMessage);
								$(".displayScreenFlowRefresh").hide();

								$(".notverified").show();
								setTimeout(function () {
									sendActivationNullEmail(getidFromErrorMessage, "true");
								}, 3000);
							} else {
								getidFromErrorMessage = _errorCodeTextIs.split("=")[1];
								getEmailFromErrorMessage = _errorCodeTextIs.split("=")[2];

								$(".useremailtoverify").html(getEmailFromErrorMessage);
								$(".displayScreenFlowRefresh").hide();

								$(".notverified").show();
								setTimeout(function () {
									sendActivationNullEmail(getidFromErrorMessage, "true");
								}, 3000);
							}
						}
					},
				},
			}).done(function (data, textStatus, xhr) {
				console.log(xhr.getResponseHeader("accessToken"));
				console.log("=========");
				accessToken = xhr.getResponseHeader("accessToken");
				writeCookie("saccessToken", accessToken);
				var sUserType = data.primaryType;
				var mobileNumber = data.mobileNumber;
				if (data.emailVerified == true) {
					if (sUserType == "LENDER") {
						window.location = "idb";
					} else {
						window.location = "borrowerDashboard";
					}
				} else {
					writeCookie("smbl", mobileNumber);
					if (sUserType == "LENDER") {
						window.location = "register_active_proceed?id=" + sId;
					} else {
						window.location = "register_active_proceed?id=" + sId;
					}
				}
			});
		}
		return isValid;
	});

	//FORGOT EMAIL AND MOBILE FUNCTION//

	$("#resetbtn").click(function () {
		var enteredemailValue = $("#email").val();

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

		if (userisIn == "local") {
			var passwordregUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/resetpassword";
		} else {
			var passwordregUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/resetpassword";
		}

		$.ajax({
			url: passwordregUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data) {
				$("#modal-resetSuccess").modal("show");
			},
			statusCode: {
				400: function (response) {
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
		let regUrl = baseUrl + "v1/user/resetpassword/" + emailToken + "";
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

	$(document).ready(function () {
		$(".sendActiveOnEmail").click(function () {
			$("#modal-resendEmialagain").modal("show");
		});
	});

	$(document).ready(function () {
		$("#sendActivationEmail").click(function () {
			var email = $("#verifiedUserEmail").val();
			var userId = getidFromErrorMessage;
			if (userisIn == "local") {
				var sendactivation =
					"http://35.154.48.120:8080/oxynew/v1/user/emailIdUpdationToOldUsers";
			} else {
				var sendactivation =
					"https://fintech.oxyloans.com/oxyloans/v1/user/emailIdUpdationToOldUsers";
			}

			var postData = {
				userId: userId,
				email: email,
			};
			var postData = JSON.stringify(postData);

			$.ajax({
				url: sendactivation,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-resendEmialagain").modal("hide");
					$(".notverified").hide();
					$(".sentemailActivation").show();
				},
				statusCode: {
					400: function (response) {
						$("#modal-resendEmialagain").modal("hide");

						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];

						console.log(_errorCodeis);
						console.log(_errorCodeTextIs);

						if (_errorCodeis == 108) {
							alert(_errorCodeTextIs);
						}

						if (_errorCodeis == 105) {
							alert(_errorCodeTextIs);
						}
					},
				},

				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
			});
		});
	});

	$.validator.addMethod(
		"atLeastOneLowercaseLetter",
		function (value, element) {
			return this.optional(element) || /[a-z]+/.test(value);
		},
		"Must have at least one lowercase letter"
	);

	$.validator.addMethod(
		"atLeastOneUppercaseLetter",
		function (value, element) {
			return this.optional(element) || /[A-Z]+/.test(value);
		},
		"Must have at least one uppercase letter"
	);

	$.validator.addMethod(
		"atLeastOneNumber",
		function (value, element) {
			return this.optional(element) || /[0-9]+/.test(value);
		},
		"Must have at least one number"
	);

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
			let regUrl = baseUrl + "v1/user/register/" + emailToken + "/verify";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					$("#modal-activateUser").modal("show");
					setTimeout(function () {
						window.location = "userlogin";
					}, 10000);
				},
				error: function (request, error) {
					$("#modal-activateUser-error").modal("show");
				},
			});
		},
	});
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
			window.location = "idb";
		}
	} else {
		window.location = "userlogin";
		return false;
	}
	//return suserId, sprimaryType, saccessToken;
}

// $(document).ready(function ($) {
// 	$('[data-toggle="tooltip"]').tooltip();
// 	$(".passwordValue").passtrength({
// 		minChars: 8,
// 		passwordToggle: true,
// 		tooltip: true,
// 	});
// });

// function setProfilePicURL() {
// 	console.log("test");
// }

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
			"Mysore",
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

function submitDataNotification() {}

function renderButton() {
	gapi.signin2.render("gSignIn", {
		scope: "profile email",
		width: 200,
		height: 33,
		longtitle: true,
		theme: "dark",
		onsuccess: onSuccess,
		onfailure: onFailure,
	});
}
// Sign-in success callback
function onSuccess(googleUser) {
	gapi.client.load("oauth2", "v2", function () {
		var request = gapi.client.oauth2.userinfo.get({
			userId: "me",
		});
		request.execute(function (resp) {
			var myXhr = Object.values(resp);
			var myString = JSON.stringify(myXhr);
			name = resp.given_name;
			gender = resp.gender;
			email = resp.email;
			id = resp.id;
			link = resp.link;
			emailVerified = resp.verified_email;
			lastname = resp.family_name;
			checkingUserInDb(email, id);
		});
	});
}

// Sign-in failure callback
function onFailure(error) {}

////////checking user in the db//////

function checkingUserInDb(email, googleUserId) {
	$(".loadingSec").show();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var email = email;
	var googleUserId = googleUserId;

	if (userisIn == "local") {
		var updateCommentUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/veifyExistenceOfSocialLoginUser";
	} else {
		var updateCommentUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/veifyExistenceOfSocialLoginUser";
	}

	var postData = {
		emailId: email,
		googleUserId: googleUserId,
	};
	var postData = JSON.stringify(postData);
	$.ajax({
		url: updateCommentUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.userExists == true) {
				submit();
			}
			if (data.userExists == false) {
				window.location =
					"gmailUserRegister?id=" +
					id +
					"&Email=" +
					email +
					"&Name=" +
					name +
					"&Gender=" +
					gender +
					"&emailVerified=" +
					emailVerified +
					"&lastname=" +
					lastname;
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".loadingSec").hide();
			$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);
			if (arguments[0].responseJSON.errorCode == 108) {
				$("#modal-gmailUserError").modal("show");
			}
			if (arguments[0].responseJSON.errorCode == 404) {
				// window.location="userSocialLogins";
				window.location =
					"userSocialLogins?id=" + id + "&Email=" + email + "&Utm=Gmail";
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

/////////exitising user login with Email//////////////

function submit() {
	var enteredEmail = email;
	var googleid = id;
	var postData = {
		email: enteredEmail,
		utmSource: "Gmail",
		socialLoginUserId: googleid,
	};
	var postData = JSON.stringify(postData);
	console.log(postData);
	let regUrl = baseUrl + "v1/user/login?grantType=PWD";
	$.ajax({
		url: regUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data) {
			userID = data.id;
			userType = data.primaryType;
			var sId = data.id;
			writeCookie("sUserId", sId);
			var sUserType = data.primaryType;
			writeCookie("sUserType", sUserType);

			if (sUserType == "LENDER") {
				window.location = "idb";
			} else if (sUserType == "ADMIN") {
				window.location = "admin/dashboard";
			} else if (sUserType == "PAYMENTSADMIN") {
				window.location = "admin/paymentsUpload";
			} else {
				window.location = "borrowerDashboard";
			}
			$(".loadingSec").hide();
		},
		statusCode: {
			200: function (response) {
				console.log("Login Successs");
			},
			401: function (response) {
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
			window.location = "idb";
		} else if (sUserType == "ADMIN") {
			window.location = "admin/dashboard";
		} else if (sUserType == "PAYMENTSADMIN") {
			window.location = "admin/paymentsUpload";
		} else {
			window.location = "borrowerDashboard";
		}
	});
}

////////////////////registration step//////////////
$(document).ready(function () {
	$("#userloginSections").validate({
		rules: {
			emailValues: {
				required: true,
			},
			passwords: {
				required: true,
			},
		},
		messages: {
			emailValues: {
				required: "Please enter mobile   number/email",
			},
			passwords: {
				required: "Please enter   password",
			},
		},
		//user login api call//
		submitHandler: function () {
			var enteredEmail = $("#emailValues").val();
			var enteredPassword = $("#passwords").val();
			var gmailid = $("#gmailid").val();
			var utmInput = $("#utmInput").val();

			var postData = {
				password: enteredPassword,
				email: enteredEmail,
				utmSource: utmInput,
				socialLoginUserId: gmailid,
			};

			var postData = JSON.stringify(postData);
			console.log(postData);
			var regUrl = baseUrl + "v1/user/login?grantType=PWD";
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				//contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
				dataType: "json",
				success: function (data) {
					//headers: {'accessToken': "token String"},
					userID = data.id;
					userType = data.primaryType;
					var sId = data.id;
					writeCookie("sUserId", sId);
					var sUserType = data.primaryType;
					writeCookie("sUserType", sUserType);

					if (sUserType == "LENDER") {
						window.location = "idb";
					} else if (sUserType == "ADMIN") {
						window.location = "admin/dashboard";
					} else if (sUserType == "PAYMENTSADMIN") {
						window.location = "admin/paymentsUpload";
					} else if (sUserType == "PARTNERADMIN") {
						window.location = "admin/createUtmforpartnerDealer";
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
					window.location = "idb";
				} else if (sUserType == "ADMIN") {
					window.location = "admin/dashboard";
				} else if (sUserType == "PAYMENTSADMIN") {
					window.location = "admin/paymentsUpload";
				} else if (sUserType == "PARTNERADMIN") {
					window.location = "admin/createUtmforpartnerDealer";
				} else {
					window.location = "borrowerDashboard";
				}
			});
		},
	});
});

function verifyGmailUserNumber() {
	$(".sucessotp").hide();
	$(".loadingSec").show();
	$("#gmailUsermobilesession").val("");
	var mobileNumber = $("#gmailUsermobileNumber").val();
	if (mobileNumber.length == 10) {
		if (userisIn == "local") {
			var getStatUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/newregister";
		} else {
			var getStatUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newregister";
		}

		var postData = { mobileNumber: mobileNumber, citizenship: "NONNRI" };
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
					$("#gmailUsermobilesession").val(data.mobileOtpSession);
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
}

//////////facebook functionality start////////////////////////////////

function statusChangeCallback(response) {
	console.log("statusChangeCallback");
	console.log(response);
	if (response.status === "connected") {
		getFbUserData();
	}
}

window.fbAsyncInit = function () {
	FB.init({
		appId: "1574561632903072",
		cookie: true,
		xfbml: true,
		version: "v3.2",
	});
};

(function (d, s, id) {
	var js,
		fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
})(document, "script", "facebook-jssdk");

function fbLogin() {
	FB.login(
		function (response) {
			if (response.authResponse) {
				getFbUserData();
			}
		},
		{ scope: "email,public_profile" }
	);
}

function getFbUserData() {
	FB.api(
		"/me",
		{ locale: "en_US", fields: "id,first_name,last_name,email" },
		function (response) {
			var myXhr = Object.values(response);
			var myString = JSON.stringify(myXhr);
			fbfristname = response.first_name;
			fblastname = response.last_name;
			fbid = response.id;
			fbemail = response.email;
			checkingFbUserInDb(response.email, response.id);
		}
	);
}

///////checking user in database///////////////////////

function checkingFbUserInDb(fbemail, fbUserId) {
	$(".loadingSec").show();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var fbemail = fbemail;
	var fbUserId = fbUserId;

	if (userisIn == "local") {
		var updateCommentUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/veifyExistenceOfSocialLoginUser";
	} else {
		var updateCommentUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/veifyExistenceOfSocialLoginUser";
	}

	var postData = {
		emailId: fbemail,
		facebookUserId: fbUserId,
	};
	var postData = JSON.stringify(postData);
	$.ajax({
		url: updateCommentUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.userExists == true) {
				fbsubmit();
			}
			if (data.userExists == false) {
				window.location =
					"gmailUserRegister?id=" +
					fbid +
					"&Email=" +
					fbemail +
					"&Name=" +
					fbfristname +
					"&lastname=" +
					fblastname +
					"&emailVerified=true" +
					"&Utm=Facebook";
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".loadingSec").hide();
			$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);
			if (arguments[0].responseJSON.errorCode == 108) {
				$("#modal-gmailUserError").modal("show");
			}
			if (arguments[0].responseJSON.errorCode == 404) {
				// window.location="userSocialLogins";

				alert(arguments[0].responseJSON.errorMessage);
				window.location =
					"userSocialLogins?id=" + fbid + "&Email=" + fbemail + "&Utm=Facebook";
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

/////////exitising user login with Email for facebook//////////////

function fbsubmit() {
	var enteredEmail = fbemail;
	var facebookid = fbid;
	var postData = {
		email: enteredEmail,
		utmSource: "Facebook",
		socialLoginUserId: facebookid,
	};
	var postData = JSON.stringify(postData);

	console.log(postData);
	let regUrl = baseUrl + "v1/user/login?grantType=PWD";
	$.ajax({
		url: regUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data) {
			userID = data.id;
			userType = data.primaryType;
			var sId = data.id;
			writeCookie("sUserId", sId);
			var sUserType = data.primaryType;
			writeCookie("sUserType", sUserType);

			if (sUserType == "LENDER") {
				window.location = "idb";
			} else if (sUserType == "ADMIN") {
				window.location = "admin/dashboard";
			} else if (sUserType == "PAYMENTSADMIN") {
				window.location = "admin/paymentsUpload";
			} else {
				window.location = "borrowerDashboard";
			}
			$(".loadingSec").hide();
		},
		statusCode: {
			200: function (response) {
				console.log("Login Successs");
			},
			401: function (response) {
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
			window.location = "idb";
		} else if (sUserType == "ADMIN") {
			window.location = "admin/dashboard";
		} else if (sUserType == "PAYMENTSADMIN") {
			window.location = "admin/paymentsUpload";
		} else {
			window.location = "borrowerDashboard";
		}
	});
}

$(document).ready(function () {
	$("#gmailUserSection").validate({
		rules: {
			gmailUserfirstname: {
				required: true,
			},

			lmobileNumber: {
				minlength: 10,
				required: true,
			},

			glenderemailValue: {
				required: true,
			},

			primaryType: {
				required: true,
			},

			lenderotpvalue: {
				required: true,
			},

			lenderamtvalue: {
				required: true,
			},

			lendergender: {
				required: true,
			},
			usercity: {
				required: true,
			},
		},
		messages: {
			gmailUserfirstname: {
				required: "Please enter your  name",
			},
			lmobileNumber: {
				required: "Please enter your mobile number.",
			},

			glenderemailValue: {
				required: "Please enter your email.",
			},

			primaryType: {
				required: "please select primary type",
			},

			lenderotpvalue: {
				required: "please enter otp",
			},

			lenderamtvalue: {
				required: "please select loan amount",
			},

			lendergender: {
				required: "please select gender",
			},
			usercity: {
				required: "please enter your city",
			},
		},
		submitHandler: function () {
			var firstname = $("#gmailUserfirstname").val();
			var primaryType = $("#gmailprimaryType").val();
			var mobileNumber = $("#gmailUsermobileNumber").val();
			var mobileOtpValue = $("#gmailUserotpvalue").val();
			var email = $("#glenderemailValue").val();
			var mobileOtpSession = $("#gmailUsermobilesession").val();
			var amount = $("#select-beast").val();
			var gender = $("input[name='lendergender']:checked").val();
			var uniqueNumber = $("#uniqueNumber").val();
			var utm = $("#utmSource").val();
			var verified_email = $("#emailverified").val();
			var userlastname = $("#userLastname").val();
			var gmailid = $("#googleId").val();
			var citizenship = $("#acctype").val();
			var city = $("#usercity").val();

			var postData = {
				firstName: firstname,
				lastName: userlastname,
				type: primaryType,
				mobileNumber: mobileNumber,
				mobileOtpValue: mobileOtpValue,
				mobileOtpSession: mobileOtpSession,
				email: email,
				amountInterested: amount,
				gender: gender,
				uniqueNumber: uniqueNumber,
				utmSource: utm,
				citizenship: citizenship,
				city: city,
				socialLoginUserId: gmailid,
				gmailAccountVerified: verified_email,
			};

			var postData = JSON.stringify(postData);
			//console.log(postData);

			var regUrl = baseUrl + "v1/user/newRegistationWithSocialLogin";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, request) {
					userEmail = data.email;
					userUtm = data.utmSource;
					usersocialLoginUserId = data.socialLoginUserId;

					newsubmit(userEmail, userUtm, usersocialLoginUserId);
					$(".loadingSec").show();
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
					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});
});

// //////new user submit start////////////////////

function newsubmit(newUserEmail, utm, usersocialLoginUserId) {
	var enteredEmail = newUserEmail;
	var userutm = utm;
	var userusersocialLoginUserId = usersocialLoginUserId;
	var postData = {
		email: enteredEmail,
		utmSource: userutm,
		socialLoginUserId: userusersocialLoginUserId,
	};
	var postData = JSON.stringify(postData);
	console.log(postData);
	let regUrl = baseUrl + "v1/user/login?grantType=PWD";
	$.ajax({
		url: regUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data) {
			userID = data.id;
			userType = data.primaryType;
			var sId = data.id;
			writeCookie("sUserId", sId);
			var sUserType = data.primaryType;
			writeCookie("sUserType", sUserType);

			if (sUserType == "LENDER") {
				window.location = "idb";
			} else if (sUserType == "ADMIN") {
				window.location = "admin/dashboard";
			} else if (sUserType == "PAYMENTSADMIN") {
				window.location = "admin/paymentsUpload";
			} else {
				window.location = "borrowerDashboard";
			}
			$(".loadingSec").hide();
		},
		statusCode: {
			200: function (response) {
				console.log("Login Successs");
			},
			401: function (response) {
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
			window.location = "idb";
		} else if (sUserType == "ADMIN") {
			window.location = "admin/dashboard";
		} else if (sUserType == "PAYMENTSADMIN") {
			window.location = "admin/paymentsUpload";
		} else {
			window.location = "borrowerDashboard";
		}
	});
}

function searchExperts() {
	var suserId = $(".expertId").val();

	if (userisIn == "local") {
		var getExpert =
			"http://35.154.48.120:8080/oxynew/v1/user/uniqueLendersSearchCall/" +
			suserId;
	} else {
		var getExpert =
			"https://fintech.oxyloans.com/oxyloans/v1/user/uniqueLendersSearchCall/" +
			suserId;
	}
	$.ajax({
		url: getExpert,
		type: "GET",
		success: function (data, textStatus, xhr) {
			var template = document.getElementById("searchExpertsData").innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data });
			$("#searchData").html(html);
			$(".expertsDate-system").hide();
			$(".search-Lender-details").show();
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function getlistOfUniqueLenders() {
	if (userisIn == "local") {
		var getUnique =
			"http://35.154.48.120:8080/oxynew/v1/user/listOfUniqueLenders";
	} else {
		var getUnique =
			"https://fintech.oxyloans.com/oxyloans/v1/user/listOfUniqueLenders";
	}
	var postData = {
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: getUnique,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.countOfUniqueLenders;
			var template = document.getElementById("getLendingExpertsData").innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, {
				data: data.uniqueLendersResponse,
			});
			$("#displayExpertsData").html(html);
			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;

			$(".dashBoardPagination")
				.bootpag({
					total: displayPageNo,
					page: 1,
					maxVisible: 5,
					leaps: true,
					firstLastUse: true,
					first: "Ã¢â€ Â",
					last: "Ã¢â€ â€™",
					wrapClass: "pagination",
					activeClass: "active",
					disabledClass: "disabled",
					nextClass: "next",
					prevClass: "prev",
					lastClass: "last",
					firstClass: "first",
				})
				.on("page", function (event, num) {
					var postData = {
						pageNo: num,
						pageSize: "10",
					};
					var postData = JSON.stringify(postData);
					if (userisIn == "local") {
						var getDeals =
							"http://35.154.48.120:8080/oxynew/v1/user/listOfUniqueLenders";
					} else {
						var getDeals =
							"https://fintech.oxyloans.com/oxyloans/v1/user/listOfUniqueLenders";
					}
					$.ajax({
						url: getDeals,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template = document.getElementById(
								"getLendingExpertsData"
							).innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, {
								data: data.uniqueLendersResponse,
							});
							$("#displayExpertsData").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
	});
}

function getexpertMobileOtp() {
	var mobileNumber = $("#expertMobilenumber").val();
	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/sendMobileOtp";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/sendMobileOtp";
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
			$(".btn-textchangeforexpert").html("Resend OTP");
			$(".btn-textchangeforexpert").addClass("btn-warning");

			if (data.mobileverified == true) {
				$("#modal-mobileerror").modal("show");
			} else {
				$("#expertmobilesession").val(data.mobileOtpSession);
			}
			$(".loadingSec").hide();
		},
		statusCode: {
			200: function (response) {
				$(".sucessotp").show();
			},
			401: function (response) {
				$(".erroruser").show();
			},
			409: function (response) {
				$("#modal-mobileerror").modal("show");
				$(".loadingSec").hide();
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
	});
}

function getexpertEmailOtp() {
	$("#sucessotp").hide();
	var email = $("#expertemailValue").val();

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
			"http://35.154.48.120:8080/oxynew/v1/user/sendEmailOtp";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/sendEmailOtp";
	}

	var postData = { email: email };
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

			$("#expertEmailsesession").val(data.emailOtpSession);
			$("#expertsaltsesession").val(data.adviseSeekersSalt);
			$(".loadingSec").hide();
		},
		statusCode: {
			200: function (response) {
				$(".sucessotp").show();
			},
			401: function (response) {
				$(".erroruser").show();
			},
			409: function (response) {
				$("#modal-mobileerror").modal("show");
				$(".loadingSec").hide();
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
	});
}

$(document).ready(function () {
	$("#adviceSeekersection").validate({
		rules: {
			advicefirstname: {
				required: true,
			},

			expertMobileNumber: {
				minlength: 10,
				required: true,
			},

			expertotpvalue: {
				required: true,
			},

			expertEmailValue: {
				required: true,
			},

			expertemailotpvalue: {
				required: true,
			},

			expertText: {
				required: true,
			},
		},
		messages: {
			advicefirstname: {
				required: "Please enter your  name",
			},
			expertMobileNumber: {
				required: "Please enter your mobile number.",
			},

			expertotpvalue: {
				required: "please enter otp",
			},

			expertEmailValue: {
				required: "Please enter your email.",
			},

			expertemailotpvalue: {
				required: "please enter otp",
			},

			expertText: {
				required: "please enter message",
			},
		},
		submitHandler: function () {
			var name = $("#expertfirstname").val();
			var mobileNumber = $("#expertMobilenumber").val();
			var mobileOtpValue = $("#expertotpvalue").val();
			var mobileOtpSession = $("#expertmobilesession").val();
			var email = $("#expertemailValue").val();
			var emailotp = $("#expertemailotpvalue").val();
			var emailOtpSession = $("#expertEmailsesession").val();
			var socialUrl = "FbUrl:" + $("#expertFBURL").val();
			var twitterUrl = ",TwitterUrl:" + $("#experttwitterURL").val();
			var linkedinUrl = ",LinkedinUrl" + $("#expertLinkedinURL").val();
			socialUrl = socialUrl + twitterUrl + linkedinUrl;

			var adviseSeekersSalt = $("#expertsaltsesession").val();
			var expertiseId = $("#seekerId").val();
			expertiseId = parseInt(expertiseId.substring(2));
			var expertiseMail = $("#seekeremail").val();
			var faq = $("#seekerFAQ").val();
			var message = $(".expert-message").val() + "\n" + faq;

			var postData = {
				name: name,
				mobileNumber: mobileNumber,
				mobileOtp: mobileOtpValue,
				mobileOtpSession: mobileOtpSession,
				email: email,
				emailOtp: emailotp,
				emailOtpSession: emailOtpSession,
				adviseSeekersSalt: adviseSeekersSalt,
				advisorId: expertiseId,
				advisorMail: expertiseMail,
				message: message,
				socialMediaUrl: socialUrl,
			};

			var postData = JSON.stringify(postData);
			console.log(postData);

			var regUrl = baseUrl + "v1/user/seekingSuggestionFromLenders";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, request) {
					$("#modal-adviceSucess").modal("show");
					setTimeout(function () {
						window.location = "https://oxyloans.com";
					}, 9000);
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
					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});
});

$(document).ready(function () {
	$("#borrowerCustomizationStep1").validate({
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
				uniqueNumber: $("#buniquenumber").val(),
				citizenship: "NONNRI",
			};

			var postData = JSON.stringify(postData);
			//console.log(postData);
			var regUrl = baseUrl + "v1/user/newregistration";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					userID = data.id;
					userIDWhatsapp = data.id;
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
					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});
});

$(document).ready(function () {
	$("#borrowerCustomizationStep2").validate({
		rules: {
			gender: {
				required: true,
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
			var email = $("#emailValue").val();
			var emailotpvalue = $("#emailotpvalue").val();
			var userType = $("#borroweruserType").val();
			var mobileNumber = $("#bmobileNumber").val();
			var pass = $("#password").val();
			var city = $("#cityValue").val();
			var gender = $("input[name='gender']:checked").val();
			var buniquenumber = $("#buniquenumber").val();
			var bwhatsappNo = $("#bWhatsappNo").val();
			var bcountryCode = $(".iti__selected-dial-code").html();

			if (bwhatsappNo == "") {
				var borrowerWhatsNumber = null;
				var bwhatsAppOtp = null;
			} else {
				var borrowerWhatsNumber = bcountryCode + bwhatsappNo;
				var bwhatsAppOtp = $("#botpvalue").val();
			}

			var postData = {
				mobileNumber: mobileNumber,
				email: email,
				emailOtp: emailotpvalue,
				password: pass,
				gender: gender,
				uniqueNumber: buniquenumber,
				whatsappNumber: borrowerWhatsNumber,
				whatsappOtp: bwhatsAppOtp,
			};

			var postData = JSON.stringify(postData);
			var regUrl = baseUrl + "v1/user/newregistration";

			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					userID = data.id;
					gMobileNumber = data.mobileNumber;
					writeCookie("whatsappUserId", userID);
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
					401: function (response) {},
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
					if (arguments[0].responseJSON.errorCode == 113) {
						$(".errorotp").show();
					}
				},
			});
		},
	});
});
$(document).ready(function () {
	jQuery.validator.setDefaults({
		highlight: function (element, errorClass, validClass) {
			if (element.type === "radio") {
				this.findByName(element.name)
					.addClass(errorClass)
					.removeClass(validClass);
			} else {
				$(element)
					.closest(".form-group")
					.removeClass("has-success has-feedback")
					.addClass("has-error has-feedback");
				$(element).closest(".form-group").find("i.fa").remove();
				$(element)
					.closest(".form-group")
					.append(
						'<i class="fa fa-exclamation fa-lg form-control-feedback"></i>'
					);
			}
		},
		unhighlight: function (element, errorClass, validClass) {
			if (element.type === "radio") {
				this.findByName(element.name)
					.removeClass(errorClass)
					.addClass(validClass);
			} else {
				$(element)
					.closest(".form-group")
					.removeClass("has-error has-feedback")
					.addClass("has-success has-feedback");
				$(element).closest(".form-group").find("i.fa").remove();
				$(element)
					.closest(".form-group")
					.append('<i class="fa fa-check fa-lg form-control-feedback"></i>');
			}
		},
	});

	$("#userRegisterSection").validate({
		rules: {
			nameAsperPAN: {
				required: true,
				minlength: 3,
				maxlength: 50,
			},
			emailValue: {
				required: true,
				email: true,
				minlength: 5,
				maxlength: 50,
			},
			regMobileNumber: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},

			password: {
				required: true,
				minlength: 8,
				maxlength: 25,
			},
		},
		messages: {
			nameAsperPAN: {
				required: "Please enter your name as it appears on your pan card",
			},
			emailValue: {
				required: "Please enter your e-mail address. ",
				email: "Pleaase enter valid email",
			},
			password: {
				required: "Please create a password.",
				minlength: "Please enter min 8 characters",
				maxlength: "Please enter max 25 characters",
			},
			regMobileNumber: {
				required: "Please provide your mobile phone number. ",
				number: "Please enter numbers only",
			},
		},

		submitHandler: function () {
			$(".displayScreenFlowArw").hide();
			$(".displayScreenFlowRefresh").show();

			var regMobileNumber = $("#regMobileNumber").val();
			var postData = {
				mobileNumber: regMobileNumber,
				citizenship: "NONNRI",
			};

			var postData = JSON.stringify(postData);

			if (userisIn == "local") {
				var regURL_new =
					"http://35.154.48.120:8080/oxynew/v1/user/newUserRegistration";
			} else {
				var regURL_new =
					"https://fintech.oxyloans.com/oxyloans/v1/user/newUserRegistration";
			}

			$.ajax({
				url: regURL_new,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					$(".form-Step-1").hide();
					$(".form-Step-1-of-2").show();

					userID = data.id;
					mobileOtpSession = data.mobileOtpSession;
					gMobileNumber = data.mobileNumber;
				},
				error: function (response) {
					console.log(response);
				},
				statusCode: {
					400: function (response) {
						$(".loadingSec").hide();
						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];

						if (_errorCodeis == "108") {
							if (
								_errorCodeTextIs == "Registation already done using this email"
							) {
								$(".newemailDiv").removeClass("has-success");
								$(".newemailDiv").addClass("has-error");
								$(".displayScreenFlowArw, #emailValue-error").show();
								$(".displayScreenFlowRefresh").hide();
								$("#emailValue-error").html("E-mail is already registered.");
								$("#emailValue-error")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
							} else if (
								_errorCodeTextIs ==
								"This mobile number has already been registered."
							) {
								$(".newMobileDiv").addClass("has-error");
								$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
								$("#regMobileNumber")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
								$(".mobileError_Message").show();
							} else if (
								_errorCodeTextIs ==
								"Registation already done using this mobile number"
							) {
								$(".newMobileDiv").addClass("has-error");
								$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
								$("#regMobileNumber")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
								$(".mobileError_Message").html(
									"Registation already done using this mobile number"
								);
								$(".mobileError_Message").show();
							}
						} else {
							var _errorCodeTextIs = response.responseJSON["errorMessage"];
							var _registeredEmailId = _errorCodeTextIs;
							_userIDfromTheError = _registeredEmailId.split("id=")[1];
							console.log(_userIDfromTheError);

							var _registeredEmailId_Dummy =
								_registeredEmailId.split("email=")[1];

							_registeredEmailId_Dummy = _registeredEmailId_Dummy.split(" ")[0];

							console.log(_registeredEmailId_Dummy);
							var str = _registeredEmailId_Dummy.replace(/\d(?=\d{13})/g, "*");
							alert(str);

							$(".myprevRegEmailId").html(str);
							$(".sendActivationLink").attr("data-userID", _userIDfromTheError);
							$("#modal-emailSentAlready").modal("show");
						}
					},
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
					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});

	$(".resendOtpSession").click(function (event) {
		var regMobileNumber = $("#regMobileNumber").val();
		var postData = {
			mobileNumber: regMobileNumber,
			citizenship: "NONNRI",
		};

		var postData = JSON.stringify(postData);
		//console.log(postData);
		if (userisIn == "local") {
			var regURL_new =
				"http://35.154.48.120:8080/oxynew/v1/user/newUserRegistration";
		} else {
			var regURL_new =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newUserRegistration";
		}

		$.ajax({
			url: regURL_new,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data) {
				$(".resendOtpSession").attr("disabled", true);
				$("#modal-MobilesessionExpired")
					.removeClass("modal-warning")
					.addClass("modal-success");
				$("#modal-MobilesessionExpired")
					.removeClass("modal-warning")
					.addClass("modal-success");
				$("#modal-MobilesessionExpired .modal-title").html("update");
				$(".modal-body .mobile-session").html(
					"OTP sent successfully to entered number"
				);
				$("#modal-MobilesessionExpired").modal("show");

				setTimeout(function () {
					$("#modal-MobilesessionExpired").modal("hide");
				}, 4000);

				userID = data.id;
				mobileOtpSession = data.mobileOtpSession;
				gMobileNumber = data.mobileNumber;
			},
			error: function (response) {
				console.log(response);
			},
			statusCode: {
				400: function (response) {
					$(".loadingSec").hide();
					$("#modal-MobilesessionExpired").modal("hide");
					var _errorCodeis = response.responseJSON["errorCode"];
					var _errorCodeTextIs = response.responseJSON["errorMessage"];

					if (_errorCodeis == "108") {
						if (
							_errorCodeTextIs == "Registation already done using this email"
						) {
							// $(".emailValue").val("");
							$(".newemailDiv").removeClass("has-success");
							$(".newemailDiv").addClass("has-error");
							$(".displayScreenFlowArw, #emailValue-error").show();
							$(".displayScreenFlowRefresh").hide();
							$("#emailValue-error").html("E-mail is already registered.");
							$("#emailValue-error")
								.fadeOut(100)
								.fadeIn(100)
								.fadeOut(100)
								.fadeIn(100);
						} else if (
							_errorCodeTextIs ==
							"This mobile number has already been registered."
						) {
							$(".newMobileDiv").addClass("has-error");
							$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
							$("#regMobileNumber")
								.fadeOut(100)
								.fadeIn(100)
								.fadeOut(100)
								.fadeIn(100);
							$(".mobileError_Message").show();
						} else if (
							_errorCodeTextIs ==
							"Registation already done using this mobile number"
						) {
							$(".newMobileDiv").addClass("has-error");
							$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
							$("#regMobileNumber")
								.fadeOut(100)
								.fadeIn(100)
								.fadeOut(100)
								.fadeIn(100);
							$(".mobileError_Message").html(
								"Registation already done using this mobile number"
							);
							$(".mobileError_Message").show();
						}
					} else {
						var _errorCodeTextIs = response.responseJSON["errorMessage"];
						var _registeredEmailId = _errorCodeTextIs;
						_userIDfromTheError = _registeredEmailId.split("id=")[1];
						console.log(_userIDfromTheError);

						var _registeredEmailId_Dummy =
							_registeredEmailId.split("email=")[1];

						_registeredEmailId_Dummy = _registeredEmailId_Dummy.split(" ")[0];

						console.log(_registeredEmailId_Dummy);
						var str = _registeredEmailId_Dummy.replace(/\d(?=\d{13})/g, "*");
						alert(str);

						$(".myprevRegEmailId").html(str);
						$(".sendActivationLink").attr("data-userID", _userIDfromTheError);
						$("#modal-emailSentAlready").modal("show");
					}
				},
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
				if (arguments[0].responseJSON.errorCode == 103) {
					$(".errorotp").show();
				}
			},
		});
	});

	$(".btn-loginnew-verify").click(function (event) {
		mobileOtpSession = mobileOtpSession;
		gMobileNumber = gMobileNumber;
		var nameAsperPAN = $(".nameAsperPAN").val();
		var emailValue = $(".emailValue").val();
		var citeZenShipVal = $(".citeZenShipVal").val();
		var pUserType = $(".pUserType").val();
		var password = $(".password").val();
		var regMobileNumber = $(".regMobileNumber").val();
		// var enteredOTP = $(".enteredOTP").val();
		var citeZenShipVal = $(".citeZenShipVal").val();
		var reflenderpaertner = $("#utmForPartner").val();
		// var uniqueNumber = $(".refUTMVal").val();
		// var utmSource = $("#userUTMVal").val();
		var referrerString = $("#referrerid").val();
		var referrer = $("#referrerid").val().substring(2);
		const numberPattern = /^\d+$/;
		const stringPattern = /^[a-zA-Z]+$/;

		// const ischeck=numberPattern.test(referrer);

		if (numberPattern.test(referrer)) {
			if (sessionStorage.getItem("uniqueIdLender") == null && referrer != "") {
				var uniqueNumber = referrerString;
			} else {
				var uniqueNumber = sessionStorage.getItem("uniqueIdLender");
			}

			var utmSource = $("#userUTMVal").val();
		} else {
			var uniqueNumber = $(".refUTMVal").val();
			var utmSource = $("#userUTMVal").val();
		}

		$(".displayScreenFlowArw-2").hide();
		$(".displayScreenFlowRefresh-2").show();

		$(".loadingSec").show();

		var otp1 = $(".otpLBoxone").val();
		var otp2 = $(".optLBoxtwo").val();
		var otp3 = $(".optLBoxthree").val();
		var otp4 = $(".optLBoxfour").val();
		var otp5 = $(".optLBoxfive").val();
		var otp6 = $(".optLBoxsix").val();
		var enteredOTP = otp1 + otp2 + otp3 + otp4 + otp5 + otp6;

		// enteredOTP = enteredOTP.trim();

		var postData = {
			mobileNumber: gMobileNumber,
			mobileOtpSession: mobileOtpSession,
			mobileOtpValue: enteredOTP,
			primaryType: pUserType,
			name: nameAsperPAN,
			email: emailValue,
			password: password,
			citizenship: citeZenShipVal,
			uniqueNumber: uniqueNumber,
			utm: utmSource,
			utmForPartner: reflenderpaertner,
			cifNumber: null,
			finoEmployeeMobileNumber: null,
		};

		var postData = JSON.stringify(postData);
		//console.log(postData);
		if (userisIn == "local") {
			var firtStepofStep2_new =
				"http://35.154.48.120:8080/oxynew/v1/user/newUserRegistration";
		} else {
			var firtStepofStep2_new =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newUserRegistration";
		}
		console.log("in step2 ajax");
		$.ajax({
			url: firtStepofStep2_new,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data) {
				$(".loadingSec").hide();
				userID = data.id;
				mobileOtpSession = data.mobileOtpSession;
				gMobileNumber = data.mobileNumber;
				setTimeout(function () {
					window.location = "register_lender_thanksMessage";
				}, 1000);
			},
			statusCode: {
				200: function (response) {
					//alert('1');
					console.log("Login Successs");
				},
				400: function (response) {
					$(".loadingSec").hide();
					var _errorCodeis = response.responseJSON["errorCode"];
					var _errorCodeTextIs = response.responseJSON["errorMessage"];

					if (_errorCodeis == 103) {
						$(".modal-header .modal-title").html("Update");
						$(".modal-body .text-profileCheck").html(_errorCodeTextIs);
						$("#modal-emailAlreadyRegistered").modal("show");
					}

					if (_errorCodeis == "108") {
						if (
							_errorCodeTextIs == "Registation already done using this email"
						) {
							$("#modal-emailAlreadyRegistered").modal("show");
						} else if (
							_errorCodeTextIs ==
							"This mobile number has already been registered."
						) {
							$(".modal-header .modal-title").html("Update");
							$(".modal-body .text-profileCheck").html(_errorCodeTextIs);
							$("#modal-emailAlreadyRegistered").modal("show");
						} else if (
							_errorCodeTextIs ==
							"Registation already done using this mobile number"
						) {
							$(".newMobileDiv").addClass("has-error");
							$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
							$("#regMobileNumber")
								.fadeOut(100)
								.fadeIn(100)
								.fadeOut(100)
								.fadeIn(100);
							$(".mobileError_Message").html(
								"Registation already done using this mobile number"
							);
							$(".mobileError_Message").show();
						}
					}

					if (_errorCodeis == "100") {
						_errorCodeTextIs ==
							"The mobile OTP session has expired. Click on Resend  to get the OTP.";
						$(".modal-body .mobile-session").html(_errorCodeTextIs);
						$("#modal-MobilesessionExpired").modal("show");
					}
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
					bootbox.alert(
						'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
						function () {}
					);
				},
			},

			error: function (request, error) {
				if (arguments[0].responseJSON.errorCode == 103) {
					$(".errorotp").show();
				}
			},
		});
	});

	$(".sendActivationLink").click(function (event) {
		var _reguserID = $(this).attr("data-userID");

		var postData = {
			userId: _reguserID,
		};
		var postData = JSON.stringify(postData);

		if (userisIn == "local") {
			var sendActivationEmail =
				"http://35.154.48.120:8080/oxynew/v1/user/sendingEmailActivationLink";
		} else {
			var sendActivationEmail =
				"https://fintech.oxyloans.com/oxyloans/v1/user/sendingEmailActivationLink";
		}
		$.ajax({
			url: sendActivationEmail,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data) {
				$(".displayEmailText").show("slow");
				$(".displayEmailText")
					.fadeOut(100)
					.fadeIn(100)
					.fadeOut(100)
					.fadeIn(100);
				$(".sendActivationLink").hide("slow");
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
					bootbox.alert(
						'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
						function () {}
					);
				},
			},
			error: function (request, error) {
				if (arguments[0].responseJSON.errorCode == 103) {
					$(".errorotp").show();
				}
			},
		});
	});

	$("#userRegisterSectionStep2").validate({
		rules: {
			dob: {
				required: true,
			},
			panNumber: {
				required: true,
				minlength: 10,
				maxlength: 10,
			},
			address_user: {
				required: true,
				minlength: 10,
				maxlength: 256,
			},
		},
		messages: {
			dob: {
				required: "Please enter your date of birth",
			},
			panNumber: {
				required: "Please enter your PAN number",
				minlength: "Please enter your PAN number",
				maxlength: "Please enter your PAN number",
			},
			address_user: {
				required: "Please enter your current address.",
			},
		},

		submitHandler: function () {
			$(".displayScreenFlowArw").hide();
			$(".displayScreenFlowRefresh").show();
			$(".loadingSec").show();

			var dob = $(".dob").val();
			var panNumber = $(".panNumber").val();
			var userIDfromBrowser = $(".userIDfromBrowser").val();
			var address_user = $("#address_user").val();
			var session_time = $("#timeInMilliSeconds").val();

			var postData = {
				userId: userIDfromBrowser,
				address: address_user,
				dob: dob,
				panNumber: panNumber,
				timeInMilliSeconds: session_time,
				emailOtpSession: null,
				emailOtp: null,
			};

			var postData = JSON.stringify(postData);

			if (userisIn == "local") {
				var regURL_new =
					"http://35.154.48.120:8080/oxynew/v1/user/emailVerification";
			} else {
				var regURL_new =
					"https://fintech.oxyloans.com/oxyloans/v1/user/emailVerification";
			}

			$.ajax({
				url: regURL_new,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					setTimeout(function () {
						window.location = "register_lender_activate_thanksMessage";
					}, 1000);
					$(".loadingSec").hide();
				},
				error: function (response) {
					console.log(response);
				},
				statusCode: {
					200: function (response) {
						console.log("Login Successs");
					},
					400: function (response) {
						console.log("ERROR MESSAGE");
						$(".loadingSec").hide();
						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];
						if (_errorCodeis == 109) {
							$(".modal-header .modal-title").html("Update");
							$(".modal-body .text-profileCheck").html(_errorCodeTextIs);
							$("#modal-step2emailAlreadyRegistered").modal("show");
						}

						if (_errorCodeis == 108) {
							$(".isPanRegister").show();
						}

						if (_errorCodeis == 100) {
							$("#modal-sessionEmail").modal("show");
						}
					},
					401: function (response) {
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
					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});
});

$(document).ready(function () {
	$("#userHiddenLoginSection").validate({
		rules: {
			nameHidenUser: {
				required: true,
			},
			userPrimaryType: {
				required: true,

				invalidHandler: function () {
					var hiddenPrimary = $("#hiddenPrimary").val();

					if (
						userisIn != "local" &&
						hiddenPrimary != "R@dh^@Ox^@19" &&
						hiddenPrimary.length != ""
					) {
						$(".hidenpassword").show();
					} else {
						$(".hidenpassword").hide();
					}
				},
			},
		},
		messages: {
			nameHidenUser: {
				required: "Please enter user Id",
			},
			userPrimaryType: {
				required: "Invalid Password",
			},
		},

		submitHandler: function () {
			$(".displayScreenFlowArw").hide();
			$(".displayScreenFlowRefresh").show();

			var hiddenUserId = $("#hiddenUserId").val();
			hiddenUserId = hiddenUserId.substring(2);

			var hiddenPrimary = $("#hiddenPrimary").val();

			if (userisIn == "local" && hiddenPrimary == "SUPERADMIN") {
				hiddenPrimary = "SUPERADMIN";
			} else if (userisIn == "prod" && hiddenPrimary == "P@55w0rd#") {
				hiddenPrimary = "SUPERADMIN";
			} else {
				$(".hidenpassword").fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
				$(".hidenpassword").show();
				$(".displayScreenFlowArw").show();
				$(".displayScreenFlowRefresh").hide();
				return false;
			}

			var postData = { id: hiddenUserId, primaryType: hiddenPrimary };

			var postData = JSON.stringify(postData);
			console.log(postData);
			let regUrl = baseUrl + "v1/user/login?grantType=PWD";
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					userID = data.id;
					userType = data.primaryType;
					var sId = data.id;

					writeCookie("sUserId", sId);
					var sUserType = data.primaryType;
					writeCookie("sUserType", sUserType);
					writeCookie("tokenTime", data.tokenGeneratedTime);
					writeCookie("validitySkip", false);

					console.log(sUserType);
					// window.location = "admin/userQueryDetails";
					if (sUserType == "LENDER") {
						window.location = "idb";
					} else if (sUserType == "HELPDESKADMIN") {
						window.location = "admin/helpdeskadmin";
					} else if (sUserType == "ADMIN") {
						window.location = "admin/dashboard";
					} else if (sUserType == "PAYMENTSADMIN") {
						window.location = "admin/paymentsUpload";
					} else if (sUserType == "SUBBUADMIN") {
						window.location = "showInterestPayments";
					} else if (sUserType == "PARTNERADMIN") {
						window.location = "admin/createUtmforpartnerDealer";
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
					window.location = "idb";
				} else if (sUserType == "ADMIN") {
					window.location = "admin/dashboard";
				} else if (sUserType == "PAYMENTSADMIN") {
					window.location = "admin/paymentsUpload";
				} else if (sUserType == "HELPDESKADMIN") {
					window.location = "admin/helpdeskadmin";
				} else if (sUserType == "SUBBUADMIN") {
					window.location = "admin/showInterestPayments";
				} else if (sUserType == "PARTNERADMIN") {
					window.location = "admin/createUtmforpartnerDealer";
				} else {
					window.location = "borrowerDashboard";
				}
			});
		},
	});
});

$(document).ready(function () {
	$("#borrowerRegisterSection").validate({
		rules: {
			nameAsperPAN: {
				required: true,
				minlength: 3,
				maxlength: 50,
			},
			emailValue: {
				required: true,
				email: true,
				minlength: 5,
				maxlength: 50,
			},
			regMobileNumber: {
				required: true,
				number: true,
				minlength: 10,
				maxlength: 10,
			},
			password: {
				required: true,
				minlength: 8,
				maxlength: 25,
			},
			fINNOCIFFno: {
				required: function () {
					var cifno = $(".finnoCif").val();
					var finutm = $("#finoUtm").val();
					if (finutm == "null" && cifno == "") {
						return false;
					} else {
						return true;
					}
				},

				minlength: 9,
				maxlength: 12,
			},
			finoEmpid: {
				required: function () {
					var cifEmapNo = $(".finoEmpId").val();
					var finutm = $("#finoUtm").val();
					if (finutm == "null" && cifEmapNo == "") {
						return false;
					} else {
						return true;
					}
				},
			},
		},
		messages: {
			nameAsperPAN: {
				required: "Please enter your name as it appears on your pan card",
			},
			emailValue: {
				required: "Please enter your e-mail address",
				email: "Pleaase enter valid email",
			},
			password: {
				required: "Please create a password",
				minlength: "Please enter min 8 characters",
				maxlength: "Please enter max 25 characters",
			},
			regMobileNumber: {
				required: "Please provide your mobile phone number.",
				number: "Please enter numbers only",
			},
			fINNOCIFFno: {
				required: "Please enter the fino cif number",
				number: "Please enter numbers only",
			},
			finoEmpid: {
				required: "Please provide your mobile phone number.",
			},
		},

		submitHandler: function () {
			$(".displayScreenFlowArw").hide();
			$(".displayScreenFlowRefresh").show();

			var regMobileNumber = $("#regMobileNumber").val();
			var cifno = $(".finnoCif").val();
			var cifEmapNo = $(".finoEmpId").val();

			if (cifno == "") {
				cifno = null;
			}

			if (cifEmapNo == "") {
				cifEmapNo = null;
			}

			var postData = {
				mobileNumber: regMobileNumber,
				citizenship: "NONNRI",
				// cifNumber: cifno,
				// finoEmployeeMobileNumber: cifEmapNo,
			};

			var postData = JSON.stringify(postData);

			if (userisIn == "local") {
				var regURL_new =
					"http://35.154.48.120:8080/oxynew/v1/user/newUserRegistration";
			} else {
				var regURL_new =
					"https://fintech.oxyloans.com/oxyloans/v1/user/newUserRegistration";
			}

			$.ajax({
				url: regURL_new,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					$(".form-Step-1").hide();
					$(".form-Step-1-of-2").show();

					userID = data.id;
					bmobileOtpSession = data.mobileOtpSession;
					bgMobileNumber = data.mobileNumber;
				},
				error: function (response) {
					console.log(response);
				},
				statusCode: {
					400: function (response) {
						$(".loadingSec").hide();
						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];

						if (_errorCodeis == "108") {
							if (
								_errorCodeTextIs == "Registation already done using this email"
							) {
								$(".newemailDiv").removeClass("has-success");
								$(".newemailDiv").addClass("has-error");
								$(".displayScreenFlowArw, #emailValue-error").show();
								$(".displayScreenFlowRefresh").hide();
								$("#emailValue-error").html("E-mail is already registered.");
								$("#emailValue-error")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
							} else if (
								_errorCodeTextIs ==
								"This mobile number has already beenÃ‚ registered."
							) {
								$(".newMobileDiv").addClass("has-error");
								$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
								$("#regMobileNumber")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
								$(".mobileError_Message").show();
							} else if (
								_errorCodeTextIs ==
								"Registation already done using this mobile number"
							) {
								$(".newMobileDiv").addClass("has-error");
								$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
								$("#regMobileNumber")
									.fadeOut(100)
									.fadeIn(100)
									.fadeOut(100)
									.fadeIn(100);
								$(".mobileError_Message").html(
									"Registation already done using this mobile number"
								);
								$(".mobileError_Message").show();
							}
						} else {
							var _errorCodeTextIs = response.responseJSON["errorMessage"];
							var _registeredEmailId = _errorCodeTextIs;
							_userIDfromTheError = _registeredEmailId.split("id=")[1];
							console.log(_userIDfromTheError);

							var _registeredEmailId_Dummy =
								_registeredEmailId.split("email=")[1];

							_registeredEmailId_Dummy = _registeredEmailId_Dummy.split(" ")[0];

							console.log(_registeredEmailId_Dummy);
							var str = _registeredEmailId_Dummy.replace(/\d(?=\d{13})/g, "*");

							$(".myprevRegBEmailId").html(str);
							$(".sendActivationLink").attr(
								"data-buserID",
								_userIDfromTheError
							);
							$("#modal-emailSentAlready").modal("show");
						}
					},
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
					if (arguments[0].responseJSON.errorCode == 103) {
						$(".errorotp").show();
					}
				},
			});
		},
	});
});

$(".borrowerresendOtpSession").click(function (event) {
	var regMobileNumber = $("#regMobileNumber").val();
	var postData = {
		mobileNumber: regMobileNumber,
		citizenship: "NONNRI",
		// cifNumber: cifno,
		// finoEmployeeMobileNumber: cifEmapNo,
	};

	var postData = JSON.stringify(postData);
	//console.log(postData);
	if (userisIn == "local") {
		var regURL_new =
			"http://35.154.48.120:8080/oxynew/v1/user/newUserRegistration";
	} else {
		var regURL_new =
			"https://fintech.oxyloans.com/oxyloans/v1/user/newUserRegistration";
	}

	$.ajax({
		url: regURL_new,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data) {
			$(".borrowerresendOtpSession").attr("disabled", true);
			$("#modal-borrowerMobilesessionExpired")
				.removeClass("modal-warning")
				.addClass("modal-success");
			$("#modal-borrowerMobilesessionExpired")
				.removeClass("modal-warning")
				.addClass("modal-success");
			$("#modal-borrowerMobilesessionExpired .modal-title").html("update");
			$(".modal-body .mobile-bsession").html(
				"OTP sent successfully to entered number"
			);
			$("#modal-borrowerMobilesessionExpired").modal("show");

			setTimeout(function () {
				$("#modal-borrowerMobilesessionExpired").modal("hide");
				modal - borrowerMobilesessionExpired;
			}, 4000);

			userID = data.id;
			bmobileOtpSession = data.mobileOtpSession;
			bgMobileNumber = data.mobileNumber;
		},
		error: function (response) {
			console.log(response);
		},
		statusCode: {
			400: function (response) {
				$(".loadingSec").hide();
				var _errorCodeis = response.responseJSON["errorCode"];
				var _errorCodeTextIs = response.responseJSON["errorMessage"];

				if (_errorCodeis == "108") {
					if (_errorCodeTextIs == "Registation already done using this email") {
						$(".newemailDiv").removeClass("has-success");
						$(".newemailDiv").addClass("has-error");
						$(".displayScreenFlowArw, #emailValue-error").show();
						$(".displayScreenFlowRefresh").hide();
						$("#emailValue-error").html("E-mail is already registered.");
						$("#emailValue-error")
							.fadeOut(100)
							.fadeIn(100)
							.fadeOut(100)
							.fadeIn(100);
					} else if (
						_errorCodeTextIs ==
						"This mobile number has already beenÃ‚ registered."
					) {
						$(".newMobileDiv").addClass("has-error");
						$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
						$("#regMobileNumber")
							.fadeOut(100)
							.fadeIn(100)
							.fadeOut(100)
							.fadeIn(100);
						$(".mobileError_Message").show();
					} else if (
						_errorCodeTextIs ==
						"Registation already done using this mobile number"
					) {
						$(".newMobileDiv").addClass("has-error");
						$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
						$("#regMobileNumber")
							.fadeOut(100)
							.fadeIn(100)
							.fadeOut(100)
							.fadeIn(100);
						$(".mobileError_Message").html(
							"Registation already done using this mobile number"
						);
						$(".mobileError_Message").show();
					}
				} else {
					var _errorCodeTextIs = response.responseJSON["errorMessage"];
					var _registeredEmailId = _errorCodeTextIs;
					_userIDfromTheError = _registeredEmailId.split("id=")[1];
					console.log(_userIDfromTheError);

					var _registeredEmailId_Dummy = _registeredEmailId.split("email=")[1];

					_registeredEmailId_Dummy = _registeredEmailId_Dummy.split(" ")[0];

					console.log(_registeredEmailId_Dummy);
					var str = _registeredEmailId_Dummy.replace(/\d(?=\d{13})/g, "*");

					$(".myprevRegBEmailId").html(str);
					$(".sendActivationLink").attr("data-buserID", _userIDfromTheError);
					$("#modal-emailSentAlready").modal("show");
				}
			},
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
			if (arguments[0].responseJSON.errorCode == 103) {
				$(".errorotp").show();
			}
		},
	});
});

$(document).ready(function () {
	$("#btn_login_borrower").click(function (event) {
		mobileOtpSession = bmobileOtpSession;
		gMobileNumber = bgMobileNumber;
		var nameAsperPAN = $(".nameAsperPAN").val();
		var emailValue = $(".emailValue").val();
		var citeZenShipVal = $(".citeZenShipVal").val();
		var pUserType = $(".pUserType").val();
		var password = $(".password").val();
		var regMobileNumber = $(".regMobileNumber").val();
		// var enteredOTP = $(".enteredOTP").val();
		var citeZenShipVal = $(".citeZenShipVal").val();
		// var uniqueNumber = $(".refUTMVal").val();
		// var utmSource = $("#userUTMVal").val();
		var refPartner = $("#utmForPartner").val();
		var cifno = $(".finnoCif").val();
		var cifEmapNo = $(".finoEmpId").val();

		var referrerString = $("#referrerid").val();
		var referrer = $("#referrerid").val().substring(2);

		const numberPattern = /^\d+$/;
		const stringPattern = /^[a-zA-Z]+$/;

		if (numberPattern.test(referrer)) {
			if (
				sessionStorage.getItem("uniqueIdBorrower") == null &&
				referrer != ""
			) {
				var uniqueNumber = referrerString;
			} else {
				var uniqueNumber = sessionStorage.getItem("uniqueIdBorrower");
			}
			var utmSource = $("#userUTMVal").val();
		} else {
			var uniqueNumber = $(".refUTMVal").val();
			var utmSource = $("#userUTMVal").val();
		}

		var otp1 = $(".otpBoxone").val();
		var otp2 = $(".optBoxtwo").val();
		var otp3 = $(".optBoxthree").val();
		var otp4 = $(".optBoxfour").val();
		var otp5 = $(".optBoxfive").val();
		var otp6 = $(".optBoxsix").val();

		var enteredOTP = otp1 + otp2 + otp3 + otp4 + otp5 + otp6;
		// enteredOTP = enteredOTP.trim();

		if (cifno == "") {
			cifno = null;
		}

		if (cifEmapNo == "") {
			cifEmapNo = null;
		}

		$(".displayScreenFlowArw-2").hide();
		$(".displayScreenFlowRefresh-2").show();

		$(".loadingSec").show();

		var postData = {
			mobileNumber: gMobileNumber,
			mobileOtpSession: mobileOtpSession,
			mobileOtpValue: enteredOTP,
			primaryType: pUserType,
			name: nameAsperPAN,
			email: emailValue,
			password: password,
			citizenship: citeZenShipVal,
			uniqueNumber: uniqueNumber,
			utm: utmSource,
			utmForPartner: refPartner,
			cifNumber: cifno,
			finoEmployeeMobileNumber: cifEmapNo,
		};

		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			var firtStepofStep2_new =
				"http://35.154.48.120:8080/oxynew/v1/user/newUserRegistration";
		} else {
			var firtStepofStep2_new =
				"https://fintech.oxyloans.com/oxyloans/v1/user/newUserRegistration";
		}
		console.log("in step2  borrower ajax");
		$.ajax({
			url: firtStepofStep2_new,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data) {
				userID = data.id;
				mobileOtpSession = data.mobileOtpSession;
				gMobileNumber = data.mobileNumber;

				setTimeout(function () {
					window.location = "register_lender_thanksMessage?userType=Borrowing";
				}, 1000);
			},
			statusCode: {
				200: function (response) {
					//alert('1');
					console.log("Login Successs");
				},
				400: function (response) {
					$(".loadingSec").hide();
					var _errorCodeis = response.responseJSON["errorCode"];
					var _errorCodeTextIs = response.responseJSON["errorMessage"];

					if (_errorCodeis == 103) {
						$(".modal-header .modal-title").html("Update");
						$(".modal-body .text-profileCheck").html(_errorCodeTextIs);
						$("#modal-emailAlreadyRegistered").modal("show");
					}

					if (_errorCodeis == "108") {
						if (
							_errorCodeTextIs == "Registation already done using this email"
						) {
							$("#modal-emailAlreadyRegistered").modal("show");
						} else if (
							_errorCodeTextIs ==
							"This mobile number has already beenÃ‚ registered."
						) {
							$(".modal-header .modal-title").html("Update");
							$(".modal-body .text-profileCheck").html(_errorCodeTextIs);
							$("#modal-emailAlreadyRegistered").modal("show");
						} else if (
							_errorCodeTextIs ==
							"Registation already done using this mobile number"
						) {
							$(".newMobileDiv").addClass("has-error");
							$(".displayScreenFlowRefresh, .displayScreenFlowArw").hide();
							$("#regMobileNumber")
								.fadeOut(100)
								.fadeIn(100)
								.fadeOut(100)
								.fadeIn(100);
							$(".mobileError_Message").html(
								"Registation already done using this mobile number"
							);
							$(".mobileError_Message").show();
						}
					}

					if (_errorCodeis == "100") {
						_errorCodeTextIs ==
							"The mobile OTP session has expired. Click on Resend  to get the OTP.";
						$(".modal-body .mobile-bsession").html(_errorCodeTextIs);
						$("#modal-borrowerMobilesessionExpired").modal("show");
					}
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
					bootbox.alert(
						'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
						function () {}
					);
				},
			},

			error: function (request, error) {
				if (arguments[0].responseJSON.errorCode == 103) {
					$(".errorotp").show();
				}
			},
		});
	});
});

$(".sendbActivationLink").click(function (event) {
	var _reguserID = $(this).attr("data-buserID");

	var postData = {
		userId: _reguserID,
	};
	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var sendActivationEmail =
			"http://35.154.48.120:8080/oxynew/v1/user/sendingEmailActivationLink";
	} else {
		var sendActivationEmail =
			"https://fintech.oxyloans.com/oxyloans/v1/user/sendingEmailActivationLink";
	}
	$.ajax({
		url: sendActivationEmail,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data) {
			$(".displayEmailText").show("slow");
			$(".displayEmailText").fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
			$(".sendActivationLink").hide("slow");
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
				bootbox.alert(
					'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
					function () {}
				);
			},
		},
		error: function (request, error) {
			if (arguments[0].responseJSON.errorCode == 103) {
				$(".errorotp").show();
			}
		},
	});
});

$(document).ready(function () {
	$("#enteredemailnullSection").validate({
		rules: {
			emailnullValue: {
				required: true,
			},
		},
		messages: {
			emailnullValue: {
				required: "Please enter The valid Email",
			},
		},

		submitHandler: function () {
			$(".displayScreenFlowArw").hide();
			$(".displayScreeneEmailSection").show();

			var userID = $("#getnullUserId").val();
			var emailValue = $("#nullUseremail").val();

			var postData = {
				email: emailValue,
				userId: userID,
			};

			var postData = JSON.stringify(postData);
			//console.log(postData);
			if (userisIn == "local") {
				var regURL_NullUser =
					"http://35.154.48.120:8080/oxynew/v1/user/emailIdUpdationToOldUsers";
			} else {
				var regURL_NullUser =
					"https://fintech.oxyloans.com/oxyloans/v1/user/emailIdUpdationToOldUsers";
			}

			$.ajax({
				url: regURL_NullUser,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					$(".loadingSec").hide();
					window.location = "register_lender_thanksMessage";
				},

				statusCode: {
					200: function (response) {
						//alert('1');
						console.log("Login Successs");
					},

					400: function (response) {
						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];

						if (_errorCodeis == 108) {
							$(".displayScreeneEmailSection").hide();
							$(".nullEmailRegistered").show();
							$("#nullUseremail")
								.fadeOut(100)
								.fadeIn(100)
								.fadeOut(100)
								.fadeIn(100);
						}
					},

					error: function (request, error) {
						if (arguments[0].responseJSON.errorCode == 103) {
							$(".errorotp").show();
						}
					},
				},
			});
		},
	});
});

const sendActivationNullEmail = (userID, status) => {
	var postData = {
		userId: userID,
	};

	const sendActivationEmail =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/sendingEmailActivationLink"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/sendingEmailActivationLink";
	var postData = JSON.stringify(postData);
	$.ajax({
		url: sendActivationEmail,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: (data) => {
			if (status == "true") {
			} else {
				window.location = "register_lender_thanksMessage";
			}
		},
		statusCode: {
			200: (response) => {
				console.log("Login Successs");
			},
		},
		error: (request, error) => {
			if (arguments[0].responseJSON.errorCode == 103) {
				$(".errorotp").show();
			}
		},
	});
};

$(document).ready(function () {
	$("#partnerUserLoginSection").validate({
		rules: {
			partnerUtm: {
				required: true,
			},
			passwordPartner: {
				required: true,
			},
		},
		messages: {
			partnerUtm: {
				required: "Please Enter Partner Utm",
			},
			passwordPartner: {
				required: "Please Enter The Password",
			},
		},

		submitHandler: function () {
			$(".displayScreenFlowArw").hide();
			$(".displayScreenFlowRefresh").show();

			var partnerUtm = $("#partnerUser").val();

			var partnerPassword = $("#passwordPartner").val();

			var postData = {
				partnerUtmName: partnerUtm,
				partnerPassword: partnerPassword,
			};

			var postData = JSON.stringify(postData);
			console.log(postData);
			let regUrl = baseUrl + "v1/user/login?grantType=PWD";
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					userID = data.id;
					userType = data.userType;

					partnerMobileVerify = data.partnerMobileVerified;
					partnerEmailVerify = data.partnerEmailVerified;

					var sId = data.id;

					writeCookie("sUserId", sId);
					var sUserType = data.userType;
					writeCookie("sUserType", sUserType);
					writeCookie("tokenTime", data.tokenGeneratedTime);

					console.log(sUserType);
					// window.location = "admin/userQueryDetails";
					if (sUserType == "LENDER") {
						window.location = "idb";
					} else if (sUserType == "HELPDESKADMIN") {
						window.location = "admin/helpdeskadmin";
					} else if (sUserType == "ADMIN") {
						window.location = "admin/dashboard";
					} else if (sUserType == "PAYMENTSADMIN") {
						window.location = "admin/paymentsUpload";
					} else if (sUserType == "SUBBUADMIN") {
						window.location = "admin/showInterestPayments";
					} else if (sUserType == "PARTNER") {
						if (partnerMobileVerify == false && partnerEmailVerify == false) {
							window.location = "partner/PartnerVerification";
						} else if (
							partnerMobileVerify == true &&
							partnerEmailVerify == false
						) {
							window.location = "partner/PartnerVerification";
						} else if (
							partnerMobileVerify == false &&
							partnerEmailVerify == true
						) {
							window.location = "partner/PartnerVerification";
						} else {
							window.location = "partner/partnerListUsers";
						}
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
						// $(".erroruser").show();
						$(".displayScreenFlowRefresh").hide();
						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];
						if (_errorCodeis == 101) {
							$(".passwordemailValue-partner").show();
							$(".passwordemailValue-partner")
								.fadeOut(100)
								.fadeIn(100)
								.fadeOut(100)
								.fadeIn(100);
						}
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
				writeCookie("partnerEmail", data.partnerEmail);
				writeCookie("partnerMobileNumber", data.partnerMobileNumber);
				writeCookie("partnerUtmName", data.partnerUtmName);
				writeCookie("isupdate", "");
				writeCookie("tokenTime", data.tokenGeneratedTime);

				var sUserType = data.userType;
				if (sUserType == "LENDER") {
					window.location = "idb";
				} else if (sUserType == "ADMIN") {
					window.location = "admin/dashboard";
				} else if (sUserType == "PAYMENTSADMIN") {
					window.location = "admin/paymentsUpload";
				} else if (sUserType == "HELPDESKADMIN") {
					window.location = "admin/helpdeskadmin";
				} else if (sUserType == "SUBBUADMIN") {
					window.location = "admin/showInterestPayments";
				} else if (sUserType == "PARTNER") {
					if (partnerMobileVerify == false && partnerEmailVerify == false) {
						window.location = "partner/PartnerVerification";
					} else if (
						partnerMobileVerify == true &&
						partnerEmailVerify == false
					) {
						window.location = "partner/PartnerVerification";
					} else if (
						partnerMobileVerify == false &&
						partnerEmailVerify == true
					) {
						window.location = "partner/PartnerVerification";
					} else {
						window.location = "partner/partnerListUsers";
					}
				} else {
					window.location = "borrowerDashboard";
				}
			});
		},
	});
});

$(document).ready(function () {
	$("#partnerRegisterSection").validate({
		rules: {
			partnerName: {
				required: true,
			},
			PartneremailValue: {
				required: true,
			},
			partnerPhone: {
				required: true,
			},
			partnerUtm: {
				required: true,
			},
			PPhoneData: {
				required: true,
			},
			PPEmailData: {
				required: true,
			},
		},
		messages: {
			partnerName: {
				required: "Please enter The Partner Name",
			},
			PartneremailValue: {
				required: "Please enter The partner Email",
			},
			partnerPhone: {
				required: "Please enter The partner phone number",
			},
			partnerUtm: {
				required: "Please enter The partner Utm",
			},
			PPhoneData: {
				required: "Please enter contact person phone number",
			},
			PPEmailData: {
				required: "Please enter contact person Email",
			},
		},

		submitHandler: function () {
			$(".displayScreenFlowArw").hide();
			$(".displayScreeneEmailSection").show();

			var name = $(".partnerName").val();
			var emailValue = $(".partneremailValue").val();
			var mobile = $(".partnerMobile").val();
			var utm = $(".partnerUtm").val();

			var contactPhone = $(".partnerphoneData").val();
			var contactEmail = $(".partnerEmailentered").val();
			var refForPartner = $("#partnerReferrer").val();

			var postData = {
				partnerRegisteredFrom: "OXYLOANS",
				partnerName: name,
				partnerEmail: emailValue,
				partnermobileNumber: mobile,
				pocName: utm,
				listOfPoCEmail: contactEmail,
				listOfPoCMobileNumber: contactPhone,
				refForPartner: refForPartner,
			};

			var postData = JSON.stringify(postData);
			console.log(postData);
			if (userisIn == "local") {
				var regURL_Partner =
					"http://35.154.48.120:8080/oxynew/v1/user/partnerRegistrationFlow";
			} else {
				var regURL_Partner =
					"https://fintech.oxyloans.com/oxyloans/v1/user/partnerRegistrationFlow";
			}

			$.ajax({
				url: regURL_Partner,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					$(".loadingSec").hide();

					$("#modal-partnerRegister").modal("show");

					setTimeout(function () {
						window.location = "partnerLogin";
					}, 2000);
				},

				statusCode: {
					200: function (response) {
						//alert('1');
						console.log("Login Successs");
					},

					400: function (response) {
						var _errorCodeis = response.responseJSON["errorCode"];
						var _errorCodeTextIs = response.responseJSON["errorMessage"];
						if (_errorCodeis == 108) {
							$(".registerSuccess")
								.removeClass("modal-success")
								.addClass("modal-danger");
							$("#partnerErrorBody").html("Utm name already exists");
							$("#modal-partnerRegister").modal("show");
						}
					},

					error: function (request, error) {
						if (arguments[0].responseJSON.errorCode == 108) {
							$(".registerSuccess")
								.removeClass("modal-success")
								.addClass("modal-danger");
							$(".partnerErrorBody").html("Utm name already exists");
							$("#modal-partnerRegister").modal("show");
						}
					},
				},
			});
		},
	});
});

const getsessionexpiredEmail = (_reguserID) => {
	var postData = {
		userId: _reguserID,
	};

	const sendActivationEmail =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/sendingEmailActivationLink"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/sendingEmailActivationLink";

	var postData = JSON.stringify(postData);

	$.ajax({
		url: sendActivationEmail,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: (data) => {
			$("#modal-sessionEmail").modal("hide");
			$("#modal-sessionEmailgetEmail").modal("show");
		},
		statusCode: {
			200: (response) => {
				console.log("Login Successs");
			},
			401: (response) => {
				$(".erroruser").show();
			},
			409: (response) => {
				$("#modal-mobileerror").modal("show");
			},
			404: (response) => {
				bootbox.alert(
					'<span style="color:Red;">Error While Saving Outage Entry Please Check</span>',
					function () {}
				);
			},
		},
		error: (request, error) => {
			if (arguments[0].responseJSON.errorCode == 103) {
				$(".errorotp").show();
			}
		},
	});
};

const oxyFreeWhatsappbulk = () => {
	const countryCode = $(".iti__selected-dial-code").html();
	const mobileNumber = countryCode + $("#mobilenumber1").val();
	const message = $("#comments").val();
	const form = $("#whatsapp")[0];

	const fd = new FormData();
	fd.append("WHATSAPP", form.files[0]);
	fd.append("message", message);
	fd.append("mobileNumber", mobileNumber);
	console.log(fd);

	const whatsappnumber =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/oxyWhatsappThroughExcel"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/oxyWhatsappThroughExcel";

	$.ajax({
		url: whatsappnumber,
		type: "POST",
		data: fd,
		contentType: false,
		processData: false,
		success: (data, textStatus, xhr) => {
			$("#modal-whatsappsmsg").modal("show");

			setTimeout(() => {
				location.reload();
			}, 7000);
		},
		error: (xhr, textStatus, errorThrown) => {
			$(".whatsappError .message").html(arguments[0].responseJSON.errorMessage);
			$("#modal-whatsappserror").modal("show");
		},
	});
};

const oxyfreewhatsapps = () => {
	const countryCode = $(".iti__selected-dial-code").html();
	const phoneNumber = countryCode + $("#phoneNumbers").val();
	const forMobileNumber = $("#number").val();
	const message = $("#comment").val();

	let isValid = true;

	if (phoneNumber == "") {
		$("#errornumbersss").show();
		isValid = false;
	} else {
		$("#errornumbersss").hide();
	}

	if (forMobileNumber == "") {
		$("#errornumberss").show();
		isValid = false;
	} else {
		$("#errornumberss").hide();
	}
	if (message == "") {
		$("#errormsg").show();
		isValid = false;
	} else {
		$("#errormsg").hide();
	}

	var postData = {
		phoneNumbers: String(phoneNumber).split(","),
		message: message,
		fromMobileNumber: forMobileNumber,
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	let whatsAppNumber;
	if (userisIn == "local") {
		whatsAppNumber =
			"http://35.154.48.120:8080/oxynew/v1/user/oxyWhatsapp";
	} else {
		whatsAppNumber =
			"https://fintech.oxyloans.com/oxyloans/v1/user/oxyWhatsapp";
	}

	if (isValid == true) {
		$.ajax({
			url: whatsAppNumber,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#modal-whatsappsmsg").modal("show");
				setTimeout(function () {
					location.reload();
				}, 8000);
			},
			error: function (xhr, textStatus, errorThrown) {
				$(".whatsappError .message").html(
					arguments[0].responseJSON.errorMessage
				);
				if (arguments[0].responseJSON.errorCode == 110) {
					$("#modal-whatsappserror").modal("show");
				}
			},
		});
	}
};

function fetchIpaddress() {
	fetch("https://api.ipify.org?format=json")
		.then((response) => response.json())
		.then((data) => {
			console.log("enter success block" + data.ip);
			sessionStorage.setItem("ipaddress", data.ip);
		})
		.catch((error) => {
			sessionStorage.setItem("ipaddress", null);
			console.log("Error fetching IP address: " + error);
		});
}

function geolocation() {
	navigator.geolocation.getCurrentPosition(
		(position) => {
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;

			sessionStorage.setItem("latitude", latitude);
			sessionStorage.setItem("longitude", longitude);
			writeCookie("latitude", latitude);
			writeCookie("longitude", longitude);
		},
		(erro) => {
			writeCookie("latitude", null);
			writeCookie("longitude", null);
			sessionStorage.setItem("latitude", null);
			sessionStorage.setItem("longitude", null);
		}
	);
}

const Otplessintegration = (data) => {
	let lat = sessionStorage.getItem("latitude");
	let lon = sessionStorage.getItem("longitude");
	let ip = sessionStorage.getItem("latitude");

	var postData = {
		token: data.token,
		timestamp: data.timestamp,
		timezone: data.timezone,
		mobile: { name: data.mobile.name, number: data.mobile.number },
		email: { name: data.email.name, email: data.email.email },
		waNumber: data.waNumber,
		waName: data.waName,
		ip: ip,
		latitude: lat,
		longitude: lon,
	};

	var postDataString = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		var otpless =
			"http://35.154.48.120:8080/oxynew/v1/user/otpless-login";
	} else {
		var otpless = "https://fintech.oxyloans.com/oxyloans/v1/user/otpless-login";
	}

	$.ajax({
		url: otpless,
		type: "PATCH",
		data: postDataString,
		contentType: "application/json",
		dataType: "json",
		success: function (data) {
			userID = data.id;
			userType = data.primaryType;
			var sId = data.id;
			var isValidityExpire = data.validityCheck;
			writeCookie("sUserId", sId);
			var sUserType = data.primaryType;
			writeCookie("sUserType", sUserType);
			writeCookie("tokenTime", data.tokenGeneratedTime);
			writeCookie("validitySkip", false);
			writeCookie("cmsSkip", false);
			writeCookie("saccessToken", data.accessToken);
			console.log(sUserType);
			redirectUrl = getCookie("redirectUrl");
			if (sUserType == "LENDER" && redirectUrl != "") {
				window.location = redirectUrl;
			} else if (sUserType == "LENDER" && redirectUrl == "") {
				window.location = "idb";
			} else if (sUserType == "HELPDESKADMIN") {
				window.location = "admin/helpdeskadmin";
			} else if (
				sUserType == "ADMIN" ||
				sUserType == "RADHAADMIN" ||
				sUserType == "OXYWHEELSADMIN" ||
				sUserType == "NOTBORROWER"
			) {
				writeCookie("interestRejected", false);
				writeCookie("principalRejected", false);

				window.location = "admin/dashboard";
			} else if (sUserType == "PAYMENTSADMIN") {
				window.location = "admin/paymentsUpload";
			} else if (sUserType == "SUBBUADMIN") {
				window.location = "showInterestPayments";
			} else if (sUserType == "PARTNERADMIN") {
				window.location = "admin/createUtmforpartnerDealer";
			} else {
				window.location = "borrowerDashboard";
			}
		},
		statusCode: {
			200: function (response) {
				console.log("Login Successs");
			},
			401: function (response) {
				$(".erroruser").show();
				$(".displayScreenFlowArw").show();
				$(".displayScreenFlowRefresh").hide();
			},
			400: function (response) {
				var _errorCodeis = response.responseJSON["errorCode"];
				var _errorCodeTextIs = response.responseJSON["errorMessage"];
				if (_errorCodeis == 128) {
					getUseridFromErrorMessage = _errorCodeTextIs.split(
						"User email is null userId = "
					)[1];
					$("#getnullUserId").val(getUseridFromErrorMessage);
					$(".enterUSERLOGINSection").hide();
					$(".enteremailnullSection").show();
				}
				if (_errorCodeis == 113) {
					if (userisIn == "prod") {
						getidFromErrorMessage = _errorCodeTextIs.split("=")[1];
						getEmailFromErrorMessage = _errorCodeTextIs.split("=")[2];

						$(".useremailtoverify").html(getEmailFromErrorMessage);
						$(".displayScreenFlowRefresh").hide();

						$(".notverified").show();
						setTimeout(function () {
							sendActivationNullEmail(getidFromErrorMessage, "true");
						}, 3000);
					} else {
						getidFromErrorMessage = _errorCodeTextIs.split("=")[1];
						getEmailFromErrorMessage = _errorCodeTextIs.split("=")[2];

						$(".useremailtoverify").html(getEmailFromErrorMessage);
						$(".displayScreenFlowRefresh").hide();

						$(".notverified").show();
						setTimeout(function () {
							sendActivationNullEmail(getidFromErrorMessage, "true");
						}, 3000);
					}
				}
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
		// console.log(xhr.getResponseHeader("accessToken"));
		// accessToken = xhr.getResponseHeader("accessToken");
		writeCookie("saccessToken", data.accessToken);

		var sUserType = data.primaryType;
		var isValidityExpire = data.validityCheck;

		redirectUrl = getCookie("redirectUrl");

		if (sUserType == "LENDER" && redirectUrl != "") {
			window.location = redirectUrl;
		} else if (sUserType == "LENDER" && redirectUrl == "") {
			window.location = "idb";
		} else if (
			sUserType == "ADMIN" ||
			sUserType == "RADHAADMIN" ||
			sUserType == "OXYWHEELSADMIN"
		) {
			writeCookie("interestRejected", false);
			writeCookie("principalRejected", false);
			window.location = "admin/dashboard";
		} else if (sUserType == "PAYMENTSADMIN") {
			window.location = "admin/paymentsUpload";
		} else if (sUserType == "HELPDESKADMIN") {
			window.location = "admin/helpdeskadmin";
		} else if (sUserType == "SUBBUADMIN") {
			window.location = "admin/showInterestPayments";
		} else if (sUserType == "PARTNERADMIN") {
			window.location = "admin/createUtmforpartnerDealer";
		} else {
			window.location = "borrowerDashboard";
		}
	});
};
