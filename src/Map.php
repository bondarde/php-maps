<?php

namespace BondarDe\Maps;

use BondarDe\Colors\Color;

abstract class Map
{
    private int $max;
    private array $countsByState;
    private Color $baseColor;

    abstract static function filename(): string;

    abstract static function states(): array;

    public function __construct(array $countsByState)
    {
        $this->countsByState = $countsByState;
        $this->max = max($countsByState);

        foreach (static::states() as $state) {
            if (!isset($this->countsByState[$state])) {
                $this->countsByState[$state] = 0;
            }
        }
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function hex(string $color): Map
    {
        $this->baseColor = Color::fromHex($color);

        return $this;
    }

    public function rgb($r, $g, $b): Map
    {
        $this->baseColor = Color::fromRgb($r, $g, $b);

        return $this;
    }

    public function render(): string
    {
        $s = file_get_contents(dirname(__FILE__) . '/../resources/svg/maps/' . static::filename());

        $replacements = [];

        foreach (static::states() as $state) {
            $count = $this->countsByState[$state];
            $color = self::toColor($this->baseColor, $count, $this->max);

            $replacements['{colors:' . $state . '}'] = $color->hex;
            $replacements['{counts:' . $state . '}'] = $count;
        }

        $search = [];
        $replace = [];

        foreach ($replacements as $key => $val) {
            $search[] = $key;
            $replace[] = $val;
        }

        return str_replace($search, $replace, $s);
    }

    protected static function toColor(Color $baseColor, int $count, int $maxValue): Color
    {
        $max = 100;
        $percentage = 100 * $count / $maxValue;

        $cutOff = 30;
        $percentage = $percentage * (1 - $cutOff / $max) + $cutOff;

        return Color::fromRgb(
            self::blendColorValue($baseColor->r, 255, $percentage / 100),
            self::blendColorValue($baseColor->g, 255, $percentage / 100),
            self::blendColorValue($baseColor->b, 255, $percentage / 100),
        );
    }

    private static function blendColorValue(int $a, int $b, float $weight): int
    {
        $val = sqrt(
            $weight * pow($a, 2)
            + (1 - $weight) * pow($b, 2)
        );

        return intval($val);
    }
}
