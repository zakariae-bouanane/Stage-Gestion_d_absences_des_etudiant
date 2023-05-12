


function SetLabel(elem)
    {           
        if(elem.value.length == 0){
            for(let i of document.getElementsByClassName('content')){
                i.innerHTML = ''
            }

            for(let i of document.getElementsByClassName('th')){
                i.innerHTML = ''
            }
            
            for(let i of document.getElementsByClassName('label')){
                i.innerHTML = ''
            }
            document.getElementById('sub').innerHTML = ''
        }

        const labels = document.getElementsByClassName('label')
        if (/\w+/.test(elem.value)) {     
            //check for common words
            let newVal = elem.value.replace("'", ' '); 
            newVal = newVal.trim()
            let wordsToRemove = ["des", "et", "de","d","en","à"];
            let pattern = new RegExp('\\b(' + wordsToRemove.join('|') + ')\\b', 'gi');
            newVal = newVal.replace(pattern, '');

            const sign = newVal.split(/ (?=[^\s])/);

            if(sign.length == 1 && sign[0][0] != ' ' ){
                globalThis.grp_short = ''
                grp_short = sign[0][0].toUpperCase()
            
                for(i of labels){
                    i.textContent = grp_short
                }
        }else if(sign.length == 2){
            globalThis.grp_short = ''
            grp_short = sign[0][0].toUpperCase()
            grp_short += sign[1][0].toUpperCase()

            for(i of labels){
                i.textContent = grp_short
            }
        }  else{
            globalThis.grp_short = ''
            grp_short = sign[0][0].toUpperCase()
            grp_short += sign[1][0].toUpperCase()
            grp_short += sign[2][0].toUpperCase()

            for(i of labels){
                i.textContent = grp_short
            }
        }        
            
        } else {
            elem.value = ''
            return 0 
        }


        
    }

    function setTable(){
        const content = document.getElementsByClassName('content')
        const ths = document.getElementsByClassName('th')
        globalThis.fil = document.getElementById('fil').value;

        if(fil.length > 0){
            
            ths[0].innerHTML = `<button class="btn btn-outline-primary btn-sm" onclick='incr()'><i class="fa-solid fa-plus"></i></button>  
                                <button class="btn btn-outline-warning btn-sm" onclick='decr()'><i class="fa-solid fa-minus"></i></button>`
            
            ths[1].innerHTML = `<button class="btn btn-outline-primary btn-sm" onclick='incr2()'><i class="fa-solid fa-plus"></i></button>  
                                <button class="btn btn-outline-warning btn-sm" onclick='decr2()'><i class="fa-solid fa-minus"></i></button>`

            document.getElementById('sub').innerHTML = '<button class="btn btn-danger" onclick="submitData(event)">Soumettre</button>'
            globalThis.counter1 = 101
            globalThis.counter2 = 201
            content[0].innerHTML = ''
            content[1].innerHTML = ''

            if(grp_short.length != 0)
            {
                content[0].innerHTML += `
                <li> <span class='fs-5'>${grp_short}${counter1}</span>  </li>
            `
            content[1].innerHTML += `
                <li> <span class='fs-5'>${grp_short} ${counter2}</span>  </li>
            `
            }
        }
    }

    function incr(){
        if(counter1 == undefined){
            
        }else{
            const content = document.getElementsByClassName('content')        

            counter1 = counter1 + 1

            content[0].innerHTML += `
                <li> <span class='fs-5'>${grp_short}${counter1}</span> </li>
            `
        }
        
    }

    function decr(){
        const content = document.getElementsByClassName('content')        
        
        if(content[0].children.length>0){
            content[0].children[content[0].children.length-1].remove()
            counter1 = counter1 - 1  
        }
    }

    function incr2(){
        const content = document.getElementsByClassName('content')      
        
        counter2 = counter2 + 1

        content[1].innerHTML += `
            <li> <span class='fs-5'>${grp_short}${counter2}</span> </li>
        `
    }
    
    function decr2(){
        const content = document.getElementsByClassName('content')        
        
        if(content[1].children.length>0){
            content[1].children[content[1].children.length-1].remove()
            counter2 = counter2 - 1  
        }      
    }


function submitData(e){
    e.preventDefault();
    var groups = []

    const content = document.getElementsByClassName('content')       
    
    

    for(i of content[0].children){
        let grp = i.textContent.replace(/\s/g, '')
        grp +='_1'
        groups.push(grp)
    }
    for(j of content[1].children){
        let grp = j.textContent.replace(/\s/g, '')
        grp +='_2'
        groups.push(grp)
    }
    document.getElementById('sub').innerHTML = ''

    $(document).ready(function(){
        fil = fil.replace("'", ' '); 
        var data = {
            filieres : fil.charAt(0).toUpperCase() + fil.slice(1),
            groupes : JSON.stringify(groups)
        }
        
        
        $.ajax({
            url:'AddedGrpfil.php',
            type:'post',
            data:data,

            success:function(res){
                
                window.location = ('Groupe&filiere.php')
                
            }
        })
    })
}

