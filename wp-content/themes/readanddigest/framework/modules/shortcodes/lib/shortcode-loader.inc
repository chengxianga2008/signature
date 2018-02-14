<?php

namespace ReadAndDigest\Modules\Shortcodes\Lib;

use ReadAndDigest\Modules\Shortcodes\Button\Button;
use ReadAndDigest\Modules\CustomFont\CustomFont;
use ReadAndDigest\Modules\Dropcaps\Dropcaps;
use ReadAndDigest\Modules\Highlight\Highlight;
use ReadAndDigest\Modules\Shortcodes\Icon\Icon;
use ReadAndDigest\Modules\OrderedList\OrderedList;
use ReadAndDigest\Modules\SectionTitle\SectionTitle;
use ReadAndDigest\Modules\Separator\Separator;
use ReadAndDigest\Modules\SocialShare\SocialShare;
use ReadAndDigest\Modules\Tabs\Tabs;
use ReadAndDigest\Modules\Tab\Tab;
use ReadAndDigest\Modules\GoogleMap\GoogleMap;
use ReadAndDigest\Modules\Shortcodes\ImageWithHoverInfo\ImageWithHoverInfo;
use ReadAndDigest\Modules\Shortcodes\ImageWithHoverInfoItem\ImageWithHoverInfoItem;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new Button());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new Icon());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new SectionTitle());
		$this->addShortcode(new Separator());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new ImageWithHoverInfo());
		$this->addShortcode(new ImageWithHoverInfoItem());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();