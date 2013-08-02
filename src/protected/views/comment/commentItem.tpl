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