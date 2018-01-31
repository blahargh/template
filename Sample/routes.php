<?php

$app->route('get', '', function () {

	$this->render('home.html', [
		'vars' => print_r($this->getVars(), true),
	]);
});
