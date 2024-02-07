<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Configure os detalhes do e-mail de destino (seu e-mail)
    $to = "studios.teamalpha@gmail.com";
    $subject = "Formulário de Contato - $subject";
    $message = "Nome: $name\nEmail: $email\nMensagem:\n$message";

    // Cabeçalhos para o e-mail
    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n";

    // Tente enviar o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "success"; // Envio bem-sucedido
    } else {
        echo "error"; // Erro no envio
    }
} else {
    echo "error"; // Requisição inválida
}
?>
