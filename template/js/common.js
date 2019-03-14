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
