document.addEventListener("DOMContentLoaded", function() {
    // change buttons for logged users
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("id")) {
        document.querySelector("#nav-links-signin").style.display = "none";
    }
    else {
        document.querySelector("#nav-links-user").style.display = "none";
    }

    document.querySelector("#nav-links-user").onclick = function() {
        let userId = urlParams.get("id");
        location.href = `profile.html?id=${userId}`;
    }

    // TODO 
    // learn node (edx) and connect node server & read from db to read from db + use php in it
});