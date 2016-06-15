<?php
namespace Core\Entity;
class Entity {
    //Classe mère Entity
    //Rajouter des méthodes communes aux classes héritant de Entity ici si besoin

    /**
     * Méthode __get() - censé pouvoir permettre l'appel des getters sur les entités en omettant le "get" et les parenthèses (ex : $monObjetDeClassEntity->monGetter;), mais ne fonctionne pas comme souhaité. Mise entre commentaires.
     * @private
     * @param  string $key La méthode souhaitée, sans le __get
     * @return callback Le résultat de la méthode appelée
     */
    /*public function __get($key) {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }*/
}
