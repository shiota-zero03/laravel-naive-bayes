<?php

namespace App\Repositories;
use App\Models\Visitor;
use Carbon\Carbon;
class VisitorRepository
{
    public function getById($id)
    {
        return Visitor::find($id);
    }
    public function getAll()
    {
        return Visitor::all();
    }
    public function showByDays($from, $until)
    {
        $dateRange = collect(Carbon::parse($from)->daysUntil($until))->map(function ($date) {
            return $date->format('Y-m-d');
        });
        $visitorData = Visitor::whereBetween('visit_date', [$from, $until])
            ->groupBy('visit_date')
            ->orderBy('visit_date')
            ->get([
                \DB::raw('DATE(visit_date) as date'),
                \DB::raw('COUNT(*) as visitor_count')
            ]);
        $visitorData = $dateRange->map(function ($date) use ($visitorData) {
            $entry = $visitorData->firstWhere('date', $date);
            return [
                'date' => $date,
                'visitor_count' => $entry ? $entry['visitor_count'] : 0,
            ];
        });
        return $visitorData;
    }
    public function createData(array $data)
    {
        return Visitor::create($data);
    }
    public function deleteData($id)
    {
        return Visitor::find($id)->delete();
    }
}