<?php
class  Servicios_model extends CI_Model{
	function __construct()  
	{  
	    parent::__construct();  
	    $this->load->database();  
	    $this->table = 'servicios';
	    $this->table2 = 'servicios_categoria';
	} 
	
	function traerCategoriaServicio($id,$idioma){
		$this->db->select('*');
        $this->db->from('servicios');
        $this->db->where('ServicioTituloId =', $id);
        $this->db->where('ServicioIdioma =',$idioma);
		$query = $this->db->get();
		return $query->row();		
	}
	
	
	function traerServiciosPadre($idioma){
		$this->db->select('*');
		$this->db->from('servicios');
		$this->db->where('idioma =', $idioma);
		$this->db->where('seccion =', '0');
		$aResult = $this->db->get();
		if(!$aResult->num_rows() == 1)
	    {
	        return false;
	    }
       
        return $aResult->result_array();
	}
	
	function traerMenuCategoriaServicio($id,$idioma){
		$this->db->select('*');
        $this->db->from('servicios');
        $this->db->where('ServicioTituloId =', $id);
        $this->db->where('ServicioIdioma =',$idioma);
		$query = $this->db->get();
		return $query->row();		
	}
	
	function idiomasLista(){
		$result=$this->db->get('idiomas');
		return$result->result();
	}
	
	function idiomasListaActivos($id){
		$this->db->select('*');
        $this->db->from('idiomas');
        $this->db->where('IdiomaActivo =', '1');
        $this->db->where('IdiomaId !=',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function idiomasSeleccionado($id){
		$this->db->select('*');
        $this->db->from('idiomas');
        $this->db->where('IdiomaActivo =', '1');
        $this->db->where('IdiomaId =', $id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function traerRegistros($params = array())
	{ // paginador
		$this->db->select('a.*, b.*');
		$this->db->from('servicios a');
		$this->db->join('idiomas b', 'a.idioma = b.IdiomaId');
		// print_r($this->db->last_query());
		if (array_key_exists("conditions", $params)) {
			foreach ($params['conditions'] as $key => $val) {
				$this->db->where($key, $val);
				}
			}

		if (!empty($params['searchKeyword'])) {
			$search = $params['searchKeyword'];

			$search2 = str_replace(' ', '_',$search );
			//$search = str_replace('_', ' ',$search );
			$likeArr = array('titulo' => $search, 'seccion' => $search2, 'IdiomaTitulo'=>$search);
			// $likeArr = array('IdiomaTitulo' => $search, 'IdiomaSigla' => $search);
			$this->db->or_like($likeArr);
			}

		if (array_key_exists("returnType",$params) && $params['returnType'] == 'count') {
			$result = $this->db->count_all_results();
			} else {
			if (array_key_exists("id", $params)) {
				$this->db->where('idioma', $params['id']);
				$query = $this->db->get();
				$result = $query->row_array();
				} else {
				$this->db->order_by('idioma', 'asc');
				if (array_key_exists("start",$params) && array_key_exists("limit",$params)) {
					$this->db->limit($params['limit'],$params['start']);
					} elseif (!array_key_exists("start",$params) && array_key_exists("limit",$params)) {
					$this->db->limit($params['limit']);
					}

				$query = $this->db->get();
				$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
				}
			}
		// Return fetched data
		return $result;
	} 
	
	function leerContenidosPorSeccion($id, $id2, $idioma)
	{
		$valor ='';
		$this->db->select('id_txt');
		$this->db->from('servicios');
		$this->db->where('seccion =', $id);
		$this->db->where('id_txt =', $id2);
		$this->db->where('idioma =', $idioma);
		$aResult = $this->db->get();
		//print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
			}
		foreach ($aResult ->result() as $row) {
			$valor = $row->id_txt;

			}

		return $valor;
	}
	
	function leerContenidosPorSeccionTitular($id, $id2, $idioma)
	{
		$valor ='';
		$this->db->select('id_txt');
		$this->db->from('servicios');
		$this->db->where('seccion =', '0');
		$this->db->where('id_txt =', $id2);
		$this->db->where('idioma =', $idioma);
		$aResult = $this->db->get();
	//	print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
			}
		foreach ($aResult ->result() as $row) {
			$valor = $row->id_txt;

			}

		return $valor;
	}

	function leerContenido($id, $idioma)
	{
		$this->db->select('a.*, b.*');
		$this->db->from('servicios a');
		$this->db->join('servicios_secciones b', 'a.id_txt = b.seccion_id');
		$this->db->where('a.id_txt =', $id);
	/*   $this->db->where('a.idioma =', $idioma);*/
		$aResult = $this->db->get();
	//	print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
			}

		return $aResult->result_array();
	}  
	
	function leerContenido2($id, $idioma)
	{
		$this->db->select('a.*, b.*');
		$this->db->from('servicios a');
		$this->db->join('servicios_secciones b', 'a.seccion = b.seccion_id');
		$this->db->where('a.id_txt =', $id);
	/*   $this->db->where('a.idioma =', $idioma);*/
		$aResult = $this->db->get();
//		print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
			}

		return $aResult->result_array();
	} 
		
	function insert($memData){
		$result=$this->db->insert('servicios',$memData);
		return $result;
	}
	function insert_categoria($memData)
	{
		$result=$this->db->insert('servicios',$memData);
		return $result;
	}
	function insert_categoria2($memData2)
	{
		$result=$this->db->insert('servicios_secciones',$memData2);
		return $result;
	}
	
	
	
