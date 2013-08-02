{{extends file="application.views.layouts.main"}}
{{block name=leftCol}}
<div class='myBoxes'>
    {{foreach from=$myBoxes item=myBox}}
    <div class='boxItem'>
        <div class='itemHead'>
            <div class='boxTime'>
                <p>
                    {{date('Y',$myBox['createTime'])}}<br>
                    {{date('n月',$myBox['createTime'])}}
                    <span class='daySpan'>{{date('j',$myoBx['createTime'])}}</span>日
                </p>
            </div>
            <div class='boxName'>{{$myBox['name']}}</div>
            <div class='clear'></div>
        </div>
        <div class='itemMiddle'>
            <div class='noteNum'>{{$myBox['noteNum']}}<br>笔记</div>
            <div class='notes'>
                <a href='/note/create'><div class='noteItem'>笔记＋1</div></a>
                {{foreach from=CJSON::decode($myBox['notes']) item=$note}}
                <div class='noteItem'>
                    {{$note['title']}}
                </div>
                {{/foreach}}
            </div>
            <div class='clear'></div>
        </div>
    </div>
    {{/foreach}}
    <div class='clear'></div>
</div>
{{/block}}
