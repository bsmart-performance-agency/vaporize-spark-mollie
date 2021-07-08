<?php
declare(strict_types=1);

namespace SanderVanHooft\VaporizeSparkMollie\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Spark\Http\Controllers\Controller;
use Laravel\Spark\Contracts\Interactions\Settings\Teams\UpdateTeamPhoto;

class TeamPhotoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the given team's photo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Spark\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $team)
    {
        $this->interaction(
            $request, UpdateTeamPhoto::class,
            [$team, $request->all()]
        );
    }
}
