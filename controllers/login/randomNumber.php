<?php
$num = rand(100000,1000000);
$exp = time()+10;

setcookie("randomNumber",$num, $exp);


?>
<span id="count"></span>

<script>
		var count= 0;
        var show= document.getElementById("count");
        setInterval( function(){
            if(count){
                show.innerHTML ="%d S".replace("%d", count);
                count--;
            }
        } ,1000)	
</script>

