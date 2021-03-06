<?php

require_once "modeles/tache.php";
require_once "modeles/tache_pdo.php";

class TachesControleur {
  public function __construct (&$contexte) {
    $this->taches = Tache::objects(new TachePdo($contexte["database"]));
  }

  public function executerAction ($action, $parametres) {
    switch ($action) {
      case 'effacer':
        $tache = $this->taches->trouver($parametres["id"]);
        if ($tache) {
          $tache->effacer();
        }
        header("Location: index.php?controlleur=taches&action=lister");
        exit;
      case 'effacer_termine':
        $tache = $this->taches->trouver($parametres["id"]);
        if ($tache) {
          $tache->effacer_termine();
        }
        header("Location: index.php?controlleur=taches&action=lister");
        exit;
      case 'modifier':
        $tache = $this->taches->trouver($parametres["id"]);
        if ($tache) {
          if (isset($parametres["termine"])) {
            $tache->termine = $parametres["termine"] ? 1 : 0;
            $tache->enregistrer();
          } else {
            if (!empty(trim($parametres["texte"]))) {
              $tache->texte = $parametres["texte"];
              $tache->enregistrer();
            } else {
              $taches->effacer();
            }
          }
        }
        header("Location: index.php?controlleur=taches&action=lister");
        exit;
      case 'ajouter':
        if (isset($parametres["texte"]) && !empty(trim($parametres["texte"]))) {
          $this->taches->creer(array(
            "texte" => $parametres["texte"]
          ));
        }
        header("Location: index.php?controlleur=taches&action=lister");
        exit;
      case 'lister':
      default:
        $taches = $this->taches->selectionner();
        require "gabarits/taches/index.php";
        exit;
    }
  }
}

?>
