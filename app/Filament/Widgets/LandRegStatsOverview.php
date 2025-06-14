<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class LandRegStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalProperties = Property::count();
        $registeredThisMonth = Property::whereMonth('created_at', now()->month)->count();
        $registeredLastMonth = Property::whereMonth('created_at', now()->subMonth()->month)->count();
        $monthlyGrowth = $registeredLastMonth > 0 
            ? round(($registeredThisMonth - $registeredLastMonth) / $registeredLastMonth * 100, 2)
            : 100;

        $averageArea = Property::average('area');
        $largestProperty = Property::orderByDesc('area')->first();

        return [
            Stat::make('Total Properties', number_format($totalProperties))
                ->description($this->getGrowthDescription($monthlyGrowth))
                ->descriptionIcon($this->getGrowthIcon($monthlyGrowth))
                ->color($this->getGrowthColor($monthlyGrowth)),

            Stat::make('Average Area', $averageArea ? round($averageArea, 2).' sqm' : 'N/A')
                ->description($largestProperty ? 'Largest: '.round($largestProperty->area, 2).' sqm' : '')
                ->descriptionIcon('heroicon-o-scale')
                ->color('info'),
                
            Stat::make('This Month', $registeredThisMonth.' registrations')
                ->description('Compared to '.$registeredLastMonth.' last month')
                ->descriptionIcon('heroicon-o-clipboard-document-check')
                ->color('success'),
                
            Stat::make('With Coordinates', Property::whereNotNull('boundary_coordinates')->count())
                ->description(round((Property::whereNotNull('boundary_coordinates')->count()/$totalProperties)*100, 1).'% of total')
                ->descriptionIcon('heroicon-o-map')
                ->color('warning'),
        ];
    }

    protected function getGrowthDescription(float $growth): string
    {
        return $growth >= 0 
            ? number_format(abs($growth)).'% increase from last month' 
            : number_format(abs($growth)).'% decrease from last month';
    }

    protected function getGrowthIcon(float $growth): string
    {
        return $growth >= 0 
            ? 'heroicon-m-arrow-trending-up' 
            : 'heroicon-m-arrow-trending-down';
    }

    protected function getGrowthColor(float $growth): string
    {
        return $growth >= 0 ? 'success' : 'danger';
    }
}