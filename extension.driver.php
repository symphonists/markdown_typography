<?php

	Class extension_markdown_typography extends Extension {
	
		/**
		 * @see http://symphony-cms.com/learn/api/2.2/toolkit/extension/#about
		 */
		public function about() {
			return array(
				'name' => 'Text Formatter: Markdown Typography',
				'version' => '1.1,1',
				'release-date' => '2011-12-22',
				'author' => array(
					'name' => 'Nils Hörrmann',
					'website' => 'http://nilshoerrmann.de',
					'email' => 'post@nilshoerrmann.de'
				),
				'description' => 'Markdown with Smartypants and some refinements for German typography.'
			);
		}

	}

