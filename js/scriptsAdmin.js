var inicio=function(){
	$(".eliminar").click(function(e){
		e.preventDefault();
		var id=$(this).attr('data-id');
		$(this).closest('tr').remove();
		$.post('./../../../js/eliminarProducto.php',{
					id:id
				},function(a){
					alert("Se elimino el producto");

				});
	});
	$(".ver_compra").click(function(e){
		e.preventDefault();		
		var t = $('#table1').DataTable();
		t.clear().draw();
		var id=$(this).attr('data-id');
		productos = new Array();
		$.post('./js/productoCompra.php',{
					id:id
				},function(a){
					productos=JSON.parse(a);
				for (var i in productos) {
   						t.row.add([
    						""+productos[i].Producto,
    						""+productos[i].Precio,
    						""+productos[i].Cantidad
    					]).draw( false );
					}
				});
	});
}
$(document).on('ready',inicio);