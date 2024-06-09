<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        // Perform verification logic here
        $user = User::findOrFail($id);

        if (sha1($user->email) === $hash) {
            // Mark the user's email as verified
            $user->markEmailAsVerified();

            // Redirect the user to a success page or return a success response
          
            return redirect()->to('http://127.0.0.1:8000/verification?message=verified');
        } else {
            return redirect()->to('http://127.0.0.1:8000/verification?message=not-verified');
        }
    }
}
