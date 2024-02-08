<?php

// Função para enviar solicitações POST para o serviço web Python usando curl
function send_post_request($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

// Comando de voz ou texto do usuário
$user_input = "Olá";

// URL da rota do chatbot no serviço web Python (certifique-se de ajustar o endereço)
$url = "http://localhost:5000/chatbot";

// Dados a serem enviados para o serviço web Python
$data = array('user_input' => $user_input);

// Enviar solicitação POST para o serviço web Python
$response = send_post_request($url, $data);

// Exibir a resposta recebida do chatbot
$response_data = json_decode($response, true);
$chatbot_response = $response_data['response'];
echo "Resposta do Chatbot: " . $chatbot_response;

?>
