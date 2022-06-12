let subtotal = 0;

function getNewDish(imgURL, title, price){
  let value = 1;
  let ul = document.createElement("ul");
  let li = document.createElement("li");
  let img = document.createElement("img");
  let holder = document.createElement("div");
  let header = document.createElement("p");
  let pricee = document.createElement("p");
  let remove = document.createElement("i");
  //let quantity = document.createElement("input");
  //quantity.className = "quantity-item";
  li.className = "cart-item";
  remove.className = "fa-solid fa-trash-can fa-lg";
  pricee.className = "g-price";
  header.className = "cart-item-heading";
  holder.className = "cart-item-dets";
  //quantity.type = "number";
  //quantity.value = "1";
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
  //li.appendChild(quantity);
  ul.appendChild(li);

  remove.addEventListener("click", function(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    updateRemoveTotal(price);
  });
  
  updateTotal(price);

  /*quantity.addEventListener("change", function(event) {
    var quantityChanged = event.target;
    if(isNaN(quantityChanged.value) || quantityChanged.value <= 0) {
      quantityChanged.value = 1;
    }
    value = quantityChanged.value;
    console.log(value);
    value =  (value * price);
    console.log(price,value);
    updateTotalSub(price,value);
  });*/

  return ul;
}

/*function updateTotalSub(price,value) {
  sub = parseFloat(value);
  if(value > sub)
  subtotal = parseFloat(subtotal) + parseFloat(value);
  subtotal = subtotal.toFixed(2);
  let tax = parseFloat(subtotal) * 0.22;
  tax = tax.toFixed(2);
  let total = parseFloat(subtotal) + parseFloat(tax);
  total = total.toFixed(2);
  document.getElementById("#subtotal_tax").innerHTML = subtotal + "€";
  document.getElementById("#total_tax").innerHTML = tax + "€";
  document.getElementById("#total").innerHTML = total + "€";

}*/

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

function addToCart(dish){
  let title = dish[1];
  console.log(dish[1]);
  let price = dish[2];
  let imgURL = dish[0];
  let cart = document.getElementById("#cart_");
  cart.appendChild(getNewDish(imgURL, title, price));
}











/*let subtotal = 0;
let controller = true;

const calculateTax = subtotal => {
  const tax = subtotal * 0.22;
  const formattedTax = tax.toFixed(2);
  return formattedTax;
};

const calculateTotal = subtotal => {
  const tax = calculateTax(subtotal);
  const total = parseFloat(subtotal) + parseFloat(tax);
  const formattedTotal = total.toFixed(2);
  return formattedTotal;
};

function sumTotal(price) {
  subtotal = subtotal + price;
  const formattedSubtotal = subtotal.toFixed(2);
  const tax = calculateTax(subtotal);
  const total = calculateTotal(subtotal);

 
  const totalP = `
    <p class="cart-math-item">
      <span class="cart-math-header">Subtotal:</span>
      <span class="g-price subtotal">${formattedSubtotal}€</span>
    </p>
    <p class="cart-math-item">
      <span class="cart-math-header">Tax:</span>
      <span class="g-price tax">${tax}€</span>
    </p>
    <p class="cart-math-item">
      <span class="cart-math-header">Total:</span>
      <span class="g-price total">${total}€</span>
    </p>
  `;

  let myTotal = document.getElementById("#cart_m");
  let newTotal = document.createElement("p");
  newTotal.innerHTML = totalP;
  myTotal.appendChild(newTotal);
}

function addToCart(dish) {
  const title = dish[1];
  const price = dish[2];
  const imgLink = dish[0];
  console.log(dish);

  const Dish = `
    <li class="cart-item">
      <img src="images/Food_images/${imgLink}" alt="${title}">
      <div class="cart-item-dets">
        <p class="cart-item-heading">${title}</p>
        <p class="g-price">${price}€</p>
      </div>
    </li>
  `;


  let myCart = document.getElementById("#cart_");
  let newDish = document.createElement("ul");
  newDish.innerHTML= Dish; 
  myCart.appendChild(newDish);
  sumTotal(dish[2]);
  if(controller) {
    sumTotal(dish[2]);
    controller = false;
  }
  else {
    sumTotal2(dish[2]);
  }
}
/*
const addCart = document.querySelector('.add-button')
if (addCart) {
  addCart.addEventListener('click', async function() {
    const response = await fetch('../api/api_dishes.php?id_Dishes=' + this.value)
    const dishes = await response.json()
    console.log(response)

    const section = document.querySelector('.menu-item')
    section.innerHTML = ''

    //continuar depois ... não sei como chegar ao path da imagem através do dish
    for (const dish of dishes) {
      const article = document.createElement('article')
      const img = document.createElement('img')
      img.src = 'dish.'
      const link = document.createElement('a')
      link.href = '../pages/artist.php?id=' + artist.id
      link.textContent = artist.name
      article.appendChild(img)
      article.appendChild(link)
      section.appendChild(article)
    }
  })
}*/




