<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Update Donor</title>
</head>

<body>
    <div class="flex h-screen h-14 bg-gradient-to-r from-violet-500 to-violet-800">
        <a href="/admin/donor" class="py-3 px-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-8 h-8 text-violet-600">
                <path
                    d="M9.195 18.44c1.25.713 2.805-.19 2.805-1.629v-2.34l6.945 3.968c1.25.714 2.805-.188 2.805-1.628V8.688c0-1.44-1.555-2.342-2.805-1.628L12 11.03v-2.34c0-1.44-1.555-2.343-2.805-1.629l-7.108 4.062c-1.26.72-1.26 2.536 0 3.256l7.108 4.061z" />
            </svg>
        </a>
        <div class="m-auto container h-full p-10">
            <div class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
                <div class="w-full">
                    <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                        <div class="g-0 lg:flex lg:flex-wrap">
                            <div class="px-4 md:px-0 lg:w-6/12">
                                <div class="md:mx-6 md:p-12">
                                    <br><br>
                                    <div class="text-center">
                                        <img class="mx-auto w-80" src="{{ URL('images/logo.png') }}" alt="logo" />
                                    </div>
                                    <br><br>
                                    <form action="{{ route('donor.update', ['id' => $donor->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="relative mb-4" data-te-input-wrapper-init>
                                            <input type="text" id="NameDonor" name="NameDonor"
                                                class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-400 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " value="{{$donor->name_donor}}" readonly/>
                                            <label for="NameDonor"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Name</label>
                                        </div>
                                        <div class="relative mb-4" data-te-input-wrapper-init>
                                            <input type="text" id="UsernameDonor" name="UsernameDonor"
                                                class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " value="{{$donor->username_donor}}"/>
                                            <label for="UsernameDonor"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Username</label>
                                        </div>
                                        <div class="relative mb-4" data-te-input-wrapper-init>
                                            <input type="email" id="EmailDonor" name="EmailDonor"
                                                class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-400 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " value="{{$donor->email_donor}}" readonly/>
                                            <label for="EmailDonor"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Email</label>
                                        </div>
                                        <div class="relative mb-4" data-te-input-wrapper-init>
                                            <input type="password" id="PasswordDonor" name="PasswordDonor"
                                                class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-400 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " value="{{$donor->password_donor}}" readonly/>
                                            <label for="PasswordDonor"
                                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Password</label>
                                        </div>
                                        <div class="mb-12 pt-1 pb-1 text-center">
                                            <button
                                                class="mb-3 inline-block w-full rounded px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                                                type="submit" data-te-ripple-init data-te-ripple-color="light"
                                                style="background: linear-gradient(to left, #ee7724, #d8363a);">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
                                style="background: linear-gradient(to left, #ee7724, #d8363a)">
                                <div class="m-auto">
                                    <h1 class="text-3xl font-light font-sans text-white">
                                        Update
                                    </h1>
                                    <h1 class="text-6xl font-bold font-sans text-white">
                                        DONOR.
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>