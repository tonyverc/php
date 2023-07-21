<?php declare(strict_types = 1);

class combat
{
    private $hero= null;
    private $monstre = null;

    public function __construct(Hero $hero, Monstre $monstre)
    {
        $this->hero = $hero;
        $this->monstre = $monstre;
    }
    public function getHero(): Hero
    {
        return $this->hero; 
    }

    public function setHero(Hero $hero): static
    {
        $this->hero = $hero;
    }

    public function getMonstre(): Monstre
    {
        return $this->monstre; 
    }

    public function setMonstre(Monstre $monstre): static
    {
        $this->monstre =$monstre;
    }

    public function action()
    {
        //le monstre attaque
        $attaque =$this->monstre->getPuissance() * random_int(5,15) / 10;
        $vie = $this->hero->getVie() - $attaque;
        $this->hero->setVie($vie);

        //si le hero est mort, il ne peut pas contre-attaquer
        if ($this->hero->getVie() == 0){
            return;
        }

        //le hero contre attaque
        $attaque =$this->hero->getPuissance() * random_int(5,15) / 10;
        $vie = $this->monstre->getVie() - $attaque;
        $this->monstre->setVie($vie);
    }

    public function isFini()
    {
        if ($this->hero->getVie() == 0 || $this->monstre->getVie() == 0){
            return true;
        }
        return false;
    }
}