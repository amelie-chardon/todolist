<?php

class user extends bdd{
//user
    private $id = NULL;
    private $mail = NULL;
    private $prenom = NULL;
    private $nom = NULL;
   //taches
    private $id_taches = NULL;
    private $etat = NULL;
    private $titre = NULL;
    private $description = NULL;
    private $date = NULL;


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
        //TODO : gérer l'enregistrement des tâches pour que l'utilisateur connecté puisse retrouver son tableau lors de la prochaine connexion (charger les taches selon la colonne dans todolist.php)
        if($titre!= NULL && $description!= NULL){
            $this->connect();
            $this->execute("INSERT INTO taches (id_utilisateurs,titre,date_creation,description) VALUES('$this->id','$titre',NOW(),'$description')");
            return "ok";
        }
        else
        {
            return "empty";
        };
    }

    public function recup_tache_todo(){
        //Recupération données dans la BDD des TODO en cours
        $this->connect();
        $fetch=$this->execute("SELECT titre,date_creation,description,etat FROM taches WHERE etat = 'todo' ");

        if($fetch==null){
           
        }
        
            else{
                foreach ($fetch as list($titre,$date,$description,$etat)){
                
                
                $this->titre = $titre;
                $this->date = $date;
                $this->etat = $etat;
                $this->description = $description;
                }
            }
       
        
        }
        public function recup_tache_done(){
            //Recupération données dans la BDD des TODO en cours
            $this->connect();
            $fetch=$this->execute("SELECT titre,date_creation,description,etat FROM taches WHERE etat = 'done' ");
    
            if($fetch==null){
                echo "Aucune tache encore reussi !";
            }
            
                else{
                    foreach ($fetch as list($titre,$date,$description,$etat)){
                    
                    
                    $this->titre = $titre;
                    $this->date = $date;
                    $this->etat = $etat;
                    $this->description = $description;
                    }
                }
           
            
            }
        public function change_pouet ($id_taches,$etat){
            //passage du todo -> done & done->todo
            $connect=mysqli_connect('localhost', 'root', '','tdl');
            $select="SELECT id,etat FROM taches WHERE  `taches`.`id` = $id_taches";
            $query=mysqli_query($connect,$select);
            $fetch=mysqli_fetch_all($query);

            foreach ($fetch as list($id_taches,$etat)){

            if($etat=="todo"){
                $this->execute("UPDATE `taches` SET `etat` = 'done' WHERE `taches`.`id` = $id_taches");
            }else{
                $this->execute("UPDATE `taches` SET `etat` = 'todo' WHERE `taches`.`id` = $id_taches");
            }
        }
            
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

    public function getEtat(){
        return $this->etat;
    }

    public function gettitre(){
        return $this->titre;
    }
    public function getdate(){
        return $this->date;
    }
    public function getdescription(){
        return $this->description;
    }
    public function getid_taches(){
        return $this->id_taches;
    }
}
?>