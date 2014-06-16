<?php

require_once(EXTENSIONS . '/markdown_typography/text-formatters/formatter.markdown_typography_german.php');

Class formatterMarkdown_typography_germanguillemets extends formatterMarkdown_typography_german {

    protected $quoteDoubleOpening = '&#187;';
    protected $quoteDoubleClosing = '&#171;';
    protected $quoteSingleOpening = '&#8250;';
    protected $quoteSingleClosing = '&#8249;';

    public function about()
    {
        return array(
            'name' => __('Markdown Typography') . ' (' . __('German with guillemets') . ')',
            'version' => '1.0',
            'release-date' => '2011-05-03',
            'author' => array(
                'name' => 'Nils Hörrmann',
                'website' => 'http://nilshoerrmann.de',
                'email' => 'post@nilshoerrmann.de'
            ),
            'description' => 'Markdown Extra with Smartypants and German style typography.'
        );
    }

}
