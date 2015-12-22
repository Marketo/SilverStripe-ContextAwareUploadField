<?php

/**
 * 
 * @package default
 */
class ContextAwareUploadField extends UploadField
{
	private static $upload_paths = array();

	/**
	 * Description
	 * @return string
	 */
	public function getFolderName()
	{
		if(isset($this->folderName) && $this->folderName !== false) {
			return $this->folderName;
		}

		if(!isset($this->record)) {
			return Config::inst()->get('Upload', 'uploads_folder');
		}

		$path = $this->determineFolderName();
		return $path;
	}

	/**
	 * Description
	 * @return string
	 */
	protected function determineFolderName()
	{
		// Grab paths
		$paths = Config::inst()->get(__CLASS__, 'upload_paths');

		// Grab ancestry from top-down
		$className = get_class($this->record);
		$classes = array_reverse(ClassInfo::ancestry($className));

		$path = $className;

		// Loop over ancestry and break out if we have a match
		foreach($classes as $class) {
			if(array_key_exists($class, $paths)) {
				$path = $paths[$class];
				break;
			}
		}

		// If there are any parameters which require matching, search for them
		$matches = array();
		preg_match_all('/\$[a-zA-Z0-9]+?/U', $path, $matches);

		// Replace with field values
		foreach($matches[0] as $match) {
			$field = str_replace("$", "", $match);
			$value = FileNameFilter::create()->filter($this->record->getField($field));
			$path = str_replace($match, $value, $path);
		}

		$this->folderName = $path;
		return $path;
	}
}