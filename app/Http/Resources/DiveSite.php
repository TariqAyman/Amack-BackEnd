<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Views\DiveSiteView;
use Illuminate\Http\Resources\Json\JsonResource;

class DiveSite extends JsonResource
{
    public function toArray($request): DiveSiteView
    {
        $diveSiteView = new DiveSiteView();

        $diveSiteView->name = $this->name;
        if (null !== $this->description) {
            $diveSiteView->description = $this->description;
        }
        $diveSiteView->maxDepth = $this->max_depth;
        $diveSiteView->current = $this->current;
        $diveSiteView->entries = DiveEntry::collection($this->entries);
        $diveSiteView->visibility = $this->visibility;
        $diveSiteView->mainTaxon = $this->mainTaxon;
        $diveSiteView->city = DiveCity::make($this->city);
        $diveSiteView->latitude = $this->latitude;
        $diveSiteView->longitude = $this->longitude;
        $diveSiteView->subTaxons = Taxon::collection($this->subTaxons);
        $diveSiteView->seasons = Season::collection($this->seasons);
        $diveSiteView->activities = DiveActivity::collection($this->activities);
        $diveSiteView->dayTimes = DayTime::collection($this->dayTimes);
        $diveSiteView->license = $this->license;
        $diveSiteView->special = $this->special;
        $diveSiteView->guided = $this->guided;
        $diveSiteView->nearbySites = SimpleDiveSite::collection($this->nearbySites);
        return $diveSiteView;
    }
}
