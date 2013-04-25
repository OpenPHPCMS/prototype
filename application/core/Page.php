<?PHP if (!defined('__SITE_PATH')) exit('No direct script access allowed');
/**
* OpenPhpCms
*
* An open CMS for PHP/MYSQL
*
* @author		Maikel Martens
* @copyright    Copyright (c) 20013 - 2013, openphpcms.org.
* @license		http://openphpcms.org/license.html
* @link         http://openphpcms.org
* @since		Version 1.0
*/
// ------------------------------------------------------------------------

/**
* Page class
*
* Core class for all the pages, makes the calls to the type page object
*
* @package      OpenPhpCms
* @subpackage   Core
* @category     Core
* @author       Maikel Martens
*/
// ------------------------------------------------------------------------
class OPC_Page {
	public $id;
	public $name;
	public $title;
	public $type;
	public $typeObject;
	private $components;

	private $db;

	/**
	* Constructer
	*
	* Set database connection, page type and optional page id
	* when it is a page that already exists.
	*
	* @access public
	* @return void
	*/
	public function __construct($database, $type, $id = null){
		$this->db = $database;
		$this->type = $type;
		$this->id = $id;
	}


	/**
	* setComponents
	*
	* Split the components to there page location.
	*
	* @access public
	* @param array components
	* @return void
	*/
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

	/**
	* getComponents
	*
	* Get the components of an specific location
	* when no location is set it wil return all
	* components.
	*
	* @access public
	* @param String location
	* @return void
	*/
	public function getComponents($Location = null){
		if($Location == null) {
			$components = array();
			foreach ($this->components as $components_location) {
				foreach ($components_location as $component) {
					$components[] = $component;
				}
			}
			return $components;
		}
		if(isset($this->components[$Location]))
			return $this->components[$Location];
		else
			return null;
	}

	/**
	* getData
	*
	* Returns all the data from the page 
	*
	* @access public
	* @return void
	*/
	public function getData(){
		$data['name'] = $this->name;
		$data['title'] = $this->title;
		$data['type'] = $this->type;

		return array_merge($data, $this->typeObject->getData());
	}

	/**
	* validate
	*
	* Validate the data that is set and returns list with errors
	* when there are some. 
	*
	* @access public
	* @return void
	*/
	public function validate(){
		$errors = array();

		return array_merge($errors, $this->typeObject->validate());
	}

	/**
	* save
	*
	* When no id is it wil insert an new page in database
	* else it wil update page in database.
	*
	* @access public
	* @return void
	*/
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

	/**
	* remove
	*
	* Remove all page data from database.
	*
	* @access public
	* @return void
	*/
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