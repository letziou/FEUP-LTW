let subtotal = 0;

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
}

/*const addCart = document.querySelector('.add-button')
if (addCart) {
  addCart.addEventListener('click', async function() {
    const response = await fetch('../api/api_dishes.php?id_Dishes=' + this.value)
    const dishes = await response.json()
    console.log(response)

    const section = document.querySelector('.menu-item')
    section.innerHTML = ''
/*
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




