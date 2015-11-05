<?php  
/* 
 * Developed by The-Di-Lab 
 * www.the-di-lab.com 
 * www.startutorial.com 
 * contact at thedilab@gmail.com 
 * FileMode v2.0 support multiple fields 
 */ 
App::import('Core', array('Folder')); 
class FileModelBehavior extends ModelBehavior { 
    /** 
     * Model-specific settings 
     * @var array 
     */ 
    public $settings = array();     
    /** 
     * Setup 
     * @param unknown_type $model 
     * @param unknown_type $settings 
     */ 
    public function setup(&$Model, $settings) { 
        //Folder for setting up permission 
        if (!isset($this->Folder)) { 
            $this->Folder = new Folder(); 
        }         
        //default settings 
        if (!isset($this->settings[$Model->alias])) { 
            $this->settings[$Model->alias] = array( 
                'file_db_file'=>array('filename'), 
                'file_field'=>array('file'), 
                'dir' => array('uploads'), 
                'upload' => array(),
                'overwrite'=>1, 
            ); 
        }         
        $this->settings[$Model->alias] = array_merge( 
            $this->settings[$Model->alias], (array)$settings 
        );         
        $this->uploads=array(); 
        $this->overwrite=$this->settings[$Model->alias]['overwrite'];
    }     
    function holdSettings($Model) {
        $this->dir=$Model->actsAs['FileModel']['dir'];
        $this->file_db_file=$Model->actsAs['FileModel']['file_db_file'];
        $this->file_field=$Model->actsAs['FileModel']['file_field'];
    }

