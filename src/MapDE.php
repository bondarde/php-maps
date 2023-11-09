<?php

namespace BondarDe\Maps;

class MapDE extends Map
{
    static function filename(): string
    {
        return 'de.html';
    }

    static function states(): array
    {
        return [
            'de-bw',
            'de-by',
            'de-be',
            'de-bb',
            'de-hb',
            'de-hh',
            'de-he',
            'de-mv',
            'de-ni',
            'de-nw',
            'de-rp',
            'de-sl',
            'de-sn',
            'de-st',
            'de-sh',
            'de-th',
        ];
    }
}
