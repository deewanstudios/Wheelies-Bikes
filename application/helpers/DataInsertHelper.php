<?php
/**
 * Data Inserter Helper class file
 *
 * Helper class to insert data into database for activities that requires it.
 * PHP version PHP 7.2.1.
 *
 * @category Helper_File
 * @package  Helper_File
 *
 * @author  Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license DeewanstudiosLTD deewanstudios.com
 *
 * @link http://url.com
 */

/**
 * DataInsertHelper class
 *
 * This class is to help insert data into the database by extending the master models 
 * connection and inbuilt properties
 *
 * @category Helper_Class
 * @package  Helper_Class
 * @author   Adedayo Adedapo <ade.adedapo9@gmail.com>
 * @license  DeewanstudiosLTD deewanstudios.com
 * @link     http://url.com
 */

class DataInsertHelper extends MasterModel
{
    protected $property;

    public function __construct($property)
    {
        $this->property = $property;
    }

}
