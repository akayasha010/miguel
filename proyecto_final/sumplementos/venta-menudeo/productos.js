document.querySelectorAll('.producto').forEach((producto) => {
    const decrementBtn = producto.querySelector('.decrementar');
    const incrementBtn = producto.querySelector('.incrementar');
    const quantityInput = producto.querySelector('input');

    decrementBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    incrementBtn.addEventListener('click', () => {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });
});
