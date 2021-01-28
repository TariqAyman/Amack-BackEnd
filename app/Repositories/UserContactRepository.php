<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\UserContact;

class UserContactRepository extends Repository
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function getModel()
    {
        return UserContact::class;
    }

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();

        $this->userRepository = $userRepository;
    }

    public function getDatatable()
    {
    }

    public function create(array $data)
    {
        // todo : refactor this

        $insertData = [];
        $userId = auth()->user()->id;

        foreach ($data['mobile'] as $number) {
            if (!$this->model::where('mobile', $data['mobile'])->exists()) {
                $insertData[] =
                    [
                        'user_id' => $userId,
                        'mobile' => $number
                    ];
            }
        }

        $this->model::query()->upsert($insertData, []);
    }

    public function myContactUser()
    {
        $mobiles = $this->model->where('user_id', auth()->user()->id)->pluck('mobile');
        return $this->userRepository->getModel()::whereIn('mobile', $mobiles)->select(['id', 'name', 'mobile']);
    }
}
