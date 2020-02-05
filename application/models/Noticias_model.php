<?php
class  Noticias_model extends CI_Model
{
	protected $table = 'noticias';
	var $table2 = "servicios";  
    var $select_column = array("id", "titulo");  
    var $order_column = array(null, "titulo"); 
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->table = 'noticias';
	}
	
	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	public function get_noticias($limit, $start)
	{
		$this->db->limit($limit, $start);
		$query = $this->db->get($this->table);

		return $query->result();
	}
	
	public function get_noticias2($id, $idioma)
	{
		//$result=$this->db->get('noticias');
		$this->db->select('*');
		$this->db->where('id_txt =', $id);
		$this->db->where('idioma =', $idioma);
		$aResult = $this->db->get('noticias');;
		if (!$aResult->num_rows() == 1) {
			return false;
				}

		return $aResult->result_array();
	}
	
	
	function contenidosLista()
	{
		$result=$this->db->get('noticias');
		$aResult = $this->db->get();
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}

	function traerSecciones($id)
	{
		$this->db->select('*');
		$this->db->from('noticias_secciones');
		$this->db->where('idioma =', $id);
		$this->db->where('activo =', '1');
		//$result=$this->db->get('noticias_secciones');
		$aResult = $this->db->get();
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}

	function leerContenidosPorSeccion($id, $id2, $idioma)
	{
		$valor ='';
		$this->db->select('id_txt');
		$this->db->from('noticias');
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

	function leerContenido($id, $idioma)
	{
		$this->db->select('a.*, b.*');
		$this->db->from('noticias a');
		$this->db->join('noticias_secciones b', 'a.seccion = b.seccion_id');
		$this->db->where('a.id_txt =', $id);
/*   $this->db->where('a.idioma =', $idioma);*/
		$aResult = $this->db->get();
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}

	public function traerRegistro($id)
	{
		$sql = "SELECT * FROM noticias WHERE id ='".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();

		if (isset($row)) {
			return $row;
		} else {
			return false;
		}
	}

	function traerPersonas()
	{
		$aResult = $this->db->get('personas');
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	public function traerRegistro2($id)
	{
		$sql = "SELECT * FROM noticias WHERE id ='".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();

		if (isset($row)) {
			return $row;
		} else {
			return false;
		}
	}

	public function traerPersonasDelContenido($id)
	{
		$nombre ='';
		$sql = "SELECT personas FROM noticias WHERE id ='".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();
		if (isset($row)) {
			$nombre = $row->personas;
		}
		return $nombre;
	}


	public function traerRegistros($params = array())
	{ // paginador
		$this->db->select('a.*, b.*');
		$this->db->from('noticias a');
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

	function insert($memData)
	{
		$result=$this->db->insert('noticias',$memData);
		return $result;
	}
	function update($memData, $id)
	{


		$this->db->set('id_txt', $memData['id_txt']);
		$this->db->set('idioma', $memData['idioma']);
		$this->db->set('titulo', $memData['titulo']);
		$this->db->set('subtitulo', $memData['subtitulo']);
		$this->db->set('sintesis', $memData['sintesis']);
		$this->db->set('bgcolor', $memData['bgcolor']);
		$this->db->set('banner_bg', $memData['banner_bg']);
		$this->db->set('contenido', $memData['contenido']);
		$this->db->set('seccion', $memData['seccion']);
		$this->db->set('activo', $memData['activo']);
		$this->db->set('f_contacto', $memData['f_contacto']);
		$this->db->set('f_cotizacion', $memData['f_cotizacion']);
		$this->db->set('f_brochure', $memData['f_brochure']);
		$this->db->set('personas', $memData['personas']);


		$this->db->where('id', $id);
		$result=$this->db->update('noticias');
		return $result;
	}
	function delete($id)
	{
		$IdiomaId=$this->input->get('id');
		$this->db->where('id', $id);
		$result=$this->db->delete('noticias');
		return $result;
	}
	
	/*
	Manejo de noticias
	*/
	public function cuantasDestacadasPortada()
	{
		$cuantos ='';
		$sql = "SELECT count(*) as cuantos FROM noticias";
		$query = $this->db->query($sql);
		$row = $query->row();
		if (isset($row)) {
			$cuantos = $row->cuantos;
		}
		return $cuantos;
	}
	
	function traerDestacadas()
	{
		$aResult = $this->db->get('noticias');
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	function traerPerpectivas()
	{
		$buscar = 'perspectivas';
		$this->db->where('seccion', $buscar);
		$this->db->order_by("id", "asc");
		$this->db->limit(2);
		$aResult = $this->db->get('noticias');
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	function traerNotasDeA2()
	{
		$buscar = 'perspectivas';
		$buscar2 = 'destacados';
		$this->db->where('seccion!=', $buscar);
		$this->db->where('seccion!=', $buscar2);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(2, 0);
		$aResult = $this->db->get('noticias');
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	} 
	
	function traerNotasDeA1Negro()
	{
		$buscar = 'perspectivas';
		$buscar2 = 'destacados';
		$this->db->where('seccion!=', $buscar);
		$this->db->where('seccion!=', $buscar2);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(1, 2);
		$aResult = $this->db->get('noticias');
		//print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	
	function traerNotasDeA3()
	{
		$buscar = 'perspectivas';
		$buscar2 = 'destacados';
		$this->db->where('seccion!=', $buscar);
		$this->db->where('seccion!=', $buscar2);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(4, 3);
		$aResult = $this->db->get('noticias');
		//print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	function traerNotasRecientes($id)
	{
		$this->db->where('id_txt!=', $id);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(5, 1);
		$aResult = $this->db->get('noticias');
		//print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	
	function traerNotasRecientesServicios()
	{
		//$this->db->where('id_txt!=', $id);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(5, 1);
		$aResult = $this->db->get('noticias');
		//print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	function traerNotasDestacadas($idioma)
	{
		$this->db->where('seccion=', 'destacados');
		$this->db->where('idioma=', $idioma);
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$this->db->limit(3, 0);
		$aResult = $this->db->get('noticias');
		//print_r($this->db->last_query());
		if (!$aResult->num_rows() == 1) {
			return false;
		}

		return $aResult->result_array();
	}
	
	//datatables inicia
	function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table2);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("id", $_POST["search"]["value"]);  
                $this->db->or_like("titulo", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if(@$_POST["length"] != -1)  
           {  
                $this->db->limit(@$_POST['length'], @$_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table2);  
           return $this->db->count_all_results();  
      }  
	//datatables finaliza
	function traerServicios()
	{
		$this->db->select('*');
        $this->db->from('servicios');
		//$this->db->limit(2);
		$this->db->order_by("id", "desc");
		$aResult = $this->db->get();
		//print_r($this->db->last_query()); 
		if (!$aResult->num_rows() == 1) {
			return false;
		}
		return $aResult->result_array();
	}
	
	public function exiteRelacion($id,$idNota) 
	{
		$cuantos ='0';
		$sql = "SELECT count(*) as cuantos FROM seccion_noticias WHERE idSeccion = '".$id."' AND idNota ='".$idNota."' ";
		$query = $this->db->query($sql);
		//print_r($this->db->last_query());
		$row = $query->row();
		if (isset($row)) {
			$cuantos = $row->cuantos;
		}
		return $cuantos;
	}
	
	public function registrarRelacion($id)
	{
		$cuantos ='0';
		$sql = "SELECT count(*) as cuantos FROM seccion_noticias WHERE idSeccion = '".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();
		if (isset($row)) {
			$cuantos = $row->cuantos;
		}
		return $cuantos;
	}
	
	public function quitarRelacion($id)
	{
		$cuantos ='0';
		$sql = "SELECT count(*) as cuantos FROM seccion_noticias WHERE idSeccion = '".$id."'";
		$query = $this->db->query($sql);
		$row = $query->row();
		if (isset($row)) {
			$cuantos = $row->cuantos;
		}
		return $cuantos;
	}
	
	
	
}