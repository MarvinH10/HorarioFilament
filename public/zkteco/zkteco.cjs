const ZKLib = require('zklib');
const ip = '192.168.1.201';
const port = 4370;

const zk = new ZKLib({
    ip: ip,
    port: port,
    inport: 5200, // Puerto de entrada, puedes ajustarlo según sea necesario
    timeout: 5000, // Tiempo de espera en milisegundos
    connectionType: 'tcp' // Tipo de conexión
});

function connectZK() {
    return new Promise((resolve, reject) => {
        zk.connect((err) => {
            if (err) {
                reject(err);
            } else {
                resolve();
            }
        });
    });
}

function getAttendanceZK() {
    return new Promise((resolve, reject) => {
        zk.getAttendance((err, data) => {
            if (err) {
                reject(err);
            } else {
                resolve(data);
            }
        });
    });
}

function disconnectZK() {
    return new Promise((resolve, reject) => {
        zk.disconnect((err) => {
            if (err) {
                reject(err);
            } else {
                resolve();
            }
        });
    });
}

connectZK()
    .then(() => {
        console.log("Conectado exitosamente");
        return getAttendanceZK();
    })
    .then(attendances => {
        console.log("Datos de asistencia:");
        attendances.forEach(attendance => {
            console.log(`UID: ${attendance.uid}, ID: ${attendance.id}, Estado: ${attendance.state}, Timestamp: ${attendance.timestamp}`);
        });
        return disconnectZK();
    })
    .then(() => {
        console.log("Desconectado exitosamente");
    })
    .catch(err => {
        console.error("Error de conexión", err);
    });
