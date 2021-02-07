<?php
/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 2/6/21, 3:52 PM
 * Last Modified: 2/6/21, 3:52 PM
 * Project Name: Amack-BackEnd
 * File Name: NextAndPrevious.php
 */


namespace App\Models;

trait CustomModelTrait
{
    public function next()
    {
        return $this->newQuery()->where('id', '>', $this->attributes['id'])->oldest('id')->first()->id ?? null;
    }

    public function prev()
    {
        return $this->newQuery()->where('id', '<', $this->attributes['id'])->latest('id')->first()->id ?? null;
    }
}
