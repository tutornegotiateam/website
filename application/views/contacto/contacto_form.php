  <section style="background-color: #ECECEC;">
    <div class="container">
        <div class="row">
        
        
        
            <div class="col-md-12 text-left section-heading left" style="border-top:7px solid #03A9F5; border-left:1px solid #ccc; background-color: #fff; margin-top: 15px" >
                <div class="row" id="espacio_15"></div>
                <h5><b><?php echo $title; ?></b></h5>
              
                <div class="row margin-50px-bottom sm-margin-30px-bottom">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box"><i class="fas fa-phone"></i>
                            <h4>Llamenos</h4><span><?php echo $ce->telefono_ofi1; ?></span>
                            <br/><br/><br/>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box"><i class="fas fa-map-marker-alt"></i>
                            <h4>Visitenos</h4>
                            <?php
          $dir = str_replace('<p>','',$ce->direccion);
          $dir = str_replace('</p>','',$dir);
          
          ?>
                            <span><?php echo $dir; ?></php></span></div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-box"><i class="far fa-envelope"></i>
                            <h4>Escribanos</h4><span><?php echo $ce->email; ?></span>
                             <br/><br/><br/>
                        </div>
                    </div>
                    <!--<div class="col-lg-3 col-md-6">
                        <div class="contact-box"><i class="far fa-comments"></i>
                            <h4>Live Chat</h4><span>Chat with Us 24/7</span></div>
                    </div> -->              
		        </div>
                <h3>¿Su empresa requiere de alguno de nuestros servicios?, Hable con un experto</h3>
                <p>En  Tutor  Negotia  nos  interesa conocer a fondo tu proyecto para ello dispones de un formulario de contacto donde podrás plantearnos cualquier cuestión.</p>
<form action="<?php echo base_url()?>contacto_admin/registrar_mensaje" id="form_contacto">
<div class="row">
<div class="form-group col-md-12">
<p><b>Datos de contacto</b></p>
</div>
<div class="form-group col-md-5">
<label for="email">Tema*:</label>
 <select class="form-control" id="tema" name="tema" aria-required="true">
   <option value="" selected="">Seleccione un tema</option>
    <option value="Barómetro de Empresas">Barómetro de Empresas</option>
    <option value="Atención a medios">Atención a medios</option>
    <option value="Contactar a nuestros especialistas">Contactar a nuestros especialistas</option>
    <option value="Comentarios">Comentarios</option>
    <option value="Ética y Conducta">Ética y Conducta</option>
    <option value="Eventos">Eventos</option>
    <option value="Oportunidad de carrera">Oportunidad de carrera</option>
    <option value="Responsabilidad Social">Responsabilidad Social</option>
    <option value="Aviso de Privacidad">Aviso de Privacidad</option>
    <option value="Retroalimentación sobre este sitio web">Retroalimentación sobre este sitio web</option>
    <option value="Solicitar una cotización de servicios">Solicitar una cotización de servicios</option>
 </select>	
</div>
<div class="form-group col-md-7"></div>
  <div class="form-group col-md-2">
    <label for="email">Titulo*:</label>
    <select class="form-control" id="titulo" name="titulo" aria-required="true">
	    <option value=""></option>
	    <option value="Dr.">Dr.</option>
	    <option value="Srita.">Srita.</option>
	    <option value="Sra.">Sra.</option>
	    <option value="Sr.">Sr.</option>
	    <option value="Lic.">Lic.</option>
	    <option value="Ing.">Ing.</option>
    </select>
  </div>
  <div class="form-group col-md-5">
    <label for="nombre">Nombre*:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" aria-required="true">
  </div>
  <div class="form-group col-md-5">
    <label for="apellidos">Apellidos*:</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" aria-required="true">
  </div>
  <div class="form-group col-md-4">
    <label for="nombre">Compañia / Organización*:</label>
    <input type="text" class="form-control" id="organizacion" name="organizacion">
  </div>
  <div class="form-group col-md-6">
    <label for="puesto">Cargo / Puesto:</label>
    <input type="text" class="form-control" id="puesto" name="puesto">
  </div>
  <div class="form-group col-md-6">
    <label for="email">Correo electrónico*:</label>
    <input type="email" class="form-control" id="email" name="email" aria-required="true">
  </div>
  <div class="form-group col-md-12">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" id="direccion" name="direccion">
  </div>
  <div class="form-group col-md-2">
    <label for="cp">Código Postal:</label>
    <input type="number" class="form-control" id="cp" name="cp">
  </div>
  <div class="form-group col-md-5">
    <label for="ciudad">Ciudad*</label>
    <input type="text" class="form-control" id="ciudad" name="ciudad">
  </div>
  <div class="form-group col-md-5">
    <label for="pais">Pais*:</label>
    <input type="text" class="form-control" id="pais" name="pais">
  </div>
  <div class="form-group col-md-12">
    <label for="nombre">Comentarios:</label>
    <textarea class="form-control" id="nombre" name="nombre"></textarea>
  </div>
  <div class="checkbox col-md-12">
    <label><input type="checkbox" name="aviso" id="aviso" value="1" required="true"> He revisado y acepto los <a href="">Términos de Uso</a>. </label>
  </div>
  
  
  <div class="form-group col-md-12">
        <button type="submit" class="btn btn-info">Enviar información</button>
    </div>
  </div>


 
</div>




  
  
</form> 
            </div>
           
        </div>
    </div>
</section>