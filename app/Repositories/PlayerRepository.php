<?php

namespace App\Repositories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

class PlayerRepository
{
    protected Player $model;

    public function __construct(Player $player)
    {
        $this->model = $player;
    }

    /**
     * @param array $data
     * @return Player
     */
    public function create(array $data): Player
    {
        return $this->model->create($data);
    }

    /**
     * @return Collection
     */
    public function playerRanking(): Collection
    {
        return $this->model->select(['name', 'score'])->orderBy('score', 'DESC')->get();
    }
}
