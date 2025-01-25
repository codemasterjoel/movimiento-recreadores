<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Auditoria;

class UserObserver
{
    public function created(User $user): void
    {
        Auditoria::create([
            'accion' => 'Creado',
            'model_type' => get_class($user),
            'model_id' => $user->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($user->toArray())
        ]);
    }
    public function updated(User $user): void
    {
        $actualizacion = $user->getOriginal();
        $cambios = [];
        
        foreach ($actualizacion as $key => $value) 
        {
            if ($user->$key !== $value)
            {
                $cambios[$key] = ['anterior' => $value, 'nuevo' => $user->$key];
            }
        }

        Auditoria::create([
            'accion' => 'Actualizado',
            'model_type' => get_class($user),
            'model_id' => $user->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($cambios)
        ]);
    }
    public function deleted(User $user): void
    {
        Auditoria::create([
            'accion' => 'Eliminado',
            'model_type' => get_class($user),
            'model_id' => $user->id,
            'user_id' => auth()->user()->id,
            'cambios' => json_encode($user->toArray())
        ]);
    }
    public function restored(User $user): void
    {
        //
    }
    public function forceDeleted(User $user): void
    {
        //
    }
}
