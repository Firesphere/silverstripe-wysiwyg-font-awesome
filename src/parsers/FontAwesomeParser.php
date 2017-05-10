<?php

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10-May-17
 * Time: 17:08
 */
class FontAwesomeParser
{
    public static function get_shortcodes()
    {
        return ['fa'];
    }

    /**
     * @param string $arguments array with the type
     * @param array $code string of the code to parse
     * @param ShortcodeParser $parser Parser root user.
     * @param string $shortcode
     * @param array $extra
     *
     * @return String of parsed code.
     */
    public static function handle_shortcode($arguments, $code, $parser, $shortcode, $extra = array())
    {
        // Only if we're on a Page, so the CMS doesn't crash.
        if($icon = $arguments["icon"]) {
            return "<i class='fa fa-$icon' aria-hidden='true'></i>";
        }
    }

}