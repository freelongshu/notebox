{{extends file="application.views.layouts.main"}}
{{block name=leftCol}}
    <div class='boxForm'>
        {{CHtml::beginForm()}}
        {{CHtml::errorSummary($form)}}
        <div>
            <p class='inputLabel'>盒子名：</p>
            <div class='input'><input name="BoxForm[name]" id="BoxForm_name" type="text" value="" class="boldInput"></div>
            <div class='inputError'>{{CHtml::error($form,'name')}}</div>
            <div class='clear'></div>
        </div>
        <div>
            <p class='inputLabel'>盒子描述：</p>
            <div class='contentInput'>{{CHtml::activeTextArea($form,'description')}}</div>
            <div class='inputError'>{{CHtml::error($form,'description')}}</div>
            <div class='clear'></div>
        </div>
        <div>
            <p class='inputLabel'>其他人可见：</p>
            <div class='input'><input type='checkbox' class='checkBox' value='1' name="BoxForm[isPublic]" id="BoxForm_isPublic" checked/></div>
            <div class='clear'></div>
        </div>
        <div>
            <input type='submit' id='boxButton' class='button' value='创建'/>
        </div>
        {{CHtml::endForm()}}
    </div>
{{/block}}
 