<?php

/**
 * Description of KigyokLetrak
 *
 * @author feher
 */
class KigyokLetrak
{
    
    //Nem teszek ki megjegyzést :)
    private $aktualisPozicio    = 1;
    private $dobasSzam          = 0;
    private $kigyokLetrak       = [];
    private $dobokockaOldalSzam = 6;

    /**
     * Opcionálisan megadható a tábla tömb reprezentációja.
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
     * Ez a metódus vissza adja az akutális pozicíó értékét.
     * @return int
     */
    public function getAktualisPozicio(): int
    {
        return $this->aktualisPozicio;
    }

    /**
     * Ez a metódus vissza adja a dobások számát.
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
