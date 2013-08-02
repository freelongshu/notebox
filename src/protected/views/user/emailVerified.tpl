{{extends file="application.views.layouts.main_without_top_nav"}}
{{block name=middle}}
<p>注册邮箱验证成功！</p>
<P><span id='timeLeft'>5</span>秒钟后转到<a href="/user/view/{{$user['id']}}">个人中心</a></p>
<script>
    $(document).ready(startTiming());
    function startTiming(){
        var i=5;
        var int=self.setInterval(function(){
            i--;
            $('#timeLeft').html(i);
            if(i==0){
                window.clearInterval(int);
                document.location = "/user/view/{{$user['id']}}";
            }           
        },1000);
    }
</script>
{{/block}}