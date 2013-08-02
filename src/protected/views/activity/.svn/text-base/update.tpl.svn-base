{{extends file="application.views.layouts.main"}}
{{block name=right_column}}
<div class='content_box'>
	<div class='row'>
		<div class='span8'>
			<p class='middle_title'>发布活动</p>
		</div>
	</div>
	<div class='row'>
		<div class='span6'>
			<div class='activity_form' id='activity_form'>
				{{CHtml::beginForm()}}
					<div class='line'>
						<input id="ActivityForm_organization_id" type="hidden" name="ActivityForm[organization_id] value='{{$form->organization_id}}'">
					</div>
					<div class='line'>
						<label class='col'>活动海报：</label>
						<img id='upload_post' class='col' width='91px' height='121px' src='{{$form->post_url}}'/>
						<div class='col upload_tips'>
							<p>从电脑中选择有吸引力的图片作为活动海报图片</p>
							<p>你可以上传JPG、JPEG、GIF、PNG或BMP文件。文件小于5M</p>
							<div class='upload_button' onclick="document.getElementById('ActivityForm_post_url').click()">选择图片</div>                            
						</div> 
						<input id="ytActivityForm_post_url" type="hidden" name="ActivityForm[post_url]" value="">
                        <input onchange='ajaxFileUpload()' id="ActivityForm_post_url" type="file" name="ActivityForm[post_url]">
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col'>活动标题：</label>{{CHtml::activeTextField($form,'title')}}
						<div class='input_error'>{{CHtml::error($form,'title')}}</div>
						<div class='clear'></div>
					</div>
					<hr/>
					<div class='line'>
						<label class='col'>开始时间：</label>
                        <input type='text' id='start_time_input' class='start_time' value="{{$startDate}}"/>
						{{CHtml::activeHiddenField($form,'start_time')}}
						<select id="start_time_hour" class="hour">
							<option value="00" label="00">00</option>
							<option value="01" label="01">01</option>
							<option value="02" label="02">02</option>
							<option value="03" label="03">03</option>
							<option value="04" label="04">04</option>
							<option value="05" label="05">05</option>
							<option value="06" label="06">06</option>
							<option value="07" label="07">07</option>
							<option value="08" label="08">08</option>
							<option value="09" label="09">09</option>
							<option value="10" label="10">10</option>
							<option value="11" label="11">11</option>
							<option value="12" label="12">12</option>
							<option value="13" label="13">13</option>
							<option value="14" label="14">14</option>
							<option value="15" label="15">15</option>
							<option value="16" label="16">16</option>
							<option value="17" label="17">17</option>
							<option value="18" label="18">18</option>
							<option selected="selected" value="19" label="19">19</option>
							<option value="20" label="20">20</option>
							<option value="21" label="21">21</option>
							<option value="22" label="22">22</option>
							<option value="23" label="23">23</option>
						</select>
						<span class="col hour_min">:</span>
						<select id="start_time_minute" class="minute">
						<option selected="selected" value="00" label="00">00</option><option value="01" label="01">01</option><option value="02" label="02">02</option><option value="03" label="03">03</option><option value="04" label="04">04</option><option value="05" label="05">05</option><option value="06" label="06">06</option><option value="07" label="07">07</option><option value="08" label="08">08</option><option value="09" label="09">09</option><option value="10" label="10">10</option><option value="11" label="11">11</option><option value="12" label="12">12</option><option value="13" label="13">13</option><option value="14" label="14">14</option><option value="15" label="15">15</option><option value="16" label="16">16</option><option value="17" label="17">17</option><option value="18" label="18">18</option><option value="19" label="19">19</option><option value="20" label="20">20</option><option value="21" label="21">21</option><option value="22" label="22">22</option><option value="23" label="23">23</option><option value="24" label="24">24</option><option value="25" label="25">25</option><option value="26" label="26">26</option><option value="27" label="27">27</option><option value="28" label="28">28</option><option value="29" label="29">29</option><option value="30" label="30">30</option><option value="31" label="31">31</option><option value="32" label="32">32</option><option value="33" label="33">33</option><option value="34" label="34">34</option><option value="35" label="35">35</option><option value="36" label="36">36</option><option value="37" label="37">37</option><option value="38" label="38">38</option><option value="39" label="39">39</option><option value="40" label="40">40</option><option value="41" label="41">41</option><option value="42" label="42">42</option><option value="43" label="43">43</option><option value="44" label="44">44</option><option value="45" label="45">45</option><option value="46" label="46">46</option><option value="47" label="47">47</option><option value="48" label="48">48</option><option value="49" label="49">49</option><option value="50" label="50">50</option><option value="51" label="51">51</option><option value="52" label="52">52</option><option value="53" label="53">53</option><option value="54" label="54">54</option><option value="55" label="55">55</option><option value="56" label="56">56</option><option value="57" label="57">57</option><option value="58" label="58">58</option><option value="59" label="59">59</option>
						</select>
						<div class='input_error' id='start_time_error'></div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col'>结束时间：</label>
                        <input id='end_time_input' type='text' class='end_time' value="{{$endDate}}"/>
						{{CHtml::activeHiddenField($form,'end_time')}}
						<select id="end_time_hour" class="hour">
							<option value="00" label="00">00</option>
							<option value="01" label="01">01</option>
							<option value="02" label="02">02</option>
							<option value="03" label="03">03</option>
							<option value="04" label="04">04</option>
							<option value="05" label="05">05</option>
							<option value="06" label="06">06</option>
							<option value="07" label="07">07</option>
							<option value="08" label="08">08</option>
							<option value="09" label="09">09</option>
							<option value="10" label="10">10</option>
							<option value="11" label="11">11</option>
							<option value="12" label="12">12</option>
							<option value="13" label="13">13</option>
							<option value="14" label="14">14</option>
							<option value="15" label="15">15</option>
							<option value="16" label="16">16</option>
							<option value="17" label="17">17</option>
							<option value="18" label="18">18</option>
							<option selected="selected" value="19" label="19">19</option>
							<option value="20" label="20">20</option>
							<option value="21" label="21">21</option>
							<option value="22" label="22">22</option>
							<option value="23" label="23">23</option>
						</select>
						<span class="col hour_min">:</span>
						<select id="end_time_minute" class="minute">
						<option selected="selected" value="00" label="00">00</option><option value="01" label="01">01</option><option value="02" label="02">02</option><option value="03" label="03">03</option><option value="04" label="04">04</option><option value="05" label="05">05</option><option value="06" label="06">06</option><option value="07" label="07">07</option><option value="08" label="08">08</option><option value="09" label="09">09</option><option value="10" label="10">10</option><option value="11" label="11">11</option><option value="12" label="12">12</option><option value="13" label="13">13</option><option value="14" label="14">14</option><option value="15" label="15">15</option><option value="16" label="16">16</option><option value="17" label="17">17</option><option value="18" label="18">18</option><option value="19" label="19">19</option><option value="20" label="20">20</option><option value="21" label="21">21</option><option value="22" label="22">22</option><option value="23" label="23">23</option><option value="24" label="24">24</option><option value="25" label="25">25</option><option value="26" label="26">26</option><option value="27" label="27">27</option><option value="28" label="28">28</option><option value="29" label="29">29</option><option value="30" label="30">30</option><option value="31" label="31">31</option><option value="32" label="32">32</option><option value="33" label="33">33</option><option value="34" label="34">34</option><option value="35" label="35">35</option><option value="36" label="36">36</option><option value="37" label="37">37</option><option value="38" label="38">38</option><option value="39" label="39">39</option><option value="40" label="40">40</option><option value="41" label="41">41</option><option value="42" label="42">42</option><option value="43" label="43">43</option><option value="44" label="44">44</option><option value="45" label="45">45</option><option value="46" label="46">46</option><option value="47" label="47">47</option><option value="48" label="48">48</option><option value="49" label="49">49</option><option value="50" label="50">50</option><option value="51" label="51">51</option><option value="52" label="52">52</option><option value="53" label="53">53</option><option value="54" label="54">54</option><option value="55" label="55">55</option><option value="56" label="56">56</option><option value="57" label="57">57</option><option value="58" label="58">58</option><option value="59" label="59">59</option>
						</select>
						<div class='input_error' id='end_time_error'></div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col'>报名截止：</label>
                        <input type='text' id='apply_end_time_input' class='apply_end_time' value="{{$applyEndDate}}"/>
						{{CHtml::activeHiddenField($form,'apply_end_time')}}
						<select id="apply_end_time_hour" class="hour">
							<option value="00" label="00">00</option>
							<option value="01" label="01">01</option>
							<option value="02" label="02">02</option>
							<option value="03" label="03">03</option>
							<option value="04" label="04">04</option>
							<option value="05" label="05">05</option>
							<option value="06" label="06">06</option>
							<option value="07" label="07">07</option>
							<option value="08" label="08">08</option>
							<option value="09" label="09">09</option>
							<option value="10" label="10">10</option>
							<option value="11" label="11">11</option>
							<option value="12" label="12">12</option>
							<option value="13" label="13">13</option>
							<option value="14" label="14">14</option>
							<option value="15" label="15">15</option>
							<option value="16" label="16">16</option>
							<option value="17" label="17">17</option>
							<option value="18" label="18">18</option>
							<option selected="selected" value="19" label="19">19</option>
							<option value="20" label="20">20</option>
							<option value="21" label="21">21</option>
							<option value="22" label="22">22</option>
							<option value="23" label="23">23</option>
						</select>
						<span class="col hour_min">:</span>
						<select id="apply_end_time_minute" class="minute">
						<option selected="selected" value="00" label="00">00</option><option value="01" label="01">01</option><option value="02" label="02">02</option><option value="03" label="03">03</option><option value="04" label="04">04</option><option value="05" label="05">05</option><option value="06" label="06">06</option><option value="07" label="07">07</option><option value="08" label="08">08</option><option value="09" label="09">09</option><option value="10" label="10">10</option><option value="11" label="11">11</option><option value="12" label="12">12</option><option value="13" label="13">13</option><option value="14" label="14">14</option><option value="15" label="15">15</option><option value="16" label="16">16</option><option value="17" label="17">17</option><option value="18" label="18">18</option><option value="19" label="19">19</option><option value="20" label="20">20</option><option value="21" label="21">21</option><option value="22" label="22">22</option><option value="23" label="23">23</option><option value="24" label="24">24</option><option value="25" label="25">25</option><option value="26" label="26">26</option><option value="27" label="27">27</option><option value="28" label="28">28</option><option value="29" label="29">29</option><option value="30" label="30">30</option><option value="31" label="31">31</option><option value="32" label="32">32</option><option value="33" label="33">33</option><option value="34" label="34">34</option><option value="35" label="35">35</option><option value="36" label="36">36</option><option value="37" label="37">37</option><option value="38" label="38">38</option><option value="39" label="39">39</option><option value="40" label="40">40</option><option value="41" label="41">41</option><option value="42" label="42">42</option><option value="43" label="43">43</option><option value="44" label="44">44</option><option value="45" label="45">45</option><option value="46" label="46">46</option><option value="47" label="47">47</option><option value="48" label="48">48</option><option value="49" label="49">49</option><option value="50" label="50">50</option><option value="51" label="51">51</option><option value="52" label="52">52</option><option value="53" label="53">53</option><option value="54" label="54">54</option><option value="55" label="55">55</option><option value="56" label="56">56</option><option value="57" label="57">57</option><option value="58" label="58">58</option><option value="59" label="59">59</option>
						</select>
						<div class='input_error' id='apply_end_time_error'></div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col'>活动详情：</label>{{CHtml::activeTextArea($form,'desc')}}
						<div class='input_error'>{{CHtml::error($form,'desc')}}</div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col'>活动地点：</label>
						<select id="s_province" name="s_province" class="address_select">
							<option selected="true">省份</option>
						</select>&nbsp;&nbsp;
						<select id="s_city" name="s_city" class="address_select"></select>&nbsp;&nbsp;
						<select id="s_county" name="s_county" class="address_select"></select>
						<input id='address_input' class="address" type="text" placeholder='活动详细地址'>
						{{CHtml::activeHiddenField($form,'address')}}
						<div class="clear"></div>
					</div>
					<hr/>
					<div class='line'>
						<label class='col'>花费积分：</label>
						<input id="ActivityForm_credits_needed" class='short_input' type="text" name="ActivityForm[credits_needed]" value="{{$form->credits_needed}}">
						<div class='input_error'>{{CHtml::error($form,'credits_needed')}}</div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col'>人数上限：</label>
						<input id="ActivityForm_max_join_num" class='short_input' type="text" name="ActivityForm[max_join_num]" value="{{$form->max_join_num}}">
						<div class='input_error'>{{CHtml::error($form,'max_join_num')}}</div>
						<div class='clear'></div>
					</div>
					<hr/>
					<div class='line'>
						<label class='col'>分享奖励：</label>
						<input id="ActivityForm_pub_weibo_credits" class='short_input' type="text" name="ActivityForm[pub_weibo_credits]" value="{{$form->pub_weibo_credits}}">
						<p class='col input_tips'>给发微博推广该活动者的奖励积分，只奖励一次。</p>
						<div class='input_error'>{{CHtml::error($form,'pub_weibo_credits')}}</div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col'>报名奖励：</label>
						<input id="ActivityForm_invite_credits" class='short_input' type="text" name="ActivityForm[invite_credits]" value="{{$form->invite_credits}}">
						<p class='col input_tips'>推广者邀请人来报名，给推广者奖励，每邀请1人奖励1次。</p>
						<div class='input_error'>{{CHtml::error($form,'invite_credits')}}</div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col'>到场奖励：</label>
						<input id="ActivityForm_show_up_credits" class='short_input' type="text" name="ActivityForm[show_up_credits]" value="{{$form->show_up_credits}}">
						<p class='col input_tips'>报名参加者到场奖励，需在报名表里确认，只奖励1次。</p>
						<div class='input_error'>{{CHtml::error($form,'show_up_credits')}}</div>
						<div class='clear'></div>
					</div>
					<hr/>
					<div class='line'>
						<input type="submit" value="保存" name="yt0" class='pub_button col'>&nbsp;&nbsp;&nbsp;&nbsp;<p class='col ml20'><a href=''>取消</a>(将返回已发布活动的列表)<p>
					</div>
				{{CHtml::endForm()}}
			</div>
		</div>
		<div class='span3'>
			<p>注意事项1</p>
			<ul>
				<li>说明1</li>
				<li>说明2</li>
				<li>说明3</li>
			</ul>
			<p>描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述</p>
			<br/>
			<p>注意事项2</p>
			<ul>
				<li>说明1</li>
				<li>说明2</li>
				<li>说明3</li>
			</ul>
			<p>描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述</p>
			<br/>
			<p>更重要的是邀请好友都来参与！</p>
		</div>
	</div>
