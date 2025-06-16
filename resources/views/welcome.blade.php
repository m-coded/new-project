<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
          <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
         @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-900 text-white min-h-screen">
      

       <nav class="bg-gray-800 px-4 py-4 lg:px-8">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
      <div class="flex items-center space-x-2">
        <div class="w-6 h-6 bg-green-500 rounded"></div>
        
        <span class="text-xl font-semibold">PayMe</span>
    
        <div class="text-1xl font-semibold  p-4 text-right ">
            @if (Route::has('login'))
                <div class="nav-links">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" ></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class=""></a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
      </div>
      
      <div class="hidden p-4 md:flex items-center space-x-8">
        <a href="#" class="text-gray-300 hover:text-white transition-colors">Features</a>
        <a href="#" class="text-gray-300 hover:text-white transition-colors">Pricing</a>
        <a href="#" class="text-gray-300 hover:text-white transition-colors">Support</a>
        <button ><a href="{{ route('register') }}"
         class="bg-green-500 hover:bg-red-600 px-6 py-2 rounded-lg font-medium transition-colors">
            Register </a>
        </button>
         <button ><a href="{{ route('login') }}"
         class="bg-red-500 hover:bg-green-600 px-6 py-2 rounded-lg font-medium transition-colors">
          Login </a>
        </button>
      </div>

      <!-- Mobile menu button -->
      <button id="mobile-menu-btn" class="md:hidden p-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
      <div class="flex flex-col space-y-4">
        <a href="#" class="text-gray-300 hover:text-white transition-colors">Features</a>
        <a href="#" class="text-gray-300 hover:text-white transition-colors">Pricing</a>
        <a href="#" class="text-gray-300 hover:text-white transition-colors">Support</a>
        <button><a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 px-6 py-2 rounded-lg font-medium transition-colors w-fit">
          Get Started</a>
        </button>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="px-4 py-12 lg:px-8 lg:py-20">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col lg:flex-row items-center gap-12">
        <!-- Calendar Image -->
        <div class="w-full lg:w-1/2 flex justify-center">
          <div class="relative">
            <!-- Calendar -->
            <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-t-2xl p-6 w-80 sm:w-96">
              <!-- Calendar rings -->
              <div class="flex justify-center mb-4">
                <div class="flex space-x-16">
                  <div class="w-4 h-8 bg-gray-600 rounded-full"></div>
                  <div class="w-4 h-8 bg-gray-600 rounded-full"></div>
                </div>
              </div>
              
              <!-- Calendar header -->
              <div class="bg-white rounded-lg p-4 mb-4">
                <div class="flex justify-between text-gray-600 text-sm font-medium mb-3">
                  <span>MON</span>
                  <span>TUE</span>
                  <span>WED</span>
                  <span>THU</span>
                  <span>FRI</span>
                  <span>SAT</span>
                </div>
                
                <!-- Calendar grid -->
                <div class="grid grid-cols-6 gap-2">
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-orange-500 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-gray-100 rounded"></div>
                  <div class="w-8 h-8 bg-orange-500 rounded"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Hero Content -->
        <div class="w-full lg:w-1/2 text-center lg:text-left">
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
            Never Miss a Payment Again
          </h1>
          <p class="text-gray-300 text-lg mb-8 max-w-2xl">
            PayMe helps you stay on top of your bills with timely reminders, ensuring you avoid late fees and maintain good financial standing. Our service sends automated reminder messages to users with outstanding bills, reminding them to pay on time.
          </p>
          <button><a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 px-8 py-3 rounded-lg font-semibold text-lg transition-colors">
            Get Started</a>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Key Features Section -->
  <section class="px-4 py-16 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-center lg:text-left">Key Features</h2>
      <p class="text-gray-300 mb-12 text-center lg:text-left max-w-2xl">
        PayMe offers a range of features designed to simplify bill management and ensure timely payments.
      </p>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="bg-gray-800 p-6 rounded-xl">
          <div class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-5a7.5 7.5 0 1 0-15 0v5"></path>
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-3">Customizable Reminders</h3>
          <p class="text-gray-400">
            Set reminders for each bill, tailored to your preferred notification method and timing.
          </p>
        </div>

        <!-- Feature 2 -->
        <div class="bg-gray-800 p-6 rounded-xl">
          <div class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-3">Payment Tracking</h3>
          <p class="text-gray-400">
            Monitor your payment history and upcoming due dates in a clear, organized dashboard.
          </p>
        </div>

        <!-- Feature 3 -->
        <div class="bg-gray-800 p-6 rounded-xl">
          <div class="w-12 h-12 bg-gray-700 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-3">Secure and Reliable</h3>
          <p class="text-gray-400">
            Rest assured that your financial information is protected with our robust security measures.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-800 px-4 py-8 lg:px-8 mt-16">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
        <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-8">
          <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a>
        </div>
        <p class="text-gray-500 text-sm">© 2024 PayMe. All rights reserved.</p>
      </div>
    </div>
  </footer>

    </body>
</html>
