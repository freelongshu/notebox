{{extends file="application.views.layouts.main"}}
{{block name=leftCol}}
<div class='collectTip'>修改一下这条笔记放到你的笔记盒里去！</div>
<div class='noteForm'>
    <form method='post' id='NoteForm'>
    <div class='line'>
        <div class='inputLabel'>转采笔记到：</div>
        <div class='input'>
            <input name="NoteForm[boxName]" type='text' class='boxNameInput' id='boxNameInput' value="{{$form['boxName']}}"/>
            <input name="NoteForm[boxId]" id="NoteForm_boxId" type="hidden" class="error" value="{{$form['boxId']}}">
            <div class='boxIdSelect' id='changeBox'>换个盒子</div>
            <div class='clear'></div>
        </div>
        <div class='inputError'>{{CHtml::error($form,'boxId')}}</div>
        <div class='clear'></div>
    </div>
    <div class='line'>
        <div class='inputLabel'>标题：</div>
        <div class='input'>
            <input name="NoteForm[title]" id="NoteForm_title" type="text" value="{{$form->title}}">
        </div>
        <div class='inputError'>{{CHtml::error($form,'title')}}</div>
        <div class='clear'></div>
    </div>
    <div class='line'>
        <div class='inputLabel'>内容：</div>
        <div class='contentInput'>
            <textarea name="NoteForm[content]" id="NoteForm_content">{{$form->content}}</textarea>
        </div>
        <div class='inputError'>{{CHtml::error($form,'content')}}</div>
        <div class='clear'></div>
    </div>
    <div class='line'>
        <div class='isPublicLabel'>
            {{if $form->isPublic eq 1}}
            <input class='checkBox' id="NoteForm_isPublic" type="checkbox" value="1" name="NoteForm[isPublic]" checked>
            {{else}}
            <input class='checkBox' id="NoteForm_isPublic" type="checkbox" value='0' name="NoteForm[isPublic]">
            {{/if}}
            <span>其他人可见</span>
        </div>
        <input type='submit' class='button' value='采集'/>
        <div class='clear'></div>
    </div>
    </form>
</div>
<div class='boxIdHide top240'  id='boxIdHide'>
    <img class='triangleImg' src="{{$static}}/img/triangleImg.png"/>
	<div class='addBox' id='addBox'>盒子+1</div>  
    <div class='boxOption hide' id='addBoxLoading'><img class='loadingImg' src='{{$static}}/img/loading.gif'/></div>  
    <div class='smallBoxForm' id='smallBoxForm'>
        <form method='post' id='BoxForm'>
        	{{CHtml::activeTextField($boxForm,'name')}}
            <input type='submit' value='确定' class='createButton'/>
            <div class='clear'></div>
        </form>
    </div> 
    {{foreach from=$myBoxes item=myBox}}
    <div class='boxOption' id="myBox{{$myBox['id']}}" data-boxId='{{$myBox['id']}}' data-boxName="{{$myBox['name']}}">
    	{{$myBox['name']}}
    </div>
    {{/foreach}}
</div>
<script>
    function chooseBox(boxId){
        var boxName=$('#myBox'+boxId).attr('data-boxName');
        $('#NoteForm').val(boxId);
        $('#boxNameInput').val(boxName);
        $('#boxIdHide').hide();
    }
    $('#changeBox').hover(function(){
    	$('#boxIdHide').show();
        $('#addBox').show();
    });
    $('#addBox').on('click',function(){
    	$('#addBox').hide();
        $('#smallBoxForm').show();
        $('#smallBoxForm #BoxForm_name').focus();
    });
    $('.boxOption').on('click',function(){
        var boxId=$(this).attr('data-boxId');
        var boxName=$(this).attr('data-boxName');
        $('#NoteForm').val(boxId);
        $('#boxNameInput').val(boxName);
        $('#boxIdHide').hide();
    });
    $('#BoxForm').submit(function(){ 
        var boxName=$('#BoxForm_name').val();
        if(boxName=='') return false;
        $('#smallBoxForm').hide();
        $('#addBoxLoading').show();
        $.ajax({
            url:'/box/tempAdd',
            type:'post',
            dataType:'json',
            data:{'boxName':boxName},
            success:function(result){
                if(result.status=='success'&&result.data.addStatus=='success'){
                    $('#addBoxLoading').hide();                  
                    $('#boxIdHide').append(
                        "<div class='boxOption' id='myBox"+result.data.boxId+"' data-boxId='"+result.data.boxId+"' data-boxName='"+boxName+"' onclick=\"chooseBox("+result.data.boxId+")\">"+boxName+"</div>");
                }else{
                    $('#addBoxLoading').replaceWith("<div class='boxOption errorTxt'>出错了，请稍后重试</div>");
                }          	
            }
        });
        return false;
    });
</script>
{{/block}}
