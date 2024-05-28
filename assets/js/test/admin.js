let userisIn = "local";

$(document).ready(function () {
	//$(".viewPan").colorbox();
	// $(".viewaadhar").colorbox({rel:'viewaadhar'});
	// $(".viewpassport"s).colorbox({rel:'viewpassport'});

	console.log(userisIn);
	viewEMICARD();

	$(".deleteSession").click(function () {
		signout();
	});

	$(".sendActivationLink").click(function () {});

	$(".btn-submitFeeinfo").click(function () {
		var loanIDis = $(".loandId").val();
		var userType = $(".userType").val();
		var amount = $(".enteredFeeValue").val();

		if (userisIn == "local") {
			//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
			var adminUrl =
				"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/" +
				loanIDis +
				"/feepaid?primaryType=" +
				userType;
		} else {
			// https://fintech.oxyloans.com/oxyloans/
			var adminUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/loan/" +
				loanIDis +
				"/feepaid?primaryType=" +
				userType;
		}

		//var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+loanIDis+"/feepaid?primaryType="+userType;
		var postData = { feePaid: amount };
		var postData = JSON.stringify(postData);
		console.log(postData);

		$.ajax({
			url: adminUrl,
			type: "POST",
			data: postData,
			contentType: "application/json",
			dataType: "json",
			success: function (data, textStatus, xhr) {
				$("#modal-feeStatus").modal("show");
			},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", saccessToken);
			},
		});
	});

	setTimeout(function () {
		$(".downloadAgreeent").click(function () {
			suserId = getCookie("sUserId");
			sprimaryType = getCookie("sUserType");
			saccessToken = getCookie("saccessToken");

			userId = suserId;
			//console.log(suserId);
			primaryType = sprimaryType;
			accessToken = saccessToken;
			var requestID = $(this).attr("data-reqid");
			//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/ADMIN/request/"+requestID+"/download";
			//alert(getStatUrl);

			if (userisIn == "local") {
				//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
				var getStatUrl =
					"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
					userId +
					"/loan/ADMIN/request/" +
					requestID +
					"/download";
			} else {
				// https://fintech.oxyloans.com/oxyloans/
				var getStatUrl =
					"https://fintech.oxyloans.com/oxyloans/v1/user/" +
					userId +
					"/loan/ADMIN/request/" +
					requestID +
					"/download";
			}

			$.ajax({
				url: getStatUrl,
				type: "GET",
				success: function (data, textStatus, xhr) {
					window.open(data.downloadUrl, "_blank");
					$("#modal-agreement").modal("show");
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error Something");
				},
				beforeSend: function (xhr) {
					xhr.setRequestHeader("accessToken", accessToken);
				},
			});
		});
	}, 1000);

	//*********     LENDER/BORROWER LOAN APPLICATION SEARCH STARTS **********//
	$("#lenderSearch, #borrowerSearch").on("change", function () {
		if ($("#lenderSearch,#borrowerSearch").val() == "name") {
			$(".name").show();
			$(".id,.roi,.amount,.oxyscore").hide();
		} else if ($("#lenderSearch, #borrowerSearch").val() == "id") {
			$(".name,.roi,.amount,.oxyscore").hide();

			$(".id").show();
		} else if ($("#lenderSearch,#borrowerSearch").val() == "amount") {
			$(".name,.roi,.id,.oxyscore").hide();

			$(".amount").show();
		} else if ($("#lenderSearch,#borrowerSearch").val() == "roi") {
			$(".name,.roi,.amount,.oxyscore").hide();

			$(".roi").show();
		} else if ($("#lenderSearch,#borrowerSearch").val() == "oxyscore") {
			$(".name,.roi,.amount,.id").hide();
			$(".oxyscore").show();
		} else if ($("#lenderSearch").val() == "mobileNumber") {
			$(".mobileNumber").show();
			$(".name,.roi,.amount,.id").hide();
		} else {
			$(".name,.roi,.amount,.id,.oxyscore").hide();
		}
	});
	//*********     LENDER/BORROWER LOAN APPLICATION SEARCH ENDS  **********//

	//*********     RUNNING/CLOSED LOANS  SEARCH STARTS **********//

	$("#Search").on("change", function () {
		if ($("#Search").val() == "loanID") {
			$(".loanid").show();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".amount").hide();
			$(".city").hide();
			$(".mobileNumber").hide();
		} else if ($("#Search").val() == "appID") {
			$(".applicationid").show();
			$(".loanid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".amount").hide();
			$(".city").hide();
			$(".mobileNumber").hide();
		} else if ($("#Search").val() == "lenderID") {
			$(".lenderid").show();
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".amount").hide();
			$(".city").hide();
			$(".mobileNumber").hide();
		} else if ($("#Search").val() == "borrowerID") {
			$(".borrowerid").show();
			$(".city").hide();
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".roi").hide();
			$(".amount").hide();
			$(".mobileNumber").hide();
		} else if ($("#Search").val() == "roi") {
			$(".roi").show();
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".amount").hide();
			$(".city").hide();
			$(".mobileNumber").hide();
		} else if ($("#Search").val() == "amount") {
			$(".amount").show();
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".city").hide();
		} else if ($("#Search").val() == "city") {
			$(".city").show();
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".amount").hide();
			$(".mobileNumber").hide();
		} else if ($("#Search").val() == "mobileNumber") {
			$(".mobileNumber").show();
			$(".city").hide();
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".amount").hide();
		} else if ($("#Search").val() == "userName") {
			$(".userName").show();
			$(".mobileNumber").hide();
			$(".city").hide();
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".amount").hide();
		} else if ($("#Search").val() == "city") {
			$(".city").show();
			$(".userName").hide();
			$(".mobileNumber").hide();
			$(".city").hide();
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".amount").hide();
		} else {
			$(".loanid").hide();
			$(".applicationid").hide();
			$(".lenderid").hide();
			$(".borrowerid").hide();
			$(".roi").hide();
			$(".amount").hide();
			$(".city").hide();
			$(".mobileNumber").hide();
		}
	});

	//*********     RUNNING/CLOSED LOANS  SEARCH ENDS **********//
});

// ***************** DASHBOARD DATA*****************///

