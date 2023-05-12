var id = document.getElementById("id_stg").value;
var semain = document.getElementById("semain").value;

                if (id !== null && semain !==null) {
                    
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
                    }}
                    xhttp.open("GET",`Load_single_Abs_stg.php?id_s=${id}&semain_de=${semain}` , true)
                    xhttp.send()
                    }





//////////////////////////////

window.onload = function(){
    
    var options = document.getElementById("week").options;
    

    for (var i = 0; i < options.length; i++) {
        options[i].style.display = "none";
    }
}
/////////////////////
function setYear(e){
    let sems = document.getElementById('week').options

    for (var i = 0; i < sems.length; i++) {
        sems[i].style.display = "none";
    }

    Array.from(sems).map((items)=>{
        
        if( e == items.innerText.trim().substring(0, 4)){
            items.style.display = 'block'
        }
    })
}