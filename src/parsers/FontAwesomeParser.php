<?php

namespace Firesphere\FontAwesome;

use SilverStripe\Core\Config\Config;
use SilverStripe\View\Parsers\ShortcodeHandler;
use SilverStripe\View\Parsers\ShortcodeParser;


/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10-May-17
 * Time: 17:08
 */
class FontAwesomeParser implements ShortcodeHandler
{
    public static function get_shortcodes()
    {
        return ['fa'];
    }

    /**
     * @param array $arguments array with the type
     * @param string $content
     * @param ShortcodeParser $parser
     * @param string $shortcode
     * @param array $extra
     * @return String of parsed code.
     */
    public static function handle_shortcode($arguments, $content, $parser, $shortcode, $extra = array())
    {
        $modifierList = [];
        $modifiers = Config::inst()->get(self::class, 'modifiers');
        $returnString = '';
        // Check for modifiers
        foreach($arguments as $key => $modifier) {
            if(array_key_exists($key, $modifiers)) {
                // some modifiers don't take arguments
                if($modifiers[$key]['arguments'] === true) {
                    $modifierList[] = sprintf('fa-' . $modifiers[$key]['code'], $arguments[$key]);
                } else {
                    $modifierList[] = 'fa-' . $modifiers[$key]['code'];
                }
                $returnString .= ' ' . $key . '=' . $modifier;
            }
        }
        $modifierList = implode(' ', $modifierList);
        if($icon = $arguments['icon']) {

            return "<i class='fa fa-$icon $modifierList' 
                    aria-hidden='true'
                    title='" . $arguments['icon'] ."'
                     aria-label='" . $arguments['icon'] . "'></i>";
        }

        return '[fa' . $returnString . ']';
    }

}