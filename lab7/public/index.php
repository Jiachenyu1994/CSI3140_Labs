<?php
    require_once('_config.php');
    
?>

<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>


        <div id="die1">--</div>

        <button id="rollTest">Roll</button>


        <script>
            const die1=document.getElementById("die1");
            const roll=document.getElementById("rollTest");


        
            roll.onclick = async function() {
                let answer = $.ajax({
                type: "GET",
                url: "api.php?action=roll"
                }).then(function(data) {
                die1.innerHTML = data.value;
                });
            };
   

        </script>
    </body>
    </html>