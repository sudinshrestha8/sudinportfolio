<?php

namespace App\Filament\Widgets;

use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PortfolioStatsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Projects', Project::count())
                ->description('Portfolio projects')
                ->descriptionIcon('heroicon-o-rectangle-stack')
                ->color('primary'),
            Stat::make('Skills', Skill::count())
                ->description('Technical skills')
                ->descriptionIcon('heroicon-o-wrench-screwdriver')
                ->color('success'),
            Stat::make('Messages', Message::count())
                ->description(Message::where('read', false)->count() . ' unread')
                ->descriptionIcon('heroicon-o-envelope')
                ->color('warning'),
            Stat::make('Testimonials', Testimonial::where('visible', true)->count())
                ->description('Visible testimonials')
                ->descriptionIcon('heroicon-o-chat-bubble-left-right')
                ->color('info'),
        ];
    }
}
