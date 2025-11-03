<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - Coffee Haven</title>

    <!-- Poppins font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind + Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
      body { font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
      .glass { background: rgba(255,255,255,0.85); backdrop-filter: blur(6px); }
      .pw-toggle { display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:9999px; }

      /* Background image with subtle blur (keep behind content) */
      body::before {
        content: "";
        position: fixed;
        inset: 0;
        background-image: url('/Coffee_Shop-01/assets/images/coffeeshop.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(6px) brightness(0.62);
        z-index: -1;
        transform: scale(1.02);
      }

      @media (max-width: 640px) {
        body::before { filter: blur(5px) brightness(0.68); }
      }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-bg from-amber-50 to-orange-50 flex flex-col">

    <!-- ===== Navigation Bar (aligned with home navigation) ===== -->
     <header class="bg-orange-600 fixed w-full top-0 z-50">
        <nav class="container mx-auto px-2 py-3">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <img src="/Coffee_Shop-01/assets/images/logo.png" alt="Coffee Haven logo" class="h-10">
                    <span class="text-white text-xl font-bold ml-3">Coffee Haven</span>
                </div>

                <!-- Desktop nav links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= site_url('home') ?>" class="text-white hover:text-orange-200">Home</a>
                    <a href="<?= site_url('menu') ?>" class="text-white hover:text-orange-200">Menu</a>
                    <a href="<?= site_url('orders') ?>" class="text-white hover:text-orange-200">Orders</a>
                    <a href="<?= site_url('stamps') ?>" class="text-white hover:text-orange-200">Stamps</a>
                    <a href="<?= site_url('contact') ?>" class="text-white hover:text-orange-200">Contact</a>
                    <a href="<?= site_url('login') ?>" class="bg-white text-orange-600 px-4 py-2 rounded-full hover:bg-orange-100">Login</a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden text-white" aria-label="Toggle menu">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile menu (hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden mt-2">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="<?= site_url('home') ?>" class="block text-white py-2">Home</a>
                    <a href="<?= site_url('menu') ?>" class="block text-white py-2">Menu</a>
                    <a href="<?= site_url('orders') ?>" class="block text-white py-2">Orders</a>
                    <a href="<?= site_url('stamps') ?>" class="block text-white py-2">Stamps</a>
                    <a href="<?= site_url('contact') ?>" class="block text-white py-2">Contact</a>
                    <a href="<?= site_url('login') ?>" class="block text-white py-2">Login</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Spacer to avoid header overlap -->
    <div class="h-16 md:h-20"></div>

    <!-- ======================
         Login Card (center) - Combined Sign in / Sign up tabs
         ====================== -->
   <main class="w-full max-w-md mx-auto px-4 py-6">
  <div class="bg-white rounded-lg shadow-lg p-6 md:p-8 glass auth-tabs">
    <!-- Radio inputs control the tabs -->
    <input type="radio" name="auth-tab" id="tab-login" checked>
    <input type="radio" name="auth-tab" id="tab-signup">

    <div class="flex items-center justify-between mb-4">
      <div class="flex items-center gap-2">
        <h2 class="text-2xl font-semibold text-orange-800">Account</h2>
      </div>
    </div>

    <style>
      /* small tab-show/hide using radios */
      .auth-tabs input[type="radio"] { display: none; }
      .auth-tabs .forms > .panel { display: none; }
      #tab-login:checked ~ .forms .panel-login { display: block; }
      #tab-signup:checked ~ .forms .panel-signup { display: block; }
      /* active tab styles (labels) */
      #tab-login:checked ~ .flex label[for="tab-login"],
      #tab-signup:checked ~ .flex label[for="tab-signup"] { background: rgba(255,255,255,0); }
    </style>

    <div class="forms">
      <!-- Login panel -->
      <div class="panel panel-login">
        <form action="/login" method="post" class="mt-2 space-y-4">
          <label class="block">
            <span class="text-sm text-gray-600">Username or email</span>
            <input name="username" type="text" required
              class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:border-orange-500 focus:ring-orange-200 focus:ring-1 px-3 py-2"
              placeholder="you@example.com or username">
          </label>

          <label class="block">
            <span class="text-sm text-gray-600">Password</span>
            <div class="relative mt-1">
              <input id="login-password" name="password" type="password" required
                class="block w-full rounded-md border-gray-200 shadow-sm focus:border-orange-500 focus:ring-orange-200 focus:ring-1 px-3 py-2 pr-12"
                placeholder="••••••••">
              <button type="button" id="toggle-login-pass" aria-label="Show password"
                class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 pw-toggle">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </label>

          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 text-sm text-gray-600">
              <input type="checkbox" name="remember" class="rounded border-gray-300 text-orange-600 focus:ring-orange-500">
              Remember me
            </label>
            <a href="#" class="text-sm text-orange-600 hover:underline">Forgot password?</a>
          </div>

          <div class="flex flex-col gap-3">
            <button type="submit" class="w-full bg-orange-600 text-white px-6 py-2 rounded-full hover:bg-orange-700 transition">
              Sign in
            </button>
            <div class="text-center">
              <span class="text-sm text-gray-500">Don't have an account? </span>
              <label for="tab-signup" class="text-sm text-orange-600 hover:underline cursor-pointer">Create account</label>
            </div>
          </div>
        </form>
      </div>

      <!-- Signup panel -->
      <div class="panel panel-signup">
        <form id="signup-form" method="post" action="/signup" class="space-y-4">
          <label class="block">
            <span class="text-sm text-gray-600">Username</span>
            <input name="username" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-3 py-2 focus:border-orange-500 focus:ring-orange-200 focus:ring-1" placeholder="choose a username">
          </label>

          <label class="block">
            <span class="text-sm text-gray-600">Email</span>
            <input id="signup-email" name="email" type="email" required autocomplete="email" list="email-suggestions" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-3 py-2 focus:border-orange-500 focus:ring-orange-200 focus:ring-1" placeholder="name@example.com">
            <datalist id="email-suggestions"></datalist>
          </label>

          <label class="block">
            <span class="text-sm text-gray-600">Password</span>
            <div class="relative mt-1">
              <input id="signup-pass" name="password" type="password" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-3 py-2 pr-12 focus:border-orange-500 focus:ring-orange-200 focus:ring-1" placeholder="min 8 characters">
              <button type="button" id="toggle-signup-pass" aria-label="Show password" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 pw-toggle">
                <i class="fas fa-eye"></i>
              </button>
            </div>
          </label>

          <div class="flex items-center justify-between">
            <button type="submit" class="bg-orange-600 text-white px-5 py-2 rounded-full hover:bg-orange-700 transition">Sign up</button>
            <label for="tab-login" class="text-sm text-gray-600 hover:underline cursor-pointer">Cancel</label>
          </div>
        </form>
      </div>
    </div>

    <p class="mt-6 text-xs text-gray-500 text-center">
      By continuing you agree to our <a href="#" class="text-orange-600 underline">Terms</a>
    </p>
  </div>
</main>

    <!-- Order-required popup (triggers when .order-now is clicked) -->
    <div id="order-required-modal" class="fixed inset-0 z-50 hidden items-center justify-center px-4">
      <div id="order-overlay" class="absolute inset-0 bg-black/40"></div>
      <div class="relative z-10 w-full max-w-md bg-white rounded-lg p-6">
        <h3 class="text-lg font-semibold text-orange-800">Sign in first</h3>
        <p class="mt-2 text-sm text-gray-600">Don't have an account? Create one now.</p>
        <div class="mt-4 flex gap-3 justify-end">
          <button id="order-signin" class="bg-white border border-gray-200 px-4 py-2 rounded-full text-gray-700 hover:bg-gray-50">Sign in</button>
          <button id="order-create" class="bg-orange-600 text-white px-4 py-2 rounded-full hover:bg-orange-700">Create an account</button>
        </div>
      </div>
    </div>

    <!-- Hidden legacy signup modal removed (signup is inside the card now) -->
    <!-- ...existing code... -->
    <!-- Scripts -->
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        // mobile nav toggle (same IDs as home)
        const menuBtn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        if (menuBtn && menu) menuBtn.addEventListener('click', () => menu.classList.toggle('hidden'));

        // email suggestions (signup panel)
        const emailInput = document.getElementById('signup-email');
        const datalist = document.getElementById('email-suggestions');
        const COMMON_DOMAINS = ['gmail.com','yahoo.com','outlook.com','hotmail.com','icloud.com'];
        function updateEmailSuggestions() {
          if (!emailInput) return;
          const val = (emailInput.value || '').trim();
          const atIndex = val.indexOf('@');
          let local = val, typedDomain = '';
          if (atIndex !== -1) { local = val.slice(0, atIndex); typedDomain = val.slice(atIndex + 1); }
          datalist.innerHTML = '';
          if (!local) return;
          COMMON_DOMAINS.forEach(domain => {
            if (!typedDomain || domain.startsWith(typedDomain)) {
              const opt = document.createElement('option'); opt.value = local + '@' + domain; datalist.appendChild(opt);
            }
          });
        }
        if (emailInput) { emailInput.addEventListener('input', updateEmailSuggestions); emailInput.addEventListener('focus', updateEmailSuggestions); }

        // show/hide password toggles
        function initPasswordToggle(btnId, inputId) {
          const btn = document.getElementById(btnId), input = document.getElementById(inputId);
          if (!btn || !input) return;
          btn.addEventListener('click', () => {
            const isPwd = input.type === 'password';
            input.type = isPwd ? 'text' : 'password';
            btn.innerHTML = isPwd ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
            btn.setAttribute('aria-label', isPwd ? 'Hide password' : 'Show password');
          });
          btn.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); btn.click(); } });
        }
        initPasswordToggle('toggle-login-pass','login-password');
        initPasswordToggle('toggle-signup-pass','signup-pass');

        // Handle showing signup tab via hash or query param
        function openSignupTabIfRequested() {
          const hash = location.hash || '';
          const params = new URLSearchParams(location.search);
          if (hash.toLowerCase() === '#signup' || params.get('tab') === 'signup') {
            const signupRadio = document.getElementById('tab-signup');
            if (signupRadio) signupRadio.checked = true;
          }
        }
        openSignupTabIfRequested();

        // Order-required modal logic (delegated)
        const orderModal = document.getElementById('order-required-modal');
        const orderOverlay = document.getElementById('order-overlay');
        const btnSignin = document.getElementById('order-signin');
        const btnCreate = document.getElementById('order-create');

        function showOrderModal() { if (orderModal) orderModal.classList.remove('hidden'), orderModal.classList.add('flex'), document.body.style.overflow = 'hidden'; }
        function hideOrderModal() { if (orderModal) orderModal.classList.add('hidden'), orderModal.classList.remove('flex'), document.body.style.overflow = ''; }

        // delegate clicks on .order-now
        document.addEventListener('click', (e) => {
          const target = e.target.closest && e.target.closest('.order-now');
          if (target) {
            e.preventDefault();
            showOrderModal();
          }
        });

        if (orderOverlay) orderOverlay.addEventListener('click', hideOrderModal);
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') hideOrderModal(); });

        // Buttons in modal
        if (btnSignin) btnSignin.addEventListener('click', () => {
          // if already on login page, show sign-in tab, otherwise navigate to login
          if (location.pathname.endsWith('/login')) {
            const loginRadio = document.getElementById('tab-login');
            if (loginRadio) loginRadio.checked = true;
            hideOrderModal();
          } else {
            location.href = '/login';
          }
        });

        if (btnCreate) btnCreate.addEventListener('click', () => {
          // navigate to login with hash to open signup; if on page, just switch tab
          if (location.pathname.endsWith('/login')) {
            const signupRadio = document.getElementById('tab-signup');
            if (signupRadio) signupRadio.checked = true;
            hideOrderModal();
            history.replaceState(null, '', '/login#signup');
          } else {
            location.href = '/login#signup';
          }
        });

      });
    </script>
</body>
</html>