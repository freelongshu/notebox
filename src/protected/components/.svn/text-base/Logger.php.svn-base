<?php

class Logger extends CLogger
{
    protected $context = array();

    public function setContext($name, $value)
    {
        $this->context[$name] = strval($value);
    }

    public function log($message, $level = 'info', $category = 'application')
    {
        $message = self::formatMessage($message, $this->context);
        parent::log($message, $level, $category);
    }

    public function info($category = 'application', $data = array(), $message = '')
    {
        $this->log(self::formatMessage($message, $data), self::LEVEL_INFO, $category);
    }

    public static function formatMessage($message, $data = array()) {
        if (!empty($data)) {
            $context = array();
            foreach ($data as $name => $value) {
                $context[] = "{$name}[{$value}]";
            }
            $context = implode(' ', $context);
        
            $message = $context . ' ' . $message;
        }
        return $message;
    }

}

