

function validerPanier(pseudo) {
  var panier = document.getElementById('panier_' + pseudo);
  var stock = document.querySelector('td[data-stock="' + pseudo + '"]');

  var nbArticles = document.getElementById('nbArticles');
  var quantitePanier = parseInt(nbArticles.innerText);


  var quantite = parseInt(panier.innerText);
  if (quantite > 0) {
      alert("Merci de nous avoir fait confiance, votre commande est en cours de préparation ! Rappel de la commande : " + panier.innerText + " voyages pour la destination " + pseudo);

      var data = {};
      data[pseudo] = quantite;

      var xhr1 = new XMLHttpRequest();
  xhr1.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
      }
  };
  xhr1.open('POST', '/PHP/updateStock.php?continent=amerique', true);
  xhr1.setRequestHeader('Content-Type', 'application/json');
  xhr1.send(JSON.stringify(data));

  // Créez la deuxième instance de XMLHttpRequest pour ajouterAuPanier.php
  var xhr2 = new XMLHttpRequest();
  xhr2.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
      }
  };
  xhr2.open('POST', '/PHP/ajouterAuPanier.php', true);
  xhr2.setRequestHeader('Content-Type', 'application/json');
  xhr2.send(JSON.stringify(data));
      panier.innerText = 0;
  } else {
      alert("Votre panier est vide.");
  }

  xhr3 = new XMLHttpRequest();
  xhr3.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          nbArticles.innerHTML = quantitePanier + quantite;
      }
  }
  xhr3.open('POST', '/PHP/updateNbArticles.php', true);
  xhr3.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr3.send('nbArticles=' + (quantitePanier + quantite));
}





function fonction() {
  
  var quantities = document.getElementsByClassName("stock");
  for (var i = 0; i < quantities.length; i++) {
      if( quantities[i].style.display === "none" ) {
          quantities[i].style.display = "table-cell";
      } else {
          quantities[i].style.display = "none";
      }
  }
}





// function decrementer(id) {
//     if (document.getElementById(id).innerHTML > 0) {
//         document.getElementById(id).innerHTML= parseInt(document.getElementById(id).innerHTML) - 1;
//     }
// }

// function incrementer(id) {
  
//     if (id==="montreal") {
//         var panier = document.getElementById(id);
//         var stock = document.getElementById("smontreal");
//         var panier1 = panier.innerHTML;
//         var stock1 = stock.innerHTML;
//         if (panier1 != stock1) {
//             document.getElementById("montreal").innerHTML= parseInt(document.getElementById("montreal").innerHTML) + 1;
//         }else {
//             alert("Le stock est épuisé");
//         }
//     }else if (id==="rio") {
//         var panier = document.getElementById(id);
//         var stock = document.getElementById("srio");
//         var panier1 = panier.innerHTML;
//         var stock1 = stock.innerHTML;
//         if ( panier1 != stock1 ) {
//             document.getElementById(id).innerHTML= parseInt(document.getElementById("rio").innerHTML) + 1;
//         }else {
//             alert("Le stock est épuisé");
//         }
//     }else if (id==="newyork") {
//         var panier = document.getElementById(id);
//         var stock = document.getElementById("snewyork");
//         var panier1 = panier.innerHTML;
//         var stock1 = stock.innerHTML;
//         if ( panier1 != stock1 ) {
//             document.getElementById(id).innerHTML= parseInt(document.getElementById("newyork").innerHTML) + 1;
//         }else {
//             alert("Le stock est épuisé");
//         }
//     }else if (id==="losangeles") {
//         var panier = document.getElementById(id);
//         var stock = document.getElementById("slosangeles");
//         var panier1 = panier.innerHTML;
//         var stock1 = stock.innerHTML;
//         if ( panier1 != stock1 ) {
//             document.getElementById(id).innerHTML= parseInt(document.getElementById("losangeles").innerHTML) + 1;
//         }else {
//             alert("Le stock est épuisé");
//         }
//     }else if (id==="mexico") {
//         var panier = document.getElementById(id);
//         var stock = document.getElementById("smexico");
//         var panier1 = panier.innerHTML;
//         var stock1 = stock.innerHTML;
//         if ( panier1 != stock1 ) {
//             document.getElementById(id).innerHTML= parseInt(document.getElementById(id).innerHTML) + 1;
//         }else{
//             alert("Le stock est épuisé");
//         }
//     }
          
// }

  
// function decrementer(pseudo) {
//     var tdStock = document.getElementById(pseudo).parentNode.parentNode.parentNode.querySelector('[data-stock]');
//     var spanQuantite = document.getElementById(pseudo);

//     var stock = parseInt(tdStock.getAttribute('data-stock'));
//     var quantite = parseInt(spanQuantite.innerText);

//     if (quantite > 0) {
//         quantite--;
//         stock++;
//     }

//     spanQuantite.innerText = quantite;
//     tdStock.setAttribute('data-stock', stock);
//     tdStock.innerText = stock;
// }

// function incrementer(pseudo) {
//     var tdStock = document.getElementById(pseudo).parentNode.parentNode.parentNode.querySelector('[data-stock]');
//     var spanQuantite = document.getElementById(pseudo);

//     var stock = parseInt(tdStock.getAttribute('data-stock'));
//     var quantite = parseInt(spanQuantite.innerText);

//     if (stock > 0) {
//         quantite++;
//         stock--;
//     }

//     spanQuantite.innerText = quantite;
//     tdStock.setAttribute('data-stock', stock);
//     tdStock.innerText = stock;
// }





function decrementer(pseudo) {
var panier = document.getElementById('panier_' + pseudo);
var stock = document.querySelector('td[data-stock="' + pseudo + '"]');

if (parseInt(panier.innerText) > 0) {
    panier.innerText = parseInt(panier.innerText) - 1;
    stock.innerText = parseInt(stock.innerText) + 1;
}
updateStock(pseudo, stock.innerText);
}

function incrementer(pseudo) {
var panier = document.getElementById('panier_' + pseudo);
var stock = document.querySelector('td[data-stock="' + pseudo + '"]');
if (parseInt(stock.innerText) > 0) {
    panier.innerText = parseInt(panier.innerText) + 1;
    stock.innerText = parseInt(stock.innerText) - 1;
} else {
  alert("Le stock est vide");
}
updateStock(pseudo, stock.innerText);
}

function vider(pseudo) {
var panier = document.getElementById('panier_' + pseudo);
var stock = document.querySelector('td[data-stock="' + pseudo + '"]');


stock.innerText = parseInt(stock.innerText) + parseInt(panier.innerText);
panier.innerText = 0;

updateStock(pseudo, stock.innerText);
}

function updateStock(pseudo, stock) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
      }
  };
  xhr.open('POST', '/PHP/updateStock.php?continent=amerique', true);
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.send(JSON.stringify({pseudo: pseudo, stock: stock}));
}




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
  


    


