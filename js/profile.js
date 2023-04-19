document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);

  // TODO: get user information from db (node or connect to php or json)

  document.querySelector("#nav-links-back").onclick = function () {
    let userId = urlParams.get("id");
    location.href = `index.html?id=${userId}`;
  };

  document.querySelector("#new-create").onclick = function () {
    const name = document.querySelector("#goods-new-name").value;
    const categ = document.querySelector("#goods-new-cat").value;
    const price = document.querySelector("#goods-new-price").value;
    const desc = document.querySelector("#goods-new-desc").value;

    const new_prod = document.createElement("div");
    new_prod.className = "good";

    const new_prod_info = document.createElement("div");
    new_prod_info.className = "good-info";

    const new_name = document.createElement("h5");
    new_name.innerHTML = name;
    new_prod_info.append(new_name);

    const new_categ = document.createElement("h6");
    new_categ.innerHTML = categ;
    new_prod_info.append(new_categ);

    const new_desc = document.createElement("p");
    new_desc.innerHTML = desc;
    new_prod_info.append(new_desc);

    const new_price = document.createElement("h4");
    new_price.innerHTML = price;
    new_prod_info.append(new_price);

    new_prod.append(new_prod_info);
    document.querySelector("#goods").append(new_prod);

    document.querySelector("#goods-new-name").value = "";
    document.querySelector("#goods-new-cat").value = "";
    document.querySelector("#goods-new-price").value = "";
    document.querySelector("#goods-new-desc").value = "";
  };
});
