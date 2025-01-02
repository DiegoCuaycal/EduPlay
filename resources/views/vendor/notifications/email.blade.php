<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .email-wrapper {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #0d6efd;
            padding: 30px 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 15px;
        }
        .header-title {
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
        }
        .header-subtitle {
            color: #ffffff;
            font-size: 16px;
            margin: 10px 0 0;
            text-align: center;
            width: 100%;
        }
        .content {
            padding: 40px 30px;
            text-align: center;
        }
        .greeting {
            color: #0d6efd;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .message {
            color: #444444;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            background-color: #0d6efd;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 30px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0b5ed7;
        }
        .disclaimer {
            color: #666666;
            font-size: 14px;
            margin-bottom: 0;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #eeeeee;
        }
        .footer-text {
            color: #666666;
            font-size: 12px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="email-wrapper">
            <div class="header">
                <h1 class="header-title">PROYECTO DE INVESTIGACIÓN</h1>
                <p class="header-subtitle">Gamificación en la Enseñanza de TIC</p>
            </div>
            
            <div class="content">
                <h2 class="greeting">¡Hola!</h2>
                <p class="message">Has solicitado restablecer tu contraseña. Por favor, haz clic en el botón de abajo para continuar:</p>
                <a href="{{ $actionUrl }}" class="button">Restablecer Contraseña</a>
                <p class="disclaimer">Si no solicitaste este cambio, puedes ignorar este mensaje. Tu contraseña permanecerá segura.</p>
            </div>
            
            <div class="footer">
                <p class="footer-text">&copy; 2025 Gamificación TIC. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>