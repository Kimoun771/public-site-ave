<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CertificateVerifyController extends Controller
{
    public function certificateVerify(Request $request)
    {
        $data = $request->all();
        $countryName = $data['country']['name'];
        $certificateNumber = $data['certificate_number'];
        $certificate = Certificate::with('company.country')
            ->where('certificate_number', $certificateNumber)
            ->whereHas('company.country', function($query) use ($countryName) {
                $query->where('name', $countryName);
            })
            ->first();
        $company = $certificate->company ?? null;
        $responseData = [
            "id" => $certificate->id ?? null,
            "company" => $company->name ?? null,
            "country" => $company->country->name ?? null,
            "scope" => $company->scope->name ?? $company->scope ?? null,
            "scheme" => $company->scheme->name ?? $company->scheme ?? null,
            "address" => $company->address ?? null,
            "registration_date" => $certificate && $certificate->registration_date
                ? Carbon::parse($certificate->registration_date)->format('F j, Y')
                : null,
            "expire_date" => $certificate && $certificate->expire_date
                ? Carbon::parse($certificate->expire_date)->format('F j, Y')
                : null,
        ];
        if ($certificate) {
            return response()->json([
                'success' => true,
                'certificate' => $responseData
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Certificate not found or invalid'
            ]);
        }
    }
}
