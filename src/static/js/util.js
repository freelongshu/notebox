/*ajax报名活动*/
function createUserJoinedAct(isCustomer,activityId){
	if(isCustomer==false){
		$('#shade_div').show();
		$('#require_login').show();
		return false;
	}
	$('#apply_tips').html('');
	$.ajax({
		url:'/userJoinedAct/create/'+activityId,
		dataType:'json',
		success:function(result){
			if(result.status=='Success'){
				if(result.data.applyStatus=='haveJoined'){
					$('#apply_button').replaceWith("<span class='red_txt'>已经报过名(不能重复报名)</span>");
				}else if(result.data.applyStatus=='Success'){
							$("#apply_button").replaceWith("<span class='gray_txt'>√已报名(花费"+result.data.activity.credits_needed+"积分)</span>");
							$('#credits_earned').html(result.data.credits_earned);
							$('#credits_received').html(result.data.credits_received);
							$('.joined_num').html(result.data.joinedNum);
							$('#my_avatar').clone().appendTo('#joined_member_list');
						}else if(result.data.applyStatus=='currentCreditsNotEnough'){
							$('#apply_tips').html("当前积分不够，<a href='#' onclick=\"shareActivity('"+activityId+"')\">分享该活动可以获得积分</a> 或者 <a href='/user/task/"+result.data.activity.organization_id+"'>去任务中心赚积分</a>");
						}
			}else{
				alert("抱歉，活动报名失败，请稍后重试！");
			}
		}		
	});
}
/*ajax报名特权兑换*/
function createUserJoinedPrivi(isCustomer,privilegeId,customerEmail){
	if(isCustomer==false){
        $('#shade_div').show();
		$('#require_login').show();
		return false;
	}
	$('#apply_tips').html('');
	$.ajax({
		url:'/userJoinedPrivi/create/'+privilegeId,
		dataType:'json',
		success:function(result){
			if(result.status==='Success'){
				if(result.data.applyStatus=='haveJoined'){
					$('#apply_button').replaceWith("<span class='red_txt'>已经兑换过(兑换内容："+result.data.privilege.content+")</span>");
				}else if(result.data.applyStatus=='Success'){
							$("#apply_button").replaceWith("<span class='gray_txt'>√已兑换(花费"+result.data.privilege.credits_needed+"积分)</span>");
							$('#apply_privilege_result').html("<h4 class='center'>兑换成功，兑换内容已发送到你的邮箱<a href='"+customerEmail+"'>"+customerEmail+"</a>,请注意查收。</span></h4>").show();
							$('#credits_earned').html(result.data.credits_earned);
							$('#credits_received').html(result.data.credits_received);
							$('.joined_num').html(result.data.joinedNum);
							$('#my_avatar').clone().appendTo('#joined_member_list');
						}else if(result.data.applyStatus=='currentCreditsNotEnough'){
							$('#apply_tips').html("当前积分不够，<a href='#' onclick=\"sharePrivilege('"+privilegeId+"')\">分享该特权兑换可以获得积分</a> 或者 <a href='/user/task/"+result.data.privilege.organization_id+"'>去任务中心赚积分</a>");
						}
			}else{
				alert("抱歉，兑换失败，请稍后重试！");
			}
		}		
	});
}

