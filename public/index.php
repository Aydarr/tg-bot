<?php

include '../vendor/autoload.php';

use App\Integration\RequestFactory;
use App\Integration\StreamFactory;
use GuzzleHttp\Client;
use Symfony\Component\Dotenv\Dotenv;
use TgBotApi\BotApiBase\ApiClient;
use TgBotApi\BotApiBase\BotApi;
use TgBotApi\BotApiBase\BotApiNormalizer;
use TgBotApi\BotApiBase\Method\SendMessageMethod;

$dotEnv = new Dotenv();
$dotEnv->load('../.env');

$botToken = $_ENV['BOT_TOKEN'];
$userId = $_ENV['USER_ID'];

$requestFactory = new RequestFactory();
$streamFactory = new StreamFactory();
$client = new Client();

$apiClient = new ApiClient($requestFactory, $streamFactory, $client);
$bot = new BotApi($botToken, $apiClient, new BotApiNormalizer());

$bot->send(SendMessageMethod::create($userId, 'Well hello'));
