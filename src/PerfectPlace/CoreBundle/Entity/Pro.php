<?php

namespace PerfectPlace\CoreBundle\Entity;

class Pro
{
    protected $commerce;
    protected $transport;
    protected $nocturne;
    protected $sante;

    /**
     * @return mixed
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param mixed $transport
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
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
    protected $culturel;
}