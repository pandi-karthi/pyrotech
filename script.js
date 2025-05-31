const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click',() =>{
        nav.classList.add('active');
    })
}
if (close) {
    close.addEventListener('click',() =>{
        nav.classList.remove('active');
    })
}

/* Bottom to Top button */

const toTop = document.querySelector(".to-top");

window.addEventListener("scroll", () => {
    if(window.pageYOffset > 100) {
        toTop.classList.add("active");
    }else{
        toTop.classList.remove("active");
    }
})


/* Price List */


function calculateTotal(index) {
    const price = parseFloat(document.getElementById('price_' + index).innerText) || 0;
    const qty = parseInt(document.getElementById('qty_' + index).value) || 0;
    const total = price * qty;
    document.getElementById('total_' + index).innerText = total.toFixed(2);
    updateGrandTotal();
}

function updateGrandTotal() {
    let total = 0;
    for (let i = 0; i < numProducts; i++) {
        total += parseFloat(document.getElementById('total_' + i).innerText) || 0;
    }
    document.getElementById('grandTotal').innerText = total.toFixed(2);
}

function prepareOrderData() {
    const order = {
        items: [],
        grandTotal: 0
    };

    for (let i = 0; i < numProducts; i++) {
        const qty = parseInt(document.getElementById('qty_' + i).value) || 0;
        if (qty > 0) {
            const name = document.getElementById('name_' + i).value;
            const price = parseFloat(document.getElementById('price_' + i).innerText) || 0;
            const subtotal = price * qty;

            order.items.push({
                name: name,
                price: price,
                qty: qty,
                subtotal: subtotal
            });

            order.grandTotal += subtotal;
        }
    }

    if (order.items.length === 0) {
        alert("⚠️ Please select at least one item before checkout.");
        return false;
    }

    document.getElementById('order_data').value = JSON.stringify(order);
    return true;
}