<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Clase PasswordResetLinkController
 * 
 * Gestiona la solicitud de restablecimiento de contraseña.
 * Maneja la vista de formulario y el envío del enlace de restablecimiento.
 */
class PasswordResetLinkController extends Controller
{
    /**
     * Muestra la vista de solicitud de restablecimiento de contraseña.
     * 
     * Se accede a esta vista cuando el usuario ha olvidado su contraseña y 
     * necesita solicitar un enlace para restablecerla.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Procesa la solicitud de enlace de restablecimiento de contraseña.
     * 
     * Valida el correo electrónico del usuario y envía un enlace para restablecer
     * la contraseña. Si es exitoso, muestra un mensaje de confirmación;
     * de lo contrario, devuelve los errores.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Se enviará el enlace de restablecimiento de contraseña a este usuario. Una vez que hayamos intentado
        // enviar el enlace, examinaremos la respuesta y veremos el mensaje que
        // necesitamos mostrar al usuario. Finalmente, enviaremos una respuesta adecuada.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}
