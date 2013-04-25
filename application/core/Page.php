<?PHP if (!defined('__SITE_PATH')) exit('No direct script access allowed');

class OPC_Page {
	public $id;
	public $name;
	public $title;
	public $type;
	public $typeObject;
	private $components;

	private $db;

	public function __construct($database, $type, $id = null){
		$this->db = $database;
		$this->type = $type;
		$this->id = $id;
	}

	public function setComponents($components){
		$this->components = array('header' 		=> array(),
								  'top_page' 	=> array(),
								  'bottom_page' => array(),
								  'footer' 		=> array()
								  );
		foreach ($components as $component) {
			switch ($component->page_location) {
				case 'header':
					$this->components['header'][] = $component;
					break;
				case 'top_page':
					$this->components['top_page'][] = $component;
					break;
				case 'bottom_page':
					$this->components['bottom_page'][] = $component;
					break;
				default:
					$this->components['footer'][] = $component;
					break;
			}
		}
	}

	public function getComponents($Location = null){
		if($Location == null)
			return $this->components;
		if(isset($this->components[$Location]))
			return $this->components[$Location];
		else
			return null;
	}

	public function getData(){
		$data['name'] = $this->name;
		$data['title'] = $this->title;
		$data['type'] = $this->type;

		return array_merge($data, $this->typeObject->getData());
	}

	public function validate(){
		$errors = array();

		return array_merge($errors, $this->typeObject->validate());
	}

	public function save(){
		$this->db->reset();
		
		$binds['name'] = $this->name;
		$binds['title'] = $this->title;
		$binds['type'] = $this->type;

		if($this->id == null) {
			$this->db->insert('OPC_Pages', $binds);
			$this->id = $this->db->lastInsertId();
			$this->typeObject->page_id = $this->id;
			$this->typeObject->save();
		} else {
			$this->db->where('id', $this->id);
			$this->db->update('OPC_Pages', $binds);
			$this->typeObject->update();
		}	
	}

	public function remove(){
		$this->typeObject->remove();
		
		$this->db->reset();
		$this->db->where('page_id', $this->id);
		$this->db->delete('OPC_Page_components');

		$this->db->reset();
		$this->db->where('id', $this->id);
		$this->db->delete('OPC_Pages');
	}
}

/* End of file Page.php */
/* Location: ./application/core/Page.php */