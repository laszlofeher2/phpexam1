<?php

/**
 * Description of KigyokLetrak
 *
 * @author feher
 */
class KigyokLetrak
{

    private $aktualisPozicio = 1;
    private $dobasSzam = 0;
    private $kigyokLetrak = [];
    private $dobokockaOldalSzam = 6;

    /**
     * 
     * @param array $kigyokLetrak
     */
    public function __construct(array $kigyokLetrak = [])
    {
        if (count($kigyokLetrak) > 0) {
            $this->kigyokLetrak = $kigyokLetrak;
        } else {
            $this->kigyokLetrak = [4 => 26,
                11 => 73,
                14 => 9,
                24 => 57,
                27 => 46,
                38 => 19,
                39 => 61,
                54 => 85,
                64 => 36,
                72 => 93,
                94 => 69,
            ];
        }
    }

    /**
     * 
     * @return int
     */
    public function getAktualisPozicio(): int
    {
        return $this->aktualisPozicio;
    }

    /**
     * 
     * @return int
     */
    public function getDobasSzam(): int
    {
        return $this->dobasSzam;
    }

    /**
     * 
     * @return int
     */
    public function getDobokockaOldalSzam(): int
    {
        return $this->dobokockaOldalSzam;
    }

    /**
     * 
     * @param int $dobokockaOldalSzam
     * @return void
     */
    public function setDobokockaOldalSzam(int $dobokockaOldalSzam): void
    {
        if ($dobokockaOldalSzam >= 6 && $dobokockaOldalSzam <= 12 && $dobokockaOldalSzam % 2 === 0) {
            $this->dobokockaOldalSzam = $dobokockaOldalSzam;
        }
    }

    /**
     * 
     */
    public function futtatas()
    {
        while ($this->jatekosPozicio < 100) {
            $dobasErteke = rand(1, $this->dobokockaOldalSzam);
            $this->jatekosPozicio += $dobasErteke;
            //A kulcshoz tartozó érték létezik-e
            //if(isset($kigyokLetrak[$jatekosPozicio])){
            //a tömbben a kulcs létezik-e
            if (array_key_exists($this->jatekosPozicio, $this->kigyokLetrak)) {
                $this->jatekosPozicio = $this->kigyokLetrak[$this->jatekosPozicio];
            }
            $this->dobasSzam++;
        }
    }
}

$kigyokLetrak = new KigyokLetrak();
$kigyokLetrak->setDobokockaOldalSzam(8);
$kigyokLetrak->futtatas();
print($kigyokLetrak->getDobasSzam());
