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
                    }}
                    xhttp.open("GET",`Load_Abs_stg.php?grp=${grp}&semain_de=${semain}` , true)
                    xhttp.send()
                    }
///////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////
        // window.onload = function(){
        //     var options1 = document.getElementById("second_drop").options;
        //     var options = document.getElementById("week").options;
            
        //     for (var i = 0; i < options1.length; i++) {
        //         options1[i].style.display = "none";
        //     }            

        //     for (var i = 0; i < options.length; i++) {
        //         options[i].style.display = "none";
        //     }
        // }

        
    
        function updateDrop(){
            // Get the selected value from the first dropdown menu
            var selectedValue = document.getElementById("first_drop").value;
            // Hide all options in the second dropdown menu
            var options = document.getElementById("second_drop").options;
            for (var i = 0; i < options.length; i++) {
                options[i].style.display = "none";
            }
            // Show only the options that belong to the selected value in the first dropdown menu
            var selectedOptions = document.querySelectorAll(`option[name="${selectedValue}"]`);
            for (var i = 0; i < selectedOptions.length; i++) {
                selectedOptions[i].style.display = "block";
            }
        }


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


        //  // Get the button element
// var exportBtn = document.getElementById('export-btn');

// // Add a click event listener to the button
// exportBtn.addEventListener('click', function() {
//     // Get the table element
//     var table = document.getElementById('absencesTable')

//     // Get the table data as an array
//     var tableData = [];

//     for (var i = 0, row; row = table.rows[i]; i++) {
//         var rowData = [];
//         for (var j = 0, col; col = row.cells[j]; j++) {
            
//             if (col.colSpan > 1) {
//                 rowData.push(col.textContent);
//                 rowData.push(' ');                
//                 rowData.push(' ');
//                 rowData.push(' ');
//             }else{
//                 rowData.push(col.textContent);
//             }         
            
//         }
//         tableData.push(rowData);
//     }

//     // Create a workbook and worksheet
//     var workbook = XLSX.utils.book_new();
//     var worksheet = XLSX.utils.aoa_to_sheet(tableData);

//     var style = {
//         font: { bold: true },
//         fill: { bgColor: { rgb: "FFFF0000" } },
//         alignment: { horizontal: "center" }
//     };
//     /* apply style to first row */
//     for (var col = 0; col < tableData[0].length; col++) {
//         var cell = XLSX.utils.encode_cell({ r: 0, c: col });
        
//         worksheet[cell].s = style;
//     }
//     // Add the worksheet to the workbook
//     XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

//     // Convert the workbook to a binary string
//     var wbout = XLSX.write(workbook, { bookType: 'xlsx', type: 'binary' });

//     // Create a blob object from the binary string
//     var blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });

//     var name = document.getElementById('js_grp').textContent
    
    

//     // Create a download link element
//     var downloadLink = document.createElement('a');
//     downloadLink.href = URL.createObjectURL(blob);
//     downloadLink.download = name+'.xlsx';

//     // Trigger the download by clicking the link
//     document.body.appendChild(downloadLink);
//     downloadLink.click();
//     document.body.removeChild(downloadLink);
//     });

//     // Utility function to convert a string to an ArrayBuffer
//     function s2ab(s) {
//     var buf = new ArrayBuffer(s.length);
//     var view = new Uint8Array(buf);
//     for (var i = 0; i < s.length; i++) {
//         view[i] = s.charCodeAt(i) & 0xff;
//     }
//     return buf;
// }

// function exportAbs(){
//     var xhttp ;

//                     xhttp = new XMLHttpRequest();
//                     var table = document.getElementById('absencesTable')
//                     //console.log(table)

//                     xhttp.onreadystatechange = function(){
//                         if (this.readyState == 4 && this.status == 200) {
//                             // var data = JSON.parse(xhttp.responseText);
//                             //console.log(data)
//                             // boxes = document.getElementsByClassName('boxes')
                            
//                             // Array.from(boxes).map((e)=>{
//                             //     data.map((i)=>{                                    
                                    
//                             //         if(e.getAttribute("name") == i){                                        
//                             //             e.textContent = 'A'
//                             //             e.style.color = '#dc3545'
//                             //             e.style.webkitTextStroke='1px #bf202040'
//                             //         }
//                             //     })
//                             // })
//                     }}
//                     xhttp.open("POST",`exportAbs.php?table=${table}` )
//                     xhttp.send()
// }