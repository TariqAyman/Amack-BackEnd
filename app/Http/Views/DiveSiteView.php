<?php

declare(strict_types=1);

namespace App\Http\Views;

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

    public $mainTaxon;

    public $subTaxons;


    public $diveEntry;

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
}
