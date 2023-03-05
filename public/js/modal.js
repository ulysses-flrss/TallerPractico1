let $modal = document.querySelector(".modal-container")
let $close = document.getElementById("close")
let $verDetalle = document.getElementById("details")
let $body = document.getElementById("body")

//$verDetalle.addEventListener("click")

$close.addEventListener("click", () => {
    $modal.style.display = "none";
})