<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $assunto = $_POST['assunto'];		
            $mensagem = $_POST['mensagem'];
            
            require 'vendor/autoload.php';
        // enviar para a empresa
            //  dono do emial que vai enviar
            $from = new SendGrid\Email(null, $email); 

            // assunto do email 
            $subject = $assunto;

            // email receptor 
            $to = new SendGrid\Email(null, "wised.dev@gmail.com"); /* email receptor*/
            
            // mensagem do email
            $content = new SendGrid\Content("text/html", "<br><br>Nova mensagem de contato<br><br>Nome: $nome<br><br>Email: $email <br><br>Mensagem: $mensagem"); 
            
            // enviando email
            $mail = new SendGrid\Mail($from, $subject, $to, $content);
            
            //Necessário inserir a chave
            $apiKey = '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';
            $sg = new \SendGrid($apiKey);

            $response = $sg->client->mail()->send()->post($mail);


            
        // enviar msg pro cliente 
            $from = new SendGrid\Email(null, "wised.dev@gmail.com"); 

            // assunto do email 
             $subject = 'Resposta';

            // email receptor 
            $to = new SendGrid\Email(null, $email); /* email receptor*/
        
            // mensagem do email
            $content = new SendGrid\Content("text/html", "Olá $nome <br><br>Aqui é a WISED<br><br>Recebemos o seu Email, responderemos o mais rápido possível<br>portanto, fique atento à sua caixa de Email<br>e obrigado pela sua preferência!!!"); 
        
            // enviando email
            $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
            //Necessário inserir a chave
            $apiKey = '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';
            $sg = new \SendGrid($apiKey);

            $response = $sg->client->mail()->send()->post($mail);




        ?>

        
    </body>
</html>
