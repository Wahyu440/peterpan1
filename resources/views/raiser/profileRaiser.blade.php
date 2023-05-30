<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Raiser - Profile</title>
</head>

<body>
    <div class="container">
        <div class="Navbar w-screen bg-gradient-to-l from-violet-500 to-violet-800 border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="https://flowbite.com" class="flex items-center">
                    <img src="{{ URL('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                </a>
                <div class="flex items-center lg:order-2">
                    <a
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                        {{ Auth::user()->name }}</a>
                    <a href="/raiser/logout"
                        class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                        style="background: linear-gradient(to right, #ee7724, #d8363a);">
                        Logout</a>
                </div>
            </div>
        </div>
        <div class="nav top-0 left-0 z-40 w-40 h-screen transition-transform -translate-x-full sm:translate-x-0">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-100">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/raiser/dashboard"
                            class="flex items-center p-2 text-orange-600 rounded-lg hover:bg-gradient-to-l from-violet-500 to-violet-800 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M16.881 4.346A23.112 23.112 0 018.25 6H7.5a5.25 5.25 0 00-.88 10.427 21.593 21.593 0 001.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.592.772-2.468a17.116 17.116 0 01-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0018 11.25c0-2.413-.393-4.735-1.119-6.904zM18.26 3.74a23.22 23.22 0 011.24 7.51 23.22 23.22 0 01-1.24 7.51c-.055.161-.111.322-.17.482a.75.75 0 101.409.516 24.555 24.555 0 001.415-6.43 2.992 2.992 0 00.836-2.078c0-.806-.319-1.54-.836-2.078a24.65 24.65 0 00-1.415-6.43.75.75 0 10-1.409.516c.059.16.116.321.17.483z" />
                            </svg>
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Activities</span>
                        </a>
                    </li>
                    <li class="rounded-lg" style="background: linear-gradient(to left, #ee7724, #d8363a)">
                        <a href="/raiser/profile"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-gradient-to-l from-violet-500 to-violet-800 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                    clip-rule="evenodd" />
                            </svg>
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="Content px-10 py-10 space-y-2">
            <a href="/raiser/profile/edit/{{$raiser->id}}"
                class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                style="background: #E57C23;">
                Edit Profile</a>
            <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                <div class="g-0 lg:flex lg:flex-wrap">
                    <div class="px-4 md:px-0 lg:w-6/12">
                        <div class="md:mx-6 md:p-12">
                            <form>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="NameRaiser" name="NameRaiser"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$raiser->name_pic}}" readonly />
                                    <label for="NameRaiser"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Name</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="UsernameRaiser" name="UsernameRaiser"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$raiser->username_pic}}" readonly />
                                    <label for="UsernameRaiser"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Username</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="NoTelp" name="NoTelp"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$raiser->no_telp}}" readonly />
                                    <label for="NoTelp"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Telephone Number</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="password" id="PasswordRaiser" name="PasswordRaiser"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$raiser->password_pic}}" readonly />
                                    <label for="PasswordRaiser"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Password</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="AgencyRaiser" name="AgencyRaiser"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$raiser->nama_instansi}}" readonly />
                                    <label for="AgencyRaiser"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Agency</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="Department" name="Department"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$raiser->profil}}" readonly />
                                    <label for="Department"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Department</label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
                        style="background: linear-gradient(to left, #ee7724, #d8363a)">
                        <div class="m-auto">
                            <h1 class="text-3xl font-light font-sans text-white">
                                {{ Auth::user()->name }}'s
                            </h1>
                            <h1 class="text-6xl font-bold font-sans text-white">
                                PROFILE.
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>