<?php
include_once '../controller/config.php';
include_once '../model/Reclamation.php';

class ReclamationC{
    function afficherreclamation($email){
        $sql="SELECT * FROM reclamation WHERE mail=('$email')" ;
        $db = config::getConnexion();
       
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){ 
            die('Erreur:'. $e->getMessage());
        }
        
    }
    function supprimerreclamation($Id){
        $sql="DELETE FROM reclamation WHERE id_reclamation=:Id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Id', $Id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}

    }
    function ajouterreclamation($reclamation){
        
        $sql="INSERT INTO  reclamation (type, date, description,mail, sujet) 
        VALUES (:type,:date,:description, :mail, :sujet)";
        $db = config::getConnexion();
        
        try{
            
           
            $query = $db->prepare($sql);
            $query->execute([
                'type' => $reclamation->gettype(),
                'date' => $reclamation->getdate(),
                'description' => $reclamation->getdescription(),
                'mail' => $_SESSION['email'],
                'sujet' => $reclamation->getsujet(),
                

                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }

    function recupererreclamation($Id){
        $sql="SELECT * from reclamation where id_reclamation=$Id";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $reclamation=$query->fetch();
            return $reclamation;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierreclamation($reclamation, $id_reclamation){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    type= :type, 
                    date= :date, 
                    description= :description, 
                    sujet=:sujet
                WHERE id_reclamation= :id'
            );
            $query->execute([
                'id_reclamation' =>$reclamation->id_reclamation(),
                'type' => $reclamation->gettype(),
                'date' => $reclamation->getdate(),
                'description' => $reclamation->getdescription(),
                'sujet' => $reclamation->getsujet(),
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function afficherreclamation1(){
        $sql="SELECT * FROM reclamation ";
        $db = config::getConnexion();
       
        try{
            $query=$db->prepare($sql);
            $query->execute();
            

            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:'. $e->getMessage());
        }
    }
    function rechercherreclamation($id)
    {
        $requete = "select * from reclamation where id_reclamation like '%$id%'";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function trierreclamation($email){
    $requete = "SELECT  * FROM reclamation WHERE mail=('$email') ORDER BY  date DESC  ";
    $config = config::getConnexion();
    try {
        $querry = $config->prepare($requete);
        $querry->execute();
        $result = $querry->fetchAll();
        return $result ;
    } catch (PDOException $th) {
         $th->getMessage();
    }
}
function trierreclamation1(){
    $requete = "SELECT  * FROM reclamation  ORDER BY  date DESC  ";
    $config = config::getConnexion();
    try {
        $querry = $config->prepare($requete);
        $querry->execute();
        $result = $querry->fetchAll();
        return $result ;
    } catch (PDOException $th) {
         $th->getMessage();
    }
}



    }
    ?>
