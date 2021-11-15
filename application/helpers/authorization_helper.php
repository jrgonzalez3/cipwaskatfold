<?php
class AUTHORIZATION extends JWT
{
    public static function validateTimestamp($token)
    {
        $CI = &get_instance();
        $token = self::validateToken($token);
        if ($token != false && (now() - $token->timestamp < ($CI->config->item('token_timeout') * 60))) {
            return $token;
        }
        return false;
    }
    public static function validateToken($token)
    {
        return JWT::decode($token, JWT_KEY);
    }
    public static function generateToken($data)
    {
        return JWT::encode($data, JWT_KEY);
    }

}
