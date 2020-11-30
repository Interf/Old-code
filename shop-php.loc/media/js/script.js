$(document).ready(function() {
	


	// Add to cart
	var addCart = function () {
		$('.add-to-cart').click(function() {
			var id = $(this).attr("data-id");
			var button = $(this);
			var parentButton = button.parent();

			$.ajax({
				url: '/cart/add/'+id,
				type: 'POST',
				data: {},
			})
			.done(function(data) {
				console.log("success");

				$('.count_cart').html(data);
				button.remove();
				parentButton.append('<button class="btn in-cart">В корзине</button>');

			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});




		});
	}
	addCart();

	// Del from cart

	var emptyCart = function() {
		if($(".cart").children().length <= 0) {
			$('.cart-container').html("<h2>Корзина пуста</h2>");
		}
	}


	$('.del-from-cart').click(function(e) {
		e.preventDefault();
		var id = $(this).attr("data-id");
		var parentBlock = $(this).parent();

		$.ajax({
			url: '/cart/del/'+id,
			type: 'POST',
			data: {},
		})
		.done(function(data) {
			data = jQuery.parseJSON(data);





			console.log(data);


			parentBlock.remove();
			$('.total_sum span').html(data["total_sum"]);
			$('.count_cart').html(data["count_cart"]);
			emptyCart();







		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	});



	// Order
	$(".do_order").click(function(e) {
		var name = $(".form-input input[name=name]").val();
		var email = $(".form-input input[name=email]").val();
		var phone = $(".form-input input[name=email]").val();
		var do_order = 1;


		if (name.length < 2 || email.length < 5 || phone.length < 5) { alert("Ошибка"); return false; }

		$.ajax({
			url: '/cart/order/',
			type: 'POST',
			dataType: 'html',
			data: {name: name, email: email, phone: phone, do_order:do_order},
		})
		.done(function(data) {

			if (data == 1) {window.location.replace('/');}

			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		

	});



	// Home sort
	$('.btn-sort').click(function() {
		var sort = $(this).attr("data-sort");
		var do_sort = 1;


		$.ajax({
			url: '/',
			type: 'POST',
			dataType: 'text',
			data: {sort: sort, do_sort: do_sort},
		})
		.done(function(data) {
			data = $.parseJSON(data);
			console.log(data);


			$('.product-container').children().remove();

			$.each(data, function(index, val) {
				$('.product-container').append(
					'<div class="prod-item col-md-3">'+
					(val.is_new == 1 ? '<div class="is_new">Новинка</div>' : '') +
					(val.is_discount == 1 ? '<div class="is_discount">-20%</div>' : '') +
					'<a href="/product/'+val.id+'">' +
					'<img src="/media/images/'+val.img+'" alt="">' +
					'<p class="prod-name">' +
					'<span class="prod-brand">'+val.brand+'</span>' +
					'<span class="prod-type">'+val.type+'</span>' +
					'</p></a>' +
					'<div class="prod-info">'+val.info+'</div>' +
					'<div class="prod-price">'+val.price+'руб.</div>' +
					(val.btn == 1 ? '<button class="btn in-cart">В корзине</button>' : '<button class="btn btn-success add-to-cart" data-id="'+val.id+'">Добавить в корзину</button>'));
			});

			addCart();



		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	});


	// Auth/Reg form
	$(".reg-btn").click(function() {
		$('.reg').toggle("slow");
	});
	$(".auth-btn").click(function() {
		$('.auth').toggle("slow");
	});

	// Reg
	$('.do_reg').click(function() {
		var login = $('.reg input[name=login]').val();
		var email = $('.reg input[name=email]').val();
		var pass1 = $('.reg input[name=pass1]').val();
		var pass2 = $('.reg input[name=pass2]').val();
		var do_reg = 1;

		$.ajax({
			url: '/administrator',
			type: 'POST',
			dataType: 'text',
			data: {login: login, email: email, pass1: pass1, pass2: pass2, do_reg: do_reg},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (data != 1) {
				$('.error-reg').html("");
				$.each(data, function(index, val) {
					$('.error-reg').append(val+'<br>');
				});
			} else {
				$('.error-reg').html("");
				alert("Вы успешно зарегистрировались");
				$('.reg input').val("");
			}

			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});

	// Auth
	$('.do_auth').click(function() {
		var login = $('.auth input[name=login]').val();
		var pass = $('.auth input[name=pass]').val();
		var do_auth = 1;

		$.ajax({
			url: '/administrator',
			type: 'POST',
			dataType: 'text',
			data: {login: login, pass: pass, do_auth: do_auth},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (data != 1) {
				$('.error-auth').html("");
				$.each(data, function(index, val) {
					$('.error-auth').append(val+"<br>");
				});
			} else {
				$('.error-auth').html("");
				alert("Вы успешно вошли");
				$('.auth input').val("");
			}

			console.log(data);



		})	
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});



	});



	// Del point menu 
	$('.del_menu').click(function() {
		var parentBlock = $(this).parent().parent();
		if(!confirm("Уверены?")) {
			return false;
		} else {
			var id = $(this).attr("data-id");
			
			var del_menu = 1;

			$.ajax({
				url: '/administrator/menu',
				type: 'POST',
				dataType: 'text',
				data: {id: id, del_menu: del_menu},
			})
			.done(function(data) {
				data = $.parseJSON(data);


				if (data != 1) {
					alert(data);
				} else {
					parentBlock.remove();
					
					
				}



				console.log(data);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

		}

	});

	// Change point menu
	$(".change_menu").click(function() {
		var parentBlock = $(this).parent().parent();
		var id = $(this).attr('data-id');
		var title = parentBlock.find('input[name=title]').val();
		var url = parentBlock.find('input[name=url]').val();
		var trans = parentBlock.find('input[name=transcript]').val();
		var change_menu = 1;

		$.ajax({
			url: '/administrator/menu',
			type: 'POST',
			dataType: 'text',
			data: {id: id, title: title, url: url, trans: trans, change_menu: change_menu},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (data != 1) {
				alert(data);
			} else {
				window.location.reload();
			}


			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	// Add point menu
	$('.add_menu').click(function() {
		var title = $('.add-menu input[name=title]').val();
		var url = $('.add-menu input[name=url]').val();
		var trans = $('.add-menu input[name=trans]').val();
		var add_menu = 1;


		$.ajax({
			url: '/administrator/menu',
			type: 'POST',
			dataType: 'text',
			data: {title: title, url: url, trans:trans, add_menu: add_menu},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (data != 1) {
				alert(data)
			} else {
				window.location.reload();
			}

			console.log("success");



		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	});


	// Show/Hide prod func
	$('.del-prod-toggle').click(function() {
		$('.del-prod').toggle("slow");
	});
	$('.add-prod-toggle').click(function() {
		$('.add-prod').toggle("slow");
	});
	$('.change-prod-toggle').click(function() {
		$('.change-prod').toggle("slow");
	});


	// Del product
	$('.del_prod').click(function() {
		var parentBlock = $(this).parent().parent();
		var id = $(this).attr("data-id");
		var del_prod = 1;

		$.ajax({
			url: '/administrator/products',
			type: 'POST',
			dataType: 'text',
			data: {id: id, del_prod: del_prod},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (data != 1) {
				alert(data);
			} else {
				parentBlock.remove();

			}

			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});


	// Add prod
	$('.add_prod').click(function() {
		var brand = $('.add-prod input[name=brand]').val();
		var type = $('.add-prod input[name=type]').val();
		var img = $('.add-prod input[name=img]').val();
		var info = $('.add-prod input[name=info]').val();
		var price = $('.add-prod input[name=price]').val();
		var is_new = $('.add-prod input[name=is_new]').prop("checked");
		var is_discount = $('.add-prod input[name=is_discount]').prop("checked");
		var location = $('.add-prod input[name=location]').val();
		var add_prod = 1;

		if (is_new) {
			is_new = 1;
		} else {
			is_new = 0;
		}

		if (is_discount) {
			is_discount = 1;
		} else {
			is_discount = 0;
		}



		$.ajax({
			url: '/administrator/products',
			type: 'POST',
			dataType: 'text',
			data: {brand: brand, type: type, img: img, info: info, price: price, is_new: is_new, is_discount: is_discount, location: location, add_prod: add_prod},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (data != 1) {
				alert(data);
			} else {
				window.location.reload();
			}


			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		

	});

	// Change prod
	$('.change_prod').click(function() {
		var id = $(this).attr("data-id");
		var parentBlock = $(this).parent().parent();
		var brand = parentBlock.find('input[name=brand]').val();
		var type = parentBlock.find('input[name=type]').val();
		var img = parentBlock.find('input[name=img]').val();
		var info = parentBlock.find('input[name=info]').val();
		var price = parentBlock.find('input[name=price]').val();
		var is_new = parentBlock.find('input[name=is_new]').prop("checked");
		var is_discount = parentBlock.find('input[name=is_discount]').prop("checked");
		var location = parentBlock.find('input[name=location]').val();
		var change_prod = 1;

		if (is_new) {
			is_new = 1;
		} else {
			is_new = 0;
		}

		if (is_discount) {
			is_discount = 1;
		} else {
			is_discount = 0;
		}


		// console.log(brand);
		// console.log(type);
		// console.log(img);
		// console.log(info);
		// console.log(price);
		// console.log(is_new);
		// console.log(is_discount);
		// console.log(location);



		$.ajax({
			url: '/administrator/products',
			type: 'POST',
			dataType: 'text',
			data: {id:id,brand: brand, type: type, img: img, info: info, price: price, is_new: is_new, is_discount: is_discount, location: location, change_prod: change_prod},
		})
		.done(function(data) {
			data = $.parseJSON(data);

			if (data != 1) {
				alert(data);
			} else {
				window.location.reload();
			}


			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	});


});