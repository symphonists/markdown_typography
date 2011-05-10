<?php
	
	include_once(EXTENSIONS . '/markdown_typography/lib/markdown-extra/markdown.php');
	include_once(EXTENSIONS . '/markdown_typography/lib/smartypants/smartypants.php');

	Class formatterMarkdown_typography extends TextFormatter {
	
		public function about() {
			return array(
				'name' => __('Markdown Typography') . ' (' . __('English') . ')',
				'version' => '1.0',
				'release-date' => '2011-05-03',
				'author' => array(
					'name' => 'Nils Hörrmann',
					'website' => 'http://nilshoerrmann.de',
					'email' => 'post@nilshoerrmann.de'
				),
				'description' => 'Markdown Extra with Smartypants'
			);
		}
				
		public function run($string) {
		
			// Apply Markdown Extra
			$string = Markdown($string);
			
			// Apply SmartyPants
			$string = SmartyPants($string, 1);
			
			// Return result
			return $string;
		}
		
	}
