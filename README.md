# GestionConges-PHP: Utilitaire PHP de Gestion des Congés (individuel)

## I. Installation

### 1. Prérequis

Pour installer l'utilitaire, vous avez besoin d'un serveur web (Apache, Nginx ou autre) ainsi que d'un serveur MySQL (ou MariaDB pour les plus à jour).

L'application fonctionnera également parfaitement en mode monoposte sur un serveur de type XAMPP ou WAMP.

## 2. Installation des fichiers web

Il suffit simplement de copier l'intégralité des fichiers sur le dossier dédié sur le serveur web.
Les liens dans les fichiers sont faits pour s'adapter à votre arborescence.

Attention cependant à ce que les fichiers PHP dont le nom commence par `class` restent bien dans le dossier au même nom.

## 3. Installation de la base de données

Vous pouvez créer votre base de données `gestionconges` (si vous êtes débutant, nous vous conseillons fortement de conserver ce nom, car il vous faudra sinon adapter `class.sqlconnect.php` en conséquence) sur votre serveur MySQL via des outils en ligne comme PhpMyAdmin ou Adminer.

Il faudra ensuite y importer le fichier `conges.sql` qui se trouve dans le dossier `sql`. Cela permettra de configurer la base directement de manière à ce que les données puissent s'y ajouter sans problème.

Nous vous conseillons fortement de créer un compte MySQL dédié pour cette base et de ne lui donner les droits que sur cette base.

Une fois votre base créée, vous pouvez saisir les informations relatives à celle-ci sous `class/class.sqlconnect.php` via les champs suivants :

```
$servername = "localhost";
$username = "utilisateur";
$password = "motdepasse";
$dbname = "gestionconges";
$table = "gestionconges.conges";
```

Le paramètre `$servername` sera localhost dans la majorité des cas. Ne le modifiez que si vous savez ce que vous faites.

Les paramètres `$username`et `$password` devront contenir respectivement identifiant et mot de passe de votre base de données.

Les paramètres `$dbname` et `$table` ne changeront pas si vous avez nommé votre base de données `gestionconges` comme conseillé.

### 4. Configuration des paramètres de votre organisation

Toutes les entreprises ne proposent pas forcément des RTT. C'est pourquoi il peut être nécessaire de faire des ajustements sur les soldes et saisies.

Il faudra faire ces ajustements dans le fichier `config.php` (des commentaires dans le fichier indiquent les valeurs attendues) :

```
$rttparan = 9; //Nombre de RTT par an
$cpparan = 25; //Nombre de CP par an

$rttparmois = 0.75; // Nombre de RTT par mois (pour calculer les acquis de l'année suivante)
$cpparmois = 2.0833333333; // Nombre de RTT par mois (pour calculer les acquis de l'année suivante)
```

## II. Utilisation de l'Utilitaire

Après avoir procédé à la configuration de l'utilitaire, nous allons aborder son utilisation (il est très simpliste).

### 1. La page principale

Sur cette pages, 3 choses sont affichées :

- Un tableau contenant les congés que vous avez saisis avec les dates, le nombre de jours et la nature (le type). Il y a également un bouton Supprimer sur chaque ligne afin de procéder aux ajustements dont vous aurez besoin, mais aussi supprimer la base au début d'une nouvelle année.
- Un tableau indiquant le solde de congés ou RTT restants selon les paramètres saisis dans `config.php` et les jours déjà saisis.
- Un tableau indiquant le cumul pour année suivante, qui se base également sur `config.php`.

Le système prend en compte les congés avec les dates suivantes :

- RTT : 1er janvier au 31 décembre
- Congés payés : 1er juin au 31 mai

En cas de nécessité d'adaptation, ne pas hésiter à [ouvrir une issue](https://github.com/alexandremottier/GestionConges-PHP/issues/new)

### 2. La page de saisie

Sur cette page, un tableau vous demandant de saisir des informations sur vos congés :

- Date de début
- Date de fin
- Nombre de jours à décompter (pour ne pas compter inutilement les week-ends et jours fériés)
- La nature (type) des congés : RTT ou congé payé.

ATTENTION : Pour la saisie du nombre de jour, le séparateur décimal est le point `.` et non la virgule `,`.

Vous voilà maintenant prêt à utiliser cet utilitaire de gestion des congés ! Faites-en bon usage ! ;-)
