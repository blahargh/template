<?php

$app->route('get', '~', function () {

	$this->render('~/view_home.html', [
		'vars' => print_r($this->getVars(), true),
	]);
});