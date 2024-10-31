<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductsCategory;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class ProductsCategoryController extends Controller
{
    // use DisableAuthorization;
    use DisablePagination;
    protected $model = ProductsCategory::class;


     /**
     * Retrieves currently authenticated user based on the guard.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */

    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }
}