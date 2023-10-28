// Sample data for the user's cart (you should implement the cart functionality)
const userCart = [
    { name: "Biriyani", price: 150 },
    { name: "Dim Bhaji", price: 30 },
    // Add more selected items
];

// Function to calculate the total amount
function calculateTotal() {
    return userCart.reduce((total, item) => total + item.price, 0);
}

// Get references to HTML elements
const cartElement = document.getElementById("cart");
const totalAmountElement = document.getElementById("totalAmount");
const proceedToPaymentButton = document.getElementById("proceedToPaymentButton");

// Display selected items in the cart
userCart.forEach((item) => {
    const cartItem = document.createElement("div");
    cartItem.innerHTML = `<p>${item.name} - $${item.price}</p>`;
    cartElement.appendChild(cartItem);
});

// Calculate and display the total amount
const totalAmount = calculateTotal();
totalAmountElement.textContent = totalAmount;

// Add an event listener for the "Proceed to Payment" button
proceedToPaymentButton.addEventListener("click", () => {
    // Implement code to proceed with the payment (which will vary based on your system)
    // You can redirect the user to a payment gateway or implement payment processing here
    // After payment, you can clear the user's cart and update stock quantities

    // For demonstration, let's show an alert with a success message
    alert("Payment successful! Your order has been placed.");
    // Redirect to the home page after payment
    window.location.href = "home.html";
});
