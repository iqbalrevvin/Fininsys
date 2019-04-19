<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',$output);
	}

	public function index()
	{
		$crud = new grocery_CRUD();

		//Jangan lupa load library ini
		$this->load->library('gc_dependent_select');

		$crud->set_table('data_diri');
		$crud->columns('nama','fk_id_prov','fk_id_kota','fk_id_kec','fk_id_kel');
		$crud->display_as('fk_id_prov','Provinsi')
			 ->display_as('fk_id_kota','Kota')
			 ->display_as('fk_id_kec','Kecamatan')
			 ->display_as('fk_id_kel','Kelurahan');
		$crud->set_subject('Data Diri');
		$crud->set_relation('fk_id_prov','provinsi','nama');
		$crud->set_relation('fk_id_kota','kabupaten','nama');
		$crud->set_relation('fk_id_kec','kecamatan','nama');
		$crud->set_relation('fk_id_kel','kelurahan','nama');

		$fields = array(

		// Field Provinsi
		'fk_id_prov' => array( // first dropdown name
		'table_name' => 'provinsi', // table of country
		'title' => 'nama', // country title
		'relate' => null, // the first dropdown hasn't a relation
		'data-placeholder' => 'Pilih Provinsi' //dropdown's data-placeholder:
		),
		// Field Kabupaten
		'fk_id_kota' => array( // second dropdown name
		'table_name' => 'kabupaten', // table of state
		'title' => 'nama', // state title
		'id_field' => 'id_kab', // table of state: primary key
		'relate' => 'id_prov', // table of state:
		'data-placeholder' => 'Pilih Kota' //dropdown's data-placeholder:

		),
		// Field Kecamatan
		'fk_id_kec' => array(
		'table_name' => 'kecamatan',
		'title' => 'ID: {id_kec} / Kota : {nama}',  // now you can use this format )))
		//'where' =>"post_code>'167'",  // string. It's an optional parameter.
		//'order_by'=>"id_kab DESC",  // string. It's an optional parameter.
		'id_field' => 'id_kec',
		'relate' => 'id_kab',
		'data-placeholder' => 'Pilih Kecamatan'
		),
		// Field Kabupaten
		'fk_id_kel' => array( // second dropdown name
		'table_name' => 'kelurahan', // table of state
		'title' => 'nama', // state title
		'id_field' => 'id_kel', // table of state: primary key
		'relate' => 'id_kec', // table of state:
		'data-placeholder' => 'Pilih Kelurahan' //dropdown's data-placeholder:

		)
		);

		$config = array(
		'main_table' => 'data_diri',
		'main_table_primary' => 'id',
		"url" => site_url() . '/examples/index/',
		'ajax_loader' => base_url() . 'assets/ajax-loader.gif'
		);
		$categories = new gc_dependent_select($crud, $fields, $config);

		// first method:
		//$output = $categories->render();

		// the second method:
		$js = $categories->get_js();
		$output = $crud->render();
		$output->output.= $js;

		$this->_example_output($output);
	}

	public function offices_management()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('offices');
			$crud->set_subject('Office');
			$crud->required_fields('city');
			$crud->columns('city','country','phone','addressLine1','postalCode');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');

			$crud->required_fields('lastName');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function film_management()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('film');
		$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
		$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		$crud->unset_columns('special_features','description','actors');

		$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

		$output = $crud->render();

		$this->_example_output($output);
	}

	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->offices_management2();

		$output2 = $this->employees_management2();

		$output3 = $this->customers_management2();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files;
		$output = "<h1>List 1</h1>".$output1->output."<h1>List 2</h1>".$output2->output."<h1>List 3</h1>".$output3->output;

		$this->_example_output((object)array(
				'js_files' => $js_files,
				'css_files' => $css_files,
				'output'	=> $output
		));
	}

	public function offices_management2()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('offices');
		$crud->set_subject('Office');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function employees_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('employees');
		$crud->set_relation('officeCode','offices','city');
		$crud->display_as('officeCode','Office City');
		$crud->set_subject('Employee');

		$crud->required_fields('lastName');

		$crud->set_field_upload('file_url','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function customers_management2()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('customers');
		$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
		$crud->display_as('salesRepEmployeeNumber','from Employeer')
			 ->display_as('customerName','Name')
			 ->display_as('contactLastName','Last Name');
		$crud->set_subject('Customer');
		$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

}