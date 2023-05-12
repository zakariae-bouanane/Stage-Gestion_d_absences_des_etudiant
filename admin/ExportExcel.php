<?php
error_reporting(0);
    include '../includes/Db_conn.php';
    include '../includes/session.php';

    $output = '';

    if(isset($_POST['export']) && isset($_POST['groupe3'])){
        $str = $_POST['groupe3'];
        $res_str = explode('-',$str);
        
        $id_g = $res_str[0];
        $nom_grp = $res_str[1];

        $query = "SELECT * from stagiaires where id_g = $id_g";

        $res = $conn->query($query);
        $res_row_num = $res->num_rows;

        if($res_row_num > 0){
            $output.="<table border='1'>
                            <thead>
                                    <tr>
                                        <th>id_etudiant</th>
                                        <th>Matricule</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Prenom2</th>
                                        <th>DatedeNaissance</th>
                                        <th>Actif</th>
                                        
                                    </tr>
                            </thead>
                        <tbody>
                    ";

            while ($row = $res->fetch_assoc()) {
                $output.='<tr>
                            <td>'.$row["id_etudiant"].'</td>
                            <td>'.$row["Matricule"].'</td>
                            <td>'.$row["Nom"].'</td>
                            <td>'.$row["Prenom"].'</td>
                            <td>'.$row["Prenom2"].'</td>
                            <td>'.$row["DatedeNaissance"].'</td>
                            <td>'.$row["Actif"].'</td>                            
                            
                        </tr>';
            }

            
            }

            $output.='</tbody> 
            </table>';
            $date = date("Y-m-d");
            $time = date("h-i-s");
            $fileName = 'Groupe:'.$nom_grp.'-'.$date.'_'.$time.'.xls';

            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=".$fileName);
            
            echo $output;
        }  else{
            $_SESSION['exp_err'] = 'Aucun étudiant trouvé dans ce Groupe ! ';
            header('location:excelhandler.php');
        }

        

// $cell = 1;
            // while ($row = $res->fetch_assoc()) {

            //     if($cell == 1){
            //         $sheet->setCellValue('A'.$cell, 'id_etudiant');
            //         $sheet->setCellValue('B'.$cell, 'Matricule');
            //         $sheet->setCellValue('C'.$cell, 'Nom');
            //         $sheet->setCellValue('D'.$cell, 'Prenom');
            //         $sheet->setCellValue('E'.$cell, 'Prenom2');
            //         $sheet->setCellValue('F'.$cell, 'DatedeNaissance');
            //         $sheet->setCellValue('G'.$cell, 'Actif');
            //     }else{
            //         $sheet->setCellValue('A'.$cell, $row["id_etudiant"]);
            //         $sheet->setCellValue('B'.$cell, $row["Matricule"]);
            //         $sheet->setCellValue('C'.$cell, $row["Nom"]);
            //         $sheet->setCellValue('D'.$cell,$row["Prenom"]);
            //         $sheet->setCellValue('E'.$cell, $row["Prenom2"]);
            //         $sheet->setCellValue('F'.$cell, $row["DatedeNaissance"]);
            //         $sheet->setCellValue('G'.$cell, $row["Actif"]);
            //     }


    
?>

