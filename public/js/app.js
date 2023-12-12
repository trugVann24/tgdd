
    function calculateTotalCost() {
        // Get the values of quantity and price
        var quantity = parseFloat(document.getElementById('quantity').value) || 0;
        var price = parseFloat(document.getElementById('price').value) || 0;

        // Calculate the total cost
        var totalCost = quantity * price;

        // Update the total cost field
        document.getElementById('total_cost').value = totalCost.toFixed(0); // Adjust to the desired number of decimal places
    }

    document.getElementById('search').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            let text = row.innerText.toLowerCase();
            if (text.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });