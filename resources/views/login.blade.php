<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Login - Portal Diskominfo</title>
  
  <!-- CDN GOOGLE MATERIAL SYMBOLS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  
  <!-- GOOGLE FONTS INTER -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- TAILWIND CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <style>
    * {
      font-family: 'Inter', sans-serif;
    }
    
    body {
      background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
      position: relative;
      overflow: hidden;
    }
    
    /* Animated Background Orbs */
    body::before {
      content: '';
      position: absolute;
      width: 600px;
      height: 600px;
      background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, transparent 70%);
      top: -200px;
      right: -200px;
      animation: floatOrb 20s ease-in-out infinite;
      pointer-events: none;
    }
    
    body::after {
      content: '';
      position: absolute;
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, rgba(139, 92, 246, 0.12) 0%, transparent 70%);
      bottom: -150px;
      left: -150px;
      animation: floatOrb 25s ease-in-out infinite reverse;
      pointer-events: none;
    }
    
    @keyframes floatOrb {
      0%, 100% { transform: translate(0, 0) scale(1); }
      33% { transform: translate(30px, -30px) scale(1.1); }
      66% { transform: translate(-20px, 20px) scale(0.9); }
    }
    
    /* Glassmorphism Card */
    .glass-card {
      background: rgba(255, 255, 255, 0.07);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.12);
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }
    
    .glass-card:hover {
      border-color: rgba(255, 255, 255, 0.2);
      box-shadow: 0 30px 60px -12px rgba(59, 130, 246, 0.3);
    }
    
    /* Gradient Header */
    .gradient-header {
      background: linear-gradient(135deg, #1e3a5f 0%, #1e1b4b 50%, #312e81 100%);
      position: relative;
      overflow: hidden;
    }
    
    .gradient-header::before {
      content: '';
      position: absolute;
      width: 200px;
      height: 200px;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
      top: -50px;
      right: -50px;
      border-radius: 50%;
    }
    
    .gradient-header::after {
      content: '';
      position: absolute;
      width: 150px;
      height: 150px;
      background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
      bottom: -30px;
      left: -30px;
      border-radius: 50%;
    }
    
    /* Logo Animation */
    .logo-icon {
      animation: pulseGlow 3s ease-in-out infinite;
    }
    
    @keyframes pulseGlow {
      0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
      50% { box-shadow: 0 0 40px rgba(99, 102, 241, 0.5); }
    }
    
    /* Modern Input Fields */
    .input-modern {
      background: rgba(255, 255, 255, 0.05);
      border: 1.5px solid rgba(255, 255, 255, 0.1);
      color: #e2e8f0;
      transition: all 0.3s ease;
    }
    
    .input-modern:hover {
      border-color: rgba(255, 255, 255, 0.2);
    }
    
    .input-modern:focus {
      background: rgba(255, 255, 255, 0.08);
      border-color: #60a5fa;
      box-shadow: 0 0 0 4px rgba(96, 165, 250, 0.15);
      outline: none;
    }
    
    .input-modern::placeholder {
      color: rgba(255, 255, 255, 0.4);
    }
    
    .input-modern:-webkit-autofill {
      -webkit-box-shadow: 0 0 0 30px rgba(30, 58, 95, 0.8) inset !important;
      -webkit-text-fill-color: #e2e8f0 !important;
    }
    
    /* Modern Button */
    .btn-login {
      background: linear-gradient(135deg, #3b82f6, #6366f1);
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    
    .btn-login::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }
    
    .btn-login:hover::before {
      left: 100%;
    }
    
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 20px 40px -12px rgba(59, 130, 246, 0.5);
    }
    
    .btn-login:active {
      transform: scale(0.97);
    }
    
    /* Floating Labels */
    .floating-label {
      color: rgba(255, 255, 255, 0.5);
      font-weight: 500;
      letter-spacing: 0.05em;
      transition: all 0.3s ease;
    }
    
    .input-group:focus-within .floating-label {
      color: #60a5fa;
      transform: translateY(-2px);
    }
    
    /* Toggle Button - Simple version */
    .toggle-btn {
      color: rgba(255, 255, 255, 0.3);
      transition: color 0.3s ease;
      cursor: pointer;
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: transparent;
      border: none;
      padding: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .toggle-btn:hover {
      color: rgba(255, 255, 255, 0.8);
    }
    
    .toggle-btn .material-symbols-outlined {
      font-size: 22px;
      transition: none;
    }
    
    /* Error Message */
    .error-message {
      animation: slideDown 0.3s ease;
    }
    
    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    /* Decorative Lines */
    .decorative-line {
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

  <!-- Container Utama -->
  <div class="w-full max-w-md relative z-10">
    
    <!-- Glass Card -->
    <div class="glass-card rounded-3xl overflow-hidden transition-all duration-500">
      
      <!-- Header Elegant -->
      <div class="gradient-header p-8 text-center text-white relative">
        
        <!-- Icon Lambang -->
        <div class="logo-icon w-16 h-16 bg-gradient-to-br from-blue-500/20 to-indigo-500/20 backdrop-blur border border-white/20 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-xl text-3xl">
          🏛️
        </div>
        
        <h1 class="text-2xl font-extrabold tracking-wider bg-gradient-to-r from-blue-300 via-white to-indigo-300 bg-clip-text text-transparent">
          DISKOMINFO
        </h1>
        <p class="text-xs text-blue-200/70 mt-2 font-medium tracking-wide uppercase">
          Sistem Informasi & Service
        </p>
        
        <div class="decorative-line mt-4"></div>
      </div>

      <!-- Form Login -->
      <form method="POST" action="{{ route('login') }}" class="p-8 space-y-6">
        @csrf

        <!-- Username Input -->
        <div class="space-y-2 input-group">
          <label for="username" class="floating-label text-xs uppercase tracking-wider flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">person</span>
            Username
          </label>
          <div class="relative">
            <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
              class="input-modern w-full pl-11 pr-4 py-3 text-sm rounded-xl transition-all duration-300"
              placeholder="Masukkan username Anda">
          </div>
          @error('username')
            <p class="error-message text-red-400 text-xs mt-1 font-medium flex items-center gap-1">
              <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
            </p>
          @enderror
        </div>

        <!-- Password Input -->
        <div class="space-y-2 input-group">
          <label for="password" class="floating-label text-xs uppercase tracking-wider flex items-center gap-2">
            <span class="material-symbols-outlined text-sm">lock</span>
            Kata Sandi
          </label>
          <div class="relative">
            <input type="password" id="password" name="password" required
              class="input-modern w-full pl-11 pr-14 py-3 text-sm rounded-xl transition-all duration-300"
              placeholder="Masukkan kata sandi">
            
            <!-- Tombol Toggle Password -->
            <button type="button" onclick="togglePassword()" class="toggle-btn focus:outline-none">
              <span id="eye-open" class="material-symbols-outlined">visibility</span>
              <span id="eye-closed" class="material-symbols-outlined hidden">visibility_off</span>
            </button>
          </div>
          @error('password')
            <p class="error-message text-red-400 text-xs mt-1 font-medium flex items-center gap-1">
              <span class="material-symbols-outlined text-sm">error</span> {{ $message }}
            </p>
          @enderror
        </div>

        <!-- Tombol Login -->
        <button type="submit" class="btn-login w-full text-white font-bold py-3.5 rounded-xl text-sm shadow-xl flex items-center justify-center gap-2 transition-all duration-300 mt-2">
          <span>Masuk ke Akun</span>
          <span class="material-symbols-outlined text-base">arrow_forward</span>
        </button>

      </form>

    

    </div>
  </div>

  <!-- Script Toggle Password -->
  <script>
    function togglePassword() {
      const pass = document.getElementById('password');
      const eyeOpen = document.getElementById('eye-open');
      const eyeClosed = document.getElementById('eye-closed');

      if (pass.type === 'password') {
        pass.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
      } else {
        pass.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClosed.classList.add('hidden');
      }
    }
  </script>

</body>
</html>