<?php

$subjects = array(
	array(
		'name' => 'Geschichte',
		'GOK' => 'CHILDREN',
		'subjects' => array(
			array(
				'name' => 'Geschichtsschreibung und -theorie',
				'GOK' => array('PB')
			),
			array(
				'name' => 'Historische Hilfswissenschaften',
				'GOK' => array('PD')
			),
			array(
				'name' => 'Weltgeschichte (Entdeckungen; Weltkriege etc.)',
				'GOK' => array('PF')
			),
			array(
				'name' => 'England (epochenübergreifend)',
				'GOK' => array('PO? 000', 'PO 1', 'PO 2', 'PO 3', 'PO 4', 'PO 5', 'PO 6', 'PO 7', 'PO 8', 'PO 9', 'POL')
			),
			array(
				'name' => 'England im Mittelalter',
				'GOK' => array('POA', 'POM')
			),
			array(
				'name' => 'England in der Frühen Neuzeit',
				'GOK' => array('POB', 'PON')
			),
			array(
				'name' => 'England im 19. Jahrhundert',
				'GOK' => array('POD', 'POO')
			),
			array(
				'name' => 'England im 20. Jahrhundert',
				'GOK' => array('POF', 'POG', 'POH', 'POO')
			),
			array(
				'name' => 'Schottland',
				'GOK' => array('POP', 'POQ', 'POR', 'POS'),
				'inline' => true
			),
			array(
				'name' => 'Irland',
				'GOK' => array('POT', 'POV', 'POW', 'POX', 'POY', 'POZ'),
				'inline' => true
			),
			array(
				'name' => 'USA (epochenübergreifend)',
				'GOK' => array('PVK')
			),
			array(
				'name' => 'USA in der Frühen Neuzeit',
				'GOK' => array('PVL')
			),
			array(
				'name' => 'USA 1776-1918',
				'GOK' => array('PVM')
			),
			array(
				'name' => 'USA im 20. Jahrhundert',
				'GOK' => array('PVN', 'PVO', 'PVP')
			),
			array(
				'name' => 'Kanada',
				'GOK' => array('PVD', 'PVE', 'PVF', 'PVG'),
				'inline' => true
			),
			array(
				'name' => 'Australien',
				'GOK' => array('PXB', 'PXC', 'PXD', 'PXE'),
				'inline' => true
			),
			array(
				'name' => 'Neuseeland',
				'GOK' => array('PXN', 'PXO', 'PXP', 'PXR', 'PXS'),
				'inline' => true
			),
			array(
				'name' => 'Geschichte des jüdischen Volkes im angloamerik. Raum',
				'GOK' => array('PY! 300', 'PY! 7')
			),
		),
	),

	array(
		'name' => 'Englische Philologie',
		'GOK' => 'IA',
		'subjects' => array (
			array(
				'name' => 'Sprach- und Literaturwissenschaft, Allgemeines',
				'GOK' => array('IA 2')
			),
			array(
				'name' => 'Sprachwissenschaft',
				'GOK' => array('IA 3'),
				'inline' => true
			),
			array(
				'name' => 'Anthologien',
				'GOK' => array('IA 4'),
				'inline' => true
			),
			array(
				'name' => 'Literaturwissenschaft',
				'GOK' => array('IA 5')
			),
			array(
				'name' => 'Textausgaben & Sekundärliteratur',
				'GOK' => array('IA 6')
			),
			array(
				'name' => 'Schottland',
				'GOK' => array('IAH'),
				'inline' => true
			),
			array(
				'name' => 'Wales',
				'GOK' => array('IAJ'),
				'inline' => true
			),
			array(
				'name' => 'Irland',
				'GOK' => array('IAF'),
				'inline' => true
			),
			array(
				'name' => 'Altenglisch',
				'GOK' => array('IAB')
			),
			array(
				'name' => 'Mittelenglisch und Frühneuenglisch',
				'GOK' => array('IAD', 'IAE')
			),
		),
	),
	
	array(
		'name' => 'Globales Englisch',
		'GOK' => 'IB',
		'subjects' => array(
			array(
				'name' => 'Kanada',
				'GOK' => array('IBJ'),
				'inline' => true
			),
			array(
				'name' => 'Australien',
				'GOK' => array('IBB'),
				'inline' => true
			),
			array(
				'name' => 'Neuseeland',
				'GOK' => array('IBG'),
				'inline' => true
			),
			array(
				'name' => 'Afrika',
				'GOK' => array('IBM'),
				'inline' => true,
			),
			array(
				'name' => 'Karibischer Raum',
				'GOK' => array('IBO'),
				'inline' => true
			),
			array(
				'name' => 'Malta',
				'GOK' => array('IBK'),
				'inline' => true
			),
			array(
				'name' => 'Asien, Ozeanien',
				'GOK' => array('IBR'),
				'inline' => true,
			),
			array(
				'name' => 'Indischer Subkontinent',
				'GOK' => array('IBW'),
				'inline' => true
			),
			array(
				'name' => 'Mischsprachen',
				'GOK' => array('IBY')
			),
		),
	),
	
	array(
		'name' => 'Amerikanische Philologie',
		'GOK' => 'IC',
		'subjects' => array(
			array(
				'name' => 'Sprach- und Literaturwissenschaft, Allgemeines',
				'GOK' => array('IC 2')
			),
			array(
				'name' => 'Sprachwissenschaft',
				'GOK' => array('IC 3'),
				'inline' => true
			),
			array(
				'name' => 'Anthologien',
				'GOK' => array('IC 4'),
				'inline' => true
			),
			array(
				'name' => 'Literaturwissenschaft',
				'GOK' => array('IC 5')
			),
			array(
				'name' => 'Textausgaben & Sekundärliteratur',
				'GOK' => array('IC 6')
			),
		),
	),
);

?>
