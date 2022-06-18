<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->dbforge();
	}
	public function index()
	{
		if (isset($_POST['database']) || !empty($_POST['database'])) {
			$database = $_POST['database'];
			$create_database = $this->dbforge->create_database($database);
			if ($create_database) {
				// helper untuk status (kode_status,array,$message)
				// param
				// 1. kode_status
				// 2. array param yang ko
				// 3. message tambahan 
				$res = res_status(201, [], 'database success terbuat');
				echo $res;
				return;
			} else {
				// helper untuk status (kode_status,array,$message)
				// param
				// 1. kode_status
				// 2. array param yang ko
				// 3. message tambahan 
				$res = res_status(500, [], 'Gagal create database');
				echo $res;
				return;
			}
		} else {
			// helper untuk status (kode_status,array,$message)
			// param
			// 1. kode_status
			// 2. array param yang ko
			// 3. message tambahan 
			$res = res_status(400, ['database'], ' Tidak Boleh kosong');
			echo $res;
			return;
		}
	}


	public function drop()
	{
		if (isset($_POST['database']) || !empty($_POST['database'])) {
			$database = $_POST['database'];
			$create_database = $this->dbforge->drop_database($database);
			if ($create_database) {
				// helper untuk status (kode_status,array,$message)
				// param
				// 1. kode_status
				// 2. array param yang ko
				// 3. message tambahan 
				$res = res_status(201, [], 'database success terhapus');
				echo $res;
				return;
			} else {
				// helper untuk status (kode_status,array,$message)
				// param
				// 1. kode_status
				// 2. array param yang ko
				// 3. message tambahan 
				$res = res_status(500, [], 'gagal hapus database');
				echo $res;
				return;
			}
		} else {
			// helper untuk status (kode_status,array,$message)
			// param
			// 1. kode_status
			// 2. array param yang ko
			// 3. message tambahan 
			$res = res_status(400, ['database'], 'Tidak Boleh Kosong');
			echo $res;
			return;
		}
	}
}
