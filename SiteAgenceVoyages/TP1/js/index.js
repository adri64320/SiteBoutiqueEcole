const slider = document.querySelector(".slider");

let slideIndex = 0;

function showSlide() {
  const slides = slider.querySelectorAll("img");
  for (let i = 0; i < slides.length; i++) {
    slides[i].classList.remove("active", "previous", "next");
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  const activeSlide = slides[slideIndex - 1];
  const previousSlide = slideIndex === 1 ? slides[slides.length - 1] : slides[slideIndex - 2];
  const nextSlide = slideIndex === slides.length ? slides[0] : slides[slideIndex];

  activeSlide.classList.add("active");
  previousSlide.classList.add("previous");
  nextSlide.classList.add("next");

  setTimeout(function () {
    previousSlide.classList.remove("previous");
    nextSlide.classList.remove("next");
  }, 500);

  setTimeout(showSlide, 3000); // Change image every 3 seconds
}

showSlide();


var modal = document.getElementById("loginModal");




// Get the modal

var modal2 = document.getElementById("loginModal2");




// Get the button that opens the modal

var btn = document.getElementById("boutonmodal1");




// Get the button that opens the modal

var btn2 = document.getElementById("boutonmodal2");




// Get the <span> element that closes the modal

var span = document.getElementById("close");




// Get the <span> element that closes the modal

var span2 = document.getElementById("close2");




// When the user clicks on the button, open the modal

function openLoginModal() {

  modal.style.display = "block";

}




function openLoginModal2() {

  modal2.style.display = "block";

}

// When the user clicks on <span> (x), close the modal

function closeLoginModal() {

  modal.style.display = "none";

}




// When the user clicks on <span> (x), close the modal

function closeLoginModal2() {

  modal2.style.display = "none";

}




// AJAX login function

function login() {

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      // Handle successful login

      var response = this.responseText;

      if (response == "success") {

        closeLoginModal();

        location.reload();



      } else {

        alert("Invalid username or password.");

      }

    }

  };

  xhr.open("POST", "/PHP/login.php", true);

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  var username = document.getElementById("username").value;

  var password = document.getElementById("password").value;

  var data = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);

  xhr.send(data);

}

function inscrire() {

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      // Handle successful login

      var response = this.responseText;

      alert(response)

      if (response == "success") {

        closeLoginModal2();

        alert("inscription Validée");

      } else if (response == "utilise") {

        alert("Utilisateur deja pris");

      } else {

        alert("Inscription non validée");

      }

    }

  };




  xhr.open("POST", "/PHP/inscription.php", true);

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  var username2 = document.getElementById("username2").value;

  var password2 = document.getElementById("password2").value;

  var confirm_password = document.getElementById("confirm_password").value;




  if (password2 === confirm_password) {

    var data = "username2=" + encodeURIComponent(username2) + "&password2=" + encodeURIComponent(password2) + "&confirm_password=" + encodeURIComponent(confirm_password);

    xhr.send(data);

  } else {

    alert("Les mots de passe ne correspondent pas.");

  }

}




function deconnexion() {

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      // Handle successful logout

      var response = this.responseText;

      if (response == "success") {

        location.reload(); // Reload the page to clear the session

      } else {

        alert("Error logging out.");

      }

    }

  };

  xhr.open("GET", "/PHP/deconnexion.php", true);

  xhr.send();

}
