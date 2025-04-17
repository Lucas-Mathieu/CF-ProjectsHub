<?php

class EmailUtil
{
    public static function sendVerificationEmail($to, $name, $code)
    {
        $subject = "Verifiez votre compte";
        $message = "Bonjour $name,\n\nVoici votre code de vérification: $code\n\nMerci de vérifier votre compte.\n\nCordialement,\nCF Project Hub";
        $headers = "From: no-reply@cf-projecthub.alwaysdata.net\r\n";
        
        return mail($to, $subject, $message, $headers);
    }

    public static function sendPasswordResetEmail($to, $name, $code)
    {
        $subject = "Réinitialisez votre mot de passe";
        $message = "Bonjour $name,\n\nVoici votre code de réinitialisation: $code\n\nMerci de réinitialiser votre mot de passe.\n\nCordialement,\nCF Project Hub";
        $headers = "From: no-reply@cf-projecthub.alwaysdata.net\r\n";
        
        return mail($to, $subject, $message, $headers);
    }
}
?>