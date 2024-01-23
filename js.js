//cambio fotos
function cambiarImg(imageURL) {
    const imagenElement = document.getElementById('imagen1');
    imagenElement.style.backgroundImage = `url(${imageURL})`;
};

//carrito
let carrito = {};

function agregarAlCarrito(producto, precio) {
    if (carrito[producto]) {
        carrito[producto].cantidad++;
    } else {
        carrito[producto] = { precio, cantidad: 1 };
    }
    actualizarCarrito();
};

function vaciarCarrito() {
    carrito = {};
    actualizarCarrito();
};

function quitarDelCarrito(producto) {
    if (carrito[producto] && carrito[producto].cantidad > 0) {
        carrito[producto].cantidad--;
        if (carrito[producto].cantidad === 0) {
            delete carrito[producto];
        }
        actualizarCarrito();
    }
};

function fincompra(){
    alert('Compra realizada');
};

function actualizarCarrito() {
    const itemsCarrito = document.getElementById('itemsCarrito');
    itemsCarrito.innerHTML = '';

    Object.keys(carrito).forEach(producto => {
        const div = document.createElement('div');
        div.innerHTML = `${producto} - Cantidad: ${carrito[producto].cantidad} <button onclick="quitarDelCarrito('${producto}')">Quitar uno</button>`;
        itemsCarrito.appendChild(div);
    });
};
//color fondo
function cambiarFondo(imagen) {
    document.body.style.backgroundImage = imagen;
}