</div>
 <script>
	/*日期选择控件调用*/
	var start_time_picker = new Pikaday({
		field: document.getElementById('start_time_input'),
		firstDay: 1,
		minDate: new Date('2000-01-01'),
		maxDate: new Date('2020-12-31'),
		yearRange: [2000,2020]
	});
	var end_time_picker = new Pikaday({
		field: document.getElementById('end_time_input'),
		firstDay: 1,
		minDate: new Date('2000-01-01'),
		maxDate: new Date('2020-12-31'),
		yearRange: [2000,2020]
	});
	var apply_end_time_picker = new Pikaday({
		field: document.getElementById('apply_end_time_input'),
		firstDay: 1,
		minDate: new Date('2000-01-01'),
		maxDate: new Date('2020-12-31'),
		yearRange: [2000,2020]
	});

	/*地区三级联动调用*/
	_init_area();
	

	/*ajax文件上传函数*/
	function ajaxFileUpload(){
        $('#upload_post').attr({'src':'{{$static}}/img/loading.gif'});
		$.ajaxFileUpload({
			url:'/activity/ajaxFileUpload',
			secureuri:false,
			fileElementId:'ActivityForm_post_url',
			dataType: 'json',
			success: function (result, status){
                if(result.data.post_url!=''){
                    $('#upload_post').attr({'src':result.data.post_url});
                    $('#ytActivityForm_post_url').val(result.data.post_url);
                }else{
                    $('#upload_post').attr({'src':'{{$static}}/img/upload_post.png'});
                	alert('上传出错了，请稍后重试');
                }
            },
            error: function (data, status, e){                   
                    alert(e);
                	$('#upload_post').attr({'src':'{{$static}}/img/upload_post.png'});
            }
		});
		return false;
	}  

	/*ActivityForm上传前，相关日期赋值*/
	$('#activity_form form').submit(function(){
		if($('#start_time_input').val()==''){
			$('#start_time_error').html('活动开始时间不能为空');
			return false;
		}else{
			$('#start_time_error').html('');
			if($('#end_time_input').val()==''){
				$('#end_time_error').html('活动结束时间不能为空');
				return false;
			}else{
				$('#end_time_error').html('');
				if($('#apply_end_time_input').val()==''){
					$('#apply_end_time_error').html('活动报名截止时间不能为空');
					return false;
				}else{
					$('#apply_end_time_error').html('');
				}
			}
		}
		$('#ActivityForm_start_time').val($('#start_time_input').val()+' '+$('#start_time_hour').val()+':'+$('#start_time_minute').val()+':00');
		$('#ActivityForm_end_time').val($('#end_time_input').val()+' '+$('#end_time_hour').val()+':'+$('#end_time_minute').val()+':00');
		$('#ActivityForm_apply_end_time').val($('#apply_end_time_input').val()+' '+$('#apply_end_time_hour').val()+':'+$('#apply_end_time_minute').val()+':00');
		$('#ActivityForm_address').val($('#s_province option:selected').html()+$('#s_city option:selected').html()+$('#s_county option:selected').html()+$('#address_input').val());
		
	});
  </script>
{{/block}}
 