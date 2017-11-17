<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use FormAccessible;
    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'estatus',
        'index',
        'token',
        'tipoUsuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * [private description]
     * Campos que se extraeran del request
     * @var [array]
     */
    private $dataSave = [
        'username',
        'email',
        'password',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'tipoUsuario'
    ];

    private static $_admin = 'A';
    private static $_mussi = '1';
    private static $_isi = '2';

    public function isAdmin() {
        return $this->tipoUsuario == self::$_admin;
    }
    public function isMussi() {
        return $this->tipoUsuario == self::$_mussi;
    }
    public function isIsi() {
        return $this->tipoUsuario == self::$_isi;
    }

    /**
     * Dependiendo del tipo de usuario, se determinara si es mussi o isi
     * @return [string]        [regresa si es mussi o isi]
     */

    public function getTipoUsuarioNameAttribute()
    {
        $tipoUsuario = $this->tipoUsuario;
        $value = $tipoUsuario==1? 'Usuario DGIRE' : 'Institución';
        return $value;
    }

    /**
     * Por el momento, si el tipo de usuario es isi (2), se mostrara en el campo plan el username
     * @return [string] [vacio o el username]
     */

    public function formPlanAttribute()
    {
        $value = $this->tipoUsuario == 1? '' : $this->username;
        return $value;
    }

    /**
     * Determina cual sera el username del usuario,
     * si es mussi (1), sera el correo,
     * si es isi(2), sera el numero de isi y el plan.
     * @param  [array] $data [trae el request]
     * @return [string]       [regresa el username]
     */

    public function tipoUsuarioUsername($data)
    {
        if ($data['tipoUsuario'] == 1) {
            $tipoUsuario = $data['email'];
        } else if($data['tipoUsuario'] == 2) {
            $isiPlan = explode('-', $data['plan']);
            $tipoUsuario = $isiPlan[0].'-'.$isiPlan[1];
        }
        return $tipoUsuario;
    }

    /**
     * [formatData description]
     * Utiliza el array dataSave, donde se agregan los campos que se utilizaran para guardar en la db,
     * como medida para que no entren los campos _token, _method y otros inecesarios.
     * En caso de que el usuario no quiera cambiar la contraseña y la envie vacia, se quitara del request,
     * para que no se guarde vacia en la db
     * @param  [request] $data [datos que se traen del formulario]
     * @return [array]       [datos que se guardaran en la db]
     */

    public function formatData($data) {
        $data = $data->only($this->dataSave);
        if ($data['password'] == null) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        return $data;
    }

    public function updateModel($data, $user) {
        $tipoUsuario = $user->tipoUsuarioUsername($data);
        $data = $this->formatData($data);
        $data['username'] = $tipoUsuario;
        return $user->fill($data)->save();
    }

    public function createModel($data) {
        $data['username'] = $this->tipoUsuarioUsername($data);
        $newUser = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nombre' => $data['nombre'],
            'apellidoPaterno' => $data['apellidoPaterno'],
            'apellidoMaterno' => $data['apellidoMaterno'],
            'estatus' => 1,
            'index' => 'indexPrueba',
            'token' => 'token d eprueba',
            'tipoUsuario' => $data['tipoUsuario']
        ]);
        return $newUser;
    }
}
