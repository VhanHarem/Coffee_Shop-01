<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - Coffee Haven</title>

    <!-- Tailwind + Font Awesome (for icons) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
      /* small custom tweaks */
      .glass { background: rgba(255,255,255,0.85); backdrop-filter: blur(6px); }
      /* ensure password toggle button doesn't affect layout */
      .pw-toggle { display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:9999px; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-b from-amber-50 to-orange-50 flex items-center justify-center p-4">

<!-- ======================
     Login Card (center)
     ====================== -->
<main class="w-full max-w-3xl">
  <section class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">

    <!-- Left: Hero / Branding -->
    <div class="hidden md:flex flex-col items-start justify-center p-8 rounded-lg glass shadow-lg">
      <!-- branding -->
      <img src="/Coffee_Shop-01/assets/images/logo.png" alt="Coffee Haven logo" class="h-14 mb-4" onerror="this.style.display='none'">
      <h1 class="text-3xl font-bold text-orange-800">Welcome back</h1>
      <p class="mt-3 text-gray-600">Sign in to continue ordering your favorite coffee. New here? <button id="open-signup" class="text-orange-600 font-semibold underline ml-1">Create account</button></p>
      <ul class="mt-6 text-sm text-gray-600 space-y-2">
        <li class="flex items-center gap-2"><i class="fas fa-check text-orange-600"></i> Fast pick-up</li>
        <li class="flex items-center gap-2"><i class="fas fa-star text-orange-600"></i> Rewards & stamps</li>
        <li class="flex items-center gap-2"><i class="fas fa-coffee text-orange-600"></i> Freshly brewed</li>
      </ul>
    </div>

    <!-- Right: Login Form -->
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-8 glass">
      <!-- Form header -->
      <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-orange-800">Login</h2>
        <button id="open-signup-2" class="text-sm text-orange-600 hover:underline hidden md:inline">Sign up</button>
      </div>

      <!-- Login form -->
      <form action="/login" method="post" class="mt-6 space-y-4">
        <label class="block">
          <span class="text-sm text-gray-600">Username or email</span>
          <input name="username" type="text" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm focus:border-orange-500 focus:ring-orange-200 focus:ring-1 px-3 py-2" placeholder="you@example.com or username">
        </label>

        <!-- Password field with show/hide toggle -->
        <label class="block">
          <span class="text-sm text-gray-600">Password</span>
          <div class="relative mt-1">
            <input id="login-password" name="password" type="password" required class="block w-full rounded-md border-gray-200 shadow-sm focus:border-orange-500 focus:ring-orange-200 focus:ring-1 px-3 py-2 pr-12" placeholder="••••••••" aria-describedby="login-pass-toggle">
            <button type="button" id="toggle-login-pass" aria-label="Show password" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 pw-toggle">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </label>

        <div class="flex items-center justify-between">
          <label class="inline-flex items-center gap-2 text-sm text-gray-600">
            <input type="checkbox" name="remember" class="rounded border-gray-300 text-orange-600 focus:ring-orange-500" /> Remember me
          </label>
          <a href="#" class="text-sm text-orange-600 hover:underline">Forgot password?</a>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:gap-3">
          <button type="submit" class="w-full sm:w-auto bg-orange-600 text-white px-6 py-2 rounded-full hover:bg-orange-700 transition">Sign in</button>

          <!-- Visible sign up trigger on mobile and beside CTA -->
          <button type="button" id="open-signup-mobile" class="mt-3 sm:mt-0 w-full sm:w-auto border border-orange-600 text-orange-600 px-6 py-2 rounded-full hover:bg-orange-50 transition">Create account</button>
        </div>
      </form>

      <!-- small footer -->
      <p class="mt-6 text-xs text-gray-500">By signing in you agree to our <a href="#" class="text-orange-600 underline">Terms</a>.</p>
    </div>
  </section>
</main>

<!-- ======================
     Hidden Signup Modal (pops up)
     ====================== -->
<div id="signup-modal" class="fixed inset-0 z-50 hidden items-center justify-center px-4">
  <!-- overlay -->
  <div id="signup-overlay" class="absolute inset-0 bg-black/40"></div>

  <!-- modal content -->
  <div class="relative z-10 w-full max-w-xl bg-white rounded-lg shadow-xl overflow-hidden">
    <!-- modal header -->
    <div class="flex items-center justify-between p-4 border-b">
      <h3 class="text-lg font-semibold text-orange-800">Create an account</h3>
      <button id="close-signup" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></button>
    </div>

    <!-- modal body (signup form) -->
    <div class="p-6">
      <form id="signup-form" method="post" action="/signup" class="space-y-4">
        <label class="block">
          <span class="text-sm text-gray-600">Username</span>
          <input name="username" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-3 py-2 focus:border-orange-500 focus:ring-orange-200 focus:ring-1" placeholder="choose a username">
        </label>

        <label class="block">
          <span class="text-sm text-gray-600">Email</span>
          <!-- email input with dynamic suggestions (see script) -->
          <input id="signup-email" name="email" type="email" required autocomplete="email" list="email-suggestions" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-3 py-2 focus:border-orange-500 focus:ring-orange-200 focus:ring-1" placeholder="name@example.com">
          <datalist id="email-suggestions"></datalist>
        </label>

        <!-- Signup password with toggle -->
        <label class="block">
          <span class="text-sm text-gray-600">Password</span>
          <div class="relative mt-1">
            <input id="signup-pass" name="password" type="password" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-3 py-2 pr-12 focus:border-orange-500 focus:ring-orange-200 focus:ring-1" placeholder="min 8 characters" aria-describedby="signup-pass-toggle">
            <button type="button" id="toggle-signup-pass" aria-label="Show password" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700 pw-toggle">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </label>

        <div class="flex items-center justify-between">
          <button type="submit" class="bg-orange-600 text-white px-5 py-2 rounded-full hover:bg-orange-700 transition">Sign up</button>
          <button type="button" id="cancel-signup" class="text-sm text-gray-600 hover:underline">Cancel</button>
        </div>
      </form>
    </div>

    <!-- modal footer -->
    <div class="p-4 text-xs text-gray-500 border-t">We will send a confirmation email. You can use google, yahoo, outlook or other providers.</div>
  </div>
</div>

<!-- ======================
     Scripts: modal, email suggestions, show/hide password
     ====================== -->
<script>
  // DOM ready
  document.addEventListener('DOMContentLoaded', () => {
    // modal elements
    const modal = document.getElementById('signup-modal');
    const overlay = document.getElementById('signup-overlay');
    const openBtns = [
      document.getElementById('open-signup'),
      document.getElementById('open-signup-2'),
      document.getElementById('open-signup-mobile')
    ];
    const closeBtn = document.getElementById('close-signup');
    const cancelBtn = document.getElementById('cancel-signup');

    function showModal() {
      modal.classList.remove('hidden');
      modal.classList.add('flex');
      // trap focus briefly
      document.querySelector('#signup-modal button, #signup-modal input')?.focus();
      document.body.style.overflow = 'hidden';
    }
    function hideModal() {
      modal.classList.add('hidden');
      modal.classList.remove('flex');
      document.body.style.overflow = '';
    }

    openBtns.forEach(b => { if (b) b.addEventListener('click', showModal); });
    if (closeBtn) closeBtn.addEventListener('click', hideModal);
    if (cancelBtn) cancelBtn.addEventListener('click', hideModal);
    if (overlay) overlay.addEventListener('click', hideModal);

    // close with ESC
    document.addEventListener('keydown', e => { if (e.key === 'Escape') hideModal(); });

    // ---------------------------
    // Email suggestions logic
    // ---------------------------
    const emailInput = document.getElementById('signup-email');
    const datalist = document.getElementById('email-suggestions');
    const COMMON_DOMAINS = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com', 'icloud.com'];

    // Helper: rebuild datalist based on current local part
    function updateEmailSuggestions() {
      const val = (emailInput.value || '').trim();
      // if user already typed @, offer domains that match typed domain portion
      const atIndex = val.indexOf('@');
      let local = val;
      let typedDomain = '';
      if (atIndex !== -1) {
        local = val.slice(0, atIndex);
        typedDomain = val.slice(atIndex + 1);
      }
      // clear datalist
      datalist.innerHTML = '';
      // if no local part, don't populate
      if (!local) return;
      COMMON_DOMAINS.forEach(domain => {
        if (!typedDomain || domain.startsWith(typedDomain)) {
          const option = document.createElement('option');
          option.value = local + '@' + domain;
          datalist.appendChild(option);
        }
      });
    }

    if (emailInput) {
      // update suggestions while typing
      emailInput.addEventListener('input', updateEmailSuggestions);
      // initialize on focus
      emailInput.addEventListener('focus', updateEmailSuggestions);
    }

    // optional: simple client-side signup validation (example)
    const signupForm = document.getElementById('signup-form');
    if (signupForm) {
      signupForm.addEventListener('submit', (e) => {
        const pass = document.getElementById('signup-pass').value || '';
        if (pass.length < 8) {
          e.preventDefault();
          alert('Password must be at least 8 characters.');
          document.getElementById('signup-pass').focus();
        } else {
          // allow form submit to server
          hideModal();
        }
      });
    }

    // ---------------------------
    // Show / hide password toggles
    // ---------------------------
    function initPasswordToggle(btnId, inputId) {
      const btn = document.getElementById(btnId);
      const input = document.getElementById(inputId);
      if (!btn || !input) return;
      btn.addEventListener('click', () => {
        const isPwd = input.type === 'password';
        input.type = isPwd ? 'text' : 'password';
        // swap icon
        btn.innerHTML = isPwd ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
        btn.setAttribute('aria-label', isPwd ? 'Hide password' : 'Show password');
      });
      // keyboard accessible: toggle with Enter/Space when focused
      btn.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          btn.click();
        }
      });
    }

    // initialize toggles
    initPasswordToggle('toggle-login-pass', 'login-password');
    initPasswordToggle('toggle-signup-pass', 'signup-pass');

  });
</script>

</body>
</html>