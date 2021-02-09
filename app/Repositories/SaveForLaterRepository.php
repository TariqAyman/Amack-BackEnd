<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\SaveForLater;
use Illuminate\Support\Arr;

class SaveForLaterRepository extends Repository
{
    public function getModel()
    {
        return SaveForLater::class;
    }

    public function getDatatable()
    {
    }

    public function create(array $data)
    {
        $userId = auth()->user()->id;

        $hash = $this->generateHash([
            'userId' => $userId,
            'sitesId' => Arr::pluck($data['sites'], 'dive_site_id')
        ]);

        foreach ($data['sites'] as $site) {
            $this->model->updateOrCreate(
                [
                    'hash' => $hash,
                    'user_id' => $userId,
                    'dive_site_id' => $site['dive_site_id']
                ],
                ['options' => $site['options']]
            );
        }
    }

    /**
     * generate hash
     *
     * @param $data
     * @return int
     */
    public function generateHash($data): int
    {
        $optionData = [];

        $ksort_recursive = function (&$array) use (&$ksort_recursive) {
            if (is_array($array)) {
                ksort($array);
                array_walk($array, $ksort_recursive);
            }
        };

        $ksort_recursive($optionData);

        return crc32(json_encode($data));
    }

    /**
     * @return mixed
     */
    public function getMySavedList()
    {
        return $this->model->where('user_id', auth()->user()->id)->get()->groupBy('hash');
    }

    /**
     * @param string $hashed
     */
    public function deleteByHash(string $hashed)
    {
        $this->model->where('hash', $hashed)->delete();
    }
}
