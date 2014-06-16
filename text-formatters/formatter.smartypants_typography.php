<?php

require_once(EXTENSIONS . '/markdown_typography/text-formatters/formatter.markdown_typography.php');

Class formatterSmartypants_typography extends formatterMarkdown_typography {

    public function about()
    {
        return array(
            'name' => __('Smartypants Typography') . ' (' . __('English') . ')',
            'version' => '1.0',
            'release-date' => '2011-12-22',
            'author' => array(
                'name' => 'Nils Hörrmann',
                'website' => 'http://nilshoerrmann.de',
                'email' => 'post@nilshoerrmann.de'
            ),
            'description' => 'Smartypants'
        );
    }

    public function run($string)
    {
        // Apply SmartyPants
        $string = SmartyPants($string, 1);

        // Return result
        return $string;
    }

}
