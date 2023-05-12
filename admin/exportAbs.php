<?php
include '../includes/Db_conn.php';
include '../includes/session.php';

    if (isset($_SESSION['view_grp']) && isset($_SESSION['semain_de'])) {
        echo '<input type="hidden" id="show-abs" value="'.$_SESSION['view_grp'].'">';
        echo '<input type="hidden" id="semain" value="'.$_SESSION['semain_de'].'">';
    }
?>


<?php



if(isset($_SESSION['view_grp']) and isset($_SESSION['semain_de'])) {
    $grp = $_SESSION['view_grp'];
    $sem = $_SESSION['semain_de'];
    
    
    // your HTML table code here
    echo  '
<table border="1" cellpadding="5" id="mytable">        
<thead>
    
    <tr>
        <th></th>
        <th colspan="4">Lundi</th>
        <th colspan="4">Mardi</th>
        <th colspan="4">Mercredi</th>
        <th colspan="4">Jeudi</th>
        <th colspan="4">Vendredi</th>
        <th colspan="4">Samedi</th>
    </tr>
    <tr>
        <th>Name</th>
        <th>8_10</th>
        <th>10_12</th>
        <th>2_4</th>
        <th>4_6</th>

        <th>8_10</th>  
        <th>10_12</th>
        <th>2_4</th>
        <th>4_6</th>

        <th>8_10</th>
        <th>10_12</th>
        <th>2_4</th>
        <th>4_6</th>

        <th>8_10</th>
        <th>10_12</th>
        <th>2_4</th>
        <th>4_6</th>

        <th>8_10</th>
        <th>10_12</th>
        <th>2_4</th>
        <th>4_6</th>

        <th>8_10</th>
        <th>10_12</th>
        <th>2_4</th>
        <th>4_6</th>

        
    </tr>
    </thead>
    <tbody> ';

    $query = "SELECT * from stagiaires where id_g = $grp";
    $res = $conn -> query($query);

    while($row = $res->fetch_assoc()){

        $id = $row['id_etudiant'];
        $row['Nom'] = str_replace(' ', '-', $row['Nom']);

        $fName = $row['Nom'].'_'.$row['Prenom'].'_'.(!empty($row['Prenom2']) ? '_'.$row['Prenom2'] : '*');

        $fName_no_ = str_replace( '*',' ',str_replace( '_', ' ', $fName));

        echo "
    <tr >
        <td > $fName_no_ </td>
        
        <td  class='boxes' name=\"lundi_matin_8_10_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"lundi_matin_10_12_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"lundi_après-midi_2_4_{$fName}_$id\"> P</td>
        <td class='boxes' name=\"lundi_après-midi_4_6_{$fName}_$id\"> P</td>
        
        <td class='boxes' name=\"mardi_matin_8_10_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"mardi_matin_10_12_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"mardi_après-midi_2_4_{$fName}_$id\"> P</td>
        <td class='boxes' name=\"mardi_après-midi_4_6_{$fName}_$id\"> P</td>
        
        <td class='boxes' name=\"mercredi_matin_8_10_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"mercredi_matin_10_12_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"mercredi_après-midi_2_4_{$fName}_$id\"> P</td>
        <td class='boxes' name=\"mercredi_après-midi_4_6_{$fName}_$id\"> P</td>
        
        <td class='boxes' name=\"jeudi_matin_8_10_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"jeudi_matin_10_12_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"jeudi_après-midi_2_4_{$fName}_$id\"> P</td>
        <td class='boxes' name=\"jeudi_après-midi_4_6_{$fName}_$id\"> P</td>
        
        <td class='boxes' name=\"vendredi_matin_8_10_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"vendredi_matin_10_12_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"vendredi_après-midi_2_4_{$fName}_$id\"> P</td>
        <td class='boxes' name=\"vendredi_après-midi_4_6_{$fName}_$id\"> P</td>
        
        <td class='boxes' name=\"samedi_matin_8_10_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"samedi_matin_10_12_{$fName}_$id\"  >P</td>
        <td class='boxes' name=\"samedi_après-midi_2_4_{$fName}_$id\"> P</td>
        <td class='boxes' name=\"samedi_après-midi_4_6_{$fName}_$id\"> P</td>
        

    </tr>
        ";

    }

    echo'</tbody> 
        </table>';
    
}

?>
<script>
    var grp = document.getElementById("show-abs").value;
    var semain = document.getElementById("semain").value;

                if (grp !== null && semain !==null) {
                    
                    var xhttp ;

                    xhttp = new XMLHttpRequest();

                    xhttp.onreadystatechange = function(){
                        if (this.readyState == 4 && this.status == 200) {
                            var data = JSON.parse(xhttp.responseText);
                            
                            boxes = document.getElementsByClassName('boxes')
                            
                            Array.from(boxes).map((e)=>{
                                data.map((i)=>{                                    
                                    
                                    if(e.getAttribute("name") == i){                                        
                                        e.textContent = 'A'
                                        e.style.color = '#dc3545'
                                        e.style.webkitTextStroke='1px #bf202040'
                                    }
                                })
                            })

                        // JavaScript code
                        var tableHtml = document.getElementById("mytable").outerHTML; // capture the HTML table
                        var xhr = new XMLHttpRequest();
                        console.log(tableHtml);
                        xhr.open("POST", "save_table.php", true);
                        // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        
                        xhr.send("tableHtml=" + encodeURIComponent(tableHtml)); // send the HTML table to the server

                    }}
                    xhttp.open("GET",`Load_Abs_stg.php?grp=${grp}&semain_de=${semain}` , true)
                    xhttp.send()
                    }
</script>

<?php

?>