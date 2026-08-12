<?php

function getMoyenne(int $id_classe,int $id_matiere,int $id_periode):float{
    $pdo = deconnecteDB();
    $sql = "SELECT ROUND(AVG((d1 + d2 + comp) / 3.0), 2) AS moyenne_classe
            FROM ( SELECT
            ev.id_inscri,
            COALESCE(MAX(CASE WHEN ev.types = 'Devoir 1'    THEN ev.note END), 0) AS d1,
            COALESCE(MAX(CASE WHEN ev.types = 'Devoir 2'    THEN ev.note END), 0) AS d2,
            COALESCE(MAX(CASE WHEN ev.types = 'Composition' THEN ev.note END), 0) AS comp
            FROM inscriptions i
            INNER JOIN evaluations ev
            ON ev.id_inscri = i.id
            INNER JOIN cours c
            ON ev.id_cours = c.id
            INNER JOIN annee_scolaire a
            ON i.id_annee = a.id
            WHERE i.id_classe = :id_classe
            AND c.id_matiere = :id_matiere
            AND ev.id_periode = :id_periode
            AND a.est_active = 1
            GROUP BY ev.id_inscri)";
    $moyenne = executeQuery($pdo,$sql,['id_classe'=>$id_classe,'id_matiere'=>$id_matiere,
                                        'id_periode'=>$id_periode]);
    return $moyenne['moyenne_classe'] ?? 0.0;
}