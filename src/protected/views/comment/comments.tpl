<div id="note{{$noteId}}Comments" class='comments'>
	<img src="{{$static}}/img/arrow.png" class='arrow'/>
	<form method='post' class='commentForm'>
		<input type='hidden' name='CommentForm[noteId]' id='CommentForm_noteId' value='{{$noteId}}'/>
		<textarea name='CommentForm[content]' id='CommentForm_content'></textarea>
		<div class='button' id='replyButton' onclick="noteReply({{$noteId}})">回复</div>
		<div class='clear'></div>
	</form>
	{{foreach from=$comments item=comment}}
	<div class='comment'>
		<div class='author'>
			<img src="{{$comment['authorAvatar']}}" class='smallAvatar'/>
		</div>
		<div class='content'>
			{{$comment['authorName']}} 回复于 {{$this->tranTime($comment['createTime'])}}:
			<br>
			{{$comment['content']}}
		</div>
		<div class='reply'>
			<a href='javascript:void(0)'>回复</a>
		</div>
		<div class='clear'></div>
	</div>
	{{/foreach}}
</div>