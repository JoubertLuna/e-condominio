<?php

namespace App\Models\Condominio\Painel;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name',  'url', 'email', 'password', 'surname', 'cpf', 'rg', 'fone', 'celular', 'image', 'tipo_morador', 'condominio_id', 'bloco_id', 'unidade_id', 'role_id'];

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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function bloco()
    {
        return $this->belongsTo(Bloco::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }

    public function anuncios()
    {
        return $this->hasMany(Anuncio::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function visitantes()
    {
        return $this->hasMany(Visitante::class);
    }

    public function contaRecebers()
    {
        return $this->hasMany(ContaReceber::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