	function update($memData, $id)
	{


		$this->db->set('id_txt', $memData['id_txt']);
		$this->db->set('idioma', $memData['idioma']);
		$this->db->set('titulo', $memData['titulo']);
		$this->db->set('subtitulo', $memData['subtitulo']);
		$this->db->set('bgcolor', $memData['bgcolor']);
		$this->db->set('banner_bg', $memData['banner_bg']);
		$this->db->set('contenido', $memData['contenido']);
		$this->db->set('seccion', $memData['seccion']);
		$this->db->set('activo', $memData['activo']);
		$this->db->set('f_contacto', $memData['f_contacto']);
		$this->db->set('f_cotizacion', $memData['f_cotizacion']);
		$this->db->set('f_temas_similares', $memData['f_temas_similares']);
		$this->db->set('f_twitter', $memData['f_twitter']);
		$this->db->set('f_facebook', $memData['f_facebook']);
		$this->db->set('f_brochure', $memData['f_brochure']);
		$this->db->set('personas', $memData['personas']);


		$this->db->where('id', $id);
		$result=$this->db->update('servicios');
		return $result;
	}
	
	function update_categoria($memData, $id)
	{
		$this->db->set('seccion', $memData['seccion']);
		$this->db->set('seccion_id', $memData['seccion_id']);
		$this->db->set('idioma', $memData['idioma']);
		$this->db->set('activo', $memData['activo']);
		$this->db->where('id', $id);
		$result=$this->db->update('servicios_secciones');
		return $result;
	}
	function delete($id){
		$IdiomaId=$this->input->get('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('servicios');
		return $result;
	}
	
	
	function delete2($id)
	{
		$IdiomaId=$this->input->get('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('servicios_secciones');
		return $result;
	}
	// servicios
	function traerSecciones($id)
	{
		$this->db->select('*');
		$this->db->from('servicios_secciones');
		$this->db->where('idioma =', $id);
		$this->db->where('activo =', '1');
		//$result=$this->db->get('contenidos_secciones');
		$aResult = $this->db->get();
		if (!$aResult->num_rows() == 1) {
			return false;
			}

		return $aResult->result_array();
	}	
	
	function traerSecciones1()
	{
		$this->db->select('a.*, b.*');
		$this->db->from('servicios a');
		$this->db->join('idiomas b', 'a.idioma = b.IdiomaId');
		$this->db->where('seccion !=', '0');
		//$result=$this->db->get('contenidos_secciones');
		$aResult = $this->db->get();
		if (!$aResult->num_rows() == 1) {
			return false;
			}

		return $aResult->result_array();
	}	
	
	function traerSecciones2()
	{
		
		$this->db->select('a.*, b.*');
		$this->db->from('servicios_secciones a');
		$this->db->join('idiomas b', 'a.idioma = b.IdiomaId');
		//$this->db->where('seccion =', '1');
		//$result=$this->db->get('contenidos_secciones');
		$aResult = $this->db->get();
		if (!$aResult->num_rows() == 1) {
			return false;
			}

		return $aResult->result_array();
	}
	function traerSecciones3()
	{

		$this->db->select('a.*, b.*');
		$this->db->from('servicios a');
		$this->db->join('idiomas b', 'a.idioma = b.IdiomaId');
		$this->db->where('a.seccion =', '0');
		//$result=$this->db->get('contenidos_secciones');
		$aResult = $this->db->get();
		//print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
			}

		return $aResult->result_array();
	}
	
	public function traerRegistro2($id)
	{
		$sql = "SELECT * FROM servicios WHERE id ='".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();

		if (isset($row)) {
			return $row;
			} else {
			return false;
			}
	}
	
	public function traerRegistro3($id)
	{
		$sql = "SELECT * FROM servicios_secciones WHERE id ='".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();

		if (isset($row)) {
			return $row;
			} else {
			return false;
			}
	}
	
	
	public function existeSecciones($id)
	{
		$sql = "SELECT count(*) as cuantos FROM servicios WHERE id_txt ='".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();

		if (isset($row)) {
			return $row->cuantos;
			} else {
			return false;
			}
	}
	
	public function traerPersonasDelContenido($id)
	{
		$nombre ='';
		
		if ($id!='') {
			$sql = "SELECT personas FROM servicios WHERE id ='".$id."'";
			$query = $this->db->query($sql);
			$row = $query->row();
			if (isset($row)) {
				$nombre = $row->personas;
		    }
		}
		
		
		return $nombre;
	} 	
	
	function traerServiciosRelacionados($id)
	{
		$this->db->where('seccion=', $id);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(5, 1);
		$aResult = $this->db->get('servicios');
		//print_r($this->db->last_query()); 
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	function traerServiciosRelacionados2($id)
	{
		$this->db->where('seccion=', $id);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(5, 0);
		$aResult = $this->db->get('servicios');
		//print_r($this->db->last_query()); 
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	function traerNotasRelacionadasAlServicio($id)
	{
		$this->db->select('a.*,d.*');
        $this->db->from('noticias a');
        $this->db->join('seccion_noticias d', 'a.id = d.idNota');

		$this->db->where('d.idSeccion=', $id);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(6, 0);
		$aResult = $this->db->get();
	//	print_r($this->db->last_query()); 
		if (!$aResult->num_rows() == 1) {
			return false;
		}
		return $aResult->result_array();
	}
	
	
	public function traerIdSeccion($id)
	{
		$sql = "SELECT id FROM servicios WHERE id_txt ='".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();

		if (isset($row)) {
			return $row->id;
			} else {
			return false;
			}
	}
}