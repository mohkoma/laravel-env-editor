<?php

namespace Mohkoma\LaravelEnvEditor;

use Dotenv\Dotenv;

final class EnvEditor
{
    /**
     * @var \Dotenv\Dotenv
     */
    private $env;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
    private $path;

    /**
     * Construct
     *
     * @param string $filename
     * @param string $path
     */
    public function __construct(string $filename = '.env', string $path = null)
    {
        $this->filename = $filename;
        $this->path = $path ?? base_path();
        $this->env = Dotenv::createMutable($this->path, $this->filename);
    }

    /**
     * Access a private properity in dotenv class
     *
     * @param string $property
     * @return mixed
     */
    private function getProperty($property)
    {
        // Need a reflaction
        $reflection = new \ReflectionObject($this->env);
        // Handle the property
        $property = $reflection->getProperty($property);
        // Set as accessable
        $property->setAccessible(true);
        // Get the store value
        return $property->getValue($this->env);
    }

    /**
     *  Get the env content
     *
     * @return string
     */
    public function getContent(): string
    {
        // Get the store property
        $store = $this->getProperty('store');
        // Read the store
        return $store->read();
    }

    /**
     *  Set the env content
     *
     * @return self
     */
    public function setContent(string $content): self
    {
        // Define file path
        $path = $this->path.'/'.$this->filename;
        // Confirm file existence
        if (!file_exists($path)) {
            throw new \RuntimeException('.env file does not exist');
        }
        // Store the change
        file_put_contents($path, $content);
        // Refresh the current env
        $this->refresh();
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
        $this->env = Dotenv::createMutable($this->path, $this->filename);
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
