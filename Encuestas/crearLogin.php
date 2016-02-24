<?php 

//error_reporting(E_ALL ^ E_NOTICE);
include("header.php");
//para retener el |email en la casilla si password es false y se ingresa
//required value en <li>
isset($_POST["email"]);
         $email = $_POST["email"];

 ?>
 <section id="form">
   <form class="contact_form" action="php/insertarLogin.php" method="post">
   		<ul>
   			<li>
   				<h2>Registrar nuevo usuario</h2>
   			</li>	
            <h5>Nombre</h5>
            <li>
               
               <input type="text" name="nombre" placeholder="Nombre" required value="<?php echo $nombre; ?>"required/>
            </li>

   			<h5>Email</h5>
   			<li>
   				
               <input type="email" name="email" placeholder="Email" required value="<?php echo $email; ?>"required/>
   			</li>

             <h5>Telefono</h5>
            <li>
               
               <input type="text" name="telefono" placeholder="Telefono" required value="<?php echo $telefono; ?>"required/>
            </li>

   			<h5>Contraseña</h5>
   			
            <li>
   				<input type="password" name="password" placeholder="Password" required />
   			</li>
   			 
             <h5>Repetir</h5>
            <li>
               <input type="password" name="password2" placeholder="Password" required />
            </li>


         
   			 <li>
   			 	<input type="submit" class="submit" value="Registro">
   			 </li>
   			 <a id="paginas1" href="javascript:window.history.back();">&laquo; Volver atrás</a>
   		</ul>	
   </form>
</section>


<?php 
   include("footer.php");
    ?>