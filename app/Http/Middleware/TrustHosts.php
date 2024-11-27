<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string|null>
     */
<<<<<<< HEAD
    public function hosts(): array
=======
    public function hosts()
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    {
        return [
            $this->allSubdomainsOfApplicationUrl(),
        ];
    }
}
