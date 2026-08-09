<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use RuntimeException;

class LugarTuristico
{
    public static function all(): Collection
    {
        return collect(self::load())
            ->sortBy('titulo')
            ->values();
    }

    public static function find(string $slug): ?array
    {
        return self::all()->firstWhere('slug', $slug);
    }

    public static function categories(): Collection
    {
        return self::all()
            ->pluck('categoria')
            ->unique()
            ->sort()
            ->values();
    }

    public static function storeContact(string $slug, array $data): array
    {
        $record = [
            'destino_slug' => $slug,
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'mensaje' => $data['mensaje'],
            'fecha' => now()->toDateTimeString(),
        ];

        $path = storage_path('app/private/solicitudes_contacto.json');
        File::ensureDirectoryExists(dirname($path));

        $requests = [];

        if (File::exists($path)) {
            $requests = json_decode(File::get($path), true, 512, JSON_THROW_ON_ERROR);
        }

        $requests[] = $record;

        File::put($path, json_encode($requests, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return $record;
    }

    private static function load(): array
    {
        $path = database_path('data/lugares_turisticos.json');

        if (! File::exists($path)) {
            throw new RuntimeException("No se encontro el archivo de datos: {$path}");
        }

        $data = json_decode(File::get($path), true, 512, JSON_THROW_ON_ERROR);

        return $data['lugares'] ?? [];
    }
}
