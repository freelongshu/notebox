<?php

abstract class AjaxAction extends Action
{

    /**
     * 使用$errors来声明当前接口对外暴露的错误
     * 不在$errors中的错误被抛出时，会返回UnknownError
     */

    protected $errors = array();

    abstract public function runAjax();

    public function run()
    {
        try {
            $data = call_user_func_array(array($this, 'runAjax'), func_get_args());
            $result = array(
                'status' => 'success',
                'data' => $data,
            );
        }
        catch (Error $error) {
            $error_class = get_class($error);
            if (in_array($error_class, $this->errors)) {
                $status = $error_class;
            } else {
                $status = 'unknownError';
            }
            $result = array(
                'status' => $status,
                'data' => null,
            );
        }
        $this->controller->renderJSON($result);
    }
}
