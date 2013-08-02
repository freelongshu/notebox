{{extends file="application.views.site.main"}}
{{block name=middle}}
	<div class="help row mt30">
		<p class="font20 helpCenter">产品概览</p>
		<div class="row top">
				<div class="left_col">
					<div class="navigator">
						<div class="nav_rtf1">
                            <p>功能说明</p>
                            <p class='ml20'>•注册和登录</p>
                            <p class='ml20'>•活动</p>
                            <p class='ml20'>•特权兑换</p>
                            <p class='ml20'>•推广文案</p>
                            <p class='ml20'>•会员管理</p>
                            <p class='ml20'>•嵌入代码</p>
                            <p class='ml20'>•数据统计</p>
                            <p class='ml20'>•基本信息设置</p>
						</div>
						<div class="nav_rtf2">
                            <p>规则说明</p>
                            <p class='ml20'>•赚积分</p>
                            <p class='ml20'>•花积分</p>
						</div>
					</div>
					<div class="online">
							<p class="line font16 colo1 mt20">在线帮助</p>
							<p class="special">QQ:</p>
                            <p>782570386(商务)</p>
                            <p>782570386(技术)</p>
                            <p>782570386（支持)</p>
							<p class="special">QQ群:</p>
                            <p>782570386(商务)</p>
                            <p>782570386(技术)</p>
                            <p>782570386（支持)</p>							
					</div>
				</div>
				<div class="right_col">
                    <h4>功能说明</h4>
                    <div class='function_detail'>
                        <p>1.注册和登录</p>
                        <p class='ml40'>培训机构用户注册，需要填写培训机构全名、网址、申请人姓名、手机、Email、部门/职位、培训机构所在城市。<br/>
                        待枇杷树审核通过后，机构用户可以正常登录、使用了。</p>
                        <p>2.活动</p>
                        <p class='ml40'>机构用户可以发布线上、先下活动。<br/>
                        发布活动需要上传活动海报(图片)、填写活动标题、活动时间、报名截止时间、活动地点、活动详情、花费积分、人数上限。设定分享此活动，奖励给推广者的积分；设定如果推广者成功邀请朋友来报名此活动，奖励给推广者的积分；设定如果推广者成功邀请朋友来实际到场参加活动，奖励给推广者的积分(需要在此活动的报名表里确认到场人员)。<br/>
                        机构用户可以在“管理中心”-“活动管理”中，查看所有活动、修改活动信息、查看分享效果、查看活动报名人，并可以打印现场签到表。</p>
                        <p>3.特权兑换</p>
                        <p class='ml40'>特权是指培训机构已有的、稀缺的、独家的资源(视频讲座、资料、优惠券等)。<br/>
                        学员、普通用户利用口碑传播的奖励积分，来兑换这些稀有资源。<br/>
                        发布特权兑换需要上传特权兑换海报、填写特权兑换标题、过期时间、兑换内容(视频讲座的网址或者观看密码、资料下载地址或者解压缩密码、优惠券串码等)、特权兑换详情、花费积分。设定分享此特权兑换，奖励给推广者的积分；设定如果推广者成功邀请朋友来实际兑换，奖励给推广者的积分。<br/>
                        机构用户可以在“管理中心”-“特权兑换管理”中，查看所有特权兑换、修改特权兑换信息、查看分享效果、查看兑换人。<br/>
						</p>
                        <p>4.推广文案</p>
                        <p class='ml40'>推广文案可以理解为单独的、易于传播的品牌广告/微博段子。(与活动、特权兑换是并列关系，而不是它们的推广文案)<br/>
                        发布推广文案需要自己撰写文案(也可以上传1张附带图片)，设定分享此推广文案，奖励给推广者的积分。<br/>
                        机构用户可以在“管理中心”-“推广文案管理”中，查看所有推广文案、修改推广文案信息、查看分享效果。<br/>
                        </p>
                        <p>5.会员管理</p>
                        <p class='ml40'>机构用户可以查看到所有注册会员的详细信息：注册时间、联系方式、剩余积分、由谁邀请来注册、TA邀请的朋友、参加的活动、兑换的特权、分享的推广文案。<br/>
                        机构用户还可以给会员充积分。<br/>
                        另外，可以自定义首个导航的名称。
						</p>
                        <p>6.数据统计</p>
                        <p class='ml40'>可以查看全站的数据总览：会员数、分享数、积分发放、消耗；以及每个会员每个行为的记录数据。</p>
                        <p>7.基本信息设置</p>
                        <p class='ml40'>可以修改注册时填写的培训机构全名、网址、申请人姓名、手机、Email、部门/职位、培训机构所在城市信息。<br/>
						并设定推广者邀请朋友来注册，奖励的积分。
                        </p>
                    </div>
                    <br/>
                    <h4>规则说明</h4>
                    <div class='rules_detail'>
                        <h5>赚积分</h5>
                        <div>
                            <p class='title'>•成功邀请朋友注册</p>
                            <p class='detail'>每邀请1个用户注册，奖励1次积分。</p>
                            <div class='clear'></div>
                        </div>
                       	<div>
                            <p class='title'>•分享活动</p>
                            <p class='detail'>每分享1个活动，奖励1次积分，同1个活动只奖励1次。</p>
                            <div class='clear'></div>
                        </div>                        
                        <div>
                            <p class='title'>•分享特权兑换</p>
                            <p class='detail'>每分享1个特权兑换，奖励1次积分，同1个特权兑换只奖励1次。</p>
                            <div class='clear'></div>
                        </div>
                        <div>
                            <p class='title'>•成功邀请朋友报名活动</p>
                            <p class='detail'>每邀请1个用户报名，奖励1次积分。</p>
                            <div class='clear'></div>
                        </div>
                        <div>
                            <p class='title'>•邀请的朋友到场参加活动</p>
                            <p class='detail'>每邀请1个用户到场，奖励1次积分。需要在报名表里确认。</p>
                            <div class='clear'></div>
                        </div>
                        <br/>
                        <p>另外，机构用户也可以在“管理中心”-“会员管理”，给指定的会员充积分。<p>
                        <h5>花积分</h5>
                        <div>
                            <p class='title'>•报名活动<p>
                            <p class='detail'>每报名1个活动，消耗1次积分。</p>
                            <div class='clear'></div>
                        </div>
                        <div>
                            <p class='title'>•兑换特权</p>
                            <p class='deil'>每兑换1个特权，消耗1次积分。<p>
                            <div class='clear'></div>
                        </div>                                                            
                    </div>                    
				</div>
		</div>
	</div>
{{/block}}