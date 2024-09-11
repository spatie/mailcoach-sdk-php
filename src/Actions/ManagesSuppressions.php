<?php

namespace Spatie\MailcoachSdk\Actions;

use Spatie\MailcoachSdk\Resources\Suppression;
use Spatie\MailcoachSdk\Support\PaginatedResults;

trait ManagesSuppressions
{
    /**
     * @param  array<string, string>  $filters
     * @return PaginatedResults<Suppression>
     */
    public function suppressions(array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            "suppressions{$this->buildFilterString($filters)}",
            Suppression::class,
            $this,
        );
    }

    public function createSuppression(string $email): void
    {
        $this->createSuppressions([$email]);
    }

    /** @param array<int, string> $emails */
    public function createSuppressions(array $emails): void
    {
        $payload = [];
        foreach ($emails as $email) {
            $payload[] = ['email' => $email];
        }

        $this->post('suppressions', $payload);
    }

    public function deleteSuppression(string $email): void
    {
        $this->deleteSuppressions([$email]);
    }

    /** @param array<int, string> $emails */
    public function deleteSuppressions(array $emails): void
    {
        $payload = [];
        foreach ($emails as $email) {
            $payload[] = ['email' => $email];
        }

        $this->delete('suppressions', $payload);
    }
}
