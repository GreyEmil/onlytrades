
var category = document.getElementById("category"),
  namee = document.getElementById("name"),
  description = document.getElementById("description"),
  image1 = document.getElementById("image1"),
  form = document.getElementById("form"),
  errormsg = document.getElementsByClassName("error");
  form.addEventListener("submit", (e) => {
  
   if (category.value === "") {
     errormsg[0].innerHTML = "category cannot be blank";
     console.log("ahla1");
     e.preventDefault();
     document.getElementById("reg-log").checked=false;

   } else {
     errormsg[0].innerHTML = "";
     console.log("ahla1");
   }
  if (namee.value === "") {
    errormsg[1].innerHTML = "name cannot be blank";
    console.log("ahla2");
    e.preventDefault();
    document.getElementById("reg-log").checked=false;
  } else {
    errormsg[1].innerHTML = "";
    console.log("ahla1");
  }
  if (description.value === "") {
    errormsg[2].innerHTML = "description cannot be blank";
    console.log("ahla3");
    e.preventDefault();
    document.getElementById("reg-log").checked=false;
  } else {
    errormsg[2].innerHTML = "";
    console.log("ahla1");
  }

  if (image1.value === "") {
    errormsg[3].innerHTML = "you need to select images first";
    console.log("ahla4");
    e.preventDefault();

  } else {
    errormsg[3].innerHTML = "";
    console.log("ahla1");
  }
});
