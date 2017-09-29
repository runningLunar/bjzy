<?php 
	
	namespace app\admin\controller;
	use think\Controller;

	class User extends Controller
	{
		public function index(){
			session_start();
			$_SESSION['stu_id'] = 1;
			$id = $_SESSION['stu_id'];
			$msg = model("User")->getUserMsg($id);
			$file_list = model("User")->getFileList($id);
			$this->assign("msg",$msg);
			$this->assign("file_list",$file_list);
	    	return $this->fetch('index');
		}

		//个人资料更改
		public function change(){
			session_start();
			$id = $_SESSION['stu_id'];
			model('User')->changeMsg($id);
			// $id = 1;
			// $msg = model("User")->getUserMsg($id);
			// $this->assign("msg",$msg);
			// return $this->fetch();
			// $this->success('修改成功', 'Index/index');
		}

		//图片上传保存处理
		public function upload()
		{

			$src = $_FILES['file']['tmp_name'];
			$path = 'static/admin/images/'.time().rand(10,99).'.jpg';
			copy($src,$path);
			$full_path = 'http://www.runninglunar.com/bjzy/public/'.$path;
			return $full_path;
		}
		// public function pictest(){
		// 	// $src = $_FILES['pic']['tmp_name'];
		// 	$src = input('src');
		// 	echo $src;
		// 	// echo $src;
		// 	$path = 'static/admin/images/'.time().rand(10,99).'.jpg';
		// 	copy($src,$path);
		// }

		public function delPro(){
			$id = input('id');
			db('profile')->where("id=$id")->delete();
			$this->success("删除成功","index");
		}

		public function addPro(){
			session_start();
			$id = $_SESSION['stu_id'];
			model('User')->addPro($id);
			// db('profile')->
		}


		//获取某个作品数据
		public function getPro()	
		{
			$pro = model('User')->getPro();
			// print_r($pro);
			$json_pro = json_encode($pro);
			return $json_pro;
		}


		//修改某个作品
		public function changePro()
		{
			$id = input('id');
			model('User')->changePro($id);
		}
		// public function picUpload(){
		// 	$imageUrl = input('image_url');
		// 	$savePath = '..//index/images/'.time().rand(10,99).'.jpg';
		// 	copy($imageUrl,$savePath);
		// }
	}

 ?>