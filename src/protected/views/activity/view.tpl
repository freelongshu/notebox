{{extends file="application.views.user.main"}}
{{block name=left_column}}
<div class='content_box'>
	<div class='row activity_detail'>
		<div class='span6'>
			<div class='mt10'>
				<div class='col'><img width='91px' height='121px' src="{{$activity['post_url']}}"/></div>
				<div class='col ml10'>
					<p>{{$activity['title']}}</p>
					<br>
					<p>活动时间：{{date('n月j日',$activity['start_time'])}} 周{{$weekdays[date('w',$activity['start_time'])]}} {{date('H:i',$activity['start_time'])}} 至 {{date('n月j日',$activity['end_time'])}} 周{{$weekdays[date('w',$activity['end_time'])]}} {{date('H:i',$activity['end_time'])}}</p>
					<p>报名截止：{{date('n月j日',$activity['apply_end_time'])}} 周{{$weekdays[date('w',$activity['apply_end_time'])]}} {{date('H:i',$activity['apply_end_time'])}}</p>
					<p>活动地点：{{$activity['address']}}</p>
					<p><span class='joined_num'>{{$activity['joined_num']}}</span>人参加/{{$activity['max_join_num']}}人上限 | <span id='shared_num'>{{$activity['shared_num']}}</span>人分享</p>
				</div>
				<div class='clear'></div>
			</div>
			<div class='mt20'>
				<p id='share_weibo_content'>尼玛，这个活动不错，你们看看，反正我报名了，{{$organization['organization_name']}}将举办："{{$activity['title']}}"，时间：{{date('n月j日 H:i',$activity['start_time'])}}，地点：{{$activity['address']}}，报名地址：<a href="http://pipashu.sinaapp.com/activity/view/{{$activity['id']}}">http://pipashu.sinapp.com/activity/view/{{$activity['id']}}</a></p>
				<br>
				<p class='mt10'>活动详情</p>
				<p>{{$activity['desc']}}</p>
			</div>
		</div>
		<div class='span3'>
			<p>报名花费：<span class='orange_txt middle_title'>{{$activity['credits_needed']}}积分</span></p>
			<br>
			<p id='apply_status'><div id='apply_button' class='apply_button' onclick="createUserJoinedAct('{{$customer['isCustomer']}}','{{$activity['id']}}')">我要报名</div></p>
			<p id='apply_tips' class='red_txt'></p>
			<p>•报名并到场 奖励{{$activity['show_up_credits']}}积分</p>
			<br>
			<br>
        <p><div class='min_button col' onclick="shareActivity('{{$customer['isCustomer']}}','{{$activity['id']}}')">分享 </div> 到微博：(奖励{{$activity['pub_weibo_credits']}}积分)</p>
			<p>•邀请朋友报名成功 奖励 {{$activity['pub_weibo_credits']}}积分</p>
			<br>
			<p>活动成员(<span class='joined_num'>{{$activity['joined_num']}}</span>人参加)</p>
			{{if $joinedUsers eq null}}
			{{else}}
			<div id='joined_member_list'>
				{{foreach from=$joinedUsers item=user}}
				<img class='col mr20' src="{{$user['weibo_avatar_url']}}"/>
				{{/foreach}}
			</div>
			{{/if}}
		</div>
	</div>
</div>
<div id="pub_act_weibo_dialog{{$activity['id']}}" class='pub_weibo_dialog'>
	<div id='pub_weibo_dialog_content'>
	<div><h4 class='col'>分享到新浪微博：</h4><p class='float_right'><a href='#'>{{$customer['name']}}</a>&nbsp;|&nbsp;<a href="{{$code_url}}">换个账号</a></p></div>
        <textarea class='weibo_content_input' id='weibo_content_input'>{{$pubActWeiboContent}}</textarea>
        <div><img onclick="pubActWeibo({{$activity['pub_weibo_credits']}},{{$activity['id']}},{{$activity['organization_id']}})" id='pub_weibo_button' class='pub_weibo_button' title='分享到新浪微博' src="{{$static}}/img/pub_weibo_button.png"/></div>
	</div>
</div>
{{/block}}
