<?php

namespace App\Integration;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream(string $content = ''): StreamInterface
    {
        return Utils::streamFor($content);
    }

    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface
    {
        return $this->createStreamFromResource(Utils::tryFopen($filename, $mode));
    }

    public function createStreamFromResource($resource): StreamInterface
    {
        return new Stream($resource);
    }
}