<?PHP if (!defined('__SITE_PATH')) exit('No direct script access allowed');

abstract class OPC_Page {
	public $id;
	public $name;
	public $title;
	public $type;
	private $components;

	private $db;

	public function __construct($database, $components, $id = null){
		$this->db = $database
		$this->setComponents($components);
		$this->id = $id;
	}

	private function setComponents($components){
		$this->components = array('header' 		=> array(),
								  'top_page' 	=> array(),
								  'bottom_page' => array(),
								  'footer' 		=> array()
								  );
		foreach ($components as $component) {
			switch ($component['page_location']) {
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

		return array_merge($data, $this->getDataPage());
	}

	public function validate(){
		$errors = array();

		return array_merge($errors, $this->validatePage());
	}

	public function save(){
		$this->db->reset();
		
		$binds['name'] = $this->name;
		$binds['title'] = $this->title;
		$binds['type'] = $this->type;

		if($this->id == null) {
			$this->db->insert('OPC_Page' $binds);
			$this->savePage();
		} else {
			$this->db->where('id', $this->id);
			$this->db->update('OPC_Page' $binds);
			$this->updatePage();
		}	
	}

	public function remove(){
		$this->removePage();
		
		$this->db->reset();
/**
*@todo Remove components
*/
		$this->db->where('id', $this->id);
		$this->db->delete('OPC_Page');
	}

	public abstract function validatePage();
	public abstract function getDataPage();
	public abstract function savePage();
	public abstract function updatePage();
	public abstract function removePage();
	
}

/* End of file Page.php */
/* Location: ./application/core/Page.php */