<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Scpel - A Systems reflective meta-programming language for AI</title>
    <!-- Include Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../docs/styles.css">

    <link rel="stylesheet" href="./sheety.css" />
    <?php include "./db/connections.php" ?>
</head>

<body class="h-screen">


    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Scpel</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="max-w-screen-xl items-center h-[100vh] justify-between mx-auto">
        <div class="flex">
            <!-- Side Panel (left div) -->
            <div class="w-1/5 flex flex-col p-2">
                <div class="w-full h-80">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Latest Discussions</h5>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-1 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Introducing an interpreter in the GCC internal structure...
                                        </p>

                                        <div class="mt-2 flex justify-between w-full pl-2 pr-2">
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                by Francis Ssessaazi
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                1 day ago
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="py-1 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Introducing an interpreter in the GCC internal structure...
                                        </p>

                                        <div class="mt-2 flex justify-between w-full pl-2 pr-2">
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                by Francis Ssessaazi
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                1 day ago
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="py-1 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Introducing an interpreter in the GCC internal structure...
                                        </p>

                                        <div class="mt-2 flex justify-between w-full pl-2 pr-2">
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                by Francis Ssessaazi
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                1 day ago
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="py-1 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Introducing an interpreter in the GCC internal structure...
                                        </p>

                                        <div class="mt-2 flex justify-between w-full pl-2 pr-2">
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                by Francis Ssessaazi
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                1 day ago
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="py-1 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Introducing an interpreter in the GCC internal structure...
                                        </p>

                                        <div class="mt-2 flex justify-between w-full pl-2 pr-2">
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                by Francis Ssessaazi
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                1 day ago
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="py-1 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            Introducing an interpreter in the GCC internal structure...
                                        </p>

                                        <div class="mt-2 flex justify-between w-full pl-2 pr-2">
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                by Francis Ssessaazi
                                            </p>
                                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                1 day ago
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full h-80">
                    <!-- Content for the second half -->
                </div>
            </div>

            <!-- Main Content (right div) -->
            <div class="flex-1 h-full items-center justify-center relative">
                <!-- <div class="flex fixed absolute  top-0 bg-opacity-90 w-full h-16 z-10 text-center pl-4 pr-4">
                    <div class="w-full">
                        <p id="para_one" class="text-xl text-gray-500 mt-2">We are so Excited to hear from you!</p>
                    </div>
                </div> -->

                <!-- Content for the main content area -->
                <div  class="m-auto ml-4 h-screen custom-scrollbar pb-20 text-justify">

                    <!-- Editor -->
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="border border-4 border-gray-500 mb-4 p-4">
                        <?php
                            if (isset($_POST['add_thread'])) {


                                $name= $_POST['name'];
                                $email= $_POST['email'];
                                $message= $_POST['message'];
                                $subject= $_POST['subject']; 

                                if (empty($name) || empty($email) || empty($message) || empty($subject)) {
                                    ?>
                                    <div class="p-4 w-full bg-red-400 text-white">Fields must not be empty</div>
                                    <?php
                                }
                                else{
                                    $query = mysqli_query($db,"INSERT INTO scpel_forum (`USER_NAME`,`USER_EMAIL`,`SUBJECT`,`MESSAGE`) values('$name','$email','$subject','$message')  ");
                                    if ($query) {
                                        ?>
                                        <div class="p-4 w-full bg-green-400 text-white">The forum has been created, thank you for your contribution</div>
                                        <script> setInterval(()=>{location.replace("index.php"); },3000)</script>
                                        <?php
                                        
                                    }
                                    else{
                                        ?>
                                        <div class="p-4 w-full bg-red-400 text-white">Something gone wrong</div>
                                        <?php
                                    }
                                }
                            }


                            if (isset($_POST['reply_thread'])) {
                                $name= $_POST['name'];
                                $email= $_POST['email'];
                                $message= $_POST['message'];
                                $subject= $_POST['subject'];
                            

                                if (empty($name) || empty($email) || empty($message) || empty($subject)) {
                                    ?>
                                    <div class="p-4 w-full bg-red-400 text-white">Fields must not be empty</div>
                                    <?php
                                }
                                else{
                                    $query = mysqli_query($db,"INSERT INTO scpel_forum_replies (`USER_NAME`,`USER_EMAIL`,`SUBJECT`,`MESSAGE`,`FORUM_ID`) values('$name','$email','$subject','$message','".$_POST['reply_thread_id']."')  ");
                                    if ($query) {
                                        ?>
                                        <div class="p-4 w-full bg-green-400 text-white">The forum has been created, thank you for your contribution</div>
                                        <script> setInterval(()=>{location.replace("index.php"); },3000)</script>
                                        <?php
                                        
                                    }
                                    else{
                                        ?>
                                        <div class="p-4 w-full bg-red-400 text-white">Something gone wrong</div>
                                        <?php
                                    }
                                }
                            }
                        ?>

                        <?php 
                            if (isset($_GET['forum'])) {
                                ?>
                                <input type="hidden" name="reply_thread_id" value="<?php echo $_GET['forum']; ?>">
                                <?php
                            }
                        ?>
                        <div>
                            <div class="mb-2">
                                <label for="helper-text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    Name</label>
                                <input name="name" type="text" id="helper-text" aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Phrunsys Emmasson">
                            </div>
                            <div class="mb-2">
                                <label for="helper-text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email
                                    address</label>
                                <input name="email" type="email" id="helper-text" aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="phrunsys@scpel.org">
                            </div>
                            <div class="mb-2">
                                <label for="helper-text"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                                <input name="subject" type="text" id="helper-text" aria-describedby="helper-text-explanation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Scpel 1.0.0 Released!">
                            </div>
                        </div>

                        <div>
                            <div
                                class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                                <div class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600">
                                    <div
                                        class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
                                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                        d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6" />
                                                </svg>
                                                <span class="sr-only">Attach file</span>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 16 20">
                                                    <path
                                                        d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                                </svg>
                                                <span class="sr-only">Embed map</span>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 16 20">
                                                    <path
                                                        d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z" />
                                                    <path
                                                        d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                                </svg>
                                                <span class="sr-only">Upload image</span>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 16 20">
                                                    <path
                                                        d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                                                    <path
                                                        d="M14.067 0H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.933-2ZM6.709 13.809a1 1 0 1 1-1.418 1.409l-2-2.013a1 1 0 0 1 0-1.412l2-2a1 1 0 0 1 1.414 1.414L5.412 12.5l1.297 1.309Zm6-.6-2 2.013a1 1 0 1 1-1.418-1.409l1.3-1.307-1.295-1.295a1 1 0 0 1 1.414-1.414l2 2a1 1 0 0 1-.001 1.408v.004Z" />
                                                </svg>
                                                <span class="sr-only">Format code</span>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM13.5 6a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm-7 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm3.5 9.5A5.5 5.5 0 0 1 4.6 11h10.81A5.5 5.5 0 0 1 10 15.5Z" />
                                                </svg>
                                                <span class="sr-only">Add emoji</span>
                                            </button>
                                        </div>
                                        <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse sm:ps-4">
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M9.5 3h9.563M9.5 9h9.563M9.5 15h9.563M1.5 13a2 2 0 1 1 3.321 1.5L1.5 17h5m-5-15 2-1v6m-2 0h4" />
                                                </svg>
                                                <span class="sr-only">Add list</span>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z" />
                                                </svg>
                                                <span class="sr-only">Settings</span>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M18 2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM2 18V7h6.7l.4-.409A4.309 4.309 0 0 1 15.753 7H18v11H2Z" />
                                                    <path
                                                        d="M8.139 10.411 5.289 13.3A1 1 0 0 0 5 14v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .7-.288l2.886-2.851-3.447-3.45ZM14 8a2.463 2.463 0 0 0-3.484 0l-.971.983 3.468 3.468.987-.971A2.463 2.463 0 0 0 14 8Z" />
                                                </svg>
                                                <span class="sr-only">Timeline</span>
                                            </button>
                                            <button type="button"
                                                class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-4 h-4" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                                    <path
                                                        d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                </svg>
                                                <span class="sr-only">Download</span>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" data-tooltip-target="tooltip-fullscreen"
                                        class="p-2 text-gray-500 rounded cursor-pointer sm:ms-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 19 19">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 1h5m0 0v5m0-5-5 5M1.979 6V1H7m0 16.042H1.979V12M18 12v5.042h-5M13 12l5 5M2 1l5 5m0 6-5 5" />
                                        </svg>
                                        <span class="sr-only">Full screen</span>
                                    </button>
                                    <div id="tooltip-fullscreen" role="tooltip"
                                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        Show full screen
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
                                    <label for="editor" class="sr-only">Publish post</label>
                                    <textarea name="message" id="editor" rows="8"
                                        class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                        placeholder="Write an article..." required><?php 
                                        if (isset($_GET['forum'])) {
                            $get_query = mysqli_query($db,"SELECT * from scpel_forum where ID='".$_GET['forum']."' ");
                            $fetch_s = mysqli_fetch_assoc($get_query);
                            echo "> ".$fetch_s['MESSAGE'];

                        }
                        ?></textarea>
                                </div>
                            </div>
                            <div class="mt-2 flex justify-between w-full">
                                <div>
                                    <button type="button" onclick="review_message()"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Save
                                        and Review</button>
                                    

                                    <?php
                                        if (isset($_GET['forum'])) {
                                            ?>
                                            <button name="reply_thread" type="submit"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Send Reply</button>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <button name="add_thread" type="submit"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Send</button>
                                            <?php
                                        }
                                    ?>
                                    <input id="link-checkbox" type="checkbox" value=""
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="link-checkbox"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Enable <a
                                            href="#" class="text-blue-600 hover:underline">Markdown</a>.</label>
                                </div>
                                <div>
                                    <button type="button"
                                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-1 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Discard
                                        Draft</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Outer Container with Border -->
                    <div id="message_review" class="border hidden border-4 mb-4 border-gray-500">
                        <!-- Header Div -->
                        <div class="h-10 flex justify-between w-full bg-gray-200">
                            <p class="m-2">Scpel version 1.0.0 rev 10 is out</p>
                            <p class="m-2">5 hours ago</p>
                        </div>

                        <!-- Inner Flex Container -->
                        <div class="flex h-1/2 w-full">
                            <!-- First Inner Div (Narrower) -->
                            <div class="p-4 w-60 bg-gray-100">
                                <div class="w-full">
                                    <h1>Phrunsys Emmasson</h1>
                                    <div class="w-20 bg-red-100 h-20">
                                        <img class="" src="profile.JPG">
                                    </div>
                                </div>

                                <div class="mt-20">
                                    <ul>
                                        <li><a>Share Post</a></li>
                                        <li><a>Reply to Post</a></li>
                                        <li>Github Account</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Second Inner Div (Takes Remaining Space) -->
                            <div class="w-full p-4 bg-white">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore omnis harum aperiam!
                                    Consequuntur qui sed perferendis odio iste, consequatur ipsa ab libero aliquam
                                    tempore doloremque veniam porro odit, ad mollitia sunt nemo. Sequi reprehenderit
                                    animi, cumque molestias placeat, eaque laudantium vero molestiae voluptatibus
                                    doloribus hic blanditiis quod nam quae delectus! Ex modi quae totam delectus! Ut
                                    modi, soluta impedit esse maiores pariatur maxime possimus facilis vitae suscipit
                                    eius veritatis veniam excepturi velit eligendi iure eveniet asperiores corrupti hic.
                                    Laudantium ullam, quam officiis porro omnis fuga magni architecto enim odit dolore
                                    repellat, sed iusto labore, perspiciatis possimus? Laborum repellendus rerum saepe.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script>
        function review_message() {
            var message_review = document.getElementById("message_review");
            if (message_review) {
                message_review.style.display = "block";
            }
        }
    </script>
</body>