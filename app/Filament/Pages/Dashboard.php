<?php
 
namespace App\Filament\Pages;
use Filament\Panel;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static string $routePath = '/';
    public function panel(Panel $panel): Panel
    {
        return $panel
            // ...
            ->pages([]);
    }
}