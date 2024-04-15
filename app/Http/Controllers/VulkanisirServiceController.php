<?php

namespace App\Http\Controllers;

use App\Models\VulkanisirService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VulkanisirServiceController extends Controller
{
    public function view(Request $request){
        $user = Session::get('user');
        $type = $request->query('type', 'all');
        $services = VulkanisirService::latest()->where('customer_id', $user->id)->get();

        foreach ($services as $key => $value) {
            $nowTime = Carbon::now();
            $serviceFinishTime = Carbon::createFromFormat('Y-m-d H:i:s', $value->will_finish_at);
            $status = $nowTime->gt($serviceFinishTime) ? 'Pickup' : 'On Progress';
            if ($value->cancel_reason != null) {
                $status = "Canceled";
            }
            if ($value->taken_by != null) {
                $status = "Finished";
            }

            $value->status = $status;
            $value->finish_text = $serviceFinishTime;
        }

        return view('vservice.service', [
            'data' => $services
        ]);
    }

    public function viewDetail($id){
        $service = VulkanisirService::find($id);

        $nowTime = Carbon::now();
        $serviceFinishTime = Carbon::createFromFormat('Y-m-d H:i:s', $service->will_finish_at);
        $status = $nowTime->gt($serviceFinishTime) ? 'Pickup' : 'On Progress';
        if ($service->cancel_reason != null) {
            $status = "Canceled";
        }
        if ($service->taken_by != null) {
            $status = "Finished";
        }

        return view('vservice.detail', [
            'service' => $service,
            'service_status' => $status
        ]);
    }
}
