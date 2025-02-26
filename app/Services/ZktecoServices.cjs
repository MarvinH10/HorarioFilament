const ZKLib = require('node-zklib');

async function connectZK() {
    try {
        const zk = new ZKLib("192.168.0.201", 4370, 5200, 5000);
        await zk.createSocket();
        console.log("✅ Conectado exitosamente");

        let usuarios = await zk.getUsers();
        console.log("👤 Usuarios registrados:");
        console.log(usuarios);

        await zk.disconnect();
        console.log("🔌 Desconectado exitosamente");
    } catch (error) {
        console.error("❌ Error de conexión:", error);
    }
}

connectZK();
