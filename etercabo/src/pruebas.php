
<!DOCTYPE html>
<html lang="ENG">
<head>
    <title>Circle Measure</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        body{
            background: #000000;
            font-family:'Roboto', sans-serif;
        }

        body h1{
            text-align: center;
            color: #ffffff;
        }

        .btn{
            margin:2% 0% 0% 19%; 
        }

        .container{
            margin:0% 20% 20% 40%;
        }

        footer{
           position: absolute;
           bottom: 0;
           left: 20%;
           right: 20%;
        }

        
/* 
             __Medidor Circular v0.1__
            Estilos del medidor Circular 

*/
.measurer{
  width: 100%;
  max-width: 250px;
  font-size:32px;
  color:#C2C2C2;
}


.bd-measurer{
   width: 100%;
   height: 0;
   padding-bottom: 50%;
   background:#515353;
   position: relative;
   border-top-left-radius: 100% 200%;
  border-top-right-radius: 100% 200%;
  overflow: hidden;
}

.fill-measurer{
  position: absolute;
  top: 100%;
  left: 0;
  width: inherit;
  height: 100%;
  background: #07DDF6;
  transform-origin:center top; 
  transform: rotate(0.0turn);
  transition: transform 0.7s ease-out;
}

.cover-measurer{
   width: 75%;
   height: 150%;
   background:#000000;
   position: absolute;
   border-radius: 50%;
   top: 25%;
   left: 50%;
   transform: translateX(-50%);

   /*Text*/
   display: flex;
   align-items: center;
   justify-content: center;
   color: #07DDF6;
   padding-bottom: 25%;
   box-sizing: border-box;
}


    </style>
</head>
<body>

    <h1>Circle Measure V.1</h1>

    <div class="container">
        <div class="measurer">
            <div class="bd-measurer">
                <div class="fill-measurer" id="load"></div>
                <div class="cover-measurer" id="percentage">0%</div>
            </div>
        </div>

        <div class="btn">
            <input type="button" value="Testear" onclick="interval()" />
        </div>
    </div>

    <?php
    
/* 
             __Medidor Circular v0.1__
   Esta funcion se encargara de graficar los porcentajes 

*/

function measurer(data) {

    value  = data / 100;
    var medidor = document.getElementById("load");
    var data = document.getElementById("percentage");
    
    var rotate = "rotate("+ value / 2 +"turn)";
    data.innerHTML= Math.round(value * 100)+"%";
    medidor.style.transform = rotate;
  
  }

    ?>

    <?php
    
/* 
            __Tester Medidor v.1__
   Este archivo generara numeros aleatorios
   y los Enviara a la funcion medidor que sera  
   la encargada de graficar los porcentajes recibidos

*/

var count = 0;
var interval;
var cycles = 20;
var seconds = 1000;

function interval() {
  interval = setInterval(values,seconds);
}

function values() {

  var percentage = parseInt(Math.random()*100);
  measurer(percentage);

  count++;
?> <?php
  if (count >= cycles){
      clearInterval(interval);
  }
}
    ?>

 <footer>
     <h1>Daniel Quintero Henriquez</h1>
 </footer>
     <script src="test.js" type="text/javascript"></script>
    <script src="circle-measure.js" type="text/javascript"></script>
</body>
</html>
