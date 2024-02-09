<?php

namespace Spatie\MailcoachSdk\Actions;

use Spatie\MailcoachSdk\Resources\EmailList;
use Spatie\MailcoachSdk\Resources\Tag;
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

    public function addTagToEmailList(string $uuid, array $data): Tag
    {
        $attributes = $this->post("email-lists/{$uuid}/tags", $data);

        return new Tag($attributes, $this);
    }

    public function updateTagOnEmailList(string $emailListUuid, string $tagUuid, array $data): Tag
    {
        $attributes = $this->put("email-lists/{$emailListUuid}/tags/{$tagUuid}", $data)['data'];

        return new Tag($attributes, $this);
    }

    public function deleteTagFromEmailList(string $emailListUuid, string $tagUuid): void
    {
        $this->delete("email-lists/{$emailListUuid}/tags/{$tagUuid}");
    }
}
