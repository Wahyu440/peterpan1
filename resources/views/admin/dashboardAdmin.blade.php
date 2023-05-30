<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Admin - Donors</title>
</head>

<body>
    <div class="container">
        <div class="Navbar w-screen bg-gradient-to-l from-violet-500 to-violet-800 border-gray-200 px-4 lg:px-6 py-2.5">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="https://flowbite.com" class="flex items-center">
                    <img src="{{ URL('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                </a>
                <div class="flex items-center lg:order-2">
                    <a class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2">
                        {{ Auth::user()->name }}</a>
                    <a href="/admin/logout"
                        class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                        style="background: linear-gradient(to right, #ee7724, #d8363a);">
                        Logout</a>
                </div>
            </div>
        </div>
        <div class="nav top-0 left-0 z-40 w-40 h-screen transition-transform -translate-x-full sm:translate-x-0">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-100">
                <ul class="space-y-2 font-medium">
                    <li class="rounded-lg" style="background: linear-gradient(to left, #ee7724, #d8363a)">
                        <a href="/admin/donor"
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
                            <span class="ml-3">Donors</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="/admin/raiser"
                            class="flex items-center p-2 text-orange-600 rounded-lg hover:bg-gradient-to-l from-violet-500 to-violet-800 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                            </svg>
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Raisers</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="Content px-10 py-10">
            <a href="/admin/donor/add"
                class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                style="background: #E57C23;">
                Add Donor</a>
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-white uppercase"
                        style="background: linear-gradient(to left, #ee7724, #d8363a);">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created at
                            </th>
                            <!-- <th scope="col" class="px-6 py-3">

                            </th> -->
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donor as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$item->username_donor}}
                            </th>
                            <td class="px-6 py-4">
                                {{$item->name_donor}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->email_donor}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->created_at}}
                            </td>
                            <!-- <td class="px-6 py-4">
                                <a href="/admin/donor/edit/{{$item->id}}"
                                    class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                                    style="background: #FFBF00;">
                                    Edit</a>
                            </td> -->
                            <td class="px-6 py-4">
                                <form action="{{ route('donor.delete', $item->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure want to delete this account?')"
                                        class="text-white dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2"
                                        style="background: #DC3535;">
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="flex items-center justify-between pt-4 px-10 py-5" aria-label="Table navigation">
                    <ul class="inline-flex items-center space-x-10">
                        {{ $donor->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>