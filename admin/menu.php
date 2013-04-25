<?PHP

/* * * Import init * **/
if(!defined('__SITE_PATH'))
	require('admin_init.php');

if( !secure()->hasUserAccess(__ROLE_DEV) ){
	display_error('no access!');
	load_view();
	die();
}

$data['id']		= '';
$data['name'] 	= '';
$data['link'] 	= '';
$data['parent'] = '';

load_class('Menu', 'core');
$db = new OPC_Database();
$menu = new OPC_Menu($db);

// Save menu item
// ------------------------------------------------------------------------
if(isset($_POST['menu_submit'])) {
	$data['name'] 	= $_POST['name'];
	$data['link'] 	= $_POST['link'];
	$data['parent'] = $_POST['parrent'];

	//add validation

	$binds['name'] 			= $data['name'];
	$binds['link'] 			= $data['link'];
	$binds['parent'] 		= $data['parent'];
	$binds['order_number'] 	= $menu->latestOrderNumber()+1;

	$db->insert('OPC_Menu', $binds);
	display_succes("Menu item added.");
}
// ------------------------------------------------------------------------

// Save menu order
// ------------------------------------------------------------------------
if(isset($_POST['menu_save'])) {
	unset($_POST['menu_save']);
	foreach ($_POST as $key => $value) {
		$binds['order_number'] = $value;
		$db->where('id', $key);
		$db->update('OPC_Menu', $binds);
	}

}
// ------------------------------------------------------------------------

// Create all the options for all the pages
// ------------------------------------------------------------------------
$data['parents'] = '<option value="0"> - </option>';
foreach ($menu->getMenuItems() as $item) {
	$data['parents'] .= "<option".($item['name'] == $data['parent'] ? 'selected': '')." value='".$item['id']."'>".$item['name']."</option>\n";
}
// ------------------------------------------------------------------------
$data['menu'] = '';

$menuItems 	= $menu->getMenu();
$itemCount 	= count($menuItems);
$itemNr 	= 1;

//Create table rows for menu items
// ------------------------------------------------------------------------
foreach ($menuItems as $item) {
	$childCount = count($item['childeren']);
	
	$data['menu'] .= "<tr><td>".$item['name']."</td>\n"
	."<td>".$item['link']."</td>\n"
	."<td><select name='".$item['id']."'>\n";
	
	for($index=1; $index <= $itemCount; $index++)
		$data['menu'] .= "<option ".($index == $item['order_number'] ? 'selected': '').">".$index."</option>\n";

	$data['menu'] .= "</select></td></tr>\n";
	foreach ($item['childeren'] as $child) {

		$data['menu'] .= "<tr><td> - ".$child['name']."</td>\n"
		."<td> - ".$child['link']."</td>\n"
		."<td> - <select name='".$child['id']."'>\n";
		
		for($index=1; $index <= $childCount; $index++)
			$data['menu'] .= "<option ".($index == $child['order_number'] ? 'selected': '').">".$index."</option>\n";

		$data['menu'] .= "</select></td></tr>\n";
	}

	$itemNr++;
}
// ------------------------------------------------------------------------

load_view('menu', $data);