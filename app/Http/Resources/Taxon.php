<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Http\Views\TaxonView;
use Illuminate\Http\Resources\Json\JsonResource;

class Taxon extends JsonResource
{
    public function toArray($request): TaxonView
    {
        $taxonView = new TaxonView();
        $taxonView->id = $this->id;
        $taxonView->name = $this->name;
        if (null !== $this->description) {
            $taxonView->description = $this->description;
        }
        return $taxonView;
    }
}