    //call back 
    public function beforeSave(&$Model,$created){		
                $this->holdSettings($Model);
		foreach($this->file_db_file as $k => $v) {
			if(!empty($Model->data[$Model->alias][$this->file_db_file[$k]]['size'])) {				
				$this->uploads[] = $k;
				$this->upload_details[$k] = $Model->data[$Model->alias][$this->file_db_file[$k]];
				$Model->data[$Model->alias][$this->file_db_file[$k]] = $Model->data[$Model->alias][$this->file_db_file[$k]]['name'];
			} else if(!empty($Model->data[$Model->alias][$this->file_db_file[$k] . '_del'])) {
                                $Model->data[$Model->alias][$this->file_db_file[$k]] = null;
                                $this->_delete($Model->data[$Model->alias][$this->file_db_file[$k]. '_del'],$Model->data[$Model->alias][$Model->primaryKey],$k); 
			} else {
				unset($Model->data[$Model->alias][$this->file_db_file[$k]]);
			}				
		}
		return $Model;
	}
    public function afterSave(&$Model,$created){ 
        $this->holdSettings($Model);
		if(is_array($this->uploads) && count($this->uploads) > 0){ 
			foreach($this->upload_details as $k => $v) {
				if(!empty($this->upload_details[$k])) {
					$Model->data[$Model->alias][$this->file_db_file[$k]] = $this->upload_details[$k];				
				}			
			}
		}
        //callback only if there is a file attached 
        if(is_array($this->uploads) && count($this->uploads) > 0){                 
                //save 
                if($created){ 
                    $id=$Model->getLastInsertId();     
                //update 
                }else{                     
                    //overwrite 
                    if($this->overwrite){         
//                        $oldFile=$Model->find('first',array('contain'=>false, 
//                                                            'conditions'=>array($Model->primaryKey=>$Model->data[$Model->alias][$Model->primaryKey])));                                 
                        //delete all of the old files 
                        for($i=0;$i<sizeof($this->uploads);$i++){ 
//                            $this->_delete($oldFile[$Model->alias][$this->file_db_file[$this->uploads[$i]]],$oldFile[$Model->alias][$Model->primaryKey],$this->uploads[$i]); 
                              $this->_removeDir($Model->data[$Model->alias][$Model->primaryKey],$this->uploads[$i]);
                        }                         
                         
                    }                 
                    $id=$Model->data[$Model->alias][$Model->primaryKey]; 
                }         
                 
                //upload files         
                $uploadOk=true;                 
                for($i=0;$i<count($this->uploads);$i++){ 					
                    $thisUploadOk = $this->_upload($Model->data[$Model->alias][$this->file_field[$this->uploads[$i]]],$id,$this->uploads[$i]); 
                    $uploadOk=$uploadOk*$thisUploadOk; 
                    //get file name first 
                    $filename = $Model->data[$Model->alias][$this->file_field[$this->uploads[$i]]]['name'];     
                    //assign file name to updateModel 
                    $updateM[$Model->alias][$Model->primaryKey]=$id; 
                    $updateM[$Model->alias][$this->file_db_file[$this->uploads[$i]]]=$filename; 
                } 
                 
                if($uploadOk){ 
                        return $this->_customizedSave($Model,$updateM); 
                }else{ 
                        echo 'Upload failed,please try again.'; 
                        return false; 
                } 
                 
        }else{ 
                return true; 
        } 
    }     
    //call back 
    public function beforeDelete(&$Model){ 
        $this->holdSettings($Model);
        $data = $Model->read(null,$Model->id); 
        if (!empty($data[$Model->alias]['id'])) { 
                for($i=0;$i<sizeof($this->file_db_file);$i++){ 
                    $this->_delete($data[$Model->alias][$this->file_db_file[$i]],$data[$Model->alias][$Model->primaryKey],$i); 
                } 
                 
        } 
        return true; 
    } 
    //check if there is any uploads 
    private function _hasUploads($Model){ 
        //clear first 
        unset($this->uploads); 
        $this->uploads=array(); 
        for($i=0;$i<sizeof($this->file_field);$i++){ 
            //print_r($Model->data[$Model->alias]); 
            if(isset($Model->data[$Model->alias][$this->file_field[$i]]['size'])&& 
                    $Model->data[$Model->alias][$this->file_field[$i]]['size']!=0){ 
                        array_push($this->uploads,$i); 
            } 
        } 
        if(sizeof($this->uploads)==0){ 
            return false; 
        } 
        return true; 
    } 
    private function _noUploads($Model){ 
        for($i=0;$i<sizeof($this->file_field);$i++){ 
            $Model->data[$Model->alias][$this->file_field[$i]]['size']=0; 
        } 
    } 
    private function _delete($filename,$id,$dirIndex){ 
        $path=WWW_ROOT.$this->dir[$dirIndex].DS.$id.DS.$filename; 
        if (null!=$filename&&file_exists($path)) { 
            clearstatcache(); 
            return unlink($path); 
        }else{ 
            return false; 
        } 
    }     
    private function _customizedSave(&$Model,$modelDate){         
        //this will prevent it from calling the callback     
        $this->_noUploads($Model);
        return true;        
        //bug fixed
        //return $Model->save($modelDate, array('callbacks' => false)); 
    }     
    private function _upload($file,$id,$dirIndex){         
        if($this->_validate($file)){         			
            $des=$this->_createDir($id,$dirIndex).DS.$file['name']; 
            if (move_uploaded_file($file['tmp_name'], $des)) {  
                return true; 
            }else if (copy($file['tmp_name'],$des)) {  
                return true; 
            }else{ 
                return false; 
            } 
        }else{ 
                return false; 
        } 
         
    }   
    public static function delTree($dir) { 
        $files = array_diff(scandir($dir), array('.','..')); 
         foreach ($files as $file) { 
           (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
         } 
         return rmdir($dir); 
       }
    private function _removeDir($id,$dirIndex){ 
        $fullUploadDir = WWW_ROOT.$this->dir[$dirIndex].DS.$id.DS;
//        rmdir($fullUploadDir);
        if (is_dir($fullUploadDir)) { 
            FileModelBehavior::delTree($fullUploadDir);
        }
        $this->_createDir($id,$dirIndex);
    }
    private function _createDir($id,$dirIndex){ 
        $fullUploadDir = WWW_ROOT.$this->dir[$dirIndex].DS.$id; 
        //make sure the permission 
        if (!is_dir($fullUploadDir)) { 
            $this->Folder->create($fullUploadDir, 0777); 
             
        } else if (!is_writable($fullUploadDir)) { 
            $this->Folder->chmod($fullUploadDir, 0777, false);  
        } 
        return $fullUploadDir; 
    }     
    //give your own validation logic here 
    private function _validate($file){ 
        return true; 
    } 

         
} 
