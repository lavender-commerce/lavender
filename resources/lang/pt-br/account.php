<?php

return array(

    'username' => 'Usuário',
    'password' => 'Senha',
    'password_confirmation' => 'Confirmação de Senha',
    'e_mail' => 'Email',
    'username_e_mail' => 'Usuário ou Email',

    'signup' => array(
        'title' => 'Cadastro',
        'desc' => 'Nova conta',
        'confirmation_required' => 'Confirmação obrigatória',
        'submit' => 'Criar nova conta',
    ),

    'login' => array(
        'title' => 'Login',
        'desc' => 'Entre com suas credenciais',
        'forgot_password' => '(Esqueci a senha)',
        'remember' => 'Lembre-me',
        'submit' => 'Login',
    ),

    'forgot' => array(
        'title' => 'Esqueci a senha',
        'submit' => 'Continuar',
    ),

    'alerts' => array(
        'account_confirm' => 'Você receberá um email de confirmação em breve.',
        'instructions_sent'       => 'Por favor, confira em seu email as instruções para confirmar a conta.',
        'too_many_attempts' => 'Muitas tentativas. Tente novamente em instantes.',
        'wrong_credentials' => 'Usuário ou senha incorretos.',
        'not_confirmed' => 'Your account may not be confirmed. Check your email for the confirmation link',
        'not_confirmed' => 'Sua conta pode não ter sido confirmada. Verifique novamente o email de confirmação',
        'confirmation' => 'Sua con ta foi confirmada! Você já pode fazer login.',
        'wrong_confirmation' => 'Wrong confirmation code.',
        'wrong_confirmation' => 'Código de confirmação incorreto.',
        'password_forgot' => 'A informação sobre recuperação da senha foi enviada ao seu email.',
        'wrong_password_forgot' => 'Usuário não encontrado.',
        'password_reset' => 'Senha alterada com sucesso.',
        'wrong_password_reset' => 'Senha inválida. Tente novamente.',
        'wrong_token' => 'O token para recuperação de senha não é válido.',
        'duplicated_credentials' => 'As credenciais fornecidas já estão em uso. Tente com credenciais diferentes.',
        'does_not_exist' => 'Impossível atualizar esta conta. Tente com credenciais diferentes.',
    ),

    'email' => array(
        'confirmation' => array(
            'subject' => 'Confirmação de conta',
            'greetings' => 'Olá',
            'body' => 'Por favor, acesse o link abaixo para confirmar sua conta.',
            'farewell' => 'Saudações',
        ),

        'password_reset' => array(
            'subject' => 'Recuperação de senha',
            'greetings' => 'Olá',
            'body' => 'Por favor, acesse o link abaixo para confirmar sua conta.',
            'farewell' => 'Saudações',
        ),
    ),

);
