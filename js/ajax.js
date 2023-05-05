
$(document).ready(function() {
  $('.form_item').on('submit', function(e) {
    e.preventDefault();
    var id = $(this).find('input[name="id"]').val();
    var name = $(this).find('input[name="name"]').val();
    var price = $(this).find('input[name="price"]').val();
    var image = $(this).find('input[name="image"]').val();
    $.ajax({
      url: 'php/cart.php',
      method: 'POST',
      data: {id: id, name: name, price: price, image: image},
      success: function(data) {
        $('#cart').html(data);
        alert('Product has been added to cart');
      }
    });
  });
});
$(document).ready(function() {
  $('.cart_item').on('submit', function(e) {
    var id = $(this).find('input[name="remove_id"]').val();
    $.ajax({
      url: 'php/cart.php',
      method: 'POST',
      data: {remove_id: id},
      success: function(id) {
        $('#cart').html(id);
        alert('Product has been delete from cart');
      }
    });
  });
});