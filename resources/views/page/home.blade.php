@extends('layouts.master')

@section('head')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" /> --}}
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" /> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

@endsection

@section('content')
<main class="pt-[5.5rem] lg:pt-24">
    <!-- Banner -->
    <div class="relative">
      <img src="{{asset('lele.jpg')}}"  alt="banner" style="width: 100%; height: 280px;" class="object-cover" />
    </div>
    <!-- end banner -->

    <!-- Profile -->
    <section class="dark:bg-jacarta-800 bg-light-base relative pb-12 pt-28">
      <!-- Avatar -->
      <div class="absolute left-1/2 top-0 z-10 flex -translate-x-1/2 -translate-y-1/2 items-center justify-center">
        <figure class="relative">
          <img
            src="img/collections/collection_avatar.jpg"
            alt="collection avatar"
            class="dark:border-jacarta-600 rounded-xl border-[5px] border-white"
          />
          <div
            class="dark:border-jacarta-600 bg-green absolute -right-3 bottom-0 flex h-6 w-6 items-center justify-center rounded-full border-2 border-white"
            data-tippy-content="Verified Collection"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              width="24"
              height="24"
              class="h-[.875rem] w-[.875rem] fill-white"
            >
              <path fill="none" d="M0 0h24v24H0z"></path>
              <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path>
            </svg>
          </div>
        </figure>
      </div>

      <div class="container">
        <div class="text-center">
          <h2 class="font-display text-jacarta-700 mb-2 text-4xl font-medium dark:text-white">KBLB V3</h2>
          <div class="mb-8">
            <span class="text-jacarta-400 text-sm font-bold">Keluh Basah Lele Beramal 
              @auth
                  (welcome back Sir)
              @endauth
            </span>
          </div>

          <div
            class="dark:bg-jacarta-800 dark:border-jacarta-600 border-jacarta-100 mb-8 inline-flex flex-wrap items-center justify-center rounded-xl border bg-white"
          >
            <a
              href="#"
              class="dark:border-jacarta-600 border-jacarta-100 w-1/2 rounded-l-xl border-r py-4 hover:shadow-md sm:w-32"
            >
              <div class="text-jacarta-700 mb-1 text-base font-bold dark:text-white">7.2K</div>
              <div class="text-2xs dark:text-jacarta-400 font-medium tracking-tight">Open Donasi</div>
            </a>
            <a
              href="#"
              class="dark:border-jacarta-600 border-jacarta-100 w-1/2 py-4 hover:shadow-md sm:w-32 sm:border-r"
            >
              <div class="text-jacarta-700 mb-1 text-base font-bold dark:text-white">5.3K</div>
              <div class="text-2xs dark:text-jacarta-400 font-medium tracking-tight">Closed Donasi</div>
            </a>
            <a
              href="#"
              class="dark:border-jacarta-600 border-jacarta-100 w-1/2 border-r py-4 hover:shadow-md sm:w-32"
            >
              <div
                class="text-jacarta-700 mb-1 flex items-center justify-center text-base font-medium dark:text-white"
              >
                <span class="-mt-px inline-block" data-tippy-content="ETH">
                  <svg
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    x="0"
                    y="0"
                    viewBox="0 0 1920 1920"
                    xml:space="preserve"
                    class="h-4 w-4"
                  >
                    <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z" />
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z" />
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z" />
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z" />
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z" />
                  </svg>
                </span>
                <span class="font-bold">2.55</span>
              </div>
              <div class="text-2xs dark:text-jacarta-400 font-medium tracking-tight">Donasi disalurkan</div>
            </a>
            <a href="#" class="border-jacarta-100 w-1/2 rounded-r-xl py-4 hover:shadow-md sm:w-32">
              <div
                class="text-jacarta-700 mb-1 flex items-center justify-center text-base font-medium dark:text-white"
              >
                <span class="-mt-px inline-block" data-tippy-content="ETH">
                  <svg
                    version="1.1"
                    xmlns="http://www.w3.org/2000/svg"
                    x="0"
                    y="0"
                    viewBox="0 0 1920 1920"
                    xml:space="preserve"
                    class="h-4 w-4"
                  >
                    <path fill="#8A92B2" d="M959.8 80.7L420.1 976.3 959.8 731z" />
                    <path fill="#62688F" d="M959.8 731L420.1 976.3l539.7 319.1zm539.8 245.3L959.8 80.7V731z" />
                    <path fill="#454A75" d="M959.8 1295.4l539.8-319.1L959.8 731z" />
                    <path fill="#8A92B2" d="M420.1 1078.7l539.7 760.6v-441.7z" />
                    <path fill="#62688F" d="M959.8 1397.6v441.7l540.1-760.6z" />
                  </svg>
                </span>
                <span class="font-bold">17.2K</span>
              </div>
              <div class="text-2xs dark:text-jacarta-400 font-medium tracking-tight">Total Donasi</div>
            </a>
          </div>

          <p class="dark:text-jacarta-300 mx-auto max-w-xl text-lg">
            Donasi terbuka dan transparan bagi penghhuni kolam & mereka yang membutuhkan
          </p>

          <div class="mt-6 flex items-center justify-center space-x-2.5">
            
            <div
              class="dark:border-jacarta-600 dark:hover:bg-jacarta-600 border-jacarta-100 dropdown hover:bg-jacarta-100 dark:bg-jacarta-700 rounded-xl border bg-white"
            >
              <a
                href="#"
                class="dropdown-toggle inline-flex h-10 w-10 items-center justify-center text-sm"
                role="button"
                id="collectionShare"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                data-tippy-content="Share"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  width="24"
                  height="24"
                  class="dark:fill-jacarta-200 fill-jacarta-500 h-4 w-4"
                >
                  <path fill="none" d="M0 0h24v24H0z" />
                  <path
                    d="M13.576 17.271l-5.11-2.787a3.5 3.5 0 1 1 0-4.968l5.11-2.787a3.5 3.5 0 1 1 .958 1.755l-5.11 2.787a3.514 3.514 0 0 1 0 1.458l5.11 2.787a3.5 3.5 0 1 1-.958 1.755z"
                  />
                </svg>
              </a>
              <div
                class="dropdown-menu dropdown-menu-end dark:bg-jacarta-800 z-10 hidden min-w-[200px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                aria-labelledby="collectionShare"
              >
                <a
                  href="#"
                  class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                >
                  <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fab"
                    data-icon="facebook"
                    class="group-hover:fill-accent fill-jacarta-300 mr-2 h-4 w-4 dark:group-hover:fill-white"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"
                  >
                    <path
                      d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"
                    ></path>
                  </svg>
                  <span class="mt-1 inline-block">Facebook</span>
                </a>
                <a
                  href="#"
                  class="dark:hover:bg-jacarta-600 font-display hover:bg-jacarta-50 flex w-full items-center rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="group-hover:fill-accent fill-jacarta-300 mr-2 h-4 w-4 dark:group-hover:fill-white"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                      d="M18.364 15.536L16.95 14.12l1.414-1.414a5 5 0 1 0-7.071-7.071L9.879 7.05 8.464 5.636 9.88 4.222a7 7 0 0 1 9.9 9.9l-1.415 1.414zm-2.828 2.828l-1.415 1.414a7 7 0 0 1-9.9-9.9l1.415-1.414L7.05 9.88l-1.414 1.414a5 5 0 1 0 7.071 7.071l1.414-1.414 1.415 1.414zm-.708-10.607l1.415 1.415-7.071 7.07-1.415-1.414 7.071-7.07z"
                    />
                  </svg>
                  <span class="mt-1 inline-block">Copy</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end profile -->

    <!-- Collection -->
    <section class="relative py-24">
      <picture class="pointer-events-none absolute inset-0 -z-10 dark:hidden">
        <img src="img/gradient_light.jpg" alt="gradient" class="h-full w-full" />
      </picture>
      <div class="container">
        <!-- Tabs Nav -->
        <ul
          class="nav nav-tabs dark:border-jacarta-600 border-jacarta-100 mb-12 flex items-center justify-center border-b"
          role="tablist"
        >
          <li class="nav-item" role="presentation">
            @auth
            <button
              class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="items-tab"
              data-bs-toggle="tab"
              data-bs-target="#items"
              type="button"
              role="tab"
              aria-controls="items"
              aria-selected="true"
            >
            @else
            <button
              class="nav-link active hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="items-tab"
              data-bs-toggle="tab"
              data-bs-target="#items"
              type="button"
              role="tab"
              aria-controls="items"
              aria-selected="true"
            >
            @endauth
            
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="mr-1 h-5 w-5 fill-current"
              >
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                  d="M13 21V11h8v10h-8zM3 13V3h8v10H3zm6-2V5H5v6h4zM3 21v-6h8v6H3zm2-2h4v-2H5v2zm10 0h4v-6h-4v6zM13 3h8v6h-8V3zm2 2v2h4V5h-4z"
                />
              </svg>
              <span class="font-display text-base font-medium">Donasi</span>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="activity-tab"
              data-bs-toggle="tab"
              data-bs-target="#activity"
              type="button"
              role="tab"
              aria-controls="activity"
              aria-selected="false"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="mr-1 h-5 w-5 fill-current"
              >
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                  d="M4 5v14h16V5H4zM3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm11.793 6.793L13 8h5v5l-1.793-1.793-3.864 3.864-2.121-2.121-2.829 2.828-1.414-1.414 4.243-4.243 2.121 2.122 2.45-2.45z"
                />
              </svg>
              <span class="font-display text-base font-medium">Activity</span>
            </button>
          </li>
          @auth
          <li class="nav-item" role="presentation">
            @auth
            <button
              class="nav-link active hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="manage-tab"
              data-bs-toggle="tab"
              data-bs-target="#manage"
              type="button"
              role="tab"
              aria-controls="manage"
              aria-selected="false"
            >
            @else
            <button
              class="nav-link hover:text-jacarta-700 text-jacarta-400 relative flex items-center whitespace-nowrap py-3 px-6 dark:hover:text-white"
              id="manage-tab"
              data-bs-toggle="tab"
              data-bs-target="#manage"
              type="button"
              role="tab"
              aria-controls="manage"
              aria-selected="false"
            >
            @endauth
            
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                class="mr-1 h-5 w-5 fill-current"
              >
                <path fill="none" d="M0 0h24v24H0z" />
                <path
                  d="M22 6h-7a6 6 0 1 0 0 12h7v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2zm-7 2h8v8h-8a4 4 0 1 1 0-8zm0 3v2h3v-2h-3z"
                />
              </svg>
              <span class="font-display text-base font-medium">Manage</span>
            </button>
          </li>
          @endauth
        </ul>

        <div class="tab-content">
          <!-- Items Tab -->
          @auth
              <div class="tab-pane fade" id="items" role="tabpanel" aria-labelledby="items-tab">
            @else
              <div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="items-tab">
          @endauth
            <!-- Filters -->
            <div class="mb-8 flex flex-wrap items-center justify-between">
              <div class="flex flex-wrap items-center">
                <!-- Category -->
                <div class="my-1 mr-2.5">
                    <button
                      class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                      id="categoriesFilter"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                          d="M14 10v4h-4v-4h4zm2 0h5v4h-5v-4zm-2 11h-4v-5h4v5zm2 0v-5h5v4a1 1 0 0 1-1 1h-4zM14 3v5h-4V3h4zm2 0h4a1 1 0 0 1 1 1v4h-5V3zm-8 7v4H3v-4h5zm0 11H4a1 1 0 0 1-1-1v-4h5v5zM8 3v5H3V4a1 1 0 0 1 1-1h4z"
                        />
                      </svg>
                      <span>All</span>
                    </button>
                  </div>
                  
                <!-- Blockchain -->
                <div class="my-1 mr-2.5">
                  <button
                    class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M20 16h2v6h-6v-2H8v2H2v-6h2V8H2V2h6v2h8V2h6v6h-2v8zm-2 0V8h-2V6H8v2H6v8h2v2h8v-2h2zM4 4v2h2V4H4zm0 14v2h2v-2H4zM18 4v2h2V4h-2zm0 14v2h2v-2h-2z"
                      />
                    </svg>
                    <span>Open Donasi</span>
                  </button>
                </div>

                <!-- Sale Type -->
                <div class="my-1 mr-2.5">
                    <button
                      class="group dropdown-toggle dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 font-display text-jacarta-700 flex h-9 items-center rounded-lg border bg-white px-4 text-sm font-semibold transition-colors hover:border-transparent hover:text-white dark:text-white"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        width="24"
                        height="24"
                        class="fill-jacarta-700 dark:fill-jacarta-100 mr-1 h-4 w-4 transition-colors group-hover:fill-white"
                      >
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                          d="M3.783 2.826L12 1l8.217 1.826a1 1 0 0 1 .783.976v9.987a6 6 0 0 1-2.672 4.992L12 23l-6.328-4.219A6 6 0 0 1 3 13.79V3.802a1 1 0 0 1 .783-.976zM13 10V5l-5 7h3v5l5-7h-3z"
                        />
                      </svg>
                      <span>Closed Donasi</span>
                    </button>
                  </div>

              </div>

              <!-- Sort -->
              <div class="dropdown my-1 cursor-pointer">
                <div
                  class="dark:bg-jacarta-700 dropdown-toggle border-jacarta-100 dark:border-jacarta-600 inline-flex w-48 items-center justify-between rounded-lg border bg-white py-2 px-3 text-sm dark:text-white"
                  role="button"
                  id="sort"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="font-display">Recently Added</span>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    width="24"
                    height="24"
                    class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                  >
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" />
                  </svg>
                </div>

                <div
                  class="dropdown-menu dark:bg-jacarta-800 z-10 hidden min-w-[220px] whitespace-nowrap rounded-xl bg-white py-4 px-2 text-left shadow-xl"
                  aria-labelledby="sort"
                >
                  <span class="font-display text-jacarta-300 block px-5 py-2 text-sm font-semibold">Sort By</span>
                  <button
                    class="dropdown-item font-display text-jacarta-700 dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Recently Added
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-accent mb-[3px] h-4 w-4"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                    </svg>
                  </button>
                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Price: Low to High
                  </button>

                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Price: High to Low
                  </button>

                  <button
                    class="dropdown-item font-display dark:hover:bg-jacarta-600 hover:bg-jacarta-50 flex w-full items-center justify-between rounded-xl px-5 py-2 text-left text-sm transition-colors dark:text-white"
                  >
                    Auction ending soon
                  </button>
                </div>
              </div>
            </div>
            <!-- end filters -->

            @if (count($donasi) == 0)
                <code> BELUM ADA DONASI</code>
            @else
            <div class="grid grid-cols-1 gap-[1.875rem] md:grid-cols-2 lg:grid-cols-4">
              <article>
                <div
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl block border bg-white p-[1.1875rem] transition-shadow hover:shadow-lg"
                >
                  <figure class="relative">
                    <a href="item.html">
                      <img
                        src="./img/products/item_7.jpg"
                        alt="item 7"
                        class="w-full rounded-[0.625rem]"
                        loading="lazy"
                      />
                    </a>
                    <div
                      class="dark:bg-jacarta-700 absolute top-3 right-3 flex items-center space-x-1 rounded-md bg-white p-2"
                    >
                      <span
                        class="js-likes relative cursor-pointer before:absolute before:h-4 before:w-4 before:bg-[url('../img/heart-fill.svg')] before:bg-cover before:bg-center before:bg-no-repeat before:opacity-0"
                        data-tippy-content="Dilihat"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 24 24"
                          width="24"
                          height="24"
                          class="dark:fill-jacarta-200 fill-jacarta-500 hover:fill-red dark:hover:fill-red h-4 w-4"
                        >
                          <path fill="none" d="M0 0H24V24H0z" />
                          <path
                            d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                          />
                        </svg>
                      </span>
                      <span class="dark:text-jacarta-200 text-sm">160</span>
                    </div>
                    <div class="absolute left-3 -bottom-3">
                      <div class="flex -space-x-2">
                        <a href="#">
                          <img
                            src="img/avatars/creator_3.png"
                            alt="creator"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Creator: Sussygirl"
                          />
                        </a>
                        <a href="#">
                          <img
                            src="img/avatars/owner_3.png"
                            alt="owner"
                            class="dark:border-jacarta-600 hover:border-accent dark:hover:border-accent h-6 w-6 rounded-full border-2 border-white"
                            data-tippy-content="Owner: Sussygirl"
                          />
                        </a>
                      </div>
                    </div>
                  </figure>
                  <div class="mt-7 flex items-center justify-between">
                    <a href="item.html">
                      <span class="font-display text-jacarta-700 hover:text-accent text-base dark:text-white"
                        >Lele Tabrak Truk</span
                      >
                    </a>
                  </div>
                  <div class="mt-2 text-sm">
                    <span class="dark:text-jacarta-200 text-jacarta-700 mr-1">0.078 ETH</span>
                    <span class="dark:text-jacarta-300 text-jacarta-500">1/3</span>
                  </div>

                  <div class="mt-8 flex items-center justify-between">
                    <button
                      class="text-accent font-display text-sm font-semibold"
                      data-bs-toggle="modal"
                      data-bs-target="#buyNowModal"
                    >
                      Donasi Sekarang
                    </button>
                  </div>
                </div>
              </article>
            </div>
            <!-- end grid -->
            @endif
            <!-- Grid -->
          </div>
          <!-- end items tab -->

          <!-- Activity Tab -->
          <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
            <!-- Records / Filter -->
            <div class="lg:flex">
              <!-- Records -->
              <div class="mb-10 shrink-0 basis-8/12 space-y-5 lg:mb-0 lg:pr-10">
                <a
                  href="item.html"
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl relative flex items-center border bg-white p-8 transition-shadow hover:shadow-lg"
                >
                  <figure class="mr-5 self-start">
                    <img src="img/avatars/avatar_2.jpg" alt="avatar 2" class="rounded-2lg" loading="lazy" />
                  </figure>

                  <div>
                    <h3 class="font-display text-jacarta-700 mb-1 text-base font-semibold dark:text-white">
                      Lazyone Panda
                    </h3>
                    <span class="dark:text-jacarta-200 text-jacarta-500 mb-3 block text-sm">sold for 1.515 ETH</span>
                    <span class="text-jacarta-300 block text-xs">30 minutes 45 seconds ago</span>
                  </div>

                  <div class="dark:border-jacarta-600 border-jacarta-100 ml-auto rounded-full border p-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zM19 8H5v12h14V8zm-.5-2L17 4H7L5.5 6h13zM9 10v2a3 3 0 0 0 6 0v-2h2v2a5 5 0 0 1-10 0v-2h2z"
                      />
                    </svg>
                  </div>
                </a>
                <a
                  href="item.html"
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl relative flex items-center border bg-white p-8 transition-shadow hover:shadow-lg"
                >
                  <figure class="mr-5 self-start">
                    <img src="img/products/item_21_sm.jpg" alt="item 2" class="rounded-2lg" loading="lazy" />
                  </figure>

                  <div>
                    <h3 class="font-display text-jacarta-700 mb-1 text-base font-semibold dark:text-white">
                      NFT Funny Cat
                    </h3>
                    <span class="dark:text-jacarta-200 text-jacarta-500 mb-3 block text-sm"
                      >listed by 051_Hart .08095 ETH</span
                    >
                    <span class="text-jacarta-300 block text-xs">40 minutes 36 seconds ago</span>
                  </div>

                  <div class="dark:border-jacarta-600 border-jacarta-100 ml-auto rounded-full border p-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M10.9 2.1l9.899 1.415 1.414 9.9-9.192 9.192a1 1 0 0 1-1.414 0l-9.9-9.9a1 1 0 0 1 0-1.414L10.9 2.1zm.707 2.122L3.828 12l8.486 8.485 7.778-7.778-1.06-7.425-7.425-1.06zm2.12 6.364a2 2 0 1 1 2.83-2.829 2 2 0 0 1-2.83 2.829z"
                      />
                    </svg>
                  </div>
                </a>
                <a
                  href="item.html"
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl relative flex items-center border bg-white p-8 transition-shadow hover:shadow-lg"
                >
                  <figure class="mr-5 self-start">
                    <img src="img/products/item_22_sm.jpg" alt="item 3" class="rounded-2lg" loading="lazy" />
                  </figure>

                  <div>
                    <h3 class="font-display text-jacarta-700 mb-1 text-base font-semibold dark:text-white">
                      Prince Ape Planet
                    </h3>
                    <span class="dark:text-jacarta-200 text-jacarta-500 mb-3 block text-sm"
                      >tranferred from 027ab52</span
                    >
                    <span class="text-jacarta-300 block text-xs">1 hour 15 minutes ago</span>
                  </div>

                  <div class="dark:border-jacarta-600 border-jacarta-100 ml-auto rounded-full border p-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M16.05 12.05L21 17l-4.95 4.95-1.414-1.414 2.536-2.537L4 18v-2h13.172l-2.536-2.536 1.414-1.414zm-8.1-10l1.414 1.414L6.828 6 20 6v2H6.828l2.536 2.536L7.95 11.95 3 7l4.95-4.95z"
                      />
                    </svg>
                  </div>
                </a>
                <a
                  href="item.html"
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl relative flex items-center border bg-white p-8 transition-shadow hover:shadow-lg"
                >
                  <figure class="mr-5 self-start">
                    <img src="img/products/item_23_sm.jpg" alt="item 3" class="rounded-2lg" loading="lazy" />
                  </figure>

                  <div>
                    <h3 class="font-display text-jacarta-700 mb-1 text-base font-semibold dark:text-white">
                      Origin Morish
                    </h3>
                    <span class="dark:text-jacarta-200 text-jacarta-500 mb-3 block text-sm"
                      >bid cancelled by 0397fd</span
                    >
                    <span class="text-jacarta-300 block text-xs">1 hour 55 minutes ago</span>
                  </div>

                  <div class="dark:border-jacarta-600 border-jacarta-100 ml-auto rounded-full border p-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M14 20v2H2v-2h12zM14.586.686l7.778 7.778L20.95 9.88l-1.06-.354L17.413 12l5.657 5.657-1.414 1.414L16 13.414l-2.404 2.404.283 1.132-1.415 1.414-7.778-7.778 1.415-1.414 1.13.282 6.294-6.293-.353-1.06L14.586.686zm.707 3.536l-7.071 7.07 3.535 3.536 7.071-7.07-3.535-3.536z"
                      />
                    </svg>
                  </div>
                </a>
                <a
                  href="item.html"
                  class="dark:bg-jacarta-700 dark:border-jacarta-700 border-jacarta-100 rounded-2.5xl relative flex items-center border bg-white p-8 transition-shadow hover:shadow-lg"
                >
                  <figure class="mr-5 self-start">
                    <img src="img/products/item_24_sm.jpg" alt="item 3" class="rounded-2lg" loading="lazy" />
                  </figure>

                  <div>
                    <h3 class="font-display text-jacarta-700 mb-1 text-base font-semibold dark:text-white">
                      Portrait Gallery#029
                    </h3>
                    <span class="dark:text-jacarta-200 text-jacarta-500 mb-3 block text-sm">liked by Trina_more</span>
                    <span class="text-jacarta-300 block text-xs">2 hours 24 minutes ago</span>
                  </div>

                  <div class="dark:border-jacarta-600 border-jacarta-100 ml-auto rounded-full border p-3">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 dark:fill-white"
                    >
                      <path fill="none" d="M0 0H24V24H0z" />
                      <path
                        d="M12.001 4.529c2.349-2.109 5.979-2.039 8.242.228 2.262 2.268 2.34 5.88.236 8.236l-8.48 8.492-8.478-8.492c-2.104-2.356-2.025-5.974.236-8.236 2.265-2.264 5.888-2.34 8.244-.228zm6.826 1.641c-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-1.575-1.412-3.99-1.35-5.494.154-1.49 1.49-1.565 3.875-.192 5.451L12 18.654l7.02-7.03c1.374-1.577 1.299-3.959-.193-5.454z"
                      />
                    </svg>
                  </div>
                </a>
              </div>

              <!-- Filters -->
              <aside class="basis-4/12 lg:pl-5">
                <form action="search" class="relative mb-12 block">
                  <input
                    type="search"
                    class="text-jacarta-700 placeholder-jacarta-500 focus:ring-accent border-jacarta-100 w-full rounded-2xl border py-[0.6875rem] px-4 pl-10 dark:border-transparent dark:bg-white/[.15] dark:text-white dark:placeholder-white"
                    placeholder="Search"
                  />
                  <button
                    type="submit"
                    class="absolute left-0 top-0 flex h-full w-12 items-center justify-center rounded-2xl"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-500 h-4 w-4 dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path
                        d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"
                      ></path>
                    </svg>
                  </button>
                </form>

                <h3 class="font-display text-jacarta-500 mb-4 font-semibold dark:text-white">Filters</h3>
                <div class="flex flex-wrap">
                  <button
                    class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M14 20v2H2v-2h12zM14.586.686l7.778 7.778L20.95 9.88l-1.06-.354L17.413 12l5.657 5.657-1.414 1.414L16 13.414l-2.404 2.404.283 1.132-1.415 1.414-7.778-7.778 1.415-1.414 1.13.282 6.294-6.293-.353-1.06L14.586.686zm.707 3.536l-7.071 7.07 3.535 3.536 7.071-7.07-3.535-3.536z"
                      />
                    </svg>
                    <span class="text-2xs font-medium">Highest Donatur</span>
                  </button>
                  <button
                    class="dark:border-jacarta-600 dark:bg-jacarta-700 group dark:hover:bg-accent hover:bg-accent border-jacarta-100 mr-2.5 mb-2.5 inline-flex items-center rounded-xl border bg-white px-4 py-3 hover:border-transparent hover:text-white dark:text-white dark:hover:border-transparent"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      width="24"
                      height="24"
                      class="fill-jacarta-700 mr-2 h-4 w-4 group-hover:fill-white dark:fill-white"
                    >
                      <path fill="none" d="M0 0h24v24H0z" />
                      <path
                        d="M16.05 12.05L21 17l-4.95 4.95-1.414-1.414 2.536-2.537L4 18v-2h13.172l-2.536-2.536 1.414-1.414zm-8.1-10l1.414 1.414L6.828 6 20 6v2H6.828l2.536 2.536L7.95 11.95 3 7l4.95-4.95z"
                      />
                    </svg>
                    <span class="text-2xs font-medium">Transfer</span>
                  </button>
                </div>
              </aside>
            </div>
          </div>
          <!-- end activity tab -->

          <!---manage tab-->
          @auth
            <div class="tab-pane fade show active" id="manage" role="tabpanel" aria-labelledby="manage-tab">
            @else
            <div class="tab-pane fade" id="manage" role="tabpanel" aria-labelledby="manage-tab">
          @endauth
            <!-- Records / Filter -->
            <div class="container">
              {{-- <div class="table table-responsive"> --}}
                <table id="example" class="display responsive nowrap" style="width:100%">
                  <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Extn.</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>Tiger</td>
                      <td>Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011-04-25</td>
                      <td>$320,800</td>
                      <td>5421</td>
                      <td>t.nixon@datatables.net</td>
                  </tr>
                  <tr>
                      <td>Garrett</td>
                      <td>Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011-07-25</td>
                      <td>$170,750</td>
                      <td>8422</td>
                      <td>g.winters@datatables.net</td>
                  </tr>
                  <tr>
                      <td>Ashton</td>
                      <td>Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009-01-12</td>
                      <td>$86,000</td>
                      <td>1562</td>
                      <td>a.cox@datatables.net</td>
                  </tr>
                </tbody>
              </table>
              {{-- </div> --}}
              
            </div>
          </div>
          <!---end manage tab-->
        </div>
      </div>
    </section>
    <!-- end collection -->
  </main>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'colvis'
        ]
    } );
} );
</script>
@endsection