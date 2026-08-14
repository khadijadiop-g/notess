<?php

class Annee{
     public int $id;
    public string $debut;
    public string $fin;
    public int $est_active;

       function __construct(?int $id, ?string $debut, ?string $fin, ?int $est_active){
        $this->id = $id;
        $this->debut = $debut ?? "";
        $this->fin = $fin ?? "";
        $this->est_active = $est_active ?? 0;


       }

}