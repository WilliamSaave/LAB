<!doctype html>
<html>
<head>
<title>Cargar Ficheros</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="../../../css/sidebar.css">
<link rel="stylesheet" href="../../../css/subidas.css">
<script src="../../../Js/sidebar.js" defer></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>
<style>
.navbar {
  position: relative;
  min-height: 50px;
  margin-bottom: 5px;
}
.instruction-box {
  background-color: #fff7f0;
  border-left: 5px solid #fc7323;
  padding: 20px;
  margin-bottom: 25px;
  border-radius: 8px;
  font-size: 17px;
  line-height: 1.6;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.instruction-box:hover {
  background-color: #ffecd9;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.instruction-box h4 {
  margin-top: 0;
  color: #fc7323;
  font-weight: bold;
  font-size: 20px;
}
s
</style>
</head>
<body>
<?php include("../sidebar.php"); ?>

<div class="container">
  <div class="panel custom-panel">
    <div class="panel-heading">
      <h3 class="panel-title">Cargar Ficheros</h3>
    </div>
    <div class="panel-body">
      
      <!-- Instrucciones de carga -->
      <div class="instruction-box">
        <h4>Instrucciones importantes para la carga de archivos</h4>
        <ul>
          <li>Solo se permite subir un archivo por persona. Si ya has subido un archivo anteriormente, este será reemplazado por el nuevo archivo.</li>
          <li>El archivo cargado será renombrado automáticamente con tu número de documento para asegurar la identificación correcta.</li>
          <li>Asegúrate de subir el archivo correcto antes de confirmar la carga, ya que este proceso no se puede deshacer.</li>
          <li>El formato del archivo debe ser compatible (por ejemplo: .pdf, .docx, .xlsx, etc.). Consulta con el administrador si tienes dudas sobre los formatos aceptados.</li>
          <li>En caso de errores o inconvenientes, comunícate con el equipo de soporte.</li>
        </ul>
      </div>

      <!-- Formulario de carga -->
      <div class="col-lg-6">
        <form method="POST" action="CargarFicheros.php" enctype="multipart/form-data">
          <div class="form-group">
            <label class="btn custom-btn" for="my-file-selector">
              <input required type="file" name="file" id="exampleInputFile">
            </label>
          </div>
          <button class="btn custom-btn" type="submit">Cargar Fichero</button>
        </form>
      </div>
      <div class="col-lg-6"></div>
    </div>
  </div>

  <!-- Tabla Descargas -->
  <div class="panel custom-panel">
    <div class="panel-heading">
      <h3 class="panel-title">Descargas Disponibles</h3>
    </div>
    <div class="panel-body">
      <table class="table">
        <thead>
          <tr>
            <th width="7%">#</th>
            <th width="70%">Nombre del Archivo</th>
            <th width="13%">Descargar</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $archivos = scandir("../../../subidas");
            $num = 0;
            for ($i = 2; $i < count($archivos); $i++) {
              $num++;
          ?>
            <tr>
              <th scope="row"><?php echo $num; ?></th>
              <td><?php echo $archivos[$i]; ?></td>
              <td>
                <a title="Descargar Archivo" href="descargar.php?archivo=<?php echo urlencode($archivos[$i]); ?>">
                  <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>