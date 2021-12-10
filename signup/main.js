// running the main.js
//console.log(running);

let carts = document.querySelectorAll('.add-cart');

// array to store all the products
let products = [
    //avocado
    {
        name:'Avocado',
        tag:'avocado',
        price:6.90,
        inCart:0
    },
    //guava
    {
        name:'Guava',
        tag:'guava',
        price:4.20,
        inCart:0
    },
    //mango
    {
        name:'Mango',
        tag:'mango',
        price:6.90,
        inCart:0
    },

    //cucumber
    {
        name:'Cucumber',
        tag:'cucumber',
        price:5.20,
        inCart:0
    },
    //watermelon
    {
        name:'Watermelon',
        tag:'watermelon',
        price:8.00,
        inCart:0
    },
    //banana
    {
        name:'Banana',
        tag:'banana',
        price:7.50,
        inCart:0
    },
    //egg
    {
        name:'Egg',
        tag:'egg',
        price:5.50,
        inCart:0
    },
    //apples
    {
        name:'Apple',
        tag:'apple',
        price:6.00,
        inCart:0
    },
    //cabbage
    {
        name:'Cabbage',
        tag:'cabbage',
        price:4.90,
        inCart:0
    },    
//ANIMALS
    //SHEEP
    {
        name:'Sheep',
        tag:'sheep',
        price:200.00,
        inCart:0
    },
    //Turkey
    {
        name:'Turkey',
        tag:'turkey',
        price:15.00,
        inCart:0
    },
    //Cow
    {
        name:'Cow',
        tag:'cow',
        price:350.00,
        inCart:0
    },            

    //PIG
    {
        name:'Pig',
        tag:'pig',
        price:110.00,
        inCart:0
    },
    //Donkey
    {
        name:'Donkey',
        tag:'donkey',
        price:150.00,
        inCart:0
    },
    //Chicken
    {
        name:'Chicken',
        tag:'chicken',
        price:8.00,
        inCart:0
    }         
]

//looping through all the add-cart buttons
// event listener
for(let i=0; i < carts.length; i++){
    carts[i].addEventListener('click',()=>{
            cartNumbers(products[i]);
            totalCost(products[i])
    }
    )
}

// to maintain the items in cart after refreshing page
function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');

    if(productNumbers){
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

// for whatever is in the cart to be remebered even after refreshing the page
function cartNumbers(product){
    //console.log('The product clicked is ', product)
    let productNumbers = localStorage.getItem('cartNumbers');
    //converting from string to number
    productNumbers = parseInt(productNumbers);

    //check if there is something already in the local storage
    if(productNumbers){
        localStorage.setItem('cartNumbers',productNumbers+1);
        document.querySelector('.cart span').textContent = productNumbers+1;
    }else{
        localStorage.setItem('cartNumbers',1);
        document.querySelector('.cart span').textContent = 1;
    }
    
    setItems(product);
}

function setItems(product){
    // console.log("Inside of the SetItems function");
    // console.log("My product is ",product)

    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    //console.log('My cartItems are ', cartItems);

    //checking if cart item already exist
    if(cartItems != null){
        if(cartItems[product.tag] ==undefined){
            cartItems= {
                ...cartItems,
                [product.tag]:product
            }
        }
        cartItems[product.tag].inCart +=1;
    }else{
        product.inCart = 1;
        cartItems = {
            [product.tag]:product
        }
    }

    localStorage.setItem('productsInCart', JSON.stringify(cartItems));
}

//calcultating total item cost
function totalCost(product){
    //console.log('The product price is ', product.price);

    //checking if the total cost has already been updated
    
    // let cartCost = localStorage.getItem('totalCost');
    // cartCost = parseInt(cartCost);
    // console.log('My cartCost is ', cartCost);
    // console.log(typeof cartCost);

    // if(cartCost != null){
    //     localStorage.setItem("totalCost", cartCost + product.price);
    // }else{
    //     localStorage.setItem("totalCost", product.price);
    // }

    let cartCost = 0;
    if(cartCost != null){

        cartCost = localStorage.getItem('totalCost');

        if(cartCost != null){

            cartCost = parseInt(cartCost);
            localStorage.setItem("totalCost",cartCost + product.price);

        }else{

            localStorage.setItem("totalCost", product.price);
        }

    }
}

//function to display whats in the cart
function displayCart(){
    let cartItems = localStorage.getItem("productsInCart")
    cartItems = JSON.parse(cartItems);
    
    let productContainer = document.querySelector(".products");
    let cartCost = localStorage.getItem('totalCost');
    
    if(cartItems && productContainer){
        //console.log("running");
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item =>{
            productContainer.innerHTML += `
            <div class="product">
                <ion-icon name="close-circle"></ion-icon>
                <img src="" alt="IMAGE">
                <span>${item.name}</span>
            </div>
            <div class="price">$${item.price}0</div>
            <div class="quantity">
                <ion-icon class="decrease"
                name="arrow-dropleft-circle"></ion-icon>
                <span>${item.inCart}</span>
                <ion-icon class="increse"
                name ="arrow-dropright-circle"></ion-icon>
            </div>
            <div class="total">
                $${item.inCart * item.price}0
            </div>
            `
        });

        productContainer.innerHTML += `
            <div class="basketTotalContainer">
                <h4 class ="basketTotalTitle">
                    Basket Total
                </h4>
                <h4 class="basketTotal">
                    $${cartCost}
                </h4>
        `
    }
}


//functions that run whenever the page is loaded
// calling the function to maintain items in the cart
onLoadCartNumbers();
displayCart();