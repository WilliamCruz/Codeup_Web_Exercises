<?
//Williamj Cruz
//6-19-14
//Classes and Objects II; exercise including Filestore class


require_once('classes/fileStore.php');



// $addressBook = [];
// $errors = [];

class AddressDataStore extends Filestore {



	public function readAddressBook()
	{
	   $book = $this->read();
	   return($book);
	}
	
	public function writeAddressBook($addressBook) 
	{
		$this->write($addressBook);
	}
}
?>