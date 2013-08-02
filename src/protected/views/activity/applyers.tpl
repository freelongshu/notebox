	<p class='middle_title'>{{$activityTitle}}&nbsp;&nbsp;活动报名详情表</p>
	<p><input type='button' class='print_button' value='打印活动报名表'/></p>
	<div class='applyer'>
		<p class='name'>用户昵称</p>
		<p class='tel'>手机</p>
		<p class='from'>来自</p>
		<p class='is_pub_weibo'>已分享该活动到微博</p>
		<p class='is_show_up'>确认到场</p>
		<div class='clear'></div>
	</div>
	{{foreach from=$applyers item=applyer}}
	<div class='applyer'>
		<p class='name'>
			<p><a href='#'>{{$applyer['nickname']}}</a></p>
			<p>{{date('Y-m-d H:i',$applyer['apply_time'])}}</p>
		</p>
		<p class='tel'>{{$applyer['tel']}}</p>
		<p class='from'>{{$applyer['invited_type']}}</p>
		<p class='is_pub_weibo'>{{if $applyer['is_pub_weibo'] eq 1}}是{{/if}}</p>
		<p class='is_show_up'><input type='button' class='is_show_up_button' value='确认到场'/></p>
		<div class='clear'></div>
	</div>
	<div class='dotted_line'></div>
	{{/foreach}}