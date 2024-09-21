document.getElementById("form").addEventListener("click", (e) => {
  e.preventDefault();
});
function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function validateName(name) {
  const nameRegex = /^[a-zA-Z\s]+$/;
  return nameRegex.test(name);
}

let verifyPass = (pass) => {
  const passRegEx = /[[a-zA-Z]+[0-9]+[\!\@\#\$\%\*\,\.\<\>]+]+/;
  if (pass.length > 8 && pass.length < 20) {
    return passRegEx.test(pass);
  } else {
    return false;
  }
};
let button = document.getElementById("btnSubmit");
button.addEventListener("click", () => {
  let name = document.querySelector("#name").value;
  let email = document.querySelector("#email").value;
  let phone = document.querySelector("#phone").value;
  let pass = document.getElementById("pass").value;
  if (name.length < 4 || !validateName()) {
    alert("Invalid Name");
  }
  if (!validateEmail(email)) {
    alert("Invalid email");
  }
  if (phone.length < 10) {
    alert("Invalid Phone Number");
  }
  if (!verifyPass(pass)) {
    alert("Invalid Password");
  }

});
