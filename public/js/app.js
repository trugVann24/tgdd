
    function calculateTotalCost() {
        var quantity = parseFloat(document.getElementById('quantity').value) || 0;
        var price = parseFloat(document.getElementById('price').value) || 0;
        var totalCost = quantity * price;
        document.getElementById('total_cost').value = totalCost.toFixed(0); 


        
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

    function updatePriceProduct() {
        var productId = document.getElementById('product_id').value;
        var sellPrice = document.querySelector('#product_id option[value="' + productId + '"]').getAttribute('data-sell-price');
        document.getElementById('price').value = sellPrice;
    }

    function updatePriceProductStore() {
        var producstore = document.getElementById('productStore_name').value;
        var sellPrice = document.querySelector('#productStore_name option[value="' + producstore + '"]').getAttribute('data-sell-price');
        document.getElementById('price').value = sellPrice;
    }

    function HidenTrangchu(subMenuId) {
        var subMenu = document.getElementById(subMenuId);
        subMenu.classList.toggle('hidden'); 

        var icon = document.getElementById('iconTrangchu');

        if (subMenu.style.display === '' || subMenu.style.display === 'none') {
            subMenu.style.display = 'block';
            icon.classList.remove('bx-chevron-down');
            icon.classList.add('bx-chevron-up');
        } else {
            subMenu.style.display = 'none';
            icon.classList.remove('bx-chevron-up');
            icon.classList.add('bx-chevron-down');
        }
    }


    function HidenBanhang(subMenuId) {
        var subMenu = document.getElementById(subMenuId);
        subMenu.classList.toggle('hidden'); 

        var icon = document.getElementById('iconBanhang');


        if (subMenu.style.display === 'none' || subMenu.style.display === '') {
            subMenu.style.display = 'block';
            icon.classList.remove('bx-chevron-down');
            icon.classList.add('bx-chevron-up');
        } else {
            subMenu.style.display = 'none';
            icon.classList.remove('bx-chevron-up');
            icon.classList.add('bx-chevron-down');
        }
    }

        function HidenKho(subMenuId) {
            var subMenu = document.getElementById(subMenuId);
            subMenu.classList.toggle('hidden'); 
    
            var icon = document.getElementById('iconKho');

            if (subMenu.style.display === 'none' || subMenu.style.display === '') {
                subMenu.style.display = 'block';
                icon.classList.remove('bx-chevron-down');
                icon.classList.add('bx-chevron-up');
            } else {
                subMenu.style.display = 'none';
                icon.classList.remove('bx-chevron-up');
                icon.classList.add('bx-chevron-down');
            }
        }
        function HidenAdmin(subMenuId) {
            var subMenu = document.getElementById(subMenuId);
            subMenu.classList.toggle('hidden'); 
    
            var icon = document.getElementById('iconAdmin');

            if (subMenu.style.display === 'none' || subMenu.style.display === '') {
                subMenu.style.display = 'block';
                icon.classList.remove('bx-chevron-down');
                icon.classList.add('bx-chevron-up');
            } else {
                subMenu.style.display = 'none';
                icon.classList.remove('bx-chevron-up');
                icon.classList.add('bx-chevron-down');
            }
        }

   
        