function loadadminDashbord() {
	//alert(1);
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	id = suserId;
	primaryType = sprimaryType;
	accessToken = saccessToken;

	//var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/dashboard/"+primaryType+"?current=false";

	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var adminUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			id +
			"/dashboard/" +
			primaryType +
			"?current=false";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var adminUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			id +
			"/dashboard/" +
			primaryType +
			"?current=false";
	}

	$.ajax({
		url: adminUrl,
		type: "GET",
		success: function (data, textStatus, xhr) {
			$(".registeredusers").html(data.registeredUsersCount);
			$(".totalLenders").html(data.lendersCount);
			$(".totalBorrowers").html(data.borrowersCount);
			$(".todaysUsers").html(data.todayRegisteredUsersCount);
			$(".totalborrowersRequestedAmount").html(data.borrowersRequestedAmount);
			$(".totallendersCommitedAmount").html(data.lendersCommitedAmount);
			$(".toatalAgreements").html(data.noOfAggrements);
			$(".totalConversationStage").html(data.noOfConversationRequests);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

//***************** DASHBOARD DATA ENDS*****************//

///**************** Latest loan Agreements************//

function loadadminLatestloanAgreements() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	id = suserId;
	primaryType = sprimaryType;
	accessToken = saccessToken;
	var postData = {
		leftOperand: {
			leftOperand: {
				fieldName: "lenderFeePaid",
				fieldValue: "false",
				operator: "EQUALS",
			},
			logicalOperator: "OR",
			rightOperand: {
				fieldName: "borrowerFeePaid",
				fieldValue: "false",
				operator: "EQUALS",
			},
		},
		logicalOperator: "AND",
		rightOperand: {
			fieldName: "loanStatus",
			fieldValues: ["Active"],
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
	//var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";
	console.log(postData);

	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var adminUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			id +
			"/loan/" +
			primaryType +
			"/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var adminUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			id +
			"/loan/" +
			primaryType +
			"/search";
	}

	$.ajax({
		url: adminUrl,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			var template = document.getElementById("adminuserstatus").innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data.results });
			$("#displaylists").html(html);
			var displayPageNo = data.totalCount / 3;
			displayPageNo = displayPageNo + 1;
			$(".latestloanAgreementsPagination")
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
								fieldName: "lenderFeePaid",
								fieldValue: "false",
								operator: "EQUALS",
							},
							logicalOperator: "OR",
							rightOperand: {
								fieldName: "borrowerFeePaid",
								fieldValue: "false",
								operator: "EQUALS",
							},
						},
						logicalOperator: "AND",
						rightOperand: {
							fieldName: "loanStatus",
							fieldValues: ["Active"],
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

					//var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+id+"/loan/"+primaryType+"/search";

					if (userisIn == "local") {
						//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
						var adminUrl =
							"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
							id +
							"/loan/" +
							primaryType +
							"/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var adminUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							id +
							"/loan/" +
							primaryType +
							"/search";
					}
					$.ajax({
						url: adminUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template =
								document.getElementById("adminuserstatus").innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, { data: data.results });
							$("#displaylists").html(html);
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

///**************** Latest loan Agreements ENDS************//

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
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("primaryType");
	saccessToken = getCookie("accessToken");
	return suserId, sprimaryType, saccessToken;
	if (suserId == "") {
		window.location = "userlogin";
	}
}

function feePaidClick(id, userType) {
	// Modal BoxOpen
	// Input with submit Button
	// On Submit  send the ajax call
	var loanId = id;
	var primaryType = userType;
	var amount = $(".enteredFeeValue").val();
	$("#modal-feePaid").modal("show");
	$(".loandId").val(loanId);
	$(".userType").val(primaryType);
	responsepaidinfo(loanId, primaryType, amount);
}

function responsepaidinfo(loanId, primaryType, amount) {
	//Are you sure?
	//var adminUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+loanId+"/feepaid?primaryType="+primaryType;

	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var adminUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/" +
			loanId +
			"/feepaid?primaryType=" +
			primaryType;
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var adminUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/loan/" +
			loanId +
			"/feepaid?primaryType=" +
			primaryType;
	}

	$.ajax({
		url: adminUrl,
		type: "POST",
		success: function (data, textStatus, xhr) {
			// alert(1);
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function loadLendersApplications() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	// var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";

	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getLenders =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getLenders =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	}

	var postData = {
		leftOperand: {
			fieldName: "userPrimaryType",
			fieldValue: "LENDER",
			operator: "EQUALS",
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
		sortBy: "loanRequestedDate",
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
			// console.log(totalEntries);
			var template = document.getElementById("loadLendersListTpl").innerHTML;
			//console.log(template);
			Mustache.parse(template);
			//alert(template);
			//var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });
			$("#loadLendersList").html(html);
			bindCommentsClick();

			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;
			/*888888888888888*/
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

					var postData = {
						leftOperand: {
							fieldName: "userPrimaryType",
							fieldValue: "LENDER",
							operator: "EQUALS",
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
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};

					//var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
					var postData = JSON.stringify(postData);
					console.log(postData);
					if (userisIn == "local") {
						//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
						var getLenders =
							"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
							"/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getLenders =
							" https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
							"/request/search";
					}
					//var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
					$.ajax({
						url: getLenders,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template =
								document.getElementById("loadLendersListTpl").innerHTML;
							//console.log(template);
							Mustache.parse(template);
							//var html = Mustache.render(template, data);
							var html = Mustache.to_html(template, { data: data.results });

							//alert(html);
							$("#loadLendersList").html(html);
							bindCommentsClick();
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

function loadBorrowerApplications() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	//var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getLenders =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getLenders =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/" +
			sprimaryType +
			"/request/search";
	}
	var postData = {
		leftOperand: {
			fieldName: "userPrimaryType",
			fieldValue: "BORROWER",
			operator: "EQUALS",
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
			// console.log(totalEntries);
			var template = document.getElementById("loadBorrowersListTpl").innerHTML;
			//console.log(template);
			Mustache.parse(template);
			//alert(template);
			//var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });
			$("#loadBorrowersList").html(html);
			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;
			//$(".viewPan").colorbox();
			bindCommentsClick();

			/*888888888888888*/
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

					var postData = {
						leftOperand: {
							fieldName: "userPrimaryType",
							fieldValue: "BORROWER",
							operator: "EQUALS",
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
						sortBy: "loanRequestedDate",
						sortOrder: "DESC",
					};

					//$(".viewPan").colorbox();
					//var postData = {"fieldName":"userPrimaryType","fieldValue": fieldValueforSearch,"operator":"EQUALS", "page":{"pageNo" : num,"pageSize" : 3}};
					var postData = JSON.stringify(postData);
					console.log(postData);
					if (userisIn == "local") {
						//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
						var getLenders =
							"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
							"/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getLenders =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/" +
							sprimaryType +
							"/request/search";
					}
					// var getLenders = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/"+sprimaryType+"/request/search";
					$.ajax({
						url: getLenders,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template = document.getElementById(
								"loadBorrowersListTpl"
							).innerHTML;
							//console.log(template);
							Mustache.parse(template);
							//var html = Mustache.render(template, data);
							var html = Mustache.to_html(template, { data: data.results });

							//alert(html);
							$("#loadBorrowersList").html(html);
							bindCommentsClick();
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

function loadLoans(recordsType) {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	//alert(recordsType);

	var postData = {
		fieldName: "loanStatus",
		fieldValue: recordsType,
		operator: "EQUALS",
		page: {
			pageNo: 1,
			pageSize: 10,
		},
		sortBy: "loanId",
		sortOrder: "DESC",
	};

	var postData = JSON.stringify(postData);
	console.log(postData);

	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var actOnLoan =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var actOnLoan =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
	}

	// var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
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
				var template = document.getElementById("displayRecordsTpl").innerHTML;
				Mustache.parse(template);
				var html = Mustache.render(template, data);
				var html = Mustache.to_html(template, { data: data.results });

				$("#displayRecords").html(html);
				var displayPageNo = totalEntries / 10;
				displayPageNo = displayPageNo + 1;
				$(".runningLoansPagination")
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
							fieldName: "loanStatus",
							fieldValue: recordsType,
							operator: "EQUALS",
							page: {
								pageNo: num,
								pageSize: 10,
							},
							sortBy: "loanId",
							sortOrder: "DESC",
						};

						//viewEMICARD()
						var postData = JSON.stringify(postData);
						console.log(postData);
						//var actOnLoan = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
						if (userisIn == "local") {
							//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
							var actOnLoan =
								"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
								suserId +
								"/loan/ADMIN/search";
						} else {
							// https://fintech.oxyloans.com/oxyloans/
							var actOnLoan =
								"https://fintech.oxyloans.com/oxyloans/v1/user/" +
								suserId +
								"/loan/ADMIN/search";
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
									document.getElementById("displayRecordsTpl").innerHTML;
								Mustache.parse(template);
								var html = Mustache.render(template, data);
								var html = Mustache.to_html(template, { data: data.results });

								$("#displayRecords").html(html);
								viewEMICARD();
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

function bindCommentsClick() {
	$(".updateComments").click(function () {
		$("#modal-comments").modal("show");
		var laonID = $(this).attr("data-loanid");
		var currComment = $(".updateComments-" + laonID).html();
		$(".adminComment").val(currComment);
		$(".saveCommentBtn").attr("data-clickedid", laonID);
	});
}

function postComment() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	var getUpdatedComment = $(".adminComment").val();
	var getLoanId = $(".saveCommentBtn").attr("data-clickedid");
	var hereisUpdatedComment = $(".adminComment").val();

	//var updateCommentUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/"+getLoanId+"/comment";
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var updateCommentUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/request/" +
			getLoanId +
			"/comment";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var updateCommentUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/request/" +
			getLoanId +
			"/comment";
	}
	var postData = { comments: hereisUpdatedComment };

	var postData = JSON.stringify(postData);

	$.ajax({
		url: updateCommentUrl,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			//
			// console.log("------- "+getLoanId+" "+hereisUpdatedComment);
			$(".updateComments-" + getLoanId).html(hereisUpdatedComment);
			$("#modal-commentSuccesss").modal("show");
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

function postOxyscore() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	//var getUpdatedOxyscore= $(".userOxyScore").val();
	var getuserID = $(".postOxyscore").attr("data-clickedid");
	var hereisUpdatedOxyscore = $(".userOxyScore").val();

	console.log(hereisUpdatedOxyscore);
	console.log(getuserID);
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var updateOxyscoreUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			getuserID +
			"/oxyscore";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var updateOxyscoreUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			getuserID +
			"/oxyscore";
	}

	//var updateOxyscoreUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+getuserID+"/oxyscore";

	var postData = { oxyScore: hereisUpdatedOxyscore };

	var postData = JSON.stringify(postData);

	$.ajax({
		url: updateOxyscoreUrl,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			$("#modal-oxyscoreSuccesss").modal("show");
		},

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
		saccessToken = getCookie("saccessToken");
		var getLoanId = $(this).attr("data-loanid");
		if (userisIn == "local") {
			var updateEmiUrlCard =
				"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
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

function viewDoc(userID, doctype) {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	var doctype = doctype;

	if (userisIn == "local") {
		var getPAN =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			userID +
			"/download/" +
			doctype;
	} else {
		var getPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userID +
			"/download/" +
			doctype;
	}
	$.ajax({
		url: getPAN,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				console.log(data.downloadUrl);
				window.open(data.downloadUrl, "_blank");
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

function updatingEMI(loanid, emino) {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	var getLoanId = loanid;
	var emiNo = emino;
	//var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/emipaid";
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var updateEmiUrlCard =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/" +
			getLoanId +
			"/" +
			emiNo +
			"/emipaid";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var updateEmiUrlCard =
			"https://fintech.oxyloans.com/oxyloans/v1/user/loan/" +
			getLoanId +
			"/" +
			emiNo +
			"/emipaid";
	}
	var postData = { comments: "" };
	var postData = JSON.stringify(postData);

	$.ajax({
		url: updateEmiUrlCard,
		type: "POST",
		contentType: "application/json",
		dataType: "json",
		data: postData,
		success: function (data, textStatus, xhr) {
			// $("#modal-viewEMI").modal("hide");
			//$("#modal-updataedEMI").modal("show");
		},
		statusCode: {
			400: function (response) {
				//$("#modal-agreement-already").modal("show");
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

function updateEMIStatus(loanid, emino) {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	var getLoanId = loanid;
	var emiNo = emino;
	//var updateEmiUrlCard = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/"+getLoanId+"/"+emiNo+"/eminotreceived";
	// var postData =  {"comments": ""};
	// var postData = JSON.stringify(postData);
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var updateEmiUrlCard =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/" +
			getLoanId +
			"/" +
			emiNo +
			"/eminotreceived";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var updateEmiUrlCard =
			"https://fintech.oxyloans.com/oxyloans/v1/user/loan/" +
			getLoanId +
			"/" +
			emiNo +
			"/eminotreceived";
	}
	$.ajax({
		url: updateEmiUrlCard,
		type: "PATCH",
		success: function (data, textStatus, xhr) {},
		statusCode: {
			400: function (response) {
				//$("#modal-agreement-already").modal("show");
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

function oxyscore(userID) {
	$("#modal-oxyscore").modal("show");
	var userID = userID;
	$(".postOxyscore").attr("data-clickedid", userID);
}

function UpdatePreclose() {
	$(".loadingSec").show();
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	id = suserId;
	primaryType = sprimaryType;
	accessToken = saccessToken;
	var localLoanId = $(".getLoanID").attr("data-loanId");

	loanId = localLoanId;

	if (userisIn == "local") {
		var precloseUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/" +
			loanId +
			"/loanpreclose";
	} else {
		var precloseUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/loan/" +
			loanId +
			"/loanpreclose";
	}
	$.ajax({
		url: precloseUrl,
		type: "POST",
		success: function (data, textStatus, xhr) {
			$(".loadingSec").hide();
			$("#modal-preclose").modal("show");
		},
		error: function (xhr, textStatus, errorThrown) {},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

function searchUsers(userType) {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	console.log("in search function");
	var userSelecctedOption = $(".choosenType").val();
	console.log("userSelecctedOption: " + userSelecctedOption);
	var lenderid = $(".lenderid input").val();
	lenderid = lenderid.substr(2);

	var borrowerid = $(".borrowerid input").val();
	borrowerid = borrowerid.substr(2);

	var loanId = ".loanid".val();
	loanId = loanId.substr(2);

	console.log("lender id " + lenderid);
	console.log("User Type: " + userType);
	console.log("borrowerid is :" + borrowerid);
	var minamtValue = $(".minAmount").val();
	var maxamtValue = $(".maxAmount").val();

	console.log(minamtValue + " " + maxamtValue);

	var minRoi = $(".minRoi").val();
	var maxRoi = $(".maxRoi").val();

	console.log(minRoi + " " + maxRoi);

	userId = suserId;
	primaryType = sprimaryType;
	accessToken = saccessToken;
	if (primaryType == "LENDER") {
		var fieldValueforSearch = "LENDER";
	} else {
		var fieldValueforSearch = "BORROWER";
	}

	if (userSelecctedOption == "amount") {
		var postData = {
			leftOperand: {
				fieldName: "userPrimaryType",
				operator: "EQUALS",
				fieldValue: userType,
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
	} else if (userSelecctedOption == "loanID") {
		var postData = {
			fieldName: "lenderUserId",
			fieldValue: lenderid,
			operator: "EQUALS",
			page: {
				pageNo: 1,
				pageSize: 100,
			},
			sortBy: "loanActiveDate",
			sortOrder: "ASC",
		};
	} else if (userSelecctedOption == "lenderID") {
		var postData = {
			fieldName: "lenderUserId",
			fieldValue: loanId,
			operator: "EQUALS",
			page: {
				pageNo: 1,
				pageSize: 100,
			},
			sortBy: "loanActiveDate",
			sortOrder: "ASC",
		};
	} else if (userSelecctedOption == "borrowerID") {
		var postData = {
			fieldName: "borrowerUserId",
			fieldValue: borrowerid,
			operator: "EQUALS",
			page: {
				pageNo: 1,
				pageSize: 100,
			},
			sortBy: "loanActiveDate",
			sortOrder: "ASC",
		};
	} else {
		var postData = {
			leftOperand: {
				fieldName: "userPrimaryType",
				operator: "EQUALS",
				fieldValue: userType,
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
	// var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
	//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getStatUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
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
			var template = document.getElementById("displayRecordsTpl").innerHTML;
			Mustache.parse(template);
			var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });

			$("#displayRecords").html(html);
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

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "BORROWER";
					} else {
						var fieldValueforSearch = "LENDER";
					}

					if (userSelecctedOption == "amount") {
						var postData = {
							leftOperand: {
								fieldName: "userPrimaryType",
								operator: "EQUALS",
								fieldValue: fieldValueforSearch,
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
								fieldName: "userPrimaryType",
								operator: "EQUALS",
								fieldValue: fieldValueforSearch,
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
						//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
						var getStatUrl =
							"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							" https://fintech.oxyloans.com/oxyloans/v1/user/" +
							userId +
							"/loan/" +
							primaryType +
							"/request/search";
					}

					//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
							var html = Mustache.to_html(template, { data: data.results });

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

function searchUsersPhase1(userType) {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	console.log("in search function");
	var userSelecctedOption = $(".choosenType").val();
	console.log("userSelecctedOption: " + userSelecctedOption);
	var lenderid = $(".lenderid input").val();
	lenderid = lenderid.substr(2);

	var borrowerid = $(".borrowerid input").val();
	borrowerid = borrowerid.substr(2);

	if (userSelecctedOption == "mobileNumber") {
		var mobileNumber = $(".mobileNumber input").val();
		console.log(mobileNumber);
	}

	if (userSelecctedOption == "userName") {
		var userName = $(".userName input").val();
		console.log(userName);
	}

	if (userSelecctedOption == "city") {
		var city = $(".city input").val();
		console.log(city);
	}

	console.log("lender id " + lenderid);
	console.log("User Type: " + userType);
	console.log("borrowerid is :" + borrowerid);
	var minamtValue = $(".minAmount").val();
	var maxamtValue = $(".maxAmount").val();

	console.log(minamtValue + " " + maxamtValue);

	var minRoi = $(".minRoi").val();
	var maxRoi = $(".maxRoi").val();

	console.log(minRoi + " " + maxRoi);

	userId = suserId;
	primaryType = sprimaryType;
	accessToken = saccessToken;
	if (primaryType == "LENDER") {
		var fieldValueforSearch = "LENDER";
	} else {
		var fieldValueforSearch = "BORROWER";
	}
	if (userSelecctedOption == "mobileNumber") {
		var postData = {
			leftOperand: {
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "user.mobileNumber",
					operator: "EQUALS",
					fieldValue: mobileNumber,
				},
				leftOperand: {
					fieldName: "userPrimaryType",
					fieldValue: userType,
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
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	} else if (userSelecctedOption == "userName") {
		var postData = {
			leftOperand: {
				logicalOperator: "AND",
				rightOperand: {
					logicalOperator: "OR",
					rightOperand: {
						fieldName: "user.personalDetails.firstName",
						operator: "LIKE",
						fieldValue: userName,
					},
					leftOperand: {
						fieldName: "user.personalDetails.lastName",
						operator: "LIKE",
						fieldValue: userName,
					},
				},
				leftOperand: {
					fieldName: "userPrimaryType",
					fieldValue: userType,
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
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	} else if (userSelecctedOption == "city") {
		var postData = {
			leftOperand: {
				leftOperand: {
					fieldName: "userPrimaryType",
					fieldValue: userType,
					operator: "EQUALS",
				},
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "user.personalDetails.address",
					fieldValue: city,
					operator: "LIKE",
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
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	} else {
		var postData = {
			leftOperand: {
				fieldName: "userId",
				fieldValue: borrowerid,
				operator: "EQUALS",
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
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	}

	var postData = JSON.stringify(postData);
	console.log(postData);
	// var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
	//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";

	//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/Borrower/request/search";
	//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getStatUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/request/search";
		//var getLenders = "https://fintech.oxyloans.com/oxyloans/v1/user/"+suserId+"/loan/ADMIN/request/search";
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
			var template = document.getElementById("loadBorrowersListTpl").innerHTML;
			Mustache.parse(template);
			var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });

			$("#loadBorrowersList").html(html);
			bindCommentsClick();
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

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "BORROWER";
					} else {
						var fieldValueforSearch = "LENDER";
					}
					userSelecctedOption = $(".choosenType").val();
					// alert(userSelecctedOption);
					if (userSelecctedOption == "mobileNumber") {
						var postData = {
							leftOperand: {
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.mobileNumber",
									operator: "EQUALS",
									fieldValue: mobileNumber,
								},
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: userType,
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
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
					} else if (userSelecctedOption == "userName") {
						var postData = {
							leftOperand: {
								logicalOperator: "AND",
								rightOperand: {
									logicalOperator: "OR",
									rightOperand: {
										fieldName: "user.personalDetails.firstName",
										operator: "LIKE",
										fieldValue: userName,
									},
									leftOperand: {
										fieldName: "user.personalDetails.lastName",
										operator: "LIKE",
										fieldValue: userName,
									},
								},
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: userType,
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
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
					} else if (userSelecctedOption == "city") {
						var postData = {
							leftOperand: {
								leftOperand: {
									fieldName: "userPrimaryType",
									fieldValue: userType,
									operator: "EQUALS",
								},
								logicalOperator: "AND",
								rightOperand: {
									fieldName: "user.personalDetails.address",
									fieldValue: city,
									operator: "LIKE",
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
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
					} else {
						var postData = {
							leftOperand: {
								fieldName: "userId",
								fieldValue: borrowerid,
								operator: "EQUALS",
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
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
					}

					var postData = JSON.stringify(postData);
					console.log(postData);
					//alert(1);
					if (userisIn == "local") {
						//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
						var getStatUrl =
							"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
							suserId +
							"/loan/ADMIN/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							"https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/ADMIN/request/search";
					}
					//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
							var html = Mustache.to_html(template, { data: data.results });

							$("#loadloanListings ").html(html);
							bindCommentsClick();
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

function searchRunningloans() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	console.log("in search function");
	var userSelecctedOption = $(".choosenType").val();
	console.log("userSelecctedOption: " + userSelecctedOption);

	var lenderid = $(".lenderid input").val();
	lenderid = lenderid.substr(2);

	var borrowerid = $(".borrowerid input").val();
	borrowerid = borrowerid.substr(2);

	var loanId = $(".loanid  input").val();
	loanId = loanId.substr(2);

	console.log("loanId " + loanId);
	console.log("lender id " + lenderid);
	console.log("borrowerid is :" + borrowerid);

	var minamtValue = $(".minAmount").val();
	var maxamtValue = $(".maxAmount").val();

	console.log(minamtValue + " " + maxamtValue);

	var minRoi = $(".minRoi").val();
	var maxRoi = $(".maxRoi").val();

	console.log(minRoi + " " + maxRoi);

	userId = suserId;
	primaryType = sprimaryType;
	accessToken = saccessToken;

	if (primaryType == "LENDER") {
		var fieldValueforSearch = "LENDER";
	} else if (primaryType == "ADMIN") {
		var fieldValueforSearch = "ADMIN";
	} else {
		var fieldValueforSearch = "BORROWER";
	}

	if (userSelecctedOption == "amount") {
		var postData = {
			leftOperand: {
				fieldName: "userPrimaryType",
				operator: "EQUALS",
				fieldValue: userType,
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
	} else if (userSelecctedOption == "loanID") {
		var postData = {
			fieldName: "id",
			fieldValue: loanId,
			operator: "EQUALS",
			page: {
				pageNo: 1,
				pageSize: 100,
			},
			sortBy: "loanActiveDate",
			sortOrder: "ASC",
		};
	} else if (userSelecctedOption == "lenderID") {
		var postData = {
			leftOperand: {
				fieldName: "lenderUserId",
				fieldValue: lenderid,
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
				pageSize: 200,
			},
			sortBy: "loanId",
			sortOrder: "ASC",
		};
	} else if (userSelecctedOption == "borrowerID") {
		var postData = {
			leftOperand: {
				fieldName: "borrowerUserId",
				fieldValue: borrowerid,
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
				pageSize: 100,
			},
			sortBy: "loanActiveDate",
			sortOrder: "ASC",
		};
	} else {
		var postData = {
			leftOperand: {
				fieldName: "userPrimaryType",
				operator: "EQUALS",
				fieldValue: userType,
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
	// var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
	//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getStatUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
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
			$(".totalActiveLoans").show();
			$(".totalActiveLoans").html("Total Active Loans are " + totalEntries);
			//  $(".nodata-pl").hide();
			var template = document.getElementById("displayRecordsTpl").innerHTML;
			Mustache.parse(template);
			var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });

			$("#displayRecords").html(html);
			var displayPageNo = totalEntries / 10;
			displayPageNo = displayPageNo + 1;
			//alert("loading is done");

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
								fieldName: "userPrimaryType",
								operator: "EQUALS",
								fieldValue: userType,
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
					} else if (userSelecctedOption == "loanID") {
						var postData = {
							fieldName: "lenderUserId",
							fieldValue: loanId,
							operator: "EQUALS",
							page: {
								pageNo: num,
								pageSize: 100,
							},
							sortBy: "loanActiveDate",
							sortOrder: "ASC",
						};
					} else if (userSelecctedOption == "lenderID") {
						var postData = {
							fieldName: "lenderUserId",
							fieldValue: lenderid,
							operator: "EQUALS",
							page: {
								pageNo: num,
								pageSize: 100,
							},
							sortBy: "loanActiveDate",
							sortOrder: "ASC",
						};
					} else if (userSelecctedOption == "borrowerID") {
						var postData = {
							fieldName: "borrowerUserId",
							fieldValue: borrowerid,
							operator: "EQUALS",
							page: {
								pageNo: num,
								pageSize: 100,
							},
							sortBy: "loanActiveDate",
							sortOrder: "ASC",
						};
					} else {
						var postData = {
							leftOperand: {
								fieldName: "userPrimaryType",
								operator: "EQUALS",
								fieldValue: userType,
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
						//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
						var getStatUrl =
							"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
							suserId +
							"/loan/ADMIN/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							" https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/ADMIN/search";
					}

					//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
							var html = Mustache.to_html(template, { data: data.results });

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

function searchLenderUers(usertype) {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	var userSelecctedOption = $(".choosenType").val();
	console.log("userSelecctedOption: " + userSelecctedOption);

	var lenderid = $(".id input").val();
	lenderid = lenderid.substr(2);

	console.log("lender id " + lenderid);
	console.log("usertype " + usertype);

	var Name = $(".name input").val();
	console.log("Name " + Name);

	var minamtValue = $(".minAmount").val();
	var maxamtValue = $(".maxAmount").val();

	console.log(minamtValue + " " + maxamtValue);

	var minRoi = $(".minRoi").val();
	var maxRoi = $(".maxRoi").val();

	console.log(minRoi + " " + maxRoi);

	if (userSelecctedOption == "mobileNumber") {
		alert(2);
		var mobileNumber = $(".mobileNumber input").val();
		console.log(mobileNumber);
	}

	userId = suserId;
	primaryType = sprimaryType;
	accessToken = saccessToken;

	if (primaryType == "LENDER") {
		var fieldValueforSearch = "LENDER";
	} else {
		var fieldValueforSearch = "BORROWER";
	}

	if (userSelecctedOption == "amount") {
		var postData = {
			leftOperand: {
				fieldName: "userPrimaryType",
				operator: "EQUALS",
				fieldValue: usertype,
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
	} else if (userSelecctedOption == "name") {
		var postData = {
			fieldName: "firstName",
			fieldValue: Name,
			operator: "EQUALS",
			page: {
				pageNo: 1,
				pageSize: 100,
			},
			sortBy: "loanActiveDate",
			sortOrder: "ASC",
		};
	} else if (userSelecctedOption == "id") {
		var postData = {
			leftOperand: {
				fieldName: "userId",
				fieldValue: lenderid,
				operator: "EQUALS",
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
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	} else if (userSelecctedOption == "mobileNumber") {
		var postData = {
			leftOperand: {
				logicalOperator: "AND",
				rightOperand: {
					fieldName: "user.mobileNumber",
					operator: "EQUALS",
					fieldValue: mobileNumber,
				},
				leftOperand: {
					fieldName: "userPrimaryType",
					fieldValue: usertype,
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
			sortBy: "loanRequestedDate",
			sortOrder: "DESC",
		};
	} else {
		var postData = {
			leftOperand: {
				fieldName: "userPrimaryType",
				operator: "EQUALS",
				fieldValue: usertype,
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
	// var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
	//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/loan/ADMIN/search";
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getStatUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/request/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
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
			//  $(".nodata-pl").hide();
			var template = document.getElementById("loadLendersListTpl").innerHTML;
			Mustache.parse(template);
			var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });

			$("#loadLendersList").html(html);
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

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "BORROWER";
					} else {
						var fieldValueforSearch = "LENDER";
					}

					if (userSelecctedOption == "amount") {
						var postData = {
							leftOperand: {
								fieldName: "userPrimaryType",
								operator: "EQUALS",
								fieldValue: usertype,
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
					} else if (userSelecctedOption == "name") {
						var postData = {
							fieldName: "firstName",
							fieldValue: Name,
							operator: "EQUALS",
							page: {
								pageNo: num,
								pageSize: 100,
							},
							sortBy: "loanActiveDate",
							sortOrder: "ASC",
						};
					} else if (userSelecctedOption == "id") {
						var postData = {
							leftOperand: {
								fieldName: "userId",
								fieldValue: lenderid,
								operator: "EQUALS",
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
							sortBy: "loanRequestedDate",
							sortOrder: "DESC",
						};
					} else {
						var postData = {
							leftOperand: {
								fieldName: "userPrimaryType",
								operator: "EQUALS",
								fieldValue: usertype,
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
						//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
						var getStatUrl =
							"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
							suserId +
							"/loan/ADMIN/request/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							" https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/ADMIN/request/search";
					}

					//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
					$.ajax({
						url: getStatUrl,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var template =
								document.getElementById("loadLendersListTpl").innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, { data: data.results });

							$("#loadLendersList ").html(html);
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

function viewPAN(userID) {
	console.log(userID);
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	//var getPAN = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userID+"/download/PAN";
	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getPAN =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			userID +
			"/download/PAN";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getPAN =
			"https://fintech.oxyloans.com/oxyloans/v1/user/" +
			userID +
			"/download/PAN";
	}
	$.ajax({
		url: getPAN,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
				//$('.pan-image-upload-wrap, .pan-uploadedButton').hide();
				// $('.pan-file-upload-content').show();
				//$(".panImage").attr('src',data.downloadUrl);
				console.log(data.downloadUrl);
				window.open(data.downloadUrl, "_blank");
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

function getKYC() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getPASSPORT =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/download/PASSPORT";
		var getAADHAR =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/download/AADHAR";
		var getBANKSTATEMENT =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/download/BANKSTATEMENT";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
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
	}

	//var getPASSPORT = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/PASSPORT";
	//var getAADHAR = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/AADHAR";
	//var getBANKSTATEMENT = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+suserId+"/download/BANKSTATEMENT";

	$.ajax({
		url: getPAN,
		type: "GET",
		success: function (data, textStatus, xhr) {
			if (data.downloadUrl != "") {
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
}

function signout() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	id = suserId;
	primaryType = sprimaryType;
	accessToken = saccessToken;
	if (userisIn == "local") {
		var signoutUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/logout";
	} else {
		var signoutUrl = "https://fintech.oxyloans.com/oxyloans/v1/user/logout";
	}
	$.ajax({
		url: signoutUrl,
		type: "POST",
		success: function (data, textStatus, xhr) {
			writeCookie("sUserId", "");
			writeCookie("sUserType", "");
			writeCookie("saccessToken", "");
			window.location = "http://oxyloans.com/new/userlogin";
			//window.location = "userlogin";
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
			window.location = "http://oxyloans.com/new/userlogin";
			//window.location = "userlogin";
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", accessToken);
		},
	});
}

/*

function updateComments(laonID){
    console.log(laonID);
    $("#modal-comments").modal("show");
    var laonID = $(this).attr("data-loanid");
    var currComment = $(this).attr("data-currComment")
    $(".adminComment").val(currComment);
    $(".saveCommentBtn").attr("data-clickedid", laonID);
}

*/

function changePrimarytype(userType, id) {
	$("#modal-change-primarytype").modal("show");
	$(".yesChangeUsesr").attr("data-reqID", id);
	$(".yesChangeUsesr").attr("data-type", userType);
}

function displayLoanInformation(loanID) {
	$(".displayAllLoansInfo").hide();
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	var getLoanId = loanID;
	if (userisIn == "local") {
		var updateEmiUrlCard =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
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

			$(".displayLoanInformation-" + loanID).show();
			var template = document.getElementById("emiRecordsCallTpl").innerHTML;
			//console.log(template);
			Mustache.parse(template);
			//var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });
			$("#displayEMIRecordsAtAT-" + loanID).html(html);
			//$("#modal-viewEMI").modal("show");
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

function loadEMIsBasedOnRequest() {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	var yearNumber = $(".year").val();
	var monthNumber = $(".month").val();
	console.log("yearNumber " + yearNumber);
	if (yearNumber == "" || yearNumber == null) {
		var today = new Date();
		var yearNumber = today.getFullYear(); // Returns 2019
		var monthNumber = today.getMonth(); // Returns month-1
		monthNumber = monthNumber + 1;
	} else {
		yearNumber = yearNumber;
		monthNumber = monthNumber;
	}

	if (userisIn == "local") {
		var postDataURL =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/loan/pending/" +
			yearNumber +
			"/" +
			monthNumber;
	} else {
		var postDataURL =
			"https://fintech.oxyloans.com/oxyloans/v1/user/loan/pending/" +
			yearNumber +
			"/" +
			monthNumber;
	}
	console.log(postDataURL);

	var postData = {
		fieldName: "loanStatus",
		fieldValue: "Active",
		operator: "EQUALS",
		page: {
			pageNo: 1,
			pageSize: 50,
		},
		sortBy: "loanId",
		sortOrder: "DESC",
	};
	var postData = JSON.stringify(postData);
	$(".loadingSec").show();
	$.ajax({
		url: postDataURL,
		type: "POST",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			var jsonData = data.results;
			$("#downloadPendingEMIInfo").html(jsonData);
			var template = document.getElementById(
				"loadPendingEMIsListTpl"
			).innerHTML;
			Mustache.parse(template);
			var html = Mustache.to_html(template, { data: data.results });
			//console.log(html);
			$("#loadPendingEMIsList").html(html);
			viewEMICARD();
			$(".loadingSec").hide();

			var displayPageNo = data.totalCount / 50;
			displayPageNo = displayPageNo + 1;
			console.log(data.results.totalCount);
			/*888888888888888*/
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
					var postData = {
						page: {
							pageNo: num,
							pageSize: 50,
						},
						sortBy: "loanId",
						sortOrder: "DESC",
					};

					var postData = JSON.stringify(postData);
					console.log(postData);
					$.ajax({
						url: postDataURL,
						type: "POST",
						data: postData,
						contentType: "application/json",
						dataType: "json",
						success: function (data, textStatus, xhr) {
							var jsonData = data.results;
							$("#downloadPendingEMIInfo").html(jsonData);
							var template = document.getElementById(
								"loadPendingEMIsListTpl"
							).innerHTML;
							Mustache.parse(template);
							var html = Mustache.to_html(template, { data: data.results });
							//console.log(html);
							$("#loadPendingEMIsList").html(html);
							viewEMICARD();
							$(".loadingSec").hide();
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

function downloadReportClick() {
	console.log("clicked");
	var dataElementName = $(this).attr("data-varName");
	var data = $("#" + dataElementName).html();

	data = JSONData;
	downloadReport(JSONData, "EMIs Information", "OxyLoans-Admin-EMI");
}

$(document).ready(function () {
	$(".yesChangeUsesr").click(function () {
		$("#modal-change-primarytype").modal("hide");
		suserId = getCookie("sUserId");
		sprimaryType = getCookie("sUserType");
		saccessToken = getCookie("saccessToken");

		id = suserId;
		primaryType = sprimaryType;
		accessToken = saccessToken;

		var outSideUserid = $(this).attr("data-reqID");
		var outSidePrimarytype = $(this).attr("data-type");
		console.log(outSideUserid);
		console.log(outSidePrimarytype);

		if (userisIn == "local") {
			var primarytypeUrl =
				"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
				outSideUserid +
				"/changeprimarytype/" +
				outSidePrimarytype +
				"";
		} else {
			var primarytypeUrl =
				"https://fintech.oxyloans.com/oxyloans/v1/user/" +
				outSideUserid +
				"/changeprimarytype/" +
				outSidePrimarytype +
				"";
		}

		$.ajax({
			url: primarytypeUrl,
			type: "PATCH",
			success: function (data, textStatus, xhr) {},
			error: function (xhr, textStatus, errorThrown) {
				console.log("Error Something");
			},
			beforeSend: function (xhr) {
				xhr.setRequestHeader("accessToken", accessToken);
			},
		});
	});
});

function downloadReport(JSONData, ReportTitle, ShowLabel) {
	console.log("downloading");
	//If JSONData is not an object then JSON.parse will parse the JSON string in an Object
	var arrData = typeof JSONData != "object" ? JSON.parse(JSONData) : JSONData;

	var CSV = "sep=," + "\r\n\n";

	//This condition will generate the Label/Header
	if (ShowLabel) {
		var row = "";

		//This loop will extract the label from 1st index of on array
		for (var index in arrData[0]) {
			//Now convert each value to string and comma-seprated
			row += index + ",";
		}

		row = row.slice(0, -1);

		//append Label row with line break
		CSV += row + "\r\n";
	}

	//1st loop is to extract each row
	for (var i = 0; i < arrData.length; i++) {
		var row = "";

		//2nd loop will extract each column and convert it in string comma-seprated
		for (var index in arrData[i]) {
			row += '"' + arrData[i][index] + '",';
		}

		row.slice(0, row.length - 1);

		//add a line break after each row
		CSV += row + "\r\n";
	}

	if (CSV == "") {
		alert("Invalid data");
		return;
	}

	//Generate a file name
	var fileName = "MyReport_";
	//this will remove the blank-spaces from the title and replace it with an underscore
	fileName += ReportTitle.replace(/ /g, "_");

	//Initialize file format you want csv or xls
	var uri = "data:text/csv;charset=utf-8," + escape(CSV);

	// Now the little tricky part.
	// you can use either>> window.open(uri);
	// but this will not work in some browsers
	// or you will not get the correct file extension

	//this trick will generate a temp <a /> tag
	var link = document.createElement("a");
	link.href = uri;

	//set the visibility hidden so it will not effect on your web-layout
	link.style = "visibility:hidden";
	link.download = fileName + ".csv";

	//this part will append the anchor tag and remove it after automatic click
	document.body.appendChild(link);
	link.click();
	document.body.removeChild(link);
}

function updateUserStatus(id, status) {
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");

	if (userisIn == "local") {
		var updateUserStatus =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/updateUserStatus";
	} else {
		var updateUserStatus =
			"https://fintech.oxyloans.com/oxyloans/v1/user/logout";
	}

	if (status == "ACTIVE") {
		status = "REGISTERED";
	} else {
		status = "ACTIVE";
	}
	alert(id + " " + status);
	var postData = { id: id, status: status };
	var postData = JSON.stringify(postData);
	console.log(postData);

	$.ajax({
		url: updateUserStatus,
		type: "PATCH",
		data: postData,
		contentType: "application/json",
		dataType: "json",
		success: function (data, textStatus, xhr) {
			alert("Updated");
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log("Error Something");
		},
		beforeSend: function (xhr) {
			xhr.setRequestHeader("accessToken", saccessToken);
		},
	});
}

function viewLoanRecord(userID) {
	$(".loadingSec").show();
	suserId = getCookie("sUserId");
	sprimaryType = getCookie("sUserType");
	saccessToken = getCookie("saccessToken");
	alert(userID);
	$(".loadingSec").hide();
	/*Featching Loans Records*/
	var postData = {
		fieldName: "borrowerUserId",
		fieldValue: userID,
		operator: "EQUALS",
		page: {
			pageNo: 1,
			pageSize: 100,
		},
		sortBy: "loanActiveDate",
		sortOrder: "ASC",
	};

	var postData = JSON.stringify(postData);

	if (userisIn == "local") {
		//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
		var getStatUrl =
			"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
	} else {
		// https://fintech.oxyloans.com/oxyloans/
		var getStatUrl =
			" https://fintech.oxyloans.com/oxyloans/v1/user/" +
			suserId +
			"/loan/ADMIN/search";
	}

	/**************************/
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
			var template = document.getElementById("displayRecordsTpl").innerHTML;
			Mustache.parse(template);
			var html = Mustache.render(template, data);
			var html = Mustache.to_html(template, { data: data.results });

			$("#displayRecords").html(html);
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

					if (primaryType == "LENDER") {
						var fieldValueforSearch = "BORROWER";
					} else {
						var fieldValueforSearch = "LENDER";
					}

					var postData = {
						fieldName: "borrowerUserId",
						fieldValue: userID,
						operator: "EQUALS",
						page: {
							pageNo: num,
							pageSize: 100,
						},
						sortBy: "loanActiveDate",
						sortOrder: "ASC",
					};

					var postData = JSON.stringify(postData);
					console.log(postData);
					//alert(1);

					if (userisIn == "local") {
						//http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/
						var getStatUrl =
							"http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/" +
							suserId +
							"/loan/ADMIN/search";
					} else {
						// https://fintech.oxyloans.com/oxyloans/
						var getStatUrl =
							" https://fintech.oxyloans.com/oxyloans/v1/user/" +
							suserId +
							"/loan/ADMIN/search";
					}

					//var getStatUrl = "http://ec2-13-232-202-148.ap-south-1.compute.amazonaws.com:8080/oxyloans/v1/user/"+userId+"/loan/"+primaryType+"/request/search";
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
							var html = Mustache.to_html(template, { data: data.results });

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
	/***********************************/
}
