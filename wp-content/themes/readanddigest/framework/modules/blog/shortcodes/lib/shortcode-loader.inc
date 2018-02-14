<?php

namespace ReadAndDigest\Modules\Blog\Shortcodes\Lib;

/* 
	Sliders
*/
use ReadAndDigest\Modules\Blog\Shortcodes\PostSliderClassic\PostSliderClassic;
use ReadAndDigest\Modules\Blog\Shortcodes\PostSliderWithThumbnails\PostSliderWithThumbnails;
use ReadAndDigest\Modules\Blog\Shortcodes\PostCarousel\PostCarousel;
use ReadAndDigest\Modules\Blog\Shortcodes\PostCarouselSwipe\PostCarouselSwipe;

/* 
	Layouts - shortcodes
*/
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutOne\PostLayoutOne;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutTwo\PostLayoutTwo;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutThree\PostLayoutThree;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutFour\PostLayoutFour;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutFive\PostLayoutFive;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutSix\PostLayoutSix;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutSeven\PostLayoutSeven;
use ReadAndDigest\Modules\Blog\Shortcodes\PostLayoutEight\PostLayoutEight;

/* 
	Blocks - combinations of several layouts
*/
use ReadAndDigest\Modules\Blog\Shortcodes\BlockOne\BlockOne;
use ReadAndDigest\Modules\Blog\Shortcodes\BlockTwo\BlockTwo;
use ReadAndDigest\Modules\Blog\Shortcodes\BlockThree\BlockThree;

/*
	Masonry
*/
use	ReadAndDigest\Modules\Blog\Shortcodes\BlogMasonry\BlogMasonry;

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
	 * Adds new shortcode. Object that it takes must implement ListShortcode
	 * @param ListShortcode $shortcode
	 */
	private function addShortcode(ListShortcode $shortcode) {
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
		$this->addShortcode(new PostSliderClassic());
		$this->addShortcode(new PostSliderWithThumbnails());
		$this->addShortcode(new PostCarousel());
		$this->addShortcode(new PostCarouselSwipe());
		$this->addShortcode(new PostLayoutOne());
        $this->addShortcode(new PostLayoutTwo());
        $this->addShortcode(new PostLayoutThree());
        $this->addShortcode(new PostLayoutFour());
        $this->addShortcode(new PostLayoutFive());
        $this->addShortcode(new PostLayoutSix());
        $this->addShortcode(new PostLayoutSeven());
        $this->addShortcode(new PostLayoutEight());
		$this->addShortcode(new BlockOne());
		$this->addShortcode(new BlockTwo());
		$this->addShortcode(new BlockThree());
		$this->addShortcode(new BlogMasonry());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'renderHolders'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();