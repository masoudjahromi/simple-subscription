<?php

namespace App\Transformers;

/**
 * Class CreateUserResponseTransformer
 *
 * @package App\Transformers
 */
class CreateUserResponseTransformer implements TransformerInterface
{

    public function transform($data): array
    {
        return [
            'detail' => $data,
        ];
    }
}
