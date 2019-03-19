$(document).ready(function(){
	function inputCount() {
		var inputLength = $('#image-container').find('.image-input').length + 1;
		return inputLength;
	}

	$('#add-image').click(function(){
		console.log();
		$('#image-container').append(
			$('<input/>').attr({
				class: 'form-control image-input',
				type: 'file',
				name: 'picture' + inputCount()
			})
		);
	});

	$('#del-image').click(function(){
		$('#image-container').find('.image-input').last().remove()
	});
});
function setCookie(name, value, options) {
  	options = options || {};

	var expires = options.expires;

	if (typeof expires == "number" && expires) {
	    var d = new Date();
	    d.setTime(d.getTime() + expires * 1000);
	    expires = options.expires = d;
	}
	if (expires && expires.toUTCString) {
	  options.expires = expires.toUTCString();
	}

	value = encodeURIComponent(value);

	var updatedCookie = name + "=" + value;

	for (var propName in options) {
		updatedCookie += "; " + propName;
		var propValue = options[propName];
		if (propValue !== true) {
    		updatedCookie += "=" + propValue;
		}
  	}

	document.cookie = updatedCookie;
}