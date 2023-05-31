var namep = document.getElementById("name"),
price = document.getElementById("price"),
quantity = document.getElementById("quantity"),
file = document.getElementById("file"),
description = document.getElementById("description"),
  form = document.getElementById("form");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  if (namep.value === "") {
    errormsg[0].style.color="red";
    errormsg[0].innerHTML = "Product Name cannot be blank";
  } else {
    errormsg[0].innerHTML = "";
  }
  if (price.value === "") {
    errormsg[1].style.color="red";
    errormsg[1].innerHTML = "Price cannot be blank";
  } else {
    errormsg[1].innerHTML = "";
  }

  if (quantity.value === "") {
    errormsg[2].style.color="red";
    errormsg[2].innerHTML ="Quantity cannot be blank";
  } else {
    errormsg[2].innerHTML = "";
  }
  if (file.value === "") {
    errormsg[3].style.color="red";
    errormsg[3].innerHTML = "You need to put an image";
  } else {
    errormsg[3].innerHTML = "";
  }
  if (description.value === "") {
    errormsg[4].style.color="red";
    errormsg[4].innerHTML = "Description cannot be blank";
  } else {
    errormsg[4].innerHTML = "";
  }
  if(!file.type.match('image.*'))
  {
    errormsg[3].style.color="red";
    errormsg[3].innerHTML = "You can put only image";
  }
});
