$(document).ready(function() {

		// get chat
		var getChat = function() {

			var get_chat = 1;

			$.ajax({
				url: 'controller.php',
				type: 'POST',
				dataType: 'text',
				data: {get_chat: get_chat},
			})
			.done(function(data) {
				data = $.parseJSON(data);

				$('.chat').html("");

				$.each(data, function(index, val) {
					$('.chat').append(
						'<div class="chat-item">' +
						'<span class="chat-name">'+val.autor+'</span>' +
						'<p class="chat-text">'+val.message+'</p></div>'
						);
				});



				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}


		setInterval(function() {
			getChat()
		}, 1000)

	


	// add
	$('.add_chat').click(function() {
		
		var autor = $('.form-add input[name=autor]').val();
		var mess = $('.form-add textarea[name=message]').val();
		var do_chat = 1;

		$.ajax({
			url: 'controller.php',
			type: 'POST',
			dataType: 'text',
			data: {autor: autor, message: mess, do_chat: do_chat},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (data != 1) {
				alert(data);
			} else {
				$('.form-item input, textarea').val("");
				console.log("success");
			}


			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		






	});

});