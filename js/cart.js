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
    var id = (form).find("input[name='id']").val();
    $.ajax({
        url: 'php/cart-process.php',
        method: 'GET',
        data: {qty_plus: 1, id: id},
        success: function() {
          location.reload();
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
    if(quantity-1 == 0){
      alert("Xoa san pham khoi gio hang");
    }
    $.ajax({
        url: 'php/cart-process.php',
        method: 'GET',
        data: {qty_minus: quantity, id: id},
        success: function() {
          location.reload();
        },
    });
  });
});
//input quantity
$(document).ready(function() {
  $('.qty').on('keyup',function(e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
    var form = $(this).parent();
    var quantity = this.value;
    var id = (form).find("input[name='id']").val();
    $.ajax({
        url: 'php/cart-process.php',
        method: 'GET',
        data: {qty_input: quantity, id: id},
        success: function() {
          location.reload();
        },
    });
  }
  });
});

//Kiểm tra đăng nhập để check out
function ckout(){   
  $.ajax({
    url: 'php/cart-process.php',
    method: 'POST',
    data: {},
    success: function(data){
      if(data == "")
          showck();
      else
          alert(data);
    }
  });
  
}
function showck(){
  var a = document.getElementById("modal_checkout");
  a.style.display = "block";
  a.style.transformOrigin = "top 70%";
  a.style.animation = "Grow ease-in .3s";
}
function exitck(){
  document.getElementById("modal_checkout").style.display = "none";
}