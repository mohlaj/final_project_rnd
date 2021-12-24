<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','start_date', 'end_date', 'duration', 'cost', 'requirments', 'client', 'project_status', 'project_stage', 'project_category', 'project_leader_id'];

    //project_leader
    public function projectLeader()
    {
        return $this->belongsTo(User::class, 'project_leader_id');
    }

     //teamMembers
     public function teamMembers()
     {
         return $this->hasMany(TeamMember::class);
     }
     
    //model boot
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('project_leader_id', function (Builder $builder) {
            if (auth()->check() && auth()->user()->role == 'PL') {
                return $builder->where('project_leader_id', auth()->id());
            }
        });
    }



}
