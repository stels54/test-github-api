<?php

namespace App\DTO;

use Spatie\DataTransferObject\FlexibleDataTransferObject;

class UserDto extends FlexibleDataTransferObject
{
    /** @var string $login */
    public $login;

    /** @var int $id */
    public $id;

    /** @var string $node_id */
    public $node_id;

    /** @var string $avatar_url */
    public $avatar_url;

    /** @var string $gravatar_id */
    public $gravatar_id;

    /** @var string $url */
    public $url;

    /** @var string $html_url */
    public $html_url;

    /** @var string $followers_url */
    public $followers_url;

    /** @var string $following_url */
    public $following_url;

    /** @var string $gists_url */
    public $gists_url;

    /** @var string $starred_url */
    public $starred_url;

    /** @var string $subscriptions_url */
    public $subscriptions_url;

    /** @var string $organizations_url */
    public $organizations_url;

    /** @var string $repos_url */
    public $repos_url;

    /** @var string $events_url */
    public $events_url;

    /** @var string $received_events_url */
    public $received_events_url;

    /** @var string $type */
    public $type;

    /** @var bool $site_admin */
    public $site_admin;

    /** @var string $name */
    public $name;

    /** @var string $company */
    public $company;

    /** @var string $blog */
    public $blog;

    /** @var string $location */
    public $location;

    /** @var mixed $email */
    public $email;

    /** @var bool $hireable */
    public $hireable;

    /** @var string $bio */
    public $bio;

    /** @var string $twitter_username */
    public $twitter_username;

    /** @var int $public_repos */
    public $public_repos;

    /** @var int $public_gists */
    public $public_gists;

    /** @var int $followers */
    public $followers;

    /** @var int $following */
    public $following;

    /** @var string $created_at */
    public $created_at;

    /** @var string $updated_at */
    public $updated_at;
}
