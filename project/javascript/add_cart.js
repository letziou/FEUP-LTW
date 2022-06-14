let subtotal = 0;
let dishes = [];

function addToCart(dish){
  let title = dish[1];
  console.log(dish[1]);
  let price = dish[2];
  let id = dish[3];
  let imgURL = dish[0];
  let cart = document.getElementById("#cart_");
  cart.appendChild(getNewDish(imgURL, title, price,id));
}


function getNewDish(imgURL, title, price, id){
  console.log(id)
  let ul = document.createElement("ul");
  let li = document.createElement("li");
  let img = document.createElement("img");
  let holder = document.createElement("div");
  let header = document.createElement("p");
  let pricee = document.createElement("p");
  let remove = document.createElement("i");
  li.className = "cart-item";
  remove.className = "fa-solid fa-trash-can fa-lg";
  pricee.className = "g-price";
  header.className = "cart-item-heading";
  holder.className = "cart-item-dets";
  remove.style = "color: red";
  pricee.id = title;
  pricee.innerHTML = price + "€";
  header.innerHTML = title;

  img.src = "images/Food_images/" + imgURL;
  img.alt = title;
  holder.appendChild(header);
  holder.appendChild(pricee);
  li.appendChild(img);
  li.appendChild(holder);
  li.appendChild(remove);
  ul.appendChild(li);

  remove.addEventListener("click", function(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    updateRemoveTotal(price);
  });
  
  updateTotal(price);

  dishes = [title, price, imgURL];

  //console.log(dishes)
  json_request = {};
  json_request['id'] = dishes;

  response(json_request);
  //console.log(json_request['id']);



  return ul;
}


async function response(json_request) {
  let response = await fetch("../template/restaurant.tpl.php", {
    method: "POST",
    body: JSON.stringify(json_request),
  });
  console.log(response);
}


function updateTotal(price) {
  subtotal = parseFloat(subtotal) + parseFloat(price);
  subtotal = subtotal.toFixed(2);
  let tax = parseFloat(subtotal) * 0.22;
  tax = tax.toFixed(2);
  let total = parseFloat(subtotal) + parseFloat(tax);
  total = total.toFixed(2);
  document.getElementById("#subtotal_tax").innerHTML = subtotal + "€";
  document.getElementById("#total_tax").innerHTML = tax + "€";
  document.getElementById("#total").innerHTML = total + "€";
}

function updateRemoveTotal(price) {
  subtotal = parseFloat(subtotal) - parseFloat(price);
  subtotal = subtotal.toFixed(2);
  let tax = parseFloat(subtotal) * 0.22;
  tax = tax.toFixed(2);
  let total = parseFloat(subtotal) + parseFloat(tax);
  document.getElementById("#subtotal_tax").innerHTML = subtotal + "€";
  document.getElementById("#total_tax").innerHTML = tax + "€";
  document.getElementById("#total").innerHTML = total + "€";
}