let subtotal = 0;
let dishes = [];
let purchaseCart = [];
let itr = 0;

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
  purchaseCart[itr] = id
  //console.log(id)
  //console.log(purchaseCart[itr] + "itr" + itr);
  itr++;
  let ul = document.createElement("ul");
  let li = document.createElement("li");
  let img = document.createElement("img");
  let holder = document.createElement("div");
  let header = document.createElement("p");
  let pricee = document.createElement("p");
  let remove = document.createElement("i");
  li.className = "cart-item";
  ul.name = ""
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
    console.log(buttonClicked);
    itr--;
    updateRemoveTotal(price,id);
  });
  
  updateTotal(price);

  dishes = [id];

  //console.log(dishes)
  json_request = {};
  json_request["ids"] = dishes;
  
  //response(json_request);
  //console.log(json_request['ids']);
  //printArray();

  return ul;
}

//document.getElementsByClassName("add-prch").addEventListener('click',purchaseSession)





/*async function response(json_request) {
  console.log(json_request);
  let response = await fetch("../api/api_dishes.php", {
    method: "POST",
    body: JSON.stringify(json_request),
  });
  const dishes = await response.json()  
  //console.log(dishes);
}
*/

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

function updateRemoveTotal(price,id) {
  const index = purchaseCart.indexOf(id);
  if (index > -1) {
    purchaseCart.splice(index, 1);
    console.log(id)
  }
  subtotal = parseFloat(subtotal) - parseFloat(price);
  subtotal = subtotal.toFixed(2);
  let tax = parseFloat(subtotal) * 0.22;
  tax = tax.toFixed(2);
  let total = parseFloat(subtotal) + parseFloat(tax);
  document.getElementById("#subtotal_tax").innerHTML = subtotal + "€";
  document.getElementById("#total_tax").innerHTML = tax + "€";
  document.getElementById("#total").innerHTML = total + "€";
}