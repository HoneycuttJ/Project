function mylogin() {
  document.getElementById("loginForm").style.display = "block";
  document.getElementById("signupForm").style.display = "none";
}

function mysignup() {
  document.getElementById("loginForm").style.display = "none";
  document.getElementById("signupForm").style.display = "block";
}

function popupfunction(x) {
  document.getElementById("popup" + x).style.display = "block";
  document.getElementById("fade2").style.display = "block";
  document.getElementById("fade2").style.zIndex = "1";
}

function popupclose(x) {
  document.getElementById("popup" + x).style.display = "none";
  document.getElementById("fade2").style.display = "none";
}

function backToTeam(x) {
  document.getElementById("popup" + x).style.display = "none";
}

function login() {
  x = document.getElementById("popup6");
  if (x.style.display === "none") {
    x.style.display = "block"
  }
  else {
    x.style.display = "none"
  }
}

function handleFormSubmission(event) {
    event.preventDefault();


    var formData = new FormData(this);


    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_player_process.php", true);
    xhr.onload = function() {
        if (xhr.status === 200) {

            document.getElementById("message").innerHTML = xhr.responseText;
        } else {

            document.getElementById("message").innerHTML = "Error: " + xhr.status;
        }
    };
    xhr.send(formData);
}


document.getElementById("addPlayerForm").addEventListener("submit", handleFormSubmission);
