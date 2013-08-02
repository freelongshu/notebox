<?php

/*
 * WebUser class
 * Can be accessed via Yii::app()->user
 *
 * @author wudi
 */
class WebUser extends CWebUser
{
    
    private $_passwordSalt = '';
    public function getPasswordSalt()
    {
        return $this->_passwordSalt;
    }

    public function setPasswordSalt($passwordSalt)
    {
        $this->_passwordSalt = $passwordSalt;
    }
}