/*发微博推广活动*/
function shareActivity(isCustomer,activityId){
    if(isCustomer==false){
        $('#shade_div').show();
		$('#require_login').show();
		return false;
	}
	$('#shade_div').show();
	$('#pub_act_weibo_dialog'+activityId).show();	
}
/*发微博推广特权兑换*/
function sharePrivilege(isCustomer,privilegeId){
    if(isCustomer==false){
        $('#shade_div').show();
		$('#require_login').show();
		return false;
	}
	$('#shade_div').show();
	$('#pub_privi_weibo_dialog'+privilegeId).show();
}
/*发微博推广文案*/
function sharePromotion(promotionId){
	$('#shade_div').show();
	$('#pub_promo_weibo_dialog'+promotionId).show();
}
/*调用新浪微博api发布活动推广微博*/
function pubActWeibo(pubWeiboCredits,activityId,organizationId){
	var content=$("#pub_act_weibo_dialog"+activityId+" textarea").html();
	$.ajax({
		url:"/user/pubActWeibo",
		type:'POST',
		data:{content:content,pubWeiboCredits:pubWeiboCredits,activityId:activityId,organizationId:organizationId},
		dataType:'json',
		success:function(result){
			if(result.status=='Success'){
                if(result.data.pubWeiboStatus=='HaveShared'){
				
                    $('#pub_weibo_result #content').html("<h4 class='center red_txt'>你已经分享过该活动了。</h4>");
                	$('#pub_weibo_result').show();
            	}else{
                   	if(result.data.pubWeiboStatus=='Success'){
                        $('#pub_weibo_result #content').html("<h4 class='center'>成功分享至新浪微博，获得<span class='orange_txt'>"+pubWeiboCredits+"积分！</span></h4>");
                        $('#pub_weibo_result').show();
                        $('#credits_earned').html(parseInt($('#credits_earned').html())+pubWeiboCredits);
                        $('#shared_num').html(parseInt($('#shared_num').html())+1);
                    }else{
                        $('#pub_weibo_result #content').html("<h4 class='center red_txt'>"+result.data.error+"</h4>");
                        $('#pub_weibo_result').show();
                    }
            
            	}
			}else{
				$('#pub_weibo_result #content').html("<h4 class='center red_txt'>出错了，请稍后重试。</h4>");
                $('#pub_weibo_result').show();
			}
		}
	});
}

/*调用新浪微博api发布特权兑换推广微博*/
function pubPriviWeibo(pubWeiboCredits,privilegeId,organizationId){
	var content=$("#pub_privi_weibo_dialog"+privilegeId+" textarea").html();
	$.ajax({
		url:"/user/pubPriviWeibo",
		type:'POST',
		data:{content:content,pubWeiboCredits:pubWeiboCredits,privilegeId:privilegeId,organizationId:organizationId},
		dataType:'json',
		success:function(result){
			if(result.status=='Success'){
                if(result.data.pubWeiboStatus=='HaveShared'){
				
                    $('#pub_weibo_result #content').html("<h4 class='center red_txt'>你已经分享过该活特权兑换了。</h4>");
                	$('#pub_weibo_result').show();
            	}else{
                    if(result.data.pubWeiboStatus=='Success'){
                        $('#pub_weibo_result #content').html("<h4 class='center'>成功分享至新浪微博，获得<span class='orange_txt'>"+pubWeiboCredits+"积分！</span></h4>");
                        $('#pub_weibo_result').show();
                        $('#credits_earned').html(parseInt($('#credits_earned').html())+pubWeiboCredits);
                        $('#shared_num').html(parseInt($('#shared_num').html())+1);
                    }else{
                        $('#pub_weibo_result #content').html("<h4 class='center red_txt'>"+result.data.error+"</h4>");
                        $('#pub_weibo_result').show();
                    }
                }
			}else{
				$('#pub_weibo_result #content').html("<h4 class='center red_txt'>出错了，请稍后重试。</h4>");
                $('#pub_weibo_result').show();
			}
		}
	});
}

/*调用新浪微博api发布推广文案微博*/
function pubPromoWeibo(pubWeiboCredits,promotionId,organizationId){
	var content=$("#pub_promo_weibo_dialog"+promotionId+" textarea").html();
	$.ajax({
		url:"/user/pubPromoWeibo",
		type:'POST',
		data:{content:content,pubWeiboCredits:pubWeiboCredits,promotionId:promotionId,organizationId:organizationId},
		dataType:'json',
		success:function(result){
			if(result.status=='Success'){
            	if(result.data.pubWeiboStatus=='HaveShared'){
				
                    $('#pub_weibo_result #content').html("<h4 class='center red_txt'>你已经分享过该推广文案了。</h4>");
                	$('#pub_weibo_result').show();
            	}else{
                    if(result.data.pubWeiboStatus=='Success'){
                        $('#pub_weibo_result #content').html("<h4 class='center'>成功分享至新浪微博，获得<span class='orange_txt'>"+pubWeiboCredits+"积分！</span></h4>");
                        $('#pub_weibo_result').show();
                        $('#credits_earned').html(parseInt($('#credits_earned').html())+pubWeiboCredits);
                        $('#shared_num').html(parseInt($('#shared_num').html())+1);
                    }else{
                        $('#pub_weibo_result #content').html("<h4 class='center red_txt'>"+result.data.error+"</h4>");
                        $('#pub_weibo_result').show();
                    }
               }
			}else{
				$('#pub_weibo_result #content').html("<h4 class='center red_txt'>出错了，请稍后重试。</h4>");
                $('#pub_weibo_result').show();
			}
		}
	});
}

