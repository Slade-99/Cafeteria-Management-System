const menuData = [
    {
        name: "Biriyani",
        price: 150,
        imageSrc: "biriyani.jpg" 
    },
    {
        name: "Paratha",
        price: 20,
        imageSrc: "paratha.jpg"
    },
    {
        name: "Dim Bhaji",
        price: 30,
        imageSrc: "dim_bhaji.jpg"
    },
];

//Reference to the menu container
const menuContainer = document.getElementById("menu-container");

//Iterating through the menu data and creating elements for each item
menuData.forEach(item => {
    const menuItem = document.createElement("div");
    menuItem.classList.add("menu-item");
    menuItem.innerHTML = `
        <h3>${item.name}</h3>
        <div class="gg"><img src="${item.imageSrc}" alt="${item.name}">
        <p>Price: $${item.price}</p>
        <button>Add to Cart</button>
        </div>   
    `;
    menuContainer.appendChild(menuItem);
});

//Checkout button
const checkoutButton = document.getElementById("checkoutButton");

//Event listener for the "Add to Cart" buttons
menuElement.addEventListener("click", (event) => {
    if (event.target.classList.contains("add-to-cart")) {
        const itemName = event.target.getAttribute("data-item");
        console.log(`Added ${itemName} to the cart`);
    }
});

//Event listener for the checkout button
checkoutButton.addEventListener("click", () => {
    // Proceed to the checkout page
    window.location.href = "checkout.html";
});
