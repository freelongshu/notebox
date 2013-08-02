<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta charset="utf-8">
    	<meta name="copyright" content="notebox.sinaapp.com">
    	<title>{{$subtitle}}-笔记盒-notebox.sinaapp.com</title>
        <link rel='stylesheet' type='text/css' href="{{$static}}/css/bootstrap.min.css"/>
        <link rel='stylesheet' type='text/css' href="{{$static}}/css/styles.css"/> 
    	<script src="{{$static}}/js/jquery-1.9.0.js"></script>
        <script src="{{$static}}/js/baiduTemplate.js"></script>
  	</head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='span12'>
                    <div class='header'>
                        <a href='/site/index'>
                            <div class='logo'>
                                <img src="{{$static}}/img/logo.png" class='logoImg'/>
                                <p class='logoText'>笔记盒</p>
                                <div class='clear'></div>
                            </div>
                        </a>
                        <ul class='topUl'>
                            <a href='/user/login'><li>登录</li></a>
                            <a href='/user/signUp'><li>注册</li></a>
                            <div class='clear'></div>
                        </ul>
                        <div class='clear'></div>
                    </div>
                    <div class='middle'>
                        {{block name='middle'}}{{/block}}
                    </div>
                    <div class='footer'>
                    	<a href='#'>关于我们</a>
                        <a href="http://sae.sina.com.cn"><img src="http://static.sae.sina.com.cn/image/poweredby/117X12px.gif" alt="sae"></a> 
                        <a href='#'>联系我们</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
