<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Redis;
abstract class BaseRepository implements RepositoryInterface{

// khởi tạo model
 protected $model;
    public function __construct()
    {
        $this->setModel();
    }
    public function setModel(){
       $this->model= app()->make($this->getModel());
    }
     abstract public function getModel();
    public function all(){
       try {
        $key = strtolower(class_basename($this->getModel())) . '_all';
        $data = Redis::get($key);

        if($data){
            return json_decode($data);
        }

        $data = $this->model->all();
        Redis::set($key, json_encode($data));

        return $data;
       } catch(\Exception $e) {
        // Nếu Redis lỗi (chưa bật server), tự động lấy từ DB để web không chết
        return $this->model->all();
       }
    }
     public function find($id){
        return $this->model->find($id);
    }
     public function create($arrtibutes=[]){
        $result = $this->model->create($arrtibutes);
        if ($result) {
            $this->clearCache();
        }
        return $result;
    }
    public function update($id,$arrtibutes=[]){
        $result=$this->model->find($id);
        if($result){
            $updated = $result->update($arrtibutes);
            if ($updated) {
                $this->clearCache();
            }
            return $updated;
        }
        return false;
    }
     public function delete($id){
        $result = $this->model->find($id);
        if($result){
            $deleted = $result->delete();
            if ($deleted) {
                $this->clearCache();
            }
            return $deleted;
        }
        return false;
    }

    // Hàm tự động xóa cache khi dữ liệu thay đổi
    private function clearCache() {
        $key = strtolower(class_basename($this->getModel())) . '_all';
        Redis::del($key);
    }
}
