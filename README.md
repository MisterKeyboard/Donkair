Donkair

# Installation
To install copy espaceAdmin/config.php.example to espaceAdmin/config.php and adapt to your settings.

# Start
Run php -S 0.0.0.0:8000 

 To access the site;go to this adress:
  http://localhost:8000/

 To access the admin aera;go to this adress:
 http://localhost:8000/espaceAdmin/connexion.php





#  Admin
A - Mise en page -SACC - library pour mettre en forme
L - !! Faire le SELECT (mise en forme) !!
L - addCity.php -> modifier le lien pour retourner à la page d'accueil. (le lien ouvre une nouvelle page, on souhaite retourner à la page d'accueil)
A-ok - Ajouter les photos!!!
L - voir pour le "remplir tous les champs" -> addCity.php
A - routeTab tableau avec edit et delet
A-ok - sécuriser password  


# Formulaire de Contact
- SASS

# HTML
- Mise en page  SASS (bon courage lol)

# Fiches
=======
- Modal = AJAX (afficher msg de 'bien reçu' sur la PopUp)

# Fiches -html
- Photos
- Avis client
- destination

# Barre de recheche
- fiches
- pagination

# Client -> Selectionner un vol 
- To do
- Base de donnée -> Done
- Relier la base de donnée (INSERT des infos du client ) !! le client peut ajouter plusieurs personne en même temps -ajouter un bouton qui rajoute le formulaire en fonctionne du nombre du de passager-
- Un client ne peut s'enregistrer qu'une fois (if !==)
- Fiche

# Client -> Nombre de place RESERVATION
- To do 
- VOL complet = gestion de place, Si vol complet add j j+1
- class = function (blabla)



(faire attention à :
Nommage des branches
Message plus explicatif dans le commit
Aucun fichier indenter
Plein d’echo qui servent à rien
Pas de message d’erreur suite à un POST
Pas de gestion des erreurs mysql
L’objet PDO est initialisé dans plusieurs fichiers
Aucun bouton pour accéder à l’ajout d’un auteur
Avoir un header / footer commun
Pas mal de ligne vides
Pas de gestion des erreurs mysql (ce qui empêche l’affichage de la page d’ajout)
Mieux nommer les variables dans les bindValue
Vérification des $_GET / $_POST)
