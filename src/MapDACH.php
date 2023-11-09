<?php

namespace BondarDe\Maps;

class MapDACH extends Map
{
    static function filename(): string
    {
        return 'dach.html';
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

            'at-1',
            'at-2',
            'at-3',
            'at-4',
            'at-5',
            'at-6',
            'at-7',
            'at-8',
            'at-9',

            'ch-zh',
            'ch-be',
            'ch-lu',
            'ch-ur',
            'ch-sz',
            'ch-ow',
            'ch-nw',
            'ch-gl',
            'ch-zg',
            'ch-fr',
            'ch-so',
            'ch-bs',
            'ch-bl',
            'ch-sh',
            'ch-ar',
            'ch-ai',
            'ch-sg',
            'ch-gr',
            'ch-ag',
            'ch-tg',
            'ch-ti',
            'ch-vd',
            'ch-vs',
            'ch-ne',
            'ch-ge',
            'ch-ju',
        ];
    }
}
