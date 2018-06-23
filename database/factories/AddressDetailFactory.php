<?php

use App\Constituency;
use App\County;
use App\Locality;
use App\Member;
use App\PostOffice;

use Faker\Generator as Faker;

$factory->define(App\AddressDetail::class, function (Faker $faker) {

    $localities = Locality::all();
    $constituencies = Constituency::all();

    $address_locality = $faker->randomElement(
        $localities->pluck('locality_id')->toArray()
    );

    $locality_constituency = null;

    foreach ($localities as $locality):
        if($address_locality == $locality->locality_id):
            $locality_constituency = $locality->constituency_id;
        endif;
    endforeach;


    $constituency_county = null;

    foreach ($constituencies as $constituency):
        if($locality_constituency == $constituency->constituency_id):
             $constituency_county = $constituency->county_id;
        endif;
    endforeach;


    $members = Member::all()->pluck('member_id')->toArray();
    $post_offices = PostOffice::all()->pluck('post_office_id')->toArray();

    return [
        'member_id' => $faker->unique()->randomElement($members),

        'county_id' => $constituency_county,
        'constituency_id' => $locality_constituency,
        'locality_id' => $address_locality,
        'post_office_id' => $faker->randomElement($post_offices),
        'postal_address' => $faker->randomNumber(),

        'street' => $faker->streetName,
        'building_name' => $faker->buildingNumber,
        'floor' => $faker->numberBetween(0, 25),
        'house_number' => $faker->numberBetween(0, 99)
    ];
});
