// <div class="demo-card-square mdl-card mdl-shadow--2dp">
//     <div class="mdl-card__title mdl-card--expand">
//       <h2 class="mdl-card__title-text">Arun Iyer</h2>
//     </div>
//     <div class="mdl-card__supporting-text"> Reason for Outpass </div>
//     <div class="mdl-card__actions mdl-card--border">
//       <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
//         View 
//       </button>
//     </div>
// </div>



firebase.database().ref('/outpass').on("child_added", snap => {

	console.log("in");

	const outerDiv = document.createElement('div');
	const titleDiv = document.createElement('div');
	const title = document.createElement('h2');
	const reasonDiv = document.createElement('div');
	const buttonDiv = document.createElement('div');
	const button = document.createElement('button');

	title.innerHTML = snap.val().name;
	reasonDiv.innerHTML = snap.val().reason_for_leave;
	button.innerHTML = "View full details"

	outerDiv.className = "demo-card-square mdl-card mdl-shadow--2dp";
	titleDiv.className = "mdl-card__title mdl-card--expand";
	title.className = "mdl-card__title-text";
	reasonDiv.className = "mdl-card__supporting-text";
	buttonDiv.className = "mdl-card__actions mdl-card--border";
	button.className = "mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect";

	titleDiv.appendChild(title);
	buttonDiv.appendChild(button);
	outerDiv.appendChild(titleDiv);
	outerDiv.appendChild(reasonDiv);
	outerDiv.appendChild(buttonDiv);

	document.getElementById("list-of-outpass").appendChild(outerDiv);

});