<?php

class Middleware
{
    public static function auth(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public static function guest(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!empty($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/');
            exit;
        }
    }
}
