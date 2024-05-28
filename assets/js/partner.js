let userisIn = "prod";


var apiBaseURLOXY = "";

if (userisIn == "prod") {
	apiBaseURLOXY = "https://fintech.oxyloans.com/oxyloans/v1/user/";
} else {
	apiBaseURLOXY =
		"http://35.154.48.120:8080/oxynew/v1/user/";
}

function getSessionExpireData() {

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	tokenTimeStamp = getCookie("tokenTime");

	var addingtime = 1500000;
	var getTime = parseInt(tokenTimeStamp) + addingtime;
	var date = new Date();
	var milliseconds = date.getTime();
	if (milliseconds > getTime) {
		getNewTime();
	}
}

function getNewTime() {

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getsession =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/PARTNER/accessTokenGeneration";
	} else {
		var getsession =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/PARTNER/accessTokenGeneration";
	}
	$.ajax({
		url: getsession,
		type: "GET",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			writeCookie("tokenTime", "");
			writeCookie("tokenTime", data.tokenGeneratedTime);
			writeCookie("saccessToken", "");
			// writeCookie("saccessToken", data.accessToken);
			$("#modal-check-session-expire").modal("hide");
		},
	}).done(function (data, textStatus, xhr) {
		console.log(xhr.getResponseHeader("accessToken"));
		accessToken = xhr.getResponseHeader("accessToken");
		writeCookie("saccessToken", accessToken);

		setTimeout(function () {
			window.location.reload();
		}, 3000);
	});
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

$(".deleteSession").click(function () {
	signout();
});

function checkuserTypeBeforeLoad() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");
	parnerwallet = getCookie("partnerWallet");
	console.log(getUserUtm);
	$(".utmPartnerName").val(getUserUtm);
	$("#displayUserName").html(getUserUtm);
	$(".walletinfopartner").html(parnerwallet);
}

// ***************** DASHBOARD DATA*****************///

//*********     LENDER/BORROWER  SEARCH STARTS **********//

function loadpartner() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");
}

