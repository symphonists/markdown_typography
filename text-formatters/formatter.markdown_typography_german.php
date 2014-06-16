<?php

include_once(EXTENSIONS . '/markdown_typography/lib/parsedown/Parsedown.php');
include_once(EXTENSIONS . '/markdown_typography/lib/parsedown-extra/ParsedownExtra.php');
include_once(EXTENSIONS . '/markdown_typography/lib/smartypants/smartypants.php');

Class formatterMarkdown_typography_german extends TextFormatter {

    protected $quoteDoubleOpening = '&#8222;';
    protected $quoteDoubleClosing = '&#8220;';
    protected $quoteSingleOpening = '&#8218;';
    protected $quoteSingleClosing = '&#8216;';

    public function about()
    {
        return array(
            'name' => __('Markdown Typography') . ' (' . __('German') . ')',
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

    public function refineTypography(&$string)
    {
        // Set opening double quotes
        $string = str_replace(array(
            '“', '&#8220;'
        ), $this->quoteDoubleOpening, $string);

        // Set closing double quotes
        $string = str_replace(array(
            '”', '&#8221;'
        ), $this->quoteDoubleClosing, $string);

    /*-----------------------------------------------------------------------*/

        // Set opening single quotes
        $string = str_replace(array(
            '‘', '&#8216;'
        ), $this->quoteSingleOpening, $string);

        // Set closing single quotes
        $string = preg_replace('/(’|&#8217;)([^0-9A-Za-z])/Uu', $this->quoteSingleClosing . '$2', $string);

        // Restore most common apostrophes
        $omnissions = array(
            's',	// Ist ’s recht so?
            'n',	// Was für ’n Blödsinn!
            'ne',	// Was für ’ne tolle Idee!
            'nen'	// Hast du noch ’nen Euro?
        );
        foreach ($omnissions as $omnission) {
            $string = preg_replace('/' . $this->quoteSingleOpening . $omnission . '\b/Uu', '&#8217;' . $omnission, $string);
        }

        // Restore genetives, e. g. "Das ist Hans’ Buch"
        $string = preg_replace('/(s|x|z)' . $this->quoteSingleClosing . '/Uu', '$1&#8217;', $string);
        $string = preg_replace('/(' . $this->quoteSingleOpening . '.*[^\s])&#8217;([^0-9A-Za-z])/Uu', '$1' . $this->quoteSingleClosing . '$2', $string);

    /*-----------------------------------------------------------------------*/

        // Simple n-dashes
        $string = str_replace(' - ', '&#160;&#8211; ', $string);

        // Use non-breaking spaces before a dash
        $string = str_replace(array(
            ' &#8211; ', ' – '
        ), '&#160;&#8211; ', $string);
        $string = str_replace(array(
            ' &#8212; ', ' — '
        ), '&#160;&#8212; ', $string);
    }

    public function run($string)
    {
        // Apply Markdown Extra
        $Parsedown = new ParsedownExtra();
        $string = $Parsedown->text($string);

        // Apply SmartyPants
        $string = SmartyPants($string, 1);

        // Refine typography
        $this->refineTypography($string);

        // Return result
        return $string;
    }

}
