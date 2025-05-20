<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Medidor de Calidad de Aire</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        
        .container {
            margin-top: 50px;
        }
        .measurer {
            width: 100%;
            max-width: 250px;
            font-size: 32px;
            color: #C2C2C2;
            margin: auto;
        }
        .bd-measurer {
            width: 100%;
            height: 0;
            padding-bottom: 50%;
            background: #ACB1FF;
            position: relative;
            border-top-left-radius: 100% 200%;
            border-top-right-radius: 100% 200%;
            overflow: hidden;
        }
        .fill-measurer {
            position: absolute;
            top: 100%;
            left: 0;
            width: inherit;
            height: 100%;
            background: #07DDF6;
            transform-origin: center top;
            transform: rotate(0.0turn);
            transition: transform 0.7s ease-out;
        }
        .cover-measurer {
            width: 75%;
            height: 150%;
            background: #f4f4f4;
            position: absolute;
            border-radius: 50%;
            top: 25%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            padding-bottom: 25%;
            box-sizing: border-box;
        }
        .button {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body> 
   
<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <a href="login.php" class="d-flex align-items-center text-white text-decoration-none">
                    <img src="imagenes/CA.png" height="80">
                </a>
                <ul class="nav">
                    <li><a href="#" class="nav-link text-secondary">Home</a></li>
                    <li><a href="medidor.php" class="nav-link text-white">Medidor</a></li>
                    <li><a href="actividad.php" class="nav-link text-white">Actividad</a></li>
                    <li><a href="#" class="nav-link text-white">Customers</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
    
    <div class="container">
        <h1>Medidor de Calidad de Aire</h1>
        <div class="measurer">
            <div class="bd-measurer">
                <div class="fill-measurer" id="fillMeasurer"></div>
                <div class="cover-measurer" id="airQualityText">Buena</div>
            </div>
        </div>
        <button class="button" onclick="togglePurifier()">Encender Purificador</button>
    </div>

    <script>
        function updateAirQuality(value) {
            const fillMeasurer = document.getElementById("fillMeasurer");
            const airQualityText = document.getElementById("airQualityText");
            let rotation = 0;
            let color = "#07DDF6";
            
            if (value < 50) {
                rotation = 0.15;
                color = "green";
                airQualityText.textContent = "Buena";
            } else if (value < 100) {
                rotation = 0.35;
                color = "yellow";
                airQualityText.textContent = "Moderada";
            } else {
                rotation = 0.5;
                color = "red";
                airQualityText.textContent = "Mala";
            }
            
            fillMeasurer.style.transform = `rotate(${rotation}turn)`;
            fillMeasurer.style.background = color;
        }

        function togglePurifier() {
            alert("Purificador encendido");
        }

        // Simulación de datos dinámicos
        setInterval(() => {
            const randomValue = Math.floor(Math.random() * 200);
            updateAirQuality(randomValue);
        }, 3000);
    </script>

<footer class="py-5">
    <div class="row">
      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-2">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>

      <div class="col-4 offset-1">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of whats new and exciting from us.</p>
          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>&copy; 2021 Company, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
      </ul>
    </div>
  </footer>
</body>
</html>
