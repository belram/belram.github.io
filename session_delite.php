<?php
require_once 'src/session.php';

if (!isAuthorized()) {
        redirect('index');
}else{
	if(isPost()){
		foreach($_POST as $key => $value){
			$del_res = unlink('tests/' . str_replace('_','.', $key));
				if($del_res){
					redirect('list');
				}

		}
	}
}
