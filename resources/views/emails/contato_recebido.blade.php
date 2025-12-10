<html>
<body>
    <h1>Contato {{ getItem('client') }}</h1>

    <p><strong>Nome:</strong> {{ $nome }}</p>
    <p><strong>Telefone:</strong> {{ $whatsapp }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Mensagem:</strong> {{ $mensagem }}</p>
    <p><strong>Data de interesse:</strong> {{ date("d/m/Y") }}</p>
    <p><strong>Horário de interesse:</strong> {{ date('H:i') }}</p>
</body>
</html>