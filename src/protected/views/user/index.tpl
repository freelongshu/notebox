{{extends file="application.views.layouts.main"}}
{{block name=leftCol}}
{{foreach($notes as $note}}
<div class='noteItem'>
    <div class='noteAuthor'>
        
    </div>
    <div class='noteContent'>
        <h3 class='noteTitle'></div>
    	<p>{{$note['content']}}</p>
    </div>
    <div class='clear'></div>
</div>
{{endeach}}
<div class='clear'></div>
{{/block}}
