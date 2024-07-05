<?php
    require_once('_config.php');
    
?>

<div id="die1">--</div>

<button id="rollTest">Roll</button>


<script>
    const die1=document.getElementById("die1");
    const roll=document.getElementById("rollTest");
  

    roll.onclick=function(){

        const xmlhttp=new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) {
            if (xmlhttp.status == 200) {
                die1.innerHTML = xmlhttp.responseText;
            }
        }
  };

        xmlhttp.open("GET","/api.php?action=roll",true);
        xmlhttp.send();
    };

   
</script>