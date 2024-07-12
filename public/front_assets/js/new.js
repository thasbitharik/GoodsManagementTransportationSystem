
window.onload = function () {
    var sizeDropdown = document.getElementById('size');
    var deliveryDropdown = document.getElementById('delivery_type');

    // Add event listeners to the dropdowns
    sizeDropdown.addEventListener('change', calculateTotal);
    deliveryDropdown.addEventListener('change', calculateTotal);

    // Function to calculate and display the total amount
    function calculateTotal() {
        // Get the selected values from the dropdowns
        var size = sizeDropdown.value;
        var delivery = deliveryDropdown.value;

        // Define the price for each size and delivery type
        var sizePrices = {
            s: 10
            , m: 15
            , l: 20
            , xl: 25
        };

        var deliveryPrices = {
            normal: 0
            , express: 5
        };

        // Calculate the total amount
        var totalAmount = sizePrices[size] + deliveryPrices[delivery];

        // Display the total amount
        var totalInput = document.getElementById('total');
        totalInput.value = totalAmount;
    }
};
