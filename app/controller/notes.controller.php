<?php
require_once dirname(__DIR__)."/model/repository/anne.model.php";
require_once dirname(__DIR__)."/model/repository/note.model.php";

class notesController{
   public function listerNote(){
$matieres = getAllTable("matieres");
$classes = getAllTable("classes");
$periodes = getAllTable("periodes");
$annee = getAnnee();
if($_SERVER['REQUEST_METHOD']=='POST'){
$periodeId = (int) $_POST['periode'];
$matiereId = (int) $_POST['matiere'];
$classeId = (int) $_POST['classe'];
$moyenne = getMoyenne($classeId,$matiereId,$periodeId);

}

require_once dirname(__DIR__)."/view/note.html.php";
    
}
}