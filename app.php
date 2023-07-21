<?php

require __DIR__.'/src/Personnage.php';
// la classe Monstre dépend de classe personnage
require __DIR__.'/src/Monstre.php';
// la classe hero dépend de classe personnage
require __DIR__.'/src/Hero.php';
// la classe combat est composée des classes montre et hero
require __DIR__.'/src/Combat.php';

$m = new Monstre();
$m->setCri  ('CRIIII !!!');
$m->crier();
echo $m->getPuissance()."\n";

$m2 = new Monstre();
$m2
    ->setCri  ('CRIIII !!!')
    ->crier()
    ->setPuissance(20)
    ;
echo $m2->getPuissance()."\n";

$hero = new Hero();

$combat1 = new Combat($hero, $m);
//$combat1->setMonstre($m);
//$combat1->setHero($hero);

$combat2 = new Combat($hero, $m2);
//$combat2->setMonstre($m2);
//$combat2->setHero($hero);

while($combat1->isFini() == false || $combat2->isFini() == false){
    //le combat continue
    $combat1->action();
    $combat2->action();

    //echo $m->getVie()."\n";
    //echo $m2->getVie()."\n";
    //echo $hero->getVie()."\n";
    echo "\n";
    echo "monstre 1 = ".$m -> getVie()." point de vie"."\n";
    echo "monstre 2 = ".$m2 -> getVie()." point de vie"."\n";
    echo "Hero = ".$hero -> getVie()." point de vie"."\n";
    echo "\n";
}

if($hero->getVie() == 0 && $m->getVie() == 0 && $m2->getVie() == 0){
    echo "match nul\n";
}elseif ($hero->getVie()> 0) {
        echo "vous avez gagné\n";
}else { // $hero->getVie() == 0
        echo "vous avez perdu\n";
}