<?php

namespace Spatie\MailcoachSdk\Actions;

use Spatie\MailcoachSdk\Resources\EmailList;
use Spatie\MailcoachSdk\Support\PaginatedResults;

trait ManagesEmailLists
{
    /**
     * @param  array<string, string>  $filters
     * @return PaginatedResults<EmailList>
     */
    public function emailLists(array $filters = []): PaginatedResults
    {
        return PaginatedResults::make(
            "email-lists{$this->buildFilterString($filters)}",
            EmailList::class,
            $this,
        );
    }

    public function createEmailList(array $data): EmailList
    {
        $attributes = $this->post('email-lists', $data);

        return new EmailList($attributes, $this);
    }

    public function emailList(string $uuid): EmailList
    {
        $attributes = $this->get("email-lists/{$uuid}")['data'];

        return new EmailList($attributes, $this);
    }

    public function updateEmailList(string $uuid, array $data): EmailList
    {
        $attributes = $this->put("email-lists/{$uuid}", $data)['data'];

        return new EmailList($attributes, $this);
    }

    public function deleteEmailList(string $uuid): void
    {
        $this->delete("email-lists/{$uuid}");
    }
}
