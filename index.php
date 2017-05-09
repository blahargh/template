<?php
require 'vendor/autoload.php';

// Report ALL errors
error_reporting(E_ALL);

// Turn assertion handling way the hell up to fatal
assert_options(ASSERT_ACTIVE, 1);
assert_options(ASSERT_CALLBACK, function ($script, $line, $message) {
	 throw new \Exception($message);
});

// Set an error handler that catches EVERYTHING PHP may throw at us
// (notices, warnings, etc) so that we can throw them all as strict errors.
set_error_handler(function ($errno, $errstr, $errfile, $errline, $errcontext) {
	 throw new \Exception(strtr(
		  'Unhandled PHP Error: {message} at {file}:{line}',
		  [
				'{message}' => $errstr,
				'{file}' => $errfile,
				'{line}' => $errline
		  ]
	 ));
});


$app = new \IMP\SlimTwigWrapper();

$app->route('get', '/', function() {
	$this->render('<pre>'.print_r($this->getVars(), true).'</pre>');
});

$app->run();