@extends('front.layouts.master')


@section('title', 'Subscription Successful')

@section('content')
<div class="success-page">
    <div class="success-container">
        <!-- Success Icon -->
        <div class="success-icon">
            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <!-- Headline -->
        <h1>🎉 Subscription Successful!</h1>
        <p>Thank you for subscribing! Your payment has been processed successfully.</p>

        <!-- Optional session info -->
        @if(isset($session_id))
            <p class="session-id">Session ID: <code>{{ $session_id }}</code></p>
        @endif

        <!-- Buttons -->
        <div class="buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">Go to Dashboard</a>
           
        </div>
    </div>
</div>

<style>
/* Page styling */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f3f4f6;
}

/* Container */
.success-page {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

.success-container {
    background-color: #fff;
    padding: 40px 30px;
    max-width: 500px;
    width: 100%;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Success icon */
.success-icon {
    background-color: #d1fae5;
    display: inline-flex;
    padding: 20px;
    border-radius: 50%;
    margin-bottom: 20px;
}

/* Headline */
.success-container h1 {
    color: #16a34a;
    font-size: 28px;
    margin-bottom: 10px;
}

/* Paragraph */
.success-container p {
    color: #374151;
    margin-bottom: 20px;
    line-height: 1.5;
}

/* Session ID */
.session-id {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 20px;
    word-break: break-all;
}

/* Buttons */
.buttons {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.buttons .btn {
    text-decoration: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-primary {
    background-color: #3b82f6;
    color: white;
}

.btn-primary:hover {
    background-color: #2563eb;
}

.btn-secondary {
    border: 2px solid #3b82f6;
    color: #3b82f6;
}

.btn-secondary:hover {
    background-color: #eff6ff;
}

/* Responsive */
@media (min-width: 480px) {
    .buttons {
        flex-direction: row;
        justify-content: center;
    }
    .buttons .btn {
        min-width: 150px;
    }
}
</style>
@endsection
