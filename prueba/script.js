let cartItems = [];

function agregarAlCarrito(nombre, precio) {
    cartItems.push({ nombre, precio });
    actualizarCarrito();
}

function actualizarCarrito() {
    const cartList = document.getElementById('cart-items');
    const totalElement = document.getElementById('total');
    
    cartList.innerHTML = '';
    
    let total = 0;
    cartItems.forEach(item => {
        const listItem = document.createElement('li');
        listItem.textContent = `${item.nombre} - $${item.precio.toFixed(2)}`;
        cartList.appendChild(listItem);
        total += item.precio;
    });

    totalElement.textContent = total.toFixed(2);
}

function calcularTotal() {
    const itb = 0.12; // 12% de ITB
    const totalConItb = cartItems.reduce((acc, item) => acc + item.precio, 0) * (1 + itb);
    alert(`Total con ITB: $${totalConItb.toFixed(2)}`);
}
