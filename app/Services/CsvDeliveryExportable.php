<?php

namespace App\Services;

use App\Repository\OrderDeliveryRepositoryInterface;

/**
 * Class CsvDeliveryExportable
 *
 * @package App\Services
 */
class CsvDeliveryExportable implements DeliveryExportableInterface
{
    /**
     * @var OrderDeliveryRepositoryInterface
     */
    private $orderDeliveryRepository;

    /**
     * CsvDeliveryExportable constructor.
     *
     * @param OrderDeliveryRepositoryInterface $orderDeliveryRepository
     */
    public function __construct(OrderDeliveryRepositoryInterface $orderDeliveryRepository)
    {
        $this->orderDeliveryRepository = $orderDeliveryRepository;
    }

    public function export(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $filename = "export.csv";
        $handle = fopen($filename, 'w');
        fputcsv($handle, [
            "order_id",
            "user_id",
            "subscription_id",
            "status_id",
        ]);
        $this->orderDeliveryRepository->doChunk()->chunk(100, function ($data) use ($handle) {
            foreach ($data as $row) {
                fputcsv($handle, [
                    $row->id,
                    $row->order->user->name,
                    $row->order->subscription->name,
                    $row->order->status->name,
                ]);
            }
        });
        fclose($handle);

        return response()->download($filename, "export.csv");
    }
}
