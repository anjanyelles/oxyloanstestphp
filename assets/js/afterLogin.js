let userisIn = "local";

let folderName = "FEOxyLoans";
let userNameFromAPI = "";
let displayFromRange = 0;
let globalLoanId = 0;
let lendercommValue = 0;
let borrowercommValue = 0;
let totalEntries = 0;
let requesterdBalanec = 0;
let choosenListFrom = 0;
let choosenMoelis = 0;
let userconfirmed = "NO";
let userAddconfirmed = "NO";
let userUpdateconfirmed = "NO";
let payFromwallet = "YES";
let payFromwalletconfirm = "NO";
let loanMaxAmount = 50000;
let userRequiredAmount = 0;
let withdrawRaised = false;
let userWhatsappUpdateStatus = "";
let userwhatsappVerifiedStatus = "";
let bankDetailsVerifiedStatus = "";
let userSubscriptionStatus = false;
let noprofileCheck = "yes";
let noROICheck = "yes";
let borrowerWants = 0;
let whatlenderhas = 0;
let proceedOffer = false;
let stopOffer = false;
let uploadCropped = false;
let eSignTransactionID = "";
let loanIDFromEsign = "";
let rateofInterestCheck = false;
let tokenforeNach = "";
let txnIdforeNACH = "";
let userEmailforGlobal = "";
let userpersonalinfo = "";
let userbankDetailsInfo = "";
let userkycStatus = "";
let lenderFeeStatus = "MANDATORY";
let isStudent = false;
//Changes by livin mandeva Starts
let borrowervannumber = "";
let borrowerbeneficiaries = "";
let aadharref_id = "";
let isStudentProfile = false;
let citizenship = "";
let dealValue = 0;
let remaingParticipation = 0;
let dealIdForClosing = 0;
let iswaviverDeal = false;
let alredyParticipatedAmount = 0;
let waiverAmount = 0;
let lenderRemainingPanLimit = 0;
let lenderTotalParticipationAmount = 0;
let lenderRemainingWalletAmount = 0;
var date = new Date();
date.setDate(date.getDate() - 1);
let lenderGroupName = "";
let feePayementisDone = "NOTPAID";
let groupName = "";
let beneficiarieslist = "";
let dealRoiForEach = 1;
let dealMinimumAmount = 5000;
let dealAvailableLimit = 0;
let dealParticipatedAmount = 0;
let dealMaxAmount = 5000;
let userUtm="";
var downloadIcon = "<span class='fa fa-download'>&nbsp;</span>&nbsp;";

$(document).ready(function () {
	if (userisIn == "local") {
		let baseUrl =
			"http://35.154.48.120:8080/oxynew/";
	} else {
		let baseUrl = "https://fintech.oxyloans.com/oxyloans/";
	}




	// if (userisIn == "prod") {
	// 	apiBaseURLOXY = "https://fintech.oxyloans.com/oxyloans/v1/user/";
	// } else {
	// 	apiBaseURLOXY =
	// 	"http://ec2-15-207-239-145.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/";
	// }
	(function () {
		newprofileCallDetails();
		getSessionExpireData();
		paylenderfee();
	})();


	function newprofileCallDetails() {

		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		if (suserId != "") {
			if (sprimaryType == "LENDER") {
				$(".placeUserID").html("LR" + suserId);
				$(".virtualID").html("OXYLRV" + suserId);
			} else {
				$(".placeUserID").html("BR" + suserId);
			}
		}

		$("#transactionaccountnumber").val("OXYLRV" + suserId);
		$("#userid").val(suserId);
		$("#senderId").val("LR" + suserId);

		if (userisIn == "local") {
			var newprofileapi =
				"http://35.154.48.120:8080/oxynew/v1/user/lender/personal/" +
				suserId;
		} else {
			var newprofileapi =
				"https://fintech.oxyloans.com/oxyloans/v1/user/lender/personal/" +
				suserId;
		}
		$.ajax({
			url: newprofileapi,
			type: "GET",
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				console.log(data);

				userSubscriptionStatus = data.lenderValidityStatus;
				$(".lenderWalletAmount").html(data.lenderWalletAmount);
				$(".displayUserName, .userNameLender").html(data.firstName);

				if (data.validityDate == null) {
					$(".displayvalidity").hide();
					$(".loadingSec").hide();
				} else {
					$(".mebershipexpiry, .membershipdate").html(data.validityDate);
					$(".displayvalidity").show();
				}

				if (data.groupName == "Satish#OXYFoundingLenders") {
					$(".groupNameis").html("S# Oxy Founding Lender");
				} else if (data.groupName == "OxyPremiuimLenders") {
					$(".groupNameis").html("Oxy Premium");
				} else if (data.groupName == "OXYFoundingLenders") {
					$(".groupNameis").html("Oxy Founding Lender");
				} else if (data.groupName == "OxywheelsInvestors") {
					$(".groupNameis").html("Oxywheels Investors");
				} else if (data.groupName == "OxyLoansInvestors") {
					$(".groupNameis").html("OxyLoans Investors");
				} else if (data.groupName == "Satish#OxyLendingMasters") {
					$(".groupNameis").html("S# Oxy Lending Masters");
				} else if (data.groupName == "OXYMARCH09") {
					$(".groupNameis").html("Oxy Founding Lender");
				} else {
					$(".groupNameis").html("New Lender");
				}

				if (data.lenderWalletAmount == 0) {
					$(".wallet-bal")
						.removeClass("wallet-Section")
						.addClass("wallet-nill");
				}

				writeCookie("walletBal", data.lenderWalletAmount);
			},
			error: function (xhr, textStatus, errorThrown) {
				$(".loadingSec").hide();
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}

	//Changes by livin mandeva Ends
	setTimeout(function () {
		$("#mydiv").fadeOut("fast");
	}, 1000);

	$("#profilePicFile").change(function (e) {
		console.log(234);
		var img = e.target.files[0];
		if (!img.type.match("image.*")) {
			alert("Whoops! That is not an image.");
			return;
		}
		iEdit.open(img, true, function (res) {
			$("#result").attr("src", res);
		});

		readProfilePicture(res);
	});

	$("#viewReportOfFy").click(function () {
		window.location.href = "lenderProfit";
	});

	$('[data-toggle="tooltip"]').tooltip();

	$(".myinfoofRefeee").click(function () {
		window.location.href = "loaneligibilitybyreferring";
	});

	$("#profile-edit-btn").click(function () {
		$(".udisplaysec, #profile-edit-btn").hide();
		$(
			"#profile-submit-btn, #firstname, #lastname, #fathername, #address,.date, #nationality, .genderInfo, .maritalStatusInfo,#middlename,#companyname,#salary,#panNumber"
		).show();
	});

	$("#particpatedPage .list-group-item label a").click(function () {
		$(this).closest("label").trigger("click");
	});

	$("#myprofile-edit-btn").click(function () {
		$(".udisplaysec, #myprofile-edit-btn").hide();
		$(
			"#myprofile-submit-btn, #employment, #companyname, #description, #designation, #fieldOfStudy, #highestQualification,#NoOfJobsChanged,#officeAddressId,#officeContactNumber,#workExperience,.yearOfPassingValue,#college"
		).show();
	});

	$("#address1-edit-btn").click(function () {
		$(".udisplaysec1, #address1-edit-btn").hide();
		$(
			"#address1-submit-btn, .permanent_housenumberValue, .permanent_areaValue, .permanent_streetValue, .permanent_cityValue"
		).show();
	});

	$(".participatePricingBlock li.list-group-item").click(function () {
		$(".participatePricingBlock li.list-group-item").removeClass(
			"thisIsSelectedItem"
		);
		$(this).addClass("thisIsSelectedItem");
		choosenListFrom = $(".thisIsSelectedItem .percentageSec1").html();
		console.log(choosenListFrom);
		choosenMoelis = $(".thisIsSelectedItem .percentageSec1").attr(
			"data-modalChoosen"
		);
		console.log(choosenMoelis);
		calcProfitValue();
	});

	$(".oxyfeenewlenderOxyfounation li.list-group-item").click(function () {
		$(".oxyfeenewlenderOxyfounation li.list-group-item").removeClass(
			"thisIsSelectedPaymentType"
		);
		$(this).addClass("thisIsSelectedPaymentType");
	});

	$(".offersSentLender").click(function () {
		loadRequestsSent();
	});

	$(".lenderDisplayMyActiveLoans").click(function () {
		loadActiveLoans();
	});

	$(".requestsReceived").click(function () {
		loadAllRequests();
	});

	$("#searchCallofMyDeals").on("keyup", function (event) {
		$(".addedSearchCall").append('<div class="loader"></div>');
		$(".addedSearchCall").addClass("lildark");

		var newData = new Array();
		const value = JSON.parse(sessionStorage.getItem("searchData"));

		const newdata = value.filter(
			(element) =>
				element.dealName
					.toLowerCase()
					.includes(event.target.value.toLowerCase()) ||
				element.currentValue.toString() == event.target.value.toString() ||
				element.dealDuration.toString() === event.target.value.toString() ||
				element.rateOfInterest.toString() === event.target.value.toString() ||
				element.lederReturnType
					.toLowerCase()
					.includes(event.target.value.toLowerCase()) ||
				element.dealType
					.toLowerCase()
					.includes(event.target.value.toLowerCase()) ||
				element.accountType
					.toLowerCase()
					.includes(event.target.value.toLowerCase()) ||
				element.interestEarned?.toString() == event.target.value.toString() ||
				element.firstInterestDate.toString() == event.target.value.toString() ||
				element.registeredDate.toString() == event.target.value.toString()
		);

		if (newdata.length == 0) {
		} else {
			var template = document.getElementById("displayDealsScript").innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, {
				data: newdata,
			});
			$("#displayDealsData").html(html);
		}

		setTimeout(() => {
			$(".addedSearchCall .loader").remove();
			$(".addedSearchCall").removeClass("lildark");
		}, 1000);
	});

	$("#address2-edit-btn").click(function () {
		$(".udisplaysec2, #address2-edit-btn").hide();
		$("#address2-submit-btn, .present_housenumberValue, .present_areaValue, .present_streetValue, .present_cityValue"
		).show();
	});

	$("#address3-edit-btn").click(function () {
		$(".udisplaysec3, #address3-edit-btn").hide();
		$(
			"#address3-submit-btn, .office_housenumberValue, .office_areaValue, .office_streetValue, .office_cityValue"
		).show();
	});

	$("#financial-edit-btn").click(function () {
		$(".udisplaysec, #financial-edit-btn").hide();
		$(
			"#financial-submit-btn, #monthlyEmi, #creditamount, #existingloanamount, #creditcardsrepaymentamount, #othersourcesincome, #netmonthlyincome, #avgmonthlyexpenses"
		).show();
	});

	$("#bank-edit-btn").click(function () {
		$(".udisplaysec, #bank-edit-btn").hide();
		$(
			"#bank-submit-btn, #accountnumber, #bankname, #branchname, #accounttype, #ifsccode, #address"
		).show();
	});

	$("#expectedDate").datepicker({
		todayHighlight: true,
		dateFormat: "dd/mm/yy",
		startDate: new Date(),
		autoclose: true,
		minDate: 0,
	});




	$(".lenderSendingOffer").click(function () {
		$(".viewLoanOfferSection").hide();
		$("#showRequestSection").show();
	});

	$(".borrowerSendingrequest").click(function () {
		$(".viewLoanOfferSection").hide();
		$("#showRequestSection").show();
	});

	$("#dateofbirth").datepicker({
		dateFormat: "dd/mm/yy",
		maxDate: "-18Y",
		yearRange: "1950:2013",
		changeMonth: true,
		changeYear: true,
	});

	$("#transactiondatepicker").datepicker({
		todayHighlight: true,
		dateFormat: "dd/mm/yy",
		autoclose: true,
		changeMonth: true,
		changeYear: true,
		maxDate: "today",
	});

	$(".userPicArea").mouseover(function () {
		$(".displayEditOption").show();
	});

	$(".displayEditOption").click(function () {
		$(".displayCropSection").show();
		var userPicArea = $(".userPicArea").attr("src");
		$(".getFromProfileSec").attr("src", userPicArea);
	});

	$(".closePicArea").click(function () {
		$(".displayCropSection, .displayEditOption").hide();
	});

	$(".displayEditOption").click(function () {
		$(".displayCropSection").show();
	});

	$(
		".phonenumber, .mobilenumberValue, #monthlyEmi,#creditamount,#existingloanamount,#creditcardsrepaymentamount,#othersourcesincome,#netmonthlyincome,#avgmonthlyexpenses,#officeContactNumber"
	).on("keypress", function (e) {
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

	$(".closeProfile").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;

		if (sprimaryType == "LENDER") {
			window.location = "lender_profilePage";
		} else {
			window.location = "borrower_profilePage";
		}
	});

	// showProfile
	$(".showProfile").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		if (sprimaryType == "LENDER") {
			window.location = "lender_profilePage";
		} else {
			window.location = "borrower_profilePage";
		}
	});

	$("#firstname").keypress(function (e) {

		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$("#lastname").keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$("#fathername").keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$("#profile-submit-btn").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredFirstname = $(".firstnameValue").val();
		var enteredLastname = $(".lastnameValue").val();
		var enteredFathername = $(".fathernameValue").val();
		var enteredDateofbirth = $(".dateofbirthValue").val();
		var enteredGender = $("input[name=gendervalue]:checked").val();
		var enteredMaritalStatus = $("input[name=maritalStatus]:checked").val();
		var enteredNationality = $("#nationality").val();
		var enteredAddress = $(".addressValue").val();

		var middlename = $(".middlenameValue").val();
		var companyname = $(".companynameValue").val();
		var salary = $(".salaryValue").val();
		var panNumber = $(".panNumberValue").val();

		var panRegex = /[A-Z]{5}\d{4}[A-Z]{1}/;

		enteredFirstname = enteredFirstname.trim();
		enteredLastname = enteredLastname.trim();
		enteredFathername = enteredFathername.trim();
		panNumber = panNumber.trim();

		var genderMethod = document.getElementsByName("gendervalue");
		var maritalStatusMethod = document.getElementsByName("maritalStatus");
		var mios = false;
		var gom = false;
		var isValid = true;

		if (enteredFirstname == "") {
			$(".firstnameError").show();
			isValid = false;
		} else {
			$(".firstnameError").hide();
		}

		if (enteredFathername == "") {
			$(".fathernameError").show();
			isValid = false;
		} else {
			$(".fathernameError").hide();
		}

		if (enteredGender == "gendervalue") {
			$(".genderError").show();
			isValid = false;
		} else {
			$(".genderError").hide();
		}

		var i = 0;
		for (var i = 0; i < genderMethod.length; i++) {
			if (genderMethod[i].checked == true) {
				gom = true;
			}
		}
		if (!gom) {
			$(".genderError").show();
			isValid = false;
		} else {
			$(".genderError").hide();
		}

		if (enteredDateofbirth == "") {
			$(".dateofbirthError").show();
			isValid = false;
		} else {
			$(".dateofbirthError").hide();
		}

		if (primaryType != "LENDER") {
			if (companyname == "") {
				$(".companynameError").show();
				isValid = false;
			} else {
				$(".companynameError").hide();
			}

			if (salary == "") {
				$(".salaryError").show();
				isValid = false;
			} else {
				$(".salaryError").hide();
			}
		}

		if (!panRegex.test(panNumber)) {
			$(".panNumberError").html("Please enter valid Pan Number.");
			$(".panNumberError").show();
			$("#pannumber").attr("readonly", false);
			isValid = false;
		} else {
			$(".panNumberError").hide();
		}

		if (enteredAddress == "") {
			$(".addressError").show();
			isValid = false;
		} else {
			$(".addressError").hide();
		}

		if (enteredNationality == "") {
			$(".nationalityError").show();
			isValid = false;
		} else {
			$(".nationalityError").hide();
		}

		var i = 0;
		for (var i = 0; i < maritalStatusMethod.length; i++) {
			if (maritalStatusMethod[i].checked == true) {
				mios = true;
			}
		}
		if (!mios) {
			$(".maritalStatusError").show();
			isValid = false;
		} else {
			$(".maritalStatusError").hide();
		}
		//return isValid;

		var postData = {
			firstName: enteredFirstname,
			middleName: middlename,
			lastName: enteredLastname,
			fatherName: enteredFathername,
			dob: enteredDateofbirth,
			gender: enteredGender,
			maritalStatus: enteredMaritalStatus,
			address: enteredAddress,
			nationality: enteredNationality,
			companyName: companyname,
			salary: salary,
			panNumber: panNumber,
		};

		var postData = JSON.stringify(postData);
		let regUrl = baseUrl + "v1/user/" + userId + "";
		if(isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-profileSuccess").modal("show");
					setTimeout(function () {
						if (primaryType == "LENDER") {
							window.location = "lenderuserkyc";
						} else {
							window.location = "borroweruserkyc";
						}
					}, 2000);
				},
				error: function (xhr, textStatus, errorThrown) {
					// $("#modal-profile-error").modal('show');
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$(
		"#companyname,#designation,#description,#highestQualification,#fieldOfStudy,#college"
	).keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);

		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$("#yearOfPassing").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 3) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$("#myprofile-submit-btn").click(function () {
		var enteredEmployment = $(".employmentValue").val();
		var enteredCompanyname = $(".companynameValue").val();
		var enteredDesignation = $(".designationValue").val();
		var enteredDescription = $(".descriptionValue").val();
		var enteredNoOfJobsChanged = $(".NoOfJobsChangedvvalue").val();
		var enteredworkExperience = $("#workExperience").val();
		var enteredHighestQualifications = $(".highestQualificationsvalue").val();
		//var enteredofficeAddressId= $(".officeAddressIdValue").val();
		var enteredofficeContactNumber = $(".officeContactNumbervalue").val();
		var enteredfieldOfStudy = $(".fieldOfStudyValue").val();
		var enteredCollege = $(".collegeValue").val();
		var enteredyearOfPassing = $(".yearOfPassingValue").val();

		enteredCompanyname = enteredCompanyname.trim();
		enteredDesignation = enteredDesignation.trim();
		enteredDescription = enteredDescription.trim();
		enteredfieldOfStudy = enteredfieldOfStudy.trim();
		enteredCollege = enteredCollege.trim();

		var isValid = true;
		if (enteredEmployment == "") {
			$(".employmentError").show();
			isValid = false;
		} else {
			$(".employmentError").hide();
		}

		if (enteredCompanyname == "") {
			$(".companynameError").show();
			isValid = false;
		} else {
			$(".companynameError").hide();
		}

		if (enteredDesignation == "") {
			$(".designationError").show();
			isValid = false;
		} else {
			$(".designationError").hide();
		}

		if (enteredDescription == "") {
			$(".descriptionError").show();
			isValid = false;
		} else {
			$(".descriptionError").hide();
		}
		if (enteredNoOfJobsChanged == "") {
			$(".NoOfJobsChangedError").show();
			isValid = false;
		} else {
			$(".NoOfJobsChangedError").hide();
		}

		if (enteredworkExperience == "") {
			$(".workexperienceError").show();
			isValid = false;
		} else {
			$(".workexperienceError").hide();
		}

		if (enteredHighestQualifications == "") {
			$(".highestqualificationError").show();
			isValid = false;
		} else {
			$(".highestqualificationError").hide();
		}

		if (enteredofficeContactNumber == "") {
			$(".officeContactNumberError").show();
			isValid = false;
		} else if (enteredofficeContactNumber.length != 10) {
			$(".officeContactNumberError").html("Please enter valid mobile number");
			$(".officeContactNumberError").show();
			isValid = false;
		} else {
			$(".officeContactNumberError").hide();
		}
		if (enteredfieldOfStudy == "") {
			$(".fieldOfStudyError").show();
			isValid = false;
		} else {
			$(".fieldOfStudyError").hide();
		}

		if (enteredCollege == "") {
			$(".collegeError").show();
			isValid = false;
		} else {
			$(".collegeError").hide();
		}

		if (enteredyearOfPassing == "") {
			$(".yearOfPassingError").show();
			isValid = false;
		} else {
			$(".yearOfPassingError").hide();
		}

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var postData = {
			employment: enteredEmployment,
			companyName: enteredCompanyname,
			designation: enteredDesignation,
			description: enteredDescription,
			noOfJobsChanged: enteredNoOfJobsChanged,
			workExperience: enteredworkExperience,
			highestQualification: enteredHighestQualifications,
			officeContactNumber: enteredofficeContactNumber,
			fieldOfStudy: enteredfieldOfStudy,
			college: enteredCollege,
			yearOfPassing: enteredyearOfPassing,
		};
		postData = JSON.stringify(postData);
		console.log(postData);

		let regUrl = baseUrl + "v1/user/professional/" + userId + "";

		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				async: false,
				success: function (data, textStatus, xhr) {
					$("#modal-professionaldetailsSuccess").modal("show");
					setTimeout(function () {
						if (primaryType == "LENDER") {
							window.location = "lenderaddress";
						} else {
							window.location = "borroweraddress";
						}
					}, 2000);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	// ENDS MY PROFILE SECTION //
	// RAISE A LOAN REQUEST //

	$(".loanRequestAmount").on("keypress", function (e) {
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

	$("#loan-submit-btn").click(function () {
		var enteredloanRequestAmount = $(".loanRequestAmount").val();
		var enteredrateOfInterest = $("#rateOfInterest").val();
		var enteredduration = $("#duration").val();
		var enteredrepaymentMethod = $(
			"input[name=existingRepaymentMethod]:checked"
		).val();
		var entereddurationmethod = $("input[name=Durationtype]:checked").val();
		var enteredloanPurpose = $(".loanPurpose").val();
		var enteredexpectedDate = $(".expectedDateValue").val();
		var loanEditbleAccess = $("#loanrequestEditAccess").val();
		var wayOfinterestMethod = document.getElementsByName(
			"existingRepaymentMethod"
		);
		var woim = false;
		var isValid = true;

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;
		enteredloanPurpose = enteredloanPurpose.trim();

		if (enteredloanRequestAmount == "") {
			$(".loanRequestAmountError").show();
			isValid = false;
		} else if (enteredloanRequestAmount < 5000) {
			$(".loanRequestAmountError").html(
				"Please enter a value greater than or equal to 5000."
			);
			$(".loanRequestAmountError").show();
			isValid = false;
		} else if (enteredloanRequestAmount > 5000000) {
			if (primaryType == "LENDER") {
				$(".loanRequestAmountError").html(
					"As per RBI guidelines lender can lend only 50 Lakhs only."
				);
				$(".loanRequestAmountError").show();
				isValid = false;
			}
			if (primaryType == "BORROWER") {
				$(".loanRequestAmountError").html(
					"As per RBI guidelines borrower can borrow only 50 Lakhs only."
				);
				$(".loanRequestAmountError").show();
				isValid = false;
			}
		} else {
			$(".loanRequestAmountError").hide();
		}
		console.log(enteredrateOfInterest);
		if (enteredrateOfInterest == "") {
			$(".rateOfInterestError").show();
			isValid = false;
		} else {
			$(".rateOfInterestError").hide();
		}

		if (enteredduration == "") {
			$(".durationError").show();
			isValid = false;
		} else {
			$(".durationError").hide();
		}

		if (enteredrepaymentMethod == "") {
			$(".repaymentMethodError").show();
			isValid = false;
		} else {
			$(".repaymentMethodError").hide();
		}

		var i = 0;
		for (var i = 0; i < wayOfinterestMethod.length; i++) {
			if (wayOfinterestMethod[i].checked == true) {
				woim = true;
			}
		}
		if (!woim) {
			$(".repaymentMethodError").show();
			isValid = false;
		} else {
			$(".repaymentMethodError").hide();
		}

		if (enteredloanPurpose == "") {
			$(".loanPurposeError").show();
			isValid = false;
		} else {
			$(".loanPurposeError").hide();
		}

		if (enteredexpectedDate == "") {
			$(".expectedDateError").show();
			isValid = false;
		} else {
			$(".expectedDateError").hide();
		}

		var postData = {
			loanRequestAmount: enteredloanRequestAmount,
			rateOfInterest: enteredrateOfInterest,
			duration: enteredduration,
			repaymentMethod: enteredrepaymentMethod,
			loanPurpose: enteredloanPurpose,
			expectedDate: enteredexpectedDate,
			durationType: entereddurationmethod,
			status: loanEditbleAccess,
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			var regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				userId +
				"/loan/" +
				primaryType +
				"/updateLoanRequest";
		} else {
			var regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				userId +
				"/loan/" +
				primaryType +
				"/updateLoanRequest";
		}

		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-raisealoan").modal("show");
					// $(".loadingSec").hide();
					setTimeout(function () {
						$(".loadingSec").hide();
						if (primaryType == "LENDER") {
							window.location = "lenderloanlistings";
						} else {
							window.location = "loanlistings";
						}
					}, 15000);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");

					$(".modal-body .utbborrowerFitstTime").html(
						arguments[0].responseJSON.errorMessage
					);

					if (arguments[0].responseJSON.errorCode == 108) {
						$(".modal-body .raiseaerrormessage").html(
							arguments[0].responseJSON.errorMessage
						);
						$("#modal-raisealoan-errormessage").modal("show");
					}
				},

				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
	// ENDS  RAISE A LOAN REQUEST //

	// CREATE A LOAN REQUEST //
	$(".loanPurpose").keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);

		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$(".yesIncreaseCommitment").click(function () {
		proceedOffer = true;
		$("#createloan-submit-btn").trigger("click");
		$("#suggetionToLender").modal("hide");
	});
	$(".noLetmeChangeOffer").click(function () {
		stopOffer = true;
		//$("#createloan-submit-btn").trigger("click");
		$("#suggetionToLender").modal("hide");
	});
	$("#createloan-submit-btn").click(function () {
		var enteredloanRequestAmount = $(".loanRequestAmount").val();
		var enteredrateOfInterest = $(".rateOfInterest").val();
		var enteredduration = $(".durationValue").val();
		var enteredrepaymentMethod = $("input[name=repaymentMethod]:checked").val();
		var entereddurationmethod = $("input[name=Durationtype]:checked").val();
		var enteredloanPurpose = $("#loanPurpose").val();
		var enteredexpectedDate = $(".expectedDateValue").val();
		var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
		var woim = false;
		var isValid = true;

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		enteredloanPurpose = enteredloanPurpose.trim();

		if (enteredloanRequestAmount == "") {
			$(".loanRequestAmountError").show();
			isValid = false;
		} else if (enteredloanRequestAmount < 5000) {
			$(".loanRequestAmountError").html(
				"Please enter a value greater than or equal to 5000."
			);
			$(".loanRequestAmountError").show();
			isValid = false;
		} else if (enteredloanRequestAmount > 50000) {
			if (primaryType == "LENDER") {
				$(".loanRequestAmountError").html(
					"As per RBI guidelines you can offer only 50000 to one borrower."
				);
				$(".loanRequestAmountError").show();
				isValid = false;
			}
			if (primaryType == "BORROWER") {
				$(".loanRequestAmountError").html(
					"As per RBI guidelines you can Request only 50000 to one lender."
				);
				$(".loanRequestAmountError").show();
				isValid = false;
			}
		} else {
			$(".loanRequestAmountError").hide();
		}

		if (enteredrateOfInterest == "") {
			$(".rateOfInterestError").show();
			isValid = false;
		} else {
			$(".rateOfInterestError").hide();
		}

		if (enteredduration == "") {
			$(".durationError").show();
			isValid = false;
		} else {
			$(".durationError").hide();
		}

		if (enteredrepaymentMethod == "") {
			$(".repaymentMethodError").show();
			isValid = false;
		} else {
			$(".repaymentMethodError").hide();
		}

		var i = 0;
		for (var i = 0; i < wayOfinterestMethod.length; i++) {
			if (wayOfinterestMethod[i].checked == true) {
				woim = true;
			}
		}
		if (!woim) {
			$(".repaymentMethodError").show();
			isValid = false;
		} else {
			$(".repaymentMethodError").hide();
		}

		if (enteredloanPurpose == "") {
			$(".loanPurposeError").show();
			isValid = false;
		} else {
			$(".loanPurposeError").hide();
		}

		if (enteredexpectedDate == "") {
			$(".expectedDateError").show();
			isValid = false;
		} else {
			$(".expectedDateError").hide();
		}

		// return isValid;

		//alert(requesterdBalanec);
		$(".whatlenderHas").html(whatlenderhas);
		$(".whatlenderisOffering").html(enteredloanRequestAmount);
		if (sprimaryType == "LENDER-----") {
			if (whatlenderhas < enteredloanRequestAmount) {
				//alert(33);
				$("#suggetionToLender").modal("show");
			} else {
				//alert(2);
				proceedOffer = true;
			}

			if (proceedOffer == false) {
				isValid = false;
			}

			if (stopOffer == true) {
				isValid = false;
			}
		}

		var getloanId = $(".requestidFromClick").html();

		var postData = {
			loanRequestAmount: enteredloanRequestAmount,
			rateOfInterest: enteredrateOfInterest,
			duration: enteredduration,
			durationType: entereddurationmethod,
			repaymentMethod: enteredrepaymentMethod,
			loanPurpose: enteredloanPurpose,
			expectedDate: enteredexpectedDate,
			parentRequestId: getloanId,
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		let regUrl =
			baseUrl + "v1/user/" + userId + "/loan/" + primaryType + "/request";

		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-raisealoan").modal("show");

					setTimeout(function () {
						$(".loadingSec").hide();
						// var sprimaryType = data.primaryType;
						if (sprimaryType == "LENDER") {
							window.location = "investor";
						} else {
							window.location = "borrowerDashboard";
						}
					}, 15000);
				},
				statusCode: {
					400: function (jqXHR, textStatus, errorThrown) {
						console.log(jqXHR.responseJSON.errorMessage);
						var errorMessage = jqXHR.responseJSON.errorMessage;
						if (errorMessage == "Can not trasact more than 50K") {
							var placeerrorHTMLCode =
								"As per RBI guiderlines, You can only give 50k to one borrower. You can give again after he close the loan.";
						} else if (
							errorMessage ==
							"Lender has to esign first before you esign. Please contact support"
						) {
							var placeerrorHTMLCode =
								"Your lender has to esign First, We will let you once he is done with his eSign.";
						} else if (
							errorMessage ==
							"Already one loan in conversation, make sure that conversation is closed"
						) {
							var placeerrorHTMLCode =
								"Already one loan in conversation, make sure that conversation is closed.";
						} else if (
							errorMessage ==
							"Already one loan in conversation. Plesae check your responses."
						) {
							if (sprimaryType == "LENDER") {
								var placeerrorHTMLCode =
									"Already one loan in conversation. Please check your responses/offers sent.";
							} else {
								var placeerrorHTMLCode =
									"Already one loan in conversation. Please check your responses/requests sent.";
							}
						} else {
							var placeerrorHTMLCode = errorMessage;
						}

						$("#modal-ReqAlreadySent .modal-body p").html(placeerrorHTMLCode);
						$("#modal-ReqAlreadySent").modal("show");
					},
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");

					$(".modal-body #text").html(arguments[0].responseJSON.errorMessage);

					if (arguments[0].responseJSON.errorCode == 114) {
						$("#modal-errorforRejected").modal("show");
					}
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$(
		"#permanent_area,#present_area,#office_area,#permanent_city,#present_city,#office_city"
	).keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$("#address1-submit-btn").click(function () {
		//PERMANENT CALL//
		var enteredpermanent_Type = "PERMANENT";
		var enteredpermanent_Housenumber = $(".permanent_housenumberValue").val();
		var enteredpermanent_Street = $(".permanent_streetValue").val();
		var enteredpermanent_Area = $(".permanent_areaValue").val();
		var enteredpermanent_City = $(".permanent_cityValue").val();

		var isValid = true;

		enteredpermanent_Housenumber = enteredpermanent_Housenumber.trim();
		enteredpermanent_Street = enteredpermanent_Street.trim();
		enteredpermanent_Area = enteredpermanent_Area.trim();
		enteredpermanent_City = enteredpermanent_City.trim();

		if (enteredpermanent_Housenumber == "") {
			$(".permanent_housenumberError").show();
			isValid = false;
		} else {
			$(".permanent_housenumberError").hide();
		}

		if (enteredpermanent_Street == "") {
			$(".permanent_streetError").show();
			isValid = false;
		} else {
			$(".permanent_streetError").hide();
		}

		if (enteredpermanent_Area == "") {
			$(".permanent_areaError").show();
			isValid = false;
		} else {
			$(".permanent_areaError").hide();
		}
		if (enteredpermanent_City == "") {
			$(".permanent_cityError").show();
			isValid = false;
		} else {
			$(".permanent_cityError").hide();
		}

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var postData = {
			type: enteredpermanent_Type,
			userId: userId,
			houseNumber: enteredpermanent_Housenumber,
			street: enteredpermanent_Street,
			area: enteredpermanent_Area,
			city: enteredpermanent_City,
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		let regUrl = baseUrl + "v1/user/" + userId + "/address/PERMANENT";

		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",

				success: function (data, textStatus, xhr) {
					$("#modal-address1Success").modal("show");
					setTimeout(function () {
						$(".modal-success, .modal-backdrop").removeClass("in");
						//$(".modal").hide();
					}, 2000);
					$("html, body").animate({ scrollTop: 0 }, "slow");
				},
				error: function (xhr, textStatus, errorThrown) {
					$("#modal-address-error").modal("show");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	// Present address //
	$("#address2-submit-btn").click(function () {
		var enteredpresent_Type = "PRESENT";
		var enteredpresent_Housenumber = $(".present_housenumberValue").val();
		var enteredpresent_Street = $(".present_streetValue").val();
		var enteredpresent_Area = $(".present_areaValue").val();
		var enteredpresent_City = $(".present_cityValue").val();

		enteredpresent_Housenumber = enteredpresent_Housenumber.trim();
		enteredpresent_Street = enteredpresent_Street.trim();
		enteredpresent_Area = enteredpresent_Area.trim();
		enteredpresent_City = enteredpresent_City.trim();

		var isValid = true;

		if (enteredpresent_Housenumber == "") {
			$(".present_housenumberError").show();
			isValid = false;
		} else {
			$(".present_housenumberError").hide();
		}

		if (enteredpresent_Street == "") {
			$(".present_streetError").show();
			isValid = false;
		} else {
			$(".present_streetError").hide();
		}

		if (enteredpresent_Area == "") {
			$(".present_areaError").show();
			isValid = false;
		} else {
			$(".present_areaError").hide();
		}
		if (enteredpresent_City == "") {
			$(".present_cityError").show();
			isValid = false;
		} else {
			$(".present_cityError").hide();
		}

		var postData1 = {
			type: enteredpresent_Type,
			userId: userId,
			houseNumber: enteredpresent_Housenumber,
			street: enteredpresent_Street,
			area: enteredpresent_Area,
			city: enteredpresent_City,
		};
		var postData1 = JSON.stringify(postData1);

		console.log(postData1);
		if (isValid == true) {
			let regUrl = baseUrl + "v1/user/" + userId + "/address/PRESENT";

			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData1,
				contentType: "application/json",
				dataType: "json",

				success: function (data, textStatus, xhr) {
					$("#modal-address2Success").modal("show");
					setTimeout(function () {
						$(".modal-success, .modal-backdrop").removeClass("in");
					}, 2000);
					$("html, body").animate({ scrollTop: 0 }, "slow");
				},
				error: function (xhr, textStatus, errorThrown) {
					$("#modal-address-error").modal("show");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	//office
	$("#address3-submit-btn").click(function () {
		//Office Call//
		var enteredoffice_Type = "OFFICE";
		var enteredoffice_Housenumber = $(".office_housenumberValue").val();
		var enteredoffice_Street = $(".office_streetValue").val();
		var enteredoffice_Area = $(".office_areaValue").val();
		var enteredoffice_City = $(".office_cityValue").val();

		enteredoffice_Housenumber = enteredoffice_Housenumber.trim();
		enteredoffice_Street = enteredoffice_Street.trim();
		enteredoffice_Area = enteredoffice_Area.trim();
		enteredoffice_City = enteredoffice_City.trim();

		var isValid = true;

		if (enteredoffice_Housenumber == "") {
			$(".office_housenumberError").show();
			isValid = false;
		} else {
			$(".office_housenumberError").hide();
		}
		if (enteredoffice_Street == "") {
			$(".office_streetError").show();
			isValid = false;
		} else {
			$(".office_streetError").hide();
		}

		if (enteredoffice_Area == "") {
			$(".office_areaError").show();
			isValid = false;
		} else {
			$(".office_areaError").hide();
		}
		if (enteredoffice_City == "") {
			$(".office_cityError").show();
			isValid = false;
		} else {
			$(".office_cityError").hide();
		}

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var postData2 = {
			type: enteredoffice_Type,
			userId: userId,
			houseNumber: enteredoffice_Housenumber,
			street: enteredoffice_Street,
			area: enteredoffice_Area,
			city: enteredoffice_City,
		};
		var postData2 = JSON.stringify(postData2);
		console.log(postData2);

		if (isValid == true) {
			let regUrl = baseUrl + "v1/user/" + userId + "/address/OFFICE";
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData2,
				contentType: "application/json",
				dataType: "json",

				success: function (data, textStatus, xhr) {
					$("#modal-address3Success").modal("show");
					setTimeout(function () {
						$(".modal-success, .modal-backdrop").removeClass("in");

						if (primaryType == "LENDER") {
							window.location = "lenderfinancialinfo";
						} else {
							window.location = "borrowerfinancialinfo";
						}
					}, 4000);
					$("html, body").animate({ scrollTop: 0 }, "slow");
				},
				error: function (xhr, textStatus, errorThrown) {
					$("#modal-address-error").modal("show");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$(".sameasAbove").click(function () {
		var h = $("#permanent_housenumber").val();
		var s = $("#permanent_street").val();
		var a = $("#permanent_area").val();
		var c = $("#permanent_city").val();

		$(".present_housenumberValue").val(h);
		$(".present_streetValue").val(s);
		$(".present_areaValue").val(a);
		$(".present_cityValue").val(c);
	});

	$("#sameAsId").click(function () {
		var h = $("#residenceAddress").val();
		$("#permanentAddress").val(h);
	});

	$(".viewmorestats").click(function () {
		$(".moreStatsDisplay").show("slow");
		$(".hideStats").show();
		$(".viewmorestats").hide();
	});

	$(".hideStats").click(function () {
		$(".viewmorestats").show();
		$(".hideStats, .moreStatsDisplay").hide("slow");
	});

	$(".uploadKYC").click(function () {
		var formData = new FormData($(this)[0]);

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		if (userisIn == "local") {
			var formUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				suserId +
				"/upload/kyc";
		} else {
			var formUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				suserId +
				"/upload/kyc";
		}

		$.ajax({
			type: "POST",
			url: formUrl,
			data: formData,
			contentType: "multipart/form-data",

			xhr: function () {
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) {
					myXhr.upload.addEventListener("progress", progress, false);
				}
				return myXhr;
			},

			cache: false,
			contentType: false,
			processData: false,
			success: function (data) {
				//alert('data returned successfully');
			},

			error: function (data) {},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	});
	// ENDS UPLOAD function //

	$(".sendOfferToBorrower").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		if (userisIn == "local") {
			sendofferURL =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				suserId +
				"/loan/" +
				sprimaryType +
				"/request";
		} else {
			// https://fintech.oxyloans.com/oxyloans/
			sendofferURL =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				suserId +
				"/loan/" +
				sprimaryType +
				"/request";
		}
		//alert(sendofferURL);
	});

	$("#loanRequestAmount, #rateOfInterest, #duration").change(function () {
		console.log("in");
		var loanValue = $("#loanRequestAmount").val();
		var cTenurevalue = $("#duration").val();
		var cRoiValue = $("#rateOfInterest").val();
		var tenureinYears = (cTenurevalue * 1) / 12;
		console.log("tenureinYears " + tenureinYears);
		var calcEarnings = (loanValue * cRoiValue * tenureinYears) / 100;
		console.log(calcEarnings);

		var totalloanvalue = parseInt(loanValue) + calcEarnings;
		console.log("totalloanvalue " + totalloanvalue);
		var emivalue = totalloanvalue / cTenurevalue;
		console.log(emivalue);

		var payonlyint = calcEarnings / cTenurevalue;

		$(".displayEMIvalue").show();
		$(".payonlyint").html(payonlyint);
		$(".emiValueIs").html(Math.round(emivalue));
		$("#emiValueIs").html(Math.round(emivalue));
	});

	$("#newloanRequestAmount, #rateOfInterest, #duration").change(function () {
		console.log("in");
		var loanValue = $("#newloanRequestAmount").val();
		var cTenurevalue = $("#duration").val();
		var cRoiValue = $("#rateOfInterest").val();
		var tenureinYears = (cTenurevalue * 1) / 12;
		console.log("tenureinYears " + tenureinYears);
		var calcEarnings = (loanValue * cRoiValue * tenureinYears) / 100;
		console.log(calcEarnings);

		var totalloanvalue = parseInt(loanValue) + calcEarnings;
		console.log("totalloanvalue " + totalloanvalue);
		var emivalue = totalloanvalue / cTenurevalue;
		console.log(emivalue);

		var payonlyint = calcEarnings / cTenurevalue;

		$(".displayEMIvalue").show();
		$(".payonlyint").html(payonlyint);
		$("#emiValueIs").html(Math.round(emivalue));
	});

	// FINANCIAL INFO STARTS //

	$("#financial-submit-btn").click(function () {
		var enteredMonthlyemi = $(".monthlyEmiValue").val();
		var enteredCreditamount = $(".creditamountValue").val();
		var enteredExistingloanamount = $(".existingloanamountValue").val();
		var enteredCreditcardsrepaymentamount = $(
			".creditcardsrepaymentamountValue"
		).val();
		var enteredOthersourcesincome = $(".othersourcesincomeValue").val();
		var enteredNetmonthlyincome = $(".netmonthlyincomeValue").val();
		var enteredavgMonthlyExpenses = $(".avgmonthlyexpensesValue").val();

		var isValid = true;

		if (enteredMonthlyemi == "") {
			$(".monthlyEmiError").show();
			isValid = false;
		} else {
			$(".monthlyEmiError").hide();
		}

		if (enteredCreditamount == "") {
			$(".creditamountError").show();
			isValid = false;
		} else {
			$(".creditamountError").hide();
		}

		if (enteredExistingloanamount == "") {
			$(".existingloanamountError").show();
			isValid = false;
		} else {
			$(".existingloanamountError").hide();
		}

		if (enteredCreditcardsrepaymentamount == "") {
			$(".creditcardsrepaymentamountError").show();
			isValid = false;
		} else {
			$(".creditcardsrepaymentamountError").hide();
		}
		if (enteredOthersourcesincome == "") {
			$(".othersourcesincomeError").show();
			isValid = false;
		} else {
			$(".othersourcesincomeError").hide();
		}

		if (enteredNetmonthlyincome == "") {
			$(".netmonthlyincomeError").show();
			isValid = false;
		} else if (enteredNetmonthlyincome < 5000) {
			$(".netmonthlyincomeError1").show();
			isValid = false;
		} else {
			$(".netmonthlyincomeError").hide();
			$(".netmonthlyincomeError1").hide();
		}
		if (enteredavgMonthlyExpenses == "") {
			$(".avgmonthlyexpensesError").show();
			isValid = false;
		} else {
			$(".avgmonthlyexpensesError").hide();
		}

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		id = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var postData = {
			monthlyEmi: enteredMonthlyemi,
			creditAmount: enteredCreditamount,
			existingLoanAmount: enteredExistingloanamount,
			creditCardsRepaymentAmount: enteredCreditcardsrepaymentamount,
			otherSourcesIncome: enteredOthersourcesincome,
			netMonthlyIncome: enteredNetmonthlyincome,
			avgMonthlyExpenses: enteredavgMonthlyExpenses,
		};

		postData = JSON.stringify(postData);
		console.log(postData);
		let regUrl = baseUrl + "v1/user/financialDetails/" + id + "";
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",

				success: function (data, textStatus, xhr) {
					$("#modal-FinancialSuccess").modal("show");
					setTimeout(function () {
						if (primaryType == "LENDER") {
							window.location = "lenderbankdetails";
						} else {
							window.location = "borrowerbankdetails";
						}
					}, 2000);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$("#bankname,#branchname,#accounttype").keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$("#accountnumber").on("keypress", function (e) {
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

	$("#bank-submit-btn").click(function () {
		var enteredAccountnumber = $(".accountnumberValue").val();
		var enteredBankname = $(".banknameValue").val();
		var enteredBranchname = $(".branchnameValue").val();
		var enteredAccounttype = $(".accounttypeValue").val();
		var enteredIfsccode = $(".ifsccodeValue").val();
		var enteredAddress = $(".addressValue").val();

		var ifscRegex = /^[A-Z]{4}\d{7}$/i;

		enteredBankname = enteredBankname.trim();
		enteredBranchname = enteredBranchname.trim();
		enteredAccounttype = enteredAccounttype.trim();
		enteredIfsccode = enteredIfsccode.trim();
		enteredAddress = enteredAddress.trim();

		var isValid = true;
		if (enteredAccountnumber == "") {
			$(".accountnumberError").show();
			isValid = false;
		} else {
			$(".accountnumberError").hide();
		}

		if (enteredBankname == "") {
			$(".banknameError").show();
			isValid = false;
		} else {
			$(".banknameError").hide();
		}

		if (enteredBranchname == "") {
			$(".branchnameError").show();
			isValid = false;
		} else {
			$(".branchnameError").hide();
		}

		if (enteredAccounttype == "") {
			$(".accounttypeError").show();
			isValid = false;
		} else {
			$(".accounttypeError").hide();
		}
		if (!ifscRegex.test(enteredIfsccode)) {
			$(".ifsccodeError").html("Please enter valid IFSC code.");
			$(".ifsccodeError").show();
			isValid = false;
		} else {
			$(".ifsccodeError").hide();
		}

		if (enteredAddress == "") {
			$(".addressError").show();
			isValid = false;
		} else {
			$(".addressError").hide();
		}

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		id = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var postData = {
			accountNumber: enteredAccountnumber,
			bankName: enteredBankname,
			branchName: enteredBranchname,
			accountType: enteredAccounttype,
			ifscCode: enteredIfsccode,
			address: enteredAddress,
		};
		postData = JSON.stringify(postData);
		console.log(postData);
		let regUrl = baseUrl + "v1/user/bankdetails/" + id + "";
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",

				success: function (data, textStatus, xhr) {
					$("#modal-bankSuccess").modal("show");
					setTimeout(function () {
						if (primaryType == "LENDER") {
							window.location = "investor";
						} else {
							window.location = "borrowerDashboard";
						}
					}, 2000);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$(".deleteSession").click(function () {
		console.log("entering in deleteSession");
		signout();
	});

	$("#type").on("change", function () {
		if ($("#type").val() == "amount") {
			$(".amount").show();
			$(".roi, .borrowerIDBlock").hide();
		} else if ($("#type").val() == "roi") {
			$(".amount, .borrowerIDBlock").hide();
			$(".roi").show();
		} else if ($("#type").val() == "borrowerID") {
			$(".amount, .roi").hide();
			$(".borrowerIDBlock").show();
		} else if ($("#type").val() == "searchWithID") {
			$(".amount, .roi").hide();
			$(".searchWithID").show();
		} else if ($("#type").val() == "wtowSearch") {
			$(
				".wtowStartdate, .wtowEnddate,.wtosorybasedondiv,.wtosorttypediv"
			).show();
		} else {
			$(".amount, .borrowerIDBlock,.roi,.wtowStartdate,.wtowEnddate").hide();
		}
	});

	// ONLOAD ENDS
});
// ONLOAD ENDS

function progress(e) {
	if (e.lengthComputable) {
		var max = e.total;
		var current = e.loaded;

		var Percentage = (current * 100) / max;
		console.log(Percentage);

		if (Percentage >= 100) {
			// process completed
		}
	}
}

function deleteSession() {}

function loadDashboardData() {
	$(".loadingSec").show();
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
			"/dashboard/" +
			primaryType +
			"?current=false";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/dashboard/" +
			primaryType +
			"?current=false";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.amountDisbursed == null) {
				data.amountDisbursed = 0;
			}
			if (data.interestPaid == null) {
				data.interestPaid = 0;
			}
			if (data.principalReceived == null) {
				data.principalReceived = 0;
			}
			if (data.totalTransactionFee == null) {
				data.totalTransactionFee = 0;
			}
			if (data.oxyScore == null) {
				data.oxyScore = 0;
			}
			$(".amountDisbursed").html(data.amountDisbursed - data.closedLoansAmount);
			$(".commitmentAmount").html(data.commitmentAmount);
			lendercommValue = data.commitmentAmount;
			$(".availableForInvestment").html(data.inProcessAmount);
			$(".interestPaid").html(data.interestPaid);
			$(".noOfActiveLoans").html(data.noOfActiveLoans);
			//$(".noOfActiveApp").html(data.noOfActiveApplications);
			$(".noOfClosedLoans").html(data.noOfClosedLoans);
			$(".closedLoansValue").html(data.closedLoansAmount);
			$(".noOfDisbursedLoans").html(data.noOfDisbursedLoans);
			$(".noOfFailedEmis").html(data.noOfFailedEmis);
			$(".noOfLoanRequests").html(data.noOfLoanRequests);
			$(".outstandingAmount").html(data.outstandingAmount);
			$(".principalReceived").html(data.principalReceived);
			$(".totalTransactionFee").html(data.totalTransactionFee);
			$(".oxyscore").html(data.oxyScore);
			$(".data-lender-commitement").html(data.lenderWalletAmount);
			$(".noOfLoanResponses").html(data.noOfLoanResponses);
			$(".noOfDisbursedLoansValue").html(data.amountDisbursed);

			setTimeout(function () {
				if (data.noOfLoanRequests != "0" || data.noOfLoanResponses != "0") {
					$("#lenderstep4").addClass("active");
				}
				if (data.myTrackingStatus.eSignStatus == "True") {
					$("#lenderstep5").addClass("active");
				}

				if (data.myTrackingStatus.disbursementStatus == "True") {
					$("#lenderstep6").addClass("active");
				}
			}, 1000);

			var totalComm = data.commitmentAmount - data.amountDisbursed;

			requesterdBalanec = totalComm;
			whatlenderhas = requesterdBalanec;
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
	$(".loadingSec").hide();
}

function getUserDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	// if (suserId != "") {
	// 	if (sprimaryType == "LENDER") {
	// 		$(".placeUserID").html("LR" + suserId);
	// 		$(".virtualID").html("OXYLRV" + suserId);
	// 	} else {
	// 		$(".placeUserID").html("BR" + suserId);
	// 	}
	// }

	$("#transactionaccountnumber").val("OXYLRV" + suserId);
	$("#userid").val(suserId);
	$("#senderId").val("LR" + suserId);

	if (userisIn == "local") {
		var personalDetailsUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/personal/" +
			suserId +
			"";
	} else {
		var personalDetailsUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/personal/" + suserId + "";
	}

	$.ajax({
		url: personalDetailsUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			console.log(data);
			// userSubscriptionStatus = data.lenderValidityStatus;

			if (data.groupName == "NewLender") {
				jQuery(".newLenderAuto").hide();
			} else {
				jQuery(".newLenderAuto").show();
			}

			if (data.notificationsCount == null) {
				$(".nitificationCount").html("0");
			} else {
				$(".nitificationCount").html(data.notificationsCount.unseenCount);
			}

			if (data.walletCalculationToLender == false) {
				jQuery(".oxyPartnerLender,#hidewalletinfo").hide();
			}

			userNameFromAPI = data.firstName;
			globalLoanId = data.loanRequestId;
			// $(".placeUserID").html(data.suserId);

			if (userNameFromAPI == "") {
				userNameFromAPI = "User";
			}

			usernationality = data.nationality;
			if (usernationality == "") {
				usernationality = "Indian";
			}

			userlastNameFromAPI = data.lastName;
			$(".email-user").html(data.email);
			if (userlastNameFromAPI == "") {
				userlastNameFromAPI = "";
			}

			userpersonalinfo = data.personalDetailsInfo;
			userifsccode = data.ifscCode;
			userkycStatus = data.kycStatus;
			userbankDetailsInfo = data.bankDetailsInfo;
			userwhatsappNumberStatus = data.whatsAppNumberUpdated;
			userwhatsappNo = data.whatsAppNumber;
			userWhatsappUpdateStatus = data.whatsAppNumberUpdated;
			userwhatsappVerifiedStatus = data.whatsappVerified;
			bankDetailsVerifiedStatus = data.bankDetailsVerifiedStatus;
			loanOfferedStatus = data.loanOfferedStatus;
			rateOfInterest = data.rateOfInterestUpdated;
			loanRequestId = data.loanRequestId;
			citizenship = data.citizenship;
			userCity = data.city;
			userUtm = data.utm;
			partnerUserType = data.oxyUserTypeResponseDto.type;
			additionalFieldsToUser =
				data.oxyUserTypeResponseDto.additionalFieldsToUser;
			loanExist = data.loansExists;
			enachStatus = data.enachStatus;
			esginStatus = data.esignedStatus;
			loanEsign = data.esignStatus;
			userReferenceVerified = data.referenceStatus;
			userReferenceCount = data.referencesCount;
			userCibilScore = data.cibilScore;
			userMobileNumber = data.mobileNumber;
			applicationLoanRequest = data.loanRequestId;

			let refUrl = "";
			// isStudentProfisStudentProfileile=data.studentOrNot;
			if (userisIn == "prod") {
				refUrl = "https://www.oxyloans.com/new/";
			} else {
				refUrl = "http://182.18.139.198/new/";
			}

			$("#refLinkU,#l_partnerUtm").val(
				refUrl + "register_lender?ref=" + data.userDisplayId
			);
			$("#nrirefLinkU,#nR_partnerUtm").val(
				refUrl + "nrilenderregistration?ref=" + data.userDisplayId
			);

			if (userUtm == "OXY_PFino1" || userUtm == "OXY_PFINOO") {
				$("#borrowerRefLinkU").val(
					refUrl +
						"register_borrower?ref=" +
						data.userDisplayId +
						"&usrFrom=" +
						userUtm +
						"&userNo=" +
						userMobileNumber
				);
			} else {
				$("#borrowerRefLinkU,#b_partnerUtm").val(
					refUrl + "register_borrower?ref=" + data.userDisplayId
				);
			}

			writeCookie("applicationLoanRequest", applicationLoanRequest);
			writeCookie("userUtmRequest", userUtm);

			if (data.studentOrNot == true) {
				writeCookie("isStudentProfile", data.studentOrNot);
			} else {
				writeCookie("isStudentProfile", false);
			}

			if (additionalFieldsToUser == "YES") {
				$(".referencehideSection").hide();
			} else {
				$("#accountno").attr("type", "number");
				$("#confirmaccountno").attr("type", "number");
			}

			if (userUtm == "OXY_PmBnk") {
				$("#accountno").attr("type", "text");
				$("#confirmaccountno").attr("type", "text");
				$(".loanEligilibilityValue").hide();
			} else {
				$("#accountno").attr("type", "number");
				$("#confirmaccountno").attr("type", "number");
			}

			if (sprimaryType == "BORROWER") {
				$(".loanEligilibilityAmount").html(data.loanEligibility);
			}
			if (sprimaryType == "LENDER") {
				lenderGroupName = data.groupName;

				if (data.isNotificationSendAboutValidity == false) {
					$(".renwel_unsubscribe").hide();
				} else {
					$(".renwel_unsubscribe").show();
				}

				// if (data.groupName == "Satish#OXYFoundingLenders") {
				// 	$(".groupNameis").html("S# Oxy Founding Lender");
				// } else if (data.groupName == "OxyPremiuimLenders") {
				// 	$(".groupNameis").html("Oxy Premium");
				// } else if (data.groupName == "OXYFoundingLenders") {
				// 	$(".groupNameis").html("Oxy Founding Lender");
				// } else if (data.groupName == "OxywheelsInvestors") {
				// 	$(".groupNameis").html("Oxywheels Investors");
				// } else if (data.groupName == "OxyLoansInvestors") {
				// 	$(".groupNameis").html("OxyLoans Investors");
				// } else if (data.groupName == "Satish#OxyLendingMasters") {
				// 	$(".groupNameis").html("S# Oxy Lending Masters");
				// } else if (data.groupName == "OXYMARCH09") {
				// 	$(".groupNameis").html("Oxy Founding Lender");
				// } else {
				// 	$(".groupNameis").html("New Lender");
				// }

				if (lenderGroupName == "NewLender") {
					$(".viewValidityDate").hide();
					$(".refaral_info_newDb").hide();
					$(".getmembership_new").show();
				}

				if (
					data.lenderValidityStatus == true &&
					lenderGroupName != "NewLender"
				) {
					$(".getmembership_new").show();
				}

				// } else {
				// 	$(".viewValidityDate").show();
				// 	$(".refaral_info_newDb").show();
				// 	$(".refEarnings").hide();
				// 	$(".getmembership_new").show();
				// }

				if (data.groupId == "1" || data.groupId == "2" || data.groupId == "3") {
					jQuery("#loanOwner").show();
					jQuery("#lrunnings").hide();
				} else {
					jQuery("#loanOwner").hide();
					jQuery("#lrunnings").show();
				}

				/////end ***********************************************

				if (data.durationIncrement == true) {
					$("#oxyTradeLi").show();
				} else {
					$("#oxyTradeLi").hide();
				}

				// if (data.holdStatus == true) {
				// 	$("#isHoldAmount").show();
				// } else {
				// 	$("#isHoldAmount").hide();
				// }

				if (data.userExpertise == true) {
					$(".btn-seekers").html("Enabled Permission To seekers");
				}
			}
			setTimeout(function () {
				if (data.userStatus == "REGISTERED" || data.userStatus == "ACTIVE") {
					$("#step1").addClass("active");
				}

				if (
					(data.userStatus == "REGISTERED" || data.userStatus == "ACTIVE") &&
					data.personalDetailsInfo == true &&
					data.kycStatus == true &&
					data.bankDetailsInfo == true &&
					data.rateOfInterestUpdated == true
				) {
					$("#step2").addClass("active");
				}

				if (data.loanOfferedStatus == false) {
					$("#step3").addClass("active");
				}
			}, 1000);

			if (data.city == null) {
				$("#modal-checkCity").modal("show");
			} else {
				$("#modal-checkCity").modal("hide");
			}

			var windowLocation = $(location).attr("href");
			if (noprofileCheck == "yes") {
				redirectUsertoProfile();
			}

			var notificationErrorHtml = $(".emailHTML").html();
			if (data.emailVerified == false) {
				$(".content-wrapper").prepend(notificationErrorHtml);
				$(".sendActivationLink").attr("data-email", data.email);
			}

			// $(".displayUserName, .userNameLender").html(
			// 	userNameFromAPI + " " + userlastNameFromAPI
			// );

			// writeCookie(
			// 	"walletBal",
			// 	data.lenderWalletAmount -
			// 		data.holdAmountInDealParticipation -
			// 		data.equityAmount
			// );

			$(".inHold").html(data.holdAmountInDealParticipation);
			$(".equityInvestment").html(data.equityAmount);

			if (noROICheck == "yes") {
				redirectUsertoRequestpage();
			}

			if (data.citizenship == "NRI") {
				$("#nriWhatsappNumber").val(
					userwhatsappNo == null ? userwhatsappNo : userwhatsappNo.trim()
				);
			} else {
				$("#verifyWhatsappNumber").val(
					userwhatsappNo == null ? userwhatsappNo : userwhatsappNo.trim()
				);
			}

			$(".usrNameEmail").html(data.userName);
			if (noROICheck != "no") {
				var locationfindpath = window.location.href;
				var inLoanRequestPage = false;
				if (window.location.href.indexOf("borrowerraisealoanrequest") > -1) {
					inLoanRequestPage = true;
				}

				if (window.location.href.indexOf("lenderraisealoanrequest") > -1) {
					inLoanRequestPage = true;
				}

				if (data.rateOfInterestUpdated === false) {
					setTimeout(function () {
						rateofInterestCheck = true;
					}, 1000);
				}

				var nowyoucancheckROI = true;

				if (userNameFromAPI == "" || userNameFromAPI == null) {
					nowyoucancheckROI = false;
				}

				if (sprimaryType == "LENDER") {
					$(".updateTextForLenderLoanSubmitFirstTime").html(
						"Your loan offer is submitted."
					);
				} else {
					$(".utbborrowerFitstTime").html(
						"Your loan application is submitted."
					);
				}

				if (nowyoucancheckROI) {
					if (
						inLoanRequestPage == true &&
						data.rateOfInterestUpdated === false
					) {
						$(".changeTextBeforeLoanSubmit").html(
							"Submit your lending commitment"
						);
					}

					if (inLoanRequestPage != true) {
						if (data.rateOfInterestUpdated === false) {
							$(".btnNameofIncreaseLoan").html("Submit Loan Application");
						}
					}
				}
			}

			if (data.kycStatus === false) {
				if (userpersonalinfo == true && userifsccode != null) {
					if (sprimaryType == "LENDER") {
						$("#modal-Kyc-NotUpdated-Lender").modal("show");
					} else {
						$("#modal-Kyc-NotUpdated-Borrower").modal("show");
					}
				}
			}

			if (data.experianStatus == true) {
				$("#experianid").attr("href", "creditreportview");
			} else {
				$("#experianid").attr("href", "creditReportInfo");
			}

			if (sprimaryType == "BORROWER") {
				if (userUtm == "WEB" || userUtm == "Web" || userUtm == null) {
					$("#zagglelist li")
						.children()
						.each(function () {
							if (
								$(this).is("a:contains('Rejected loans')") ||
								$(this).is("a:contains('Accepted loans')") ||
								$(this).is("a:contains('Expired loans')")
							) {
								$(this).show();
							}
						});
				} else {
					$(".borrowerUserType").attr("href", "borrowerloanrequest");
					$("#pay_only_Interest_btn").attr("href", "borroweragreedloan");
					$("#UserPartnerLink").attr("href", "borrowerloanrequest");

					$("#zagglelist li")
						.children()
						.each(function () {
							if (
								$(this).is("a:contains('Rejected loans')") ||
								$(this).is("a:contains('Accepted loans')") ||
								$(this).is("a:contains('Expired loans')")
							) {
								$(this).hide();
							}
						});
				}

				if (partnerUserType == "SELFEMPLOYED") {
					$(".userDelaerType").html("Upload Personal KYC");
					$(".displayDealerDocs").show();
				} else {
					$(".displayDealerDocs").hide();
				}

				if (
					data.vanNumber != null &&
					data.vanNumber != undefined &&
					data.vanNumber != ""
				) {
					jQuery("#oxyTradeLi").show();
				} else {
					jQuery("#oxyTradeLi").hide();
				}

				// if (
				// 	data.loanStatus == "Applicationlevel" &&
				// 	data.enachStatus == false
				// ) {
				// 	$(".checkApplicationEnach a").attr("href", "applicationEmandate");
				// 	$("#zagglelist li")
				// 		.children()
				// 		.each(function () {
				// 			if ($(this).is("a:contains('eNACH')")) {
				// 				$(this).hide();
				// 			}
				// 		});
				// } else if (
				// 	data.loanStatus == "Loanlevel" &&
				// 	data.enachStatus == false
				// ) {
				// 	$("#zagglelist li")
				// 		.children()
				// 		.each(function () {
				// 			if ($(this).is("a:contains('Application Level Enach')")) {
				// 				$(this).hide();
				// 			}
				// 		});
				// } else if (data.loanStatus == "NA" && data.enachStatus == false) {
				// 	$("#zagglelist li")
				// 		.children()
				// 		.each(function () {
				// 			if ($(this).is("a:contains('Application Level Enach')")) {
				// 				$(this).hide();
				// 			}
				// 		});
				// } else if (
				// 	data.loanStatus == "NA" &&
				// 	data.enachStatus == true &&
				// 	data.loanRequestAmount >= 50000
				// ) {
				// 	$(".checkApplicationEnach a").attr("href", "applicationEmandate");
				// 	$("#zagglelist li")
				// 		.children()
				// 		.each(function () {
				// 			if ($(this).is("a:contains('Application Level Enach')")) {
				// 				$(this).show();
				// 			}

				// 			if ($(this).is("a:contains('eNACH')")) {
				// 				$(this).hide();
				// 			}
				// 		});
				// } else if (
				// 	data.loanStatus == "NA" &&
				// 	data.enachStatus == true &&
				// 	data.loanRequestAmount < 50000
				// ) {
				// 	$("#zagglelist li")
				// 		.children()
				// 		.each(function () {
				// 			if ($(this).is("a:contains('eNACH')")) {
				// 				$(this).show();
				// 			}

				// 			if ($(this).is("a:contains('Application Level Enach')")) {
				// 				$(this).hide();
				// 			}
				// 		});
				// } else if (
				// 	data.loanStatus == null &&
				// 	data.enachStatus == false &&
				// 	data.loanRequestAmount == null
				// ) {
				// 	$("#zagglelist li")
				// 		.children()
				// 		.each(function () {
				// 			if ($(this).is("a:contains('eNACH')")) {
				// 				$(this).show();
				// 			}

				// 			if ($(this).is("a:contains('Application Level Enach')")) {
				// 				$(this).hide();
				// 			}
				// 		});
				// }

				// *******************    count referrence   **********************

				if (data.referencesCount == 0 && data.referenceStatus == false) {
					$(".referencehideSection").hide();
				}
				// else {
				// 	for (let i = 0; i < data.referencesCount; i++) {
				// 		$(".referencesAppendedSec").append(
				// 			'<div  class="form-lft"><label style="width: 30%;">Reference ' +
				// 				parseInt(i + 1) +
				// 				'<em class="mandatory">*</em></label><div class="fld-block"> <input type="number" placeholder="Reference ' +
				// 				parseInt(i + 1) +
				// 				' No" id="ref_' +
				// 				parseInt(i + 1) +
				// 				'" name="ref_' +
				// 				parseInt(i + 1) +
				// 				'" class="text-fld1" maxlength="10" style="width: 40%!important;"/><button type="button" class="btn btn-sm btn-primary btm_ref_' +
				// 				parseInt(i + 1) +
				// 				'"  id="btnOtp_' +
				// 				parseInt(i + 1) +
				// 				'" style="margin: 2px 3px 0px 10px;" onclick="refSendOtoIndividual(this);" otp_Session_' +
				// 				parseInt(i + 1) +
				// 				'="">Send Otp</button><input type="number" placeholder="Ref' +
				// 				parseInt(i + 1) +
				// 				' OTP" id="otpinput' +
				// 				parseInt(i + 1) +
				// 				'" name="otpinput" class="text-fld1" maxlength="6" style="width: 35%!important;float:right!important;display:none;position: relative;"/><i class="fa fa-check refBlock_' +
				// 				parseInt(i + 1) +
				// 				' refBlockfafa" aria-hidden="true" style="color:green; display:none"></i>  <div class="clear"></div></div> <div class="clear"></div></div>'
				// 		);
				// 	}

				// 	$(".referencesAppendedSec").append(
				// 		'<button type="button" class="btn btn-primary pull-right" id="user-referrence-details">Save</button>'
				// 	);
				// }

				//******************* end the referrence count ****************************
			}

			if (data.oxyUserTypeResponseDto.repaymentMethod == "BOTH") {
				isRepayment = false;
			} else if (data.oxyUserTypeResponseDto.repaymentMethod == "PI") {
				isRepayment = true;
			} else {
				isRepayment = false;
			}

			var $partnerradios = $("input:radio[name=repaymentMethod]");
			if ($partnerradios.is(":checked") === false) {
				$partnerradios
					.filter("[value=" + data.oxyUserTypeResponseDto.repaymentMethod + "]")
					.prop("checked", true);
				$partnerradios.prop("disabled", isRepayment);
			}

			$("#cibilscore1").val(data.oxyUserTypeResponseDto.firstCibilScore);
			$("#cibilscore2").val(data.oxyUserTypeResponseDto.secondCibilScore);
			$("#cibilscore3").val(data.oxyUserTypeResponseDto.thirdCibilScore);
			$("#cibilscore4").val(data.oxyUserTypeResponseDto.fourthCibilScore);
			$("#cibilscore5").val(data.oxyUserTypeResponseDto.fifthCibilScore);

			if (
				data.oxyUserTypeResponseDto.loanAmountCalculation == 0 ||
				data.oxyUserTypeResponseDto.loanAmountCalculation == null
			) {
				$("#partnermulsalary").val(1);
			} else {
				$("#partnermulsalary").val(
					data.oxyUserTypeResponseDto.loanAmountCalculation
				);
			}

			if (
				data.oxyUserTypeResponseDto.duration == null ||
				data.oxyUserTypeResponseDto.duration == ""
			) {
				$(".partnerdurationValue").val(data.oxyUserTypeResponseDto.duration);
				$(".partnerdurationValue").prop("disabled", false);
			} else {
				$(".partnerdurationValue").val(data.oxyUserTypeResponseDto.duration);
				$(".partnerdurationValue").prop("disabled", false);
			}

			$(".totalNotifications").html(data.notificationDetails.totalCount);
			$("#totalNotifications").html(data.notificationDetails.totalCount);
			$("#totalLoanResponsePending").html(
				data.notificationDetails.loanResponsePendingCount
			);
			$("#totalesignPending").html(data.notificationDetails.esignPendingCount);
			$("#totaldisbursedmentPending").html(
				data.notificationDetails.disbursedmentPendingCount
			);

			if (data.whatsAppNumberUpdated == true) {
				$("#lwhatsAppNumber").attr("readonly", false);
			} else {
				$("#lwhatsAppNumber").attr("readonly", false);
			}
		},
		statusCode: {
			200: function (response) {},
			401: function (response) {
				var pathname = window.location.pathname;
				var url = window.location.href;
				var origin = window.location.origin;

				writeCookie("redirectUrl", url);
				var getRedirectionUrl = getCookie("redirectUrl");

				if (getRedirectionUrl != "") {
					$("#modal-checkSession").modal("show");

					// setTimeout(function () {
					// 	window.location = "userlogin";
					// }, 2000);
				}
			},
			409: function (response) {
				//alert('1');
				$("#modal-mobileerror").modal("show");
			},
			404: function (response) {},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}
$(document).ready(function () {
	$(".userredirect1").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		if (sprimaryType == "LENDER") {
			window.location.href = "lenderresponsestoMyrequests?appNumber=0";
		} else {
			window.location.href = "borrowerresponsestoMyrequests?appNumber=0";
		}
	});

	$(".userredirect2").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		if (sprimaryType == "LENDER") {
			window.location.href = "lenderagreedloans";
		} else {
			window.location.href = "borroweragreedloans";
		}
	});

	$(".userredirect3").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
	});
});

function redirectUsertoRequestpage() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var locationfindpath = window.location.href;
	var inLoanRequestPage = false;
	if (window.location.href.indexOf("borrowerraisealoanrequest") > -1) {
		inLoanRequestPage = true;
	}

	if (window.location.href.indexOf("lenderraisealoanrequest") > -1) {
		inLoanRequestPage = true;
	}

	if (rateOfInterest === false) {
		setTimeout(function () {
			rateofInterestCheck = true;
		}, 1000);
	}

	var nowyoucancheckROI = true;

	if (userNameFromAPI == "" || userNameFromAPI == null) {
		nowyoucancheckROI = false;
	}

	//alert(nowyoucancheckROI);
	if (sprimaryType == "LENDER") {
		$(".updateTextForLenderLoanSubmitFirstTime").html(
			"Your loan offer is submitted."
		);
	} else {
		//alert("borrowerraisealoanrequest");
		$(".utbborrowerFitstTime").html("Your loan application is submitted.");
		//alert($(".utbborrowerFitstTime").html());
	}

	if (nowyoucancheckROI) {
		if (inLoanRequestPage == true && rateOfInterest === false) {
			$(".changeTextBeforeLoanSubmit").html("Submit your lending commitment");
		}
		//alert(inLoanRequestPage);
		if (inLoanRequestPage != true) {
			if (rateOfInterest === false) {
				$(".btnNameofIncreaseLoan").html("Submit Loan Application");
			}

			//alert(userNameFromAPI);
			if (
				rateOfInterest === false
				// &&
				// userCibilScore != 0 &&
				// userReferenceVerified == true
			) {
				if (
					userkycStatus != false &&
					userpersonalinfo != false &&
					userbankDetailsInfo != false
				) {
					if (
						sprimaryType == "BORROWER" &&
						(userUtm == "WEB" || userUtm == null || userUtm == "Web")
					) {
						$("#modal-ROI-NotUpdated").modal("show");
					} else if (
						sprimaryType == "BORROWER" &&
						userUtm != "WEB" &&
						userUtm != null
					) {
						// $("#modal-ROI-NotUpdated-Lender").modal("show");
						$("#modal-Utm-Partner").modal("show");
					}
				}
			}
		}
	}
}

function redirectUsertoProfile() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	verifyWhatsapp = getCookie("skipwhatsappVerify");

	if (
		userpersonalinfo == false &&
		userbankDetailsInfo == false &&
		userkycStatus == false &&
		userCity != null
	) {
		if (sprimaryType == "LENDER") {
			$(".text-profileCheck").html(
				"Complete your profile and upload valid documents."
			);
		} else {
			$(".text-profileCheck").html(
				"Complete your profile and upload valid documents."
			);
		}

		$("#modal-checkProfile").modal("show");

		if (sprimaryType == "LENDER") {
			$(".personalProfileLink").attr("href", "lender_profilePage");
			$("#headingFour a").trigger("click");
		} else {
			$(".personalProfileLink").attr("href", "borrower_profilePage");
		}

		setTimeout(function () {
			if (sprimaryType == "LENDER") {
				$("#modal-Kyc-NotUpdated-Lender").modal("hide");
				window.location = "lender_profilePage?userScore=0";
			} else {
				window.location = "borrower_profilePage?userScore=0";
			}
		}, 2000);
	}

	if (
		userpersonalinfo == false &&
		userbankDetailsInfo == false &&
		userkycStatus == true
	) {
		if (sprimaryType == "LENDER") {
			$(".text-profileCheck").html(
				"Please complete your profile and upload all valid documents to Add a Loan Offer."
			);
		} else {
			$(".text-profileCheck").html(
				"Please complete your profile and upload all valid documents to raise a Loan Request."
			);
		}

		$("#modal-checkProfile").modal("show");
		if (sprimaryType == "LENDER") {
			$(".personalProfileLink").attr("href", "lender_profilePage");
		} else {
			$(".personalProfileLink").attr("href", "borrower_profilePage");
		}

		setTimeout(function () {
			if (sprimaryType == "LENDER") {
				window.location = "lender_profilePage?userScore=0";
			} else {
				window.location = "borrower_profilePage?userScore=0";
			}
		}, 2000);
	}

	if (
		userpersonalinfo == true &&
		userbankDetailsInfo == false &&
		userkycStatus == true
	) {
		if (sprimaryType == "LENDER") {
			$(".text-profileCheck").html("Please complete your Bank Details.");
		} else {
			$(".text-profileCheck").html("Please complete your Bank Details.");
		}

		$("#modal-checkProfile").modal("show");

		if (sprimaryType == "LENDER") {
			$(".personalProfileLink").attr("href", "lender_profilePage");
		} else {
			$(".personalProfileLink").attr("href", "borrower_profilePage");
		}

		setTimeout(function () {
			if (sprimaryType == "LENDER") {
				window.location = "lender_profilePage?userScore=0";
			} else {
				window.location = "borrower_profilePage?userScore=0";
			}
		}, 2000);
	}

	if (
		userpersonalinfo == true &&
		userbankDetailsInfo == false &&
		userkycStatus == false
	) {
		if (sprimaryType == "LENDER") {
			$(".text-profileCheck").html("Please complete your Bank Details.");
		} else {
			$(".text-profileCheck").html("Please complete your Bank Details.");
		}

		$("#modal-checkProfile").modal("show");

		if (sprimaryType == "LENDER") {
			$(".personalProfileLink").attr("href", "lender_profilePage");
		} else {
			$(".personalProfileLink").attr("href", "borrower_profilePage");
		}

		setTimeout(function () {
			if (sprimaryType == "LENDER") {
				window.location = "lender_profilePage?userScore=0";
			} else {
				window.location = "borrower_profilePage?userScore=0";
			}
		}, 2000);
	}

	if (
		userpersonalinfo == true &&
		userbankDetailsInfo == true &&
		userkycStatus == true &&
		rateOfInterest == true &&
		loanOfferedStatus == true
	) {
		if (sprimaryType == "BORROWER") {
			$("#modal-sendofferacceptance").modal("show");
		} else {
			$("#modal-sendofferacceptance").modal("hide");
		}

		if (sprimaryType == "BORROWER") {
			$(".sendofferPage").attr("href", "acceptLoanoffer");
		}

		setTimeout(function () {
			if (sprimaryType == "BORROWER") {
				window.location = "acceptLoanoffer?userScore=0";
			}
		}, 4000);
	}

	if (
		userWhatsappUpdateStatus == true &&
		userwhatsappVerifiedStatus == false &&
		citizenship == "NONNRI" &&
		userpersonalinfo == true &&
		userbankDetailsInfo == true &&
		userkycStatus == true &&
		verifyWhatsapp == ""
	) {
		if (sprimaryType == "LENDER") {
			$("#modal-verifyWhatsappNumber").modal("show");
		}
	}
	if (
		userWhatsappUpdateStatus == true &&
		userwhatsappVerifiedStatus == false &&
		rateOfInterest == true &&
		userpersonalinfo == true &&
		userbankDetailsInfo == true &&
		userkycStatus == true &&
		verifyWhatsapp == "" &&
		userCibilScore != 0
	) {
		if (sprimaryType == "BORROWER") {
			$("#modal-verifyWhatsappNumber").modal("show");
		}
	}

	if (
		userWhatsappUpdateStatus == true &&
		userwhatsappVerifiedStatus == false &&
		citizenship == "NRI" &&
		userpersonalinfo == true &&
		userbankDetailsInfo == true &&
		userkycStatus == true
	) {
		if (sprimaryType == "LENDER") {
			$("#modal-nriVerifyWhatsappNumber").modal("show");
		}
	}

	if (
		userWhatsappUpdateStatus == true &&
		userwhatsappVerifiedStatus == true &&
		userpersonalinfo == true &&
		userbankDetailsInfo == true &&
		userkycStatus == true &&
		bankDetailsVerifiedStatus == false
	) {
		if (sprimaryType == "LENDER") {
			$("#modal-newUpdatedBankDeatils").modal("show");
		}
	}

	if (loanExist == true && esginStatus == false && loanEsign != "NA") {
		if (sprimaryType == "BORROWER") {
			$("#modal-checkEsign").modal("show");
		}
	}

	if (loanExist == true && esginStatus == true && enachStatus != true) {
		if (sprimaryType == "BORROWER") {
			$("#modal-checkEnach").modal("show");
		}
	}
}
// LOAD BORROWER DASHBOARD //

const paylenderfee = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const getValiditySkip = getCookie("validitySkip");

	setTimeout(() => {
		if (
			userWhatsappUpdateStatus == true &&
			userwhatsappVerifiedStatus == true &&
			userpersonalinfo == true &&
			userbankDetailsInfo == true &&
			userkycStatus == true &&
			bankDetailsVerifiedStatus == true &&
			sprimaryType == "LENDER" &&
			lenderGroupName == "NewLender" &&
			getValiditySkip == "false"
		) {
			$("#modal-validitydate-expired .modal-title").html(
				"Annual Membership Alert!"
			);
			$(
				".text-profileCheck, .text_doc, .payThroughwallet, .renwel_unsubscribe"
			).hide();

			$("#modal-validitydate-expired .modal-body").html(
				"Get access to multiple deals participation throughout the year with a one-time annual fee. Enjoy the convenience of exploring various opportunities seamlessly. </br> Explore the payment avenues below to complete the membership fee"
			);
			$("#modal-validitydate-expired").modal("show");
		}
	}, 1000);
};

const paynewlenderannualfee = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const getValiditySkip = getCookie("validitySkip");

	$("#modal-validitydate-expired .modal-title").html("Annual Membership !");
	$(".renwel_unsubscribe").hide();
	$("#modal-validitydate-expired .modal-body").html(
		"Get access to multiple deals participation throughout the year with a one-time annual fee. Enjoy the convenience of exploring various opportunities seamlessly. </br> Explore the payment avenues below to complete the membership fee"
	);
	$("#modal-validitydate-expired").modal("show");
};

function loadborrowerDashboardData() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	userId = suserId;
	primaryType = sprimaryType;
	// saccessToken = saccessToken;

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/borrowerdashboard/" +
			primaryType;
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/borrowerdashboard/" +
			primaryType;
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			borrowercommValue = data.commitmentAmount;
			if (data.loanOfferedAmount == null) {
				data.loanOfferedAmount = "0";
			}
			$(".commitmentAmount").html(data.loanOfferedAmount);
			$(".requestedAmount").html(data.commitmentAmount);

			$(".interestPaid").html(data.interestPaid);
			$(".noOfActiveApps").html(data.noOfActiveApplications);
			$(".noOfClosedLoans").html(data.noOfClosedApplications);
			$(".closedLoansValue").html(data.closedLoansAmount);
			$(".noOfDisbursedLoans").html(data.noOfDisbursedApplications);
			$(".noOfFailedEmis").html(data.noOfFailedEmis);
			$(".noOfLoanRequests").html(data.noOfLoanRequests);
			$(".outstandingAmount").html(
				data.amountDisbursed - data.closedLoansAmount
			);
			if (data.noOfApplications == null) {
				data.noOfApplications = 0;
			}
			$(".noOfApps").html(data.noOfApplications);
			//$(".noOfActiveApps").html(data.noOfActiveLoans)
			$(".principalReceived").html(data.principalReceived);
			$(".totalTransactionFee").html(data.totalTransactionFee);
			$(".amountDisbursed").html(data.amountDisbursed);
			$(".loanAmountPending").html(
				data.loanOfferedAmount - data.amountDisbursed
			);
			$(".noOfDisbursedLoansValue").html(data.amountDisbursed);
			$(".noOfLoanResponses").html(data.noOfLoanResponses);
			$(".noOfoffersent").html(data.noOfLoanRequests);
			$(".noofferssentValue").html(data.inProcessAmount);
			$(".oxyscore").html(data.oxyScore);

			setTimeout(function () {
				if (data.noOfLoanResponses != "0" || data.noOfLoanRequests != "0") {
					$("#step4").addClass("active");
				}

				if (data.myTrackingStatus.eSignStatus == "True") {
					$("#step5").addClass("active");
				}
				if (data.myTrackingStatus.eNachStatus == "True") {
					$("#step6").addClass("active");
				}
				if (data.myTrackingStatus.disbursementStatus == "True") {
					$("#step7").addClass("active");
				}
			}, 1000);

			setTimeout(function () {
				// This is for borrowerraisealoanrequest PAGE
				$("#loanRequestAmount").val(borrowercommValue);
			}, 500);

			var totalComm = data.commitmentAmount + data.amountDisbursed;

			requesterdBalanec = totalComm - data.outstandingAmount;
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

// LOAD BORROWER LISTINGS //

function loadBorrowersListings() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (primaryType == "LENDER") {
		var fieldValueforSearch = "BORROWER";
	} else {
		var fieldValueforSearch = "LENDER";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userPrimaryType",
				fieldValue: fieldValueforSearch,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.status",
				fieldValue: "ACTIVE",
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
				fieldName: "loanOfferedAmount.loanOfferdStatus",
				fieldValue: "LOANOFFERACCEPTED",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 3,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	// console.log(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			// console.log(totalEntries);
			var template = document.getElementById("loanListingsTpl").innerHTML;

			Mustache.parse(template);
			//var html = Mustache.render(template, data);

			var html = Mustache.to_html(template, { data: data.results });

			//alert(html);
			$("#loadBorrowersListings").html(html);
			$(".oxyScore-00").html("YTR");
			var displayPageNo = totalEntries / 3;
			displayPageNo = displayPageNo + 1;
			$(".lenderDashBoardPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "BORROWER";
					} else {
						var fieldValueforSearch = "LENDER";
					}

					var postData = {
						leftOperand: {
							leftOperand: {
								fieldName: "userPrimaryType",
								fieldValue: fieldValueforSearch,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "user.status",
								fieldValue: "ACTIVE",
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
								fieldName: "loanOfferedAmount.loanOfferdStatus",
								fieldValue: "LOANOFFERACCEPTED",
								operator: "EQUALS",
							},
						},
						page: {
							pageNo: num,
							pageSize: 3,
						},
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};

					//var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
					var postData = JSON.stringify(postData);
					console.log(postData);

					if (userisIn == "local") {
						//http://35.154.48.120:8080/oxynew/
						var getStatUrl =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					}

					$.ajax({
						url: getStatUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template =
								document.getElementById("loanListingsTpl").innerHTML;
							//console.log(template);
							Mustache.parse(template);
							//var html = Mustache.render(template, data);
							var html = Mustache.to_html(template, {
								data: data.results,
							});

							//alert(html);
							$("#loadBorrowersListings").html(html);
							$(".oxyScore-00").html("YTR");
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadLendersListings() {
	//alert(2);
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	//alert(sprimaryType);
	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (primaryType == "BORROWER") {
		var fieldValueforSearch = "LENDER";
	} else {
		var fieldValueforSearch = "BORROWER";
	}
	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userPrimaryType",
				fieldValue: fieldValueforSearch,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.status",
				fieldValue: "ACTIVE",
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
				fieldName: "user.emailVerified",
				fieldValue: "true",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 3,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};

	//var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : 1,"pageSize" : 3}};
	var postData = JSON.stringify(postData);
	//console.log(postData);
	//alert(1);

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			// console.log(totalEntries);
			//alert(totalEntries);
			var template = document.getElementById("loanListiongsTpl").innerHTML;

			Mustache.parse(template);

			var html = Mustache.to_html(template, { data: data.results });

			//alert(html);
			$("#loadLendersListings").html(html);
			var displayPageNo = totalEntries / 3;
			displayPageNo = displayPageNo + 1;
			$(".dashBoardPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					if (primaryType == "BORROWER") {
						var fieldValueforSearch = "LENDER";
					} else {
						var fieldValueforSearch = "BORROWER";
					}
					//alert(fieldValueforSearch);

					var postData = {
						leftOperand: {
							leftOperand: {
								fieldName: "userPrimaryType",
								fieldValue: fieldValueforSearch,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "user.status",
								fieldValue: "ACTIVE",
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
								fieldName: "user.emailVerified",
								fieldValue: "true",
								operator: "EQUALS",
							},
						},
						page: {
							pageNo: num,
							pageSize: 3,
						},
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};

					// var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo":num,"pageSize":3}};
					var postData = JSON.stringify(postData);
					console.log(postData);
					//alert(1);

					if (userisIn == "local") {
						//http://35.154.48.120:8080/oxynew/
						var getStatUrl =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					}
					//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
					$.ajax({
						url: getStatUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template =
								document.getElementById("loanListiongsTpl").innerHTML;
							//console.log(template);
							Mustache.parse(template);
							//var html = Mustache.render(template, data);
							var html = Mustache.to_html(template, {
								data: data.results,
							});

							//alert(html);
							$("#loadLendersListings").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadloanListings() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	userUtm = getCookie("userUtmRequest");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (primaryType == "LENDER") {
		var fieldValueUser = "BORROWER";
	} else {
		var fieldValueUser = "LENDER";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userPrimaryType",
				fieldValue: fieldValueUser,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: userUtm,
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

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.results.length == 0 || data.results.length == null) {
				$(".no_LoanListing").show();
			} else {
				totalEntries = data.totalCount;
				var template = document.getElementById("loanListiongsTpl").innerHTML;
				//console.log(template);
				Mustache.parse(template);
				//var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				//alert(html);
				$(".oxyScore-00").html("YTR");
				$("#loadloanListings").html(html);

				var displayPageNo = totalEntries / 9;
				displayPageNo = displayPageNo + 1;
				$(".borrowerLoanListingsPagination")
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						if (primaryType == "LENDER") {
							var fieldValueUser = "BORROWER";
						} else {
							var fieldValueUser = "LENDER";
						}

						var postData = {
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: fieldValueUser,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.urchinTrackingModule",
									fieldValue: userUtm,
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

						//var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 9}};
						var postData = JSON.stringify(postData);
						console.log(postData);
						//alert(1);

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var getStatUrl =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var getStatUrl =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						}

						
						$.ajax({
							url: getStatUrl,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
					

								totalEntries = data.totalCount;
								console.log(totalEntries);
								var template =
									document.getElementById("loanListiongsTpl").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								
								$("#loadloanListings").html(html);
								$(".oxyScore-00").html("YTR");
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

function loadborrowerloanListings() {
	//alert(1);
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	userUtm = getCookie("userUtmRequest");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (primaryType == "LENDER") {
		var fieldValueUser = "BORROWER";
	} else {
		var fieldValueUser = "LENDER";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userPrimaryType",
				fieldValue: fieldValueUser,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.urchinTrackingModule",
				fieldValue: userUtm,
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

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.results.length == 0 || data.results.length == null) {
				$(".no_LoanListing").show();
			} else {
				totalEntries = data.totalCount;
				console.log(totalEntries);
				var template = document.getElementById("loanListiongsTpl").innerHTML;
				//console.log(template);
				Mustache.parse(template);
				//var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				//alert(html);
				$("#loadborrowerloanListings").html(html);

				var displayPageNo = totalEntries / 9;
				displayPageNo = displayPageNo + 1;
				$(".oxyScore-00").html("YTR");
				$(".lenderLoanListingsPagination")
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						if (primaryType == "LENDER") {
							var fieldValueUser = "BORROWER";
						} else {
							var fieldValueUser = "LENDER";
						}

						var postData = {
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: fieldValueUser,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.urchinTrackingModule",
									fieldValue: userUtm,
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
						// var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 9}};
						var postData = JSON.stringify(postData);
						console.log(postData);
						//alert(1);

						if (userisIn == "local") {
							var getStatUrl =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						} else {
							var getStatUrl =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						}

						$.ajax({
							url: getStatUrl,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("loanListiongsTpl").innerHTML;
								//console.log(template);
								Mustache.parse(template);
								//var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								//alert(html);
								$("#loadborrowerloanListings").html(html);
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

function readPAN(input) {
	console.log(input);
	$(".loadingSec").show();

	const saccessToken = getCookie("saccessToken");

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(".panUpload .image-upload-wrap").hide();

			$(".panUpload .file-upload-image").attr("src", e.target.result);
			$(".panUpload .file-upload-content").show();
			// $('.panUpload .file-upload-image').attr('href', e.target.result);

			$(".panUpload .image-title").html(input.files[0].name);
		};

		reader.readAsDataURL(input.files[0]);
		var fd = new FormData();
		var files = input.files[0];
		
		fd.append("PAN", files);
		var actionURL = $("#userKYCUpload").attr("action");

		$.ajax({
			url: actionURL,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#modal-fileUploadedSuccessfully").modal("show");
					$(".loadingSec").hide();
					var myfile = $("#pan").val();
					var filename = myfile.split("\\").pop();
					
					if (filename != "" && filename != undefined) {
						filename = downloadIcon + filename;
					}
					//Changes by livin mandeva
					$(".pancard").html(filename);
				} else {
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
				$(".loadingSec").hide();

				if (arguments[0].responseJSON.errorCode == 130) {
					$(".modal-body .notupdate,.modal-body-profil .notupdate").html(
						arguments[0].responseJSON.errorMessage
					);
					$("#modal-profile-not-update").modal("show");
				} else {
					alert("file not uploaded");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

function readPAYSLIPS(input) {
	$(".loadingSec").show();

	const saccessToken = getCookie("saccessToken");
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(".payslipsUpload .image-upload-wrap").hide();

			$(".payslipsUpload .file-upload-image").attr("src", e.target.result);
			$(".payslipsUpload .file-upload-content").show();

			$(".payslipsUpload .image-title").html(input.files[0].name);
		};
		reader.readAsDataURL(input.files[0]);
		var fd = new FormData();
		var files = input.files[0];
		fd.append("PAYSLIPS", files);
		console.log(fd);
		var actionURL = $("#userKYCUpload").attr("action");
		
		console.log(fd);
		$.ajax({
			url: actionURL,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#modal-fileUploadedSuccessfully").modal("show");
					$(".loadingSec").hide();
					var myfile = $("#payslips").val();
					var filename = myfile.split("\\").pop();
					//Changes by livin mandeva Starts
					if (filename != "" && filename != undefined) {
						filename = downloadIcon + filename;
					}

					$(".Payslipsdoc").html(filename);
				} else {
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				// alert("file not uploaded");

				$(".loadingSec").hide();
				$(".modal-body .notupdate,.modal-body-profil .notupdate").html(
					arguments[0].responseJSON.errorMessage
				);
				if (arguments[0].responseJSON.errorCode == 130) {
					$("#modal-profile-not-update").modal("show");
				} else {
					alert("file not uploaded");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

function readBankStatement(input) {

   $(".loadingSec").show();
	const saccessToken = getCookie("saccessToken");
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$(".bsUpload .image-upload-wrap").hide();

			$(".bsUpload .file-upload-image").attr(
				"src",
				"http://182.18.139.198/FEOxyLoans/assets/images/pdf.png"
			);
			$(".bsUpload .file-upload-content").show();

			$(".bsUpload .image-title").html(input.files[0].name);
		};

		reader.readAsDataURL(input.files[0]);

		var fd = new FormData();
		var files = input.files[0];
		fd.append("BANKSTATEMENT", files);
		// alert(fd);
		var actionURL = $("#userKYCUpload").attr("action");
		

		$.ajax({
			url: actionURL,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#modal-fileUploadedSuccessfully").modal("show");
					$(".loadingSec").hide();
					//location.reload();
					var myfile = $("#bankSatatementdoc").val();
					var filename = myfile.split("\\").pop();
					//Changes by livin mandeva Starts
					if (filename != "" && filename != undefined) {
						filename = downloadIcon + filename;
					}
					//Changes by livin mandeva Ends
					$(".bankSatatement").html(filename);
				} else {
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
				$(".loadingSec").hide();
				$(".modal-body .notupdate,.modal-body-profil .notupdate").html(
					arguments[0].responseJSON.errorMessage
				);
				if (arguments[0].responseJSON.errorCode == 130) {
					$("#modal-profile-not-update").modal("show");
				} else {
					alert("file not uploaded");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

function readDocument(input, fileUpload, fileUploadUi) {
	const saccessToken = getCookie("saccessToken");

	$(".loadingSec").show();
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$("." + fileUploadUi + "Upload .image-upload-wrap").hide();

			$("." + fileUploadUi + "Upload .file-upload-image").attr(
				"src",
				e.target.result
			);

			$("." + fileUploadUi + "Upload .file-upload-content").show();

			$("." + fileUploadUi + "Upload .image-title").html(input.files[0].name);
		};
		reader.readAsDataURL(input.files[0]);
		var fd = new FormData();
		var files = input.files[0];
		fd.append(fileUpload, files);
		console.log(fd);
		var actionURL = $("#userKYCUpload").attr("action");
		console.log(fd);
		$.ajax({
			url: actionURL,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#modal-fileUploadedSuccessfully").modal("show");
					$(".loadingSec").hide();
					//location.reload();
					var myfile = $("#voterid").val();
					var filename = myfile.split("\\").pop();
					//Changes by livin mandeva Starts
					if (filename != "" && filename != undefined) {
						filename = downloadIcon + filename;
					}
					//Changes by livin mandeva Ends
					$(".voteridDoc").html(filename);

					var myfile = $("#drivinglicence").val();
					var filename1 = myfile.split("\\").pop();
					//Changes by livin mandeva Starts
					if (filename1 != "" && filename1 != undefined) {
						filename1 = downloadIcon + filename1;
					}
					//Changes by livin mandeva Ends
					$(".DrivingLicenseDoc").html(filename1);

					var myfile = $("#aadhar").val();
					var filename2 = myfile.split("\\").pop();
					//Changes by livin mandeva Starts
					if (filename2 != "" && filename2 != undefined) {
						filename2 = downloadIcon + filename2;
					}
					$(".Aadhardoc").html(downloadIcon + filename2);
					// $(".Aadhardoc").html(filename2);
					//Changes by livin mandeva Ends
				} else {
					// alert("file not uploaded");
					$(".loadingSec").hide();
					$(".modal-body .notupdate,.modal-body-profil .notupdate").html(
						arguments[0].responseJSON.errorMessage
					);
					if (arguments[0].responseJSON.errorCode == 130) {
						$("#modal-profile-not-update").modal("show");
					} else {
						alert("file not uploaded");
					}
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				alert("file not uploaded");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

function readPASSPORT(input) {
	$(".loadingSec").show();

	const saccessToken = getCookie("saccessToken");
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(".passportUpload .image-upload-wrap").hide();

			$(".passportUpload .file-upload-image").attr("src", e.target.result);
			$(".passportUpload .file-upload-content").show();

			$(".passportUpload .image-title").html(input.files[0].name);
		};

		reader.readAsDataURL(input.files[0]);

		var fd = new FormData();
		var files = input.files[0];
		fd.append("PASSPORT", files);
		console.log(fd);
		var actionURL = $("#userKYCUpload").attr("action");
		//alert(actionURL);
		console.log(fd);
		$.ajax({
			url: actionURL,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#modal-fileUploadedSuccessfully").modal("show");
					$(".loadingSec").hide();
					// location.reload();
					var myfile = $("#passport").val();
					var filename = myfile.split("\\").pop();
					//Changes by livin mandeva Starts
					if (filename != "" && filename != undefined) {
						filename = downloadIcon + filename;
					}
					//Chnages by livin mandeva Ends
					$(".Passportdoc").html(filename);
				} else {
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				// alert("file not uploaded");

				$(".loadingSec").hide();
				$(".modal-body .notupdate,.modal-body-profil .notupdate").html(
					arguments[0].responseJSON.errorMessage
				);
				if (arguments[0].responseJSON.errorCode == 130) {
					$("#modal-profile-not-update").modal("show");
				} else {
					alert("file not uploaded");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

function chequeLeafs(input) {
	$(".loadingSec").show();

	const saccessToken = getCookie("saccessToken");
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(".passportUpload .image-upload-wrap").hide();

			$(".passportUpload .file-upload-image").attr("src", e.target.result);
			$(".passportUpload .file-upload-content").show();

			$(".passportUpload .image-title").html(input.files[0].name);
		};

		reader.readAsDataURL(input.files[0]);

		var fd = new FormData();
		var files = input.files[0];
		fd.append("CHEQUELEAF", files);
		console.log(fd);
		var actionURL = $("#userKYCUpload").attr("action");
		console.log(fd);
		$.ajax({
			url: actionURL,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#modal-fileUploadedSuccessfully").modal("show");
					$(".loadingSec").hide();
					// location.reload();
					var myfile = $("#cheque").val();
					var filename = myfile.split("\\").pop();
					//Changes by livin mandeva Starts
					if (filename != "" && filename != undefined) {
						filename = downloadIcon + filename;
					}

					$(".chequeleaf").html(filename);
				} else {
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				$(".loadingSec").hide();
				$(".modal-body .notupdate,.modal-body-profil .notupdate").html(
					arguments[0].responseJSON.errorMessage
				);
				if (arguments[0].responseJSON.errorCode == 130) {
					$("#modal-profile-not-update").modal("show");
				} else {
					alert("file not uploaded");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

function removeUpload(fromclass) {
	const saccessToken = getCookie("saccessToken");
	//var fromclass = $(this).attr("id");
	//alert(fromclass);
	$("." + fromclass + " .file-upload-input").replaceWith(
		$("." + fromclass + " .file-upload-input").clone()
	);
	$("." + fromclass + " .file-upload-content").hide();
	$("." + fromclass + " .image-upload-wrap").show();
}

$(".image-upload-wrap").bind("dragover", function () {
	$(".image-upload-wrap").addClass("image-dropping");
});

$(".image-upload-wrap").bind("dragleave", function () {
	$(".image-upload-wrap").removeClass("image-dropping");
});

$(".uploadKYC").click(function () {
	//alert(1);
	// Get form
	var form = $("#fileUploadForm")[0];

	// Create an FormData object
	var data = new FormData(form);

	// If you want to add an extra field for the FormData
	//data.append("CustomField", "This is some extra data, testing");
	//$('.uploadAllFilesAdded').prop("disabled", true);

	//alert(data);

	var panUpload = $(".panFileUpload").val();
	//alert(panUpload);

	var aadharUpload = $(".aadharFileUpload").val();
	//  alert(aadharUpload);

	var passportUpload = $(".passportFileUpload").val();
	// alert(passportUpload);
	// var file = panUpload.files[0];
	// var formData = new FormData();
	// formData.append('file', file)
});

function setKYCvars() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var formUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/upload/kyc";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var formUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/upload/kyc";
	}
	//var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/kyc";
	$("#userKYCUpload").attr("action", formUrl);
}

function setProfilePicURL() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var formUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/upload/uploadProfilePic";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var formUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/upload/uploadProfilePic";
	}

	// var formUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/upload/uploadProfilePic";
	$("#userPICUpload").attr("action", formUrl);
}

function viewDoc(doctype) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var doctype = doctype;

	if (userisIn == "local") {
		var getPAN =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/" +
			doctype;
	} else {
		var getPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/" +
			doctype;
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
				if (sourcePath.indexOf(contentTypeCheck) != -1) {
					window.open(data.downloadUrl, "_blank");
				} else {
					$.colorbox({ href: data.downloadUrl });
				}
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			alert("Something Went Wrong");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function getKYC() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getPAN =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/PAN";
		var getPASSPORT =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/PASSPORT";
		var getAADHAR =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/AADHAR";
		var getBANKSTATEMENT =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/BANKSTATEMENT";
		var getPAYSLIPS =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/PAYSLIPS";
		var getVOTERID =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/VOTERID";
		var getDRIVINGLICENCE =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/DRIVINGLICENCE";
		var getChequeLeaf =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/CHEQUELEAF";
		var COMPANYPAN =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/COMPANYPAN";
		var MEMORANDUMOFASSOCIATION =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/MEMORANDUMOFASSOCIATION";
		var CERTIFICATEOFINSURANCE =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/CERTIFICATEOFINSURANCE";
		var GST =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/GST";
		var TAN =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/TAN";
		var COMPANYBANKSTMT =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/COMPANYBANKSTMT";
		var AOI =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/AOI";

		var TENTH =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/TENTH";

		var INTER =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/INTER";

		var GRADUATION =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/GRADUATION";

		var UNIVERSITYOFFERLETTER =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/UNIVERSITYOFFERLETTER";

		var FEE =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/FEE";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/PAN";
		var getPASSPORT =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/PASSPORT";
		var getAADHAR =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/AADHAR";
		var getBANKSTATEMENT =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/BANKSTATEMENT";
		var getPAYSLIPS =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/PAYSLIPS";
		var getVOTERID =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/VOTERID";
		var getDRIVINGLICENCE =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/DRIVINGLICENCE";

		var getChequeLeaf =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/CHEQUELEAF";
		var COMPANYPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/COMPANYPAN";
		var MEMORANDUMOFASSOCIATION =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/MEMORANDUMOFASSOCIATION";
		var CERTIFICATEOFINSURANCE =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/CERTIFICATEOFINSURANCE";
		var GST =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/GST";
		var TAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/TAN";
		var COMPANYBANKSTMT =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/COMPANYBANKSTMT";
		var AOI =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/AOI";

		var TENTH =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/TENTH";
		var INTER =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/INTER";
		var GRADUATION =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/GRADUATION";
		var UNIVERSITYOFFERLETTER =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/UNIVERSITYOFFERLETTER";
		var FEE =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/FEE";
	}

	$.ajax({
		url: getPAN,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".pancard").html(downloadIcon + data.fileName);
				//Changes by livin mandeva Ends
				$(".pan-image-upload-wrap, .pan-uploadedButton").hide();
				$(".pan-file-upload-content").show();
				$(".panImage").attr("src", data.downloadUrl);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: getPASSPORT,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".Passportdoc").html(downloadIcon + data.fileName);
				//Changes by livin mandeva Starts
				$(".passport-image-upload-wrap, .passport-uploadedButton").hide();
				$(".passport-file-upload-content").show();
				$(".passportImage").attr("src", data.downloadUrl);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: getAADHAR,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".Aadhardoc").html(downloadIcon + data.fileName);
				//Changes by livin mandeva Ends
				$(".aadhar-image-upload-wrap, .aadhar-uploadedButton").hide();
				$(".aadhar-file-upload-content").show();
				$(".aadharImage").attr("src", data.downloadUrl);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: getBANKSTATEMENT,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".bankSatatement").html(downloadIcon + data.fileName);
				//Changes by livin mandeva Ends
				// window.open(data.downloadUrl,'_blank');
				$(".bs-image-upload-wrap, .bs-uploadedButton").hide();
				$(".bs-file-upload-content").show();
				$(".bsImage").attr(
					"src",
					"http://182.18.139.198/FEOxyLoans/assets/images/pdf.png"
				);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: getPAYSLIPS,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".Payslipsdoc").html(downloadIcon + data.fileName);
				//Changes by livin mandeva Ends
				$(".payslips-image-upload-wrap, .payslips-uploadedButton").hide();

				$(".payslips-file-upload-content").show();
				$(".payslipsImage").attr("src", data.downloadUrl);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: getVOTERID,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".voteridDoc").html(downloadIcon + data.fileName);
				////Changes by livin mandeva Ends
				$(".voterid-image-upload-wrap, .voterid-uploadedButton").hide();
				$(".voterid-file-upload-content").show();
				$(".voteridImage").attr("src", data.downloadUrl);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: getDRIVINGLICENCE,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".DrivingLicenseDoc").html(downloadIcon + data.fileName);
				//Changes by livin mandeva Ends
				$(
					".drivinglicence-image-upload-wrap, .drivinglicence-uploadedButton"
				).hide();
				$(".drivinglicence-file-upload-content").show();
				$(".drivinglicenceImage").attr("src", data.downloadUrl);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: getChequeLeaf,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".chequeleaf").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$.ajax({
		url: COMPANYPAN,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".companypancard").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$.ajax({
		url: MEMORANDUMOFASSOCIATION,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".mmassociation").html(downloadIcon + data.fileName);
				//Changes by livin mandeva Ends
				// $(
				// 	".drivinglicence-image-upload-wrap, .drivinglicence-uploadedButton"
				// ).hide();
				// $(".drivinglicence-file-upload-content").show();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$.ajax({
		url: CERTIFICATEOFINSURANCE,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				$(".certificateInsurance").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$.ajax({
		url: GST,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".gst").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$.ajax({
		url: TAN,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				$(".tan").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$.ajax({
		url: COMPANYBANKSTMT,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".companyBankStatement").html(downloadIcon + data.fileName);
				//Changes by livin mandeva Ends
				// $(
				// 	".drivinglicence-image-upload-wrap, .drivinglicence-uploadedButton"
				// ).hide();
				// $(".drivinglicence-file-upload-content").show();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$.ajax({
		url: AOI,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".aoi").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: TENTH,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".tenthdoc").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: INTER,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".interdoc").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: GRADUATION,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".graduationdoc").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: UNIVERSITYOFFERLETTER,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".universityofferletterdoc").html(downloadIcon + data.fileName);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$.ajax({
		url: FEE,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//Changes by livin mandeva Starts
				$(".feedoc").html(downloadIcon + data.fileName);
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

function loadviewLoanofferfromnewAPI() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (primaryType == "LENDER") {
		var fieldValueforSearch = "BORROWER";
	} else {
		var fieldValueforSearch = "LENDER";
	}

	$(".loadingSec").hide();
	var loanRequestId = $(".requestidFromClick").html();
	var requestPageNo = $(".requestPageNo").html();
	var requestorderNo = $(".requestorderNo").html();
	console.log(loanRequestId + " , " + requestPageNo + " , " + requestorderNo);

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "userPrimaryType",
				fieldValue: fieldValueforSearch,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.status",
				fieldValue: "ACTIVE",
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
				fieldName: "user.emailVerified",
				fieldValue: "true",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: requestPageNo,
			pageSize: 1,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};
	var postData = JSON.stringify(postData);
	console.log(postData);
	// var getLoanDetails = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getLoanDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getLoanDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			var totalComm = data.commitmentAmount - data.amountDisbursed;
			//alert(totalComm);
			//alert(data.amountDisbursed);

			requesterdBalanec = totalComm;
			whatlenderhas = requesterdBalanec;
			//alert(whatlenderhas);

			//alert(requesterdBalanec);
			//$('.balAmountDisplay').attr("totalRequestedAmount", requesterdBalanec);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});

	$(".loadingSec").hide();
}

function loadviewLoanoffer() {
	//alert("in loadviewLoanoffer");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	userId = suserId;
	primaryType = sprimaryType;
	saccessToken = saccessToken;

	var loanRequestId = $(".requestidFromClick").html();
	//alert(loanRequestId);
	//var getStatUrl = "http://localhost:8181/v1/user/"+userId+"/loan/"+primaryType+"/request/"+loanRequestId;

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/" +
			loanRequestId;
	} else {
		// http://localhost:8181/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/" +
			loanRequestId;
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			console.log("Success Call");

			$(".loanPurposeDisplay").html(data.loanOfferedAmount);
			$(".toImLending").html(data.user.firstName + " " + data.user.lastName);

			$(".loanRequestedDateDisplay").html(data.loanRequestedDate);

			//$(".balAmountDisplay").html(data.loanRequestAmount - data.loanDisbursedAmount);

			//loanDisbursedAmount

			$(".offeredAmountByAdmin").html(data.loanOfferedAmount);
			$(".loanRequestAmountDisplay").html(data.loanRequestAmount);
			$(".loanRequestDisplay").html(data.loanRequest);

			$(".loanPurpose").html(data.loanPurpose);
			$(".borrowerCity").html(data.user.city);
			$(".borrowerSalary").html(data.user.salary);
			$(".permanent").html(data.user.city);

			$(".designation").html(data.designation);
			$(".placeUserIDHere").attr("data-userID", data.userId);
			$(".disbursedAmount").html(data.loanOfferedAmount);
			if (sprimaryType == "LENDER") {
				$(
					".rateOfInterest option[value=" +
						data.user.commentsRequestDto.rateOfInterestToLender +
						"]"
				).attr("selected", "selected");

				$(".rateOfInterest").prop("disabled", true);

				//$('.uploadAllFilesAdded').prop("disabled", true);
				$("#expectedDate").val(data.loanRequestedDate);

				$(
					".durationValue option[value=" +
						data.user.commentsRequestDto.durationToTheApplication +
						"]"
				).attr("selected", "selected");
				$(".durationValue").prop("disabled", true);

				var $radios = $("input:radio[name=repaymentMethod]");
				if ($radios.is(":checked") === false) {
					$radios
						.filter(
							"[value=" +
								data.user.commentsRequestDto.repaymentMethodForLender +
								"]"
						)
						.prop("checked", true);
					$radios.prop("disabled", true);
				}

				var $radio = $("input:radio[name=Durationtype]");
				if ($radio.is(":checked") === false) {
					$radio
						.filter("[value=" + data.user.commentsRequestDto.durationType + "]")
						.prop("checked", true);
					$radio.prop("disabled", true);
				}

				$("#loanPurpose").val(data.loanPurpose);
				if (data.loanDisbursedAmount >= data.loanOfferedAmount) {
					// alert("yes");
					$(".lenderSendingOffer").remove();
				}
				$(".rateOfInterestDisplay").html(
					data.user.commentsRequestDto.rateOfInterestToLender
				);

				if (data.user.commentsRequestDto.durationType == "Months") {
					$(".valuedisplay").html("% PA");
				} else {
					$(".valuedisplay").html("% PA");
				}
				$(".durationDisplay").html(
					data.user.commentsRequestDto.durationToTheApplication
				);
				$(".Duration").html(data.user.commentsRequestDto.durationType);
				if (data.user.commentsRequestDto.repaymentMethodForLender == "PI") {
					$(".repaymentMethodDisplay").html("Principal Interest Flat");
				} else {
					$(".repaymentMethodDisplay").html("Interest");
				}
				if (data.user.riskProfileDto.grade == "A") {
					$(".borrowerRiskCat").html("Low Risk");
				} else if (data.user.riskProfileDto.grade == "B") {
					$(".borrowerRiskCat").html("Medium Risk");
				} else if (data.user.riskProfileDto.grade == "C") {
					$(".borrowerRiskCat").html("High Risk");
				} else {
					$(".borrowerRiskCat").html("High Risk");
				}
				$(".borrowerRiskCat").html(data.user.riskProfileDto.grade);
			} else {
				$(
					".rateOfInterest option[value=" +
						data.commentsRequestDto.rateOfInterestToBorrower +
						"]"
				).attr("selected", "selected");

				$(".rateOfInterest").prop("disabled", true);

				//$('.uploadAllFilesAdded').prop("disabled", true);
				$("#expectedDate").val(data.loanRequestedDate);

				$(
					".durationValue option[value=" +
						data.commentsRequestDto.durationToTheApplication +
						"]"
				).attr("selected", "selected");
				$(".durationValue").prop("disabled", true);

				var $radios = $("input:radio[name=repaymentMethod]");
				if ($radios.is(":checked") === false) {
					$radios
						.filter(
							"[value=" +
								data.commentsRequestDto.repaymentMethodForBorrower +
								"]"
						)
						.prop("checked", true);
					$radios.prop("disabled", true);
				}

				var $radio = $("input:radio[name=Durationtype]");
				if ($radio.is(":checked") === false) {
					$radio
						.filter("[value=" + data.commentsRequestDto.durationType + "]")
						.prop("checked", true);
					$radio.prop("disabled", true);
				}

				$("#loanPurpose").val(data.loanPurpose);
				if (data.loanDisbursedAmount >= data.loanOfferedAmount) {
					// alert("yes");
					$(".lenderSendingOffer").remove();
				}

				$(".rateOfInterestDisplay").html(
					data.commentsRequestDto.rateOfInterestToBorrower
				);

				if (data.commentsRequestDto.durationType == "Months") {
					$(".valuedisplay").html("% PA");
				} else {
					$(".valuedisplay").html("Per day");
				}

				$(".durationDisplay").html(
					data.commentsRequestDto.durationToTheApplication
				);
				$(".Duration").html(data.commentsRequestDto.durationType);

				if (data.commentsRequestDto.repaymentMethodForBorrower == "PI") {
					$(".repaymentMethodDisplay").html("Principal Interest Flat");
				} else {
					$(".repaymentMethodDisplay").html("Interest");
				}
			}
			// End BorrowerCommentsDeatils

			//loanDisbursedAmounti

			//alert(data.loanDisbursedAmount);"permanent_city"
			// $('.disbursedAmount').html(data.activeLoansAmount);

			if (data.loanRequestAmount > loanMaxAmount) {
				console.log(212);
				$(".balAmountDisplay").html(
					data.loanRequestAmount - data.loanDisbursedAmount
				);
				$(".loanRequestAmount").html("50000");
			} else if (requesterdBalanec >= data.loanRequestAmount) {
				console.log(2);
				var ansforconsole2 = data.loanRequestAmount - data.loanDisbursedAmount;
				console.log("requesterdBalanec" + requesterdBalanec);
				if (ansforconsole2 < 0) {
					$(".balAmountDisplay").html(0);
				} else {
					$(".balAmountDisplay").html(ansforconsole2);
				}
			} else if (
				requesterdBalanec == 0 ||
				requesterdBalanec < data.loanRequestAmount
			) {
				$(".balAmountDisplay").hide();
				if (sprimaryType == "LENDER") {
					$(".displaySuggetionMessageBorrower").html(
						"You don't have suffecient commitment, please add a loan offer."
					);
				} else {
					$(".displaySuggetionMessageBorrower").html(
						"You don't have suffecient requested amount, please raise a loan request."
					);
				}
			}
			userRequiredAmount = data.loanRequestAmount - loanMaxAmount;
			borrowerWants = data.loanRequestAmount;
			//alert(requesterdBalanec);

			//Displaying in the form
			var reqamt = data.loanOfferedAmount - data.loanDisbursedAmount;
			//alert(data.loanRequestAmount +" "+ data.loanDisbursedAmount);
			//alert(reqamt);

			if (primaryType == "LENDER") {
				if (reqamt > loanMaxAmount) {
					$("#loanRequestAmount").val("50000");
				} else {
					$("#loanRequestAmount").val(reqamt);
				}
			} else {
				if (reqamt > loanMaxAmount) {
					setTimeout(function () {
						$("#loanRequestAmount").val("50000");
					}, 1000);
				} else {
					// alert(loanMaxAmount +" "+ reqamt);
					$("#loanRequestAmount").val(reqamt);
				}
			}
			$(".borrowerComments").html(data.borrowerCommentsDetails.comments);
			$(".BorrowerLocation").html(data.borrowerCommentsDetails.location);
			$(".BorrowerResidence").html(
				data.borrowerCommentsDetails.locationResidence
			);
			$(".borrowerCompany").html(data.borrowerCommentsDetails.companyName);
			$(".CompanyResidence").html(
				data.borrowerCommentsDetails.companyResidence
			);
			$(".Role").html(data.borrowerCommentsDetails.role);
			$(".BankPassword").html(data.borrowerCommentsDetails.bankPassword);
			$(".LoanRequirement").html(data.borrowerCommentsDetails.loanRequiremen);
			$(".CurrentEmi").html(data.borrowerCommentsDetails.emi);
			$(".Salary").html(data.borrowerCommentsDetails.salary);
			$(".Eligibility").html(data.borrowerCommentsDetails.eligibility);
			$(".AadharPassword").html(data.borrowerCommentsDetails.aadharPassword);
			$(".PayslipsPassword").html(
				data.borrowerCommentsDetails.payslipsPassword
			);
			$(".PanPassword").html(data.borrowerCommentsDetails.panPassword);
			$(".panA").attr("href", data.borrowerKycDocuments[0].downloadUrl);
			$(".aadharA").attr("href", data.borrowerKycDocuments[3].downloadUrl);
			$(".payslipA").attr("href", data.borrowerKycDocuments[1].downloadUrl);
			$(".bankStatementA").attr(
				"href",
				data.borrowerKycDocuments[2].downloadUrl
			);
			$(".RatingRadha").val(data.ratingByRadhaSir);
			$(".LenderRating").val(data.lendersRatingValue);
			$(".commentsByRadha").html(data.commentsByRadhaSir);
			SetRatingStar1();
			SetRatingStar2();
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$(".loadingSec").hide();
}

function loadresponserequest() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (primaryType == "LENDER") {
		var fieldValueforSearch = "LENDER";
	} else {
		var fieldValueforSearch = "BORROWER";
	}
	//alert(fieldValueforSearch);
	var postData = {
		leftOperand: {
			fieldName: "parentRequestId",
			operator: "NULL",
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "userId",
			fieldValue: userId,
			operator: "EQUALS",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};
	var postData = JSON.stringify(postData);
	console.log(postData);
	//alert(1);
	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			//globalLoanID = data.results[0].loanRequestId;
			if (sprimaryType == "LENDER") {
				var lenderresponsHREF =
					"lenderresponsestoMyrequests?appNumber=" + globalLoanId;
			} else {
				var lenderresponsHREF =
					"borrowerresponsestoMyrequests?appNumber=" + globalLoanId;
			}

			$(".viewLendersOffers").attr("href", lenderresponsHREF);
			//alert(lenderresponsHREF);

			totalEntries = data.totalCount;
			var template = document.getElementById("displayallRequests").innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data.results });

			//alert(globalLoanID);
			//alert(html);
			$("#displayRequests").html(html);
			var displayPageNo = totalEntries / 5;
			displayPageNo = displayPageNo + 1;
			$(".myloanrequestPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "LENDER";
					} else {
						var fieldValueforSearch = "BORROWER";
					}
					//alert(fieldValueforSearch);
					var postData = {
						leftOperand: {
							fieldName: "parentRequestId",
							operator: "NULL",
						},
						logicalOperator: "AND",
						rightOperand: {
							fieldName: "userId",
							fieldValue: userId,
							operator: "EQUALS",
						},
						page: {
							pageNo: num,
							pageSize: 10,
						},
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};
					var postData = JSON.stringify(postData);
					1;
					console.log(postData);
					//alert(1);

					if (userisIn == "local") {
						//http://35.154.48.120:8080/oxynew/
						var getStatUrl =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					}

					// var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
					$.ajax({
						url: getStatUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template =
								document.getElementById("displayallRequests").innerHTML;
							//console.log(template);
							Mustache.parse(template);
							//var html = Mustache.render(template, data);
							var html = Mustache.to_html(template, {
								data: data.results,
							});
							//alert(html);
							$("#displayRequests").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

/****************************RESPONSE TO MY REQUEST  PAGINATION **********************/
/*setTimeout(function(){
  //alert(totalEntries);
  var displayPageNo = totalEntries/5;
  displayPageNo = displayPageNo+1;
  $('.myloanrequestPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
     suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
    if(primaryType == "LENDER"){
       var  fieldValueforSearch = "LENDER";
    }else{
       var  fieldValueforSearch = "BORROWER";
    }
    //alert(fieldValueforSearch);
  var postData = {
    "leftOperand": {
        "fieldName": "parentRequestId",
        "operator": "NULL"
    },
    "logicalOperator": "AND",
    "rightOperand": {
        "fieldName": "userId",
        "fieldValue":userId ,
        "operator": "EQUALS"
    },
    "page": {
        "pageNo": num,
        "pageSize": 10
    }
};
  var postData = JSON.stringify(postData);1
console.log(postData);
  //alert(1);
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){

        var template = document.getElementById('displayallRequests').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       //var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       //alert(html);
       $('#displayRequests').html(html);
      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  });
}, 1000);*/
/****************************RESPONSE TO MY REQUEST  PAGINATION  ENDS**********************/

function loadresponsetoMyrequest() {
	var loanRequestId = globalLoanId;
	//console.log("loanRequestId is "+ loanRequestId);
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (primaryType == "BORROWER") {
		var fieldValueforSearch = "LENDER";
	} else {
		var fieldValueforSearch = "BORROWER";
	}
	//alert(fieldValueforSearch);
	var postData = {
		leftOperand: {
			fieldName: "parentRequestId",
			fieldValue: loanRequestId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "userPrimaryType",
			fieldValue: fieldValueforSearch,
			operator: "EQUALS",
		},

		page: {
			pageNo: 1,
			pageSize: 9,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};
	var postData = JSON.stringify(postData);
	//console.log(postData);
	//alert(1);
	//alert(1);

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	// var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
	// alert(getStatUrl);
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			//console.log(data.totalCount)
			var totalCount = data.totalCount;
			if (totalCount == 0) {
				$(".displayNoRecords").show();
			} else {
				//
				var template = document.getElementById("loanListiongsTpl").innerHTML;
				//console.log(template);
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });
				$("#loadresponsetoMyrequest").html(html);
				$(".oxyScore-00").html("YTR");
				var displayPageNo = totalEntries / 9;
				$(".displayAppMessage-Closed").html("This loan is closed.");
				displayPageNo = displayPageNo + 1;
				$(".responsetomyloanrequestPagination")
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
						//$(".content4").html("Page " + num); // or some ajax content loading...
						var loanRequestId = globalLoanId;
						$(".displayNoRecords").remove();

						if (primaryType == "BORROWER") {
							var fieldValueforSearch = "LENDER";
						} else {
							var fieldValueforSearch = "BORROWER";
						}
						//alert(fieldValueforSearch);
						var postData = {
							leftOperand: {
								fieldName: "parentRequestId",
								fieldValue: loanRequestId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "userPrimaryType",
								fieldValue: fieldValueforSearch,
								operator: "EQUALS",
							},

							page: {
								pageNo: num,
								pageSize: 9,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
						var postData = JSON.stringify(postData);
						console.log(postData);
						//alert(1);

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var getStatUrl =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var getStatUrl =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						}

						//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
						// alert(getStatUrl);
						$.ajax({
							url: getStatUrl,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								//totalEntries = data.totalCount;
								console.log(data.totalCount);
								var totalCount = data.totalCount;
								if (totalCount == 0) {
									$(".displayNoRecords").show();
								} else {
									//
									var template =
										document.getElementById("loanListiongsTpl").innerHTML;
									//console.log(template);
									Mustache.parse(template);
									var html = Mustache.render(template, data);
									var html = Mustache.to_html(template, {
										data: data.results,
									});
									$("#loadresponsetoMyrequest").html(html);
								}
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
	stopLoading();
}

/****************************RESPONSE TO MY LOAN REQUEST  PAGINATION **********************/
/*setTimeout(function(){
  //alert(totalEntries);
  var displayPageNo = totalEntries/3;
  displayPageNo = displayPageNo+1;
  $('.responsetomyloanrequestPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
    var loanRequestId = $('.loanrequestIDP').html();
  suserId = getCookie("sUserId");
  sprimaryType = getCookie("sUserType");
  saccessToken = getCookie("saccessToken");

  userId = suserId;
  primaryType = sprimaryType;
  accessToken = saccessToken;
    if(primaryType == "BORROWER"){
       var  fieldValueforSearch = "LENDER";
    }else{
       var  fieldValueforSearch = "BORROWER";
    }
    //alert(fieldValueforSearch);
  var postData = {
     "leftOperand": {
        "fieldName": "parentRequestId",
        "fieldValue":loanRequestId,
        "operator": "EQUALS"
    },
    "logicalOperator": "AND",
     "rightOperand": {
        "fieldName": "userPrimaryType",
        "fieldValue": fieldValueforSearch,
        "operator": "EQUALS"
    },

    "page": {
        "pageNo": num,
        "pageSize": 3
    }

};
  var postData = JSON.stringify(postData);
console.log(postData);
  //alert(1);
   var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
  // alert(getStatUrl);
    $.ajax({
      url:getStatUrl,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){

       //totalEntries = data.totalCount;
        console.log(data.totalCount)
        var totalCount = data.totalCount;
       if(totalCount == 0 ){
          $('.displayNoRecords').show();
        }else{
        //
        var template = document.getElementById('loanListiongsTpl').innerHTML;
       //console.log(template);
       Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});
       $('#loadresponsetoMyrequest').html(html);
      }
    },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  });
}, 1000);*/
/****************************RESPONSE TO MY LOAN REQUEST  PAGINATION  ENDS**********************/

function respondToLoanRequest(type) {
	$(".thisisYESbtn").hide();
	$(".thisisYESbtnajaxImg").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var id = $(".postreqID").attr("data-reqID");
	var type = $(".postreqID").attr("data-type");
	//$(".loadingSec").show();
	//alert(type);

	// /{userId}/loan/{primaryType}/request/{loanRequestId}/{action}
	//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/"+id+"/"+type;

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/" +
			id +
			"/" +
			type;
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/" +
			id +
			"/" +
			type;
	}
	$(".loadingSec").show();
	$(".postreqID" + id).hide();
	$(".loadingSec").show();
	//return false;
	$.ajax({
		url: actOnLoan,
		type: "PATCH",
		success: function (data, textStatus, xhr) {
			$("#promptAccUser").modal("hide");
			$(".entrieBlock-" + id + " .userReacted").hide();
			$(".entrieBlock-" + id + " .loanStatus-sec").show();
			$(".entrieBlock-" + id + " .loanStatus-sec").html(
				"You've " + type + " this request."
			);
			$("#modal-displaySuggetion").modal("show");

			setTimeout(function () {
				location.reload();
			}, 15000);
			// Your response will be sent to the lender.
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");

			$(".modal-body #text").html(arguments[0].responseJSON.errorMessage);

			if (arguments[0].responseJSON.errorCode == 110) {
				$("#promptAccUser").modal("hide");
				$("#modal-loanAmountlimit").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadaddressDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/address";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/address";
	}

	//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/address";
	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			$("#address1-edit-btn, #address2-edit-btn, #address3-edit-btn").hide();
			//alert(data);
			if (data == "") {
				$("#address1-edit-btn, #address2-edit-btn, #address3-edit-btn").hide();
			} else if (data != "") {
				for (i = 0; i < data.length; i++) {
					// alert(data[i]);
					if (data[i].type == "PERMANENT") {
						$(
							"#address1-submit-btn, .permanent_housenumberValue, .permanent_areaValue, .permanent_streetValue, .permanent_cityValue"
						).hide();
						$("#address1-edit-btn").show();
						$(".permanent_housenumberValue").val(data[i].houseNumber);
						$(".displaypermanentNum").html(data[i].houseNumber);

						$(".permanent_areaValue").val(data[i].area);
						$(".displaypermanentarea").html(data[i].area);

						$(".permanent_streetValue").val(data[i].street);
						$(".displaypermanentstreet").html(data[i].street);

						$(".permanent_cityValue").val(data[i].city);
						$(".displaypermanentcity").html(data[i].city);
					} else if (data[i].type == "PRESENT") {
						$(
							"#address2-submit-btn, .present_housenumberValue, .present_areaValue, .present_streetValue, .present_cityValue"
						).hide();
						$("#address2-edit-btn").show();
						$(".present_housenumberValue").val(data[i].houseNumber);
						$(".displaypresenthousenumber").html(data[i].houseNumber);

						$(".present_areaValue").val(data[i].area);
						$(".displaypresentarea").html(data[i].area);

						$(".present_streetValue").val(data[i].street);
						$(".displaypresentstreet").html(data[i].street);

						$(".present_cityValue").val(data[i].city);
						$(".displaypresentcity").html(data[i].city);
					} else if (data[i].type == "OFFICE") {
						$(
							"#address3-submit-btn, .office_housenumberValue, .office_areaValue, .office_streetValue, .office_cityValue"
						).hide();
						$("#address3-edit-btn").show();
						$(".office_housenumberValue").val(data[i].houseNumber);
						$(".displayofficehousenumber").html(data[i].houseNumber);

						$(".office_areaValue").val(data[i].area);
						$(".displayofficearea").html(data[i].area);

						$(".office_streetValue").val(data[i].street);
						$(".displayofficestreet").html(data[i].street);

						$(".office_cityValue").val(data[i].city);
						$(".displayofficecity").html(data[i].city);
					}
				}
			}
		},

		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

//ACCEPTED REQUESTS //
function loadAcceptedrequests() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	var postData = {
		leftOperand: {
			fieldName: "parentRequestId",
			operator: "NOT_NULL",
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				leftOperand: {
					fieldName: "userId",
					operator: "EQUALS",
					fieldValue: userId,
				},
				logicalOperator: "OR",
				rightOperand: {
					fieldName: "parentRequest.userId",
					fieldValue: userId,
					operator: "EQUALS",
				},
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanStatus",
				fieldValue: "Accepted",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			console.log(data.results);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 9;
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							leftOperand: {
								fieldName: "parentRequestId",
								operator: "NOT_NULL",
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									leftOperand: {
										fieldName: "userId",
										operator: "EQUALS",
										fieldValue: userId,
									},
									logicalOperator: "OR",
									rightOperand: {
										fieldName: "parentRequest.userId",
										fieldValue: userId,
										operator: "EQUALS",
									},
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "loanStatus",
									fieldValue: "Accepted",
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						// var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log(data.results);

								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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

/**************************** ACCEPTED REQUEST  PAGINATION **********************/
/*setTimeout(function(){
  //alert(totalEntries);
  var displayPageNo = totalEntries/4;
  displayPageNo = displayPageNo+1;
  $('.acceptedPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
     suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    var postData={
  "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NOT_NULL"
  },
  "logicalOperator": "AND",
  "rightOperand": {
    "leftOperand": {
      "leftOperand": {
        "fieldName": "userId",
        "operator": "EQUALS",
        "fieldValue": userId
      },
      "logicalOperator": "OR",
      "rightOperand": {
        "fieldName": "parentRequest.userId",
        "fieldValue": userId,
        "operator": "EQUALS"
      }
    },
    "logicalOperator": "AND",
    "rightOperand": {
      "fieldName": "loanStatus",
      "fieldValue": "Accepted",
      "operator": "EQUALS"
    }
  },
  "page": {
    "pageNo": num,
    "pageSize": 10
  }
}


 var postData = JSON.stringify(postData);
console.log(postData);
 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";




    $.ajax({
      url:actOnLoan,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){


        console.log(data.results);

           var template = document.getElementById('displayallRequests').innerHTML;
                     Mustache.parse(template);
           var html = Mustache.render(template, data);
           var html = Mustache.to_html(template, {data: data.results});

           $('#displayRequests').html(html);

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  });
}, 1000);*/
/****************************ACCEPTED REQUEST  PAGINATION  ENDS**********************/

//REJECTED REQUESTS //

function loadRejectedrequests() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	var postData = {
		leftOperand: {
			fieldName: "parentRequestId",
			operator: "NOT_NULL",
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				leftOperand: {
					fieldName: "userId",
					operator: "EQUALS",
					fieldValue: userId,
				},
				logicalOperator: "OR",
				rightOperand: {
					fieldName: "parentRequest.userId",
					fieldValue: userId,
					operator: "EQUALS",
				},
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanStatus",
				fieldValue: "Rejected",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);
	//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;

				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 9;
				displayPageNo = displayPageNo + 1;
				$(".rejectedPagination")
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							leftOperand: {
								fieldName: "parentRequestId",
								operator: "NOT_NULL",
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									leftOperand: {
										fieldName: "userId",
										operator: "EQUALS",
										fieldValue: userId,
									},
									logicalOperator: "OR",
									rightOperand: {
										fieldName: "parentRequest.userId",
										fieldValue: userId,
										operator: "EQUALS",
									},
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "loanStatus",
									fieldValue: "Rejected",
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayallRequests").innerHTML;

								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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

/**************************** REJECTED REQUEST  PAGINATION **********************/
/*setTimeout(function(){
 // alert(displayPageNo);
  var displayPageNo = totalEntries/2;
  displayPageNo = displayPageNo+1;
  $('.rejectedPagination').bootpag({
      total: displayPageNo,
      page: 1,
      maxVisible: 5,
      leaps: true,
      firstLastUse: true,
      first: '←',
      last: '→',
      wrapClass: 'pagination',
      activeClass: 'active',
      disabledClass: 'disabled',
      nextClass: 'next',
      prevClass: 'prev',
      lastClass: 'last',
      firstClass: 'first'
  }).on("page", function(event, num){
      //$(".content4").html("Page " + num); // or some ajax content loading...
     suserId = getCookie("sUserId");
    sprimaryType = getCookie("sUserType");
    saccessToken = getCookie("saccessToken");

    userId = suserId;
    primaryType = sprimaryType;
    accessToken = saccessToken;
    var postData={
  "leftOperand": {
    "fieldName": "parentRequestId",
    "operator": "NOT_NULL"
  },
  "logicalOperator": "AND",
  "rightOperand": {
    "leftOperand": {
      "leftOperand": {
        "fieldName": "userId",
        "operator": "EQUALS",
        "fieldValue": userId
      },
      "logicalOperator": "OR",
      "rightOperand": {
        "fieldName": "parentRequest.userId",
        "fieldValue": userId,
        "operator": "EQUALS"
      }
    },
    "logicalOperator": "AND",
    "rightOperand": {
      "fieldName": "loanStatus",
      "fieldValue": "Rejected",
      "operator": "EQUALS"
    }
  },
  "page": {
    "pageNo": num,
    "pageSize": 10
  }
}

 var postData = JSON.stringify(postData);
console.log(postData);
 var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

    $.ajax({
      url:actOnLoan,
      type:"POST",
      data:postData,
      contentType:"application/json",
      dataType:"json",
      success: function(data,textStatus,xhr){



       var template = document.getElementById('displayallRequests').innerHTML;

      Mustache.parse(template);
       var html = Mustache.render(template, data);
       var html = Mustache.to_html(template, {data: data.results});

       $('#displayRequests').html(html);

      },
      error: function(xhr,textStatus,errorThrown){
        console.log('Error Something');
      },
      beforeSend: function(xhr) {
        xhr.setRequestHeader("accessToken",saccessToken);
}
   });
  });
}, 1000);*/
/****************************REJECTED REQUEST  PAGINATION  ENDS**********************/

function loadpersonalDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	$(".displayFormElements").hide();
	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/personal/" +
			id +
			"";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/personal/" + id + "";
	}

	// var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+id+"";
	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (
				data.firstName == null &&
				data.lastName == null &&
				data.fatherName == null &&
				data.dob == null &&
				data.address == null &&
				data.nationality == null &&
				data.gender == null &&
				data.maritalStatus == null &&
				data.companyName == null &&
				data.salary == null &&
				data.middleName == null &&
				data.panNumber == null
			) {
				$(
					"#profile-submit-btn, #firstname, #lastname, #fathername,#address, .date, #nationality, .genderInfo, .maritalStatusInfo,#middlename,#companyname,#salary,#panNumber"
				).show();
				$("#profile-edit-btn").hide();
			} else if (
				data.firstName != "" &&
				data.lastName != "" &&
				data.fatherName != "" &&
				data.dob != "" &&
				data.address != "" &&
				data.nationality != "" &&
				data.gender != "" &&
				data.maritalStatus != "" &&
				data.companyName != "" &&
				data.salary != "" &&
				data.panNumber != ""
			) {
				$("#profile-edit-btn").show();
				$(
					"#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality,#address, .genderInfo, .maritalStatusInfo,#middlename,#companyname,#salary,#panNumber"
				).hide();
			} else if (data.firstName != "" && data.address == "") {
				//alert("poda");
				$("#profile-edit-btn").show();
				$(
					"#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality,#address, .genderInfo, .maritalStatusInfo,#middlename,#companyname,#salary,#panNumber"
				).hide();
			}

			$("#firstname").val(data.firstName);
			$(".displayFirstName").html(data.firstName);

			$("#lastname").val(data.lastName);
			$(".displayLastName").html(data.lastName);

			$("#middlename").val(data.middleName);
			$(".displaymiddleName").html(data.middleName);

			$("#salary").val(data.salary);
			$(".displaysalary").html(data.salary);

			$("#panNumber").val(data.panNumber);
			$(".displaypanNumber").html(data.panNumber);

			$("#companyname").val(data.companyName);
			$(".displaycompanyName").html(data.companyName);

			$("#fathername").val(data.fatherName);
			$(".displayFatherName").html(data.fatherName);

			$("#dateofbirth").val(data.dob);
			$(".displaydateofbirth").html(data.dob);

			$("#nationality").val(data.nationality);
			$(".displaynationality").html(data.nationality);

			$("#address").val(data.address);
			$(".displayaddress").html(data.address);

			var $genderRadio = $("input:radio[name=gendervalue]");
			if ($genderRadio.is(":checked") === false) {
				$genderRadio
					.filter("[value=" + data.gender + "]")
					.prop("checked", true);
			}

			if (data.gender == "M") {
				$(".displaygender").html("Male");
			} else if (data.gender == "F") {
				$(".displaygender").html("Female");
			}

			var $maritalStatusRadio = $("input:radio[name=maritalStatus]");
			if ($maritalStatusRadio.is(":checked") === false) {
				$maritalStatusRadio
					.filter("[value=" + data.maritalStatus + "]")
					.prop("checked", true);
			}

			if (data.maritalStatus == "S") {
				$(".displaymaritalStatus").html("Single");
			} else if (data.maritalStatus == "M") {
				$(".displaymaritalStatus").html("Married");
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

function loadprofessionalDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/professional/"+id+"";

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/professional/" +
			id +
			"";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/professional/" + id + "";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			//alert(data.noOfJobsChanged);
			//
			if (
				data.employment == null &&
				data.companyName == null &&
				data.description == null &&
				data.fieldOfStudy == null &&
				data.highestQualification == null &&
				data.noOfJobsChanged == null &&
				data.workExperience == null &&
				data.officeContactNumber == null &&
				data.yearOfPassing == null &&
				data.college == null
			) {
				$(
					"#myprofile-submit-btn, #employment, #companyname, #description,#designation ,  #fieldOfStudy, #highestQualification,#NoOfJobsChange,#officeContactNumber,#workExperience,.yearOfPassingValue,#college"
				).show();
				$("#myprofile-edit-btn").hide();
			} else if (data.noOfJobsChanged == 0) {
				$("#myprofile-edit-btn").show();
				$(
					"#myprofile-submit-btn, #employment, #companyname, #description,#designation , #fieldOfStudy, #highestQualification,#NoOfJobsChanged,#officeContactNumber,#workExperience,.yearOfPassingValue,#college"
				).hide();
			} else if (
				data.employment != "" &&
				data.companyName != "" &&
				data.description != "" &&
				data.fieldOfStudy != "" &&
				data.highestQualification != "" &&
				data.noOfJobsChanged != "" &&
				data.workExperience != "" &&
				data.officeContactNumber != "" &&
				data.yearOfPassing != "" &&
				data.college != ""
			) {
				$("#myprofile-edit-btn").show();
				$(
					"#myprofile-submit-btn, #employment, #companyname, #description,#designation , #fieldOfStudy, #highestQualification,#NoOfJobsChanged,#officeContactNumber,#workExperience,.yearOfPassingValue,#college"
				).hide();
			}

			$("#employment").val(data.employment);
			$(".displayemployment").html(data.employment);

			$("#companyname").val(data.companyName);
			$(".displaycompanyname").html(data.companyName);

			$("#description").val(data.description);
			$(".displaydesignation").html(data.description);

			$("#designation").val(data.designation);
			$(".displaydescription").html(data.designation);

			$("#fieldOfStudy").val(data.fieldOfStudy);
			$(".displayfieldOfStudy").html(data.fieldOfStudy);

			$("#highestQualification").val(data.highestQualification);
			$(".displayhighestQualifications").html(data.highestQualification);

			$("#NoOfJobsChanged").val(data.noOfJobsChanged);
			$(".displayNoOfJobsChanged").html(data.noOfJobsChanged);

			// $("#officeAddressId").val(data.officeAddressId);
			// $(".displayemployment").html(data.officeAddressId);

			$("#officeContactNumber").val(data.officeContactNumber);
			$(".displayofficeContactNumber").html(data.officeContactNumber);

			$("#workExperience").val(data.workExperience);
			$(".displayworkExperience").html(data.workExperience);

			$(".yearOfPassingValue").val(data.yearOfPassing);
			$(".displayyearOfPassing").html(data.yearOfPassing);

			$("#college").val(data.college);
			$(".displaycollege").html(data.college);
		},
		statusCode: {
			500: function (response) {
				$(
					"#myprofile-submit-btn, #employment, #companyname, #description,#designation ,  #fieldOfStudy, #highestQualification,#NoOfJobsChange,#officeContactNumber,#workExperience,.yearOfPassingValue,#college"
				).show();
				$("#myprofile-edit-btn").hide();
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadfinancialDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/getfinancialDetails/"+id+"";

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/getfinancialDetails/" +
			id +
			"";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/getfinancialDetails/" +
			id +
			"";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			//

			if (
				data.monthlyEmi == null &&
				data.creditAmount == null &&
				data.existingLoanAmount == null &&
				data.creditCardsRepaymentAmount == null &&
				data.otherSourcesIncome == null &&
				data.netMonthlyIncome == null &&
				data.avgMonthlyExpenses == null
			) {
				$(
					"#financial-submit-btn, #monthlyEmi, #creditamount, #existingloanamount, #creditcardsrepaymentamount, #othersourcesincome, #netmonthlyincome, #avgmonthlyexpenses"
				).show();
				$("#financial-edit-btn").hide();
			} else if (
				data.firstmonthlyEmiName != "" &&
				data.creditAmount != "" &&
				data.existingLoanAmount != "" &&
				data.creditCardsRepaymentAmount != "" &&
				data.otherSourcesIncome != "" &&
				data.netMonthlyIncome != "" &&
				data.avgMonthlyExpenses != ""
			) {
				$("#financial-edit-btn").show();
				$(
					"#financial-submit-btn, #monthlyEmi, #creditamount, #existingloanamount, #creditcardsrepaymentamount, #othersourcesincome, #netmonthlyincome,#avgmonthlyexpenses"
				).hide();
			}

			$("#monthlyEmi").val(data.monthlyEmi);
			//$(".displaymonthlyEmi").html(data.monthlyEmi);

			$("#creditamount").val(data.creditAmount);
			//$(".displaycreditamount").html(data.creditAmount);

			$("#existingloanamount").val(data.existingLoanAmount);
			//$(".displayexistingloanamount").html(data.existingLoanAmount);

			$("#creditcardsrepaymentamount").val(data.creditCardsRepaymentAmount);
			// $(".displaycreditcardsrepaymentamount").html(data.creditCardsRepaymentAmount);

			$("#othersourcesincome").val(data.otherSourcesIncome);
			// $(".displayothersourcesincome").html(data.otherSourcesIncome);

			$("#netmonthlyincome").val(data.netMonthlyIncome);
			// $(".displaynetmonthlyincome").html(data.netMonthlyIncome);

			$("#avgmonthlyexpenses").val(data.avgMonthlyExpenses);
			// $(".displayavgmonthlyexpenses").html(data.avgMonthlyExpenses);
		},
		statusCode: {
			500: function (response) {
				$(
					"#financial-submit-btn, #monthlyEmi, #creditamount, #existingloanamount, #creditcardsrepaymentamount, #othersourcesincome, #netmonthlyincome,#avgmonthlyexpenses"
				).show();
				$("#financial-edit-btn").hide();
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadbankDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/bankdetails/" +
			id +
			"";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/bankdetails/" + id + "";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",

		success: function (data, textStatus, xhr) {
			if (
				data.accountNumber == null &&
				data.bankName == null &&
				data.branchName == null &&
				data.accountType == null &&
				data.ifscCode == null &&
				data.address == null
			) {
				$(
					"#bank-submit-btn, #accountnumber, #bankname, #branchname, #accounttype, #ifsccode, #address"
				).show();
				$("#bank-edit-btn").hide();
			} else if (
				data.accountNumber != "" &&
				data.bankName != "" &&
				data.branchName != "" &&
				data.accountType != "" &&
				data.ifscCode != "" &&
				data.address != ""
			) {
				$("#bank-edit-btn").show();
				$(
					"#bank-submit-btn, #accountnumber, #bankname, #branchname, #accounttype, #ifsccode, #address"
				).hide();
			}

			$("#accountnumber").val(data.accountNumber);
			$(".displayaccountnumber").html(data.accountNumber);

			$("#bankname").val(data.bankName);
			$(".displaybankname").html(data.bankName);

			$("#branchname").val(data.branchName);
			$(".displaybranchname").html(data.branchName);

			$("#accounttype  option[value='" + data.accountType + "']").attr(
				"selected",
				"selected"
			);

			$(".displayaccounttype").html(data.accountType);

			$("#ifsccode").val(data.ifscCode);
			$(".displayifsccode").html(data.ifscCode);

			$("#address").val(data.address);
			$(".displayaddress").html(data.address);
		},
		statusCode: {
			500: function (response) {
				$(
					"#bank-submit-btn, #accountnumber, #bankname, #branchname, #accounttype, #ifsccode, #address"
				).show();

				$("#bank-edit-btn").hide();
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadAgreedloans() {
	$(".loadingSec").show();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	fName = "lenderUserId";

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}

	var postData = {
		leftOperand: {
			fieldName: fName,
			fieldValue: userId,
			operator: "EQUALS",
		},

		logicalOperator: "AND",

		rightOperand: {
			fieldName: "loanStatus",
			fieldValues: ["Agreed", "Active", "Closed", "Hold"],
			operator: "IN",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	//console.log(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	}

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				//console.log(template);
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayoffers").html(html);
				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".agreedloansPagination")
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							leftOperand: {
								fieldName: fName,
								fieldValue: userId,
								operator: "EQUALS",
							},

							logicalOperator: "AND",

							rightOperand: {
								fieldName: "loanStatus",
								fieldValues: ["Agreed", "Active", "Closed"],
								operator: "IN",
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanId",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var getStatUrl =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var getStatUrl =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						}

						$.ajax({
							url: getStatUrl,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",

							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayallRequests").innerHTML;
								//console.log(template);
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});
								//alert(html);
								$("#displayoffers").html(html);
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
	$(".loadingSec").hide();
}

function signout() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	writeCookie("redirectUrl", "");
	writeCookie("sUserId", "");
	writeCookie("sUserType", "");
	writeCookie("saccessToken", "");
	writeCookie("tokenTime", "");
	writeCookie("skipwhatsappVerify", "");
	writeCookie("validitySkip", false);
	writeCookie("resend-activation-link", false);
	writeCookie("userUtmRequest", "");

	if (userisIn == "local") {
		var signoutUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/logout";
	} else {
		var signoutUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/logout";
	}

	$.ajax({
		url: signoutUrl,
		type: "POST",
		success: function (data, textStatus, xhr) {
			window.location = "userlogin";
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			window.location = "userlogin";
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

function userresponding(actionType, requestID) {
	var getreactedName = actionType;
	var getreqID = requestID;

	$(".postreqID").attr("data-reqID", getreqID);
	$(".postreqID").attr("data-type", actionType);
	$(".postreqID").addClass("postreqID" + requestID);

	if (getreactedName == "Accepted") {
		var displayActionName = "Accept";
	} else {
		var displayActionName = "Reject";
	}
	$(".reactedName").html(displayActionName);
	//});
}

function participatedlenders(requestid) {
	//alert(1);
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	fName = "lenderUserId";

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}

	var postData = {
		leftOperand: {
			fieldName: "borrowerUserId",
			operator: "EQUALS",
			fieldValue: requestid,
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "loanStatus",
			fieldValue: "Active",
			operator: "EQUALS",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
	};
	console.log(requestid);
	var postData = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	}

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-participatedlenders").modal("show");
			totalEntries = data.totalCount;
			if (data.results.length == 0) {
				$(".nodata-pl").hide();

				$("#displayRequests").html(
					'<tr id="displayNoRecords" class="displayRequests"><td colspan="8"><b>No LENDER found!</b></td></tr> '
				);
			} else {
				var template = document.getElementById(
					"displayallparticipatedRequests"
				).innerHTML;
				//console.log(template);
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });
				//alert(html);
				$("#displayRequests").html(html);
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

function searchLoanlenderEntries() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	console.log("in search function");
	var userSelecctedOption = $(".choosenType").val();
	console.log("User selected " + userSelecctedOption);
	var minamtValue = $(".minAmount").val();
	var maxamtValue = $(".maxAmount").val();

	console.log(minamtValue + " " + maxamtValue);

	var minRoi = $(".minRoi").val();
	var maxRoi = $(".maxRoi").val();

	console.log(minRoi + " " + maxRoi);

	var borrowerID = $(".borrowerID").val();
	console.log("borrowerID : " + borrowerID);

	borrowerID = borrowerID.substr(2);

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (primaryType == "LENDER") {
		var fieldValueforSearch = "BORROWER";
	} else {
		var fieldValueforSearch = "LENDER";
	}

	if (userSelecctedOption == "amount") {
		var postData = {
			leftOperand: {
				leftOperand: {
					fieldName: "userPrimaryType",
					fieldValue: fieldValueforSearch,
					operator: "EQUALS",
				},
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "user.status",
					fieldValue: "ACTIVE",
					operator: "EQUALS",
				},
			},
			logicalOperator: "AND",
			rightOperand: {
				leftOperand: {
					leftOperand: {
						fieldName: "loanRequestAmount",
						fieldValue: minamtValue,
						operator: "GTE",
					},
					logicalOperator: "AND",
					rightOperand: {
						fieldName: "loanRequestAmount",
						fieldValue: maxamtValue,
						operator: "LTE",
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
						fieldName: "user.emailVerified",
						fieldValue: "true",
						operator: "EQUALS",
					},
				},
			},
			page: {
				pageNo: 1,
				pageSize: 9,
			},
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	} else if (userSelecctedOption == "borrowerID") {
		var postData = {
			leftOperand: {
				leftOperand: {
					fieldName: "userId",
					fieldValue: borrowerID,
					operator: "EQUALS",
				},
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "user.status",
					fieldValue: "ACTIVE",
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
					fieldName: "loanOfferedAmount.loanOfferdStatus",
					fieldValue: "LOANOFFERACCEPTED",
					operator: "EQUALS",
				},
			},
			page: {
				pageNo: 1,
				pageSize: 10,
			},
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	} else {
		var postData = {
			leftOperand: {
				leftOperand: {
					fieldName: "userPrimaryType",
					fieldValue: fieldValueforSearch,
					operator: "EQUALS",
				},
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "user.status",
					fieldValue: "ACTIVE",
					operator: "EQUALS",
				},
			},
			logicalOperator: "AND",
			rightOperand: {
				leftOperand: {
					leftOperand: {
						fieldName: "rateOfInterest",
						fieldValue: minRoi,
						operator: "GTE",
					},
					logicalOperator: "AND",
					rightOperand: {
						fieldName: "rateOfInterest",
						fieldValue: maxRoi,
						operator: "LTE",
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
						fieldName: "user.emailVerified",
						fieldValue: "true",
						operator: "EQUALS",
					},
				},
			},
			page: {
				pageNo: 1,
				pageSize: 9,
			},
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	}

	var postData = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			console.log(totalEntries);
			//  $(".nodata-pl").hide();
			var template = document.getElementById("loanListiongsTpl").innerHTML;
			Mustache.parse(template);
			//var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });
			//alert(html);
			$("#loadborrowerloanListings").html("");
			$(".lenderLoanListingsPagination").hide();
			$(".searchPagination").show();
			$("#loadborrowerloanListings").html(html);

			var displayPageNo = totalEntries / 9;
			displayPageNo = displayPageNo + 1;
			$(".searchPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "BORROWER";
					} else {
						var fieldValueforSearch = "LENDER";
					}

					if (userSelecctedOption == "amount") {
						var postData = {
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: fieldValueforSearch,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.status",
									fieldValue: "ACTIVE",
									operator: "EQUALS",
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									leftOperand: {
										fieldName: "loanRequestAmount",
										fieldValue: minamtValue,
										operator: "GTE",
									},
									logicalOperator: "AND",
									rightOperand: {
										fieldName: "loanRequestAmount",
										fieldValue: maxamtValue,
										operator: "LTE",
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
										fieldName: "user.emailVerified",
										fieldValue: "true",
										operator: "EQUALS",
									},
								},
							},
							page: {
								pageNo: num,
								pageSize: 9,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
					} else if (userSelecctedOption == "borrowerID") {
						var postData = {
							leftOperand: {
								leftOperand: {
									fieldName: "userId",
									fieldValue: borrowerID,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.status",
									fieldValue: "ACTIVE",
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
									fieldName: "loanOfferedAmount.loanOfferdStatus",
									fieldValue: "LOANOFFERACCEPTED",
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
					} else {
						var postData = {
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: fieldValueforSearch,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.status",
									fieldValue: "ACTIVE",
									operator: "EQUALS",
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									leftOperand: {
										fieldName: "rateOfInterest",
										fieldValue: minRoi,
										operator: "GTE",
									},
									logicalOperator: "AND",
									rightOperand: {
										fieldName: "rateOfInterest",
										fieldValue: maxRoi,
										operator: "LTE",
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
										fieldName: "user.emailVerified",
										fieldValue: "true",
										operator: "EQUALS",
									},
								},
							},
							page: {
								pageNo: num,
								pageSize: 9,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
					}
					var postData = JSON.stringify(postData);
					console.log(postData);
					//alert(1);

					if (userisIn == "local") {
						//http://35.154.48.120:8080/oxynew/
						var getStatUrl =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					}

					$.ajax({
						url: getStatUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template =
								document.getElementById("loanListiongsTpl").innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, {
								data: data.results,
							});

							$("#loadborrowerloanListings").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function searchborrowerLoanEntries() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	console.log("in search function");
	var userSelecctedOption = $(".choosenType").val();
	console.log("User selected " + userSelecctedOption);
	var minamtValue = $(".minAmount").val();
	var maxamtValue = $(".maxAmount").val();

	console.log(minamtValue + " " + maxamtValue);

	var minRoi = $(".minRoi").val();
	var maxRoi = $(".maxRoi").val();

	console.log(minRoi + " " + maxRoi);

	var userSearchID = $(".searchWithIDinput").val();
	userSearchID = userSearchID.substr(2);

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (primaryType == "LENDER") {
		var fieldValueforSearch = "BORROWER";
	} else {
		var fieldValueforSearch = "LENDER";
	}

	if (userSelecctedOption == "amount") {
		var postData = {
			leftOperand: {
				leftOperand: {
					fieldName: "userPrimaryType",
					operator: "EQUALS",
					fieldValue: fieldValueforSearch,
				},
				logicalOperator: "AND",
				rightOperand: {
					leftOperand: {
						fieldName: "user.status",
						fieldValue: "ACTIVE",
						operator: "EQUALS",
					},
					logicalOperator: "AND",
					rightOperand: {
						fieldName: "parentRequestId",
						operator: "NULL",
					},
				},
			},
			logicalOperator: "AND",
			rightOperand: {
				leftOperand: {
					fieldName: "loanRequestAmount",
					fieldValue: minamtValue,
					operator: "GTE",
				},
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "loanRequestAmount",
					fieldValue: maxamtValue,
					operator: "LTE",
				},
			},
			page: {
				pageNo: 1,
				pageSize: 9,
			},
		};
	} else if (userSelecctedOption == "searchWithID") {
		var postData = {
			leftOperand: {
				leftOperand: {
					fieldName: "userPrimaryType",
					operator: "EQUALS",
					fieldValue: fieldValueforSearch,
				},
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "userId",
					fieldValue: userSearchID,
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
				pageSize: 100,
			},
		};
	} else {
		var postData = {
			leftOperand: {
				leftOperand: {
					fieldName: "userPrimaryType",
					operator: "EQUALS",
					fieldValue: fieldValueforSearch,
				},
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "parentRequestId",
					operator: "NULL",
				},
			},
			logicalOperator: "AND",
			rightOperand: {
				leftOperand: {
					fieldName: "rateOfInterest",
					fieldValue: minRoi,
					operator: "GTE",
				},
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "rateOfInterest",
					fieldValue: maxRoi,
					operator: "LTE",
				},
			},
			page: {
				pageNo: 1,
				pageSize: 9,
			},
		};
	}

	var postData = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			console.log(totalEntries);

			var template = document.getElementById("loanListiongsTpl").innerHTML;
			Mustache.parse(template);
			//var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });

			$("#loadloanListings").html("");
			$(".borrowerLoanListingsPagination").hide();
			$(".searchborrowerPagination").show();
			$("#loadloanListings").html(html);

			var displayPageNo = totalEntries / 9;
			displayPageNo = displayPageNo + 1;
			$(".searchborrowerPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "BORROWER";
					} else {
						var fieldValueforSearch = "LENDER";
					}

					if (userSelecctedOption == "amount") {
						var postData = {
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									operator: "EQUALS",
									fieldValue: fieldValueforSearch,
								},
								logicalOperator: "AND",
								rightOperand: {
									leftOperand: {
										fieldName: "user.status",
										fieldValue: "ACTIVE",
										operator: "EQUALS",
									},
									logicalOperator: "AND",
									rightOperand: {
										fieldName: "parentRequestId",
										operator: "NULL",
									},
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "loanRequestAmount",
									fieldValue: minamtValue,
									operator: "GTE",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "loanRequestAmount",
									fieldValue: maxamtValue,
									operator: "LTE",
								},
							},
							page: {
								pageNo: num,
								pageSize: 9,
							},
						};
					} else {
						var postData = {
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									operator: "EQUALS",
									fieldValue: fieldValueforSearch,
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "parentRequestId",
									operator: "NULL",
								},
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "rateOfInterest",
									fieldValue: minRoi,
									operator: "GTE",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "rateOfInterest",
									fieldValue: maxRoi,
									operator: "LTE",
								},
							},
							page: {
								pageNo: num,
								pageSize: 9,
							},
						};
					}
					var postData = JSON.stringify(postData);
					console.log(postData);
					//alert(1);

					if (userisIn == "local") {
						var getStatUrl =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					} else {
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					}

					$.ajax({
						url: getStatUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template =
								document.getElementById("loanListiongsTpl").innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, {
								data: data.results,
							});

							$("#loadloanListings ").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function downloadProfilePic() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getProfilePic =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/PROFILEPIC";
	} else {
		var getProfilePic =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/PROFILEPIC";
	}

	$.ajax({
		url: getProfilePic,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				$(".userPicArea, .user-header img, .dropdown-toggle img").attr(
					"src",
					data.downloadUrl
				);
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

function dataURItoBlob(dataURI) {
	var byteString;
	if (dataURI.split(",")[0].indexOf("base64") >= 0)
		byteString = atob(dataURI.split(",")[1]);
	else byteString = unescape(dataURI.split(",")[1]);

	// separate out the mime component
	var mimeString = dataURI.split(",")[0].split(":")[1].split(";")[0];

	// write the bytes of the string to a typed array
	var ia = new Uint8Array(byteString.length);
	for (var i = 0; i < byteString.length; i++) {
		ia[i] = byteString.charCodeAt(i);
	}

	return new Blob([ia], { type: mimeString });
}

function readProfilePicture(input) {
	console.log("entering into function");
	var reader = new FileReader();
	var blob = dataURItoBlob(input);
	console.log(blob);
	var fd = new FormData();
	fd.append("PROFILEPIC", blob);

	console.log(fd);
	var actionURL = $("#userPICUpload").attr("action");

	$.ajax({
		url: actionURL,
		type: "post",
		data: fd,
		contentType: false,
		processData: false,
		success: function (data, textStatus, xhr) {
			if (data != 0) {
				// alert("image uploaded");
				$(".displayCropSection").hide("slow");
				window.location.reload();
			} else {
				alert("file not uploaded");
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

function signatureisDone(loanIDFromEsign) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	//var esignAgree = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/"+loanIDFromEsign+"/uploadAgreement";
	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var esignAgree =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanIDFromEsign +
			"/uploadAgreement";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var esignAgree =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanIDFromEsign +
			"/uploadAgreement";
	}
	$.ajax({
		url: esignAgree,
		type: "POST",
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-agreement").modal("show");
		},
		statusCode: {
			400: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseJSON.errorMessage);
				var errorMessage = jqXHR.responseJSON.errorMessage;
				if (errorMessage == "You had esigned this document already") {
					var placeerrorHTMLCode =
						"You've already completed esign with this agreement.";
				} else if (
					errorMessage ==
					"Lender has to esign first before you esign. Please contact support"
				) {
					var placeerrorHTMLCode =
						"Your lender has to esign First, We will let you once he is done with his eSign.";
				}

				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
			500: function (jqXHR, textStatus, errorThrown) {
				var placeerrorHTMLCode = "Internal Server Error";
				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function esignDone(loanRequestIDFromElement) {
	console.log("user clicked");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var esignAgree =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanRequestIDFromElement +
			"/esign";
	} else {
		var esignAgree =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanRequestIDFromElement +
			"/esign";
	}

	loanIDFromEsign = loanRequestIDFromElement;
	$.ajax({
		url: esignAgree,
		type: "POST",
		contentType: "application/json",
		success: function (data, textStatus, xhr) {
			eSignTransactionID = data.id;

			openGateway(eSignTransactionID);
		},
		statusCode: {
			400: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseJSON.errorMessage);
				var errorMessage = jqXHR.responseJSON.errorMessage;
				if (errorMessage == "You had esigned this document already") {
					var placeerrorHTMLCode =
						"You've already completed esign with this agreement.";
				} else if (
					errorMessage ==
					"Lender has to esign first before you esign. Please contact support"
				) {
					var placeerrorHTMLCode =
						"Your lender has to esign First, We will let you once he is done with his eSign.";
				}

				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
			500: function (jqXHR, textStatus, errorThrown) {
				var placeerrorHTMLCode = "Internal Server Error";
				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function esignDoneMobile(loanRequestIDFromElement) {
	console.log("user clicked");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var esignAgree =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanRequestIDFromElement +
			"/esign";
	} else {
		var esignAgree =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanRequestIDFromElement +
			"/esign";
	}

	loanIDFromEsign = loanRequestIDFromElement;
	var postData = { eSignType: "MOBILE" };
	var postData = JSON.stringify(postData);
	console.log(postData);
	$(".loanRequestId").val(loanRequestIDFromElement);

	$.ajax({
		url: esignAgree,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			eSignTransactionID = data.id;
			console.log(eSignTransactionID);

			// openGateway(eSignTransactionID);
			$("#modal-mobile-otp").modal("show");
		},
		statusCode: {
			400: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseJSON.errorMessage);
				var errorMessage = jqXHR.responseJSON.errorMessage;
				if (errorMessage == "You had esigned this document already") {
					var placeerrorHTMLCode =
						"You've already completed esign with this agreement.";
				} else if (
					errorMessage ==
					"Lender has to esign first before you esign. Please contact support"
				) {
					var placeerrorHTMLCode =
						"Your lender has to esign First, We will let you once he is done with his eSign.";
				}

				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
			500: function (jqXHR, textStatus, errorThrown) {
				var placeerrorHTMLCode = "Internal Server Error";
				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			//console.log('Error Something');

			if (arguments[0].responseJSON.errorCode == 114) {
				$("#modal-loanNotAppoved").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function submitOTPeSign() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	loanIDFromEsign = $(".loanRequestId").val();
	var enteredOtp = $(".otpValue").val();
	enteredOtp = enteredOtp.trim();
	//var checkbox_val = $('.agreeCheckBox').val();
	var checkbox_val = document.getElementById("agreeCheckBox").checked;

	console.log(checkbox_val);
	var isOTPerrmsgs = true;

	if (enteredOtp == "") {
		$(".displayOTPError").show();
		isOTPerrmsgs = false;
	} else {
		$(".displayOTPError").hide();
	}

	if (checkbox_val == false) {
		$(".displayOTPTermsError").show();
		isOTPerrmsgs = false;
	} else {
		$(".displayOTPTermsError").hide();
	}

	if (isOTPerrmsgs == true) {
		if (userisIn == "local") {
			var esignAgree =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				suserId +
				"/loan/" +
				sprimaryType +
				"/" +
				loanIDFromEsign +
				"/uploadAgreement";
		} else {
			var esignAgree =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				suserId +
				"/loan/" +
				sprimaryType +
				"/" +
				loanIDFromEsign +
				"/uploadAgreement";
		}

		var postData = { eSignType: "MOBILE", otpValue: enteredOtp };
		var postData = JSON.stringify(postData);
		console.log(postData);

		$.ajax({
			url: esignAgree,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#modal-agreement").modal("show");
				$("#modal-mobile-otp").modal("hide");
			},
			statusCode: {
				400: function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseJSON.errorMessage);
					var errorMessage = jqXHR.responseJSON.errorMessage;
					if (errorMessage == "You had esigned this document already") {
						var placeerrorHTMLCode =
							"You've already completed esign with this agreement.";
					} else if (
						errorMessage ==
						"Lender has to esign first before you esign. Please contact support"
					) {
						var placeerrorHTMLCode =
							"Your lender has to esign First, We will let you once he is done with his eSign.";
					}

					$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
					$("#modal-agreement-already").modal("show");
				},
				500: function (jqXHR, textStatus, errorThrown) {
					var placeerrorHTMLCode = "Internal Server Error";
					$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
					$("#modal-agreement-already").modal("show");
				},
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isOTPerrmsgs;
}

$(".updateProfile-OnLoad").click(function () {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	if (personalDetailsFilled == false) {
		if (sprimaryType == "LENDER") {
			window.location = "lenderpersonalinfo";
		} else {
			window.location = "borrowerpersonalinfo";
		}
	}
});

function loadLoading() {
	$(".loadingSec").show();
}

function stopLoading() {
	$(".loadingSec").hide();
}

function loadAllRequests() {
	loadLoading();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	var postData = {
		fieldName: "parentRequestId",
		fieldValue: globalLoanId,
		operator: "EQUALS",
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$(".title-requested").html("Requests received from the borrowers");
			$(".offersSentLender").show();
			$(".requestsReceived").hide();

			totalEntries = data.totalCount;
			console.log(data.results);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 9;
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							fieldName: "parentRequestId",
							fieldValue: globalLoanId,
							operator: "EQUALS",
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log(data.results);

								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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
	stopLoading();
}

function loadRequestsSent() {
	loadLoading();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	var postData = {
		leftOperand: {
			fieldName: "userId",
			fieldValue: userId,
			operator: "EQUALS",
		},

		logicalOperator: "AND",

		rightOperand: {
			fieldName: "parentRequest.userId",
			operator: "NOT_NULL",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	//console.log(postData);
	//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$(".title-requested").html("Offers Sent to the Borrowers");
			$(".offersSentLender").hide();
			$(".requestsReceived").show();

			totalEntries = data.totalCount;
			//alert(data.totalCount);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				//alert(displayPageNo);
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							leftOperand: {
								fieldName: "userId",
								fieldValue: userId,
								operator: "EQUALS",
							},

							logicalOperator: "AND",

							rightOperand: {
								fieldName: "parentRequest.userId",
								operator: "NOT_NULL",
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/request/search";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log(data.results);

								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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
	stopLoading();
}

function loadActiveLoans() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	// fName = "lenderUserId";

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	} else {
		fName = "lenderUserId";
	}

	var postData = {
		leftOperand: {
			fieldName: fName,
			fieldValue: userId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "borrowerEsignId",
				operator: "NOT_NULL",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanStatus",
				fieldValue: "Active",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanActiveDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	//console.log(postData);
	//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	}

	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			//console.log(data.results);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 9;
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						/* var postData = {
        "leftOperand": {
          "fieldName": fName,
          "fieldValue": userId,
          "operator": "EQUALS"
        },

        "logicalOperator": "AND",

        "rightOperand": {
            "fieldName": "loanStatus",
            "fieldValue" : "Active",
            "operator": "EQUALS"
        },
        "page": {
          "pageNo": num,
          "pageSize": 10
        },
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }*/

						var postData = {
							leftOperand: {
								fieldName: fName,
								fieldValue: userId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "borrowerEsignId",
									operator: "NOT_NULL",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "loanStatus",
									fieldValue: "Active",
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: 1,
								pageSize: 10,
							},
							sortBy: "loanActiveDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						// var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log(data.results);

								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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
	$(".loadingSec").hide();
}

function loadActiveRunningLoans() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	// fName = "lenderUserId";

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	} else {
		fName = "lenderUserId";
	}
	//alert(fName);
	/*var postData = {
        "leftOperand": {
          "fieldName": fName,
          "fieldValue": userId,
          "operator": "EQUALS"
        },

        "logicalOperator": "AND",

        "rightOperand": {
            "fieldName": "loanStatus",
            "fieldValue" : "Active",
            "operator": "EQUALS"
        },
        "page": {
          "pageNo": 1,
          "pageSize": 10
        },
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }*/

	var postData = {
		leftOperand: {
			fieldName: fName,
			fieldValue: userId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "borrowerDisbursedDate",
				operator: "NOT_NULL",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanStatus",
				fieldValue: "Active",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanActiveDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	// console.log(postData);
	//var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	}

	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			console.log(data.results);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 9;
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						/* var postData = {
        "leftOperand": {
          "fieldName": fName,
          "fieldValue": userId,
          "operator": "EQUALS"
        },

        "logicalOperator": "AND",

        "rightOperand": {
            "fieldName": "loanStatus",
            "fieldValue" : "Active",
            "operator": "EQUALS"
        },
        "page": {
          "pageNo": num,
          "pageSize": 10
        },
         "sortBy":"loanActiveDate",
         "sortOrder" : "DESC"
      }*/

						var postData = {
							leftOperand: {
								fieldName: fName,
								fieldValue: userId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "borrowerDisbursedDate",
									operator: "NOT_NULL",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "loanStatus",
									fieldValue: "Active",
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: 1,
								pageSize: 10,
							},
							sortBy: "loanActiveDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						// var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log(data.results);

								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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
	$(".loadingSec").hide();
}

function downloadAgreement(requestID) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	//var requestID = $(this).attr("data-reqid");
	//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/"+requestID+"/download";
	//alert(getStatUrl);
	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/" +
			requestID +
			"/download";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/" +
			requestID +
			"/download";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",

		success: function (data, textStatus, xhr) {
			if (primaryType == "LENDER") {
				if (data.downloadUrlForLender != null) {
					window.open(data.downloadUrlForLender, "_blank");
					$("#modal-agreement-downloaded").modal("show");
				} else {
					window.open(data.downloadUrl, "_blank");
					$("#modal-agreement-downloaded").modal("show");
				}
			}

			if (primaryType == "BORROWER") {
				if (data.downloadUrlForBorrower != null) {
					window.open(data.downloadUrlForBorrower, "_blank");
					$("#modal-agreement-downloaded").modal("show");
				} else {
					window.open(data.downloadUrl, "_blank");
					$("#modal-agreement-downloaded").modal("show");
				}
			}
		},
		statusCode: {
			500: function (jqXHR, textStatus, errorThrown) {
				var placeerrorHTMLCode = "Internal Server Error";
				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

const rendeactivation = async () => {
	let suserId = getCookie("sUserId");
	let sprimaryType = getCookie("sUserType");
	let saccessToken = getCookie("saccessToken");

	let postData = {
		userId: suserId,
	};

	let postDataString = JSON.stringify(postData);

	let sendActivationEmail =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/sendingEmailActivationLink"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/sendingEmailActivationLink";

	try {
		const response = await fetch(sendActivationEmail, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: postDataString,
		});

		if (response.ok) {
			const data = await response.json();
			writeCookie("resend-activation-link", true);
			$("#emailMessage").hide();
			$("#resend-activation-link").modal("show");
		} else {
			console.log("Error:");
			if (response.status === 200) {
				console.log("Login Success");
			}
		}
	} catch (error) {
		console.log("Error:", error);
		if (error.responseJSON && error.responseJSON.errorCode == 103) {
			$(".errorotp").show();
		}
	}
};

function transformEntry(item, type) {
	switch (type) {
		case "email":
			var parts = item.split("@"),
				len = parts[0].length;
			return email.replace(parts[0].slice(1, -1), "*".repeat(len - 2));
		case "phone":
			return item[0] + "*".repeat(item.length - 4) + item.slice(-3);
		default:
			throw new Error("Undefined type: " + type);
	}
}

/*
###########################################################################
########################## ESIGN SETUP BEGIN ##############################
################### Keep this code for ESIGN application ##################
###########################################################################
*/

//Setup gateway
let gatewayOptions = {
	company_display_name: "OxyLoans",
	front_text_color: "FFFFFF",
	background_color: "2C3E50",
	logo_url: "http://182.18.139.198/FEOxyLoans/assets/images/squre.jpg",
	otp_allowed: "y",
	fingerprint_allowed: "n",
	iris_allowed: "n",
	phone_auth: "y",
	draggable_sign: "n",
	google_sign: "n",
};

//Generate gateway transaction at backend via rest API call. [Requires AGENCY ID & API KEY]
// --on scuccess pass <<gateway transaction id>> below

// document.getElementById("gatewayBtn").onclick = openGateway;

//open gateway
/* function openGateway(eSignTransactionID) {
      console.log('im at openGateway function')
        //create new gateway transaction
        let myAadhaarEsignGateway = new AadhaarAPIEsignGateway(eSignTransactionID, gatewayOptions,
       );
        openAadhaarGateway(myAadhaarEsignGateway);
    } */

/************************************************
 *  Handler functions for different scenarios   *
 ************************************************/

function handleEsignConsentDenied() {
	console.log("Handling consent denial at client end");
	//Handle the case when user denies consent
}

function handleAadhaarEsignSuccess(responseJSON) {
	signatureisDone(loanIDFromEsign);
	console.log("Handling EKYC Success at client end");
}

function handleAadhaarEsignFailure(errorJSON) {
	console.log("Handling EKYC failure at client end");
	//console.log(errorJSON);
	//Handle the case when esign fails
}

function handleAadhaarOTPFailure(errorJSON) {
	console.log("Handling OTP failure cases at client end");
	//handle case when login OTP fails
}

function handleGatewayError(errorJSON) {
	console.log("Handling Gateway launch failure at client end");
	//console.log(errorJSON);
}

function handleGatewayTermination() {
	//Do not remove this function, even if not used.
	console.log("Handling Gateway Termination at client end");
}

/*
###########################################################################
########################## ESIGN SETUP ENDS ###############################
################### Keep this code for ESIGN application ##################
###########################################################################
*/

function resetPassword() {
	var email = $(".email-user").html();
	console.log(email);
	let regUrl = baseUrl + "v1/user/resetpassword";

	var postData = { email: email };
	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: regUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data) {
			$("#modal-resetSuccess .modal-body").html(
				"We've sent an email to reset password. You will be logged out from the application in next 3 sec. Please check your email."
			);
			$("#modal-resetSuccess").modal("show");

			setTimeout(function () {
				signout();
				//$(".modal").hide();
			}, 4000);
		},
		statusCode: {
			400: function (response) {
				//alert('1');
				$("#modal-resetpasswordError").modal("show");
				//bootbox.alert('<span style="color:Red;">Error While Saving Outage Entry Please Check</span>', function () { });
			},
		},
	});
}

function getTokenforeNach() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	if (userisIn == "local") {
		var getTokenUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/enach";
	} else {
		var getTokenUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/enach";
	}
	$.ajax({
		url: getTokenUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			//
			tokenforeNach = data.token;
			//tokenforeNach  = tokenforeNach.toUpperCase();
			console.log(txnIdforeNACH);
			txnIdforeNACH = data.txnId;
			//alert(tokenforeNach);
			$("#btnSubmit").trigger("click");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function posteMandateResponse() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	if (userisIn == "local") {
		var posteMandateResponseCall =
			"http://35.154.48.120:8080/oxynew/v1/merchant/ICICI/response";
	} else {
		var posteMandateResponseCall =
			"https://fintech.oxyloans.com/oxyloans/v1/merchant/ICICI/response";
	}
	$.ajax({
		url: posteMandateResponseCall,
		success: function (data, textStatus, xhr) {},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function viewEMICARD() {
	$(".viewEMIcard").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		primaryType = sprimaryType;
		saccessToken = getCookie("saccessToken");
		var getLoanId = $(this).attr("data-loanid");
		if (userisIn == "local") {
			var updateEmiUrlCard =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				suserId +
				"/loan/ADMIN/" +
				getLoanId +
				"/emicard";
		} else {
			var updateEmiUrlCard =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				suserId +
				"/loan/" +
				primaryType +
				"/" +
				getLoanId +
				"/emicard";
		}
		$.ajax({
			url: updateEmiUrlCard,
			type: "GET",
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				//alert(data);

				var template = document.getElementById("emiRecordsCallTpl").innerHTML;
				//console.log(template);
				Mustache.parse(template);
				//var html = Mustache.render(template, data);

				var html = Mustache.to_html(template, { data: data.results });
				$("#displayEMIRecords").html(html);

				$("#modal-viewEMI").modal("show");
				$(".emiStatustrue").attr("disabled", "disabled");
			},
			statusCode: {
				400: function (response) {
					$("#modal-agreement-already").modal("show");
				},
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

$(document).ready(function () {
	$(".getscore-btn").click(function () {
		window.location.href = "creditReportInfo";
	});

	$(".updateCity").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		var updatedCity = $(".cityCheck").val();

		if (updatedCity == "Others") {
			updatedCity = $("#userenterCity").val();
		}

		if (userisIn == "local") {
			var updateCity =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				suserId +
				"/city";
		} else {
			var updateCity =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" + suserId + "/city";
		}
		var postData = {
			city: updatedCity,
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		$.ajax({
			url: updateCity,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#modal-checkCity").modal("hide");
			},

			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	});
});

/*function checkOutstandingAmount(loanId,lenderoutstandingamt){
    var borroweroutstandingamt=$('.loanAmountPending').text();
	borroweroutstandingamt = parseInt(borroweroutstandingamt);

  if(borroweroutstandingamt<=0){
		  $("#modal-checkOutstandingAmount").modal("show");
   // alert("Reached maximum limit. Please click here to  increase loan amount.");
	}
	else if(lenderoutstandingamt>0){
	window.location.href="borrowerviewloanoffer?loanid="+loanId;
	}else{
          $("#modal-checkmaxAmount").modal("show");

		//alert("this lender reached his maximum amount to lend . Please select another lender");
	}


}*/

function loadpersonalDetailsforCreditReport() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	$(".displayFormElements").hide();
	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/personal/" +
			id +
			"";
	} else if (userisIn == "prod") {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/personal/" + id + "";
	} else {
		var getStatUrl = "http://10.10.10.78:8181/v1/user/personal/" + id + "";
	}

	// var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/personal/"+id+"";
	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			console.log("data", data);
			if (
				data.firstName == null &&
				data.lastName == null &&
				data.fatherName == null &&
				data.dob == null &&
				data.address == null &&
				data.nationality == null &&
				data.gender == null &&
				data.maritalStatus == null
			) {
				$(
					"#profile-submit-btn, #firstname, #lastname, #fathername,#address, .date, #nationality, .genderInfo, .maritalStatusInfo"
				).show();
				$("#profile-edit-btn").hide();
			} else if (
				data.firstName != "" &&
				data.lastName != "" &&
				data.fatherName != "" &&
				data.dob != "" &&
				data.address != "" &&
				data.nationality != "" &&
				data.gender != "" &&
				data.maritalStatus != ""
			) {
				$("#profile-edit-btn").show();
				$(
					"#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality,#address, .genderInfo, .maritalStatusInfo"
				).show();
			} else if (data.firstName != "" && data.address == "") {
				$("#profile-edit-btn").show();
				$(
					"#profile-submit-btn, #firstname, #lastname, #fathername, .date, #nationality,#address, .genderInfo, .maritalStatusInfo"
				).hide();
			}

			$("#firstname").val(data.firstName);
			$("#lastname").val(data.lastName);
			$("#mobile-2").val(data.mobileNumber);
			$("#email").val(data.email);
			$("#pincode").val(data.pinCode);
			$("#city").val(data.city);
			$("#dateofbirthCR").val(data.dob);
			$("#panNumber").val(data.panNumber);
			if (data.gender == "M" || data.gender == "Male") {
				$("#genderRadioMale").prop("checked", true);
			} else if (data.gender == "F" || data.gender == "Female") {
				$("#genderRadioFeMale").prop("checked", true);
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

/*Experian call*/

/*Credit Report JS*/

$(document).ready(function () {
	$("#chooseValue").on("change", function () {
		if ($("#chooseValue").val() == "passport") {
			$(".passport").show();
			$(".voterid, .aadhaar,.driverlicense").hide();
		} else if ($("#chooseValue").val() == "voterid") {
			$(".passport, .aadhaar,.driverlicense").hide();
			$(".voterid").show();
		} else if ($("#chooseValue").val() == "aadhaar") {
			$(".passport, .voterid,.driverlicense").hide();
			$(".aadhaar").show();
		} else if ($("#chooseValue").val() == "driverlicense") {
			$(".passport, .voterid,.aadhaar").hide();
			$(".driverlicense").show();
		} else {
			$(".passport, .voterid,.aadhaar,.driverlicense").hide();
		}
	});

	$("#back-credit-report").click(function () {
		window.location = "creditReportInfo";
	});

	$(".termAndconditions").click(function () {
		$("#modal-termsSuccesss").modal("show");
	});

	$("#decline-btn").click(function () {
		window.location = "borrowerDashboard";
	});

	$("#getcredireportbtn").click(function () {
		$("#experianerrormessage").text("");
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		var firstname = $("#firstname").val();
		var middleName = "";
		var surName = $("#lastname").val();
		var mobileNo = $("#mobile-2").val();
		var email = $("#email").val();
		var pan = $("#panNumber").val();
		var gender = $("input[name='gender']:checked").val();
		var dateOfBirth = $("#dateofbirthCR").val();
		var flatno = $("#residentaddress").val();
		var city = $("#city").val();
		var reason = "to get credit score for loan";
		var telephoneNo = "";
		var passport = "";
		var voterid = "";
		var aadhaar = "";
		var driverlicense = "";
		var state = "28";
		var pincode = $("#pincode").val();
		var terms = $("input[type='checkbox'][name='acceptTerms']:checked").val();
		var isValid = true;

		if (terms == undefined) {
			$(".termsError").show();
			isValid = false;
		} else {
			$(".termsError").hide();
		}
		if (firstname.length == 0) {
			$(".firstnameError").show();
			isValid = false;
		} else {
			$(".firstnameError").hide();
		}
		if (surName.length == 0) {
			$(".lastnameError").show();
			isValid = false;
		} else {
			$(".lastnameError").hide();
		}
		if (mobileNo.length == 0) {
			$(".mobile-2Error").show();
			isValid = false;
		} else {
			$(".mobile-2Error").hide();
		}
		if (email.length == 0) {
			$(".emailError").show();
			isValid = false;
		} else {
			$(".emailError").hide();
		}
		if (pan.length == 0) {
			$(".panNumberError").show();
			$("#pannumber").attr("readonly", false);
			isValid = false;
		} else {
			$(".panNumberError").hide();
		}
		if (dateOfBirth.length == 0) {
			$(".dateofbirthCRError").show();
			isValid = false;
		} else {
			$(".dateofbirthCRError").hide();
		}
		if (flatno.length == 0) {
			$(".flatnoError").show();
			isValid = false;
		} else {
			$(".flatnoError").hide();
		}
		if (city.length == 0) {
			$(".cityError").show();
			isValid = false;
		} else {
			$(".cityError").hide();
		}
		if (pincode.length == 0) {
			$(".pincodeError").show();
			isValid = false;
		} else {
			$(".pincodeError").hide();
		}

		if (isValid == true) {
			dateOfBirth = GetDate($("#dateofbirthCR").val());
			var postData = {
				firstName: firstname,
				surName: surName,
				dateOfBirth: dateOfBirth,
				gender: gender,
				mobileNo: mobileNo,
				email: email,
				flatno: flatno,
				city: city,
				state: state,
				pincode: pincode,
				pan: pan,
				reason: reason,
				middleName: middleName,
				telephoneNo: telephoneNo,
				passport: passport,
				voterid: voterid,
				aadhaar: aadhaar,
				driverlicense: driverlicense,
			};
			var postData = JSON.stringify(postData);
			console.log("experian post data", postData);
			if (userisIn == "local") {
				var creditReportUrl =
					"http://35.154.48.120:8080/oxynew/v1/user/" +
					suserId +
					"/experian";
			} else if (userisIn == "prod") {
				var creditReportUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/" +
					suserId +
					"/experian";
			} else {
				var creditReportUrl =
					"http://10.10.10.78:8181/v1/user/" + suserId + "/experian";
			}
			$.ajax({
				url: creditReportUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data) {
					$("#stepOneForm").hide();
					$("#stepThreeForm").show();

					$(".creditAccountActive").html(data.creditAccountActive);
					$(".creditAccountClosed").html(data.creditAccountClosed);
					$(".creditAccountTotal").html(data.creditAccountTotal);
					$(".outstandingBalanceAll").html(data.outstandingBalanceAll);
					$(".outstandingBalanceSecured").html(data.outstandingBalanceSecured);
					$(".outstandingBalanceUnSecured").html(
						data.outstandingBalanceUnSecured
					);
					$(".score").html(data.score);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
					var text = xhr.responseJSON.errorMessage;
					$("#experianerrormessage").append(
						text + ".&nbsp;&nbsp;&nbsp;Please try again."
					);
					$("#modal-experianerror").modal("show");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
});

function loadCreditReport() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			id +
			"/getexperian";
	} else if (userisIn == "prod") {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" + id + "/getexperian";
	} else {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/" +
			id +
			"/getexperian";
	}
	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			$(".creditAccountActive").html(data.creditAccountActive);
			$(".creditAccountClosed").html(data.creditAccountClosed);
			$(".creditAccountTotal").html(data.creditAccountTotal);
			$(".outstandingBalanceAll").html(data.outstandingBalanceAll);
			$(".outstandingBalanceSecured").html(data.outstandingBalanceSecured);
			$(".outstandingBalanceUnSecured").html(data.outstandingBalanceUnSecured);
			$(".score").html(data.score);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function GetDate(str) {
	var arr = str.split("/");
	var month = "";
	var months = [
		"Jan",
		"Feb",
		"Mar",
		"Apr",
		"May",
		"Jun",
		"Jul",
		"Aug",
		"Sep",
		"Oct",
		"Nov",
		"Dec",
	];
	var monthsintext = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
	var i = 0;
	for (i; i < months.length; i++) {
		if (monthsintext[i] == arr[1]) {
			break;
		}
	}
	month = months[i];
	var formatddate = arr[0] + "-" + month + "-" + arr[2];
	return formatddate;
}

/* ENACH STARTS*/

function handleResponse(res) {
	if (
		typeof res != "undefined" &&
		typeof res.paymentMethod != "undefined" &&
		typeof res.paymentMethod.paymentTransaction != "undefined" &&
		typeof res.paymentMethod.paymentTransaction.statusCode != "undefined" &&
		res.paymentMethod.paymentTransaction.statusCode == "0300"
	) {
		// success block
		//alert("success");
	} else if (
		typeof res != "undefined" &&
		typeof res.paymentMethod != "undefined" &&
		typeof res.paymentMethod.paymentTransaction != "undefined" &&
		typeof res.paymentMethod.paymentTransaction.statusCode != "undefined" &&
		res.paymentMethod.paymentTransaction.statusCode == "0398"
	) {
		// initiated block
		//alert("initiated");
	} else {
		// error block
		//alert("error");
	}
}
function saveEMandateResponse(merchantResponseString) {
	$(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	fName = "lenderUserId";
	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}
	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/enach/response";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/enach/response";
	}
	var postData = {
		mandateResponse: merchantResponseString,
	};
	var postData = JSON.stringify(postData);
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$(".loadingSec").hide();
}
function activateECS(enachMandateId) {
	$(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	fName = "lenderUserId";
	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}
	var returnURL = "";
	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/enach/" +
			enachMandateId;
		returnURL = "http://182.18.139.198/new/enachMandateResponse";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/enach/" +
			enachMandateId;
		returnURL = "https://oxyloans.com/new/enachMandateResponse";
	}

	var postData = {};
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$.getScript(
				"https://www.paynimo.com/Paynimocheckout/server/lib/checkout.js"
			);
			var configJson = {
				tarCall: false,
				features: {
					showPGResponseMsg: true,
					enableNewWindowFlow: true,
					//for hybrid applications please disable this by passing false
					enableExpressPay: true,
					siDetailsAtMerchantEnd: true,
					enableSI: true,
				},
				consumerData: {
					deviceId: "WEBSH1", //possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
					token: data.token,
					returnUrl: data.enachMandateRetUrl,
					//'responseHandler': handleResponse,
					paymentMode: "all",
					merchantLogoUrl:
						"https://www.paynimo.com/CompanyDocs/company-logo-md.png", //provided merchant logo will be displayed
					merchantId: data.merchantId,
					currency: "INR",
					consumerId: data.user.displayId, //Your unique consumer identifier to register a eMandate/eSign
					consumerMobileNo: data.user.mobileNumber,
					consumerEmailId: data.user.email,
					txnId: data.txnId, //Unique merchant transaction ID
					items: [
						{
							itemId: "FIRST",
							amount: data.totalAmount,
							comAmt: "0",
						},
					],
					txnType: "SALE",
					customStyle: {
						PRIMARY_COLOR_CODE: "#3977b7", //merchant primary color code
						SECONDARY_COLOR_CODE: "#FFFFFF", //provide merchant's suitable color code
						BUTTON_COLOR_CODE_1: "#1969bb", //merchant's button background color code
						BUTTON_COLOR_CODE_2: "#FFFFFF", //provide merchant's suitable color code for button text
					},
					//'accountNo': '910010016945587',    //Pass this if accountNo is captured at merchant side for eMandate/eSign
					//'accountType': 'Saving',    //  Available options Saving, Current and CC for Cash Credit, only for eSign
					//'accountHolderName': 'Name',  //Pass this if accountHolderName is captured at merchant side for eSign only(Note: For ICICI eMandate registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI)
					//'ifscCode': 'ICIC0000001',        //Pass this if ifscCode is captured at merchant side for eSign only
					debitStartDate: data.debitStartDate,
					debitEndDate: data.debitEndDate,
					maxAmount: data.maxAmount,
					amountType: data.amountType,
					frequency: data.frequency, //  Available options DAIL, Week, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
				},
			};
			$.pnCheckout(configJson);
			if (configJson.features.enableNewWindowFlow) {
				pnCheckoutShared.openNewWindow();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$(".loadingSec").hide();
}

function loadSignedloans() {
	$(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	fName = "lenderUserId";
	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}
	var postData = {
		leftOperand: {
			fieldName: fName,
			fieldValue: userId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "loanStatus",
			fieldValue: "Active",
			operator: "EQUALS",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanAcceptedDate",
		sortOrder: "ASC",
	};
	var postData = JSON.stringify(postData);
	console.log(postData);
	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	}
	//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				//console.log(template);
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, {
					data: data.results,
				});
				//alert(html);
				$("#displayoffers").html(html);
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
						//$(".content4").html("Page " + num); // or some ajax content loading...
						var postData = {
							leftOperand: {
								fieldName: fName,
								fieldValue: userId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "loanStatus",
								fieldValue: "Active",
								operator: "EQUALS",
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanActiveDate",
							sortOrder: "DESC",
						};
						var postData = JSON.stringify(postData);
						console.log(postData);
						//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";
						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var getStatUrl =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var getStatUrl =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						}
						$.ajax({
							url: getStatUrl,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayallRequests").innerHTML;
								//console.log(template);
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});
								//alert(html);
								$("#displayoffers").html(html);
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
	$(".loadingSec").hide();
}

/* ENACH ENDS*/

/************ New profile page *****************/

$(document).ready(function () {
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

	$("#salary,#salaryAmount").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 30) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});

	$("#companyName,#company").keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});

	$("#borrowernewprofile").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredFirstname = $("#firstnamevalue").val();
		var middlename = $("#middletname").val();
		var enteredLastname = $("#lastnamevalue").val();
		var enteredPanNumber = $("#pannumber").val();
		var enteredDateofbirth = $("#dateofbirth").val();
		var enteredFathername = $("#fathername").val();
		var enteredbmobileNumber = $("#bmobileNumber").val();
		var enteredemailValue = $("#emailValue").val();
		var enteredLoanAmount = $("#select-beast").val();
		var enteredemploymentType = $("input[name=option-1]:checked").val();
		var enteredModeofTransactions = $("input[name=option-2]:checked").val();
		var enteredpermanentAddress = $("#permanentAddress").val();
		var enteredresidenceAddress = $("#residenceAddress").val();
		var enteredpincode = $("#pincode").val();
		var enteredstate = $("#state").val();
		var enteredLocation = $("#localityValue").val();
		var enteredname = $("#name").val();
		var enteredaccountno = $("#accountno").val();
		var enteredbankname = $("#bankname").val();
		var enteredIFSCCode = $(".IFSCCode").val();
		var enteredBranch = $("#Branch").val();
		var enteredcityValue = $("#cityValue").val();

		if ($("input[name=option-1]:checked").val() == "SALARIED") {
			var enteredtotalexperience = $("#totalexperience").val();
			var enteredcompany = $("#company").val();
			var enteredsalary = $("#salary").val();
		} else {
			var enteredtotalexperience = $("#experience").val();
			var enteredcompany = $("#companyName").val();
			var enteredsalary = $("#salaryAmount").val();
		}

		if ($("#city").val() == "Other") {
			var enteredcity = $("#others").val();
		} else {
			var enteredcity = $("#city").val();
		}

		var enteredFacebookurl = $("#facebookUrl").val();
		var enteredLinkedinurl = $("#linkedinUrl").val();
		var enteredTwitterurl = $("#twitterUrl").val();

		// var ifscRegex = /^[A-Z]{4}\d{7}$/i;
		var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;
		var panRegex = /^[A-Z]{5}\d{4}[A-Z]{1}/;

		enteredFirstname = enteredFirstname.trim();
		middlename = middlename.trim();
		enteredLastname = enteredLastname.trim();
		enteredPanNumber = enteredPanNumber.trim();
		enteredFathername = enteredFathername.trim();

		var employmentType = document.getElementsByName("option-1");
		var modeofTransactions = document.getElementsByName("option-2");
		var emp = false;
		var mot = false;
		var isValid = true;

		if (enteredFirstname == "") {
			$(".firstnameerror").show();
			isValid = false;
		} else {
			$(".firstnameerror").hide();
		}

		// if (enteredLastname == "") {
		// 	$(".lastnameerror").show();
		// 	isValid = false;
		// } else {
		// 	$(".lastnameerror").hide();
		// }

		if (!panRegex.test(enteredPanNumber)) {
			$(".pannumbererror").html("Please enter valid Pan Number.");
			$(".pannumbererror").show();
			$("#pannumber").attr("readonly", false);
			isValid = false;
		} else {
			$(".pannumbererror").hide();
		}

		if (enteredDateofbirth == "") {
			$(".dateofbirtherror").show();
			isValid = false;
		} else {
			$(".dateofbirtherror").hide();
		}

		if (enteredFathername == "") {
			$(".fathernameerror").show();
			isValid = false;
		} else {
			$(".fathernameerror").hide();
		}

		if (enteredbmobileNumber == "") {
			$(".mobileNumbererror").show();
			isValid = false;
		} else {
			$(".mobileNumbererror").hide();
		}

		if (enteredemailValue == "") {
			$(".emailValueerror").show();
			isValid = false;
		} else {
			$(".emailValueerror").hide();
		}

		if (enteredLoanAmount == "") {
			$(".loanAmounterror").show();
			isValid = false;
		} else {
			$(".loanAmounterror").hide();
		}

		if (enteredemploymentType == "option-1") {
			$(".employmentError").show();
			isValid = false;
		} else {
			$(".employmentError").hide();
		}

		var i = 0;
		for (var i = 0; i < employmentType.length; i++) {
			if (employmentType[i].checked == true) {
				emp = true;
			}
		}
		if (!emp) {
			$(".employmentError").show();
			isValid = false;
		} else {
			$(".employmentError").hide();
		}

		if (sprimaryType == "BORROWER") {
			if (enteredtotalexperience == "") {
				$(".totalexperienceError").show();
				isValid = false;
			} else {
				$(".totalexperienceError").hide();
			}

			if (enteredcompany == "") {
				$(".companyError").show();
				isValid = false;
			} else {
				$(".companyError").hide();
			}

			if (enteredsalary == "") {
				$(".salaryError").show();
				isValid = false;
			} else {
				$(".salaryError").hide();
			}
		}
		if (enteredModeofTransactions == "option-1") {
			$(".ModeofTransactionsError").show();
			isValid = false;
		} else {
			$(".ModeofTransactionsError").hide();
		}

		var i = 0;
		for (var i = 0; i < modeofTransactions.length; i++) {
			if (modeofTransactions[i].checked == true) {
				mot = true;
			}
		}
		if (!mot) {
			$(".ModeofTransactionsError").show();
			isValid = false;
		} else {
			$(".ModeofTransactionsError").hide();
		}

		if (enteredpermanentAddress == "") {
			$(".permanentAddressError").show();
			isValid = false;
		} else {
			$(".permanentAddressError").hide();
		}

		if (enteredresidenceAddress == "") {
			$(".residenceAddressError").show();
			isValid = false;
		} else {
			$(".residenceAddressError").hide();
		}

		if (enteredpincode == "") {
			$(".pincodeError").show();
			isValid = false;
		} else {
			$(".pincodeError").hide();
		}

		if (enteredcity == "") {
			$(".cityError").show();
			isValid = false;
		} else {
			$(".cityError").hide();
		}

		if (enteredname == "") {
			$(".nameError").show();
			isValid = false;
		} else {
			$(".nameError").hide();
		}

		if (enteredaccountno == "") {
			$(".accountnoError").show();
			isValid = false;
		} else {
			$(".accountnoError").hide();
		}

		if (enteredbankname == "") {
			$(".banknameError").show();
			isValid = false;
		} else {
			$(".banknameError").hide();
		}

		if (!ifscRegex.test(enteredIFSCCode)) {
			$(".IFSCCodeerror").html("Please enter valid IFSC code.");
			$(".IFSCCodeerror").show();
			isValid = false;
		} else {
			$(".IFSCCodeerror").hide();
		}

		if (enteredBranch == "") {
			$(".branchError").show();
			isValid = false;
		} else {
			$(".branchError").hide();
		}

		if (enteredcityValue == "") {
			$(".cityValueError").show();
			isValid = false;
		} else {
			$(".cityValueError").hide();
		}

		var postData = {
			firstName: enteredFirstname,
			lastName: null,
			middleName: null,
			fatherName: enteredFathername,
			dob: enteredDateofbirth,
			loanRequestAmount: enteredLoanAmount,
			panNumber: enteredPanNumber,
			address: enteredresidenceAddress,
			permanentAddress: enteredpermanentAddress,
			userName: enteredname,
			accountNumber: enteredaccountno,
			ifscCode: enteredIFSCCode,
			bankName: enteredbankname,
			branchName: enteredBranch,
			bankAddress: enteredcityValue,
			//"modeOfTransactions":enteredModeofTransactions,
			pinCode: enteredpincode,
			city: enteredcity,
			state: enteredstate,
			locality: enteredLocation,
			employment: enteredemploymentType,
			companyName: enteredcompany,
			workExperience: enteredtotalexperience,
			salary: enteredsalary,
			facebookUrl: enteredFacebookurl,
			linkedinUrl: enteredLinkedinurl,
			twitterUrl: enteredTwitterurl,
		};
		var postData = JSON.stringify(postData);
		let regUrl = "";

		if (userisIn == "local") {
			regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/profile/" +
				userId +
				"";
		} else {
			regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/profile/" + userId + "";
		}
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-personalprofileSuccess").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$("#lendernewprofile").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredFirstname = $("#firstnamevalue").val();
		var middlename = $("#middletname").val();
		var enteredLastname = $("#lastnamevalue").val();
		var enteredPanNumber = $("#pannumber").val();
		var enteredDateofbirth = $("#dateofbirth").val();
		var enteredFathername = $("#fathername").val();
		var enteredbmobileNumber = $("#bmobileNumber").val();
		var enteredemailValue = $("#emailValue").val();
		var enteredpermanentAddress = $("#permanentAddress").val();
		var enteredresidenceAddress = $("#residenceAddress").val();
		var enteredpincode = $("#pincode").val();
		//var enteredcity= $("#city").val();
		var enteredstate = $("#state").val();
		var enteredLocation = $("#localityValue").val();

		var enteredname = $("#name").val();
		var enteredaccountno = $("#accountno").val();
		var enteredbankname = $("#bankname").val();
		var enteredIFSCCode = $(".IFSCCode").val();
		var enteredBranch = $("#Branch").val();
		var enteredcityValue = $("#cityValue").val();

		if ($("#lendercityValue").val() == "Other") {
			var enteredcity = $("#lenderothers").val();
		} else {
			var enteredcity = $("#lendercityValue").val();
		}

		var enteredFacebookurl = $("#facebookUrl").val();
		var enteredLinkedinurl = $("#linkedinUrl").val();
		var enteredTwitterurl = $("#twitterUrl").val();

		// var ifscRegex = /^[A-Z]{4}\d{7}$/i;
		var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;
		var panRegex = /[A-Z]{5}\d{4}[A-Z]{1}/;
		var emailreg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

		enteredFirstname = enteredFirstname.trim();
		middlename = middlename.trim();
		enteredLastname = enteredLastname.trim();
		enteredPanNumber = enteredPanNumber.trim();
		enteredFathername = enteredFathername.trim();

		var isValid = true;

		if (enteredFirstname == "") {
			$(".firstnameerror").show();
			isValid = false;
		} else {
			$(".firstnameerror").hide();
		}

		// if (enteredLastname == "") {
		// 	$(".lastnameerror").show();
		// 	isValid = false;
		// } else {
		// 	$(".lastnameerror").hide();
		// }

		if (!panRegex.test(enteredPanNumber)) {
			$(".pannumbererror").html("Please enter valid Pan Number.");
			$(".pannumbererror").show();
			$("#pannumber").attr("readonly", false);
			isValid = false;
		} else {
			$(".pannumbererror").hide();
		}

		if (enteredDateofbirth == "") {
			$(".dateofbirtherror").show();
			isValid = false;
		} else {
			$(".dateofbirtherror").hide();
		}

		if (enteredFathername == "") {
			$(".fathernameerror").show();
			isValid = false;
		} else {
			$(".fathernameerror").hide();
		}

		if (enteredbmobileNumber == "") {
			$(".mobileNumbererror").show();
			isValid = false;
		} else {
			$(".mobileNumbererror").hide();
		}

		// if (enteredemailValue == "") {
		// 	$(".emailValueerror").show();
		// 	isValid = false;
		// } else {
		// 	$(".emailValueerror").hide();
		// }

		if (enteredpermanentAddress == "") {
			$(".permanentAddressError").show();
			isValid = false;
		} else {
			$(".permanentAddressError").hide();
		}

		if (enteredresidenceAddress == "") {
			$(".residenceAddressError").show();
			isValid = false;
		} else {
			$(".residenceAddressError").hide();
		}

		if (enteredpincode == "") {
			$(".pincodeError").show();
			isValid = false;
		} else {
			$(".pincodeError").hide();
		}

		if (enteredcity == "") {
			$(".cityError").show();
			isValid = false;
		} else {
			$(".cityError").hide();
		}

		if (enteredname == "") {
			$(".nameError").show();
			isValid = false;
		} else {
			$(".nameError").hide();
		}

		if (enteredaccountno == "") {
			$(".accountnoError").show();
			isValid = false;
		} else {
			$(".accountnoError").hide();
		}

		if (enteredbankname == "") {
			$(".banknameError").show();
			isValid = false;
		} else {
			$(".banknameError").hide();
		}

		if (!ifscRegex.test(enteredIFSCCode)) {
			$(".IFSCCodeerror").html("Please enter valid IFSC code.");
			$(".IFSCCodeerror").show();
			isValid = false;
		} else {
			$(".IFSCCodeerror").hide();
		}
		if (enteredBranch == "") {
			$(".branchError").show();
			isValid = false;
		} else {
			$(".branchError").hide();
		}

		if (enteredcityValue == "") {
			$(".cityValueError").show();
			isValid = false;
		} else {
			$(".cityValueError").hide();
		}

		if (!enteredemailValue.match(emailreg)) {
			$(".emailError").show();
			isValid = false;
		} else {
			$(".emailError").hide();
		}

		//alert(enteredemploymentType);

		//return isValid;

		var postData = {
			firstName: enteredFirstname,
			lastName: enteredLastname,
			middleName: middlename,
			fatherName: enteredFathername,
			dob: enteredDateofbirth,
			panNumber: enteredPanNumber,
			address: enteredresidenceAddress,
			permanentAddress: enteredpermanentAddress,
			pinCode: enteredpincode,
			city: enteredcity,
			state: enteredstate,
			locality: enteredLocation,
			userName: enteredname,
			accountNumber: enteredaccountno,
			ifscCode: enteredIFSCCode,
			bankName: enteredbankname,
			branchName: enteredBranch,
			bankAddress: enteredcityValue,
			facebookUrl: enteredFacebookurl,
			linkedinUrl: enteredLinkedinurl,
			twitterUrl: enteredTwitterurl,
		};
		var postData = JSON.stringify(postData);
		//console.log(postData);

		let regUrl = "";
		if (userisIn == "local") {
			regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/profile/" +
				userId +
				"";
		} else {
			regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/profile/" + userId + "";
		}
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-personalprofileSuccess").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
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

	$("#myparticipation").on("keyup", function (e) {
		calcProfitValue();
	});

	$("#pincode").on("keyup", function (e) {
		//$("#city").val("");
		$("#state").val("");
		var $this = $(this);
		if ($this.val().length == 6) {
			var pincode = $("#pincode").val();
			//var getStatUrl = "http://35.154.48.120:8080/oxynew/v1/user/"+pincode+"/pincode";
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
						// $("#city").val(data.city);
						$("#state").val(data.state);

						// $("#lendercityValue-error").html("")  ;
						// $("#lendercityValue").removeClass("error");
					} else {
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
			});
		}
	});

	/********** borrower-profile************/
	$("#city").on("change", function () {
		if ($("#city").val() == "Other") {
			$("#others").show();
		} else {
			$("#others").hide();
		}
	});

	$("#borrower-profile-btn").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredFirstname = $("#firstnamevalue").val();
		var middlename = $("#middletname").val();
		var enteredLastname = $("#lastnamevalue").val();
		var enteredPanNumber = $("#pannumber").val();
		var enteredDateofbirth = $("#dateofbirth").val();
		var enteredFathername = $("#fathername").val();
		var enteredbmobileNumber = $("#bmobileNumber").val();
		var enteredemailValue = $("#emailValue").val();
		var enteredLoanAmount = $("#select-beast").val();
		let enteredemploymentType = $("input[name=option-1]:checked").val();

		var enteredpermanentAddress = $("#permanentAddress").val();
		var enteredresidenceAddress = $("#residenceAddress").val();
		var enteredpincode = $("#pincode").val();
		var enteredcity = $("#city").val();
		var enteredstate = $("#state").val();
		var enteredLocation = $("#localityValue").val();
		var bwhatsAppNumber = $("#lwhatsAppNumber").val();
		var aadharNumber = $("#adharcardNo").val();

		if ($("input[name=option-1]:checked").val() == "SALARIED") {
			var enteredtotalexperience = $("#totalexperience").val();
			var enteredcompany = $("#company").val();
			var enteredsalary = $("#salary").val();
			enteredemploymentType = "SALARIED";
			var studentOrNot = "false";
		} else if ($("input[name=option-1]:checked").val() == "SELFEMPLOYED") {
			var enteredtotalexperience = $("#experience").val();
			var enteredcompany = $("#companyName").val();
			var enteredsalary = $("#salaryAmount").val();
			enteredemploymentType = "SELFEMPLOYED";
			var studentOrNot = "false";
		} else {
			var studentOrNot = "true";
			enteredemploymentType = "SALARIED";
		}

		if ($("#city").val() == "Other") {
			var enteredcity = $("#others").val();
		} else {
			var enteredcity = $("#city").val();
		}
		var enteredFacebookurl = $("#facebookUrl").val();
		var enteredLinkedinurl = $("#linkedinUrl").val();
		var enteredTwitterurl = $("#twitterUrl").val();

		var panRegex = /[A-Z]{5}\d{4}[A-Z]{1}/;
		var emailreg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

		enteredFirstname = enteredFirstname.trim();
		middlename = middlename.trim();
		enteredLastname = enteredLastname.trim();
		enteredPanNumber = enteredPanNumber.trim();
		enteredFathername = enteredFathername.trim();
		enteredPanNumber = enteredPanNumber.toUpperCase();

		var employmentType = document.getElementsByName("option-1");
		var modeofTransactions = document.getElementsByName("option-2");
		var emp = false;
		// var mot= false;
		var isValid = true;

		if (enteredFirstname == "") {
			$(".firstnameerror").show();
			isValid = false;
		} else {
			$(".firstnameerror").hide();
		}

		if (!panRegex.test(enteredPanNumber)) {
			$(".pannumbererror").html("Please enter valid Pan Number.");
			$(".pannumbererror").show();
			isValid = false;
		} else {
			$(".pannumbererror").hide();
		}

		if (enteredDateofbirth == "") {
			$(".dateofbirtherror").show();
			isValid = false;
		} else {
			$(".dateofbirtherror").hide();
		}

		if (enteredFathername == "") {
			$(".fathernameerror").show();
			isValid = false;
		} else {
			$(".fathernameerror").hide();
		}

		if (enteredbmobileNumber == "") {
			$(".mobileNumbererror").show();
			isValid = false;
		} else {
			$(".mobileNumbererror").hide();
		}

		if (!enteredemailValue.match(emailreg)) {
			$(".emailValueerror").show();
			isValid = false;
		} else {
			$(".emailValueerror").hide();
		}

		if (enteredLoanAmount == "") {
			$(".loanamounterror").show();
			isValid = false;
		} else if (enteredLoanAmount >= 1000001) {
			$(".loanAmounterror").hide();
			$(".loanAmounterrorabove").show();
			isValid = false;
		} else {
			$(".loanamounterror").hide();
		}

		if (enteredemploymentType == "option-1") {
			$(".employmentError").show();
			isValid = false;
		} else {
			$(".employmentError").hide();
		}

		var i = 0;
		for (var i = 0; i < employmentType.length; i++) {
			if (employmentType[i].checked == true) {
				emp = true;
			}
		}
		if (!emp) {
			$(".employmentError").show();
			isValid = false;
		} else {
			$(".employmentError").hide();
		}

		if (enteredtotalexperience == "") {
			$(".totalexperienceError").show();
			isValid = false;
		} else {
			$(".totalexperienceError").hide();
		}

		if (enteredcompany == "") {
			$(".companyError").show();
			isValid = false;
		} else {
			$(".companyError").hide();
		}

		if (enteredsalary == "") {
			$(".salaryError").show();
			isValid = false;
		} else {
			$(".salaryError").hide();
		}

		if (enteredpermanentAddress == "") {
			$(".permanentAddressError").show();
			isValid = false;
		} else {
			$(".permanentAddressError").hide();
		}

		if (enteredresidenceAddress == "") {
			$(".residenceAddressError").show();
			isValid = false;
		} else {
			$(".residenceAddressError").hide();
		}

		if (enteredpincode == "") {
			$(".pincodeError").show();
			isValid = false;
		} else {
			$(".pincodeError").hide();
		}

		if (enteredcity == "") {
			$(".cityError").show();
			isValid = false;
		} else {
			$(".cityError").hide();
		}

		var postData = {
			firstName: enteredFirstname,
			lastName: null,
			middleName: null,
			fatherName: enteredFathername,
			dob: enteredDateofbirth,
			loanRequestAmount: enteredLoanAmount,
			panNumber: enteredPanNumber,
			address: enteredresidenceAddress,
			permanentAddress: enteredpermanentAddress,
			//"modeOfTransactions":enteredModeofTransactions,
			pinCode: enteredpincode,
			city: enteredcity,
			state: enteredstate,
			locality: enteredLocation,
			employment: enteredemploymentType,
			companyName: enteredcompany,
			workExperience: enteredtotalexperience,
			salary: enteredsalary,
			facebookUrl: enteredFacebookurl,
			linkedinUrl: enteredLinkedinurl,
			twitterUrl: enteredTwitterurl,
			whatsAppNumber: bwhatsAppNumber,
			studentOrNot: studentOrNot,
			aadharNumber: aadharNumber,
			//    education:enteredEducation,
			// passion:enteredPassion
		};

		var postData = JSON.stringify(postData);

		//regUrl = baseUrl+"v1/user/personal/"+userId+"";
		let regUrl = "";

		if (userisIn == "local") {
			regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/personal/" +
				userId +
				"";
		} else {
			regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/personal/" + userId + "";
		}
		console.log(regUrl);
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#headingTwo a").trigger("click");
					$("#modal-profileSuccess").modal("show");
					// setTimeout(function (argument) {
					// 	window.location.reload();
					// }, 3000);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	/************ lender profile ************/

	$("#city").on("change", function () {
		if ($("#city").val() == "Other") {
			$("#lenderothers").show();
		} else {
			$("#lenderothers").hide();
		}
	});

	$("#lender-profile-btn").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredFirstname = $("#firstnamevalue").val();
		var middlename = $("#middletname").val();
		var enteredLastname = $("#lastnamevalue").val();
		var enteredPanNumber = $("#pannumber").val();
		var enteredDateofbirth = $("#dateofbirth").val();
		var enteredFathername = $("#fathername").val();
		var enteredbmobileNumber = $("#bmobileNumber").val();
		var enteredemailValue = $("#emailValue").val();
		var enteredpermanentAddress = $("#permanentAddress").val();
		var enteredresidenceAddress = $("#residenceAddress").val();
		var enteredpincode = $("#pincode").val();
		var enteredcity = $("#city").val();
		var enteredstate = $("#state").val();
		var enteredLocation = $("#localityValue").val();
		var lwhatsAppNumber = $("#lwhatsAppNumber").val();
		var aadharNumber = $("#adharcardNo").val();
		enteredPanNumber = enteredPanNumber.toUpperCase();
		enteredPanNumber = enteredPanNumber.trim();

		if (enteredcity == "Other") {
			var enteredcity = $("#lenderothers").val();
		}

		var enteredFacebookurl = $("#facebookUrl").val();
		var enteredLinkedinurl = $("#linkedinUrl").val();
		var enteredTwitterurl = $("#twitterUrl").val();

		var panRegex = /[A-Z]{5}\d{4}[A-Z]{1}/;
		var emailreg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

		middlename = middlename.trim();
		// enteredLastname = enteredLastname.trim();
		enteredPanNumber = enteredPanNumber.trim();
		enteredFathername = enteredFathername.trim();

		var isValid = true;

		if (enteredFirstname == "") {
			$(".firstnameerror").show();
			isValid = false;
		} else {
			$(".firstnameerror").hide();
		}

		if (aadharNumber == "") {
			isValid = true;
		} else if (aadharNumber.length > 0 && aadharNumber.length < 12) {
			$(".adharnumbererror").html("Aadhar Number Should Be 12 Degits");
			$(".adharnumbererror").show();
			isValid = false;
		} else if (aadharNumber.length > 0 && aadharNumber.length > 12) {
			$(".adharnumbererror").html("Aadhar Number Should Be 12 Degits");
			$(".adharnumbererror").show();
			isValid = false;
		}

		if (!panRegex.test(enteredPanNumber)) {
			$(".pannumbererror").html("Please enter valid Pan Number.");
			$(".pannumbererror").show();
			$("#pannumber").attr("readonly", false);
			isValid = false;
		} else {
			$(".pannumbererror").hide();
		}

		if (enteredDateofbirth == "") {
			$(".dateofbirtherror").show();
			isValid = false;
		} else {
			$(".dateofbirtherror").hide();
		}

		if (enteredFathername == "") {
			$(".fathernameerror").show();
			isValid = false;
		} else {
			$(".fathernameerror").hide();
		}

		if (enteredbmobileNumber == "") {
			$(".mobileNumbererror").show();
			isValid = false;
		} else if (enteredbmobileNumber.length < 10) {
			$(".mobileNumbererror").html("mobile number should be 10 degits");
			$(".mobileNumbererror").show();
			isValid = false;
		} else {
			$(".mobileNumbererror").hide();
		}

		if (!enteredemailValue.match(emailreg)) {
			$(".emailError").show();
			isValid = false;
		} else {
			$(".emailError").hide();
		}

		if (enteredpermanentAddress == "") {
			$(".permanentAddressError").show();
			isValid = false;
		} else {
			$(".permanentAddressError").hide();
		}

		if (enteredresidenceAddress == "") {
			$(".residenceAddressError").show();
			isValid = false;
		} else {
			$(".residenceAddressError").hide();
		}

		if (enteredpincode == "") {
			$(".pincodeError").show();
			isValid = false;
		} else {
			$(".pincodeError").hide();
		}

		if (enteredcity == "") {
			$(".cityError").show();
			isValid = false;
		} else {
			$(".cityError").hide();
		}

		var postData = {
			firstName: enteredFirstname,
			lastName: enteredLastname,
			middleName: middlename,
			fatherName: enteredFathername,
			dob: enteredDateofbirth,
			panNumber: enteredPanNumber,
			address: enteredresidenceAddress,
			permanentAddress: enteredpermanentAddress,
			pinCode: enteredpincode,
			city: enteredcity,
			state: enteredstate,
			locality: enteredLocation,
			facebookUrl: enteredFacebookurl,
			linkedinUrl: enteredLinkedinurl,
			twitterUrl: enteredTwitterurl,
			whatsAppNumber: lwhatsAppNumber,
			aadharNumber: aadharNumber,
			// education:enteredEducation,
			// passion:enteredPassion
		};

		var postData = JSON.stringify(postData);

		console.log(postData);
		//regUrl = baseUrl+"v1/user/personal/"+userId+"";

		if (userisIn == "local") {
			var regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/personal/" +
				userId +
				"";
		} else {
			var regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/personal/" + userId + "";
		}

		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#headingTwo a").trigger("click");
					$("#modal-profileSuccess").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$(document).ready(function () {
		$("#user-otp-btn").click(function () {
			$(".userbank_verifyData").append('<div class="loader"></div>');
			$(".userbank_verifyData").addClass("lildark");

			suserId = getCookie("sUserId");
			sprimaryType = getCookie("sUserType");
			saccessToken = getCookie("saccessToken");

			var mobileno = $("#otpmobileno").val();

			var isValid = true;

			if (mobileno == "") {
				$(".mobileError").show();
				isValid = false;
			} else {
				$(".mobileError").hide();
			}

			var postData = {
				mobileNumber: mobileno,
			};
			var postData = JSON.stringify(postData);

			if (userisIn == "local") {
				validate =
					"http://35.154.48.120:8080/oxynew/v1/user/sendMobileOtp ";
			} else {
				validate =
					"https://fintech.oxyloans.com/oxyloans/v1/user/sendMobileOtp ";
			}

			if (isValid == true) {
				$.ajax({
					url: validate,
					type: "POST",
					data: postData,
					contentType: "application/json",
					dataType: "json",
					success: function (data, textStatus, xhr) {
						$("#mobileOtpHidden").val(data.mobileOtpSession);

						setTimeout(function () {
							$(".userbank_verifyData").removeClass("lildark");
							$(".userbank_verifyData .loader").remove();
							$("#user-otp-btn").html("Resend Otp");
							$(".mobileotpinput").attr("readonly", false);
							$(".MobileOtpsec").show();
							$(".mobileotpinput")
								.fadeOut(400)
								.fadeIn(400)
								.fadeOut(400)
								.fadeIn(400);
						}, 3000);

						// $("#user-otp-btn").attr("disabled", true);
						$("#user-bank-verify").show();
					},
					error: function (xhr, textStatus, errorThrown) {
						console.log("error");
						setTimeout(function () {
							$(".userbank_verifyData").removeClass("lildark");
							$(".userbank_verifyData .loader").remove();
						}, 3000);
						$("#user-otp-btn").attr("disabled", false);
					},
					beforeSend: function (xhr) {
						xhr.setRequestHeader("accessToken", saccessToken);
					},
				});
			}
			setTimeout(function () {
				$(".userbank_verifyData").removeClass("lildark");
				$(".userbank_verifyData .loader").remove();
			}, 3000);

			return isValid;
		});
	});

	$(document).ready(function () {
		$("#user-bank-verify").click(function () {
			$(".userbank_verifyData").append('<div class="loader"></div>');
			$(".userbank_verifyData").addClass("lildark");

			suserId = getCookie("sUserId");
			sprimaryType = getCookie("sUserType");
			saccessToken = getCookie("saccessToken");
			userId = suserId;
			primaryType = sprimaryType;
			accessToken = saccessToken;

			var enteredaccountno = $("#accountno").val();
			var enteredIFSCCode = $("#bankifscCode").val();
			var enteredconfirmaccountno = $("#confirmaccountno").val();
			enteredIFSCCode = enteredIFSCCode.toUpperCase();
			enteredIFSCCode = enteredIFSCCode.trim();

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
								$(".userbank_verifyData").removeClass("lildark");
								$(".userbank_verifyData .loader").remove();
							}, 3000);

							bankVerifyingSTATUS = "SUCCESS";
							$(
								".bankCity,.bankBranch,.bankName,.bankUserName,#user-bank-btn"
							).show();
							$(".fetchUsername").val(data.data.nameAtBank);
							$(".fetchBankName").val(data.data.bankName);
							$(".fetchBranch").val(data.data.branch);
							$(".fetchBankCity").val(data.data.city);

							$("#user-bank-btn").show();
						} else {
							setTimeout(function () {
								$(".userbank_verifyData").removeClass("lildark");
								$(".userbank_verifyData .loader").remove();
							}, 3000);

							$(".bankCity,.bankBranch,.bankName,.bankUserName").show();
							$("#user-bank-btn").hide();
							alert("please  Enter the valid bank details");
							bankVerifyingSTATUS = "FAILED";
							$("#user-bank-verify").attr("disabled", false);
						}
					},
					error: function (xhr, textStatus, errorThrown) {
						console.log("error");

						$("#user-bank-verify").attr("disabled", false);
						setTimeout(function () {
							$(".userbank_verifyData").removeClass("lildark");
							$(".userbank_verifyData .loader").remove();
						}, 3000);
					},
					beforeSend: function (xhr) {
						xhr.setRequestHeader("accessToken", saccessToken);
					},
				});
			}
			setTimeout(function () {
				$(".userbank_verifyData").removeClass("lildark");
				$(".userbank_verifyData .loader").remove();
			}, 3000);

			return isValid;
		});
	});

	/****************** User REFERRENCE Details ********************/

	$("#user-bank-btn").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var enteredname = $("#name").val();
		var enteredaccountno = $("#accountno").val();
		var enteredconfirmaccountno = $("#confirmaccountno").val();
		var enteredbankname = $("#bankname").val();
		var enteredIFSCCode = $(".IFSCCode").val();
		var enteredBranch = $("#Branch").val();
		var enteredcityValue = $("#cityValue").val();
		var enteredOtp = $("#mobileotpinput").val();
		var enteredOtpSession = $("#mobileOtpHidden").val();

		var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;

		var isValid = true;

		if (enteredname == "") {
			$(".nameError").show();
			isValid = false;
		} else {
			$(".nameError").hide();
		}

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
		if (enteredbankname == "") {
			$(".banknameError").show();
			isValid = false;
		} else {
			$(".banknameError").hide();
		}

		if (!ifscRegex.test(enteredIFSCCode)) {
			$(".IFSCCodeerror").html("Please enter valid IFSC code.");
			$(".IFSCCodeerror").show();
			isValid = false;
		} else {
			$(".IFSCCodeerror").hide();
		}

		if (enteredBranch == "") {
			$(".branchError").show();
			isValid = false;
		} else {
			$(".branchError").hide();
		}

		if (enteredcityValue == "") {
			$(".cityValueError").show();
			isValid = false;
		} else {
			$(".cityValueError").hide();
		}

		if (citizenship == "NRI") {
			enteredOtp = null;
			enteredOtpSession = null;
		} else {
			if (enteredOtp == "") {
				$(".otperrormessage").show();
				isValid = false;
			} else {
				$(".otperrormessage").hide();
			}

			if (enteredOtpSession == "") {
				alert("Something went wrong please try again mobile otp session");
				isValid = false;
			}
		}

		var postData = {
			userName: enteredname,
			accountNumber: enteredaccountno,
			ifscCode: enteredIFSCCode,
			bankName: enteredbankname,
			branchName: enteredBranch,
			bankAddress: enteredcityValue,
			confirmAccountNumber: enteredconfirmaccountno,
			mobileOtpSession: enteredOtpSession,
			mobileOtp: enteredOtp,
			// mobileotpinput:true,
			updateBankDetails: true,
		};
		var postData = JSON.stringify(postData);

		let regUrl = "";

		if (userisIn == "local") {
			regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/personal/" +
				userId +
				"";
		} else {
			regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/personal/" + userId + "";
		}
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#headingThree a").trigger("click");
					$("#modal-bankSuccess").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					if (arguments[0].responseJSON.errorCode == 130) {
						$(".modal-body-profil .notupdate").html(
							arguments[0].responseJSON.errorMessage
						);
						$("#modal-profilesession-not-update").modal("show");
					} else {
						setTimeout(function (argument) {
							alert("data not uploaded pls try again");
							window.location.reload();
						}, 3000);
					}
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
});

setTimeout(function (argument) {
	$(document).ready(function () {
		$("#studentUniversity,#studentLocation,#studentCountry").focusout(function (
			e
		) {
			suserId = getCookie("sUserId");
			sprimaryType = getCookie("sUserType");
			saccessToken = getCookie("saccessToken");
			userId = suserId;
			primaryType = sprimaryType;
			accessToken = saccessToken;

			var universityname = $("#studentUniversity").val();
			var universityLocation = $("#studentLocation").val();
			var universityCountry = $("#studentCountry").val();
			var usertype = $("input[name=option-1]:checked").val();

			var isValid = true;

			if (universityname == "") {
				$(".StudentUniversityError").show();
				isValid = false;
			} else {
				$(".StudentUniversityError").hide();
			}

			if (universityLocation == "") {
				$(".studentLocationError").show();
				isValid = false;
			} else {
				$(".studentLocationError").hide();
			}

			if (universityCountry == "") {
				$(".studentUniversityError").show();
				isValid = false;
			} else {
				$(".studentUniversityError").hide();
			}

			if (
				usertype == "true" &&
				universityname != "" &&
				universityLocation != "" &&
				universityCountry != ""
			) {
				var postData = {
					userId: suserId,
					country: universityCountry,
					universityName: universityname,
					location: universityLocation,
				};

				var postData = JSON.stringify(postData);

				if (userisIn == "local") {
					var studentUrl =
						"http://35.154.48.120:8080/oxynew/v1/user/student_info";
				} else {
					var studentUrl =
						"https://fintech.oxyloans.com/oxyloans/v1/user/student_info";
				}
				if (isValid == true) {
					$.ajax({
						url: studentUrl,
						type: "PATCH",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							console.log("function is success");
						},
						error: function (xhr, textStatus, errorThrown) {
							if (arguments[0].responseJSON.errorCode == 130) {
								$(".modal-body-profil .notupdate").html(
									arguments[0].responseJSON.errorMessage
								);
								$("#modal-profilesession-not-update").modal("show");
							} else {
								setTimeout(function (argument) {
									alert("data not uploaded pls try again");
									window.location.reload();
								}, 3000);
							}
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				}
			}

			return isValid;
		});
	});
}, 2000);

function loadpersonalallDetails() {
	$(".loadingSec").attr("style", "display:block");
	$("#modal-Kyc-NotUpdated-Lender").modal("hide");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	$(".displayFormElements").hide();
	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/personal/" +
			id +
			"";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/personal/" + id + "";
	}
	setTimeout(function () {
		//alert(userpersonalinfo +" "+ userbankDetailsInfo);

		if (userpersonalinfo == true && userbankDetailsInfo == false) {
			$("#headingTwo a").trigger("click");
			$(".displayBankDetailsErrorIfnot").show();
			$(".displayBankDetailsErrorIfnot").attr("style", "width:50%!important");
		} else {
			$(".displayBankDetailsErrorIfnot").hide();
			//$("#headingTwo h4 a:after").attr("style", "top:-3px");
		}

		if (
			userpersonalinfo == true &&
			userbankDetailsInfo == true &&
			userkycStatus == false
		) {
			$("#headingThree a").trigger("click");
			$("#modal-Kyc-NotUpdated-Lender").modal("hide");
			$(".displayKYCDetailsErrorIfnot").show();
		} else if (
			userpersonalinfo == true &&
			userbankDetailsInfo == true &&
			userkycStatus == true
		) {
			$("#referrenceDetails a").trigger("click");
		} else if (
			userpersonalinfo == true &&
			userbankDetailsInfo == true &&
			userkycStatus == false
		) {
			$(".displayKYCDetailsErrorIfnot").show();
		}

		$.ajax({
			url: getStatUrl,
			type: "GET",
			success: function (data, textStatus, xhr) {
				console.log(data);
				if (
					data.bankDetailsVerifiedStatus == true &&
					data.citizenship == "NONNRI"
				) {
					$(
						".bankCity,.bankBranch,.bankName,.bankUserName,#user-bank-btn"
					).show();

					$("#user-bank-verify").hide();
					$("#user-bank-btn").hide();
				} else if (
					data.bankDetailsVerifiedStatus == true &&
					data.citizenship == "NRI"
				) {
					$(
						".bankCity,.bankBranch,.bankName,.bankUserName,#user-bank-btn"
					).show();
					$("#user-otp-btn").hide();
					$("#user-bank-verify").hide();
					$("#user-bank-btn").show();
				} else if (
					data.bankDetailsVerifiedStatus == false &&
					data.citizenship == "NRI"
				) {
					$(
						".bankCity,.bankBranch,.bankName,.bankUserName,#user-bank-btn"
					).show();
					$("#user-otp-btn").hide();
					$("#user-bank-verify").hide();
					$("#user-bank-btn").show();
				}

				$("#firstnamevalue").val(data.firstName);
				$("#lastnamevalue").val(data.lastName);
				$("#middlename").val(data.middleName);
				$("#pannumber").val(data.panNumber != "" ? data.panNumber.trim() : "");
				$("#dateofbirth").val(data.dob);
				$("#fathername").val(data.fatherName);
				$("#bmobileNumber,#otpmobileno").val(data.mobileNumber);
				$("#lwhatsAppNumber").val(
					data.whatsAppNumber != null ? data.whatsAppNumber: ""
				);
				$("#emailValue").val(data.email);
				$("#select-beast").val(data.loanRequestAmount);
				$("#select-beast-selectized").val(data.loanRequestAmount);
				$("#residenceAddress").val(data.address);
				$("#permanentAddress").val(data.permanentAddress);
				$("#studentUniversity").val(data.universityName);
				$("#studentLocation").val(data.location);
				$("#studentCountry").val(data.country);
				$("#adharcardNo").val(data.aadharNumber);

				if (
					data.city != "Hyderabad" ||
					data.city != "Bangalore" ||
					data.city != "Mumbai" ||
					data.city != "Delhi" ||
					data.city != "Kolkata" ||
					data.city != "Chennai" ||
					data.city != "Pune" ||
					data.city != "Visakhapatnam" ||
					data.city != "Vijayawada"
				) {
					$("#city").append(
						'<option value="' + data.city + '">' + data.city + "</option>"
					);
					$("#city").val(data.city);
				} else {
					$("#city").val(data.city);
				}

				$("#state").val(data.state);
				$("#pincode").val(data.pinCode);
				$("#name").val(data.userName);
				$("#accountno").val(data.accountNumber);
				$(".IFSCCode").val(data.ifscCode);
				$("#bankname").val(data.bankName);
				$("#Branch").val(data.branchName);
				$("#confirmaccountno").val(data.ifscCode);
				$("#cityValue").val(data.bankAddress);

				var userEmpType = data.employment;

				if (userEmpType === "SALARIED") {
					$("#totalexperience").val(data.workExperience);
					$("#company").val(data.companyName);
					$("#salary").val(data.salary);
				} else if (userEmpType === "SELFEMPLOYED") {
					$("#experience").val(data.workExperience);
					$("#companyName").val(data.companyName);
					$("#salaryAmount").val(data.salary);
				}

				if (userEmpType === "SALARIED" && data.studentOrNot == false) {
					$("#salDiv").addClass("form_radio_block1_show");
					$("#selfDiv").removeClass("form_radio_block1_show");
					$("#studentDiv").removeClass("form_radio_block1_show");
				} else if (
					userEmpType === "SELFEMPLOYED" &&
					data.studentOrNot == false
				) {
					$("#selfDiv").addClass("form_radio_block1_show");
					$("#salDiv").removeClass("form_radio_block1_show");
					$("#studentDiv").removeClass("form_radio_block1_show");
				} else {
					$("#studentDiv").addClass("form_radio_block1_show");
					$("#salDiv").removeClass("form_radio_block1_show");
					$("#selfDiv").removeClass("form_radio_block1_show");

					$(".isstudent_docs").show();
					$(".is_Noraml_user").hide();
				}

				if (
					data.panNumber != null &&
					data.panNumber != "" &&
					sprimaryType == "BORROWER"
				) {
					$("#pannumber").attr("readonly", true);
				} else if (
					data.panNumber != null &&
					data.panNumber != "" &&
					sprimaryType == "LENDER"
				) {
					$("#pannumber").attr("readonly", true);
				}

				if (
					data.aadharNumber != null &&
					data.aadharNumber != "" &&
					sprimaryType == "BORROWER"
				) {
					$("#adharcardNo").attr("readonly", true);
				} else if (
					data.aadharNumber != null &&
					data.aadharNumber != "" &&
					sprimaryType == "LENDER"
				) {
					$("#adharcardNo").attr("readonly", true);
				}

				var $employmentRadio = $("input:radio[name=option-1]");
				if ($employmentRadio.is(":checked") === false) {
					if (
						(data.studentOrNot == true || data.studentOrNot == "true") &&
						data.employment == "SALARIED"
					) {
						$employmentRadio
							.filter("[value=" + data.studentOrNot + "]")
							.prop("checked", true);
						isStudent = true;
					} else {
						$employmentRadio
							.filter("[value=" + data.employment + "]")
							.prop("checked", true);
					}
				}

				var $modeOfTransactionsRadio = $("input:radio[name=option-2]");
				if ($modeOfTransactionsRadio.is(":checked") === false) {
					$modeOfTransactionsRadio
						.filter("[value=" + data.modeOfTransactions + "]")
						.prop("checked", true);
				}

				$("#facebookUrl").val(data.urlsDto.faceBookUrl);
				$("#linkedinUrl").val(data.urlsDto.linkdinUrl);
				$("#twitterUrl").val(data.urlsDto.twitterUrl);

				var seletedcity = data.locality;
				var pincode = data.pinCode;

				if (userisIn == "local") {
					var pincode =
						"http://35.154.48.120:8080/oxynew/v1/user/" +
						pincode +
						"/pincode";
				} else {
					var pincode =
						"https://fintech.oxyloans.com/oxyloans/v1/user/" +
						pincode +
						"/pincode";
				}

				$.ajax({
					url: pincode,
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
						// alert(seletedcity)
						$("#localityValue").val(seletedcity);
					},
					error: function (xhr, textStatus, errorThrown) {
						console.log("Error Something");
					},
				});

				if (data.referenceDetailsResponseDto != null) {
					$("#ref_1").val(data.referenceDetailsResponseDto.reference1);
					$("#ref_2").val(data.referenceDetailsResponseDto.reference2);
					$("#ref_3").val(data.referenceDetailsResponseDto.reference3);
					$("#ref_4").val(data.referenceDetailsResponseDto.reference4);
					$("#ref_5").val(data.referenceDetailsResponseDto.reference5);
					$("#ref_6").val(data.referenceDetailsResponseDto.reference6);
					$("#ref_7").val(data.referenceDetailsResponseDto.reference7);
					$("#ref_8").val(data.referenceDetailsResponseDto.reference8);
				}
			},

			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}, 1000);
}

/* View EMI  starts*/

function getEMITABLE(loanId) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var getLoanId = loanId;
	if (userisIn == "local") {
		var updateEmiUrlCard =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/ADMIN/" +
			getLoanId +
			"/emicard";
	} else {
		var updateEmiUrlCard =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/" +
			getLoanId +
			"/emicard";
	}
	$.ajax({
		url: updateEmiUrlCard,
		type: "GET",
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			//alert(data);

			var template = document.getElementById("emiRecordsCallTpl").innerHTML;
			//console.log(template);
			Mustache.parse(template);

			var html = Mustache.to_html(template, { data: data.results });
			$("#displayEMIRecords").html(html);

			$("#modal-viewEMIBorrower").modal("show");
			$(".emiStatustrue").attr("disabled", "disabled");
		},
		statusCode: {
			400: function (response) {
				$("#modal-agreement-already").modal("show");
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadpaymentDetailsPage(loanId, EmmiNumber, id) {
	writeCookie("loanssquessequenceno", loanId);
	writeCookie("loansemsschedulenodd", EmmiNumber);
	writeCookie("primarykeyid", id);

	var flag = true;
	var partpaymentamount = $("#partPaymentinput" + id).val();
	$(".partPayAmounterror" + id).html("");
	if ($("#partPaymentCheckBox" + id).is(":checked")) {
		if (partpaymentamount.length == 0) {
			flag = false;
			$("#partPaymentinput").css("display", "block");
			$(".partPayAmounterror" + id).html("Please enter part pay amount.");
			$(".partPayAmounterror" + id).css("display", "block");
		} else if (!/^[0-9]+$/.test(partpaymentamount)) {
			flag = false;
			$(".partPayAmounterror" + id).html("Please enter numbers only.");
			$("#partPaymentinput").css("display", "block");
			$(".partPayAmounterror" + id).css("display", "block");
		} else {
			flag = true;
			$("#partPaymentinput").css("display", "none");
		}
	} else {
		$(".partPayAmounterror" + id).html("");
		$("#partPaymentinput" + id).val("");
	}
	if (flag) {
		writeCookie("partialpayamount", $("#partPaymentinput" + id).val());
		window.location.href = "onlinePayment";
	}
}

function fetchPaymentDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	userId = suserId;

	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	fName = "lenderUserId";
	var postData = {
		partPayAmount: getCookie("partialpayamount"),
		id: getCookie("primarykeyid"),
		loanId: getCookie("loanssquessequenceno"),
		emiNumber: getCookie("loansemsschedulenodd"),
	};

	writeCookie("loanssquessequenceno", "undefined");
	writeCookie("loansemsschedulenodd", "undefined");
	writeCookie("primarykeyid", "undefined");
	writeCookie("partialpayamount", "undefined");

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}
	var postData = JSON.stringify(postData);
	var returnURL = "";
	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/emaipay/fetchPaymentDetails";
		returnURL = "http://localhost/oxyloans-ui/enachMandateResponse";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/emaipay/fetchPaymentDetails";
		returnURL = "https://oxyloans.com/new/enachMandateResponse";
	}
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#key").val(data.key);
			$("#salt").val(data.salt);
			$("#txnid").val(data.txnid);
			$("#hash").val(data.hash);
			$("#amount").val(data.amount);
			$("#amount_display").html(data.amount);
			$("#fname").val(data.firstname);
			$("#fname_display").html(data.firstname);
			$("#email").val(data.email);
			$("#email_display").html(data.email);
			$("#mobile").val(data.phone);
			$("#mobile_display").html(data.phone);
			$("#pinfo").val(data.productinfo);
			$("#pinfo_display").html(data.productinfo);
			$("#udf5").val(data.udf5);
			$("#surl").val(data.surl);
			$("#furl").val(data.furl);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function updateTransactionStatus(
	transactionId,
	payUTransactionId,
	transactionSatus,
	amount
) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	if (userisIn == "local") {
		var updateEmiUrlCard =
			"http://35.154.48.120:8080/oxynew/v1/user/loan/" +
			transactionId +
			"/emipaidbyborrowerusingpaymentgateway";
	} else {
		var updateEmiUrlCard =
			"https://fintech.oxyloans.com/oxyloans/v1/user/loan/" +
			transactionId +
			"/emipaidbyborrowerusingpaymentgateway";
	}
	var postData = {
		comments: "emi from payment gateway",
		payuTransactionNumber: payUTransactionId,
		payuStatus: transactionSatus,
		partPayAmount: amount,
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: updateEmiUrlCard,
		type: "POST",
		contentType: "application/json",
		dataType: "json",
		data: postData,
		success: function (data, textStatus, xhr) {},
		statusCode: {
			400: function (response) {},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

/* Update EMI ends */

function viewBorrowerDoc(documenteType) {
	var borrowerUserID = $(".placeUserIDHere").attr("data-userID");
	var requestedDucmentType = documenteType;

	console.log(borrowerUserID + " " + documenteType);

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var doctype = doctype;

	if (userisIn == "local") {
		var getPAN =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			borrowerUserID +
			"/download/" +
			documenteType;
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			borrowerUserID +
			"/download/" +
			documenteType;
	}
	console.log(getPAN);
	$.ajax({
		url: getPAN,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				console.log(data.downloadUrl);
				// $('a.colorbox').colorbox();
				//window.open(data.downloadUrl,'_blank');
				var sourcePath = data.downloadUrl;
				var contentTypeCheck = ".pdf";

				if (sourcePath.indexOf(contentTypeCheck) != -1) {
					//alert('We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads.');
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

function favouriteThisBorrower() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var borrowerUserID = $(".placeUserIDHere").attr("data-userID");

	var lenderUserId = suserId;

	console.log(lenderUserId + "" + borrowerUserID);

	if (userisIn == "local") {
		var favouriteUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/favourite";
	} else {
		var favouriteUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/favourite";
	}

	var postData = {
		lenderUserId: lenderUserId,
		borrowerUserId: borrowerUserID,
		type: "FAVOURITE",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);
	$.ajax({
		url: favouriteUrl,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#favouriteBorrower").hide();
			$("#unfavouriteBorrower").show();
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function unfavouriteThisBorrower() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var borrowerUserID = $(".placeUserIDHere").attr("data-userID");

	var lenderUserId = suserId;

	console.log(lenderUserId + "" + borrowerUserID);

	if (userisIn == "local") {
		var favouriteUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/favourite";
	} else {
		var favouriteUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/favourite";
	}

	var postData = {
		lenderUserId: lenderUserId,
		borrowerUserId: borrowerUserID,
		type: "UNFAVOURITE",
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: favouriteUrl,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#favouriteBorrower").show();
			$("#unfavouriteBorrower").hide();
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadfavouriteBorrowers() {
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
			"/favouriteUsers";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/favouriteUsers";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",

		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			console.log(totalEntries);
			var template = document.getElementById("loanListiongsTpl").innerHTML;
			//console.log(template);
			Mustache.parse(template);
			//var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });

			//alert(html);
			$(".oxyScore-00").html("YTR");
			$("#loadloanListings").html(html);

			var displayPageNo = totalEntries / 9;
			displayPageNo = displayPageNo + 1;
			$(".borrowerLoanListingsPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading.

					if (userisIn == "local") {
						var getStatUrl =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							userId +
							"/favouriteUsers";
					} else {
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							userId +
							"/favouriteUsers";
					}
					$.ajax({
						url: getStatUrl,
						type: "GET",

						success: function (data, textStatus, xhr) {
							totalEntries = data.totalCount;
							console.log(totalEntries);
							var template =
								document.getElementById("loanListiongsTpl").innerHTML;
							//console.log(template);
							Mustache.parse(template);
							//var html = Mustache.render(template, data);
							var html = Mustache.to_html(template, {
								data: data.results,
							});

							//alert(html);
							$("#loadloanListings").html(html);
							$(".oxyScore-00").html("YTR");
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	// $(".loadingSec").hide();
}

function uploadScrowTransactionScreesShot(input) {
	console.log(input);
	$(".loadingSec").show();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(".panUpload .image-upload-wrap").hide();

			$(".panUpload .file-upload-image").attr("src", e.target.result);
			$(".panUpload .file-upload-content").show();
			// $('.panUpload .file-upload-image').attr('href', e.target.result);

			$(".panUpload .image-title").html(input.files[0].name);
		};

		reader.readAsDataURL(input.files[0]);

		var fd = new FormData();
		var files = input.files[0];
		//alert(fd);
		fd.append("TRANSACTIONSS", files);
		if (userisIn == "local") {
			var formUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				suserId +
				"/upload/lendertransactiondetails";
		} else {
			var formUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				suserId +
				"/upload/lendertransactiondetails";
		}
		$.ajax({
			url: formUrl,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					//$("#modal-fileUploadedSuccessfully").modal('show');
					$(".loadingSec").hide();
					var myfile = $("#pan").val();
					var filename = myfile.split("\\").pop();

					$(".transactiondetailsId").html(filename);

					$("#documnetId").val(data.documentId);
				} else {
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

function downLoadTransactionSS(doctype) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var doctype = doctype;
	var documnetId = $("#documnetId").val();
	if (userisIn == "local") {
		var getPAN =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/" +
			doctype +
			"/" +
			documnetId;
	} else {
		var getPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/" +
			doctype +
			"/" +
			documnetId;
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

				if (sourcePath.indexOf(contentTypeCheck) != -1) {
					//alert('We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads.');
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
$(document).ready(function () {
	$("#btnsrcrowtrn").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var accountNumber = $("#transactionaccountnumber").val();
		var transactionAmount = $("#transactionamount").val();
		var transactionDate = $("#transactiondatepicker").val();
		var documentUploadedId = $("#documnetId").val();

		accountNumber = accountNumber.trim();
		transactionAmount = transactionAmount.trim();

		var isValid = true;

		if (accountNumber == "") {
			$(".accountNumbererror").show();
			isValid = false;
		} else {
			$(".accountNumbererror").hide();
		}

		if (transactionAmount == "") {
			$(".transactionAmounterror").show();
			isValid = false;
		} else {
			$(".transactionAmounterror").hide();
		}
		if (transactionDate == "") {
			$(".transactionDaterror").show();
			isValid = false;
		} else {
			$(".transactionDaterror").hide();
		}
		var postData = {
			scrowAccountNumber: accountNumber,
			transactionAmount: transactionAmount,
			transactionDate: transactionDate,
			documentUploadedId: documentUploadedId,
		};

		var postData = JSON.stringify(postData);

		let regUrl = "";
		if (userisIn == "local") {
			regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				userId +
				"/savelendertransaction";
		} else {
			regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				userId +
				"/savelendertransaction";
		}
		console.log(regUrl);
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-transactionSuccess").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
});

function loadWalletDetails() {
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
			"/getlenderwallettrns";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/getlenderwallettrns";
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
			totalEntries = data.totalCount;
			console.log(data.results);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"wallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });
				$("#displaywallettrns").html(html);

				var displayPageNo = totalEntries / 9;
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							pageNo: num,
							pageSize: 10,
						};
						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/getlenderwallettrns";
						} else {
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/getlenderwallettrns";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log(data.results);

								var template = document.getElementById(
									"wallettransactiondetails"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});
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
	$(".loadingSec").hide();
}

function downLoadWalletTrnsImage(suserId, docId, doctype) {
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	var doctype = doctype;
	var documnetId = docId;
	if (userisIn == "local") {
		var getPAN =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/download/" +
			doctype +
			"/" +
			documnetId;
	} else {
		var getPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/download/" +
			doctype +
			"/" +
			documnetId;
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
				if (sourcePath.indexOf(contentTypeCheck) != -1) {
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

function loadallMyLoanRequests() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	if (primaryType == "LENDER") {
		var fieldValueforSearch = "BORROWER";
	} else {
		var fieldValueforSearch = "LENDER";
	}

	var postData = {
		leftOperand: {
			fieldName: "userId",
			fieldValue: userId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "parentRequestId",
			operator: "NULL",
		},
		page: {
			pageNo: 1,
			pageSize: 9,
		},
	};
	var postData = JSON.stringify(postData);
	console.log(postData);
	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			console.log(totalEntries);
			var template = document.getElementById(
				"loadallloansListingsTpl"
			).innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data.results });
			$("#loadallloansListings").html(html);

			var displayPageNo = totalEntries / 9;
			displayPageNo = displayPageNo + 1;
			$(".borrowerLoansRequestPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "BORROWER";
					} else {
						var fieldValueforSearch = "LENDER";
					}

					var postData = {
						leftOperand: {
							fieldName: "userId",
							fieldValue: userId,
							operator: "EQUALS",
						},
						logicalOperator: "AND",
						rightOperand: {
							fieldName: "parentRequestId",
							operator: "NULL",
						},
						page: {
							pageNo: num,
							pageSize: 9,
						},
					};
					var postData = JSON.stringify(postData);
					console.log(postData);
					if (userisIn == "local") {
						var getStatUrl =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					} else {
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					}

					$.ajax({
						url: getStatUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							totalEntries = data.totalCount;
							console.log(totalEntries);
							var template = document.getElementById(
								"loadallloansListingsTpl"
							).innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, {
								data: data.results,
							});
							$("#loadallloansListings").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	// $(".loadingSec").hide();
}

/* Borrower Monthly Statements */

function borrowerMonthlyStatements() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var statement =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/pdf/" +
			sprimaryType;
	} else {
		var statement =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/pdf/" +
			sprimaryType;
	}

	console.log(statement);

	$.ajax({
		url: statement,
		type: "GET",
		success: function (data, textStatus, xhr) {
			window.open(data.downloadUrl);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");

			if (arguments[0].responseJSON.errorCode == 101) {
				$("#modal-loanStatementError").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadofferDetails() {
	// alert(globalLoanId);
	var loanRequestId = globalLoanId;
	//console.log("loanRequestId is "+ loanRequestId);
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var statement =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/" +
			loanRequestId +
			"/loanofferdetails";
	} else {
		var statement =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/" +
			loanRequestId +
			"/loanofferdetails";
	}

	//console.log(statement);

	$.ajax({
		url: statement,
		type: "GET",
		success: function (data, textStatus, xhr) {
			$("#loanAmount").html(data.loanOfferedAmount);
			$("#loanAmountFee").html(data.borrowerFee);
			$("#duaration").html(data.duaration);
			$("#emiAmount").html(data.emiAmount);
			$("#netDisbursementAmount").html(data.netDisbursementAmount);
			$("#duarationType").html(data.durationType);

			if (data.durationType == "Months") {
				$("#Month").html("Interest Amount:");
			} else {
				$("#Days").html("Interest Amount:");
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

function acceptLoanOffer() {
	var loanRequestId = "APBR" + globalLoanId;
	// alert("loanRequestId is "+ loanRequestId);
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var updateCommentUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/loanOfferAccepetence";
	} else {
		var updateCommentUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/loanOfferAccepetence";
	}
	var postData = {
		id: suserId,
		loanRequestId: loanRequestId,
		loanOfferStatus: "LOANOFFERACCEPTED",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: updateCommentUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-successfullAcceptedOffer").modal("show");
		},

		error: function (request, error) {
			//console.log("error");

			if (arguments[0].responseJSON.errorCode == 108) {
				$("#modal-acceptofferalready").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function rejectLoanOffer() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var loanRequestId = "APBR" + globalLoanId;

	if (userisIn == "local") {
		var updateCommentUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/loanOfferAccepetence";
	} else {
		var updateCommentUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/loanOfferAccepetence";
	}
	var postData = {
		id: suserId,
		loanRequestId: loanRequestId,
		loanOfferStatus: "LOANOFFERREJECTED",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: updateCommentUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-offerRejected").modal("show");
		},

		error: function (request, error) {
			//console.log("error");

			if (arguments[0].responseJSON.errorCode == 108) {
				$("#modal-alreadyAcceptedOffer").modal("show");
			}
		},

		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

$(document).ready(function () {
	$("#newloan-submit-btn").click(function () {
		var enteredloanRequestAmount = $("#newloanRequestAmount").val();
		var enteredrateOfInterest = $("#rateOfInterest").val();
		var enteredduration = $("#duration").val();
		var enteredrepaymentMethod = $(
			"input[name=newrepaymentMethod]:checked"
		).val();
		var entereddurationmethod = $("input[name=Durationtype]:checked").val();
		var enteredloanPurpose = $(".loanPurpose").val();
		var enteredexpectedDate = $(".expectedDateValue").val();
		var wayOfinterestMethod = document.getElementsByName("repaymentMethod");
		var woim = false;
		var isValid = true;
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		enteredloanPurpose = enteredloanPurpose.trim();

		if (enteredloanRequestAmount == "") {
			$(".loanRequestAmountError").show();
			isValid = false;
		} else if (enteredloanRequestAmount < 5000) {
			$(".loanRequestAmountError").html(
				"Please enter a value greater than or equal to 5000."
			);
			$(".loanRequestAmountError").show();
			isValid = false;
		} else if (enteredloanRequestAmount > 5000000) {
			if (primaryType == "LENDER") {
				$(".loanRequestAmountError").html(
					"As per RBI guidelines lender can lend only 50 Lakhs only."
				);
				$(".loanRequestAmountError").show();
				isValid = false;
			}
			if (primaryType == "BORROWER") {
				$(".loanRequestAmountError").html(
					"As per RBI guidelines borrower can borrow only 50 Lakhs only."
				);
				$(".loanRequestAmountError").show();
				isValid = false;
			}
		} else {
			$(".loanRequestAmountError").hide();
		}
		console.log(enteredrateOfInterest);
		if (enteredrateOfInterest == "") {
			$(".rateOfInterestError").show();
			isValid = false;
		} else {
			$(".rateOfInterestError").hide();
		}

		if (enteredduration == "") {
			$(".DurationtypeError").show();
			isValid = false;
		} else {
			$(".DurationtypeError").hide();
		}

		if (entereddurationmethod == "") {
			$(".durationError").show();
			isValid = false;
		} else {
			$(".durationError").hide();
		}

		if (enteredrepaymentMethod == "") {
			$(".repaymentMethodError").show();
			isValid = false;
		} else {
			$(".repaymentMethodError").hide();
		}

		if (enteredloanPurpose == "") {
			$(".loanPurposeError").show();
			isValid = false;
		} else {
			$(".loanPurposeError").hide();
		}

		if (enteredexpectedDate == "") {
			$(".expectedDateError").show();
			isValid = false;
		} else {
			$(".expectedDateError").hide();
		}

		var postData = {
			loanRequestAmount: enteredloanRequestAmount,
			rateOfInterest: enteredrateOfInterest,
			duration: enteredduration,
			durationType: entereddurationmethod,
			repaymentMethod: enteredrepaymentMethod,
			loanPurpose: enteredloanPurpose,
			expectedDate: enteredexpectedDate,
		};

		var postData = JSON.stringify(postData);

		if (userisIn == "local") {
			var regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				userId +
				"/loan/" +
				primaryType +
				"/newrequest";
		} else if (userisIn == "prod") {
			var regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				userId +
				"/loan/" +
				primaryType +
				"/newrequest";
		}

		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-raiseanewloan").modal("show");
					setTimeout(function () {
						$(".loadingSec").hide();
						if (primaryType == "LENDER") {
							window.location = "lenderloanlistings";
						} else {
							window.location = "loanlistings";
						}
					}, 15000);
				},

				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");

					if (arguments[0].responseJSON.errorCode == 114) {
						$("#modal-offerAmountNotfullFilled").modal("show");
					}

					$(".modal-body #text").html(arguments[0].responseJSON.errorMessage);
					if (arguments[0].responseJSON.errorCode == 105) {
						$("#modal-updateexistingoffer").modal("show");
					}

					if (arguments[0].responseJSON.errorCode == 110) {
						$("#modal-updateexistingoffer").modal("show");
					}
				},

				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
});
function loadExpiredlons() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getLenders =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	} else {
		var getLenders =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "user.id",
				fieldValue: suserId,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.status",
				fieldValue: "ACTIVE",
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "parentRequestId",
				fieldValue: 0,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanOfferedAmount.loanOfferdStatus",
				fieldValue: "LOANOFFEREXPIRED",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			var template = document.getElementById(
				"displayallExpiredLoans"
			).innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data.results });
			$("#displayExpiredLoans").html(html);

			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;

			/*888888888888888*/
			$(".expiredloansPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					var postData = {
						leftOperand: {
							leftOperand: {
								fieldName: "user.id",
								fieldValue: suserId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "user.status",
								fieldValue: "ACTIVE",
								operator: "EQUALS",
							},
						},
						logicalOperator: "AND",
						rightOperand: {
							leftOperand: {
								fieldName: "parentRequestId",
								fieldValue: 0,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "loanOfferedAmount.loanOfferdStatus",
								fieldValue: "LOANOFFEREXPIRED",
								operator: "EQUALS",
							},
						},
						page: {
							pageNo: num,
							pageSize: 10,
						},
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};

					var postData = JSON.stringify(postData);
					console.log(postData);
					if (userisIn == "local") {
						var getLenders =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
							"/request/search";
					} else {
						var getLenders =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
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
								"displayallExpiredLoans"
							).innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, {
								data: data.results,
							});
							$("#displayExpiredLoans").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
			/*888888888888888*/
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadRejectedloans() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getLenders =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	} else {
		var getLenders =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "user.id",
				fieldValue: suserId,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.status",
				fieldValue: "ACTIVE",
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "parentRequestId",
				fieldValue: 0,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanOfferedAmount.loanOfferdStatus",
				fieldValue: "LOANOFFERREJECTED",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			var template = document.getElementById(
				"displayallRejectedloans"
			).innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data.results });
			$("#displayRejectedloans").html(html);

			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;

			/*888888888888888*/
			$(".rejectedloansPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					var postData = {
						leftOperand: {
							leftOperand: {
								fieldName: "user.id",
								fieldValue: suserId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "user.status",
								fieldValue: "ACTIVE",
								operator: "EQUALS",
							},
						},
						logicalOperator: "AND",
						rightOperand: {
							leftOperand: {
								fieldName: "parentRequestId",
								fieldValue: 0,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "loanOfferedAmount.loanOfferdStatus",
								fieldValue: "LOANOFFERREJECTED",
								operator: "EQUALS",
							},
						},
						page: {
							pageNo: num,
							pageSize: 10,
						},
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};

					var postData = JSON.stringify(postData);
					console.log(postData);
					if (userisIn == "local") {
						var getLenders =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
							"/request/search";
					} else {
						var getLenders =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
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
								"displayallRejectedloans"
							).innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, {
								data: data.results,
							});
							$("#displayRejectedloans").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
			/*888888888888888*/
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadAcceptedLoans() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getLenders =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	} else {
		var getLenders =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "user.id",
				fieldValue: suserId,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.status",
				fieldValue: "ACTIVE",
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
				fieldName: "loanOfferedAmount.loanOfferdStatus",
				fieldValue: "LOANOFFERACCEPTED",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			var template = document.getElementById(
				"displayallAcceptedLoans"
			).innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data.results });
			$("#displayAcceptedLoans").html(html);

			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;

			/*888888888888888*/
			$(".acceptedloansPagination")
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
								fieldName: "user.id",
								fieldValue: suserId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "user.status",
								fieldValue: "ACTIVE",
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
								fieldName: "loanOfferedAmount.loanOfferdStatus",
								fieldValue: "LOANOFFERACCEPTED",
								operator: "EQUALS",
							},
						},
						page: {
							pageNo: num,
							pageSize: 10,
						},
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};

					var postData = JSON.stringify(postData);
					console.log(postData);
					if (userisIn == "local") {
						var getLenders =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
							"/request/search";
					} else {
						var getLenders =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
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
								"displayallAcceptedLoans"
							).innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, {
								data: data.results,
							});
							$("#displayAcceptedLoans").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
			/*888888888888888*/
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadBorrowerFeePayment() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	// fName = "lenderUserId";

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	} else {
		fName = "lenderUserId";
	}

	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "user.id",
				fieldValue: suserId,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "user.status",
				fieldValue: "ACTIVE",
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
				fieldName: "loanOfferedAmount.loanOfferdStatus",
				fieldValue: "LOANOFFERACCEPTED",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanRequestedDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	// console.log(postData);

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/request/search";
	}

	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			console.log(data.results);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });
				$("#displayRequests").html(html);
				for (var i = 0; i < data.results.length; i++) {
					var feePaystatus = data.results[0].offerSentDetails.payUStatus;
					//alert(feePaystatus);
					if (feePaystatus == null) {
						$("#feepay").show();
						$("#feepaidsuccess").hide();
					} else {
						$("#feepaidsuccess").show();
						$("#feepay").hide();
					}
				}
				var displayPageNo = totalEntries / 9;
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
							leftOperand: {
								leftOperand: {
									fieldName: "user.id",
									fieldValue: suserId,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.status",
									fieldValue: "ACTIVE",
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
									fieldName: "loanOfferedAmount.loanOfferdStatus",
									fieldValue: "LOANOFFERACCEPTED",
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log(data.results);

								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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
	$(".loadingSec").hide();
}

$(document).ready(function () {
	$("#IFSCCode").on("keyup", function (e) {
		var $this = $(this);
		if ($this.val().length == 11) {
			var ifscCode = $("#IFSCCode").val();

			var beneficiaryIfscCode = $("#beneficiaryifsccode");
			var getStatUrl = "https://ifsc.razorpay.com/" + ifscCode;
			$.ajax({
				url: getStatUrl,
				type: "GET",

				success: function (data, textStatus, xhr) {
					$("#bankname").val(data.data.BANK);
					$("#Branch").val(data.data.BRANCH);
					$("#cityValue").val(data.data.CITY);
					$("#bankname").val(data.BANK);
					$("#Branch").val(data.BRANCH);
					$("#cityValue").val(data.CITY);
					// penditAccessToken();
				},
				statusCode: {
					404: function (response) {
						$(".IFSCCodeerror").html("Not Found");
						$(".IFSCCodeerror").show();
					},
					200: function (response) {
						$(".IFSCCodeerror").hide();
					},
				},

				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
			});
		}
	});
});

/*FEE Payment  Starts */

function loadBorrowerFeePayPage(Id, borrowerFee) {
	writeCookie("userid", Id);
	writeCookie("borrowerFee", borrowerFee);
	window.location.href = "borrowerFeeOnlinePayment";
}

function fetchFeePaymentDetails() {
	//$(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var postData = {
		borrowerFee: getCookie("borrowerFee"),
	};

	writeCookie("borrowerFee", "undefined");
	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}
	var postData = JSON.stringify(postData);
	var returnURL = "";
	if (userisIn == "local") {
		//http://35.154.48.120:8080/oxynew/
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/BORROWERFEE/fetchPaymentDetails";
		returnURL = "http://localhost/oxyloans-ui/enachMandateResponse";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/BORROWERFEE/fetchPaymentDetails";
		returnURL = "https://oxyloans.com/new/enachMandateResponse";
	}
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#key").val(data.key);
			$("#salt").val(data.salt);
			$("#txnid").val(data.txnid);
			$("#hash").val(data.hash);
			$("#amount").val(data.amount);
			$("#amount_display").html(data.amount);
			$("#fname").val(data.firstname);
			$("#fname_display").html(data.firstname);
			$("#email").val(data.email);
			$("#email_display").html(data.email);
			$("#mobile").val(data.phone);
			$("#mobile_display").html(data.phone);
			$("#pinfo").val(data.productinfo);
			$("#pinfo_display").html(data.productinfo);
			$("#udf5").val(data.udf5);
			$("#surl").val(data.surl);
			$("#furl").val(data.furl);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

/*FEE Payment  Ends */

/*update Borrower Fee payement success */

function updateBorrowerFeeTransactionStatus(
	transactionId,
	payUTransactionId,
	transactionSatus
) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var updateEmiUrlCard =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			transactionId +
			"/payuborrowerfee";
	} else {
		var updateEmiUrlCard =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			transactionId +
			"/payuborrowerfee";
	}
	var postData = {
		comments: "emi from payment gateway",
		payuTransactionNumber: payUTransactionId,
		payuStatus: transactionSatus,
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: updateEmiUrlCard,
		type: "PATCH",
		contentType: "application/json",
		dataType: "json",
		data: postData,
		success: function (data, textStatus, xhr) {},
		statusCode: {
			400: function (response) {},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

/* Update Borrower Fee payement success ends */

function enablePartPayment(id) {
	if ($("#partPaymentCheckBox" + id).is(":checked")) {
		$("#partPaymentinput" + id).css("display", "block");
	} else {
		$(".partPayAmounterror" + id).html("");
		$("#partPaymentinput" + id).css("display", "none");
	}
}

function loadLenderEmiStats() {
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
			"/lenderEmiDetails";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/lenderEmiDetails  ";
	}
	$.ajax({
		url: actOnLoan,
		type: "GET",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			if (data.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 9;
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						if (userisIn == "local") {
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/lenderEmiDetails";
						} else {
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/lenderEmiDetails  ";
						}

						$.ajax({
							url: actOnLoan,
							type: "GET",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, { data });

								$("#displayRequests").html(html);
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
	$(".loadingSec").hide();
}

function loadWalletTransactionHistory() {
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
			"/lenderHistory";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/lenderHistory";
	}

	$.ajax({
		url: actOnLoan,
		type: "GET",
		success: function (data, textStatus, xhr) {
			totalEntries = data.length;
			if (data.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"wallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data });
				$("#displaywallettrns").html(html);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$(".loadingSec").hide();
}

function loadborrowerRunningLoans() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	} else {
		fName = "lenderUserId";
	}

	var postData = {
		page: {
			pageNo: 1,
			pageSize: 10,
		},
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/application/loansbyapplication ";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/application/loansbyapplication";
	}

	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			// console.log(data.results);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 9;
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
							page: {
								pageNo: num,
								pageSize: 10,
							},
						};

						var postData = JSON.stringify(postData);

						if (userisIn == "local") {
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/application/loansbyapplication ";
						} else {
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/application/loansbyapplication";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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
	$(".loadingSec").hide();
}

function viewLoanLenders(parentId, id) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	// var getLoanId = loanID;
	//var userId=id;

	if (userisIn == "local") {
		var updateEmiUrlCard =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
	} else {
		var updateEmiUrlCard =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
	}

	var postData = {
		leftOperand: {
			fieldName: "loanStatus",
			fieldValue: "Active",
			operator: "EQUALS",
		},

		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "borrowerParentRequestId",
				fieldValue: parentId,
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "borrowerDisbursedDate",
				operator: "NOT_NULL",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	//console.log(postData)

	$.ajax({
		url: updateEmiUrlCard,
		data: postData,
		dataType: "json",
		contentType: "application/json",
		type: "POST",

		success: function (data, textStatus, xhr) {
			$(".viewrunningLoanLenders-" + parentId).show();

			if (data.results.length == 0) {
				$("#displayNoLoanRecords").show();
			} else {
				var template = document.getElementById(
					"loadLendersRunningloans"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, { data: data.results });
				$("#viewrunningLoanLenders-" + parentId).html(html);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				/*888888888888888*/
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							leftOperand: {
								fieldName: "loanStatus",
								fieldValue: "Active",
								operator: "EQUALS",
							},

							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "borrowerParentRequestId",
									fieldValue: parentId,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "borrowerDisbursedDate",
									operator: "NOT_NULL",
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanId",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);

						if (userisIn == "local") {
							var updateEmiUrlCard =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/loan/ADMIN/search";
						} else {
							var updateEmiUrlCard =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/loan/ADMIN/search";
						}

						$.ajax({
							url: updateEmiUrlCard,
							data: postData,
							dataType: "json",
							contentType: "application/json",
							type: "POST",
							success: function (data, textStatus, xhr) {
								$(".viewrunningLoanLenders-" + parentId).show();

								var template = document.getElementById(
									"loadLendersRunningloans"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.results,
								});
								$("#viewrunningLoanLenders-" + parentId).html(html);
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

/****************** Lender Nominee Details ********************/
$(document).ready(function () {
	$("#IFSCCode1").on("keyup", function (e) {
		var $this = $(this);
		if ($this.val().length == 11) {
			var ifscCode = $("#IFSCCode1").val();
			var getStatUrl = "https://ifsc.razorpay.com/" + ifscCode;
			$.ajax({
				url: getStatUrl,
				type: "GET",
				success: function (data, textStatus, xhr) {
					$("#bankname1").val(data.BANK);
					$("#Branch1").val(data.BRANCH);
					$("#cityValue1").val(data.CITY);
				},
				statusCode: {
					404: function (response) {
						$(".IFSCCodeerror").html("Not Found");
						$(".IFSCCodeerror").show();
					},
					200: function (response) {
						$(".IFSCCodeerror").hide();
					},
				},

				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
			});
		}
	});

	$("#mobileNumber").on("keypress", function (e) {
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

	$("#lender-nominee-btn").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var entereduserId = $("#userid").val();
		var enteredrelation = $("#relation").val();
		var enteredname = $("#name1").val();
		var enteredemail = $("#email").val();
		var enteredmobileNumber = $("#mobileNumber").val();
		var enteredaccountno = $("#accountno1").val();
		var enteredbankname = $("#bankname1").val();
		var enteredIFSCCode = $(".IFSCCode1").val();
		var enteredBranch = $("#Branch1").val();
		var enteredcityValue = $("#cityValue1").val();

		//var ifscRegex = /^[A-Z]{4}\d{7}$/i;
		var ifscRegex = /^[A-Z]{4}\d{1}[A-Z0-9]{6}$/i;
		var emailRegex =
			/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

		var isValid = true;

		if (entereduserId == "") {
			$(".useridError").show();
			isValid = false;
		} else {
			$(".useridError").hide();
		}

		if (enteredrelation == "") {
			$(".relationError").show();
			isValid = false;
		} else {
			$(".relationError").hide();
		}

		if (!emailRegex.test(enteredemail)) {
			$(".emailError").html("Please enter valid email.");
			$(".emailError").show();
			isValid = false;
		} else {
			$(".emailError").hide();
		}

		if (enteredmobileNumber == "") {
			$(".mobileNumberError").show();
			isValid = false;
		} else {
			$(".mobileNumberError").hide();
		}

		if (enteredname == "") {
			$(".nameError").show();
			isValid = false;
		} else {
			$(".nameError").hide();
		}

		if (enteredaccountno == "") {
			$(".accountnoError").show();
			isValid = false;
		} else {
			$(".accountnoError").hide();
		}

		if (enteredbankname == "") {
			$(".banknameError").show();
			isValid = false;
		} else {
			$(".banknameError").hide();
		}

		if (!ifscRegex.test(enteredIFSCCode)) {
			$(".IFSCCodeerror").html("Please enter valid IFSC code.");
			$(".IFSCCodeerror").show();
			isValid = false;
		} else {
			$(".IFSCCodeerror").hide();
		}

		if (enteredBranch == "") {
			$(".branchError").show();
			isValid = false;
		} else {
			$(".branchError").hide();
		}

		if (enteredcityValue == "") {
			$(".cityValueError").show();
			isValid = false;
		} else {
			$(".cityValueError").hide();
		}

		var postData = {
			userId: entereduserId,
			relation: enteredrelation,
			name: enteredname,
			mobileNumber: enteredmobileNumber,
			email: enteredemail,
			accountNumber: enteredaccountno,
			ifscCode: enteredIFSCCode,
			bankName: enteredbankname,
			branchName: enteredBranch,
			city: enteredcityValue,
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		let regUrl = "";

		if (userisIn == "local") {
			regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/nominee";
		} else {
			regUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/nominee";
		}
		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#headingFour a").trigger("click");
					$("#modal-lenderNominee").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");

					if (arguments[0].responseJSON.errorCode == 130) {
						$(".modal-body-profil .notupdate").html(
							arguments[0].responseJSON.errorMessage
						);
						$("#modal-bank-not-update").modal("show");
					} else {
						alert("data not uploaded");
					}
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
});

function loadlendernomineeDetails() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	id = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/nominee/" +
			id +
			"";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/nominee/" + id + "";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			//     $("#userid").val(data.userId);

			$("#name1").val(data.name);
			$("#relation").val(data.relation);
			$("#email").val(data.emial);
			$("#mobileNumber").val(data.mobileNumber);
			$("#accountno1").val(data.accountNumber);
			$("#IFSCCode1").val(data.ifscCode);
			$("#bankname1").val(data.bankName);
			$("#cityValue1").val(data.city);
			$("#Branch1").val(data.branchName);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function downloadLenderTransaction() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var pdfUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/lenderHistoryPdf";
	} else {
		var pdfUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/lenderHistoryPdf";
	}

	$.ajax({
		url: pdfUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			//alert('downloaded')
			window.open(data.downloadUrl, "_blank");
			$("#modal-downloadWallet").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

//****************  Lender Auto invest starts *******************//

$(document).ready(function () {
	$("#oxyscoreValue").on("keypress", function (e) {
		var $this = $(this);
		var regex = new RegExp("^[0-9\b]+$");
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
		if ($this.val().length > 2) {
			e.preventDefault();
			return false;
		}
		if (regex.test(str)) {
			return true;
		}
		e.preventDefault();
		return false;
	});
	$("#maxAmountValue").on("keypress", function (e) {
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

	/* $('#oxyscoreValue').tooltip({
        items: 'input.target',
        content: 'range'
    });*/

	$("#btn-autoinvest").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var riskcategory = $("#riskcategory").val();
		var gender = $("input[name=option-1]:checked").val();
		var oxyScore = $("#oxyscoreValue").val();
		var city = $("#cityvalue").val();
		var employmentType = $("#employmentType").val();
		var salaryRange = $("#salaryRange").val();
		var maxAmount = $("#maxAmountValue").val();
		var duration = $("#duration").val();
		var rateofInterest = $("#rateofInterest").val();

		var checkbox_val = document.getElementById("agreeCheckBox").checked;
		var checkbox_val2 = document.getElementById("agreeCheckBox1").checked;

		oxyScore = oxyScore.trim();
		maxAmount = maxAmount.trim();

		var gendervalue = document.getElementsByName("option-1");
		var gen = false;
		var isValid = true;

		if (checkbox_val2 == false) {
			$(".displayTermsError").show();
			isvalid = false;
		} else {
			$(".displayTermsError").hide();
		}

		if (riskcategory == "") {
			$(".riskcategoryError").show();
			isValid = false;
		} else {
			$(".riskcategoryError").hide();
		}

		if (gender == "") {
			$(".genderError").show();
			isValid = false;
		} else {
			$(".genderError").hide();
		}

		var i = 0;
		for (var i = 0; i < gendervalue.length; i++) {
			if (gendervalue[i].checked == true) {
				gen = true;
			}
		}
		if (!gen) {
			$(".genderError").show();
			isValid = false;
		} else {
			$(".genderError").hide();
		}

		if (oxyScore == "") {
			$(".oxyscoreError").show();
			isValid = false;
		} else {
			$(".oxyscoreError").hide();
		}

		if (city == "") {
			$(".cityvalueError").show();
			isValid = false;
		} else {
			$(".cityvalueError").hide();
		}

		if (employmentType == "") {
			$(".employmentTypeError").show();
			isValid = false;
		} else {
			$(".employmentTypeError").hide();
		}

		if (salaryRange == "") {
			$(".salaryRangeError").show();
			isValid = false;
		} else {
			$(".salaryRangeError").hide();
		}

		if (maxAmount == "") {
			$(".maxAmountError").show();
			isValid = false;
		} else if (maxAmount < 5000) {
			$(".maxAmountError").html(
				"Please enter a value greater than or equal to 5000."
			);
			$(".maxAmountError").show();
			isValid = false;
		} else if (maxAmount > 50000) {
			$(".maxAmountError").html(
				"As per RBI guidelines you can offer only 50000 to one borrower."
			);
			$(".maxAmountError").show();
			isValid = false;
		} else {
			$(".maxAmountError").hide();
		}

		if (duration == "") {
			$(".durationError").show();
			isValid = false;
		} else {
			$(".durationError").hide();
		}

		if (rateofInterest == "") {
			$(".rateofInterestError").show();
			isValid = false;
		} else {
			$(".rateofInterestError").hide();
		}

		// return isValid;
		if (checkbox_val2 == true) {
			var postData = {
				userId: userId,
				userType: primaryType,
				riskCategory: riskcategory,
				gender: gender,
				oxyScore: oxyScore,
				city: city,
				employmentType: employmentType,
				salaryRange: salaryRange,
				maxAmount: maxAmount,
				duration: duration,
				rateOfInterest: rateofInterest,
				autoEsigin: checkbox_val,
				termsAndConditions: checkbox_val2,
				comments: "Test",
				status: "Active",
			};
		}

		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			autoinvestUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/saveautoinvestconfig";
		} else {
			autoinvestUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/saveautoinvestconfig";
		}

		console.log(autoinvestUrl);

		if (isValid == true) {
			$.ajax({
				url: autoinvestUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-autoinvestsuccess").modal("show");
					setTimeout(function () {
						window.location.reload();
					}, 2000);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	/********update auto invest *******************/

	$("#btn-autoinvestUpdate").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var riskcategory = $("#riskcategory").val();
		var gender = $("input[name=option-1]:checked").val();
		var oxyScore = $("#oxyscoreValue").val();
		var city = $("#cityvalue").val();
		var employmentType = $("#employmentType").val();
		var salaryRange = $("#salaryRange").val();
		var maxAmount = $("#maxAmountValue").val();
		var duration = $("#duration").val();
		var rateofInterest = $("#rateofInterest").val();

		var riskcategory1 = $(".displayriskcategory").html();
		var gender1 = $(".displaygender").html();
		var oxyScore1 = $(".displayoxyscore").html();
		var city1 = $(".displaycity").html();
		var employmentType1 = $(".displayemploymentType").html();
		var salaryRange1 = $(".displaysalaryRange").html();
		var maxAmount1 = $(".displaymaxAmount").html();
		var duration1 = $(".displayduration").html();
		var rateofInterest1 = $(".displayrateofInterest").html();

		var checkboxValue = $("#displayautoesign").val().toString();

		var checkbox_val = $("#agreeCheckBox").is(":checked");
		checkbox_val = checkbox_val.toString();

		var checkbox_val2 = document.getElementById("agreeCheckBox1").checked;

		oxyScore = oxyScore.trim();
		maxAmount = maxAmount.trim();

		var gendervalue = document.getElementsByName("option-1");
		var gen = false;
		var isValid = true;

		if (checkbox_val2 == false) {
			$(".displayTermsError").show();
			isvalid = false;
		} else {
			$(".displayTermsError").hide();
		}

		if (riskcategory == "") {
			$(".riskcategoryError").show();
			isValid = false;
		} else {
			$(".riskcategoryError").hide();
		}

		if (gender == "") {
			$(".genderError").show();
			isValid = false;
		} else {
			$(".genderError").hide();
		}

		var i = 0;
		for (var i = 0; i < gendervalue.length; i++) {
			if (gendervalue[i].checked == true) {
				gen = true;
			}
		}
		if (!gen) {
			$(".genderError").show();
			isValid = false;
		} else {
			$(".genderError").hide();
		}

		if (oxyScore == "") {
			$(".oxyscoreError").show();
			isValid = false;
		} else {
			$(".oxyscoreError").hide();
		}

		if (city == "") {
			$(".cityvalueError").show();
			isValid = false;
		} else {
			$(".cityvalueError").hide();
		}

		if (employmentType == "") {
			$(".employmentTypeError").show();
			isValid = false;
		} else {
			$(".employmentTypeError").hide();
		}

		if (salaryRange == "") {
			$(".salaryRangeError").show();
			isValid = false;
		} else {
			$(".salaryRangeError").hide();
		}

		if (maxAmount == "") {
			$(".maxAmountError").show();
			isValid = false;
		} else if (maxAmount < 5000) {
			$(".maxAmountError").html(
				"Please enter a value greater than or equal to 5000."
			);
			$(".maxAmountError").show();
			isValid = false;
		} else if (maxAmount > 50000) {
			$(".maxAmountError").html(
				"As per RBI guidelines you can offer only 50000 to one borrower."
			);
			$(".maxAmountError").show();
			isValid = false;
		} else {
			$(".maxAmountError").hide();
		}

		if (duration == "") {
			$(".durationError").show();
			isValid = false;
		} else {
			$(".durationError").hide();
		}

		if (rateofInterest == "") {
			$(".rateofInterestError").show();
			isValid = false;
		} else {
			$(".rateofInterestError").hide();
		}

		var postData = {
			userId: userId,
			userType: primaryType,
			riskCategory: riskcategory,
			gender: gender,
			oxyScore: oxyScore,
			city: city,
			employmentType: employmentType,
			salaryRange: salaryRange,
			maxAmount: maxAmount,
			duration: duration,
			rateOfInterest: rateofInterest,
			autoEsigin: checkbox_val,
			termsAndConditions: checkbox_val2,
			comments: "Test",
			status: "Active",
		};

		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			autoinvestUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/updateautoinvestconfig ";
		} else {
			autoinvestUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/updateautoinvestconfig ";
		}

		console.log(autoinvestUrl);
		if (
			riskcategory === riskcategory1 &&
			gender === gender1 &&
			oxyScore === oxyScore1 &&
			city === city1 &&
			employmentType === employmentType1 &&
			salaryRange === salaryRange1 &&
			maxAmount === maxAmount1 &&
			duration === duration1 &&
			rateofInterest === rateofInterest1 &&
			checkbox_val === checkboxValue
		) {
			$("#modal-notupdatedanythinginpage").modal("show");
		} else {
			if (isValid == true) {
				$.ajax({
					url: autoinvestUrl,
					type: "POST",
					data: postData,
					contentType: "application/json",
					dataType: "json",
					success: function (data, textStatus, xhr) {
						$("#modal-autoinvestUpadate").modal("show");
						setTimeout(function () {
							window.location.reload();
						}, 5000);
					},
					error: function (xhr, textStatus, errorThrown) {
						console.log("error");
					},
					beforeSend: function (xhr) {
						xhr.setRequestHeader("accessToken", saccessToken);
					},
				});
			}
			return isValid;
		}
	});

	////************* deactivate auto invest ************************///

	$("#btn-autoinvestDeactivate").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		var postData = {
			userId: suserId,
			userType: sprimaryType,
			status: "InActive",
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			autoinvestUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/inactiveautoinvestconfig";
		} else {
			autoinvestUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/inactiveautoinvestconfig";
		}

		console.log(autoinvestUrl);

		$.ajax({
			url: autoinvestUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#btn-edit-autoinvest,#btn-autoinvestDeactivate").hide();
				$("#btn-autoinvest-activate").show();
				$("#modal-deactivateAutoInvest").modal("show");
				setTimeout(function () {
					window.location.reload();
				}, 2000);
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("error");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	});

	///************Acivate auto invest **************//

	$("#btn-autoinvest-activate").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		var postData = {
			userId: suserId,
			userType: sprimaryType,
			status: "Active",
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			autoinvestUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/inactiveautoinvestconfig";
		} else {
			autoinvestUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/inactiveautoinvestconfig";
		}

		console.log(autoinvestUrl);

		$.ajax({
			url: autoinvestUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#btn-edit-autoinvest,#btn-autoinvestDeactivate").show();
				$("#btn-autoinvest-activate").hide();
				$("#modal-activateAutoInvest").modal("show");
				setTimeout(function () {
					window.location.reload();
				}, 2000);
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("error");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	});

	$("#btn-edit-autoinvest").click(function () {
		$(
			"#hidestatus,.udisplaysecautoinvest, #btn-edit-autoinvest,#btn-autoinvest,#btn-autoinvestDeactivate,#btn-autoinvest-activate"
		).hide();
		$(
			"#btn-autoinvestUpdate, #riskcategory, #oxyscoreValue, .st_checkbox, #cityvalue, #employmentType,#salaryRange,#duration,#maxAmountValue,#rateofInterest"
		).show();
	});
});

///////////////////////////////////////

const loadUserId = () => {
	const suserId = getCookie("sUserId");
	$("#udisplayId").val(`LR${suserId}`);
};

function loadautoInvestdata() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var pdfUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/getautoinvestconfigbylenderid  ";
	} else {
		var pdfUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/getautoinvestconfigbylenderid  ";
	}

	$.ajax({
		url: pdfUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (
				data.riskCategory == null &&
				data.gender == null &&
				data.oxyScore == null &&
				data.city == null &&
				data.employmentType == null &&
				data.salaryRange == null &&
				data.maxAmount == null &&
				data.duration == null &&
				data.rateOfInterest == null
			) {
				$(
					"#btn-autoinvest, #riskcategory, #oxyscoreValue, .st_checkbox, #cityvalue, #employmentType,#salaryRange,#duration,#maxAmountValue,#rateofInterest"
				).show();
				$(
					"#hidestatus,#btn-edit-autoinvest,#btn-autoinvestUpdate,#btn-autoinvestDeactivate,#btn-autoinvest-activate"
				).hide();
			} else if (
				data.riskCategory != "" &&
				data.gender != "" &&
				data.oxyScore != "" &&
				data.city != "" &&
				data.employmentType != "" &&
				data.salaryRange != "" &&
				data.maxAmount != "" &&
				data.duration != "" &&
				data.rateOfInterest != ""
			) {
				$("#btn-edit-autoinvest,#btn-autoinvestDeactivate,#hidestatus").show();
				$(
					"#btn-autoinvest,#btn-autoinvestUpdate, #riskcategory, #oxyscoreValue, .st_checkbox, #cityvalue, #employmentType,#salaryRange,#duration,#maxAmountValue,#rateofInterest"
				).hide();
			}

			if (data.status == "InActive") {
				$("#btn-autoinvest-activate").show();
				$("#btn-autoinvestDeactivate").hide();
				$("#btn-edit-autoinvest").hide();
			} else {
				$("#btn-autoinvest-activate").hide();
				$("#btn-autoinvestDeactivate").show();
			}

			if (data.employmentType == "SELFEMPLOYED") {
				document.getElementById("changeText").innerText = "Anuual Income Range";
			} else {
				document.getElementById("changeText").innerText = "Salary Range";
			}

			$(".displaystatus").html(data.status);
			$("#displayautoesign").val(data.autoEsigin);

			$("#riskcategory").val(data.riskCategory);
			$(".displayriskcategory").html(data.riskCategory);

			var $genderRadio = $("input:radio[name=option-1]");
			if ($genderRadio.is(":checked") === false) {
				$genderRadio
					.filter("[value=" + data.gender + "]")
					.prop("checked", true);
			}
			$(".displaygender").html(data.gender);

			$("#oxyscoreValue").val(data.oxyScore);
			$(".displayoxyscore").html(data.oxyScore);

			$("#cityvalue").val(data.city);
			$(".displaycity").html(data.city);

			$("#employmentType").val(data.employmentType);
			$(".displayemploymentType").html(data.employmentType);

			$("#salaryRange").val(data.salaryRange);
			$(".displaysalaryRange").html(data.salaryRange);

			$("#maxAmountValue").val(data.maxAmount);
			$(".displaymaxAmount").html(data.maxAmount);

			$("#duration").val(data.duration);
			$(".displayduration").html(data.duration);

			$("#rateofInterest").val(data.rateOfInterest);
			$(".displayrateofInterest").html(data.rateOfInterest);

			var $autoEsign = $("input:checkbox[name=checkbox]");
			if ($autoEsign.is(":checked") === false) {
				$autoEsign
					.filter("[value=" + data.autoEsigin + "]")
					.prop("checked", true);
			}

			var $termsAndConditions = $("input:checkbox[name=checkbox-1]");
			if ($termsAndConditions.is(":checked") === false) {
				$termsAndConditions
					.filter("[value=" + data.termsAndConditions + "]")
					.prop("checked", true);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");

			if (arguments[0].responseJSON.errorCode == 114) {
				$(
					"#hideautoesign,#hidestatus,#btn-autoinvest-activate,#btn-autoinvestDeactivate, #btn-edit-autoinvest,#btn-autoinvestUpdate"
				).hide();
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadlendersAutoinvesthistory() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getLenders =
			"http://35.154.48.120:8080/oxynew/v1/user/getlenderautoinvesthistory";
	} else {
		var getLenders =
			"https://fintech.oxyloans.com/oxyloans/v1/user/getlenderautoinvesthistory";
	}

	var postData = { userId: suserId };

	var postData = JSON.stringify(postData);
	console.log(postData);
	$.ajax({
		url: getLenders,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		data: postData,
		success: function (data, textStatus, xhr) {
			$(".displayUserId").html(data.user.id);
			$(".displayName").html(data.user.firstName + " " + data.user.lastName);
			$(".displaycity").html(data.user.city);
			$(".displayEmail").html(data.user.email);
			$(".displayMobileNumber").html(data.user.mobileNumber);

			// totalEntries = data.totalCount;
			// var template = document.getElementById(
			// 	"loadlendersAutoinvestListTpl"
			// ).innerHTML;
			// Mustache.parse(template);

			// var html = Mustache.to_html(template, { data: data.configHistory });
			// $("#loadlendersautoinvestList").html(html);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}
///****************** withdrawal **********************/

$(document).ready(function () {
	$("#withdrawamount").on("keypress", function (e) {
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

	$("#btn-withdrawal").click(function () {
		setTimeout(() => {
			$("#btn-withdrawal").attr("disabled", true);
		}, 300);

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var cuurentwalletbalance = $(".lenderWalletAmount").html();
		var withdrawAmount = $("#withdrawamount").val();
		var rating = $("input[name=rating]:checked").val();
		var withdrawDate = $("#withdrawDate").val();
		var reason = $("#reason").val();
		var feedback = $("#feedback").val();
		var withdrawRaisedAmount = $("#withdrawalAmount").val();

		feedback = feedback.trim();
		withdrawAmount = withdrawAmount.trim();

		var ratingvalue = document.getElementsByName("rating");

		cuurentwalletbalance = parseInt(cuurentwalletbalance);
		withdrawAmount = parseInt(withdrawAmount);

		var rate = false;
		var isValid = true;

		if (withdrawAmount == "") {
			$(".WithdrawAmounterror").show();

			isValid = false;
		} else if (withdrawAmount > 5000000) {
			$(".WithdrawAmounterror").html(
				"As per RBI guidelines lender can Withdraw only 50 Lakhs only."
			);
			$(".WithdrawAmounterror").show();

			isValid = false;
		} else {
			$(".WithdrawAmounterror").hide();
		}

		if (withdrawAmount > cuurentwalletbalance) {
			$(".WithdrawAmounterror").html(
				"The withdrawal amount is greater than the balance of the wallet."
			);
			$(".WithdrawAmounterror").show();

			isValid = false;
		} else {
			$(".WithdrawAmounterror").hide();
		}

		if (rating == "") {
			$(".ratingerror").show();

			isValid = false;
		} else {
			$(".ratingerror").hide();
		}

		var i = 0;
		for (var i = 0; i < ratingvalue.length; i++) {
			if (ratingvalue[i].checked == true) {
				rate = true;
			}
		}
		if (!rate) {
			$(".ratingerror").show();

			isValid = false;
		} else {
			$(".ratingerror").hide();
		}

		if (withdrawDate == "") {
			$(".withdrawDaterror").show();

			isValid = false;
		} else {
			$(".withdrawDaterror").hide();
		}

		if (reason == "") {
			$(".reasonError").show();

			isValid = false;
		} else {
			$(".reasonError").hide();
		}

		if (feedback == "") {
			$(".feedbackerror").show();

			isValid = false;
		} else {
			$(".feedbackerror").hide();
		}

		if (withdrawRaised == true) {
			$(".raised-withdrawal-amount").html(withdrawRaisedAmount);
			$(".new-withdrawal-amount").html(withdrawAmount);
			var newUpdateAmount =
				parseInt(withdrawAmount) + parseInt(withdrawRaisedAmount);
			$(".added-withdrawal-amount").html(newUpdateAmount);
			$(".update-withdrawal-amount").html(withdrawAmount);
			$(".withdrawSuccess .addTheWithdraw").attr(
				"onclick",
				"addLenderWithdrawalAmount('ADD')"
			);
			$(".withdrawSuccess .updateTheWithdraw").attr(
				"onclick",
				"addLenderWithdrawalAmount('UPDATE')"
			);
			$(".withdrawSuccess").show("slow");
			return false;
		} else {
			$(".withdrawSuccess").hide();
		}

		var postData = {
			userId: userId,
			userType: "LENDER",
			amount: withdrawAmount,
			amountRequiredDate: withdrawDate,
			withdrawalReason: reason,
			rating: rating,
			feedBack: feedback,
			adminComments: "",
			status: "INITIATED",
		};

		var postData = JSON.stringify(postData);

		if (userisIn == "local") {
			withdrawUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/savewithdrawalfundsinfo";
		} else {
			withdrawUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/savewithdrawalfundsinfo";
		}

		if (isValid == true) {
			$.ajax({
				url: withdrawUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-withdrawalfundssuccess").modal("show");
					$("#btn-withdrawal").attr("disabled", false);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");

					$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);
					if (arguments[0].responseJSON.errorCode == 109) {
						$("#modal-withdrawalfundserrorforAmount").modal("show");
					}

					$("#btn-withdrawal").attr("disabled", false);
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		} else {
			setTimeout(() => {
				$("#btn-withdrawal").attr("disabled", false);
			}, 300);

			return isValid;
		}
	});
});

//*add and update function for the lender withdrawal ****

function addLenderWithdrawalAmount(withdrawalType) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	$(".withdrawSuccess").hide();

	$(".loadingSec").show();

	var withdrawAmount = $("#withdrawamount").val();
	var rating = $("input[name=rating]:checked").val();
	var withdrawDate = $("#withdrawDate").val();
	var reason = $("#reason").val();
	var feedback = $("#feedback").val();

	feedback = feedback.trim();
	withdrawAmount = withdrawAmount.trim();

	var ratingvalue = document.getElementsByName("rating");
	var rate = false;
	var isValid = true;

	if (withdrawAmount == "") {
		$(".WithdrawAmounterror").show();
		isValid = false;
	} else if (withdrawAmount > 5000000) {
		$(".WithdrawAmounterror").html(
			"As per RBI guidelines lender can Withdraw only 50 Lakhs only."
		);
		$(".WithdrawAmounterror").show();
		isValid = false;
	} else {
		$(".WithdrawAmounterror").hide();
	}

	if (rating == "") {
		$(".ratingerror").show();
		isValid = false;
	} else {
		$(".ratingerror").hide();
	}

	var i = 0;
	for (var i = 0; i < ratingvalue.length; i++) {
		if (ratingvalue[i].checked == true) {
			rate = true;
		}
	}
	if (!rate) {
		$(".ratingerror").show();
		isValid = false;
	} else {
		$(".ratingerror").hide();
	}

	if (withdrawDate == "") {
		$(".withdrawDaterror").show();
		isValid = false;
	} else {
		$(".withdrawDaterror").hide();
	}

	if (reason == "") {
		$(".reasonError").show();
		isValid = false;
	} else {
		$(".reasonError").hide();
	}

	if (feedback == "") {
		$(".feedbackerror").show();
		isValid = false;
	} else {
		$(".feedbackerror").hide();
	}

	var postData = {
		userId: userId,
		userType: "LENDER",
		amount: withdrawAmount,
		amountRequiredDate: withdrawDate,
		withdrawalReason: reason,
		rating: rating,
		feedBack: feedback,
		adminComments: "",
		status: "INITIATED",
		type: withdrawalType,
	};

	var postData = JSON.stringify(postData);
	if (userisIn == "local") {
		withdrawUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/savewithdrawalfundsinfo";
	} else {
		withdrawUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/savewithdrawalfundsinfo";
	}

	if (isValid == true) {
		$.ajax({
			url: withdrawUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				// $("#loadingSec").hide();
				$(".loadingSec").hide();

				$("#modal-withdrawalfundssuccess").modal("show");
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("error");

				$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);

				if (arguments[0].responseJSON.errorCode == 109) {
					$("#modal-withdrawalfundserrorforAmount").modal("show");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
}

function loadlenderswithdrawfundslist() {
	
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getLenders =
			"http://35.154.48.120:8080/oxynew/v1/user/lenderwithdrawalfundssearch";
	} else {
		var getLenders =
			"https://fintech.oxyloans.com/oxyloans/v1/user/lenderwithdrawalfundssearch";
	}

	var postData = {
		page: {
			pageNo: 1,
			pageSize: 100,
		},
		firstName: "",
		lastName: "",
		userId: suserId,
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
			console.log(data);

			if (data.results.length == 0 || data.results.length == null) {
				$("#displayNoRecords").show();
			} else {

			   const totalEntries = data.totalCount;

			   const newobj=data.results.map((data,index)=>{
			   	const newobjnew={...data};

                if (newobjnew.status=="ADMIN REJECTED"){
                	newobjnew["statusobj"]="ADMINREJECTED";
                }else if(newobjnew.status=="USER REJECTED"){
                   newobjnew["statusobj"]="USERREJECTED";
                }else if(newobjnew.status=="AUTO REJECTED"){
                   newobjnew["statusobj"]="AUTOREJECTED";
                }else{
                   newobjnew["statusobj"]=newobjnew.status;

                }

              return newobjnew;

			   })


                  console.log(newobj);


				var template = document.getElementById(
					"loadlenderswithdrawfundslistTpl"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, { data: newobj });
				$("#loadwithdrawfundslist").html(html);
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

$(document).ready(function () {
	$("#btn-Reinvest").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var checkbox_val = document.getElementById("agreeCheckBox").checked;
		var checkbox_val2 = document.getElementById("agreeCheckBox1").checked;

		var isValid = true;

		if (checkbox_val == false) {
			$(".displayautoesignError").show();
			isvalid = false;
		} else {
			$(".displayautoesignError").hide();
		}

		if (checkbox_val2 == false) {
			$(".displayTermsError").show();
			isvalid = false;
		} else {
			$(".displayTermsError").hide();
		}

		if (checkbox_val2 == true && checkbox_val == true) {
			// return isValid;
			var postData = {
				userId: userId,
				userType: primaryType,
				status: "Active",
			};
		}

		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			autoinvestUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/saverelendconfig";
		} else {
			autoinvestUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/saverelendconfig";
		}

		console.log(autoinvestUrl);

		if (isValid == true) {
			$.ajax({
				url: autoinvestUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-Reinvestsuccess").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});

	$("#updateReinvest-btn").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var checkbox_val;

		if ($("#agreeCheckBox").is(":checked")) {
			checkbox_val = "Active";
			console.log("Checkbox is checked.");
		} else {
			checkbox_val = "InActive";
			console.log("Checkbox is unchecked.");
		}

		var checkbox_val2 = document.getElementById("agreeCheckBox1").checked;

		var isValid = true;

		if (checkbox_val2 == false) {
			$(".displayTermsError").show();
			isvalid = false;
		} else {
			$(".displayTermsError").hide();
		}

		if (checkbox_val2 == true) {
			// return isValid;

			var postData = {
				userId: userId,
				userType: primaryType,
				status: checkbox_val,
			};
		}

		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			autoinvestUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/updaterelendconfig ";
		} else {
			autoinvestUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/updaterelendconfig ";
		}

		console.log(autoinvestUrl);

		if (isValid == true) {
			$.ajax({
				url: autoinvestUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-ReinvestUpadate").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
});

function loadReInvestdata() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var pdfUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/getrelendconfigbylenderid";
	} else {
		var pdfUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/getrelendconfigbylenderid";
	}

	$.ajax({
		url: pdfUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.status == "InActive") {
				$("#btn-Reinvest").hide();
				$("#updateReinvest-btn").show();
			} else {
				$("#btn-Reinvest").hide();
				$("#updateReinvest-btn").show();
			}

			var $autoEsign = $("input:checkbox[name=checkbox]");
			if ($autoEsign.is(":checked") === false) {
				$autoEsign.filter("[value=" + data.status + "]").prop("checked", true);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");

			if (arguments[0].responseJSON.errorCode == 114) {
				$("#updateReinvest-btn").hide();
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function knowMoreApps() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var knowappsURL =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/borrowerapplications";
	} else {
		var knowappsURL =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/borrowerapplications";
	}

	$.ajax({
		url: knowappsURL,
		type: "GET",
		success: function (data, textStatus, xhr) {
			$("#displayApplicationInfo").modal("show");
			var template = document.getElementById("loadApplicationTpl").innerHTML;
			//console.log(template);
			// alert(template);
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data });
			$("#loadApplicationData").html(html);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadPaymentHistory() {
	$(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	fName = "lenderUserId";

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/borrowerapplications";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/borrowerapplications";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",
		// data: postData,
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			alert(data);
			totalEntries = data.totalCount;
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				//console.log(template);
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });
				//alert(html);
				$("#displayoffers").html(html);
				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".agreedloansPagination")
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							leftOperand: {
								fieldName: fName,
								fieldValue: userId,
								operator: "EQUALS",
							},

							logicalOperator: "AND",

							rightOperand: {
								fieldName: "loanStatus",
								fieldValues: ["Agreed", "Active", "Closed"],
								operator: "IN",
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanActiveDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						//var getStatUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var getStatUrl =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var getStatUrl =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						}

						$.ajax({
							url: getStatUrl,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",

							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayallRequests").innerHTML;
								//console.log(template);
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});
								//alert(html);
								$("#displayoffers").html(html);
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
	$(".loadingSec").hide();
}
//Changes by livin mandeva Starts
//Regarding Oxy Trade on 13-11-2020
$(document).ready(function () {
	$("#beneficiary-add-btn").click(function () {
		$("#borrowerpartnerdetailspanel").show();
		$("#beneficiarylistDDpanel").hide();
		$("#beneficiarytitle").text("Add Partner Details");
	});
	$("#beneficiary-edit-btn").click(function () {
		$(".loadingSec").show();
		$("#beneficiarylist").val("").trigger("change");
		$("#beneficiarydetailspanel").hide();
		$("#beneficiarylistDDpanel").show();
		$("#beneficiarytitle").text("Update Beneficiary12 Details");
		$("#forAdd").hide();
		$("#forEdit").show();
		$("#forTransfer").hide();
		hideBeneficiaryErrorFields();
		clearBeneficiaryFields();
		formDropDownForEditBeneficiary();
	});

	$("#beneficiarylist").change(function () {
		getBeneficiaryDetailsToUpdate();
	});
});
function hideBeneficiaryErrorFields() {
	$(".beneficiarynameError").hide();
	$(".beneficiarynicknameError").hide();
	$(".beneficiarymobilenumberError").hide();
	$(".beneficiaryemailError").hide();
	$(".beneficiaryaccountnumberError").hide();
	$(".beneficiarybanknameError").hide();
	$(".beneficiarybranchnameError").hide();
	$(".beneficiaryaccounttypeError").hide();
	$(".beneficiaryifsccodeError").hide();
	$(".beneficiarycityError").hide();
	$(".beneficiaryamountError").hide();
}

function disableBeneficiaryFields() {
	$("#beneficiaryname").prop("disabled", true);
	$("#beneficiarynickname").prop("disabled", true);
	$("#beneficiarymobilenumber").prop("disabled", true);
	$("#beneficiaryemail").prop("disabled", true);
	$("#beneficiaryaccountnumber").prop("disabled", true);
	$("#beneficiarybankname").prop("disabled", true);
	$("#beneficiarybranchname").prop("disabled", true);
	$("#beneficiaryaccounttype").prop("disabled", true);
	$("#beneficiaryifsccode").prop("disabled", true);
	$("#beneficiarycity").prop("disabled", true);
	$("#beneficiaryamount").prop("disabled", true);
}

function enableBeneficiaryFields() {
	$("#beneficiaryname").prop("disabled", false);
	$("#beneficiarynickname").prop("disabled", false);
	$("#beneficiarymobilenumber").prop("disabled", false);
	$("#beneficiaryemail").prop("disabled", false);
	$("#beneficiaryaccountnumber").prop("disabled", false);
	$("#beneficiarybankname").prop("disabled", false);
	$("#beneficiarybranchname").prop("disabled", false);
	$("#beneficiaryaccounttype").prop("disabled", false);
	$("#beneficiaryifsccode").prop("disabled", false);
	$("#beneficiarycity").prop("disabled", false);
	$("#beneficiaryamount").prop("disabled", false);
}

function getBeneficiaryDetailsToUpdate() {
	hideBeneficiaryErrorFields();
	$("#beneficiaryname").prop("disabled", false);
	$("#beneficiarynickname").prop("disabled", false);
	$("#beneficiarymobilenumber").prop("disabled", false);
	$("#beneficiaryemail").prop("disabled", false);
	$("#beneficiaryaccountnumber").prop("disabled", true);
	$("#beneficiaryifsccode").prop("disabled", false);
	$("#beneficiaryamount").prop("disabled", false);
	//enableBeneficiaryFields();
	var val = $("#beneficiarylist").val();
	if (val != "") {
		var element = $("#beneficiarylist").find("option:selected");
		var beneficiaryDetails = element.attr("beneficiarydetails");
		var beneficiryDetailsArr = beneficiaryDetails.split("-");
		var benIfscCodeDetails = getIfscCodeDetails(
			beneficiryDetailsArr[5],
			"beneficiarybankname",
			"beneficiarybranchname",
			"beneficiarycity"
		);
		jQuery("#beneficiaryname").val(beneficiryDetailsArr[0]);
		jQuery("#beneficiarynickname").val(beneficiryDetailsArr[1]);
		jQuery("#beneficiarymobilenumber").val(beneficiryDetailsArr[2]);
		jQuery("#beneficiaryemail").val(beneficiryDetailsArr[3]);
		jQuery("#beneficiaryaccountnumber").val(beneficiryDetailsArr[4]);
		jQuery("#beneficiaryifsccode").val(beneficiryDetailsArr[5]);
		jQuery("#beneficiaryamount").val(beneficiryDetailsArr[6]);
		jQuery("#beneficiarybankname").prop("disabled", true);
		jQuery("#beneficiarybranchname").prop("disabled", true);
		jQuery("#beneficiarycity").prop("disabled", true);
		$("#beneficiarydetailspanel").show();
	} else {
		$("#beneficiarydetailspanel").hide();
	}
}

//Regarding Oxy Trade on 13-11-2020
//Regarding Oxy Trade on 14-11-2020
$(document).ready(function () {
	$("#beneficiaryaccountnumber").on("keypress", function (e) {
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

	$("#beneficiary-submit-btn,#beneficiary-edit-submit-btn").click(function () {
		var clickId = $(this)[0].id;
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;
		var enteredBeneficiaryname = $(".beneficiarynameValue").val();
		var enteredBeneficiaryNickname = $(".beneficiarynicknameValue").val();
		var enteredBeneficiarymobilenummber = $(
			".beneficiarymobilenumberValue"
		).val();
		var enteredBeneficiaryemail = $(".beneficiaryemailValue").val();
		var enteredBeneficiaryAccountnumber = $(
			".beneficiaryaccountnumberValue"
		).val();
		var enteredBeneficiaryBankname = $(".beneficiarybanknameValue").val();
		var enteredBeneficiaryBranchname = $(".beneficiarybranchnameValue").val();
		var enteredBeneficiaryAccounttype = $(".beneficiaryaccounttypeValue").val();
		var enteredBeneficiaryIfsccode = $(".beneficiaryifsccodeValue").val();
		var enteredBeneficiarycity = $(".beneficiarycityValue").val();
		var enteredBeneficiaryAmount = $(".beneficiaryamountValue").val();

		var ifscRegex = /^[A-Z]{4}\d{7}$/i;

		enteredBeneficiaryBankname = enteredBeneficiaryBankname.trim();
		enteredBeneficiaryBranchname = enteredBeneficiaryBranchname.trim();
		enteredBeneficiaryNickName = enteredBeneficiaryNickname.trim();
		//beneficiaryAccounttype = beneficiaryAccounttype.trim();
		enteredBeneficiaryIfsccode = enteredBeneficiaryIfsccode.trim();
		enteredBeneficiarycity = enteredBeneficiarycity.trim();

		var isValid = true;
		if (enteredBeneficiaryname == "") {
			$(".beneficiarynameError").show();
			isValid = false;
		} else {
			$(".beneficiarynameError").hide();
		}
		if (enteredBeneficiarymobilenummber == "") {
			$(".beneficiarymobilenumberError").show();
			isValid = false;
		} else {
			$(".beneficiarymobilenumberError").hide();
		}
		if (enteredBeneficiaryemail == "") {
			$(".beneficiaryemailError").show();
			isValid = false;
		} else {
			if (validateEmail(enteredBeneficiaryemail)) {
				$(".beneficiaryemailError").hide();
			} else {
				$(".beneficiaryemailError").text("Please enter proper emailID");
				$(".beneficiaryemailError").show();
				isValid = false;
			}
		}
		if (enteredBeneficiaryAccountnumber == "") {
			$(".beneficiaryaccountnumberError").show();
			isValid = false;
		} else {
			$(".beneficiaryaccountnumberError").hide();
		}

		if (enteredBeneficiaryBankname == "") {
			$(".beneficiarybanknameError").show();
			isValid = false;
		} else {
			$(".beneficiarybanknameError").hide();
		}

		if (enteredBeneficiaryBranchname == "") {
			$(".beneficiarybranchnameError").show();
			isValid = false;
		} else {
			$(".beneficiarybranchnameError").hide();
		}

		if (enteredBeneficiaryAccounttype == "") {
			$(".beneficiaryaccounttypeError").show();
			isValid = false;
		} else {
			$(".beneficiaryaccounttypeError").hide();
		}
		if (!ifscRegex.test(enteredBeneficiaryIfsccode)) {
			$(".beneficiaryifsccodeError").html("Please enter valid IFSC code.");
			$(".beneficiaryifsccodeError").show();
			isValid = false;
		} else {
			$(".beneficiaryifsccodeError").hide();
		}

		if (enteredBeneficiarycity == "") {
			$(".beneficiarycityError").show();
			isValid = false;
		} else {
			$(".beneficiarycityError").hide();
		}

		if (enteredBeneficiaryAmount == "") {
			$(".beneficiaryamountError").show();
		} else {
			$(".beneficiaryamountError").hide();
		}

		var postData = {
			beneficiaryAccountNumber: enteredBeneficiaryAccountnumber,
			beneficiaryAccountType: "BANK",
			beneficiaryIfsc: enteredBeneficiaryIfsccode,
			beneficiaryName: enteredBeneficiaryname,
			beneficiaryNickName: enteredBeneficiaryNickName,
			beneficiaryUserType: "CUSTOMER",
			beneficiaryEmail: enteredBeneficiaryemail,
			beneficiaryMobileNumber: enteredBeneficiarymobilenummber,
			amount: enteredBeneficiaryAmount,
		};

		var postData = JSON.stringify(postData);

		console.log(postData);
		var beneficiaryUrl = "";
		var type = "";
		if (clickId == "beneficiary-submit-btn") {
			beneficiaryUrl = baseUrl + "v1/user/" + userId + "/addingBeneficiary";
			type = "POST";
			jQuery("#addSuccessMsg").show();
			jQuery("#editSuccessMsg").hide();
		} else {
			beneficiaryUrl =
				baseUrl +
				"v1/user/" +
				userId +
				"/" +
				enteredBeneficiaryAccountnumber +
				"/updateBeneficiaryDetails";
			type = "PATCH";
			jQuery("#addSuccessMsg").hide();
			jQuery("#editSuccessMsg").show();
		}

		if (isValid == true) {
			$(".loadingSec").show();
			$.ajax({
				url: beneficiaryUrl,
				type: type,
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					//success block
				},
				statusCode: {
					200: function (response) {
						hideBeneficiaryErrorFields();
						disableBeneficiaryFields();
						$(".loadingSec").hide();

						$("#modal-addbeneficiary").modal("show");
					},
				},
				error: function (xhr, textStatus, errorThrown) {
					$(".loadingSec").hide();
					console.log("Error Something");

					console.log(arguments[0]);
					if (arguments[0]["responseJSON"] != undefined) {
						if (arguments[0]["responseJSON"].errorCode == 105) {
							$("#beneficiaryalreadyadded").text(
								arguments[0]["responseJSON"].errorMessage
							);
							$("#modal-beneficiryalreadyadded").modal("show");
						}
					}
				},

				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		} else {
			return isValid;
			$(".loadingSec").hide();
		}
	});
	$("#beneficiary-reset-btn").click(function () {
		hideBeneficiaryErrorFields();
		enableBeneficiaryFields();
		clearBeneficiaryFields();
	});

	//Regarding Ox y Trade Changes on 15-11-2020
	$("#beneficiaryifsccode").on("keyup", function (e) {
		var $this = $(this);

		if ($this.val().length == 11) {
			var ifscCode = $("#beneficiaryifsccode").val();
			var getStatUrl = "https://ifsc.razorpay.com/" + ifscCode;
			$.ajax({
				url: getStatUrl,
				type: "GET",
				success: function (data, textStatus, xhr) {
					$("#beneficiarybankname").val(data.BANK);
					$("#beneficiarybranchname").val(data.BRANCH);
					$("#beneficiarycity").val(data.CITY);
				},
				statusCode: {
					404: function (response) {
						$(".beneficiaryifsccodeError").html("Not Found");
						$(".beneficiaryifsccodeError").show();
					},
					200: function (response) {
						$(".beneficiaryifsccodeError").hide();
					},
				},

				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
			});
		}
	});
	$("#beneficiaryname").keypress(function (e) {
		var regex = new RegExp(/^[a-zA-Z\s]+$/);
		var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

		if (regex.test(str)) {
			return true;
		} else {
			e.preventDefault();
			return false;
		}
	});
	$("#beneficiarymobilenumber").on("keypress", function (e) {
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

	$(".beneficiaryamount").on("keypress", function (e) {
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

	$(".confirmBeneficiryAmountDetails").on("click", function (e) {
		var amount = 0;
		var loanofferAmount = $(".commitmentAmount").val();
		for (var i = 0; i < beneficiarieslist.length; i++) {
			var beneficiaryDetails = beneficiarieslist[i];
			var id =
				"beneficiaryamount_" + beneficiaryDetails.beneficiaryAccountNumber;
			if ($("#" + id).val() != "") {
				amount = amount + $("#" + id).val();
			}
		}
		if (loanofferAmount != amount) {
			$("#modal-loanamountvalidation").modal("show");
		} else {
			for (var i = 0; i < beneficiarieslist.length; i++) {
				var id = "beneficiaryamount_" + beneficiaryAccountNumber;
				$("#" + id).prop("disabled", true);
			}
			beneficiarieslist = "";
		}
	});
});

const getBorrowerVanNumber = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userId = suserId;
	const primaryType = sprimaryType;
	const accessToken = saccessToken;

	const getvannumberurl = baseUrl + "v1/user/" + userId + "/getVanNumber";
	console.log(getvannumberurl);

	fetch(getvannumberurl, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			$(".borrowerVirtualID").html(data.vanNumber);
		})
		.catch((error) => {
			$(".loadingSec").hide();
			console.log("Error Something");
		});
};

function validateEmail(email) {
	let reg =
		/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
	if (!reg.test(email)) {
		return false;
	}
	return true;
}

function clearBeneficiaryFields() {
	$(".beneficiarynameValue").val("");
	$(".beneficiarynicknameValue").val("");
	$(".beneficiarymobilenumberValue").val("");
	$(".beneficiaryemailValue").val("");
	$(".beneficiaryaccountnumberValue").val("");
	$(".beneficiarybanknameValue").val("");
	$(".beneficiarybranchnameValue").val("");
	$(".beneficiaryaccounttypeValue").val("");
	$(".beneficiaryifsccodeValue").val("");
	$(".beneficiarycityValue").val("");
	$(".beneficiaryamountValue").val("");
}

const loadBeneficiariesForBorrower = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userId = suserId;
	const primaryType = sprimaryType;
	const accessToken = saccessToken;

	const postData = JSON.stringify(postData);
	console.log(postData);

	const listurl =
		baseUrl + "v1/user/" + userId + "/getBenificaryAccountBasedOnUserId";

	fetch(listurl, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			console.log(data.index);
			totalEntries = data.count;
			console.log(data.count);
			if (data.count == 0) {
				$("#beneficiaryRecords").show();
				$("#beneficiaryConfirmation").hide();
			} else {
				$("#beneficiaryConfirmation").show();
				beneficiarieslist = data.listOfBeneficiaries;
				$("#beneficiaryRecords").hide();
				const template = document.getElementById("allBenificiaries").innerHTML;
				Mustache.parse(template);
				const html = Mustache.render(template, data);
				getStartingPageNumberForTable(data.listOfBeneficiaries, 1, 5);
				html = Mustache.to_html(template, {
					data: data.listOfBeneficiaries,
				});
				$("#displayBeneficiariesToTransfer").html(html);
			}
		})
		.catch((error) => {
			console.log("Error Something");
			$("#beneficiaryConfirmation").hide();
		});

	$(".loadingSec").hide();
};

function getStartingPageNumberForTable(data, pagenum, pagsize) {
	if (pagenum == 1) {
		sno = 1;
	} else {
		sno = (pagenum - 1) * pagsize + 1;
	}
	for (var i = 0; i < data.length; i++) {
		data[i].sno = sno++;
	}
}
function allownumberonly(e, obj) {
	var $this = $(obj);
	var regex = new RegExp("^[0-9\b]+$");
	var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

	if ($this.val().length > 7) {
		e.preventDefault();
		return false;
	}

	if (!regex.test(str)) {
		e.preventDefault();
		return false;
	}
	console.log($this.val());
	var tempAmount = $this.val() + str;
	if (tempAmount > 1000000) {
		e.preventDefault();
		return false;
	}

	return true;
}

function formDropDownForEditBeneficiary() {
	borrowerbeneficiaries = "";
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var listurl = "";

	listurl =
		baseUrl + "v1/user/" + userId + "/getBenificaryAccountBasedOnUserId";

	$.ajax({
		url: listurl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			totalEntries = data.count;
			$("#beneficiarylist").children("option:not(:first)").remove();
			if (data.listOfBeneficiaries.length > 0) {
				var beneficiaryList = data.listOfBeneficiaries;
				for (var i = 0; i < data.listOfBeneficiaries.length; i++) {
					var beneficiary = data.listOfBeneficiaries[i];
					var beneficiaryDetails =
						beneficiary.beneficiaryName +
						"-" +
						beneficiary.beneficiaryNickName +
						"-" +
						beneficiary.beneficiaryMobileNumber +
						"-" +
						beneficiary.beneficiaryEmail +
						"-" +
						beneficiary.beneficiaryAccountNumber +
						"-" +
						beneficiary.beneficiaryIfsc +
						"-" +
						beneficiary.amount;

					$("#beneficiarylist").append(
						$("<option></option>")
							.attr("value", beneficiary.beneficiaryAccountNumber)
							.attr("beneficiarydetails", beneficiaryDetails)
							.text(
								beneficiary.beneficiaryAccountNumber +
									" - " +
									beneficiary.beneficiaryName
							)
					);
				}
			} else {
				$("#beneficiaryConfirmation").hide();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$(".loadingSec").hide();
}

function getIfscCodeDetails(ifscCode, bankId, branchId, cityId) {
	var isfcCodeDetails = "";
	var getStatUrl = "https://ifsc.razorpay.com/" + ifscCode;
	$.ajax({
		url: getStatUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			$("#" + bankId).val(data.BANK);
			$("#" + branchId).val(data.BRANCH);
			$("#" + cityId).val(data.CITY);
		},
		statusCode: {
			404: function (response) {
				$(".IFSCCodeerror").html("Not Found");
				$(".IFSCCodeerror").show();
			},
			200: function (response) {
				$(".IFSCCodeerror").hide();
			},
		},

		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
	});
}
var prevRadioId = "";
function setSelectedBeneficiary(obj) {
	if (prevRadioId != "") {
		$("#beneficiaryamount_text_" + prevRadioId).val("");
		$("#beneficiaryamount_text_" + prevRadioId).prop("disabled", true);
		$("#beneficiaryamount_button_" + prevRadioId).prop("disabled", true);
		$("#beneficiaryAmountError" + prevRadioId).hide();
	}
	var selectedBeneficiaryId = $(obj).attr("id");
	prevRadioId = selectedBeneficiaryId;
	$("#beneficiaryamount_text_" + selectedBeneficiaryId).prop("disabled", false);
	$("#beneficiaryamount_button_" + selectedBeneficiaryId).prop(
		"disabled",
		false
	);
	$("#beneficiaryamount_text_" + selectedBeneficiaryId).focus();
}

function transferToBeneficiryFromBorrower(obj) {
	var beneficiaryConfirmId = $(obj).attr("id");
	var beneficiaryAmountId = beneficiaryConfirmId.replace("button", "text");
	var beneficiaryAmount = $("#" + beneficiaryAmountId).val();
	if (beneficiaryAmount == "" || beneficiaryAmount == 0) {
		$("#beneficiaryAmountError" + prevRadioId).show();
		return false;
	} else {
		$("#beneficiaryAmountError" + prevRadioId).hide();
	}
	var postData = {
		amount: beneficiaryAmount,
		beneficiaryAccountNumber: prevRadioId,
	};
	postData = JSON.stringify(postData);
	console.log(postData);

	$(".loadingSec").show();
	var tfrUrl =
		baseUrl + "v1/user/" + userId + "/addingAmountToExisitingBeneficiary";
	$.ajax({
		url: tfrUrl,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			alert("insuccess");
		},
		statusCode: {
			200: function (response) {
				var beneficiaryAccountID = beneficiaryAmountId.substr(
					beneficiaryAmountId.lastIndexOf("_") + 1
				);
				$("#beneficiaryamount_text_" + beneficiaryAccountID).prop(
					"disabled",
					true
				);
				$("#beneficiaryamount_button_" + beneficiaryAccountID).prop(
					"disabled",
					true
				);
				//$("#"+beneficiaryAccountID).prop("checked",false);
				$(".loadingSec").hide();
				$("#modal-transferTobeneficiary").modal("show");
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			$(".loadingSec").hide();
			console.log("error");
			console.log(arguments[0]);
			if (arguments[0]["responseJSON"] != undefined) {
				if (
					arguments[0]["responseJSON"].errorCode == 112 ||
					arguments[0]["responseJSON"].errorCode == 123
				) {
					$("#beneficiaryamounterrormessage").text(
						arguments[0]["responseJSON"].errorMessage
					);
					$("#modal-beneficiaryAmountErrorModal").modal("show");
				}
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}
////Changes by livin mandeva Ends

function durationIncrement() {
	$("#modal-durationIncrement").modal("show");
}

const durationIncr = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const updateDuration =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/updatingDuration`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/updatingDuration`;

	$.ajax({
		url: updateDuration,
		type: "PATCH",
		success: (data, textStatus, xhr) => {
			$("#modal-agreement-duration").modal("show");
			setTimeout(() => {
				location.reload();
			}, 2000);
		},
		error: (xhr, textStatus, errorThrown) => {
			console.log("Error Something");
		},
		beforeSend: (xhr) => {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

function loadBorrowerInfo() {
	$("#modal-displayBorrowerInfo").modal("show");
}

function rateThisBorrower() {
	$(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var lenderID = sUserId;
	var givenRating = $(".rating-value").val();

	if (givenRating == 0) {
		$(".displayZeroRatingError").show();
		$(".loadingSec").hide();
		return false;
	} else {
		$(".displayZeroRatingError").hide();
	}

	var pID = $(".loadPIDHere").attr("data-pID");
	var postData = {
		lenderId: lenderID,
		rating: givenRating,
	};
	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var ratingURL =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			pID +
			"/lenderRatingToBorrowerApplication";
	} else {
		var ratingURL =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			pID +
			"/lenderRatingToBorrowerApplication";
	}
	console.log(postData);
	console.log(pID);

	$.ajax({
		url: ratingURL,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$(".showSuccessMessage").show();
			$(".newLenderRating, .loadPIDHere").hide();
			$(".loadingSec").hide();
		},
		error: function (request, error) {
			if (arguments[0].responseJSON.errorCode == 108) {
				$(".displayZeroRatingError").html(
					"You've already given rating to this application."
				);
				$(".displayZeroRatingError").show();
				$(".loadingSec,.loadPIDHere, .newLenderRating").hide();
			}
		},

		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

// ////////////*lender profit earned start/////////

$(document).ready(function () {
	$("#close").click(function () {
		window.location = "idb";
	});
});

// ////////////* lender profit earned end /////livin/////////

function download() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/getLenderProfitPdf";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/getLenderProfitPdf";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",

		success: function (data, textStatus, xhr) {
			window.open(data.lenderProfitUrl, "_blank");
			$("#modal-agreement").modal("show");
		},
		statusCode: {
			500: function (jqXHR, textStatus, errorThrown) {
				var placeerrorHTMLCode = "Internal Server Error";
				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

// ////////////end /////////////livin//////

function lenderemail() {
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
			"/lenderInformation";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/lenderInformation";
	}

	$.ajax({
		url: getStatUrl,
		type: "GET",

		success: function (data, textStatus, xhr) {
			$("#modal-agreements").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

const emailcontent = async () => {
	try {
		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		const userId = suserId;
		const primaryType = sprimaryType;
		const accessToken = saccessToken;

		// Assuming you have this variable defined somewhere

		const getStatUrl =
			userisIn === "local"
				? "http://35.154.48.120:8080/oxynew/v1/user/mailContentShowingToLender"
				: "https://fintech.oxyloans.com/oxyloans/v1/user/mailContentShowingToLender";

		const response = await fetch(getStatUrl, {
			method: "GET",
			headers: {
				accessToken: accessToken,
			},
		});

		if (!response.ok) {
			throw new Error("Error fetching data");
		}

		const data = await response.json();

		$("#emailsubject").val(data.mailSubject);

		let emailcontent = data.mailContent;
		if (primaryType === "BORROWER") {
			emailcontent = emailcontent.split(
				"I am Investing multiples of INR 50,000 "
			)[0];
		}
		const bottomcontet = data.bottomOfTheMail;

		const fullemailcontent = `${emailcontent}\n${bottomcontet}`;

		$("#mailcontent").val(fullemailcontent);
		$("#emailcontent").val(fullemailcontent);

		$("#mailSubject").val(data.mailSubject);

		$(".getEmailMessage").html(data.mailContent);
		$(".usrNameEmails").html(data.mailSubject);
		$("#subjectbulk").val(data.mailSubject);

		$("#contentbulk").val(data.mailContent);
	} catch (error) {
		console.log("Error:", error.message);
	}
};

// ///refer a lender////
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
		var enteredmobileNumber = $("#refereemobilenumnber").val();
		var mailSubject = $("#mailSubject").val();
		var mailcontent = $("#mailcontent").val();
		var referrerType = $("input[name='referrerType']:checked").val();
		var userPrimaryType = $("input[name='primaryreferrerType']:checked").val();
		var referrercountryCode = $(".iti__selected-dial-code").html();

		var content = $("#emailcontent").val();
		var subject = $("#emailsubject").val();

		if (userPrimaryType == "BORROWER" || userPrimaryType == "LENDER") {
			userPrimaryType = userPrimaryType;
		} else {
			userPrimaryType = "LENDER";
		}

		if (referrercountryCode == "+91") {
			referrercountryCode = referrercountryCode.substring(3);
		} else {
			referrercountryCode = referrercountryCode.substring(1);
		}

		if (content == mailcontent) {
			mailcontent = 0;
		}

		if (subject == mailSubject) {
			mailSubject = 0;
		}

		var isValid = true;

		if (enteredname == "") {
			$(".name").show();
			isValid = false;
		} else {
			$(".name").hide();
		}

		if (enteredemil == "") {
			$(".email").show();
			isValid = false;
		} else {
			$(".email").hide();
		}

		if (enteredmobileNumber == "") {
			$(".mobilenumber").show();
			isValid = false;
		} else {
			$(".mobilenumber").hide();
		}

		if (referrerType == undefined) {
			$(".chooseReferrerType").show();
			isValid = false;
		} else {
			$(".chooseReferrerType").hide();
		}

		var postData = {
			email: enteredemil,
			mobileNumber: referrercountryCode + enteredmobileNumber,
			name: enteredname,
			mailContent: mailcontent,
			mailSubject: mailSubject,
			referrerId: userId,
			primaryType: userPrimaryType,
			citizenType: referrerType,
			seekerRequestedId: "0",
			inviteType: "SingleInvite",
			userType: null,
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
						$("#modal-alreadyDoneSendOffer").modal("show");
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
});

// ///////lender reffer info started///////////////
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
						//$(".content4").html("Page " + num); // or some ajax content loading...
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
	// $(".loadingSec").hide();
}

///////referee Registered info started//////

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
						//$(".content4").html("Page " + num); // or some ajax content loading...
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
	// $(".loadingSec").hide();
}
////////email content start by livin////

$(document).ready(() => {
	$("#viewPreview").click(() => {
		const getsubjectValue = $("#mailSubject").val();
		$(".getSubject").html(getsubjectValue);

		const getContentValue = $("#mailcontent").val();
		$(".getEmailMessage").html(getContentValue);

		const usrNameEmail = $(".displayUserName").html();
		$(".usrNameEmail").html(usrNameEmail);

		let getfrndName = $("#refereename").val();
		if (getfrndName === "") {
			getfrndName = "User Name";
		}
		$(".getfrndName").html(getfrndName);

		const d = new Date();
		const month = d.getMonth() + 1;
		const day = d.getDate();
		const output = `${d.getFullYear()}/${
			(("" + month).length < 2 ? "0" : "") + month
		}/${(("" + day).length < 2 ? "0" : "") + day}`;
		$(".getDate").html(output);

		$("#modal-previewEmail").modal("show");
	});
});

function copyrefLink(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-ref").html("Copied!");
}

function copyNrirefLink(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-ref-nri").html("Copied!");
}

function copyBorrowerrefLink(element) {
	var $temp = $("<input>");
	$("body").append($temp);
	$temp.val($(element).val()).select();
	document.execCommand("copy");
	$temp.remove();
	$(".btn-ref-borrower").html("Copied!");
}

const borrowersemiamount = async () => {
	try {
		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		const updateEmiUrlCard =
			userisIn === "local"
				? "http://35.154.48.120:8080/oxynew/v1/user/getLoanOwners"
				: "https://fintech.oxyloans.com/oxyloans/v1/user/getLoanOwners";

		const response = await fetch(updateEmiUrlCard, {
			method: "GET",
			headers: {
				accessToken: saccessToken,
			},
		});

		if (!response.ok) {
			throw new Error("Error fetching data");
		}

		const data = await response.json();
		const template = document.getElementById(
			"wallettransactiondetails"
		).innerHTML;
		Mustache.parse(template);
		const html = Mustache.render(template, data);
		const finalHtml = Mustache.to_html(template, {
			data: data.borrowersLoanOwnerNames,
		});
		$("#displaywallettrns").html(finalHtml);
	} catch (error) {
		console.log("Error:", error.message);
	}
};

// //////primary borrowers info'//////start by livin//

const viewborrowers = async (name) => {
	try {
		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		const updateEmiUrlCard =
			userisIn === "local"
				? `http://35.154.48.120:8080/oxynew/v1/user/${name}/getBorrowersLoanInfo`
				: `https://fintech.oxyloans.com/oxyloans/v1/user/${name}/getBorrowersLoanInfo`;

		const response = await fetch(updateEmiUrlCard, {
			method: "GET",
			headers: {
				accessToken: saccessToken,
			},
		});

		if (!response.ok) {
			throw new Error("Error fetching data");
		}

		const data = await response.json();

		const template = document.getElementById("borrowersinfo").innerHTML;
		Mustache.parse(template);
		const html = Mustache.to_html(template, {
			data: data.listOfBorrowersMappedToLoanOwner,
		});
		$("#binfo").html(html);
		$("#modal-viewEMI").modal("show");
		$("#totalborrowers").html(data.loanOwnersCount);
	} catch (error) {
		console.log("Error:", error.message);
	}
};

function refereeRegisteredInfos(ID) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			ID +
			"/gettingAmountDetails";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			ID +
			"/gettingAmountDetails";
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
			totalEntries = data.countOfDisbursments;
			if (data.countOfDisbursments == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("borrowersinfo").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderReferenceAmountResponse,
				});
				// alert(html);
				$("#binfo").html(html);
				$("#modal-viewEMI").modal("show");
				$("#disbursmentAmount").html(data.sumOfDisbursementAmount);

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
						//$(".content4").html("Page " + num); // or some ajax content loading...
						var postData = {
							pageNo: num,
							pageSize: "10",
						};
						// alert(postData);

						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								ID +
								"/gettingAmountDetails";
						} else {
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								ID +
								"/gettingAmountDetails";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("borrowersinfo").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.lenderReferenceAmountResponse,
								});
								// alert(html);
								$("#binfo").html(html);
								$("#disbursmentAmount").html(data.sumOfDisbursementAmount);
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
	// $(".loadingSec").hide();
}
////newdashboardcall///////

const newdashboardcall = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const newdashboardcallURL =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/lenderDashboard`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/lenderDashboard`;

	console.log(newdashboardcallURL);

	$.ajax({
		url: newdashboardcallURL,
		type: "GET",
		success: function (data, textStatus, xhr) {
			const principalAmtThroughWTransTemplate = document.getElementById(
				"principalAmtThroughWTransTpl"
			).innerHTML;
			Mustache.parse(principalAmtThroughWTransTemplate);
			const principalAmtThroughWTransHtml = Mustache.to_html(
				principalAmtThroughWTransTemplate,
				{
					data: data.lenderPricipalAmountThroughWalletTransaction,
				}
			);
			if (data.lenderPricipalAmountThroughWalletTransaction.length !== 0) {
				$("#principalAmtThroughWTransData").html(principalAmtThroughWTransHtml);
			} else {
				$("#principalAmtThroughWTransData").html(
					"<tr><td class='norecordsfound' colspan='5'><br/>No Records<br/>&nbsp;</td></tr>"
				);
			}

			const lenderInterestEarnedTemplate = document.getElementById(
				"lenderInterestEarnedTpl"
			).innerHTML;
			Mustache.parse(lenderInterestEarnedTemplate);
			const lenderInterestEarnedHtml = Mustache.to_html(
				lenderInterestEarnedTemplate,
				{
					data: data.lenderInterestEarned,
				}
			);
			if (data.lenderInterestEarned.length !== 0) {
				$("#lenderInterestEarnedData").html(lenderInterestEarnedHtml);
			} else {
				$("#lenderInterestEarnedData").html(
					"<tr><td class='norecordsfound' colspan='5'><br/>No Records<br/>&nbsp;</td></tr>"
				);
			}

			const lenderPrincipalReturnedDataTemplate = document.getElementById(
				"lenderPrincipalReturnedDataTpl"
			).innerHTML;
			Mustache.parse(lenderPrincipalReturnedDataTemplate);
			const lenderPrincipalReturnedDataHtml = Mustache.to_html(
				lenderPrincipalReturnedDataTemplate,
				{
					data: data.lenderPrincipalReturned,
				}
			);
			if (data.lenderPrincipalReturned.length !== 0) {
				$("#lenderPrincipalReturnedData").html(lenderPrincipalReturnedDataHtml);
			} else {
				$("#lenderPrincipalReturnedData").html(
					"<tr><td class='norecordsfound' colspan='5'><br/>No Records<br/>&nbsp;</td></tr>"
				);
			}

			const lenderWithDrawTemplate =
				document.getElementById("lenderWithDrawTpl").innerHTML;
			Mustache.parse(lenderWithDrawTemplate);
			const lenderWithDrawHtml = Mustache.to_html(lenderWithDrawTemplate, {
				data: data.lenderWithDraw,
			});
			if (data.lenderWithDraw.length !== 0) {
				$("#lenderWithDrawData").html(lenderWithDrawHtml);
			} else {
				$("#lenderWithDrawData").html(
					"<tr><td class='norecordsfound' colspan='5'><br/>No Records<br/>&nbsp;</td></tr>"
				);
			}

			$(".totalPrincipalInLending").html(data.totalPrincipalInLending);
			$(".sumOfInterestAmount").html(data.sumOfInterestAmount);
			$(".totalPrincipalOnFirstApril, .principalAsonApr1st").html(
				data.totalPrincipalOnFirstApril
			);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

/////////////Gmail contacts start  by livin////

const getGmailAuthorization = async () => {
	try {
		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		const getGmailAuthUrl =
			userisIn === "local"
				? `http://35.154.48.120:8080/oxynew/v1/user/getGmailAuthorization/gmailcontacts/${sprimaryType}`
				: `https://fintech.oxyloans.com/oxyloans/v1/user/getGmailAuthorization/gmailcontacts/${sprimaryType}`;

		const response = await fetch(getGmailAuthUrl, {
			method: "GET",
			headers: {
				accessToken: saccessToken,
			},
		});

		if (!response.ok) {
			throw new Error("Error fetching data");
		}
		const data = await response.json();
		$("#Gmailcontacts").attr("href", data.signInUrl);
	} catch (error) {
		console.log("Error:", error.message);
	}
};

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
		userType: sprimaryType,
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
							success: function (data, textStatus, xhr) {},
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

const getlendercontacts = async () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const getGmailAuthorization =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/getLenderStoredEmailContacts/${suserId}`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/getLenderStoredEmailContacts/${suserId}`;

	try {
		const response = await fetch(getGmailAuthorization, {
			method: "GET",
			headers: {
				accessToken: saccessToken,
			},
		});

		if (response.ok) {
			const data = await response.json();
			if (data.length == 0) {
				$("#gmailContactsNoData").show();
			} else {
				const template = document.getElementById("Gmailcontacts").innerHTML;
				Mustache.parse(template);
				const html = Mustache.render(template, { data });
				$("#gmailcontacts").html(html);
			}
		} else {
			console.log("Error:", response.status);
		}
	} catch (error) {
		console.log("Error:", error);
	}
};

///////Bulk lender Invites//////START BY LIVIN///

const bulkinvitelender = async () => {
	try {
		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		$(".loadingSec").show();
		const selectedCheckboxes = $("input:checkbox[name=type]:checked");
		const array = [...selectedCheckboxes]
			.map((checkbox) => checkbox.value)
			.join(",");

		const mailContent = $("#contentbulk").val();
		const mailSubject = $("#subjectbulk").val();

		const updateCommentUrl =
			userisIn === "local"
				? "http://35.154.48.120:8080/oxynew/v1/user/lenderReferring"
				: "https://fintech.oxyloans.com/oxyloans/v1/user/lenderReferring";

		const postData = {
			email: array,
			referrerId: suserId,
			mailContent: mailContent,
			mailSubject: mailSubject,
			inviteType: "BulkInvite",
		};

		const response = await fetch(updateCommentUrl, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
			body: JSON.stringify(postData),
		});

		if (!response.ok) {
			$(".loadingSec").hide();
			return response.json().then((data) => {
				if (data.errorCode === 403) {
					$("#modal-alreadyLenderReferred").modal("show");
				}
			});
		}

		const responseData = await response.json();
		$(".loadingSec").hide();
		$("#modal-alreadyDoneSendOffers").modal("show");
	} catch (error) {}
};

const previewLink = () => {
	const d = new Date();
	const month = d.getMonth() + 1;
	const day = d.getDate();
	const output = `${d.getFullYear()}/${month.toString().padStart(2, "0")}/${day
		.toString()
		.padStart(2, "0")}`;
	$(".getDate").html(output);
	$("#modal-previewEmail").modal("show");
};

$(document).ready(() => {
	$("#emailredirection").click(() => {
		window.location = "https://oxyloans.com/new/displayingReferrerInfo";
	});
});

/////////view payment status//////////

const viewpaymentStatus = (id) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const getpaymentstatus =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${id}/displayingRefereePaymentStatus`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${id}/displayingRefereePaymentStatus`;

	$.ajax({
		url: getpaymentstatus,
		type: "GET",
		success: function (data, textStatus, xhr) {
			const template = document.getElementById("lpaymentstatus").innerHTML;
			Mustache.parse(template);
			const html = Mustache.to_html(template, { data });
			$("#lenderpaymentinfo").html(html);
			$("#modal-viewPaymentstatus").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

function viewDeals(type) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/listOfDealsInformationToLender";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/listOfDealsInformationToLender";
	}
	var postData = {
		pageNo: 1,
		pageSize: 20,
		dealType: type,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);
			totalEntries = data.totalCount;

			if (totalEntries == 0 || totalEntries == null) {
				$("#displayDelasInfo").show();
				viewEquityDeals("HAPPENING", "ESCROW", "NODATA");
			} else {
				const convertNewRoi = data.listOfDealsInformationToLender.map(
					(data, index) => {
						const newObj = { ...data };
						if (newObj.repaymentType === "MONTHLY") {
							newObj.rateOfInterest = newObj.rateOfInterest + "% P.M";
						} else if (newObj.repaymentType === "YEARLY") {
							newObj.rateOfInterest =
								Math.round(newObj.rateOfInterest * 12) + "% P.A";
						}
						return newObj;
					}
				);

				console.log(data);

				console.log("================");
				var template = document.getElementById("displayDealsScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: convertNewRoi,
				});
				$("#displayDealsData").html(html);
				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".viewDealsPagination")
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
							dealType: type,
						};
						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var getDeals =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/listOfDealsInformationToLender";
						} else {
							var getDeals =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/listOfDealsInformationToLender";
						}
						$.ajax({
							url: getDeals,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log("================");

								const convertNewRoipagination =
									data.listOfDealsInformationToLender.map((data, index) => {
										const newObj = { ...data };
										if (newObj.repaymentType === "MONTHLY") {
											newObj.rateOfInterest = newObj.rateOfInterest + "% P.M";
										} else if (newObj.repaymentType === "YEARLY") {
											newObj.rateOfInterest =
												Math.round(newObj.rateOfInterest * 12) + "% P.A";
										}
										return newObj;
									});

								// $('.loadingSec').attr("style", "display : none;color:#FFF");
								var template =
									document.getElementById("displayDealsScript").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: convertNewRoipagination,
								});
								$("#displayDealsData").html(html);
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

function handleChangeNewmembership(src) {
	console.log(src.value);
	if (src.value == "perdeal") {
		console.log("perdealnew");
		$(".oxyFoundingLendersSecFee").hide();
		$(".theUserISNewLender").show();
	} else {
		console.log("multiples");
		$(".oxyFoundingLendersSecFee").show();
		$(".theUserISNewLender").hide();
	}
}

function viewSingleDeal(dealId) {
	setTimeout(() => {
		$(".loadingSec").show();
	}, 100);
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	dealId = dealId;

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/" +
			dealId +
			"/singleDeal";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/" +
			dealId +
			"/singleDeal";
	}
	$.ajax({
		url: getDeals,
		type: "GET",
		success: function (data, textStatus, xhr) {
			console.log(data);

			dealTypeSalaried = data.dealType;
			groupName = data.groupName;
			participatedDealType = data.dealType;
			dealMinimumAmount = data.minimumPaticipationAmount;
			lenderFeeStatus = data.feeStatusToParticipate;
			dealRoiForEach = data.processingFeePercentage;
			dealValue = data.dealAmount;
			remaingParticipation = data.remainingAmountInDeal;
			dealIdForClosing = dealId;
			iswaviverDeal = data.lifeTimeWaiver;
			alredyParticipatedAmount = data.lenderParticipationTotal;
			waiverAmount = data.lifeTimeWaiverLimit;
			dealMaxAmount = data.lenderParticiptionLimit;

			if (
				data.lenderParticipationTotal != 0 &&
				data.lenderParticipationTotal != null
			) {
				dealParticipatedAmount = data.lenderParticipationTotal;
			}

			const newObj = { ...data };
			if (newObj.monthlyInterest != 0) {
				newObj.rateOfInterest = newObj.monthlyInterest + " % PM";
				newObj["payout"] = "MONTHLY";
				writeCookie("choosenPayOutOption", "monthlyInterest");
			} else if (newObj.quartlyInterest != 0) {
				newObj.rateOfInterest = newObj.quartlyInterest * 3 + " % PA ";
				newObj["payout"] = "QUARTERLY";
				writeCookie("choosenPayOutOption", "quartlyInterest");
			} else if (newObj.halfInterest != 0) {
				newObj.rateOfInterest = newObj.halfInterest * 6 + " % PA ";
				newObj["payout"] = "HALFYEARLY";
				writeCookie("choosenPayOutOption", "halfInterest");
			} else if (newObj.yearlyInterest === "YEARLY") {
				newObj.rateOfInterest = newObj.yearlyInterest * 12 + " %  PA ";
				newObj["payout"] = "YEARLY";
				writeCookie("choosenPayOutOption", "halfInterest");
			} else if (newObj.endofthedealInterest != 0) {
				newObj.rateOfInterest = newObj.endofthedealInterest * 12 + " %  PA ";
				newObj["payout"] = "ENDOFTHEDEAL";
				writeCookie("choosenPayOutOption", "endofthedealInterest");
			}

			if (data.fundingStatus == "COMPLETED") {
				$(".fundingStatus-Closed").show();
				$(".fundingStatus-Happening").hide();
			} else {
				$(".fundingStatus-Closed").hide();
				$(".fundingStatus-Happening").show();
			}

			$(".deal-Name").html(data.dealName);

			var template = document.getElementById("displayDealsScript").innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: newObj });
			$("#displayDealsData").html(html);


			lenderRemainingPanLimit = data.lenderRemainingPanLimit;
			lenderTotalParticipationAmount = data.lenderTotalParticipationAmount;
			lenderRemainingWalletAmount = data.lenderRemainingWalletAmount;


			writeCookie("lenderRemainingPanLimit", lenderRemainingPanLimit);
			writeCookie(
				"lenderTotalParticipationAmount",
				lenderTotalParticipationAmount
			);
			writeCookie("lenderRemainingWalletAmount", lenderRemainingWalletAmount);

			setTimeout(() => {
				if (data.feeStatusToParticipate == "OPTIONAL") {

					console.log("fee optional !NewLender VALIDITY EXPIRED USERS");
					if (groupName != "NewLender" && data.lenderValidityStatus == false) {
						console.log("fee optional OxyPremiuimLenders");
						$(".NewLender_NotePoint").html(
							"<code>Info :</code> Processing Fee is waived for this deal."
						);
						$(".NewLender_NoteDiv").show();
						$(".new_btn_NewLender_participation").attr(
							"onclick",
							"participateinthisDeal('" +
								"OxyPremium" +
								"','" +
								dealIdForClosing +
								"')"
						);
					} else if (
						groupName != "NewLender" &&
						data.lenderValidityStatus == true
					) {
						console.log("fee optional validity expired user");
						$(".NewLender_NotePoint").html(
							"<code>Info:</code> Processing Fee is waived for this deal."
						);
						$(".NewLender_NoteDiv").show();
						$(".new_btn_NewLender_participation").attr(
							"onclick",
							"pDealonlyNewLneder('" +
								"ISNewLenderFee" +
								"','" +
								dealIdForClosing +
								"')"
						);
					} else {
						console.log("fee optional !ANYLENDER");
						$(".NewLender_NotePoint").html(
							"<code>Note :</code> Processing Fee is waived for this deal."
						);
						$(".NewLender_NoteDiv").show();
						$(".new_btn_NewLender_participation").attr(
							"onclick",
							"pDealonlyNewLneder('" +
								"ISNewLenderFee" +
								"','" +
								dealIdForClosing +
								"')"
						);
					}
				} else {
					if (data.lenderValidityStatus == false && groupName != "NewLender") {
						console.log(" feepaid users");
						$(".NewLender_NoteDiv").hide();
						$(".NewLender_NotePoint").hide();
						$(".new_btn_NewLender_participation").attr(
							"onclick",
							"participateinthisDeal('" +
								"OxyPremium" +
								"','" +
								dealIdForClosing +
								"')"
						);
					} else if (
						data.lenderValidityStatus == true &&
						groupName != "NewLender"
					) {
						console.log("fee MANDATORY  fee UN paid anylender");
						$(".NewLender_NotePoint").html(
							"<code>Note:</code> Your validity has expired. Please pay to continue your participation."
						);
						$(".NewLender_NoteDiv").show();
						$(".new_btn_NewLender_participation").attr(
							"onclick",
							"participateinthisDeal('" +
								"OxyPremium" +
								"','" +
								dealIdForClosing +
								"')"
						);
					} else {
						console.log("fee  MANDATORY for  NewLender");
						$(".insideCard_Ul").show();
						$(".NewLender_NoteDiv").show();
					}
				}
			}, 500);

			$(".groupId").html(data.groupId);
			if (
				data.lenderParticipationTotal != 0 &&
				data.lenderParticipationTotal != null
			) {
				lenderParticipated = true;
			    writeCookie("isparticipated", lenderParticipated);
				$(".participated-Amount").html(data.lenderParticipationTotal);

				if (dealTypeSalaried == "PERSONAL") {
					$(".showWalletError").html(
						"you should not participate twice in salaried deal."
					);
					$(".showWalletError").show("slow");
				} else {
					$(".showWalletError").hide();
				}
			} else {
				lenderParticipated = false;
				writeCookie("isparticipated", lenderParticipated);
			}

			setTimeout(() => {
				$(".loadingSec").hide();
			}, 600);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			setTimeout(() => {
				$(".loadingSec").hide();
			}, 200);
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function calcProfitValue() {
	var walletAmount = $("#myparticipation").val();
	choosenListFrom = choosenListFrom;
	var theTenureWillbe = choosenMoelis;

	if (theTenureWillbe == "monthlyInterest") {
		theTenureWillbe = 1;
	} else if (theTenureWillbe == "quartlyInterest") {
		theTenureWillbe = 3;
	} else if (theTenureWillbe == "halfInterest") {
		theTenureWillbe = 6;
	} else if (theTenureWillbe == "yearlyInterest") {
		theTenureWillbe = 12;
	} else if (theTenureWillbe == "endofthedealInterest") {
		theTenureWillbe = 12;
	}

	//alert(theTenureWillbe);
	theTenureWillbe = theTenureWillbe / 12;

	//P x R x T ÷ 100
	var theInterestIs = (walletAmount * theTenureWillbe * choosenListFrom) / 100;
	var theAvgMonthlyReturns = theInterestIs;

	if (theTenureWillbe == "monthlyInterest") {
		theInterestIs = theAvgMonthlyReturns;
	} else if (theTenureWillbe == "quartlyInterest") {
		theInterestIs = theAvgMonthlyReturns / 3;
	} else if (theTenureWillbe == "halfInterest") {
		theInterestIs = theAvgMonthlyReturns / 6;
	} else if (theTenureWillbe == "yearlyInterest") {
		theInterestIs = theAvgMonthlyReturns / 12;
	} else if (theTenureWillbe == "endofthedealInterest") {
		theInterestIs = theAvgMonthlyReturns / 12;
	}

	if (groupName == "newLender") {
		$(".theUserISShashLender .avgReturnsAre").html(theInterestIs);
	} else if (groupName == "Satish#OXYFoundingLenders") {
		$(".theUserISShashLender .avgReturnsAre").html(theInterestIs);
	} else if (groupName == "OXYFoundingLenders") {
		$(".oxyFoundingLendersSec .avgReturnsAre").html(theInterestIs);
	}

	var newLenderFeePercentage = (walletAmount * 1) / 100;
	var newLenderGstAndFeeCalculation = (newLenderFeePercentage * 118) / 100;
	// var newfeetesting=newLenderGstAndFeeCalculation/4;
	$(".newLenderFeeBtn").attr("data-fee", newLenderGstAndFeeCalculation);

	// Avg. Profit
}

function yesLetmePartcipate(dealType, dealId, status) {
	// The params be update before opening the popup
	$(".yesBTN4Deal").attr("disabled", true);
	userconfirmed = "YES";
	participateinthisDeal(dealType, dealId, status);
}

function yesLetmePartcipateForNEWLENDER(dealType, dealId) {
	// The params be update before opening the popup
	userconfirmed = "YES";
	pDealonlyNewLneder(dealType, dealId);
	userconfirmed = "NO";
}

function newLenderPartcipatedAmount(dealType, dealId, status) {
	// The params be update before opening the popup
	lenderParticipated = false;
	userconfirmed = "YES";
	payFromwallet = "NO";
	// userAddconfirmed="YES";
	pDealonlyNewLneder(dealType, dealId, status);
}

function newLenderUpdatePartcipationAmount(dealType, dealId, status) {
	// The params be update before opening the popup
	lenderParticipated = false;
	userconfirmed = "YES";
	payFromwallet = "NO";
	pDealonlyNewLneder(dealType, dealId, status);
}

function lenderConfirmParticipationDeal() {
	$(".yesBTN4Deal").attr("disabled", true);
	$("#lenderParticiptionAdd").modal("hide");
	$("#confirm-Participation-Deal").modal("show");
}
function yesAddPartcipatedAmount(dealType, dealId, status) {
	// The params be update before opening the popup
	$(".userConfirmBtn").attr("disabled", true);
	$("#confirm-Participation-Deal").modal("hide");
	lenderParticipated = false;
	userconfirmed = "YES";
	participateinthisDeal(dealType, dealId, status);
}

function yesAddConfirmPartcipated(dealType, dealId, status) {
	// The params be update before opening the popup
	lenderParticipated = false;
	userconfirmed = "YES";
	participateinthisDeal(dealType, dealId, status);
}

function yesUpdatePartcipationAmount(dealType, dealId, status) {
	// The params be update before opening the popup
	lenderParticipated = false;
	userconfirmed = "YES";
	participateinthisDeal(dealType, dealId, status);
}

function participateinthisDeal(dealType, dealId, status) {
	if (userSubscriptionStatus == false) {
		console.log("Im in participateinthisDeal");
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		var actuallenderBalance = $(".lenderWalletAmount").html();
		actuallenderBalance = parseInt(actuallenderBalance);
		var participatedAmount = $("#myparticipation").val();

		var choosenPayOutOption = getCookie("choosenPayOutOption");
		var dealId = dealId;
		var choosenRateofInterest = choosenListFrom;
		var groupId = $(".groupId").html();
		var participationStatus = status;

		const userPanLimit = getCookie("lenderRemainingPanLimit");
		const userTotalParticipation = getCookie("lenderTotalParticipationAmount");
		const lenderRemainingWalletAmount = getCookie(
			"lenderRemainingWalletAmount"
		);

		const isalreadyParticipated = getCookie("isparticipated");

		var principalChoosenType = $("input[name=moveprincipal]:checked").val();

		let dealExtensionChoosenType = $(
			"input[name=checkDealExtension]:checked"
		).val();
		if (dealExtensionChoosenType == undefined) {
			dealExtensionChoosenType = "NOTINTEREST";
		} else {
			dealExtensionChoosenType = "NOTINTEREST";
		}

		if (principalChoosenType == undefined) {
			$(".showWalletError").html("Choose Return Principal Method");
			$(".showWalletError").show("slow");
			$(".move_principal_error").show();
			$(".movePrincipalTObank_transfer")
				.fadeOut(100)
				.fadeIn(100)
				.fadeOut(100)
				.fadeIn(100);
			return false;
		}



		if (participatedAmount == "") {
			window.scrollTo(100, 0);
			$(".showWalletError").html(
				"Please entere the amount that you wish to lend in this deal."
			);
			$(".showWalletError").show("slow");
			return false;
		} else if (actuallenderBalance < participatedAmount) {
			window.scrollTo(100, 0);
			$(".showWalletError").show("slow");
			return false;
		} else if (participatedAmount > dealMaxAmount) {
			window.scrollTo(100, 0);
			$(".showWalletError").show("slow");
			$(".showWalletError").html(
				"You are participating in more than the maximum amount."
			);
			return false;
		} else {
			if (remaingParticipation > dealMinimumAmount) {
				if (participatedAmount < dealMinimumAmount && isalreadyParticipated==false) {
					$(".showWalletError").html("investment is INR " + dealMinimumAmount);
					$(".showWalletError").show("slow");
					return false;
				} else if (participatedAmount > remaingParticipation) {
					$(".showWalletError").html(
						"Your participation amount is greater than the Deal available limit."
					);
					$(".showWalletError").show("slow");
					return false;
				}
			} else if (remaingParticipation < dealMinimumAmount) {
				if (remaingParticipation == 0) {
					closeTheDealStatus(dealId);
					$(".showWalletError").html("Deal Is Closed");
					$(".showWalletError").show("slow");
					return false;
				} else if (participatedAmount < remaingParticipation) {
					$(".showWalletError").html(
						"Minimum investment is INR  " + remaingParticipation
					);
					$(".showWalletError").show("slow");
					return false;
				} else if (participatedAmount > remaingParticipation) {
					$(".showWalletError").html(
						"Your participation amount is greater than the Deal available limit."
					);
					$(".showWalletError").show("slow");
					return false;
				}
			}
		}

		if (choosenPayOutOption == "monthlyInterest") {
			choosenPayOutOption = "MONTHLY";
			var ipx = $(".thisIsSelectedItem .percentageSec1").html();
			$(".dealRoI").html(ipx);
		} else if (choosenPayOutOption == "quartlyInterest") {
			choosenPayOutOption = "QUARTELY";
			var ipx = $(".thisIsSelectedItem .percentageSec1").html();
			$(".dealRoI").html(ipx * 3);
		} else if (choosenPayOutOption == "halfInterest") {
			choosenPayOutOption = "HALFLY";
			var ipx = $(".thisIsSelectedItem .percentageSec1").html();
			$(".dealRoI").html(ipx * 6);
		} else if (choosenPayOutOption == "yearlyInterest") {
			choosenPayOutOption = "YEARLY";
			var ipx = $(".thisIsSelectedItem .percentageSec1").html();
			$(".dealRoI").html(Math.round(ipx * 12));
		} else if (choosenPayOutOption == "endofthedealInterest") {
			choosenPayOutOption = "ENDOFTHEDEAL";
		}

		if (userisIn == "local") {
			var updateparticipation =
				"http://35.154.48.120:8080/oxynew/v1/user/updatingLenderDeal";
		} else {
			var updateparticipation =
				"https://fintech.oxyloans.com/oxyloans/v1/user/updatingLenderDeal";
		}
		$(".newLenderFeeBtn").attr("disabled", true);
		// var ipx = $(".thisIsSelectedItem .percentageSec1").html();
		$(".amountLendEntered").html(participatedAmount);
		$(".dealNamePop").html($(".displayedDealName").html());

		//  $(".dealRoI").html(ipx);

		$(".tupeOfInt").html(choosenPayOutOption);
		$(".latestWalletBalance").html(actuallenderBalance - participatedAmount);

		if (lenderParticipated == true) {
			userconfirmed = "YES";
			var participationStatus = "UPDATE";
		} else {
			var participationStatus = status;
		}

		if (lenderParticipated == true) {
			$(".participated-new-Amount").html(participatedAmount);
			$(".currentParticipationAmount").html(participatedAmount);
			var totalAmount =
				parseInt(participatedAmount) + parseInt(dealParticipatedAmount);
			$(".nEWparticaipationAmount").html(totalAmount);
			var status = "ADD";
			var update = "UPDATE";

			$("#lenderParticiptionAdd .yesBTN4Deal").attr(
				"onclick",
				"lenderConfirmParticipationDeal('" +
					dealType +
					"','" +
					dealId +
					"','" +
					status +
					"','" +
					principalChoosenType +
					"')"
			);
			$("#confirm-Participation-Deal .userConfirmBtn").attr(
				"onclick",
				"yesAddPartcipatedAmount('" +
					dealType +
					"','" +
					dealId +
					"','" +
					status +
					"','" +
					principalChoosenType +
					"')"
			);
			$("#lenderParticiptionAdd .updateBTNDeal").attr(
				"onclick",
				"yesUpdatePartcipationAmount('" +
					dealType +
					"','" +
					dealId +
					"','" +
					update +
					"','" +
					principalChoosenType +
					"')"
			);
			$("#lenderParticiptionAdd").modal("show");
			return false;
		} else {
			$("#lenderParticiptionAdd").modal("hide");
		}
		if (userconfirmed == "NO") {
			$("#dealConfirmationFromLender .yesBTN4Deal").attr(
				"onclick",
				"yesLetmePartcipate('" + dealType + "','" + dealId + "','ADD')"
			);
			$("#dealConfirmationFromLender").modal("show");
			return false;
		} else {
			$("#dealConfirmationFromLender").modal("hide");
		}

		var postData = {
			userId: suserId,
			groupId: groupId,
			dealId: dealId,
			participatedAmount: participatedAmount,
			lenderReturnType: choosenPayOutOption,
			// rateofInterest: choosenRateofInterest,
			processingFee: 0,
			paticipationStatus: participationStatus,
			accountType: principalChoosenType,
			feeStatus: "COMPLETED",
			lenderTotalPanLimit: userPanLimit,
			totalParticipatedAmount: userTotalParticipation,
			lenderRemainingWalletAmount: lenderRemainingWalletAmount,
			lenderParticipationFrom:"WEB",
			ExtensionConsents: dealExtensionChoosenType,
		};

		$(".hide-btn").attr("disabled", true);
		var postData = JSON.stringify(postData);
		$(".loadingSec").show();

		$.ajax({
			url: updateparticipation,
			type: "PATCH",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".loadingSec").hide();
				$(".hide-btn").attr("disabled", false);
				$("#modal-comfirmSuccess").modal("show");
				$(".newLenderFeeBtn").attr("disabled", false);
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
				$(".newLenderFeeBtn,.hide-btn").attr("disabled", false);
				$(".loadingSec").hide();
				$(".hide-btn").show();
				var errormessage = arguments[0].responseJSON.errorMessage;
				if (arguments[0].responseJSON.errorCode == 110) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 123) {
					let paymentErrormessage = errormessage.match(/\d+/g);
					$(".paymembership_throughdeal").attr("deal-Id", dealId);
					$(".paymembership_throughdeal").attr(
						"deal-fee",
						paymentErrormessage[1]
					);

					$(".membership_title_point").html(errormessage);
					$("#modal-pay-feeon-participating").modal("show");
					console.log(paymentErrormessage);
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 125) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(arguments[0].responseJSON.errorMessage);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 124) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 126) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 403) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 109) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		// allow subscribe for the existing users
		var principalChoosenType = $("input[name=moveprincipal]:checked").val();

		let choseDealExtension = $("input[name=checkDealExtension]:checked").val();
		if (choseDealExtension == undefined) {
			choseDealExtension = "NOTINTEREST";
		} else {
			choseDealExtension = "NOTINTEREST";
		}

		groupName = "NewLender";

		// $("#modal-approve-chosenMembershipExpiredUser .fee_pay_expired").attr(
		// 	"deal-Id",
		// 	dealId
		// );
		// $("#modal-approve-chosenMembershipExpiredUser").modal("show");
		// $(".feePayment-Btn").trigger("click");choseDealExtension below function

		renewalTheExistingBorrower(
			"oxyFounding",
			dealId,
			principalChoosenType,
			status,
			choseDealExtension
		);
	}
}

function renewalTheExistingBorrower(dealType, dealId, payoutMethod, status,choseDealExtension) {
	console.log("Im in pDealonlyNewLneder");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const userPanLimit = getCookie("lenderRemainingPanLimit");
	const userTotalParticipation = getCookie("lenderTotalParticipationAmount");
	const lenderRemainingWalletAmount = getCookie("lenderRemainingWalletAmount");

	var actuallenderBalance = $(".lenderWalletAmount").html();
	actuallenderBalance = parseInt(actuallenderBalance);

	var participatedAmount = $("#myparticipation").val();
	var choosenPayOutOption = getCookie("choosenPayOutOption");
	const isalreadyParticipated = getCookie("isparticipated");

	var dealId = dealId;
	var choosenRateofInterest = choosenListFrom;
	var groupId = $(".groupId").html();

	if (participatedAmount == "") {
		window.scrollTo(100, 0);
		$(".showWalletError").html(
			"Please enter the amount that you wish to lend in this deal."
		);
		$(".showWalletError").show("slow");
		return false;
	} else if (actuallenderBalance < participatedAmount) {
		window.scrollTo(100, 0);
		$(".showWalletError").show("slow");
		return false;
	} else if (participatedAmount > dealMaxAmount) {
		window.scrollTo(100, 0);
		$(".showWalletError").show("slow");
		$(".showWalletError").html(
			"You are participating in more than the maximum amount."
		);
		return false;
	} else {
		if (remaingParticipation > dealMinimumAmount) {
			if (participatedAmount < dealMinimumAmount && isalreadyParticipated==false) {
				$(".showWalletError").html(
					"Minimum investment is INR  " + dealMinimumAmount
				);
				$(".showWalletError").show("slow");
				return false;
			} else if (participatedAmount > remaingParticipation) {
				$(".showWalletError").html(
					"Your participation amount is greater than the Deal available limit."
				);
				$(".showWalletError").show("slow");
				return false;
			}
		} else if (remaingParticipation < dealMinimumAmount) {
			if (remaingParticipation == 0) {
				closeTheDealStatus(dealId);
				$(".showWalletError").html("Deal Is Closed");
				$(".showWalletError").show("slow");
				return false;
			} else if (participatedAmount < remaingParticipation) {
				$(".showWalletError").html(
					" investment is INR " + remaingParticipation
				);
				$(".showWalletError").show("slow");
				return false;
			} else if (participatedAmount > remaingParticipation) {
				$(".showWalletError").html(
					"Your participation amount is greater than the Deal available limit."
				);
				$(".showWalletError").show("slow");
				return false;
			}
		}
	}

	if (payoutMethod == undefined) {
		window.scrollTo(100, 0);
		$(".showWalletError").html("Please select principal transfer method");
		$(".showWalletError").show("slow");
		return false;
	}

	if (choosenPayOutOption == "monthlyInterest") {
		choosenPayOutOption = "MONTHLY";
	} else if (choosenPayOutOption == "quartlyInterest") {
		choosenPayOutOption = "QUARTELY";
	} else if (choosenPayOutOption == "halfInterest") {
		choosenPayOutOption = "HALFLY";
	} else if (choosenPayOutOption == "yearlyInterest") {
		choosenPayOutOption = "YEARLY";
	} else if (choosenPayOutOption == "endofthedealInterest") {
		choosenPayOutOption = "ENDOFTHEDEAL";
	}

	if (userisIn == "local") {
		var updateparticipation =
			"http://35.154.48.120:8080/oxynew/v1/user/updatingLenderDeal";
	} else {
		var updateparticipation =
			"https://fintech.oxyloans.com/oxyloans/v1/user/updatingLenderDeal";
	}

	var ipx = $(".thisIsSelectedItem .percentageSec1").html();
	$(".amountLendEntered").html(participatedAmount);
	$(".dealNamePop").html($(".displayedDealName").html());
	$(".dealRoI").html(ipx);
	$(".tupeOfInt").html(choosenPayOutOption);
	$(".latestWalletBalance").html(actuallenderBalance - participatedAmount);
	var dealName = $(".displayedDealName").html();

	console.log("API URL" + updateparticipation);
	console.log(groupName);

	const sumofwaiveramount = alredyParticipatedAmount + participatedAmount;

	if (groupName == "NewLender" && participatedDealType == "EQUITY") {
		$("#equityDealConfirmationFromLenderNEW .yesBTN4Equity").attr(
			"onclick",
			"submitPaticipation('" +
				dealId +
				"','" +
				dealType +
				"','" +
				participatedAmount +
				"','" +
				choosenRateofInterest +
				"','" +
				choosenPayOutOption +
				"''0''" +
				groupId +
				"','" +
				dealName +
				"','" +
				"''0''" +
				"','" +
				payoutMethod +
				"','" +
				"''0''" +
				"','" +
				"''COMPLETED''" +
				"')"
		);

		$("#equityDealConfirmationFromLenderNEW").modal("show");
		return false;
	} else if (iswaviverDeal == true && sumofwaiveramount >= waiverAmount) {
		$(".bodyContentNewPopUp .amountLendEntered").html(participatedAmount);
		$(".bodyContentNewPopUp .dealNamePop").html($(".displayedDealName").html());
		$(".bodyContentNewPopUp .dealRoI").html(ipx);
		$(".bodyContentNewPopUp .tupeOfInt").html(choosenPayOutOption);
		$(".bodyContentNewPopUp .processingType").html("processing Fee : ");
		$(".bodyContentNewPopUp .processingInfo").html("life Time-Waiver");

		$("#equityDealConfirmationFromLenderNEW .yesBTN4Equity").attr(
			"onclick",
			"submitPaticipation('" +
				dealId +
				"','" +
				dealType +
				"','" +
				participatedAmount +
				"','" +
				choosenRateofInterest +
				"','" +
				choosenPayOutOption +
				"''0''" +
				groupId +
				"','" +
				dealName +
				"','" +
				"''0''" +
				"','" +
				principalChoosenType +
				"','" +
				"''0''" +
				"','" +
				"''COMPLETED''" +
				"')"
		);
		$("#equityDealConfirmationFromLenderNEW").modal("show");
		return false;
	} else {
		if (groupName == "NewLender") {
			if (feePayementisDone == "PAID") {
				return true;
			} else {
				calcProfitValue();

				var userFromBtn = $(this).attr("data-from");
				if (dealType == "ISNewLender") {
					fee = $(".newLenderFeeBtn").attr("data-fee");
					fee = parseInt(fee);
				} else {
					// fee = 5900.0;
					// fee = parseInt(fee);
				}
				var dealNamefromele = $(".displayedDealName").html();
				writeCookie("participatedAmount", participatedAmount);
				writeCookie("choosenRateofInterest", choosenRateofInterest);
				writeCookie("choosenPayOutOption", choosenPayOutOption);
				writeCookie("groupId", groupId);
				// writeCookie("processingFee", fee);
				writeCookie("dealName", dealNamefromele);
				writeCookie("dealId", dealId);
				writeCookie("payoutMethod", payoutMethod);

				$("#modal-approve-chosenMembershipExpiredUser .fee_pay_expired").attr(
					"deal-Id",
					dealId
				);
				$("#modal-approve-chosenMembershipExpiredUser").modal("show");
				return false;

				if (feePayementisDone == "PAID") {
					return true;
				} else {
					writeCookie("participatedAmount", participatedAmount);
					writeCookie("choosenRateofInterest", choosenRateofInterest);
					writeCookie("choosenPayOutOption", choosenPayOutOption);
					writeCookie("groupId", groupId);
					writeCookie("processingFee", fee);
					writeCookie("dealName", dealNamefromele);
					writeCookie("dealId", dealId);
					writeCookie("payoutMethod", payoutMethod);
					 writeCookie("dealDurationExtenson", choseDealExtension);

					if (dealId != 4 || dealId != "4") {
						return false;
					}
				}
			}
		}
	}
	console.log("feePayementisDone Status is" + feePayementisDone);

	fee = parseInt(fee);
	if (dealId == 7 && groupName == "NewLender") {
		fee = 0;
	}

	var postData = {
		userId: suserId,
		groupId: groupId,
		dealId: dealId,
		participatedAmount: participatedAmount,
		lenderReturnType: choosenPayOutOption,
		//rateofInterest: choosenRateofInterest,
		processingFee: fee,
		paticipationStatus: status,
		accountType: payoutMethod,

		ExtensionConsents: choseDealExtension,
		lenderTotalPanLimit: userPanLimit,
		totalParticipatedAmount: userTotalParticipation,
		lenderRemainingWalletAmount: lenderRemainingWalletAmount,
		lenderParticipationFrom:"WEB"
	};

	if (dealId == 4 || dealId == "4") {
		console.log("payment is not required.");
		console.log("=========cookies are set==============");
		var postData = JSON.stringify(postData);

		$(".loadingSec").show();
		$.ajax({
			url: updateparticipation,
			type: "PATCH",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".loadingSec").hide();
				$("#modal-comfirmSuccess").modal("show");
			},
			error: function (xhr, textStatus, errorThrown) {
				$(".loadingSec").hide();
				console.log("Error Something");
				var errormessage = arguments[0].responseJSON.errorMessage;
				$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);
				if (arguments[0].responseJSON.errorCode == 110) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 123) {
					let paymentErrormessage = errormessage.match(/\d+/g);
					$(".paymembership_throughdeal").attr("deal-Id", dealId);
					$(".paymembership_throughdeal").attr(
						"deal-fee",
						paymentErrormessage[1]
					);
					$(".membership_title_point").html(errormessage);
					$("#modal-pay-feeon-participating").modal("show");
					console.log(paymentErrormessage);
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 125) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(arguments[0].responseJSON.errorMessage);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 124) {
					$("#newlenderParticiptionAddUpdate").modal("hide");
					$("#dealConfirmationFromLenderNEW").modal("hide");

					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 126) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 403) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 109) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
}

function viewMyDeals() {
	setTimeout(() => {
		$(".loadingSec").show();
	}, 500);

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/runningDealsInfoBasedOnPagination";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/runningDealsInfoBasedOnPagination";
	}

	var postData = {
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);
			totalEntries = data.count;

			if (data.lenderPaticipatedResponseDto.length == 0) {
				$(".notParticipated").show();

				setTimeout(() => {
					$(".loadingSec").hide();
				}, 1000);
			} else {
				const convertNewRoiparticipated = data.lenderPaticipatedResponseDto.map(
					(data, index) => {
						const newObj = { ...data };
						if (newObj.lederReturnType === "MONTHLY") {
							newObj.rateOfInterest = newObj.rateOfInterest + "% P.M";
						} else if (newObj.lederReturnType === "YEARLY") {
							newObj.rateOfInterest =
								Math.round(newObj.rateOfInterest * 12) + "% P.A";
						}
						return newObj;
					}
				);

				var template = document.getElementById("displayDealsScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: convertNewRoiparticipated,
				});
				$("#displayDealsData").html(html);

				setTimeout(() => {
					$(".loadingSec").hide();
				}, 1000);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".dashBoardPagination")
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
							var getDeals =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/runningDealsInfoBasedOnPagination";
						} else {
							var getDeals =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/runningDealsInfoBasedOnPagination";
						}
						$.ajax({
							url: getDeals,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								const convertNewRoiparticipatedpagination =
									data.lenderPaticipatedResponseDto.map((data, index) => {
										const newObj = { ...data };
										if (newObj.lederReturnType === "MONTHLY") {
											newObj.rateOfInterest = newObj.rateOfInterest + "% P.M";
										} else if (newObj.lederReturnType === "YEARLY") {
											newObj.rateOfInterest =
												Math.round(newObj.rateOfInterest * 12) + "% P.A";
										}
										return newObj;
									});

								var template =
									document.getElementById("displayDealsScript").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: convertNewRoiparticipatedpagination,
								});
								$("#displayDealsData").html(html);

								setTimeout(() => {
									$(".loadingSec").hide();
								}, 3000);
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
	$(".loadingSec").hide();
}

function featchPayuDetails(suserId, fee, dealId, amountType) {
	console.log("logged in to the fetchPaymentDetails");

	// const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var postData = {
		amount: fee,
		dealId: dealId,
	};

	var feeType = "";

	if (amountType == "OxyFoundingLender") {
		feeType = "OxyFoundingLender";
	} else {
		feeType = "NewLender";
	}

	var postData = JSON.stringify(postData);

	var returnURL = "";

	if (userisIn == "local") {
		var featchSaltDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/fetchLenderPauyUPaymentDetails";
		returnURL =
			"http://localhost/prod/master/oxyloans_fe/participateDeal?" +
			feeType +
			"=true";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var featchSaltDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/fetchLenderPauyUPaymentDetails";
		returnURL = "https://oxyloans.com/new/participateDeal?" + feeType + "=true";
	}

	$.ajax({
		url: featchSaltDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#key").val(data.key);
			$("#salt").val(data.salt);
			$("#txnid").val(data.txnid);
			$("#hash").val(data.hash);
			$("#amount").val(data.amount);
			$("#amount_display").html(data.amount);
			$("#fname").val(data.firstname);
			$("#fname_display").html(data.firstname);
			$("#email").val(data.email);
			$("#email_display").html(data.email);
			$("#mobile").val(data.phone);
			$("#mobile_display").html(data.phone);
			$("#pinfo").val(data.productinfo);
			$("#pinfo_display").html(data.productinfo);
			$("#udf5").val(data.udf5);
			$("#surl").val(data.surl);
			$("#furl").val(data.furl);
			console.log(123);
			launchBOLT();
			$("#loadingSec").hide();
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function fetchCashFree(suserId, fee, dealId, amountType) {
	console.log("logged in to the fetchPaymentDetails");

	// const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var postData = {
		amount: fee,
		dealId: dealId,
		paymentType: "BEFORE",
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var featchSaltDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/cashfree";
	} else {
		var featchSaltDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/cashfree";
	}

	$.ajax({
		url: featchSaltDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (userisIn == "prod") {
				$("#redirectForm").attr(
					"action",
					"https://www.cashfree.com/checkout/post/submit"
				);
			}

			$("#appId").val(data.appId);
			$("#orderId").val(data.orderId);
			$("#orderAmount").val(data.amount);
			$("#orderCurrency").val(data.orderCurrency);
			$("#orderNote").val(data.orderNote);
			$("#customerName").val(data.name);
			$("#customerEmail").val(data.email);
			$("#customerPhone").val(data.mobileNumber);
			$("#returnUrl").val(data.returnUrl);
			$("#notifyUrl").val(data.notifyUrl);
			$("#signature").val(data.signature);
			$("#redirectForm").submit();

			console.log("cash free");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function fetchNewMembershipCashFree(
	suserId,
	fee,
	dealId,
	amountType,
	choosenOption,
	PaymentMode
) {
	console.log("logged in to the fetchPaymentDetails");

	// const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var postData = {
		amount: fee,
		dealId: dealId,
		lenderFeePayments: choosenOption,
		paymentType: PaymentMode,
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var featchSaltDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/cashfree";
	} else {
		var featchSaltDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/cashfree";
	}

	$.ajax({
		url: featchSaltDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);

			if (userisIn == "prod") {
				$("#redirectForm").attr(
					"action",
					"https://www.cashfree.com/checkout/post/submit"
				);
			}

			$("#appId").val(data.appId);
			$("#orderId").val(data.orderId);
			$("#orderAmount").val(data.amount);
			$("#orderCurrency").val(data.orderCurrency);
			$("#orderNote").val(data.orderNote);
			$("#customerName").val(data.name);
			$("#customerEmail").val(data.email);
			$("#customerPhone").val(data.mobileNumber);
			$("#returnUrl").val(data.returnUrl);
			$("#notifyUrl").val(data.notifyUrl);
			$("#signature").val(data.signature);
			$("#redirectForm").submit();

			console.log("cash free");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function fetchValidityExpireMembershipCashFree(
	suserId,
	fee,
	dealId,
	amountType,
	choosenOption,
	PaymentMode
) {
	console.log("logged in to the fetchPaymentDetails");

	// const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var postData = {
		amount: fee,
		dealId: dealId,
		lenderFeePayments: choosenOption,
		paymentType: PaymentMode,
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var featchSaltDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/cashfree";
	} else {
		var featchSaltDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/cashfree";
	}

	$.ajax({
		url: featchSaltDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);

			if (userisIn == "prod") {
				$("#redirectForm").attr(
					"action",
					"https://www.cashfree.com/checkout/post/submit"
				);
			}

			$("#appId").val(data.appId);
			$("#orderId").val(data.orderId);
			$("#orderAmount").val(data.amount);
			$("#orderCurrency").val(data.orderCurrency);
			$("#orderNote").val(data.orderNote);
			$("#customerName").val(data.name);
			$("#customerEmail").val(data.email);
			$("#customerPhone").val(data.mobileNumber);
			$("#returnUrl").val(data.returnUrl);
			$("#notifyUrl").val(data.notifyUrl);
			$("#signature").val(data.signature);
			$("#redirectForm").submit();

			console.log("cash free");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function getgroupingofborrowers() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var getborrowers =
			"http://35.154.48.120:8080/oxynew/v1/user/groupingOfBorrowers";
	} else {
		var getborrowers =
			"https://fintech.oxyloans.com/oxyloans/v1/user/groupingOfBorrowers";
	}

	var postData = {
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: getborrowers,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.loanOwnersCount;
			if (data.loanOwnersCount == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById(
					"wallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, {
					data: data.borrowersLoanOwnerNames,
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

						var postData = JSON.stringify(postData);

						if (userisIn == "local") {
							var getborrowers =
								"http://35.154.48.120:8080/oxynew/v1/user/groupingOfBorrowers";
						} else {
							var getborrowers =
								"https://fintech.oxyloans.com/oxyloans/v1/user/groupingOfBorrowers";
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
									data: data.borrowersLoanOwnerNames,
								});
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

function viewborrowerloanowner() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var name = $("#borrowername").val();
	if (userisIn == "local") {
		var getborrowers =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			name +
			"/gettingLenderBorrowerOwner";
	} else {
		var getborrowers =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			name +
			"/gettingLenderBorrowerOwner";
	}

	var postData = {
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: getborrowers,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.loanOwnersCount;
			if (data.loanOwnersCount == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("borrowersinfo").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.listOfBorrowersMappedToLoanOwner,
				});
				$("#binfo").html(html);

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
							var getborrowers =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								name +
								"/gettingLenderBorrowerOwner";
						} else {
							var getborrowers =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								name +
								"/gettingLenderBorrowerOwner";
						}

						$.ajax({
							url: getborrowers,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("borrowersinfo").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.listOfBorrowersMappedToLoanOwner,
								});
								$("#binfo").html(html);
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
// update the whatsapp number///////

function updateWhatsappNumber() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var whatsAppNumber = $("#whatsAppNumber").val();

	var whatsAppUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  suserId +
			  "/updatingWhatsAppNumber"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  suserId +
			  "/updatingWhatsAppNumber";

	var postData = {
		whatsAppNumber: whatsAppNumber,
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	fetch(whatsAppUrl, {
		method: "PATCH",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: postData,
	})
		.then((response) => {
			if (response.ok) {
				$("#modal-updateWhatsappNumber").modal("hide");
				$("#modal-updateWhatsappNumberStatus").modal("show");
			} else {
				throw new Error("Request failed");
			}
		})
		.catch((error) => {
			console.log("Error Something");
		});
}

function loadActiveLoanss() {
	$("#modal-checkEnach").modal("hide");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	// fName = "lenderUserId";

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	} else {
		fName = "lenderUserId";
	}

	var postData = {
		leftOperand: {
			fieldName: fName,
			fieldValue: userId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "borrowerEsignId",
				operator: "NOT_NULL",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "loanStatus",
				fieldValue: "Active",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var actOnLoan =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/searchEnachMandate";
	} else {
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/searchEnachMandate";
	}

	$.ajax({
		url: actOnLoan,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			//console.log(data.results);
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRequests").html(html);
				var displayPageNo = totalEntries / 9;
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
							leftOperand: {
								fieldName: fName,
								fieldValue: userId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "borrowerEsignId",
									operator: "NOT_NULL",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "loanStatus",
									fieldValue: "Active",
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanId",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);
						// var actOnLoan = "https://fintech.oxyloans.com/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/search";

						if (userisIn == "local") {
							//http://35.154.48.120:8080/oxynew/
							var actOnLoan =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/searchEnachMandate";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/searchEnachMandate";
						}

						$.ajax({
							url: actOnLoan,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								displayRequests;

								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});

								$("#displayRequests").html(html);
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
	$(".loadingSec").hide();
}

function yesPayThrouhWallets(dealType, dealId) {
	// $(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	$("#lenderPaymentTransactions").modal("hide");
	var actuallenderBalance = $(".lenderWalletAmount").html();
	actuallenderBalance = parseInt(actuallenderBalance);
	var participatedAmount = $("#myparticipation").val();

	participatedAmount = participatedAmount;

	if (dealType == "NewLender") {
		var processingFee = (participatedAmount * 1) / 100;
		fee = processingFee;
	} else {
		var processingFee = 5900;
		fee = processingFee;
	}

	var totalFeeandparticipationAmount =
		parseInt(participatedAmount) + parseInt(processingFee);
	$(".feeProcessing").html(processingFee);

	if (actuallenderBalance < totalFeeandparticipationAmount) {
		window.scrollTo(100, 0);
		$(".showWalletError").html(
			"Your participation amount is less then your  wallet Balance"
		);
		$(".showWalletError").show("slow");
		return false;
	}

	if (actuallenderBalance < participatedAmount) {
		window.scrollTo(100, 0);
		$(".showWalletError").show("slow");
		return false;
	} else if (participatedAmount == "") {
		window.scrollTo(100, 0);
		$(".showWalletError").html(
			"Please enter the amount you wish to lend in this deal."
		);
		$(".showWalletError").show("slow");
		return false;
	} else if (participatedAmount <= 4999) {
		$(".showWalletError").html("Minimum investment is INR 5000.");
		$(".showWalletError").show("slow");
		return false;
	}
	if (userisIn == "local") {
		var updateparticipation =
			"http://35.154.48.120:8080/oxynew/v1/user/lenderFeeThroughWallet";
	} else {
		var updateparticipation =
			"https://fintech.oxyloans.com/oxyloans/v1/user/lenderFeeThroughWallet";
	}
	var postData = {
		userId: suserId,
		lenderFee: processingFee,
		dealId: dealId,
		participationAmount: participatedAmount,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: updateparticipation,
		type: "POST",
		contentType: "application/json",
		dataType: "json",
		data: postData,
		success: function (data, textStatus, xhr) {
			submitPaticipation(
				walletdealId,
				walletdealType,
				participatedAmount,
				roi,
				payOutOption,
				fee,
				groupID,
				dealName
			);
		},
		statusCode: {
			400: function (response) {},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function pDealonlyNewLneder(dealType, dealId, status) {
	console.log("Im in pDealonlyNewLneder");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const userPanLimit = getCookie("lenderRemainingPanLimit");
	const userTotalParticipation = getCookie("lenderTotalParticipationAmount");
	const lenderRemainingWalletAmount = getCookie("lenderRemainingWalletAmount");


	var actuallenderBalance = $(".lenderWalletAmount").html();
	actuallenderBalance = parseInt(actuallenderBalance);
	var participatedAmount = $("#myparticipation").val();

	const isalreadyParticipated = getCookie("isparticipated");

	var choosenPayOutOption = getCookie("choosenPayOutOption");
	var dealId = dealId;
	var choosenRateofInterest = choosenListFrom;
	var groupId = $(".groupId").html();

	var principalChoosenType = $("input[name=moveprincipal]:checked").val();

	let dealExtension = $("input[name=checkDealExtension]:checked").val();
	   if (dealExtension == undefined) {
		  dealExtension = "NOTINTEREST";
	   }else{
		 dealExtension = "NOTINTEREST";
	 }

	if (participatedAmount == "") {
		window.scrollTo(100, 0);
		$(".showWalletError").html(
			"Please entere the amount that you wish to lend in this deal."
		);
		$(".showWalletError").show("slow");
		return false;
	} else if (actuallenderBalance < participatedAmount) {
		window.scrollTo(100, 0);
		$(".showWalletError").show("slow");
		return false;
	} else if (participatedAmount > dealMaxAmount) {
		window.scrollTo(100, 0);
		$(".showWalletError").show("slow");
		$(".showWalletError").html(
			"You are participating in more than the maximum amount."
		);
		return false;
	} else {
		if (remaingParticipation > dealMinimumAmount) {
			if (participatedAmount < dealMinimumAmount &&  isalreadyParticipated==false) {
				$(".showWalletError").html(
					"Minimum investment is INR" + dealMinimumAmount
				);
				$(".showWalletError").show("slow");
				return false;
			} else if (participatedAmount > remaingParticipation) {
				$(".showWalletError").html(
					"Your participation amount is greater than the Deal available limit."
				);
				$(".showWalletError").show("slow");
				return false;
			}
		} else if (remaingParticipation < dealMinimumAmount) {
			if (remaingParticipation == 0) {
				closeTheDealStatus(dealId);
				$(".showWalletError").html("Deal Is Closed");
				$(".showWalletError").show("slow");
				return false;
			} else if (participatedAmount < remaingParticipation) {
				$(".showWalletError").html(
					" investment is INR" + remaingParticipation
				);
				$(".showWalletError").show("slow");
				return false;
			} else if (participatedAmount > remaingParticipation) {
				$(".showWalletError").html(
					"Your participation amount is greater than the Deal available limit."
				);
				$(".showWalletError").show("slow");
				return false;
			}
		}
	}

	if (principalChoosenType == undefined) {
		$(".showWalletError").html("Choose Return Principal Method");
		$(".showWalletError").show("slow");
		$(".move_principal_error").show();
		$(".movePrincipalTObank_transfer")
			.fadeOut(100)
			.fadeIn(100)
			.fadeOut(100)
			.fadeIn(100);
		return false;
	}

	if (choosenPayOutOption == "monthlyInterest") {
		choosenPayOutOption = "MONTHLY";
	} else if (choosenPayOutOption == "quartlyInterest") {
		choosenPayOutOption = "QUARTELY";
	} else if (choosenPayOutOption == "halfInterest") {
		choosenPayOutOption = "HALFLY";
	} else if (choosenPayOutOption == "yearlyInterest") {
		choosenPayOutOption = "YEARLY";
	} else if (choosenPayOutOption == "endofthedealInterest") {
		choosenPayOutOption = "ENDOFTHEDEAL";
	}

	const sumofwaiveramount =
		parseInt(alredyParticipatedAmount) + parseInt(participatedAmount);

	if (userisIn == "local") {
		var updateparticipation =
			"http://35.154.48.120:8080/oxynew/v1/user/updatingLenderDeal";
	} else {
		var updateparticipation =
			"https://fintech.oxyloans.com/oxyloans/v1/user/updatingLenderDeal";
	}

	var ipx = $(".thisIsSelectedItem .percentageSec1").html();
	$(".amountLendEntered").html(participatedAmount);
	$(".dealNamePop").html($(".displayedDealName").html());
	$(".dealRoI").html(ipx);
	$(".tupeOfInt").html(choosenPayOutOption);
	$(".latestWalletBalance").html(actuallenderBalance - participatedAmount);
	var dealName = $(".displayedDealName").attr("deal_name");

	if (lenderFeeStatus == "OPTIONAL") {
		$(".bodyContentNewPopUp .amountLendEntered").html(participatedAmount);
		$(".bodyContentNewPopUp .dealNamePop").html($(".displayedDealName").html());
		// $(".bodyContentNewPopUp .dealRoI").html(ipx);
		$(".bodyContentNewPopUp .tupeOfInt").html(choosenPayOutOption);
		 writeCookie("choseDealExtension", dealExtension);

		$("#equityDealConfirmationFromLenderNEW .yesBTN4Equity").attr(
			"onclick",
			"submitPaticipation('" +
				dealId +
				"','" +
				dealType +
				"','" +
				participatedAmount +
				"','" +
				choosenRateofInterest +
				"','" +
				choosenPayOutOption +
				"','0','" +
				groupId +
				"','" +
				dealName +
				"','0','" +
				principalChoosenType +
				"','0','" +
				"','COMPLETED','" +
				"')"
		);

		$("#equityDealConfirmationFromLenderNEW").modal("show");
		return false;
	} else if (iswaviverDeal == true && sumofwaiveramount >= waiverAmount) {
		$(".bodyContentNewPopUp .amountLendEntered").html(participatedAmount);
		$(".bodyContentNewPopUp .dealNamePop").html($(".displayedDealName").html());
		$(".bodyContentNewPopUp .dealRoI").html(ipx);
		$(".bodyContentNewPopUp .tupeOfInt").html(choosenPayOutOption);
		$(".bodyContentNewPopUp .processingType").html("processing Fee : ");
		$(".bodyContentNewPopUp .processingInfo").html("life Time-Waiver");
		writeCookie("choseDealExtension", dealExtension);

		$("#equityDealConfirmationFromLenderNEW .yesBTN4Equity").attr(
			"onclick",
			"submitPaticipation('" +
				dealId +
				"','" +
				dealType +
				"','" +
				participatedAmount +
				"','" +
				choosenRateofInterest +
				"','" +
				choosenPayOutOption +
				"','0','" +
				groupId +
				"','" +
				dealName +
				"','0','" +
				principalChoosenType +
				"','0','" +
				"','COMPLETED','" +
				"')"
		);
		$("#equityDealConfirmationFromLenderNEW").modal("show");
		return false;
	} else {
		if (
			groupName == "NewLender" ||
			groupName == "OxyPremiuimLenders" ||
			groupName == "OXYMARCH09"
		) {
			if (feePayementisDone == "PAID") {
				return true;
			} else {
				calcProfitValue();
				// var newLenderFeePercentage =
				// 	(participatedAmount * dealRoiForEach) / 100;
				// var newLenderGstAndFeeCalculation =
				// 	(newLenderFeePercentage * 118) / 100;
				//  $(".newLenderFeeBtn").attr("data-fee", newLenderGstAndFeeCalculation);

				var userFromBtn = $(this).attr("data-from");
				if (dealType == "ISNewLender") {
					fee = $(".newLenderFeeBtn").attr("data-fee");
					fee = parseInt(fee);

					// fetchCashFree(suserId, fee, dealId, dealType);
					$(".feewalet-Btn").attr("data-fee", fee);
					$(".heading_fee .participate_text").html(
						"Pay INR " + fee + " membership fee and participate deal"
					);
					// $("#modal-approve-walletFeepayThroughparticipatedeal").modal("show");
					$(
						"#modal-approve-walletFeepayThroughparticipatedeal .feePaymentGateway-Btn"
					).attr(
						"onclick",
						"fetchNewMembershipCashFree('" +
							suserId +
							"','" +
							fee +
							"','" +
							dealId +
							"','" +
							true +
							"','" +
							"PERDEAL" +
							"','" +
							"BEFORE" +
							"')"
					);

					writeCookie("participatedAmount", participatedAmount);
					writeCookie("choosenRateofInterest", choosenRateofInterest);
					writeCookie("choosenPayOutOption", choosenPayOutOption);
					writeCookie("groupId", groupId);
					writeCookie("processingFee", fee);
					writeCookie("dealName", dealNamefromele);
					writeCookie("dealId", dealId);
					writeCookie("payoutMethod", principalChoosenType);
					writeCookie("lenderfeePaidId", "0");
				    writeCookie("choseDealExtension", dealExtension);
					loadParticipationSuccess("PENDING", fee);
					return false;
				} else {
					const membership = $("#membershipTenure").val();
					fee = $(".newLenderFeeBtnfee").attr("data-fee");
					$(".feewalet-Btn").attr("data-fee", fee);
					$(".heading_fee .participate_text").html(
						"Pay  INR " +
							fee +
							" membership fee through the below options and participate these deal"
					);

					$("#modal-approve-walletFeepayThroughparticipatedeal").modal("show");

					$(
						"#modal-approve-walletFeepayThroughparticipatedeal .feewalet-Btn"
					).attr(
						"onclick",
						"participationfeepayThroughwallet('" +
							suserId +
							"','" +
							"isoxyfounding" +
							"')"
					);
					$(
						"#modal-approve-walletFeepayThroughparticipatedeal .feePaymentGateway-Btn"
					).attr(
						"onclick",
						"fetchNewMembershipCashFree('" +
							suserId +
							"','" +
							fee +
							"','" +
							dealId +
							"','" +
							true +
							"','" +
							membership +
							"','" +
							"BEFORE" +
							"')"
					);

					writeCookie("participatedAmount", participatedAmount);
					writeCookie("choosenRateofInterest", choosenRateofInterest);
					writeCookie("choosenPayOutOption", choosenPayOutOption);
					writeCookie("groupId", groupId);
					writeCookie("processingFee", fee);
					writeCookie("dealName", dealNamefromele);
					writeCookie("dealId", dealId);
					writeCookie("payoutMethod", principalChoosenType);
				    writeCookie("choseDealExtension", dealExtension);

					return false;
				}

				fee = parseInt(fee);
				$(".processingFeeNew").html(fee);
				var dealNamefromele = $(".displayedDealName").html();

				if (dealId != 4 || dealId != "4") {
					fetchCashFree(suserId, fee, dealId, dealType);
				}

				if (feePayementisDone == "PAID") {
					return true;
				} else {
					writeCookie("participatedAmount", participatedAmount);
					writeCookie("choosenRateofInterest", choosenRateofInterest);
					writeCookie("choosenPayOutOption", choosenPayOutOption);
					writeCookie("groupId", groupId);
					writeCookie("processingFee", fee);
					writeCookie("dealName", dealNamefromele);
					writeCookie("dealId", dealId);
					writeCookie("payoutMethod", principalChoosenType);
					 writeCookie("choseDealExtension", dealExtension);

					if (dealId != 4 || dealId != "4") {
						return false;
					}
				}
			}
		}
	}
	console.log("feePayementisDone Status is" + feePayementisDone);

	fee = parseInt(fee);
	if (dealId == 7 && groupName == "NewLender") {
		fee = 0;
	}

	$(".newLenderFeeBtn,#ouxyFeeId").attr("disabled", "disabled");

	var postData = {
		userId: suserId,
		groupId: groupId,
		dealId: dealId,
		participatedAmount: participatedAmount,
		lenderReturnType: choosenPayOutOption,
		// rateofInterest: choosenRateofInterest,
		processingFee: fee,
		paticipationStatus: status,
		accountType: principalChoosenType,

		ExtensionConsents: dealExtension,
		lenderTotalPanLimit: userPanLimit,
		totalParticipatedAmount: userTotalParticipation,
		lenderRemainingWalletAmount: lenderRemainingWalletAmount,
		lenderParticipationFrom:"WEB"
	};

	if (dealId == 4 || dealId == "4") {
		console.log("payment is not required.");
		console.log("=========cookies are set==============");
		var postData = JSON.stringify(postData);

		$(".loadingSec").show();
		$.ajax({
			url: updateparticipation,
			type: "PATCH",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".loadingSec").hide();
				$(".newLenderFeeBtn,#ouxyFeeId").removeAttr("disabled");
				$("#modal-comfirmSuccess").modal("show");
			},
			error: function (xhr, textStatus, errorThrown) {
				$(".loadingSec").hide();
				$(".newLenderFeeBtn,#ouxyFeeId").removeAttr("disabled");
				console.log("Error Something");
				var errormessage = arguments[0].responseJSON.errorMessage;
				$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);
				if (arguments[0].responseJSON.errorCode == 110) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 123) {
					window.scrollTo(100, 0);
					let paymentErrormessage = errormessage.match(/\d+/g);
					$(".paymembership_throughdeal").attr("deal-Id", dealId);
					$(".paymembership_throughdeal").attr(
						"deal-fee",
						paymentErrormessage[1]
					);
					$(".membership_title_point").html(errormessage);
					$("#modal-pay-feeon-participating").modal("show");
					console.log(paymentErrormessage);
					$(".paymembership_throughdeal").attr("deal-Id", dealId);
					$(".paymembership_throughdeal").attr(
						"deal-fee",
						paymentErrormessage[1]
					);
					$("#modal-pay-feeon-participating").modal("show");
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 125) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(arguments[0].responseJSON.errorMessage);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 124) {
					$("#newlenderParticiptionAddUpdate").modal("hide");
					$("#dealConfirmationFromLenderNEW").modal("hide");

					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 126) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 403) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 109) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
}

function pDealonlyNewLnedervalidityExpire(dealType, dealId, status) {
	console.log("Im in pDealonlyNewLneder");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const userPanLimit = getCookie("lenderRemainingPanLimit");
	const userTotalParticipation = getCookie("lenderTotalParticipationAmount");
	const lenderRemainingWalletAmount = getCookie("lenderRemainingWalletAmount");

	var actuallenderBalance = $(".lenderWalletAmount").html();
	actuallenderBalance = parseInt(actuallenderBalance);

	var participatedAmount = $("#myparticipation").val();

	var choosenPayOutOption = getCookie("choosenPayOutOption");
	var dealId = dealId;
	var choosenRateofInterest = choosenListFrom;
	var groupId = $(".groupId").html();
	var principalChoosenType = $("input[name=moveprincipal]:checked").val();

	let dealExtension = $("input[name=checkDealExtension]:checked").val();
	  if (dealExtension == undefined) {
		dealExtension = "NOTINTEREST";
	  }else{
		dealExtension = "NOTINTEREST";
	}

	if (participatedAmount < dealMinimumAmount) {
		$(".showWalletError").html(
			"Minimum investment is INR " + dealMinimumAmount
		);
		$(".showWalletError").show("slow");
		return false;
	}

	if (actuallenderBalance < participatedAmount) {
		window.scrollTo(100, 0);
		$(".showWalletError").show("slow");
		return false;
	} else if (participatedAmount == "") {
		window.scrollTo(100, 0);
		$(".showWalletError").html(
			"Please entere the amount that you wish to lend in this deal."
		);
		$(".showWalletError").show("slow");
		return false;
	} else if (participatedAmount <= 4999) {
		$(".showWalletError").html("Minimum investment is INR 5000.");
		$(".showWalletError").show("slow");
		return false;
	}

	if (remaingParticipation != 0 && participatedAmount > remaingParticipation) {
		$(".showWalletError").html(
			"Your participation amount is greater than the Deal available limit."
		);
		$(".showWalletError").show("slow");
		return false;
	}

	if (remaingParticipation == 0) {
		closeTheDealStatus(dealId);
		$(".showWalletError").html("Deal Is Closed");
		$(".showWalletError").show("slow");``
		return false;
	}

	if (choosenPayOutOption == "monthlyInterest") {
		choosenPayOutOption = "MONTHLY";
	} else if (choosenPayOutOption == "quartlyInterest") {
		choosenPayOutOption = "QUARTELY";
	} else if (choosenPayOutOption == "halfInterest") {
		choosenPayOutOption = "HALFLY";
	} else if (choosenPayOutOption == "yearlyInterest") {
		choosenPayOutOption = "YEARLY";
	} else if (choosenPayOutOption == "endofthedealInterest") {
		choosenPayOutOption = "ENDOFTHEDEAL";
	}

	if (principalChoosenType == undefined) {
		$(".showWalletError").html("Choose Return Principal Method");
		$(".showWalletError").show("slow");
		$(".move_principal_error").show();
		$(".movePrincipalTObank_transfer")
			.fadeOut(100)
			.fadeIn(100)
			.fadeOut(100)
			.fadeIn(100);
		return false;
	}

	const sumofwaiveramount =
		parseInt(alredyParticipatedAmount) + parseInt(participatedAmount);

	if (dealType != "ISNewLender") {
		const membership = $("#membershipTenure").val();
		if (
			!(iswaviverDeal == true && sumofwaiveramount >= waiverAmount) &&
			membership == ""
		) {
			$(".showWalletError").html("Choose Membership Tenure");
			$(".showWalletError").show("slow");
			return false;
		}
	}

	if (userisIn == "local") {
		var updateparticipation =
			"http://35.154.48.120:8080/oxynew/v1/user/updatingLenderDeal";
	} else {
		var updateparticipation =
			"https://fintech.oxyloans.com/oxyloans/v1/user/updatingLenderDeal";
	}

	var ipx = $(".thisIsSelectedItem .percentageSec1").html();
	$(".amountLendEntered").html(participatedAmount);
	$(".dealNamePop").html($(".displayedDealName").html());
	$(".dealRoI").html(ipx);
	$(".tupeOfInt").html(choosenPayOutOption);
	$(".latestWalletBalance").html(actuallenderBalance - participatedAmount);
	var dealName = $(".displayedDealName").attr("deal_name");

	if (
		(groupName == "NewLender" &&
			(participatedDealType == "EQUITY" || lenderFeeStatus == "OPTIONAL")) ||
		groupName == "OxyPremiuimLenders" ||
		(groupName == "OXYMARCH09" && userSubscriptionStatus == true)
	) {
		$(".bodyContentNewPopUp .amountLendEntered").html(participatedAmount);
		$(".bodyContentNewPopUp .dealNamePop").html($(".displayedDealName").html());
		$(".bodyContentNewPopUp .dealRoI").html(ipx);
		$(".bodyContentNewPopUp .tupeOfInt").html(choosenPayOutOption);

		$("#equityDealConfirmationFromLenderNEW .yesBTN4Equity").attr(
			"onclick",
			"submitPaticipation('" +
				dealId +
				"','" +
				dealType +
				"','" +
				participatedAmount +
				"','" +
				choosenRateofInterest +
				"','" +
				choosenPayOutOption +
				"','0','" +
				groupId +
				"','" +
				dealName +
				"','0','" +
				principalChoosenType +
				"','0','" +
				"','COMPLETED','" +
				"')"
		);

		$("#equityDealConfirmationFromLenderNEW").modal("show");
		return false;
	}

	if (iswaviverDeal == true && sumofwaiveramount >= waiverAmount) {
		$(".bodyContentNewPopUp .amountLendEntered").html(participatedAmount);
		$(".bodyContentNewPopUp .dealNamePop").html($(".displayedDealName").html());
		$(".bodyContentNewPopUp .dealRoI").html(ipx);
		$(".bodyContentNewPopUp .tupeOfInt").html(choosenPayOutOption);
		$(".bodyContentNewPopUp .processingType").html("processing Fee : ");
		$(".bodyContentNewPopUp .processingInfo").html("life Time-Waiver");

		$("#equityDealConfirmationFromLenderNEW .yesBTN4Equity").attr(
			"onclick",
			"submitPaticipation('" +
				dealId +
				"','" +
				dealType +
				"','" +
				participatedAmount +
				"','" +
				choosenRateofInterest +
				"','" +
				choosenPayOutOption +
				"','0','" +
				groupId +
				"','" +
				dealName +
				"','0','" +
				principalChoosenType +
				"','0','" +
				"','COMPLETED','" +
				"')"
		);
		$("#equityDealConfirmationFromLenderNEW").modal("show");
		return false;
	} else {
		if (
			groupName == "NewLender" ||
			groupName == "OxyPremiuimLenders" ||
			groupName == "OXYMARCH09"
		) {
			if (feePayementisDone == "PAID") {
				return true;
			} else {
				calcProfitValue();
				// var newLenderFeePercentage =
				// 	(participatedAmount * dealRoiForEach) / 100;
				// var newLenderGstAndFeeCalculation =
				// 	(newLenderFeePercentage * 118) / 100;
				//  $(".newLenderFeeBtn").attr("data-fee", newLenderGstAndFeeCalculation);

				var userFromBtn = $(this).attr("data-from");
				if (dealType == "ISNewLender") {
					fee = $(".newLenderFeeBtn").attr("data-fee");
					fee = parseInt(fee);

					// fetchCashFree(suserId, fee, dealId, dealType);
					$(".feewalet-Btn").attr("data-fee", fee);
					$(".heading_fee .participate_text").html(
						"Pay INR " + fee + " membership fee and participate deal"
					);
					// $("#modal-approve-walletFeepayThroughparticipatedeal").modal("show");
					$(
						"#modal-approve-walletFeepayThroughparticipatedeal .feePaymentGateway-Btn"
					).attr(
						"onclick",
						"fetchNewMembershipCashFree('" +
							suserId +
							"','" +
							fee +
							"','" +
							dealId +
							"','" +
							true +
							"','" +
							"PERDEAL" +
							"','" +
							"BEFORE" +
							"')"
					);

					writeCookie("participatedAmount", participatedAmount);
					writeCookie("choosenRateofInterest", choosenRateofInterest);
					writeCookie("choosenPayOutOption", choosenPayOutOption);
					writeCookie("groupId", groupId);
					writeCookie("processingFee", fee);
					writeCookie("dealName", dealNamefromele);
					writeCookie("dealId", dealId);
					writeCookie("payoutMethod", principalChoosenType);
					writeCookie("lenderfeePaidId", "0");
					 writeCookie("choseDealExtension", dealExtension);
					loadParticipationSuccess("PENDING", fee);
					return false;
				} else {
					const membership = $("#membershipTenure").val();
					fee = $(".newLenderFeeBtnfee").attr("data-fee");
					$(".feewalet-Btn").attr("data-fee", fee);
					$(".heading_fee .participate_text").html(
						"Pay  INR " +
							fee +
							" membership fee through the below options and participate these deal"
					);

					$("#modal-approve-walletFeepayThroughparticipatedeal").modal("show");

					$(
						"#modal-approve-walletFeepayThroughparticipatedeal .feewalet-Btn"
					).attr(
						"onclick",
						"participationfeepayThroughwallet('" +
							suserId +
							"','" +
							"isoxyfounding" +
							"')"
					);
					$(
						"#modal-approve-walletFeepayThroughparticipatedeal .feePaymentGateway-Btn"
					).attr(
						"onclick",
						"fetchNewMembershipCashFree('" +
							suserId +
							"','" +
							fee +
							"','" +
							dealId +
							"','" +
							true +
							"','" +
							membership +
							"','" +
							"BEFORE" +
							"')"
					);

					writeCookie("participatedAmount", participatedAmount);
					writeCookie("choosenRateofInterest", choosenRateofInterest);
					writeCookie("choosenPayOutOption", choosenPayOutOption);
					writeCookie("groupId", groupId);
					writeCookie("processingFee", fee);
					writeCookie("dealName", dealNamefromele);
					writeCookie("dealId", dealId);
					writeCookie("payoutMethod", principalChoosenType);
				     writeCookie("choseDealExtension", dealExtension);

					// fetchNewMembershipCashFree(suserId, fee, dealId,true,membership);
					// fee = 5900.0;
					// fee = $(".newLenderFeeBtnfee").attr("data-fee");
					// fee = parseInt(fee);
					return false;
				}

				fee = parseInt(fee);
				$(".processingFeeNew").html(fee);
				var dealNamefromele = $(".displayedDealName").html();

				if (dealId != 4 || dealId != "4") {
					// featchPayuDetails(suserId, fee, dealId, dealType);
					fetchCashFree(suserId, fee, dealId, dealType);
					// const membership=$("#membershipTenure").val();
					// fetchNewMembershipCashFree(suserId, fee, dealId,true,membership);
				}

				if (feePayementisDone == "PAID") {
					return true;
				} else {
					writeCookie("participatedAmount", participatedAmount);
					writeCookie("choosenRateofInterest", choosenRateofInterest);
					writeCookie("choosenPayOutOption", choosenPayOutOption);
					writeCookie("groupId", groupId);
					writeCookie("processingFee", fee);
					writeCookie("dealName", dealNamefromele);
					writeCookie("dealId", dealId);
					writeCookie("payoutMethod", principalChoosenType);
					 writeCookie("choseDealExtension", dealExtension);

					if (dealId != 4 || dealId != "4") {
						return false;
					}
				}
			}
		}
	}
	console.log("feePayementisDone Status is" + feePayementisDone);

	fee = parseInt(fee);
	if (dealId == 7 && groupName == "NewLender") {
		fee = 0;
	}

	$(".newLenderFeeBtn,#ouxyFeeId").attr("disabled", "disabled");

	var postData = {
		userId: suserId,
		groupId: groupId,
		dealId: dealId,
		participatedAmount: participatedAmount,
		lenderReturnType: choosenPayOutOption,
		// rateofInterest: choosenRateofInterest,
		processingFee: fee,
		paticipationStatus: status,
		accountType: principalChoosenType,

		lenderRemainingWalletAmount: lenderRemainingWalletAmount,
		ExtensionConsents: dealExtension,
		lenderTotalPanLimit: userPanLimit,
		totalParticipatedAmount: userTotalParticipation,
		lenderParticipationFrom:"WEB"
	};

	if (dealId == 4 || dealId == "4") {
		console.log("payment is not required.");
		console.log("=========cookies are set==============");
		var postData = JSON.stringify(postData);

		$(".loadingSec").show();
		$.ajax({
			url: updateparticipation,
			type: "PATCH",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".loadingSec").hide();
				$(".newLenderFeeBtn,#ouxyFeeId").removeAttr("disabled");
				$("#modal-comfirmSuccess").modal("show");
			},
			error: function (xhr, textStatus, errorThrown) {
				$(".loadingSec").hide();
				$(".newLenderFeeBtn,#ouxyFeeId").removeAttr("disabled");
				console.log("Error Something");
				var errormessage = arguments[0].responseJSON.errorMessage;
				$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);
				if (arguments[0].responseJSON.errorCode == 110) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 123) {
					window.scrollTo(100, 0);
					let paymentErrormessage = errormessage.match(/\d+/g);
					$(".paymembership_throughdeal").attr("deal-Id", dealId);
					$(".paymembership_throughdeal").attr(
						"deal-fee",
						paymentErrormessage[1]
					);
					$(".membership_title_point").html(errormessage);
					$("#modal-pay-feeon-participating").modal("show");
					console.log(paymentErrormessage);
					$(".paymembership_throughdeal").attr("deal-Id", dealId);
					$(".paymembership_throughdeal").attr(
						"deal-fee",
						paymentErrormessage[1]
					);
					$("#modal-pay-feeon-participating").modal("show");
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 125) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(arguments[0].responseJSON.errorMessage);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
				if (arguments[0].responseJSON.errorCode == 124) {
					$("#newlenderParticiptionAddUpdate").modal("hide");
					$("#dealConfirmationFromLenderNEW").modal("hide");

					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 126) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 403) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}

				if (arguments[0].responseJSON.errorCode == 109) {
					window.scrollTo(100, 0);
					$(".showWalletError").html(errormessage);
					$(".showWalletError").show("slow");
				}
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
}

function loadFalureFunc() {
	var dealId = getCookie("dealId");
	viewSingleDeal(dealId);
	$("#paymentFailed").modal("show");
}

function submitPaticipation(
	dealId,
	dealType,
	participatedAmount,
	rateofInterest,
	choosenPayOutOption,
	fee,
	groupId,
	dealName,
	lenderfeeId = 0,
	chosenPrincipalType,
	processingFee = 0,
	feeStatus = "COMPLETED"
) {
	if (feeStatus == "") {
		feeStatus = "COMPLETED";
	}

	$("#equityDealConfirmationFromLenderNEW").modal("hide");
	$(".loadingSec").show();
	console.log("Im in submitPaticipation");
	// return false;
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const isthroughWallet = getCookie("deductWalletFee");

	const userPanLimit = getCookie("lenderRemainingPanLimit");
	const userTotalParticipation = getCookie("lenderTotalParticipationAmount");
	const lenderRemainingWalletAmount = getCookie("lenderRemainingWalletAmount");
	let dealExtensioncheck = getCookie("dealDurationExtenson");

	if (
		dealExtensioncheck == undefined ||
		dealExtensioncheck == "" ||
		dealExtensioncheck == null
	) {
		dealExtensioncheck = "NOTINTEREST";
	} else {
		dealExtensioncheck = "NOTINTEREST";
	}

	feePayementisDone = "PAID";

	var participatedAmount = parseInt(participatedAmount);
	var lenderReturnType = choosenPayOutOption;
	var dealId = dealId;
	var groupId = groupId;
	var choosenRateofInterest = rateofInterest;
	var fee = fee;
	var dealName = dealName;

	console.log(dealId);
	console.log(dealType);
	console.log(participatedAmount);
	console.log(rateofInterest);
	console.log(choosenPayOutOption);
	console.log(fee);
	console.log(groupId);
	console.log(dealName);
	console.log(lenderfeeId);
	console.log(chosenPrincipalType);
	console.log(feeStatus);

	if (userisIn == "local") {
		var updateparticipation =
			"http://35.154.48.120:8080/oxynew/v1/user/updatingLenderDeal";
	} else {
		var updateparticipation =
			"https://fintech.oxyloans.com/oxyloans/v1/user/updatingLenderDeal";
	}

	var ipx = $(".thisIsSelectedItem .percentageSec1").html();
	$(".amountLendEntered").html(participatedAmount);
	$(".dealNamePop").html(dealName);
	$(".dealRoI").html(rateofInterest);
	$(".tupeOfInt").html(choosenPayOutOption);
	var actuallenderBalance = getCookie("walletBal");
	$(".latestWalletBalance").html(actuallenderBalance - participatedAmount);

	groupName = "newLender";
	console.log("feePayementisDone Status is" + feePayementisDone);

	fee = parseInt(fee);

	var postData = {
		userId: suserId,
		groupId: groupId,
		dealId: dealId,
		participatedAmount: participatedAmount,
		lenderReturnType: choosenPayOutOption,
		// rateofInterest: choosenRateofInterest,
		processingFee: fee,
		lenderFeeId: lenderfeeId,
		accountType: chosenPrincipalType,
		feeStatus: feeStatus,
		ExtensionConsents: dealExtensioncheck,
		lenderTotalPanLimit: userPanLimit,
		totalParticipatedAmount: userTotalParticipation,
		lenderRemainingWalletAmount: lenderRemainingWalletAmount,
		lenderParticipationFrom:"WEB"
	};

	var postData = JSON.stringify(postData);

	console.log("entering in ajax call");
	console.log(postData);
	$.ajax({
		url: updateparticipation,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#successfullypaidParticipated").modal("hide");
			$("#modal-approve-chosenMembershipExpiredUser").modal("hide");

			if (feeStatus && processingFee != 0) {
				$(".loadingSec").hide();
				$(".feewalet-Btn").attr("data-fee", processingFee);
				$(".heading_fee .participate_text").html(
					"You have successfully participated in the deal. Now, please pay the INR " +
						processingFee +
						"membership fee using the options below."
				);
				$(
					"#modal-approve-walletFeepayThroughparticipatedeal .feePaymentGateway-Btn"
				).attr(
					"onclick",
					"fetchNewMembershipCashFree('" +
						suserId +
						"','" +
						processingFee +
						"','" +
						dealId +
						"','" +
						true +
						"','" +
						"PERDEAL" +
						"','" +
						"AFTER" +
						"')"
				);

				$("#modal-comfirmSuccess").modal("show");
				setTimeout(() => {
					$("#modal-comfirmSuccess").modal("hide");
					$("#successfullypaidParticipated").modal("hide");
					$("#modal-approve-walletFeepayThroughparticipatedeal").modal("show");
				}, 4000);
			} else {
				setTimeout(function () {
					$("#successfullypaidParticipated").modal("hide");
					$("#modal-approve-walletFeepayThroughparticipatedeal").modal("hide");
					$("#modal-comfirmSuccess").modal("show");
				}, 2000);
				$(".loadingSec").hide();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			$(".loadingSec").hide();
			console.log("Error Something");
			$("#modal-approve-chosenMembershipExpiredUser").modal("hide");
			var errormessage = arguments[0].responseJSON.errorMessage;
			if (arguments[0].responseJSON.errorCode == 110) {
				window.scrollTo(100, 0);
				$(".showWalletError").html(errormessage);
				$(".showWalletError").show("slow");
			}
			if (arguments[0].responseJSON.errorCode == 123) {
				let paymentErrormessage = errormessage.match(/\d+/g);
				$(".paymembership_throughdeal").attr("deal-Id", dealId);
				$(".paymembership_throughdeal").attr(
					"deal-fee",
					paymentErrormessage[1]
				);
				$(".membership_title_point").html(errormessage);
				$("#modal-pay-feeon-participating").modal("show");
				console.log(paymentErrormessage);
				$(".paymembership_throughdeal").attr("deal-Id", dealId);
				$(".paymembership_throughdeal").attr(
					"deal-fee",
					paymentErrormessage[1]
				);
				$("#modal-pay-feeon-participating").modal("show");

				window.scrollTo(100, 0);
				$(".showWalletError").html(errormessage);
				$(".showWalletError").show("slow");
			}
			if (arguments[0].responseJSON.errorCode == 125) {
				window.scrollTo(100, 0);
				$(".showWalletError").html(arguments[0].responseJSON.errorMessage);
				$(".showWalletError").html(errormessage);
				$(".showWalletError").show("slow");
			}
			if (arguments[0].responseJSON.errorCode == 126) {
				window.scrollTo(100, 0);
				$(".showWalletError").html(errormessage);
				$(".showWalletError").show("slow");
			}

			if (arguments[0].responseJSON.errorCode == 403) {
				window.scrollTo(100, 0);
				$(".showWalletError").html(errormessage);
				$(".showWalletError").show("slow");
			}

			if (arguments[0].responseJSON.errorCode == 109) {
				window.scrollTo(100, 0);
				$(".showWalletError").html(errormessage);
				$(".showWalletError").show("slow");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function updateLenderFeeDetails(
	transactionId,
	payUTransactionId,
	transactionSatus
) {
	console.log("*********** I'm at updateLenderFeeDetails *********** ");

	$("#modal-validitydate-expired").modal("hide");
	$("#modal-validitydate-expiring").modal("hide");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var updateLenderFeeStatus =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			transactionId +
			"/lenderFeeUpdation";
	} else {
		var updateLenderFeeStatus =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			transactionId +
			"/lenderFeeUpdation";
	}
	var postData = {
		comments: "LENDER FEE",
		payuTransactionNumber: payUTransactionId,
		payuStatus: transactionSatus,
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: updateLenderFeeStatus,
		type: "PATCH",
		contentType: "application/json",
		dataType: "json",
		data: postData,
		success: function (data, textStatus, xhr) {
			console.log("DONE HERO");
			console.log("lender fee" + data.lenderFeeId);
			writeCookie("lenderfeePaidId", data.lenderFeeId);
		},
		statusCode: {
			400: function (response) {},
		},
		error: function (xhr, textStatus, errorThrown) {
			writeCookie("lenderfeePaidId", "0");
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function updatenewmembershipLenderFeeDetails(
	transactionId,
	payUTransactionId,
	transactionSatus
) {
	console.log(
		"*********** I'm at updateLenderFeeDetails new memberhship livin mandea *********** "
	);

	$("#modal-validitydate-expired").modal("hide");
	$("#modal-validitydate-expiring").modal("hide");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var updateLenderFeeStatus =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			transactionId +
			"/lenderFeePayments";
	} else {
		var updateLenderFeeStatus =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			transactionId +
			"/lenderFeePayments";
	}
	var postData = {
		comments: "LENDER FEE",
		payuTransactionNumber: payUTransactionId,
		payuStatus: transactionSatus,
	};

	var postData = JSON.stringify(postData);

	console.log(postData);

	$.ajax({
		url: updateLenderFeeStatus,
		type: "PATCH",
		contentType: "application/json",
		dataType: "json",
		data: postData,
		success: function (data, textStatus, xhr) {
			console.log(data);
			console.log("DONE HERO");
			console.log("lender fee" + data.lenderFeeId);
			writeCookie("lenderfeePaidId", data.lenderFeeId);
		},
		statusCode: {
			400: function (response) {},
		},
		error: function (xhr, textStatus, errorThrown) {
			writeCookie("lenderfeePaidId", "0");
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadParticipationSuccess(
	feeStatus = "COMPLETED",
	processingFee = 0
) {
	feePayementisDone = "PAID";
	console.log("in loadParticipationSuccess");
	var dealId = getCookie("dealId");
	var dealType = getCookie("dealType");
	var participatedAmount = getCookie("participatedAmount");
	var rateofInterest = getCookie("choosenRateofInterest");
	var choosenPayOutOption = getCookie("choosenPayOutOption");
	var fee = getCookie("processingFee");
	var groupId = getCookie("groupId");
	var dealName = getCookie("dealName");
	var payoutMethod = getCookie("payoutMethod");
	var lenderfeeId = getCookie("lenderfeePaidId");
	var ExtensionConsents = getCookie("choseDealExtension");

	console.log("calling function");
	submitPaticipation(
		dealId,
		dealType,
		participatedAmount,
		rateofInterest,
		choosenPayOutOption,
		fee,
		groupId,
		dealName,
		lenderfeeId,
		payoutMethod,
		processingFee,
		feeStatus
	);
}

function viewDealLenderStatement(dealId, dealName) {
	dealIDforparticipationAmount = dealId;

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getpaymentstatus =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/" +
			dealId +
			"/dealLevelLoanEmiCard";
	} else {
		var getpaymentstatus =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/" +
			dealId +
			"/dealLevelLoanEmiCard";
	}

	$.ajax({
		url: getpaymentstatus,
		type: "GET",
		dataType: "json",

		success: function (data, textStatus, xhr) {

            console.log(data);
			let generateUrl =
				"lenderInquiries?dealName=" + dealName + "&&dealId=" + dealId;
			$(".myparticipationQuery").attr("href", generateUrl);
			$(".firstInterestDate").html(data.interestStartDate);

   

             const newobj=data.dealLevelLoanEmiCard.map((data,index)=>{
             	const newobjnew={...data};

             	if(newobjnew.paymentStatus=="NotPaticipated"){
             		newobjnew['interestPaidDate']="NotPaticipated";
             	}else if (newobjnew.paymentStatus=="Paid"){
             		newobjnew['interestPaidDate']=newobjnew.interestPaidDate;

             	}else if(newobjnew.paymentStatus=="Future"){
             		newobjnew['interestPaidDate']=newobjnew.interestPaidDate;
             	}

             	return newobjnew;

             })



			var template = document.getElementById("lenderDealEmiCard").innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, {
				data: newobj,
			});

			$("#viewLenderStatement").html(html);
			$("#modal-viewLenderStatement").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".modal-NoInterestDATE  #text1").html(
				arguments[0].responseJSON.errorMessage
			);
			if (arguments[0].responseJSON.errorCode == 101) {
				$("#modal-errorNofirstInterestDate").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

const viewNewLenderStatement = (dealId, dealName) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const getpaymentstatus =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/${dealId}/loanStatementBasedOnCurrentValue`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/${dealId}/loanStatementBasedOnCurrentValue`;

	fetch(getpaymentstatus, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			$(".myparticipationQuery").attr(
				"href",
				`lenderInquiries?dealName='${dealName}&&dealId=${dealId}'`
			);

			console.log(data);

			const template = document.getElementById(
				"getlenderNewStatement"
			).innerHTML;
			Mustache.parse(template);
			const html = Mustache.to_html(template, {
				data: data.participationUpdatedInfoList,
			});
			$("#viewLRnewStatement").html(html);
			$("#modal-viewLenderNewStatement").modal("show");
		})
		.catch((error) => {
			console.log("Error Something");
			$(".modal-NoInterestDATE #text1").html(error.responseJSON.errorMessage);
			error.responseJSON.errorCode == 101 &&
				$("#modal-errorNofirstInterestDate").modal("show");
		});
};

function viewaddstatement(snois) {
	$("#modal-viewLenderStatement").modal("hide");

	var dealId = dealIDforparticipationAmount;

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getpaymentstatus =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/" +
			dealId +
			"/dealLevelLoanEmiCard";
	} else {
		var getpaymentstatus =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/" +
			dealId +
			"/dealLevelLoanEmiCard";
	}

	$.ajax({
		url: getpaymentstatus,
		type: "GET",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			console.log(data);

			var filteredData = data.dealLevelLoanEmiCard[snois - 1];

			console.info(filteredData);

			// let earnedInterestAmount=filteredData.amountRecevied;
			// let daysDifence=filteredData.differenceInDaysForFirstParticipation;

			console.log(filteredData);

			if (filteredData.listOfPaticipatedInfo == null) {
				$(".noDatafound").show();
				$("#modal-addingamountInfo").modal("show");
			} else {
				var template = document.getElementById("filteredCARDInfo").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: filteredData.listOfPaticipatedInfo,
				});
				$("#viewAddedParticipationAmount").html(html);
				// $(".addedAmountInterestEarned").html(earnedInterestAmount);
				$("#modal-addingamountInfo").modal("show");
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

const viewDealLenders = (dealId) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const getDeals =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${dealId}/listOfLenders`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${dealId}/listOfLenders`;

	fetch(getDeals, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			const template = document.getElementById("displayDealsScript").innerHTML;
			Mustache.parse(template);
			const html = Mustache.to_html(template, {
				data: data.lenderPaticipatedResponseDto,
			});
			$("#displayDealsData").html(html);
			let psum = 0;
			$(".paticipatedAmountVal").each(function () {
				psum += +$(this).val();
			});
			$(".pinfo").html(psum);
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

function viewEquityDeals(type, dealname, NoData) {
	$(".loading").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/listOfDealsInformationForEquityDeals";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/listOfDealsInformationForEquityDeals";
	}
	var postData = {
		pageNo: 1,
		pageSize: 20,
		dealType: type,
		dealName: dealname,
	};
	var postData = JSON.stringify(postData);
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);

			totalEntries = data.count;
			if (NoData == "NODATA") {
				if (totalEntries == 0) {
					$(".loading").hide();
					$("#displayDelasInfo").show();
				} else {
					$(".loading").hide();
					console.log("================");

					const convertNewRoi = data.listOfBorrowersDealsResponseDto.map(
						(data, index) => {
							const newObj = { ...data };
							if (newObj.repaymentType === "MONTHLY") {
								newObj.rateOfInterest = newObj.rateOfInterest + "% P.M";
							} else if (newObj.repaymentType === "YEARLY") {
								newObj.rateOfInterest =
									Math.round(newObj.rateOfInterest * 12) + " % P.A";
							}
							return newObj;
						}
					);
					console.log("================ escrow");
					console.log(convertNewRoiPagination);
					console.log("================ escrow");
					var template = document.getElementById(
						"displayEscroeDealsOnRunningScript"
					).innerHTML;
					Mustache.parse(template);
					var html = Mustache.to_html(template, {
						data: convertNewRoi,
					});
					$("#displayDealsData").html(html);
				}
			} else {
				if (totalEntries == 0) {
					$("#displayDelasInfo").show();
				} else {
					const convertNewRoilist = data.listOfBorrowersDealsResponseDto.map(
						(data, index) => {
							const newObj = { ...data };
							if (newObj.repaymentType === "MONTHLY") {
								newObj.rateOfInterest = newObj.rateOfInterest + "% P.M";
							} else if (newObj.repaymentType === "YEARLY") {
								newObj.rateOfInterest =
									Math.round(newObj.rateOfInterest * 12) + "% P.A";
							}
							return newObj;
						}
					);

					var template =
						document.getElementById("displayDealsScript").innerHTML;
					Mustache.parse(template);
					var html = Mustache.to_html(template, {
						data: convertNewRoilist,
					});
					$("#displayDealsData").html(html);
					$(".loading").hide();

					var displayPageNo = totalEntries / 10;
					displayPageNo = displayPageNo + 1;

					$(".dashBoardPagination")
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
								dealType: type,
								dealName: dealname,
							};
							var postData = JSON.stringify(postData);
							if (userisIn == "local") {
								var getDeals =
									"http://35.154.48.120:8080/oxynew/v1/user/" +
									suserId +
									"/listOfDealsInformationForEquityDeals";
							} else {
								var getDeals =
									"https://fintech.oxyloans.com/oxyloans/v1/user/" +
									suserId +
									"/listOfDealsInformationForEquityDeals";
							}
							$.ajax({
								url: getDeals,
								type: "POST",
								data: postData,
								contentType: "application/json",
								dataType: "json",
								success: function (data, textStatus, xhr) {
									if (totalEntries == 0) {
										$("#displayDelasInfo").show();
									} else {
										const convertNewRoiPagination =
											data.listOfBorrowersDealsResponseDto.map(
												(data, index) => {
													const newObj = { ...data };
													if (newObj.repaymentType === "MONTHLY") {
														newObj.rateOfInterest =
															newObj.rateOfInterest + "% P.M";
													} else if (newObj.repaymentType === "YEARLY") {
														newObj.rateOfInterest =
															Math.round(newObj.rateOfInterest * 12) + " % P.A";
													}
													return newObj;
												}
											);

										var template =
											document.getElementById("displayDealsScript").innerHTML;
										Mustache.parse(template);
										var html = Mustache.to_html(template, {
											data: convertNewRoiPagination,
										});
										$("#displayDealsData").html(html);
										$(".loading").hide();
									}
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

function viewCurrentDayDeals(type) {
	$(".loading").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/listOfDealsInformationToLender";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/listOfDealsInformationToLender";
	}
	var postData = {
		pageNo: 1,
		pageSize: 10,
		dealType: type,
	};
	var postData = JSON.stringify(postData);
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);

			totalEntries = data.listOfDealsInformationToLender.length;

			if (totalEntries == 0) {
				$("#displayDelasInfo").show();
			} else {
				const convertNewRoilist = data.listOfDealsInformationToLender.map(
					(data, index) => {
						const newObj = { ...data };
						if (newObj.repaymentType === "MONTHLY") {
							newObj.rateOfInterest = newObj.rateOfInterest + "% P.M";
						} else if (newObj.repaymentType === "YEARLY") {
							newObj.rateOfInterest =
								Math.round(newObj.rateOfInterest * 12) + "% P.A";
						}
						return newObj;
					}
				);

				var template = document.getElementById("displayDealsScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: convertNewRoilist,
				});
				$("#displayDealsData").html(html);
				$(".loading").hide();

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".dashBoardPagination")
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
							dealType: type,
						};
						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var getDeals =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/listOfDealsInformationToLender";
						} else {
							var getDeals =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/listOfDealsInformationToLender";
						}
						$.ajax({
							url: getDeals,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								if (data.listOfDealsInformationToLender.length == 0) {
									$("#displayDelasInfo").show();
								} else {
									const convertNewRoiPagination =
										data.listOfDealsInformationToLender.map((data, index) => {
											const newObj = { ...data };
											if (newObj.repaymentType === "MONTHLY") {
												newObj.rateOfInterest = newObj.rateOfInterest + "% P.M";
											} else if (newObj.repaymentType === "YEARLY") {
												newObj.rateOfInterest =
													Math.round(newObj.rateOfInterest * 12) + " % P.A";
											}
											return newObj;
										});

									var template =
										document.getElementById("displayDealsScript").innerHTML;
									Mustache.parse(template);
									var html = Mustache.to_html(template, {
										data: convertNewRoiPagination,
									});
									$("#displayDealsData").html(html);
									$(".loading").hide();
								}
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

function getoxyfoundingamountInfo() {
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var groupname = $("#editlendergroup").val();
	var month = $("#summonth").val();
	var year = $("#sumYear").val();

	if (userisIn == "local") {
		var getamountinfo =
			"http://35.154.48.120:8080/oxynew/v1/user/sumOfDealsAmountByLendersGroup";
	} else {
		var getamountinfo =
			"https://fintech.oxyloans.com/oxyloans/v1/user/sumOfDealsAmountByLendersGroup";
	}

	var postData = {
		pageNo: 1,
		pageSize: 10,
		groupName: groupname,
		month: month,
		year: year,
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: getamountinfo,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.totalNumberOfDeals;

			$(".till-ParticipationYear").html(data.givenMonthAndYear);
			$(".till-ParticipationDate").html(data.currentDate);
			$(".oxywalletinfo").html(data.totalDealsAmount);
			$(".totalDealAmountMonth").html(data.totalDealAmountByMonthAndYear);
			$(".dealamointinfo").show();
			var template = document.getElementById("OxyfoundingAmountInfo").innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, {
				data: data.individualDealsInformation,
			});
			$("#displayAmountInfo").html(html);

			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;

			$(".viewLenderwalletsinfo")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...
					var postData = {
						pageNo: num,
						pageSize: "10",
						groupName: groupname,
						month: month,
						year: year,
					};
					var postData = JSON.stringify(postData);

					if (userisIn == "local") {
						var getamountinfo =
							"http://35.154.48.120:8080/oxynew/v1/user/sumOfDealsAmountByLendersGroup";
					} else {
						var getamountinfo =
							"https://fintech.oxyloans.com/oxyloans/v1/user/sumOfDealsAmountByLendersGroup";
					}

					$.ajax({
						url: getamountinfo,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							$(".till-ParticipationYear").html(data.givenMonthAndYear);
							$(".till-ParticipationDate").html(data.currentDate);

							$(".oxywalletinfo").html(data.totalDealsAmount);
							$(".totalDealAmountMonth").html(
								data.totalDealAmountByMonthAndYear
							);
							$(".dealamointinfo").show();
							var template = document.getElementById(
								"OxyfoundingAmountInfo"
							).innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, {
								data: data.individualDealsInformation,
							});
							$("#displayAmountInfo").html(html);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

const getlendergroupname = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const updateEmiUrlCard =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/listOfOxyLendersGroup"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/listOfOxyLendersGroup";

	fetch(updateEmiUrlCard, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			$("#editlendergroup").empty();
			data.forEach((item) => {
				const lenderGroup = item.lenderGroupName;
				if (lenderGroup !== "NA") {
					$("#editlendergroup").append(
						`<option value="${lenderGroup}">${lenderGroup}</option>`
					);
				}
			});
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

function uploadQueryScreesShot(input) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	console.log(input);
	console.log(input.files[0]);

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.readAsDataURL(input.files[0]);
		var fd = new FormData();
		var files = input.files[0];
		fd.append("USERQUERYSCREENSHOT", files);

		if (userisIn == "local") {
			var uploadAttachment =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				suserId +
				"/userQueryScreenshot";
		} else {
			var uploadAttachment =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				suserId +
				"/userQueryScreenshot";
		}
		$.ajax({
			url: uploadAttachment,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#queryDocumnetId").val(data.documentId);
				} else {
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

function readingQueriesFromUsers(ticketId, dealName, dealId) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	console.log(dealName);
	console.log(dealId);

	var isValid = true;

	$("#query-submit").attr("disabled", true);
	var query = $("#query-Subject").val();
	var queryDocumentID = $("#queryDocumnetId").val();

	var email = $("#query-Email").val();
	var name = $("#query-Name").val();

	var mobileNumber = $("#query-Mobile").val();

	if (queryDocumentID == "") {
		queryDocumentID = 0;
	}

	if (query == "" || query == undefined) {
		$(".inquiriesQuery").show();
		isValid = false;
		$("#query-submit").attr("disabled", false);
	} else {
		$(".inquiriesQuery").hide();
	}

	if (userisIn == "local") {
		var updateUserQuery =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/readingQueriesFromUsers";
	} else {
		var updateUserQuery =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/readingQueriesFromUsers";
	}

	if (dealName != "null" && dealId != "null") {
		var queryWithdealName =
			query + "\n" + "Deal Name: " + dealName + "\n" + "Deal Id :" + dealId;
	} else {
		var queryWithdealName = query;
	}

	if (ticketId == "null") {
		var postData = {
			query: queryWithdealName,
			documentId: queryDocumentID,
			email: email,
			mobileNumber: mobileNumber,
		};
	} else {
		var postData = {
			query: queryWithdealName,
			documentId: queryDocumentID,
			email: email,
			mobileNumber: mobileNumber,
			id: ticketId,
			respondedBy: "USER",
		};
	}

	var postData = JSON.stringify(postData);
	console.log(postData);
	if (isValid == true) {
		$.ajax({
			url: updateUserQuery,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#query-submit").attr("disabled", false);

				window.scrollTo(0, 0);
				$(".querrySuccessMessage").show("slow");
				setTimeout(function () {
					location.reload();
				}, 8000);
			},

			// error: function (request, error) {
				error: function (xhr, textStatus, errorThrown) {
				console.log("error");
				$("#query-submit").attr("disabled", false);
				if (xhr.status === 400) {
					// Parse the JSON response
					var errorData = JSON.parse(xhr.responseText);
					// Extract the error message from the parsed response
					var errorMessage = errorData.errorMessage;
					console.log(errorMessage)
					// Show the modal dialog
					$("#modal-transactiondanger").modal("show");
					// Display the error message in the modal body
					$("#modal-transactiondanger .modal-body").html(errorMessage);
					
					// Reload the page after 4 seconds
					setTimeout(function () {
						location.reload();
					}, 4000);
				}
			
			},

			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
}

function getWithdrawCondition() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var getWithdrawInfo =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  suserId +
			  "/lenderWithdrawFundsInfo"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  suserId +
			  "/lenderWithdrawFundsInfo";

	fetch(getWithdrawInfo, {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.status != null) {
				withdrawRaised = true;
				$("#withdrawalAmount").val(data.amount);
			} else {
				withdrawRaised = false;
			}
		})
		.catch((error) => {
			console.log("Error Something");
		});
}

//fetch email and mobile number to raise a query **start livin

const gettingMobileAndEmail = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	const getStatUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  userId +
			  "/gettingMobileAndEmail"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  userId +
			  "/gettingMobileAndEmail";

	fetch(getStatUrl, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			$("#query-Email").val(data.email);
			$("#query-Mobile").val(data.mobileNumber);
			$("#query-Name").val(data.firstName);
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

function verifyWhatsappNumber() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let countrycode = "";
	let whatsAppNumber = "";

	countrycode = $(".iti__selected-dial-code").html().substring(1);

	var nonNRIwhatsAppNumber = $("#verifyWhatsappNumber").val();
	var nriwhatsAppNumber = $("#nriWhatsappNumber").val();

	if (nonNRIwhatsAppNumber != "") {
		whatsAppNumber = nonNRIwhatsAppNumber;
	} else {
		whatsAppNumber = nriwhatsAppNumber;
	}

	if (whatsAppNumber == "") {
		$(".messagefornonnriwhatsApp").show();
		return false;
	} else {
		$(".messagefornonnriwhatsApp").hide();
	}

	if (userisIn == "local") {
		var whatsAppUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/sendWhatsappOtp";
	} else {
		var whatsAppUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/sendWhatsappOtp";
	}

	var whatsappNo = countrycode + whatsAppNumber;

	var postData = {
		whatsappNumber: whatsappNo,
		id: suserId,
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: whatsAppUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$(".btn-textchange").html("Resend OTP");
			$(".btn-textchange").addClass("btn-warning");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

const verifyWhatsappOtp = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const nonNriwhatsappOtp = $("#whatsAppOtp").val();
	const nriwhatsappOtp = $("#nriwhatsAppOtp").val();

	const whatsAppOTP =
		nonNriwhatsappOtp !== "" ? nonNriwhatsappOtp : nriwhatsappOtp;

	const whatsAppUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/verifyWhatsappOtp"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/verifyWhatsappOtp";

	const postData = {
		whatsappOtp: whatsAppOTP,
		id: suserId,
	};

	const postDataString = JSON.stringify(postData);
	console.log(postDataString);

	fetch(whatsAppUrl, {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: postDataString,
	})
		.then((response) => response.json())
		.then((data) => {
			$("#modal-verifyWhatsappNumber").modal("hide");
			$("#modal-nriVerifyWhatsappNumber").modal("hide");
			$("#modal-updateWhatsappNumberStatus").modal("show");
		})
		.catch((error) => {
			console.log("Error Something");

			if (error.responseJSON.errorCode == 103) {
				$(".otp-warnign").html("Invalid OTP value, please check.");
				$(".otp-warnign").show("show");
			}
		});
};

function viewADDStatement() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	$("#modal-addParticipation-Status").modal("show");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/listOfDealPaticipation";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/listOfDealPaticipation";
	}
	var postData = {
		pageNo: 1,
		pageSize: 36,
	};
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			var template = document.getElementById(
				"addParticipationStatus"
			).innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, {
				data: data.lenderPaticipatedResponseDto.listOfParticipationUpdate,
			});
			$("#viewAddStatement").html(html);
			$("#modal-addParticipation-Status").modal("show");
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

	const seekersData =
		userisIn == "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/fetchAdviseSeekers/${suserId}`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/fetchAdviseSeekers/${suserId}`;

	fetch(seekersData, {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			data.length == 0 || data.length == null
				? $("#displayNoRecords").show()
				: (() => {
						const template = document.getElementById("seekerInfo").innerHTML;
						Mustache.parse(template);
						const html = Mustache.render(template, data);
						$("#seekersData").html(html);
				  })();
		})
		.catch((error) => {
			console.log("Error:", error);
		});
}

const permissionToseekers = async () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const permissionToseekers =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/assignUserExpertise"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/assignUserExpertise";

	const postData = {
		id: suserId,
		userExpertise: true,
	};

	const postDataJson = JSON.stringify(postData);
	console.log(postDataJson);

	try {
		const response = await fetch(permissionToseekers, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
			body: postDataJson,
		});

		if (response.ok) {
			$(".btn-seekers").html("Enabled Permission To seekers");
		} else {
			console.log("Error Something");
		}
	} catch (error) {
		console.log("Error Something");
	}
};

async function viewADDStatement(dealId) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const getparticipationStatus =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/${dealId}/paticipationChanges`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/${dealId}/paticipationChanges`;

	try {
		const response = await fetch(getparticipationStatus, {
			method: "GET",
			headers: {
				accessToken: saccessToken,
			},
		});

		if (response.ok) {
			const data = await response.json();
			const template = document.getElementById(
				"addParticipationStatus"
			).innerHTML;
			Mustache.parse(template);
			const html = Mustache.to_html(template, {
				data: data.lenderParticipationUpdatedInfo,
			});
			$("#viewAddStatement").html(html);
			$("#modal-addParticipation-Status").modal("show");
		} else {
			console.log("Error Something");
		}
	} catch (error) {
		console.log("Error Something");
	}
}

const inviteseekers = (email, mobileNo, name, id) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	const emailcontent = $("#inviteSeekersContent").val();

	const postData = {
		email: email,
		mobileNumber: mobileNo,
		name: name,
		mailContent: emailcontent,
		mailSubject: "invite",
		primaryType: primaryType,
		referrerId: userId,
		seekerRequestedId: id,
	};

	const postDataJson = JSON.stringify(postData);
	console.log(postDataJson);

	const getStatUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/lenderReferring"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/lenderReferring";

	fetch(getStatUrl, {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: postDataJson,
	})
		.then((response) => {
			if (response.ok) {
				$("#modal-alreadyDoneSendOffers").modal("show");
				setTimeout(() => {
					location.reload();
				}, 3000);
			} else {
				return response.json().then((data) => {
					$(".modal-body #text1").html(data.errorMessage);
					if (data.errorCode == 109 || data.errorCode == 403) {
						$("#modal-alreadySentRequest").modal("show");
					}
				});
			}
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

function profileUpdateWhatsapp() {
	$("#modal-profileverifyWhatsappNumber").modal("show");
	return true;
}

const dealsStats = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const getDealStats =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/dealsStatistics`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/dealsStatistics`;

	fetch(getDealStats, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error Something");
			}
		})
		.then((data) => {
			$(".walletBalReceived").val(data.totalWalletCreditedAmount);
			$(".disbursedDeal").html(data.numberOfDisbursedDealsCount);
			$(".disbursedDealValue").html(data.disbursedDealsAmount);
			$(".activeDeals").html(data.numberOfActiveDealsCount);
			$(".activeDealsValue").html(data.activeDealsAmount);
			$(".closedDeals").html(data.numberOfClosedDealsCount);
			$(".closedDealsValue").html(data.closedDealsAmount);
		})
		.catch((error) => {
			console.log(error.message);
		});
};

const profilUpdateWhatsapp = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	var whatsAppNumber = $("#verifyWhatsappNumber").val();
	var countrycode = $(".iti__selected-dial-code").html();
	countrycode = countrycode.substr(1);
	var whatsappNo = "" + countrycode + whatsAppNumber;

	var whatsAppOTP = $("#whatsAppOtp").val();

	var whatsAppUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/personal/" +
			  suserId
			: "https://fintech.oxyloans.com/oxyloans/v1/user/personal/" + suserId;

	var postData = {
		whatsappOtp: whatsAppOTP,
		id: suserId,
		modifyOption: "MODIFY",
		whatsAppNumber: whatsappNo,
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	fetch(whatsAppUrl, {
		method: "PATCH",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: postData,
	})
		.then((response) => response.json())
		.then((data) => {
			$("#modal-profileverifyWhatsappNumber").modal("hide");
			$("#modal-profileupdateWhatsappNumberStatus").modal("show");
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

async function viewClosedDeals() {
	try {
		$(".loading").show();

		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");
		// Assuming there's a function to get userIsIn value

		const getDealsUrl =
			userisIn === "local"
				? "http://35.154.48.120:8080/oxynew/v1/user/closedDealsForUserBasedOnPagination"
				: "https://fintech.oxyloans.com/oxyloans/v1/user/closedDealsForUserBasedOnPagination";

		const postData = {
			userId: suserId,
			pageNo: 1,
			pageSize: 10,
		};

		const response = await fetch(getDealsUrl, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
			body: JSON.stringify(postData),
		});

		const data = await response.json();
		console.log("====");

		const totalEntries = data.countValue;

		if (
			!data.lenderReturnsResponseDto ||
			data.lenderReturnsResponseDto.length === 0
		) {
			$(".displayhideclosed").show();
		} else {
			const convertNewRoi = data.lenderReturnsResponseDto.map((data, index) => {
				const newObj = { ...data };
				if (newObj.lenderReturnType === "MONTHLY") {
					newObj.rateOfInterest = newObj.rateOfInterest + " PM";
				} else if (newObj.lenderReturnType === "YEARLY") {
					newObj.rateOfInterest = newObj.rateOfInterest * 12 + " PA ";
				}
				return newObj;
			});

			const template = document.getElementById(
				"displayClosedDealScript"
			).innerHTML;
			Mustache.parse(template);
			const html = Mustache.to_html(template, {
				data: convertNewRoi,
			});
			$("#displayClosedData").html(html);
			$(".loading").hide();

			const displayPageNo = Math.ceil(totalEntries / 10);
			$(".dashBoardPagination")
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
				.on("page", async function (event, num) {
					const postData = {
						userId: suserId,
						pageNo: num,
						pageSize: "10",
					};

					const response = await fetch(getDealsUrl, {
						method: "POST",
						headers: {
							"Content-Type": "application/json",
							accessToken: saccessToken,
						},
						body: JSON.stringify(postData),
					});

					const data = await response.json();

					const convertNewRoipagination = data.lenderReturnsResponseDto.map(
						(data, index) => {
							const newObjpag = { ...data };
							if (newObjpag.lenderReturnType === "MONTHLY") {
								newObjpag.rateOfInterest = newObjpag.rateOfInterest + "  PM";
							} else if (newObjpag.lenderReturnType === "YEARLY") {
								newObjpag.rateOfInterest =
									newObjpag.rateOfInterest * 12 + "  PA";
							}
							return newObjpag;
						}
					);

					const template = document.getElementById(
						"displayClosedDealScript"
					).innerHTML;
					Mustache.parse(template);
					const html = Mustache.to_html(template, {
						data: convertNewRoipagination,
					});
					$("#displayClosedData").html(html);
					$(".loading").hide();
				});
		}
	} catch (error) {
		console.error("Error:", error);
	}
}

function viewAssetDealInfo() {
	$(".loading").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/assert_based_closed_deals";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/assert_based_closed_deals";
	}
	var postData = {
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log("====");

			console.log("====");

			if (data.borrowerDealsResponseDto == null) {
				$("#norecodeOfAsset").show();
				totalEntries = 0;
			} else {
				totalEntries = data.borrowerDealsResponseDto.length;

				var template = document.getElementById(
					"displayClosedDealScript"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.borrowerDealsResponseDto,
				});
				$("#displayClosedData").html(html);
				$(".loading").hide();

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".dashBoardPagination")
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
							var getDeals =
								"http://35.154.48.120:8080/oxynew/v1/user/assert_based_closed_deals";
						} else {
							var getDeals =
								"https://fintech.oxyloans.com/oxyloans/v1/user/assert_based_closed_deals";
						}
						$.ajax({
							url: getDeals,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template = document.getElementById(
									"displayClosedDealScript"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.borrowerDealsResponseDto,
								});
								$("#displayClosedData").html(html);
								$(".loading").hide();
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

function loadNewAgreedloans() {
	$(".loadingSec").show();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	let fName = "lenderUserId";

	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}

	var postData = {
		leftOperand: {
			fieldName: fName,
			fieldValue: userId,
			operator: "EQUALS",
		},

		logicalOperator: "AND",

		rightOperand: {
			fieldName: "loanStatus",
			fieldValues: ["Agreed", "Active", "Closed", "Hold"],
			operator: "IN",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanAcceptedDate",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	//console.log(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/search";
	}

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			totalEntries = data.totalCount;
			if (data.results.length == 0) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayallRequests").innerHTML;
				//console.log(template);
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });
				//alert(html);
				$("#displayoffers").html(html);
				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".agreedloansPagination")
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
						//$(".content4").html("Page " + num); // or some ajax content loading...

						var postData = {
							leftOperand: {
								fieldName: fName,
								fieldValue: userId,
								operator: "EQUALS",
							},

							logicalOperator: "AND",

							rightOperand: {
								fieldName: "loanStatus",
								fieldValues: ["Agreed", "Active", "Closed"],
								operator: "IN",
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanActiveDate",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);
						console.log(postData);

						if (userisIn == "local") {
							var getStatUrl =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						} else {
							var getStatUrl =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/loan/" +
								primaryType +
								"/search";
						}

						$.ajax({
							url: getStatUrl,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",

							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayallRequests").innerHTML;
								//console.log(template);
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});
								//alert(html);
								$("#displayoffers").html(html);
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
	$(".loadingSec").hide();
}

/**************************** AGREED LOAN  PAGINATION **********************/

function esignWithMobile(loanRequestIDFromElement) {
	console.log("user clicked");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	// esignDealId=dealId;

	if (userisIn == "local") {
		var esignAgree =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanRequestIDFromElement +
			"/esign";
	} else {
		var esignAgree =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanRequestIDFromElement +
			"/esign";
	}

	loanIDFromEsign = loanRequestIDFromElement;
	var postData = { eSignType: "MOBILE" };
	var postData = JSON.stringify(postData);
	console.log(postData);
	$(".loanRequestId").val(loanRequestIDFromElement);

	$.ajax({
		url: esignAgree,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			eSignTransactionID = data.id;
			console.log(eSignTransactionID);
			// openGateway(eSignTransactionID);
			$("#modal-mobile-otp").modal("show");
		},
		statusCode: {
			400: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseJSON.errorMessage);
				var errorMessage = jqXHR.responseJSON.errorMessage;
				if (errorMessage == "You had esigned this document already") {
					var placeerrorHTMLCode =
						"You've already completed esign with this agreement.";
				} else if (
					errorMessage ==
					"Lender has to esign first before you esign. Please contact support"
				) {
					var placeerrorHTMLCode =
						"Your lender has to esign First, We will let you once he is done with his eSign.";
				}

				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
			500: function (jqXHR, textStatus, errorThrown) {
				var placeerrorHTMLCode = "Internal Server Error";
				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			//console.log('Error Something');

			if (arguments[0].responseJSON.errorCode == 114) {
				$("#modal-loanNotAppoved").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function submiteSignOTP() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	loanIDFromEsign = $(".loanRequestId").val();
	var enteredOtp = $(".otpValue").val();
	enteredOtp = enteredOtp.trim();
	//var checkbox_val = $('.agreeCheckBox').val();
	var checkbox_val = document.getElementById("agreeCheckBox").checked;

	console.log(checkbox_val);
	var isOTPerrmsgs = true;

	if (enteredOtp == "") {
		$(".displayOTPError").show();
		isOTPerrmsgs = false;
	} else {
		$(".displayOTPError").hide();
	}

	if (checkbox_val == false) {
		$(".displayOTPTermsError").show();
		isOTPerrmsgs = false;
	} else {
		$(".displayOTPTermsError").hide();
	}

	if (isOTPerrmsgs == true) {
		if (userisIn == "local") {
			var esignAgree =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				suserId +
				"/loan/" +
				sprimaryType +
				"/" +
				loanIDFromEsign +
				"/uploadEsignedAgreementPdfforDeal";
		} else {
			var esignAgree =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				suserId +
				"/loan/" +
				sprimaryType +
				"/" +
				loanIDFromEsign +
				"/uploadEsignedAgreementPdfforDeal";
		}

		var postData = { eSignType: "MOBILE", otpValue: enteredOtp };
		var postData = JSON.stringify(postData);

		$.ajax({
			url: esignAgree,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#modal-agreement").modal("show");
				$("#modal-mobile-otp").modal("hide");
			},
			statusCode: {
				400: function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseJSON.errorMessage);
					var errorMessage = jqXHR.responseJSON.errorMessage;
					if (errorMessage == "You had esigned this document already") {
						var placeerrorHTMLCode =
							"You've already completed esign with this agreement.";
					} else if (
						errorMessage ==
						"Lender has to esign first before you esign. Please contact support"
					) {
						var placeerrorHTMLCode =
							"Your lender has to esign First, We will let you once he is done with his eSign.";
					}

					$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
					$("#modal-agreement-already").modal("show");
				},
				500: function (jqXHR, textStatus, errorThrown) {
					var placeerrorHTMLCode = "Internal Server Error";
					$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
					$("#modal-agreement-already").modal("show");
				},
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isOTPerrmsgs;
}

//****** new loans request for customisation the borrower side for zaggele****
$(document).ready(function () {
	$("#loanrequest-submit-btn").click(function () {
		var enteredloanRequestAmount = $("#partnerloanAmount").val();
		var enteredrateOfInterest = $("#rateOfInterest").val();
		var entersalary = $("#salary").val();
		var enteredduration = $("#duration").val();
		var enteredrepaymentMethod = $("input[name=repaymentMethod]:checked").val();
		var enteredloanPurpose = $(".loanPurpose").val();
		var enteredexpectedDate = $(".expectedDateValue").val();
		var loanEditbleAccess = $("#loanrequestEditAccess").val();
		var wayOfinterestMethod = document.getElementsByName("repaymentMethod");

		var isValid = true;

		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		enteredloanPurpose = enteredloanPurpose.trim();

		if (enteredloanRequestAmount == "") {
			$(".loanRequestAmountError").show();
			isValid = false;
		} else if (enteredloanRequestAmount < 5000) {
			$(".loanRequestAmountError").html(
				"Please enter a value greater than or equal to 5000."
			);
			$(".loanRequestAmountError").show();
			isValid = false;
		} else if (enteredloanRequestAmount > 1000000) {
			if (primaryType == "LENDER") {
				$(".loanRequestAmountError").html(
					"As per RBI guidelines lender can lend only 50 Lakhs only."
				);
				$(".loanRequestAmountError").show();
				isValid = false;
			}
			if (primaryType == "BORROWER") {
				$(".loanRequestAmountError").html(
					"As per RBI guidelines borrower can borrow 1000000 only."
				);
				$(".loanRequestAmountError").show();
				isValid = false;
			}
		} else {
			$(".loanRequestAmountError").hide();
		}
		console.log(enteredrateOfInterest);
		if (enteredrateOfInterest == "") {
			$(".rateOfInterestError").show();
			isValid = false;
		} else {
			$(".rateOfInterestError").hide();
		}

		if (enteredduration == "") {
			$(".durationError").show();
			isValid = false;
		} else {
			$(".durationError").hide();
		}

		if (enteredrepaymentMethod == "") {
			$(".repaymentMethodError").show();
			isValid = false;
		} else {
			$(".repaymentMethodError").hide();
		}

		if (enteredloanPurpose == "") {
			$(".loanPurposeError").show();
			isValid = false;
		} else {
			$(".loanPurposeError").hide();
		}

		if (enteredexpectedDate == "") {
			$(".expectedDateError").show();
			isValid = false;
		} else {
			$(".expectedDateError").hide();
		}

		var postData = {
			loanRequestAmount: enteredloanRequestAmount,
			rateOfInterest: enteredrateOfInterest,
			duration: enteredduration,
			repaymentMethod: enteredrepaymentMethod,
			loanPurpose: enteredloanPurpose,
			expectedDate: enteredexpectedDate,
			durationType: "MONTHS",
			salaryForUser: entersalary,
			status: loanEditbleAccess,
		};
		var postData = JSON.stringify(postData);

		if (userisIn == "local") {
			var regUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/" +
				userId +
				"/loan/" +
				primaryType +
				"/updateLoanRequest";
		} else {
			var regUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				userId +
				"/loan/" +
				primaryType +
				"/updateLoanRequest";
		}

		if (isValid == true) {
			$.ajax({
				url: regUrl,
				type: "PATCH",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-raisealoan-zaggle").modal("show");
				},

				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");

					$("#modal-fileUploadedSuccessfully")
						.removeClass("modal-success")
						.addClass("modal-danger");
					$("#modal-fileUploadedSuccessfully .error_text").html(
						"You've already made one loan request in the process. Kindly finish Enach or Ensign, then after you can raise a loan request. "
					);

					if (arguments[0].responseJSON.errorCode == 108) {
						$("#modal-fileUploadedSuccessfully").modal("show");
					}
				},

				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
});

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
			var actionURL = baseUrl + "v1/user/sendBulkInviteThroughExcel/" + suserId;
		} else {
			var actionURL = baseUrl + "v1/user/sendBulkInviteThroughExcel/" + suserId;
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
					$("#modal-fileNotUploadedData").modal("show");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				$("#modal-uploadBulkInvite").hide();

				$("#modal-fileNotUploadedData").modal("show");
				// alert("file not uploaded MANDEVA");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
}

function loadnewDBInterestsInfo(sortByType) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var sortbyType = sortByType;

	$(".showinterestEarningsbtn").hide();
	$(".interestEarningStaticsdata").hide();
	$(".interestEarningblur").removeClass("interestEarningSection");
	$(".interestEaringfooter").removeClass("interestEarningSection");

	setTimeout(() => {
		$(".interestsSection").append('<div class="loader"></div>');
		$(".interestsSection").addClass("lildark");
	}, 0);

	$(".interestEarningfooterbnt").show();
	$(".interestEarningblur").removeClass("lildark");

	if (userisIn == "local") {
		var getInterestDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/newLenderDashboard";
	} else {
		var getInterestDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/newLenderDashboard";
	}

	var postData = {
		userId: suserId,
		requestType: "LENDERINTEREST",
		pageSize: 5,
		pageNo: 1,
		userId: suserId,
		searchType: sortbyType,
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: getInterestDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log("==========Interest Earnings==========");
			$(".interestEarningfooterbnt").show();
			$(".totalEarnings").html(data.totalInterest);

			if (
				data.lenderReturnsResponseDto == null ||
				data.lenderReturnsResponseDto.length == 0
			) {
				$(".nodataFoundInterest").show();
				$(".interestsSection").removeClass("lildark");
				$(".interestsSection .loader").remove();
			} else {
				$(".interestsSection").removeClass("lildark");
				$(".interestsSection .loader").remove();
				var template = document.getElementById("interestsDataScript").innerHTML;

				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderReturnsResponseDto,
				});

				$("#interesTearnedData").html(html);
				//alert(data.countValue);
				var displayPageNo = data.countValue % 5;

				if (displayPageNo != 0) {
					var displayPage = data.countValue / 5 + 1;
				} else {
					var displayPage = data.countValue / 5;
				}

				$(".interestsPagination")
					.bootpag({
						total: displayPage,
						page: 1,
						maxVisible: 3,
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
						///////////
						var postData = {
							userId: suserId,
							requestType: "LENDERINTEREST",
							pageSize: 5,
							pageNo: num,
							userId: suserId,
							searchType: sortbyType,
						};
						var postData = JSON.stringify(postData);

						$.ajax({
							url: getInterestDetails,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log("==========interests==========");

								console.log("==========interests==========");

								$(".interestEarningStaticsdata").css("display", "none");
								$(".showinterestEarningsbtn").hide();
								$(".interestEarningblur").removeClass("lildark");
								$(".interestEarningblur").removeClass("interestEarningSection");
								$(".interestEaringfooter").removeClass(
									"interestEarningSection"
								);
								$(".interestEarningfooterbnt").show();
								$(".interestEarningStaticsdata").hide();

								$(".totalEarnings").html(data.totalInterest);
								var template = document.getElementById(
									"interestsDataScript"
								).innerHTML;

								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.lenderReturnsResponseDto,
								});
								// alert(html);
								$("#interesTearnedData").html(html);

								$(".interestsPagination").bootpag({
									total: displayPage,
									page: num,
									maxVisible: 3,
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
								});
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
	$(".interestsSection").removeClass("lildark");
	$(".interestsSection .loader").remove();
}

function loadnewDBInvestmentInfo(sortByType) {
	$(".interestStaticdata").hide();

	$("#investmentsData").append('<div class="loader"></div>');
	$("#investmentsData").addClass("lildark");

	$(".showinvestmentbtn").hide();
	$(".invetmentblur").removeClass("lildark");
	$(".invetmentblur").removeClass("investmentSection");
	$(".investmentfooter").removeClass("investmentSection");
	$(".investmentfooterbtn").show();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var sortbyType = sortByType;
	if (userisIn == "local") {
		var getInvestmentDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/newLenderDashboard";
	} else {
		var getInvestmentDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/newLenderDashboard";
	}

	var postData = {
		userId: suserId,
		requestType: "WALLETCREDITED",
		pageSize: 5,
		pageNo: 1,
		userId: suserId,
		searchType: sortbyType,
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: getInvestmentDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log("===========investment=========");

			console.log("==========investment==========");

			$(".totalInvestment").html(data.totalWalletCredited);

			if (
				data.lenderWalletHistoryResponseDto == null ||
				data.lenderWalletHistoryResponseDto.length == 0
			) {
				$(".nodataFoundinvestmentsData").show();
				$("#investmentsData").removeClass("lildark");
				$("#investmentsData .loader").remove();
			} else {
				var template = document.getElementById(
					"investmentDataScript"
				).innerHTML;

				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderWalletHistoryResponseDto,
				});
				// alert(html);
				$("#investmentsData").html(html);

				var displayPageNo = data.countValue % 5;

				if (displayPageNo != 0) {
					var displayPage = data.countValue / 5 + 1;
				} else {
					var displayPage = data.countValue / 5;
				}
				// alert(displayPage);
				$(".investmentsPagination")
					.bootpag({
						total: displayPage,
						page: 1,
						maxVisible: 3,
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
						///////////
						var postData = {
							userId: suserId,
							requestType: "WALLETCREDITED",
							pageSize: 5,
							pageNo: num,
							userId: suserId,
							searchType: sortbyType,
						};
						var postData = JSON.stringify(postData);

						$.ajax({
							url: getInvestmentDetails,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log("====================");

								console.log("====================");
								$(".investmentfooterbtn").show();
								$(".interestStaticdata").hide();
								$(".showinvestmentbtn").hide();
								$(".invetmentblur").removeClass("lildark");
								$(".invetmentblur").removeClass("investmentSection");
								$(".investmentfooter").removeClass("investmentSection");
								$(".totalInvestment").html(data.totalWalletCredited);
								var template = document.getElementById(
									"investmentDataScript"
								).innerHTML;

								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.lenderWalletHistoryResponseDto,
								});

								$("#investmentsData").html(html);
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
	$(".investmentSection").removeClass("lildark");
	$(".investmentSection .loader").remove();
}

function loadnewDBPrincipalInfo(sortByType) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	$(".principalreturnstatic").hide();

	setTimeout(() => {
		$(".principalReturn").append('<div class="loader"></div>');
		$(".principalReturn").addClass("lildark");
	}, 0);

	$(".showPrincipalbtn").hide();
	$(".principalReturnblur").removeClass("lildark");
	$(".principalReturnblur").removeClass("principalReturnSection");
	$(".principalReturnfooter").removeClass("principalReturnSection");
	$(".principalReturnfooterbtn").show();

	var sortbyType = sortByType;
	if (userisIn == "local") {
		var getPrincipalReturnDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/newLenderDashboard";
	} else {
		var getPrincipalReturnDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/newLenderDashboard";
	}

	var postData = {
		userId: suserId,
		requestType: "LENDERPRICIPAL",
		pageSize: 5,
		pageNo: 1,
		userId: suserId,
		searchType: sortbyType,
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: getPrincipalReturnDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(
				"$$$=========lenderPrincipalReturned livin mandeva==========="
			);

			console.log("$$$=========lenderPrincipalReturned livin mandeva=========");

			$(".totalprincipalAmount").html(data.totalPrincipal);

			if (
				data.lenderReturnsResponseDto == null ||
				data.lenderReturnsResponseDto.length == 0
			) {
				$(".nodataFoundPrincipal").show();
				$(".principalReturn").removeClass("lildark");
				$(".principalReturn .loader").remove();
			} else {
				$(".principalReturn").removeClass("lildark");
				$(".principalReturn .loader").remove();
				var template = document.getElementById(
					"principalReturnScript"
				).innerHTML;

				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderReturnsResponseDto,
				});
				// alert(html);
				$("#principalReturnData").html(html);

				var displayPageNo = data.countValue % 5;

				if (displayPageNo != 0) {
					var displayPage = data.countValue / 5 + 1;
				} else {
					var displayPage = data.countValue / 5;
				}

				$(".principalReturnPaging")
					.bootpag({
						total: displayPage,
						page: 1,
						maxVisible: 3,
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
						///////////
						var postData = {
							userId: suserId,
							requestType: "LENDERPRICIPAL",
							pageSize: 5,
							pageNo: num,
							userId: suserId,
							searchType: sortbyType,
						};
						var postData = JSON.stringify(postData);

						$.ajax({
							url: getPrincipalReturnDetails,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								$(".principalreturnstatic").hide();

								$(".showPrincipalbtn").hide();
								$(".principalReturnblur").removeClass("lildark");
								$(".principalReturnblur").removeClass("principalReturnSection");
								$(".principalReturnfooter").removeClass(
									"principalReturnSection"
								);
								$(".principalReturnfooterbtn").show();

								console.log("==========lenderPrincipalReturned==========");

								$(".totalprincipalAmount").html(data.totalPrincipal);
								var template = document.getElementById(
									"principalReturnScript"
								).innerHTML;

								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.lenderReturnsResponseDto,
								});

								$("#principalReturnData").html(html);

								$(".principalReturnPaging").bootpag({
									total: displayPage,
									page: num,
									maxVisible: 3,
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
								});
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
			$(".principalReturn").removeClass("lildark");
			$(".principalReturn .loader").remove();
		},

		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$(".principalReturn").removeClass("lildark");
	$(".principalReturn .loader").remove();
}

function loadnewDBReferralInfo(sortByType) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var sortbyType = sortByType;

	$(".referalEarningStaticdata").hide();

	setTimeout(() => {
		$(".referralBonusPayment").append('<div class="loader"></div>');
		$(".referralBonusPayment").addClass("lildark");
	}, 0);

	$(".showReferralEarningsbtn").hide();
	$(".referalEarningblur").removeClass("referalEarningsSection");
	$(".referalEarningfooter").removeClass("referalEarningsSection");
	$(".referalearningfooterbtn").show();

	if (userisIn == "local") {
		var getPrincipalReturnDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/newLenderDashboard";
	} else {
		var getPrincipalReturnDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/newLenderDashboard";
	}

	var postData = {
		userId: suserId,
		requestType: "REFERRALBONUS",
		pageSize: 5,
		pageNo: 1,
		userId: suserId,
		searchType: sortbyType,
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: getPrincipalReturnDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log("=========loadnewDBReferralInfo===========");

			console.log("=========loadnewDBReferralInfo=========");

			if (data.totalReferralBonusPaid == null) {
				$(".paidReferralAmount").html("0");
			} else {
				$(".paidReferralAmount").html(data.totalReferralBonusPaid);
			}

			if (data.totalReferralBonusUnPaid == null) {
				$(".unpaidreferralEarnings").html("0");
			} else {
				$(".unpaidreferralEarnings").html(data.totalReferralBonusUnPaid);
			}

			if (
				data.referrerResponseDto == null ||
				data.referrerResponseDto.length == 0
			) {
				$(".nodataFoundReferral").show();
				$(".referralBonusPayment .loader").remove();
				$(".referralBonusPayment").removeClass("lildark");
			} else {
				$(".referralBonusPayment .loader").remove();
				$(".referralBonusPayment").removeClass("lildark");
				var template = document.getElementById("referralBonusScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.referrerResponseDto,
				});
				$("#referralData").html(html);

				var displayPageNo = data.countValue % 5;
				if (displayPageNo != 0) {
					var displayPage = data.countValue / 5 + 1;
				} else {
					var displayPage = data.countValue / 5;
				}

				$(".refferralPagination")
					.bootpag({
						total: displayPage,
						page: 1,
						maxVisible: 2,
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
						///////////
						var postData = {
							userId: suserId,
							requestType: "REFERRALBONUS",
							pageSize: 5,
							pageNo: num,
							userId: suserId,
							searchType: sortbyType,
						};
						var postData = JSON.stringify(postData);

						$.ajax({
							url: getPrincipalReturnDetails,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log("====================");

								console.log("====================");

								$(".referalEarningStaticdata").hide();
								$(".showReferralEarningsbtn").hide();
								$(".referalEarningblur").removeClass("referalEarningsSection");
								$(".referalEarningfooter").removeClass(
									"referalEarningsSection"
								);
								$(".referalearningfooterbtn").show();

								if (data.totalReferralBonusPaid == null) {
									$(".paidReferralAmount").html("0");
								} else {
									$(".paidReferralAmount").html(data.totalReferralBonusPaid);
								}

								if (data.totalReferralBonusUnPaid == null) {
									$(".unpaidreferralEarnings").html("0");
								} else {
									$(".unpaidreferralEarnings").html(
										data.totalReferralBonusUnPaid
									);
								}

								var template = document.getElementById(
									"referralBonusScript"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.referrerResponseDto,
								});
								$("#referralData").html(html);

								$(".refferralPagination").bootpag({
									total: displayPage,
									page: num,
									maxVisible: 2,
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
								});
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

	$(".referralBonusPayment .loader").remove();
	$(".referralBonusPayment").removeClass("lildark");
}

function loadnewDBPrincipalDetailsInfo(sortByType) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var sortbyType = sortByType;

	$(".dealprincipalEarningstatic").hide();

	setTimeout(() => {
		$(".principalDetails").append('<div class="loader"></div>');
		$(".principalDetails").addClass("lildark");
	}, 0);

	$(".showDealEarningsbtn").hide();
	$(".dealsEarni9ngsSectionblur").removeClass("dealsEarni9ngsSection");
	$(".dealsEarni9ngsSectionfooter").removeClass("dealsEarni9ngsSection");
	$(".dealsRunningsfooterbtn").show();

	if (userisIn == "local") {
		var getPrincipalReturnDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/newLenderDashboard";
	} else {
		var getPrincipalReturnDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/newLenderDashboard";
	}

	var postData = {
		userId: suserId,
		requestType: "LENDERPATICIPATION",
		pageSize: 5,
		pageNo: 1,
		userId: suserId,
		searchType: sortbyType,
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: getPrincipalReturnDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log("=========LENDERPATICIPATION===========");
			// alert(data);
			$(".runningLoansValuePag").html(
				data.lenderDealsStatisticsInformation.activeDealsAmount
			);
			$(".closedLoansValuePag").html(
				data.lenderDealsStatisticsInformation.closedDealsAmount
			);
			$(".equityLoansValuePag").html(
				data.lenderDealsStatisticsInformation.equityDealsParticipatedAmount
			);
			$(".countOfRunningDeals").html(
				data.lenderDealsStatisticsInformation.numberOfActiveDealsCount
			);
			console.log("*****=========loadnewDBprincipalInfo===========");

			console.log("******=========loadnewDBprincipalInfo=========");

			if (
				data.lenderTotalPaticipationDealsInfo == null ||
				data.lenderTotalPaticipationDealsInfo.length == 0
			) {
				$(".nodataFoundDealEarning").show();
				$(".principalDetails .loader").remove();
				$(".principalDetails").removeClass("lildark");
			} else {
				$(".principalDetails .loader").remove();
				$(".principalDetails").removeClass("lildark");

				var template = document.getElementById(
					"lendingPrincipalScript"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderTotalPaticipationDealsInfo,
				});
				$("#newDBPrincipalLendingDetails").html(html);

				var displayPageNo = data.countValue % 5;
				if (displayPageNo != 0) {
					var displayPage = data.countValue / 5 + 1;
				} else {
					var displayPage = data.countValue / 5;
				}

				$(".principalDetailsPagination")
					.bootpag({
						total: displayPage,
						page: 1,
						maxVisible: 3,
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
						///////////
						var postData = {
							userId: suserId,
							requestType: "LENDERPATICIPATION",
							pageSize: 5,
							pageNo: num,
							userId: suserId,
							searchType: sortbyType,
						};
						var postData = JSON.stringify(postData);

						$.ajax({
							url: getPrincipalReturnDetails,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								console.log("==========loadnewDBprincipalInfo==========");

								console.log("===========loadnewDBprincipalInfo=========");

								$(".dealprincipalEarningstatic").hide();
								$(".showDealEarningsbtn").hide();
								$(".dealsEarni9ngsSectionblur").removeClass(
									"dealsEarni9ngsSection"
								);
								$(".dealsEarni9ngsSectionfooter").removeClass(
									"dealsEarni9ngsSection"
								);
								$(".dealsRunningsfooterbtn").show();

								var template = document.getElementById(
									"lendingPrincipalScript"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.lenderTotalPaticipationDealsInfo,
								});
								$("#newDBPrincipalLendingDetails").html(html);

								$(".principalDetailsPagination").bootpag({
									total: displayPage,
									page: num,
									maxVisible: 3,
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
								});
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

	$(".principalDetails .loader").remove();
	$(".principalDetails").removeClass("lildark");
}

$(function () {
	$("#myformSelcInterests").change(function () {
		$(".interestsSection").append('<div class="loader"></div>');
		$(".interestsSection").addClass("lildark");
		var thisSortby = $(this).val();
		// alert(thisSortby);
		setTimeout(function () {
			loadnewDBInterestsInfo(thisSortby);
		}, 1000);
	});
});
$(function () {
	$("#myformSelcInvestment").change(function () {
		$("#investmentsData").append('<div class="loader"></div>');
		$("#investmentsData").addClass("lildark");
		var thisSortby = $(this).val();
		// alert(thisSortby);
		setTimeout(function () {
			loadnewDBInvestmentInfo(thisSortby);
		}, 1000);
	});
});

$(function () {
	$("#myformSelcPrincipal").change(function () {
		$(".principalReturn").append('<div class="loader"></div>');
		$(".principalReturn").addClass("lildark");
		var thisSortby = $(this).val();

		setTimeout(function () {
			loadnewDBPrincipalInfo(thisSortby);
		}, 1000);
	});
});
$(function () {
	$("#selectReferralOrder").change(function () {
		$(".referralBonusPayment").append('<div class="loader"></div>');
		$(".referralBonusPayment").addClass("lildark");
		var thisSortby = $(this).val();
		// alert(thisSortby);
		setTimeout(function () {
			loadnewDBReferralInfo(thisSortby);
		}, 1000);
	});
});

$(function () {
	$("#lendingPrincipalDetails").change(function () {
		$(".principalDetails").append('<div class="loader"></div>');
		$(".principalDetails").addClass("lildark");
		var thisSortby = $(this).val();
		// alert(thisSortby);
		setTimeout(function () {
			loadnewDBPrincipalDetailsInfo(thisSortby);
		}, 1000);
	});
});

const downloadExcelNewDB = async (inputType) => {
	try {
		$(".showloader").append('<div class="loader"></div>');
		$(".showloader").addClass("lildark");

		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		const excelUrl =
			userisIn === "local"
				? "http://35.154.48.120:8080/oxynew/v1/user/excelsForNewLenderDashboard"
				: "https://fintech.oxyloans.com/oxyloans/v1/user/excelsForNewLenderDashboard";

		const postData = {
			userId: suserId,
			requestType: inputType,
		};

		const response = await fetch(excelUrl, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
			body: JSON.stringify(postData),
		});

		if (!response.ok) {
			throw new Error("Error fetching data");
		}

		const responseData = await response.json();

		setTimeout(function () {
			$(".showloader .loader").remove();
			$(".showloader").removeClass("lildark");
			window.open(responseData.excelDownloadUrl, "_blank");
		}, 1000);
	} catch (error) {
		console.log("Error:", error.message);
	}
};

//**************** download referral status start **********************////////

const downloadReferralStatus = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const referralUrl =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/referralStatusInfo`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/referralStatusInfo`;

	fetch(referralUrl, {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	})
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error Something");
			}
		})
		.then((data) => {
			window.open(data.downloadUrl, "_blank");
		})
		.catch((error) => {
			console.log(error.message);
		});
};

//****************End referral link *******************//

//**************** download referral status start **********************////////

const downloadReferralAmountStatement = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const referralUrl =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/referralBonusAmountLink`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/referralBonusAmountLink`;

	fetch(referralUrl, {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	})
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error Something");
			}
		})
		.then((data) => {
			$(".userEarnedAmount").html(data.amountEarned);
			window.open(data.downloadUrl, "_blank");
		})
		.catch((error) => {
			console.log(error.message);
		});
};

//****************End referral link *******************//

const UpdatedNewBankDetails = () => {
	setTimeout(function () {
		if (
			userpersonalinfo == true &&
			userbankDetailsInfo == true &&
			bankDetailsVerifiedStatus == false &&
			userkycStatus == true
		) {
			$("#headingTwo a").trigger("click");
			$(".displayBankDetailsErrorIfnot").show();
			$(".displayBankDetailsErrorIfnot").attr("style", "width:50%!important");
		} else {
			$(".displayBankDetailsErrorIfnot").hide();
		}
	}, 1000);
};

//  **********************START IGNORE BANK DETAILS************************************

const ignoreNewbankDeatils = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const ignoreURL =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/bankDetailsVerification"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/bankDetailsVerification";

	const postData = {
		userId: suserId,
	};

	const requestOptions = {
		method: "PATCH",
		headers: {
			accessToken: saccessToken,
			"Content-Type": "application/json",
		},
		body: JSON.stringify(postData),
	};

	fetch(ignoreURL, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error Something");
			}
		})
		.then((data) => {
			setTimeout(function () {
				$("#modal-newUpdatedBankDeatils").modal("hide");
			}, 1000);
		})
		.catch((error) => {
			console.log(error.message);
		});
};

//  **********************END IGNORE BANK DETAILS************************************

function skipvalidity() {
	writeCookie("validitySkip", true);
}

function getuserMembershipValidity() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	getvalidity = getCookie("validitySkip");

	if (userisIn == "local") {
		var getDealStats =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/dealsStatistics";
	} else {
		var getDealStats =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/dealsStatistics";
	}

	$.ajax({
		url: getDealStats,
		type: "GET",
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);

			// if (data.validityDate == null) {
			// 	$(".displayvalidity").hide();
			// 	$(".loadingSec").hide();
			// 	// $(".membershipDate").hide();
			// } else {
			// 	 $(".mebershipexpiry, .membershipdate").html(data.validityDate);
			// 	$(".displayvalidity").show();

			// }

			var currentdate = new Date(data.validityDate);
			var next_date = new Date();

			const diffTime = Math.abs(currentdate - next_date);
			const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

			if (
				next_date > currentdate &&
				getvalidity == "false" &&
				data.validityDate != null
			) {
				$("#modal-validitydate-expired").modal("show");
				$(".getmembership_new").show();
			} else if (
				currentdate < next_date &&
				getvalidity == "false" &&
				data.validityDate != null &&
				diffDays <= 15
			) {
				$("#modal-validitydate-expiring").modal("show");
				$(".getmembership_new").show();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			$(".loadingSec").hide();
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
				$("#displaywallettrns").html("");
				$("#displaywallettrns").append("<tr><td>No data Found</td></tr>");
				$("#noRecordFound").show();
			} else {
				$("#noRecordFound").hide();
				var template = document.getElementById(
					"wallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, {
					data: data.lenderReferenceAmountResponse,
				});

				$("#displaywallettrns").html(html);
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
								$("#noRecordFound").hide();
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

// *********download referrence amount based on payment Status*********

const downloadreferrencePaymentStatus = (earnStatus) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const ignoreURL =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/downLoadLinkForBonusAmount"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/downLoadLinkForBonusAmount";

	const postData = {
		userId: suserId,
		paymentStatus: earnStatus,
	};

	const requestOptions = {
		method: "POST",
		headers: {
			accessToken: saccessToken,
			"Content-Type": "application/json",
		},
		body: JSON.stringify(postData),
	};

	fetch(ignoreURL, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error Something");
			}
		})
		.then((data) => {
			window.open(data.downloadLink, "_blank");
		})
		.catch((error) => {
			console.log(error.message);
		});
};

// ********************view ticket history  status********************

function getViewTicketHistory(queryStatus) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var getborrowers =
			"http://35.154.48.120:8080/oxynew/v1/user/queryDetailsBasedOnUserId";
	} else {
		var getborrowers =
			"https://fintech.oxyloans.com/oxyloans/v1/user/queryDetailsBasedOnUserId";
	}

	var postData = {
		pageNo: 1,
		pageSize: 10,
		status: queryStatus,
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
			console.log(data);
			totalEntries = data.listOfUserQueryDetailsResponseDto.length;
			if (totalEntries == 0) {
				$(".displayNorecordQueryHistory").hide();
				setTimeout(() => {
					alert("No data");
				}, 1000);
			} else {
				var template = document.getElementById(
					"wallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);

				var html = Mustache.to_html(template, {
					data: data.listOfUserQueryDetailsResponseDto,
				});
				$("#displayUserQuerystatus").html(html);

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
							status: queryStatus,
							userId: suserId,
						};

						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var getborrowers =
								"http://35.154.48.120:8080/oxynew/v1/user/queryDetailsBasedOnUserId";
						} else {
							var getborrowers =
								"https://fintech.oxyloans.com/oxyloans/v1/user/queryDetailsBasedOnUserId";
						}
						$.ajax({
							url: getborrowers,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								if (data.count == 0) {
									$("#displayNoRecords").show();
								} else {
									var template = document.getElementById(
										"wallettransactiondetails"
									).innerHTML;
									Mustache.parse(template);
									var html = Mustache.render(template, data);
									var html = Mustache.to_html(template, {
										data: data.listOfUserQueryDetailsResponseDto,
									});
									$("#displayUserQuerystatus").html(html);
								}
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
	$(".getviewQueryStatus .loader").remove();
	$(".getviewQueryStatus").removeClass("lildark");
}

$(function () {
	$("#mySelectQueryStatus").change(function () {
		$(".getviewQueryStatus").append('<div class="loader"></div>');
		$(".getviewQueryStatus").addClass("lildark");
		var thisSortby = $(this).val();
		setTimeout(function () {
			getViewTicketHistory(thisSortby);
		}, 1000);
	});
});

// *********download referrence amount based on payment Status*********

const viewTicketHistory = (id) => {
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const viewQuery =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  id +
			  "/pendingQueriesBasedOnId"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  id +
			  "/pendingQueriesBasedOnId";

	const requestOptions = {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	};

	fetch(viewQuery, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error Something");
			}
		})
		.then((data) => {
			$(".inquiriesdisPlayNonedata-" + id).hide();
			if (data.length === 0) {
				$(".viewQueryadminStatus-" + id).show();
				$(".nodataFound").show();
			} else {
				$(".viewQueryadminStatus-" + id).show();
				const template = document.getElementById("inquiriesReplay").innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, { data: data });
				$("#displayUserQuery-" + id).html(html);
			}
		})
		.catch((error) => {
			console.log(error.message);
		});
};

const subinquiries = (id) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const viewSubQuery =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/listOfQueriesHisory"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/listOfQueriesHisory";

	const postData = {
		id: id,
		userId: suserId,
	};

	const requestOptions = {
		method: "POST",
		headers: {
			accessToken: saccessToken,
			"Content-Type": "application/json",
		},
		body: JSON.stringify(postData),
	};

	fetch(viewSubQuery, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error Something");
			}
		})
		.then((data) => {
			$(".viewQueryadminStatus-" + id).hide();
			if (data.length === 0) {
				$(".inquiriesdisPlayNonedata-" + id).show();
				$(".viewSubqueryNodata").show();
			} else {
				$(".inquiriesdisPlayNonedata-" + id).show();
				let template;
				if (sprimaryType === "LENDER") {
					template = document.getElementById("viewgetUserQuery").innerHTML;
				} else {
					template = document.getElementById("viewgetsubUserQuery").innerHTML;
				}
				Mustache.parse(template);
				const html = Mustache.to_html(template, { data: data });
				$("#displaySubUserQuery-" + id).html(html);
			}
		})
		.catch((error) => {
			console.log(error.message);
		});
};

///*****************************/////
///*********************view my loan applications......***********

function viewMyLoanApplications() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var postData = {
		leftOperand: {
			fieldName: "userId",
			fieldValue: userId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "parentRequestId",
			operator: "NULL",
		},
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/ADMIN/request/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/request/search";
	}

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);

			if (data.results.length == 0 || data.results.length == null) {
				$("#displayNoRecords").show();
			} else {
				totalEntries = data.totalCount;
				console.log(totalEntries);
				var template = document.getElementById("displayallRequests").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });
				$("#displayRequests").html(html);

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
							leftOperand: {
								fieldName: "userId",
								fieldValue: userId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "parentRequestId",
								operator: "NULL",
							},
						};

						var postData = JSON.stringify(postData);
						console.log(postData);

						if (userisIn == "local") {
							var getStatUrl =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/loan/ADMIN/request/search";
						} else {
							var getStatUrl =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/loan/ADMIN/request/search";
						}

						$.ajax({
							url: getStatUrl,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								totalEntries = data.totalCount;
								console.log(totalEntries);
								var template =
									document.getElementById("displayallRequests").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.results,
								});
								$("#displayRequests").html(html);
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

const breakupmyParticipation = (dealId) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const userId = suserId;
	const primaryType = sprimaryType;
	const accessToken = saccessToken;

	const getmyparticipationBreakUP =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/getLenderIndividualReturns"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/getLenderIndividualReturns";

	const postData = {
		userId: userId,
		requestType: "LENDERPATICIPATION",
		dealId: dealId,
	};

	const requestOptions = {
		method: "POST",
		headers: {
			accessToken: accessToken,
			"Content-Type": "application/json",
		},
		body: JSON.stringify(postData),
	};

	fetch(getmyparticipationBreakUP, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error Something");
			}
		})
		.then((data) => {
			if (
				data.newLenderReturnsResponseDto.length === 0 ||
				data.newLenderReturnsResponseDto === null
			) {
				$("#modal-viewgetMyparticipationBreakUp").modal("show");
				$("#displayNoRecords").show();
			} else {
				const template = document.getElementById("viewBreakUPinfo").innerHTML;
				Mustache.parse(template);
				const html = Mustache.render(template, {
					data: data.newLenderReturnsResponseDto,
				});
				$("#viewbreakupStatement").html(html);
				$("#modal-viewgetMyparticipationBreakUp").modal("show");
			}
		})
		.catch((error) => {
			console.log(error.message);
		});
};

//******* view the lender correct values and status *******

const getNewStatementInfo = (amount) => {
	$(".solidToggle_" + amount).slideToggle("slow");
};
//******* End view the lender correct values and status *******

function showWithdrawDeal(type) {
	$(".loading").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/lenderPaticipatedDealBasedOnDealType";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/lenderPaticipatedDealBasedOnDealType";
	}
	var postData = {
		pageNo: 1,
		pageSize: 10,
		dealType: type,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.count;
			if (
				data.lenderPaticipatedResponseDto.length == 0 ||
				data.lenderPaticipatedResponseDto.length == null
			) {
				$("#displayNoRecords").show();
			} else {
				var template = document.getElementById("displayDealsScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderPaticipatedResponseDto,
				});
				$("#displayDealsData").html(html);
				$(".loading").hide();

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".dashBoardPagination")
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
							dealType: type,
						};
						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var getDeals =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/lenderPaticipatedDealBasedOnDealType";
						} else {
							var getDeals =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/lenderPaticipatedDealBasedOnDealType";
						}
						$.ajax({
							url: getDeals,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayDealsScript").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.lenderPaticipatedResponseDto,
								});
								$("#displayDealsData").html(html);
								$(".loading").hide();
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
	// $(".loadingSec").hide();
}

$(document).ready(function () {
	$("#btn-withdrawDealFunds").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");
		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var dealId = $("#withdrawDealId").val();
		var currentAmount = $("#ParticipatedAmount").val();
		var requestedAmount = $("#dealRequestedAmount").val();
		var withDrawalFunds = $("#dealwithdrawamount").val();

		$("#btn-withdrawDealFunds").attr("disabled", true);

		var isValid = true;

		if (withDrawalFunds == "") {
			$(".dealWithdrawAmounterror").show();
			isValid = false;
		} else {
			$(".dealWithdrawAmounterror").hide();
		}

		var postData = {
			userId: userId,
			dealId: dealId,
			currentAmount: currentAmount,
			requestedAmount: requestedAmount,
			withDrawalFunds: withDrawalFunds,
		};
		var postData = JSON.stringify(postData);
		console.log(postData);

		if (userisIn == "local") {
			withdrawUrl =
				"http://35.154.48.120:8080/oxynew/v1/user/withdrawalFundsFromDeals";
		} else {
			withdrawUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/withdrawalFundsFromDeals";
		}

		if (isValid == true) {
			$.ajax({
				url: withdrawUrl,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$("#modal-withdrawalfundssuccess").modal("show");
					$("#btn-withdrawDealFunds").attr("disabled", false);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");

					$(".modal-body-withdraw #withdrawdeal").html(
						arguments[0].responseJSON.errorMessage
					);
					if (arguments[0].responseJSON.errorCode == 123) {
						$("#modal-withdrawal-error-messages").modal("show");
					}
					$("#btn-withdrawDealFunds").attr("disabled", false);
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
		$("#btn-withdrawDealFunds").attr("disabled", false);
	});
});

function readCompanyDocument(input, documenteType) {
	$(".loadingSec").show();
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$(".passportUpload .image-upload-wrap").hide();

			$(".passportUpload .file-upload-image").attr("src", e.target.result);
			$(".passportUpload .file-upload-content").show();

			$(".passportUpload .image-title").html(input.files[0].name);
		};

		reader.readAsDataURL(input.files[0]);

		var fd = new FormData();
		var files = input.files[0];
		fd.append(documenteType, files);
		console.log(fd);
		var actionURL = $("#userKYCUpload").attr("action");
		console.log(fd);
		$.ajax({
			url: actionURL,
			type: "post",
			data: fd,
			contentType: false,
			processData: false,
			success: function (data, textStatus, xhr) {
				if (data != 0) {
					$("#modal-fileUploadedSuccessfully").modal("show");
					$(".loadingSec").hide();
				} else {
					alert("file not uploaded");
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				alert("file not uploaded");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	} else {
		removeUpload();
	}
}

$(document).ready(function () {
	$("#driveSubmmitBTN").click(function () {
		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		const userId = suserId;
		const primaryType = sprimaryType;
		const accessToken = saccessToken;

		const driveError = $("#companyDocumetDrive").val();

		let isValid = true;

		if (driveError === "") {
			$(".driveError").show();
			isValid = false;
		} else {
			$(".driveError").hide();
		}

		const postData = {
			documentDriveLink: driveError,
		};

		const requestOptions = {
			method: "PATCH",
			headers: {
				accessToken: accessToken,
				"Content-Type": "application/json",
			},
			body: JSON.stringify(postData),
		};

		const uploadingDocDriveLink =
			userisIn === "local"
				? "http://35.154.48.120:8080/oxynew/v1/user/" +
				  suserId +
				  "/uploadingDocDriveLink"
				: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
				  suserId +
				  "/uploadingDocDriveLink";

		if (isValid) {
			fetch(uploadingDocDriveLink, requestOptions)
				.then((response) => {
					if (response.ok) {
						$("#modal-fileUploadedSuccessfully .driveText").html(
							"Drive Link Uploaded Successfully"
						);
						$("#modal-fileUploadedSuccessfully").modal("show");
					} else {
						throw new Error("Error");
					}
				})
				.catch((error) => {
					console.log(error.message);
				});
		}

		return isValid;
	});
});

//**********************withdrawal BreakUp*******************************

const viewWithdrawalBreakUp = (dealid) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const getWithdrawalBreakUP =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/${dealid}/displayingWithdrawalRequests`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/${dealid}/displayingWithdrawalRequests`;

	const requestOptions = {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	};

	fetch(getWithdrawalBreakUP, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error");
			}
		})
		.then((data) => {
			const template = document.getElementById(
				"filteredWithdrawalInfo"
			).innerHTML;
			const rendered = Mustache.render(template, {
				data: data.lenderWithdrawalFundsFromDealsResponseDto,
			});
			document.getElementById("viewDealWithdrawalBreakUp").innerHTML = rendered;
			$("#modal-viewgetDealWithdrawalRequest").modal("show");
		})
		.catch((error) => {
			console.log(error.message);
		});
};

///**********************generating the qr code for the user******************

$(document).ready(function () {
	$("#genQRcode").click(function () {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		userId = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var qrAmount = $("#qrAmountValue").val();

		var isValid = true;

		if (qrAmount == "") {
			$(".nullQrAmount").show();
			isValid = false;
		} else {
			$(".nullQrAmount").hide();
		}

		var postData = {
			userId: userId,
			amount: qrAmount,
		};
		var postData = JSON.stringify(postData);

		if (userisIn == "local") {
			QRLink =
				"http://35.154.48.120:8080/oxynew/v1/user/QRTransactionInitiation";
		} else {
			QRLink =
				"https://fintech.oxyloans.com/oxyloans/v1/user/QRTransactionInitiation";
		}

		if (isValid == true) {
			$.ajax({
				url: QRLink,
				type: "POST",
				data: postData,
				contentType: "application/json",
				dataType: "json",
				success: function (data, textStatus, xhr) {
					$(".qrbox-text").hide();
					$("#qrcode-container").show();
					$("#qrUrlpath").val(data.qrGenerationString);
					$("#qrUrlID").val(data.qrTableId);

					qrcodeGenrateId = data.qrTableId;
					qrcodeStatus = data.status;
					let website = document.getElementById("qrUrlpath").value;
					if (website) {
						let qrcodeContainer = document.getElementById("qrcode");
						qrcodeContainer.innerHTML = "";
						new QRious({
							element: qrcodeContainer,
							background: "#ffffff",
							backgroundAlpha: 1,
							foreground: "#5868bf",
							foregroundAlpha: 1,
							level: "H",
							padding: 0,
							size: 300,
							value: website,
						});
					}

					setTimeout(function () {
						$("#qrcode-container").hide();
						$("#page-wrap").show();
					}, 15000);

					var intervalId = window.setInterval(function () {
						checkqrcodetransaction(qrcodeGenrateId);
					}, 1000);
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("error");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
		return isValid;
	});
});

function backtoQRamount() {
	$(".qrbox-text").show();
	$("#qrcode-container").hide();
	$("#page-wrap").hide();
}

function checkqrcodetransaction(QRCODEID) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	console.log(QRCODEID);

	if (userisIn == "local") {
		var Qrstatus =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			QRCODEID +
			"/qrStatusCheck";
	} else {
		var Qrstatus =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			QRCODEID +
			"/qrStatusCheck";
	}

	$.ajax({
		url: Qrstatus,
		type: "PATCH",
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.status == "NOTYETSCANNED") {
				$(".qrscanStatus").html("loading the response. Please wait");
			} else if (data.status == "SUCCESS") {
				$(".qrStatusBack").hide();
				$(".qrscanStatus").html(
					"Your payment is successful and updated in your wallet"
				);

				setTimeout(function () {
					window.location = "idb";
				}, 8000);
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

const loanEligibilitybyreferring = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const loaneligibility =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/borrowerEligibilityDetails`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/borrowerEligibilityDetails`;

	const requestOptions = {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	};

	fetch(loaneligibility, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error");
			}
		})
		.then((data) => {
			$(".loanEligilibilityAmount").html(data.loanEligibility);
		})
		.catch((error) => {
			console.log(error.message);
		});
};

$(document).ready(function () {
	$("#eligibilityKnowMore").click(function () {
		$("#modal-loanEligibilityKnowMoreInfo").modal("show");
	});
});

//******loans request edited and reject   ****

function editandrejectLoanRequest(localstatus) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const userId = suserId;
	const primaryType = sprimaryType;
	const accessToken = saccessToken;

	const postData = {
		status: localstatus,
	};
	const postDataString = JSON.stringify(postData);

	const editloanRequest =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${userId}/loan/${primaryType}/updateLoanRequest`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${userId}/loan/${primaryType}/updateLoanRequest`;

	const requestOptions = {
		method: "PATCH",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: postDataString,
	};

	fetch(editloanRequest, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error");
			}
		})
		.then((data) => {
			if (localstatus === "Rejected") {
				$(".modal-body #bodyLoanRequestError").html(
					"Your loan application is deleted successfully"
				);
			} else if (localstatus === "Hold") {
				$(".modal-body #bodyLoanRequestError").html(
					"Your loan application is on hold"
				);
			}

			$("#modal-LoanEditSucess").modal("show");
			setTimeout(function () {
				window.location.reload();
			}, 6000);
		})
		.catch((error) => {
			console.log("Error Something");
			$(".modal-body #loanedit-wrong").html(error.responseJSON.errorMessage);
			if (error.responseJSON.errorCode === 108) {
				$("#modal-alreadyDoneLoanEdit").modal("show");
			}
		});
}

const editRequestUsers = () => {
	if (userUtm == "WEB" || userUtm == "Web" || userUtm == null) {
		window.location = "borrowerraisealoanrequest?loanRequest=Edit";
	} else {
		window.location = "borrowerloanrequest?loanRequest=Edit";
	}
};

const getLenderPassonEducation = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const postData = {
		type: "EDUCATION",
	};
	const postDataString = JSON.stringify(postData);

	const getpassion =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/displayEducationAndPassionTypes"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/displayEducationAndPassionTypes";

	const requestOptions = {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: postDataString,
	};

	fetch(getpassion, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error");
			}
		})
		.then((data) => {
			$("#usereducationDrop").empty();

			for (var i = 0; i < data.educationTypes.length; i++) {
				var educationGroup = data.educationTypes[i];
				if (educationGroup != "NA") {
					$("#usereducationDrop").append(
						'<option value="' +
							educationGroup +
							'">' +
							educationGroup +
							"</option>"
					);
				}
			}
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

const getLenderPassion = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const postData = {
		type: "PASSION",
	};

	const postDataString = JSON.stringify(postData);

	const getpassion =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/displayEducationAndPassionTypes"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/displayEducationAndPassionTypes";

	const requestOptions = {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: postDataString,
	};

	fetch(getpassion, requestOptions)
		.then((response) => {
			if (response.ok) {
				return response.json();
			} else {
				throw new Error("Error");
			}
		})
		.then((data) => {
			$("#userpassionDrop").empty();

			for (var i = 0; i < data.passionTypes.length; i++) {
				var userPassion = data.passionTypes[i];
				if (userPassion != "NA") {
					$("#userpassionDrop").append(
						'<option value="' + userPassion + '">' + userPassion + "</option>"
					);
				}
			}
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

const mappedUsersFormSystem = (
	city,
	state,
	pincode,
	locality,
	education,
	passion
) => {
	city = city ? "YES" : "NO";
	state = state ? "YES" : "NO";
	pincode = pincode ? "YES" : "NO";
	locality = locality ? "YES" : "NO";
	education = education ? "YES" : "NO";
	passion = passion ? "YES" : "NO";

	$(".showingMappedUserData").append('<div class="loader"></div>');
	$(".showingMappedUserData").addClass("lildark");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	const postData = {
		city,
		state,
		pincode,
		locality,
		education,
		passion,
	};

	const jsonData = JSON.stringify(postData);
	console.log(jsonData);

	const mappedUrl =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/mappedUsers`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/mappedUsers`;

	fetch(mappedUrl, {
		method: "POST",
		body: jsonData,
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.userDetails.length === 0 || data.userDetails === null) {
				$("#displayNoRecords").show();
			} else {
				const template =
					document.getElementById("UserMappedDataList").innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, {
					data: data.userDetails,
				});
				$("#displayMappedUsers").html(html);
			}

			setTimeout(() => {
				$(".showingMappedUserData").removeClass("lildark");
				$(".showingMappedUserData .loader").remove();
			}, 1500);
		})
		.catch((error) => {
			console.log("Error Something");

			setTimeout(() => {
				$(".showingMappedUserData").removeClass("lildark");
				$(".showingMappedUserData .loader").remove();
			}, 1500);
		});
};

function getEmiData() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	$(".displayEmiCalInfo").append('<div class="loader"></div>');
	$(".displayEmiCalInfo").addClass("lildark");

	var loanAmount = $("#emiamount").val();
	var loanEmiroi = $(".emicalRoi").val();
	var loanemiTenture = $(".emicalTenure").val();
	var calType = $(".calEmiType").val();

	var isValid = true;

	if (loanAmount == "") {
		$(".calAmount").show();
		isValid = false;
	} else {
		$(".calAmount").hide();
	}

	if (loanEmiroi == "") {
		$(".calRoi").show();
		isValid = false;
	} else {
		$(".calRoi").hide();
	}

	if (loanemiTenture == "") {
		$(".calTenure").show();
		isValid = false;
	} else {
		$(".calTenure").hide();
	}

	if (calType == "") {
		$(".roiType").show();
		isValid = false;
	} else {
		$(".roiType").hide();
	}

	if (userisIn == "local") {
		var emiCal =
			"http://35.154.48.120:8080/oxynew/v1/user/borrowerEmiDetails";
	} else {
		var emiCal =
			"https://fintech.oxyloans.com/oxyloans/v1/user/borrowerEmiDetails";
	}

	var postData = {
		// borrowerId:suserId,
		loanAmount: loanAmount,
		rateOfInterest: loanEmiroi,
		tenure: loanemiTenture,
		calculationType: calType,
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	if (isValid == true) {
		$.ajax({
			url: emiCal,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",

			success: function (data, textStatus, xhr) {
				setTimeout(function () {
					$(".displayEmiCalInfo").removeClass("lildark");
					$(".displayEmiCalInfo .loader").remove();
				}, 2000);

				$("#displayNoRecords").hide();
				$(".displayEmiData").show();

				if (data.reduceCalculationEmi.length != 0) {
					var template = document.getElementById("viewgetCalData").innerHTML;
					Mustache.parse(template);
					var html = Mustache.to_html(template, {
						data: data.reduceCalculationEmi,
					});
					$("#displayEmiCalculatorInfo").html(html);
				} else {
					var template = document.getElementById("viewgetCalData").innerHTML;
					Mustache.parse(template);
					var html = Mustache.to_html(template, {
						data: data.flatCalculationEmi,
					});
					$("#displayEmiCalculatorInfo").html(html);
				}
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
		});
	}
	setTimeout(function () {
		$(".displayEmiCalInfo").removeClass("lildark");
		$(".displayEmiCalInfo .loader").remove();
	}, 2000);
	return isValid;
}

const skipwhatsappVerify = () => {
	writeCookie("skipwhatsappVerify", true);
};

function showInterestStatement(dealId) {
	dealIDforparticipationAmount = dealId;

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getpaymentstatus =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/" +
			dealId +
			"/closedDealsInterest";
	} else {
		var getpaymentstatus =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/" +
			dealId +
			"/closedDealsInterest";
	}

	$.ajax({
		url: getpaymentstatus,
		type: "GET",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			$(".firstInterestDate").html(data.dealFirstInterestDate);
			$("#modal-viewLenderStatement").modal("show");
			$(".download-block").attr("href", data.downloadStatement);
			console.log(data);

			if (data.lenderReturns.length == 0) {
				$("#norecodeOfClosed").show();
			} else {
				var template = document.getElementById("lenderDealEmiCard").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderReturns,
				});
				$("#viewLenderStatement").html(html);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".modal-NoInterestDATE  #text1").html(
				arguments[0].responseJSON.errorMessage
			);
			if (arguments[0].responseJSON.errorCode == 101) {
				$("#modal-errorNofirstInterestDate").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function profitearnedCertificate(startDate, endDate, requestTypefromBtn) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var startDate = startDate;
	var endDate = endDate;

	if (userisIn == "local") {
		var earnedCertificate =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/lender-income";
	} else {
		var earnedCertificate =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/lender-income";
	}

	var postData = {
		startDate: startDate,
		endDate: endDate,
		inputType: requestTypefromBtn,
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: earnedCertificate,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (requestTypefromBtn == "EMAIL") {
				$("#modal-alreadyDoneSendOffer").modal("show");
			} else {
				$("#modal-downloadOffer").modal("show");
				window.location.href = data.lenderProfit;
			}
			setTimeout(function () {
				location.reload();
			}, 8000);
		},

		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".modal-body #text1").html(arguments[0].responseJSON.errorMessage);

			if (arguments[0].responseJSON.errorCode == 120) {
				$("#modal-alreadyDoneSendOffer").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function hideerror() {
	$(".showErrormessageDate").hide();
}

function searchUsersPhase1(userType, borrowerid, adminid) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	console.log(userType, borrowerid, adminid);

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var postData = {
		leftOperand: {
			fieldName: "userId",
			fieldValue: borrowerid,
			operator: "EQUALS",
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
					fieldName: "loanStatus",
					fieldValue: "Edit",
					operator: "EQUALS",
				},
			},
		},
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			adminid +
			"/loan/ADMIN/request/search";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			adminid +
			"/loan/ADMIN/request/search";
	}
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$(".toImLending").html(data.results[0].user.firstName);
			$(".borrowerCity").html(data.results[0].user.address);
			$(".borrowerCompany").html(data.results[0].borrowerUser.companyName);
			$(".borrowerSalary").html(data.results[0].borrowerUser.salary);
			$(".borrowerRiskCat").html(data.results[0].borrowerUser.mobileNumber);
			$(".loanRequestDisplay").html(data.results[0].user.dob);
			$(".offeredAmountByAdmin").html(data.results[0].user.email);
			$(".loanpurposeDisplay").html(data.results[0].loanPurpose);
			$(".displayUserstate").html(data.results[0].user.state);
			$(".displayApplicationStatus").html(data.results[0].borrowerUser.status);
			$(".displayloanRequest").html(data.results[0].loanRequest);
			$(".dispalyPan").html(data.results[0].user.panNumber);

			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;

			$(".searchborrowerPagination")
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
					//$(".content4").html("Page " + num); // or some ajax content loading...

					var postData = {
						leftOperand: {
							fieldName: "userId",
							fieldValue: borrowerid,
							operator: "EQUALS",
						},
						logicalOperator: "AND",
						rightOperand: {
							leftOperand: {
								fieldName: "parentRequestId",
								operator: "NULL",
							},
							logicalOperator: "OR",
							rightOperand: {
								fieldName: "parentRequestId",
								operator: "NOT_NULL",
							},
						},
						page: {
							pageNo: 1,
							pageSize: 10,
						},
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};

					var postData = JSON.stringify(postData);
					console.log(postData);

					if (userisIn == "local") {
						var getStatUrl =
							"http://35.154.48.120:8080/oxynew/v1/user/" +
							adminid +
							"/loan/ADMIN/request/search";
					} else {
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							adminid +
							"/loan/ADMIN/request/search";
					}

					$.ajax({
						url: getStatUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							$(".toImLending").html(data.results[0].user.firstName);
							$(".borrowerCity").html(data.results[0].user.address);
							$(".borrowerCompany").html(
								data.results[0].borrowerUser.companyName
							);
							$(".borrowerSalary").html(data.results[0].borrowerUser.salary);
							$(".borrowerRiskCat").html(
								data.results[0].borrowerUser.mobileNumber
							);

							$(".loanRequestDisplay").html(data.results[0].user.dob);
							$(".offeredAmountByAdmin").html(data.results[0].user.email);
							$(".loanpurposeDisplay").html(data.results[0].loanPurpose);
							$(".displayUserstate").html(data.results[0].user.state);
							$(".displayApplicationStatus").html(
								data.results[0].borrowerUser.status
							);
							$(".displayloanRequest").html(data.results[0].loanRequest);
						},
						error: function (xhr, textStatus, errorThrown) {
							console.log("Error Something");
						},
						beforeSend: function (xhr) {
							xhr.setRequestHeader("accessToken", saccessToken);
						},
					});
				});
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function viewBorrowerDoc(userid, doctype) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	var doctype = doctype;

	if (userisIn == "local") {
		var getPAN =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userid +
			"/download/" +
			doctype;
	} else {
		var getPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userid +
			"/download/" +
			doctype;
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

				if (sourcePath.indexOf(contentTypeCheck) != -1) {
					//alert('We can view the PDF files in colorbox. Note: File will download automatically. Please check downloads.');
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

function borrowerqrpayout(loanid, emiNumber) {
	console.log(loanid);
	console.log(emiNumber);

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var qrAmount = $("#bqrAmountValue").val();

	var isValid = true;

	if (qrAmount == "") {
		$(".nullQrAmount").show();
		isValid = false;
	} else {
		$(".nullQrAmount").hide();
	}

	var postData = {
		userId: userId,
		loanId: loanid,
		emiNumber: emiNumber,
		partPayment: qrAmount,
	};
	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		QRLink =
			"http://35.154.48.120:8080/oxynew/v1/user/getPaymentDetailsByCashFree";
	} else {
		QRLink =
			"https://fintech.oxyloans.com/oxyloans/v1/user/getPaymentDetailsByCashFree";
	}

	if (isValid == true) {
		$.ajax({
			url: QRLink,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$(".qrbox-text").hide();
				$("#qrcode-container").show();
				// $("#qrUrlpath").val(data.qrCode);

				$("#theDiv").prepend('<img id="theImg" src="' + data.qrCode + '" />');

				qrcodeGenrateId = data.qrTableId;
				qrcodeStatus = data.status;
				let website = document.getElementById("qrUrlpath").value;
				if (website) {
					let qrcodeContainer = document.getElementById("qrcode");
					qrcodeContainer.innerHTML = "";
					new QRious({
						element: qrcodeContainer,
						background: "#ffffff",
						backgroundAlpha: 1,
						foreground: "#5868bf",
						foregroundAlpha: 1,
						level: "H",
						padding: 0,
						size: 300,
						value: website,
					});
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
	return isValid;
}

function usernotuploadedprofile(input) {
	if (input == "nomine") {
		$("#headingThree a").trigger("click");
	} else if (input == "bank") {
		$("#headingTwo a").trigger("click");
	} else if (input == "profile") {
		$("#headingOne a").trigger("click");
	}
}

function viewSalariedLenderStatement(loanid, dealName) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getpaymentstatus =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanid +
			"/emicard";
	} else {
		var getpaymentstatus =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			loanid +
			"/emicard";
	}

	$.ajax({
		url: getpaymentstatus,
		type: "GET",
		dataType: "json",

		success: function (data, textStatus, xhr) {
			console.log(data);
			var template = document.getElementById(
				"viewsalariedBreakUpInfo"
			).innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data.results });
			$("#viewsalariedStatement").html(html);


			$("#modal-viewsalariedBreakUpinfo").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".modal-NoInterestDATE  #text1").html(
				arguments[0].responseJSON.errorMessage
			);
			if (arguments[0].responseJSON.errorCode == 101) {
				$("#modal-errorNofirstInterestDate").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function getVerifyPan() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	$(".verify_pan_no").append('<div class="loader"></div>');
	$(".verify_pan_no").addClass("lildark");

	var panno = $("#pannumber").val() != "" ? $("#pannumber").val().trim() : "";

	if (userisIn == "local") {
		var verifyPan =
			"http://35.154.48.120:8080/oxynew/v1/user/verifyPan?pan=" +
			panno;
	} else {
		var verifyPan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/verifyPan?pan=" + panno;
	}

	$.ajax({
		url: verifyPan,
		type: "GET",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.valid == "true") {
				$(".pannumbererror").hide();
				$("#firstnamevalue").val(data.registered_name);
				// $("#firstnamevalue").attr("disabled", true);
				$("#lastnamevalue").val("  ");
				// $("#lastnamevalue").attr("disabled", true);
				$("#middletname").val("  ");
				// $("#middletname").attr("disabled", true);
			
				setTimeout(function () {
					$(".verify_pan_no").removeClass("lildark");
					$(".verify_pan_no .loader").remove();
					$(".pannumbererror").hide();
				}, 3000);
			} else {
				$(".pannumbererror").html(data.message).show();
				// $("#pannumber").removeAttr("readonly");
				$("#pannumber").attr("readonly", false);
				$("#firstnamevalue").attr("disabled", false);
				$("#lastnamevalue").attr("disabled", false);
				// $("#middletname").attr("disabled", false);

				setTimeout(function () {
					$(".verify_pan_no").removeClass("lildark");
					$(".verify_pan_no .loader").remove();
				}, 3000);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");

			$("#firstnamevalue").attr("disabled", false);
			$("#lastnamevalue").attr("disabled", false);
			$("#middletname").attr("disabled", false);
			$("#pannumber").attr("readonly", false);
			$(".pannumbererror").show('Something Went Wrong Try again');

			setTimeout(function () {
				$(".verify_pan_no").removeClass("lildark");
				$(".verify_pan_no .loader").remove();
			}, 3000);
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

$(document).ready(function () {
	$("#pannumber").on("keyup", function (e) {
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		var panno = $("#pannumber").val() != "" ? $("#pannumber").val().trim() : "";
		if (panno.length == 10) {
			$(".verify_pan_no").append('<div class="loader"></div>');
			$(".verify_pan_no").addClass("lildark");

			if (userisIn == "local") {
				var verifyPan =
					"http://35.154.48.120:8080/oxynew/v1/user/verifyPan?pan=" +
					panno;
			} else {
				var verifyPan =
					"https://fintech.oxyloans.com/oxyloans/v1/user/verifyPan?pan=" +
					panno;
			}

			$.ajax({
				url: verifyPan,
				type: "GET",
				success: function (data, textStatus, xhr) {
					if (data.valid == "true") {
						$(".pannumbererror").hide();
						$("#firstnamevalue").val(data.registered_name);
						// $("#firstnamevalue").attr("disabled", true);
						// $("#lastnamevalue").val("  ");
						// $("#lastnamevalue").attr("disabled", true);
						// $("#middletname").val("");
						// $("#middletname").attr("disabled", true);

						setTimeout(function () {
							$(".verify_pan_no").removeClass("lildark");
							$(".verify_pan_no .loader").remove();
							$(".pannumbererror").hide();
						}, 3000);
					} else {
						$(".pannumbererror").html(data.message).show();
						$("#pannumber").attr("readonly", false);
						$("#firstnamevalue").attr("disabled", false);
						$("#lastnamevalue").attr("disabled", false);
						$("#middletname").attr("disabled", false);

						setTimeout(function () {
							$(".verify_pan_no").removeClass("lildark");
							$(".verify_pan_no .loader").remove();
							$("#pannumber").attr("readonly", false);
							$(".pannumbererror").html(data.message).show();
						}, 3000);
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");

					setTimeout(function () {
						$(".verify_pan_no").removeClass("lildark");
						$(".verify_pan_no .loader").remove();
						$("#pannumber").attr("readonly", false);
						$(".pannumbererror").hide();
					}, 3000);
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", saccessToken);
				},
			});
		}
	});
});

//verify adhar data

// $(document).ready(function () {
// 	$("#adharcardNo").on("keyup", function (e) {

// 		suserId = getCookie("sUserId");
// 		sprimaryType = getCookie("sUserType");
// 		saccessToken = getCookie("saccessToken");

// 		var aadharno= $("#adharcardNo").val();

// 		if (aadharno.length == 12) {
// 			$(".verify_pan_no").append('<div class="loader"></div>');
// 			$(".verify_pan_no").addClass("lildark");

// 			if (userisIn == "local") {
// 				var verifyAadhar =
// 					"http://35.154.48.120:8080/oxynew/v1/user/aadharOtpGeneration";
// 			} else {
// 				var verifyAadhar =
// 					"https://fintech.oxyloans.com/oxyloans/v1/user/aadharOtpGeneration";
// 			}

//              var postData={

//                 aadhaar_number:aadharno,
//              	userId:suserId
//            }
//            var postData = JSON.stringify(postData);

// 			$.ajax({
// 				url: verifyAadhar,
// 				type: "POST",
// 			    data: postData,
// 		        contentType: "application/json",
// 		         dataType: "json",

// 				success: function (data, textStatus, xhr) {

// 					$(".aadharOtp").show();
//                     $(".aadharOtp").fadeIn(200).fadeOut(200).fadeIn(200).fadeOut(200).fadeIn(200);
// 					 aadharref_id=data.ref_id;

// 					 setTimeout(function () {
// 						$(".verify_pan_no").removeClass("lildark");
// 						$(".verify_pan_no .loader").remove();

// 					}, 3000);
// 				},
// 				error: function (xhr, textStatus, errorThrown) {
// 					console.log("Error Something");

// 			    $("#modal-aadhar-verify .bodyData").html(
// 				   arguments[0].responseJSON.errorMessage
// 			     );

// 		  	    if (arguments[0].responseJSON.errorCode == 112) {
// 			 	  $("#modal-aadhar-verify").modal("show");
// 			   }

// 					setTimeout(function () {
// 						$(".verify_pan_no").removeClass("lildark");
// 						$(".verify_pan_no .loader").remove();

// 					}, 3000);
// 				},
// 				beforeSend: function (xhr) {
// 					xhr.setRequestHeader("accessToken", saccessToken);
// 				},
// 			});
// 		}
// 	});
// });

// $(document).ready(function () {
// 	$("#adharOtp").on("keyup", function (e) {
// 		suserId = getCookie("sUserId");
// 		sprimaryType = getCookie("sUserType");
// 		saccessToken = getCookie("saccessToken");

// 		var aadharOtp= $("#adharOtp").val();
// 		var aadharno= $("#adharcardNo").val();

// 		if (aadharOtp.length == 6 && aadharno.length==12) {
// 			$(".verify_pan_no").append('<div class="loader"></div>');
// 			$(".verify_pan_no").addClass("lildark");

// 			if (userisIn == "local") {
// 				var verifyAadharotp =
// 					"http://35.154.48.120:8080/oxynew/v1/user/verifyAadharOtp";
// 			} else {
// 				var verifyAadharotp =
// 				"https://fintech.oxyloans.com/oxyloans/v1/user/verifyAadharOtp";
// 			}

//              var postData={
//                  userId:suserId,
//                  ref_id:aadharref_id,
//                  status:"SUCCESS",
//                  otp:aadharOtp,
//                  aadhaar_number:aadharno
//            }
//            var postData = JSON.stringify(postData);

// 			$.ajax({
// 				url: verifyAadharotp,
// 				type: "PATCH",
// 			    data: postData,
// 		        contentType: "application/json",
// 		         dataType: "json",
// 				success: function (data, textStatus, xhr) {

// 					 setTimeout(function () {
// 						$(".verify_pan_no").removeClass("lildark");
// 						$(".verify_pan_no .loader").remove();

// 					 }, 3000);

//                      $("#modal-aadhar-verify-otp").modal("show");
// 				  setTimeout(()=>{
// 				  	$("#modal-aadhar-verify-otp").modal("hide");
// 				  },4000);

// 				},
// 				error: function (xhr, textStatus, errorThrown) {
// 					console.log("Error Something");

// 			    $("#modal-aadhar-verify .bodyData").html(
// 				   arguments[0].responseJSON.errorMessage
// 			     );

// 		  	    if (arguments[0].responseJSON.errorCode == 112) {
// 			 	  $("#modal-aadhar-verify").modal("show");
// 			   }

// 					setTimeout(function () {
// 						$(".verify_pan_no").removeClass("lildark");
// 						$(".verify_pan_no .loader").remove();

// 					}, 3000);
// 				},
// 				beforeSend: function (xhr) {
// 					xhr.setRequestHeader("accessToken", saccessToken);
// 				},
// 			});
// 		}
// 	});
// });

function getSessionExpireData() {
	$("#modal-checkSession").modal("hide");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	tokenTimeStamp = getCookie("tokenTime");

	var addingtime = 1500000;
	var getTime = parseInt(tokenTimeStamp) + addingtime;
	var date = new Date();
	var milliseconds = date.getTime();

	if (milliseconds > getTime) {
		$("#modal-check-session-expire").modal("show");
	}
}

function getNewTime() {
	$("#modal-checkSession").modal("hide");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getsession =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/USER/accessTokenGeneration";
	} else {
		var getsession =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/USER/accessTokenGeneration";
	}
	$.ajax({
		url: getsession,
		type: "GET",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			writeCookie("tokenTime", data.tokenGeneratedTime);
			$("#modal-check-session-expire").modal("hide");
			$("#modal-checkSession").modal("hide");
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

function renewalValidityFee(isValidity) {
	$("#modal-validitydate-expired").modal("hide");
	$("#modal-validitydate-expiring").modal("hide");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (isValidity == "true" || isValidity == "false") {
		fetchCashFree(suserId, 5900, 0, isValidity);
	}
}

function paynewmembershipSeptember(selectedMembership) {
	// var selectedMembership = $("input[name='membership']:checked").val();
	// if (selectedMembership == undefined) {
	// 	alert("choose membership ");
	// } else {
	// 	$(".newmembership_btn").attr("user-choosen", selectedMembership);
	// 	$(".newmembership_walletbtn").attr("user-choosen", selectedMembership);
	// 	$("#modal-approve-newmembership").modal("show");
	// }

	$(".newmembership_btn").attr("user-choosen", selectedMembership);
	$(".newmembership_walletbtn").attr("user-choosen", selectedMembership);
	$("#modal-approve-newmembership").modal("show");
}

function paynewmembershiprenewalValidityFee(isValidity) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

    $(".newmembership_btn").attr("disabled",true);
	var selectedValue = $(".newmembership_btn").attr("user-choosen");

	const membershipfiled = {
		MONTHLY: "1000",
		QUARTERLY: "2900",
		HALFYEARLY: "5600",
		PERYEAR: "9800",
		LIFETIME: "100000",
		FIVEYEARS: "50000",
		TENYEARS: "90000",
	};

	const calculatedfee = (parseInt(membershipfiled[selectedValue]) * 118) / 100;

	if (isValidity == "true" || isValidity == "false") {
		fetchNewMembershipCashFree(
			suserId,
			calculatedfee,
			0,
			isValidity,
			selectedValue,
			"BEFORE"
		);
	}
}

function getTokenforeNach() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	if (userisIn == "local") {
		var getTokenUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/enach";
	} else {
		var getTokenUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/enach";
	}
	$.ajax({
		url: getTokenUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			tokenforeNach = data.token;
			console.log(txnIdforeNACH);
			txnIdforeNACH = data.txnId;
			$("#btnSubmit").trigger("click");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

async function downloadOverallINFO() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userId = suserId;

	let downloadExcl = "";

	if (userisIn === "local") {
		downloadExcl = `http://35.154.48.120:8080/oxynew/v1/user/${userId}/closedDealsDownloadForUser`;
	} else {
		downloadExcl = `https://fintech.oxyloans.com/oxyloans/v1/user/${userId}/closedDealsDownloadForUser`;
	}

	try {
		const response = await fetch(downloadExcl, {
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
		});

		if (response.ok) {
			const data = await response.json();
			if (data.closedDealsDownloadUrl !== "") {
				window.open(data.closedDealsDownloadUrl, "_blank");
			}
		} else {
			console.log("Error Something");
		}
	} catch (error) {
		console.log("Error Something");
	}
}

async function downloadOverallRunningandclosedINFO(typeoffile = "RUNNING") {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userId = suserId;

	let downloadExcl = "";

	if (userisIn === "local") {
		downloadExcl = `http://35.154.48.120:8080/oxynew/v1/user/${userId}/${typeoffile}/excel-sheet-download`;
	} else {
		downloadExcl = `https://fintech.oxyloans.com/oxyloans/v1/user/${userId}/closedDealsDownloadForUser`;
	}

	try {
		const response = await fetch(downloadExcl, {
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
		});

		if (response.ok) {
			const data = await response.json();
			console.log(data);

			if (userisIn == "local") {
				if (data.openDealsDownloadUrl !== null) {
					window.open(data.openDealsDownloadUrl, "_blank");
				} else {
					window.open(data.closedDealsDownloadUrl, "_blank");
				}
			} else {
				window.open(data.closedDealsDownloadUrl, "_blank");
			}
		} else {
			console.log("Error Something");
		}
	} catch (error) {
		console.log("Error Something");
	}
}

const applicationLevelEnach = () => {
	$("#modal-checkEnach").modal("hide");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userId = suserId;
	const primaryType = sprimaryType;
	const accessToken = saccessToken;

	let appLevelEnach = "";

	if (userisIn === "local") {
		appLevelEnach = `http://35.154.48.120:8080/oxynew/v1/user/${userId}/loan/${primaryType}/searchEnachMandateApplicationLevel`;
	} else {
		appLevelEnach = `https://fintech.oxyloans.com/oxyloans/v1/user/${userId}/loan/${primaryType}/searchEnachMandateApplicationLevel`;
	}

	const postData = {};
	const postDataString = JSON.stringify(postData);

	$.ajax({
		url: appLevelEnach,
		type: "POST",
		data: postDataString,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.length == 0) {
				$("#displayApp").show();
			} else {
				$("#displayApp").hide();
				const template = document.getElementById(
					"displayAppLevelEnachScript"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.render(template, data);
				$("#displayAppLevelEnach").html(html);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$(".loadingSec").hide();
};

function AppLevelactivateECS(enachMandateId) {
	$(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	userId = suserId;
	//console.log(suserId);
	let primaryType = sprimaryType;
	let accessToken = saccessToken;
	fName = "lenderUserId";
	if (sprimaryType == "BORROWER") {
		fName = "borrowerUserId";
	}
	var returnURL = "";
	if (userisIn == "local") {
		var getStatUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/enachForApplication/" +
			enachMandateId;
		returnURL = "http://182.18.139.198/new/AppLevelenachMandateResponse";
	} else {
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/loan/" +
			primaryType +
			"/enachForApplication/" +
			enachMandateId;
		returnURL = "https://oxyloans.com/new/AppLevelenachMandateResponse";
	}

	var postData = {};
	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$.getScript(
				"https://www.paynimo.com/Paynimocheckout/server/lib/checkout.js"
			);
			var configJson = {
				tarCall: false,
				features: {
					showPGResponseMsg: true,
					enableNewWindowFlow: true,
					//for hybrid applications please disable this by passing false
					enableExpressPay: true,
					siDetailsAtMerchantEnd: true,
					enableSI: true,
				},
				consumerData: {
					deviceId: "WEBSH1", //possible values 'WEBSH1', 'WEBSH2' and 'WEBMD5'
					token: data.token,
					returnUrl: data.enachMandateRetUrl,
					//'responseHandler': handleResponse,
					paymentMode: "all",
					merchantLogoUrl:
						"https://www.paynimo.com/CompanyDocs/company-logo-md.png", //provided merchant logo will be displayed
					merchantId: data.merchantId,
					currency: "INR",
					consumerId: data.user.displayId, //Your unique consumer identifier to register a eMandate/eSign
					consumerMobileNo: data.user.mobileNumber,
					consumerEmailId: data.user.email,
					txnId: data.txnId, //Unique merchant transaction ID
					items: [
						{
							itemId: "FIRST",
							amount: data.totalAmount,
							comAmt: "0",
						},
					],
					txnType: "SALE",
					customStyle: {
						PRIMARY_COLOR_CODE: "#3977b7", //merchant primary color code
						SECONDARY_COLOR_CODE: "#FFFFFF", //provide merchant's suitable color code
						BUTTON_COLOR_CODE_1: "#1969bb", //merchant's button background color code
						BUTTON_COLOR_CODE_2: "#FFFFFF", //provide merchant's suitable color code for button text
					},
					//'accountNo': '910010016945587',    //Pass this if accountNo is captured at merchant side for eMandate/eSign
					//'accountType': 'Saving',    //  Available options Saving, Current and CC for Cash Credit, only for eSign
					//'accountHolderName': 'Name',  //Pass this if accountHolderName is captured at merchant side for eSign only(Note: For ICICI eMandate registration this is mandatory field, if not passed from merchant Customer need to enter in Checkout UI)
					//'ifscCode': 'ICIC0000001',        //Pass this if ifscCode is captured at merchant side for eSign only
					debitStartDate: data.debitStartDate,
					debitEndDate: data.debitEndDate,
					maxAmount: data.maxAmount,
					amountType: data.amountType,
					frequency: data.frequency, //  Available options DAIL, Week, MNTH, QURT, MIAN, YEAR, BIMN and ADHO
				},
			};
			$.pnCheckout(configJson);
			if (configJson.features.enableNewWindowFlow) {
				pnCheckoutShared.openNewWindow();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
	$(".loadingSec").hide();
}

const AppLevelsaveEMandateResponse = (merchantResponseString) => {
	$(".loadingSec").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userId = suserId;
	const primaryType = sprimaryType;
	const accessToken = saccessToken;

	let getStatUrl = "";

	if (userisIn === "local") {
		getStatUrl = `http://35.154.48.120:8080/oxynew/v1/user/${userId}/loan/enachForApplicationLevel/response`;
	} else {
		getStatUrl = `https://fintech.oxyloans.com/oxyloans/v1/user/${userId}/loan/enachForApplicationLevel/response`;
	}

	const postData = {
		mandateResponse: merchantResponseString,
	};
	const postDataString = JSON.stringify(postData);

	$.ajax({
		url: getStatUrl,
		type: "POST",
		data: postDataString,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

	$(".loadingSec").hide();
};

function AppLevelDoneMobile() {
	console.log("user clicked");
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	applicationLoanRequest = getCookie("applicationLoanRequest");

	if (userisIn == "local") {
		var esignAgree =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			applicationLoanRequest +
			"/esignForApplicationLevel";
	} else {
		var esignAgree =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/" +
			applicationLoanRequest +
			"/esignForApplicationLevel";
	}

	loanIDFromEsign = applicationLoanRequest;
	var postData = { eSignType: "MOBILE" };
	var postData = JSON.stringify(postData);

	$(".loanRequestId").val(applicationLoanRequest);

	$.ajax({
		url: esignAgree,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			eSignTransactionID = data.id;
			console.log(eSignTransactionID);
			$("#modal-mobile-otp-ApplicationLevel").modal("show");
		},
		statusCode: {
			400: function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR.responseJSON.errorMessage);
				var errorMessage = jqXHR.responseJSON.errorMessage;
				if (errorMessage == "You had esigned this document already") {
					var placeerrorHTMLCode =
						"You've already completed esign with this agreement.";
				} else if (
					errorMessage ==
					"Lender has to esign first before you esign. Please contact support"
				) {
					var placeerrorHTMLCode =
						"Your lender has to esign First, We will let you once he is done with his eSign.";
				}

				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
			500: function (jqXHR, textStatus, errorThrown) {
				var placeerrorHTMLCode =
					"Internal Server Error/Invalid Phone Number - Length Mismatch Expected: 10";
				$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
				$("#modal-agreement-already").modal("show");
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			if (arguments[0].responseJSON.errorCode == 114) {
				$("#modal-loanNotAppoved").modal("show");
			}
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

const AppLevelsubmitOTPeSign = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let enteredOtp = $("#appLevelotp").val();
	enteredOtp = enteredOtp.trim();
	const checkbox_val = document.getElementById("AppagreeCheckBox").checked;

	let isOTPerrmsgs = true;

	if (enteredOtp === "") {
		$(".displayOTPError").show();
		isOTPerrmsgs = false;
	} else {
		$(".displayOTPError").hide();
	}

	if (checkbox_val === false) {
		$(".displayOTPTermsError").show();
		isOTPerrmsgs = false;
	} else {
		$(".displayOTPTermsError").hide();
	}

	if (isOTPerrmsgs === true) {
		const esignAgree =
			userisIn === "local"
				? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/${sprimaryType}/${loanIDFromEsign}/uploadEsignedAgreementPdfforDealInApplicationLevel`
				: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/${sprimaryType}/${loanIDFromEsign}/uploadEsignedAgreementPdfforDealInApplicationLevel`;

		const postData = { eSignType: "MOBILE", otpValue: enteredOtp };
		const postDataString = JSON.stringify(postData);

		$.ajax({
			url: esignAgree,
			type: "POST",
			data: postDataString,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#modal-agreement").modal("show");
				$("#modal-mobile-otp-ApplicationLevel").modal("hide");
			},
			statusCode: {
				400: function (jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseJSON.errorMessage);
					const errorMessage = jqXHR.responseJSON.errorMessage;
					let placeerrorHTMLCode = "";

					if (errorMessage === "You had esigned this document already") {
						placeerrorHTMLCode =
							"You've already completed esign with this agreement.";
					} else if (
						errorMessage ===
						"Lender has to esign first before you esign. Please contact support"
					) {
						placeerrorHTMLCode =
							"Your lender has to esign First, We will let you once he is done with his eSign.";
					}

					$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
					$("#modal-agreement-already").modal("show");
				},
				500: function (jqXHR, textStatus, errorThrown) {
					const placeerrorHTMLCode = "Internal Server Error";
					$("#modal-agreement-already .modal-body p").html(placeerrorHTMLCode);
					$("#modal-agreement-already").modal("show");
				},
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isOTPerrmsgs;
};

$(".deleteSession").click(function () {});
// *********View sub referee data *********

function viewSubereferreals(id) {
	// $(".solidToggle_"+id).slideToggle("slow");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	var sub = id;

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
								// $(".viewSubquery-"+id).show();
								// $(".nodataFound").show();
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

			// $(".viewSubquery-"+id).show();
			//   $(".nodataFound").show();
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

///*********************view my loan applications......***********

function ViewMynotifications() {
	$(".loading").show();
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/userNotifications";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/userNotifications";
	}
	var postData = {
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			if (data.userNotificationsResponseDto.length == 0) {
				$("#displayNone").show();
			} else {
				totalEntries = data.totalNotificationsCount;
				var template = document.getElementById("displayDealsScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.userNotificationsResponseDto,
				});
				$("#displayDealsData").html(html);
				$(".loading").hide();

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".dashBoardPagination")
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
							var getDeals =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/userNotifications";
						} else {
							var getDeals =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/userNotifications";
						}
						$.ajax({
							url: getDeals,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayDealsScript").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.userNotificationsResponseDto,
								});
								$("#displayDealsData").html(html);
								$(".loading").hide();
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

const agreeNotifcation = (id) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const notification =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${id}/notificationStatusUpdation`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${id}/notificationStatusUpdation`;

	const postData = {};

	const postDataString = JSON.stringify(postData);
	console.log(postDataString);

	$.ajax({
		url: notification,
		type: "PATCH",
		data: postDataString,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-user-notification-aggree").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const confirmationTransfer = (dealId, modeofTransfer) => {
	if (modeofTransfer == "WALLET") {
		modeofTransfer = "Bank Account";
	} else {
		modeofTransfer = "Wallet";
	}

	$("#modal-principalTransfer-method .modeType").html(modeofTransfer);
	$(".btn-of-confirmation").attr("deal-Id", dealId);
	$(".btn-of-confirmation").attr("transfer-mode", modeofTransfer);
	$("#modal-principalTransfer-method").modal("show");
};

const transferfundsConfirmation = () => {
	$(".btn-of-confirmation").attr("disabled", true);

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const dealId = $(".btn-of-confirmation").attr("deal-Id");
	let bankaccountype = $(".btn-of-confirmation").attr("transfer-mode");

	bankaccountype = bankaccountype === "Bank Account" ? "BANKACCOUNT" : "WALLET";

	const transfer =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/principal_return_account_type"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/principal_return_account_type";

	const postData = {
		userId: suserId,
		dealId: dealId,
		accountType: bankaccountype,
	};

	const postDataString = JSON.stringify(postData);
	console.log(postDataString);

	$.ajax({
		url: transfer,
		type: "PATCH",
		data: postDataString,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-principalTransfer-method").modal("hide");
			$("#modal-view-paymentsuccess").modal("show");

			setTimeout(function () {
				window.location.reload();
			}, 3000);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".btn-of-confirmation").attr("disabled", false);
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const renewalUnsbscribtion = () => {
	$(".renwel_unsubscribe").attr("disabled", true);

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const renewalnotification =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/updatingRenewalMessageStatus"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/updatingRenewalMessageStatus";

	const postData = {
		id: suserId,
		isMailsShouldSend: false,
	};

	const postDataString = JSON.stringify(postData);
	console.log(postDataString);

	$.ajax({
		url: renewalnotification,
		type: "PATCH",
		data: postDataString,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-validitydate-expired").modal("hide");
			$("#modal-success-unsubscribeNotification").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			$(".renwel_unsubscribe").attr("disabled", false);
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const refSendOtoIndividual = (button) => {
	const refNumberMap = {
		btnOtp_1: 1,
		btnOtp_2: 2,
		btnOtp_3: 3,
		btnOtp_4: 4,
		btnOtp_5: 5,
		btnOtp_6: 6,
		btnOtp_7: 7,
		btnOtp_8: 8,
	};
	const x = button.id;
	const refNumber = refNumberMap[x];
	return refNumber ? SendOtpReferenceIndividual(refNumber) : false;
};

const SendOtpReferenceIndividual = (ref) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("primaryType");
	const saccessToken = getCookie("saccessToken");

	const mobileNumber = $("#ref_" + ref).val();

	const referenceotp =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/sendMobileOtp"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/sendMobileOtp";

	const refnumbers = [];

	for (let i = 1; i <= userReferenceCount; i++) {
		refnumbers.push($("#ref_" + i).val());
	}

	const filtered = refnumbers.filter((el) => el !== "");

	let resultToReturn = true;

	filtered.find((item, index) => {
		if (filtered.indexOf(item) !== index) {
			alert("You have already given this mobile number.");
			resultToReturn = false;
		}
	});

	const postData = {
		mobileNumber: mobileNumber,
	};

	const postDataString = JSON.stringify(postData);
	console.log(postDataString);
	if (resultToReturn !== false) {
		$.ajax({
			url: referenceotp,
			type: "POST",
			data: postDataString,
			contentType: "application/json",
			dataType: "json",
			success: (data, textStatus, xhr) => {
				$(".btm_ref_" + ref).html("Resend");
				$(".btm_ref_" + ref).attr("otp_session_" + ref, data.mobileOtpSession);
				$("#otpinput" + ref)
					.fadeOut(100)
					.fadeIn(100)
					.fadeOut(100)
					.fadeIn(100);
				$("#otpinput" + ref).show();
			},
			error: (xhr, textStatus, errorThrown) => {
				console.log("Error Something");

				$(".errormessage_profile").prop("onclick", null).off("click");

				if (arguments[0].responseJSON.errorCode == 100) {
					$(".modal-body .notupdate").html(
						arguments[0].responseJSON.errorMessage
					);
					$("#modal-profile-not-update").modal("show");
				}
			},
			beforeSend: (xhr) => {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return resultToReturn;
};

setTimeout(() => {
	$("input[name='otpinput']").on("keyup", (e) => {
		console.log(e);
		const inputid = e.currentTarget.id;
		const otps = $("#" + inputid).val();
		if (otps.length == 6) {
			verifyRefMobileNumber(otps, inputid);
			return false;
		}
	});
}, 3000);

const verifyRefMobileNumber = (otpuser, inputId) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("primaryType");
	const saccessToken = getCookie("saccessToken");

	const mobileNumberRef = $(
		"#ref_" + inputId.substring(inputId.length - 1)
	).val();
	const mobileNumberRefToken = $(
		"#btnOtp_" + inputId.substring(inputId.length - 1)
	).attr("otp_session_" + inputId.substring(inputId.length - 1));

	const referenceotp =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/verifyMobileOtpValue"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/verifyMobileOtpValue";

	const postData = {
		mobileNumber: mobileNumberRef,
		mobileOtpSession: mobileNumberRefToken,
		mobileOtpValue: otpuser,
	};

	const postDataJson = JSON.stringify(postData);

	const ajaxOptions = {
		url: referenceotp,
		type: "POST",
		data: postDataJson,
		contentType: "application/json",
		dataType: "json",
		success: (data, textStatus, xhr) => {
			$("#" + inputId).hide();
			$(".btm_ref_" + inputId.substring(inputId.length - 1)).html("Submitted");
			$(".btm_ref_" + inputId.substring(inputId.length - 1)).attr(
				"disabled",
				true
			);
			$("#ref_" + inputId.substring(inputId.length - 1)).attr("readonly", true);
			$(".refBlock_" + inputId.substring(inputId.length - 1)).show();
		},
		error: (xhr, textStatus, errorThrown) => {
			console.log("Error Something");

			$("#modal-referencedetails")
				.removeClass("modal-success")
				.addClass("modal-warning");

			$("#modal-referencedetails .textInfo").html(
				arguments[0].responseJSON.errorMessage
			);

			if (arguments[0].responseJSON.errorCode == 103) {
				$("#modal-referencedetails").modal("show");
			}
		},
		beforeSend: (xhr) => {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	};

	$.ajax(ajaxOptions);
};

setTimeout(() => {
	$("#user-referrence-details").click(() => {
		const suserId = getCookie("sUserId");
		const sprimaryType = getCookie("sUserType");
		const saccessToken = getCookie("saccessToken");

		const userId = suserId;
		const primaryType = sprimaryType;
		const accessToken = saccessToken;

		let isValid = true;

		const referenceDtoArry = [];

		for (let i = 1; i <= userReferenceCount; i++) {
			const refno = $("#ref_" + i).val();
			const refOTPUser = $("#otpinput" + i).val();

			if (refno !== "" && refOTPUser !== "") {
				referenceDtoArry.push({
					referenceNumber: refno,
				});
			} else {
				alert("Something went wrong in the reference " + i);
				isValid = false;
				break;
			}
		}

		const postData = {
			userId: suserId,
			updateReferenceDetails: true,
			referenceDto: referenceDtoArry,
		};

		const referrenceUrl =
			userisIn === "local"
				? "http://35.154.48.120:8080/oxynew/v1/user/borrowerReferenceDetails"
				: "https://fintech.oxyloans.com/oxyloans/v1/user/borrowerReferenceDetails";

		const ajaxOptions = {
			url: referrenceUrl,
			type: "PATCH",
			data: JSON.stringify(postData),
			contentType: "application/json",
			dataType: "json",
			success: (data, textStatus, xhr) => {
				$("#modal-referencedetails").modal("show");
			},
			error: (xhr, textStatus, errorThrown) => {
				console.log("error");
				$("#modal-referencedetails")
					.removeClass("modal-success")
					.addClass("modal-warning");
				$("#modal-referencedetails .textInfo").html(
					arguments[0].responseJSON.errorMessage
				);
				$("#modal-referencedetails").modal("show");
			},
			beforeSend: (xhr) => {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		};

		if (isValid) {
			$.ajax(ajaxOptions);
		}

		return isValid;
	});
}, 2000);

const checkresendactivastionLink = () => {
	const activeLink = getCookie("resend-activation-link");
	activeLink == true || activeLink == "true"
		? $("#emailMessage").hide()
		: $("#emailMessage").show();
};

const digits = () => {
	$(".numdigitsvalues").text((index, value) =>
		value.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
	);
};

////*********download running deals excel  Livin************************

const downloadRunningDealsInfo = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const refExcel =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/downloadRunningDeals`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/downloadRunningDeals`;

	$.ajax({
		url: refExcel,
		type: "GET",
		contentType: "application/json",
		dataType: "json",
		success: (data, textStatus, xhr) => {
			window.open(data.downloadUrl, "_blank");
		},
		error: (xhr, textStatus, errorThrown) => {
			console.log("Error Something");
		},
		beforeSend: (xhr) => {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const partialclosedDownloadExcel = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const refExcel =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/partiallyClosedDealsDownload`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/partiallyClosedDealsDownload`;

	$.ajax({
		url: refExcel,
		type: "GET",
		contentType: "application/json",
		dataType: "json",
		success: (data, textStatus, xhr) => {
			window.open(data.downloadUrl, "_blank");
		},
		error: (xhr, textStatus, errorThrown) => {
			console.log("Error Something");
		},
		beforeSend: (xhr) => {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const w2wWithdrawal = () => {
	setTimeout(() => {
		$("#btn-withdrawal-w2w").attr("disabled", true);
	}, 200);

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	let userWallet = getCookie("walletBal");
	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	let sender = $("#senderId").val().substr(2);
	let receiver = $("#receiver").val().substr(2);
	let transferAmount = $("#transferAmount").val();

	userWallet = parseInt(userWallet);

	let isValid = true;
	if (receiver == "") {
		$(".receivererror").show();
		isValid = false;
	} else {
		$(".receivererror").hide();
	}

	if (sender == "") {
		$(".senderIderror").show();
		isValid = false;
	} else {
		$(".senderIderror").hide();
	}

	if (transferAmount == "") {
		$(".transferAmounterror").show();
		isValid = false;
	} else {
		$(".transferAmounterror").hide();
		transferAmount = parseInt(transferAmount);
	}

	if (transferAmount > userWallet) {
		$(".transferAmounterror").html(
			"The transfer amount is greater than the wallet balance"
		);
		$(".transferAmounterror").show();
		isValid = false;
	}

	const postData = {
		senderId: userId,
		receiverId: receiver,
		amount: transferAmount,
	};

	const postDataStr = JSON.stringify(postData);
	console.log(postDataStr);

	const withdrawUrlw2w =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/wallet_amount_transfer"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/wallet_amount_transfer";

	if (isValid) {
		$.ajax({
			url: withdrawUrlw2w,
			type: "POST",
			data: postDataStr,
			contentType: "application/json",
			dataType: "json",
			success: (data, textStatus, xhr) => {
				$("#modal-withdrawalfundssuccess-w2w").modal("show");
				setTimeout(() => {
					$("#btn-withdrawal-w2w").attr("disabled", false);
				}, 200);
			},

			statusCode: {
				403: function (response) {
					var _errorCodeis = response.responseJSON["errorCode"];
					var _errorCodeTextIs = response.responseJSON["errorMessage"];
					$(".modal-body #text-w2w").html(_errorCodeTextIs);
					$("#modal-withdrawalfundserrorforAmount-w2w").modal("show");
				},

				400: function (response) {
					var _errorCodeis = response.responseJSON["errorCode"];
					var _errorCodeTextIs = response.responseJSON["errorMessage"];
					$(".modal-body #text-w2w").html(_errorCodeTextIs);
					$("#modal-withdrawalfundserrorforAmount-w2w").modal("show");
				},
			},
			error: (xhr, textStatus, errorThrown) => {
				console.log(textStatus);
				console.log(xhr);

				if (xhr.responseJSON.errorCode == "404") {
					$(".modal-body #text-w2w").html(xhr.responseJSONerrorMessage);
					$("#modal-withdrawalfundserrorforAmount-w2w").modal("show");
				} else if (arguments[0].responseJSON.errorCode == 109) {
					$(".modal-body #text-w2w").html(
						arguments[0].responseJSON.errorMessage
					);
					$("#modal-withdrawalfundserrorforAmount-w2w").modal("show");
				}
				setTimeout(() => {
					$("#btn-withdrawal-w2w").attr("disabled", false);
				}, 200);
			},
			beforeSend: (xhr) => {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}

	setTimeout(() => {
		$("#btn-withdrawal-w2w").attr("disabled", false);
	}, 200);

	return isValid;
};

const applicationLevelEmiInfo = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const updateAppEmis =
		userisIn == "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/${sprimaryType}/searchLoansInAppLevel`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/${sprimaryType}/searchLoansInAppLevel`;

	$.ajax({
		url: updateAppEmis,
		type: "GET",
		success: (data, textStatus, xhr) => {
			$(".loadingSec").hide();

			const template = document.getElementById("displayallRequests").innerHTML;
			Mustache.parse(template);
			const html = Mustache.to_html(template, { data: data });
			$("#displayRequests").html(html);
		},
		statusCode: {
			400: (response) => {
				$("#modal-agreement-already").modal("show");
			},
		},
		error: (xhr, textStatus, errorThrown) => {
			console.log("Error Something");
			$(".loadingSec").show();
		},
		beforeSend: (xhr) => {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const getAppLevelEMITABLE = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const updateAppEmiUrlCard =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/emicardForAppLevel`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/emicardForAppLevel`;

	fetch(updateAppEmiUrlCard, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			const template = document.getElementById("emiRecordsCallTpl").innerHTML;
			Mustache.parse(template);
			const html = Mustache.render(template, { data });
			$("#displayEMIRecords").html(html);
			$("#modal-viewEMIBorrower").modal("show");
			$(".emiStatustrue").attr("disabled", "disabled");
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

function dealPartialClosedDeal() {
	$(".loading").show();

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/partiallyClosedDealsBasedOnPagination";
	} else {
		var getDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/partiallyClosedDealsBasedOnPagination";
	}
	var postData = {
		userId: suserId,
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: getDeals,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			totalEntries = data.count;

			if (data.lenderPaticipatedResponseDto.length == 0) {
				$(".notParticipated").show();
			} else {
				var template = document.getElementById("displayDealsScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderPaticipatedResponseDto,
				});
				$("#displayDealsData").html(html);

				$(".loading").hide();

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".dashBoardPagination")
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
							userId: suserId,
							pageNo: num,
							pageSize: "10",
						};
						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var getDeals =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/partiallyClosedDealsBasedOnPagination";
						} else {
							var getDeals =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/partiallyClosedDealsBasedOnPagination";
						}
						$.ajax({
							url: getDeals,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayDealsScript").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.lenderPaticipatedResponseDto,
								});
								$("#displayDealsData").html(html);
								$(".loading").hide();
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
	$(".loadingSec").hide();
}

const modalPayThtoughwallet = () => {
	$("#modal-validitydate-expired").modal("hide");
	$("#modal-approve-walletFeepayThrough").modal("show");
};

const payThroughwalletFunction = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userWallet = getCookie("walletBal");

	$(".approveuser-Btn").attr("disabled", true);

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	const postData = {
		userId,
		type: "Wallet",
		feeAmount: 5900,
	};

	const postDataString = JSON.stringify(postData);

	const paythroughwallet =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/deducting_fee_from_wallet"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/deducting_fee_from_wallet";

	$.ajax({
		url: paythroughwallet,
		type: "POST",
		data: postDataString,
		contentType: "application/json",
		dataType: "json",
		success: (data, textStatus, xhr) => {
			$("#modal-approve-walletFeepayThrough").modal("hide");
			$("#modal-paywallet-Suceess").modal("show");

			setTimeout(() => {
				window.location.reload();
			}, 4000);
		},
		statusCode: {
			400: function (jqXHR, textStatus, errorThrown) {
				var errorMessage = jqXHR.responseJSON.errorMessage;

				setTimeout(() => {
					$("#modal-success-unsubscribeNotification")
						.removeClass("modal-success")
						.addClass("modal-warning");
					$("#modal-success-unsubscribeNotification .modal-title").html("Oops");
					$("#modal-success-unsubscribeNotification .modal-body").html(
						errorMessage
					);
					$("#modal-approve-walletFeepayThrough").modal("hide");
					$("#modal-paywallet-Suceess").modal("hide");
					$("#modal-success-unsubscribeNotification").modal("show");
				}, 2000);
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("error");

			setTimeout(() => {
				$("#modal-success-unsubscribeNotification")
					.removeClass("modal-success")
					.addClass("modal-warning");
				$("#modal-success-unsubscribeNotification .modal-title").html("Oops");
				$("#modal-success-unsubscribeNotification .modal-body").html(
					arguments[0].responseJSON.errorMessage
				);
				$("#modal-approve-walletFeepayThrough").modal("hide");
				$("#modal-paywallet-Suceess").modal("hide");
				$("#modal-success-unsubscribeNotification").modal("show");
			}, 2000);
		},
		beforeSend: (xhr) => {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const payNewmembershipThroughwalletFunction = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userWallet = getCookie("walletBal");

	$(".newmembership_walletbtn").attr('disabled',true);

	let choosenmembership = $(".newmembership_walletbtn").attr("user-choosen");

	const membershipfiled = {
		MONTHLY: "1000",
		QUARTERLY: "2900",
		HALFYEARLY: "5600",
		PERYEAR: "9800",
		LIFETIME: "100000",
		FIVEYEARS: "50000",
		TENYEARS: "90000",
	};

	const calculatedfee =
		(parseInt(membershipfiled[choosenmembership]) * 118) / 100;

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	const postData = {
		userId,
		type: "Wallet",
		feeAmount: calculatedfee,
		lenderFeePayments: choosenmembership,
	};

	const postDataString = JSON.stringify(postData);

	const paythroughwallet =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/deducting_lender_fee_from_wallet"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/deducting_lender_fee_from_wallet";

	$.ajax({
		url: paythroughwallet,
		type: "POST",
		data: postDataString,
		contentType: "application/json",
		dataType: "json",
		success: (data, textStatus, xhr) => {
			$("#modal-approve-walletFeepayThrough").modal("hide");
			$("#modal-approve-newmembership").modal("hide");
			$("#modal-paywallet-Suceess").modal("show");

			setTimeout(() => {
				window.location.href = "idb";
				// window.location.reload();
			}, 4000);
		},
		statusCode: {
			400: function (jqXHR, textStatus, errorThrown) {
				var errorMessage = jqXHR.responseJSON.errorMessage;
				setTimeout(() => {
					$("#modal-success-unsubscribeNotification")
						.removeClass("modal-success")
						.addClass("modal-warning");
					$("#modal-success-unsubscribeNotification .modal-title").html("Oops");
					$("#modal-success-unsubscribeNotification .modal-body").html(
						errorMessage
					);
					$("#modal-approve-walletFeepayThrough").modal("hide");
					$("#modal-paywallet-Suceess").modal("hide");
					$("#modal-approve-newmembership").modal("hide");
					$("#modal-success-unsubscribeNotification").modal("show");
				}, 2000);
			},

			403: function (jqXHR, textStatus, errorThrown) {
				var errorMessage = jqXHR.responseJSON.errorMessage;
				console.log("error block");
				console.log(errorMessage);
			},
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("error");
				$(".newmembership_walletbtn").attr('disabled',false);

			if (arguments[0].responseJSON.errorCode == 124) {
				$("#modal-success-unsubscribeNotification")
					.removeClass("modal-success")
					.addClass("modal-warning");
				$("#modal-success-unsubscribeNotification .modal-title").html("Oops");
				$("#modal-success-unsubscribeNotification .modal-body").html(
					arguments[0].responseJSON.errorMessage
				);
				$("#modal-approve-walletFeepayThrough").modal("hide");
				$("#modal-paywallet-Suceess").modal("hide");
				console.log(arguments[0].responseJSON.errorMessage);
				$("#modal-approve-newmembership").modal("hide");
				$("#modal-success-unsubscribeNotification").modal("show");
			}

			setTimeout(() => {
				$("#modal-success-unsubscribeNotification")
					.removeClass("modal-success")
					.addClass("modal-warning");
				$("#modal-success-unsubscribeNotification .modal-title").html("Oops");
				$("#modal-success-unsubscribeNotification .modal-body").html(
					arguments[0].responseJSON.errorMessage
				);
				$("#modal-approve-walletFeepayThrough").modal("hide");
				$("#modal-paywallet-Suceess").modal("hide");
				$("#modal-approve-newmembership").modal("hide");
				$("#modal-success-unsubscribeNotification").modal("show");
			}, 1000);
		},
		beforeSend: (xhr) => {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

function usermembershipWalletTransactions() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var userValidityHistory =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/lender_fee_paid_type";
	} else {
		var userValidityHistory =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userId +
			"/lender_fee_paid_type";
	}


	var postData = {
		pageNo: 1,
		pageSize: 10,
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: userValidityHistory,
		type: "POST",
		contentType: "application/json",
		dataType: "json",
		data: postData,

		success: function (data, textStatus, xhr) {
			totalEntries = data.count;
			if (data.count == 0) {
				$("#displaywalletNoRecords").show();
			} else {
				var template = document.getElementById(
					"validitywallettransactiondetails"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.listOfTransactions,
				});
				$("#displayvaliditywallettrns").html(html);

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
							pageSize: 10,
						};

						
                            // "/fee_details_for_lender";
						var postData = JSON.stringify(postData);
						if (userisIn == "local") {
							var userValidityHistory =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								userId +
								"/lender_fee_paid_type";
						} else {
							var userValidityHistory =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								userId +
								"/lender_fee_paid_type";
						}

						$.ajax({
							url: userValidityHistory,
							type: "POST",
							contentType: "application/json",
							dataType: "json",
							data: postData,
							success: function (data, textStatus, xhr) {
								var template = document.getElementById(
									"validitywallettransactiondetails"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.listOfTransactions,
								});
								$("#displayvaliditywallettrns").html(html);
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

const getFincialData = (startdate, endDate) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	$(".financialLoading").show();
	$(".getfincalLoadData").addClass("loadOpacity");

	const getcurrentYear = $(".financialSectionSelect").val();
	$(".fy-year").html("FY " + getcurrentYear);

	const startDate =
		startdate != null && endDate != null
			? startdate
			: getcurrentYear === "22-23"
			? "2022-04-01"
			: "2021-04-01";
	const endDateFY =
		startdate != null && endDate != null
			? endDate
			: getcurrentYear === "22-23"
			? "2023-03-31"
			: "2022-03-31";

	const loadFinacialData =
		userisIn === "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/lender-income`
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/lender-income`;

	const postData = {
		startDate: startDate,
		endDate: endDateFY,
		inputType: "DOWNLOAD",
	};

	fetch(loadFinacialData, {
		method: "POST",
		body: JSON.stringify(postData),
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.totalInterestEarned == null || data.totalInterestEarned == "") {
				$(".earnedFinancial").html("0");
			} else {
				$(".earnedFinancial").html(data.totalInterestEarned);
			}
		})
		.catch((error) => {
			console.log("Error Something");
			$(".modal-body #text1").html(error.responseJSON.errorMessage);
			if (error.responseJSON.errorCode == 120) {
				$("#modal-alreadyDoneSendOffer").modal("show");
			}
		});

	setTimeout(() => {
		$(".financialLoading").hide();
		$(".getfincalLoadData").removeClass("loadOpacity");
	}, 2100);
};

const cancelquery = (ticketId) => {
	$("#modal-cancel-queryTicket").modal("show");
};

const cancelQueryRequest = () => {

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const cancelID = $(".calcelTicket").attr("calcel-Id");
	$(".cancel-query-btn").attr("disabled", true);

	const cancelUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/to-cancel-ticket"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/to-cancel-ticket";

	const postData = {
		id: cancelID,
		userId: suserId,
		status: "CANCELLED",
	};

	fetch(cancelUrl, {
		method: "PATCH",
		body: JSON.stringify(postData),
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			$("#modal-cancel-queryTicket").modal("hide");
			$("#modal-success-cancel-query").modal("show");

			setTimeout(() => {
				location.reload();
			}, 7000);
		})
		.catch((error) => {
			console.log("Error Something");
			$(".cancel-query-btn").attr("disabled", false);
		});
};

const withdrawRequestBox = (requestFrom, requestId) => {
	$("#modal-cancel-withdrawTicketRequest").modal("show");
	$(".cancel-withdraw-btn").attr("data-requestType", requestFrom);
	$(".cancel-withdraw-btn").attr("data-requestId", requestId);
};

const cancelWithdrawRequest = () => {
	
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let requestFrom = $(".cancel-withdraw-btn").attr("data-requestType");
	const requestId = $(".cancel-withdraw-btn").attr("data-requestId");

	requestFrom = requestFrom ? requestFrom : "WALLET";

	const cancelwithdrawUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/to-cancel-withdrawal-request"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/to-cancel-withdrawal-request";

	const postData = {
		id: requestId,
		userId: suserId,
		requestFrom: requestFrom,
	};

	fetch(cancelwithdrawUrl, {
		method: "PATCH",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: JSON.stringify(postData),
	})
		.then((response) => response.json())
		.then((data) => {
			$("#modal-cancel-withdrawTicketRequest").modal("hide");
			$("#modal-success-cancel-query .modal-body .text-message").html(
				"Your request was successfully cancelled."
			);
			$("#modal-success-cancel-query").modal("show");

			setTimeout(() => {
				location.reload();
			}, 7000);
		})
		.catch((error) => {
			console.log("Error Something");
			$(".cancel-query-btn").attr("disabled", false);
		});
};

const wallettowalletDebitHistory = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const wallettowalletUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  suserId +
			  "/wallet-to-wallet-debit-history"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  suserId +
			  "/wallet-to-wallet-debit-history";

	fetch(wallettowalletUrl, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.walletTransferLenderToLenderResponseDto.length === 0) {
				$("#displayNoRecords").show();
			} else {
				console.log(data);

				const template = document.getElementById(
					"loadlenderswithdrawfundslistTpl"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, {
					data: data.walletTransferLenderToLenderResponseDto,
				});
				$("#loadwithdrawfundslist").html(html);
			}
		})
		.catch((error) => {
			console.log("Error Something");
			if (error.responseJSON.errorCode == 114) {
				$("#updateReinvest-btn").hide();
			}
		});
};

const wallettowalletHistory = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const wallettowalletUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  suserId +
			  "/wallet_to_wallet_request_list"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  suserId +
			  "/wallet_to_wallet_request_list";

	fetch(wallettowalletUrl, {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			if (data.length === 0) {
				$("#displayNoRecords").show();
			} else {
				
               const newobj=data.map((data,index)=>{
			   	const newobjnew={...data};
                if (newobjnew.status=="ADMIN REJECTED"){
                	newobjnew["statusobj"]="ADMINREJECTED";
                }else if(newobjnew.status=="USER REJECTED"){
                   newobjnew["statusobj"]="USERREJECTED";
                }else if(newobjnew.status=="AUTO REJECTED"){
                   newobjnew["statusobj"]="AUTOREJECTED";
                }else{
                   newobjnew["statusobj"]=newobjnew.status;

                }
                return newobjnew;

			   })

				const template = document.getElementById(
					"loadlenderswithdrawfundslistTpl"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, {
					data: newobj,
				});
				$("#loadwithdrawfundslist").html(html);


				console.log(newobj);
			}

		})
		.catch((error) => {
			console.log("Error Something");
			$("#displayNoRecords").show();
			if (error.responseJSON.errorCode == 114) {
				$("#updateReinvest-btn").hide();
			}
		});
};

function cancelMyWithdrawWalletRequest(tableId) {

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var cancelMyWithdraw =
			"http://35.154.48.120:8080/oxynew/v1/user/wallet_to_wallet_request";
	} else {
		var cancelMyWithdraw =
			"https://fintech.oxyloans.com/oxyloans/v1/user/wallet_to_wallet_request";
	}

	var postData = {
		id: tableId,
		status: "REJECTED",
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: cancelMyWithdraw,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-wallet-request-approve").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

const myinterestInfoSearch = () => {
	
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const myinterestInfoUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/monthly_interest_earnings"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/monthly_interest_earnings";

	const sorttype = $(".wtosorttype").val();
	const sortbased = $(".wtosorybasedon").val();

	const startdateSearch = document.getElementById("walletStart").value;
	const endDateSearch = document.getElementById("walletSearnEnd").value;

	const postData = {
		userId: suserId,
		startDate: startdateSearch,
		endDate: endDateSearch,
		sortBasedOn: sortbased,
		sortingType: sorttype,
	};

	fetch(myinterestInfoUrl, {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: JSON.stringify(postData),
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.listOfInterestDetails.length === 0) {
				alert("No data Found");
			} else {
				$(".earnInterestAmountMYdeal").html(data.totalInterestEarned);
				const template = document.getElementById(
					"displayMyinterestScript"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, {
					data: data.listOfInterestDetails,
				});
				$("#displaymyinterestINfo").html(html);
			}
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

const myinterestInfo = () => {

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const myinterestInfoUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/monthly_interest_earnings"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/monthly_interest_earnings";

	const postData = {
		userId: suserId,
	};

	fetch(myinterestInfoUrl, {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
		body: JSON.stringify(postData),
	})
		.then((response) => response.json())
		.then((data) => {
			if (data.listOfInterestDetails.length === 0) {
				$("#norecordMyinterest").show();
			} else {
				$(".earnInterestAmountMYdeal").html(data.totalInterestEarned);
				const template = document.getElementById(
					"displayMyinterestScript"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, {
					data: data.listOfInterestDetails,
				});
				$("#displaymyinterestINfo").html(html);
			}
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

const searchApicall = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const searchCallApi =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  suserId +
			  "/runningDealsInfo"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  suserId +
			  "/runningDealsInfo";

	fetch(searchCallApi, {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			sessionStorage.setItem(
				"searchData",
				JSON.stringify(data.lenderPaticipatedResponseDto)
			);
			const obj = JSON.parse(sessionStorage.getItem("searchData"));
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

const listofEquityDeal = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const listofEquityDealtouser =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  suserId +
			  "/list_of_equity_deals_of_lender"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  suserId +
			  "/list_of_equity_deals_of_lender";

	fetch(listofEquityDealtouser, {
		method: "GET",
		headers: {
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			$(".equityAmount").html(data.totalAmountParticipatedInEquityDeals);
			if (data.listOfEquityInterestDetails.length === 0) {
				$(".dispalyEquitynoData").show();
			} else {
				$(".downloadEquity").attr("href", data.downloadUrl);
				const template = document.getElementById(
					"displayShoweqituDeals"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, {
					data: data.listOfEquityInterestDetails,
				});
				$("#knowdealParticipation").html(html);

				for (let i = 0; i < data.listOfEquityInterestDetails.length; i++) {
					$(".viewinterestdataId").each(function (index, value) {
						const dealId = $(this).attr("data-Id");
						console.log(dealId);
						if (data.listOfEquityInterestDetails[i].dealId === dealId) {
							const template = document.getElementById(
								"displayshowinterestequityInfoScript"
							).innerHTML;
							Mustache.parse(template);
							const html = Mustache.to_html(template, {
								data: data.listOfEquityInterestDetails[i]
									.listOfEquityInterestDetails,
							});
							$("#displayUserEquityInterestInfo-" + dealId).html(html);
						}
					});
				}
			}
		})
		.catch((error) => {
			console.log("Error Something");
		});
};

const showInterestEquity = (dealId) => {
	$(".solidToggle_" + dealId).slideToggle("slow");
	$(".viewinterestequitydataId-" + dealId).show();
	$(".showinterestofEqityInfo-" + dealId).show();
};

const isStudentOrNot = () => {
	const isStudent = getCookie("isStudentProfile");
	if (isStudent) {
		loadStudentRunningLoans();
	} else {
		loadborrowerRunningLoans();
	}
};

const loadStudentRunningLoans = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let studentRunningLoans;
	if (userisIn == "local") {
		studentRunningLoans = `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/BORROWER/search`;
	} else {
		studentRunningLoans = `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/BORROWER/search`;
	}

	var postData = {
		leftOperand: {
			fieldName: "borrowerUserId",
			fieldValue: suserId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			leftOperand: {
				fieldName: "loanStatus",
				fieldValue: "Active",
				operator: "EQUALS",
			},
			logicalOperator: "AND",
			rightOperand: {
				fieldName: "adminComments",
				fieldValue: "DISBURSED",
				operator: "EQUALS",
			},
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "id",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: studentRunningLoans,
		data: postData,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		success: function (data, textStatus, xhr) {
			console.log(data);
			if (data.results.length == 0) {
				$("#displayNoLoanRecords").show();
			} else {
				const template = document.getElementById(
					"loadLendersRunningloans"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, { data: data.results });
				$(`#viewrunningLoanLenders-${parentId}`).html(html);

				let displayPageNo = totalEntries / 10;
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
							leftOperand: {
								fieldName: "borrowerUserId",
								fieldValue: suserId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								leftOperand: {
									fieldName: "loanStatus",
									fieldValue: "Active",
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "adminComments",
									fieldValue: "DISBURSED",
									operator: "EQUALS",
								},
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "id",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);

						let studentRunningLoans;
						if (userisIn == "local") {
							studentRunningLoans = `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/BORROWER/search`;
						} else {
							studentRunningLoans = `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/BORROWER/search`;
						}

						$.ajax({
							url: studentRunningLoans,
							data: postData,
							dataType: "json",
							contentType: "application/json",
							type: "POST",
							success: function (data, textStatus, xhr) {
								const template = document.getElementById(
									"loadLendersRunningloans"
								).innerHTML;
								Mustache.parse(template);
								const html = Mustache.to_html(template, {
									data: data.results,
								});
								$(`#viewrunningLoanLenders-${parentId}`).html(html);
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
};

const loadStudentActiveLoan = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let studentRunningLoans;
	if (userisIn == "local") {
		studentRunningLoans = `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/BORROWER/search`;
	} else {
		studentRunningLoans = `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/BORROWER/search`;
	}

	var postData = {
		leftOperand: {
			fieldName: "borrowerUserId",
			fieldValue: suserId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "loanStatus",
			fieldValue: "Active",
			operator: "EQUALS",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "id",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);

	$.ajax({
		url: studentRunningLoans,
		data: postData,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		success: function (data, textStatus, xhr) {
			console.log(data);
			if (data.results.length == 0) {
				$("#displayNoLoanRecords").show();
			} else {
				const template = document.getElementById(
					"loadLendersRunningloans"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, { data: data.results });
				$(`#viewrunningLoanLenders-${parentId}`).html(html);

				let displayPageNo = totalEntries / 10;
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
							leftOperand: {
								fieldName: "borrowerUserId",
								fieldValue: suserId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "loanStatus",
								fieldValue: "Active",
								operator: "EQUALS",
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "id",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);

						let studentRunningLoans;
						if (userisIn == "local") {
							studentRunningLoans = `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/BORROWER/search`;
						} else {
							studentRunningLoans = `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/BORROWER/search`;
						}

						$.ajax({
							url: studentRunningLoans,
							data: postData,
							dataType: "json",
							contentType: "application/json",
							type: "POST",
							success: function (data, textStatus, xhr) {
								const template = document.getElementById(
									"loadLendersRunningloans"
								).innerHTML;
								Mustache.parse(template);
								const html = Mustache.to_html(template, { data: data.results });
								$(`#viewrunningLoanLenders-${parentId}`).html(html);
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
};

const loadStudentClosed = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let studentRunningLoans;
	if (userisIn == "local") {
		studentRunningLoans = `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/BORROWER/search`;
	} else {
		studentRunningLoans = `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/BORROWER/search`;
	}

	var postData = {
		leftOperand: {
			fieldName: "borrowerUserId",
			fieldValue: suserId,
			operator: "EQUALS",
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "loanStatus",
			fieldValue: "Closed",
			operator: "EQUALS",
		},
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "id",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: studentRunningLoans,
		data: postData,
		dataType: "json",
		contentType: "application/json",
		type: "POST",
		success: function (data, textStatus, xhr) {
			console.log(data);
			if (data.results.length == 0) {
				$("#displayNoLoanRecords").show();
			} else {
				const template = document.getElementById(
					"loadLendersRunningloans"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, { data: data.results });
				$(`#viewrunningLoanLenders-${parentId}`).html(html);

				let displayPageNo = totalEntries / 10;
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
							leftOperand: {
								fieldName: "borrowerUserId",
								fieldValue: suserId,
								operator: "EQUALS",
							},
							logicalOperator: "AND",
							rightOperand: {
								fieldName: "loanStatus",
								fieldValue: "Closed",
								operator: "EQUALS",
							},
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "id",
							sortOrder: "DESC",
						};

						var postData = JSON.stringify(postData);

						let studentRunningLoans;
						if (userisIn == "local") {
							studentRunningLoans = `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/loan/BORROWER/search`;
						} else {
							studentRunningLoans = `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/loan/BORROWER/search`;
						}

						$.ajax({
							url: studentRunningLoans,
							data: postData,
							dataType: "json",
							contentType: "application/json",
							type: "POST",
							success: function (data, textStatus, xhr) {
								const template = document.getElementById(
									"loadLendersRunningloans"
								).innerHTML;
								Mustache.parse(template);
								const html = Mustache.to_html(template, { data: data.results });
								$(`#viewrunningLoanLenders-${parentId}`).html(html);
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
};

const searchBorrowerdoc = (userType, borrowerid) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const apiUIrl =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/6/loan/ADMIN/request/search"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/6680/loan/ADMIN/request/search";

	var postData = {
		leftOperand: {
			fieldName: "userId",
			fieldValue: borrowerid,
			operator: "EQUALS",
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
					fieldName: "loanStatus",
					fieldValue: "Edit",
					operator: "EQUALS",
				},
			},
		},
	};

	$.ajax({
		url: apiUIrl,
		type: "POST",
		data: JSON.stringify(postData),
		contentType: "application/json",
		dataType: "json",
		success: (data, textStatus, xhr) => {
			console.log(data);

			for (let i = 0; i < data.results.length; i++) {
				for (let j = 0; j < data.results[i].borrowerKycDocuments.length; j++) {
					const docType =
						data.results[i].borrowerKycDocuments[j].documentSubType;
					$(".student_doc_block_main .show" + docType).attr(
						"style",
						"display:block"
					);

					$(".student_doc_block_main .show" + docType + " .btn").attr(
						"download",
						data.results[i].borrowerKycDocuments[j].downloadUrl
					);
					$(".student_doc_block_main .show" + docType + " .btn").attr(
						"href",
						data.results[i].borrowerKycDocuments[j].downloadUrl
					);
				}
			}
		},
		error: (xhr, textStatus, errorThrown) => {
			console.log("Error Something");
			alert("error");
		},
		beforeSend: (xhr) => {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const getFinicalYearReport = async () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userFinancial = "";

	if (userisIn === "local") {
		userFinancial = `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/financial_year_data`;
	} else {
		userFinancial = `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/financial_year_data`;
	}

	try {
		const response = await fetch(userFinancial, {
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
		});

		if (response.ok) {
			const data = await response.json();
			if (data.length === 0) {
				$("#nodataFinancial").show();
			} else {
				const template = document.getElementById(
					"scriptFinancialData"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, { data });
				$("#displayFinancialData").html(html);
			}
		} else {
			console.log("error");
		}
	} catch (error) {
		console.log("error");
		console.log(error);
	}
};

const holdAmountViewToLender = async () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let holdAmountUrl =
		userisIn == "local"
			? `http://35.154.48.120:8080/oxynew/v1/user/${suserId}/hold-amount-details `
			: `https://fintech.oxyloans.com/oxyloans/v1/user/${suserId}/hold-amount-details `;

	try {
		const response = await fetch(holdAmountUrl, {
			method: "GET",
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
		});

		if (response.ok) {
			const data = await response.json();
			console.log(data);

			let newArray = data.map((object, index) => {
				return { ...object, id: index + 1 };
			});

			newArray.forEach((obj) => {
				if (obj.comments.match(/\d{4}-\d{2}-\d{2}/)) {
					let dateMatch = "";
					let dateOnly = "";
					dateMatch = obj.comments.match(/\d{4}-\d{2}-\d{2}/);
					dateOnly = dateMatch ? dateMatch[0] : null;
					obj.comments = `INR ${obj.holdAmount} is paid on ${dateOnly} for the deal "${obj.holdAmountGivenDealName}"`;
				} else {
					obj.comments = `INR ${obj.holdAmount} is paid for the deal "${obj.holdAmountGivenDealName}"`;
				}

				if (obj.status == "OPEN") {
					obj.userHoldAmountMappedToDealRequestDto.map((data, index) => {
						data["textComment"] = `${
							data.amountType.charAt(0).toUpperCase() +
							data.amountType.slice(1)?.toLowerCase()
						} amount  ${data.holdAmount} will be deducted from deal "${
							data.holdAmountCollectedDealName
						}"`;
					});
				} else if (obj.status == "CLOSE") {
					obj.status = "CLOSED";
					obj.userHoldAmountMappedToDealRequestDto.map((data, index) => {
						data["textComment"] = `${
							data.amountType.charAt(0).toUpperCase() +
							data.amountType.slice(1)?.toLowerCase()
						} amount  ${data.holdAmount} is deducted from the  deal "${
							data.holdAmountCollectedDealName
						}"  on ${data.closedDate}.`;
					});
				} else {
					obj.userHoldAmountMappedToDealRequestDto.map((data, index) => {
						data["textComment"] = `${
							data.amountType.charAt(0).toUpperCase() +
							data.amountType.slice(1)?.toLowerCase()
						} amount  ${data.holdAmount} is deducted from the deal "${
							data.holdAmountCollectedDealName
						}"`;
					});
				}
			});

			if (data.length === 0) {
				$(".displayhideclosed").show();
			} else {
				const template = document.getElementById(
					"viewUserHoldRequest"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, { data: newArray });
				$("#displayUserHoldAmountRequest").html(html);
			}
		} else {
			return response.json().then((errorData) => {
				throw new Error(
					"Error: " + response.status + " - " + errorData.message
				);
			});
		}
	} catch (error) {
		console.log(error);
	}
};

const autoInvestmentSubmit = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const selctAutoInvestmentDeal = $("#selctAutoInvestmentDeal").val();
	const autoPrincipalType = $("#autoPrincipalType").val();

	const selctDealParticipationType = $("#autodealParticipationType").val();
	const autoRoiRange = $("#autoRoiRange").val();
	const splitRoi = autoRoiRange.split("-");

	console.log(splitRoi);

	// let isValid = true;
	// isValid = selctAutoInvestmentDeal == "" ? false : true;
	// isValid
	// 	? $(".autoInvestmentDealError").hide()
	// 	: $(".autoInvestmentDealError").show();

	const isValid =
		selctAutoInvestmentDeal !== "" &&
		autoPrincipalType !== "" &&
		selctDealParticipationType !== "" &&
		autoRoiRange !== "";

	let isselctAutoInvestmentDeal = selctAutoInvestmentDeal !== "";
	let isautoPrincipalType = autoPrincipalType !== "";
	let isselctDealParticipationType = selctDealParticipationType !== "";
	let isautoRoiRange = autoRoiRange !== "";

	$(".autoInvestmentDealError")[isselctAutoInvestmentDeal ? "hide" : "show"]();
	$(".autoInvestReturnError")[isautoPrincipalType ? "hide" : "show"]();
	$(".autoDealParticipationError")[
		isselctDealParticipationType ? "hide" : "show"
	]();
	$(".autoRoiRangeError")[isautoRoiRange ? "hide" : "show"]();

	const postData = {
		userId: suserId,
		dealType: selctAutoInvestmentDeal,
		principalReturningAccountType: "WALLET",
		roiStartingLimit: splitRoi[0],
		roiEndingLimit: splitRoi[1],
		dealParticipationtType: selctDealParticipationType,
	};

	const postDataJSON = JSON.stringify(postData);
	console.log(postDataJSON);

	const autoinvestUrl =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/saveautoinvestconfig"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/saveautoinvestconfig";

	if (isValid) {
		fetch(autoinvestUrl, {
			method: "PATCH",
			body: postDataJSON,
			headers: {
				"Content-Type": "application/json",
				accessToken: saccessToken,
			},
		})
			.then((response) => response.json())
			.then((data) => {
				$("#modal-autoinvestsuccess").modal("show");
				setTimeout(() => {
					window.location.reload();
				}, 2000);
			})
			.catch((error) => {
				console.log("error");
			});
	}

	return isValid;
};

const loadAutoHistory = () => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	const id = suserId;
	const primaryType = sprimaryType;
	const accessToken = saccessToken;

	const loadAutoHistory =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  id +
			  "/auto-lending-enable"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  id +
			  "/auto-lending-enable";

	$.ajax({
		url: loadAutoHistory,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.length === 0) {
				$(".noRecordHistory").show();
			} else {
				const autoInvestData = [data];
				const newGetData = autoInvestData.map((obj, index) => {
					const newObj = { ...obj };
					if (newObj.status == "ACTIVE") {
						newObj["so"] = index + 1;
						newObj["buttonsStatus"] = "Disable Auto investment";
						newObj["btncolor"] = "warning";
					} else {
						newObj["so"] = index + 1;
						newObj["buttonsStatus"] = "Enable Auto investment";
						newObj["btncolor"] = "success";
					}
					return newObj;
				});

				console.log(newGetData);

				const template = document.getElementById(
					"loadlendersAutoinvestListHistory"
				).innerHTML;
				Mustache.parse(template);
				const html = Mustache.to_html(template, {
					data: newGetData,
				});
				$("#loadlendersautoinvestList").html(html);
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
};

const disbaleAutoInvest = (id, status) => {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");





	const postData = {

	};

	let newStatus = "";

	if (status == "ACTIVE") {
		newStatus = "INACTIVE";
	} else if (status == "INACTIVE") {
		newStatus = "ACTIVE";
	}

	const postDataJSON = JSON.stringify(postData);

	const autoinvestUrldisable =
		userisIn === "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/" +
			  id +
			  "/" +
			  newStatus +
			  "/auto-lending-enable-or-disable"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/" +
			  id +
			  "/" +
			  newStatus +
			  "/auto-lending-enable-or-disable";

	fetch(autoinvestUrldisable, {
		method: "PATCH",
		body: postDataJSON,
		headers: {
			"Content-Type": "application/json",
			accessToken: saccessToken,
		},
	})
		.then((response) => response.json())
		.then((data) => {
			if (status == "ACTIVE") {
				$(".auto-invest-modal #text1").html(
					"You have successfully disabled auto investment."
				);
			} else if (status == "INACTIVE") {
				$(".auto-invest-modal #text1").html(
					"You have successfully enabled the auto investment."
				);
			}

			$("#modal-diableAvtoInvestment").modal("show");
			setTimeout(() => {
				window.location.reload();
			}, 2000);
		})
		.catch((error) => {
			console.log("error");
		});
};

function viewMyAutoInvestedDeals() {
	setTimeout(() => {
		$(".loadingSec").show();
	}, 500);

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var getAutoDeals =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			suserId +
			"/0/10/auto-lending";
	} else {
		var getAutoDeals =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/0/10/auto-lending";
	}

	$.ajax({
		url: getAutoDeals,
		type: "GET",
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);
			totalEntries = data.totalCount;
			if (data.lenderPaticipatedResponseDto.length == 0) {
				$(".notParticipated").show();
				setTimeout(() => {
					$(".loadingSec").hide();
				}, 1000);
			} else {
				var template = document.getElementById("displayDealsScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data.lenderPaticipatedResponseDto,
				});
				$("#displayDealsData").html(html);

				setTimeout(() => {
					$(".loadingSec").hide();
				}, 3000);

				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;

				$(".autoInvestedPagination")
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
						if (userisIn == "local") {
							var autoInvested =
								"http://35.154.48.120:8080/oxynew/v1/user/" +
								suserId +
								"/" +
								num +
								"/" +
								10 +
								"/auto-lending";
						} else {
							var autoInvested =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/" +
								num +
								"/" +
								10 +
								"/auto-lending";
						}
						$.ajax({
							url: autoInvested,
							type: "GET",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								var template =
									document.getElementById("displayDealsScript").innerHTML;
								Mustache.parse(template);
								var html = Mustache.to_html(template, {
									data: data.lenderPaticipatedResponseDto,
								});
								$("#displayDealsData").html(html);

								setTimeout(() => {
									$(".loadingSec").hide();
								}, 3000);
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
	$(".loadingSec").hide();
}

function closeTheDealStatus(dealId) {
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var closeDeal = apiBaseURLOXY + dealId + "/dealPaticipationStatusUpdation";
	} else {
		var closeDeal = apiBaseURLOXY + dealId + "/dealPaticipationStatusUpdation";
	}

	var postData = {
		statusType: "ACHIEVED",
	};

	var postData = JSON.stringify(postData);
	$.ajax({
		url: closeDeal,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log("deal is closed");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

const participationfeepayThroughwallet = (dealId, isNewLender) => {

	$("#feewalet-Btn").attr("disabled", true);
	$("#feePaymentGateway-Btn").attr("disabled", true);

	$(".loadingSec").show();
	const userId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userWallet = getCookie("walletBal");

	let membership = $("#membershipTenure").val();

	if (membership == null || membership == undefined || membership == "") {
		membership = "PERDEAL";
	}

	let feeamount = $(".feewalet-Btn").attr("data-fee");
	let lenderwalletbalance = $(".lenderWalletAmount").html();

	let isValid = true;
	feeamount = parseInt(feeamount);
	lenderwalletbalance = parseInt(lenderwalletbalance);

	if (feeamount > lenderwalletbalance) {
		$("#modal-approve-walletFeepayThroughparticipatedeal").modal("hide");
		window.scrollTo(100, 0);
		$(".showWalletError").html(
			"Your processing amount is greater than your wallet balance."
		);
		$(".showWalletError").show("slow");
		isValid = false;
	}

	const postData = {
		userId,
		type: "Wallet",
		feeAmount: feeamount,
		dealId,
		lenderFeePayments: membership,
	};

	const postDataString = JSON.stringify(postData);
	const paythroughwallet =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/deducting_lender_fee_from_wallet"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/deducting_lender_fee_from_wallet";
	if (isValid == true) {
		$.ajax({
			url: paythroughwallet,
			type: "POST",
			data: postDataString,
			contentType: "application/json",
			dataType: "json",
			success: (data, textStatus, xhr) => {
				writeCookie("deductWalletFee", true);

				if (isNewLender == "isNewLender") {
					$(".loadingSec").hide();
					$("#modal-approve-walletFeepayThroughparticipatedeal").modal("hide");
					$("#successfullypaidParticipated").modal("show");
					$("#feewalet-Btn").attr("disabled", false);
					$("#feePaymentGateway-Btn").attr("disabled", false);
				} else {
					loadParticipationSuccess();
				}
			},
			statusCode: {
				400: function (jqXHR, textStatus, errorThrown) {
					$("#feewalet-Btn").attr("disabled", false);
					$("#feePaymentGateway-Btn").attr("disabled", false);
					var errorMessage = jqXHR.responseJSON.errorMessage;

					setTimeout(() => {
						$("#modal-success-unsubscribeNotification")
							.removeClass("modal-success")
							.addClass("modal-warning");
						$("#modal-success-unsubscribeNotification .modal-title").html(
							"Oops"
						);
						$("#modal-success-unsubscribeNotification .modal-body").html(
							errorMessage
						);
						$("#modal-approve-walletFeepayThrough").modal("hide");
						$("#modal-paywallet-Suceess").modal("hide");
						$("#modal-success-unsubscribeNotification").modal("show");
					}, 2000);
				},
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("error");

				$("#feewalet-Btn").attr("disabled", false);
				$("#feePaymentGateway-Btn").attr("disabled", false);

				setTimeout(() => {
					$("#modal-success-unsubscribeNotification")
						.removeClass("modal-success")
						.addClass("modal-warning");
					$("#modal-success-unsubscribeNotification .modal-title").html("Oops");
					$("#modal-success-unsubscribeNotification .modal-body").html(
						arguments[0].responseJSON.errorMessage
					);
					$("#modal-approve-walletFeepayThrough").modal("hide");
					$("#modal-paywallet-Suceess").modal("hide");
					$("#modal-success-unsubscribeNotification").modal("show");
				}, 2000);
			},
			beforeSend: (xhr) => {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
};

const paymemberShipFeeOnParticipatedDeals = (dealId, feeamount) => {
	$(".paymembership_throughdeal").attr("deal-Id", dealId);
	$(".paymembership_throughdeal").attr("deal-fee", feeamount);
	$("#modal-pay-feeon-participating").modal("show");
};

const participationfeepaythroughParticipatedDeal = () => {
	const userId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userWallet = getCookie("walletBal");

	let dealId = $(".paymembership_throughdeal").attr("deal-Id");
	let feeamount = $(".paymembership_throughdeal").attr("deal-fee");
	let lenderwalletbalance = $(".lenderWalletAmount").html();

	let isValid = true;
	feeamount = parseInt(feeamount);
	lenderwalletbalance = parseInt(lenderwalletbalance);

	if (feeamount > lenderwalletbalance) {
		$("#modal-pay-feeon-participating").modal("hide");
		$("#modal-participateErrorMessage").modal("show");
		isValid = false;
	}

	feeamount = feeamount.toString();

	const postData = {
		userId,
		type: "Wallet",
		feeAmount: feeamount,
		dealId,
		lenderFeePayments: "PERDEAL",
	};

	const postDataString = JSON.stringify(postData);
	const paythroughwallet =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/deducting_lender_fee_from_wallet"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/deducting_lender_fee_from_wallet";
	if (isValid == true) {
		$.ajax({
			url: paythroughwallet,
			type: "POST",
			data: postDataString,
			contentType: "application/json",
			dataType: "json",
			success: (data, textStatus, xhr) => {
				$("#modal-pay-feeon-participating").modal("hide");
				$("#modal-participateErrorMessage").modal("hide");
				$(".modal-body .text-profileCheck").html(
					"You successfully Paid The Membership Fee"
				);
				$("#modal-paywallet-Suceess").modal("show");

				setTimeout(() => {
					location.reload();
				}, 3000);
			},
			statusCode: {
				400: function (jqXHR, textStatus, errorThrown) {
					var errorMessage = jqXHR.responseJSON.errorMessage;

					setTimeout(() => {
						$("#modal-success-unsubscribeNotification")
							.removeClass("modal-success")
							.addClass("modal-warning");
						$("#modal-success-unsubscribeNotification .modal-title").html(
							"Oops"
						);
						$("#modal-success-unsubscribeNotification .modal-body").html(
							errorMessage
						);
						$("#modal-approve-walletFeepayThrough").modal("hide");
						$("#modal-paywallet-Suceess").modal("hide");
						$("#modal-success-unsubscribeNotification").modal("show");
					}, 2000);
				},
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("error");

				setTimeout(() => {
					$("#modal-success-unsubscribeNotification")
						.removeClass("modal-success")
						.addClass("modal-warning");
					$("#modal-success-unsubscribeNotification .modal-title").html("Oops");
					$("#modal-success-unsubscribeNotification .modal-body").html(
						arguments[0].responseJSON.errorMessage
					);
					$("#modal-approve-walletFeepayThrough").modal("hide");
					$("#modal-paywallet-Suceess").modal("hide");
					$("#modal-success-unsubscribeNotification").modal("show");
				}, 2000);
			},
			beforeSend: (xhr) => {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
};

function fetchNewMembershipCashFreeThroughParticipated() {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	let dealId = $(".paymembership_throughdeal").attr("deal-Id");
	let feeamount = $(".paymembership_throughdeal").attr("deal-fee");

	var postData = {
		amount: feeamount,
		dealId: dealId,
		lenderFeePayments: "PERDEAL",
		paymentType: "AFTER",
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		var featchSaltDetails =
			"http://35.154.48.120:8080/oxynew/v1/user/" +
			userId +
			"/cashfree";
	} else {
		var featchSaltDetails =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" + userId + "/cashfree";
	}

	$.ajax({
		url: featchSaltDetails,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);

			if (userisIn == "prod") {
				$("#redirectForm").attr(
					"action",
					"https://www.cashfree.com/checkout/post/submit"
				);
			}

			$("#appId").val(data.appId);
			$("#orderId").val(data.orderId);
			$("#orderAmount").val(data.amount);
			$("#orderCurrency").val(data.orderCurrency);
			$("#orderNote").val(data.orderNote);
			$("#customerName").val(data.name);
			$("#customerEmail").val(data.email);
			$("#customerPhone").val(data.mobileNumber);
			$("#returnUrl").val(data.returnUrl);
			$("#notifyUrl").val(data.notifyUrl);
			$("#signature").val(data.signature);
			$("#redirectForm").submit();

			console.log("cash free");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function earningUnpaidBreakup(refereeId, dealId) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	if (userisIn == "local") {
		var unpaidUrl =
			"http://35.154.48.120:8080/oxynew/v1/user/referee-deals";
	} else {
		var unpaidUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/referee-deals";
	}

	var postData = {
		referrerUserId: userId,
		refereeUserId: refereeId,
		dealId: dealId,
	};
	var postData = JSON.stringify(postData);

	$.ajax({
		url: unpaidUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			console.log(data);
			if (data.length == 0) {
				$("#norecodeOfEarning").show();
				$("#modal-myearningunPaidStatement").modal("show");
			} else {
				var template = document.getElementById("earningunpadScript").innerHTML;
				Mustache.parse(template);
				var html = Mustache.to_html(template, {
					data: data,
				});
				$("#earningUnpaidStatementTable").html(html);
				$("#modal-myearningunPaidStatement").modal("show");
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

function checkValidityExpire() {
	$(".membershipError").show();
}

function calculateMembershipFee(feeTenure) {
	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const participationAmount = $("#myparticipation").val();
	const onepercentage = participationAmount * (1 / 100);

	let tenure = {
		MONTHLY: 1000,
		QUARTERLY: 2900,
		HALFYEARLY: 5600,
		PERYEAR: 9800,
		LIFETIME: 100000,
		FIVEYEARS: 50000,
		TENYEARS: 90000,
		PERDEAL: onepercentage,
	};
	const amount = tenure[feeTenure];
	let calculate = (amount * 118) / 100;
	writeCookie("processingFee", calculate);
	$(".membershipamount").html(calculate);
	$(".paymentAmount").show();
	$(".membershipError").hide();

	const dealId = $(
		"#modal-approve-chosenMembershipExpiredUser .fee_pay_expired"
	).attr("deal-Id");

	if (feeTenure != "PERDEAL") {
		$(".onePercentage_btn").hide();
		$(".existingpaywallet_btn").show();
		$(".fee_pay_expired").show();

		$("#modal-approve-chosenMembershipExpiredUser .fee_pay_expired").attr(
			"onclick",
			"fetchValidityExpireMembershipCashFree('" +
				suserId +
				"','" +
				calculate +
				"','" +
				dealId +
				"','" +
				true +
				"','" +
				"PERDEAL" +
				"','" +
				"BEFORE" +
				"')"
		);

		$("#modal-approve-chosenMembershipExpiredUser .existingpaywallet_btn").attr(
			"onclick",
			"participationfeepayThroughwalletexistingUser('" +
				suserId +
				"','" +
				dealId +
				"','" +
				calculate +
				"','" +
				feeTenure +
				"')"
		);
	} else {
		$(".existingpaywallet_btn").hide();
		$(".fee_pay_expired").hide();
		$(".onePercentage_btn").show();

		$("#modal-approve-chosenMembershipExpiredUser .onePercentage_btn").attr(
			"onclick",
			"pDealonlyNewLneder('" + "ISNewLender" + "','" + dealId + "')"
		);
	}
}

const participationfeepayThroughwalletexistingUser = (userid,dealId,calculate,feeTenure) => {
	
	const userId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");
	const userWallet = getCookie("walletBal");
	const participationAmount = $("#myparticipation").val();
	const totalAmount = parseInt(participationAmount) + parseInt(calculate);

	$("#fee_pay_expired").attr("disabled", true);
	$("#onePercentage_btn").attr("disabled", true);
	$("#existingpaywallet_btn").attr("disabled", true);

	let membership = feeTenure;

	if (membership == null || membership == undefined || membership == "") {
		membership = "PERDEAL";
	}

	let feeamount = calculate;
	let lenderwalletbalance = $(".lenderWalletAmount").html();

	let isValid = true;

	feeamount = parseInt(feeamount);
	lenderwalletbalance = parseInt(lenderwalletbalance);

	if (feeamount > lenderwalletbalance) {
		$("#modal-approve-walletFeepayThroughparticipatedeal").modal("hide");
		$("#modal-approve-chosenMembershipExpiredUser").modal("hide");

		window.scrollTo(100, 0);
		$(".showWalletError").html(
			"Your processing amount is greater than your wallet balance."
		);
		$(".showWalletError").show("slow");
		isValid = false;
	}

	if (totalAmount > lenderwalletbalance) {
		$("#modal-approve-walletFeepayThroughparticipatedeal").modal("hide");
		$("#modal-approve-chosenMembershipExpiredUser").modal("hide");
		window.scrollTo(100, 0);
		$(".showWalletError").html(
			"Your wallet balance is insufficient to cover the processing fee and investment amount"
		);
		$(".showWalletError").show("slow");
		isValid = false;
	}

	const postData = {
		userId,
		type: "Wallet",
		feeAmount: feeamount,
		dealId,
		lenderFeePayments: membership,
	};

	const postDataString = JSON.stringify(postData);
	const paythroughwallet =
		userisIn == "local"
			? "http://35.154.48.120:8080/oxynew/v1/user/deducting_lender_fee_from_wallet"
			: "https://fintech.oxyloans.com/oxyloans/v1/user/deducting_lender_fee_from_wallet";
	if (isValid == true) {
		$.ajax({
			url: paythroughwallet,
			type: "POST",
			data: postDataString,
			contentType: "application/json",
			dataType: "json",
			success: (data, textStatus, xhr) => {
				writeCookie("deductWalletFee", true);
				loadParticipationSuccess();
			},
			statusCode: {
				400: function (jqXHR, textStatus, errorThrown) {
					$("#fee_pay_expired").attr("disabled", false);
					$("#onePercentage_btn").attr("disabled", false);
					$("#existingpaywallet_btn").attr("disabled", false);
					$("#modal-approve-chosenMembershipExpiredUser").modal("hide");
					var errorMessage = jqXHR.responseJSON.errorMessage;

					setTimeout(() => {
						$("#modal-success-unsubscribeNotification")
							.removeClass("modal-success")
							.addClass("modal-warning");
						$("#modal-success-unsubscribeNotification .modal-title").html(
							"Oops"
						);
						$("#modal-success-unsubscribeNotification .modal-body").html(
							errorMessage
						);
						$("#modal-approve-walletFeepayThrough").modal("hide");
						$("#modal-paywallet-Suceess").modal("hide");
						$("#modal-success-unsubscribeNotification").modal("show");
					}, 2000);
				},
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("error");
				$("#modal-approve-chosenMembershipExpiredUser").modal("hide");
				$("#fee_pay_expired").attr("disabled", false);
				$("#onePercentage_btn").attr("disabled", false);
				$("#existingpaywallet_btn").attr("disabled", false);

				setTimeout(() => {
					$("#modal-success-unsubscribeNotification")
						.removeClass("modal-success")
						.addClass("modal-warning");
					$("#modal-success-unsubscribeNotification .modal-title").html("Oops");
					$("#modal-success-unsubscribeNotification .modal-body").html(
						arguments[0].responseJSON.errorMessage
					);
					$("#modal-approve-walletFeepayThrough").modal("hide");
					$("#modal-paywallet-Suceess").modal("hide");
					$("#modal-success-unsubscribeNotification").modal("show");
				}, 2000);
			},
			beforeSend: (xhr) => {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	}
	return isValid;
};

function numOnly(id) {
	var element = document.getElementById(id);
	var regex = /^\d{12}$/;
	if (regex.test(element.value)) {
		element.value = element.value.slice(0, 12);
		$(".adharnumbererror").hide();
	} else {
		if (element.value.length > 12) {
			element.value = element.value.slice(0, 12);
			$(".adharnumbererror").hide();
		} else {
			$(".adharnumbererror").html("Invalid Aadhaar Number: Please enter a 12-digit Aadhaar number.");
			$(".adharnumbererror").show();
		}
	}
};


function referralEarningMonthWise(passingdate) {


	$("#displayReferalEarningTable").append('<div class="loader"></div>');
	$("#displayReferalEarningTable").addClass("lildark");

	const suserId = getCookie("sUserId");
	const sprimaryType = getCookie("sUserType");
	const saccessToken = getCookie("saccessToken");

	let userId = suserId;
	let primaryType = sprimaryType;
	let accessToken = saccessToken;

	    const searchmonth=$("#referralEarnigMonth").val();
        const searchyear =$("#referalEarningYear").val();

const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

	const date = new Date();
	const day = date.getDate();
	const month = date.getMonth() + 1;
	const year = date.getFullYear();

   	const currentDate= day < 10 ? `0${day}` : day;
	 const currentMonth= month < 10 ? `0${month}` : month;

	if (userisIn == "local") {
		var getborrowers =
			"http://35.154.48.120:8080/oxynew/v1/user/displayMonthlyReferrersAmount";
	} else {
		var getborrowers =
			"https://fintech.oxyloans.com/oxyloans/v1/user/displayMonthlyReferrersAmount";
	}

    if(passingdate!="search"){
    	var postData = {
		pageNo: 1,
		pageSize: 10,
		userId: suserId,
		month: currentMonth,
        year:year

	};

    }else{

    	var postData = {
		pageNo: 1,
		pageSize: 10,
		userId: suserId,
		month:searchmonth,
        year:searchyear

	};

    }

	

	var postData = JSON.stringify(postData);

	$.ajax({
		url: getborrowers,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
            console.log(data);

			 let totalEntries = data.lenderReferenceAmountResponse.length;
			 if (totalEntries == 0 || totalEntries == null) {


			 	$(".referalEarningMonth").html(monthNames[parseInt(searchmonth)-1]);
                 $(".monthErningPaidAmount").html(data.sumOfEarnedAmount);



				$("#displayReferalEarningTable").html("");
                  $('#displayReferalEarningTable').append("<tr><td>No data found</td></tr>");
				  $("#noRecordFound").show();
				 setTimeout(()=>{
		          $("#displayReferalEarningTable").removeClass("lildark");
				  $("#displayReferalEarningTable .loader").remove();
                  },2000);

			    } else {



                 if(passingdate=="search"){

                   $(".referalEarningMonth").html(monthNames[parseInt(searchmonth)-1]);
                   $(".monthErningPaidAmount").html(data.sumOfEarnedAmount);

                  }else{
                  	   $(".monthErningPaidAmount").html(data.sumOfEarnedAmount);
                  }


				var template = document.getElementById(
					"referalEarningMonthWiseScript"
				).innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, {
					data: data.lenderReferenceAmountResponse,
				});
               $("#displayReferalEarningTable").html(html);


				var templatesub = document.getElementById(
					"monthwiseEarningSubScript"
				).innerHTML;
				Mustache.parse(template);
				var subhtml = Mustache.render(templatesub, data);
				var subhtml = Mustache.to_html(templatesub, {
					data: data.lenderReferralsResponse,
				});

				$("#lenderpaymentinfosubamount").html(subhtml);



				 setTimeout(()=>{
		           $("#displayReferalEarningTable").removeClass("lildark");
				  $("#displayReferalEarningTable .loader").remove();
                  },2000)

				
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
							userId: suserId,
							month: currentMonth,
                            year:year
						};

						var postData = JSON.stringify(postData);

						if (userisIn == "local") {
							var getborrowers =
								"http://35.154.48.120:8080/oxynew/v1/user/displayMonthlyReferrersAmount";
						} else {
							var getborrowers =
								"https://fintech.oxyloans.com/oxyloans/v1/user/displayMonthlyReferrersAmount";
						}
						$.ajax({
							url: getborrowers,
							type: "POST",
							data: postData,
							contentType: "application/json",
							dataType: "json",
							success: function (data, textStatus, xhr) {
								$("#noRecordFound").hide();
								var template = document.getElementById(
									"referalEarningMonthWiseScript"
								).innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, {
									data: data.lenderReferenceAmountResponse,
								});
								$("#displayReferalEarningTable").html(html);
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


				    setTimeout(()=>{
		         $("#displayReferalEarningTable").removeClass("lildark");
				$("#displayReferalEarningTable .loader").remove();
                  },2500)
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});

}


const myreferalMonthWiseBreakUp=()=>{
	$("#modal-viewPaymentstatus-subpayment-referral").modal("show");
}

//****************pay lender fee *****************************

//****************pay lender fee  end*****************************

function writeCookie(name, value, days) {
	var date, expires;

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
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("primaryType");
	saccessToken = getCookie("accessToken");

	if (suserId == "") {
		window.location = "userlogin";
		return false;
	} else {
		return true;
	}
}
