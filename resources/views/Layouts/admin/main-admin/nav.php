<?php
include_once __DIR__ ."\..\header.php";
include_once __DIR__ ."\..\..\..\..\..\app\middleware\admin\main-admin\auth.php";
?>

<nav class="absolute md:relative w-64 transform -translate-x-full md:translate-x-0 h-screen overflow-y-scroll bg-black transition-all duration-200"
    :class="{'-translate-x-full': !navOpen}">
    <div class="flex flex-col justify-between h-full">
        <div class="p-4">
            <!-- LOGO -->
            <div class="border-gray-700 py-5 border-b flex items-center text-white space-x-4">
                <div class="flex justify-between">
                    <a href="" class="image-profile relative w-20 h-20 rounded-full overflow-hidden">
                        <img loading="lazy" class="w-full h-full object-cover"
                            src="../../../assets/img/<?= $_SESSION["main-admin"]->image == "default.jpg" ? "default.jpg" : "admin/" . $_SESSION["main-admin"]->image ?>"
                            alt="">
                    </a>
                    <div class="profile-nav ml-2 mt-1">
                        <div class="relative w-fit pr-2">
                            <p class="text-lg font-medium">Hi Admin
                            <p class="dot-light w-2 h-2 absolute rounded-full bg-blue-600 right-0 top-1 shadow-white">
                            </p>
                            </p>
                        </div>
                        <p>
                            <?= $_SESSION["main-admin"]->first_name . " " . $_SESSION["main-admin"]->last_name ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- NAV LINKS -->
            <div class="border-gray-700 py-5 border-b py-4 text-gray-400 space-y-1">
                <!-- BASIC LINK -->
                <a href="../../Admin/main-admin/dashboard.php"
                    class="block py-2.5 px-4 flex items-center space-x-2 bg-gray-800 text-white hover:bg-gray-800 transition duration-200 transform hover:text-white rounded">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <!-- DROPDOWN LINK -->
                <div class="block" x-data="{open: false}">
                    <div @click="open = !open"
                        class="flex items-center justify-between hover:bg-gray-800 transition duration-200 transform hover:text-white cursor-pointer py-2.5 px-4 rounded">
                        <div class="flex items-center space-x-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span>Control</span>
                        </div>
                        <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7">
                            </path>
                        </svg>
                        <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div x-show="open"
                        class="text-sm border-l-2 border-gray-800 ml-6 my-2.5 pl-2.5 flex flex-col gap-y-1">

                        <!--control category-->
                        <div class="block" x-data="{open: false}">
                            <div @click="open = !open"
                                class="item-nav flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 pl-4 pr-2 rounded transition duration-200 transform">
                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-nav" width="24" height="24"
                                        viewBox="0 0 24 24" id="category">
                                        <g transform="translate(2 2)">
                                            <path
                                                d="M14.0755097,2.66453526e-15 L17.4614756,2.66453526e-15 C18.8637443,2.66453526e-15 20,1.1458518 20,2.55996321 L20,5.97452492 C20,7.38863633 18.8637443,8.53448813 17.4614756,8.53448813 L14.0755097,8.53448813 C12.673241,8.53448813 11.5369853,7.38863633 11.5369853,5.97452492 L11.5369853,2.55996321 C11.5369853,1.1458518 12.673241,2.66453526e-15 14.0755097,2.66453526e-15"
                                                opacity=".4"></path>
                                            <path
                                                d="M5.9244903,11.4655119 C7.32675901,11.4655119 8.46301469,12.6113637 8.46301469,14.0254751 L8.46301469,17.4400368 C8.46301469,18.8531901 7.32675901,20 5.9244903,20 L2.53852439,20 C1.13625568,20 8.8817842e-16,18.8531901 8.8817842e-16,17.4400368 L8.8817842e-16,14.0254751 C8.8817842e-16,12.6113637 1.13625568,11.4655119 2.53852439,11.4655119 L5.9244903,11.4655119 Z M17.4614756,11.4655119 C18.8637443,11.4655119 20,12.6113637 20,14.0254751 L20,17.4400368 C20,18.8531901 18.8637443,20 17.4614756,20 L14.0755097,20 C12.673241,20 11.5369853,18.8531901 11.5369853,17.4400368 L11.5369853,14.0254751 C11.5369853,12.6113637 12.673241,11.4655119 14.0755097,11.4655119 L17.4614756,11.4655119 Z M5.9244903,7.99360578e-15 C7.32675901,7.99360578e-15 8.46301469,1.1458518 8.46301469,2.55996321 L8.46301469,5.97452492 C8.46301469,7.38863633 7.32675901,8.53448813 5.9244903,8.53448813 L2.53852439,8.53448813 C1.13625568,8.53448813 8.8817842e-16,7.38863633 8.8817842e-16,5.97452492 L8.8817842e-16,2.55996321 C8.8817842e-16,1.1458518 1.13625568,7.99360578e-15 2.53852439,7.99360578e-15 L5.9244903,7.99360578e-15 Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Category</span>
                                </div>
                                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7">
                                    </path>
                                </svg>
                                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </div>
                            <div x-show="open"
                                class="text-sm border-l-2 border-gray-800 ml-6 my-2.5 pl-2.5 flex flex-col gap-y-1">
                                <a href="#" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                    Add
                                </a>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                    View
                                </a>
                            </div>
                        </div>

                        <!--control sub category-->
                        <div class="block" x-data="{open: false}">
                            <div @click="open = !open"
                                class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 pl-4 pr-2 rounded transition duration-200 transform">
                                <div class="flex items-center space-x-2">
                                    <i class="icon-nav fa-solid fa-layer-group text-xl"></i>
                                    <span>Sub Category</span>
                                </div>
                                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7">
                                    </path>
                                </svg>
                                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </div>
                            <div x-show="open"
                                class="text-sm border-l-2 border-gray-800 ml-6 my-2.5 pl-2.5 flex flex-col gap-y-1">
                                <a href="#" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                    Add
                                </a>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                    View
                                </a>
                            </div>
                        </div>

                        <!--control Brand-->
                        <div class="block" x-data="{open: false}">
                            <div @click="open = !open"
                                class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 pl-4 pr-2 rounded transition duration-200 transform">
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-chart-simple text-lg"></i>
                                    <span>Brand</span>
                                </div>
                                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7">
                                    </path>
                                </svg>
                                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </div>
                            <div x-show="open"
                                class="text-sm border-l-2 border-gray-800 ml-6 my-2.5 pl-2.5 flex flex-col gap-y-1">
                                <a href="#" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                    Add
                                </a>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                    View
                                </a>
                            </div>
                        </div>

                        <!--control sub admin-->
                        <div class="block" x-data="{open: false}">
                            <div @click="open = !open"
                                class="flex items-center justify-between hover:bg-gray-800 hover:text-white cursor-pointer py-2.5 pl-4 pr-2 rounded transition duration-200 transform">
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-users"></i>
                                    <span>Sub Admins</span>
                                </div>
                                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7">
                                    </path>
                                </svg>
                                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </div>
                            <div x-show="open"
                                class="text-sm border-l-2 border-gray-800 ml-6 my-2.5 pl-2.5 flex flex-col gap-y-1">
                                <a href="#" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                    Add
                                </a>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-800 hover:text-white rounded">
                                    View
                                </a>
                            </div>
                        </div>

                        <!-- add item -->
                    </div>
                </div>

                <!-- my profile -->
                <a href=""
                    class="block py-2.5 px-4 flex items-center space-x-2 hover:bg-gray-800 transition duration-200 transform hover:text-white rounded">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>
            </div>

            <!-- Logout -->
            <a href="../../../../../app/requests/Logout.php"
                class="block text-gray-400 py-2.5 px-4 mt-4 flex items-center space-x-2 hover:bg-gray-800 transition duration-200 transform hover:text-red-500 rounded">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                <span>Logout</span>
            </a>

        </div>
    </div>
</nav>