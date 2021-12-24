<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'team_members';

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
    protected $fillable = ['project_leader_id', 'staff_id','project_id'];

    //project_leader
    public function projectLeader()
    {
        return $this->belongsTo(User::class, 'project_leader_id');
    }

    //staff
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    //project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
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
