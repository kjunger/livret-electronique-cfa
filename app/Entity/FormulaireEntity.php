<?php
namespace App\Entity;
use Core\Entity\Entity;
class FormulaireEntity extends Entity {
    public function getUrl(){
        return '?p=private.' . $this->type . '&name=' . $this->nom;
    }
}
