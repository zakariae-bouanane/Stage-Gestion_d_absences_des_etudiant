<?php 
include '../includes/Db_conn.php';
session_start();


    if (isset($_POST['import']) && isset($_POST['groupe']) && isset($_FILES['excel']) && $_FILES['excel']['error'] == 0) {
        
        //Allowed types 
            $Allowed_file_extensions = array('xlsx','xlsm','xlsb','xltx');
            //extracting file extension
            $file_name = $_FILES['excel']['name'];	
            $ext = explode('.',$file_name);
            $file_ext = strtolower(end($ext));
            
        
            
                
                        $newFilename = date("y-m-d") . " - " . date("h.i.s a").".".$file_ext;
                
                        
                        $dir = "uploads/" . $newFilename;
                        $fold = "uploads/";
                        //create Dir if not exist
                        if (!file_exists($fold)){
                            mkdir($fold, 0777, true);
                        };
                        
                        //moving file
                        move_uploaded_file($_FILES["excel"]['tmp_name'] , $dir);
                        unset($_FILES);

                        //Reading excel
                        error_reporting(0);
                        ini_set('display_errors',0);
                
                        require 'excelReader/excel_reader2.php';
                        require 'excelReader/SpreadsheetReader.php';
                
                        $reader = new SpreadsheetReader($dir);
                        

                        //return all ids
                        $cin_query = "SELECT id_etudiant from stagiaires";
                        $rs = $conn -> query($cin_query);  
                        
                        $List_ids = array();
                        $List_Excel_ids = array();
                        $dups = 0;
                        $succ = 0;                        
                        // Loop over the result set and push each row into the $users array
                        while ($row = $rs->fetch_assoc()) {                                            
                            $List_ids[] = $row['id_etudiant'];
                        }

                        $grp_id = $_POST['groupe'];

                        $header_row = $reader->current();

                if(strtolower($header_row[0]) == 'id_etudiant' or strtolower($header_row[1]) == 'matricule' or strtolower($header_row[2]) == 'nom' or strtolower($header_row[3]) == 'prenom' or strtolower($header_row[4]) == 'prenom2' or strtolower($header_row[5]) == 'datedenaissance' or strtolower($header_row[6]) == 'actif'){
                        
                        $reader->next();
                        $ids = array();
                        $c = 0 ;

                        foreach($reader as $key => $row){                        
                                    if($c==0){
                                        $c++;
                                        continue;
                                    }
                                    $id_et = $row[0];
                                    $mat = $row[1];
                                    $nom = $row[2];   
                                    $prenom = $row[3];   
                                    $prenom2 = $row[4];   
                                    $date = $row[5];   
                                    $actif = $row[6]; 
                                    
                            if(in_array($id_et , $ids)){
                                $_SESSION['warning_message'] = "ID en double dans le fichier excel";
                                header('location:excelhandler.php?id=0');
                            }else{
                                $ids[] = $id_et;
                            }
                                    
                                //check for duplicates
                            if(in_array( $id_et , $List_ids )){                                  
                                $dups++;
                                continue;
                            }

                            
                            try {
                                // Execute your SQL query here
                                $query = "INSERT INTO `stagiaires`(`id_etudiant`, `Matricule`, `Nom`, `Prenom`, `Prenom2`, `DatedeNaissance`, `Actif` , `id_g`, `login`, `password`) 
                                                    values('$id_et','$mat','$nom','$prenom','$prenom2', STR_TO_DATE('$date', '%d/%m/%Y'),'$actif','$grp_id','$id_et','$id_et')";
                                $conn->query($query);
                                $succ++;   

                            }catch(Exception $e) {
                                        $_SESSION['warning_message'] = "ID en double trouvé dans le fichier Excel !";
                                        header('location:excelhandler.php?id=0');                                
                            }                                                           
                        
                        }  
                }else{
                    $_SESSION['err_message'] = 'Ordre des colonnes incorrect dans Excel | (id_et,Mat,Nom,Prenom,Prenom2,Date,Act)';
                    header("location:excelhandler.php?id=0");
                }
                
                unlink($dir);

                        
                if($dups > 0){                    
                    $_SESSION['warning_message'] = "<b style='color:greenyellow;'> $succ Stagiaires Importés ! </b>  | Identifiant en double trouvé ! ($dups ID existe déjà) ";
                    header('location:excelhandler.php?id=0');
                    
                }elseif($succ > 0 ){
                    $_SESSION['succ_message'] = "Importation terminée ! => $succ Stagiaires Ajouté";
                    header('location:excelhandler.php?id=0');
                }
            
    
    }else{
        $_SESSION['err_message'] = "Quelque chose s'est mal passé !";
        header("location:excelhandler.php?id=0");     
        }   

?>