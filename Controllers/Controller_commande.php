<?php

class Controller_commande extends Controller
{
    public function action_default()
    {
        $this->action_commande();
    }

    public function action_commande()
    {
        $this->render("home");
    }

    //* Affiche tout les fournisseurs
    public function action_all_commandes()
    {
        $m = Model::get_model();
        $data = ["commandes" => $m->get_all_commandes()];
        $this->render("all_commandes", $data);
    }
//* Renvoie vers le formulaire d'insertion des fournisseurs

}

?>