<?php

use AD7six\Dsn\Wrapper\CakePHP\LogDsn;

App::build(
	[
		'Plugin' => [ROOT . '/Plugin/', ROOT . '/app/Plugin/'],
		'Vendor' => [ROOT . '/vendor/', ROOT . '/app/Vendor/']
	],
	App::RESET
);

CakePlugin::loadAll();
CakePlugin::load([
    'Exception' => array('bootstrap' => 'notifier'),
]);

Configure::write('ExceptionNotifier.prefix', '[sponge]');

App::uses('CakeLog', 'Log');
CakeLog::config('default', LogDsn::parse(env('LOG_URL')));
CakeLog::config('error', LogDsn::parse(env('LOG_ERROR_URL')));

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));
