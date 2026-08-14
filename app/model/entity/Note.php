<?php

class Note{
     public int $id;
public float $note;
public string $types;
public int $periodeId;
public int $inscriId;
public int $coursId;
public int $superviseurId;

function __construct(int $id, float $note, string $types, int $periodeId, int $inscriId, int $coursId, int $superviseurId) {
    $this->id = $id;
    $this->note = $note;
    $this->types = $types;
    $this->periodeId = $periodeId;
    $this->inscriId = $inscriId;
    $this->coursId = $coursId;
    $this->superviseurId = $superviseurId;

}


}