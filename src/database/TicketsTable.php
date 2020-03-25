<?php


namespace Psiko\database;


use Psiko\Entity\TicketsEntity;

class TicketsTable
{
    private MysqlDatabase $db;

    /**
     * TicketsTable constructor.
     * @param MysqlDatabase $db
     */
    public function __construct()
    {
        $this->db = new MysqlDatabase("psiko");
    }


    public function insertNewTicket($titre, $contenue, $cible, $demandeurId, $fileSupplementaire)
    {
        $prepare = "INSERT INTO `ticket`(`demandeurId`, `contenue`, `Titre`,`dateEmission`, `cible`, `fichierSupplementaireLink`)
                    VALUES(:demandeurId, :contenue, :titre ,:dateEmission, :cible, :fichier)";
        $values = array(
            "demandeurId"   => $demandeurId,
            ":contenue"     => $contenue,
            ":titre"        => $titre,
            ":dateEmission" => date("Y-m-d H:i:s"),
            ":cible"        => $cible,
            ":fichier"      => $fileSupplementaire
        ) ;
        $this->db->prepare($prepare, $values);
    }

}