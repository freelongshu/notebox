<?php

/**
 * 只实现了假的authenticate方法，真正的登录逻辑放在action中
 * 
 * @author wudi
 */
class UserIdentity extends CBaseUserIdentity
{
    private $_id;

    private $_name;

    private $_isInitialized;

    public function __construct($id, $name, $isInitialized)
    {
        $this->_id = intval($id);
        $this->_name = strval($name);
        $this->_isInitialized = $isInitialized;
        $this->setPersistentStates(array(
            'id' => $this->_id,
            'name' => $this->_name,
            'isInitialized' => $this->_isInitialized,
        ));
    }

	public function authenticate()
	{
		return true;
	}
}