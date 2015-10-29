var inicio=function(){
	$(".cantidad").keyup(function(e){
		if ($(this).val()!='') {
			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();
				$(this).parentsUntil('.producto').find('.cart_total_price').text('Subtotal: '+(precio*cantidad));
				$.post('./js/modificarDatos.php',{
					Id:id,
					Precio: precio,
					Cantidad:cantidad
				},function(e){
					$("#total").text(e);
				});
			}
		}
	});
	$(".add-to-cart").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		$.post('./js/agregarCarrito.php',{
					id:id
				},function(a){
					alert("Se agrego a tu carrito");
				});
	});	
	$(".cart").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		$.post('./js/agregarCarrito.php',{
					id:id
				},function(a){
					alert("Se agrego a tu carrito");
					
				});
	});
	$(".cart_quantity_delete").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		$(this).parentsUntil('.producto').remove();
		$.post('./js/eliminarCarrito.php',{
					id:id
				},function(a){
					if (a=='0') {
						location.href="./cart.php";
					}
				});
	});
}
$(document).on('ready',inicio);