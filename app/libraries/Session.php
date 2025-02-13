<?php
namespace TourDeMaroc\App\Libraries;

class Session {
    private static $instance = null;

    private function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function getInstance(): Session {
        if (self::$instance === null) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function set(string $key, $value): void {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public function has(string $key): bool {
        return isset($_SESSION[$key]);
    }

    public function remove(string $key): void {
        unset($_SESSION[$key]);
    }

    public function clear(): void {
        session_unset();
        session_destroy();
    }

    public function getUserId() {
        return $this->get('user_id');
    }

    public function getUsername() {
        return $this->get('nom_utilisateur');
    }

    public function isLoggedIn(): bool {
        return $this->has('user_id');
    }
}