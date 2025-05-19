import './index.css';
import './funciones.js';
import sensorImg from './assets/sensor.png'; // Asegúrate de tener una imagen

function App() {
  return (
    <div className="container">
      <h1>Sistema de Monitoreo de Calidad del Aire</h1>

      <div className="tarjeta-sensor">
        <img src={sensorImg} alt="Sensor" className="sensor-img" />
        <h2>Dispositivo 1</h2>
        <p>CO₂: 410 ppm</p>
        <p>PM2.5: 12 µg/m³</p>
        <p>Temperatura: 23°C</p>
        <p>Humedad: 45%</p>
      </div>
    </div>
  );
}

export default App;
