-----------------------------------My meetic---------------------------------------
Je dois créer une application web qui ressemble a meetic, je dois absolument coder en php orienté objet et en ajax.
Une bonne gestion d'erreure est obligatoire 

Pour ça, je vais d'abbord créer un FICHE de connection ou d'inscription pour pouvoir avoir accès au site. Les informations pour la FICHE doit contenir au minimum 
NOM, PRENOM, DATE DE NAISSANCE (donc une vérification de l'age légal), HOMME, FEMME, ou AUTRE, VILLE, E-MAIL(e-mail unique utilisé pour la connexion), MOT DE PASSE (hashé pour la connexion).

Ensuite j'aimerais faire une deuxieme fiche qui servira à demander les LOISIRS.

Je dois créer une page "Mon Compte" qui contiendra le RECAPITULATIF des informations et permettra de modifier ces informations sauf le prénom et le nom ainsi que la date de naissance.

Je dois créer une fonction qui supprime un compte définitivement de la BDD (Je ne dois pas utiliser la requete DELETE !!)

Je dois ensuite faire une page de "rencontre" où l'on pourra rechercher avec différents filtre:
GENRE, LOCALISATION, LOISIR (Proposer plusieurs tags possibles(Dance, Skateboard, Manga, Licorne, Cuisiner / Autre à préciser dans ce cas), TRANCHE D'AGE (18/25, 25/35, 35/45, 45+).

ENFIN, le résultat de la recherche sera sous forme de carrousel développé en Jquery.

Je dois certainement créer une maquette sous forme de FIGMA.
ATTENTION AUX METHOD CRUD!!
CRUD pour : 

                        *Create =======> Method Post
                        *Read ====> Method Get
                        *Update ======> Method Put
                        *Delete ========> Method Delete

On va devoir créer la base de données !!
On devra faire une architecture MVC!!!

Début de ma structure du projet :

Mon user commence à l'index.php, il s'inscrit ou se connecte. Je vais faire des vérifications jquery afin d'assurer au mieux les entrées de mon user. Lorsque tout est conforme, j'envoie la data, sous forme d'objet à mon fichier php. Mon fichier php lui, communiquera avec ma bdd pour enregistrer mon nouveau user. Ensuite j'aimerais envoyé un second formulaire à remplir avec la partie loisir. De même, des vérifications jquery (je ne suis pas obligé, j'aimerais seulement m'entrainer avec cette technologie obscure), j'envoie a php sous forme d'objet (SI POSSIBLE) qui enverra a la BDD. 
A partir de là, il est sur le site.

Mon user se connecte, j'envoie a jquery qui, là aussi, fera des vérifications afin de connecter mon user. J'établie la connection. J'alerte d'une connexion réussie. (Je peux mettre des des scripts data qui récupéreront des infos d'utilisations).
A partir de là, il est sur le site.

PENSE BÊTE : select name from loisir inner join user_loisir on loisir.id = user_loisir.id_loisir where id_user = 4;