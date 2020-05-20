<?php

class TacosManager 
{
    public static function findTacos($idTacos)
    {
        $tacos = new Tacos();
        $login = DatabaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Tacos WHERE idTacos = ?");
        $state->bindParam(1, $idTacos);
        $state->execute();
        $resultat = $state->fetchAll();
        
        foreach ($resultat as $lineResultat)
        {
            $tacos->setIdTacos($lineResultat["idTacos"]);
            $tacos->setIdTaille($lineResultat["idTaille"]);
            $tacos->setIdViande1($lineResultat["idViande1"]);
            $tacos->setIdViande2($lineResultat["idViande2"]);
            $tacos->setIdViande3($lineResultat["idViande3"]);
            $tacos->setIdSauce1($lineResultat["idSauce1"]);
            $tacos->setIdSauce2($lineResultat["idSauce2"]);
        }
        
        return $tacos;
    }
    
    public static function findAllTacos()
    {
        $tacos = new Tacos();
        $tabTacos = [];
        $login = dataBaseLinker::getConnexion();
        
        $state = $login->prepare("SELECT * FROM Tacos");
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $tacos = TacosManager::findTacos($lineResultat["idTacos"]);
            $tabTacos[] = $tacos;
        }
        
        return $tabTacos;
    }
    
    public static function insertTacos($tacos)
    {
        $login = databaseLinker::getConnexion();
        
        $size = $tacos->getIdTaille();
        $viande1 = $tacos->getIdViande1();
        $viande2 = $tacos->getIdViande2();
        $viande3 = $tacos->getIdViande3();
        $sauce1 = $tacos->getIdSauce1();
        $sauce2 = $tacos->getidSauce2();
        
        switch ($size)
        {
            case 1:
                $state = $login->prepare("INSERT INTO Tacos (idTaille, idViande1, idSauce1) VALUES (?,?,?)");
        
                $state->bindParam(1, $size);
                $state->bindParam(2, $viande1);
                $state->bindParam(3, $sauce1);
                break;
            case 2:
                $state = $login->prepare("INSERT INTO Tacos (idTaille, idViande1, idViande2, idSauce1, idSauce2) VALUES (?,?,?,?,?)");
        
                $state->bindParam(1, $size);
                $state->bindParam(2, $viande1);
                $state->bindParam(3, $viande2);
                $state->bindParam(4, $sauce1);
                $state->bindParam(5, $sauce2);

                break;
            case 3:
                $state = $login->prepare("INSERT INTO Tacos (idTaille, idViande1, idViande2, idViande3, idSauce1, idSauce2) VALUES (?,?,?,?,?,?)");
        
                $state->bindParam(1, $size);
                $state->bindParam(2, $viande1);
                $state->bindParam(3, $viande2);
                $state->bindParam(4, $viande3);
                $state->bindParam(5, $sauce1);
                $state->bindParam(6, $sauce2);

                break;
        }
        $state->execute();
        
        
        $tacos->setIdTacos($login->lastInsertId());
    }
    
    public static function getLatestTacosID($nbTacos)
    {
        $login = databaseLinker::getConnexion();
        $latestTacos = [];
        
        $state = $login->prepare("SELECT idTacos FROM Tacos ORDER BY idTacos DESC LIMIT ?");
        
        $state->bindParam(1, $nbTacos);
        
        $state->execute();
        $resultats=$state->fetchAll();
        
        foreach($resultats as $lineResultat)
        {
            $latestTacos[] = $lineResultat["idTacos"];
        }
        
        return $latestTacos;
    }
}
