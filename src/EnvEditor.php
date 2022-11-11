<?php

namespace Mohkoma\LaravelEnvEditor;

use Dotenv\Dotenv;
use Illuminate\Support\Facades\Storage;

final class EnvEditor
{
    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    private $disk;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $env;

    /**
     * Construct
     *
     * @param string $disk
     * @param string $path
     */
    public function __construct(string $disk = null, string $path = null)
    {
        // Define the disk
        $this->disk = $disk
            ? Storage::disk($disk)
            : Storage::build(['driver' => 'local', 'root' => base_path()]);
        // Define the file path
        $this->path = $path ?? '.env';
        // Get the file content
        $this->env = $this->disk->get($this->path);
    }

    /**
     *  Get the env content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->env;
    }

    /**
     *  Set the env content
     *
     * @return self
     */
    public function setContent(string $content): self
    {
        // Set the file content
        $this->disk->put($this->path, $content);
        // Return back the new instance
        return $this;
    }

    /**
     *  Refresh the env file
     *
     * @return void
     */
    public function refresh(): void
    {
        $this->env = $this->disk->get($this->path);
    }

    /**
     *  Validate the env content
     *
     * @param string $content
     * @return mixed
     */
    public static function validate(string $content): mixed
    {
        return Dotenv::parse($content);
    }
}
