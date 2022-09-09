// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

//select reg button
const registerForm = document.querySelector(".regForm");
const loginBtn = document.querySelector(".logForm");

function handleRegistration() {
  // registerForm.classList.add("hidden");
  registerForm.classList.toggle("hidden");
}
function handleLogin() {
  loginBtn.classList.toggle("hidden");
  // registerForm.classList.toggle("hidden");
}

/*
function handleConfirmation() {
  // confirm if the user wants to save the data or cancel
  if (confirm("Do you want to save this data?") == true ) {
    var save;
    save = true;
    if (save){
      txt = "Data saved successfully!";
      alert(txt);
    }elseif (!save); {
      txt = "Save Canceled!";
      alert(txt);  
    }
 }inside form : onsubmit="return handleConfirmation();"
 } 
*/