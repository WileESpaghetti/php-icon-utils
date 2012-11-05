<?php
/**
 * Utillity functions to work with icon themes complying to the freedesktop.org
 * icon theme specification.
 *
 * http://standards.freedesktop.org/icon-theme-spec/icon-theme-spec-latest.html
 */

/*
 * NOTE: some of these may be OS dependant
 * NOTE: some browsers have trouble displaying SVG, PNG, and XPM images
 */

class IconTheme {
	private $basedirs; //array of directories to search for icon theme dirs
	private $ignoreCase;
	private $indexDotTheme; // contents of the index.theme file
	private $convert; // convert PNG, SVG, or XPM files to another type?
	private $convertTo; // extention to convert PNG, SVG, or XPM to
	private $ignoreSVG; // only allow icons to be of type PNG or XPM
	private const $SMALL;
	private const $MEDIUM;
	private const $LARGE;
	private const $SCALABLE;

	public function getIcon($icon);
	public function getIcon($size);
	public function getDotIconFile($icon); // return the path of the $icon.icon file
	public function dotIconContents($icon); // return the contents of the .icon file
	public function getSizes(); // return array of available sizes
	public function hasSize($height);
	public function hasIcon($icon);
	public function getInstalledThemes(); // return array of installed icon themes
}

/**
 * An icon theme description file (index.theme)
 */
class IconThemeDescription {
	// required keys
	private $name; // name of the theme as it would appear in a list
	private $comment;
	private $directories; // array of subdirectories and the required DirectoryEntry
	
	// optional keys
	private $inherits; // matches hierarchy of themes this inherits from, always contains hicolor
	private $hidden; // hide theme from showing up in lists
	private $example; // icon to be used as an example

	// getters
	public function getName() {
		return $this->name;
	}

	public function getComment() {
		return $this->comment;
	}

	public function getDirectories() {
		return $this->directories;
	}

	public function getInherits() {
		return $this->inherits;
	}

	public function getHidden() {
		return $this->hidden;
	}

	public function getExample() {
		return $this->example;
	}
}


/**
 * A directory entry in an index.theme file
 */
class DirectoryEntry {
	// required keys
	private $size; // nominal size

	// optional keys
	private $context; // groups (Actions, Devices, FileSystems, MimeTypes)
	private $type = "threshold"; //Fixed, Scalable or Threshold
	private $maxSize; // defaults to $size
	private $minSize; // defaults to $size
	private $threshold = 2; // allowed difference from desired size

	public function getSize() {
		return $this->size;
	}

	public function getContext() {
		return $this->context;
	}

	public function getType() {
		return $this->type;
	}

	public function getMaxSize() {
		return $this->maxSize;
	}

	public function getMinSize() {
		return $this->minSize;
	}

	public function getThreshold() {
		return $this->threshold;
	}
}

/**
 * Contents of an icon data file ($filename.icon)
 */
class IconData {
	// required keys
	
	// optional keys
	private $displayName; //string that can be used instead of icon name
	private $embeddedTextRectangle; // where an icon manager can overlay text
	private $attachPoints; //array of points used as anchor points for emblems/overlays

	public function getDisplayName() {
		return $this->displayName;
	}	

	public function getEmbeddedTextRectangle() {
		return $this->embeddedTextRectangle;
	}	

	public function getAttachPoints() {
		return $this->attachPoints;
	}	
}

class Icon {
	private $handle;
	private $filename;
}
?>
