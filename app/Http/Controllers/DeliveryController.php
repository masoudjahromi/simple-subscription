<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\DeliveryExportableInterface;
use App\Repository\DeliveryTypeRepositoryInterface;

/**
 * Class DeliveryController
 *
 * @package App\Http\Controllers
 */
class DeliveryController extends Controller
{
    /**
     * @var DeliveryTypeRepositoryInterface
     */
    private $deliveryTypeRepository;
    /**
     * @var DeliveryExportableInterface
     */
    private $deliveryExportable;

    /**
     * DeliveryController constructor.
     * @param DeliveryTypeRepositoryInterface $deliveryTypeRepository
     * @param DeliveryExportableInterface     $deliveryExportable
     */
    public function __construct(
        DeliveryTypeRepositoryInterface $deliveryTypeRepository,
        DeliveryExportableInterface $deliveryExportable
    )
    {
        $this->deliveryTypeRepository = $deliveryTypeRepository;
        $this->deliveryExportable = $deliveryExportable;
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

    /**
     * Export all deliveries as a CSV file
     *
     * @return mixed
     */
    public function exportCsv()
    {
        return $this->deliveryExportable->export();
    }
}
