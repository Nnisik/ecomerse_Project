function hideAllPages() {
    document.querySelector('.signup-page').style.display = 'none';
    document.querySelector('.login-page').style.display = 'none';
}

function showPage(page) {
    hideAllPages()
    document.querySelector(`#${page}`).style.display = 'block';
}

document.addEventListener('DOMContentLoaded', function() {
    // display changing
    document.querySelector('.signup-page').style.display = 'none';

    // go to user cart
    document.querySelector('#nav-links-cart').onclick = () => {
        window.location.href = "shop-cart.html";
    };

    document.querySelectorAll('.page').forEach(button => {
        button.onclick = function() {
            showPage(this.dataset.page);
        }
    });
});