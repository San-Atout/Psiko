<?php


namespace Psiko\Entity;


class TicketsEntity
{
    private int $idTicket;
    private int $demandeurId;
    private int $destinataireId;
    private String $niveauProblem;
    private String $etatTicket;
    private String $contenue;
    private String $reponse;
    private \DateTime $dateEmission;
    private \DateTime $dateCloture;
    private String $cible;
    private String $fichierSupllementaireLink;
    private bool $isArchive;

    /**
     * TicketsEntity constructor.
     * @param int $idTicket
     * @param int $demandeurId
     * @param int $destinataireId
     * @param String $niveauProblem
     * @param String $etatTicket
     * @param String $contenue
     * @param String $reponse
     * @param \DateTime $dateEmission
     * @param \DateTime $dateCloture
     * @param String $cible
     * @param String $fichierSupllementaireLink
     * @param bool $isArchive
     */
    public function __construct(int $idTicket, int $demandeurId, int $destinataireId, String $niveauProblem, String $etatTicket, String $contenue, String $reponse, \DateTime $dateEmission, \DateTime $dateCloture, String $cible, String $fichierSupllementaireLink, bool $isArchive)
    {
        $this->idTicket = $idTicket;
        $this->demandeurId = $demandeurId;
        $this->destinataireId = $destinataireId;
        $this->niveauProblem = $niveauProblem;
        $this->etatTicket = $etatTicket;
        $this->contenue = $contenue;
        $this->reponse = $reponse;
        $this->dateEmission = $dateEmission;
        $this->dateCloture = $dateCloture;
        $this->cible = $cible;
        $this->fichierSupllementaireLink = $fichierSupllementaireLink;
        $this->isArchive = $isArchive;
    }

}