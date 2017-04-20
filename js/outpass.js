function submitOutpass() {
	firebase.database().ref("/outpass/" + Date.now()).set({
		name: document.getElementById("name").value,
		roomNo: document.getElementById("roomNo").value,
		regno: document.getElementById("regno").value,
		dept: document.getElementById("dept").value,
		section: document.getElementById("section").value,
		contact_student: document.getElementById("contact-student").value,
		contact_home: document.getElementById("contact-home").value,
		contact_lg: document.getElementById("contact-lg").value,
		reason_for_leave: document.getElementById("reason-for-leave").value,
		date_out: document.getElementById("date-out").value,
		date_in: document.getElementById("date-in").value,
		time_out: document.getElementById("time-out").value,
		time_in: document.getElementById("time-in").value,
		address: document.getElementById("address").value,
		pincode: document.getElementById("pincode").value
	});	
}

function validateForm(){

}

function getCollage(){

}

function getYear(){

}

function getHostel(){

}