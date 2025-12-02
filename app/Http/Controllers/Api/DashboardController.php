<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index(): JsonResponse
    {
        $today = Carbon::today();
        $thisMonth = Carbon::now()->startOfMonth();

        return response()->json([
            'today' => $this->getTodayStats($today),
            'this_month' => $this->getMonthStats($thisMonth),
            'popular_services' => $this->getPopularServices($thisMonth),
            'top_customers' => $this->getTopCustomers($thisMonth),
        ]);
    }

    private function getTodayStats($today)
    {
        $query = Booking::query()->where('booking_date', $today);

        return [
            'bookings_count' => $query->count(),
            'revenue' => $query->where('payment_status','paid')->sum('total_price'),
            'pending_count' => $query->where('status','pending')->count(),
            'unpaid_count' => $query->where('payment_status','unpaid')->count(),
        ];
    }

    private function getMonthStats($startDate)
    {
        $query = Booking::query()->where('booking_date', '>=', $startDate);

        return [
            'bookings_count' => $query->count(),
            'revenue' => $query->where('payment_status','paid')->sum('total_price'),
            'completed_count' => $query->where('status','completed')->count(),
            'cancelled_count' => $query->where('status','cancelled')->count(),
        ];
    }

    private function getPopularServices($startDate, $limit = 5)
    {
        return Booking::query()->where('booking_date', '>=', $startDate)
            ->where('status', 'completed')
            ->select('service_id',
                DB::raw('COUNT(*) as bookings_count'),
                DB::raw('SUM(total_price) as revenue')
            )
            ->groupBy('service_id')
            ->orderByDesc('bookings_count')
            ->limit($limit)
            ->with('service:id,name')
            ->get()
            ->map(function ($item) {
                return [
                    'service_id' => $item->service_id,
                    'service_name' => $item->service->name,
                    'bookings_count' => $item->bookings_count,
                    'revenue' => $item->revenue,
                ];
            });
    }

    private function getTopCustomers($startDate, $limit = 5)
    {
        return Booking::query()->where('booking_date', '>=', $startDate)
            ->where('status', 'completed')
            ->where('payment_status', 'paid')
            ->select('customer_id',
                DB::raw('COUNT(*) as bookings_count'),
                DB::raw('SUM(total_price) as total_spent')
            )
            ->groupBy('customer_id')
            ->orderByDesc('bookings_count')
            ->limit($limit)
            ->with('customer:id,name,phone_number')
            ->get()
            ->map(function ($item) {
                return [
                    'customer_id' => $item->customer_id,
                    'customer_name' => $item->customer->name,
                    'customer_phone' => $item->customer->phone_number,
                    'bookings_count' => $item->bookings_count,
                    'total_spent' => $item->total_spent,
                ];
            });
    }
}
