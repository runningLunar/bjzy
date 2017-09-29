<?php 

	namespace app\admin\model;
	use think\Model;

	/**
	* 
	*/
	class User extends Model
	{
		//获取学员信息	
		public function getUserMsg($id)
		{
			return db('student')
				->field('id,stu_name,stu_sch,stu_sex,stu_post,stu_address,stu_des,stu_pho')
				->where("id=$id")
				->find();
		}

		//获取作品列表
		public function getFileList($id){
			return db('profile')
				->field('id,cn_time,pro_name')
				->where("stu_id=$id")
				->select();
		}


		//修改学员信息
		public function changeMsg($id){

			db('student')->where('id',$id)
				->update([
					'stu_name'=>input('name'),
					'stu_sex'=>input('sex'),
					'stu_sch'=>input('school'),
					'stu_post'=>input('post'),
					'stu_address'=>input('address'),
					'stu_des'=>input('desc'),
					'stu_pho'=>input('picsrc')
				]);
		}


		//上传作品
		public function addPro($stu_id)
		{
			$new_pro['stu_id']=$stu_id;
			$new_pro['cn_time']=time();
			$new_pro['pro_name']=input('name');
			$new_pro['pro_image']=input('fileList');
			$new_pro['pro_des']=input('des');
			db('profile')->insert($new_pro);
		}

		public function getPro()
		{
			$id = input('id');
			return db('profile')->where('id',$id)
						->find();
		}

		public function changePro($id)
		{
			db('profile')->where('id',$id)
				->update([
					'pro_name'=>input('name'),
					'pro_des'=>input('des'),
					'pro_image'=>input('fileList'),
				]);
		}
	}

 ?>