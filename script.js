document.addEventListener('DOMContentLoaded', function() {
    // go to sign in page button
    document.querySelector('#nav-links-signin').onclick = () => {
        window.location.href = "signin.html";
    };

    // go to user cart
    document.querySelector('#nav-links-cart').onclick = () => {
        window.location.href = "shop-cart.html";
    };
});