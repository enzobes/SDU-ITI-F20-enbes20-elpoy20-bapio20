<?php
class Controller {

	public function model($model) {
		require_once '../app/models/' . $model . '.php';
		return new $model();
	}

	public function view($view, $viewbag = []) {
		include '../app/views/partials/header.php';
		require_once '../app/views/' . $view . '.php';
		include '../app/views/partials/footer.php';
	}

	public function blank_view($view, $viewbag = []) {
		require_once '../app/views/' . $view . '.php';
	}

	public function post() {
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	public function get() {
		return $_SERVER['REQUEST_METHOD'] === 'GET';
	}

}
