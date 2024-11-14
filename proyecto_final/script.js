document.querySelectorAll('.carousel-item').forEach((item) => {
    const quantityElement = item.querySelector('.quantity');
    let quantity = parseInt(quantityElement.innerText);

    // Evento para incrementar cantidad
    item.querySelector('.increment').addEventListener('click', () => {
        quantity += 1;
        quantityElement.innerText = quantity;
    });

    // Evento para decrementar cantidad, con un mínimo de 1
    item.querySelector('.decrement').addEventListener('click', () => {
        if (quantity > 1) {
            quantity -= 1;
            quantityElement.innerText = quantity;
        }
    });
});

// Código para el carrusel
document.querySelectorAll('.carousel').forEach((carousel) => {
    const items = carousel.querySelectorAll('.carousel-item');
    const nextButton = carousel.parentElement.querySelector('.next');
    const prevButton = carousel.parentElement.querySelector('.prev');

    let index = 0;
    const totalItems = items.length;
    const itemsPerView = 2;

    function updateCarousel() {
        if (index <= 0) {
            index = 0;
            prevButton.disabled = true;
        } else {
            prevButton.disabled = false;
        }

        if (index >= totalItems - itemsPerView) {
            index = totalItems - itemsPerView;
            nextButton.disabled = true;
        } else {
            nextButton.disabled = false;
        }

        carousel.style.transform = `translateX(-${(index * 100) / itemsPerView}%)`;
    }

    nextButton.addEventListener('click', () => {
        index += itemsPerView;
        updateCarousel();
    });

    prevButton.addEventListener('click', () => {
        index -= itemsPerView;
        updateCarousel();
    });

    updateCarousel();
});
