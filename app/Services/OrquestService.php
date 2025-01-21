<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OrquestService
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('services.orquest.base_url', env('ORQUEST_BASE_URL'));
        $this->apiKey = env('ORQUEST_API_KEY_TEST'); // Cambia a `ORQUEST_API_KEY_PROD` en producción.
    }

    public function getServices($businessId)
    {
        $url = "{$this->baseUrl}/businesses/{$businessId}/services";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Accept' => 'application/json',
        ])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception("Error fetching services: " . $response->body());
    }
}
