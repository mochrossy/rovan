<?php
namespace App\Support;

class Roles
{
    public const LABELS = [
        'admin' => 'Super admin',
        'editor' => 'Editor (News)',
        'portfolio' => 'Portfolio manager',
    ];

    public static function current(): string
    {
        return auth()->user()->role ?? 'editor';
    }

    /** Jenis konten yang boleh dikelola peran ini. */
    public static function types(?string $role): array
    {
        return match ($role) {
            'admin' => ['posts', 'portfolios', 'slides'],
            'editor' => ['posts'],
            'portfolio' => ['portfolios', 'slides'],
            default => [],
        };
    }

    public static function home(?string $role): string
    {
        return self::types($role)[0] ?? abort(403);
    }

    public static function isAdmin(): bool
    {
        return self::current() === 'admin';
    }
}
