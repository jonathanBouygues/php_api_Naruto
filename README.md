Pour le projet d’API, nous avons voulu partir sur le thème Manga et en particulier sur l'univers de Naruto. Nous allons expliquer les fonctionnalités de l’api et de l’application web. Tous les endpoints sont détaillés en bas de ce fichier.


Application Web :

Attention : il faut penser à modifier les URLs de l’application selon son environnement local (ex : localhost/… puis le chemin).

Premièrement, dans le premier élément, nous avons une liste de personnages qu’on appellera “Ninja”. Ces ninjas ont forcément un village d’origine, les villages se manifestent par le biais d’un id dans l’url  (endpoint). C’est en changeant celui-ci que le village et donc les ninjas changent dans la liste. Il y a 6 villages en tout et plusieurs ninjas par village. Les informations relatives aux ninjas sont leur numéro d'id, leur nom, leur prénom, leur village (symboliser avec l'id du village) et leurs compétences spéciales. Tout ceci est généré avec une requête GET. 

Secondement, nous pouvons constater deux boutons à droite. Lors du clic sur le bouton « update », l'interface changera pour afficher les informations du ninja en question. Il suffit de rentrer des modifications dans le champ puis envoyer les modifications en base de données. Ceci se fait via une requête PUT. Si on revient sur la vue d'origine, le bouton « delete » sert tout simplement à supprimer le ninja de la base de données. Il s'agit là d’une requête DELETE. 

Puis enfin, le dernier élément de cette application est un formulaire qui permet de créer des ninjas. La requête utilisée ici est POST. On a expliqué les fonctionnalités de l'application de la partie visuelle, mais ça ne s'arrête pas là. 


L’API :

L’API peut permettre de réaliser des CRUD basiques mais elle permet aussi de :
-	Utiliser un fonction recherche => paramètre « search » (string)
-	Utiliser un filtrage sur l’id du village des ninjas => paramètre « idVillage » (int)
-	Permettre l’auto-découvrabilité

Les routes ont été définies et redirigées par le module « altoRouter » (voir le code de l’API)



Requête Table Characters

-	Endpoint d'une requête GET classique : 
o	http://localhost/tpApiNaruto/characters
-	Endpoint d'une requête GET avec id du character : 
o	http://localhost/tpApiNaruto/characters/{id}
-	Endpoint d'une requête GET avec un filtre sur l'id du village (ex : 1) :
o	 http://localhost/tpApiNaruto/characters?idVillage={id}
-	Endpoint d'une requête GET avec une fonction "search": 
o	http://localhost/tpApiNaruto/characters?search={value}
-	Endpoint d'une requête DELETE sur un id de character  : 
o	http://localhost/tpApiNaruto/characters/{id}
-	Endpoint d'une requête POST pour un nouveau perso : 
o	http://localhost/tpApiNaruto/characters
o	Accord Key/Value =>
 - firstName : string
 - lastName : string
 - idVillage : integer
 - skill : string
-	Endpoint d'une requête PUT sur un id de character : 
o	http://localhost/tpApiNaruto/characters/{id}
o	Accord Key/Value =>
 - firstName : string
 - lastName : string
 - idVillage : integer
 - skill : string


Requête Table Villages

-	Endpoint d'une requête GET classique : 
o	http://localhost/tpApiNaruto/villages
-	Endpoint d'une requête GET avec id du village : 
o	http://localhost/tpApiNaruto/villages/{id}
-	Endpoint d'une requête DELETE sur un id du village  : 
o	http://localhost/tpApiNaruto/villages/{id}
-	Endpoint d'une requête POST pour un nouveau village : 
o	http://localhost/tpApiNaruto/villages
o	Accord Key/Value =>
 - name : string
 - elementCountry : string
-	Endpoint d'une requête PUT sur un id de village : 
o	http://localhost/tpApiNaruto/villages/{id}
o	Accord Key/Value =>
 - name : string
 - elementCountry : string


Exemple d’une requête à l’API via Postman : http://localhost/tpApiNaruto/characters

 
[
    {
        "id": "1",
        "firstName": "Naruto",
        "lastName": "Uzumako",
        "idVillage": "http://localhost/tpApiNaruto/villages/1",
        "skill": "Kage Bunshin no Jutsu"
    },
    {
        "id": "2",
        "firstName": "Zabuza",
        "lastName": "Momochi",
        "idVillage": "http://localhost/tpApiNaruto/villages/2",
        "skill": "Suiry?dan no Jutsu"
    },
    {
        "id": "3",
        "firstName": "Sasuke ",
        "lastName": "Uchiha",
        "idVillage": "http://localhost/tpApiNaruto/villages/1",
        "skill": "G?kaky? no Jutsu"
    },
    {
        "id": "4",
        "firstName": "Kakashi ",
        "lastName": "Hatake",
        "idVillage": "http://localhost/tpApiNaruto/villages/1",
        "skill": "Kamui Sharingan"
    },
    {
        "id": "5",
        "firstName": "Itachi",
        "lastName": "Uchiha",
        "idVillage": "http://localhost/tpApiNaruto/villages/1",
        "skill": "Mangekyô Sharingan"
    },
    {
        "id": "6",
        "firstName": "Darui",
        "lastName": "inconnu",
        "idVillage": "http://localhost/tpApiNaruto/villages/3",
        "skill": "Raiton - Kuropansa"
    },
    {
        "id": "7",
        "firstName": "Onoki",
        "lastName": "inconnu",
        "idVillage": "http://localhost/tpApiNaruto/villages/4",
        "skill": "Doton"
    },
    {
        "id": "8",
        "firstName": "Nagato",
        "lastName": "Pain",
        "idVillage": "http://localhost/tpApiNaruto/villages/6",
        "skill": "Ningendo"
    },
    {
        "id": "9",
        "firstName": "Gaara",
        "lastName": "inconnu",
        "idVillage": "http://localhost/tpApiNaruto/villages/5",
        "skill": "Sabaku Kyu"
    },
    {
        "id": "10",
        "firstName": "Neji",
        "lastName": "Huyga",
        "idVillage": "http://localhost/tpApiNaruto/villages/1",
        "skill": "Byakugan"
    },
    {
        "id": "11",
        "firstName": "Hinata",
        "lastName": "Huyga",
        "idVillage": "http://localhost/tpApiNaruto/villages/1",
        "skill": "Byakugan"
    }
]



