<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $income = Transaction::incomes()->get()->sum('amount');
        $expense = Transaction::expenses()->get()->sum('amount');
        return [
            Stat::make('Total Expense', $expense),
            Stat::make('Total Income', $income),
            Stat::make('Balance', $income - $expense),
        ];
    }
}
