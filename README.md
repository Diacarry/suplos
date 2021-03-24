# suplosBackEnd
Prueba suplos desarrollador backend

Para el proyecto se utilizo php en su version 7.2 y gestor de base de datos mysql version 5

Tambien se entrega un script con la configuracion de la base de datos

Los datos se conexion se aclarar a continuacion
servername = localhost
username = root
password = root
dbname = Intelcost_bienes

La vista principal es index.php y no index.html

La informacion del aplicativo se muestra en tres pestañas
- Bienes disponibles
	Informacion extraida del archivo 'data-1.json', la cual puede ser filtrada por ciudad, tipo y precio del menu del lado izquierdo, si se desea se pueden almacenar los items a la base de datos con el boton 'Guardar'

- Mis bienes
	Informacion almacenada de la base de datos, se pueden eliminar item con el boton 'eliminar'
- Reporte
	Informacion que puede ser exportada en excel con informacion del archivo 'data-1.json', puede ser filtrada antes de generar el documento
