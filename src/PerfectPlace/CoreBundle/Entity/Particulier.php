<?php

namespace PerfectPlace\CoreBundle\Entity;

class Particulier
{

    protected $mobilite;
    protected $environnement;
    protected $culturel;
    protected $nocturne;
    protected $commerce;
    protected $sante;
    protected $type; //Famille / étudiant / personne âgé / Handicapé


    /**
     * @return mixed
     */
    public function getMobilite()
    {
        return $this->mobilite;
    }

    /**
     * @param mixed $mobilite
     */
    public function setMobilite($mobilite)
    {
        $this->mobilite = $mobilite;
    }

    /**
     * @return mixed
     */
    public function getEnvironnement()
    {
        return $this->environnement;
    }

    /**
     * @param mixed $environnement
     */
    public function setEnvironnement($environnement)
    {
        $this->environnement = $environnement;
    }

    /**
     * @return mixed
     */
    public function getCulturel()
    {
        return $this->culturel;
    }

    /**
     * @param mixed $culturel
     */
    public function setCulturel($culturel)
    {
        $this->culturel = $culturel;
    }

    /**
     * @return mixed
     */
    public function getNocturne()
    {
        return $this->nocturne;
    }

    /**
     * @param mixed $nocturne
     */
    public function setNocturne($nocturne)
    {
        $this->nocturne = $nocturne;
    }

    /**
     * @return mixed
     */
    public function getCommerce()
    {
        return $this->commerce;
    }

    /**
     * @param mixed $commerce
     */
    public function setCommerce($commerce)
    {
        $this->commerce = $commerce;
    }

    /**
     * @return mixed
     */
    public function getSante()
    {
        return $this->sante;
    }

    /**
     * @param mixed $sante
     */
    public function setSante($sante)
    {
        $this->sante = $sante;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


}