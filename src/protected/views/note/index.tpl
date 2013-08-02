{{extends file="application.views.layouts.main"}}
{{block name=leftCol}}
{{foreach from=$recentNotes item=note}}
<div class='noteItem' id="noteItem{{$note['id']}}">
	<div class='boxInfo'>
		来自<a href="/user/view/{{$note['authorId']}}">{{$note['authorName']}}</a>的笔记盒: 
        <a href="/box/view/{{$note['boxId']}}">{{$note['boxName']}}</a>
	</div>
	{{if $note['title'] eq ''}}
	{{else}}
    <div class='title'>
		<h4>{{$note['title']}}</h4>       
    </div>
    {{/if}}
    <div class='content'>
    	<p><pre>{{$note['content']}}</pre></p>
    </div>
    <div>
        <div class='operations'>
            <div class='operationItem'>
                <a href='javascript:void(0)' class='commentLink' data-noteId="{{$note['id']}}" id="commentLink{{$note['id']}}">评论({{$note['commentNum']}})</a>
            </div>
            {{if $note['authorId'] eq Yii::app()->user->id}}
        	<div class='operationItem'>
        	   <a href="/note/update/{{$note['id']}}">编辑</a>
            </div>
            <div class='operationItem'>
        	   <a href="/note/delete/{{$note['id']}}" onclick="confirm('确定删除该条笔记吗?')">删除</a>
            </div>
            <div class='operationItem'>
                <a href="/note/collect/{{$note['id']}}" class='collectNote'>转采</a>
            </div>
            {{else}}           
            <div class='operationItem'>
                <a href="/note/feed/{{$note['id']}}">订阅</a>
            </div>           
            {{/if}}
            <div class='clear'></div>
        </div>
        {{if $note['isOriginal'] eq 0}}
        <div class='fromInfo'>
            转采自<a href="/user/view/{{$note['origiAuthorId']}}">{{$note['origiAuthorName']}}</a>的笔记: 
            <a href="/note/view/{{$note['origiNoteId']}}">{{$note['origiNoteTitle']}}</a>
        </div>
        {{/if}}
        <div class='clear'></div>
    </div>  
</div>
{{/foreach}}
<div class='clear'></div>
<script>
    $('.commentLink').on('click',function(){
        var noteId = $(this).attr('data-noteId');
        $.ajax({
            url:'/note/comments',
            type:'post',
            dataType:'json',
            data:{'noteId':noteId},
            success:function(result){
                if(result.status=='success'){
                    $('#noteItem'+noteId).append(result.data.html);
                    $('#noteItem'+noteId+' .commentForm textarea').focus();    
                }else{
                    $('#noteItem'+noteId).html("<div class='loadError'>评论加载出错了……</div>");
                }               
            },
        });
    })
    function noteReply(noteId){
        var content = $('#noteItem'+noteId+' .commentForm textarea').val();       
        if(content=='') return false;
        $(this).html('发布中...');
      
        $.ajax({
            url:'/note/reply/',
            type:'post',
            dataType:'json',
            data:{'noteId':noteId,'content':content},
            success:function(result){
                if(result.status=='success'&&result.data.replyStatus=='success'){
                    $(this).html('回复');
                    $('#commentLink'+noteId).html('评论('+result.data.commentNum+')');
                    $('#noteItem'+noteId+' #note'+noteId+'Comments').append(result.data.html);
                }else{
                    $(this).html('回复');
                }
            }
        });
        return false;        
    }
</script>
{{/block}}
