<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Lokasi;
use App\Models\Lokasiooh;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $fixedIds = [15, 16, 18, 20];

        $services = Service::whereIn('id', $fixedIds)->get();

        $fixedLabels = collect($fixedIds)->map(function ($id) use ($services) {
            $service = $services->firstWhere('id', $id);
            if ($service) {
                $judul = $service->judul;
                $locale = app()->getLocale();
                return is_array($judul) ? ($judul[$locale] ?? $judul['id'] ?? $judul['en'] ?? 'Unknown') : ($judul ?? 'Unknown');
            }
            return 'Unknown';
        });

        $clickData = collect($fixedIds)->map(function ($id) use ($services) {
            return optional($services->firstWhere('id', $id))->click_count ?? 0;
        });

        $orderData = collect($fixedIds)->map(function ($id) use ($services) {
            return optional($services->firstWhere('id', $id))->order_count ?? 0;
        });

        $totalDOOH = Lokasi::count();
        $totalOOH = Lokasiooh::count();

        return view('admin.dashboard', [
            'service' => $services,
            'click_count' => $clickData,
            'order_click' => $orderData,
            'fixedLabels' => $fixedLabels,
            'totalDOOH' => $totalDOOH,
            'totalOOH' => $totalOOH,
        ]);
    }
}
