<?php

/**
 * Action基类
 *
 * @author wudi
 */
abstract class Action extends CAction
{
    /**
     * 需要登录
     */
    protected function requireLogin($requireInit = true)
    {
        $user = Yii::app()->user;
        if ($user->isGuest) {
            throw new LoginRequiredError();
        }
        if ($requireInit && !$user->isInitialized) {
            throw new UserNotInitializedError(array(
                'user_id' => $user->id,
            ));
        }
    }

    private $_repos = array();

    /**
     * 访问Repository
     * 例如：使用`$this->repo('User')`来访问UserRepository
     */
    protected function repo($name)
    {
        if (!isset($this->_repos[$name])) {
            $classname = ucfirst($name).'Repository';
            $this->_repos[$name] = new $classname();
        }
        return $this->_repos[$name];
    }

}
