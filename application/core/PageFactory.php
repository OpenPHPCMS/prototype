<?PHP

class OPC_PageFactory {

	public static function create($type, $name, $id = null){
		$path = __APPLICATION_PATH.'pages/'.$type.'/';
		$file = $path.$type.'.php';
		
		if(is_dir($path) && is_file($file)){
			require($file);
			$class = 'PAGE_'.$type;

			$result = null;
			$db = new OPC_Database();

			if($id == null){
				$db->where('name', $name);
				$result = $db->get('OPC_Pages');
			} else {
				$db->where('id', $id);
				$result = $db->get('OPC_Pages');
			}
			
			$page = null;

			if(!empty($result)){
				$page = new OPC_Page($db, $type, $result[0]['id']);
				$page->title = $result[0]['title'];
				$page->name = $result[0]['name'];

				load_class('ComponentFactory', 'core');
				
				$page->setComponents(OPC_ComponentFactory::getComponents($page->name));

				$db->reset();
				$db->where('page_id', $page->id);
				$result = $db->get('OPC_Page_content');

				$page->typeObject = new $class($db, $result, $page->id );

			} else {
				$page = new OPC_Page($db, $type);
				$page->typeObject = new $class($db, array() );
			}

		}
		return $page;
	}
}