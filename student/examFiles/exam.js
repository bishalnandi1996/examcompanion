function examTime(eTime) {
	document.getElementById("examTimeStatus").innerHTML = "<progress id='TimeProgress' value='"+ (eTime*60) +"' max='"+ (eTime*60) +"'></progress>";

	// Set the date we're counting down to
	var countDownDate = new Date().getTime() + (eTime*60000);

	// Update the count down every 1 second
	var x = setInterval(function() {

		// Get today's date and time
		var now = new Date().getTime();

		// Find the distance between now and the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		// Output the result in an element with id
		document.getElementById("examTimeCount").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
		document.getElementById("TimeProgress").value = distance / 1000;

		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			submitAnswer();
		}
	}, 1000);
}

function submitAnswer() {
	document.getElementById("examFrm").submit();
}

function frmReset() {
	document.getElementById("examFrm").reset();
}

$('document').ready(function(){
	window.onblur = function() {
		submitAnswer();
	};
});