<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CampaignController extends Controller
{

    public function index(Request $request)
    {
        $campaigns = Campaign::with('user', 'transactions')
            ->where('title', 'LIKE', '%' . $request->search . '%')->get();
        return inertia('Campaign/Index', [
            'campaigns' => $campaigns,
        ]);
    }

    public function create()
    {
        return inertia('Campaign/Create');
    }

    public function store(CampaignRequest $request)
    {
        // return date('Y-m-d');
        Campaign::create([
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'image'       => $request->file('image')->store('campaign'),
            'start_date' => date('Y-m-d'),
            'expired'     => $request->expired,
        ]);
        return to_route('campaign.index');
    }

    public function show(Campaign $campaign)
    {
        //
    }

    public function edit(Campaign $campaign)
    {
        return inertia('Campaign/Edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $expiredValidation = date('Y-m-d', time());
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
            'expired'     => 'required|date|date_format:Y-m-d|after_or_equal:' . $expiredValidation,
        ]);
        if ($request->image) {
            Storage::delete($campaign->image);
            $image = $request->file('image')->store('campaign');
        } else {
            $image = $campaign->image;
        }
        $campaign->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'description' => $request->description,
            'image'       => $image,
            'expired'     => $request->expired,
        ]);
        return to_route('campaign.index');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return back();
    }
}
