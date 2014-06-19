<?php
//William Cruz
//6-18-14
//Classes and Objects II
//used in todoFilestore and addressDataStore

class Filestore {

    public $filename = '';

    function __construct($filename = '') 
    {
        // Sets $this->filename
        $this->filename = $filename;
    }

	 /**
     * Returns array of lines in $this->filename
     */
    function read_lines()
    {
    	$filesize = filesize($this->filename);
	    $handle = fopen($this->filename, "r");
	    $list_string = trim(fread($handle, $filesize));
	    $list_array = explode("\n", $list_string);
	    fclose($handle);
		return $list_array;	
    }

    /**
     * Writes each element in $array to a new line in $this->filename
     */
    function write_lines($array)
    {
    	$list_string = implode("\n", $list);
    	$handle = fopen($this->filename, 'w');
		fwrite($handle, $list_string);
		fclose($handle);
    }

    /**
     * Reads contents of csv $this->filename, returns an array
     */
    function read_csv()
    {
    	$book = [];

		$handle = fopen($this->filename, 'r');
		while(!feof($handle)) {
			$row = fgetcsv($handle);
			if (is_array($row)) {
		  		$book[] = $row;
			}
		}
		fclose($handle);
		return $book;
    }

    /**
     * Writes contents of $array to csv $this->filename
     */
    function write_csv($array)
    {
    	if (is_writable($this->filename)) {
			$handle = fopen($this->filename, 'w');
			foreach($array as $newData) {
				fputcsv($handle, $newData);
			}
		}
		fclose($handle);
	}

}
?>



