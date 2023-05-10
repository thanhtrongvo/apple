
$(document).ready(function() {
  $('.form_item').on('submit', function(e) {
    e.preventDefault();
    var id = $(this).find('input[name="id"]').val();
    var name = $(this).find('input[name="name"]').val();
    var price = $(this).find('input[name="price"]').val();
    var image = $(this).find('input[name="image"]').val();
    $.ajax({
      url: 'php/cart-process.php',
      method: 'POST',
      data: {id: id, name: name, price: price, image: image},
      success: function(){
        alert('Product has been added to cart');
      }
    });
  });
});
$(document).ready(function() {
  $('.cart_item').on('submit', function(e) {
    var id = $(this).find('input[name="remove_id"]').val();
    $.ajax({
      url: 'php/cart-process.php',
      method: 'POST',
      data: {remove_id: id},
      success: function() {
        alert('Product has been delete from cart');
      }
    });
  });
});
//nut cộng 1 qty
$(document).ready(function() {
  $('.qtyplus').click(function(e) {
    var form = $(this).parent();
    var quantity = (form).find("input[name='quantity']").val();
    var id = (form).find("input[name='id']").val();
    alert(quantity +id);
    $.ajax({
        url: 'php/cart-process.php',
        method: 'GET',
        data: {qty_plus: quantity, id: id},
        success: function() {
        },
    });
  });
});
//nút trừ 1 qty
$(document).ready(function() {
  $('.qtyminus').click(function(e) {
    var form = $(this).parent();
    var quantity = (form).find("input[name='quantity']").val();
    var id = (form).find("input[name='id']").val();
    alert(quantity +id);
    $.ajax({
        url: 'php/cart-process.php',
        method: 'GET',
        data: {pty_minus: quantity, id: id},
        success: function() {
        },
    });
  });
});