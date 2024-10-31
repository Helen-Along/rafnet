<?php

namespace App\Http\Controllers\Api;

use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Orion\Concerns\DisablePagination;

class ProductsController extends Controller
{
    // use DisableAuthorization;
    use DisablePagination;
    protected $model = Products::class;


     /**
     * Retrieves currently authenticated user based on the guard.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */

     public function filterableBy() : array
    {
        return ['id', 'name', 'category_id'];
    }
    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }
}