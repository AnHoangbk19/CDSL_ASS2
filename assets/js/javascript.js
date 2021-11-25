function categoryClick(category){
    document.getElementById("category").innerHTML = category;
}

function changeBuyQuantity(i){
    var curQuantity = Number(document.getElementById("buy-quantity").innerHTML);
    if (i==-1) curQuantity -= 1;
    else if (i==1) curQuantity += 1;
    document.getElementById("buy-quantity").innerHTML = curQuantity;
}