/*调用新浪微博api分享邀请语微博*/
function pubInviteWeibo(organizationId){
    var content=$('#invitation_content').html();
    $.ajax({
        url:'/user/pubInviteWeibo',
        type:'POST',
        data:{content:content,organizationId:organizationId},
        dataType:'json',
        success:function(result){
            if(result.status=='Success'){
                if(result.data.pubWeiboStatus=='Success'){
                	$('#invite_share_button').hide();
                    $('#invite_share_success').show();
                }else{
                    $('#shade_div').show();
                	$('#pub_weibo_result #content').html("<h4 class='center red_txt'>"+result.data.error+"</h4>");
                    $('#pub_weibo_result').show();
                }
            }else{
            	$('#pub_weibo_result #content').html("<h4 class='center red_txt'>出错了，请稍后重试。</h4>");
                $('#pub_weibo_result').show();
            }
        }
    });
}

/*再发一遍邮箱验证邮件*/
function sendVerifyingEmail(organizationId,to){
	$.ajax({
		url:'/organization/sendVerifyingEmail',
		type:'POST',
		data:{organizationId:organizationId},
		dataType:'json',
		success:function(result){
			if(result.status=='Success'){
				if(result.data.sendStatus=='Success'){
                    $('#send_email_result #content').html("<p class='center'>邮件已发送至您的邮箱<a  target='_blank' href='http://mailto:"+to+"'>"+to+"</a>,请注意查收。</p>");
                    $('#send_email_result').show();
					$('#shade_div').show();
				}
			}else{
				$('#send_email_result #content').html("<p class='center'>出错了，请稍后重试。</p>");
                $('#send_email_result').show();
				$('#shade_div').show();
			}
		}
	});
}

/*给用户充赠送积分*/
function sendCredits(memberId){
	var credits=$('#send_credits_dialog #send_credits_input').val();
	$.ajax({
		url:'/organization/sendCredits',
		type:'POST',
		data:{memberId:memberId,credits:credits},
		dataType:'json',
		success:function(result){
			if(result.status=='Success'){
				if(result.data.sendCreditsStatus=='Success'){
					$('#send_credits_result #content').html("<p class='center'>发放赠送积分成功!</p>");
                    $('#send_credits_result').show();
					$('#credits_received'+memberId).html(result.data.creditsReceived);
				}else{
					$('#send_credits_result').html("<p class='center'>出错了，请稍后重试。</p>").show();
				}
			}else{
				$('#send_credits_result').html("<p class='center'>出错了，请稍后重试。</p>").show();
			}
		}
	});	
}
/*给用户充赠送积分*/
function sendCreditsDialog(memberId){
	$('#send_credits_dialog #send_credits_button').attr({'onclick':"sendCredits("+memberId+")"});
	$('#shade_div').show();
	$('#send_credits_dialog').show();
}

/*查看活动报名表*/
function actApplyers(activityId){
    $.ajax({
        url:'/activity/applyers',
        type:'POST',
        data:{activityId:activityId},
        dataType:'json',
        success:function(result){
        	if(result.status=='Success'){
                if(result.data.applyers!=''){
                    $('#shade_div').show();
                    var data={activityTitle:result.data.activityTitle,list:result.data.applyers};
                    var html=baidu.template('test', data);
                	$('#actApplyersBox #content').html(html);
                    $('#actApplyersBox').show();
                }else{
                	$('#shade_div').show();
                    var data={activityTitle:result.data.activityTitle,list:result.data.applyers};
                    var html=baidu.template('test', data);
                	$('#actApplyersBox #content').html(html);
                    $('#actApplyersBox').show();
                }
            }else{
            
            }
    	}
    });
	
}

