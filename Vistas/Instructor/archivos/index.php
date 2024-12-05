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
</style>
</head>
<body>
<?php include("../sidebar.php"); ?>

    <!--/.nav-collapse --> 
  </div>
</div>

<div class="container">
  
  
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
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>
</html>
