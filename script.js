document.addEventListener("DOMContentLoaded", function() {
    // Añadir un evento de clic a los botones de filtrado
    const filterForm = document.querySelector('.filter form');
    filterForm.addEventListener('submit', function(event) {
        // Aquí podrías agregar lógica para manejar el filtrado
        alert('Filtrando por: ' + filterForm.categoria.value);
    });
    
    // Ejemplo de agregar un producto al carrito
    const categoryItems = document.querySelectorAll('.category-item a');
    categoryItems.forEach(item => {
        item.addEventListener('click', function(event) {
            const productName = this.querySelector('h2').innerText;
            alert(productName + ' ha sido añadido al carrito.');
            // Aquí puedes agregar lógica para manejar el carrito
        });
    });
});