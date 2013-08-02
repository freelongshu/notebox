{{extends file="application.views.layouts.main"}}
{{block name=right_column}}
<div class='content_box'>
	<div>
			<div class='col'><p class='middle_title pt5'>已发布的活动&nbsp;&nbsp;&nbsp;</p></div>
			<div class='col'><a href='/activity/create'><div class='col short_button'>发布活动</div></a></div>
			<br/>
			<div class='divide_line'></div>
			<div class='activity_list_item'>
				<div class='title_col'><p class='gray_txt'>活动标题</p></div>
				<div class='time_col'><p class='gray_txt'>活动时间</p></div>
				<div class='credits_col'><p class='gray_txt'>花费积分</p></div>
				<div class='status_col'><p class='gray_txt'>状态</p></div>
				<div class='num_col'><p class='gray_txt'>已报名/上限</p></div>
				<div class='operation_col'><p class='gray_txt'>可操作</p></div>
				<div class='clear'></div>
			</div>
	</div>
	<div>

			{{foreach from=$recentActivities item=activity}}
			<div class='activity_list_item'>
                <div class='title_col'><a href="/activity/view/{{$activity['id']}}/invitorId/0">{{$activity['title']}}</a></div>
				<div class='time_col'>
				<p>起&nbsp;{{date('Y-m-d H:m',$activity['start_time'])}}</p>
				<p>止&nbsp;{{date('Y-m-d H:m',$activity['end_time'])}}</p>
				</div>
				<div class='credits_col'><p>{{$activity['credits_needed']}}</p></div>
				<div class='status_col'>
				<p>
					{{if time() lt $activity['start_time']}}
					即将开始
					{{else}}
						{{if time() lt $activity['end_time']}}
						正在进行
						{{else}}
						已结束
						{{/if}}
					{{/if}}
				</p></div>
				<div class='num_col'><p>{{$activity['joined_num']}}/{{$activity['max_join_num']}}</p></div>
				<div class='operation_col'>
					<p>
						<a href="/activity/update/{{$activity['id']}}">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="return confirm('你确认要删除该活动吗？')" href="/activity/delete/{{$activity['id']}}">删除</a><br>
                        <a href='javascript:void(0);' onclick="actApplyers({{$activity['id']}})">查看报名表</a>
					</p>
				</div>
				<div class='clear'></div>
			</div>
			<div class='dotted_line'></div>
			{{/foreach}}

	</div>
</div>
{{/block}}
 