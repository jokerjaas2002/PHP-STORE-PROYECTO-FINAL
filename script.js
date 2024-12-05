document.addEventListener("DOMContentLoaded", function() {
    
    const filterForm = document.querySelector('.filter form');
    filterForm.addEventListener('submit', function(event) {
        
        alert('Filtrando por: ' + filterForm.categoria.value);
    });
    
    
    const categoryItems = document.querySelectorAll('.category-item a');
    categoryItems.forEach(item => {
        item.addEventListener('click', function(event) {
            const productName = this.querySelector('h2').innerText;
            alert(productName + ' ha sido añadido al carrito.');
           
        });
    });
});