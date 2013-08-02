<?php
class Error extends CException
{
    public static $errors = array();

    public function __construct($params = array())
    {
        $message = get_class($this) . ': ';
        $msgarr = array();
        foreach ($params as $key => $value) {
            $msgarr[] = "{$key}={$value}";
        }
        $message .= implode(' ', $msgarr);

        parent::__construct($message);

        self::$errors[] = $this;
    }

}
?>