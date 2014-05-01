<?php

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

Configure::write('Dispatcher.filters', array(
	'AssetDispatcher',
	'CacheDispatcher'
));