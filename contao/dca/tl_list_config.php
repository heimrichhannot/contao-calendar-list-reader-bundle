<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

$dca = &$GLOBALS['TL_DCA']['tl_list_config'];

PaletteManipulator::create()
    ->addField('useCalendarExtension', 'extensions_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_list_config');

$dca['fields']['useCalendarExtension'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'clr'],
    'sql'       => "char(1) NOT NULL default ''",
];