<?php


namespace App\Transformers;

/**
 * Interface TransformerInterface
 *
 * @package App\Transformers
 */
interface TransformerInterface
{
    public function transform($data): array;
}
