<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Config extends CI_Controller {
 
    function __construct()
    {
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->load->library('OutputView');
		$this->load->model('Getdata_m');
    }
 	
    public function index()
    {
		if (!$this->ion_auth->is_admin())
		{
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$output = (object)array('data' => '' , 'output' => '' , 'js_files' => null , 'css_files' => null);
			
			$data['judul'] = 'Dashboard';

			$template = 'admin_template';
			$view = 'grocery';
			$this->outputview->output_admin($view, $template, $data, $output);
		}
	}

	public function icon(){

		$data['judul'] 	= 'Icon';
		$template 		= 'admin_template';
		$view 			= 'icon.php';
		$this->outputview->output_admin($view, $template, $data);
		# code...
	}

    //USERS MANAGEMENT
    public function users()
    {
    	$crud = new grocery_CRUD();

    	$crud->set_theme('datatables');
    	$crud->set_table('users');
    	$crud->set_subject('Pengguna');
    	$crud->display_as('first_name', 'Nama Depan');
    	$crud->display_as('last_name', 'Nama Belakang');
    	$crud->display_as('phone', 'Telp/Hp');
    	$crud->display_as('groups', 'Hak Akses');
    	$crud->display_as('active','Status Akun');
    	$crud->display_as('photo', 'Foto');
    	$crud->display_as('password', 'Kata Sandi');
    	$crud->display_as('password_confirm', 'Ulangi Kata Sandi');
    	$crud->display_as('old_password','Kata Sandi Lama');
    	$crud->display_as('new_password', 'Kata Sandi Baru');
    	$crud->display_as('identity_number', 'No. Identitas/NIK');
    	$crud->set_field_upload('photo','assets/image/admin');
    	$crud->columns('photo','identity_number','username','email','groups','active');
    	if ($this->uri->segment(3) !== 'read')
		{
	    	$crud->add_fields('identity_number','username','first_name', 'last_name', 'email', 'phone','groups' , 'photo', 'password', 'password_confirm');
			$crud->edit_fields('identity_number','username','first_name', 'last_name', 'email', 'phone','groups' , 'photo', 'last_login','old_password','new_password');
		}else{
			$crud->set_read_fields('username','first_name', 'last_name', 'email', 'phone','groups', 'last_login');
		}
		$crud->set_relation_n_n('groups', 'users_groups', 'groups', 'user_id', 'group_id', 'name');
		$crud->where('username !=','iqbalrevvin');

		/*$listGroup = $this->Getdata_m->getDataHakAkses();
		$finalArray = array();
		foreach ($listGroup->result() as $row){
				$finalArray[$row->id]=$row->name;
		}
		$crud->field_type('groups','multiselect',$finalArray);*/
		//VALIDATION
		$crud->required_fields('identity_number','username','first_name', 'last_name', 'email', 'phone', 'password', 'password_confirm');
		$crud->set_rules('email', 'E-mail', 'required|valid_email');
		$crud->set_rules('phone', 'Phone', 'required|numeric');
		$crud->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
   		$crud->set_rules('new_password', 'New password', 'min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']');

		//FIELD TYPES
		$crud->change_field_type('last_login', 'readonly');
		$crud->change_field_type('password', 'password');
		$crud->change_field_type('password_confirm', 'password');
		$crud->change_field_type('old_password', 'password');
		$crud->change_field_type('new_password', 'password');

		//CALLBACKS
		$crud->callback_insert(array($this, 'create_user_callback'));
		$crud->callback_update(array($this, 'edit_user_callback'));
		$crud->callback_field('last_login',array($this,'last_login_callback'));
		$crud->callback_column('active',array($this,'active_callback'));

		//VIEW
		$output = $crud->render();
		$data['judul'] = 'Users';
		$data['crumb'] = array( 'Users' => '' );

		$template = 'admin_template';
		$view = 'grocery';
		$this->outputview->output_admin($view, $template, $data, $output);
    }

	public function groups() {
		$crud = new grocery_CRUD();

		$crud->set_table('groups');
		$crud->set_subject('Hak Akses');
		$crud->display_as('name', 'Nama Hak Akses');
		$crud->display_as('description', 'Deskripsi');
		$crud->where('name !=','developer');

		//VIEW
		$output = $crud->render();
		$data['judul'] = 'Groups';
		$data['crumb'] = array( 'Groups' => '' );

		$template = 'admin_template';
		$view = 'grocery';
		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function active_callback($value, $row)
	{
		if ($value == 1) {
			$val = 'active';
		}else{
			$val = 'inactive';
		}
		return "<a href='".site_url('config/activate/'.$row->id.'/'.$value)."'>$val</a>";
	}

	function activate($id, $value)
	{
		if ($value == 1) {
			$this->ion_auth->deactivate($id);
		}else{
			$this->ion_auth->activate($id);
		}

		redirect('config/users');
	}

	function last_login_callback($value = '', $primary_key = null)
	{
		$value = date('l Y/m/d H:i', $value);
	    return $value;
	}

	function delete_user($primary_key) {
		if ($this->ion_auth_model->delete_user($primary_key)) {
			return true;
		} else {
			return false;
		}
	}

	function edit_user_callback($post_array, $primary_key) {
		$identity = $post_array[$this->config->item('identity', 'ion_auth')];
		$groups   = $post_array['groups'];
		$old 	  = $post_array['old_password'];
		$new 	  = $post_array['new_password'];
		$data     = array(
					'username'   => $post_array['username'],
					'email'      => $post_array['email'],
					'phone'      => $post_array['phone'],
					'first_name' => $post_array['first_name'],
					'last_name'  => $post_array['last_name'],
					'photo'  	=> $post_array['photo']
				);
		if ($old != '') {
			$change = $this->ion_auth->update($primary_key, $data) && $this->ion_auth->change_password($identity, $old, $new) && $this->ion_auth->remove_from_group('', $primary_key) && $this->ion_auth->add_to_group($groups, $primary_key);
		}else{
			$change = $this->ion_auth->update($primary_key, $data) && $this->ion_auth->remove_from_group('', $primary_key) && $this->ion_auth->add_to_group($groups, $primary_key);
		};

		if ($change) {
			return true;
		}else{
			return false;
		}
	}

	function create_user_callback($post_array, $primary_key = null) {		

		$username = $post_array['username'];
		$password = $post_array['password'];
		$email    = $post_array['email'];
		$group 	  = $post_array['groups'];
		$data     = array(
					'phone'      => $post_array['phone'],
					'first_name' => $post_array['first_name'],
					'last_name'  => $post_array['last_name']
				);

		return $this->ion_auth->register($username, $password, $email, $data, $group);
	}

	//CRUD SETTINGS HERE
	public function settings()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('settings');
		$crud->set_subject('Pengaturan Aplikasi');
		$crud->set_field_upload('logo','assets/image');
		$crud->columns('logo','judul','instansi','alamat','versi', 'email_lembaga');
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_export();
		$crud->unset_print();
		$crud->set_rules('email_lembaga', 'E-mail', 'required|valid_email');
		$crud->required_fields('judul', 'email_lembaga');
		$crud->unset_texteditor('kode_embed_kalender', 'full_text');

		$output = $crud->render();
		$data['judul'] = "Settings";
		$data['crumb'] = array( 'Settings' => '' );

		$template = 'admin_template';
		$view = 'grocery';
		$this->outputview->output_admin($view, $template, $data, $output);
	}

	public function header_menu()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		$crud->set_table('header_menu');
		$crud->set_subject('Header Menu');
		$crud->display_as('id_header_menu','Sort');
		$crud->set_relation_n_n('Akses', 'groups_header', 'groups', 'id_header_menu', 'id_groups', 'name');
		$crud->add_action('Menu', 'fa fa-clipboard-list', '', '',array($this,'link_menu'));
		$crud->order_by('sort','ASC');
		$crud->unset_read();

		$output = $crud->render();
		$data['judul'] = "Header Menu";
		$data['crumb'] = array( 'Header Menu' => '' );

		$template = 'admin_template';
		$view = 'grocery';
		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function link_menu($primary_key, $row)
	{
	    return site_url('config/menu').'/'.$primary_key;
	}

	public function menu($id_header_menu)
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');
		$crud->set_table('menu');
		$crud->set_subject('Menu');
		$crud->where('level_one','0');
		$crud->where('level_two','0');
		$crud->where('id_header_menu',$id_header_menu);
		$crud->change_field_type('id_header_menu','invisible');

		$crud->order_by('sort','ASC');
		$crud->set_relation_n_n('Akses', 'groups_menu', 'groups', 'id_menu', 'id_groups', 'name');
		$crud->unset_columns('level_one','level_two','icon','menu_id','id_header_menu');
		$crud->unset_read();
		$crud->unset_fields('level_one','level_two');
		$crud->add_action('Sub-Menu', 'fa fa-list-ul', '', '',array($this,'link_sub_menu'));
	    $crud->callback_before_insert(array($this,'call_header_menu'));
		$crud->callback_after_delete(array($this,'menu_after_delete'));

		$output = $crud->render();
		$data['script'] = "$('#menu-menu').addClass('active');";
		$data['script_grocery'] = "$('a[href=\"#hidden\"]').replaceWith('<span style=\"color:#777\"><i class=\"fa fa-list-ul\"></i> Sub-menu</span>')";
		$output->data = $data;
		$data['judul'] = "Menu";
		$data['crumb'] = array( 'Header menu' => 'config/header_menu',
								'Menu' => ''
							  );

		$template = 'admin_template';
		$view = 'grocery';
		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function call_header_menu($post_array) 
	{
		$post_array['id_header_menu'] = $this->uri->segment(3);
		return $post_array;
	}   

	function menu_after_delete($primary_key)
	{
		$this->db->where('level_one', $primary_key);
		return $this->db->delete('menu');
	}

	function link_sub_menu($primary_key, $row)
	{
		if ($row->url == "#") {
			$url = site_url('config/sub_menu').'/'.$row->id_header_menu.'/'.$primary_key;
		}else{
			$url = "#hidden";
		}
	    return $url;
	}

	public function sub_menu($id_header_menu, $level_one)
	{
		$crud = new grocery_CRUD();
		
		$crud->set_theme('datatables');
		$crud->set_table('menu');
		$crud->set_subject('Sub Menu');
		$crud->where('level_one', $level_one);
		$crud->where('level_two','0');
		$crud->change_field_type('id_header_menu','invisible');
		$crud->change_field_type('level_one','invisible');

		$crud->order_by('sort','ASC');
		$crud->set_relation_n_n('Akses', 'groups_menu', 'groups', 'id_menu', 'id_groups', 'name');
		$crud->unset_columns('level_one','level_two','icon','menu_id','id_header_menu');
		$crud->unset_read();
		$crud->unset_fields('level_two');
		$crud->add_action('Sub menu 2', 'fa fa-plus-circle', '', '',array($this,'link_sub_menu_2'));
	    $crud->callback_before_insert(array($this,'call_sub_menu'));
		$crud->callback_after_delete(array($this,'sub_menu_after_delete'));

		$output = $crud->render();
		$data['script'] = "$('#menu-menu').addClass('active');";
		$data['script_grocery'] = "$('a[href=\"#hidden\"]').replaceWith('<span style=\"color:#777\"><i class=\"fa fa-circle\"></i> Sub menu 2</span>')";		
		$output->data = $data;
		$data['judul'] = "Sub menu";
		$data['crumb'] = array( 
						'Header menu' => 'config/header_menu',
						'Menu' => 'config/menu/'.$id_header_menu,
						'Sub menu' => ''
					  );

		$template = 'admin_template';
		$view = 'grocery';
		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function call_sub_menu($post_array) 
	{
		$post_array['id_header_menu'] = $this->uri->segment(3);
		$post_array['level_one'] = $this->uri->segment(4);
		return $post_array;
	}  

	function sub_menu_after_delete($primary_key)
	{
		$this->db->where('level_one', $primary_key);
		return $this->db->delete('menu');
	}

	function link_sub_menu_2($primary_key, $row)
	{
		if ($row->url == "#") {
			$url = site_url('config/sub_menu_2').'/'.$row->id_header_menu.'/'.$row->level_one.'/'.$primary_key;
		}else{
			$url = "#hidden";
		}
	    return $url;
	}

	public function sub_menu_2($id_header_menu, $level_one, $level_two)
	{
		$crud = new grocery_CRUD();

		$crud->set_table('menu');
		$crud->set_subject('Sub Menu 2');
		$crud->where('level_one', $level_one);
		$crud->where('level_two', $level_two);
		$crud->change_field_type('id_header_menu','invisible');
		$crud->change_field_type('level_one','invisible');
		$crud->change_field_type('level_two','invisible');

		$crud->order_by('sort','ASC');
		$crud->set_relation_n_n('Akses', 'groups_menu', 'groups', 'id_menu', 'id_groups', 'name');
		$crud->unset_columns('level_one','level_two','icon','menu_id','id_header_menu');
		$crud->unset_read();
	    $crud->callback_before_insert(array($this,'call_sub_menu_2'));

		$output = $crud->render();
		$data['script'] = "$('#menu-menu').addClass('active');";
		$output->data = $data;
		$data['judul'] = "Sub menu 2";
		$data['crumb'] = array( 
						'Header menu' => 'config/header_menu',
						'Menu' => 'config/menu/'.$id_header_menu, 
						'Sub menu' => 'config/sub_menu/'.$id_header_menu.'/'.$level_one,
						'Sub menu 2' => ''
					  );

		$template = 'admin_template';
		$view = 'grocery';
		$this->outputview->output_admin($view, $template, $data, $output);
	}

	function call_sub_menu_2($post_array) 
	{
		$post_array['id_header_menu'] = $this->uri->segment(3);
		$post_array['level_one'] = $this->uri->segment(4);
		$post_array['level_two'] = $this->uri->segment(5);
		return $post_array;
	} 


}
