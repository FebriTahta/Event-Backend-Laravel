@extends('layouts.master')

@section('content')
<div class="container">
    <div class="mx-auto max-w-[48.125rem] md:flex">
      <!-- Form -->
      <div class="mb-12 md:w-1/2 md:pr-8">
        <div class="mb-6">
          <label for="profile-username" class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white">Username<span class="text-red">*</span></label>
          <input type="text" id="profile-username" class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white" placeholder="Enter username" required="">
        </div>
        <div class="mb-6">
          <label for="profile-bio" class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white">Bio<span class="text-red">*</span></label>
          <textarea id="profile-bio" class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white" required="" placeholder="Tell the world your story!"></textarea>
        </div>
        <div class="mb-6">
          <label for="profile-email" class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white">Email address<span class="text-red">*</span></label>
          <input type="text" id="profile-email" class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-lg py-3 hover:ring-2 dark:text-white" placeholder="Enter email" required="">
        </div>
        <div class="mb-6">
          <label for="profile-twitter" class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white">Links<span class="text-red">*</span></label>
          <div class="relative">
            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="fill-jacarta-300 dark:fill-jacarta-400 pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
            </svg>
            <input type="text" id="profile-twitter" class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 w-full rounded-t-lg py-3 pl-10 hover:ring-2 focus:ring-inset dark:text-white" placeholder="@twittername">
          </div>
          <div class="relative">
            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="fill-jacarta-300 dark:fill-jacarta-400 pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
            </svg>
            <input type="text" id="profile-instagram" class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 -mt-px w-full py-3 pl-10 hover:ring-2 focus:ring-inset dark:text-white" placeholder="instagramname">
          </div>
          <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-jacarta-300 dark:fill-jacarta-400 pointer-events-none absolute top-1/2 left-4 h-4 w-4 -translate-y-1/2">
              <path fill="none" d="M0 0h24v24H0z"></path>
              <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-2.29-2.333A17.9 17.9 0 0 1 8.027 13H4.062a8.008 8.008 0 0 0 5.648 6.667zM10.03 13c.151 2.439.848 4.73 1.97 6.752A15.905 15.905 0 0 0 13.97 13h-3.94zm9.908 0h-3.965a17.9 17.9 0 0 1-1.683 6.667A8.008 8.008 0 0 0 19.938 13zM4.062 11h3.965A17.9 17.9 0 0 1 9.71 4.333 8.008 8.008 0 0 0 4.062 11zm5.969 0h3.938A15.905 15.905 0 0 0 12 4.248 15.905 15.905 0 0 0 10.03 11zm4.259-6.667A17.9 17.9 0 0 1 15.973 11h3.965a8.008 8.008 0 0 0-5.648-6.667z"></path>
            </svg>
            <input type="url" id="profile-website" class="dark:bg-jacarta-700 border-jacarta-100 hover:ring-accent/10 focus:ring-accent dark:border-jacarta-600 dark:placeholder:text-jacarta-300 -mt-px w-full rounded-b-lg py-3 pl-10 hover:ring-2 focus:ring-inset dark:text-white" placeholder="yoursitename.com">
          </div>
        </div>
        <div class="mb-6">
          <label class="font-display text-jacarta-700 mb-1 block text-sm dark:text-white">Wallet Address</label>
          <button class="js-copy-clipboard dark:bg-jacarta-700 border-jacarta-100 hover:bg-jacarta-50 dark:border-jacarta-600 dark:text-jacarta-300 flex w-full select-none items-center rounded-lg border bg-white py-3 px-4" data-tippy-content="Copy">
            <span>0x7a9fe22691c811ea339401bbb2leb</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="dark:fill-jacarta-300 fill-jacarta-500 ml-auto mb-px h-4 w-4">
              <path fill="none" d="M0 0h24v24H0z"></path>
              <path d="M7 7V3a1 1 0 0 1 1-1h13a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-4v3.993c0 .556-.449 1.007-1.007 1.007H3.007A1.006 1.006 0 0 1 2 20.993l.003-12.986C2.003 7.451 2.452 7 3.01 7H7zm2 0h6.993C16.549 7 17 7.449 17 8.007V15h3V4H9v3zM4.003 9L4 20h11V9H4.003z"></path>
            </svg>
          </button>
        </div>

        <button class="bg-accent shadow-accent-volume hover:bg-accent-dark rounded-full py-3 px-8 text-center font-semibold text-white transition-all">
          Update Profile
        </button>
      </div>

      <!-- Avatar -->
      <div class="flex space-x-5 md:w-1/2 md:pl-8">
        <form class="shrink-0">
          <figure class="relative inline-block">
            <img src="img/user/user_avatar.gif" alt="collection avatar" class="dark:border-jacarta-600 rounded-xl border-[5px] border-white">
            <div class="group hover:bg-accent border-jacarta-100 absolute -right-3 -bottom-2 h-8 w-8 overflow-hidden rounded-full border bg-white text-center hover:border-transparent">
              <input type="file" accept="image/*" class="absolute top-0 left-0 w-full cursor-pointer opacity-0">
              <div class="flex h-full items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="fill-jacarta-400 h-4 w-4 group-hover:fill-white">
                  <path fill="none" d="M0 0h24v24H0z"></path>
                  <path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"></path>
                </svg>
              </div>
            </div>
          </figure>
        </form>
        <div class="mt-4">
          <span class="font-display text-jacarta-700 mb-3 block text-sm dark:text-white">Profile Image</span>
          <p class="dark:text-jacarta-300 text-sm leading-normal">
            We recommend an image of at least 300x300. Gifs work too. Max 5mb.
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection