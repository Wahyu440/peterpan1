<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Activity - {{$activity->id}}</title>
</head>

<body>
    <div class="container">
        <div class="Navbar w-screen bg-gradient-to-l from-violet-500 to-violet-800 border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="https://flowbite.com" class="flex items-center">
                    <img src="{{ URL('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="#"
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                        {{ Auth::user()->name }}</a>
                    <a href="/donor/logout"
                        class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                        style="background: linear-gradient(to right, #ee7724, #d8363a);">
                        Logout</a>
                </div>
            </div>
        </div>

        <!-- Navigation -->

        <div class="nav top-0 left-0 z-40 w-40 h-screen transition-transform -translate-x-full sm:translate-x-0">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-100">
                <ul class="space-y-2 font-medium">
                    <li class="rounded-lg" style="background: linear-gradient(to left, #ee7724, #d8363a)">
                        <a href="/donor/dashboard"
                            class="flex items-center p-2 text-white rounded-lg hover:bg-gradient-to-l from-violet-500 to-violet-800 hover:text-white">
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
                    <li class="">
                        <a href="/donor/donation/list"
                            class="flex items-center p-2 text-orange-600 rounded-lg hover:bg-gradient-to-l from-violet-500 to-violet-800 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z" />
                                <path fill-rule="evenodd"
                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z"
                                    clip-rule="evenodd" />
                            </svg>

                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Donations</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="/donor/profile"
                            class="flex items-center p-2 text-orange-600 rounded-lg hover:bg-gradient-to-l from-violet-500 to-violet-800 hover:text-white">
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
            <div class="flex flex-row-reverse">
                <a href="/donor/donation/form/{{$activity->id}}"
                    class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                    style="background: #E57C23;">
                    Donate</a>
                <!-- <a href="/raiser/activity/edit/{{$activity->id}}"
                    class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                    style="background: #FFBF00;">
                    Edit</a> -->
                <form action="{{ route('activity.delete', $activity->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <!-- <button onclick="return confirm('Are you sure want to delete this activity?')"
                        class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                        style="background: #DC3535;">
                        Delete</button> -->
                </form>
            </div>
            <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                <div class="g-0 lg:flex lg:flex-wrap">
                    <div class="px-4 md:px-0 lg:w-6/12">
                        <div class="md:mx-6 md:p-12">
                            <form>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <div class="relative h-4 rounded-lg overflow-hidden bg-gray-200 col-span-2">
                                        @php
                                            $percentage = ($activity->realization / $activity->target) * 100;
                                            $color = '';
                                            
                                            if ($percentage < 15) {
                                                $color = 'red';
                                            } elseif ($percentage < 75) {
                                                $color = 'yellow';
                                            } else {
                                                $color = 'green';
                                            }
                                        @endphp
                                        <div class="absolute top-0 left-0 h-full bg-{{ $color }}-500" style="width: {{ $percentage }}%;"></div>
                                    </div>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="Agency" name="Agency"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$nama_instansi}}" readonly />
                                    <label for="Agency"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Agency</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="RaiserName" name="RaiserName"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$nama_pic}}" readonly />
                                    <label for="RaiserName"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Raiser
                                        Name</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="RaiserName" name="RaiserName"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$noTelp}}" readonly />
                                    <label for="RaiserName"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Telephone
                                        Number</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="NameProgram" name="NameProgram"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$activity->name}}" readonly />
                                    <label for="NameProgram"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Activity
                                        Name</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="Target" name="Target"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="Rp{{ number_format($activity->target, 0, ',', '.') }}"
                                        readonly />
                                    <label for="Target"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Target</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="Realization" name="Realization"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="Rp{{ number_format($activity->realization, 0, ',', '.') }}" readonly />
                                    <label for="Realization"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Realization</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="TotalDonor" name="TotalDonor"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "
                                        value="{{ number_format($activity->total_donor, 0, ',', '.') }} Orang"
                                        readonly />
                                    <label for="TotalDonor"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Total
                                        Donor</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="Type" name="Type"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{$activity->type}}" readonly />
                                    <label for="Type"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Type</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <textarea id="Address" name="Address"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " readonly>{{ $activity->address }}</textarea>
                                    <label for="Address"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Address</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="startDate" name="startDate"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{ date('j F Y', strtotime($activity->start)) }}"
                                        readonly />
                                    <label for="startDate"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">Start
                                        Date</label>
                                </div>
                                <div class="relative mb-4" data-te-input-wrapper-init>
                                    <input type="text" id="endDate" name="endDate"
                                        class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-700 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{ date('j F Y', strtotime($activity->end)) }}"
                                        readonly />
                                    <label for="endDate"
                                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">End
                                        Date</label>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
                        style="background: linear-gradient(to left, #ee7724, #d8363a)">
                        <div class="m-auto">
                            <h1 class="text-3xl font-light font-sans text-white">
                                Detail
                            </h1>
                            <h1 class="text-6xl font-bold font-sans text-white">
                                ACTIVITY.
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>