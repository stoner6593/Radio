<?php
class MY_Form_validation extends CI_Form_validation
{
     function __construct($config = array())
     {
          parent::__construct($config);
     }
 
    /**
     * Error Array
     *
     * Returns the error messages as an array
     *
     * @return  array
     */
    function error_array()
    {
        if (count($this->_error_array) === 0)
        {
                return FALSE;
        }
        else
            return $this->_error_array;
 
    }
	
	public function is_words_only($str)
	{
		return (bool) preg_match( '/^[a-záéíóúäëïöüñâêîôû.\'\s\-]+$/i', $str);
	}
	
	public function words_only($str)
	{
		return preg_replace( '/[^a-záéíóúäëïöüñâêîôû\'\s\-]/i', '', $str);
	}
	
	
}