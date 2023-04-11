function addNewProduct() {
    let new_prod = document.createElement("div");
    new_prod.className = "good";

    // adding image
    new_prod.append(document.createElement("img"));
    
    // adding inner div
    let new_inner_div = document.createElement("div");
    
    // product header
    let prod_head = document.querySelector("h3");
    prod_head.innerHTML = document.querySelector("#goods-new-name").value;
    new_inner_div.append(prod_head);
    
    // product price
    let prod_price = document.querySelector("p");
    prod_price.innerHTML = document.querySelector("#goods-new-price").value;
    new_inner_div.append(prod_price);
    
    new_prod.append(new_inner_div);

    // product description
    let prod_desc = document.querySelector("p");
    prod_desc.innerHTML = document.querySelector("#goods-new-desc").value;
    new_prod.append(document.createElement(prod_desc));

    document.querySelector("#goods").append(new_prod);
}

document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);

    // TODO get user information from db (node or connect to php or json)

    // TODO create new goods
    document.querySelector("#new-create").onclick = function() {
        addNewProduct();
        document.querySelector("#goods-new-name").value = "";
        document.querySelector("#goods-new-price").value = "";
        document.querySelector("#goods-new-desc").value = "";
    };

    document.querySelector("#nav-links-back").onclick = function() {
        let userId = urlParams.get("id");
        location.href = `index.html?id=${userId}`;
    };
});