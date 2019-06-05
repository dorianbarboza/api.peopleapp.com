<html style="background-image:url('css/css/fondo.jpg');"> 
  <head>
  <LINK REL=StyleSheet HREF="css/css/bulma.css" TYPE="text/css">
    <script type="text/javascript" src="js/pruebajson.js"></script>

  </head>
  <body >
  <br><br><br><br>
  <div align="center">
  <div class="card" style="opacity:.8;width:30%;align-content:center">
      <div align="center" class="card-image">
        <br>
      <figure class="image is-128x128">
        <img src="css/buzon.png" alt="Placeholder image">
        <h2> BUZON PQCI</h2>
      </figure>
    </div>
    <div class="card-content">
      <form name="form"  method="post" action="paginas/verificar.php" id="form">
          <br>
          <label>Correo:</label>
          <br>
          <input  width="50%" class="input" id="user" name="user" type="text">
          <br>
          <label>Clave</label>
          <br>
          <input width="50%" class="input" id="pass" name="pass" type="pass">
          <br><br>
          <center><input class="button" type="button" value="acceder" onclick="loadDoc()"></center>
        </form>
    </div>
    </div>
  </body>
</html>

  