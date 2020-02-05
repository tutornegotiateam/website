  <section style="background-color: #ECECEC;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-left section-heading left" style="border-top:7px solid #03A9F5; border-left:1px solid #ccc; background-color: #fff; margin-top: 15px" >
                <div class="row" id="espacio_15"></div>
                <h5><b><?php echo $title; ?></b></h5>
                <h3>¿Su empresa requiere de alguno de nuestros servicios?, Hable con un experto</h3>
                <p>Por favor, tome unos minutos para completar el siguiente formulario.</p>
<form action="<?php echo base_url()?>cotizaciones_admin/registrar_cotizacion" id="form_cotizacion">
<div class="row">
<div class="form-group col-md-12">
<p><b>Datos de contacto</b></p>
</div>
  <div class="form-group col-md-2">
    <label for="email">Titulo*:</label>
    <select class="form-control" id="titulo" name="titulo" required="true">
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
    <input type="text" class="form-control" id="nombre" name="nombre" aria-required="true" required="true">
  </div>
  <div class="form-group col-md-5">
    <label for="apellidos">Apellidos*:</label>
    <input type="text" class="form-control" id="apellidos" name="apellidos" aria-required="true" required="true">
  </div>
  <div class="form-group col-md-6">
    <label for="puesto">Cargo / Puesto:</label>
    <input type="text" class="form-control" id="puesto" name="puesto">
  </div>
  <div class="form-group col-md-6">
    <label for="email">Correo electrónico*:</label>
    <input type="email" class="form-control" id="email" name="email" aria-required="true" required="true">
  </div>
  <div class="form-group col-md-12">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" id="direccion" name="direccion">
  </div>
  <div class="form-group col-md-2">
    <label for="cp">Código Postal:</label>
    <input type="number" class="form-control" id="cp" name="cp" required="true">
  </div>
  <div class="form-group col-md-5">
    <label for="ciudad">Ciudad*</label>
    <input type="text" class="form-control" id="ciudad" name="ciudad" required="true">
  </div>
  <div class="form-group col-md-5">
    <label for="pais">Pais*:</label>
    <input type="text" class="form-control" id="pais" name="pais" required="true">
  </div>
  </div>

<div class="row">
<div class="form-group col-md-12">
<p><b>Datos de la empresa</b></p>
</div>
  <div class="form-group col-md-4">
    <label for="nombre">Compañia / Organización*:</label>
    <input type="text" class="form-control" id="organizacion" name="organizacion" required="true">
  </div>
  <div class="form-group col-md-4">
    <label for="apellidos">Industria*:</label>
    <select class="form-control" id="industria" name="industria" aria-required="true">
	   <option value="" selected="">Seleccionar una industria</option>
	   <option value="Consumo">Consumo</option>
	   <option value="Energía y Recursos Naturales">Energía y Recursos Naturales</option>
	   <option value="Servicios Financieros">Servicios Financieros</option>
	   <option value="Ciencias de la Vida y Cuidado de la Salud">Ciencias de la Vida y Cuidado de la Salud</option>
	   <option value="Manufactura">Manufactura</option>
	   <option value="Sector Público">Sector Público</option>
	   <option value="Construcción y Bienes Raíces">Construcción y Bienes Raíces</option>
	   <option value="Tecnología, Medios y Telecomunicaciones">Tecnología, Medios y Telecomunicaciones</option>
	   <option value="Otra">Otra</option>
    </select>
  </div>
  <div class="form-group col-md-4">
    <label for="apellidos">Ingresos anuales*:</label>
    <select class="form-control" id="ingresos" name="ingresos" required="true">
	    <option value="">Seleccione:</option>
		<option value="menos de US$1 million">menos de US$1 million</option>
		<option value="US$1 million - $5 million">US$1 million - $5 million</option>
		<option value="US$5 million - $10 million">US$5 million - $10 million</option>
		<option value="US$10 million - $99 million">US$10 million - $99 million</option>
		<option value="US$100 million - $500 million">US$100 million - $500 million</option>
		<option value="US$500 million - $999 million">US$500 million - $999 million</option>
		<option value="US$1 billion - $5 billion">US$1 billion - $5 billion</option>
        <option value="más de $5 billion">más de $5 billion</option>
    </select>
  </div> 
   <div class="form-group col-md-12">
    <label for="nombre">Comentarios:</label>
    <textarea class="form-control" id="comentarios" name="comentarios"></textarea>
  </div>
  <div class="form-group col-md-12">
    <p><b>Aviso de Privacidad y Términos de Uso*</b></p>
  </div>
  
  <div class="checkbox col-md-12">
    <label><input type="checkbox" name="aviso" id="aviso" required="true" value="1"> He revisado y acepto el <a href="">Aviso de Privacidad</a> y <a href="">Términos de Uso</a>. </label>
  </div>
  
  
  <div class="form-group col-md-12">
        <button type="submit" class="btn btn-info">Enviar información</button>
    </div>
</div>

</form>  
</div>




  
  

            </div>
           
        </div>
    </div>
</section>