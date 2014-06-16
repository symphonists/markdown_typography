<?php

require_once(EXTENSIONS . '/markdown_typography/text-formatters/formatter.markdown_typography_german.php');

Class formatterSmartypants_typography_german extends formatterMarkdown_typography_german {

    public function about()
    {
        return array(
            'name' => __('Smartypants Typography') . ' (' . __('German') . ')',
            'version' => '1.0',
            'release-date' => '2011-06-23',
            'author' => array(
                'name' => 'Nils Hörrmann',
                'website' => 'http://nilshoerrmann.de',
                'email' => 'post@nilshoerrmann.de'
            ),
            'description' => 'Smartypants and German style typography.'
        );
    }

    public function run($string)
    {
        // Apply SmartyPants
        $string = SmartyPants($string, 1);

        // Refine typography
        $this->refineTypography($string);

        // Return result
        return $string;
    }

}
