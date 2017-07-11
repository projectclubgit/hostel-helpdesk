var cardsJSON = {};

firebase.database().ref('/outpass').on("child_added", snap => {

	console.log("in");

	cardsJSON[snap.val().regno] = snap.val();

	const outerDiv = document.createElement('div');
	outerDiv.innerHTML = `
		<div class="demo-card-square mdl-card mdl-shadow--2dp">
			<div class="mdl-card__title mdl-card--expand">
			<h2 class="mdl-card__title-text">${snap.val().name}</h2>
			</div>
			<div class="mdl-card__supporting-text">${snap.val().reason_for_leave}</div>
			<div class="mdl-card__actions mdl-card--border">
			<button onclick="showMoreDetails('${snap.val().regno}')" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
				View full details 
			</button>
			</div>
		</div>
	`;

	document.getElementById("list-of-outpass").appendChild(outerDiv);

});

function showMoreDetails(regno){

	const data = cardsJSON[regno];

	let moreDetails = `
		<h3>${data.name}</h3>
		<h4>${data.regno}</h4>
		<h4><b>Section: </b>${data.section}</h4> 
		<p><b>Reason for leave: </b>${data.reason_for_leave}</p>
		<p>
			<span><b>Date out: </b>${data.date_out}</span>
			<span class="right-float"><b>Date in: </b>${data.date_in}</span>
		</p>
		<p>
			<span><b>Time out: </b>${data.time_out}</span>
			<span class="right-float"><b>Time in: </b>${data.time_in}</span>
		</p>
		<p><b>Student Contact number: </b> ${data.contact_student}</p>
		<p><b>Parent Contact number: </b> ${data.contact_home}</p>
	`;

	document.getElementById("more-details").innerHTML = moreDetails;

	$("#show-full-form").modal("show");
}