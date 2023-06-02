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

  var data =
    "username=" +
    encodeURIComponent(username) +
    "&password=" +
    encodeURIComponent(password);

  xhr.send(data);
}

function inscrire() {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Handle successful login

      var response = this.responseText;

      alert(response);

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
    var data =
      "username2=" +
      encodeURIComponent(username2) +
      "&password2=" +
      encodeURIComponent(password2) +
      "&confirm_password=" +
      encodeURIComponent(confirm_password);

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
function supprimerArticle(pseudo, quantite) {
  if (
    confirm("Êtes-vous sûr de vouloir supprimer cet article de votre panier ?")
  ) {
    // Envoyer une requête AJAX pour supprimer l'article du panier côté serveur
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var response = this.responseText;
        if (response == "success") {
          // Supprimer l'article du panier dans la page
          var panier = document.getElementsByClassName("panier_" + pseudo);
          alert(
            "Veuillez raffraichir la page pour voir la commande supprimée."
          );
          panier.parentElement.remove();
          panier.style.display = "none";

          // Envoyer une requête AJAX pour mettre à jour le stock dans le fichier JSON
          xhr.open("POST", "/PHP/restoreStock.php", true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );
          xhr.send(
            "pseudo=" +
              encodeURIComponent(pseudo) +
              "&quantite=" +
              encodeURIComponent(quantite)
          );
        } else {
          alert("Erreur lors de la suppression de l'article du panier.");
        }
      }
    };
    xhr.open("POST", "/PHP/supprimerDuPanier.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("pseudo=" + encodeURIComponent(pseudo));

    var quantite = document.getElementById("quantite");
    var quantite2 = parseInt(quantite.innerText);

    var nbArticles = document.getElementById("nbArticles");
    var nbArticles2 = parseInt(nbArticles.innerText);
    
    var xhr2 = new XMLHttpRequest();
    xhr2.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        nbArticles.innerHTML = nbArticles2 - quantite2;
      }
    };

    xhr2.open("POST", "/PHP/updateNbArticles.php", true);
    xhr2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr2.send("nbArticles=" + (nbArticles2 - quantite2));
  }
}
