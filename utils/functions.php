<?php
//fonction pour se connecter à la BDD
function connect($host,$dbname,$login,$password){
return new PDO('mysql:host='.$host.';dbname='.$dbname.'',$login,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
//fonction pour nettoyer les données reçues
function sanitize($data){

return htmlentities(strip_tags(stripcslashes(trim($data))));

}
?>