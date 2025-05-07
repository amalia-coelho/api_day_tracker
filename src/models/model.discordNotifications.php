<?php

namespace App\Models;

use Exception;

class DiscordNotifications{
    // Define as webhooks no início, organizadas por tipo
    private static $webhooks = [
        'error'   => "https://discord.com/api/webhooks/1369494562539704421/-0nG0NzmvB0Tk9bwIwKx-n2C4EG6IfC_gIKzM6uSTCaettdH3dcc7VN9w00Lqf71q5us",
        'debug'   => "https://discord.com/api/webhooks/1369494795197743134/5bglZM4UneU6muOGXz-WzrS59O7PGJXgURg2jAjs1nbuhiyuebPVYMvPx6DVVyxLsDrC",
    ];

    // Envia uma mensagem de erro para o Discord
    public static function send_error($message, $context = []){
        $errorMessage = "Erro: " . $message;
        
        if (!empty($context)) {
            $errorMessage .= "\nContexto: " . json_encode($context, JSON_PRETTY_PRINT);
        }

        self::send_to_discord($errorMessage, "Error", 16711680, 'error');
    }

    // Envia uma mensagem de debug para o Discord
    public static function debug($message){
        self::send_to_discord("Debug: " . $message, "Debug", 3066993, 'debug');
    }

    // Método privado para enviar mensagens para o Discord via webhook
    private static function send_to_discord($message, $title, $color, $type){
        // Verifica se a webhook para o tipo especificado existe
        if (!isset(self::$webhooks[$type])) {
            throw new Exception("Webhook não definida para o tipo: $type");
        }

        $webhookUrl = self::$webhooks[$type];

        // Estrutura do JSON com o Embed
        $data = [
            "content" => $message,
            "embeds" => [
                [
                    "title" => $title,
                    "description" => $message,
                    "color" => $color, // Cor configurada
                    "timestamp" => date("c") // Data e hora em formato ISO 8601
                ]
            ]
        ];

        // Codificando o array PHP para JSON
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        // Configurações para a requisição HTTP POST
        $options = [
            'http' => [
                'header'  => "Content-Type: application/json\r\n",
                'method'  => 'POST',
                'content' => $jsonData,
            ]
        ];

        $context  = stream_context_create($options);

        // Envia a requisição
        try {
            file_get_contents($webhookUrl, false, $context);
        } catch (Exception $e) {
            // Caso ocorra um erro ao enviar para o Discord
            error_log("Erro ao enviar mensagem para o Discord: " . $e->getMessage());
        }
    }
}

?>