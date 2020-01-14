<?php

     function createTree($data,$pid=0,$level=0){
        static $arr = [];
        foreach($data as $k=>$v){
            if( $v->pid == $pid ){
                $arr[] = $v;
                $v->level = $level;
				createTree($data,$v->t_id,$level+1);
            }
        }
        return $arr;
    }



     function Tree($data,$parent_id=0,$level=0){
        static $arr = [];
        foreach($data as $k=>$v){
            if( $v->parent_id == $parent_id ){
                $arr[] = $v;
                $v->level = $level;
				Tree($data,$v->cate_id,$level+1);
            }
        }
        return $arr;
    }

     function upload($filename)
    {
		if(request()->file($filename)->isValid()){
        $photo = request()->file($filename);
		$result = $photo -> store('uploads');
		return $result;
		}
		exit('文件上传失败');
    }

     function moreupload($filename)
    {
		if(is_array($filename)){
			return;
		}
		$imgs = request()->file($filename);
		$result= [];
		foreach($imgs as $v){      
		$result[] = $v -> store('uploads');
		}
		return $result; 
    }
    function getUserId(){
	   $user_info = session('res');
	   return $user_info['user_id'];
	}
