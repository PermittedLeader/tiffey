<?php

if (! function_exists('luminanceDifference')) {
    /**
     * Accepts two arrays [R,G,B] of colors to provide difference
     *
     * @param  array  $color1    Unkeyed array [R,G,B]
     * @param  [type] $color2   Unkeyed array [R,G,B]
     * @return float            Luminance Difference
     */
    function luminanceDifference($color1, $color2)
    {
        $L1 = 0.2126 * pow($color1[0] / 255, 2.2) +
              0.7152 * pow($color1[1] / 255, 2.2) +
              0.0722 * pow($color1[2] / 255, 2.2);

        $L2 = 0.2126 * pow($color2[0] / 255, 2.2) +
              0.7152 * pow($color2[1] / 255, 2.2) +
              0.0722 * pow($color2[2] / 255, 2.2);

        if ($L1 > $L2) {
            return ($L1 + 0.05) / ($L2 + 0.05);
        } else {
            return ($L2 + 0.05) / ($L1 + 0.05);
        }
    }
}

if (! function_exists('hexToRGB')) {
    /**
     * Convert Hex color to RGB array
     *
     * @param  string  $hex  RGB color
     * @return array        [R,G,B]
     */
    function hexToRGB($hex)
    {
        $hex = str_replace("\xEF\xBB\xBF", '', $hex);
        if (substr($hex, 0, 1) == '#') {
            $hex = substr($hex, 1);
        }
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1).substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1).substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1).substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }

        return [(int) $r, (int) $g, (int) $b];
    }
}

if (! function_exists('contrastColor')) {
    /**
     * Tells if Black or White is better for contrast
     *
     * @param  string  $color Color in RGB or Hex
     * @return string        Color name for CSS
     */
    function contrastColor($color)
    {
        if (substr_count($color, ',')) {
            $color = explode(',', $color);
        } else {
            $color = hexToRGB($color);
        }
        $white = (float) luminanceDifference($color, [255, 255, 255]);
        $black = (float) luminanceDifference($color, [0, 0, 0]);
        if ($white > $black) {
            return 'white';
        } else {
            return 'black';
        }
    }
}

if (! function_exists('cssToHex')) {
    /**
     * Converts as CSS Colour name to Hex code
     *
     * @param  string  $color Color name in CSS
     * @return string        Hex code
     */
    function cssToHex($colorName)
    {
        include __DIR__.'/../colors.php';
        $color = explode('-', $colorName);
        if (count($color) === 3) {
            return $colors[$color[1]][$color[2]];
        } elseif (count($color) === 2) {
            return $colors[$color[1]];
        } else {
            throw new \Exception('Color name not found', 1);
        }
    }
}