<?php

namespace SanderVanHooft\VaporizeSparkMollie\Events;

use App\Models\Team;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class TeamPhotoUpdated
{
    use SerializesModels;

    /**
     * @var \App\Models\Team
     */
    public $team;

    /**
     * @var string
     */
    public $bucket;

    /**
     * @var string
     */
    public $key;

    /**
     * @var string
     */
    public $contentType;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Team $team
     * @param string $bucket
     * @param string $key
     * @param string $contentType
     */
    public function __construct(Team $team, string $bucket, string $key, string $contentType)
    {
        $this->team = $team;
        $this->bucket = $bucket;
        $this->key = $key;
        $this->contentType = $contentType;
    }

    /**
     * @return string
     */
    public function file()
    {
        return Storage::get($this->key);
    }
}
