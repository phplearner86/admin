<?php 

// Login Controller change direction after login
 	function authenticated(Request $request, $user)
    {
        flash()->success('Welcome back ' . $user->name);

        return $user->hasRole('admin') 
            ? redirect()->route('admin.dashboard') 
            : redirect()->route('welcome');
    }