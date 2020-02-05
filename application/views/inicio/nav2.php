<?php
$ci = &get_instance();
$ci->load->model('Menu_model', 'menu');

?>
<style>
	#none{
		
background-color:  transparent;
	}
	
</style>
<header>
            <div id="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-xs-12">
                            <div class="top-bar-info">
                                <ul>
                                    <li><i class="fas fa-mobile-alt"></i><?php echo $ce->telefono_ofi1; ?></li>
                                    <li><i class="fas fa-envelope"></i><?php echo $ce->email; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 xs-display-none">
                            <ul class="top-social-icon">
                                <li><a href="<?php echo $ce->facebook; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                               <!-- <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>-->
                                <li><a href="<?php echo $ce->linkedin; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <!--<li><a href="javascript:void(0)" title="ENGLISH"><i class="fab fa-global"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inverse">
                <!--<div class="top-search bg-theme">
                    <div class="container">
                        <div class="input-group"> <span class="input-group-addon"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Tecle su busqueda..."> <span class="input-group-addon close-search"><i class="fas fa-times"></i></span></div>
                    </div>
                </div>-->
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light no-padding">
                                    <div class="navbar-header navbar-header-custom">
                                        <a href="/" class="navbar-brand logodefault"><img id="logo" src="/<?php echo $ce->logo2; ?>" alt="logo"></a>
                                    </div>
                                    <div class="navbar-toggler"></div>
                                    <ul class="navbar-nav ml-auto" id="nav" style="display: none;">
                                    
                                     <?php foreach($arr_menusup as $row){ ?>                                       
                                        <li>
                                        <?php
                                        if($row->MenuSupUrl=='#'){
											$url = 'javascript:void(0)';
										}else{
											$url = base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'.$row->MenuSupUrl;
										}
                                        
                                        ?>
                                        <a href="<?php echo $url; ?>"><?php echo $row->MenuSupTitulo;?></a>


<?php
// Submenu

//print_r($arr_submenu);
// tipo de submenu 
switch ($row->MenuTipo) {
    case 0:
        //echo "i es igual a 0";
        break;
    case 1:
        $arr_submenu = $ci->menu->menuInferiorLista($row->MenuSupIdTxt,$row->MenuSupLanguaje,$row->MenuTipo);
        echo "<ul>";
        foreach($arr_submenu as $row2){ 
              echo '<li><a href="'.base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'.$row2->MenuUrl.'"><code>»</code> '.$row2->MenuTitulo.'</a></li>';        
		}
        echo "</ul>";
        break;
    case 2:
       // MEGAMENU
       //columnas
         echo " <ul class='row megamenu' style='z-index:9999999999999999; margin-bottom:10px' >";
        	
	   
      // columna1
       for($c=1;$c<=3;$c++){
      
        echo '<li class="col-lg-4 col-sm-12">';
        $arr_submenu4 = $ci->menu->menuInferiorListaColumnaPadre($row->MenuSupIdTxt,$row->MenuSupLanguaje,$row->MenuTipo,$c);
        
        
         foreach($arr_submenu4 as $row4){ 
        
          echo '<a href="'.base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'.$row4->MenuUrl.'"  ><span id="menu_padre">'.$row4->MenuTitulo.'</span></a>';
          $arr_submenu3 = $ci->menu->menuInferiorListaColumna($row->MenuSupIdTxt,$row->MenuSupLanguaje,$row->MenuTipo,$c,$row4->MenuPadre);
            foreach($arr_submenu3 as $row3){ 
	             if($row3->MenuColumna==$c){
				 	echo '<a href="'.base_url().strtolower(@$idioma_sele[0]->IdiomaSigla).'/'.$row3->MenuUrl.'"><code>»</code> '.$row3->MenuTitulo.'</a>';
				 }
            
		}
		}
	
		echo '</li>';  
       
		// columna 2
		}
		
		 echo "</ul>";
		
        break;
}

                                        
                                        
                                        
                                        
                                        
                                        
                                        ?>
                                        
                                        
                                        
                                       </li>    
                                     <?php } ?> 
                                     <?php // idioma // ?> 
                                      <li>
                                        <a href="javascript:void(0)"><img src="<?php echo base_url().@$idioma_sele[0]->IdiomaBandera; ?>" width="22" title="<?php echo @$idioma_sele[0]->IdiomaSigla; ?> - <?php echo @$idioma_sele[0]->IdiomaTitulo; ?>"></a >
                                            <ul>
                                            <?php 
                                            foreach($arr_idiomas as $row_idioma){  ?>
                                                <li><a href="<?php echo base_url();?><?php echo strtolower(@$idioma_sele[0]->IdiomaSigla); ?>/idioma/geo/<?php echo strtolower($row_idioma->IdiomaId); ?>" title="<?php echo $row_idioma->IdiomaSigla; ?> - <?php echo $row_idioma->IdiomaTitulo; ?>"><img src="<?php echo base_url().$row_idioma->IdiomaBandera; ?>" width="22"> <?php echo $row_idioma->IdiomaTitulo; ?></a></li>
                                            <?php } ?> 
                                            </ul>
                                        </li>                             
                                    </ul>
                                   <!-- <div class="attr-nav sm-no-margin sm-margin-70px-right xs-margin-65px-right">
                                        <ul>
                                            <li class="search"><a href="javascript:void(0)"><i class="fas fa-search"></i></a></li>
                                        </ul>
                                    </div>-->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>