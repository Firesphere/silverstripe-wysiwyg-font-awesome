<?php
use Firesphere\FontAwesome\FontAwesomeParser;
use SilverStripe\View\Parsers\ShortcodeParser;

ShortcodeParser::get()->register(
    'fa',
    [FontAwesomeParser::class, 'handle_shortcode']
);