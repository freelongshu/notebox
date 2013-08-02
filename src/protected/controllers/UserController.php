<?php

class UserController extends Controller
{
    private $_dir='application.controllers.user';

    public function actions()
    {
		/*注意controllers不能少掉s*/
        return array(
			'index'=>$this->_dir.'.IndexAction',
			'login'=>$this->_dir.'.LoginAction',
            'boxes'=>$this->_dir.'.BoxesAction',
            'notes'=>$this->_dir.'.NotesAction',
			'logout'=>$this->_dir.'.LogoutAction',
            'signUp'=>$this->_dir.'.SignUpAction',
            'update'=>$this->_dir.'.UpdateAction',
            'verifyEmail'=>$this->_dir.'.VerifyEmailAction',
            'sendVerifyEmail'=>$this->_dir.'.SendVerifyEmailAction',
        );
    }
}
