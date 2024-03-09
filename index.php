<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Welcome to Scpel - A Systems reflective meta-programming language for AI</title>
        <!-- Include Tailwind CSS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles/main.css" />    
        <script src="styles/js/htmx.js"></script>
    </head>
    
    <body class="h-screen">

        <?php include_once "inc/header.php"; ?>

        <br>
        <section class="container mx-auto gap-4 flex w-[80%]">
            <div class="bg-[#F5F5F5] p-4 w-[200px]">
                <ul>
                    <li>
                        <h2 class="text-[#333333]">Forum</h2>
                        <hr>
                        <ul>
                            <li> <a href="/" class=" text-[#B723F7]">Forum Index</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col flex-1">
                <div class="flex items-center">
                    <div class="flex flex-1">
                        <div>
                            <h1 class="text-[20px] font-bold">Scpel Programming Language Forum</h1>
                            <p>Subconscious Electronic Programming Language</p>
                        </div>
                    </div>
                    <div class="px-2">
                        <button onclick="location.href='/create.php'" name="create_thread">Create thread</button>
                    </div>
                </div>

                <div hx-get="/api/forum?thread=<?php if (isset($_GET['thread'])) {
                    echo $_GET['thread'];
                } ?>" hx-trigger="load">
                    <img  alt="Result loading..." class="htmx-indicator" width="50" src="/images/loading.gif"/>
                </div>

            </div>
        </section>
    
    
    
        
</html>