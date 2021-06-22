<?php

namespace app\components\Github\Dto;

use app\components\Github\Dto\UserDto;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class RepositoryDto extends FlexibleDataTransferObject
{
    /** @var int $id */
    public $id;

    /** @var string $node_id */
    public $node_id;

    /** @var string $name */
    public $name;

    /** @var string $full_name */
    public $full_name;

    /** @var bool $private */
    public $private;

    /** @var array $owner */
    public $owner;

    /** @var string $html_url */
    public $html_url;

    /** @var mixed $description */
    public $description;

    /** @var bool $fork */
    public $fork;

    /** @var string $url */
    public $url;

    /** @var string $forks_url */
    public $forks_url;

    /** @var string $keys_url */
    public $keys_url;

    /** @var string $collaborators_url */
    public $collaborators_url;

    /** @var string $teams_url */
    public $teams_url;

    /** @var string $hooks_url */
    public $hooks_url;

    /** @var string $issue_events_url */
    public $issue_events_url;

    /** @var string $events_url */
    public $events_url;

    /** @var string $assignees_url */
    public $assignees_url;

    /** @var string $branches_url */
    public $branches_url;

    /** @var string $tags_url */
    public $tags_url;

    /** @var string $blobs_url */
    public $blobs_url;

    /** @var string $git_tags_url */
    public $git_tags_url;

    /** @var string $git_refs_url */
    public $git_refs_url;

    /** @var string $trees_url */
    public $trees_url;

    /** @var string $statuses_url */
    public $statuses_url;

    /** @var string $languages_url */
    public $languages_url;

    /** @var string $stargazers_url */
    public $stargazers_url;

    /** @var string $contributors_url */
    public $contributors_url;

    /** @var string $subscribers_url */
    public $subscribers_url;

    /** @var string $subscription_url */
    public $subscription_url;

    /** @var string $commits_url */
    public $commits_url;

    /** @var string $git_commits_url */
    public $git_commits_url;

    /** @var string $comments_url */
    public $comments_url;

    /** @var string $issue_comment_url */
    public $issue_comment_url;

    /** @var string $contents_url */
    public $contents_url;

    /** @var string $compare_url */
    public $compare_url;

    /** @var string $merges_url */
    public $merges_url;

    /** @var string $archive_url */
    public $archive_url;

    /** @var string $downloads_url */
    public $downloads_url;

    /** @var string $issues_url */
    public $issues_url;

    /** @var string $pulls_url */
    public $pulls_url;

    /** @var string $milestones_url */
    public $milestones_url;

    /** @var string $notifications_url */
    public $notifications_url;

    /** @var string $labels_url */
    public $labels_url;

    /** @var string $releases_url */
    public $releases_url;

    /** @var string $deployments_url */
    public $deployments_url;

    /** @var string $created_at */
    public $created_at;

    /** @var string $updated_at */
    public $updated_at;

    /** @var string $pushed_at */
    public $pushed_at;

    /** @var string $git_url */
    public $git_url;

    /** @var string $ssh_url */
    public $ssh_url;

    /** @var string $clone_url */
    public $clone_url;

    /** @var string $svn_url */
    public $svn_url;

    /** @var mixed $homepage */
    public $homepage;

    /** @var int $size */
    public $size;

    /** @var int $stargazers_count */
    public $stargazers_count;

    /** @var int $watchers_count */
    public $watchers_count;

    /** @var mixed $language */
    public $language;

    /** @var bool $has_issues */
    public $has_issues;

    /** @var bool $has_projects */
    public $has_projects;

    /** @var bool $has_downloads */
    public $has_downloads;

    /** @var bool $has_wiki */
    public $has_wiki;

    /** @var bool $has_pages */
    public $has_pages;

    /** @var int $forks_count */
    public $forks_count;

    /** @var mixed $mirror_url */
    public $mirror_url;

    /** @var bool $archived */
    public $archived;

    /** @var bool $disabled */
    public $disabled;

    /** @var int $open_issues_count */
    public $open_issues_count;

    /** @var mixed $license */
    public $license;

    /** @var int $forks */
    public $forks;

    /** @var int $open_issues */
    public $open_issues;

    /** @var int $watchers */
    public $watchers;

    /** @var string $default_branch */
    public $default_branch;
}