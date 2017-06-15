<div class="error_container">
    <div class="error_content">
        <div class="error_title">
            <span style="font-size: 120px">{{ $errorCode or '500' }}</span><br>
            {{ $errorMessage or 'Внутренняя ошибка сервера' }}
        </div>
    </div>
</div>
