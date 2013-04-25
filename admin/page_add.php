<?PHP

/* * * Import init * **/
if(!defined('__SITE_PATH'))
	require('admin_init.php');

if( !secure()->hasUserAccess(__ROLE_USER) ){
	display_error('no access!');
	load_view();
	die();
}

$data['type'] 	= null;
$data['name'] 	= '';
$data['title'] 	= '';

//Get page type and give error when not selected
// ------------------------------------------------------------------------
if(isset($_GET['type']))
	$data['type'] = $_GET['type'];

if(isset($_POST['page_type']))
	$data['type'] = $_POST['page_type'];



if($data['type'] == null){
	display_error('Page type is not selected!');
	redirect('admin/pages.php');
}
// ------------------------------------------------------------------------

//Give error when type does not exists
// ------------------------------------------------------------------------
$page_type_path = __APPLICATION_PATH.'pages/'.$data['type'].'/';

if(!is_dir($page_type_path)) {
	display_error('Page type does not exists!');
	redirect('admin/pages.php');
}
// ------------------------------------------------------------------------

// Set all the necessary files and check if the exists
// ------------------------------------------------------------------------
$class_file = $page_type_path.$data['type'].'.php';
$form_file = $page_type_path.'FORM_'.$data['type'].'.php';
$content_file = $page_type_path.'CONTENT_'.$data['type'].'.php';

if(!is_file($class_file) || !is_file($form_file) || !is_file($content_file)){
	display_error('Page type has not all the necessary files, contact your administrator!');
	redirect('admin/pages.php');
}
// ------------------------------------------------------------------------

// Load required classes and create OPC_Page object
// ------------------------------------------------------------------------	
load_class('Page', 'core');
load_class('PageFactory' , 'core');

$page = OPC_PageFactory::create($data['type'], $data['name']);
// ------------------------------------------------------------------------

// Process form when submitted
// ------------------------------------------------------------------------
if(isset($_POST['page_submit'])){
	$page->name = $_POST['name'];
	$page->title = $_POST['title'];

	unset($_POST['page_submit']);
	unset($_POST['name']);
	unset($_POST['title']);
	unset($_POST['type']);

	foreach ($_POST as $key => $value) {
		$data[$key] = $value;
		$page->typeObject->$key = $value;
	}

	$errors = $page->validate();
	
	if(empty($errors)) {
		display_succes("Page ".$page->name." saved!");
		redirect("admin/pages.php");
	}
	/** 
	* @todo process errors
	*/
// ------------------------------------------------------------------------
} else {
	$data = array_merge($data, $page->getData());	
}

$data['page_form_file'] = $form_file;
$data['page_content_file'] = $content_file;

load_view('page_add', $data);
