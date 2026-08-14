<?php


class AnneeModel{
    public function getAnnee():array{
        $pdo = deconnecteDB();
        $sql = " SELECT concat(EXTRACT(YEAR FROM debut),'-',EXTRACT(YEAR FROM fin)) AS dateannee FROM annee_scolaire  WHERE est_active =1";
        return query($pdo,$sql);
    }
}