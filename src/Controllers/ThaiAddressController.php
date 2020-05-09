<?php

namespace TheLink\ThaiAddress\Controllers;

use TheLink\ThaiAddress\Models\District;
use TheLink\ThaiAddress\Models\Province;
use TheLink\ThaiAddress\Models\PostalCode;
use TheLink\ThaiAddress\Models\SubDistrict;
use TheLink\ThaiAddress\Resources\DistrictResource;
use TheLink\ThaiAddress\Resources\ProvinceResource;
use TheLink\ThaiAddress\Resources\PostalCodeResource;
use TheLink\ThaiAddress\Resources\SubDistrictResource;
use TheLink\ThaiAddress\Resources\ThaiAddressResource;
use Illuminate\Routing\Controller;

class ThaiAddressController extends Controller
{
    public function getAllSubDistricts()
    {
        return SubDistrictResource::collection(SubDistrict::all());
    }

    public function getSubDistrict($id)
    {
        return SubDistrictResource::collection(SubDistrict::findOrFail($id));
    }

    public function searchSubDistrict($query)
    {
        return SubDistrictResource::collection(SubDistrict::query()->search($query, 'name')->get());
    }

    public function getAllDistricts()
    {
        return DistrictResource::collection(District::all());
    }

    public function getDistrict($id)
    {
        return DistrictResource::collection(District::findOrFail($id));
    }

    public function searchDistrict($query)
    {
        return DistrictResource::collection(District::query()->search($query, 'name')->get());
    }

    public function getAllProvinces()
    {
        return ProvinceResource::collection(Province::all());
    }

    public function getProvince($id)
    {
        return ProvinceResource::collection(Province::findOrFail($id));
    }

    public function searchProvince($query)
    {
        return ProvinceResource::collection(Province::query()->search($query, 'name')->get());
    }

    public function getAllPostalCodes()
    {
        return PostalCodeResource::collection(PostalCode::all());
    }

    public function getPostalCode($id)
    {
        return PostalCodeResource::collection(PostalCode::findOrFail($id));
    }

    public function searchPostalCode($query)
    {
        return PostalCodeResource::collection(PostalCode::query()->search($query, 'code')->get());
    }

    public function search($query)
    {
        return ThaiAddressResource::collection(
            PostalCode::query()
                ->whereHas('sub_district', function ($q) use ($query) {
                    $q->search($query, 'name');
                })
                ->orWhereHas('district', function ($q) use ($query) {
                    $q->search($query, 'name');
                })
                ->orWhereHas('province', function ($q) use ($query) {
                    $q->search($query, 'name');
                })
                ->orWhere('code', 'like', "%{$query}%")
                ->get()
        );
    }
}