/*查看特权兑换表*/
function priviApplyers(privilegeId){
    $.ajax({
        url:'/privilege/applyers',
        type:'POST',
        data:{privilegeId:privilegeId},
        dataType:'json',
        success:function(result){
        	if(result.status=='Success'){
                if(result.data.applyers!=''){
                	 $('#shade_div').show();
                    var data={privilegeTitle:result.data.privilegeTitle,list:result.data.applyers};
                    var html=baidu.template('priviApplyersList', data);
                	$('#priviApplyersBox #content').html(html);
                    $('#priviApplyersBox').show();
                }else{
                	 $('#shade_div').show();
                    var data={privilegeTitle:result.data.privilegeTitle,list:result.data.applyers};
                    var html=baidu.template('priviApplyersList', data);
                	$('#priviApplyersBox #content').html(html);
                    $('#priviApplyersBox').show();
                }
            }else{
            
            }
    	}
    });
	
}

/*查看推广文案推广者表*/
function promoSharers(promotionId){
    $.ajax({
        url:'/promotion/sharers',
        type:'POST',
        data:{promotionId:promotionId},
        dataType:'json',
        success:function(result){
        	if(result.status=='Success'){
                if(result.data.sharers!=''){
                	$('#shade_div').show();
                    var html=baidu.template('promoSharersList', {list:result.data.sharers});
                	$('#promoSharersBox #content').html(html);
                    $('#promoSharersBox').show();
                }else{
                	$('#shade_div').show();
                    var html=baidu.template('promoSharersList', {list:result.data.sharers});
                	$('#promoSharersBox #content').html(html);
                    $('#promoSharersBox').show();
                }
            }else{
            
            }
        }    
    });
}

/*防止重复发送手机验证码*/
function sendDisable(){
    $('#send_verify_code_button').hide();
    $('#have_sent').show();
    var i=120;
    var int=self.setInterval(function(){
        i--;
    	$('#left_second').html(i);
   		if(i==0){
            window.clearInterval(int); 	
            $('#have_sent').hide();
            $('#send_verify_code_button').show();
        }
    },1000);
	
}

/*发送手机验证码*/
function sendVerifyCode(){
    var tel=$('#UserForm_tel').val();
    $.ajax({
        url:'/user/sendVerifyCode',
        type:'POST',
        data:{tel:tel},
        dataType:'json',
        success:function(result){
            if(result.status=='Success'){
                sendDisable();
            }else{
                $('#have_sent').show();
            	$('#send_verify_code_result').html("<p class='center'>出错了，请稍后重试。</p>").show();
            }
        }

    });
}

/*检查活动结束时间必须晚于开始时间*/
function checkEndTime(){
	var startTimeStr=$('#start_time_input').val().replace(/-/g,'/');
	var endTimeStr=$('#end_time_input').val().replace(/-/g,'/');
	var startTime=new Date(startTimeStr);
	var endTime=new Date(endTimeStr);
	if(startTime.getTime()>endTime.getTime()){
		return false;
	}else{
		return true;
	}
}

/*检查培训机构邮箱是否已经注册*/
function checkHaveSignUp(){
    $('#email_error').html('');
	var email=$('#OrganizationForm_email').val();
    $.ajax({
        url:'/organization/checkHaveSignUp',
        type:'POST',
        dataType:'json',
        data:{'email':email},
        success:function(result){
            if(result.data.haveSignUp==1){
            	$('#email_error').html('该邮箱已被注册');
            }else{
                $('#email_error').html("<p style='color:#27804f'>该邮箱可以注册</p>");
            }
        }
    });
}

		function setNavName(organizationId){
        	var navName=$('#set_nav_name_input').val();
            $.ajax({
                url:'/organization/setNavName',
                method:'post',
                dataType:'json',
                data:{'navName':navName,'organizationId':organizationId},
                success:function(result){
                    if(result.status=='Success'){                 		
                        $('#set_nav_name_result #content').html("<p class='center'>设置成功!</p>");
                        $('#set_nav_name_result').show();
                        $('#shade_div').show();                  
                    }else{
                        $('#shade_div').show();
                    	$('#set_nav_name_result').html("<p class='center'>出错了，请稍后重试!</p>").show();
                    }
                }
            });
        	return false;
        }
        
        function copy(){
        	var e=document.getElementById("code");//对象是content 
       	 	e.select(); //选择对象 
        	js=e.createTextRange(); 
			js.execCommand("Copy") 
            $('#copy_result').html('已成功复制到剪贴板!').show();
            $('#shade_div').show();
        }

