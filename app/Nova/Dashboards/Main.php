<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\TotalProduct;
use App\Nova\Metrics\TotalUsers;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new TotalUsers(),
            new TotalProduct()
        ];
    }
}
