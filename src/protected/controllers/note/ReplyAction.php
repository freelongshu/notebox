<?php
 
class ReplyAction extends AjaxAction{

	public function runAjax(){
		$noteId = $_POST['noteId'];
		$content = $_POST['content'];
		$id = $this->repo('comment')->create(array(
			'authorId'=>Yii::app()->user->id,
			'noteId'=>$noteId,
			'content'=>$content,
		));
		$commentNum = $this->repo('note')->addCommentNum($noteId);
		$user = $this->repo('user')->get(Yii::app()->user->id);
		$comment = array(
			'authorAvatar'=>$user['avatarUrl'],
			'authorName'=>$user['nickname'],
			'createTime'=>time(),
			'content'=>$content,
			'commentId'=>$commentId,
		);	
		$html = $this->controller->renderPartial('/comment/commentItem',array(
			'comment'=>$comment,
		),true);
		return array(
			'replyStatus'=>'success',
			'html'=>$html,
			'commentNum'=>$commentNum,
		);
	}
}