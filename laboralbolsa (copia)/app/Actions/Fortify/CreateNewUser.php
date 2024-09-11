<?php
namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'dni' => ['required', 'string', 'max:8'],  // Agrega la validación de DNI
            'ruc' => ['nullable', 'string', 'max:11'], // Agrega la validación de RUC (opcional)
            'celular' => ['nullable', 'string', 'max:15'], // Agrega la validación de celular
            'rol' => ['required', 'in:1,2,3,4'],  // Validación del rol
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'dni' => $input['dni'],  // Añadir campo DNI
            'ruc' => $input['ruc'],  // Añadir campo RUC
            'celular' => $input['celular'],  // Añadir campo Celular
            'rol' => $input['rol'],  // Añadir campo Rol
            'estatus' => false,  // El usuario está pendiente de aprobación
        ]);
    }
}
