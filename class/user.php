<?php

class user extends bdd{

    private $id = NULL;
    private $mail = NULL;
    private $prenom = NULL;
    private $nom = NULL;


    public function inscription($prenom,$nom,$mdp,$confmdp,$mail){
        if($prenom != NULL && $nom != NULL&& $mdp != NULL && $confmdp != NULL && $mail != NULL){
            if($mdp == $confmdp){
                $this->connect();
                $requete = "SELECT email FROM utilisateurs WHERE email = '$mail'";
                $query = mysqli_query($this->connexion,$requete);
                $result = mysqli_fetch_all($query);
                
                if(empty($result)){
                    $mdp = password_hash($mdp, PASSWORD_BCRYPT, array('cost' => 12));
                    $requete = "INSERT INTO utilisateurs(nom,prenom,email,password) VALUES ('$nom','$prenom','$mail','$mdp')";
                    $query = mysqli_query($this->connexion,$requete);
                    return "ok";
                    }
                else{
                    return "log";
                }
            }
            else{
                return "mdp";
            }
        }
        else{
            return "empty";
        };

    }
    public function connexion($mail,$mdp){
        $this->connect();
        $requete = "SELECT * FROM utilisateurs WHERE email = '$mail'";
        $query = mysqli_query($this->connexion,$requete);
        $result = mysqli_fetch_assoc($query);

        if(!empty($result)){
            if($mail == $result["email"]){
                if(password_verify($mdp,$result["password"])){
                    $this->id = $result["id"];
                    $this->prenom = $result["prenom"];
                    $this->nom = $result["nom"];
                    $this->mail = $result["email"];
                    echo "Succes";
                }
                else{
                    echo "Echec";
                }
            }
            else{
                echo "Echec";
            }
        }
        else{
            echo "Echec";
        }
    }
    
    public function disconnect(){
        $this->id = NULL;
        $this->nom = NULL;
        $this->mail = NULL;
        $this->prenom = NULL;
    }

    public function tache($titre,$description){
        if($titre!= NULL && $description!= NULL){
            //$this->connect();
            //$this->execute("INSERT INTO taches (id_utilisateurs,titre,date_creation,description) VALUES('$this->id','$titre',NOW(),'$description')");
            return "ok";
        }
        else
        {
            return "empty";
        };
    }

    //FONCTIONS GET//

    public function getid(){
        return $this->id;
    }

    public function isConnected(){
        if ($this->id != null) {
            return true;
        } else {
            return false;
        }
    }

    public function getmail(){
        return $this->mail;
    }
    
    public function getprenom(){
        return $this->prenom;
    }

    public function getnom(){
        return $this->nom;
    }


}
?>