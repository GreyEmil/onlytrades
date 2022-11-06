var firstname = document.getElementById("FirstN"),
  lastname = document.getElementById("lastN"),
  user = document.getElementById("user"),
  email = document.getElementById("email"),
  password = document.getElementById("password"),
  confirmpassword = document.getElementById("confirmP"),
  form = document.getElementById("form"),
  errormsg = document.getElementsByClassName("error"),
  suc_icon = document.getElementsByClassName("success-icon"),
  fail_icon = document.getElementsByClassName("failure-icon");
form.addEventListener("submit", (e) => {
  e.preventDefault();
  if (firstname.value === "") {
    errormsg[0].innerHTML = "first name cannot be blank";
    fail_icon[0].style.opacity = "1";
    suc_icon[0].style.opacity = "0";
  } else {
    errormsg[0].innerHTML = "";
    fail_icon[0].style.opacity = "0";
    suc_icon[0].style.opacity = "1";
  }
  if (lastname.value === "") {
    errormsg[1].innerHTML = "Last name cannot be blank";
    fail_icon[1].style.opacity = "1";
    suc_icon[1].style.opacity = "0";
  } else {
    errormsg[1].innerHTML = "";
    fail_icon[1].style.opacity = "0";
    suc_icon[1].style.opacity = "1";
  }

  if (user.value === "") {
    errormsg[2].innerHTML = "Username cannot be blank";
    fail_icon[2].style.opacity = "1";
    suc_icon[2].style.opacity = "0";
  } else {
    errormsg[2].innerHTML = "";
    fail_icon[2].style.opacity = "0";
    suc_icon[2].style.opacity = "1";
  }
  if (email.value === "") {
    errormsg[3].innerHTML = "email cannot be blank";
    fail_icon[3].style.opacity = "1";
    suc_icon[3].style.opacity = "0";
  } else {
    errormsg[3].innerHTML = "";
    fail_icon[3].style.opacity = "0";
    suc_icon[3].style.opacity = "1";
  }
  if (password.value === "") {
    errormsg[4].innerHTML = "password cannot be blank";
    fail_icon[4].style.opacity = "1";
    suc_icon[4].style.opacity = "0";
  } else {
    errormsg[4].innerHTML = "";
    fail_icon[4].style.opacity = "0";
    suc_icon[4].style.opacity = "1";
  }
  if (confirmpassword.value === "") {
    errormsg[5].innerHTML = "confirmation cannot be blank";
    fail_icon[5].style.opacity = "1";
    suc_icon[5].style.opacity = "0";
  } else {
    errormsg[5].innerHTML = "";
    fail_icon[5].style.opacity = "0";
    suc_icon[5].style.opacity = "1";
  }
});
