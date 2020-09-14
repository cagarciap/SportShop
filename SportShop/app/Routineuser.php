<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use App\Routine;



class Routineuser extends Model
{
    //attributes id, user_id, routine_id
    protected $fillable = ['user_id','routine_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }


    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getRoutineId()
    {
        return $this->attributes['routine_id'];
    }

    public function setRoutineId($routine_id)
    {
        $this->attributes['routine_id'] = $routine_id;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function routine(){
        return $this->belongsTo(Routine::class);
    }

}