<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Company;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'uf',
        'address',
        'city',
        'phone',
        'company_id',
        'role'  
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function _role(){
        if ($this->role==9) return "Administrador";
        if ($this->role==8) return "Gerente";
        if ($this->role==7) return "Supervisor";
        if ($this->role==6) return "Funcionário";
        else return "Usuário";
    }
    public function _company(){


        $companies = Company::get();

        if($this->company_id>0)
       { foreach($companies as $company)
        {
            if ($this->company_id == $company->id) 
            {return  $company->name;}


        }
    }


        else return "Sem empresa";
    }
}
