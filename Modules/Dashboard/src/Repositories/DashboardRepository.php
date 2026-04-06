<?php

namespace Modules\Dashboard\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Dashboard\src\Models\Dashboard;

class DashboardRepository extends BaseRepository
{
    public function __construct(Dashboard $model)
    {
        parent::__construct($model);
    }

    // Define your repository methods here
}
