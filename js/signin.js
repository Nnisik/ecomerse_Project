function hideAllPages() {
    document.querySelector(".login-page").style.display = "none";
    document.querySelector(".signup-page").style.display = "none";
}
// Shows one page and hides the other two
function showPage(page) {
    // Hide all of the divs:
    hideAllPages();

    // Show the div provided in the argument
    document.querySelector(`#${page}`).style.display = 'block';
}

document.addEventListener("DOMContentLoaded", () => {
    hideAllPages();
    document.querySelector(".login-page").style.display = "flex";

    document.querySelectorAll('.page').forEach(button => {
        // When a button is clicked, switch to that page
        button.onclick = function() {
            showPage(this.dataset.page);
        }
    })
});