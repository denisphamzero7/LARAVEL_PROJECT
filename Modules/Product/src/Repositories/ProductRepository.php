<?php

namespace Modules\Product\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\Product\src\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    // Define your repository methods here
}
