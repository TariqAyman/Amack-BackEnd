<?php

declare(strict_types=1);

namespace App\Http\Views;

use App\Http\Resources\SimpleDiveSite;

class DiveSiteView
{
    /** @var string */
    public $name;

    /** @var string|null */
    public $description;

    /** @var double */
    public $longitude;

    /** @var double */
    public $latitude;

    /** @var TaxonView */
    public $mainTaxon;

    /** @var TaxonView[] */
    public $subTaxons;

    /** @var DiveEntryView[] */
    public $entries;

    /** @var array */
    public $seasons;

    public $city;

    /** @var array */
    public $activities;

    /** @var string */
    public $current;

    /** @var int */
    public $visibility;

    /** @var int */
    public $maxDepth;

    public $license;

    /** @var array */
    public $dayTimes;

    /** @var bool */
    public $special;

    /** @var bool */
    public $guided;

    /** @var SimpleDiveSite[] */
    public $nearbySites;
}
