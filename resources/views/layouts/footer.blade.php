<!-- Footer -->
<footer class="dark:bg-jacarta-900 page-footer bg-white">
    <div class="container">
      <div class="grid grid-cols-12 gap-x-7 gap-y-14 pt-24 pb-12 md:grid-cols-12">
        <div class="col-span-3 md:col-span-4">
          <!-- Logo -->
          <a href="index.html" class="mb-12 inline-block">
            <h1>KBLB V3</h1>
            {{-- <img src="img/logo.png" class="max-h-7 dark:hidden" alt="Xhibiter | NFT Marketplace" />
            <img src="img/logo_white.png" class="hidden max-h-7 dark:block" alt="Xhibiter | NFT Marketplace" /> --}}
          </a>
          <p class="dark:text-jacarta-300 mb-12">
            Keluh Basah Lele Beramal merupakan gerakan amal yang digalang oleh penghuni lele untuk membantu sesama lele yang membutuhkan
          </p>
          <!-- Socials -->
          <div class="flex space-x-5">
            <a href="#" class="group">
              <svg
                aria-hidden="true"
                focusable="false"
                data-prefix="fab"
                data-icon="facebook"
                class="group-hover:fill-accent fill-jacarta-300 h-5 w-5 dark:group-hover:fill-white"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                style="float: left"
              >
                <path
                  d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
                ></path>
              </svg>
              &nbsp; Facebook Group KBLB V3
            </a>
          </div>
        </div>

        <div class="col-span-full sm:col-span-3 md:col-span-2 md:col-start-7">
          <h3 class="font-display text-jacarta-700 mb-6 text-sm dark:text-white"></h3>
          <ul class="dark:text-jacarta-300 flex flex-col space-y-1">
          </ul>
        </div>
      </div>
      <div class="flex flex-col items-center justify-between space-y-2 py-8 sm:flex-row sm:space-y-0">
        <span class="dark:text-jacarta-400 text-sm"
          >&copy;
          <script>
            document.write(new Date().getFullYear())
          </script>
          Keluh Basah Lele Beramal V3
         </span
        >
        <ul class="dark:text-jacarta-400 flex flex-wrap space-x-4 text-sm">
          <li><a href="#" class="hover:text-accent dark:hover:text-white">Privacy policy</a></li>
        </ul>
      </div>
    </div>
  </footer>

  <!-- JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script src="{{asset('js/app.bundle.js')}}"></script>
  {{-- <script src="{{asset('js/charts.bundle.js')}}"></script> --}}
  @yield('script')
</body>
</html>
