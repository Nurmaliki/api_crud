<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function res_status($kode_status, $array_param, $note)
{
	$message = '';
	foreach ($array_param as $key => $value) {
		$message .= $value . ',';
	}

	if ($kode_status == 201) {
		http_response_code($kode_status);
		$res = [
			'status'	=> $kode_status,
			'message' 	=> '' . $note,
		];
		echo json_encode($res);
		return;
	} elseif ($kode_status == 400) {
		http_response_code($kode_status);
		$res = [
			'status'	=> $kode_status,
			'message' 	=> $message . ' ' . $note,
		];
		return json_encode($res);
	} else {
		http_response_code($kode_status);
		$res = [
			'status'	=> $kode_status,
			'message' 	=> $note,
		];
		echo json_encode($res);
		return;
	}
}
