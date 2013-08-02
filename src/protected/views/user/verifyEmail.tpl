{{extends file="application.views.layouts.main_without_top_nav"}}
{{block name=middle}}
<p>欢迎加入笔记盒！</p>
<P>我们已经向你的邮箱<a href="http://mailto:{{$unverifyEmail}}" target='_blank'>{{$unverifyEmail}}</a>发送了一封邮箱验证邮件，请立即前往<a href="http://mailto:{{$unverifyEmail}}" target='_blank'>{{$unverifyEmail}}</a>验证。</p>
<br>
<br>
<p>没有收到邮箱验证邮件？注意看一下是否在邮件垃圾箱里，或者<a href='javascript:void(0)' id='sendEmail' onclick="sendVerifyEmail()">再发一封</a></p>
<input type='hidden' id='unverifyEmail' value="{{$unverifyEmail}}"/>
<script>
    function sendVerifyEmail(){
        var email=$('#unverifyEmail').val();
        $('#sendEmail').replaceWith("<img id='loadingImg' src='{{$static}}/img/loading.gif'>");
        $.ajax({
            url:'/user/sendVerifyEmail',
            method:'post',
            dataType:'json',
            data:{'email':email},
            success:function(result){
                if(result.status=='success'&&result.data.sendStatus=='success'){
                    $('#loadingImg').replaceWith("<span id='haveSentTip' class='haveSentTip'>已发送(<span id='timeLeft'>60</span>秒后可重新发送)</span>");
                    startTiming();
                }else{
                	$('#sendError').html('出错啦，请稍后重试⋯⋯');	
                }
            }
        });	
    }
    function startTiming(){
        var i=60;
        var int=self.setInterval(function(){
        	i--;
            $('#timeLeft').html(i);
            if(i==0){
            	window.clearInterval(int);
                $('#haveSentTip').replaceWith("<a href='javascript:void(0)' id='sendEmail' onclick='sendVerifyEmail()'>再发一封</a>");
            }       	
        },1000);
    }
</script>
{{/block}}