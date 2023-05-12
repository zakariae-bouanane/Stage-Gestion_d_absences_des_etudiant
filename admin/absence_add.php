<?php
include '../includes/Db_conn.php';
session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Iterate over each student and day of the week
    foreach ($_POST as $key => $value) {
        if ( strpos($key, 'di') !== false) {
            
            // Extract the student name and day of the week from the key
            $parts = explode('_', $key);
            
            //last index (id)
            $lastIndex = count($parts) - 1;      
            $student_id =  $parts[$lastIndex];        
            
            //day
            $day_of_week = ucfirst($parts[0]);

            //full name 
            if ($parts[6] === '*') {
                $parts[6] = ' ';}
            $full_name = $parts[4].' '.$parts[5].' '.$parts[6];
            
            //from to
            $start_time = $parts[2];
            $end_time = $parts[3];
            
            
            
            // If the checkbox is checked, record the time period
            if (isset($value)) {            
                $when_abs = $day_of_week.'_'. $start_time.'_'. $end_time;             
                
                
                $semain = $_SESSION['abs_sem'];
                $query_grp = "SELECT id_g from stagiaires where id_etudiant='$student_id'";
                $res = $conn->query($query_grp);
                $grp = $res->fetch_assoc();
                $grp1 = $grp['id_g'];
                
                $year = date('Y');

                
                
                $query_abs = "INSERT INTO `absence`( `stg_name_abs`, `when_abs`, `full_when_string`, `sumain_du`, `year`, `id_grp`, `id_stg`) 
                                VALUES ('$full_name','$when_abs','$key','$semain','$year','$grp1','$student_id')";
                $res = $conn->query($query_abs);
            }
            }
        }
        if(isset($grp1) && $res != false){
            $_SESSION['succ_message'] = "Ajouté avec succès !";
            header("location:AddAbsence.php?groupe=$grp1");
        }else{
            $_SESSION['err_message'] = "Quelque chose n'a pas fonctionné !";
            header("location:AddAbsence.php");
        }
            
        
        }

// Extract the time period from the key and use it to determine the start and end times
        // $time_period = isset($parts[4]) ? $parts[3] . '-' . $parts[4] : '';
        // switch ($time_period) {
        //     case 'morning-8to10':
        //         $start_time = '8:00';
        //         $end_time = '10:00';
        //         break;
        //     case 'morning-10to12':
        //         $start_time = '10:00';
        //         $end_time = '12:00';
        //         break;
        //     case 'afternoon-2to4':
        //         $start_time = '2:00';
        //         $end_time = '4:00';
        //         break;
        //     case 'afternoon-4to6':
        //         $start_time = '4:00';
        //         $end_time = '6:00';
        //     break;
        //     default:
        //         $start_time = '';
        //         $end_time = '';
        // }
?>