function getListOfPartnersUsers() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");

	if (userisIn == "local") {
		var listofusers =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			getUserUtm +
			"/gettingPartnerDetailsBasedOnUtm";
	} else {
		var listofusers =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			getUserUtm +
			"/gettingPartnerDetailsBasedOnUtm";
	}

	$.ajax({
		url: listofusers,
		type: "GET",
		success: function (data, textStatus, xhr) {
			writeCookie("UTMNAME", data.utmName);
			$(".partnerUtm").html(data.utmName);

			if (userisIn == "local") {
				$(".b_partnerUtm").val(
					"http://182.18.139.198/new/register_borrower?utm=" + data.utmName
				);
				$(".l_partnerUtm").val(
					"http://182.18.139.198/new/register_lender?utm=" + data.utmName
				);
				$("#nrirefLinkU").val(
					"http://182.18.139.198/new/nrilenderregistration?utm=" + data.utmName
				);
				$(".l_partnerRegister").val(
					"http://182.18.139.198/new/register_lender?utmForPartner=PR_" +
						data.utmName
				);
				$(".b_partnerRegister").val(
					"http://182.18.139.198/new/register_borrower?utmForPartner=PR_" +
						data.utmName
				);
				$(".sub_partnereferrer").val(
					"http://182.18.139.198/new/partner_Register?refForPartner=" +
						data.utmName
				);
			} else {
				$(".b_partnerUtm").val(
					"https://www.oxyloans.com/new/register_borrower?utm=" + data.utmName
				);
				$(".l_partnerUtm").val(
					"https://www.oxyloans.com/new/register_lender?utm=" + data.utmName
				);
				$("#nrirefLinkU").val(
					"https://www.oxyloans.com/new/nrilenderregistration?utm=" +
						data.utmName
				);
				$(".l_partnerRegister").val(
					"https://www.oxyloans.com/new/register_lender?utmForPartner=PR_" +
						data.utmName
				);
				$(".sub_partnereferrer").val(
					"https://www.oxyloans.com/new/partner_Register?refForPartner=" +
						data.utmName
				);
				$(".b_partnerRegister").val(
					"https://www.oxyloans.com/new/register_borrower?utmForPartner=PR_" +
						data.utmName
				);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".modal-body #searchbody").html(arguments[0].responseJSON.errorMessage);
			if (arguments[0].responseJSON.errorCode == 404) {
				$("#modal-searchcall-showinterestdata").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function resetPartnerCredentials() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var utmName = $(".utmPartnerName").val();
	var utmPass = $(".partnerPassword").val();

	var postData = {
		partnerUtmName: utmName,
		partnerPassword: utmPass,
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var resetPass = apiBaseURLOXY + "resetpasswordForPartners";
	} else {
		var resetPass = apiBaseURLOXY + "resetpasswordForPartners";
	}

	$.ajax({
		url: resetPass,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-partner-credentials-reset").modal("show");
			setTimeout(function () {
				location.reload();
			}, 4000);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			  
		},

		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function getListOfLendersList() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");

	if (userisIn == "local") {
		var listofusers =
			apiBaseURLOXY + getUserUtm + "/gettingPartnerDetailsBasedOnUtm";
	} else {
		var listofusers =
			apiBaseURLOXY + getUserUtm + "/gettingPartnerDetailsBasedOnUtm";
	}

	$.ajax({
		url: listofusers,
		type: "GET",

		success: function (data, textStatus, xhr) {
			if (data.countOfLenders == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayInterestScript"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.listOfLenders });
				$("#loadDealsInfo").html(html);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".modal-body #searchbody").html(arguments[0].responseJSON.errorMessage);
			if (arguments[0].responseJSON.errorCode == 404) {
				$("#modal-searchcall-showinterestdata").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function updateEmailMobile() {
	getUserMobile = getCookie("partnerMobileNumber");
	getUserEmail = getCookie("partnerEmail");
	isupdate = getCookie("isupdate");

	if (getUserMobile == "" && getUserEmail == "" && isupdate == "") {
		$("#update-paretner-details-mobile").modal("show");
	} else {
		$("#update-paretner-details-mobile").modal("hide");
	}
}

function partnerUpdateNumberEmail() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	foldername = getCookie("outputfolder");
	getUserUtm = getCookie("partnerUtmName");

	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var phoneno = $("#partnerPhone").val();
	var email = $("#partnerEmail").val();

	var postData = {
		partnerUtmName: getUserUtm,
		partnerEmail: email,
		partnerMobileNumber: phoneno,
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var update = apiBaseURLOXY + "savingPartnerDetails";
	} else {
		var update = apiBaseURLOXY + "savingPartnerDetails";
	}

	$.ajax({
		url: update,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			// $("#modal-confirmOutput-folder").modal("hide");
			$("#update-paretner-details-mobile").modal("hide");
			$("#modal-sucessfully-updated").modal("show");
			var mobile = data.partnerMobileNumber;

			writeCookie("isupdate", mobile);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			  
		},

		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadUtm() {
	utmName = getCookie("UTMNAME");

	if (userisIn == "local") {
		$("#nrirefLinkU").val(
			"http://182.18.139.198/new/nrilenderregistration?utm=" + utmName
		);
		$(".l_partnerRegister").val(
			"http://182.18.139.198/new/register_lender?utmForPartner=PR_" + utmName
		);
		$("#nR_partnerUtm").val(
			"http://182.18.139.198/new/nrilenderregistration?ref=" + utmName
		);
		$("#b_partnerUtm").val(
			"http://182.18.139.198/new/register_borrower?utm=" + utmName
		);
		$("#l_partnerUtm").val(
			"http://182.18.139.198/new/register_lender?utm=" + utmName
		);
	} else {
		$("#nrirefLinkU").val(
			"https://www.oxyloans.com/new/nrilenderregistration?utm=" + utmName
		);
		$("#nR_partnerUtm").val(
			"https://www.oxyloans.com/new/nrilenderregistration?ref=" + utmName
		);
		$("#b_partnerUtm").val(
			"https://www.oxyloans.com/new/register_borrower?utm=" + utmName
		);
		$("#l_partnerUtm").val(
			"https://www.oxyloans.com/new/register_lender?utm=" + utmName
		);
	}
}

function getGmailAuthorization() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getGmailAuthorization =
			apiBaseURLOXY + "getGmailAuthorization/gmailcontacts/partner";
	} else {
		var getGmailAuthorization =
			apiBaseURLOXY + "getGmailAuthorization/gmailcontacts/partner";
	}

	$.ajax({
		url: getGmailAuthorization,
		type: "GET",

		success: function (data, textStatus, xhr) {
			$("#Gmailcontacts").attr("href", data.signInUrl);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function copyReferresSubLink(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-ref-partner").html("Copied!");
}

function copyBorrowerrefLink(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-ref-borrower").html("Copied!");
}

function copyLenderrrefLink(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-ref-lender,.btn-ref").html("Copied!");
}

function copyNrirefLink(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-ref-nri").html("Copied!");
}

function partner_register(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-reg-partner").html("Copied!");
}

function partner_bregister(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-regb-partner").html("Copied!");
}

$(document).ready(function () {
	$("#referee-submit-btn").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredname = $("#refereename").val();
		var enteredemil = $("#referemail").val();
		// var mailSubject = $("#mailSubject").val();
		// var mailcontent = $("#mailcontent").val();
		var referrerType = $("input[name='referrerType']:checked").val();
		var userPrimaryType = $("input[name='primaryreferrerType']:checked").val();
		var referrercountryCode = $("#phoneNumber").val();

		var isValid = true;

		if (enteredname == "") {
			$(".name").show();
			isValid = false;
		} else {
			$(".name").hide();
		}

		if (referrercountryCode == "") {
			$(".mobilenumber").show();
			isValid = false;
		} else {
			$(".mobilenumber").hide();
		}

		if (enteredemil == "") {
			$(".email").show();
			isValid = false;
		} else {
			$(".email").hide();
		}

		if (userPrimaryType == undefined) {
			$(".chooseReferrer").show();
			isValid = false;
		} else {
			$(".chooseReferrer").hide();
		}

		var postData = {
			email: enteredemil,
			mobileNumber: referrercountryCode,
			name: enteredname,
			mailContent: "0",
			mailSubject: "0",
			referrerId: userId,
			primaryType: userPrimaryType,
			citizenType: referrerType,
			seekerRequestedId: "0",
			userType: "PARTNER",
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			var getStatUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/lenderReferring";
		} else {
			var getStatUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/lenderReferring";
		}

		if (isValid == true) {
			$.ajax({
				url: getStatUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",

				success: function (data, textStatus, xhr) {
					$("#modal-alreadyDoneSendOffers").modal("show");
					setTimeout(function () {
						location.reload();
					}, 3000);
				},
				error: function (xhr, textStatus, errorThrown) {
					$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);
					if (arguments[0].responseJSON.errorCode == 109) {
						$("#modal-alreadyDoneSendOffertopartner").modal("show");
					} else if (arguments[0].responseJSON.errorCode == 403) {
						$("#modal-alreadyDoneSendOffer").modal("show");
					}
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$("#viewPreview").click(function () {
		var getsubjectValue = $("#mailSubject").val();
		$(".getSubject").html(getsubjectValue);

		var getContentValue = $("#mailcontent").val();

		$(".getEmailMessage").html(getContentValue);

		var usrNameEmail = $(".displayUserName").html();
		$(".usrNameEmail").html(usrNameEmail);

		var getfrndName = $("#refereename").val();
		if (getfrndName == "") {
			getfrndName = "User Name";
		}
		$(".getfrndName").html(getfrndName);

		var d = new Date();

		var month = d.getMonth() + 1;
		var day = d.getDate();

		var output =
			d.getFullYear() +
			"/" +
			(("" + month).length < 2 ? "0" : "") +
			month +
			"/" +
			(("" + day).length < 2 ? "0" : "") +
			day;

		$(".getDate").html(output);
		$("#modal-previewEmail").modal("show");
	});
});

// ENDS  RAISE A LOAN REQUEST //
$(document).ready(function () {
	$("#bulkinvite").click(function () {
		$("#modal-uploadBulkInvite").modal("show");
	});
});

function readBulkInviteThroughDoc(input) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var content = $("#mailcontent").val();

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(".passportUpload1 .image-upload-wrap").hide();

			$(".passportUpload1 .file-upload-image").attr("src", e.target.result);
			$(".passportUpload1 .file-upload-content").show();

			$(".passportUpload1 .image-title").html(input.files[0].name);
		};

		reader.readAsDataURL(input.files[0]);

		var fd = new FormData();
		var files = input.files[0];

		fd.append("BULKINVITE", files);
		fd.append("content", content);

		if (userisIn == "local") {
			var actionURL = apiBaseURLOXY + "sendBulkInviteThroughExcel/" + suserId;
		} else {
			var actionURL = apiBaseURLOXY + "sendBulkInviteThroughExcel/" + suserId;
		}
		$.ajax({
			url: actionURL,
			type: "POST",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#modal-uploadBulkInvite").modal("hide");
					$("#modal-fileUploadedSuccessfully").modal("show");
				} else {
					$("#modal-uploadBulkInvite").modal("hide");
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				$("#modal-uploadBulkInvite").hide();
				alert("file not uploaded");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", accessToken);
			},
		});
	}
}

function emailcontent() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/mailContentShowingToPartner";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/mailContentShowingToPartner";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",

		success: function (data, textStatus, xhr) {
			$("#emailsubject").val(data.mailSubject);

			var emailcontent = data.mailContent;
			if (primaryType == "BORROWER") {
				emailcontent = emailcontent.split(
					"I am Investing multiples of INR 50,000 "
				)[0];
			}
			var bottomcontet = data.bottomOfTheMail;
			var fullemailcontent = emailcontent + "\n" + bottomcontet;

			$("#mailcontent").val(fullemailcontent);
			$("#emailcontent").val(fullemailcontent);

			$("#mailSubject").val(data.mailSubject);
			$(".getEmailMessage").html(data.mailContent);
			$(".usrNameEmails").html(data.mailSubject);
			$("#subjectbulk").val(data.mailSubject);

			$("#contentbulk").val(data.mailContent);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

function lenderreferrerinfo() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/displayingReferrerInfo";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/displayingReferrerInfo";
	}
	// alert(actOnLoan);
	var postData = {
		pageNo: 1,
		pageSize: 10,
	};
	// alert(postData);
	var postData = JSON.stringify(postData);
	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.countOfReferees;
			if (data.countOfReferees == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"wallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, {
					data: data.listOfLenderReferenceDetails,
				});
				$("#displaywallettrns").html(html);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".acceptedPagination")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
						// alert(postData);

						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/displayingReferrerInfo";
						} else {
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/displayingReferrerInfo";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template = document.getElementById(
									"wallettransactiondetails"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.listOfLenderReferenceDetails,
								});
								// alert(html);

								$("#displaywallettrns").html(html);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

// gmail contacts functionality////

function Gmailcontacts() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var gmailCode = $("#gmailcode").val();
	// alert( gmailCode);

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/getContactsFromGmailAccount/" +
			userId;
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/getContactsFromGmailAccount/" +
			userId;
	}

	var postData = {
		gmailCode: gmailCode,
		userType: "partner",
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.length;
			if (data.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("Gmailcontacts").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, { data: data });
				$("#gmailcontacts").html(html);
				$("#modal-alreadyDoneSendOffers").modal("show");

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".acceptedPagination")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							gmailCode: gmailCode,
						};

						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/getLenderStoredEmailContacts/" +
								suserId;
						} else {
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/getLenderStoredEmailContacts/" +
								suserId;
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("Gmailcontacts").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, { data: data });
								$("#gmailcontacts").html(html);
								$("#modal-alreadyDoneSendOffers").modal("show");
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function getlendercontacts() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getGmailAuthorization =
			"http://35.154.48.120:8080/oxynew/v1/user/getLenderStoredEmailContacts/" +
			suserId;
	} else {
		var getGmailAuthorization =
			"https://fintech.oxyloans.com/oxyloans/v1/user/getLenderStoredEmailContacts/" +
			suserId;
	}

	$.ajax({
		url: getGmailAuthorization,
		type: "GET",

		success: function (data, textStatus, xhr) {
			if (data.length == "0") {
				$(".displayRequests").show();
			} else {
				var template = document.getElementById("Gmailcontacts").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, { data: data });
				$("#gmailcontacts").html(html);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

///////Bulk lender Invites//////START BY LIVIN///

function bulkinvitelender() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	$(".loadingSec").show();

	var array = "";
	$("input:checkbox[name=type]:checked").each(function () {
		if (this.checked) {
			array += $(this).val() + ",";
		}
	});

	var mailContent = $("#contentbulk").val();
	var mailSubject = $("#subjectbulk").val();

	if (userisIn == "local") {
		var updateCommentUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/lenderReferring";
	} else {
		var updateCommentUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/lenderReferring";
	}
	var postData = {
		email: array,
		referrerId: suserId,
		mailContent: mailContent,
		mailSubject: mailSubject,
	};

	var postData = JSON.stringify(postData);
	// alert(postData);
	$.ajax({
		url: updateCommentUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$(".loadingSec").hide();
			$("#modal-alreadyDoneSendOffers").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".loadingSec").hide();
			$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);
			if (arguments[0].responseJSON.errorCode == 403) {
				$("#modal-alreadyLenderReferred").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function previewLink() {
	var d = new Date();
	var month = d.getMonth() + 1;
	var day = d.getDate();
	var output =
		d.getFullYear() +
		"/" +
		(("" + month).length < 2 ? "0" : "") +
		month +
		"/" +
		(("" + day).length < 2 ? "0" : "") +
		day;
	$(".getDate").html(output);
	$("#modal-previewEmail").modal("show");
}

$(document).ready(function () {
	$("#emailredirection").click(function () {
		window.location = "https://oxyloans.com/new/displayingReferrerInfo";
	});
});

// *********download referrence amount based on payment Status*********

function downloadreferrencePaymentStatus(earnStatus) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var ignoreURL =
			"http://35.154.48.120:8080/oxynew/v1/user/downLoadLinkForBonusAmount";
	} else {
		var ignoreURL =
			"https://fintech.oxyloans.com/oxyloans/v1/user/downLoadLinkForBonusAmount";
	}

	var postData = {
		userId: suserId,
		paymentStatus: earnStatus,
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: ignoreURL,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			window.open(data.downloadLink, "_blank");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

$(function () {
	$(".myEarningStatus").change(function () {
		$(".showEarnamountStatus").append('<div class="loader"></div>');
		$(".showEarnamountStatus").addClass("lildark");
		var thisSortby = $(this).val();
		$(".btn4ReferralPayment").attr(
			"onClick",
			'downloadreferrencePaymentStatus("' + thisSortby + '")'
		);

		setTimeout(function () {
			referralBonusAmountBasedONStatus(thisSortby);
		}, 1000);
	});
});

function refereeRegisteredInfo() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/refereeRegisteredInfo";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/refereeRegisteredInfo";
	}

	var postData = {
		pageNo: 1,
		pageSize: 10,
	};
	// alert(postData);
	var postData = JSON.stringify(postData);
	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.countOfReferees;
			if (data.countOfReferees == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"wallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, {
					data: data.listOfLenderReferenceDetails,
				});
				$("#displaywallettrns").html(html);

				$(".userEarnedAmount").html(data.totalAmountEarned);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".acceptedPagination")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/refereeRegisteredInfo";
						} else {
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/refereeRegisteredInfo";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								$(".userEarnedAmount").html(data.totalAmountEarned);

								var template = document.getElementById(
									"wallettransactiondetails"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.listOfLenderReferenceDetails,
								});
								// alert(html);

								$("#displaywallettrns").html(html);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function downloadReferralAmountStatement() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var referralUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/referralBonusAmountLink";
	} else {
		var referralUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/referralBonusAmountLink";
	}

	$.ajax({
		url: referralUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			$(".userEarnedAmount").html(data.amountEarned);
			window.open(data.downloadUrl, "_blank");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

//******get sdvise seekers info ********start by livin*****

function getadviceSeekers() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var seekersData =
			"http://35.154.48.120:8080/oxynew/v1/user/fetchAdviseSeekers/" +
			suserId;
	} else {
		var seekersData =
			"https://fintech.oxyloans.com/oxyloans/v1/user/fetchAdviseSeekers/" +
			suserId;
	}

	$.ajax({
		url: seekersData,
		type: "GET",

		success: function (data, textStatus, xhr) {
			if (data.length == "0") {
				$(".displayRequests").show();
			} else {
				var template = document.getElementById("seekerInfo").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data });
				$("#seekersData").html(html);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

//**********Referral Bonus Amount Based On Status***********

function referralBonusAmountBasedONStatus(paymentStatus) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var getborrowers =
			"http://35.154.48.120:8080/oxynew/v1/user/referralBonusAmountBasedOnStatus";
	} else {
		var getborrowers =
			"https://fintech.oxyloans.com/oxyloans/v1/user/referralBonusAmountBasedOnStatus";
	}

	var postData = {
		pageNo: 1,
		pageSize: 10,
		paymentStatus: paymentStatus,
		userId: suserId,
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: getborrowers,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$(".totalEarning").html(data.totalAmountEarned);
			$(".paidEarning").html(data.sumOfPaidAmount);
			$(".unpaidEarning").html(data.sumOfUnpaidAmount);

			totalEntries = data.lenderReferenceAmountResponse.length;

			if (totalEntries == 0) {
				$("#noRecordFound").show();
			} else {
				var template = document.getElementById(
					"wallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, {
					data: data.lenderReferenceAmountResponse,
				});
				$("#displaywallettrns").html(html);
				$("#displaywallettrns").show();

				var displayPageNo = data.count / 10;
				displayPageNo = displayPageNo + 1;

				$(".acceptedPagination")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							paymentStatus: paymentStatus,
							userId: suserId,
						};

						var postData = JSON.stringify(postData);

						if (userisIn == "local") {
							var getborrowers =
								"http://35.154.48.120:8080/oxynew/v1/user/referralBonusAmountBasedOnStatus";
						} else {
							var getborrowers =
								"https://fintech.oxyloans.com/oxyloans/v1/user/referralBonusAmountBasedOnStatus";
						}
						$.ajax({
							url: getborrowers,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template = document.getElementById(
									"wallettransactiondetails"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.lenderReferenceAmountResponse,
								});
								$("#displaywallettrns").html(html);
								$(".userEarnedAmount").html(data.totalAmountEarned);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$(".showEarnamountStatus .loader").remove();
	$(".showEarnamountStatus").removeClass("lildark");
}

function partnerVerifySession() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerName = getCookie("partnerUtmName");

	if (userisIn == "local") {
		var verifySession =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			partnerName +
			"/countOfLRAndBRforPartner";
	} else {
		var verifySession =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			partnerName +
			"/countOfLRAndBRforPartner";
	}

	$.ajax({
		url: verifySession,
		type: "GET",
		success: function (data, textStatus, xhr) {
			partnermobileverification = data.mobileverified;
			partnerEmaileverification = data.emailVerified;

			if (partnermobileverification == true) {
				$(".verify-otp").hide();
				$(".inputs-verify").hide();
				$(".imagesection").hide();
			} else {
				$(".mobileverifiydonesection").hide();
			}

			if (partnerEmaileverification == true) {
				$(".verify-Emailotp").hide();
				$(".inputs-verify-Email").hide();
				$(".email-section").hide();
			} else {
				$(".emailverifiydonesection").hide();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function partnerVerifyMobile() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerName = getCookie("partnerUtmName");

	var partnerMobile = $("#partnerMobileno").val();

	var isValid = true;

	if (partnerMobile == "") {
		$(".partnerMobileerror").show();
		isValid = false;
	} else {
		$(".partnerMobileerror").hide();
	}

	var postData = {
		utmName: partnerName,
		partnerMobileNumber: partnerMobile,
	};
	postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var getotp =
			"http://35.154.48.120:8080/oxynew/v1/user/verifyingMobileAndEmailForPartner";
	} else {
		var getotp =
			"https://fintech.oxyloans.com/oxyloans/v1/user/verifyingMobileAndEmailForPartner";
	}

	if (isValid == true) {
		$.ajax({
			url: getotp,
			type: "PATCH",
			data: postData,
			contentType: "application/json",
			dataType: "json",

			success: function (data, textStatus, xhr) {
				$(".verify-otp").show();
				$(".inputs-verify").hide();

				partnerMobileNumber = data.mobileNumber;
				partnerMobileOtpsession = data.mobileOtpSession;
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");

				$(".errormessage #data").html(arguments[0].responseJSON.errorMessage);
				if (arguments[0].responseJSON.errorCode == 103) {
					$("#modal-partnerErrormessages").modal("show");
				}

				if (arguments[0].responseJSON.errorCode == 105) {
					$("#modal-partnerErrormessages").modal("show");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
}

function partnerVerifyMobileotpsession() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerName = getCookie("partnerUtmName");

	var mobileNumber = $("#partnerMobileno").val();

	var otp1 = $("#codeBox1").val();
	var otp2 = $("#codeBox2").val();
	var otp3 = $("#codeBox3").val();
	var otp4 = $("#codeBox4").val();
	var otp5 = $("#codeBox5").val();
	var otp6 = $("#codeBox6").val();

	var mobileotpinputs = otp1 + otp2 + otp3 + otp4 + otp5 + otp6;

	var postData = {
		utmName: partnerName,
		partnerMobileNumber: mobileNumber,
		mobileOtpSession: partnerMobileOtpsession,
		mobileOtpValue: mobileotpinputs,
	};
	postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var getotp =
			"http://35.154.48.120:8080/oxynew/v1/user/verifyingMobileAndEmailForPartner";
	} else {
		var getotp =
			"https://fintech.oxyloans.com/oxyloans/v1/user/verifyingMobileAndEmailForPartner";
	}

	$.ajax({
		url: getotp,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			$("#modal-partnerVerifymobile").modal("show");

			setTimeout(function () {
				window.location.reload();
			}, 3000);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".errormessage #data").html(arguments[0].responseJSON.errorMessage);
			if (arguments[0].responseJSON.errorCode == 103) {
				$("#modal-partnerErrormessages").modal("show");
			}

			if (arguments[0].responseJSON.errorCode == 105) {
				$("#modal-partnerErrormessages").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function partnerVerifyEmail() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerName = getCookie("partnerUtmName");
	partnerMobile = getCookie("partnerMobileNumber");

	var partnerEmail = $("#partnerEmailid").val();

	var isValid = true;

	if (partnerEmail == "") {
		$(".partnerEmailerror").show();
		isValid = false;
	} else {
		$(".partnerEmailerror").hide();
	}

	var postData = {
		utmName: partnerName,
		partnerMobileNumber: partnerMobile,
		partnerEmail: partnerEmail,
	};
	postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var getotp =
			"http://35.154.48.120:8080/oxynew/v1/user/verifyingMobileAndEmailForPartner";
	} else {
		var getotp =
			"https://fintech.oxyloans.com/oxyloans/v1/user/verifyingMobileAndEmailForPartner";
	}
	if (isValid == true) {
		$.ajax({
			url: getotp,
			type: "PATCH",
			data: postData,
			contentType: "application/json",
			dataType: "json",

			success: function (data, textStatus, xhr) {
				$(".verify-Emailotp").show();
				$(".inputs-verify-Email").hide();

				partneremailMobileNumber = data.mobileNumber;
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");

				$(".errormessage #data").html(arguments[0].responseJSON.errorMessage);
				if (arguments[0].responseJSON.errorCode == 403) {
					$("#modal-partnerErrormessages").modal("show");
				}

				if (arguments[0].responseJSON.errorCode == 113) {
					$("#modal-partnerErrormessages").modal("show");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
}

function partnerVerifyEmailotpsession() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerName = getCookie("partnerUtmName");

	var email = $("#partnerEmailid").val();

	var otp1 = $("#codeBoxE1").val();
	var otp2 = $("#codeBoxE2").val();
	var otp3 = $("#codeBoxE3").val();
	var otp4 = $("#codeBoxE4").val();
	var otp5 = $("#codeBoxE5").val();
	var otp6 = $("#codeBoxE6").val();

	var emailotpinputs = otp1 + otp2 + otp3 + otp4 + otp5 + otp6;

	var postData = {
		utmName: partnerName,
		partnerMobileNumber: partneremailMobileNumber,
		partnerEmail: email,
		emailOtpValue: emailotpinputs,
	};
	postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var getEmail =
			"http://35.154.48.120:8080/oxynew/v1/user/verifyingMobileAndEmailForPartner";
	} else {
		var getEmail =
			"https://fintech.oxyloans.com/oxyloans/v1/user/verifyingMobileAndEmailForPartner";
	}

	$.ajax({
		url: getEmail,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			$("#modal-partnerVerifyEmail").modal("show");

			setTimeout(function () {
				window.location.reload();
			}, 4000);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");

			$(".errormessage #data").html(arguments[0].responseJSON.errorMessage);
			if (arguments[0].responseJSON.errorCode == 403) {
				$("#modal-partnerErrormessages").modal("show");
			}

			if (arguments[0].responseJSON.errorCode == 113) {
				$("#modal-partnerErrormessages").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function wellcomenote() {
	$("#modal-welcomeWindow").modal("show");
}

$(document).ready(function () {
	$("#user-bank-verify").click(function () {
		$("#loadingSec").show();

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredaccountno = $("#oxyaccountno").val();
		var enteredIFSCCode = $("#oxybankifscCode").val();
		var enteredconfirmaccountno = $("#oxyconfirmaccountno").val();

		var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;

		var isValid = true;

		if (enteredaccountno == "") {
			$(".accountnoError").show();
			isValid = false;
		} else {
			$(".accountnoError").hide();
		}

		if (enteredconfirmaccountno == "") {
			$(".oxyconfirmaccountnoError").show();
			isValid = false;
		} else {
			$(".oxyconfirmaccountnoError").hide();
		}

		if (enteredaccountno != enteredconfirmaccountno) {
			$(".oxyconfirmaccountnoError").show();
			isValid = false;
		} else {
			$(".oxyconfirmaccountnoError").hide();
		}

		if (!ifscRegex.test(enteredIFSCCode)) {
			$(".IFSCCodeerror").html("Please enter valid IFSC code.");
			$(".IFSCCodeerror").show();
			isValid = false;
		} else {
			$(".IFSCCodeerror").hide();
		}

		var postData = {
			bankAccount: enteredaccountno,
			ifscCode: enteredIFSCCode,
		};
		var postData = JSON.stringify(postData);

		if (userisIn == "local") {
			validate =
				"http://35.154.48.120:8080/oxynew/v1/user/verifyBankAccountAndIfsc";
		} else {
			validate =
				"https://fintech.oxyloans.com/oxyloans/v1/user/verifyBankAccountAndIfsc";
		}
		if (isValid == true) {
			$.ajax({
				url: validate,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					if (data.status == "SUCCESS" && data.accountStatus == "VALID") {
						setTimeout(function () {
							$("#loadingSec").hide();
						}, 3000);
						$("#user-bank-save").show();
						bankVerifyingSTATUS = "SUCCESS";

						$(".bank_username,.bank_Name,.bank_Branch,.bank_city").show();
						$("#bankUsername").val(data.data.nameAtBank);
						$("#bankname").val(data.data.bankName);
						$("#bankBranch").val(data.data.branch);
						$("#bankcity").val(data.data.city);
					} else {
						setTimeout(function () {
							$("#loadingSec").hide();
						}, 3000);

						$(".bank_username,.bank_Name,.bank_Branch,.bank_city").hide();
						alert("please  Enter the valid bank details");
						bankVerifyingSTATUS = "FAILED";
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		$("#loadingSec").hide();
		return isValid;
	});
});

$(document).ready(function () {
	$("#user-bank-save").click(function () {
		$("#loadingSec").show();

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		partnerUtmName = getCookie("partnerUtmName");

		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredaccountno = $("#oxyaccountno").val();
		var enteredIFSCCode = $("#oxybankifscCode").val();
		var enteredconfirmaccountno = $("#oxyconfirmaccountno").val();

		var bankName = $("#bankname").val();
		var branchName = $("#bankBranch").val();
		var userName = $("#bankUsername").val();

		var bankcity = $("#bankcity").val();

		var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;

		var isValid = true;

		if (enteredaccountno == "") {
			$(".accountnoError").show();
			isValid = false;
		} else {
			$(".accountnoError").hide();
		}

		if (enteredaccountno != enteredconfirmaccountno) {
			$(".confirmaccountnoError").show();
			isValid = false;
		} else {
			$(".confirmaccountnoError").hide();
		}

		if (!ifscRegex.test(enteredIFSCCode)) {
			$(".IFSCCodeerror").html("Please enter valid IFSC code.");
			$(".IFSCCodeerror").show();
			isValid = false;
		} else {
			$(".IFSCCodeerror").hide();
		}

		if (bankName == "") {
			$(".errorbankName").show();
			isValid = false;
		} else {
			$(".errorbankName").hide();
		}
		if (branchName == "") {
			$(".errorbankBranch").show();
			isValid = false;
		} else {
			$(".errorbankBranch").hide();
		}

		if (userName == "") {
			$(".errorName").show();
			isValid = false;
		} else {
			$(".errorName").hide();
		}

		if (bankcity == "") {
			$(".errorbankCity").show();
			isValid = false;
		} else {
			$(".errorbankCity").hide();
		}

		var postData = {
			accountNumber: enteredaccountno,
			ifscCode: enteredIFSCCode,
			bankName: bankName,
			branchName: branchName,
			userName: userName,
		};
		var postData = JSON.stringify(postData);

		if (userisIn == "local") {
			validate =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				partnerUtmName +
				"/bankDetailsForPartner";
		} else {
			validate =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				partnerUtmName +
				"/bankDetailsForPartner";
		}
		if (isValid == true) {
			$.ajax({
				url: validate,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#loadingSec").hide();
					$("#modal-partnerBankDetails").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					$("#loadingSec").hide();
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		$("#loadingSec").hide();
		return isValid;
	});
});

function getBankDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerUtmName = getCookie("partnerUtmName");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		validate =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			partnerUtmName +
			"/partnerProfileDetails";
	} else {
		validate =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			partnerUtmName +
			"/partnerProfileDetails";
	}

	$.ajax({
		url: validate,
		type: "GET",
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (
				data.accountNumber != "" &&
				data.branchName != "" &&
				data.ifscCode != ""
			) {
				$(".bank_username,.bank_Name,.bank_Branch,.bank_city").show();

				$("#oxyaccountno").val(data.accountNumber);
				$("#oxyconfirmaccountno").val(data.accountNumber);
				$("#bankBranch,#bankcity").val(data.branchName);
				$("#oxybankifscCode").val(data.ifscCode);
				$("#bankUsername").val(data.userName);
				$("#bankname").val(data.bankName);
				$("#user-bank-verify").hide();
				$("#user-bank-save").show();
			} else {
				$("#oxyaccountno").val(data.accountNumber);
				$("#oxyconfirmaccountno").val(data.accountNumber);
				$("#bankBranch").val(data.branchName);
				$("#oxybankifscCode").val(data.ifscCode);
				// $("#bankUsername").val(data.name);
				// $("#pemail").val(data.email);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function docuNDA() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerUtmName = getCookie("partnerUtmName");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var enteredname = $("#partnerName").val();
	var enteredCompanyname = $("#partnerCompany").val();
	var enteredcompanyaddress = $("#companyAddress").val();

	var enterrole = $("#role").val();
	var enteremail = $("#pemail").val();
	var entertype = $("#docutype").val();
	var service = $("#services").val();
	var enterecity = $("#partnercity").val();

	var isValid = true;

	if (enteredname == "") {
		$(".partnerNameError").show();
		isValid = false;
	} else {
		$(".partnerNameError").hide();
	}

	if (enteredCompanyname == "") {
		$(".companynameError").show();
		isValid = false;
	} else {
		$(".companynameError").hide();
	}

	if (enteredcompanyaddress == "") {
		$(".companyaddresserror").show();
		isValid = false;
	} else {
		$(".companyaddresserror").hide();
	}

	if (enterrole == "") {
		$(".errorRole").show();
		isValid = false;
	} else {
		$(".errorRole").hide();
	}
	if (enteremail == "") {
		$(".erroremailerror").show();
		isValid = false;
	} else {
		$(".erroremailerror").hide();
	}
	if (entertype == "") {
		$(".errortypes").show();
		isValid = false;
	} else {
		$(".errortypes").hide();
	}
	if (service == "") {
		$(".errorservices").show();
		isValid = false;
	} else {
		$(".errorservices").hide();
	}
	if (enterecity == "") {
		$(".errorpartnerCity").show();
		isValid = false;
	} else {
		$(".errorpartnerCity").hide();
	}

	var postData = {
		partnerName: enteredname,
		companyName: enteredCompanyname,
		companyAddress: enteredcompanyaddress,
		title: enterrole,
		emailId: enteremail,
		type: entertype,
		services: service,
		city: enterecity,
	};
	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		validate =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			partnerUtmName +
			"/partnerNDA";
	} else {
		validate =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			partnerUtmName +
			"/partnerNDA";
	}
	if (isValid == true) {
		$.ajax({
			url: validate,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#modal-partnerNDADetails").modal("show");

				if (data.status != null) {
					window.open(data.status, "_blank");
				} else {
					$.colorbox({ href: data.status });
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				$("#loadingSec").show();
				console.log("error");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}

	return isValid;
}

function downloadNDA(input, id) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerUtmName = getCookie("partnerUtmName");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		validate =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			id +
			"/downloadPartnerAgreementType/" +
			input +
			"";
	} else {
		validate =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			id +
			"/downloadPartnerAgreementType/" +
			input +
			"";
	}
	$.ajax({
		url: validate,
		type: "GET",
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != null) {
				window.open(data.downloadUrl, "_blank");
			} else {
				$.colorbox({ href: data.downloadUrl });
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("error");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function readNDA() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerUtmName = getCookie("partnerUtmName");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	var form = $("#ndafileupload")[0];
	var fd = new FormData();
	var files = form.files[0];
	fd.append("PARTNERNDA", files);

	if (userisIn == "local") {
		actionURL =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/partnerAgreementType";
	} else {
		actionURL =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/partnerAgreementType";
	}

	$.ajax({
		url: actionURL,
		type: "POST",
		data: fd,
		contentType: false,
		processData: false,
		enctype: "multipart/form-data",

		success: function (data, textStatus, xhr) {
			$("#modal-partnerNDAupload").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$("#modal-errorpartnerMOUupload").modal("show");
		},

		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function readMOU() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerUtmName = getCookie("partnerUtmName");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var form = $("#moufileupload")[0];

	var fd = new FormData();
	var files = form.files[0];
	fd.append("PARTNERMOU", files);

	if (userisIn == "local") {
		actionURL =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/partnerAgreementType";
	} else {
		actionURL =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/partnerAgreementType";
	}

	$.ajax({
		url: actionURL,
		type: "POST",
		data: fd,
		contentType: false,
		processData: false,
		enctype: "multipart/form-data",

		success: function (data, textStatus, xhr) {
			$("#modal-partnerMOUupload").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$("#modal-errorpartnerMOUupload").modal("show");
		},

		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function downloadPartnerDocs(input) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	partnerUtmName = getCookie("partnerUtmName");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		validate =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/downloadPartnerAgreementType/" +
			input +
			"";
	} else {
		validate =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/downloadPartnerAgreementType/" +
			input +
			"";
	}
	$.ajax({
		url: validate,
		type: "GET",
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-successdownload").modal("show");

			if (data.downloadUrl != null) {
				window.open(data.downloadUrl, "_blank");
			} else {
				$.colorbox({ href: data.downloadUrl });
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("error");
			$("#modal-errordownload").modal("show");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

// 		 function getSessionExpireData(){

// 	  suserId = getCookie("sUserId");
//       sprimaryType = getCookie("sUserType");
//       saccessToken = getCookie("saccessToken");
//       tokenTimeStamp = getCookie("tokenTime");

//        var addingtime=1500000;
//        var getTime= parseInt(tokenTimeStamp)+addingtime;
//        var date = new Date();
//        var milliseconds = date.getTime();
//        if(milliseconds > getTime){
//          getNewTime();

//        }
// 	}

// function getNewTime() {

//    suserId = getCookie("sUserId");
//    sprimaryType = getCookie("sUserType");
//    saccessToken = getCookie("saccessToken");

//   if (userisIn == "local") {
//     var getsession =
//     "http://35.154.48.120:8080/oxynew/v1/user/"+suserId+"/accessTokenGeneration";

//   } else {
//     var getsession =
//       "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/accessTokenGeneration";
//   }
//   $.ajax({
//     url: getsession,
//     type: "GET",
//     dataType: "json",
//     success: function (data, textStatus, xhr) {
//
//     	writeCookie("tokenTime","");
//     	writeCookie("tokenTime", data.tokenGeneratedTime);
//     	writeCookie("saccessToken","");
//        $("#modal-check-session-expire").modal("hide");

//     },
//   }).done(function (data, textStatus, xhr) {
// 				console.log(xhr.getResponseHeader("accessToken"));
// 				accessToken = xhr.getResponseHeader("accessToken");
// 				writeCookie("saccessToken", accessToken);

// 			});
// }

// *********View sub referee data *********

function viewSubereferreals(id) {
	// $(".solidToggle_"+id).slideToggle("slow");

	if (id == "" || id == null) {
		alert("no data found");
		return false;
	}

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var sub = id.substring(2);

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			sub +
			"/displayingReferrerInfo";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			sub +
			"/displayingReferrerInfo";
	}

	var postData = {
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.countOfReferees;
			if (data.listOfLenderReferenceDetails.length == 0) {
				$(".viewQueryAdminComments").show();
				$(".viewSubquery-" + id).show();
			} else {
				var template = document.getElementById(
					"viewgetSubreferreeUser"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, {
					data: data.listOfLenderReferenceDetails,
				});
				$("#displayUserQuery-" + id).html(html);
				$(".viewSubquery-" + id).show();

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".interstedPagination1")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								sub +
								"/displayingReferrerInfo";
						} else {
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								sub +
								"/displayingReferrerInfo";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template = document.getElementById(
									"viewgetSubreferreeUser"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.listOfLenderReferenceDetails,
								});
								$("#displayUserQuery-" + id).html(html);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");

								// $(".nodataFound").show();
								// $(".viewSubquery-"+id).show();
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");

			// $(".viewQueryAdminComments").show();
			// $(".viewSubquery-"+id).show();
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

///*********************view my loan applications......***********

function signout() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	writeCookie("sUserId", "");
	writeCookie("sUserType", "");
	writeCookie("saccessToken", "");
	writeCookie("tokenTime", "");
	writeCookie("partnerWallet", "");
	writeCookie("UTMNAME", "");

	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (userisIn == "local") {
		var signoutUrl = apiBaseURLOXY + "logout";
	} else {
		var signoutUrl = apiBaseURLOXY + "logout";
	}
	$.ajax({
		url: signoutUrl,
		type: "POST",
		success: function (data, textStatus, xhr) {
			window.location = "https://www.oxyloans.com/new/partnerLogin";
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			window.location = "https://www.oxyloans.com/new/partnerLogin";
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

function loadAllThepartnerBorrowers() {
	getUserUtm = getCookie("partnerUtmName");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	$(".content-wrapper").addClass("loadersec");
	setTimeout(function () {
		$(".loder2").attr("style", "opacity: 1!important");
	}, 500);

	if (userisIn == "local") {
		var getLenders =
			apiBaseURLOXY + "1" + "/loan/" + "BORROWER" + "/request/search";
	} else {
		var getLenders =
			apiBaseURLOXY + "6680" + "/loan/" + "BORROWER" + "/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userPrimaryType",
				fieldValue: "BORROWER",
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: getUserUtm,
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "parentRequestId",
				operator: "NULL",
			},
			logicalOperator: "OR",
			rightOperand: {
				leftOperand: {
					fieldName: "parentRequestId",
					fieldValue: 0,
					operator: "EQUALS",
				},
				logicalOperator: "AND",
				rightOperand: {
					leftOperand: {
						fieldName: "loanStatus",
						fieldValue: "Requested",
						operator: "EQUALS",
					},
					logicalOperator: "OR",
					rightOperand: {
						leftOperand: {
							fieldName: "loanStatus",
							fieldValue: "Edit",
							operator: "EQUALS",
						},
						logicalOperator: "OR",
						rightOperand: {
							leftOperand: {
								fieldName: "loanStatus",
								fieldValue: "PartnerEdited",
								operator: "EQUALS",
							},
							logicalOperator: "OR",
							rightOperand: {
								leftOperand: {
									fieldName: "loanStatus",
									fieldValue: "PartnerReject",
									operator: "EQUALS",
								},
								logicalOperator: "OR",
								rightOperand: {
									leftOperand: {
										fieldName: "loanStatus",
										fieldValue: "PartnerShortList",
										operator: "EQUALS",
									},
									logicalOperator: "OR",
									rightOperand: {
										leftOperand: {
											fieldName: "loanStatus",
											fieldValue: "Hold",
											operator: "EQUALS",
										},
										logicalOperator: "OR",
										rightOperand: {
											leftOperand: {
												fieldName: "loanStatus",
												fieldValue: "Rejected",
												operator: "EQUALS",
											},
											logicalOperator: "OR",
											rightOperand: {
												fieldName: "loanStatus",
												fieldValue: "PartnerApproved",
												operator: "EQUALS",
											},
										},
									},
								},
							},
						},
					},
				},
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "userId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			setTimeout(function () {
				$(".content-wrapper").removeClass("loadersec");
				$(".loder2").attr("style", "opacity: 0!important");
			}, 3000);

			totalEntries = data.totalCount;

			if (totalEntries == 0 || totalEntries == null) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayInterestScript"
				).innerHTML;
				Mustache.parse(template);
				var newData = data.results;
				var html = Mustache.to_html(template, { data: data.results });

				$("#loadDealsInfo").html(html);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".viewpartnerRegisteredBorrowers")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: "BORROWER",
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.urchinTrackingModule",
									fieldValue: getUserUtm,
									operator: "EQUALS",
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "parentRequestId",
									operator: "NULL",
								},
								logicalOperator: "OR",
								rightOperand: {
									leftOperand: {
										fieldName: "parentRequestId",
										fieldValue: 0,
										operator: "EQUALS",
									},
									logicalOperator: "AND",
									rightOperand: {
										leftOperand: {
											fieldName: "loanStatus",
											fieldValue: "Requested",
											operator: "EQUALS",
										},
										logicalOperator: "OR",
										rightOperand: {
											leftOperand: {
												fieldName: "loanStatus",
												fieldValue: "Edit",
												operator: "EQUALS",
											},
											logicalOperator: "OR",
											rightOperand: {
												leftOperand: {
													fieldName: "loanStatus",
													fieldValue: "PartnerEdited",
													operator: "EQUALS",
												},
												logicalOperator: "OR",
												rightOperand: {
													leftOperand: {
														fieldName: "loanStatus",
														fieldValue: "PartnerReject",
														operator: "EQUALS",
													},
													logicalOperator: "OR",
													rightOperand: {
														leftOperand: {
															fieldName: "loanStatus",
															fieldValue: "PartnerShortList",
															operator: "EQUALS",
														},
														logicalOperator: "OR",
														rightOperand: {
															leftOperand: {
																fieldName: "loanStatus",
																fieldValue: "Hold",
																operator: "EQUALS",
															},
															logicalOperator: "OR",
															rightOperand: {
																leftOperand: {
																	fieldName: "loanStatus",
																	fieldValue: "Rejected",
																	operator: "EQUALS",
																},
																logicalOperator: "OR",
																rightOperand: {
																	fieldName: "loanStatus",
																	fieldValue: "PartnerApproved",
																	operator: "EQUALS",
																},
															},
														},
													},
												},
											},
										},
									},
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "userId",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						if (userisIn == "local") {
							var getLenders =
								apiBaseURLOXY + "1" + "/loan/" + "BORROWER" + "/request/search";
						} else {
							var getLenders =
								apiBaseURLOXY +
								"6680" +
								"/loan/" +
								"BORROWER" +
								"/request/search";
						}

						$.ajax({
							url: getLenders,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								setTimeout(function () {
									$(".content-wrapper").removeClass("loadersec");
									$(".loder2").attr("style", "opacity: 0!important");
								}, 3000);

								totalEntries = data.totalCount;
								var template = document.getElementById(
									"displayInterestScript"
								).innerHTML;
								Mustache.parse(template);
								var newData = data.results;
								var html = Mustache.to_html(template, { data: data.results });

								$("#loadDealsInfo").html(html);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadBorrowerApplications(userID) {
	getUserUtm = getCookie("partnerUtmName");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getLenders =
			apiBaseURLOXY + "1" + "/loan/" + "BORROWER" + "/request/search";
	} else {
		var getLenders =
			apiBaseURLOXY + "6680" + "/loan/" + "BORROWER" + "/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userId",
				fieldValue: userID,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: getUserUtm,
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "parentRequestId",
				operator: "NULL",
			},
			logicalOperator: "AND",
			rightOperand: {
				leftOperand: {
					fieldName: "loanStatus",
					fieldValue: "Requested",
					operator: "EQUALS",
				},
				logicalOperator: "OR",
				rightOperand: {
					leftOperand: {
						fieldName: "loanStatus",
						fieldValue: "Edit",
						operator: "EQUALS",
					},
					logicalOperator: "OR",
					rightOperand: {
						leftOperand: {
							fieldName: "loanStatus",
							fieldValue: "PartnerEdited",
							operator: "EQUALS",
						},
						logicalOperator: "OR",
						rightOperand: {
							leftOperand: {
								fieldName: "loanStatus",
								fieldValue: "PartnerReject",
								operator: "EQUALS",
							},
							logicalOperator: "OR",
							rightOperand: {
								leftOperand: {
									fieldName: "loanStatus",
									fieldValue: "PartnerShortList",
									operator: "EQUALS",
								},
								logicalOperator: "OR",
								rightOperand: {
									leftOperand: {
										fieldName: "loanStatus",
										fieldValue: "Hold",
										operator: "EQUALS",
									},
									logicalOperator: "OR",
									rightOperand: {
										leftOperand: {
											fieldName: "loanStatus",
											fieldValue: "Rejected",
											operator: "EQUALS",
										},
										logicalOperator: "OR",
										rightOperand: {
											fieldName: "loanStatus",
											fieldValue: "PartnerApproved",
											operator: "EQUALS",
										},
									},
								},
							},
						},
					},
				},
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "userId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			$(".loanstatus").addClass("loanInfo_" + data.results[0].loanStatus);
			$(".pborrowerName").html(data.results[0].borrowerUser.firstName);
			$(".pborrowerid").html(data.results[0].borrowerUser.id);
			$(".pborrowemobile").html(data.results[0].borrowerUser.mobileNumber);
			$(".pborrowerutm").html(data.results[0].borrowerUser.utmSource);
			$(".pborrowerPAN").html(data.results[0].borrowerUser.panNumber);
			$(".pborrowerADDRESS").html(data.results[0].borrowerUser.address);
			$(".pborrowerdob").html(data.results[0].borrowerUser.dob);

			if (data.results[0].borrowerUser.referredBy == null) {
				$(".pborrowerreferrby").html("PARTNER");
			} else {
				$(".pborrowerreferrby").html(data.results[0].borrowerUser.referredBy);
			}

			$(".pborroweremail").html(data.results[0].borrowerUser.email);

			if (data.results[0].cifNumber == "") {
				$(".pborrowecifno").html("Not Required/Not given");
			} else {
				$(".pborrowecifno").html(data.results[0].cifNumber);
			}

			$(".borrowerLoanamount").html(data.results[0].loanRequestAmount);
			$(".borrowerLoanroi").html(data.results[0].rateOfInterest);
			$(".borrowerLoanduration").html(data.results[0].duration);
			$(".borrowerdurationType").html(data.results[0].durationType);
			$(".borrowerLoanExecpted").html(data.results[0].expectedDate);
			$(".borrowerLoanrepay").html(data.results[0].repaymentMethod);

			$("#loanOfferAmount").val(data.results[0].loanRequestAmount);
			$("#tenure").val(data.results[0].duration);
			$("#durationtype").val(data.results[0].durationType);
			$("#rateOfInterestToBorrower").val(data.results[0].rateOfInterest);
			$("#repaymentTypeToBorrower").val(data.results[0].repaymentMethod);

			$(".bankasname").html(
				data.results[0].borrowerUser.userNameAccordingToBank
			);
			$(".bankasaccount").html(data.results[0].borrowerUser.accountNumber);
			$(".bankifsc").html(data.results[0].borrowerUser.ifscCode);
			$(".bankbranch").html(data.results[0].borrowerUser.branchName);

			if (
				data.results[0].borrowerKycDocuments.length != null ||
				data.results[0].borrowerUser.userNameAccordingToBank == "" ||
				data.results[0].borrowerUser.accountNumber == "" ||
				data.results[0].borrowerUser.branchName == "" ||
				data.results[0].borrowerUser.ifscCode == ""
			) {
				if (
					data.results[0].borrowerKycDocuments[0].documentSubType != "PAN" ||
					data.results[0].borrowerKycDocuments[1].documentSubType !=
						"PAYSLIPS" ||
					data.results[0].borrowerKycDocuments[3].documentSubType != "AADHAR" ||
					data.results[0].borrowerKycDocuments[10].documentSubType !=
						"CHEQUELEAF"
				) {
					$(".user_not_kyc_profile .bank").html("Bank or KYC");
					$(".user_not_kyc_profile").show();
				} else {
					$(".user_not_kyc_profile").hide();
				}
			} else {
				$(".user_not_kyc_profile .bank").html("Bank or KYC");
				$(".user_not_kyc_profile").show();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function partnerloanapprovals(status, userid) {
	$(".loanstatus").hide();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	foldername = getCookie("outputfolder");
	getUserUtm = getCookie("partnerUtmName");

	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var postData = {
		status: status,
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var update = apiBaseURLOXY + userid + "/approveLoanRequestByPartner";
	} else {
		var update = apiBaseURLOXY + userid + "/approveLoanRequestByPartner";
	}

	$.ajax({
		url: update,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-approveLoanconfirmastion").modal("hide");
			$("#modal-showerrormessagesfotApproveingUser")
				.removeClass("modal-warning")
				.addClass("modal-success");
			$("#modal-showerrormessagesfotApproveingUser .modal-title").html(
				"Thanks"
			);
			$("#modal-showerrormessagesfotApproveingUser .errormessage").html(
				"Thanks, you have successfully changed user status as " + status
			);
			$("#modal-showerrormessagesfotApproveingUser").modal("show");

			setTimeout(function () {
				location.reload();
			}, 8000);
		},
		statusCode: {
			403: function (response) {
				$("#modal-showerrormessagesfotApproveingUser")
					.removeClass("modal-success")
					.addClass("modal-warning");
				$("#modal-showerrormessagesfotApproveingUser .modal-title").html(
					"Oops"
				);

				var _errorCodeis = response.responseJSON["errorCode"];
				var _errorCodeTextIs = response.responseJSON["errorMessage"];

				$("#modal-showerrormessagesfotApproveingUser .errormessage").html(
					_errorCodeTextIs
				);
				if (_errorCodeis == 108) {
					$("#modal-approveLoanconfirmastion").modal("hide");
					$("#modal-showerrormessagesfotApproveingUser").modal("show");
				}

				if (_errorCodeis == 124) {
					$("#modal-approveLoanconfirmastion").modal("hide");
					$("#modal-showerrormessagesfotApproveingUser").modal("show");
				}

				if (_errorCodeis == 115) {
					$("#modal-approveLoanconfirmastion").modal("hide");
					$("#modal-showerrormessagesfotApproveingUser").modal("show");
				}
			},

			400: function (response) {
				var _errorCodeis = response.responseJSON["errorCode"];
				var _errorCodeTextIs = response.responseJSON["errorMessage"];

				$("#modal-showerrormessagesfotApproveingUser")
					.removeClass("modal-success")
					.addClass("modal-warning");
				$("#modal-showerrormessagesfotApproveingUser .modal-title").html(
					"Oops"
				);

				$("#modal-showerrormessagesfotApproveingUser .errormessage").html(
					_errorCodeTextIs
				);
				if (_errorCodeis == 404) {
					$("#modal-approveLoanconfirmastion").modal("hide");
					$("#modal-showerrormessagesfotApproveingUser").modal("show");
				}
			},
		},

		error: function (xhr, textStatus, errorThrown) {},

		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function viewDoc(userID, doctype) {
	console.log(userID);
	console.log(doctype);
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var doctype = doctype;

	if (userisIn == "local") {
		var getPAN = apiBaseURLOXY + userID + "/download/" + doctype;
	} else {
		var getPAN = apiBaseURLOXY + userID + "/download/" + doctype;
	}
	console.log(getPAN);
	$.ajax({
		url: getPAN,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				console.log(data.downloadUrl);
				var sourcePath = data.downloadUrl;
				var contentTypeCheck = ".pdf";
				var typeContacts = ".txt";
				if (sourcePath.indexOf(contentTypeCheck) != -1) {
					alert(
						"We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads."
					);
					window.open(data.downloadUrl, "_blank");
				} else if (sourcePath.indexOf(typeContacts) != -1) {
					window.open(data.downloadUrl, "_blank");
				} else {
					$.colorbox({ href: data.downloadUrl });
				}
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function viewpartnerLenderList() {
	getUserUtm = getCookie("partnerUtmName");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	$(".content-wrapper").addClass("loadersec");
	setTimeout(function () {
		$(".loder2").attr("style", "opacity: 1!important");
	}, 500);

	if (userisIn == "local") {
		var getLenders =
			apiBaseURLOXY + "1" + "/loan/" + "LENDER" + "/request/search";
	} else {
		var getLenders =
			apiBaseURLOXY + "6680" + "/loan/" + "LENDER" + "/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userPrimaryType",
				fieldValue: "LENDER",
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: getUserUtm,
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "parentRequestId",
			operator: "NULL",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "userId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			setTimeout(function () {
				$(".content-wrapper").removeClass("loadersec");
				$(".loder2").attr("style", "opacity: 0!important");
			}, 3000);

			totalEntries = data.totalCount;

			if (totalEntries == 0 || totalEntries == null) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayInterestScript"
				).innerHTML;
				Mustache.parse(template);
				var newData = data.results;
				var html = Mustache.to_html(template, { data: data.results });

				$("#loadDealsInfo").html(html);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".viewpartnerRegisteredBorrowers")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: "LENDER",
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.urchinTrackingModule",
									fieldValue: getUserUtm,
									operator: "EQUALS",
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "parentRequestId",
								operator: "NULL",
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "userId",
							sortOrder: "DESC",
						};
						var postData = JSON.stringify(postData);
						console.log(postData);
						if (userisIn == "local") {
							var getLenders =
								apiBaseURLOXY + "1" + "/loan/" + "LENDER" + "/request/search";
						} else {
							var getLenders =
								apiBaseURLOXY +
								"6680" +
								"/loan/" +
								"LENDER" +
								"/request/search";
						}

						$.ajax({
							url: getLenders,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								setTimeout(function () {
									$(".content-wrapper").removeClass("loadersec");
									$(".loder2").attr("style", "opacity: 0!important");
								}, 3000);

								totalEntries = data.totalCount;
								var template = document.getElementById(
									"displayInterestScript"
								).innerHTML;
								Mustache.parse(template);
								var newData = data.results;
								var html = Mustache.to_html(template, { data: data.results });

								$("#loadDealsInfo").html(html);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function borrowerStatusUserLists(status) {
	getUserUtm = getCookie("partnerUtmName");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	$(".content-wrapper").addClass("loadersec");
	setTimeout(function () {
		$(".loder2").attr("style", "opacity: 1!important");
	}, 500);

	if (userisIn == "local") {
		var getLenders =
			apiBaseURLOXY + "1" + "/loan/" + "BORROWER" + "/request/search";
	} else {
		var getLenders =
			apiBaseURLOXY + "6680" + "/loan/" + "BORROWER" + "/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userPrimaryType",
				fieldValue: "BORROWER",
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: getUserUtm,
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "parentRequestId",
				operator: "NULL",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanStatus",
				fieldValue: status,
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "userId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			setTimeout(function () {
				$(".content-wrapper").removeClass("loadersec");
				$(".loder2").attr("style", "opacity: 0!important");
			}, 3000);

			totalEntries = data.totalCount;

			if (totalEntries == 0 || totalEntries == null) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayInterestScript"
				).innerHTML;
				Mustache.parse(template);
				var newData = data.results;
				var html = Mustache.to_html(template, { data: data.results });

				$("#loadDealsInfo").html(html);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".viewpartnerRegisteredBorrowers")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: "BORROWER",
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.urchinTrackingModule",
									fieldValue: getUserUtm,
									operator: "EQUALS",
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "parentRequestId",
									operator: "NULL",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "loanStatus",
									fieldValue: status,
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: 1,
								pageSize: 10,
							},
							sortBy: "userId",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						if (userisIn == "local") {
							var getLenders =
								apiBaseURLOXY + "1" + "/loan/" + "BORROWER" + "/request/search";
						} else {
							var getLenders =
								apiBaseURLOXY +
								"6680" +
								"/loan/" +
								"BORROWER" +
								"/request/search";
						}

						$.ajax({
							url: getLenders,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								setTimeout(function () {
									$(".content-wrapper").removeClass("loadersec");
									$(".loder2").attr("style", "opacity: 0!important");
								}, 3000);

								totalEntries = data.totalCount;
								var template = document.getElementById(
									"displayInterestScript"
								).innerHTML;
								Mustache.parse(template);
								var newData = data.results;
								var html = Mustache.to_html(template, { data: data.results });

								$("#loadDealsInfo").html(html);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function partnerloaneditrequest() {
	$("#modal-Sendofferamount").modal("show");
}

function sendUserOffer(userid) {
	//  $(".newLoaders").append('<div class="loader"></div>');
	// $(".newLoaders").addClass("lildark");

	$(".sendLoanoffer").hide();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var loanOfferAmount = $("#loanOfferAmount").val();
	var duration = $("#tenure").val();
	var durationtype = $("#durationtype").val();

	var rateOfInterestToBorrower = $("#rateOfInterestToBorrower").val();
	var rateOfInterestToLender = $("#rateOfInterestToLender").val();
	var repaymentTypeToBorrower = $("#repaymentTypeToBorrower").val();
	var repaymentTypeToLender = $("#repaymentTypeToLender").val();
	var checkbox_val = document.getElementById("checkBoxPartner").checked;

	var isValid = true;
	if (checkbox_val == false) {
		var borrowerfee = null;
	} else {
		var borrowerfee = $(".percentagetopartner").val();

		if (borrowerfee == "") {
			$(".borrowerfeetoPartnerError").show();
			$(".sendLoanoffer").show();
			isValid = false;
		} else {
			$(".borrowerfeetoPartnerError").hide();
		}
	}

	if (loanOfferAmount == "") {
		$(".loanAmountError").show();
		$(".sendLoanoffer").show();
		isValid = false;
	} else {
		$(".loanAmountError").hide();
	}

	if (duration == "") {
		$(".tenureError").show();
		$(".sendLoanoffer").show();
		isValid = false;
	} else {
		$(".tenureError").hide();
	}

	if (durationtype == "") {
		$(".duratrionError").show();
		$(".sendLoanoffer").show();
		isValid = false;
	} else {
		$(".duratrionError").hide();
	}

	if (rateOfInterestToBorrower == "") {
		$(".rateOfInterestToBorrower").show();
		$(".sendLoanoffer").show();
		isValid = false;
	} else {
		$(".rateOfInterestToBorrower").hide();
	}

	if (repaymentTypeToLender == "") {
		$(".rateOfInterestToLender").show();
		$(".sendLoanoffer").show();
		isValid = false;
	} else {
		$(".rateOfInterestToLender").hide();
	}

	if (repaymentTypeToBorrower == "") {
		$(".repaymentTypeToBorrower").show();
		$(".sendLoanoffer").show();
		isValid = false;
	} else {
		$(".repaymentTypeToBorrower").hide();
	}

	if (repaymentTypeToLender == "") {
		$(".repaymentTypeToLender").show();
		$(".sendLoanoffer").show();
		isValid = false;
	} else {
		$(".repaymentTypeToLender").hide();
	}

	if (userisIn == "local") {
		var updateCommentUrl =
			apiBaseURLOXY + userid + "/loan/BORROWER/updateLoanRequestByPartner";
	} else {
		var updateCommentUrl =
			apiBaseURLOXY + userid + "/loan/BORROWER/updateLoanRequestByPartner";
	}
	var postData = {
		loanRequestAmount: loanOfferAmount,
		duration: duration,
		durationType: durationtype,
		rateOfInterestToBorrower: rateOfInterestToBorrower,
		rateOfInterestToLender: rateOfInterestToLender,
		repaymentTypeToBorrower: repaymentTypeToBorrower,
		repaymentTypeToLender: repaymentTypeToLender,
		borrowerFeeToPartner: borrowerfee,
	};
	var postData = JSON.stringify(postData);

	console.log(postData);
	if (isValid == true) {
		$.ajax({
			url: updateCommentUrl,
			type: "PATCH",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				// $(".sendLoanoffer").show();

				$("#modal-Sendofferamount").modal("hide");

				setTimeout(function () {
					partnerloanapprovals("PartnerApproved", userid);
				}, 1000);

				// $("#modal-showerrormessagesfotApproveingUser")
				// 	.removeClass("modal-warning")
				// 	.addClass("modal-success");
				// $("#modal-showerrormessagesfotApproveingUser .modal-title").html(
				// 	"Thanks"
				// );
				// $("#modal-showerrormessagesfotApproveingUser .errormessage").html(
				// 	"You have successfully updated the user loan request"
				// );
				// $("#modal-showerrormessagesfotApproveingUser").modal("show");

				// setTimeout(function () {
				// 	$("#modal-showerrormessagesfotApproveingUser").modal("hide");
				// 	$("#modal-approveLoanconfirmastion").modal("show");
				// }, 3000);
			},

			statusCode: {
				403: function (response) {
					$(".sendLoanoffer").show();
					var _errorCodeis = response.responseJSON["errorCode"];
					var _errorCodeTextIs = response.responseJSON["errorMessage"];

					$("#modal-showerrormessagesfotApproveingUser .errormessage").html(
						_errorCodeTextIs
					);
					if (_errorCodeis == 108) {
						$("#modal-Sendofferamount").modal("hide");

						$("#modal-showerrormessagesfotApproveingUser").modal("show");
					}
				},
			},

			error: function (request, error) {
				$(".sendLoanoffer").show();
				  
				$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);

				if (arguments[0].responseJSON.errorCode == 108) {
					$("#modal-alreadyDoneSendOffer").modal("show");
				} else if (arguments[0].responseJSON.errorCode == 115) {
					$("#modal-alreadyDoneSendOffer").modal("show");
				}
			},

			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
}

function searchcallregisteredLender() {
	getUserUtm = getCookie("partnerUtmName");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var lenderid = $(".lnderuserid").val().substring(2);

	if (userisIn == "local") {
		var getLenders =
			apiBaseURLOXY + "1" + "/loan/" + "LENDER" + "/request/search";
	} else {
		var getLenders =
			apiBaseURLOXY + "6680" + "/loan/" + "LENDER" + "/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userId",
				fieldValue: lenderid,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: getUserUtm,
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "parentRequestId",
			operator: "NULL",
		},
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;

			if (totalEntries == 0 || totalEntries == null) {
				alert("No data found");
				// $("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayInterestScript"
				).innerHTML;
				Mustache.parse(template);
				var newData = data.results;
				var html = Mustache.to_html(template, { data: data.results });
				$("#loadDealsInfo").html(html);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function seachcallofborrower() {
	getUserUtm = getCookie("partnerUtmName");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var borrowerid = $(".borrowerid").val().substring(2);

	if (userisIn == "local") {
		var getLenders =
			apiBaseURLOXY + "1" + "/loan/" + "LENDER" + "/request/search";
	} else {
		var getLenders =
			apiBaseURLOXY + "6680" + "/loan/" + "LENDER" + "/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userId",
				fieldValue: borrowerid,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: getUserUtm,
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "parentRequestId",
				operator: "NULL",
			},
			logicalOperator: "OR",
			rightOperand: {
				leftOperand: {
					fieldName: "parentRequestId",
					fieldValue: 0,
					operator: "EQUALS",
				},
				logicalOperator: "AND",
				rightOperand: {
					leftOperand: {
						fieldName: "loanStatus",
						fieldValue: "Requested",
						operator: "EQUALS",
					},
					logicalOperator: "OR",
					rightOperand: {
						leftOperand: {
							fieldName: "loanStatus",
							fieldValue: "Edit",
							operator: "EQUALS",
						},
						logicalOperator: "OR",
						rightOperand: {
							leftOperand: {
								fieldName: "loanStatus",
								fieldValue: "PartnerEdited",
								operator: "EQUALS",
							},
							logicalOperator: "OR",
							rightOperand: {
								leftOperand: {
									fieldName: "loanStatus",
									fieldValue: "PartnerReject",
									operator: "EQUALS",
								},
								logicalOperator: "OR",
								rightOperand: {
									leftOperand: {
										fieldName: "loanStatus",
										fieldValue: "PartnerShortList",
										operator: "EQUALS",
									},
									logicalOperator: "OR",
									rightOperand: {
										leftOperand: {
											fieldName: "loanStatus",
											fieldValue: "Hold",
											operator: "EQUALS",
										},
										logicalOperator: "OR",
										rightOperand: {
											leftOperand: {
												fieldName: "loanStatus",
												fieldValue: "Rejected",
												operator: "EQUALS",
											},
											logicalOperator: "OR",
											rightOperand: {
												fieldName: "loanStatus",
												fieldValue: "PartnerApproved",
												operator: "EQUALS",
											},
										},
									},
								},
							},
						},
					},
				},
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "userId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;

			if (totalEntries == 0 || totalEntries == null) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayInterestScript"
				).innerHTML;
				Mustache.parse(template);
				var newData = data.results;
				var html = Mustache.to_html(template, { data: data.results });

				$("#loadDealsInfo").html(html);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".viewpartnerRegisteredBorrowers")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							leftOperand: {
								leftOperand: {
									fieldName: "userId",
									fieldValue: borrowerid,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.urchinTrackingModule",
									fieldValue: getUserUtm,
									operator: "EQUALS",
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "parentRequestId",
									operator: "NULL",
								},
								logicalOperator: "OR",
								rightOperand: {
									leftOperand: {
										fieldName: "parentRequestId",
										fieldValue: 0,
										operator: "EQUALS",
									},
									logicalOperator: "AND",
									rightOperand: {
										leftOperand: {
											fieldName: "loanStatus",
											fieldValue: "Requested",
											operator: "EQUALS",
										},
										logicalOperator: "OR",
										rightOperand: {
											leftOperand: {
												fieldName: "loanStatus",
												fieldValue: "Edit",
												operator: "EQUALS",
											},
											logicalOperator: "OR",
											rightOperand: {
												leftOperand: {
													fieldName: "loanStatus",
													fieldValue: "PartnerEdited",
													operator: "EQUALS",
												},
												logicalOperator: "OR",
												rightOperand: {
													leftOperand: {
														fieldName: "loanStatus",
														fieldValue: "PartnerReject",
														operator: "EQUALS",
													},
													logicalOperator: "OR",
													rightOperand: {
														leftOperand: {
															fieldName: "loanStatus",
															fieldValue: "PartnerShortList",
															operator: "EQUALS",
														},
														logicalOperator: "OR",
														rightOperand: {
															leftOperand: {
																fieldName: "loanStatus",
																fieldValue: "Hold",
																operator: "EQUALS",
															},
															logicalOperator: "OR",
															rightOperand: {
																leftOperand: {
																	fieldName: "loanStatus",
																	fieldValue: "Rejected",
																	operator: "EQUALS",
																},
																logicalOperator: "OR",
																rightOperand: {
																	fieldName: "loanStatus",
																	fieldValue: "PartnerApproved",
																	operator: "EQUALS",
																},
															},
														},
													},
												},
											},
										},
									},
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "userId",
							sortOrder: "DESC",
						};
						var postData = JSON.stringify(postData);
						console.log(postData);
						if (userisIn == "local") {
							var getLenders =
								apiBaseURLOXY + "1" + "/loan/" + "LENDER" + "/request/search";
						} else {
							var getLenders =
								apiBaseURLOXY +
								"6680" +
								"/loan/" +
								"LENDER" +
								"/request/search";
						}

						$.ajax({
							url: getLenders,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template = document.getElementById(
									"displayInterestScript"
								).innerHTML;
								Mustache.parse(template);
								var newData = data.results;
								var html = Mustache.to_html(template, { data: data.results });

								$("#loadDealsInfo").html(html);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function srarchcallBasedonUsersStatus(status) {
	getUserUtm = getCookie("partnerUtmName");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var borrowerid = $(".borrowerid").val().substring(2);

	if (userisIn == "local") {
		var getLenders =
			apiBaseURLOXY + "1" + "/loan/" + "LENDER" + "/request/search";
	} else {
		var getLenders =
			apiBaseURLOXY + "6680" + "/loan/" + "LENDER" + "/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userId",
				fieldValue: borrowerid,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: getUserUtm,
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "parentRequestId",
				operator: "NULL",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanStatus",
				fieldValue: status,
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "userId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;

			if (totalEntries == 0 || totalEntries == null) {
				alert("no data found");

				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayInterestScript"
				).innerHTML;
				Mustache.parse(template);
				var newData = data.results;
				var html = Mustache.to_html(template, { data: data.results });

				$("#loadDealsInfo").html(html);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".viewpartnerRegisteredBorrowers")
					.bootpag({
						total: displayPageNo,
						page: 1,
						maxVisible: 5,
						leaps: true,
						firstLastUse: true,
						first: "←",
						last: "→",
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
							leftOperand: {
								leftOperand: {
									fieldName: "userId",
									fieldValue: borrowerid,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.urchinTrackingModule",
									fieldValue: getUserUtm,
									operator: "EQUALS",
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "parentRequestId",
									operator: "NULL",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "loanStatus",
									fieldValue: status,
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "userId",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						if (userisIn == "local") {
							var getLenders =
								apiBaseURLOXY + "1" + "/loan/" + "LENDER" + "/request/search";
						} else {
							var getLenders =
								apiBaseURLOXY +
								"6680" +
								"/loan/" +
								"LENDER" +
								"/request/search";
						}

						$.ajax({
							url: getLenders,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template = document.getElementById(
									"displayInterestScript"
								).innerHTML;
								Mustache.parse(template);
								var newData = data.results;
								var html = Mustache.to_html(template, { data: data.results });

								$("#loadDealsInfo").html(html);
							},
							error: function (xhr, textStatus, errorThrown) {
								console.log("Error Something");
							},
							beforeSend: function (xhr) {
								xhr.setRequestHeader("accessToken", saccessToken);
							},
						});
					});
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function viewWalletAmountofPartner() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");

	if (userisIn == "local") {
		var listofuserswallert =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			getUserUtm +
			"/totalLendersWallet";
	} else {
		var listofuserswallert =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			getUserUtm +
			"/totalLendersWallet";
	}
	$.ajax({
		url: listofuserswallert,
		type: "GET",

		success: function (data, textStatus, xhr) {
			$(".walletinfopartner").html(data.totalLendersWalletAmount);
			writeCookie("partnerWallet", data.totalLendersWalletAmount);
			$(".partnerLenderAmount").html(data.totalLendersWalletAmount);
		},
		error: function (xhr, textStatus, errorThrown) {
			writeCookie("partnerWallet", 0);
			$(".lenderwalletinfopartner").hide();

			$(".diswarningmessage .warningmessagetext").html(
				arguments[0].responseJSON.errorMessage
			);
			if (arguments[0].responseJSON.errorCode == 104) {
				$(".diswarningmessage").show();
			}

			$(".diswarningmessage").show();
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function partnerDashboard() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");

	if (userisIn == "local") {
		var partnerDashboard =
			apiBaseURLOXY + getUserUtm + "/countOfLRAndBRforPartner";
	} else {
		var partnerDashboard =
			apiBaseURLOXY + getUserUtm + "/countOfLRAndBRforPartner";
	}

	$.ajax({
		url: partnerDashboard,
		type: "GET",

		success: function (data, textStatus, xhr) {
			$(".registerLenders").html(data.todayRegisteredLenders);
			$(".totalregisterLenders,#totalInterestedLenders").html(
				data.totalLenders
			);
			$(".registerBorrower,#totalInterestedBorrowers").html(
				data.todayRegisteredBorrowers
			);
			$(".totalregisterborrower").html(data.totalBorrowers);
			$(".runningLoansCount").html(data.runningLoansCount);
			$(".runningLoansAmount").html(data.runningLoansAmount);
			$(".closedLoansCount").html(data.closedLoansCount);
			$(".totalDisbursedAmount").html(data.totalDisbursedAmount);
			$(".platformFee").html(data.totalFeePaid);
			$(".totalNotifications").html(
				parseInt(data.totalLenders) + parseInt(data.todayRegisteredBorrowers)
			);
			$("#totalNotifications").html(
				parseInt(data.totalLenders) + parseInt(data.todayRegisteredBorrowers)
			);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function isapppLevelDisbursed(userid) {
	$(".cmsHideBtn").hide();

	$("#modal-App-Level-disbursed").modal("show");
	$(".savedisbursedUser").attr("data-loanid", userid);
}

function AppLevelDisbursedAmount() {
	$(".cmsHideBtn").hide();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var borrowerid = $(".savedisbursedUser").attr("data-loanid");
	var ApproveData = $("#disbursedDate").val();

	var isValid = true;

	if (ApproveData == "") {
		$(".loanDealError").show();
		isValid = false;
	}

	var postData = {
		adminComments: "DISBURSED",
		disbursedDate: ApproveData,
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var disbursedApp =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			borrowerid +
			"/dealLevelDisbursmentForAppLevel";
	} else {
		var disbursedApp =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			borrowerid +
			"/dealLevelDisbursmentForAppLevel";
	}

	if (isValid == true) {
		$.ajax({
			url: disbursedApp,
			type: "PATCH",
			data: postData,
			contentType: "application/json",
			dataType: "json",

			success: function (data, textStatus, xhr) {
				moveBorrowerfiletocms(borrowerid);

				// $("#modal-App-Level-disbursed").modal("hide");
				// $("#modal-movefiletocms .modal-body").html("Thanks for using the application level");
				// $("#modal-movefiletocms").modal("show");
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
				  
				$(".cmsHideBtn").show();
				$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);

				if (arguments[0].responseJSON.errorCode == 114) {
					$("#modal-App-Level-disbursed").modal("hide");
					$("#modal-amount-limit-exced").modal("show");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
}

function moveBorrowerfiletocms(borrowerId) {
	$("#modal-App-Level-disbursed").modal("hide");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");

	if (userisIn == "local") {
		var cmsfile = apiBaseURLOXY + borrowerId + "/fundsTransfer";
	} else {
		var cmsfile = apiBaseURLOXY + borrowerId + "/fundsTransfer";
	}

	$.ajax({
		url: cmsfile,
		type: "POST",
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			$("#modal-sucessfully-updated .modal-body").html(
				"You have successfully moved this application to CMS. This application is one step away from getting the disbursement. It will be done by Oxy Amdin. Wait for Oxyadmin's response. "
			);
			$("#modal-sucessfully-updated").modal("show");

			setTimeout(function () {
				window.location.reload();
			}, 6000);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");

			$(".cmsHideBtn").show();

			$("#modal-App-Level-disbursed").modal("hide");

			$("#modal-sucessfully-updated")
				.removeClass("modal-success")
				.addClass("modal-warning");
			$("#modal-sucessfully-updated .modal-body").html(
				arguments[0].responseJSON.errorMessage
			);
			if (arguments[0].responseJSON.errorCode == 404) {
				$("#modal-sucessfully-updated").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function partnerLoanInfo() {
	$(".content-wrapper").addClass("loadersec");
	setTimeout(function () {
		$(".loder2").attr("style", "opacity: 1!important");
	}, 500);

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");

	if (userisIn == "local") {
		var partnerLoanInfo =
			apiBaseURLOXY + getUserUtm + "/partnerBorrowersLoanInfo";
	} else {
		var partnerLoanInfo =
			apiBaseURLOXY + getUserUtm + "/partnerBorrowersLoanInfo";
	}

	$.ajax({
		url: partnerLoanInfo,
		type: "POST",
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			setTimeout(function () {
				$(".content-wrapper").removeClass("loadersec");
				$(".loder2").attr("style", "opacity: 0!important");
			}, 3000);

			if (data.length == 0) {
				$("#displayLoanNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayPartnerloanInfo"
				).innerHTML;
				Mustache.parse(template);
				// var newData = data.results;
				var html = Mustache.to_html(template, { data: data });
				$("#loadPartnerLoanInfo").html(html);

				if (data.agreementsCount != 0) {
					var template = document.getElementById(
						"displayallAgreementsRequests"
					).innerHTML;
					Mustache.parse(template);
					var html = Mustache.to_html(template, {
						data: data[0].agreementsToPartner,
					});
					// alert(data.agreementsToPartner[0].loanAmount);
					$("#displayAgreementsRecords").html(html);
				} else {
					$("#displayLoanNoRecords").show();
				}
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function showagreements(index) {
	$("#modal-viewagreementsToBorrower").modal("show");
}

function knowEmaiInfoBorrower(userid) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getUserUtm = getCookie("partnerUtmName");

	if (userisIn == "local") {
		var feeBorrower = apiBaseURLOXY + userid + "/loan_details_to_Partner";
	} else {
		var feeBorrower = apiBaseURLOXY + userid + "/loan_details_to_Partner";
	}

	$.ajax({
		url: feeBorrower,
		type: "GET",
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			if (data.length == 0) {
				$("#displayLoanNoRecords").show();
			} else {
				var template = document.getElementById(
					"displayPartnerloanInfofee"
				).innerHTML;
				Mustache.parse(template);
				var newData = data.results;
				var html = Mustache.to_html(template, { data: data });
				$("#loadPartnerLoanInfofee").html(html);
			}
		},

		statusCode: {
			400: function (response) {
				$("#displayLoanNoRecords").show();

				var _errorCodeis = response.responseJSON["errorCode"];
				var _errorCodeTextIs = response.responseJSON["errorMessage"];

				$(".feealertErrormessages #error-message").html(_errorCodeTextIs);

				if (_errorCodeis == 115) {
					$(".feealertErrormessages").show();
				}
			},
		},

		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$("#displayLoanNoRecords").show();
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}
