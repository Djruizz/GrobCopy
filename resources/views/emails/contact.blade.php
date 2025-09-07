
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>📧 Nuevo Mensaje de Contacto</h1>
            <p class="subtitle">Formulario de contacto desde el sitio web</p>
        </div>
        
        <!-- Información del Usuario -->
        <div class="info-section">
            <div class="info-row">
                <span class="info-label">👤 Nombre:</span>
                <span class="info-value">{{$data['name']}}</span>
            </div>
            
            <div class="info-row">
                <span class="info-label">📧 Email:</span>
                <span class="info-value">{{$data['email']}}</span>
            </div>
            
            <div class="info-row">
                <span class="info-label">📱 Teléfono:</span>
                <span class="info-value">{{$data['phone']}}</span>
            </div>
            
            <div class="info-row">
                <span class="info-label">🏛️ Estado:</span>
                <span class="info-value">{{$data['state']}}</span>
            </div>
            
            <div class="info-row">
                <span class="info-label">🏙️ Ciudad:</span>
                <span class="info-value">{{$data['city']}}</span>
            </div>
        </div>
        
        <!-- Comentarios -->
        <div class="comments-section">
            <div class="comments-title">💬 Mensaje del Usuario:</div>
            <div class="comments-text">{{$data['comments']}}</div>
        </div>
        
        <!-- Timestamp -->
        <div class="timestamp">
            <strong>Fecha y hora:</strong> {{$data['date']}}
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p>Este mensaje fue enviado desde el formulario de contacto del sitio web.<br>
            Por favor, responde directamente al email del usuario para continuar la conversación.</p>
        </div>
    </div>
</body>
</html>