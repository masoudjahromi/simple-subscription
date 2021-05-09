<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Repository\DeliveryTypeRepositoryInterface;

class DeliveryController extends Controller
{
    /**
     * @var DeliveryTypeRepositoryInterface
     */
    private $deliveryTypeRepository;

    /**
     * DeliveryController constructor.
     * @param DeliveryTypeRepositoryInterface $deliveryTypeRepository
     */
    public function __construct(DeliveryTypeRepositoryInterface $deliveryTypeRepository)
    {
        $this->deliveryTypeRepository = $deliveryTypeRepository;
    }

    /**
     * Get all delivery types
     *
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $list = $this->deliveryTypeRepository->all();

        return response()->json($list, 200);
    }
}
