<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{

    protected $table = 'students_reg';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['first_name', 'mid_name', 'last_name', 'mother_name', 'father_name', 'gender', 'dob', 'mobile', 'email', 'aadhaar', 'blood_group', 'category', 'religion', 'nationality', 'student_img', 'address1', 'address2', 'contact_person', 'cp_name', 'cp_rel', 'mother_occup', 'mother_qual', 'mother_mob', 'father_occup', 'father_qual', 'father_mob', 'income', 'deleted_at'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $beforeDelete = ['beforeDelete'];

    /*protected $validationRules    = [
    'aadhaar'     => 'required',
    'email'        => 'required'
    ];
    
    protected $validationMessages = [
    'email'        => [
    'required' => 'Aaddhar required.'
    ],
    'aadhaar' => [
    'required' => 'Aadhaar field required.'
    ]
    ];*/

    protected $skipValidation = false;

    protected function beforeInsert(array $data)
    {
        //$data = $this->addRegNum($data);
        //$data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        $data['data']['reg_num'] = time();

        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        //$data = $this->passwordHash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeDelete(array $data)
    {
        $data['data']['deleted_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    /*protected function addRegNum(array $data){
      if (! isset($data['data']['image'])) return $data;
      $data['data']['image'] = $data['data']['reg_num'].'_'.$data['data']['image'];
      return $data;
    }
    
    protected function passwordHash(array $data){
    if(isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    
    return $data;
    }*/

}

?>
