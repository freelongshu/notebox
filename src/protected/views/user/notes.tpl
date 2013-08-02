{{extends file="application.views.layouts.main"}}
{{block name=leftCol}}
<div class='blockTitle'>我的笔记</div>
{{foreach from=$notes item=note}}
<div class='noteItem'>
	<div class='boxInfo'>
		来自我的笔记盒: 
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
        <div    class='operations'>
        	<div class='operationItem'>
        	   <a href="/note/update/{{$note['id']}}">编辑</a>
            </div>
            <div class='operationItem'>
        	   <a href="/note/delete/{{$note['id']}}" onclick="confirm('确定删除该条笔记吗?')">删除</a>
            </div>
            <div class='clear'></div>
        </div>
        {{if $note['isOriginal'] eq 0}}
        <div class='fromInfo'>
            转采自<a href="/user/view/{{$note['origiAuthorId']}}">{{$note['origiAuthorName']}}</a>的笔记: 
            <a href="/note/view/{{$note['origiNoteId']}}">{{$note['origiTitle']}}</a>
        </div>
        {{/if}}
        <div class='clear'></div>
    </div>
</div>
{{/foreach}}
<div class='clear'></div>
{{/block}}
