function validateLoginForm() {
    var email = document.forms[0]["email"].value;
    var password = document.forms[0]["password"].value;
    if (email == "" || password == "") {
        alert("L'email et le mot de passe sont obligatoires.");
        return false;
    }
    return true;
}

/*function validateRegisterForm() {
    var email = document.forms[0]["email"].value;
    var password = document.forms[0]["password"].value;
    if (email == "" || password == "") {
        alert("L'email et le mot de passe sont obligatoires.");
        return false;
    }
    return true;
}*/

function validatePatientForm() {
    var nom = document.forms[0]["nom"].value;
    var prenom = document.forms[0]["prenom"].value;
    if (nom == "" || prenom == "") {
        alert("Le nom et le prénom sont obligatoires.");
        return false;
    }
    return true;
}

function validateConsultationForm() {
    var date_consultation = document.forms[0]["date_consultation"].value;
    var description = document.forms[0]["description"].value;
    if (date_consultation == "" || description == "") {
        alert("La date et la description sont obligatoires.");
        return false;
    }
    return true;
}
function validateRegisterForm() {
    var username = document.forms[0]["username"].value;
    var email = document.forms[0]["email"].value;
    var password = document.forms[0]["password"].value;
    var telephone = document.forms[0]["telephone"].value;
    if (username == "" || email == "" || password == "" || telephone == "") {
        alert("Tous les champs sont obligatoires.");
        return false;
    }
    return true;
}
// à ajouter
function validatePatientForm() {
    var nom = document.forms[0]["nom"].value;
    var prenom = document.forms[0]["prenom"].value;
    if (nom == "" || prenom == "") {
        alert("Le nom et le prénom sont obligatoires.");
        return false;
    }
    return true;
}

function validateConsultationForm() {
    var date_consultation = document.forms[0]["date_consultation"].value;
    var description = document.forms[0]["description"].value;
    if (date_consultation == "" || description == "") {
        alert("La date de consultation et la description sont obligatoires.");
        return false;
    }
    return true;
}
