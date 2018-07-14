<?php

namespace App\Http\Controllers\Administracion;

use Carbon\Carbon;
use Cornford\Backup\Backup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysqli;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion.backup.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


//aca los parametros de conexion, si tienes aparte la conexión , solo incluyuela
$usuario="root";
$passwd="root";
$host="localhost";
$bd="sistema_documental_clinicas";
$nombre="sistema-documental.sql"; //Este es el nombre del archivo a generar
/* Determina si la tabla será vaciada (si existe) cuando  restauremos la tabla. */
$drop = false;
$tablas = false; //tablas de la bd
// Tipo de compresion.
// Puede ser "gz", "bz2", o false (sin comprimir)

$compresion = false;//"gz";

/* Conexion */
$conexion = mysqli_connect($host, $usuario, $passwd)
or die("No se puede conectar con el servidor MySQL: ".mysqli_error());
mysqli_select_db($conexion,$bd)
or die("No se pudo seleccionar la Base de Datos: ". mysqli_error());
/* Se busca las tablas en la base de datos */
if ( empty($tablas) ) {
    $consulta = "SHOW TABLES FROM $bd;";
    $respuesta = mysqli_query($conexion,$consulta)
    or die("No se pudo ejecutar la consulta: ".mysqli_error());
    while ($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)) {
        $tablas[] = $fila[0];
    }
}
/* Se crea la cabecera del archivo */
$info['dumpversion'] = "1.1b";
$info['fecha'] = date("d-m-Y");
$info['hora'] = date("h:m:s A");
$info['mysqlver'] = mysqli_get_server_info($conexion);
$info['phpver'] = phpversion();
ob_start();
print_r($tablas);
$representacion = ob_get_contents();
ob_end_clean ();
preg_match_all('/(\[\d+\] => .*)\n/', $representacion, $matches);
$info['tablas'] = implode(";  ", $matches[1]);
$dump = <<<EOT
# +===================================================================
# |
# | Generado el {$info['fecha']} a las {$info['hora']} 
# | Servidor: {$_SERVER['HTTP_HOST']}
# | MySQL Version: {$info['mysqlver']}
# | PHP Version: {$info['phpver']}
# | Base de datos: '$bd'
# | Tablas: {$info['tablas']}
# |
# +-------------------------------------------------------------------
 
EOT;
foreach ($tablas as $tabla) {

    $drop_table_query = "";
    $create_table_query = "";
    $insert_into_query = "";

    /* Se halla el query que será capaz vaciar la tabla. */
    if ($drop) {
        $drop_table_query = "DROP TABLE IF EXISTS `$tabla`;";
    } else {
        $drop_table_query = "# No especificado.";
    }

    /* Se halla el query que será capaz de recrear la estructura de la tabla. */
    $create_table_query = "";
    $consulta = "SHOW CREATE TABLE $tabla;";
    $respuesta = mysqli_query($conexion, $consulta)
    or die("No se pudo ejecutar la consulta: ".mysqli_error());
    while ($fila = mysqli_fetch_array($respuesta, MYSQLI_NUM)) {
        $create_table_query = $fila[1].";";
    }

    /* Se halla el query que será capaz de insertar los datos. */
    $insert_into_query = "";
    $consulta = "SELECT * FROM $tabla;";
    $respuesta = mysqli_query($conexion, $consulta)
    or die("No se pudo ejecutar la consulta: ".mysqli_error());
    while ($fila = mysqli_fetch_array($respuesta, MYSQLI_ASSOC)) {
        $columnas = array_keys($fila);
        foreach ($columnas as $columna) {
            if ( gettype($fila[$columna]) == "NULL" ) {
                $values[] = "NULL";
            } else {
                $values[] = "'".mysqli_real_escape_string($conexion,$fila[$columna])."'";
            }
        }
        $insert_into_query .= "INSERT INTO `$tabla` VALUES (".implode(", ", $values).");\n";
        unset($values);
    }

    $dump .= <<<EOT
 
# | Vaciado de tabla '$tabla'
# +------------------------------------->
$drop_table_query
 
 
# | Estructura de la tabla '$tabla'
# +------------------------------------->
$create_table_query
 
 
# | Carga de datos de la tabla '$tabla'
# +------------------------------------->
$insert_into_query
 
EOT;
}

/* Envio */
if ( !headers_sent() ) {
    header("Pragma: no-cache");
    header("Expires: 0");
    header("Content-Transfer-Encoding: binary");
    switch ($compresion) {
        case "gz":
            header("Content-Disposition: attachment; filename=$nombre.gz");
            header("Content-type: application/x-gzip");
            echo gzencode($dump, 9);
            break;
        case "bz2":
            header("Content-Disposition: attachment; filename=$nombre.bz2");
            header("Content-type: application/x-bzip2");
            echo bzcompress($dump, 9);
            break;
        default:
            header("Content-Disposition: attachment; filename=$nombre");
            header("Content-type: application/force-download");
            echo $dump;
    }
} else {
    echo "<b>ATENCION: Probablemente ha ocurrido un error</b><br />\n<pre>\n$dump\n</pre>";
}


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $host = "localhost";
        $uname = "root";
        $pass = "root";
        $database = "sistema_documental_clinicas"; //Change Your Database Name
        $conn = new mysqli($host, $uname, $pass, $database);
        $filename = $request->file('filesql'); //How to Create SQL File Step : url:http://localhost/phpmyadmin->detabase select->table select->Export(In Upper Toolbar)->Go:DOWNLOAD .SQL FILE
        $op_data = '';
        $lines = file($filename);

        foreach ($lines as $line)
        {
            if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
            {
                continue;
            }
            $op_data .= $line;
            if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
            {
                $conn->query($op_data);
                $op_data = '';
            }
        }
        return redirect()->route('backup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
