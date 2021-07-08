<?php

namespace SanderVanHooft\VaporizeSparkMollie\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProfilePhotoResized
{
    use SerializesModels;

    /**
     * @var \App\Models\User
     */
    public $user;

    /**
     * @var string
     */
    public $oldKey;

    /**
     * @var string
     */
    public $oldUrl;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\User $user
     * @param string $oldKey
     * @param string $oldUrl
     */
    public function __construct(User $user, string $oldKey, string $oldUrl)
    {
        $this->user = $user;
        $this->oldKey = $oldKey;
        $this->oldUrl = $oldUrl;
    }

    /**
     * @return string
     */
    public function oldFile()
    {
        return Storage::get($this->oldKey);
    }
}
